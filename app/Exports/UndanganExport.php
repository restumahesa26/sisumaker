<?php

namespace App\Exports;

use App\Models\Undangan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UndanganExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Undangan::orderBy('no_urut', 'ASC')->get();
    }

    public function map($item): array
    {
        return [
            $item->no_urut,
            $item->nomor_surat,
            Carbon::parse($item->tanggal)->translatedFormat('d F Y'),
            $item->perihal,
            $item->pengirim,
            $item->penerima,
            Carbon::parse($item->tanggal_sekretariat)->translatedFormat('d F Y H:i'),
            $item->tanggal_sekretaris != NULL ? Carbon::parse($item->tanggal_sekretaris)->translatedFormat('d F Y H:i') : '-',
            $item->tanggal_pimpinan != NULL ? Carbon::parse($item->tanggal_pimpinan)->translatedFormat('d F Y H:i') : '-',
        ];
    }

    public function headings(): array
    {
        return [
            'No Urut',
            'No Surat',
            'Tanggal',
            'Perihal',
            'Pengirim',
            'Penerima',
            'Tanggal Sekretariat',
            'Tanggal Sekretaris',
            'Tanggal Pimpinan',
        ];
    }
}
