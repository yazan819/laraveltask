<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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


Route::get('/netflix', [MovieController::class, 'index'])->name('netflix.index');
Route::get('/netflix/create', [MovieController::class, 'create'])->name('netflix.create');
Route::post('/netflix', [MovieController::class, 'store'])->name('netflix.store');
Route::get('/netflix/{movie}/edit', [MovieController::class, 'edit'])->name('netflix.edit');
Route::put('/netflix/{movie}/update', [MovieController::class, 'update'])->name('netflix.update');
Route::delete('/netflix/{movie}/destroy', [MovieController::class, 'destroy'])->name('netflix.destroy');
