-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 06:36 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE `tblexpense` (
  `ID` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `ExpenseDate` date DEFAULT NULL,
  `ExpenseItem` varchar(200) DEFAULT NULL,
  `ExpenseCost` varchar(200) DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`ID`, `UserId`, `ExpenseDate`, `ExpenseItem`, `ExpenseCost`, `NoteDate`) VALUES
(36, 11, '2022-11-08', 'Gift', '1500', '2022-11-08 07:43:24'),
(37, 13, '2022-11-09', 'gift', '5000', '2022-11-09 07:54:03'),
(38, 14, '2022-11-07', 'mes', '1500', '2022-11-09 07:58:31'),
(39, 14, '2022-11-06', 'rent', '1200', '2022-11-09 07:58:53'),
(40, 11, '2022-11-09', 'Gift', '50000', '2022-11-09 12:16:18'),
(41, 11, '2022-11-09', 'Dipak Sent', '5000', '2022-11-09 12:17:35'),
(42, 11, '2022-10-27', 'mes', '5000', '2022-11-09 13:02:34'),
(43, 11, '2022-06-09', 'rent', '1500', '2022-11-09 13:07:48'),
(44, 13, '2022-11-10', 'Gift', '1500', '2022-11-10 12:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblincome`
--

CREATE TABLE `tblincome` (
  `ID` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `IncomeDate` date DEFAULT NULL,
  `IncomeItem` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `IncomeCost` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblincome`
--

INSERT INTO `tblincome` (`ID`, `UserId`, `IncomeDate`, `IncomeItem`, `IncomeCost`, `NoteDate`) VALUES
(1, 11, '2022-11-08', 'Salary', '10000', '2022-11-08 10:10:19'),
(2, 11, '2022-11-08', 'Salary', '40000', '2022-11-08 10:38:40'),
(3, 11, '2022-11-07', 'Salary', '5000', '2022-11-08 11:18:37'),
(4, 13, '2022-07-09', 'Salary', '40000', '2022-11-09 07:53:00'),
(5, 14, '2022-11-09', 'pocket money', '6000', '2022-11-09 07:57:45'),
(6, 11, '2022-11-09', 'Salary', '100000', '2022-11-09 12:16:00'),
(7, 11, '2022-11-09', 'Pocket Money', '6000', '2022-11-09 12:16:48'),
(8, 11, '2022-11-10', 'Salary', '1', '2022-11-10 10:39:55'),
(9, 13, '2022-11-10', 'Salary', '40000', '2022-11-10 12:00:08'),
(10, 11, '2022-11-11', 'Income from Other Source', '10', '2022-11-11 06:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(11, 'Amol Chipte', 'amolchipate2002@gmail.com', 7410159487, '856fc81623da2150ba2210ba1b51d241', '2022-11-08 03:26:46'),
(12, 'Test User', 'testuser123@gmail.com', 123456789, '781e5e245d69b566979b86e28d23f2c7', '2022-11-09 03:40:02'),
(13, 'Dipak Suryawanshi', 'suryawanshidipak303@gmail.com', 9130766562, '3def184ad8f4755ff269862ea77393dd', '2022-11-09 07:51:53'),
(14, 'Anup Awari', 'awarianup2@gmail.com', 9922709579, '56468d5607a5aaf1604ff5e15593b003', '2022-11-09 07:57:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblincome`
--
ALTER TABLE `tblincome`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblincome`
--
ALTER TABLE `tblincome`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
