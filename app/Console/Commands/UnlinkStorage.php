<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File; // Add this import

class UnlinkStorage extends Command
{
    protected $signature = 'storage:unlink';
    protected $description = 'Unlink the storage directory';

    public function handle()
    {
        $linkPath = public_path('storage');

        if (File::exists($linkPath)) {
            File::delete($linkPath);
            $this->info('Successfully unlinked the storage directory.');
        } else {
            $this->error('Storage link does not exist.');
        }

        return 0;
    }
}
