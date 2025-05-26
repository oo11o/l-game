<?php

namespace App\Repository\Сontracts;

use App\DTOs\GameResultDTO;
use App\Models\Game;
use App\Models\Link;
use Carbon\CarbonInterface;
use Illuminate\Support\Collection;


interface GameRepositoryInterface
{
    public function createGame(int $idLink, GameResultDTO $gameResultDTO): Game;
    public function getHistoryGame(int $idLink, int $limit): ?Collection;
}
