-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2022 a las 03:24:34
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbpayroll`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblemployees`
--

CREATE TABLE `tblemployees` (
  `fldindex` int(11) NOT NULL,
  `fldlastname` text NOT NULL,
  `fldfirstname` text NOT NULL,
  `fldposition` text NOT NULL,
  `fldemployeetype` text NOT NULL,
  `fldperiod` text NOT NULL,
  `fldBasicPay` double NOT NULL,
  `fldNightDiff` int(11) NOT NULL,
  `fldOvertime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblemployees`
--

INSERT INTO `tblemployees` (`fldindex`, `fldlastname`, `fldfirstname`, `fldposition`, `fldemployeetype`, `fldperiod`, `fldBasicPay`, `fldNightDiff`, `fldOvertime`) VALUES
(1, 'Broad', 'Chris', 'Manager', 'Full', 'Monthly', 40000.45, 0, 3),
(2, 'Bazinga', 'Joey', 'Staff', 'Part', 'Monthly', 14000.55, 1, 0),
(3, 'Maneetapho', 'Garnt', 'Manager', 'Full', 'Monthly', 40000.45, 2, 3),
(4, 'Colquhoun', 'Connor', 'Executive', 'Full', 'Semi-Monthly', 31800.65, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD UNIQUE KEY `fldindex` (`fldindex`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
