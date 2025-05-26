<?php

namespace App\Service\Implements;

use App\DTOs\GameResultDTO;
use App\Jobs\DeleteGamesHistoryCache;
use App\Models\Link;
use Illuminate\Support\Facades\Cache;

use App\Repository\Сontracts\GameRepositoryInterface;
use App\Repository\Сontracts\LinkRepositoryInterface;
use App\Service\Contracts\PageAServiceInterface;
use App\Games\RandomGameInterface;
use Illuminate\Support\Collection;

use App\Jobs\UpdateGameHistoryCache;

class PageAService implements PageAServiceInterface
{
    public function __construct(
        private LinkRepositoryInterface $linkRepository,
        private GameRepositoryInterface $gameRepository,
        private RandomGameInterface $randomGame,
    )
    {
    }

    public function deactivateLink(int $idLink): ?Link
    {
        DeleteGamesHistoryCache::dispatch($idLink);

        return $this->linkRepository->deactivate($idLink);
    }

    public function playGame(int $idLink): GameResultDTO
    {
        $result = $this->randomGame->play();
        $this->gameRepository->createGame($idLink, $result);

        UpdateGameHistoryCache::dispatch($idLink);

        return $result;
    }

    public function getHistory(int $idLink, int $limit = null): ?Collection
    {
        $cacheKeyPrefix = config('custom.cache_keys.history_games_prefix');
        $cacheKey = $cacheKeyPrefix . $idLink;

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $limit ??= config('custom.last_count_game');

        $historyGames = $this->gameRepository->getHistoryGame($idLink, $limit);
        UpdateGameHistoryCache::dispatch($idLink, $historyGames);

        return $historyGames;
    }

}
