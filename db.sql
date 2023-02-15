-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 01:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(3) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `country_code` varchar(20) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(6) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `country_code`, `mobile_no`, `address`, `gender`, `hobby`, `photo`, `created_date`) VALUES
(8, 'Rajesh', 'Verma', 'rjvrma@gmail.com', '(102) UAE', 2147483647, 'Address', 'Male', 'Playing,Dancing', 'IMG_20211223_145220.jpg', '2023-02-15 09:00:30'),
(10, 'Rajiv', 'Kaul', 'rajiv_kaul@gmail.com', '(059) AUS', 427483647, '', 'Male', 'Trekking', '..IMG_20211223_150559.jpg..', '2023-02-15 12:05:54'),
(11, 'Jenny', 'Grace', 'JuhiShah@gmail.com', '(052) CAN', 455772211, '', 'Female', 'Trekking,Reading,Singing', '.IMG_20211223_150408.jpg.', '2023-02-15 12:05:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
