<?php

namespace App\Http\Controllers;

use App\View\Models\PostViewModel;
use App\Http\Requests\RouteableRequest;

class PostController extends Controller
{
    public function __invoke(RouteableRequest $request): PostViewModel
    {
        return new PostViewModel($request->getModel());
    }
}
