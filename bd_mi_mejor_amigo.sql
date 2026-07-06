-- ============================================================
--  MI MEJOR AMIGO — Base de datos
--  Importar en phpMyAdmin (XAMPP)
--  Basado en el diagrama entidad-relación de la materia
-- ============================================================

DROP DATABASE IF EXISTS `mi_mejor_amigo`;
CREATE DATABASE `mi_mejor_amigo` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `mi_mejor_amigo`;

-- ---------- Tablas ----------

CREATE TABLE `Direccion`(
    `id_Direccion` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Calle` TEXT NOT NULL,
    `Altura` BIGINT NOT NULL,
    `CP` BIGINT NOT NULL,
    `Depto` VARCHAR(255) NULL
);

CREATE TABLE `Dueno`(
    `DNI_Dueno` BIGINT UNSIGNED NOT NULL,
    `Nombre_Dueno` TEXT NOT NULL,
    `Telefono` BIGINT NOT NULL,
    `id_Direccion` BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY(`DNI_Dueno`)
);

CREATE TABLE `Mascota`(
    `id_Mascota` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Nombre_Mascota` TEXT NOT NULL,
    `Especie` TEXT NOT NULL,
    `Raza` TEXT NOT NULL,
    `Fecha_Nacimiento` DATE NOT NULL,
    `DNI_Dueno` BIGINT UNSIGNED NOT NULL
);

CREATE TABLE `Condicion_Previa`(
    `id_Condicion` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Descripcion` TEXT NOT NULL
);

CREATE TABLE `Veterinario`(
    `Matricula_Vet` BIGINT UNSIGNED NOT NULL,
    `Nombre_Vet` TEXT NOT NULL,
    `Especialidad` TEXT NOT NULL,
    `Horario_Atencion` TIME NOT NULL,
    PRIMARY KEY(`Matricula_Vet`)
);

CREATE TABLE `Consulta`(
    `id_Consulta` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Fecha` DATETIME NOT NULL,
    `Diagnostico` TEXT NULL,
    `Tratamiento` TEXT NULL,
    `id_Mascota` BIGINT UNSIGNED NOT NULL,
    `Matricula_Vet` BIGINT UNSIGNED NOT NULL
);

CREATE TABLE `Medicamento`(
    `id_Medicamento` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Nombre_Medicamento` TEXT NOT NULL,
    `Contraindicacion` TEXT NOT NULL
);

CREATE TABLE `Historial`(
    `id_Historial` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_Condicion` BIGINT UNSIGNED NOT NULL,
    `id_Mascota` BIGINT UNSIGNED NOT NULL
);

