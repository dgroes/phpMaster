/* Visualizar todos los coches en cuya marca exista la letra 'A' y que empiece for 'F'*/

SELECT * FROM coches;

SELECT *
FROM coches
WHERE marca LIKE '%a%' AND modelo LIKE 'f%';