/*  Mostrar los datos del vendedor con mas antiguidad en el concesionario */

SELECT * 
FROM vendedores
ORDER BY fecha_alta asc
LIMIT 1;

/* 30+ Obtener coches con mas unidades vendidas*/

SELECT * FROM coches
WHERE id IN
(SELECT coche_id FROM encargos WHERE cantidad IN
	(SELECT MAX(cantidad) FROM encargos));