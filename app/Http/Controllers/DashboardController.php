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

        $surat_masuk = SuratMasuk::whereBetween('tanggal_surat', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $surat_keluar = SuratKeluar::whereBetween('tanggal_surat', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $undangan_count = Undangan::whereBetween('tanggal', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        return view('pages.dashboard')->with(compact('suratMasuk', 'undangan', 'surat_masuk', 'surat_keluar', 'undangan_count'));
    }
}
