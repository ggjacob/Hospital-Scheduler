-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2014 at 08:08 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scheduler`
--
CREATE DATABASE IF NOT EXISTS `scheduler` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `scheduler`;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `EMPLOYEE_FNAME` varchar(15) NOT NULL,
  `EMPLOYEE_LNAME` varchar(15) NOT NULL,
  PRIMARY KEY (`EMPLOYEE_ID`),
  KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `EMPLOYEE_FNAME`, `EMPLOYEE_LNAME`) VALUES
(12345, 'Duke', 'Ayers'),
(54321, 'Ekud', 'Lastname'),
(68794, 'Bob', 'McSwag'),
(78456, 'Timothy', 'Bear');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `SCHEDULE_SHIFT_ID` int(1) NOT NULL,
  `SCHEDULE_EMPLOYEE_ID` int(10) NOT NULL,
  `SCHEDULE_DAY` varchar(15) NOT NULL,
  PRIMARY KEY (`SCHEDULE_SHIFT_ID`,`SCHEDULE_EMPLOYEE_ID`,`SCHEDULE_DAY`),
  KEY `SCHEDULE_SHIFT_ID` (`SCHEDULE_SHIFT_ID`,`SCHEDULE_EMPLOYEE_ID`),
  KEY `SCHEDULE_EMPLOYEE_ID` (`SCHEDULE_EMPLOYEE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`SCHEDULE_SHIFT_ID`, `SCHEDULE_EMPLOYEE_ID`, `SCHEDULE_DAY`) VALUES
(1, 12345, 'Monday'),
(2, 12345, 'Tuesday'),
(2, 12345, 'Wednesday'),
(4, 12345, 'Saturday'),
(1, 54321, 'Friday'),
(1, 54321, 'Wednesday'),
(2, 54321, 'Monday'),
(3, 54321, 'Saturday'),
(4, 54321, 'Sunday'),
(4, 54321, 'Thursday'),
(4, 54321, 'Tuesday'),
(4, 68794, 'Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
  `SHIFT_ID` int(2) NOT NULL,
  `SHIFT_START` int(20) NOT NULL,
  `SHIFT_END` int(20) NOT NULL,
  PRIMARY KEY (`SHIFT_ID`),
  KEY `SHIFT_ID` (`SHIFT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`SHIFT_ID`, `SHIFT_START`, `SHIFT_END`) VALUES
(1, 730, 1600),
(2, 800, 1400),
(3, 1200, 2350),
(4, 1600, 2350),
(5, 200, 900);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`SCHEDULE_SHIFT_ID`) REFERENCES `shift` (`SHIFT_ID`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`SCHEDULE_EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
