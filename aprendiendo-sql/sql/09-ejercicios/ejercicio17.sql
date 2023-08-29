/* Obterer un listado con los encargos realizados por los cliente 
'Fruteria antonia inc' */

/*SOLO JOIN*/
SELECT e.id AS 'NumeroEncargo', e.cantidad as 'Cantidad', c.nombre as 'Cliente', co.modelo as 'Modelo'
FROM encargos e
INNER JOIN clientes c ON e.cliente_id = c.id
INNER JOIN coches co ON e.coche_id = co.id
WHERE c.nombre = 'Fruteria Antonia Inc';

/* CON SUBCONSULTA SELECT*/
SELECT e.id as 'Numero encargo', cantidad as 'Cantidad', c.nombre as Cliente, co.modelo as Modelo, e.fecha
FROM encargos e
INNER JOIN clientes c ON c.id = cliente_id
INNER JOIN coches co ON co.id = e.coche_id
WHERE e.cliente_id IN
(SELECT id FROM clientes WHERE nombre ='Fruteria Antonia Inc');

SELECT * FROM clientes;
SELECT * FROM encargos;