<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service with Manager and Contract files';

    public function handle()
    {
        $name = $this->argument('name');
        $basePath = app_path("Services/{$name}");

        // Create the service directory
        if (!File::exists($basePath)) {
            File::makeDirectory($basePath, 0755, true);
            $this->info("Directory {$basePath} created.");
        }

        // Create the Contract file
        $this->createFile($basePath, "Contract.php", $this->getContractStub($name));

        // Create the Service file
        $this->createFile($basePath, "{$name}Service.php", $this->getServiceStub($name));

        // Create the Manager file
        $this->createFile($basePath, "{$name}Manager.php", $this->getManagerStub($name));

        $this->info("Service {$name} created successfully.");
    }

    protected function createFile($path, $filename, $content)
    {
        File::put("{$path}/{$filename}", $content);
        $this->info("File {$filename} created.");
    }

    protected function getContractStub($name)
    {
        return "<?php

namespace App\Services\\{$name};

interface Contract
{
    // Define your contract methods here
}";
    }

    protected function getServiceStub($name)
    {
        return "<?php

namespace App\Services\\{$name};

class {$name}Service implements Contract
{
    // your function here
}";
    }

    protected function getManagerStub($name)
    {
        return "<?php

namespace App\Services\\{$name};

use Illuminate\Support\Manager;

class {$name}Manager extends Manager
{
    public function getDefaultDriver()
    {
        return '{$name}';
    }

    public function create{$name}Driver(): Contract
    {
        return new {$name}Service();
    }
}";
    }
}
