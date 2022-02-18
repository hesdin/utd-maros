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
        if ($this->created_at->isToday()) {
            return "Hari ini " . Carbon::parse($this->created_at)->isoFormat('HH:mm');
        } elseif ($this->created_at->isYesterday()) {
            return "Kemarin " . Carbon::parse($this->created_at)->isoFormat('HH:mm');
        }
        return Carbon::parse($this->created_at)->isoFormat('D MMM YYYY HH:mm');
    }

    public function userPengirim()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
