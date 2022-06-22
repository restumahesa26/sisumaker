<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratMasukDisposisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratMasukDisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'tujuan' => ['required', 'string', 'max:50'],
            'tindak_lanjut' => ['required', 'string', 'max:50'],
        ]);

        SuratMasukDisposisi::create([
            'surat_masuk_id' => $request->surat_masuk_id,
            'tujuan' => $request->tujuan,
            'tindak_lanjut' => $request->tindak_lanjut,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('surat-masuk.index')->with('success', 'Berhasil Membuat Disposisi Surat Masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function show(SuratMasukDisposisi $disposisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratMasukDisposisi $disposisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tujuan' => ['required', 'string', 'max:50'],
            'tindak_lanjut' => ['required', 'string', 'max:50'],
        ]);

        $item = SuratMasukDisposisi::findOrFail($id);

        $item->tujuan = $request->tujuan;
        $item->tindak_lanjut = $request->tindak_lanjut;
        $item->catatan = $request->catatan;
        $item->save();

        return redirect()->route('surat-masuk.index')->with('success', 'Berhasil Mengubah Disposisi Surat Masuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratMasukDisposisi $disposisi)
    {
        //
    }
}
