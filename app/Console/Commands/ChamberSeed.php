<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ChamberSeed extends Command
{
    protected $signature = 'chamber:seed';

    protected $description = 'Seeds Chamber Related Tables';

    public function handle()
    {
        Artisan::call('db:seed', [
            '--class' => 'Module\Chamber\database\seeds\DatabaseSeeder'
        ]);

        $this->info('Chamber tables seeded successfully!');
    }
}
