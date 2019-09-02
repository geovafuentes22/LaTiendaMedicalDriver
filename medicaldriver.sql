-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2019 a las 13:22:54
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medicaldriver`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar cliente` (IN `p0` INT, IN `p1` VARCHAR(30), IN `p2` VARCHAR(30), IN `p3` VARCHAR(9), IN `p4` VARCHAR(30))  NO SQL
INSERT INTO `cliente`(`id_cliente`, `nombre`, `apellido`, `Dui`, `correo`) VALUES (@p0,@p1,@p2,@p3,@p4)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar producto` (IN `p0` INT, IN `p1` VARCHAR(30), IN `p2` VARCHAR(30), IN `p3` VARCHAR(30), IN `p4` VARCHAR(30), IN `p5` VARCHAR(30), IN `p6` INT, IN `p7` INT)  NO SQL
INSERT INTO `producto`(`id_producto`, `codigo`, `precio`, `estado`, `cantidad`, `descripcion`, `id_garantia`, `id_categoria`) VALUES (@p0,@p1,@p2,@p3,@p4,@p5,@p6,@p7)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `foto`) VALUES
(1, 'Silla de Ruedas', '5d294bebbfee3.jpg'),
(2, 'Bastones', '5d294bf7dac49.jpg'),
(3, 'Accesorios', '5d294c037d0ad.jpg'),
(4, 'Repuestos', '5d294c0e7268a.jpg'),
(5, 'Zapatos', '5d2c898ca8f07.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `Dui` varchar(9) NOT NULL,
  `correo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `Dui`, `correo`) VALUES
