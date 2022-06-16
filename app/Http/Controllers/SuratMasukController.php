<?php

namespace App\Http\Controllers;

use App\Exports\SuratMasukExport;
use App\Exports\SuratMasukTanggalExport;
use App\Models\Disposisi;
use App\Models\SuratMasuk;
use App\Models\SuratMasukDisposisi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data surat masuk
        $items = SuratMasuk::latest()->get();

        // tampilkan ke halaman index surat masuk
        return view('pages.surat-masuk.index', [
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
        // tampilkan halaman tambah data surat masuk
        return view('pages.surat-masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // membuat validasi
        $request->validate([
            'no_agenda' => ['required', 'unique:surat_masuks'],
            'nomor_surat' => ['required', 'string', 'max:255'],
            'tanggal_surat' => ['required', 'date'],
            'perihal' => ['required', 'string', 'max:255'],
            'pengirim' => ['required', 'string', 'max:255'],
            'penerima' => ['required', 'string', 'max:255'],
            'softcopy' => 'required|mimes:jpeg,png,jpg,pdf',
        ]);

        $value = $request->file('softcopy');
        $extension = $value->extension();
        $fileNames = uniqid('surat_masuk_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/file-surat/surat-masuk', $value, $fileNames);

        // menambah data baru
        SuratMasuk::create([
            'no_agenda' => $request->no_agenda,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal' => $request->perihal,
            'pengirim' => $request->pengirim,
            'penerima' => $request->penerima,
            'keterangan' => $request->keterangan,
            'softcopy' => $fileNames,
            'tanggal_sekretariat' => Carbon::now(),
            'kode_unik' => uniqid('surat-', microtime())
        ]);

        // mengembalikan ke halaman index surat masuk
        return redirect()->route('surat-masuk.index')->with('success', 'Berhasil Menambah Surat Masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ambil data surat masuk berdasarkan id
        $item = SuratMasuk::findOrFail($id);

        // lempar data disposisi
        $item2 = SuratMasukDisposisi::where('surat_masuk_id', $id)->first();

        // lempar ke halaman show surat
        return view('pages.surat-masuk.show', [
            'item' => $item, 'item2' => $item2
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ambil data surat masuk berdasarkan id
        $item = SuratMasuk::findOrFail($id);

        // tampilkan data surat tersebut ke halaman edit
        return view('pages.surat-masuk.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // membuat validasi
        $request->validate([
            'nomor_surat' => ['required', 'string', 'max:255'],
            'tanggal_surat' => ['required', 'date'],
            'perihal' => ['required', 'string', 'max:255'],
            'pengirim' => ['required', 'string', 'max:255'],
            'penerima' => ['required', 'string', 'max:255'],
        ]);

        if ($request->softcopy) {
            $request->validate([
                'softcopy' => 'required|mimes:jpeg,png,jpg,pdf',
            ]);
        }

        // ambil data surat masuk berdasarkan id
        $item = SuratMasuk::findOrFail($id);

        if ($id != $item->id) {
            $request->validate([
                'no_agenda' => ['required', 'unique:surat_masuks'],
            ]);
        }

        if ($request->softcopy) {
            $value = $request->file('softcopy');
            $extension = $value->extension();
            $fileNames = uniqid('surat_masuk_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/file-surat/surat-masuk', $value, $fileNames);
        }else {
            $fileNames = $item->softcopy;
        }

        // lakukan update pada setiap data
        $item->update([
            'no_agenda' => $request->no_agenda,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal' => $request->perihal,
            'pengirim' => $request->pengirim,
            'penerima' => $request->penerima,
            'keterangan' => $request->keterangan,
            'softcopy' => $fileNames
        ]);

        // kembalikan ke halaman index surat masuk
        return redirect()->route('surat-masuk.index')->with('success', 'Berhasil Mengubah Surat Masuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ambil data surat masuk berdasarkan id
        $item = SuratMasuk::findOrFail($id);

        // lakukan perintah hapus data
        $item->delete();

        // kembalikan ke halaman index surat masuk
        return redirect()->route('surat-masuk.index')->with('success', 'Berhasil Menghapus Surat Masuk');
    }

    public function verifikasi($id)
    {
        // ambil data surat masuk berdasarkan id
        $item = SuratMasuk::findOrFail($id);

        // buat perkondisian untuk user sekretaris dan pimpinan
        if (Auth::user()->role == 'Sekretaris') {
            $item->tanggal_sekretaris = Carbon::now();
        }elseif (Auth::user()->role == 'Pimpinan') {
            $item->tanggal_pimpinan = Carbon::now();
        }

        $item->save();

        if (Auth::user()->role == 'Sekretaris') {
            return redirect()->route('surat-masuk.index')->with('success', 'Berhasil Verifikasi Surat Masuk');
        }elseif (Auth::user()->role == 'Pimpinan') {
            return redirect()->route('surat-masuk.show', $id)->with('success', 'Berhasil Verifikasi Surat Masuk');
        }

    }

    public function cetak_disposisi($id)
    {
        $item = SuratMasukDisposisi::where('surat_masuk_id', $id)->first();

        return view('pages.pdf.disposisi', [
            'item' => $item
        ]);
    }

    public function cetak_semua()
    {
        return Excel::download(new SuratMasukExport, 'semua-surat-masuk.xlsx');
    }

    public function cari_surat(Request $request)
    {
        $query = $request->search;

        $items = SuratMasuk::where('nomor_surat','LIKE','%'.$query.'%')->orWhere('perihal','LIKE','%'.$query.'%')->orWhere('pengirim','LIKE','%'.$query.'%')->orWhere('penerima','LIKE','%'.$query.'%')->get();
        $items->appends(['search' => $query]);

        return view('pages.surat-masuk.index', [
            'items' => $items
        ]);
    }

    public function cetak_tanggal(Request $request)
    {
        return Excel::download(new SuratMasukTanggalExport($request->awal, $request->akhir), 'surat-masuk-berdasarkan-tanggal.xlsx');
    }
}
