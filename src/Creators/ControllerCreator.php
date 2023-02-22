<?php

namespace Keygun\Nomic\Creators;

class ControllerCreator
{
    public static function createController(string $modelName, string $name, string $modelClass, string $className): string
    {
        return <<<PHP
        <?php

        namespace App\Http\Controllers\Dashboard;

        use App\Http\Controllers\Controller;
        use $modelClass;

        class $className extends Controller
        {
            public function index()
            {
                return view('dashboard.$name', [
                    '$name' => $modelName::all()
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
