CREATE DATABASE si_inventario;
USE si_inventario;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Usuario por defecto para pruebas
-- Credenciales -> Usuario: admin | Contraseña: admin123
INSERT INTO usuarios (username, password_hash) 
VALUES ('admin', '$2y$10$eY0wZ/X3P22P2oV/E4jJDeV2hQJqJc2gq9.Xv7Q9gK7Q9gK7Q9gK7');

-- Nota para el estudiante: El hash provisto es representativo. Puedes generar tu propio registro inicial o adaptar la validación.