-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 11:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registering`
--

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`id`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`, `address`, `image`, `status`) VALUES
(24, 'R . SUBASHAN', 'RENGANATHAN', 'subashhh689@gmail.com', 'Dilani1234@', '0774651689', 'kataboola top divition kataboola', '', 'active'),
(25, 'dilani', 'renganathan', 'dilanirenganathan1234@gmail.com', 'Anu1234@', '0768944110', 'kataboola top divition kataboola', '', '0'),
(28, 'kayunsan', 'Krishnakumaran', 'subashhh689@gmail.com', 'Kaliyun12@', '0774651689', 'kataboola top divition kataboola', 'SY.jpg', '0'),
(29, 'RENGANATHAN', 'SUBASH', 'dilanirenganathan1234@gmaill.com', 'Dila1234@', '0713748680', 'kataboola top divition kataboola', '', '0'),
(30, 'dilani', 'renganathan', 'dilanirenganathan1234@gmail.com', 'Dilani1234@', '0768944110', 'kataboola top divition kataboola', '', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
