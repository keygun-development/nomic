<?php

namespace Keygun\Nomic\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class NomicServiceProvider extends ServiceProvider
{
    public function boot()
    {
        publish_nomic_assets();
        $this->generateControllers(config('app.nomic.tables') ?? Schema::getConnection()->getDoctrineSchemaManager()->listTableNames());
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'nomic');
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
        if (!is_dir($dashboardPath)) {
            mkdir($dashboardPath);
        }
        foreach ($tables as $table) {
            $name = Str::snake(Str::plural($table));
            $className = ucfirst(Str::camel(Str::singular($table))) . 'Controller';

            if (!file_exists($dashboardPath . "/" . $className . ".php")) {
                $controller = <<<PHP
<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class $className extends Controller
{
  public function index()
  {
      return view('dashboard.$name');
  }
}
PHP;

                file_put_contents(app_path("Http/Controllers/Dashboard/{$className}.php"), $controller);
            }
        }
    }
}
