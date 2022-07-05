-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 11:08 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `id` int(11) NOT NULL,
  `academic` varchar(255) NOT NULL,
  `shortacademic` varchar(255) DEFAULT NULL,
  `ptype` varchar(30) NOT NULL,
  `percentage` int(20) NOT NULL,
  `phase` varchar(255) NOT NULL,
  `ctp` varchar(30) NOT NULL,
  `file` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `academic`, `shortacademic`, `ptype`, `percentage`, `phase`, `ctp`, `file`, `type`, `size`) VALUES
(9, 'Parking in rush ', 'A06', '', 0, 'Parking', '', '', '', 0),
(11, 'Servicing', 'Serve', 'percentage', 80, 'Driving', 'Driving School Advanced', '', '', 0);

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
(11, 'drive', 'Adr-4', 'percentage', 100, 'servicing', 'Driving School Advanced'),
(12, 'Front Driving', 'ADR-1', 'percentage', 100, 'Driving', 'Driving School Beginners');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `create_datetime` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ctppage`
--

CREATE TABLE `ctppage` (
  `CTPid` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `manual` varchar(255) NOT NULL,
  `CourseCode` varchar(255) DEFAULT NULL,
  `Sponcors` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `CourseAim` varchar(255) DEFAULT NULL,
  `ClassSize` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ctppage`
--

INSERT INTO `ctppage` (`CTPid`, `course`, `manual`, `CourseCode`, `Sponcors`, `Location`, `CourseAim`, `ClassSize`) VALUES
(1, 'Driving School Beginners', 'UAE HQ Manuals 1.1', 'DCB1', 'UAE Driving School', 'Alkarama Branch A', 'To qualify drivers to drive', 4),
(2, 'Driving School Advanced', 'UAE HQ Manuals 1.2', 'DCB1', 'UAE Driving School', 'Alkarama Branch A', 'To qualify drivers to drive', 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `school_name`, `department_name`, `type`) VALUES
(34, 'Alkarama', 'Driving school', 'Driving');

-- --------------------------------------------------------

--
-- Table structure for table `gradesheet`
--

