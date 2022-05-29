<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $suratMasuk = SuratMasuk::where('tanggal_sekretaris', '!=', NULL)->where('tanggal_pimpinan', '!=', NULL)->count();
        $suratKeluar = SuratKeluar::count();
        $suratMasukSekretaris = SuratMasuk::where('tanggal_sekretaris', NULL)->count();
        $suratMasukPimpinan = SuratMasuk::where('tanggal_pimpinan', NULL)->count();

        return view('pages.dashboard')->with(compact('suratMasuk', 'suratKeluar', 'suratMasukSekretaris', 'suratMasukPimpinan'));
    }
}
