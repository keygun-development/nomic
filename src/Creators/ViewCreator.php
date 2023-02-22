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
      <h1 class="text-2xl font-bold">$modelName</h1>
      <div class="overflow-x-auto">
        <table class="mt-4 w-full">
          <thead>
            <tr>
              <th>Id</th>
            </tr>
          </thead>
          <tbody>
            {{-- Todo: Loop through all the ${modelName}s --}}
          </tbody>
        </table>
      </div>
    @endsection
    BLADE;
    }
}
