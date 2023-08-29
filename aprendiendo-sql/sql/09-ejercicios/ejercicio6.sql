/* Visualizar el nombre y los apellidos de los vendedores
 en una misma columna y su fecha de registro y que día de la 
 semana era cuando se registraron*/
 SELECT * from vendedores;
 
 SELECT CONCAT(nombre, ' ', apellidos) as nombre, fecha_alta as fecha_registro, DAYNAME(fecha_alta)
 FROM vendedores;
 