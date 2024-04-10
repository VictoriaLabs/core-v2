<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = ['sender_user_id', 'reveiver_user_id', 'event', 'action', 'message'];

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_user_id');
    }
}
