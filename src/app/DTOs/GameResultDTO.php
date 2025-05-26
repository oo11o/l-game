<?php

namespace App\DTOs;

class GameResultDTO
{
    public bool $isWin;
    public float $winAmount;
    public int $random;

    public function __construct(bool $isWin, float $winAmount, int $random)
    {
        $this->isWin = $isWin;
        $this->winAmount = $winAmount;
        $this->randomNumber = $random;
    }
}
