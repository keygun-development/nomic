@extends('nomic::layouts.dashboard')
@section('pageTitle', $modelName."s")
@section('content')
    <div class="flex justify-between flex-wrap">
        <h1 class="text-4xl font-bold">
            {{ $modelName }}s
        </h1>
        <a class="c-button c-button__blue">
            New
        </a>
    </div>
    <div class="mt-4 overflow-x-auto">
        <table class="w-full">
            <thead>
            <tr>
                @foreach($columns as $column)
                    <th>{{ $column }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            {!! \Keygun\Nomic\Creators\ViewCreator::returnModelLoop($columns) !!}
            </tbody>
        </table>
    </div>
@endsection
