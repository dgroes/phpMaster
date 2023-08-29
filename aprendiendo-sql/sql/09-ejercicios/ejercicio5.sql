/*Mostrar todos los vendedores con su nombre y 
el numero de días que llevan en el concesionario.*/
SELECT * FROM vendedores;
SELECT concat(nombre, ' ', apellidos) as 'Nombre', DATEDIFF(CURDATE(), fecha_alta) as 'Días'
FROM vendedores;