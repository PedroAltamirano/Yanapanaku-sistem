-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-06-2019 a las 17:54:38
-- Versión del servidor: 5.7.24
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `c4yanapanaku`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abastecimiento`
--

DROP TABLE IF EXISTS `abastecimiento`;
CREATE TABLE IF NOT EXISTS `abastecimiento` (
  `idabastecimiento` int(11) NOT NULL AUTO_INCREMENT,
  `fechacreacion` date NOT NULL,
  `inicio` int(11) NOT NULL,
  `beneficiario` char(10) COLLATE utf8_spanish2_ci NOT NULL,
  `total` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idabastecimiento`),
  UNIQUE KEY `inicio` (`inicio`) USING BTREE,
  KEY `beneficiario_ced_fk` (`beneficiario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abastproductos`
--

DROP TABLE IF EXISTS `abastproductos`;
CREATE TABLE IF NOT EXISTS `abastproductos` (
  `idabstprod` int(11) NOT NULL AUTO_INCREMENT,
  `fechacreacion` date NOT NULL,
  `inicio` int(11) NOT NULL,
  `producto` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `unidad` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` tinyint(4) NOT NULL,
  `valor` decimal(4,2) NOT NULL,
  `total` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idabstprod`),
  KEY `inicio_fk` (`inicio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `fechacreacion` date NOT NULL,
  `producto` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `unidad` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `maxcant` tinyint(4) NOT NULL,
  `seccion` tinyint(4) NOT NULL,
  `valor` decimal(4,2) NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idproducto`),
  KEY `seccion_id_fk` (`seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `fechacreacion`, `producto`, `unidad`, `maxcant`, `seccion`, `valor`, `disponibilidad`) VALUES
(5, '2018-10-21', 'Fideo Cayambe', 'paquete 400g', 5, 1, '0.75', 0),
(6, '2018-10-21', 'Quinua', 'lb', 5, 1, '1.00', 1),
(7, '2018-10-21', 'Avena Pesada', 'lb', 5, 1, '0.40', 1),
(8, '2018-10-21', 'Arroz de Cebada', 'lb', 10, 1, '0.70', 1),
(9, '2018-10-21', 'Harina de Haba', 'lb', 5, 1, '0.75', 1),
(10, '2018-10-21', 'Harina de Maíz', 'lb', 5, 1, '0.75', 1),
(11, '2018-10-21', 'Máchica', 'lb', 5, 1, '0.75', 1),
(12, '2018-10-21', 'Trigo Partido', 'lb', 5, 1, '0.70', 1),
(13, '2018-10-21', 'Arrocillo', 'lb', 5, 1, '0.45', 1),
(14, '2018-10-21', 'Arroz', 'lb', 10, 1, '0.60', 1),
(15, '2018-10-21', 'Azúcar', 'lb', 5, 1, '0.50', 1),
(16, '2018-10-21', 'Azúcar Morena', 'lb', 5, 1, '1.00', 1),
(17, '2018-10-21', 'Panela', 'unidad', 5, 1, '0.25', 1),
(18, '2018-10-21', 'Sal', 'paquete mediano', 5, 1, '0.55', 1),
(19, '2018-10-21', 'Gelatina', 'unidad', 5, 1, '2.75', 1),
(20, '2018-10-21', 'Gelatina mediana', 'unidad', 5, 1, '1.75', 1),
(21, '2018-10-21', 'Aceite Favorita', 'envase pequeño', 2, 1, '1.00', 1),
(22, '2018-10-21', 'Aceite Palma de Oro', 'envase pequeño', 2, 1, '0.80', 1),
(23, '2018-10-21', 'Aceite de Color', 'envase pequeño', 2, 1, '0.50', 1),
(24, '2018-10-21', 'Huevos', 'cubeta', 1, 1, '3.50', 1),
(25, '2018-10-21', 'Huevos', 'media cubeta', 2, 1, '1.80', 1),
(26, '2018-10-21', 'Pan su pan', 'paquete', 5, 1, '1.70', 1),
(27, '2018-10-21', 'Pan integral', 'paquete', 5, 1, '1.95', 1),
(28, '2018-10-21', 'Galletas ducales', 'paquete', 5, 1, '2.25', 1),
(29, '2018-10-21', 'Atún grande', 'unidad', 5, 1, '1.50', 1),
(30, '2018-10-21', 'Fósforos', 'unidad', 5, 1, '0.10', 1),
(31, '2018-10-21', 'Café', 'unidad', 5, 1, '1.00', 1),
(32, '2018-10-21', 'Especies', 'unidad', 10, 1, '0.30', 1),
(33, '2018-10-21', 'Magui Criollita', 'cubos', 5, 1, '0.30', 1),
(34, '2018-10-21', 'Ají frasco', 'unidad', 5, 1, '0.80', 1),
(35, '2018-10-21', 'Atún tri pack', 'unidad', 5, 1, '2.50', 1),
(36, '2018-10-21', 'Sopa Magui', 'unidad', 5, 1, '0.80', 1),
(37, '2018-10-21', 'Cremas Magui', 'unidad', 5, 1, '1.25', 1),
(38, '2018-10-21', 'Vela', 'unidad', 5, 1, '1.50', 1),
(39, '2018-10-21', 'Cereales', 'funda', 5, 1, '1.60', 1),
(40, '2018-10-21', 'Te aromáticos', 'paquete', 5, 1, '1.20', 1),
(41, '2018-10-21', 'Mantequilla', 'sobre', 5, 1, '0.40', 1),
(42, '2018-10-21', 'Tallarín oriental de media', 'litro', 5, 1, '0.95', 1),
(43, '2018-10-21', 'Panela granulada', 'lb', 5, 1, '1.15', 1),
(44, '2018-10-21', 'Mostaza, salsa y mayonesa en sobre', 'unidad', 5, 1, '0.30', 1),
(45, '2018-10-21', 'Lenteja', 'lb', 5, 1, '1.00', 1),
(46, '2018-10-21', 'Maíz', 'lb', 5, 1, '1.25', 1),
(47, '2018-10-21', 'Canguíl', 'lb', 5, 1, '0.60', 1),
(48, '2018-10-21', 'Frejol seco', 'lb', 5, 1, '0.90', 1),
(49, '2018-10-21', 'Alverja seca', 'lb', 5, 1, '0.90', 1),
(50, '2018-10-21', 'Champiñones', 'sobre', 3, 1, '2.50', 1),
(51, '2018-10-21', 'Miel de abeja', '1/2 lt', 2, 1, '1.50', 1),
(52, '2018-10-21', 'Guineos', 'unidad', 20, 2, '0.10', 1),
(53, '2018-10-21', 'Piña', 'unidad', 5, 2, '1.00', 1),
(54, '2018-10-21', 'Pepino', 'unidad', 20, 2, '0.25', 1),
(55, '2018-10-21', 'Maracuyá', 'unidad', 20, 2, '0.25', 1),
(56, '2018-10-21', 'Mandarina', 'unidad', 20, 2, '0.15', 1),
(57, '2018-10-21', 'Babaco', 'unidad', 20, 2, '1.00', 1),
(58, '2018-10-21', 'Sandia', 'unidad', 3, 2, '2.00', 1),
(59, '2018-10-21', 'Naranja', 'unidad', 20, 2, '0.25', 1),
(60, '2018-10-21', 'Limón', 'unidad', 20, 2, '0.25', 1),
(61, '2018-10-21', 'Mora', 'lb', 5, 2, '1.00', 1),
(62, '2018-10-21', 'Manzana', 'unidad', 20, 2, '0.25', 1),
(63, '2018-10-21', 'Pera', 'unidad', 20, 2, '0.25', 1),
(64, '2018-10-21', 'Kiwi', 'unidad', 20, 2, '0.25', 1),
(65, '2018-10-21', 'Frutilla', 'unidad', 20, 2, '1.00', 1),
(66, '2018-10-21', 'Tomate de árbol', 'unidad', 20, 2, '0.15', 1),
(67, '2018-10-21', 'Papaya', 'unidad', 20, 2, '1.00', 1),
(68, '2018-10-21', 'Naranjilla', 'unidad', 20, 2, '0.10', 1),
(69, '2018-10-21', 'Guayaba', 'unidad', 20, 2, '0.10', 1),
(70, '2018-10-21', 'Uvas negras', 'lb', 5, 2, '1.00', 1),
(71, '2018-10-21', 'Uvas rojas', 'lb', 5, 2, '1.50', 1),
(72, '2018-10-21', 'Tamarindo pelado', 'paquete', 5, 2, '1.25', 1),
(73, '2018-10-21', 'Granadilla', 'unidad', 20, 2, '0.25', 1),
(74, '2018-10-21', 'Limón sutil', 'unidad', 20, 2, '0.10', 1),
(75, '2018-10-21', 'Taxo', 'lb', 5, 2, '0.10', 1),
(76, '2018-10-21', 'Guanábana en tarrina', 'unidad', 5, 2, '1.00', 1),
(77, '2018-10-21', 'Melón', 'unidad', 5, 2, '1.00', 1),
(78, '2018-10-21', 'Durazno', 'unidad', 20, 2, '0.25', 1),
(79, '2018-10-21', 'Zanahoria amarilla', 'unidad', 20, 3, '0.10', 1),
(80, '2018-10-21', 'Pimiento', 'unidad', 20, 3, '0.10', 1),
(81, '2018-10-21', 'Ajo', 'lb', 5, 3, '0.25', 1),
(82, '2018-10-21', 'Cebolla larga', 'unidad', 20, 3, '0.15', 1),
(83, '2018-10-21', 'Cebolla paiteña', 'unidad', 20, 3, '0.15', 1),
(84, '2018-10-21', 'Tomate riñón', 'unidad', 20, 3, '0.25', 1),
(85, '2018-10-21', 'Coliflor', 'unidad', 20, 3, '0.75', 1),
(86, '2018-10-21', 'Brócoli', 'unidad', 20, 3, '0.75', 1),
(87, '2018-10-21', 'Pepinillo', 'unidad', 20, 3, '0.25', 1),
(88, '2018-10-21', 'Col verde', 'unidad', 20, 3, '0.50', 1),
(89, '2018-10-21', 'Col morada', 'unidad', 20, 3, '0.50', 1),
(90, '2018-10-21', 'Lechuga', 'unidad', 20, 3, '0.70', 1),
(91, '2018-10-21', 'Aguacate', 'unidad', 20, 3, '0.50', 1),
(92, '2018-10-21', 'Acelga', 'unidad', 20, 3, '0.25', 1),
(93, '2018-10-21', 'Espinaca', 'unidad', 20, 3, '0.50', 1),
(94, '2018-10-21', 'Plátano verde', 'unidad', 20, 3, '0.30', 1),
(95, '2018-10-21', 'Maduro', 'unidad', 20, 3, '0.30', 1),
(96, '2018-10-21', 'Vainitas', 'paquete', 5, 3, '0.25', 1),
(97, '2018-10-21', 'Cilantro, perejil y apio', 'paquete', 5, 3, '0.25', 1),
(98, '2018-10-21', 'Choclo desgranado', 'lb', 5, 3, '1.00', 1),
(99, '2018-10-21', 'Haba tierna', 'lb', 5, 3, '1.00', 1),
(100, '2018-10-21', 'Alverja', 'lb', 5, 3, '1.25', 1),
(101, '2018-10-21', 'Frejol', 'lb', 5, 3, '1.00', 1),
(102, '2018-10-21', 'Mote cocido', 'lb', 3, 3, '1.50', 1),
(103, '2018-10-21', 'Papas capira chola y única', 'lb', 5, 3, '0.25', 1),
(104, '2018-10-21', 'Carne fileteada', 'lb', 5, 4, '2.75', 1),
(105, '2018-10-21', 'Carne molida', 'lb', 5, 4, '1.60', 1),
(106, '2018-10-21', 'Carne Ñuta', 'lb', 5, 4, '2.50', 1),
(107, '2018-10-21', 'Costilla', 'lb', 5, 4, '1.60', 1),
(108, '2018-10-21', 'Hueso', 'lb', 5, 4, '1.10', 1),
(109, '2018-10-21', 'Carne de chancho', 'lb', 5, 4, '2.25', 1),
(110, '2018-10-21', 'Chuleta', 'lb', 5, 4, '2.50', 1),
(111, '2018-10-21', 'Cuero', 'lb', 5, 4, '2.25', 1),
(112, '2018-10-21', 'Pollo', 'lb', 5, 4, '1.50', 1),
(113, '2018-10-21', 'Pechuga', 'lb', 5, 4, '1.60', 1),
(114, '2018-10-21', 'Leche condensada', 'unidad', 2, 5, '1.50', 1),
(115, '2018-10-21', 'Leche entera', 'unidad', 5, 5, '1.00', 1),
(116, '2018-10-21', 'Avena de litro', 'pqt', 5, 5, '2.25', 1),
(117, '2018-10-21', 'Avena de naranjilla', 'pqt', 5, 5, '1.90', 1),
(118, '2018-10-21', 'Yogurt', 'funda', 5, 5, '1.50', 1),
(119, '2018-10-21', 'Yogurt en litro tetrapack', 'litro', 5, 5, '3.05', 1),
(120, '2018-10-21', 'Queso crema pequeño', 'unidad', 5, 5, '0.50', 1),
(121, '2018-10-21', 'Queso crema grande', 'unidad', 3, 5, '2.60', 1),
(122, '2018-10-21', 'Salchichas diarias de pollo', 'paquete', 5, 5, '0.75', 1),
(123, '2018-10-21', 'Salchicha diaria de carne', 'paquete', 5, 5, '0.65', 1),
(124, '2018-10-21', 'Mortadela diaria de carne', 'unidad', 5, 5, '0.65', 1),
(125, '2018-10-21', 'Mortadela diaria de pollo', 'unidad', 5, 5, '0.75', 1),
(126, '2018-10-21', 'Leche entera', 'litro', 5, 6, '0.85', 1),
(127, '2018-10-21', 'Leche semidescremada', 'litro', 5, 6, '0.85', 1),
(128, '2018-10-21', 'Leche descremada', 'litro', 5, 6, '0.90', 1),
(129, '2018-10-21', 'Leche deslactosada', 'litro', 5, 6, '0.95', 1),
(130, '2018-10-21', 'Avena de litro', 'litro', 5, 6, '1.05', 1),
(131, '2018-10-21', 'Avena de leche', 'litro', 5, 6, '1.25', 1),
(132, '2018-10-21', 'Queso de mesa', 'unidad', 3, 6, '2.25', 1),
(133, '2018-10-21', 'Queso de sopa', 'unidad', 3, 6, '2.25', 1),
(134, '2018-10-21', 'Toallas nosotras', 'pqt', 5, 7, '1.50', 1),
(135, '2018-10-21', 'Colgate mediano', 'unidad', 2, 7, '1.00', 1),
(136, '2018-10-21', 'Colgate pequeño', 'unidad', 2, 7, '0.50', 1),
(137, '2018-10-21', 'Jabón lava todo', 'unidad', 2, 7, '0.65', 1),
(138, '2018-10-21', 'Papel higiénico x cuatro rollos', 'unidad', 2, 7, '1.00', 1),
(139, '2018-10-21', 'Tips ambiental', 'unidad', 2, 7, '1.30', 1),
(140, '2018-10-21', 'Desinfectante grande', 'unidad', 2, 7, '1.55', 1),
(141, '2018-10-21', 'Desinfectante pequeño', 'unidad', 2, 7, '0.55', 1),
(142, '2018-10-21', 'Lava vajilla', 'unidad', 2, 7, '1.55', 1),
(143, '2018-10-21', 'Jabón baño', '3 unidades', 2, 7, '3.00', 1),
(144, '2018-10-21', 'Cepillo dental', 'unidad', 2, 7, '1.00', 1),
(145, '2018-10-21', 'Esponjas de platos salva uñas', 'unidad', 2, 7, '0.60', 1),
(146, '2018-10-21', 'Escoba', 'unidad', 2, 7, '2.25', 1),
(147, '2018-10-21', 'Recogedor de basura', 'unidad', 2, 7, '1.60', 1),
(148, '2018-10-21', 'Servilletas paquete económico', 'unidad', 2, 7, '0.50', 1),
(149, '2018-10-21', 'Sapollo mata moscas', 'unidad', 2, 7, '4.00', 1),
(150, '2018-10-21', 'Papel higiénico institucional 180m', 'unidad', 2, 7, '2.00', 1),
(151, '2018-10-21', 'Papel higiénico familia megarrollo', 'unidad', 2, 7, '1.00', 1),
(152, '2018-10-21', 'Detergente polvo para ropa', 'unidad', 2, 7, '1.00', 1),
(153, '2018-10-21', 'Cloro funda', 'unidad', 2, 7, '0.35', 1),
(154, '2018-10-21', 'Toallas desechables cosina', 'unidad', 2, 7, '1.25', 1),
(155, '2019-05-16', 'queso fondeau', 'kg', 3, 6, '8.00', 1),
(156, '2019-05-17', 'quese', 'lb', 10, 1, '0.10', 1),
(157, '2019-05-17', 'quese', 'lb', 10, 6, '30.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

DROP TABLE IF EXISTS `seccion`;
CREATE TABLE IF NOT EXISTS `seccion` (
  `idseccion` tinyint(4) NOT NULL AUTO_INCREMENT,
  `fechacreacion` date NOT NULL,
  `seccion` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idseccion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`idseccion`, `fechacreacion`, `seccion`) VALUES
(1, '2018-09-24', 'GENÉRICOS'),
(2, '2018-09-24', 'FRUTAS'),
(3, '2018-09-24', 'VERDURAS'),
(4, '2018-09-24', 'CARNES'),
(5, '2018-09-24', 'LACTEOS/TONI'),
(6, '2018-09-24', 'LACTEOS/VITA'),
(7, '2018-09-24', 'HIGIENE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

DROP TABLE IF EXISTS `sistema`;
CREATE TABLE IF NOT EXISTS `sistema` (
  `idevento` tinyint(2) NOT NULL AUTO_INCREMENT,
  `fechacreacion` date NOT NULL,
  `fechamod` date NOT NULL,
  `apertura` date NOT NULL,
  `cierre` date NOT NULL,
  PRIMARY KEY (`idevento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sistema`
--

INSERT INTO `sistema` (`idevento`, `fechacreacion`, `fechamod`, `apertura`, `cierre`) VALUES
(1, '2019-06-12', '2019-06-12', '2019-06-12', '2029-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `fechacreacion` date NOT NULL,
  `usuario` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `password` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `cedula` char(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombres` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `email` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`fechacreacion`, `usuario`, `password`, `cedula`, `nombres`, `apellidos`, `email`, `perfil`, `estado`) VALUES
('2019-06-12', 'admin', 'admin', '1000000000', 'Administrador', 'admin', 'admin@mail.com', 'administrador', 1),
('2019-06-12', 'demo', 'demo', '1000000001', 'Demostración', 'demo', 'demo@mail.com', 'usuario', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abastecimiento`
--
ALTER TABLE `abastecimiento`
  ADD CONSTRAINT `beneficiario_ced_fk` FOREIGN KEY (`beneficiario`) REFERENCES `usuarios` (`cedula`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `abastproductos`
--
ALTER TABLE `abastproductos`
  ADD CONSTRAINT `inicio_fk` FOREIGN KEY (`inicio`) REFERENCES `abastecimiento` (`inicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `seccion_id_fk` FOREIGN KEY (`seccion`) REFERENCES `seccion` (`idseccion`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
