<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\IncidenceController;
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

Route::get('/', [IncidenceController::class, 'index']);


Auth::Routes();

Route::resources([
    'departments' => DepartmentsController::class,
]);
Route::resources([
    'categories' => CategoriesController::class,
]);
Route::resources([
    'incidences' => IncidenceController::class,
]);
Route::resources([
    'comments' => CommentsController::class,
]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
