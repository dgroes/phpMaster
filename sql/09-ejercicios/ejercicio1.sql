/*Diseñar y crear la base de datos de un concesionario*/

-- Coches
CREATE TABLE coches (
    id INT PRIMARY KEY,
    modelo VARCHAR(20) NOT NULL,
    marca VARCHAR(20) NOT NULL,
    precio INT NOT NULL,
    stock INT NOT NULL
);

--Grupos de vendedores
CREATE TABLE grupo(
    id INT PRIMARY KEY,
    nombre VARCHAR VARCHAR(40),
    ciudad VARCHAR (30)
);

--Vendedores
CREATE TABLE vendedores(
    id INT PRIMARY KEY,
    grupo_id INT
    nombre VARCHAR (20)
    apellidos VARCHAR (60)
    cargo VARCHAR(20)
    fecha_alta DATE,
    sueldo INT,
    comision INT,
    jefe VARCHAR (30)
)

--CLientes
CREATE TABLE clientes(
    id INT PRIMARY KEY,
    vendedor_id INT,
    nombre VARCHAR(30),
    ciudad VARCHAR (30),
    gastado INT
)

--Encargos
CREATE TABLE encargos(
    id INT PRIMARY KEY,
    cliente_id INT,
    coche_id INT, 
    cantidad INT,
    fecha DATE
)





