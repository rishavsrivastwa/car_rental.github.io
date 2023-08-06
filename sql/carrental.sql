-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 01:55 PM
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
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcars`
--

CREATE TABLE `addcars` (
  `id` int(100) NOT NULL,
  `model` varchar(30) NOT NULL,
  `vnumber` varchar(30) NOT NULL,
  `seat` int(10) NOT NULL,
  `rent` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addcars`
--

INSERT INTO `addcars` (`id`, `model`, `vnumber`, `seat`, `rent`) VALUES
(6, 'Alto', '21 BH 2345 AA', 4, '550'),
(7, 'Baleno', '23 BH 2244 AB', 4, '7000'),
(8, 'Celerio', '25 BH 2389 AC', 6, '800'),
(9, 'Dzire', '27 BH 4364 AB', 4, '600'),
(10, 'Eeco', '23 BH 3432 AD', 6, '700');

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `cpassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`firstname`, `lastname`, `email`, `phone`, `password`, `cpassword`) VALUES
('Aadarsh', 'Raj', 'aadarsh@gmail.com', 54545, '123456', ''),
('Rishav', 'Kumar', 'rishav@gmail.com', 731999, 'Rishavyudi', '');

-- --------------------------------------------------------

--
-- Table structure for table `bookedcars`
--

CREATE TABLE `bookedcars` (
  `id` int(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `vnumber` varchar(30) NOT NULL,
  `seat` varchar(12) NOT NULL,
  `rent` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `cpassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`firstname`, `lastname`, `email`, `phone`, `password`, `cpassword`) VALUES
('Rishav', 'Kumar', 'rishavyudi@gmail.com', 74343, '123456', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcars`
--
ALTER TABLE `addcars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcars`
--
ALTER TABLE `addcars`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
