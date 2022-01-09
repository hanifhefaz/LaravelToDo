<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('tasks', TaskController::class);
Route::resource('categories', CategoryController::class);
Route::get('filters', [TaskController::class, 'filters'])->name('filters');
Route::post('filter_tasks', [TaskController::class, 'filterTasks'])->name('filter_tasks');

require __DIR__.'/auth.php';
