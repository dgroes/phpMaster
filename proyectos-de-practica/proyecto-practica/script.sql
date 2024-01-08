CREATE TABLE usuario(
    id INT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(45) NOT NULL,
    apellido VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL,
    contrasena VARCHAR(45) NOT NULL,
	fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;

CREATE TABLE post (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    titulo VARCHAR(100) NOT NULL,
    descripcion MEDIUMTEXT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_post_usuario FOREIGN KEY(usuario_id) REFERENCES usuario(id)
)ENGINE=InnoDB;
