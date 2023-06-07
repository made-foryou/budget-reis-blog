<?php

declare(strict_types=1);

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboards\Main as Dashboard;

/**
 * # Dashboard
 * ---
 */
class Main extends Dashboard
{
    /**
     * Get the displayable name of the dashboard.
     */
    public function name(): string
    {
        return 'Dashboard';
    }

    /**
     * Get the cards for the dashboard.
     */
    public function cards(): array
    {
        return parent::cards();
    }
}
