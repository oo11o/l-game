<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Service\Contracts\RegistrationServiceInterface;
use App\Service\Implements\PageAService;
use Illuminate\Http\Request;

class PageAController extends Controller
{
    public function __construct(
        private PageAService $pageAService,
        private RegistrationServiceInterface $registrationService
    )
    {
    }

    public function show(Link $link)
    {
        abort_if($link->isExpired() || $link->isDeactivated(), 404);

        return view('pagea.index', compact('link'));
    }

    public function generate(Link $link)
    {
        abort_if($link->isExpired() || $link->isDeactivated(), 404);

        try {
            $slug = $this->registrationService
                ->generatePageLink($link->player->username, $link->player->phonenumber);
        } catch (\Exception $e) {
            abort(500);
        }

        return view('pagea.index', compact('link', 'slug'));
    }

    public function deactivate(Link $link)
    {
        abort_if($link->isExpired(), 404);
        try {
            $this->pageAService->deactivateLink($link->id);
        } catch (\Exception $e) {
            abort(500);
        }
        return view('pagea.deactivate', compact('link'));
    }

    public function imfeelinglucky(Link $link)
    {
        abort_if($link->isExpired() || $link->isDeactivated(), 404);
        try {
            $gameResult = $this->pageAService->playGame($link->id);
        } catch (\Exception $e) {
            abort(500);
        }

        return view('pagea.index', compact('link', 'gameResult'));

    }

    public function history(Link $link)
    {
        abort_if($link->isExpired() || $link->isDeactivated(), 404);
        try {
            $gameResults = $this->pageAService->getHistory($link->id);
        } catch (\Exception $e) {
            abort(500);
        }

        return view('pagea.index', compact('link', 'gameResults'));
    }
}
