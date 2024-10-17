<?php


namespace InterRepoServ\InreSer\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $serviceName = $this->argument('name');
        $servicePath = app_path("Services/{$serviceName}.php");

        // Check if the Services directory exists; if not, create it
        if (!File::exists(app_path('Services'))) {
            File::makeDirectory(app_path('Services'), 0755, true);
        }

        // Check if the service file already exists
        if (File::exists($servicePath)) {
            $this->error("Service {$serviceName} already exists!");
            return;
        }

        // Service file content
        $content = "<?php

namespace App\\Services;

class {$serviceName}
{
    //
}";

        // Write content to the file
        File::put($servicePath, $content);

        $this->info("Service {$serviceName} created successfully at {$servicePath}");
    }
}
