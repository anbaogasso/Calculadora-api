-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.0.0.22
-- Tiempo de generación: 25-05-2022 a las 22:04:28
-- Versión del servidor: 10.3.17-MariaDB-0+deb10u1
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calculadora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Prova1`
--

CREATE TABLE `Prova1` (
  `ID` int(11) NOT NULL,
  `Model` varchar(40) NOT NULL,
  `Marca` varchar(15) NOT NULL,
  `Pes` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Prova1`
--

INSERT INTO `Prova1` (`ID`, `Model`, `Marca`, `Pes`) VALUES
(1, 'Pavilion x360 - 14-cd0004la', 'HP', 1.68),
(2, 'Yoga Slim 7i 14', 'Lenovo', 1.31),
(3, 'MacBook Air 2020', 'Apple', 1.29);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Prova1`
--
ALTER TABLE `Prova1`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
