<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UndanganDisposisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'undangan_id', 'tujuan', 'tindak_lanjut', 'catatan'
    ];

    public function undangan()
    {
        return $this->hasOne(Undangan::class, 'id', 'undangan_id');
    }
}
