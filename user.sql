-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS actividad5;

-- Usar la base de datos
USE actividad5;

-- Crear la tabla "user"
CREATE TABLE IF NOT EXISTS user (
    codusuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE, 
    contrasena VARCHAR(255) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL
);

INSERT INTO user (usuario, contrasena, nombre, apellido)
VALUES ('dev01', 'dev', 'Developer', '777')
ON DUPLICATE KEY UPDATE usuario = usuario; 