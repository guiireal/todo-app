<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use  Notifiable;

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
    ];

    protected $hidden = [
        'id',
        'email_verified_at',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    public static function getOrCreateByEmail(string $email): self
    {
        return self::query()
            ->firstOrCreate([
                'email' => $email,
            ], [
                'name' => 'Usuário',
                'email_verified_at' => now()
            ]);
    }

    public static function loginWithEmailToken(EmailToken $emailToken): void
    {
        $user = self::getOrCreateByEmail($emailToken->email);

        $emailToken->consume();

        auth()->login($user);
    }

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class);
    }
}
