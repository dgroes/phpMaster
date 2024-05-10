CREATE DATABASE blog_cirice;

CREATE TABLE usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,
    correo VARCHAR(40) NOT NULL,
    password VARCHAR(40) NOT NULL,
    fecha_creacion DATE NOT NULL,
    tipo_usuario INT DEFAULT 1 NOT NULL -- Valor predeterminado de "1" para usuarios normales
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE post (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    fecha_subida DATE NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

