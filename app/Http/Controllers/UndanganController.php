<?php

namespace App\Http\Controllers;

use App\Models\Undangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $fileNames = 'Undangan-' . $request->no_urut . '.' . $extension;
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
        ]);

        return redirect()->route('undangan.index')->with('success', 'Berhasil Menambah Undangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Undangan  $undangan
     * @return \Illuminate\Http\Response
     */
    public function show(Undangan $undangan)
    {
        //
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
            $fileNames = 'Undangan-' . $request->no_urut . '.' . $extension;
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

        $items = Undangan::where('nomor_surat','LIKE','%'.$query.'%')->get();

        return view('pages.undangan.index', [
            'items' => $items
        ]);
    }
}
