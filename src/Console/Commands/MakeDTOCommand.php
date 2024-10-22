<?php

namespace InterRepoServ\InreSer\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeDTOCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:dto {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new DTO class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("DTOs/{$name}.php");

        // Check if the DTOs directory exists; if not, create it
        if (!File::exists(app_path('DTOs'))) {
            File::makeDirectory(app_path('DTOs'), 0755, true);
        }

        // Check if the DTO file already exists
        if (File::exists($path)) {
            $this->error("DTO {$name} already exists!");
            return;
        }

        // DTO file content with the toArray and fromArray methods
        $content = "<?php

namespace App\\DTOs;

class {$name}
{
    /**
     * Convert the DTO to an array.
     */
    public function toArray(): array
    {
        return [
            // Define your fields here
        ];
    }

    /**
     * Create a DTO instance from an array.
     */
    public static function fromArray(array \$data): self
    {
        return new self(
            // Initialize fields from the array here
        );
    }
}";

        // Write content to the file
        File::put($path, $content);

        $this->info("DTO {$name} created successfully at {$path}");
    }
}
