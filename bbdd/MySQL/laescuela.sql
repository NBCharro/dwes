-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2015 a las 17:28:52
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `laescuela`
--
CREATE DATABASE IF NOT EXISTS `laescuela` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `laescuela`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Apellidos` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FechaNac` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ciudad` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Telefono` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Curso` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=201 ;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `Nombre`, `Apellidos`, `FechaNac`, `Ciudad`, `Telefono`, `Curso`) VALUES
(1, 'Pedro', 'Suarez Ramos', '02/16/2001', 'San Andres del Rabanedo', '953066903', 'ESO4'),
(2, 'Marta', 'Martin Perez', '12/14/2001', 'Villabalter', '539671049', 'ESO1'),
(3, 'Juan', 'Ramos Rodriguez', '05/31/2002', 'Trobajo del Camino', '902331302', 'ESO3'),
(4, 'Carmen', 'Sanchez Calvo', '10/08/2000', 'Trobajo del Camino', '582890598', 'ESO1'),
(5, 'Alicia', 'Campos Martin', '07/23/1999', 'León', '170564256', 'ESO4'),
(6, 'Yolanda', 'Hernandez Ramos', '01/22/2003', 'Villabalter', '257000894', 'ESO4'),
(7, 'Saul', 'Llorente Suarez', '09/26/1999', 'Trobajo del Camino', '191543813', 'ESO4'),
(8, 'Saul', 'Fernandez Ramos', '09/14/2002', 'San Andres del Rabanedo', '297366149', 'ESO1'),
(9, 'Patricia', 'Lopez Llorente', '01/11/2002', 'León', '959523424', 'ESO4'),
(10, 'Alicia', 'Calvo Ramos', '09/07/2000', 'San Andres del Rabanedo', '048894291', 'ESO1'),
(11, 'Antonio', 'Martinez Gomez', '12/13/1999', 'León', '533978903', 'ESO2'),
(12, 'Carmen', 'Campillo Perez', '08/31/2003', 'Villabalter', '408639973', 'ESO1'),
(13, 'Antonio', 'Fernandez Jimenez', '12/22/2001', 'Trobajo del Camino', '765759178', 'ESO2'),
(14, 'Saul', 'Marcos Fernandez', '09/03/2000', 'San Andres del Rabanedo', '981530171', 'ESO4'),
(15, 'Carlos', 'Rodriguez Gomez', '05/26/2001', 'San Andres del Rabanedo', '892764835', 'ESO4'),
(16, 'Alicia', 'Marcos Gomez', '01/07/2002', 'Villabalter', '441172512', 'ESO3'),
(17, 'Angela', 'Comas Rodriguez', '12/09/2000', 'San Andres del Rabanedo', '521071050', 'ESO4'),
(18, 'Marta', 'Calvo Martin', '11/14/2003', 'León', '846573471', 'ESO2'),
(19, 'Yolanda', 'Fernandez Sanchez', '05/09/2002', 'Trobajo del Camino', '595397317', 'ESO3'),
(20, 'Susana', 'Rodriguez Calvo', '11/03/2000', 'León', '402031472', 'ESO1'),
(21, 'Marta', 'Ramos Gomez', '11/28/2001', 'León', '636282559', 'ESO4'),
(22, 'Domingo', 'Quintanilla Prada', '12/07/2000', 'Trobajo del Camino', '689806567', 'ESO2'),
(23, 'Raul', 'Hernandez Prada', '04/03/2002', 'Villabalter', '030728672', 'ESO4'),
(24, 'Pedro', 'Antunez Estevez', '03/12/2003', 'Villabalter', '827088379', 'ESO4'),
(25, 'Ana', 'Sanchez Jimenez', '11/02/2000', 'San Andres del Rabanedo', '072845735', 'ESO3'),
(26, 'Alberto', 'Antunez Gomez', '09/03/2002', 'León', '993701458', 'ESO1'),
(27, 'Alicia', 'Sanchez Marcos', '08/25/1999', 'León', '984275413', 'ESO4'),
(28, 'Juan', 'Martinez Campos', '02/11/2001', 'Trobajo del Camino', '793234416', 'ESO4'),
(29, 'Patricia', 'Marcos Morales', '06/30/2001', 'Villabalter', '636292763', 'ESO2'),
(30, 'Sergio', 'Morales Estevez', '01/21/2002', 'León', '325914947', 'ESO4'),
(31, 'Rosa', 'Prada Sanchez', '08/11/2002', 'San Andres del Rabanedo', '522788882', 'ESO1'),
(32, 'Carlos', 'Marcos Antunez', '12/20/2003', 'San Andres del Rabanedo', '101779828', 'ESO2'),
(33, 'Carlos', 'Fernandez Morales', '10/13/1999', 'León', '622665835', 'ESO3'),
(34, 'Alicia', 'Jimenez Gomez', '01/30/2000', 'León', '271226844', 'ESO4'),
(35, 'Pedro', 'Comas Campillo', '06/30/2001', 'San Andres del Rabanedo', '858886727', 'ESO2'),
(36, 'Miguel', 'Martin Sanchez', '05/23/2001', 'Villabalter', '934300040', 'ESO4'),
(37, 'Carmen', 'Jimenez Campos', '06/14/1999', 'Trobajo del Camino', '838719776', 'ESO4'),
(38, 'Miguel', 'Martin Rodriguez', '08/07/2000', 'Villabalter', '244778636', 'ESO2'),
(39, 'Raul', 'Marcos Morales', '10/25/2000', 'Trobajo del Camino', '252704078', 'ESO3'),
(40, 'Alvaro', 'Antunez Marcos', '10/29/1999', 'Trobajo del Camino', '052042928', 'ESO4'),
(41, 'Marta', 'Gomez Prada', '06/17/2002', 'León', '124350843', 'ESO2'),
(42, 'Gabriela', 'Calvo Campos', '10/25/2002', 'San Andres del Rabanedo', '064118146', 'ESO1'),
(43, 'Raul', 'Hernandez Santos', '01/01/2000', 'Villabalter', '317813404', 'ESO4'),
(44, 'Yolanda', 'Rodriguez Estevez', '04/29/2001', 'San Andres del Rabanedo', '458890164', 'ESO1'),
(45, 'Juan', 'Santos Jimenez', '11/10/2001', 'León', '785020850', 'ESO1'),
(46, 'Carmen', 'Santos Gomez', '04/10/2000', 'León', '778240516', 'ESO4'),
(47, 'Gabriela', 'Santos Martin', '02/24/2000', 'Villabalter', '531357512', 'ESO4'),
(48, 'Sergio', 'Sanchez Rodriguez', '12/13/2001', 'Trobajo del Camino', '088275203', 'ESO1'),
(49, 'Oscar', 'Antunez Quintanilla', '10/27/2000', 'San Andres del Rabanedo', '058963111', 'ESO4'),
(50, 'Marta', 'Martinez Santos', '04/03/2001', 'León', '506918749', 'ESO3'),
(51, 'Carlos', 'Gomez Calvo', '11/24/2002', 'Trobajo del Camino', '449827464', 'ESO1'),
(52, 'Juan', 'Estevez Lopez', '10/31/1999', 'León', '930334138', 'ESO1'),
(53, 'Yolanda', 'Jimenez Gomez', '05/08/2002', 'León', '761619362', 'ESO4'),
(54, 'Luis', 'Calvo Martinez', '11/26/2003', 'San Andres del Rabanedo', '226130507', 'ESO4'),
(55, 'Diana', 'Llorente Lopez', '04/22/1999', 'San Andres del Rabanedo', '286471636', 'ESO2'),
(56, 'Ana', 'Santos Fernandez', '04/19/2002', 'Villabalter', '566291866', 'ESO3'),
(57, 'Diana', 'Sanchez Martinez', '11/23/2001', 'San Andres del Rabanedo', '561223290', 'ESO2'),
(58, 'Ana', 'Martinez Campos', '04/25/2002', 'San Andres del Rabanedo', '532070466', 'ESO1'),
(59, 'Maria', 'Calvo Fernandez', '03/30/2000', 'Trobajo del Camino', '417674328', 'ESO2'),
(60, 'Saul', 'Llorente Prada', '12/06/2000', 'León', '233958784', 'ESO4'),
(61, 'Rosa', 'Gomez Llorente', '11/10/2002', 'Villabalter', '878901184', 'ESO2'),
(62, 'Sergio', 'Quintanilla Calvo', '06/02/2002', 'Trobajo del Camino', '968313283', 'ESO2'),
(63, 'Alicia', 'Antunez Lopez', '01/14/2001', 'San Andres del Rabanedo', '203765115', 'ESO2'),
(64, 'Antonio', 'Comas Antunez', '06/23/2000', 'León', '569055500', 'ESO1'),
(65, 'Diana', 'Marcos Morales', '03/17/2003', 'Villabalter', '884751314', 'ESO2'),
(66, 'Rosa', 'Suarez Calvo', '10/21/1999', 'León', '852519346', 'ESO4'),
(67, 'Maria', 'Morales Perez', '09/29/2003', 'León', '430146029', 'ESO1'),
(68, 'Diana', 'Suarez Lopez', '06/25/2001', 'Trobajo del Camino', '594137255', 'ESO2'),
(69, 'Alicia', 'Ramos Sanchez', '06/18/2003', 'San Andres del Rabanedo', '628440639', 'ESO2'),
(70, 'Beatriz', 'Marcos Perez', '06/10/2001', 'León', '713159277', 'ESO2'),
(71, 'Alberto', 'Prada Llorente', '05/31/1999', 'Trobajo del Camino', '842388657', 'ESO3'),
(72, 'Carmen', 'Lopez Sanchez', '09/19/2000', 'Trobajo del Camino', '171998961', 'ESO2'),
(73, 'Susana', 'Gomez Santos', '06/07/2002', 'León', '473554695', 'ESO1'),
(74, 'Alberto', 'Fernandez Lopez', '09/04/2001', 'León', '082139999', 'ESO2'),
(75, 'Susana', 'Gomez Hernandez', '08/24/2003', 'León', '633852119', 'ESO2'),
(76, 'Antonio', 'Marcos Lopez', '01/25/1999', 'San Andres del Rabanedo', '378389938', 'ESO1'),
(77, 'Raul', 'Santos Morales', '02/05/2000', 'Villabalter', '617386403', 'ESO4'),
(78, 'Luis', 'Fernandez Santos', '02/02/2002', 'Trobajo del Camino', '200715248', 'ESO2'),
(79, 'Raul', 'Estevez Calvo', '08/18/2003', 'Trobajo del Camino', '777805859', 'ESO2'),
(80, 'Pedro', 'Ramos Rodriguez', '10/21/2001', 'León', '861709590', 'ESO1'),
(81, 'Angela', 'Gomez Ramos', '02/04/1999', 'San Andres del Rabanedo', '985359618', 'ESO1'),
(82, 'Alicia', 'Suarez Santos', '10/21/2001', 'Trobajo del Camino', '201929719', 'ESO3'),
(83, 'Marta', 'Morales Marcos', '04/08/2003', 'León', '548413527', 'ESO4'),
(84, 'Pedro', 'Comas Quintanilla', '08/21/2003', 'San Andres del Rabanedo', '021109758', 'ESO3'),
(85, 'Carlos', 'Rodriguez Ramos', '09/30/2000', 'Villabalter', '025008183', 'ESO2'),
(86, 'Susana', 'Sanchez Quintanilla', '07/23/2001', 'León', '325058752', 'ESO3'),
(87, 'Luis', 'Hernandez Sanchez', '02/01/2003', 'Trobajo del Camino', '314328094', 'ESO1'),
(88, 'Sergio', 'Morales Comas', '11/25/2001', 'Villabalter', '926079446', 'ESO3'),
(89, 'Gabriela', 'Hernandez Marcos', '08/15/2002', 'San Andres del Rabanedo', '808330538', 'ESO4'),
(90, 'Beatriz', 'Morales Antunez', '08/26/2001', 'Trobajo del Camino', '233576259', 'ESO1'),
(91, 'Yolanda', 'Llorente Ramos', '04/10/2001', 'León', '554787864', 'ESO2'),
(92, 'Mario', 'Martin Gomez', '11/07/2002', 'León', '703576276', 'ESO3'),
(93, 'Angela', 'Santos Quintanilla', '02/02/2001', 'Trobajo del Camino', '291594726', 'ESO4'),
(94, 'Juan', 'Estevez Antunez', '04/16/2001', 'León', '082318895', 'ESO4'),
(95, 'Domingo', 'Martin Morales', '01/01/1999', 'Trobajo del Camino', '671934408', 'ESO4'),
(96, 'Patricia', 'Llorente Gomez', '08/12/2002', 'León', '740714098', 'ESO4'),
(97, 'Diana', 'Sanchez Quintanilla', '11/18/2001', 'León', '137821543', 'ESO4'),
(98, 'Beatriz', 'Quintanilla Marcos', '06/29/2001', 'San Andres del Rabanedo', '483948249', 'ESO3'),
(99, 'Juan', 'Estevez Marcos', '02/17/2002', 'Trobajo del Camino', '466141890', 'ESO1'),
(100, 'Raul', 'Prada Santos', '09/04/1999', 'Villabalter', '815165191', 'ESO2'),
(101, 'Angela', 'Santos Calvo', '05/02/2002', 'San Andres del Rabanedo', '903701483', 'ESO3'),
(102, 'Diana', 'Fernandez Sanchez', '10/15/2003', 'León', '641198279', 'ESO2'),
(103, 'Rosa', 'Estevez Llorente', '05/14/2002', 'León', '448348162', 'ESO4'),
(104, 'Yolanda', 'Perez Quintanilla', '09/24/2001', 'León', '030674681', 'ESO1'),
(105, 'Patricia', 'Perez Lopez', '02/02/2002', 'Villabalter', '269644487', 'ESO3'),
(106, 'Yolanda', 'Campillo Comas', '10/18/2003', 'Villabalter', '632090328', 'ESO3'),
(107, 'Saul', 'Ramos Lopez', '05/03/2002', 'León', '191173064', 'ESO1'),
(108, 'Yolanda', 'Hernandez Gomez', '04/23/1999', 'Trobajo del Camino', '294069942', 'ESO3'),
(109, 'Angela', 'Suarez Jimenez', '04/04/2001', 'Trobajo del Camino', '484937710', 'ESO2'),
(110, 'Alberto', 'Prada Fernandez', '12/22/1999', 'Villabalter', '527306498', 'ESO4'),
(111, 'Saul', 'Marcos Calvo', '02/27/2000', 'Villabalter', '918013291', 'ESO4'),
(112, 'Pedro', 'Campos Suarez', '04/30/2001', 'León', '721980301', 'ESO3'),
(113, 'Yolanda', 'Sanchez Marcos', '07/13/1999', 'Villabalter', '516888664', 'ESO4'),
(114, 'Oscar', 'Quintanilla Lopez', '03/15/2002', 'Villabalter', '980369978', 'ESO1'),
(115, 'Pedro', 'Quintanilla Hernandez', '07/31/2001', 'Trobajo del Camino', '984353693', 'ESO3'),
(116, 'Susana', 'Prada Fernandez', '08/19/2001', 'San Andres del Rabanedo', '595198742', 'ESO2'),
(117, 'Saul', 'Hernandez Quintanilla', '02/10/1999', 'San Andres del Rabanedo', '539788961', 'ESO2'),
(118, 'Saul', 'Perez Llorente', '03/26/2003', 'Trobajo del Camino', '904272346', 'ESO3'),
(119, 'Antonio', 'Santos Lopez', '05/02/2000', 'Villabalter', '097218847', 'ESO4'),
(120, 'Pedro', 'Llorente Suarez', '09/06/2001', 'Villabalter', '728354801', 'ESO4'),
(121, 'Oscar', 'Llorente, Marcos', '12/31/2002', 'León', '762066721', 'ESO4'),
(122, 'Oscar', 'Quintanilla, Sanchez', '02/09/1999', 'Villabalter', '963624225', 'ESO1'),
(123, 'Domingo', 'Campos, Perez', '10/06/1999', 'Trobajo del Camino', '767750208', 'ESO4'),
(124, 'Patricia', 'Fernandez, Hernandez', '11/15/2003', 'Trobajo del Camino', '330088119', 'ESO2'),
(125, 'Saul', 'Fernandez, Martin', '07/02/2001', 'San Andres del Rabanedo', '468709951', 'ESO3'),
(126, 'Patricia', 'Marcos, Rodriguez', '11/26/2003', 'Villabalter', '238797954', 'ESO3'),
(127, 'Rosa', 'Llorente, Ramos', '06/09/2003', 'León', '068346734', 'ESO1'),
(128, 'Saul', 'Suarez, Fernandez', '07/23/1999', 'Villabalter', '330745901', 'ESO1'),
(129, 'Alberto', 'Ramos, Suarez', '08/11/2000', 'León', '920565024', 'ESO1'),
(130, 'Raul', 'Gomez, Fernandez', '02/07/1999', 'León', '549526039', 'ESO3'),
(131, 'Raul', 'Marcos Martin', '06/07/2003', 'Trobajo del Camino', '497651076', 'ESO2'),
(132, 'Alvaro', 'Marcos Hernandez', '01/09/2000', 'San Andres del Rabanedo', '860244314', 'ESO2'),
(133, 'Diana', 'Hernandez Llorente', '10/18/1999', 'León', '042440081', 'ESO4'),
(134, 'Juan', 'Hernandez Rodriguez', '02/12/2002', 'León', '339054290', 'ESO4'),
(135, 'Luis', 'Hernandez Fernandez', '04/23/2001', 'Trobajo del Camino', '094658273', 'ESO1'),
(136, 'Alberto', 'Santos Calvo', '10/10/2003', 'León', '782628024', 'ESO3'),
(137, 'Angela', 'Gomez Comas', '11/18/2002', 'San Andres del Rabanedo', '150872180', 'ESO3'),
(138, 'Yolanda', 'Calvo Quintanilla', '03/11/1999', 'León', '029156695', 'ESO3'),
(139, 'Juan', 'Martin Marcos', '12/12/2003', 'San Andres del Rabanedo', '782091905', 'ESO3'),
(140, 'Beatriz', 'Rodriguez Martin', '06/27/2000', 'Villabalter', '880758072', 'ESO3'),
(141, 'Gabriela', 'Jimenez Rodriguez', '08/15/2001', 'San Andres del Rabanedo', '135949073', 'ESO4'),
(142, 'Marta', 'Martin Campillo', '11/30/2000', 'Villabalter', '270498180', 'ESO2'),
(143, 'Alberto', 'Suarez Fernandez', '01/21/1999', 'Trobajo del Camino', '483669874', 'ESO3'),
(144, 'Ana', 'Calvo Gomez', '12/05/2001', 'Trobajo del Camino', '894062535', 'ESO1'),
(145, 'Patricia', 'Quintanilla Suarez', '07/23/2003', 'León', '610835330', 'ESO1'),
(146, 'Mario', 'Gomez Rodriguez', '08/16/1999', 'Trobajo del Camino', '872110112', 'ESO3'),
(147, 'Beatriz', 'Comas Sanchez', '05/03/2002', 'Villabalter', '725859805', 'ESO4'),
(148, 'Beatriz', 'Antunez Calvo', '10/02/2002', 'León', '379777422', 'ESO1'),
(149, 'Raul', 'Sanchez Campillo', '05/26/2003', 'San Andres del Rabanedo', '963944621', 'ESO2'),
(150, 'Beatriz', 'Lopez Martinez', '09/19/2002', 'León', '527643767', 'ESO3'),
(151, 'Domingo', 'Antunez Campos', '07/29/1999', 'Trobajo del Camino', '221158588', 'ESO2'),
(152, 'Luis', 'Lopez Santos', '05/03/2000', 'San Andres del Rabanedo', '469653217', 'ESO4'),
(153, 'Miguel', 'Gomez Campillo', '11/20/2003', 'Trobajo del Camino', '127696423', 'ESO3'),
(154, 'Ana', 'Campos Jimenez', '12/18/2000', 'San Andres del Rabanedo', '635303873', 'ESO2'),
(155, 'Domingo', 'Suarez Santos', '09/14/2001', 'Villabalter', '687561039', 'ESO1'),
(156, 'Patricia', 'Sanchez Estevez', '06/15/1999', 'Trobajo del Camino', '437314525', 'ESO4'),
(157, 'Saul', 'Quintanilla Estevez', '03/03/1999', 'Villabalter', '019511144', 'ESO2'),
(158, 'Oscar', 'Campillo Sanchez', '10/30/2000', 'Villabalter', '968647297', 'ESO2'),
(159, 'Alicia', 'Lopez Ramos', '07/04/2003', 'Trobajo del Camino', '209506803', 'ESO3'),
(160, 'Alicia', 'Gomez Quintanilla', '06/30/1999', 'Villabalter', '667377811', 'ESO3'),
(161, 'Sergio', 'Morales Hernandez', '05/05/2001', 'Villabalter', '521682747', 'ESO1'),
(162, 'Juan', 'Martin Prada', '08/27/2002', 'Villabalter', '184528891', 'ESO2'),
(163, 'Maria', 'Ramos Hernandez', '10/16/2000', 'Trobajo del Camino', '369284926', 'ESO4'),
(164, 'Luis', 'Perez Campillo', '10/22/2002', 'Trobajo del Camino', '349391021', 'ESO2'),
(165, 'Saul', 'Hernandez Santos', '06/01/1999', 'San Andres del Rabanedo', '658838192', 'ESO2'),
(166, 'Pedro', 'Santos Antunez', '05/10/2001', 'Villabalter', '485323128', 'ESO1'),
(167, 'Beatriz', 'Santos Calvo', '02/27/2002', 'Villabalter', '902529256', 'ESO4'),
(168, 'Alberto', 'Calvo Ramos', '07/12/2001', 'Trobajo del Camino', '335267195', 'ESO3'),
(169, 'Ana', 'Santos Llorente', '04/04/2000', 'San Andres del Rabanedo', '854248875', 'ESO4'),
(170, 'Alvaro', 'Fernandez Martin', '08/07/2003', 'Trobajo del Camino', '399479518', 'ESO3'),
(171, 'Pedro', 'Fernandez Llorente', '06/05/2001', 'San Andres del Rabanedo', '721972229', 'ESO2'),
(172, 'Alvaro', 'Sanchez Martinez', '01/23/1999', 'León', '626385438', 'ESO2'),
(173, 'Beatriz', 'Marcos Jimenez', '08/13/2002', 'Trobajo del Camino', '989608802', 'ESO1'),
(174, 'Gabriela', 'Jimenez Suarez', '10/04/2002', 'Villabalter', '470651700', 'ESO1'),
(175, 'Angela', 'Martinez Martin', '10/14/2001', 'Villabalter', '245596280', 'ESO4'),
(176, 'Carlos', 'Martinez Llorente', '08/09/2000', 'Trobajo del Camino', '098915697', 'ESO3'),
(177, 'Patricia', 'Antunez Hernandez', '12/09/2001', 'Villabalter', '891563559', 'ESO4'),
(178, 'Angela', 'Antunez Martin', '03/03/2000', 'León', '134163593', 'ESO4'),
(179, 'Marta', 'Rodriguez Calvo', '06/01/1999', 'Villabalter', '016110600', 'ESO1'),
(180, 'Mario', 'Santos Sanchez', '05/08/2003', 'León', '339749546', 'ESO2'),
(181, 'Yolanda', 'Calvo Lopez', '06/19/2000', 'Villabalter', '209237306', 'ESO2'),
(182, 'Saul', 'Martinez Lopez', '03/12/2002', 'Trobajo del Camino', '750254481', 'ESO1'),
(183, 'Carmen', 'Marcos Sanchez', '05/25/2001', 'León', '408548600', 'ESO4'),
(184, 'Pedro', 'Ramos Marcos', '11/24/2003', 'León', '980650437', 'ESO4'),
(185, 'Sergio', 'Rodriguez Calvo', '06/22/2001', 'San Andres del Rabanedo', '634816951', 'ESO2'),
(186, 'Alicia', 'Prada Martin', '03/10/2003', 'Trobajo del Camino', '309689670', 'ESO2'),
(187, 'Raul', 'Campillo Estevez', '05/27/1999', 'Trobajo del Camino', '367882443', 'ESO2'),
(188, 'Antonio', 'Morales Hernandez', '09/22/2003', 'León', '457516192', 'ESO1'),
(189, 'Carlos', 'Sanchez Martinez', '07/11/1999', 'San Andres del Rabanedo', '364634474', 'ESO3'),
(190, 'Luis', 'Lopez Fernandez', '07/17/2001', 'Villabalter', '143435844', 'ESO1'),
(191, 'Ana', 'Martinez Santos', '12/15/2000', 'Trobajo del Camino', '357823679', 'ESO2'),
(192, 'Angela', 'Campillo Martin', '08/08/2003', 'Trobajo del Camino', '656820767', 'ESO4'),
(193, 'Marta', 'Estevez Morales', '01/31/2003', 'Trobajo del Camino', '452559624', 'ESO1'),
(194, 'Oscar', 'Lopez Gomez', '04/24/2002', 'Villabalter', '520308572', 'ESO1'),
(195, 'Juan', 'Prada Morales', '04/03/2000', 'San Andres del Rabanedo', '323980199', 'ESO1'),
(196, 'Marta', 'Sanchez Gomez', '07/09/2003', 'Villabalter', '593731070', 'ESO3'),
(197, 'Pedro', 'Campillo Fernandez', '09/05/2000', 'San Andres del Rabanedo', '688965530', 'ESO3'),
(198, 'Carlos', 'Comas Morales', '03/25/2000', 'León', '586443990', 'ESO4'),
(199, 'Beatriz', 'Estevez Lopez', '07/26/2003', 'Villabalter', '477450050', 'ESO1'),
(200, 'Saul', 'Ramos Calvo', '12/19/2001', 'León', '934134417', 'ESO2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE IF NOT EXISTS `profesores` (
  `id_profesor` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Pass` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Tipo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Apellidos` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Tutoria` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_profesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `Usuario`, `Pass`, `Tipo`, `Nombre`, `Apellidos`, `Tutoria`) VALUES
(1, 'admin', 'admin', 'Administrador', 'Administrador', NULL, NULL),
(2, 'angelramos', 'angelramos', 'Profesor', 'Angel', 'Ramos, Pina', 'ESO1'),
(3, 'saralopez', 'saralopez', 'Profesor', 'Sara', 'Lopez, Valiente', 'ESO2'),
(4, 'danielsanz', 'danielsanz', 'Profesor', 'Daniel', 'Sanz, Revilla', 'ESO3'),
(5, 'analuengo', 'analuengo', 'Profesor', 'Ana', 'Luengo, Florez', 'ESO4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