CREATE TABLE `Recetar`(
    `id_Receta` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_Consulta` BIGINT UNSIGNED NOT NULL,
    `id_Medicamento` BIGINT UNSIGNED NOT NULL,
    `Frecuencia` TIME NOT NULL,
    `Cantidades` BIGINT NOT NULL,
    `Observaciones` TEXT NOT NULL
);

-- ---------- Claves foráneas ----------

ALTER TABLE `Dueno`
    ADD CONSTRAINT `dueno_id_direccion_foreign` FOREIGN KEY(`id_Direccion`) REFERENCES `Direccion`(`id_Direccion`);
ALTER TABLE `Mascota`
    ADD CONSTRAINT `mascota_dni_dueno_foreign` FOREIGN KEY(`DNI_Dueno`) REFERENCES `Dueno`(`DNI_Dueno`);
ALTER TABLE `Historial`
    ADD CONSTRAINT `historial_id_mascota_foreign` FOREIGN KEY(`id_Mascota`) REFERENCES `Mascota`(`id_Mascota`);
ALTER TABLE `Historial`
    ADD CONSTRAINT `historial_id_condicion_foreign` FOREIGN KEY(`id_Condicion`) REFERENCES `Condicion_Previa`(`id_Condicion`);
ALTER TABLE `Consulta`
    ADD CONSTRAINT `consulta_id_mascota_foreign` FOREIGN KEY(`id_Mascota`) REFERENCES `Mascota`(`id_Mascota`);
ALTER TABLE `Consulta`
    ADD CONSTRAINT `consulta_matricula_vet_foreign` FOREIGN KEY(`Matricula_Vet`) REFERENCES `Veterinario`(`Matricula_Vet`);
ALTER TABLE `Recetar`
    ADD CONSTRAINT `recetar_id_consulta_foreign` FOREIGN KEY(`id_Consulta`) REFERENCES `Consulta`(`id_Consulta`);
ALTER TABLE `Recetar`
    ADD CONSTRAINT `recetar_id_medicamento_foreign` FOREIGN KEY(`id_Medicamento`) REFERENCES `Medicamento`(`id_Medicamento`);

-- ============================================================
--  Datos de ejemplo
-- ============================================================

INSERT INTO `Direccion` (`id_Direccion`, `Calle`, `Altura`, `CP`, `Depto`) VALUES
(1, 'Av. Siempre Viva', 1234, 1414, NULL),
(2, 'Calle Falsa', 742, 1425, '3B'),
(3, 'Av. Corrientes', 3450, 1193, '12A');

INSERT INTO `Dueno` (`DNI_Dueno`, `Nombre_Dueno`, `Telefono`, `id_Direccion`) VALUES
(30111222, 'Manuel Sánchez', 1135246876, 1),
(28999888, 'Lucía Fernández', 1144551122, 2),
(33456789, 'Diego Pérez', 1166778899, 3);

INSERT INTO `Veterinario` (`Matricula_Vet`, `Nombre_Vet`, `Especialidad`, `Horario_Atencion`) VALUES
(12456, 'Dra. Laura Giménez', 'Clínica general', '09:00:00'),
(13890, 'Dr. Martín Rossi', 'Cirugía', '10:00:00'),
(14567, 'Dra. Carla Núñez', 'Dermatología', '08:00:00'),
(15234, 'Dr. Diego Fernández', 'Traumatología', '14:00:00');

INSERT INTO `Medicamento` (`id_Medicamento`, `Nombre_Medicamento`, `Contraindicacion`) VALUES
(1, 'Amoxicilina', 'No administrar en pacientes alérgicos a la penicilina.'),
(2, 'Meloxicam', 'Evitar en insuficiencia renal.'),
(3, 'Apoquel', 'No usar en cachorros menores de 12 meses.');

INSERT INTO `Condicion_Previa` (`id_Condicion`, `Descripcion`) VALUES
(1, 'Alergia a la penicilina'),
(2, 'Displasia de cadera'),
(3, 'Sobrepeso');

INSERT INTO `Mascota` (`id_Mascota`, `Nombre_Mascota`, `Especie`, `Raza`, `Fecha_Nacimiento`, `DNI_Dueno`) VALUES
(1, 'Pequitas', 'Perro', 'Caniche', '2020-05-10', 30111222),
(2, 'Michi', 'Gato', 'Siamés', '2019-11-02', 30111222),
(3, 'Rocky', 'Perro', 'Labrador', '2018-03-21', 28999888),
(4, 'Nube', 'Conejo', 'Belier', '2022-07-15', 33456789);

INSERT INTO `Historial` (`id_Historial`, `id_Condicion`, `id_Mascota`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 2, 3);

INSERT INTO `Consulta` (`id_Consulta`, `Fecha`, `Diagnostico`, `Tratamiento`, `id_Mascota`, `Matricula_Vet`) VALUES
(1, '2026-03-12 10:30:00', 'Otitis externa leve', 'Limpieza y antibiótico tópico', 1, 12456),
(2, '2026-05-20 16:00:00', 'Dermatitis alérgica', 'Control de dieta y medicación', 1, 14567),
(3, '2026-06-02 11:15:00', 'Control post-operatorio', 'Reposo y analgésicos', 3, 13890);

INSERT INTO `Recetar` (`id_Receta`, `id_Consulta`, `id_Medicamento`, `Frecuencia`, `Cantidades`, `Observaciones`) VALUES
(1, 1, 1, '08:00:00', 14, 'Una toma cada 8 horas durante 7 días.'),
(2, 2, 3, '24:00:00', 30, 'Una vez al día con la comida.'),
(3, 3, 2, '12:00:00', 10, 'Cada 12 horas por 5 días.');
