-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 06:13 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arpi_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_dit`
--

CREATE TABLE `employee_dit` (
  `BB_No` varchar(6) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Team` varchar(20) NOT NULL,
  `M_ID` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_dit`
--

INSERT INTO `employee_dit` (`BB_No`, `Name`, `Email`, `Team`, `M_ID`) VALUES
('bvjbj', 'hkbj', 'nk@danskeit.co.in', 'vhvh', 'bbhb');

-- --------------------------------------------------------

--
-- Table structure for table `employee_login`
--

CREATE TABLE `employee_login` (
  `Username` varchar(6) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_login`
--

INSERT INTO `employee_login` (`Username`, `Password`) VALUES
('bvjbj', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `leave_data`
--

CREATE TABLE `leave_data` (
  `BB_No` varchar(6) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Start_Date` varchar(10) NOT NULL,
  `End_Date` varchar(10) NOT NULL,
  `Hours` int(2) NOT NULL,
  `Remarks` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_data`
--

INSERT INTO `leave_data` (`BB_No`, `Type`, `Start_Date`, `End_Date`, `Hours`, `Remarks`) VALUES
('BB1234', 'privilege', '2016-01-12', '2016-01-12', 4, 'holiday'),
('bvjbj', 'sick', '2017-07-04', '2017-07-06', 16, ''),
('BB1234', 'sick', '2017-07-04', '2017-07-05', 8, ''),
('BB1234', 'Privilege', '2017-07-03', '2017-07-04', 8, ''),
('BB1234', 'Privilege', '2017-07-10', '2017-07-11', 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `manager_dit`
--

CREATE TABLE `manager_dit` (
  `Manager_BB_No` varchar(6) NOT NULL,
  `Services` varchar(20) NOT NULL,
  `Department` varchar(10) NOT NULL,
  `Team` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager_dit`
--

INSERT INTO `manager_dit` (`Manager_BB_No`, `Services`, `Department`, `Team`) VALUES
('bbhb', 'bjj', 'bjhcg', 'vhvh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_dit`
--
ALTER TABLE `employee_dit`
  ADD PRIMARY KEY (`BB_No`,`Name`,`Email`,`Team`,`M_ID`),
  ADD KEY `Manager_fk_emp` (`M_ID`);

--
-- Indexes for table `employee_login`
--
ALTER TABLE `employee_login`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `leave_data`
--
ALTER TABLE `leave_data`
  ADD PRIMARY KEY (`BB_No`,`Type`,`Start_Date`,`End_Date`,`Hours`);

--
-- Indexes for table `manager_dit`
--
ALTER TABLE `manager_dit`
  ADD PRIMARY KEY (`Manager_BB_No`,`Services`,`Department`,`Team`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_dit`
--
ALTER TABLE `employee_dit`
  ADD CONSTRAINT `Manager_fk_emp` FOREIGN KEY (`M_ID`) REFERENCES `manager_dit` (`Manager_BB_No`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
