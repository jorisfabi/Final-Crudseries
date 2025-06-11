-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 01:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudseries1`
--

-- --------------------------------------------------------

--
-- Table structure for table `multipledata`
--

CREATE TABLE `multipledata` (
  `ID` int(11) NOT NULL,
  `CheckBoxData` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multipledata`
--

INSERT INTO `multipledata` (`ID`, `CheckBoxData`) VALUES
(1, 'Javascript,React,CSS'),
(2, 'Javascript,CSS'),
(3, 'HTML'),
(4, 'Javascript,React,CSS,HTML'),
(5, 'Javascript,React'),
(6, 'Javascript,React'),
(7, 'Javascript'),
(8, 'Javascript,React,CSS,HTML');

-- --------------------------------------------------------

--
-- Table structure for table `radiodata`
--

CREATE TABLE `radiodata` (
  `id` int(11) NOT NULL,
  `gender` enum('male','female','kids','') NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `radiodata`
--

INSERT INTO `radiodata` (`id`, `gender`, `place`) VALUES
(1, 'male', ''),
(2, 'male', ''),
(3, 'male', ''),
(4, '', ''),
(5, '', ''),
(6, '', ''),
(7, 'kids', '');

-- --------------------------------------------------------

--
-- Table structure for table `selectdata`
--

CREATE TABLE `selectdata` (
  `id` int(25) NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selectdata`
--

INSERT INTO `selectdata` (`id`, `place`) VALUES
(1, 'Bangalore'),
(2, 'Bangalore'),
(3, 'Bangalore'),
(4, 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `seriescrud`
--

CREATE TABLE `seriescrud` (
  `ID` int(11) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `multipleData` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other','') NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seriescrud`
--

INSERT INTO `seriescrud` (`ID`, `Fname`, `Lname`, `Email`, `Mobile`, `multipleData`, `gender`, `place`) VALUES
(1, 'nijel', 'nijel', 'nijel@gmail.com', '09193031736', 'Javascript,CSS,HTML', 'Male', 'Halang'),
(2, 'tungtungtung', 'sahur', 'sahur@gmail.com', '09551543922', 'React', 'Female', 'Pasinaya'),
(3, 'kelly', 'magbutay', 'kelly@gmail.com', '09123838383', 'React,CSS', 'Female', 'Halang'),
(4, 'neijel', 'jiro', 'neijeljiro@gmail.com', '09876543212', 'HTML', 'Other', 'Pasinaya'),
(5, 'kimmy', 'badang', 'kimmy@gmail.com', '09990915234', 'Javascript', 'Male', 'Halang'),
(21, 'Jerame', 'Sniper', 'Jeramesniper@gmail.com', '09876543213', 'Javascript,HTML', 'Male', 'Unknown'),
(23, 'jerame', 'bilibid', 'jerame@gmaiskf', '261763', 'CSS', 'Male', 'Unknown'),
(24, 'jerame', 'loloboy', 'hghg@hdhd', '12313131311', 'React,HTML', 'Female', 'Malainen'),
(25, 'jessy', 'weeh', 'qeqe@hsdhd', '99897979799', 'Javascript', 'Female', 'Pasinaya'),
(29, 'felix', 'nacional', 'felix@gmail.com', '1212121', 'Javascript,React', 'Male', 'Halang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `multipledata`
--
ALTER TABLE `multipledata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `radiodata`
--
ALTER TABLE `radiodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selectdata`
--
ALTER TABLE `selectdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seriescrud`
--
ALTER TABLE `seriescrud`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `multipledata`
--
ALTER TABLE `multipledata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `radiodata`
--
ALTER TABLE `radiodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `selectdata`
--
ALTER TABLE `selectdata`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seriescrud`
--
ALTER TABLE `seriescrud`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
