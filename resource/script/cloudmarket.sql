-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-11-2021 a las 18:15:54
-- Versión del servidor: 10.5.12-MariaDB-0ubuntu0.21.04.1
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cloudmarket`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_login` (IN `pusuario` VARCHAR(25))  BEGIN
	SELECT * FROM usuarios WHERE usuario = pusuario;
END$$

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_producto_insert` (IN `pcodigo` VARCHAR(25), IN `pdescripcion` VARCHAR(255), IN `pidcategoria` INT, IN `punidad` VARCHAR(25), IN `pstock` INT, IN `pstockmin` INT, IN `pstockmax` INT, IN `ppcosto` DECIMAL(10,2), IN `pppublico` DECIMAL(10,2), IN `piva` INT)  BEGIN
  INSERT INTO productos(codigo, descripcion, idcategoria, unidad, stock, stockmin, stockmax, pcosto, ppublico, iva)
  VALUES(pcodigo, pdescripcion, pidcategoria, punidad, pstock, pstockmin, pstockmax, ppcosto, pppublico, piva);
END$$

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_rol_selectAll` ()  NO SQL
BEGIN
	SELECT *
    FROM roles;
END$$

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_usuarioID_exists` (IN `pusuario` VARCHAR(25), IN `pidusuario` INT)  NO SQL
BEGIN
	SELECT *
    FROM usuarios
    WHERE usuario = pusuario
    AND idusuario <> pidusuario;
END$$

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_usuario_delete` (IN `pidusuario` INT)  NO SQL
BEGIN
	DELETE FROM usuarios
    WHERE idusuario = pidusuario;
END$$

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_usuario_exists` (IN `pusuario` VARCHAR(25))  NO SQL
BEGIN
	SELECT *
    FROM usuarios
    WHERE usuario = pusuario;
END$$

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_usuario_insert` (IN `pnombres` VARCHAR(255), IN `pusuario` VARCHAR(25), IN `pcontrasena` VARCHAR(550), IN `pidrol` VARCHAR(25))  NO SQL
BEGIN
	INSERT INTO usuarios(nombres, usuario, contrasena, idrol)
    VALUES(pnombres, pusuario, pcontrasena, pidrol);
END$$

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_usuario_selectAll` ()  BEGIN
	SELECT U.idusuario, U.nombres, U.usuario, U.idrol, R.rol, U.foto, U.estado
	FROM usuarios U INNER JOIN roles R ON U.idrol = R.idrol
	ORDER BY nombres;
END$$

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_usuario_selectId` (IN `pidusuario` INT)  NO SQL
BEGIN
	SELECT *
    FROM usuarios
    WHERE idusuario = pidusuario;
END$$

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_usuario_update` (IN `pidusuario` INT, IN `pnombres` VARCHAR(255), IN `pusuario` VARCHAR(25), IN `pidrol` INT)  NO SQL
BEGIN
	UPDATE usuarios set
    	nombres = pnombres,
        usuario = pusuario,
        idrol 	= pidrol
    WHERE idusuario = pidusuario;    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `categoria`, `estado`) VALUES
(2, 'GASEOSAS', 1),
(3, 'LACTEOS', 1),
(4, 'GRANOS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `codigo` varchar(25) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `unidad` varchar(25) NOT NULL,
  `stock` int(11) NOT NULL,
  `stockmin` int(11) NOT NULL,
  `stockmax` int(11) NOT NULL,
  `pcosto` decimal(10,2) NOT NULL,
  `ppublico` decimal(10,2) NOT NULL,
  `iva` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(25) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `rol`, `estado`) VALUES
(1, 'ADMIN', 1),
(2, 'CAJA', 1),
(3, 'BODEGA', 1),
(4, 'USUARIO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `contrasena` varchar(550) NOT NULL,
  `idrol` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'user-default.png',
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
