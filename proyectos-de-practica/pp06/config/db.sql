--Creación de la Base de Datos
CREATE DATABASE IF NOT EXISTS transporte;

CREATE TABLE IF NOT EXISTS vehiculo (
    codigo INT(4) PRIMARY KEY,
    num_motor VARCHAR(11) NOT NULL UNIQUE,
    tipo_vehiculo VARCHAR(15) NOT NULL,
    marca VARCHAR(1) NOT NULL,
    modelo VARCHAR(20) NOT NULL,
    anno INT(4) NOT NULL,
    color VARCHAR(15) NOT NULL,
    precio INT(8) NOT NULL,
    estado VARCHAR(1) NOT NULL,
    revision BIT(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO
    vehiculo
VALUES
    (
        '1234',
        'BCT123M566H',
        'AUTO',
        'H',
        'SANTA FE',
        2016,
        'ROJO',
        20500000,
        'N',
        1
    );