/* Seleccionar el grupo en el que trabaja el vendedor con mayor salario y 
mostrar el nombre del grupo*/

SHOW TABLES;
SELECT * FROM grupos;
SELECT * FROM vendedores;

SELECT * FROM grupos WHERE id IN
	(SELECT grupo_id FROM vendedores WHERE sueldo = (
		SELECT MAX(sueldo)FROM vendedores));

SELECT g.*
FROM grupos g
JOIN (
    SELECT grupo_id
    FROM vendedores
    WHERE sueldo = (SELECT MAX(sueldo) FROM vendedores)
) v ON g.id = v.grupo_id;
