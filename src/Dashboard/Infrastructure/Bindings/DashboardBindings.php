<?php

namespace Baezeta\App\Dashboard\Infrastructure\Bindings;

use Baezeta\App\Dashboard\Infrastructure\Datasource\DashboardRepository;
use Baezeta\App\Dashboard\Domain\Interfaces\DashBoardRepositoryInterface;



class DashboardBindings
{
    public static function register(): array
    {
        return [
            DashBoardRepositoryInterface::class => DashboardRepository::class,
        ];
    }
}
