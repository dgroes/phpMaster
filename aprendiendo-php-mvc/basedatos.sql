CREATE DATABASE notas_master;
use notas_master;

CREATE TABLE usuarios(
    id int (255) AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(45) NOT NULL,
    apellidos VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL,
    password VARCHAR(45) NOT NULL,
    fecha DATE NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
) ENGINE = InnoDB;

CREATE TABLE notas(
    id int(255) AUTO_INCREMENT NOT NULL,
    usuario_id int (255) NOT NULL,
    titulo VARCHAR(200) NOT NULL,
    descripcion MEDIUMTEXT,
    fecha DATE NOT NULL,
    CONSTRAINT pk_entradas PRIMARY KEY(id),
    CONSTRAINT fk_entrada_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
) ENGINE = InnoDB;