-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.7.0.6903
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para finanzas
CREATE DATABASE IF NOT EXISTS `finanzas` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `finanzas`;

-- Volcando estructura para tabla finanzas.cuentas
CREATE TABLE IF NOT EXISTS `cuentas` (
  `cuenta` varchar(8) NOT NULL DEFAULT '',
  `nombre` varchar(50) DEFAULT '',
  PRIMARY KEY (`cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla finanzas.inversiones
CREATE TABLE IF NOT EXISTS `inversiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `codigo` varchar(8) NOT NULL DEFAULT '',
  `cantidad` int(11) unsigned NOT NULL DEFAULT 0,
  `valor` decimal(20,2) NOT NULL DEFAULT 0.00,
  `total` decimal(20,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla finanzas.movimientos
CREATE TABLE IF NOT EXISTS `movimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `detalle` varchar(50) NOT NULL DEFAULT '',
  `ingreso` decimal(12,2) NOT NULL DEFAULT 0.00,
  `egreso` decimal(12,2) NOT NULL DEFAULT 0.00,
  `tipo` varchar(8) NOT NULL DEFAULT '',
  `proveedor` int(11) NOT NULL DEFAULT 0,
  `mensuales` char(1) NOT NULL DEFAULT '',
  `origen` int(11) NOT NULL DEFAULT 0,
  `ref` float NOT NULL DEFAULT 0,
  `ref_descr` varchar(20) NOT NULL DEFAULT '',
  `cuotas` int(11) NOT NULL DEFAULT 0,
  `valor_cuota` float NOT NULL DEFAULT 0,
  `mes` int(11) NOT NULL DEFAULT 0,
  `año` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `proveedor` (`proveedor`),
  KEY `origen` (`origen`),
  KEY `tipo` (`tipo`),
  KEY `fecha` (`fecha`),
  CONSTRAINT `origen` FOREIGN KEY (`origen`) REFERENCES `origen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `proveedor` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipo` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12166 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla finanzas.origen
CREATE TABLE IF NOT EXISTS `origen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `credito` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla finanzas.plazos_fijos
CREATE TABLE IF NOT EXISTS `plazos_fijos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deposito` bigint(20) NOT NULL DEFAULT 0,
  `fecha` date NOT NULL,
  `capital` float NOT NULL DEFAULT 0,
  `interes` float NOT NULL DEFAULT 0,
  `monto` float NOT NULL DEFAULT 0,
  `dias` int(11) NOT NULL DEFAULT 0,
  `tna` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla finanzas.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT '',
  `cuit` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla finanzas.resumenbna
CREATE TABLE IF NOT EXISTS `resumenbna` (
  `fecha` date DEFAULT NULL,
  `hora` char(8) DEFAULT NULL,
  `detalle` varchar(50) DEFAULT NULL,
  `movimiento` char(12) DEFAULT NULL,
  `comprobante` char(12) DEFAULT NULL,
  `debito` float DEFAULT 0,
  `credito` float DEFAULT 0,
  `saldo` float DEFAULT 0,
  `cuenta` char(5) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `obs` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla finanzas.tipo
CREATE TABLE IF NOT EXISTS `tipo` (
  `tipo` varchar(8) NOT NULL DEFAULT '',
  `detalle` varchar(50) NOT NULL DEFAULT '',
  `cuenta` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla finanzas.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `apellido` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
