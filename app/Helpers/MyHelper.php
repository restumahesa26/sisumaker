<?php

namespace App\Helpers;

use App\Models\Struktur;
use Carbon\Carbon;

class MyHelper
{
    public function getNamaPejabat($bidang)
    {
        $item = Struktur::where('jabatan', $bidang)->first();

        return $item;
    }
}


