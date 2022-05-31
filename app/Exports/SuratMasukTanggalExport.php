<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SuratMasukTanggalExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
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
        return SuratMasuk::whereDate('tanggal_surat', '>=', $this->awal)->whereDate('tanggal_surat', '<=', $this->akhir);
    }

    public function map($item): array
    {
        return [
            $item->no_agenda,
            $item->nomor_surat,
            Carbon::parse($item->tanggal_surat)->translatedFormat('d F Y'),
            $item->perihal,
            $item->pengirim,
            $item->penerima,
            Carbon::parse($item->tanggal_sekretariat)->translatedFormat('d F Y H:i'),
            $item->tanggal_sekretaris != NULL ? Carbon::parse($item->tanggal_sekretaris)->translatedFormat('d F Y H:i') : '',
            $item->tanggal_pimpinan != NULL ? Carbon::parse($item->tanggal_pimpinan)->translatedFormat('d F Y H:i') : '',
        ];
    }

    public function headings(): array
    {
        return [
            'No Agenda',
            'No Surat',
            'Tanggal Surat',
            'Perihal',
            'Pengirim',
            'Penerima',
            'Tanggal Sekretariat',
            'Tanggal Sekretaris',
            'Tanggal Pimpinan',
        ];
    }
}
