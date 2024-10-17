<?php

namespace InterRepoServ\InreSer;

use Illuminate\Support\ServiceProvider;

class InterRepoServProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // Register the commands
        $this->commands([
            \InterRepoServ\InreSer\Console\Commands\MakeInterfaceCommand::class,
            \InterRepoServ\InreSer\Console\Commands\MakeRepositoryCommand::class,
            \InterRepoServ\InreSer\Console\Commands\MakeServiceCommand::class,
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
}
