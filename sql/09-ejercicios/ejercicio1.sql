/*Diseñar y crear la base de datos de un concesionario*/

#Creación de DB#
CREATE DATABASE IF NOT EXISTS concesionario;
USE concesionario;

-- Coches
CREATE TABLE coches (
    id INT (10) AUTO_INCREMENT NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    marca VARCHAR(100) NOT NULL,
    precio INT(20) NOT NULL,
    stock INT(255) NOT NULL,
    CONSTRAINT pk_coches PRIMARY KEY(id)
)ENGINE=InnoDB;

#Grupos de vendedores#
CREATE TABLE grupos(
    id INT(10) AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    CONSTRAINT pk_grupo PRIMARY KEY(id)
)ENGINE=InnoDB;

#Vendedores#
CREATE TABLE vendedores(
    id INT(10) AUTO_INCREMENT NOT NULL,
    grupo_id INT(10) NOT NULL,
    jefe INT(10),
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100),
    cargo VARCHAR(50),
    fecha_alta DATE,
    sueldo FLOAT(20, 2),
    comision FLOAT(10, 2),
    CONSTRAINT pk_vendedores PRIMARY KEY(id),
    CONSTRAINT fk_vendedor_grupo FOREIGN KEY(grupo_id) REFERENCES grupos(id),
    CONSTRAINT fk_vendedor_jefe FOREIGN KEY(jefe) REFERENCES vendedores(id) 
)ENGINE=InnoDB;

#CLientes#
CREATE TABLE clientes(
    id INT(10) AUTO_INCREMENT NOT NULL,
    vendedor_id INT(10),
    nombre VARCHAR(150) NOT NULL,
    ciudad VARCHAR(100),
    gastado FLOAT(50, 2),
    fecha DATE,
    CONSTRAINT pk_clientes PRIMARY KEY(id),
    CONSTRAINT fk_cliente_vendedor FOREIGN KEY(vendedor_id) REFERENCES vendedores(id)
)ENGINE=InnoDB;

#Encargos#
CREATE TABLE encargos(
    id INT(10) AUTO_INCREMENT NOT NULL,
    cliente_id INT(10) NOT NULL,
    coche_id INT(10) NOT NULL, 
    cantidad INT(100),
    fecha DATE,
    CONSTRAINT pk_encargos PRIMARY KEY(id),
    CONSTRAINT fk_encargo_cliente FOREIGN KEY(cliente_id) REFERENCES clientes(id),
    CONSTRAINT fk_encargo_coche FOREIGN KEY(coche_id) REFERENCES coches(id)
)ENGINE=InnoDB;


#INSERTS#

#COCHES#
INSERT INTO coches 
VALUES
    (NULL, 'Renault Clio', 'Renault', 1200, 13),
    (NULL, 'Seat Panda', 'Seat', 10000, 10),
    (NULL, 'Meredes Ranchera', 'Mercedes Benz', 32000, 24),
    (NULL, 'Porche Cayene', 'Porsche', 65000, 5),
    (NULL, 'Lambo Aventador', 'Lamborghini', 1700000, 2),
    (NULL, 'Ferrari Spider', 'Ferrari', 245000, 80);


#GRUPOS#
INSERT INTO grupos
VALUES
    (NULL, 'Vendedores A', 'Madrid'),
    (NULL, 'Vendedores B', 'Madrid'),
    (NULL, 'Directores Mecanicos', 'Madrid'),
    (NULL, 'Vendedores A', 'Barcelona'),
    (NULL, 'Vendedores B', 'Barcelona'),
    (NULL, 'Vendedores C', 'Valencia'),
    (NULL, 'Vendedores A', 'Bilbao'),
    (NULL, 'Vendedores B', 'Pamplona'),
    (NULL, 'Vendedores C', 'Santiago de compostela');

#VENDEDORES#
INSERT INTO vendedores
VALUES
    (NULL, 1, NULL, 'David', 'Lopez', 'Responsable de tienda', CURDATE(), 30000, 4),
    (NULL, 1, 1, 'Fran', 'Martinez', 'Ayudante en tienda', CURDATE(), 23000, 2),
    (NULL, 2, NULL, 'Nelson', 'Sánchez', 'Responsable de tienda', CURDATE(), 38000, 5),
    (NULL, 2, 3, 'Jesus', 'Lopez', 'Ayudante en tienda', CURDATE(), 12000, 6),
    (NULL, 3, NULL, 'Victor', 'Lopez', 'Mecanico Jefe', CURDATE(), 50000, 2),
    (NULL, 4, NULL, 'Antonio', 'Lopez', 'Vendedor de recambbios', CURDATE(), 13000, 8),
    (NULL, 5, NULL, 'Salvador', 'Lopez', 'Vendedor experto', CURDATE(), 60000, 2),
    (NULL, 6, NULL, 'Joaquin', 'Lopez', 'Ejecutivo de cuentas', CURDATE(), 80000, 1),
    (NULL, 6, 8, 'Luis', 'Lopez', 'Ayudante en tienda', CURDATE(), 10000, 10);

#CLIENTES#
INSERT INTO clientes VALUES
    (NULL, 1, 'Construcciones Diaz Inc', 'Alcobendas', 24000, CURDATE()),
    (NULL, 1, 'Fruteria Antonia Inc', 'Fuenlabrada', 40000, CURDATE()),
    (NULL, 1, 'Imprenta martinez Inc', 'Barcelona', 32000, CURDATE()),
    (NULL, 1, 'Jesus Colchones Inc', 'El Prat', 96000, CURDATE()),
    (NULL, 1, 'Bar Pepe Inc', 'Valencia', 170000, CURDATE()),
    (NULL, 1, 'Tienda PC Inc', 'Murcia', 245000, CURDATE());

#ENCARGOS#
INSERT INTO encargos VALUES
    (NULL, 1, 1, 2, CURDATE()),
    (NULL, 2, 2, 4, CURDATE()),
    (NULL, 3, 3, 1, CURDATE()),
    (NULL, 4, 3, 3, CURDATE()),
    (NULL, 5, 5, 1, CURDATE()),
    (NULL, 6, 6, 1, CURDATE());