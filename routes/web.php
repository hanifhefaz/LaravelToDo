<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {

    Route::resource('tasks', TaskController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('filters', [TaskController::class, 'filters'])->name('filters');
    Route::post('filter_tasks', [TaskController::class, 'filterTasks'])->name('filter_tasks');
});
