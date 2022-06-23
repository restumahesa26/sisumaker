<?php

namespace App\Exports;

use App\Models\SuratKeluar;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SuratKeluarTanggalExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public $awal;
    public $akhir;

    public function __construct($awal, $akhir)
    {
        $this->awal = $awal;
        $this->akhir = $akhir;
    }

    public function query()
    {
        return SuratKeluar::whereDate('tanggal_surat', '>=', $this->awal)->whereDate('tanggal_surat', '<=', $this->akhir);
    }

    public function map($item): array
    {
        return [
            $item->no_agenda,
            $item->nomor_halaman,
            $item->klasifikasi,
            $item->nomor_surat,
            Carbon::parse($item->tanggal_surat)->translatedFormat('d F Y'),
            $item->perihal,
            $item->pengirim,
            $item->penerima,
        ];
    }

    public function headings(): array
    {
        return [
            'No Agenda',
            'No Halaman',
            'Klasifikasi',
            'No Surat',
            'Tanggal Surat',
            'Perihal',
            'Pengirim',
            'Penerima',
        ];
    }
}
