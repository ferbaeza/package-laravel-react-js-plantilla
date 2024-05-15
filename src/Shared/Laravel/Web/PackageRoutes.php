<?php

namespace Baezeta\App\Shared\Laravel\Web;

use Illuminate\Support\Facades\Route;
use Baezeta\App\Shared\Laravel\Web\WebController;
use Baezeta\App\Dashboard\Infrastructure\Web\DashboardRoutes;

abstract class PackageRoutes 
{
    public static string $prefix = 'admin';
}


Route::prefix(PackageRoutes::$prefix)
    ->group(function () {
        Route::get('/', [WebController::class, 'show']);
        DashboardRoutes::configure();
});

