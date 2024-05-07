<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\PracticeController;
Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);

Route::get('/getPractice', [PracticeController::class, 'getPractice']);

use App\Http\Controllers\MovieController;
Route::get('/movies', [MovieController::class, 'movie'])->name('movie');
Route::get('/admin/movies', [MovieController::class, 'movies'])->name('admin.movies');
Route::get('/admin/movies/create', [MovieController::class, 'create'])->name('admin.create');
Route::post('/admin/movies/store', [MovieController::class, 'store'])->name('admin.store');
Route::get('/admin/movies/{id}/edit', [MovieController::class, 'edit'])->name('admin.edit');
Route::patch('/admin/movies/{id}/update', [MovieController::class, 'update'])->name('admin.update');
Route::delete('/admin/movies/{id}/destroy', [MovieController::class, 'destroy'])->name('admin.destroy');