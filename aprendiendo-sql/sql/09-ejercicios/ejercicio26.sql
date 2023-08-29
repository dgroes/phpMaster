/* Sacar vendedores que tienen Jefe y sacar el nombre del Jefe */

SELECT v1.nombre AS 'Vendedor', v2.nombre AS 'Jefe'
FROM vendedores v1
INNER JOIN vendedores v2 on v1.jefe = v2.id;