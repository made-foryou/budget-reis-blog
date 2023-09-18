<?php

namespace App\Listeners;

use App\Models\Routeable;
use App\Events\SavingModel;
use App\Jobs\WriteRoutesCacheToFileJob;

class UpdateRouteCacheListener
{
    public function handle(SavingModel $event): void
    {
        if (!$event->model instanceof Routeable) {
            return;
        }

        WriteRoutesCacheToFileJob::dispatch();
    }
}
