/* Sacar la Media de sueldos entre todos los vendedores por grupo */
SELECT * FROM vendedores;

SELECT CEIL(avg(v.sueldo)) as 'Sueldo Medio', g.nombre as Grupo, g.ciudad as Ciudad
FROM vendedores v
LEFT JOIN grupos g ON v.grupo_id = g.id
GROUP BY grupo_id;

SELECT * FROM grupos;

