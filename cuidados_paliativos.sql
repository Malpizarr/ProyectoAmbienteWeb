CREATE DATABASE cuidados_paliativos;

USE cuidados_paliativos;

CREATE TABLE servicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_servicio VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL
);

CREATE TABLE contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       username VARCHAR(50) NOT NULL UNIQUE,
                       email VARCHAR(50) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL,
                       role ENUM('paciente', 'encargado') NOT NULL
);

CREATE TABLE citas (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       fecha DATETIME NOT NULL,
                       detalles TEXT NOT NULL,
                       reservado_por INT NULL,
                       FOREIGN KEY (reservado_por) REFERENCES users(id)
);

CREATE TABLE donaciones (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            user_id INT NOT NULL,
                            razon TEXT NOT NULL,
                            monto DECIMAL(10, 2) NOT NULL,
                            fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    servicio_id INT NOT NULL,
    comentario TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (servicio_id) REFERENCES servicios(id)
);


/* Modelo entidad relacion

tabla Users - tabla Citas: Un usuario puede reservar varias citas, pero cada cita es reservada por un solo usuario (relación 1 a N).

tabla Users - tabla Donaciones: Un usuario puede realizar varias donaciones, pero cada donación es realizada por un solo usuario (relación 1 a N).*/

/* Mapa y diagrama*/