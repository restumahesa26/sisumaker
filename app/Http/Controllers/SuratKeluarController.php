<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data surat keluar
        $items = SuratKeluar::all();

        // tampilkan ke halaman index surat keluar
        return view('pages.surat-keluar.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // tampilkan halaman tambah data surat keluar
        return view('pages.surat-keluar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // membuat validasi
        $request->validate([
            'no_agenda' => ['required', 'integer'],
            'nomor_surat' => ['required', 'string', 'max:255'],
            'tanggal_surat' => ['required', 'date'],
            'perihal' => ['required', 'string', 'max:255'],
            'pengirim' => ['required', 'string', 'max:255'],
            'penerima' => ['required', 'string', 'max:255'],
            'softcopy' => 'required|mimes:jpeg,png,jpg,pdf',
        ]);

        $value = $request->file('softcopy');
        $extension = $value->extension();
        $fileNames = uniqid('surat_keluar_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/file-surat/surat-keluar', $value, $fileNames);

        // menambah data baru
        SuratKeluar::create([
            'user_id' => Auth::user()->id,
            'no_agenda' => $request->no_agenda,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal' => $request->perihal,
            'pengirim' => $request->pengirim,
            'penerima' => $request->penerima,
            'softcopy' => $fileNames,
            'tanggal_sekretariat' => Carbon::now()
        ]);

        // mengembalikan ke halaman index surat keluar
        return redirect()->route('surat-keluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ambil data surat masuk berdasarkan id
        $item = SuratKeluar::findOrFail($id);

        // tampilkan data surat tersebut ke halaman edit
        return view('pages.surat-keluar.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // membuat validasi
        $request->validate([
            'no_agenda' => ['required', 'integer'],
            'nomor_surat' => ['required', 'string', 'max:255'],
            'tanggal_surat' => ['required', 'date'],
            'perihal' => ['required', 'string', 'max:255'],
            'pengirim' => ['required', 'string', 'max:255'],
            'penerima' => ['required', 'string', 'max:255'],
        ]);

        // ambil data surat masuk berdasarkan id
        $item = SuratKeluar::findOrFail($id);

        if ($request->softcopy) {
            $request->validate([
                'softcopy' => 'required|mimes:jpeg,png,jpg,pdf',
            ]);
        }

        if ($request->softcopy) {
            $value = $request->file('softcopy');
            $extension = $value->extension();
            $fileNames = uniqid('surat_keluar_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/file-surat/surat-keluar', $value, $fileNames);
        }else {
            $fileNames = $item->softcopy;
        }

        // lakukan update pada setiap data
        $item->update([
            'no_agenda' => $request->no_agenda,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal' => $request->perihal,
            'pengirim' => $request->pengirim,
            'penerima' => $request->penerima,
            'softcopy' => $fileNames
        ]);

        // kembalikan ke halaman index surat keluar
        return redirect()->route('surat-keluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ambil data surat masuk berdasarkan id
        $item = SuratKeluar::findOrFail($id);

        // lakukan perintah hapus data
        $item->delete();

        // kembalikan ke halaman index surat masuk
        return redirect()->route('surat-keluar.index');
    }
}