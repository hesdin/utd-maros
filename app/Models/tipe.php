<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipe extends Model
{
    use HasFactory;

    public function stok()
    {
        return $this->hasOne(stok::class);
    }
}
