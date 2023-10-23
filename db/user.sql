SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

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
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user (usuario, contrasena, nombre, apellido)
VALUES ('darren01', 'darren21', 'Darren', 'Araúz'),
('AslanYova', '12345678', 'Bryan', 'Martinez'),
('Angelinho', '12345678', 'Angel', 'Martinez');
ON DUPLICATE KEY UPDATE usuario = usuario; 

commit;