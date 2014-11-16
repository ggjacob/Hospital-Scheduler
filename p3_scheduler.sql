-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2014 at 06:33 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `p3_scheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Employee_ID` int(10) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `First_Name`, `Last_Name`, `Username`, `Password`) VALUES
(1, 'Jarrin', 'Oishi', 'jro65', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'Mike', 'Carter', 'mc123', '7c6a180b36896a0a8c02787eeafb0e4c'),
(3, 'Kim', 'Candy', 'kc321', 'db6ae64dfa9e78039db6df5b8edbc38c');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
`ID` int(10) NOT NULL,
  `Body` varchar(1000) NOT NULL,
  `Title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `req_time_off`
--

CREATE TABLE IF NOT EXISTS `req_time_off` (
  `Employee_ID` int(10) NOT NULL,
`RTO_ID` int(10) NOT NULL,
  `Date` date NOT NULL DEFAULT '0000-00-00',
  `Day` varchar(10) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `Shift_ID` int(10) NOT NULL,
  `Employee_ID` int(10) NOT NULL,
  `Day` varchar(10) NOT NULL,
  `Date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
  `Shift_ID` int(10) NOT NULL,
  `Start_Time` varchar(5) NOT NULL,
  `End_Time` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`Employee_ID`), ADD UNIQUE KEY `Username` (`Username`), ADD FULLTEXT KEY `Password` (`Password`), ADD FULLTEXT KEY `Password_2` (`Password`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `req_time_off`
--
ALTER TABLE `req_time_off`
 ADD PRIMARY KEY (`RTO_ID`), ADD KEY `Employee_ID` (`Employee_ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
 ADD PRIMARY KEY (`Employee_ID`,`Date`), ADD KEY `Shift_ID` (`Shift_ID`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
 ADD PRIMARY KEY (`Shift_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `req_time_off`
--
ALTER TABLE `req_time_off`
MODIFY `RTO_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `req_time_off`
--
ALTER TABLE `req_time_off`
ADD CONSTRAINT `req_time_off_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`),
ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`Shift_ID`) REFERENCES `shift` (`Shift_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
