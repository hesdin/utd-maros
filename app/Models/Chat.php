<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chat';

    protected $appends = ['sentAt'];

    public function getSentAtAttribute()
    {
        return Carbon::parse($this->created_at)->isoFormat('D MMM YYYY HH:mm');
    }
}
