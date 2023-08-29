/* Visualizar todos los cargos de los vendedores y el numero de vendedores que están
dentro de ese cargo. */

SELECT * FROM vendedores;

SELECT cargo as Cargos, count(id) as 'Numero de vendedores'
FROM vendedores
GROUP BY cargo;