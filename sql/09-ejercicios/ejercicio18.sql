/* Listar los clientes que han hecho algun encargo del coche Mercedez Ranchera*/
/*Mercedez ranchera ID: 3*/

SELECT c.nombre, co.modelo, e.cantidad  
FROM clientes c
INNER JOIN encargos e ON c.id = e.cliente_id
INNER JOIN coches co ON e.coche_id = co.id
WHERE e.coche_id = 3;

SELECT * FROM clientes WHERE id IN 
(SELECT cliente_id FROM encargos WHERE coche_id 
    IN (SELECT id FROM coches WHERE modelo LIKE '%Mercedes Ranchera%'));

SHOW TABLES;
SELECT * FROM coches;
SELECT * FROM encargos;
SELECT * FROM clientes;
