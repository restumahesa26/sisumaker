<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_urut', 'pengirim', 'penerima', 'tanggal', 'nomor_surat', 'perihal', 'keterangan'
    ];
}
