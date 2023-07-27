#Mostrar todos los registros de una tabla#
SELECT email, nombre, apellidos FROM usuarios;

#Mostrar todos los campos#
SELECT * FROM usuarios;

#Operadores aritmeticos#
SELECT email, (4+7) as 'Operacion' FROM usuarios; 

SELECT id, email  FROM usuarios ORDER BY id; 

#Funciones Matematicas#
SELECT abs(7) as 'Operacion' FROM usuarios; 


#Funciones de caracteres
SELECT UPPER(NOMBRE) FROM USUARIOS;
SELECT CONCAT(nombre, ' ' apellidos) from usuarios;
SELECT UPPER(CONCAT(nombre, ' ', apellidos)) as nombreCompleto from usuarios;
SELECT LENGTH(CONCAT(nombre, ' ', apellidos)) as nombreCompleto from usuarios;
SELECT TRIM(CONCAT('       ', nombre, ' ', apellidos, '       ')) as nombreCompleto from usuarios;

#Funciones con fechas#
SELECT fecha from USUARIOS;
SELECT fecha, curdate() as fechaActual from USUARIOS;
SELECT nombre, datediff(fecha, curdate()) as fechaActual from USUARIOS; ##diaz de diferencia
SELECT nombre, dayname(fecha) as fecha from USUARIOS;
SELECT nombre, dayofmonth(fecha) as fecha from USUARIOS;
SELECT nombre, dayofweek(fecha) as fecha from USUARIOS;
SELECT nombre, dayofyear(fecha) as fecha from USUARIOS;
SELECT nombre, month(fecha) as fecha from USUARIOS;
SELECT nombre, year(fecha) as fecha from USUARIOS;
SELECT nombre, day(fecha) as fecha from USUARIOS;
SELECT nombre, hour(fecha) as fecha from USUARIOS;
SELECT nombre, CURTIME() as fecha from USUARIOS;
SELECT nombre, SYSDATE() as fecha from USUARIOS;
SELECT nombre, date_format(fecha, '%d-%m-%Y') from USUARIOS;


#Otras funciones utilez
select email, ISNULL(NOMBRE) from usuarios;
select * from usuarios;
select version() from usuarios;
select distinct user() from usuarios;
select distinct database() from usuarios;
select ifnull(apellidos, 'Este campo está vacio') from usuarios;

