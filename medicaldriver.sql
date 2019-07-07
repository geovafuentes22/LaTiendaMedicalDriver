-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2019 a las 01:40:43
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(6, 'Silla de Ruedas', '5d20ce39acfba.jpg');

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
(1, 'Cecilia', 'Henry', '123456789', 'Duis@euelitNulla.net'),
(2, 'Alexa', 'Walls', '123456789', 'Etiam.vestibulum@erat.edu'),
(3, 'Olga', 'Kennedy', '123456789', 'dui@montesnasceturridiculus.ed'),
(4, 'Chester', 'Hernandez', '123456789', 'volutpat.nunc.sit@Quisquefring'),
(5, 'Rama', 'Salinas', '123456789', 'lectus@ornarelectus.ca'),
(6, 'Gary', 'Frazier', '123456789', 'et@loremvehiculaet.net'),
(7, 'Barbara', 'Marquez', '123456789', 'mi@purusDuiselementum.net'),
(8, 'Hammett', 'Skinner', '123456789', 'neque.vitae.semper@enimEtiamgr'),
(9, 'Clio', 'Bender', '123456789', 'magna@mitempor.org'),
(10, 'Britanni', 'Barry', '123456789', 'elementum.purus.accumsan@Aenea'),
(11, 'Cassidy', 'Hansen', '123456789', 'in.hendrerit.consectetuer@dapi'),
(12, 'Rebekah', 'Valenzuela', '123456789', 'condimentum.Donec@aliquet.ca'),
(13, 'Buckminster', 'Paul', '123456789', 'ante@sed.com'),
(14, 'Nelle', 'Bell', '123456789', 'nisi@lectus.net'),
(15, 'George', 'Bruce', '123456789', 'nibh.lacinia@massanonante.co.u'),
(16, 'Willa', 'Lester', '123456789', 'orci.lacus@Suspendissealiquetm'),
(17, 'Kylynn', 'Dixon', '123456789', 'augue@Duisacarcu.co.uk'),
(18, 'Seth', 'Valentine', '123456789', 'nulla.In@necimperdietnec.org'),
(19, 'Orla', 'Barr', '123456789', 'sodales@pharetraNam.co.uk'),
(20, 'Quinn', 'Clark', '123456789', 'lorem.semper.auctor@dictum.com'),
(21, 'Abraham', 'Macias', '123456789', 'Praesent@risusaultricies.edu'),
(22, 'Bradley', 'Navarro', '123456789', 'dui@Namligula.ca'),
(23, 'Jonah', 'Goff', '123456789', 'Mauris.molestie.pharetra@etmal'),
(24, 'Colton', 'Trevino', '123456789', 'pellentesque.eget@acipsumPhase'),
(25, 'Audrey', 'Allison', '123456789', 'sed@Mauris.org'),
(26, 'Stone', 'Hall', '123456789', 'massa.Integer.vitae@lacus.com'),
(27, 'Burke', 'Cruz', '123456789', 'ultrices.posuere@vitae.edu'),
(28, 'Kadeem', 'Bender', '123456789', 'fringilla@Morbisit.org'),
(29, 'Malachi', 'Ferguson', '123456789', 'fames.ac.turpis@Donecest.org'),
(30, 'Daquan', 'Welch', '123456789', 'iaculis.quis.pede@semegestas.e'),
(31, 'Ima', 'Gilmore', '123456789', 'Lorem.ipsum@gravidamaurisut.co'),
(32, 'Erich', 'Sparks', '123456789', 'Proin.vel@elitfermentum.edu'),
(33, 'Cara', 'Swanson', '123456789', 'Suspendisse@dui.co.uk'),
(34, 'Palmer', 'Wiley', '123456789', 'Quisque.nonummy@Nuncmauris.net'),
(35, 'Lenore', 'Humphrey', '123456789', 'mi@neccursus.org'),
(36, 'Kiara', 'Oliver', '123456789', 'gravida@molestie.net'),
(37, 'Kimberly', 'Snow', '123456789', 'a.neque@laoreetposuereenim.edu'),
(38, 'Tucker', 'Valenzuela', '123456789', 'pretium@magna.co.uk'),
(39, 'Alika', 'Collins', '123456789', 'Quisque.nonummy@fermentumferme'),
(40, 'Fay', 'Webb', '123456789', 'facilisis.eget@loremlorem.net'),
(41, 'Channing', 'Shepard', '123456789', 'tempus.scelerisque@gravidasita'),
(42, 'Margaret', 'Navarro', '123456789', 'eu@tristiquepellentesquetellus'),
(43, 'Stacey', 'Mckenzie', '123456789', 'vel.quam.dignissim@mollis.co.u'),
(44, 'Hilel', 'Hoffman', '123456789', 'ipsum.dolor@Aliquamfringillacu'),
(45, 'Orla', 'Charles', '123456789', 'congue.In@loremtristiquealique'),
(46, 'Dennis', 'Patel', '123456789', 'rhoncus.Proin.nisl@tincidunt.n'),
(47, 'Judith', 'Mcneil', '123456789', 'vitae.aliquam.eros@blanditcong'),
(48, 'Octavius', 'Parker', '123456789', 'Donec@arcuAliquamultrices.com'),
(49, 'Quin', 'Holder', '123456789', 'sagittis.placerat@nunc.ca'),
(50, 'Vera', 'Lowe', '123456789', 'vulputate.lacus@orciinconsequa'),
(51, 'Boris', 'Howell', '123456789', 'malesuada.fames@ipsumnonarcu.n'),
(52, 'Alec', 'Long', '123456789', 'odio.Nam.interdum@pretiumaliqu'),
(53, 'Ariel', 'Dunn', '123456789', 'Maecenas.iaculis.aliquet@ultri'),
(54, 'Shelley', 'Ratliff', '123456789', 'eget.varius.ultrices@Crasvulpu'),
(55, 'Dana', 'Luna', '123456789', 'Integer.eu@ametrisus.ca'),
(56, 'Howard', 'Levine', '123456789', 'sed.pede.Cum@enimdiam.edu'),
(57, 'Gavin', 'Haney', '123456789', 'pede@imperdiet.ca'),
(58, 'Drew', 'Woodard', '123456789', 'lacus@necenim.org'),
(59, 'Logan', 'Franco', '123456789', 'Integer.tincidunt@enimEtiamgra'),
(60, 'Stephanie', 'Avila', '123456789', 'ut@sapiencursus.com'),
(61, 'McKenzie', 'Langley', '123456789', 'ridiculus@natoquepenatibus.com'),
(62, 'Kitra', 'Odom', '123456789', 'laoreet@CrasinterdumNunc.org'),
(63, 'Alexandra', 'Richard', '123456789', 'odio@sed.edu'),
(64, 'Yardley', 'Jennings', '123456789', 'blandit@Duisgravida.co.uk'),
(65, 'Callum', 'Wooten', '123456789', 'Maecenas@facilisisvitae.net'),
(66, 'Rhiannon', 'Matthews', '123456789', 'rutrum.urna.nec@fringilla.co.u'),
(67, 'Palmer', 'Abbott', '123456789', 'egestas@Aliquamornare.com'),
(68, 'Piper', 'Gutierrez', '123456789', 'massa.rutrum@consectetuerrhonc'),
(69, 'Amal', 'Roberts', '123456789', 'interdum.libero.dui@Nunclectus'),
(70, 'Cameron', 'Lloyd', '123456789', 'Sed.nec@ultricesDuis.edu'),
(71, 'Cain', 'Boone', '123456789', 'Donec@miacmattis.net'),
(72, 'Basil', 'Landry', '123456789', 'risus.Duis.a@eleifend.net'),
(73, 'Dante', 'Bright', '123456789', 'Pellentesque.ultricies@Incondi'),
(74, 'Reese', 'Cardenas', '123456789', 'sodales@egestaslaciniaSed.co.u'),
(75, 'Felix', 'Stark', '123456789', 'elit@duiquis.edu'),
(76, 'Micah', 'Bullock', '123456789', 'lacus.varius@Donecvitaeerat.ca'),
(77, 'Chelsea', 'Lamb', '123456789', 'Sed@loremvitae.com'),
(78, 'Miranda', 'Case', '123456789', 'vitae.mauris.sit@est.co.uk'),
(79, 'Unity', 'Weber', '123456789', 'erat.eget.tincidunt@Nullatinci'),
(80, 'Conan', 'Vaughan', '123456789', 'dui.quis@Donecestmauris.edu'),
(81, 'Kadeem', 'Park', '123456789', 'Curae@commodohendreritDonec.ca'),
(82, 'Emerald', 'Nguyen', '123456789', 'sed.consequat.auctor@nonvestib'),
(83, 'Dominique', 'Richards', '123456789', 'auctor.ullamcorper@duiFusce.ne'),
(84, 'Wanda', 'Guy', '123456789', 'mollis.Integer@orciUtsemper.ed'),
(85, 'Shaeleigh', 'Neal', '123456789', 'sagittis@dictummagnaUt.co.uk'),
(86, 'Sybill', 'Powell', '123456789', 'eleifend@facilisiSedneque.ca'),
(87, 'Plato', 'Alston', '123456789', 'Suspendisse.tristique@blanditN'),
(88, 'Xavier', 'Graham', '123456789', 'dictum.sapien@nectellusNunc.ed'),
(89, 'Britanni', 'Butler', '123456789', 'posuere.cubilia.Curae@Integer.'),
(90, 'Unity', 'Jarvis', '123456789', 'Morbi@enim.net'),
(91, 'Zorita', 'Martinez', '123456789', 'Ut.tincidunt.vehicula@massaQui'),
(92, 'Paul', 'Harper', '123456789', 'neque.pellentesque@orciquis.co'),
(93, 'Clarke', 'Cooke', '123456789', 'nec@loremacrisus.edu'),
(94, 'Isaiah', 'Delaney', '123456789', 'Donec@Quisque.com'),
(95, 'Nicole', 'Richmond', '123456789', 'vehicula.aliquet@quispedePraes'),
(96, 'Caesar', 'Hess', '123456789', 'Lorem.ipsum.dolor@feugiatplace'),
(97, 'Neville', 'Quinn', '123456789', 'ipsum@enimmi.ca'),
(98, 'Ginger', 'Romero', '123456789', 'egestas@Maecenasmalesuada.net'),
(99, 'Margaret', 'Parsons', '123456789', 'eu.nibh@dictummagnaUt.org'),
(100, 'Felicia', 'Arnold', '123456789', 'rutrum.Fusce@nonlobortis.com'),
(101, 'Miguel', 'Marmol', '123456789', 'miguel@gmail.com'),
(102, 'Miguel', 'Marmol', '123456789', 'miguel@gmail.com');

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
(21, '4 Meses', 1),
(54, '6 meses', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `fecha`, `id_cliente`) VALUES
(1, '0000-00-00', 1),
(2, '0000-00-00', 2),
(3, '0000-00-00', 3),
(4, '0000-00-00', 4),
(5, '0000-00-00', 5),
(6, '0000-00-00', 6),
(7, '0000-00-00', 7),
(8, '0000-00-00', 8),
(9, '0000-00-00', 9),
(10, '0000-00-00', 10),
(11, '0000-00-00', 11),
(12, '0000-00-00', 12),
(13, '0000-00-00', 13),
(14, '0000-00-00', 14),
(15, '0000-00-00', 15),
(16, '0000-00-00', 16),
(17, '0000-00-00', 17),
(18, '0000-00-00', 18),
(19, '0000-00-00', 19),
(20, '0000-00-00', 20),
(21, '0000-00-00', 21),
(22, '0000-00-00', 22),
(23, '0000-00-00', 23),
(24, '0000-00-00', 24),
(25, '0000-00-00', 25),
(26, '0000-00-00', 26),
(27, '0000-00-00', 27),
(28, '0000-00-00', 28),
(29, '0000-00-00', 29),
(30, '0000-00-00', 30),
(31, '0000-00-00', 31),
(32, '0000-00-00', 32),
(33, '0000-00-00', 33),
(34, '0000-00-00', 34),
(35, '0000-00-00', 35),
(36, '0000-00-00', 36),
(37, '0000-00-00', 37),
(38, '0000-00-00', 38),
(39, '0000-00-00', 39),
(40, '0000-00-00', 40),
(41, '0000-00-00', 41),
(42, '0000-00-00', 42),
(43, '0000-00-00', 43),
(44, '0000-00-00', 44),
(45, '0000-00-00', 45),
(46, '0000-00-00', 46),
(47, '0000-00-00', 47),
(48, '0000-00-00', 48),
(49, '0000-00-00', 49),
(50, '0000-00-00', 50),
(51, '0000-00-00', 51),
(52, '0000-00-00', 52),
(53, '0000-00-00', 53),
(54, '0000-00-00', 54),
(55, '0000-00-00', 55),
(56, '0000-00-00', 56),
(57, '0000-00-00', 57),
(58, '0000-00-00', 58),
(59, '0000-00-00', 59),
(60, '0000-00-00', 60),
(61, '0000-00-00', 61),
(62, '0000-00-00', 62),
(63, '0000-00-00', 63),
(64, '0000-00-00', 64),
(65, '0000-00-00', 65),
(66, '0000-00-00', 66),
(67, '0000-00-00', 67),
(68, '0000-00-00', 68),
(69, '0000-00-00', 69),
(70, '0000-00-00', 70),
(71, '0000-00-00', 71),
(72, '0000-00-00', 72),
(73, '0000-00-00', 73),
(74, '0000-00-00', 74),
(75, '0000-00-00', 75),
(76, '0000-00-00', 76),
(77, '0000-00-00', 77),
(78, '0000-00-00', 78),
(79, '0000-00-00', 79),
(80, '0000-00-00', 80),
(81, '0000-00-00', 81),
(82, '0000-00-00', 82),
(83, '0000-00-00', 83),
(84, '0000-00-00', 84),
(85, '0000-00-00', 85),
(86, '0000-00-00', 86),
(87, '0000-00-00', 87),
(88, '0000-00-00', 88),
(89, '0000-00-00', 89),
(90, '0000-00-00', 90),
(91, '0000-00-00', 91),
(92, '0000-00-00', 92),
(93, '0000-00-00', 93),
(94, '0000-00-00', 94),
(95, '0000-00-00', 95),
(96, '0000-00-00', 96),
(97, '0000-00-00', 97),
(98, '0000-00-00', 98),
(99, '0000-00-00', 99),
(100, '0000-00-00', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `codigo` varchar(6) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `id_garantia` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_estado` tinyint(1) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Geovany Arturo', 'Pineda Fuentes', 'geofuentes.gf@gmail.com', 'geovany', '$2y$10$4fVv/wFF8.y.YMuMqPUjROQuqXeRgfY/DxFLekQOzdjofxG4ej7gq');

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `garantia`
--
ALTER TABLE `garantia`
  MODIFY `id_garantia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_garantia`) REFERENCES `garantia` (`id_garantia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `garantia`
--
ALTER TABLE `garantia`
  ADD CONSTRAINT `garantia_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estados` (`id_estado`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_5` FOREIGN KEY (`id_garantia`) REFERENCES `garantia` (`id_garantia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_6` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
