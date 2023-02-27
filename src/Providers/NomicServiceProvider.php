<?php

namespace Keygun\Nomic\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Keygun\Nomic\Creators\ControllerCreator;
use Keygun\Nomic\Creators\ViewCreator;

class NomicServiceProvider extends ServiceProvider
{
    public function boot()
    {
        publish_nomic_assets();
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'nomic');
        $this->generateControllers(config('app.nomic.tables') ?? Schema::getConnection()->getDoctrineSchemaManager()->listTableNames());
    }

    public function register()
    {
        // Register your package's commands, middleware, and other bindings here
    }

    /**
     * @param array $tables
     * @return void
     */
    public function generateControllers(array $tables): void
    {
        $dashboardPath = app_path("Http/Controllers/Dashboard");
        $viewsPath = resource_path("views/dashboard");

        if (!is_dir($dashboardPath)) {
            mkdir($dashboardPath);
        }
        if (!is_dir($viewsPath)) {
            mkdir($viewsPath, 0755, true);
        }

        foreach ($tables as $table) {
            $name = Str::snake(Str::plural($table));
            $modelName = ucfirst(Str::camel(Str::singular($table)));
            $className = $modelName . 'Controller';
            $modelClass = "App\\Models\\{$modelName}";
            $viewName = Str::plural($name) . ".blade.php";

            $controllerFilePath = $dashboardPath . "/" . $className . ".php";
            if (!file_exists($controllerFilePath)) {
                file_put_contents($controllerFilePath, ControllerCreator::createController($modelName, $name, $modelClass, $className));
            }

            if (!class_exists($modelClass)) {
                Artisan::call('make:model', ['name' => $modelName]);
            }

            $viewFilePath = $viewsPath . "/" . $viewName;
            if (!file_exists($viewFilePath)) {
                file_put_contents($viewFilePath, ViewCreator::createView($modelName, $modelClass, $modelClass::all()));
            }
        }
    }
}
