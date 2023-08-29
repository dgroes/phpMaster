-- Crea la base de datos
CREATE DATABASE ejercicio_bd;

-- Selecciona la base de datos para trabajar con ella
USE ejercicio_bd;

-- Crea la tabla "empleados"
CREATE TABLE empleados (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    edad INT,
    salario DECIMAL(10, 2),
    fecha_contrato DATE
);

-- Inserta algunos datos de ejemplo en la tabla "empleados"
INSERT INTO empleados (nombre, apellido, edad, salario, fecha_contrato)
VALUES ('Juan', 'Pérez', 30, 2500.50, '2020-01-15');

INSERT INTO empleados (nombre, apellido, edad, salario, fecha_contrato)
VALUES ('María', 'Gómez', 28, 2100.75, '2019-06-03');

INSERT INTO empleados (nombre, apellido, edad, salario, fecha_contrato)
VALUES ('Pedro', 'López', 35, 2800.20, '2018-11-22');

INSERT INTO empleados (nombre, apellido, edad, salario, fecha_contrato)
VALUES ('Ana', 'Martínez', 32, 1950.40, '2022-03-10');

INSERT INTO empleados (nombre, apellido, edad, salario, fecha_contrato)
VALUES ('Carlos', 'Ramírez', 29, 2300.80, '2017-09-18');



--# EJERCICIO 

-- #1 Unir dos campos para mostrar el nombre completo de los empleados:
SELECT CONCAT(nombre, ' ', apellido) AS NombreCompleto, edad AS Edad FROM empleados;

-- #2 Ordenar los empleados por su salario de forma descendente:
SELECT CONCAT(nombre, ' ', apellido) AS NombreCompleto, salario AS Salario FROM empleados ORDER BY salario DESC;

-- #3 Cambiar el formato de las letras del nombre y apellido a mayúsculas:
SELECT UPPER(CONCAT(nombre, ' ', apellido)) AS Nombre FROM empleados;

-- #4 Filtrar empleados mayores de 30 años y con salario mayor a 2200:
SELECT CONCAT(nombre, ' ', apellido) AS NombreCompleto, edad AS Edad, salario AS Salario
FROM empleados
WHERE edad > 30 AND salario > 2200;

-- #5 Calcular el promedio del salario de todos los empleados:
SELECT AVG(salario) AS SalarioPromedio FROM empleados;
