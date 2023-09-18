<?php

namespace App\Http\Controllers;

use Request;

class CategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        return 'category!';
    }
}
