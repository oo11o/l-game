<?php

namespace App\Providers;



use App\Http\Middleware\CheckLinkNotExpired;
use App\Repository\Eloquent\GameRepository;
use App\Repository\Eloquent\LinkRepository;
use App\Repository\Eloquent\PlayerRepository;
use App\Repository\Сontracts\GameRepositoryInterface;
use App\Repository\Сontracts\LinkRepositoryInterface;
use App\Repository\Сontracts\PlayerRepositoryInterface;

use App\Games\RandomGameInterface;
use App\Games\RandomGame;

use App\Service\Contracts\PageAServiceInterface;
use App\Service\Contracts\RegistrationServiceInterface;
use App\Service\Implements\PageAService;
use App\Service\Implements\RegistrationService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RegistrationServiceInterface::class, RegistrationService::class);
        $this->app->bind(PlayerRepositoryInterface::class, PlayerRepository::class);
        $this->app->bind(LinkRepositoryInterface::class, LinkRepository::class);
        $this->app->bind(PageAServiceInterface::class, PageAService::class);
        $this->app->bind(GameRepositoryInterface::class, GameRepository::class);



        $this->app->bind(RandomGameInterface::class, RandomGame::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::aliasMiddleware('check.link.expired', CheckLinkNotExpired::class);
    }
}
