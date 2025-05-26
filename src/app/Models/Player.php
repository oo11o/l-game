<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'username',
        'phonenumber',
    ];
    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }
}
