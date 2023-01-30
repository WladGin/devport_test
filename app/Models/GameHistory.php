<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isWin(): Attribute
    {
        return Attribute::get(fn (): bool => $this->total % 2 === 0);
    }

    public function winSum(): Attribute
    {
        return Attribute::get(fn (): float => match (true) {
            !$this->is_win => 0,
            $this->total > 900 => $this->total * 0.7,
            $this->total > 600 => $this->total * 0.5,
            $this->total > 300 => $this->total * 0.3,
            $this->total <= 300 => $this->total * 0.1,
        });
    }
}