CREATE TABLE `gradesheet` (
  `id` int(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `instructor` varchar(30) NOT NULL,
  `vehicle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `school_name`, `department_name`, `type`, `user_id`) VALUES
(34, 'Alkarama', 'Driving school', 'Driving', 0),
(38, 'India', 'Parking school', 'driving', 0),
(39, 'Alkarama', 'driving school', 'Driving', 11);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `create_datetime` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(30) NOT NULL,
  `item` varchar(30) NOT NULL,
  `grade` varchar(30) NOT NULL,
  `userid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itembank`
--

CREATE TABLE `itembank` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itembank`
--

INSERT INTO `itembank` (`id`, `item`) VALUES
(1, 'item'),
(14, 'driving'),
(18, 'parking'),
(19, 'msarii'),
(20, 'heloo'),
(21, 'hii'),
(28, 'hii'),
(29, 'archu');

-- --------------------------------------------------------

--
-- Table structure for table `newcourse`
--

CREATE TABLE `newcourse` (
  `Courseid` int(11) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `CourseNumber` varchar(255) DEFAULT NULL,
  `Symbol` varchar(255) DEFAULT NULL,
  `StudentNames` varchar(255) DEFAULT NULL,
  `CourseManager` varchar(255) DEFAULT NULL,
  `Phase_manager` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newcourse`
--

INSERT INTO `newcourse` (`Courseid`, `CourseName`, `CourseNumber`, `Symbol`, `StudentNames`, `CourseManager`, `Phase_manager`) VALUES
(1, 'Driving School Beginners', '1', 'DCB1', '18', 'Raj', 'kamal'),
(2, 'Driving School Advanced', '1', 'DCB1', '19', 'andrew', 'Jack'),
(3, 'Driving School Advanced', '2', 'DCB1', '20', 'andrew', 'kamal');

-- --------------------------------------------------------

--
-- Table structure for table `percentage`
--

CREATE TABLE `percentage` (
  `id` int(11) NOT NULL,
  `percentagetype` varchar(255) NOT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `percentage`
--

INSERT INTO `percentage` (`id`, `percentagetype`, `percentage`, `color`) VALUES
(1, 'U-Unsatisfied', '50', 'Red'),
(2, 'F-Fair', '70', 'Yellow'),
(3, 'G-Good', '80', 'Green'),
(4, 'V- Very Good', '90', 'Light Green'),
(5, 'E- Excellent', '100', 'Light Blue'),
(6, 'N- Not Graded', '0', 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `phase`
--

CREATE TABLE `phase` (
  `id` int(11) NOT NULL,
  `phasename` varchar(255) NOT NULL,
  `ctp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phase`
--

INSERT INTO `phase` (`id`, `phasename`, `ctp`) VALUES
(19, 'Driving1', 'Driving School Advanced'),
(21, 'Driving', 'Driving School Beginners'),
(24, 'Servicing', 'Driving School Beginners');

-- --------------------------------------------------------

--
-- Table structure for table `phasemanager`
--

CREATE TABLE `phasemanager` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `create_datetime` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(30) NOT NULL,
  `roles` varchar(30) NOT NULL,
  `permission` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`, `permission`) VALUES
(2, 'student', 'a:13:{s:6:\"show_p\";s:1:\"0\";s:6:\"show_c\";s:1:\"0\";s:6:\"actual\";s:1:\"0\";s:3:\"sim\";s:1:\"0\";s:8:\"Academic\";s:1:\"0\";s:4:\"Task\";s:1:\"1\";s:7:\"Student\";s:1:\"1\";s:9:\"Emergency\";s:1:\"1\";s:7:\"Testing\";s:1:\"1\";s:4:\"Qual\";s:1:\"1\";s:9:\"Clearance\";s:1:\"1\";s:5:\"Class\";s:1:\"1\";s:4:\"Memo\";s:1:\"1\";}');

-- --------------------------------------------------------

--
-- Table structure for table `sim`
--

CREATE TABLE `sim` (
  `id` int(11) NOT NULL,
  `sim` varchar(255) NOT NULL,
  `shortsim` varchar(255) DEFAULT NULL,
  `ptype` varchar(255) NOT NULL,
  `percentage` int(20) NOT NULL,
  `phase` varchar(255) NOT NULL,
  `ctp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sim`
--

INSERT INTO `sim` (`id`, `sim`, `shortsim`, `ptype`, `percentage`, `phase`, `ctp`) VALUES
(6, 'Front drive', '   s  s s', 'percentage', 70, 'Driving', 'Driving School Advanced');

-- --------------------------------------------------------

--
-- Table structure for table `subitem`
--

CREATE TABLE `subitem` (
  `id` int(30) NOT NULL,
  `item` varchar(30) NOT NULL,
  `subitem` varchar(30) NOT NULL,
  `grade` varchar(30) NOT NULL,
  `userid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_item`
--

CREATE TABLE `sub_item` (
  `id` int(30) NOT NULL,
  `subitem` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_item`
--

INSERT INTO `sub_item` (`id`, `subitem`) VALUES
(1, 'apple'),
(2, 'subitem');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(70) NOT NULL,
  `studid` varchar(30) NOT NULL,
  `role` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`, `studid`, `role`, `phone`, `gender`, `username`, `email`, `password`, `create_datetime`) VALUES
(11, 'A4', 'A4', 'a4123', 'super admin', '2147483647', 'gender', 'A4', 'ayushi2@gmail.com', 'ac3b03947137152fc24f73c7e97189a8', '2022-06-06 10:31:19'),
(14, 'Ayushi', 'ayushi', 'in1', 'Instructor', '2147483647', 'gender', 'ayushi', 'ayushi2@gmail.com', '0d30c77028f666d8b311ac837b9e6c47', '2022-06-08 09:28:46'),
(15, 'Archana', 'archana', 'in13', 'Instructor', '2147483647', 'gender', 'archana', 'ayushi2@gmail.com', 'fd199242d72f3e0a19921d767d1553cc', '2022-06-08 09:29:28'),
(16, 'Jassem ', 'jassem', 'in14', 'Instructor', '2147483647', 'gender', 'jassem', 'ayushi2@gmail.com', '4eb55aa00bfab4a5bf2ae9397fa0b2cb', '2022-06-08 09:30:04'),
(17, 'Krish', 'krish', 'in15', 'Instructor', '2147483647', 'gender', 'krish', 'ayushi2@gmail.com', 'b2c41242c7dce6d5d85f63b4e9536c39', '2022-06-08 09:30:53'),
(18, 'Ahmed', 'ahmed', 'std1', 'student', '2147483647', 'gender', 'ahmed', 'ayushi2@gmail.com', '9193ce3b31332b03f7d8af056c692b84', '2022-06-08 11:02:26'),
(19, 'Saranya', 'saranya', 'std2', 'student', '2147483647', 'gender', 'Saranya', 'ayushi2@gmail.com', '71edd2213d210779448fdc0127b5f36a', '2022-06-08 11:02:55'),
(20, 'Rashid', 'rashid', 'std3', 'student', '2147483647', 'gender', 'rashid', 'ayushi2@gmail.com', '7d0ba610dea3dbcc848a97d8dfd767ae', '2022-06-08 11:03:22'),
(21, 'Raj', 'raj', 'cs1', 'course manager', '2147483647', 'gender', 'raj', 'ayushi2@gmail.com', '97d174b5df6ee072348635613202df19', '2022-06-08 11:04:23'),
(22, 'andrew', 'andrew', 'cs2', 'course manager', '2147483647', 'gender', 'andrew', 'ayushi2@gmail.com', 'd914e3ecf6cc481114a3f534a5faf90b', '2022-06-08 11:04:59'),
(23, 'kamal', 'kamal', 'ph1', 'phase manager', '2147483647', 'gender', 'kamal', 'jack@gmail.com', 'aa63b0d5d950361c05012235ab520512', '2022-06-08 11:05:29'),
(24, 'Jack', 'jack', 'ph2', 'phase manager', '2147483647', 'gender', 'jack', 'jack@gmail.com', '4ff9fc6e4e5d5f590c4f2134a8cc96d1', '2022-06-08 11:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `VehicleName` varchar(255) NOT NULL,
  `VehicleType` varchar(255) DEFAULT NULL,
  `VehicleNumber` varchar(255) DEFAULT NULL,
  `VehicleSpot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `VehicleName`, `VehicleType`, `VehicleNumber`, `VehicleSpot`) VALUES
(7, 'Honda 08', '4 wheeler', 'MH-12_1872', 'back parking');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actual`
--
ALTER TABLE `actual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ctppage`
--
ALTER TABLE `ctppage`
  ADD PRIMARY KEY (`CTPid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradesheet`
--
ALTER TABLE `gradesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itembank`
--
ALTER TABLE `itembank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newcourse`
--
ALTER TABLE `newcourse`
  ADD PRIMARY KEY (`Courseid`);

--
-- Indexes for table `percentage`
--
ALTER TABLE `percentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phase`
--
ALTER TABLE `phase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phasemanager`
--
ALTER TABLE `phasemanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sim`
--
ALTER TABLE `sim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subitem`
--
ALTER TABLE `subitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_item`
--
ALTER TABLE `sub_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `actual`
--
ALTER TABLE `actual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ctppage`
--
ALTER TABLE `ctppage`
  MODIFY `CTPid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `gradesheet`
--
ALTER TABLE `gradesheet`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itembank`
--
ALTER TABLE `itembank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `newcourse`
--
ALTER TABLE `newcourse`
  MODIFY `Courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `percentage`
--
ALTER TABLE `percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phase`
--
ALTER TABLE `phase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `phasemanager`
--
ALTER TABLE `phasemanager`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sim`
--
ALTER TABLE `sim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subitem`
--
ALTER TABLE `subitem`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_item`
--
ALTER TABLE `sub_item`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
