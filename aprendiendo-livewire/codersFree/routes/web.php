<?php

use App\Livewire\Formulario;
use App\Livewire\Post\CreatePost;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/dashboard', CreatePost::class)
    // ->name('dashboard');

   /*  Route::get('/dashboard', Formulario::class)
    ->name('dashboard'); */

    Route::view('/prueba', 'prueba')->name('prueba');
});
