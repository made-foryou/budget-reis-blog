<?php

use App\Data\RouteData;
use App\Enums\RouteType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\View\Models\LandingPageViewModel;
use App\Http\Controllers\CategoryController;

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

try {
    $contents = Storage::get('caches/route-cache.json');

    $routes = json_decode($contents, true);
} catch (Exception $e) {
    abort(404);
}

$routes = collect($routes)->map(
    fn (array $data) => new RouteData(
        route: $data['route'],
        type: RouteType::fromClass($data['routeable_type']),
        id: $data['routeable_id'],
    )
);

$routes->each(
     function (RouteData $route) {
        return match ($route->type) {
            RouteType::PAGE => throw new \Exception('To be implemented'),
            RouteType::CATEGORY => Route::get(
                uri: $route->route,
                action: CategoryController::class,
            )->name($route->type->value.'.'.$route->id),
            RouteType::POST => Route::get(
                uri: $route->route,
                action: PostController::class,
            )->name($route->type->value.'.'.$route->id),
        };
    }
);


