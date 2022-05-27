<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function detail($kode_unik)
    {
        $item = SuratMasuk::where('kode_unik', $kode_unik)->first();

        return view('pages.detail', [
            'item' => $item
        ]);
    }
}
