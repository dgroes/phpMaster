/* Obtener una lista de los nombres de los clientes con el importe
de sus encargos acumunlado */

SELECT cl.nombre, SUM(precio*cantidad) as importe
FROM clientes cl
INNER JOIN encargos e ON cl.id = e.cliente_id
INNER JOIN coches co ON e.coche_id = co.id
GROUP BY cl.nombre
ORDER BY 2 ASC;