/* Visualizar los nombre de los clientes y la cantidad de los encargos realizados, 
incluyendo los que no hayan realizado encargos */

SELECT c.nombre, COUNT(e.id) as cantidad
FROM clientes c
LEFT JOIN encargos e ON c.id = e.cliente_id
GROUP BY 1;