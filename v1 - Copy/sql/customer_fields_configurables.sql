-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 08:30 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deepredink_nps_2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_fields_configurables`
--

CREATE TABLE `customer_fields_configurables` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `input_type` varchar(50) DEFAULT NULL,
  `input_name` varchar(50) DEFAULT NULL,
  `label` varchar(100) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `placeholder` varchar(100) DEFAULT NULL,
  `input_id` varchar(50) DEFAULT NULL,
  `is_display` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_fields_configurables`
--
ALTER TABLE `customer_fields_configurables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_fields_configurables`
--
ALTER TABLE `customer_fields_configurables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
