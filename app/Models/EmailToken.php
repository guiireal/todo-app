<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public static function generate(string $email): self
    {
        self::query()
            ->where('email', $email)
            ->delete();

        return self::query()->create([
            'email' => $email,
            'token' => Str::random(32)
        ]);
    }

    public function generateMagicLink(): string
    {
        return route('login.magic', [
            'emailToken' => $this->token
        ]);
    }

    public function consume(): void
    {
        self::query()
            ->where('email', $this->email)
            ->delete();
    }
}
