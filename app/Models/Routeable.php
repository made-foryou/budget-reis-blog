<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property-read Route|null $route
 */
interface Routeable
{
    /**
     * Generates the route for the model.
     *
     * @return string
     */
    public function getRoute(): string;

    /**
     * Returns the connected route for the model.
     *
     * @return MorphOne
     */
    public function route(): MorphOne;
}
