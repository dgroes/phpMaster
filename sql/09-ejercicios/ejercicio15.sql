/* Mostrar los clientes que más pedidos han hecho y mostrar cuentos hicieron */

/* SELECT c.nombre as 'Clientes', SUM(e.cantidad) as 'Cantidad de pedidos'
FROM clientes c 
INNER JOIN encargos e ON c.id = e.cliente_id
GROUP BY e.cliente_id;
 */
SELECT c.nombre, count(e.id)
FROM encargos e
inner join clientes c on c.id = e.cliente_id
group by cliente_id order by 2 desc limit 2;

SELECT * FROM encargos;
SELECT * FROM clientes;