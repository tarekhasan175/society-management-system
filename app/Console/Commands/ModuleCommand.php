<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:command {name} {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = $this->argument('path');


        if ($path == '') {
            $path = $this->ask('Module Name: ');
        }

        $stub = file_get_contents(base_path('app/Console/stubs/command.stub'));


        $parts = explode('/', $name);

        $className = array_pop($parts);

        $dir = implode('/', $parts);

        if (!is_dir("module/{$path}/Command/$dir")) {

            mkdir("module/{$path}/Command/$dir", 0755, true);

            $stub = str_replace("ModuleName", "$path" . "\Command\\" . $dir, $stub);
        } else {

            $stub = str_replace("ModuleName", "$path" . "\Command", $stub);
        }

        $stub = str_replace('DummyClass', $className, $stub);

        if (!file_exists("module/{$path}/Command/$name" . '.php')) {

            file_put_contents("module/{$path}/Command/$name" . '.php', $stub);
        }

        $this->info('Command created success !');
    }
}
