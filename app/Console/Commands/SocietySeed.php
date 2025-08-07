<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SocietySeed extends Command
{
    protected $signature = 'society:seed';

    protected $description = 'Seeds Society Related Tables';

    public function handle()
    {
        Artisan::call('db:seed', [
            '--class' => 'Module\Society\database\seeds\DatabaseSeeder'
        ]);

        $this->info('Society tables seeded successfully!');
    }
}
