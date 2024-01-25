<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

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
    return view('site.home');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('tasks', [TaskController::class,'index'])->name('tasks')->middleware('auth');
Route::post('task.store', [TaskController::class ,'store'])->name('task.store')->middleware('auth');
Route::put('task.update/{task}',[TaskController::class , 'update'])->name('task.update')->middleware('auth');
Route::delete('task.destroy/{task}',[TaskController::class,'destroy'])->name('task.destroy')->middleware('auth');

require __DIR__.'/auth.php';
