# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2023-08-15 11:33:44
# Generator: MySQL-Front 5.3  (Build 8.5)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "estudiantes"
#

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `nombres` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `apellidos` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `acudiente` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fecha_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

#
# Data for table "estudiantes"
#

INSERT INTO `estudiantes` VALUES (6,'1234156789','linas','ramirez','linarmz2023@hotmail.com','123456789','madre lina','bogotá','2023-08-15 11:29:51');

#
# Structure for table "materias"
#

CREATE TABLE `materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

#
# Data for table "materias"
#

INSERT INTO `materias` VALUES (5,'ciencias naturales','2023-08-15 11:30:15');

#
# Structure for table "notas"
#

CREATE TABLE `notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estudiante` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `materia` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `nota1` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `nota2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `nota3` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

#
# Data for table "notas"
#

INSERT INTO `notas` VALUES (27,'1234156789','5','9','9','8','buen estudiante');

#
# Structure for table "roles"
#

CREATE TABLE `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "roles"
#


#
# Structure for table "users"
#

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'cdgc9637@outlook.com','25f9e794323b453885f5181f1b624d0b','Cristhian ','Galvis','147258369',1);
