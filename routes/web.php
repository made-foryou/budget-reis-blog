<?php

use App\View\Models\MenuViewModel;
use Illuminate\Support\Facades\Route;
use App\View\Models\LandingPageViewModel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return new LandingPageViewModel();
});
