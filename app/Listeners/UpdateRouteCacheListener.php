<?php

namespace App\Listeners;

use App\Models\Routeable;
use App\Events\ModelSavedEvent;
use App\Jobs\WriteRoutesCacheToFileJob;

class UpdateRouteCacheListener
{
    public function handle(ModelSavedEvent $event): void
    {
        if (!$event->model instanceof Routeable) {
            return;
        }

        WriteRoutesCacheToFileJob::dispatch();
    }
}
