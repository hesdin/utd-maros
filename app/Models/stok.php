<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    use HasFactory;

    public function golongan()
    {
        return $this->belongsTo(golongan::class);
    }

    public function tipe()
    {
        return $this->belongsTo(tipe::class);
    }
}
