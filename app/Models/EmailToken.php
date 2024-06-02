<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailToken extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'email',
        'token'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];
}
