<?php

namespace App\Listeners;

use App\Events\SavingModel;
use Illuminate\Support\Str;

class GenerateSlug
{
    /**
     * Handle the event.
     */
    public function handle(SavingModel $event): void
    {
        if (! $event->model->needsASlugGenerated()) {
            return;
        }

        $slug = Str::slug(title: $event->model->getSlugValue());

        // check to see if any other slugs exist that are the same & count them
        $count = $event->model::query()->whereRaw(
            sql: $event->model->getSlugKey() . " LIKE '^{$slug}(-[0-9]+)?$'"
        )->count();

        $event->model->{$event->model->getSlugKey()} = ($count) ? "{$slug}-{$count}" : $slug;
    }
}