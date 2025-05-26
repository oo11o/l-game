<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    protected $fillable = [
        'player_id',
        'slug',
        'is_active',
        'expires_at',
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function game(): BelongsTo
    {
        return $this->hasMany(Link::class);
    }

    public function isExpired(): bool
    {
        return now()->greaterThan($this->expires_at);
    }

    public function isDeactivated(): bool
    {
        return !$this->is_active;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
