-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-11-2021 a las 19:51:56
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
CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_empresa_view` ()  NO SQL
BEGIN
	SELECT *
    FROM empresa;
END$$

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

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_usuario_change` (IN `pidusuario` INT)  NO SQL
BEGIN
	SELECT @estado:=estado FROM usuarios WHERE idusuario = pidusuario;
    
    IF @estado = 1 THEN
    	SET @estado = 0;
    ELSE
    	SET @estado = 1;
    END IF;
    
    UPDATE usuarios set estado = @estado WHERE idusuario = pidusuario;
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

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_usuario_view` (IN `pidusuario` INT)  NO SQL
BEGIN
	SELECT U.idusuario, U.nombres, U.usuario, R.rol, U.foto, U.estado
	FROM usuarios U INNER JOIN roles R ON U.idrol = R.idrol
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
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `rucempresa` varchar(13) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'user-default.png',
  `razonsocial` varchar(500) NOT NULL,
  `actividadeconomica` varchar(500) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`rucempresa`, `logo`, `razonsocial`, `actividadeconomica`, `ciudad`, `direccion`, `telefono`, `email`) VALUES
('1310687114001', 'user-default.png', 'Cloud Solutions', 'VENTA AL POR MENOR DE LAPTOPS, PARTES Y PIEZAS DE COMPUTADORAS', 'Portoviejo', 'Av América y San Rafael', '0985946500', 'info@cloudsolutions.com');

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
(1, 'Admin', 1),
(2, 'Caja', 1),
(3, 'Bodega', 1),
(4, 'Usuario', 1);

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
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombres`, `usuario`, `contrasena`, `idrol`, `foto`, `estado`) VALUES
(323, 'Luis Daniel Pincay Toala', 'LPINCAY', 'ME54bkdYZ0xGM21rOHg4dkJNOUNyUT09', 1, 'user-default.png', 1),
(347, 'Zambrano Zapata Selena Mercedes', 'ZAZASEMER', 'b3A0aWZIZHM2VFdCN3dWcS9vV0lsQT09', 4, 'user-default.png', 1),
(350, 'Navarrete Sornoza Julio César', 'JCNAVASORNOZA', 'NUNIOWZ3RFBJVWlrMXE1d0R5Q0dKZz09', 4, 'user-default.png', 1),
(360, 'Saltos Rivas Hipatia Lucrecia', 'HIPATIASR', 'Sk9DQlV1RGhNRjJuVnRFUDBLbytXdz09', 2, 'user-default.png', 0),
(361, 'Anchundia Castillo Leonardo Gregorio', 'ANCHUDIALG', 'T21HRmVCWm9WTTFORmx2UXY4bXRmdz09', 3, 'user-default.png', 0),
(362, 'Soledispa Arcentales Aracely Stefanía', 'ARACELYSS', 'WG5QN1oxZ2FqMTZEUUJ1bVdwbkdEZz09', 2, 'user-default.png', 1),
(364, 'Parrales Mendoza Juana Guillermina', 'GUILLERMINA', 'eU5pRHBYYkNpMkdGZVJScFZRKzFBUT09', 2, 'user-default.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`rucempresa`);

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
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

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
