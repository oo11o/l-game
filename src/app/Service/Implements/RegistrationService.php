<?php

namespace App\Service\Implements;
use App\Repository\Сontracts\LinkRepositoryInterface;
use App\Repository\Сontracts\PlayerRepositoryInterface;
use App\Service\Contracts\RegistrationServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Str;

class RegistrationService implements RegistrationServiceInterface
{

    public function __construct(
        private PlayerRepositoryInterface $playerRepository,
        private LinkRepositoryInterface $linkRepository
    )
    {
    }

    public function generatePageLink(string $username, int $phonenumber, ?int $expiredDay = null): string
    {
        $expiredDay ??= config('custom.link_max_days');
        $expiresAt = Carbon::now()->addDays((int) $expiredDay);

        $slug = Str::uuid()->toString();

        $player = $this->playerRepository->findOrCreatePlayer($username, $phonenumber);
        $link = $this->linkRepository->generateNewLink($player->id, $slug, $expiresAt);
        if (!$link) {
            throw new \RuntimeException('Failed to generate link');
        }

        return $link->slug;
    }
}
