<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle') - Nomic Dashboard</title>
    <link rel="stylesheet" href="{{ asset('vendor/keygun/nomic/styles.css') }}">
</head>
<body>
<div class="relative max-h-screen min-h-screen md:overflow-hidden">
    <div id="header">
        @include('nomic::partials.authNavigation')
    </div>
    <div class="site-content flex flex-col md:flex-row" id="app">
        <div id="sidebar" class="md:w-2/12 w-full">
            @include('nomic::components.sidebar')
        </div>
        <div id="content" class="md:w-10/12 w-full">
            <div class="p-4 w-full mx-auto h-full">
                <div class="rounded-xl max-h-[87vh] overflow-y-scroll bg-white shadow-md">
                    <div class="p-4">
                        @yield('content')
                    </div>
                    @include('nomic::components.reference')
                </div>
            </div>
        </div>
    </div>
</div>
</body>
