/* Visualizar los apellidos de los vendedores, su fecha y 
su numero de grupo ordenado por fecha descendente y mostrar los 4 ultimos */

SELECT * FROM vendedores;

SELECT apellidos, fecha_alta, grupo_id as grupo
FROM vendedores
ORDER BY fecha_alta DESC
LIMIT 4;