<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DepartmentsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::Routes();

Route::resources([
    'departments' => DepartmentsController::class,
]);
Route::resources([
    'categories' => CategoriesController::class,
]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
