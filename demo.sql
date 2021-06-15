-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 05:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `empl`
--

CREATE TABLE `empl` (
  `empId` varchar(10) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empEmail` varchar(100) NOT NULL,
  `emPsw` varchar(100) NOT NULL,
  `clg` varchar(500) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `empType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empl`
--

INSERT INTO `empl` (`empId`, `empName`, `empEmail`, `emPsw`, `clg`, `branch`, `empType`) VALUES
('4mh17is010', 'Benaka H N', 'benaka.nagesh05@gmail.com', '789456', 'MITM', 'ISE', 'Student'),
('4mh17is011', 'Bharath V', 'bharath@gmail.com', '123456', 'MITM', 'ISE', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE `timesheet` (
  `slno` int(11) NOT NULL,
  `empId` varchar(10) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `hrs` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`slno`, `empId`, `empName`, `hrs`, `date`) VALUES
(1, '4mh17is010', 'Benaka H N', 8, '2021-05-23'),
(2, '4mh17is010', 'Benaka H N', 8, '2021-05-24'),
(3, '4mh17is011', 'Bharath V', 8, '2021-05-24'),
(4, '4mh17is010', 'Benaka H N', 9, '2021-05-25'),
(5, '4mh17is010', 'Benaka H N', 8, '2021-05-26'),
(6, '4mh17is011', 'Bharath V', 9, '2021-05-26'),
(7, '4mh17is010', 'Benaka H N', 9, '2021-05-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empl`
--
ALTER TABLE `empl`
  ADD PRIMARY KEY (`empId`),
  ADD UNIQUE KEY `empEmail` (`empEmail`);

--
-- Indexes for table `timesheet`
--
ALTER TABLE `timesheet`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `FK` (`empId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `timesheet`
--
ALTER TABLE `timesheet`
  ADD CONSTRAINT `FK` FOREIGN KEY (`empId`) REFERENCES `empl` (`empId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
