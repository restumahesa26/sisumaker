<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $visiMisi = VisiMisi::first();

        return view('pages.home', [
            'visiMisi' => $visiMisi
        ]);
    }

    public function scan()
    {
        return view('pages.scan');
    }

    public function detail($kode_unik)
    {
        $item = SuratMasuk::where('kode_unik', $kode_unik)->first();

        return view('pages.detail', [
            'item' => $item
        ]);
    }

    public function scanning(Request $request)
    {
        $item = SuratMasuk::where('kode_unik', $request->qr_code)->first();

        if ($item) {
            return response()->json(['hasil' => 'ada', 'route' => route('detail', $request->qr_code)]);
        }else {
            return response()->json(['hasil' => 'tidak']);
        }
    }
}
