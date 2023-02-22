<?php

namespace Keygun\Nomic\Creators;

class ViewCreator
{
    public static function createView(string $modelName, string $name): string
    {
        return <<<BLADE
        @extends('nomic::layouts.dashboard')
        @section('pageTitle', "${modelName}s")
        @section('content')
          <h1>$modelName</h1>
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <!-- add more columns as needed -->
              </tr>
            </thead>
            <tbody>
            @foreach ($$name as $$modelName)
              <tr>
                <!-- add more columns as needed -->
              </tr>
            @endforeach
            </tbody>
          </table>
        @endsection
        BLADE;
    }
}
