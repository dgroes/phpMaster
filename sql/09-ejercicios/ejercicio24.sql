/* Listar los encargos con el nombre del coche, nombre del cliente, nombre 
de la cuidad, pero unicamente cuando sea de Barcelona */

SELECT e.id, co.modelo, cl.nombre, cl.ciudad
FROM encargos e
INNER JOIN coches co ON e.coche_id = co.id
INNER JOIN clientes cl ON e.cliente_id = cl.id
WHERE cl.ciudad LIKE 'Barcelona';
