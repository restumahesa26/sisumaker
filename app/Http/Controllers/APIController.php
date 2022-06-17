<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\Undangan;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function cek_no_agenda_surat_masuk(Request $request)
    {
        $no = $request->no_agenda;

        $check = SuratMasuk::where('no_agenda', $no)->first();

        if ($check == NULL || $no == $request->no_agenda_2) {
            return response()->json(['pesan'=>'']);
        }else {
            return response()->json(['pesan'=>'* Nomor Agenda Harus Unik']);
        }
    }

    public function cek_no_agenda_surat_keluar(Request $request)
    {
        $no = $request->no_agenda;
        $noHalaman = $request->nomor_halaman;

        $check = SuratKeluar::where('no_agenda', $no)->where('nomor_halaman', $noHalaman)->first();

        if ($no > 103) {
            return response()->json(['pesan'=>'* Nomor Agenda Tidak Boleh Lebih Dari 103']);
        }elseif ($check == NULL || $no == $request->no_agenda_2 || $no == $request->nomor_halaman_2) {
            return response()->json(['pesan'=>'']);
        }else {
            return response()->json(['pesan'=>'* Nomor Agenda Harus Unik']);
        }
    }

    public function cek_no_urut_undangan(Request $request)
    {
        $no = $request->no_urut;

        $check = Undangan::where('no_urut', $no)->first();

        if ($check == NULL || $no == $request->no_urut_2) {
            return response()->json(['pesan'=>'']);
        }else {
            return response()->json(['pesan'=>'* Nomor Urut Harus Unik']);
        }
    }
}
