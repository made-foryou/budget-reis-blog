<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\WriteRoutesCacheToFileJob;

class SaveAndCreateRoutesCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cache-routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Saves and creates the routes cache file.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        WriteRoutesCacheToFileJob::dispatch();

        $this->info('The cache file has been updated with the latest data.');
    }
}