(1, 'Geovany', 'Fuentes', '060994819', 'geofuentes.gf@gmail.com'),
(2, 'Joel', 'Novoa', '056498098', 'Joelnovoa23@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_detalle` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `cantidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id_detalle`, `id_producto`, `id_pedido`, `cantidad`) VALUES
(0, 1, 1, '4'),
(1, 38, 86, '13'),
(2, 31, 10, '73'),
(3, 32, 86, '59'),
(4, 5, 68, '59'),
(5, 63, 26, '97'),
(6, 21, 95, '23'),
(7, 12, 10, '89'),
(8, 92, 59, '11'),
(9, 64, 59, '29'),
(10, 75, 4, '7'),
(11, 47, 80, '23'),
(12, 92, 98, '31'),
(13, 59, 36, '53'),
(14, 77, 73, '47'),
(15, 78, 20, '43'),
(16, 28, 80, '7'),
(17, 75, 78, '71'),
(18, 87, 67, '53'),
(19, 87, 46, '11'),
(20, 63, 68, '53'),
(21, 51, 84, '31'),
(22, 87, 56, '73'),
(23, 75, 46, '71'),
(25, 36, 35, '41'),
(26, 32, 93, '43'),
(27, 68, 31, '5'),
(28, 28, 82, '1'),
(29, 67, 8, '73'),
(30, 56, 40, '11'),
(31, 41, 97, '3'),
(32, 33, 81, '89'),
(33, 89, 36, '83'),
(34, 7, 83, '89'),
(35, 42, 17, '97'),
(36, 11, 2, '7'),
(37, 2, 72, '37'),
(38, 43, 28, '61'),
(39, 61, 97, '37'),
(40, 97, 11, '79'),
(41, 2, 92, '73'),
(42, 27, 82, '73'),
(43, 43, 85, '11'),
(44, 47, 98, '37'),
(45, 40, 82, '17'),
(46, 16, 10, '41'),
(47, 71, 47, '7'),
(48, 49, 89, '97'),
(49, 79, 1, '1'),
(50, 43, 66, '47'),
(51, 33, 89, '7'),
(52, 86, 99, '59'),
(53, 99, 65, '17'),
(54, 88, 51, '97'),
(55, 3, 48, '19'),
(56, 65, 74, '23'),
(57, 93, 27, '83'),
(58, 54, 100, '67'),
(59, 44, 26, '31'),
(60, 84, 50, '41'),
(61, 55, 98, '2'),
(62, 98, 65, '3'),
(63, 12, 91, '53'),
(64, 15, 60, '5'),
(65, 75, 89, '2'),
(66, 12, 43, '71'),
(67, 54, 94, '7'),
(68, 87, 98, '11'),
(69, 49, 23, '13'),
(70, 88, 54, '31'),
(71, 17, 5, '89'),
(72, 8, 51, '37'),
(73, 60, 36, '1'),
(74, 49, 61, '83'),
(75, 11, 34, '43'),
(76, 74, 20, '73'),
(77, 51, 27, '47'),
(78, 41, 19, '89'),
(79, 28, 45, '47'),
(80, 10, 34, '97'),
(81, 73, 16, '13'),
(82, 60, 12, '3'),
(83, 11, 26, '3'),
(84, 27, 4, '59'),
(85, 11, 92, '41'),
(86, 76, 41, '23'),
(87, 45, 56, '7'),
(88, 96, 63, '71'),
(89, 88, 99, '1'),
(90, 49, 54, '79'),
(91, 13, 83, '3'),
(92, 6, 74, '31'),
(93, 18, 9, '37'),
(94, 30, 9, '3'),
(95, 77, 49, '11'),
(96, 69, 11, '7'),
(97, 98, 59, '1'),
(98, 23, 7, '13'),
(99, 31, 89, '61'),
(100, 95, 4, '97');

--
-- Disparadores `detalle_pedido`
--
DELIMITER $$
CREATE TRIGGER `restar existencia` BEFORE INSERT ON `detalle_pedido` FOR EACH ROW UPDATE producto SET cantidad = cantidad - NEW.cantidad WHERE id_producto = NEW.id_producto
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sumar existencia` BEFORE DELETE ON `detalle_pedido` FOR EACH ROW UPDATE producto SET cantidad = cantidad + OLD.cantidad WHERE id_producto = OLD.id_producto
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` tinyint(1) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `estado`) VALUES
(0, 'No Disponible'),
(1, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `hora` varchar(30) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_garantia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantia`
--

CREATE TABLE `garantia` (
  `id_garantia` int(11) NOT NULL,
  `meses` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `garantia`
--

INSERT INTO `garantia` (`id_garantia`, `meses`, `estado`) VALUES
(1, '3 Meses', 1),
(2, '6 Meses', 1),
(3, '1 Año', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `codigo` varchar(6) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `id_garantia` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_estado` tinyint(1) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `codigo`, `precio`, `cantidad`, `descripcion`, `id_garantia`, `id_categoria`, `id_estado`, `foto`) VALUES
(3, 'Silla Olimpica', '654654', '150.00', '25', 'Silla para competencias', 2, 1, 1, '5d294c3189709.jpg'),
(4, 'Baston LGB', '465465', '80.00', '15', 'Bastones para 180 LB', 3, 2, 1, '5d2c82874d341.jpg'),
(5, 'Accesorios', '654846', '60.00', '15', 'Accesorios', 1, 3, 1, '5d2c861336711.jpg'),
(6, 'Repuestos', '879879', '25.00', '15', 'Repuestos para sillas y bastones', 1, 4, 1, '5d2c86458fdf4.jpg'),
(7, 'Repuestos CLS', '656656', '25.00', '10', 'Repuestos sentadedoros', 1, 4, 1, '5d2c8936b0236.jpg'),
(8, 'Zapatos', '022132', '60.00', '5', 'Zapatos para dedos', 1, 5, 1, '5d2c89aec49f0.jpg'),
(9, 'Zapatos', '369874', '35.00', '5', 'Zapatos para niños', 1, 5, 1, '5d2c89f2c4297.jpg'),
(11, 'Silla', '987987', '150.00', '25', 'Hola', 2, 1, 1, '5d2dd7ef35edf.jpg'),
(12, 'Bastones hh', '798798', '75.00', '15', 'Bastones para 125LB', 3, 2, 1, '5d2dd82e83cd1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres_usuario` varchar(50) NOT NULL,
  `apellidos_usuario` varchar(50) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `alias_usuario` varchar(50) NOT NULL,
  `clave_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres_usuario`, `apellidos_usuario`, `correo_usuario`, `alias_usuario`, `clave_usuario`) VALUES
(1, 'Geovany Arturo', 'Pineda Fuentes', 'geofuentes.gf@gmail.com', 'geovany', '$2y$10$hGnQGUN.wD1E2kfJ7NkTCeDsVY7vbY1BGcdqQcq21qLqF26JOQTFO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `id_garantia` (`id_garantia`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `garantia`
--
ALTER TABLE `garantia`
  ADD PRIMARY KEY (`id_garantia`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `producto_ibfk_4` (`id_categoria`),
  ADD KEY `id_garantia` (`id_garantia`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `garantia`
--
ALTER TABLE `garantia`
  MODIFY `id_garantia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
