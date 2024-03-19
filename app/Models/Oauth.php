<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Oauth extends Model
{
    protected $fillable = [
        "user_id",
        "oauth_service_id",
        "access_token",
        "token_type",
        "expire_at",
        "refresh_token"
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function oauthService() : BelongsTo
    {
        return $this->belongsTo(OauthService::class);
    }
}
