<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'surat_masuk_id', 'tujuan', 'tindak_lanjut', 'catatan'
    ];

    public function surat_masuk()
    {
        return $this->hasOne(SuratMasuk::class, 'id', 'surat_masuk_id');
    }
}
