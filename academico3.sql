-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2020 a las 01:18:50
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academico3`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `contar` (`res` VARCHAR(20)) RETURNS BIGINT(20) RETURN (SELECT COUNT(i.residencia) FROM identificador i, notas n WHERE i.ci = n.ci AND n.nota > 50 AND i.residencia= res)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `depto` varchar(2) DEFAULT NULL,
  `nota` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `apellido`, `depto`, `nota`) VALUES
(2, 'mayda', 'delgado', '04', 69),
(4, 'Felix', 'Montes', '04', 49),
(6, 'moyo', 'silva', '09', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identificador`
--

CREATE TABLE `identificador` (
  `ci` int(11) NOT NULL,
  `nombre_completo` varchar(60) DEFAULT NULL,
  `fecha_nacimiento` varchar(20) DEFAULT NULL,
  `residencia` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `identificador`
--

INSERT INTO `identificador` (`ci`, `nombre_completo`, `fecha_nacimiento`, `residencia`) VALUES
(1, 'mayda aduviri', '23/02/1994', '02'),
(2, 'Alex Zapata', '16/04/1990', '01'),
(333, 'Pedro Sanchez', '01/05/1994', '03'),
(444, 'Maria Delgado', '30/05/1992', '04'),
(555, 'Camila Perez', '05/05/2000', '04'),
(666, 'Cesar Mendez', '17/10/1990', '06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `ci` int(11) DEFAULT NULL,
  `materia` varchar(40) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`ci`, `materia`, `nota`) VALUES
(1, 'quimica', 70),
(1, 'fisica', 50),
(2, 'quimica', 40),
(2, 'fisica', 60),
(1, 'matematica', 40),
(2, 'matematica', 60),
(333, 'matematica', 51),
(333, 'fisica', 70),
(333, 'quimica', 40),
(444, 'matematica', 67),
(444, 'fisica', 56),
(555, 'quimica', 51),
(555, 'matematica', 40),
(555, 'fisica', 70),
(666, 'quimica', 45),
(666, 'matematica', 69),
(666, 'fisica', 66);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ci` int(11) NOT NULL,
  `clave` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ci`, `clave`) VALUES
(1, '123'),
(2, '123'),
(333, '333'),
(444, '444'),
(555, '555'),
(666, '666');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `identificador`
--
ALTER TABLE `identificador`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD KEY `ci` (`ci`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ci`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `identificador` (`ci`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `identificador` (`ci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
