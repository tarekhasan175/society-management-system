<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ModuleService extends Command
{
    protected $signature = 'module:service {name} {module}';

    protected $description = 'Create a custom service in a specified location';

    public function handle()
    {
        $name = $this->argument('name');
        $module = $this->argument('module');
        $filePath = 'module/'.$module.'/Services/' . $name . '.php';

        if (File::exists($filePath)) {
            $this->error('Service already exists!');
            return;
        }

        File::put($filePath, $this->serviceStub());

        $this->info('Service created successfully!');
    }

    protected function serviceStub()
    {
        $module = '\\'.$this->argument('module').'\\';
        // You can modify this stub as needed
        return "<?php \n".

"namespace Module".$module."Services; \n".

"class ".$this->argument('name')."
{

}";
    }
}
