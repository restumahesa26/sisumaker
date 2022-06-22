<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\Undangan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::all();
        $suratKeluar = SuratKeluar::all();
        $undangan = Undangan::all();

        return view('pages.laporan.index')->with(compact('suratMasuk', 'suratKeluar', 'undangan'));
    }
}
