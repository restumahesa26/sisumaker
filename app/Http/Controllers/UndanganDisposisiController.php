<?php

namespace App\Http\Controllers;

use App\Models\UndanganDisposisi;
use Illuminate\Http\Request;

class UndanganDisposisiController extends Controller
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

        UndanganDisposisi::create([
            'undangan_id' => $request->undangan_id,
            'tujuan' => $request->tujuan,
            'tindak_lanjut' => $request->tindak_lanjut,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('undangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UndanganDisposisi  $undanganDisposisi
     * @return \Illuminate\Http\Response
     */
    public function show(UndanganDisposisi $undanganDisposisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UndanganDisposisi  $undanganDisposisi
     * @return \Illuminate\Http\Response
     */
    public function edit(UndanganDisposisi $undanganDisposisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UndanganDisposisi  $undanganDisposisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tujuan' => ['required', 'string', 'max:255'],
            'tindak_lanjut' => ['required', 'string', 'max:255'],
            'catatan' => ['required', 'string', 'max:255'],
        ]);

        $item = UndanganDisposisi::findOrFail($id);

        $item->tujuan = $request->tujuan;
        $item->tindak_lanjut = $request->tindak_lanjut;
        $item->catatan = $request->catatan;
        $item->save();

        return redirect()->route('undangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UndanganDisposisi  $undanganDisposisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(UndanganDisposisi $undanganDisposisi)
    {
        //
    }
}
