-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 07:37 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driving_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `actual`
--

CREATE TABLE `actual` (
  `id` int(11) NOT NULL,
  `actual` varchar(255) NOT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `ptype` varchar(255) NOT NULL,
  `percentage` int(20) NOT NULL,
  `phase` varchar(255) NOT NULL,
  `ctp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actual`
--

INSERT INTO `actual` (`id`, `actual`, `symbol`, `ptype`, `percentage`, `phase`, `ctp`) VALUES
(5, 'Back Drive', 'BDR-1', 'percentage', 100, 'Driving', 'Driving School Advanced'),
(7, 'Highway Park', 'APR-1', 'percentage', 100, 'Parking', 'Driving School Advanced'),
(11, 'drive', 'Adr-4', 'percentage', 100, 'servicing', 'Driving School Advanced');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actual`
--
ALTER TABLE `actual`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actual`
--
ALTER TABLE `actual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
