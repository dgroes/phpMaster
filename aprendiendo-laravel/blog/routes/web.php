<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;

/* Route::get('/', function () {
    return view('welcome');
});
 */

//Cuando se utilizan controladores de acción unica, esta irá sin corchetes
Route::get('/', HomeController::class);

/* Route::resource('articulos', PostController::class)
    ->parameters(['articulos' => 'post'])
    ->names('posts'); */


Route::resource('posts', PostController::class);

//     ->except(['create', 'edit']);

// Route::apiResource('posts', PostController::class);


/* Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::post('posts/', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])
    ->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->name('posts.destroy'); */





Route::get('prueba', function () {


    //Prueba de Casteo
    $post = Post::find(1);
    dd($post->is_active);

    // CREACÍON DE UN REGISTRO post
    /*  $post = new Post;
    $post->title = 'TiTulo dE pRueba N-06';
    $post->content = 'COntenido DE pureba N-06';
    $post->category = 'CATegorÍa de pureba N-06';

    $post->save();

    return $post; */

    // VISUZALIZAR UN REGISTRO post
    /*  $post = Post::find(1);
    return $post->published_at->format('d-m-Y'); */

    /*  $post = Post::where('title', 'Titulo de prueba N-02')
        ->first();
 */
    // ACTUALIZAR UN REGISTRO post
    /* $post->category = "Curso de Laravel";
    $post->save();
    return $post; */


    // VISUALIZAR MÁS DE UN REGISTRO
    /*  $posts = Post::all();
    return $posts; */

    /* $posts = Post::where('id', '>=', '3')
        ->get();
    return $posts; */
    /*  $posts = Post::orderBy('id', 'desc')
        ->get();
    return $posts; */


    // VISUALIAR ALGUNOS CAMPOS
    /*   $posts = Post::orderBy('id', 'desc')
        ->select('id', 'title', 'created_at')
        ->take(2) 
        ->get();
    return $posts; */


    //ELIMINAR REGISTRO
    /*  $post = Post::find(1);
    $post->delete();

    return "Registro eliminado 😙"; */
});


/* Route::get('/posts/{post}/{category}', function ($post, $category) {
    return "aquí se mostrará el post {$post} dela categoría {$category}";
}); */

/* Route::get('/posts/post-2', function () {
    return "aquí se mostrará el post 2";
});
 */