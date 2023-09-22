<?php

namespace App\Listeners;

use App\Models\Route;
use App\Models\Routeable;
use App\Events\ModelSavedEvent;

class SaveAndUpdateRouteListener
{
    public function handle(ModelSavedEvent $event): void
    {
        if (!$event->model instanceof Routeable) {
            return;
        }

        $route = $event->model->route;

        if ($route === null) {
            $route = new Route([
                'route' => $event->model->getRoute(),
            ]);
            $route->routeable()->associate($event->model);
            $route->save();
        } else {
            $event->model->route->route = $event->model->getRoute();
            $event->model->route->save();
        }
    }
}
