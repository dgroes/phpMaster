CREATE DATABASE turnosConserjeria;
USE turnosConserjeria;

CREATE TABLE Torres (
    torre_id INT PRIMARY KEY,
    nombre_torre VARCHAR(50)  -- Ej. 'Torre A', 'Torre B'
);

CREATE TABLE Empleados (
    empleado_id INT PRIMARY KEY,
    nombre VARCHAR(100),
    puesto VARCHAR(100)
);

CREATE TABLE Turnos (
    turno_id INT PRIMARY KEY,
    nombre_turno VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255)
);

CREATE TABLE Horario_Turno (
    horario_id INT PRIMARY KEY,
    turno_id INT,
    torre_id INT,
    dia_semana VARCHAR(10),      -- 'lunes', 'martes', etc.
    hora_inicio TIME,
    hora_fin TIME,
    horas_trabajadas DECIMAL(4, 2),
    FOREIGN KEY (turno_id) REFERENCES Turnos(turno_id),
    FOREIGN KEY (torre_id) REFERENCES Torres(torre_id)
);

CREATE TABLE Turno_Empleado (
    turno_empleado_id INT PRIMARY KEY,
    empleado_id INT,
    turno_id INT,
    torre_id INT,
    fecha_inicio DATE,
    fecha_fin DATE,
    FOREIGN KEY (empleado_id) REFERENCES Empleados(empleado_id),
    FOREIGN KEY (turno_id) REFERENCES Turnos(turno_id),
    FOREIGN KEY (torre_id) REFERENCES Torres(torre_id)
);
