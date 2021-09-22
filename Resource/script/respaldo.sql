-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.16-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla cloudmarket.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(25) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cloudmarket.roles: ~3 rows (aproximadamente)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`idrol`, `rol`, `estado`) VALUES
	(1, 'ADMINISTRADOR', 1),
	(2, 'BODEGA', 1),
	(3, 'CAJA', 1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla cloudmarket.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `idrol` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.png',
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idusuario`),
  KEY `idrol` (`idrol`),
  CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cloudmarket.usuarios: ~8 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idusuario`, `nombres`, `usuario`, `contrasena`, `idrol`, `foto`, `estado`) VALUES
	(1, 'LUIS PINCAY', 'LPINCAY', '123', 1, 'default.png', 1),
	(5, 'Jiménez Sancán Roberto', 'JSROBERTO', 'JSROBERTO', 2, 'default.png', 1),
	(6, 'MENDOZA MORALES XIMENA', 'MMXIMENA', 'MMXIMENA', 3, 'default.png', 1),
	(7, 'Carvajal Intriago Pedro', 'PCINTRIAGO', 'PCINTRIAGO', 3, 'default.png', 1),
	(8, 'Hernández Loor Carmen', 'CARMENHL', 'CARMENHL', 3, 'default.png', 1),
	(9, 'Pérez Anchundia Julio', 'JULIOPAN', 'JULIOPAN', 2, 'default.png', 1),
	(11, 'MENÉNDEZ LOOR LUCÍA', 'MENENLL', 'MENENLL', 3, 'default.png', 1),
	(12, 'FIGUEROA LÓPEZ MARÍA', 'FLOMAR', 'FLOMAR', 3, 'default.png', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para procedimiento cloudmarket.sp_usuarios_todos
DROP PROCEDURE IF EXISTS `sp_usuarios_todos`;
DELIMITER //
CREATE PROCEDURE `sp_usuarios_todos`()
BEGIN
	SELECT U.idusuario, U.nombres, U.usuario, U.contrasena, R.rol, U.estado 
	FROM usuarios U INNER JOIN roles R ON U.idrol=R.idrol
	ORDER BY U.nombres;
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
