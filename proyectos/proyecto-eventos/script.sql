-- Script para crear la base de datos y las tablas necesarias

-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS evento_db;
USE evento_db;

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de eventos
CREATE TABLE IF NOT EXISTS eventos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    ubicacion VARCHAR(255) NOT NULL,
    organizador_id INT NOT NULL,
    FOREIGN KEY (organizador_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabla de invitaciones
CREATE TABLE IF NOT EXISTS invitaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    evento_id INT NOT NULL,
    invitado_id INT NOT NULL,
    confirmado BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (evento_id) REFERENCES eventos(id) ON DELETE CASCADE,
    FOREIGN KEY (invitado_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabla de comentarios
CREATE TABLE IF NOT EXISTS comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    evento_id INT NOT NULL,
    usuario_id INT NOT NULL,
    comentario TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (evento_id) REFERENCES eventos(id) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
