CREATE DATABASE cuidados_paliativos;

USE cuidados_paliativos;

CREATE TABLE servicios (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           nombre_servicio VARCHAR(255) NOT NULL,
                           descripcion TEXT NOT NULL
);

INSERT INTO servicios (nombre_servicio, descripcion) VALUES
                                                         ('Asesoramiento y apoyo emocional', 'Brindar apoyo emocional y asesoramiento a personas en situaciones difíciles.'),
                                                         ('Provisión de equipos médicos', 'Proveer y mantener equipos médicos esenciales para el cuidado de la salud en el hogar.'),
                                                         ('Cuidados en el hogar', 'Ofrecer servicios de cuidado personal y asistencia en las tareas diarias en el hogar.'),
                                                         ('Apoyo a cuidadores', 'Proporcionar recursos y apoyo a los cuidadores para ayudarles en su rol.');



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

INSERT INTO users (username, email, password, role) VALUES
                                                        ('user1', 'user1@example.com', '$2y$10$fU28KxAISBAGBxlrZ3iW6uL5EU9fCRoPlBivcz.Pl/IomSPY6gwyi', 'paciente'),
                                                        ('user2', 'user2@example.com', '$2y$10$fU28KxAISBAGBxlrZ3iW6uL5EU9fCRoPlBivcz.Pl/IomSPY6gwyi', 'paciente'),
                                                        ('encargado1', 'user3@example.com', '$2y$10$fU28KxAISBAGBxlrZ3iW6uL5EU9fCRoPlBivcz.Pl/IomSPY6gwyi', 'encargado'),
                                                        ('encargado2', 'user4@example.com', '$2y$10$fU28KxAISBAGBxlrZ3iW6uL5EU9fCRoPlBivcz.Pl/IomSPY6gwyi', 'encargado'),
                                                        ('user5', 'user5@example.com', '$2y$10$fU28KxAISBAGBxlrZ3iW6uL5EU9fCRoPlBivcz.Pl/IomSPY6gwyi', 'paciente'),
                                                        ('encargado3', 'user6@example.com', '$2y$10$fU28KxAISBAGBxlrZ3iW6uL5EU9fCRoPlBivcz.Pl/IomSPY6gwyi', 'encargado');



CREATE TABLE citas (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       fecha DATETIME NOT NULL,
                       detalles TEXT NOT NULL,
                       reservado_por INT NULL,
                       FOREIGN KEY (reservado_por) REFERENCES users(id)
);

INSERT INTO citas (fecha, detalles, reservado_por) VALUES
                                                       ('2024-09-01 09:00:00', 'Consulta general', NULL),
                                                       ('2024-09-01 11:00:00', 'Seguimiento tratamiento', NULL),
                                                       ('2024-09-02 14:30:00', 'Revisión resultados de laboratorio', NULL),
                                                       ('2024-09-03 10:15:00', 'Consulta psicológica', NULL),
                                                       ('2024-09-03 13:00:00', 'Terapia física', NULL),
                                                       ('2024-09-04 08:45:00', 'Consulta nutricional', NULL),
                                                       ('2024-09-04 11:30:00', 'Revisión médica', NULL),
                                                       ('2024-09-05 09:15:00', 'Sesión de terapia', NULL),
                                                       ('2024-09-05 14:00:00', 'Consulta pediátrica', NULL),
                                                       ('2024-09-06 10:00:00', 'Consulta cardiológica', NULL),
                                                       ('2024-09-06 13:45:00', 'Evaluación neurológica', NULL),
                                                       ('2024-09-07 08:30:00', 'Consulta dental', NULL),
                                                       ('2024-09-07 11:00:00', 'Revisión de cirugía', NULL),
                                                       ('2024-09-08 10:30:00', 'Consulta de seguimiento', NULL),
                                                       ('2024-09-08 13:15:00', 'Terapia ocupacional', NULL),
                                                       ('2024-09-09 09:00:00', 'Consulta endocrinológica', NULL),
                                                       ('2024-09-09 11:30:00', 'Consulta traumatológica', NULL),
                                                       ('2024-09-10 14:00:00', 'Revisión de exámenes', NULL),
                                                       ('2024-09-11 09:30:00', 'Consulta de urgencias', NULL),
                                                       ('2024-09-11 12:00:00', 'Consulta dermatológica', NULL),
                                                       ('2024-09-12 10:15:00', 'Evaluación psiquiátrica', NULL),
                                                       ('2024-09-12 13:45:00', 'Consulta oftalmológica', NULL),
                                                       ('2024-09-13 09:45:00', 'Consulta de geriatría', NULL),
                                                       ('2024-09-13 12:30:00', 'Consulta de nutrición', NULL),
                                                       ('2024-09-14 11:00:00', 'Consulta de medicina general', NULL),
                                                       ('2024-09-14 14:30:00', 'Consulta de pediatría', NULL),
                                                       ('2024-09-15 09:00:00', 'Terapia psicológica', NULL),
                                                       ('2024-09-15 11:45:00', 'Revisión de radiografías', NULL),
                                                       ('2024-09-16 14:15:00', 'Consulta ginecológica', NULL),
                                                       ('2024-09-17 10:00:00', 'Consulta de alergias', NULL),
                                                       ('2024-09-17 12:30:00', 'Consulta de otorrinolaringología', NULL),
                                                       ('2024-09-18 09:15:00', 'Consulta de gastroenterología', NULL),
                                                       ('2024-09-18 13:00:00', 'Consulta de oncología', NULL),
                                                       ('2024-09-19 10:30:00', 'Evaluación de lesiones deportivas', NULL),
                                                       ('2024-09-19 14:15:00', 'Consulta de reumatología', NULL),
                                                       ('2024-09-20 09:45:00', 'Consulta de cirugía', NULL),
                                                       ('2024-09-20 12:00:00', 'Consulta de urología', NULL),
                                                       ('2024-09-21 10:15:00', 'Consulta de nefrología', NULL),
                                                       ('2024-09-21 13:30:00', 'Consulta de inmunología', NULL),
                                                       ('2024-09-22 08:45:00', 'Consulta de enfermedades infecciosas', NULL),
                                                       ('2024-09-22 11:30:00', 'Consulta de dolor crónico', NULL),
                                                       ('2024-09-23 09:00:00', 'Consulta de manejo del estrés', NULL),
                                                       ('2024-09-23 12:15:00', 'Consulta de hematología', NULL),
                                                       ('2024-09-24 11:45:00', 'Evaluación de salud mental', NULL),
                                                       ('2024-09-24 14:30:00', 'Consulta de rehabilitación', NULL),
                                                       ('2024-09-25 09:15:00', 'Consulta de patología', NULL),
                                                       ('2024-09-25 12:00:00', 'Consulta de psicología', NULL),
                                                       ('2024-09-26 10:30:00', 'Consulta de endocrinología', NULL),
                                                       ('2024-09-26 14:00:00', 'Consulta de otorrinolaringología', NULL),
                                                       ('2024-09-27 09:45:00', 'Consulta de cirugía ambulatoria', NULL);

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