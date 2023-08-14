/* 
	-Consultas que se ejecutan dentro de otras
    -Consiste en utilizar los resultados de la suconsulta para operar en la consulta principal
    -Jugando con las claves foraneas

*/

select * from usuarios;
insert into usuarios values(null, 'Sid', 'Wilson', 'killdj@gmail.com', 'slipknot', curdate());

#Sacar usuarios con entradas
select * from usuarios where id IN (select usuario_id from entradas);
select usuario_id from entradas;
#Sacar usuarios sin entradas 
select * from usuarios where id NOT IN (select usuario_id from entradas);

select * from entradas;


insert into entradas values(null, 12, 1, 'Crash', 'Juego de aventura muy entretanido', curdate());

#Sacar los usuarios que tengan alguna entrada que en el titulo tenga la palabra Crash
select nombre, apellidos from usuarios where id in (select usuario_id from entradas where titulo like "%Crash%");

select usuario_id from entradas where titulo like "%Crash%";
select * from usuarios;

#Sacar todas la entradas de la categoria acción utilizando su nombre#
select categoria_id, titulo from entradas
	where categoria_id 
		in (select id from categorias where nombre = 'accion');

#Mostrar las categorias con mas de 3 entradas#
select nombre from categorias where
	id in
	(select categoria_id from entradas group by categoria_id having count(categoria_id)>=3);
    
    select categoria_id from entradas group by categoria_id having count(categoria_id)>=3;
#Mostrar los usuarios que crearon una entradas un lunes#
select * from usuarios where id in
	(select usuario_id from entradas where dayofweek(fecha)=5);
    
#Mostrar el nombre del usuario que tenga mas entradas#
SELECT nombre
FROM usuarios
WHERE id = (
    SELECT usuario_id
    FROM entradas
    GROUP BY usuario_id
    ORDER BY COUNT(id) DESC
    LIMIT 1
);
 
   select count(id), usuario_id from entradas group by usuario_id order by count(id) desc limit 1;

#Mostrar las categorias sin entradas#
Select *
from categorias
where id not in (
	select categoria_id
    from entradas
);


SELECT
    u.nombre,
    u.apellido,
    COUNT(e.id) AS cantidad_entradas
FROM
    usuarios u
JOIN
    entradas e ON u.id = e.usuario_id
WHERE
    u.activo = 1
    AND e.fecha >= '2023-01-01'
GROUP BY
    u.id, u.nombre, u.apellido
HAVING
    COUNT(e.id) > 10
ORDER BY
    cantidad_entradas DESC;


