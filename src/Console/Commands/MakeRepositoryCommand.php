<?php

namespace InterRepoServ\InreSer\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name} {--interface=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository. Optionally, implement an existing interface';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $repositoryName = $this->argument('name');
        $interfaceName = $this->option('interface');
        $repositoryPath = app_path("Repositories/{$repositoryName}.php");

        // Check if the Repositories directory exists; if not, create it
        if (!File::exists(app_path('Repositories'))) {
            File::makeDirectory(app_path('Repositories'), 0755, true);
        }

        // Check if the repository file already exists
        if (File::exists($repositoryPath)) {
            $this->error("Repository {$repositoryName} already exists!");
            return;
        }

        // Generate repository content based on whether the interface is provided
        $content = "<?php\n\nnamespace App\\Repositories;\n\n";

        if ($interfaceName) {
            $interfacePath = app_path("Interfaces/{$interfaceName}.php");

            // Check if the interface exists
            if (!File::exists($interfacePath)) {
                $this->error("Interface {$interfaceName} does not exist!");
                return;
            }

            $content .= "use App\\Interfaces\\{$interfaceName};\n\n";
            $content .= "class {$repositoryName} implements {$interfaceName}\n{\n    // Implement methods from {$interfaceName}\n";
        } else {
            $content .= "class {$repositoryName}\n{\n    // Define repository methods here\n";
        }


        $content .= "}\n";

        // Write content to the file
        File::put($repositoryPath, $content);

        $this->info("Repository {$repositoryName} created successfully at {$repositoryPath}");
    }
}
