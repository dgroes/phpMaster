/*
En SQL, una vista es una representación virtual de una o más tablas en una base de datos. Una vista permite a los usuarios acceder y consultar los datos almacenados en una o más tablas como si fueran una única tabla, sin la necesidad de acceder directamente a las tablas subyacentes. Las vistas proporcionan una capa de abstracción y simplifican la forma en que los usuarios interactúan con los datos.
*/

/*Crear una vista*/
CREATE VIEW entradas_con_nombres AS
SELECT e.id, e.titulo, u.nombre AS 'Autor', c.nombre AS 'Categoria'
FROM entradas e
INNER JOIN usuarios u ON e.usuario_id = u.id
INNER JOIN categorias c ON e.categoria_id = c.id;

SHOW CREATE VIEW entradas_con_nombres;

SHOW TABLES;

SELECT * 
FROM entradas_con_nombres;

/*Eliminar una vista*/
DROP VIEW entradas_con_nombres;