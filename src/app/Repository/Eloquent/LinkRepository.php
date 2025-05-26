<?php

namespace App\Repository\Eloquent;

use App\Models\Link;
use App\Repository\Сontracts\LinkRepositoryInterface;
use Carbon\CarbonInterface;
class LinkRepository implements LinkRepositoryInterface
{
    public function generateNewLink(int $idPlayer,  string $slug, CarbonInterface $expireAt): ?Link
    {
         return Link::create([
             'player_id' => $idPlayer,
             'slug' => $slug,
             'expires_at' => $expireAt
        ]);
    }

    public function getLinkBySlug(string $slug): ?Link
    {
        return Link::where('slug', $slug)->where('is_active', true)->first();
    }

    public function deactivate(int $id): ?Link
    {
        $link = Link::find($id);

        if (!$link) {
            return null;
        }

        $link->update([
            'is_active' => false,
        ]);

        return $link;
    }
}
