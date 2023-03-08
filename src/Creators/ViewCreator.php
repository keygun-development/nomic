<?php

namespace Keygun\Nomic\Creators;

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
        return '@foreach ($models as $model)
                <tr class="border-b whitespace-nowrap">
                    @foreach ($columns as $column)
                        <td class="text-left p-4">{{ $model->$column }}</td>
                    @endforeach
                </tr>
            @endforeach';
    }

    public static function layout($modelName): string
    {
        return "@extends('nomic::layouts.dashboard')
@section('pageTitle', '$modelName')";
    }

    public static function contentSection(): string
    {
        return "@section('content')";
    }

    public static function endSection(): string
    {
        return '@endsection';
    }

    public static function returnColumnLoop($columns): string
    {
        return '<tr>
                @foreach($columns as $column)
                    <th class="text-left px-4">{{ ucfirst($column) }}</th>
                @endforeach
            </tr>';
    }
}
