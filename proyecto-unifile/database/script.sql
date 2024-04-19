-- Tabla de Usuarios
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    rol ENUM('admin', 'usuario_regular') DEFAULT 'usuario_regular',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;

-- Tabla de Archivos
CREATE TABLE files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    nombre_archivo VARCHAR(255) NOT NULL,
    ruta_archivo VARCHAR(255) NOT NULL,
    tamano_archivo INT NOT NULL,
    tipo_archivo VARCHAR(100) NOT NULL,
    fecha_carga TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES users(id) ON DELETE CASCADE
) ENGINE = InnoDB;

-- Tabla de Carpetas
CREATE TABLE folders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    nombre_carpeta VARCHAR(255) NOT NULL,
    descripcion TEXT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES users(id) ON DELETE CASCADE
) ENGINE = InnoDB;

-- Tabla de Permisos
CREATE TABLE permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_archivo INT,
    id_carpeta INT,
    tipo_permiso ENUM('lectura', 'escritura', 'eliminacion') DEFAULT 'lectura',
    FOREIGN KEY (id_usuario) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_archivo) REFERENCES files(id) ON DELETE CASCADE,
    FOREIGN KEY (id_carpeta) REFERENCES folders(id) ON DELETE CASCADE
) ENGINE = InnoDB;