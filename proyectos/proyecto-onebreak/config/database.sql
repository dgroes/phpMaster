CREATE DATABASE onBreak CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE actividadEmpresa (
    id INT PRIMARY KEY NOT NULL,
    detalle VARCHAR(12) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE tipoEmpresa (
    id INT PRIMARY KEY NOT NULL,
    detalle VARCHAR(16) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE tipoEvento (
    id INT PRIMARY KEY NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    valor_base DECIMAL(10, 2) NOT NULL,
    personal_base INT
) ENGINE = InnoDB;

CREATE TABLE cliente (
    rut VARCHAR(9) PRIMARY KEY NOT NULL,
    id_tipo_actividad INT,
    id_tipo_empresa INT,
    razon_social VARCHAR(255) NOT NULL,
    nombre_contacto VARCHAR(100) NOT NULL,
    mail_contacto VARCHAR(100) NOT NULL,
    direccion VARCHAR(150) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    FOREIGN KEY (id_tipo_actividad) REFERENCES actividadEmpresa(id),
    FOREIGN KEY (id_tipo_empresa) REFERENCES tipoEmpresa(id)
) ENGINE = InnoDB;

CREATE TABLE contrato (
    numero_contrato VARCHAR(14) PRIMARY KEY,
    id_tipo_evento INT,
    id_cliente VARCHAR(9),
    creacion DATETIME NOT NULL,
    termino DATETIME NOT NULL,
    fecha_hora_inicio DATETIME NOT NULL,
    fecha_hora_termino DATETIME NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    vigencia VARCHAR(50),
    observaciones TEXT,
    valor_total_evento DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_tipo_evento) REFERENCES tipoEvento(id),
    FOREIGN KEY (id_cliente) REFERENCES cliente(rut),
    UNIQUE (numero_contrato)
) ENGINE = InnoDB;