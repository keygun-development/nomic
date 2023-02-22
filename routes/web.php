<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Keygun\Nomic\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    $tables = config('app.nomic.tables') ?? Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
foreach ($tables as $table) {
    $name = Str::snake(Str::plural($table));
    $className = ucfirst(Str::camel(Str::singular($table))) . 'Controller';
    Route::resource('dashboard/'.$name, "App\\Http\\Controllers\\Dashboard\\{$className}")
        ->names([
            'index' => "dashboard.{$name}.index",
            'create' => "dashboard.{$name}.create",
            'store' => "dashboard.{$name}.store",
            'show' => "dashboard.{$name}.show",
            'edit' => "dashboard.{$name}.edit",
            'update' => "dashboard.{$name}.update",
            'destroy' => "dashboard.{$name}.destroy",
            'new' => "dashboard.{$name}.new",
        ])->except(['new']);
}

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
