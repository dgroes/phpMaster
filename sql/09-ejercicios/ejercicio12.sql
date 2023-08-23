/* Conseguir las masa salarial anual del concesionario */
SELECT * FROM VENDEDORES;

SELECT SUM(sueldo) as 'Masa salarial Anual'
FROM vendedores;