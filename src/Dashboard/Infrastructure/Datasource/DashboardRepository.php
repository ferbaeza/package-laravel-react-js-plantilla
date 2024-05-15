<?php

namespace Baezeta\App\Dashboard\Infrastructure\Datasource;

use Baezeta\App\Dashboard\Domain\Interfaces\DashBoardRepositoryInterface;

class DashboardRepository implements DashBoardRepositoryInterface
{
    public function getCollection()
    {
        return ['Admin', 'Usuarios'];
    }

}
