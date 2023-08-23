/* Visualizar las unidades totales vendidas de cada coche a cada cliente,
mostrando del nombre del producto, numero de cliente y la suma de unidades  */

SELECT c.modelo as Coche, cli.nombre as Cliente, SUM(e.cantidad) as 'Cantidad Vendida'
FROM encargos e
INNER JOIN coches c ON e.coche_id = c.id
INNER JOIN clientes cli ON e.cliente_id = cli.id
GROUP BY coche_id, e.cliente_id;

SELECT * FROM clientes;
SELECT * FROM encargos;
SELECT * FROM coches;