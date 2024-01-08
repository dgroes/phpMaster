-- TABLA TORRE
CREATE TABLE torre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_torre VARCHAR(5)
);

-- TABLA VEHICULO
CREATE TABLE vehiculo (
    id VARCHAR(10) PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    detalle VARCHAR(100)
);

-- TABLA PERSONA
CREATE TABLE persona (
    id VARCHAR(9) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    detalle VARCHAR(100) NOT NULL
);

-- TABLA VISITA
CREATE TABLE visita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_persona VARCHAR(9) NOT NULL,
    id_vehiculo VARCHAR(10),
    depto INT(4) NOT NULL,
    fecha DATE NOT NULL,
    hora_llegada TIME,
    hora_salida TIME,
    parentesco VARCHAR(50),
    FOREIGN KEY (id_persona) REFERENCES persona(id),
    FOREIGN KEY (id_vehiculo) REFERENCES vehiculo(id)
);

-- Creación de la vista Visitas para una mejor lectura de los datos.
CREATE VIEW visitas AS
SELECT vi.id, vi.fecha, vi.hora_llegada, vi.hora_salida, vi.depto, vi.id_persona, vi.id_vehiculo, ve.marca, vi.parentesco
FROM visita vi
LEFT JOIN vehiculo ve ON vi.id_vehiculo = ve.id;
