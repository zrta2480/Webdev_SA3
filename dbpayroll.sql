-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2022 a las 07:50:10
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
  `fldpassword` text NOT NULL,
  `fldperiod` text NOT NULL,
  `fldBasicPay` double NOT NULL,
  `fldTaxAllow` double NOT NULL,
  `fldNonTaxAllow` double NOT NULL,
  `fldNightDiff` int(11) NOT NULL,
  `fldOvertime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblemployees`
--

INSERT INTO `tblemployees` (`fldindex`, `fldlastname`, `fldfirstname`, `fldposition`, `fldpassword`, `fldperiod`, `fldBasicPay`, `fldTaxAllow`, `fldNonTaxAllow`, `fldNightDiff`, `fldOvertime`) VALUES
(9090, 'Broad', 'Chris', 'Manager', 'password', 'Monthly', 22435, 2442.4, 2509.56, 0, 3),
(123456, 'Bazinga', 'Joey', 'Staff', 'password', 'Monthly', 24432.98, 2605.45, 1959.36, 1, 0),
(420690, 'Maneetapho', 'Garnt', 'Manager', 'password', 'Monthly', 23409.43, 2349.24, 1897.75, 2, 3),
(930000, 'Colquhoun', 'Connor', 'Executive', 'password', 'Semi-Monthly', 25242.34, 2535.6, 2547.75, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`fldindex`),
  ADD UNIQUE KEY `fldindex` (`fldindex`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
