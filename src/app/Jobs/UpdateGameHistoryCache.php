<?php

namespace App\Jobs;

use App\Repository\Сontracts\GameRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;


class UpdateGameHistoryCache implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
            public int $idLink,
            public ?Collection $data = null,
    )
    {

    }

    /**
     * Execute the job.
     */
    public function handle(GameRepositoryInterface $gameRepository): void
    {
        $cacheKeyPrefix = config('custom.cache_keys.history_games_prefix');
        $cacheKey = $cacheKeyPrefix . $this->idLink;

        $data = $this->data?->isNotEmpty()
            ? $this->data
            : $gameRepository->getHistoryGame($this->idLink, config('custom.last_count_game'));

        Cache::put($cacheKey, $data, now()->addMinutes(10));
    }
}
