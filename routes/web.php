<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if(!Auth::check()){
        return view('main');
    }
    return redirect()->route('tasks.index');
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::delete('tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});



require __DIR__.'/auth.php';
