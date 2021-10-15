-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-10-2021 a las 15:13:01
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

CREATE DEFINER=`cloudmarket`@`localhost` PROCEDURE `sp_usuarios_todos` ()  BEGIN
	SELECT U.idusuario, U.nombres, U.usuario, U.contrasena, R.rol, U.estado 
	FROM usuarios U INNER JOIN roles R ON U.idrol=R.idrol
	ORDER BY U.nombres;
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.png',
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombres`, `usuario`, `contrasena`, `rol`, `foto`, `estado`) VALUES
(14, '', 'LPINCAY', '$2y$10$K7EIhxxEYiF6at8ccQ6GhOQB5a1iLy4pEez14eD6W3b1pSDAFZ1Z2', 'user', '', 1),
(22, '', 'DANIEL', '$2y$10$GZbnSQfH5E2FwYKbNOa0Betpzk5UzB8bOMxEV0MVZPEVttz/hKCJ2', 'user', '', 1),
(23, '', 'JUAN', '$2y$10$KO.jnJ/jFMuOG31P.864zOVaF7Q/PI2kVy59zWGQNI3SQgi21oGSS', 'user', '', 1),
(24, '', 'SANDRA', '$2y$10$IQAe2bcdV.X.I.mLnjWVJeP/c3ekIP1Y2T6YrcUvrqE07RAyAwf8a', 'user', '', 1),
(25, '', 'JOSUE', '$2y$10$TrFxvzwMAIwJHaPpxqed0uyp2/cItRG918LzgWzv3bbe4VV1n9qfi', 'user', '', 1),
(26, '', 'LUIS', '$2y$10$Rv6yNn2NJlxk4IDRNXdVSe23CiwKH3eo6kMizTeth4IIhZ7EFcA7i', 'user', '', 1),
(27, '', 'LIAM', '$2y$10$RupwkAzxGituNPMT5hMMb.cxsv0l96rIqRTA7mJqHOQ4yF73DXihO', 'user', '', 1),
(28, '', 'gabriel', '$2y$10$QS1We3hlDg1TLU2SOhPu1Oq4kEcR5uANAC8i0TRxGUlcg7xZsH1g.', 'user', '', 1),
(29, '', 'adonis', '$2y$10$tDpGNv0PI9Fu.9ZXKSf8O.uoH/BPG0Sp.mvalt5y1WPA/Yxeo/Eaq', 'user', '', 1),
(30, '', 'MATEO', '$2y$10$rqrh2J.L84WBNHETV3TpcunIiRzF9bbc2I0EViqqRgwo1SOIFpA5a', 'user', '', 1),
(31, '', 'pincay', '$2y$10$L9FO2b0IlbKVc3iH3Bpr..BnIrq1lW7o0HNbH1frbnm2YBxh017Da', 'user', '', 1),
(33, '', 'RANDY', '$2y$10$DXTJZAYLeGVRO4RQMy1JEeXBWl0hcO1SpNz8tfT4SW.T/gqTU877.', 'user', '', 1);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
