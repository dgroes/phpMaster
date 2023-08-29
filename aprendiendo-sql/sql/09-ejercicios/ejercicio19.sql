/*  Obtener los vendedores con 2 o más clientes */

SHOW TABLES;
SELECT * FROM clientes;
SELECT * FROM vendedores;

SELECT * FROM vendedores WHERE id in
	(SELECT vendedor_id FROM clientes GROUP BY vendedor_id HAVING COUNT(id)>=2);


SELECT v.id, v.nombre, v.apellidos, v.cargo, v.sueldo, v.comision
FROM vendedores v
INNER JOIN clientes c ON v.id = c.vendedor_id
GROUP BY c.vendedor_id
HAVING COUNT(c.id)>=2;