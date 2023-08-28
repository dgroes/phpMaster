/*   Mostrar listado de clientes (id, numero de cliente y el nombre)
Mostrar el numero de vendedor y su nombre*/
SELECT c.id, c.nombre, v.id, v.nombre
FROM clientes c, vendedores v
WHERE c.vendedor_id = v.id;

SELECT c.id, c.nombre, v.id, v.nombre
FROM clientes c
JOIN vendedores v ON c.vendedor_id = v.id;