-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2022 at 04:19 AM
-- Server version: 10.3.31-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gogange_caragency`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Om Car Agency', 'gbu.electrical2016@gmail.com', '+919873826912', 'MTIzNDU='),
(5, 'Car  Company  ', 'raj@gmail.com', '9811177436', 'MTIzNDU2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booked_vehicles`
--

CREATE TABLE `tbl_booked_vehicles` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `booking_days` varchar(255) NOT NULL,
  `status` enum('booked') NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booked_vehicles`
--

INSERT INTO `tbl_booked_vehicles` (`id`, `vehicle_id`, `user_id`, `date`, `booking_days`, `status`, `admin_id`) VALUES
(2, 4, 5, '2022-07-07', '1', 'booked', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car`
--

CREATE TABLE `tbl_car` (
  `id` int(11) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `seating_capacity` varchar(255) NOT NULL,
  `rent_per_day` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('available','booked') NOT NULL,
  `delete_flag` tinyint(4) NOT NULL DEFAULT 0,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_car`
--

INSERT INTO `tbl_car` (`id`, `vehicle_model`, `vehicle_number`, `seating_capacity`, `rent_per_day`, `image`, `status`, `delete_flag`, `admin_id`) VALUES
(1, 'ALTO', 'HR26DQ5551', '5', '1000', 'car.jpg', 'available', 0, 5),
(2, 'Swift', 'RJ26DQ5553', '5', '1500', 'istockphoto-1189903200-612x612.jpg', 'available', 0, 5),
(3, 'Baleno', 'KR26DQ5553', '5', '2000', 'car.jpg', 'available', 0, 5),
(4, 'tata', 'RJ26DQ5554', '5', '2000', '0x0.jpg', 'available', 0, 5),
(5, '122', '222', '3', '122', 'compact-red-car-white-background-32767906.jpg', 'available', 1, 5),
(6, 'sSdd', 'dd', '3', '122', 'compact-red-car-white-background-32767906.jpg', 'available', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(5, 'raj', 'raj@gmail.com', '9811177436', 'MTIzNDU2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booked_vehicles`
--
ALTER TABLE `tbl_booked_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car` (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_booked_vehicles`
--
ALTER TABLE `tbl_booked_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_car`
--
ALTER TABLE `tbl_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
