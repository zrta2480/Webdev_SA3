-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 11:35 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpayroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
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
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`fldindex`, `fldlastname`, `fldfirstname`, `fldposition`, `fldemployeetype`, `fldperiod`, `fldBasicPay`, `fldNightDiff`, `fldOvertime`) VALUES
(9090, 'Broad', 'Chris', 'Manager', 'Full', 'Monthly', 22435, 0, 3),
(123456, 'Bazinga', 'Joey', 'Staff', 'Part', 'Monthly', 24432.98, 1, 0),
(420690, 'Maneetapho', 'Garnt', 'Manager', 'Full', 'Monthly', 23409.43, 2, 3),
(930000, 'Colquhoun', 'Connor', 'Executive', 'Full', 'Semi-Monthly', 25242.34, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD UNIQUE KEY `fldindex` (`fldindex`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
