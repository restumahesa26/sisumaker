<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisposisiController extends Controller
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
            'tujuan' => ['required', 'string', 'max:255'],
            'tindak_lanjut' => ['required', 'string', 'max:255'],
            'catatan' => ['required', 'string', 'max:255'],
        ]);

        Disposisi::create([
            'user_id' => Auth::user()->id,
            'surat_masuk_id' => $request->surat_masuk_id,
            'tujuan' => $request->tujuan,
            'tindak_lanjut' => $request->tindak_lanjut,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('surat-masuk.show', $request->surat_masuk_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function show(Disposisi $disposisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Disposisi $disposisi)
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
            'tujuan' => ['required', 'string', 'max:255'],
            'tindak_lanjut' => ['required', 'string', 'max:255'],
            'catatan' => ['required', 'string', 'max:255'],
        ]);

        $item = Disposisi::findOrFail($id);

        $item->tujuan = $request->tujuan;
        $item->tindak_lanjut = $request->tindak_lanjut;
        $item->catatan = $request->catatan;
        $item->save();

        return redirect()->route('surat-masuk.show', $item->surat_masuk_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disposisi $disposisi)
    {
        //
    }
}
