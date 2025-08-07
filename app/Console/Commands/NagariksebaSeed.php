<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class NagariksebaSeed extends Command
{
    protected $signature = 'nagarik:seed';

    protected $description = 'Seeds Nagarikseba Related Tables';

    public function handle()
    {
        Artisan::call('db:seed', [
            '--class' => 'Module\Nagarik\database\seeds\DatabaseSeeder'
        ]);

        $this->info('Nagarikseba tables seeded successfully!');
    }
}
