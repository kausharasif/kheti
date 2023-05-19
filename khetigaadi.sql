-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4000
-- Generation Time: May 19, 2023 at 11:31 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khetigaadi`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(25) NOT NULL,
  `state_id` int(25) DEFAULT NULL,
  `city` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `city`) VALUES
(1, 1, 'Pune'),
(2, 1, 'Nagpur'),
(3, 2, 'surat'),
(4, 2, 'Bhavnagar');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(25) NOT NULL,
  `name` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'India'),
(2, 'UK'),
(3, 'US'),
(4, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(25) NOT NULL,
  `country_id` int(25) DEFAULT NULL,
  `state` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `state`) VALUES
(1, 1, 'Maharashtra'),
(2, 1, 'Gujarat'),
(3, 1, 'Tamil Nadu'),
(4, 1, 'Karnataka'),
(5, 1, 'Uttar Pradesh'),
(6, 2, 'London'),
(7, 2, 'Preston');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contactnumber` varchar(25) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `country` varchar(300) DEFAULT NULL,
  `state` varchar(300) DEFAULT NULL,
  `city` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `contactnumber`, `address`, `country`, `state`, `city`, `password`, `created_at`, `updated_at`) VALUES
(6, 'kaushar', 'rangwala', 'asifkaushar@gmail.com', '9726355252', 'hejwrhjk', '1', '1', '1', '$2y$10$pbhpI77Ivu2l2HpdSBSJoO7eP6k3JQn.XP2qIkIexga./BSx8XmfO', NULL, NULL),
(7, 'khozema', 'rangwala', 'khozema@gmail.com', '9726355252', 'wjhqrj', '1', '1', '1', '$2y$10$mJ25LTXfNNAs2C3Awr2MW.OOhukaVJ3j8nqnICFzMcB988ttWFUAG', NULL, NULL),
(8, 'Insiya', 'jamali', 'asifkaushar@gmail.com', '9726355252', 'retrte', '1', '2', '4', '$2y$10$tyHvgwEGaSnbMCuISQ2zSeIhxoE0NIIrUcbbdgRt.p61oxvne669K', NULL, NULL),
(9, 'hussain', 'rangwala', 'husaaink@Gmail.com', '9726355252', 'wcxwer', '1', '1', '1', '$2y$10$gmwb9HJpJfRDbN5xyxi25.ByBqnV0La6zPUxGxBAgw7N7Rw5F4bfa', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
