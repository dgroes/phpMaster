<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    // echo "Hola diego";
});


/* GET: Para conseguir datos
POOS: Guardar datos
PUT Actualizar recursos
DELETE: Eliminar recursos */


Route::get('/mostrar-fecha', function () {
    $variable = "Ejemplod de variable para la view";
    return view('mostrar-fecha', array(
        'variable' => $variable
    ));
});

Route::get('/pelicula/{titulo?}/{year?}', function($titulo = 'No hay una pelicula aun :(', $year =  2008){
    return view('pelicula', array(
        'titulo' => $titulo,
        'year' => $year
    ));
})->where(array(
    'titulo' => '[a-zA-Z]+'
));
