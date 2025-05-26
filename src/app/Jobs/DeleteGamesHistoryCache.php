<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;

class DeleteGamesHistoryCache implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $idLink,
    )
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $cacheKeyPrefix = config('custom.cache_keys.history_games_prefix');
        $cacheKey = $cacheKeyPrefix . $this->idLink;

        Cache::delete($cacheKey);
    }
}
