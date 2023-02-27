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
    Route::resource('nomic/' . $name, "App\\Http\\Controllers\\Dashboard\\{$className}")
        ->names([
            'index' => "nomic.{$name}.index",
            'create' => "nomic.{$name}.create",
            'store' => "nomic.{$name}.store",
            'show' => "nomic.{$name}.show",
            'edit' => "nomic.{$name}.edit",
            'update' => "nomic.{$name}.update",
            'destroy' => "nomic.{$name}.destroy",
        ]);
    Route::get("nomic/${name}/new", ["App\\Http\\Controllers\\Dashboard\\{$className}", 'createnew'])->name("nomic.${name}.createnew");
}

Route::get('/nomic', [DashboardController::class, 'index'])->name('nomic.index');
