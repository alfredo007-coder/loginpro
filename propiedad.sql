-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para prueba
CREATE DATABASE IF NOT EXISTS `prueba` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `prueba`;

-- Volcando estructura para tabla prueba.evento
DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf16_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf16_spanish2_ci DEFAULT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaEgreso` date NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `idPropiedad` smallint(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf16_spanish2_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf16_spanish2_ci NOT NULL DEFAULT '',
  `wapp1` varchar(255) COLLATE utf16_spanish2_ci NOT NULL DEFAULT '',
  `wapp2` varchar(255) COLLATE utf16_spanish2_ci NOT NULL DEFAULT '',
  `cantPersonas` tinyint(4) NOT NULL DEFAULT 0,
  `lugarResidencia` varchar(255) COLLATE utf16_spanish2_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla prueba.propiedad
DROP TABLE IF EXISTS `propiedad`;
CREATE TABLE IF NOT EXISTS `propiedad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `detalles` longtext COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
