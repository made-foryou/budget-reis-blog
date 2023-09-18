<?php

namespace App\Http\Controllers;

use Request;

class PostController extends Controller
{
    public function __invoke(Request $request)
    {
        return 'post!!';
    }
}
