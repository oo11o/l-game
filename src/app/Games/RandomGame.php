<?php

namespace App\Games;

use App\DTOs\GameResultDTO;

class RandomGame implements RandomGameInterface
{
    public function play(): GameResultDTO
    {
        $random = random_int(1, 1000);
        $isWin = $random % 2 === 0;

        if (!$isWin) {
            return new GameResultDTO(false, 0, $random);
        }

        $winAmount = match (true) {
            $random > 900 => $random * 0.7,
            $random > 600 => $random * 0.5,
            $random > 300 => $random * 0.3,
            default => $random * 0.1,
        };

        return new GameResultDTO(true, $winAmount, $random);
    }
}
