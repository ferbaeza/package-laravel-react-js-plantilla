<?php

namespace Baezeta\App\Dashboard\Application;

use Baezeta\App\Dashboard\Domain\Interfaces\DashBoardRepositoryInterface;

class DashboardQueryHandler
{
    public function __construct(
        protected DashBoardRepositoryInterface $repository,
    )
        {
    }

    public function run()
    {
        return $this->repository->getCollection();
    }

}
