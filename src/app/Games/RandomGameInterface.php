<?php

namespace App\Games;

use App\DTOs\GameResultDTO;

interface RandomGameInterface
{
    public function play(): GameResultDTO;
}
