<?php

namespace App\Http\Controllers;

use App\View\Models\CategoryViewModel;
use App\Http\Requests\RouteableRequest;

class CategoryController extends Controller
{
    public function __invoke(RouteableRequest $request): CategoryViewModel
    {
        return new CategoryViewModel($request->getModel());
    }
}
