<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendonor extends Model
{
    use HasFactory;

    protected $with = ['golongan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function golongan()
    {
        return $this->belongsTo(golongan::class);
    }
}
