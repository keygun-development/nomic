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
      <div class="flex justify-between flex-wrap">
        <h1 class="text-4xl font-bold">
            ${modelName}s
        </h1>
        <a href="{{ route('dashboard.$name.new') }}" class="c-button c-button__blue">
            New ${modelName}
        </a>
    </div>
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
