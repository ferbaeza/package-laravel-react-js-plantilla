<?php

namespace Baezeta\App\Dashboard\Infrastructure\Web;

use Illuminate\Support\Facades\Route;

class DashboardRoutes 
{
    public static string $prefix = 'api/dashboard';

    public static function configure(): void
    {
        Route::prefix(self::$prefix)
            ->group(function () {
                Route::get('', [DashboardController::class, 'index']);
            });
    }
}
