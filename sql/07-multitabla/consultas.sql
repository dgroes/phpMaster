/* CONSULTA MULTITABLA
	Son consultas que sirven para consultar varias tablas en una sola sentencia
*/

#Mostrar las entradas con el nombre del autor y el nombre de la categoría#
SELECT e.id, e.titulo, u.nombre as 'Autor', c.nombre as 'Categoria'
FROM entradas e, usuarios u, categorias c
WHERE e.usuario_id = u.id AND e.categoria_id = c.id;
/* Mismo ejemplo pero ahora con JOIN*/#
SELECT e.id, e.titulo, u.nombre as 'Autor', c.nombre as 'Categoria'
FROM entradas e
INNER JOIN usuarios u ON e.usuario_id = u.id
INNER JOIN categorias c ON e.categoria_id = c.id;


#Mostrar el nombre de las categorias y al lado cuantas entradas tienen#
SELECT c.nombre, count(e.id)
FROM categorias c, entradas e
WHERE c.id = e.categoria_id
GROUP BY e.categoria_id;
/* Mismo ejemplo pero ahora con LEFT JOIN*/#
SELECT c.nombre, count(e.id)
FROM categorias c
LEFT JOIN entradas e ON e.categoria_id = c.id
GROUP BY e.categoria_id;

/* Mismo ejemplo pero ahora con RIGHT JOIN*/#
SELECT c.nombre, count(e.id)
FROM entradas e
RIGHT JOIN categorias c ON e.categoria_id = c.id
GROUP BY e.categoria_id;

#Mostrar el email de los usuarios y al lado cuantas entradas tienen#
SELECT u.email, count(e.titulo)
FROM usuarios u, entradas e
WHERE u.id = e.usuario_id
GROUP BY e.usuario_id;


