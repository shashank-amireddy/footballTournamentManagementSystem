-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 09:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fbs01`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangalore`
--

CREATE TABLE `bangalore` (
  `jerseyId` int(6) NOT NULL,
  `playerName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bangalore`
--

INSERT INTO `bangalore` (`jerseyId`, `playerName`) VALUES
(1, 'Hari'),
(2, 'Dishan'),
(12, 'Vasu'),
(18, 'Abhiram'),
(19, 'Akash'),
(20, 'Viraj'),
(33, 'Ram'),
(34, 'Mahesh'),
(42, 'Snehith'),
(53, 'Koushik'),
(56, 'Nag'),
(59, 'Kiran'),
(68, 'Suresh'),
(75, 'Charan'),
(86, 'Varun');

-- --------------------------------------------------------

--
-- Table structure for table `charminar`
--

CREATE TABLE `charminar` (
  `jerseyId` int(6) NOT NULL,
  `playerName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `charminar`
--

INSERT INTO `charminar` (`jerseyId`, `playerName`) VALUES
(0, '');

-- --------------------------------------------------------

--
-- Table structure for table `coiambatore`
--

CREATE TABLE `coiambatore` (
  `jerseyId` int(6) NOT NULL,
  `playerName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coiambatore`
--

INSERT INTO `coiambatore` (`jerseyId`, `playerName`) VALUES
(6, 'Thor'),
(9, 'Thanos'),
(14, 'Bheeshma'),
(26, 'Nakula'),
(29, 'Joo'),
(46, 'Sahadev'),
(52, 'Sumukh'),
(55, 'Rjesh'),
(56, 'Vikas'),
(65, 'Anuj'),
(69, 'Bheem'),
(72, 'Kritin'),
(76, 'Hitesh'),
(86, 'Loki'),
(96, 'Rahul');

-- --------------------------------------------------------

--
-- Table structure for table `hello`
--

CREATE TABLE `hello` (
  `jerseyId` int(6) NOT NULL,
  `playerName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hyderabad`
--

CREATE TABLE `hyderabad` (
  `jerseyId` int(6) NOT NULL,
  `playerName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iyytitdrs`
--

CREATE TABLE `iyytitdrs` (
  `jerseyId` int(6) NOT NULL,
  `playerName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `matchId` int(3) NOT NULL,
  `team1` varchar(50) NOT NULL,
  `team2` varchar(50) NOT NULL,
  `score1` int(3) NOT NULL,
  `score2` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`matchId`, `team1`, `team2`, `score1`, `score2`) VALUES
(6, 'hari', '', 0, 0),
(5, 'hello1', '', 0, 0),
(4, 'hello1', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblteam`
--

CREATE TABLE `tblteam` (
  `Id` int(10) NOT NULL,
  `teamName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblteam`
--

INSERT INTO `tblteam` (`Id`, `teamName`) VALUES
(65, 'Charminar'),
(67, 'iyytitdrs'),
(62, 'FC BARCELONA'),
(58, 'BANGALORE FC'),
(57, 'MANCHESTER UNITED'),
(54, 'Bangalore'),
(56, 'Coiambatore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangalore`
--
ALTER TABLE `bangalore`
  ADD PRIMARY KEY (`jerseyId`);

--
-- Indexes for table `charminar`
--
ALTER TABLE `charminar`
  ADD PRIMARY KEY (`jerseyId`);

--
-- Indexes for table `coiambatore`
--
ALTER TABLE `coiambatore`
  ADD PRIMARY KEY (`jerseyId`);

--
-- Indexes for table `hello`
--
ALTER TABLE `hello`
  ADD PRIMARY KEY (`jerseyId`);

--
-- Indexes for table `hyderabad`
--
ALTER TABLE `hyderabad`
  ADD PRIMARY KEY (`jerseyId`);

--
-- Indexes for table `iyytitdrs`
--
ALTER TABLE `iyytitdrs`
  ADD PRIMARY KEY (`jerseyId`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`matchId`);

--
-- Indexes for table `tblteam`
--
ALTER TABLE `tblteam`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `matchId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblteam`
--
ALTER TABLE `tblteam`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
