<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OauthService extends Model
{
    use HasFactory;
// id	name	btn_url	btn_label	btn_icon	enabled	created_at	updated_at
    protected $fillable = [
        'name',
        'btn_url',
        'btn_label',
        'btn_icon',
        'enabled',
    ];
}
