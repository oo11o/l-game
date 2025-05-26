<?php

namespace App\Service\Contracts;

use App\DTOs\GameResultDTO;
use App\Models\Link;
use Illuminate\Support\Collection;

interface PageAServiceInterface
{
    public function deactivateLink(int $idLink): ?Link;
    public function playGame(int $idLink): GameResultDTO;
    public function getHistory(int $idLink, int $limit): ?Collection;
}
