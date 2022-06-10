<?php

namespace App\Http\Controllers;

use App\Exports\UndanganExport;
use App\Exports\UndanganTanggalExport;
use App\Models\Undangan;
use App\Models\UndanganDisposisi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Undangan::latest('updated_at')->get();

        return view('pages.undangan.index', [
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
        return view('pages.undangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_urut' => ['required', 'integer', 'unique:undangans'],
            'nomor_surat' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'perihal' => ['required', 'string', 'max:255'],
            'pengirim' => ['required', 'string', 'max:255'],
            'penerima' => ['required', 'string', 'max:255'],
            'softcopy' => 'required|mimes:jpeg,png,jpg,pdf',
        ]);

        $value = $request->file('softcopy');
        $extension = $value->extension();
        $fileNames = 'Undangan-' . $request->nomor_surat . '.' . $extension;
        Storage::putFileAs('public/file-undangan', $value, $fileNames);

        Undangan::create([
            'no_urut' => $request->no_urut,
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'pengirim' => $request->pengirim,
            'penerima' => $request->penerima,
            'keterangan' => $request->keterangan,
            'softcopy' => $fileNames,
            'tanggal_sekretariat' => Carbon::now(),
            'kode_unik' => uniqid('undangan-', microtime())
        ]);

        return redirect()->route('undangan.index')->with('success', 'Berhasil Menambah Undangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Undangan  $undangan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ambil data surat masuk berdasarkan id
        $item = Undangan::findOrFail($id);

        // lempar data disposisi
        $item2 = UndanganDisposisi::where('undangan_id', $id)->first();

        // lempar ke halaman show surat
        return view('pages.undangan.show', [
            'item' => $item, 'item2' => $item2
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Undangan  $undangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Undangan::findOrFail($id);

        return view('pages.undangan.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Undangan  $undangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'perihal' => ['required', 'string', 'max:255'],
            'pengirim' => ['required', 'string', 'max:255'],
            'penerima' => ['required', 'string', 'max:255'],
        ]);

        $item = Undangan::findOrFail($id);

        if ($request->softcopy) {
            $request->validate([
                'softcopy' => 'required|mimes:jpeg,png,jpg,pdf',
            ]);
        }

        if ($id != $item->id) {
            $request->validate([
                'no_urut' => ['required', 'integer', 'unique:undangans'],
            ]);
        }

        if ($request->softcopy) {
            $value = $request->file('softcopy');
            $extension = $value->extension();
            $fileNames = 'Undangan-' . $request->nomor_surat . '.' . $extension;
            Storage::putFileAs('public/file-undangan', $value, $fileNames);
        }else {
            $fileNames = $item->softcopy;
        }

        $item->update([
            'no_urut' => $request->no_urut,
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'pengirim' => $request->pengirim,
            'penerima' => $request->penerima,
            'keterangan' => $request->keterangan,
            'softcopy' => $fileNames
        ]);

        return redirect()->route('undangan.index')->with('success', 'Berhasil Mengubah Undangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Undangan  $undangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Undangan::findOrFail($id);

        $item->delete();

        return redirect()->route('undangan.index')->with('success', 'Berhasil Menghapus Undangan');
    }

    public function cari_surat(Request $request)
    {
        $query = $request->search;

        $items = Undangan::where('nomor_surat','LIKE','%'.$query.'%')->orWhere('perihal','LIKE','%'.$query.'%')->orWhere('pengirim','LIKE','%'.$query.'%')->orWhere('penerima','LIKE','%'.$query.'%')->get();

        return view('pages.undangan.index', [
            'items' => $items
        ]);
    }

    public function verifikasi($id)
    {
        // ambil data surat masuk berdasarkan id
        $item = Undangan::findOrFail($id);

        // buat perkondisian untuk user sekretaris dan pimpinan
        if (Auth::user()->role == 'Sekretaris') {
            $item->tanggal_sekretaris = Carbon::now();
        }elseif (Auth::user()->role == 'Pimpinan') {
            $item->tanggal_pimpinan = Carbon::now();
        }

        $item->save();

        if (Auth::user()->role == 'Sekretaris') {
            return redirect()->route('undangan.index')->with('success', 'Berhasil Verifikasi Undangan');
        }elseif (Auth::user()->role == 'Pimpinan') {
            return redirect()->route('undangan.show', $id)->with('success', 'Berhasil Verifikasi Undangan');
        }

    }

    public function cetak_disposisi($id)
    {
        $item = UndanganDisposisi::where('undangan_id', $id)->first();

        return view('pages.pdf.disposisi-2', [
            'item' => $item
        ]);
    }

    public function cetak_semua()
    {
        return Excel::download(new UndanganExport, 'semua-undangan.xlsx');
    }

    public function cetak_tanggal(Request $request)
    {
        return Excel::download(new UndanganTanggalExport($request->awal, $request->akhir), 'undangan-berdasarkan-tanggal.xlsx');
    }
}
