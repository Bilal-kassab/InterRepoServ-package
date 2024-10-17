<?php


namespace InterRepoServ\InreSer\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeInterfaceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:interface {name}';


    /**
     * The console command description.
     *
     * @var string
     */
     protected $description = 'Create a new interface';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Interfaces/{$name}.php");

        // تحقق مما إذا كان المجلد موجودًا، إذا لم يكن موجودًا، قم بإنشائه
        if (!File::exists(app_path('Interfaces'))) {
            File::makeDirectory(app_path('Interfaces'));
        }

        if (File::exists($path)) {
            $this->error("Interface {$name} already exists!");
            return;
        }

        $content = "<?php

namespace App\\Interfaces;

interface {$name}
{
    //
}";

        File::put($path, $content);

        $this->info("Interface {$name} created successfully at {$path}");
    }
}
