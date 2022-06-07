<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = VisiMisi::all();

        return view('pages.visi-misi.index', [
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
        if (VisiMisi::count() < 1) {
            return view('pages.visi-misi.create');
        }else {
            return redirect()->back();
        }
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
            'visi_misi' => ['required', 'string']
        ]);

        if (VisiMisi::count() < 1) {
            VisiMisi::create([
                'visi_misi' => $request->visi_misi
            ]);

            return redirect()->route('visi-misi.index')->with('success', 'Berhasil Menambah Visi Misi');
        }else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = VisiMisi::findOrFail($id);

        return view('pages.visi-misi.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'visi_misi' => ['required', 'string']
        ]);

        $item = VisiMisi::findOrFail($id);

        $item->update([
            'visi_misi' => $request->visi_misi
        ]);

        return redirect()->route('visi-misi.index')->with('success', 'Berhasil Mengubah Visi Misi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = VisiMisi::findOrFail($id);

        $item->delete();

        return redirect()->route('visi-misi.index')->with('success', 'Berhasil Menghapus Visi Misi');
    }
}
