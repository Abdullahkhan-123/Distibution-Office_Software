-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 10:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office`
--

-- --------------------------------------------------------

--
-- Table structure for table `companyname`
--

CREATE TABLE `companyname` (
  `ID` int(11) NOT NULL,
  `CompanyName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companyname`
--

INSERT INTO `companyname` (`ID`, `CompanyName`) VALUES
(2, 'lavina');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `CotonQty` int(11) NOT NULL,
  `RetailPrice` int(11) NOT NULL,
  `DozenRate` int(11) NOT NULL,
  `CotonRate` int(11) NOT NULL,
  `Sechem` int(11) NOT NULL,
  `TpRate` int(11) NOT NULL,
  `CompanyNameID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `ProductName`, `Size`, `CotonQty`, `RetailPrice`, `DozenRate`, `CotonRate`, `Sechem`, `TpRate`, `CompanyNameID`) VALUES
(2, 'Computer', 'large', 15, 150, 3600, 4500, 12, 300, 2),
(16, 'mobile', 'large', 17, 150, 3600, 4500, 12, 300, 2),
(19, 'Headphone', 'small', 18, 150, 6000, 9000, 12, 500, 2),
(20, 'keyborad', 'large', 15, 0, 180, 225, 12, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salereport`
--

CREATE TABLE `salereport` (
  `ID` int(11) NOT NULL,
  `SaleStock` int(11) NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `SaleTotalAmount` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salereport`
--

INSERT INTO `salereport` (`ID`, `SaleStock`, `CompanyID`, `ProductID`, `SaleTotalAmount`, `Date`) VALUES
(13, 5, 2, 20, 75, '2022-12-01'),
(14, 6, 2, 19, 3000, '2022-12-01'),
(15, 7, 2, 16, 2100, '2022-12-02'),
(16, 8, 2, 2, 2400, '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `stockreport`
--

CREATE TABLE `stockreport` (
  `ID` int(11) NOT NULL,
  `InStock` int(11) NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockreport`
--

INSERT INTO `stockreport` (`ID`, `InStock`, `CompanyID`, `ProductID`, `TotalAmount`, `Date`) VALUES
(77, 18, 2, 20, 270, '2022-12-01'),
(78, 19, 2, 19, 9500, '2022-12-01'),
(79, 20, 2, 16, 6000, '2022-12-02'),
(80, 21, 2, 2, 6300, '2022-12-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companyname`
--
ALTER TABLE `companyname`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `salereport`
--
ALTER TABLE `salereport`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stockreport`
--
ALTER TABLE `stockreport`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companyname`
--
ALTER TABLE `companyname`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `salereport`
--
ALTER TABLE `salereport`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stockreport`
--
ALTER TABLE `stockreport`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
