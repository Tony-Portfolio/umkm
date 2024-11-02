<?php

namespace App\Providers;

use GDGTangier\PubSub\PubSub;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use ReflectionClass;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindAllManagers();
    }

    /**
     * Dynamically bind all managers.
     */
    protected function bindAllManagers()
    {
        $servicesDirectory = app_path('Services');
        $managerNamespace = 'App\Services\\';

        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($servicesDirectory));
        foreach ($files as $file) {
            if ($file->isDir() || $file->getExtension() !== 'php') {
                continue;
            }

            $className = $managerNamespace . str_replace('/', '\\', substr($file->getPathname(), strlen($servicesDirectory) + 1, -4));
            if (class_exists($className)) {
                $reflection = new ReflectionClass($className);
                if ($reflection->isSubclassOf('Illuminate\Support\Manager')) {
                    $this->app->singleton($className, function ($app) use ($className) {
                        return new $className($app);
                    });
                }
            }
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
