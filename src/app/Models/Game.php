<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    protected $fillable = [
        'link_id',
        'random_number',
        'is_win',
        'win_amount'];


    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
}
