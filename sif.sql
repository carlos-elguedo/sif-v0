-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2016 a las 02:01:58
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sif`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(15) NOT NULL,
  `id_usuario` int(15) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `edad` int(3) NOT NULL,
  `fecha_naci` date NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `ciudad` varchar(80) NOT NULL,
  `ruta_imagen` varchar(80) NOT NULL,
  `sexo` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_usuario`, `nombre`, `correo`, `edad`, `fecha_naci`, `telefono`, `ciudad`, `ruta_imagen`, `sexo`) VALUES
(16, 26, 'Carlos Andres Elguedo', 'carlos-elguedo@hotmail.com', 22, '1994-10-26', '3046779394', 'Cartagena', '26.jpeg', ''),
(17, 39, 'Juliana Arango', 'juli@gmail.com', 20, '1996-10-30', '', 'Cartagena', '', ''),
(18, 43, 'Juliana Meza', 'juli@hotmail.com', 30, '1986-10-30', '', 'Cartagena', '43.jpeg', ''),
(19, 44, 'Carlos Hurtado', 'carloshurtado@hotmail.com', 29, '1987-09-29', '', 'Cartagena', '44.jpeg', ''),
(20, 46, 'Ignacio Lugo', 'ignasio@gmail.com', 106, '1910-01-15', '', 'Cartagena', '46.jpeg', ''),
(21, 59, 'Milton Julio', 'milton@hotmail.com', 29, '1987-09-29', '', 'Cartagena', '59.jpeg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE IF NOT EXISTS `cotizaciones` (
  `id_cotizacion` int(15) NOT NULL,
  `id_trabajador` int(15) NOT NULL,
  `array_cantidades` varchar(1024) NOT NULL,
  `array_descripciones` varchar(1024) NOT NULL,
  `array_valores` varchar(1024) NOT NULL,
  `total` float NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `para` int(15) NOT NULL,
  `nota` int(2) NOT NULL,
  `mensaje_nota` varchar(1024) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `grande` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id_cotizacion`, `id_trabajador`, `array_cantidades`, `array_descripciones`, `array_valores`, `total`, `hora`, `fecha`, `fecha_hora`, `para`, `nota`, `mensaje_nota`, `titulo`, `grande`) VALUES
(1, 31, '', '', '', 0, '14:43:51', '2016-11-14', '2016-11-14 14:43:51', 26, 1, 'Nota nota nta q nota xd Nota nota nta q nota xd Nota nota nta q nota xd Nota nota nta q nota xd', 'Titulo de la nota', 0),
(3, 31, '12', 'Melones', '1000', 12000, '15:20:28', '2016-11-14', '2016-11-14 15:20:28', 26, 0, '', '', 0),
(9, 31, '2,4', 'Melones,Platanos', '1000,1000', 4000, '16:25:22', '2016-11-14', '2016-11-14 16:25:22', 26, 0, '', '', 0),
(10, 31, '2,4', 'Melones,Platanos', '1000,1000', 4000, '16:35:06', '2016-11-14', '2016-11-14 16:35:06', 26, 0, '', '', 1),
(11, 42, '1,1', 'Trabajo de negocio,Papeleo', '400000,100000', 500000, '23:37:44', '2016-11-14', '2016-11-14 23:37:44', 43, 0, '', '', 1),
(12, 45, '1', 'Puerta en madera', '645000', 645000, '12:07:49', '2016-11-18', '2016-11-18 12:07:49', 44, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlaces`
--

CREATE TABLE IF NOT EXISTS `enlaces` (
  `id_enlace` int(15) NOT NULL,
  `de` int(15) NOT NULL,
  `para` int(15) NOT NULL,
  `asunto` varchar(60) NOT NULL,
  `mensaje` varchar(240) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enlaces`
--

INSERT INTO `enlaces` (`id_enlace`, `de`, `para`, `asunto`, `mensaje`, `fecha`, `hora`, `fecha_hora`) VALUES
(3, 26, 31, 'Titulo del mensaje', 'Hola mucho gusto, me gustaria, y estoy necesitando de sus servicios', '2016-11-13', '20:19:41', '2016-11-13 20:19:41'),
(4, 26, 38, 'Nuevo emnsaje ', 'Buenos dias, tengo un problema electrico en mi casa y no se a quien llamar', '2016-11-13', '21:30:47', '2016-11-13 21:30:47'),
(5, 31, 38, 'Title title', 'Hola mucho gusto, me gustaria, y estoy necesitando de sus servicios', '2016-11-14', '02:00:49', '2016-11-14 02:00:49'),
(6, 43, 42, 'Trabajo de divorcio', 'Hola cordial saludo, me voy a divorciar de mi esposo y necesito un abogado que me asesore en el caso', '2016-11-14', '23:33:12', '2016-11-14 23:33:12'),
(7, 44, 45, 'Trabajo de una puerta', 'Hola, mucho gusto, quiero realizar una puerta clÃ¡sica de madera para la entrada principal de mi casa en las gaviotas', '2016-11-18', '12:05:38', '2016-11-18 12:05:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id_mensaje` int(15) NOT NULL,
  `id_enlace` int(15) NOT NULL,
  `de` int(15) NOT NULL,
  `para` int(15) NOT NULL,
  `enviador` int(15) NOT NULL,
  `mensaje` varchar(240) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `contador_img` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `cotizacion` int(2) NOT NULL,
  `id_cotizacion` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `id_enlace`, `de`, `para`, `enviador`, `mensaje`, `imagen`, `contador_img`, `fecha`, `hora`, `fecha_hora`, `cotizacion`, `id_cotizacion`) VALUES
(1, 3, 26, 31, 26, 'Hola mucho gusto, me gustaria, y estoy necesitando de sus servicios', '', 0, '2016-11-13', '20:19:41', '2016-11-13 20:19:41', 0, 0),
(2, 4, 26, 38, 26, 'Buenos dias, tengo un problema electrico en mi casa y no se a quien llamar', '', 0, '2016-11-13', '21:30:47', '2016-11-13 21:30:47', 0, 0),
(6, 3, 26, 31, 26, 'Hola mucho gusto, me gustaria, y estoy necesitando de sus servicios', '', 0, '2016-11-14', '01:48:25', '2016-11-14 01:48:25', 0, 0),
(7, 3, 31, 26, 31, 'Que bien gracias ', '', 0, '2016-11-14', '01:59:52', '2016-11-14 01:59:52', 0, 0),
(8, 5, 31, 38, 31, 'Hola mucho gusto, me gustaria, y estoy necesitando de sus servicios', '', 0, '2016-11-14', '02:00:49', '2016-11-14 02:00:49', 0, 0),
(9, 3, 31, 26, 31, '', '', 0, '2016-11-14', '14:43:51', '2016-11-14 14:43:51', 1, 1),
(10, 3, 31, 26, 31, '', '', 0, '2016-11-14', '15:20:28', '2016-11-14 15:20:28', 1, 3),
(17, 3, 31, 26, 31, '', '', 0, '2016-11-14', '16:35:06', '2016-11-14 16:35:06', 1, 10),
(18, 3, 26, 31, 26, '', '3-26-1.png', 1, '2016-11-14', '22:48:37', '2016-11-14 22:48:37', 0, 0),
(19, 6, 43, 42, 43, 'Hola cordial saludo, me voy a divorciar de mi esposo y necesito un abogado que me asesore en el caso', '', 0, '2016-11-14', '23:33:12', '2016-11-14 23:33:12', 0, 0),
(20, 6, 42, 43, 42, 'Hola Mucho gusto, claro como no, cuenteme...', '', 0, '2016-11-14', '23:34:18', '2016-11-14 23:34:18', 0, 0),
(21, 6, 43, 42, 43, 'Llevo diez aÃ±os de casada con mi esposo', '', 0, '2016-11-14', '23:35:27', '2016-11-14 23:35:27', 0, 0),
(22, 6, 43, 42, 43, 'Y nos vamos a separar', '', 0, '2016-11-14', '23:35:46', '2016-11-14 23:35:46', 0, 0),
(23, 6, 42, 43, 42, 'Yo me especializo en divorcios ', '', 0, '2016-11-14', '23:36:12', '2016-11-14 23:36:12', 0, 0),
(24, 6, 42, 43, 42, '', '', 0, '2016-11-14', '23:37:44', '2016-11-14 23:37:44', 1, 11),
(25, 7, 44, 45, 44, 'Hola, mucho gusto, quiero realizar una puerta clÃ¡sica de madera para la entrada principal de mi casa en las gaviotas', '', 0, '2016-11-18', '12:05:38', '2016-11-18 12:05:38', 0, 0),
(26, 7, 45, 44, 45, 'Claro como no...', '', 0, '2016-11-18', '12:07:06', '2016-11-18 12:07:06', 0, 0),
(27, 7, 45, 44, 45, '', '', 0, '2016-11-18', '12:07:49', '2016-11-18 12:07:49', 1, 12),
(28, 7, 44, 45, 44, 'Ok, lo voy a llamar', '', 0, '2016-11-18', '12:08:23', '2016-11-18 12:08:23', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(20) NOT NULL,
  `id_trabajador` int(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `experiencia` int(3) NOT NULL,
  `telefono_dos` varchar(80) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `id_usuario` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `id_trabajador`, `descripcion`, `experiencia`, `telefono_dos`, `direccion`, `id_usuario`) VALUES
(1, 5, '', 0, '', '', 31),
(2, 9, 'Hola, soy armando, para servirle.', 0, '3198128733', '', 35),
(4, 11, 'Esta es mi descripciÃ³n, soy enfermera y me gusta ayudar a la gente', 11, '3126790481', 'Olaya Herrera Sector Ricaute', 37),
(5, 12, 'Hola, soy Julian Puertas naci y trabajo en la ciudad de Cartagena', 10, '3126790463', '', 38),
(6, 13, 'Dios los bendiga', 42, '304677212', '', 40),
(7, 14, 'Presto el servicio de conduccion a las personas en manga y bocagrande', 18, '3123312311', '', 41),
(8, 15, 'Soy un abogado particular con excelentes principios y capacidades para ayudar a mis clientes en lo que necesiten', 32, '', '', 42),
(9, 16, 'Mucho gusto, soy un carpintero capacitado para realizar mucha clase de trabajos, mis productos son de mucha calidad', 26, '3126781912', '', 45),
(10, 17, 'Mucho gusto, soy carpintero y me considero una persona muy calmada para realizar mi trabajo', 3, '', 'Pie del cerro, taller el martillo', 47),
(11, 18, 'Hola, contactame para trabajar juntos y realizar fotografÃ­as profesionales de lo que necesites, desde fiestas hasta paisajes y retratos', 1, '', '', 48),
(12, 19, 'Soy un abogado de la universidad del Sinu, listo para ayudarlos, me especializo en casos de finca raÃ­z ', 2, '3001231441', '', 49),
(13, 20, 'Justicia y libertad, mi lema, el cual me rige y dirige mi vida, trato de alcanzar siempre estos dos importantes valores para hacer de este mundo algo mejor', 13, '', '', 50),
(14, 21, 'AcÃ©rcate por nuestro local para que recibas el mejor servicio en peluquerÃ­a cartagenera, sera un placer para nuestro equipo atenderlos', 5, '3129810181', 'Mall Plaza local 2001', 51),
(15, 22, 'Mucho gusto!!!\nServicio de peluquerÃ­a a domicilio, mas precisamente en el barrio San Francisco, llÃ¡meme.', 4, '31201231231', '', 52),
(16, 23, 'Buenas, soy un maestro de obra experimentado, junto a mi equipo de trabajo realizamos nuestra labor agilmente y con calidad', 41, '309131231', '', 53),
(17, 24, 'Hola, soy tÃ©cnica en cocina del sena. ya he trabajado en hoteles. llÃ¡meme para trabajar en eventos y actividades', 7, '3159817826', '', 54),
(18, 25, 'Cordial saludo, soy maestra de matemÃ¡ticas, estoy disponible todas las tardes para clases personalizadas', 18, '3129199123', '', 55),
(19, 26, 'Hola, soy tÃ©cnico del sena y hago trabajos de carpinterÃ­a en el barrio Blas de Lezo', 5, '3129812912', '', 56),
(20, 27, 'Mucho gusto, vendo y comercializo pasa bocas para eventos, tambiÃ©n trabajo en eventos particulares como cocinera', 51, '3123123131', '', 57),
(21, 28, 'Realizo trabajos de plomeria en el barrio Crespo', 32, '3129891888', '', 58),
(22, 29, 'Mucho gusto, arreglo computadores portÃ¡tiles y de mesa. Servicio a domicilio', 20, '3128781776', '', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
  `id_servicio` int(15) NOT NULL,
  `id_trabajador` int(15) NOT NULL,
  `id_usuario` int(15) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `descripcion` varchar(240) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `id_trabajador`, `id_usuario`, `nombre`, `area`, `descripcion`) VALUES
(1, 5, 31, 'Electricista', '', NULL),
(2, 12, 38, 'Electricista', '', NULL),
(3, 13, 40, 'AlbaÃ±il', '', NULL),
(4, 11, 37, 'Enfermero', '', NULL),
(5, 9, 35, 'Jardinero', '', NULL),
(6, 14, 41, 'Chofer', '', NULL),
(7, 15, 42, 'Abogado', '', NULL),
(8, 16, 45, 'Carpintero', '', NULL),
(9, 17, 47, 'Carpintero', '', NULL),
(10, 18, 48, 'FotÃ³grafo', '', NULL),
(11, 19, 49, 'Abogado', '', NULL),
(12, 20, 50, 'Abogado', '', NULL),
(13, 21, 51, 'Peluquero', '', NULL),
(14, 22, 52, 'Peluquero', '', NULL),
(15, 23, 53, 'AlbaÃ±il', '', NULL),
(16, 24, 54, 'Cocinero', '', NULL),
(17, 25, 55, 'Profesor', '', NULL),
(18, 26, 56, 'Carpintero', '', NULL),
(19, 27, 57, 'Cocinero', '', NULL),
(20, 28, 58, 'Plomero', '', NULL),
(21, 29, 60, 'TÃ©cnico', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE IF NOT EXISTS `trabajadores` (
  `id_trabajador` int(15) NOT NULL,
  `id_usuario` int(15) NOT NULL,
  `fecha_naci` varchar(15) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `servicio` varchar(80) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `ruta_imagen` varchar(80) NOT NULL,
  `edad` int(2) NOT NULL,
  `ciudad` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id_trabajador`, `id_usuario`, `fecha_naci`, `nombre`, `correo`, `servicio`, `telefono`, `ruta_imagen`, `edad`, `ciudad`) VALUES
(5, 31, '1972-12-24', 'Alberto Martinez Ruiz', 'alberto@hotmail.com', 'Electricista', '', '31.jpeg', 43, 'Cartagena'),
(9, 35, '1980-08-30', 'Armando Paredes', 'armando@gmail.com', 'Jardinero', '6712311', '', 36, 'Cartagena'),
(11, 37, '1994-10-29', 'Martha Garces', 'martha@gmail.com', 'Enfermero', '6771912', '', 22, 'Cartagena'),
(12, 38, '1989-10-29', 'Julian Puertas', 'julian@gmail.com', 'Electricista', '6553123', '', 27, 'Cartagena'),
(13, 40, '1997-10-30', 'Tirado Cemento', 'argos@hotmail.com', 'AlbaÃ±il', '', '', 19, 'Cartagena'),
(14, 41, '1997-10-30', 'Juntando Platas', 'platas@hotmail.com', 'Chofer', '306777188', '', 19, 'Cartagena'),
(15, 42, '1986-11-30', 'Enrrique Arnedo', 'enrri@hotmail.com', 'Abogado', '6871231', '42.jpeg', 29, 'Cartagena'),
(16, 45, '1986-10-30', 'Julio Hernandez', 'jullioher@gmail.com', 'Carpintero', '67712341', '45.jpeg', 30, 'Cartagena'),
(17, 47, '1986-11-30', 'Alberto Serrano', 'albert@gmail.com', 'Carpintero', '312678181', '47.jpeg', 30, 'Cartagena'),
(18, 48, '1996-11-30', 'Maria Gutierrez', 'maria@hotmail.es', 'FotÃ³grafo', '3078181917', '48.jpeg', 20, 'Cartagena'),
(19, 49, '1994-02-02', 'Juan Chavez', 'chapeco@hotmail.com', 'Abogado', '6717181', '49.jpeg', 22, 'Cartagena'),
(20, 50, '1985-11-30', 'Mariana Perez', 'mariana@hotmail.com', 'Abogado', '6666128', '50.jpeg', 31, 'Cartagena'),
(21, 51, '1993-11-30', 'Team Elkin Black', 'teamElkin@hotmail.com', 'Peluquero', '6812319', '51.jpeg', 23, 'Cartagena'),
(22, 52, '1995-11-30', 'Lucho Florez', 'luchon@hotmail.com', 'Peluquero', '31201231231', '52.jpeg', 21, 'Cartagena'),
(23, 53, '1945-11-30', 'Manuel Marquez', 'manu@outlook.com', 'AlbaÃ±il', '', '53.jpeg', 71, 'Cartagena'),
(24, 54, '1991-10-30', 'Juana Cardenas', 'cardejuana@hotmail.com', 'Cocinero', '', '54.jpeg', 25, 'Cartagena'),
(25, 55, '1986-11-30', 'Petra Rodriguez', 'petra@gmail.com', 'Profesor', '6717181', '55.jpeg', 30, 'Cartagena'),
(26, 56, '1989-11-29', 'Jaime Muriel ', 'jaime@hotmail.net', 'Carpintero', '', '56.jpeg', 27, 'Cartagena'),
(27, 57, '1944-11-30', 'Petrona QuiÃ±onnes', 'quipet@hotmail.com', 'Cocinero', '3123123131', '57.jpeg', 72, 'Cartagena'),
(28, 58, '1974-06-29', 'Mesier Jordan', 'mesier@gmail.com', 'Plomero', '3129891888', '58.jpeg', 42, 'Cartagena'),
(29, 60, '1989-10-29', 'Marin Mercado', 'martin@hotmail.com', 'TÃ©cnico', '3128781776', '60.jpeg', 27, 'Cartagena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE IF NOT EXISTS `trabajos` (
  `id_trabajo` int(15) NOT NULL,
  `id_trabajador` int(15) NOT NULL,
  `rutaTrabajo` varchar(200) NOT NULL,
  `contador` int(3) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(240) DEFAULT NULL,
  `id_usuario` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id_trabajo`, `id_trabajador`, `rutaTrabajo`, `contador`, `titulo`, `descripcion`, `id_usuario`) VALUES
(2, 5, '31-1.jpeg', 1, 'Derechos de los niÃ±os', 'A estos niÃ±os no se les respetaban sus derechos, asi que luchamos para que tuvieran comida, ropa y pudieran jugar y sonreir.', 31),
(3, 5, '31-2.jpeg', 2, 'Prueba', 'Prueba Prueba Prueba Prueba Prueba Prueba Prueba Prueba Prueba Prueba Prueba', 31),
(4, 9, '35-1.jpeg', 1, 'Jardin de margaritas', 'Este trabajo lo realice cuando trabajaba en los Estados Unidos', 35),
(5, 16, '45-1.jpeg', 1, 'Mesa clasica', 'Esta mesa es hecha con un estilo clÃ¡sico para aquellas personas que les gusta sentirse bien.', 45),
(6, 17, '47-1.jpeg', 1, 'AdecuaciÃ³n monumento', 'Reparamos y perfeccionamos una pieza histÃ³rica de nuestra ciudad, construimos placas en madera para esta clase de monumentos', 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(15) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo_usuario` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `password`, `tipo_usuario`) VALUES
(26, 'carlos-elguedo@hotmail.com', '12345', 'Cliente'),
(31, 'alberto@hotmail.com', '123456', 'Trabajador'),
(35, 'armando@gmail.com', '123456', 'Trabajador'),
(37, 'martha@gmail.com', '123456', 'Trabajador'),
(38, 'julian@gmail.com', '123456', 'Trabajador'),
(39, 'juli@gmail.com', '123456', 'Cliente'),
(40, 'argos@hotmail.com', '123456', 'Trabajador'),
(41, 'platas@hotmail.com', '123456', 'Trabajador'),
(42, 'enrri@hotmail.com', '123456', 'Trabajador'),
(43, 'juli@hotmail.com', '123456', 'Cliente'),
(44, 'carloshurtado@hotmail.com', '123456', 'Cliente'),
(45, 'jullioher@gmail.com', '123456', 'Trabajador'),
(46, 'ignasio@gmail.com', '123', 'Cliente'),
(47, 'albert@gmail.com', '123', 'Trabajador'),
(48, 'maria@hotmail.es', '1234', 'Trabajador'),
(49, 'chapeco@hotmail.com', '1234', 'Trabajador'),
(50, 'mariana@hotmail.com', '1234', 'Trabajador'),
(51, 'teamElkin@hotmail.com', '1234', 'Trabajador'),
(52, 'luchon@hotmail.com', '1234', 'Trabajador'),
(53, 'manu@outlook.com', '1234', 'Trabajador'),
(54, 'cardejuana@hotmail.com', '1234', 'Trabajador'),
(55, 'petra@gmail.com', '1234', 'Trabajador'),
(56, 'jaime@hotmail.net', '1234', 'Trabajador'),
(57, 'quipet@hotmail.com', '1234', 'Trabajador'),
(58, 'mesier@gmail.com', '1234', 'Trabajador'),
(59, 'milton@hotmail.com', '123456', 'Cliente'),
(60, 'martin@hotmail.com', '1234', 'Trabajador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`), ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id_cotizacion`);

--
-- Indices de la tabla `enlaces`
--
ALTER TABLE `enlaces`
  ADD PRIMARY KEY (`id_enlace`), ADD KEY `de` (`de`), ADD KEY `para` (`para`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`), ADD KEY `id_enlace` (`id_enlace`), ADD KEY `de` (`de`), ADD KEY `para` (`para`), ADD KEY `enviador` (`enviador`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`), ADD UNIQUE KEY `id_trabajador` (`id_trabajador`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`), ADD KEY `id_trabajador` (`id_trabajador`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id_trabajador`), ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id_trabajo`), ADD KEY `id_trabajador` (`id_trabajador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id_cotizacion` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `enlaces`
--
ALTER TABLE `enlaces`
  MODIFY `id_enlace` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_trabajador` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id_trabajo` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `enlaces`
--
ALTER TABLE `enlaces`
ADD CONSTRAINT `enlaces_ibfk_1` FOREIGN KEY (`de`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `enlaces_ibfk_2` FOREIGN KEY (`para`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_enlace`) REFERENCES `enlaces` (`id_enlace`),
ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`de`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `mensajes_ibfk_3` FOREIGN KEY (`para`) REFERENCES `usuarios` (`id`),
ADD CONSTRAINT `mensajes_ibfk_4` FOREIGN KEY (`enviador`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`);

--
-- Filtros para la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
ADD CONSTRAINT `trabajadores_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
ADD CONSTRAINT `trabajos_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
