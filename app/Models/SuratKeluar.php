<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'no_agenda', 'kode_unik', 'nomor_surat', 'tanggal_surat', 'perihal', 'pengirim', 'penerima', 'keterangan', 'softcopy', 'nomor_halaman', 'klasifikasi'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
