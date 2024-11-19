<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

/* Route::get('/', function () {
    return view('welcome');
});
 */

 //Cuando se utilizan controladores de acción unica, esta irá sin corchetes
Route::get('/', HomeController::class);


Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/create',[PostController::class, 'create']);

Route::get('/posts/{post}', [PostController::class, 'show']);


/* Route::get('/posts/{post}/{category}', function ($post, $category) {
    return "aquí se mostrará el post {$post} dela categoría {$category}";
}); */

/* Route::get('/posts/post-2', function () {
    return "aquí se mostrará el post 2";
});
 */