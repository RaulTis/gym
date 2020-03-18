-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-03-2020 a las 06:36:14
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gym`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spListarArticulos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarArticulos` ()  NO SQL
select * from articulos$$

DROP PROCEDURE IF EXISTS `spListarClientes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarClientes` ()  NO SQL
select * from clientes$$

DROP PROCEDURE IF EXISTS `spListarCobros`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spListarCobros` ()  NO SQL
select * from cobros inner join clientes on cob_idCliente=cli_id inner join articulos on cob_idCodigo=art_codigo$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_codigo` varchar(50) NOT NULL,
  `art_descripcion` varchar(150) NOT NULL,
  `art_costo` double NOT NULL,
  `art_tipo` varchar(20) NOT NULL,
  `art_estatus` varchar(1) NOT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`art_id`, `art_codigo`, `art_descripcion`, `art_costo`, `art_tipo`, `art_estatus`) VALUES
(2, '2', 'Mes', 300, 'Mes', 'A'),
(3, '3', 'sdasdasd', 123, 'Quincena', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nombre` varchar(200) NOT NULL,
  `cli_direccion` varchar(150) NOT NULL,
  `cli_colonia` varchar(50) NOT NULL,
  `cli_ciudad` varchar(50) NOT NULL,
  `cli_telefono` varchar(20) NOT NULL,
  `cli_observaciones` varchar(200) NOT NULL,
  `cli_tipousu` int(2) NOT NULL,
  `cli_email` varchar(150) NOT NULL,
  `cli_sexo` varchar(1) NOT NULL,
  `cli_estatus` varchar(1) NOT NULL,
  `cli_clave` varchar(100) NOT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cli_id`, `cli_nombre`, `cli_direccion`, `cli_colonia`, `cli_ciudad`, `cli_telefono`, `cli_observaciones`, `cli_tipousu`, `cli_email`, `cli_sexo`, `cli_estatus`, `cli_clave`) VALUES
(1, 'Raul Vazquez T', 'Conocido', 'centro', 'delicias', '12121212', 'Abc', 1, 'asdasd@hotmail.com', 'M', 'A', '1212'),
(7, 'roberto', 'av. abraham', 'solidaridad', 'delicias', '3221', 'Excelente', 1, 'roberto@hotmail.com', 'M', 'A', '1234'),
(6, 'Jackelin', 'conocido', 'centro', 'delicias', '1', 'buena salud', 1, 'jacky@hotmail.com', 'F', 'A', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobros`
--

DROP TABLE IF EXISTS `cobros`;
CREATE TABLE IF NOT EXISTS `cobros` (
  `cob_id` int(11) NOT NULL AUTO_INCREMENT,
  `cob_fecha` date NOT NULL,
  `cob_hora` varchar(15) NOT NULL,
  `cob_idCliente` int(11) NOT NULL,
  `cob_idCodigo` int(11) NOT NULL,
  `cob_tipo` varchar(20) NOT NULL,
  `cob_costo` double NOT NULL,
  `cob_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`cob_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cobros`
--

INSERT INTO `cobros` (`cob_id`, `cob_fecha`, `cob_hora`, `cob_idCliente`, `cob_idCodigo`, `cob_tipo`, `cob_costo`, `cob_cantidad`) VALUES
(1, '2020-03-17', '06:04', 1, 2, 'Mes', 300, 1),
(2, '2020-03-17', '06:04', 1, 2, 'Mes', 300, 1),
(3, '2020-03-17', '06:12', 1, 3, 'Quincena', 123, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_usuario` varchar(150) NOT NULL,
  `usu_clave` varchar(200) NOT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_usuario`, `usu_clave`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
