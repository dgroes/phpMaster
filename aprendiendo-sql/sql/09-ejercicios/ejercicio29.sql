/*  Crear una vista llamada vendedoresA que incluirá todos los vendedores
del grupo que se llame 'Vendedores A'*/
CREATE VIEW vendedoresA AS
SELECT v.*
FROM vendedores v
INNER JOIN grupos g ON v.grupo_id = g.id
WHERE g.nombre LIKE 'Vendedores A';

SELECT * FROM vendedoresA;