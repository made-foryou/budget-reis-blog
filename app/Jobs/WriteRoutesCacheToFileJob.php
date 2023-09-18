<?php

namespace App\Jobs;

use App\Models\Route;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class WriteRoutesCacheToFileJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function handle(): void
    {
        $routes = Route::query()
            ->forCache()
            ->select(['routeable_type', 'routeable_id', 'route'])
            ->get();

        Storage::put('caches/route-cache.json', $routes->toJson());
    }
}
