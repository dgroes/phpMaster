/* Tipo de datos
    int:                                entero
    integer(n° cifras):                 entero
    varchar(n° caracteres):             string / alfanumerico (max 255)
    char(n° caracteres):                string / alfanumerico
    float(n° cifras, n° decimales)      decimal / coma flotante

*/



/*Crear tabla*/
CREATE TABLE usuarios(
    id int(11),
    nombre varchar(255),
    apellidos varchar(255),
    email varchar(100),
    contrasena varchar(255)
);