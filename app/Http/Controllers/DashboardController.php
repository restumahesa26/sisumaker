<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\Undangan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $suratMasuk = SuratMasuk::where('tanggal_sekretaris', NULL)->orWhere('tanggal_pimpinan', NULL)->get();
        $undangan = Undangan::where('tanggal_sekretaris', NULL)->orWhere('tanggal_pimpinan', NULL)->get();

        $surat_masuk = SuratMasuk::whereDate('tanggal_surat', Carbon::now())->count();
        $surat_keluar = SuratKeluar::whereDate('tanggal_surat', Carbon::now())->count();
        $undangan_count = Undangan::whereDate('tanggal', Carbon::now())->count();

        return view('pages.dashboard')->with(compact('suratMasuk', 'undangan', 'surat_masuk', 'surat_keluar', 'undangan_count'));
    }
}
