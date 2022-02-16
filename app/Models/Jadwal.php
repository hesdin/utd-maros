<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $appends = ['parsedDate', 'parsedStart', 'parsedEnd'];

    public function getParsedDateAttribute()
    {
        return Carbon::parse($this->tgl)->isoFormat('D MMMM YYYY');
    }
    public function getParsedStartAttribute()
    {
        return Carbon::parse($this->mulai)->isoFormat('HH:mm');
    }
    public function getParsedEndAttribute()
    {
        return Carbon::parse($this->selesai)->isoFormat('HH:mm');
    }
}
