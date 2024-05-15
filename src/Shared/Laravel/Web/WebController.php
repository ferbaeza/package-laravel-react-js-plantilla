<?php

namespace Baezeta\App\Shared\Laravel\Web;

use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function show()
    {
        return view('plantilla::index');
    }
}
