<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::latest('updated_at')->get();
        $suratKeluar = SuratKeluar::latest('updated_at')->get();

        return view('pages.laporan.index')->with(compact('suratMasuk', 'suratKeluar'));
    }
}
