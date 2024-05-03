<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oauth extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'oauth_services_id',
        'access_token',
        'token_type',
        'expired_at',
        'refresh_token',
    ];
}
