/* Mostrar el nombre y el salario de los vendedores con cargo de: Ayudante de tienda*/

 SELECT CONCAT(nombre, ' ', apellidos) as Nombre, sueldo as Salario
 FROM vendedores
 WHERE cargo='Ayudante en tienda';