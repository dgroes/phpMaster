/* Listar todos los encargos realizados con la marca del coche y el nombre
del cliente*/

SELECT * FROM coches;
SELECT * FROM encargos;
SELECT * FROM clientes;

SELECT e.*, co.marca, cli.nombre
FROM encargos e
INNER JOIN coches co ON e.coche_id = co.id
INNER JOIN clientes cli ON e.cliente_id = cli.id;