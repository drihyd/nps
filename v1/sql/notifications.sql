-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 01:01 PM
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
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `gateway_type` enum('sms','email') DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `secret_key` varchar(255) DEFAULT NULL,
  `port_no` varchar(10) DEFAULT NULL,
  `from_name` varchar(100) DEFAULT NULL,
  `from_address` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `host_name` varchar(100) DEFAULT NULL,
  `is_active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `organization_id`, `gateway_type`, `username`, `password`, `api_key`, `secret_key`, `port_no`, `from_name`, `from_address`, `mobile`, `host_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 23, 'sms', 'Rakesh.s@mahindrauniversity.edu.in', '46DUFF', 'sadf', NULL, 'afsdfa', 'asdfa', 'sdf', '', 'asdf', 'yes', '2021-12-20 11:07:29', '2021-12-20 11:07:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
