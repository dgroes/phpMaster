CREATE DATABASE calendario;

USE calendario;

CREATE TABLE tipo_tarea(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL
);

CREATE TABLE calendario(
	id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL
);

CREATE TABLE tarea(
	id INT AUTO_INCREMENT PRIMARY KEY,
    id_tipo_tarea INT NOT NULL,
    id_calendario INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    detalle VARCHAR(10000) NOT NULL,
    realizado BOOLEAN NOT NULL,
    FOREIGN KEY (id_tipo_tarea) REFERENCES tipo_tarea(id),
    FOREIGN KEY (id_calendario) REFERENCES calendario(id)
);


    