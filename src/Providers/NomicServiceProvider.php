<?php

namespace Keygun\Nomic\Providers;

use Doctrine\DBAL\Exception;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class NomicServiceProvider extends ServiceProvider
{
    /**
     * @throws Exception
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'nomic');
        $this->createsControllers(Schema::getConnection()->getDoctrineSchemaManager()->listTableNames());
    }

    public function register()
    {
        // Register your package's commands, middleware, and other bindings here
    }

    /**
     * @param array $tables
     * @return void
     */
    public function createsControllers(array $tables): void
    {
        foreach ($tables as $table) {
            $name = Str::snake(Str::plural($table));
            $className = ucfirst(Str::camel(Str::singular($table))) . 'Controller';
            $controller = <<<PHP
<?php

namespace App\Http\Controllers;

class $className extends Controller
{
  public function index()
  {
  return view('$name.index');
  }
}
PHP;

            file_put_contents(app_path("Http/Controllers/{$className}.php"), $controller);
            Route::resource($name, "App\\Http\\Controllers\\{$className}");
        }
    }
}
