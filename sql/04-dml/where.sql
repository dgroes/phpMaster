#Consulta con una Condición#
SELECT * FROM usuarios WHERE email = "diego@gmail.com";

/*
    OPERADORES DE COMPARACIÓN
    Igual           =
    Distinto        !=
    Menor que       <
    Mayor que       >
    Menor o igual   <=
    Mayor o igual   >=
    entre           between a and b
    en              in
    Es nulo         is null
    No nulo         is not null
    como            like
    no es como      not like

*/
/*
    OPERADORES LOGICOS
    O       OR
    Y       AND
    NO      NOT
*/


/*
    COMODINES
    Cualquier cantidad de caracteres: %
    Un caracter desconocido: _

*/

#Ejmplos de operadores de comparación#
#Consulta con una Condición#

#1. Mostrar nombre y apellidos de todos los usuarios registrados en 2023
SELECT nombre, apellidos, fecha FROM usuarios WHERE YEAR(fecha) = 1993;

#2. Todos los usiarios que no se registraron en 2023.
SELECT nombre, apellidos, fecha FROM usuarios WHERE year(fecha) != 2023 OR ISNULL(FECHA);

#3. Mostrar email de los usuaiors con apellidos iniciados en G y además que su contraseña sea password456
select email, nombre, apellidos FROM usuarios WHERE apellidos LIKE 'g%' AND password = 'password456';

#4 Sacar todos los registros de la tabla usuarios cuyo año sea par
SELECT * FROM usuarios WHERE (YEAR(fecha)%2 = 0);

#5 Sacar todos los eregistros de la tabla usuarios cuyo nombre tenga más de 5 letras y que además sea hayan registrado antes de 2020 y mostrar el nombre en mayusculas
SELECT id, upper(nombre) as Nombre, apellidos FROM usuarios WHERE length(nombre) > 5 AND YEAR(fecha) < 2020;

select * from usuarios order by fecha asc;

select * from usuarios limit 2 , 6;