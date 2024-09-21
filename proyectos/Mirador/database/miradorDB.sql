CREATE DATABASE mirador;

USE mirador;

-- Persona ######Listo
CREATE TABLE personas(
    id INt AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(70) NOT NULL,
    apellidos VARCHAR(70) NOT NULL,
    cedula VARCHAR(20) NOT NULL
) ENGINE = InnoDB;

-- Tabla de cargos laboral de trabajdores del edificio, ejemplo: (Mayordomo, Conserje Partime, Conserje Día, Auxiliar de Aseo, etc.) ######Listo
CREATE TABLE cargos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cargo VARCHAR (70) NOT NULL,
    descripcion VARCHAR (70) NOT NULL
) ENGINE = InnoDB;

-- Tabla de trabajdores  ######Listo
CREATE TABLE trabajadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    persona_id INT NOT NULL,
    cargo_id INT NOT NULL,
    email VARCHAR(70) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(20) NOT NULL,
    CONSTRAINT fk_trabajador_persona FOREIGN KEY (persona_id) REFERENCES personas(id),
    CONSTRAINT fk_trabajador_cargo FOREIGN KEY (cargo_id) REFERENCES cargos(id)
) ENGINE = InnoDB;

-- Tabla vehiculo ######Listo
CREATE TABLE vehiculos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricula VARCHAR(7) NOT NULL,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50),
    detalle VARCHAR(255),
    color VARCHAR(50)
) ENGINE = InnoDB;

-- Tabla Torre ######Listo
CREATE TABLE torres(
    id INT AUTO_INCREMENT PRIMARY KEY,
    detalle VARCHAR(30) NOT NULL,
    direccion VARCHAR(70) NOT NULL
) ENGINE = InnoDB;

-- Tabla Residencia    ######Listo
CREATE TABLE residencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    torre_id INT NOT NULL,
    numero INT NOT NULL,
    detalle VARCHAR(255),
    CONSTRAINT fk_residencia_torre FOREIGN KEY (torre_id) REFERENCES torres(id)
) ENGINE = InnoDB;

-- Tabla de resindentes del Edificio  ######Listo
CREATE TABLE residentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    persona_id INT NOT NULL,
    residencia_id INT NOT NULL,
    movilidadReducida ENUM('No', 'Si') DEFAULT 'No',
    detalle VARCHAR(255),
    CONSTRAINT fk_residente_persona FOREIGN KEY (persona_id) REFERENCES personas(id),
    CONSTRAINT fk_residente_residencia FOREIGN KEY (residencia_id) REFERENCES residencias(id)
) ENGINE = InnoDB;

-- Tabla de Bodegas  ######Listo
CREATE TABLE bodegas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    residencia_id INT NOT NULL,
    numero INT NOT NULL,
    piso ENUM('-1', '-2'),
    CONSTRAINT fk_bodega_residencia FOREIGN KEY (residencia_id) REFERENCES residencias(id)
) ENGINE = InnoDB;

-- Tabla de estacionamiento de residentes
CREATE TABLE estacionamientoResidentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    residencia_id INT NOT NULL,
    piso ENUM('-1', '-2'),
    CONSTRAINT fk_estacionamientoResidentes_residencia FOREIGN KEY (residencia_id) REFERENCES residencias(id)
) ENGINE = InnoDB;

-- Tabla de los turnos de los trabajadores 
CREATE TABLE turnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trabajador_id INT NOT NULL,
    torre_id INT NOT NULL,
    diaInicio DATE,
    diaTermino DATE,
    horaInicio DATETIME,
    horaTermino DATETIME,
    detalle VARCHAR(255),
    CONSTRAINT fk_turno_trabajador FOREIGN KEY (trabajador_id) REFERENCES trabajadores(id),
    CONSTRAINT fk_turno_torre FOREIGN KEY (torre_id) REFERENCES torres(id)
) ENGINE = InnoDB;

-- TAbla de resgistro de visitas a una residencia del edifico
CREATE TABLE visitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    persona_id INT NOT NULL,
    residencia_id INT NOT NULL,
    detalle VARCHAR(255),
    fechaHoraEntrada DATETIME,
    fechaHoraSalida DATETIME
) ENGINE = InnoDB;

