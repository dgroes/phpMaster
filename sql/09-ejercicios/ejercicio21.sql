/* Obtener los nombres y cuidades de los clientes con encargos de 3 unidades adelante */

select * from encargos;

SELECT nombre, ciudad 
FROM clientes
WHERE id IN
(SELECT cliente_id FROM encargos WHERE cantidad>=3);

SELECT c.nombre, c.ciudad
FROM clientes c
INNER JOIN (
    SELECT DISTINCT cliente_id
    FROM encargos
    WHERE cantidad >= 3
) e ON c.id = e.cliente_id;
