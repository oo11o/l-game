<?php

namespace App\Repository\Сontracts;

use App\Models\Link;
use Carbon\CarbonInterface;


interface LinkRepositoryInterface
{
    public function generateNewLink(int $idPlayer, string $slug, CarbonInterface $expireAt): ?Link;
    public function getLinkBySlug(string $slug): ?Link;
    public function deactivate(int $id): ?Link;
}
