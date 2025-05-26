<?php

namespace App\Repository\Eloquent;
use App\Models\Player;
use App\Repository\Сontracts\PlayerRepositoryInterface;


class PlayerRepository implements PlayerRepositoryInterface
{
    public function findOrCreatePlayer(string $username, int $phonenumber): Player
    {
        $player = Player::where('username', $username)->where('phonenumber', $phonenumber)->first();

        if (!$player) {
            $player = Player::create([
                'username' => $username,
                'phonenumber' => $phonenumber
            ]);
        }

        return $player;
    }
}
