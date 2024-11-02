<?php
// CONTROLLADOR DE MANEJO DE ERRORES, CUANDO LA PÁGINA (uRL) NO SE ENCUENTRE, SE UTILIZARÁ EL ÚNICO MÉTODO DE ESTE CONTROLADOR PARA MOSTRAR UN MENSAJE DE ERROR.
class ErrorControler
{
    public function index()
    {
        echo "<h1>La página buscada no se encuentra 😢</h1>";
    }
}
