CREATE DATABASE blog_switzer;

CREATE TABLE usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,
    correo VARCHAR(40) NOT NULL,
    foto VARCHAR(255) NOT NULL,
    fecha_creacion DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE categoria (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE post (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    fecha_subida DATE NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT,
    media VARCHAR(255),
    likes INT NOT NULL DEFAULT 0, -- Contador de likes
    categoria_id INT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    FOREIGN KEY (categoria_id) REFERENCES categoria(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO categoria (nombre) VALUES ('gaming');
INSERT INTO categoria (nombre) VALUES ('deportes');
INSERT INTO categoria (nombre) VALUES ('negocios');
INSERT INTO categoria (nombre) VALUES ('crypto');
INSERT INTO categoria (nombre) VALUES ('television');
INSERT INTO categoria (nombre) VALUES ('musica');
INSERT INTO categoria (nombre) VALUES ('arte');
INSERT INTO categoria (nombre) VALUES ('peliculas');


/* Se agrea el atributo Contraseña a la tabla usuario: */
ALTER TABLE usuario
ADD COLUMN password VARCHAR(255) NOT NULL AFTER correo;
