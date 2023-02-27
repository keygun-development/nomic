<?php

namespace Keygun\Nomic\Creators;

class ControllerCreator
{
    public static function createController(string $modelName, string $name, string $modelClass, string $className)
    {
        $tableName = (new $modelClass)->getTable();
        $connectionName = (new $modelClass)->getConnectionName();

        return <<<PHP
        <?php

        namespace App\Http\Controllers\Dashboard;

        use App\Http\Controllers\Controller;
        use Illuminate\Support\Facades\Schema;
        use $modelClass;

        class $className extends Controller
        {
            public function index()
            {
                return view('dashboard.$name', [
                    'models' => $modelName::all(),
                    'columns' => Schema::getConnection($connectionName)
                    ->getSchemaBuilder()
                    ->getColumnListing('$tableName')
                ]);
            }

            public function createnew()
            {
                return dump("new");
            }

            public function show()
            {
              return dump('show');
            }
        }
        PHP;
    }
}
