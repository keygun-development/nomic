<?php

namespace Keygun\Nomic\Creators;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class ViewCreator
{
    public static function createView(string $modelName, string $modelClass): string
    {
        $tableName = (new $modelClass)->getTable();
        $connectionName = (new $modelClass)->getConnectionName();
        $columns = Schema::getConnection($connectionName)
            ->getSchemaBuilder()
            ->getColumnListing($tableName);
        $data = [
          'columns' => $columns,
          'modelName' => $modelName
        ];

        return view('nomic::creators.list', $data)->render();
    }

    public static function returnModelLoop($columns): string
    {
        return '
        @foreach ($models as $model)
            <tr>
                @foreach ($columns as $column)
                    <td>{{ $model->$column }}</td>
                @endforeach
            </tr>
        @endforeach
        ';
    }
}
