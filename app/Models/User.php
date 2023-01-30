<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'phone',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function gameTokens(): HasMany
    {
        return $this->hasMany(GameToken::class);
    }

    public function gameHistories(): HasMany
    {
        return $this->hasMany(GameHistory::class);
    }

    public function getNewToken(): GameToken
    {
        return $this->gameTokens()->create([
            'token' => Str::random(32),
            'is_active' => true,
            'expires_at' => now()->addDays(7),
        ]);
    }
}
