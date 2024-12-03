<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

// Redireccionamos de la / al dashboard, evitando el welcome al acceder la localhost
Route::redirect('/', '/dashboard');



Route::get('dashboard',[DashboardController::class,'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('dashboard.nuevo','dashboard.nuevo')
    ->middleware(['auth', 'verified'])
    ->name('dashboard.nuevo');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';