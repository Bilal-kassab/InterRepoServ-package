<?php

namespace InterRepoServ\InreSer\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class MakeTraitCommand extends Command
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Traits/{$name}.php");

        // Check if the Traits directory exists; if not, create it
        if (!File::exists(app_path('Traits'))) {
            File::makeDirectory(app_path('Traits'), 0755, true);
        }

        // Check if the Trait file already exists
        if (File::exists($path)) {
            $this->error("Trait {$name} already exists!");
            return;
        }

        // Trait file content with the toArray and fromArray methods
        $content = "<?php

 namespace App\Traits;

trait {$name}
{

}";

        // Write content to the file
        File::put($path, $content);

        $this->info("Trait {$name} created successfully at {$path}");
    }
}
