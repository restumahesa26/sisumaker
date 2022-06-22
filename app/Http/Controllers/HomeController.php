<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use App\Models\SuratMasuk;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $visiMisi = VisiMisi::first();

        // // Read File

        // $kepalaBadan = Struktur::where('jabatan', 'Kepala Badan')->first();

        // $jsonString = file_get_contents(public_path('/data.json'));

        // $data = json_decode($jsonString, true);

        // //dd($data['0']['text']);

        // // Update Key

        // $data['0']['title'] = $kepalaBadan->nama;

        // // Write File

        // $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

        // file_put_contents(public_path('/data.json'), stripslashes($newJsonString));

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
