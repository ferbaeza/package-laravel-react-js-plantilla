<?php

namespace Baezeta\App\Dashboard\Infrastructure\Web;

use App\Http\Controllers\Controller;
use Baezeta\App\Shared\Utils\ApiResponse;
use Baezeta\App\Dashboard\Application\DashboardQueryHandler;

class DashboardController extends Controller
{
    public function __construct(
        protected DashboardQueryHandler $handler,
    )
        {
    }
    public function index()
    {
        $data = $this->handler->run();
        return ApiResponse::json('Dashboard', $data);
    }

}
