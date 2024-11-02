CREATE DATABASE sloth;

USE sloth;

-- Tabla Usuarios
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
) ENGINE = InnoDB;

-- tabla de categorias de habitos
CREATE TABLE category(
    id INT AUTO_INCREMENT PRIMARY KEY,
    detail VARCHAR(100) NOT NULL
) ENGINE = InnoDB;

-- Tabla de Habitos
CREATE TABLE habits(
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    detail TEXT,
    status count,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;

-- Tabla de Tareas
CREATE TABLE task(
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    title
    detail
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)

-- Tabla de notificaciones