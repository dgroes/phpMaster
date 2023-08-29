#Sacar a todos los vendedores cuya fecha de alta sea posterior al de 2023#
select * from vendedores;

UPDATE vendedores SET fecha_alta='2022-04-03' WHERE id=8;

SELECT *
FROM vendedores
WHERE fecha_alta <= '2023-01-01';