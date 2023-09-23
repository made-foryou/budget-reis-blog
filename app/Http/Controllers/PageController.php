<?php

namespace App\Http\Controllers;

use App\View\Models\PageViewModel;
use App\Http\Requests\RouteableRequest;

class PageController extends Controller
{
    public function __invoke(RouteableRequest $request)
    {
        return new PageViewModel($request->getModel());
    }
}
