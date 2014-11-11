-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2014 at 05:28 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `staff_scheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`Employee_ID` int(4) NOT NULL,
  `FirstName` int(50) NOT NULL,
  `LastName` int(50) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recurring_schedule`
--

CREATE TABLE IF NOT EXISTS `recurring_schedule` (
`Schedule_ID` int(11) NOT NULL,
  `DayOfWeek` varchar(9) NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Employee_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `requested_time_off`
--

CREATE TABLE IF NOT EXISTS `requested_time_off` (
`RTO_ID` int(11) NOT NULL,
  `Employee_ID` int(11) NOT NULL,
  `Start_Time` time NOT NULL,
  `Description` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
`Shift_ID` int(11) NOT NULL,
  `Start_Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `End_Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Employee_ID` int(11) NOT NULL,
  `Description` varchar(140) NOT NULL,
  `OriginallyAssigned` int(11) NOT NULL,
  `ShiftState` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`Employee_ID`), ADD UNIQUE KEY `Employee_ID` (`Employee_ID`);

--
-- Indexes for table `recurring_schedule`
--
ALTER TABLE `recurring_schedule`
 ADD PRIMARY KEY (`Schedule_ID`), ADD UNIQUE KEY `Schedule_ID` (`Schedule_ID`);

--
-- Indexes for table `requested_time_off`
--
ALTER TABLE `requested_time_off`
 ADD PRIMARY KEY (`RTO_ID`), ADD UNIQUE KEY `RTO_ID` (`RTO_ID`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
 ADD PRIMARY KEY (`Shift_ID`), ADD UNIQUE KEY `Shift_ID` (`Shift_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `Employee_ID` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recurring_schedule`
--
ALTER TABLE `recurring_schedule`
MODIFY `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requested_time_off`
--
ALTER TABLE `requested_time_off`
MODIFY `RTO_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
MODIFY `Shift_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