-- Tabla de resgistro de vehiculos de visitas y/o residentes que se estacionen en estacionaiento de visitas
CREATE TABLE estacionaientoVisitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehiculo_id INT NOT NULL,
    visita_id INT NOT NULL,
    turno_id INT NOT NULL,
    fechaHoraEntrada DATETIME,
    fechaHoraSalida DATETIME,
    detalle VARCHAR(255),
    CONSTRAINT fk_estacionamientoVisita_vehiculo FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id),
    CONSTRAINT fk_estacionamientoVisita_visita_id FOREIGN KEY (visita_id) REFERENCES visitas(id),
    CONSTRAINT fk_estacionamientoVisita_turno FOREIGN KEY (turno_id) REFERENCES turnos(id)
) ENGINE = InnoDB;

-- Tabla de notas de los residentes 
CREATE TABLE notaResidentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    residente_id INT NOT NULL,
    status ENUM('Queja', 'Sujerencia', 'Comentario'),
    detalle VARCHAR(255) NOT NULL,
    creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_notaResidente_residente FOREIGN KEY (residente_id) REFERENCES residentes(id)
) ENGINE = InnoDB;

-- Tabla de apuntes de los trabajadores, anotaciones como recordatorios propios, ideas, etc.
CREATE TABLE apuntes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    turno_id INT NOT NULL,
    detalle TEXT NOT NULL,
    creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_apuntes_turno FOREIGN KEY (turno_id) REFERENCES turnos(id)
) ENGINE = InnoDB;

-- Tabla del tipo de notas que puede haber
CREATE TABLE notasTipo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(255) NOT NULL,
    detalle VARCHAR(255)
) ENGINE = InnoDB;

-- Tabla de notas, notas creadas como bitacora 
CREATE TABLE bitacora (
    id INT AUTO_INCREMENT PRIMARY KEY,
    turno_id INT NOT NULL,
    notasTipo_id INT NOT NULL,
    detalle VARCHAR(255) NOT NULL,
    creacion DATETIME,
    CONSTRAINT fk_bitacora_turno FOREIGN KEY (turno_id) REFERENCES turnos(id),
    CONSTRAINT fk_bitacora_notaTipo FOREIGN KEY (notasTipo_id) REFERENCES notasTipo(id)
) ENGINE = InnoDB;

-- Tabla de casilas de correo de los residentes
CREATE TABLE casillas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    residencia_id INT NOT NULL,
    detalle VARCHAR(255),
    CONSTRAINT fk_casilla_residencia FOREIGN KEY (residencia_id) REFERENCES residencias(id)
) ENGINE = InnoDB;

-- Tabla de tipos de encargo, encargos tales como paquetes, pedidos, etc.
CREATE TABLE encargosTipo(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20),
    detalle VARCHAR(100)
) ENGINE = InnoDB;

-- Tabla de encargos (paquetes, pedidos, bultos, etc) que deberán tener su podrio registro 
CREATE TABLE encargos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    encargosTipo_id INT NOT NULL,
    residencia_id INT NOT NULL,
    turno_id INT NOT NULL,
    horaRecibido DATETIME,
    horaEntregado DATETIME,
    CONSTRAINT fk_encargo_encargoTipo FOREIGN KEY (encargosTipo_id) REFERENCES encargosTipo(id),
    CONSTRAINT fk_encargo_residencia FOREIGN KEY (residencia_id) REFERENCES residencias(id),
    CONSTRAINT fk_encargo_turno FOREIGN KEY (turno_id) REFERENCES turnos(id)
) ENGINE = InnoDB;

-- Tabla de gestión del salon de eventos
CREATE TABLE eventos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    residencia_id INT NOT NULL,
    torre_id INT NOT NULL,
    horaInicio DATETIME,
    horaTermino DATETIME,
    detalle TEXT NOT NULL,
    CONSTRAINT fk_evento_residencia FOREIGN KEY (residencia_id) REFERENCES residencias(id),
    CONSTRAINT fk_evento_torre FOREIGN KEY (torre_id) REFERENCES torres(id)
) ENGINE = InnoDB;