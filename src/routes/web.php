<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PageAController;


Route::match(['get', 'post'], '/', [RegistrationController::class, 'index'])->name('registration');

Route::prefix('pagea/{link}')
    ->middleware('check.link.expired')
    ->group(function () {
        Route::get('/', [PageAController::class, 'show'])->name('pagea.show');

        Route::post('/generate', [PageAController::class, 'generate'])->name('link.generate');
        Route::patch('/deactivate', [PageAController::class, 'deactivate'])->name('link.deactivate');
        Route::post('/imfeelinglucky', [PageAController::class, 'imfeelinglucky'])->name('pagea.imfeelinglucky');
        Route::get('/imfeelinglucky', function (App\Models\Link $link) {
            return redirect()->route('pagea.show', ['link' => $link]);
        });

        Route::get('/history', [PageAController::class, 'history'])->name('pagea.history');
    });
