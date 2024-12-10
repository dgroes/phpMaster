<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Rutas de manera individual 
/* Route::get('/tasks', function(){
    return view('Tasks/index');
})->middleware(['auth', 'verified'])->name('myTasks');
 */

//Rutas RRESTful con resource, es decir (index, create, store, show, edit, update, destroy)
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
