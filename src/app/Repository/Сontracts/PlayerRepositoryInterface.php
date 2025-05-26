<?php

namespace App\Repository\Сontracts;

use App\Models\Player;

interface PlayerRepositoryInterface
{
    public function findOrCreatePlayer(string $username, int $phonenumber): Player;

}
