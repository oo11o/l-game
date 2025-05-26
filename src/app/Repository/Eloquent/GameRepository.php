<?php

namespace App\Repository\Eloquent;

use App\DTOs\GameResultDTO;
use App\Models\Game;
use App\Repository\Сontracts\GameRepositoryInterface;
use Illuminate\Support\Collection;

class GameRepository implements GameRepositoryInterface
{
    public function createGame(int $idLink, GameResultDTO $gameResultDTO): Game
    {
         return Game::create([
             'link_id' => $idLink,
             'random_number' => $gameResultDTO->randomNumber,
             'is_win' => $gameResultDTO->isWin,
             'win_amount' => $gameResultDTO->winAmount,
        ]);
    }


    /**
     * @return \Illuminate\Support\Collection<int, GameResultDTO>
     */
    public function getHistoryGame(int $idLink, int $limit): ?Collection
    {
        return Game::where('link_id', $idLink)
            ->orderByDesc('id')
            ->limit($limit)
            ->get()
            ->map(fn(Game $game) => new GameResultDTO(
                isWin: $game->is_win,
                winAmount: $game->win_amount,
                random: $game->random_number,
            ));
    }
}
