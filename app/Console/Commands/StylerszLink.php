<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StylerszLink extends Command
{
    protected $signature = 'STYLERSZ:link';
    protected $description = 'Link the STYLERSZ assets';

    public function handle()
    {
        // Here you can add the logic to link your Bootstrap files
        $source = public_path('STYLERSZ'); // Adjust the path as necessary
        $destination = resource_path('assets/STYLERSZ');

        if (!is_dir($source)) {
            $this->error("Source directory does not exist: $source");
            return 1; // Return error code
        }

        // Create symbolic link
        if (symlink($source, $destination)) {
            $this->info('Successfully linked STYLERSZ assets.');
        } else {
            $this->error('Failed to link STYLERSZ assets.');
        }

        return 0; // Return success code
    }
}
