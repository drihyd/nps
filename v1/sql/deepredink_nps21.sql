-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2022 at 04:33 AM
-- Server version: 10.3.32-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deepredink_nps21`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `organization_id`, `department_id`, `activity_name`, `created_at`, `updated_at`) VALUES
(4, 23, 5, 'Registration', '2021-12-13 03:47:25', '2021-12-13 03:47:25'),
(5, 23, 5, 'Final Bill', '2021-12-13 03:47:38', '2021-12-13 03:47:38');

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
-- Dumping data for table `customer_fields_configurables`
--

INSERT INTO `customer_fields_configurables` (`id`, `organization_id`, `survey_id`, `input_type`, `input_name`, `label`, `class_name`, `placeholder`, `input_id`, `is_display`, `created_at`, `updated_at`) VALUES
(1, 23, NULL, 'radio', 'gender', 'Gender', NULL, NULL, NULL, 'yes', '2021-12-24 03:01:15', '2021-12-24 03:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `is_display` enum('on','off') NOT NULL DEFAULT 'on',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `organization_id`, `department_name`, `is_display`, `created_at`, `updated_at`) VALUES
(2, 20, 'Billing', 'on', '2021-12-01 12:55:51', '2021-12-01 12:55:51'),
(3, 25, 'House keeping', 'on', '2021-12-03 11:38:07', '2021-12-03 11:38:07'),
(4, 25, 'Billing', 'on', '2021-12-03 11:38:23', '2021-12-03 11:38:23'),
(5, 23, 'Billing', 'on', '2021-12-16 12:44:10', '2021-12-16 17:44:10'),
(8, 23, 'Nursing', 'on', '2021-12-07 04:24:57', '2021-12-07 04:24:57'),
(10, 23, 'Pharmacy', 'on', '2021-12-13 03:46:16', '2021-12-13 08:46:16'),
(15, 23, 'Doctors', 'on', '2021-12-15 12:43:24', '2021-12-15 12:43:24'),
(16, 23, 'Food  and Beverage', 'on', '2021-12-15 12:44:13', '2021-12-15 17:44:13'),
(17, 23, 'Maintenance', 'on', '2021-12-15 12:44:24', '2021-12-15 12:44:24'),
(18, 23, 'Lab and Radiology', 'on', '2021-12-24 06:35:24', '2021-12-24 06:35:24'),
(19, 23, 'Test Team', 'on', '2021-12-31 10:17:54', '2021-12-31 10:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `group_levels`
--

CREATE TABLE `group_levels` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(20) DEFAULT NULL,
  `esc_minitues` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_levels`
--

INSERT INTO `group_levels` (`id`, `organization_id`, `name`, `alias`, `esc_minitues`, `created_at`, `updated_at`) VALUES
(2, 23, 'Top Management', 'L5', 10, '2021-12-31 11:33:04', '2021-12-31 11:33:04'),
(3, 23, 'Sr Leaders', 'L4', 5, '2021-12-31 11:33:13', '2021-12-31 11:33:13'),
(4, 23, 'Mid Leaders', 'L3', 20, '2021-12-31 11:32:55', '2021-12-31 11:32:55'),
(5, 23, 'Jr Leaders', 'L2', 5, '2021-12-31 11:33:20', '2021-12-31 11:33:20'),
(6, 23, 'Staff', 'L1', 10, '2021-12-31 11:32:47', '2021-12-31 11:32:47');

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

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `is_group` enum('yes','no') DEFAULT 'no',
  `short_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `gst_no` varchar(100) DEFAULT NULL,
  `billing_address_1` varchar(255) DEFAULT NULL,
  `billing_address_2` varchar(255) DEFAULT NULL,
  `billing_pincode` varchar(100) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_country` varchar(255) DEFAULT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_mobile` varchar(20) DEFAULT NULL,
  `admin_alter_mobile` varchar(20) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `license_startdate` date DEFAULT NULL,
  `license_period_year` varchar(20) DEFAULT NULL,
  `license_period_month` varchar(20) DEFAULT NULL,
  `is_active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `company_name`, `is_group`, `short_name`, `slug`, `address_1`, `address_2`, `pincode`, `city`, `country`, `gst_no`, `billing_address_1`, `billing_address_2`, `billing_pincode`, `billing_city`, `billing_country`, `admin_name`, `admin_email`, `admin_mobile`, `admin_alter_mobile`, `role`, `password`, `license_startdate`, `license_period_year`, `license_period_month`, `is_active`, `created_at`, `updated_at`) VALUES
(20, 'Deepredink', 'no', 'DRI', NULL, 'Hitech City', '', '500034', 'Hyd', 'india', '05ABDCE1234F1Z2', 'Hitech City', '', '500034', 'Hyderabad', 'india', 'Venkat', 'venkat@deepredink.com', '9052691535', '9000677584', 2, 'Ru7NyZz2', '2021-11-30', '1', '0', 'yes', '2021-11-30 11:59:47', '2021-11-30 16:59:47'),
(21, 'Boston Living', 'no', 'Boston', NULL, 'Jubilee Enclave', 'sedfsdf', '500081', 'Hyderabad', 'india', '05ABDCE1234F1X2', 'Jubilee Enclave', 'sedfsdf', '500081', 'Hyderabad', 'india', 'Aditya', 'sads@deepredink.com', '988345678', '', 2, 'SB21esuv', '2021-12-01', '1', '0', 'yes', '2021-12-03 11:23:36', '2021-12-03 16:23:36'),
(22, 'Amazon', 'yes', 'AM', NULL, 'Hitech city', 'Hitech city', '500086', 'hyderabad', 'india', '05ABDCE1234F1Z2', 'Hitech city', 'Hitech city', '500086', 'Hyderabad', 'india', 'amazon', 'amazon@gmail.com', '9700334319', '', 2, 'uBMyhtjS', '2021-12-01', '1', '8', 'yes', '2021-12-03 11:22:51', '2021-12-03 16:22:51'),
(23, 'Omni', 'yes', 'Omni', NULL, 'Kukataplly road no 12', 'near BJP Office', '500086', 'Hyderabad', 'india', '05ABDCE1234F1Z2', 'Kukataplly road no 12', 'near JNTU', '500086', 'Hyderabad', 'india', 'Omni test user', 'omni@gmail.com', '9700334152', '98745654135', 2, '9jGEzxdJ', '2021-12-16', '1', '4', 'yes', '2021-12-02 04:47:40', '2021-12-02 09:47:40'),
(24, 'Test', 'no', 'tst1', NULL, 'Financial District, Nanakramguda, Paayilis Rd', 'Gachibowli, Nanakaramguda', '500045', 'Hyderabad', 'india', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', '2021-12-02 11:10:39', '2021-12-02 16:10:39'),
(25, 'Testing Corporation Limited', 'no', 'TCL', NULL, 'Financial District, Nanakramguda, Paayilis Rd', 'Gachibowli, Nanakaramguda', '500038', 'Hyderabad', 'india', '07XADCE1234F1Z2', 'Financial District, Nanakramguda, Paayilis Rd', 'Gachibowli, Nanakaramguda', '500038', 'Hyderabad', 'india', 'Harish', 'harish.gorantla123@gmail.com', '9032555564', '', 2, 'Z6XTiMfS', '2021-12-03', '1', '0', 'yes', '2021-12-03 11:26:59', '2021-12-03 16:26:59'),
(27, 'Deployment Private Limited', 'yes', 'DPL', NULL, 'Financial District, Nanakramguda, Paayilis Rd', 'Gachibowli, Nanakaramguda', '500128', 'Warangal', 'india', '09LXCCE1234F1Q2', 'Financial District, Nanakramguda, Paayilis Rd', 'Gachibowli, Nanakaramguda', '500128', 'Warangal', 'india', 'Harish', 'harish.gorantla123@gmail.com', '9032555564', '', 2, 'qKf2TPbL', '2021-12-03', '1', '0', 'yes', '2021-12-03 11:33:28', '2021-12-03 16:33:28'),
(28, 'DRI2', 'no', 'D2', NULL, 'H.No: 4-325, Plot No: 55,', 'Sarvodaya Nagar,Meerpet,', '500097', 'Hyderabad', 'india', '05ABDCE1234F1Z2', 'H.No: 4-325, Plot No: 55,', 'Sarvodaya Nagar,Meerpet,', '500097', 'Hyderabad', 'india', 'K Venkat', 'venkat@deepredink.com', '9052691535', '', 2, 'rLo3eJlL', '2021-12-14', '1', '0', 'yes', '2021-12-14 02:23:11', '2021-12-14 07:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `label` varchar(200) DEFAULT NULL,
  `sublabel` varchar(255) DEFAULT NULL,
  `input_type` varchar(100) DEFAULT NULL,
  `sequence_order` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `next_qustion_id` int(11) NOT NULL DEFAULT 0,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `organization_id`, `survey_id`, `label`, `sublabel`, `input_type`, `sequence_order`, `created_at`, `updated_at`, `next_qustion_id`, `active`) VALUES
(1, 23, 1, 'How likely are you to refer OMNI Hospital to your friends & family during an Emergency?', '', 'radio', 1, '2021-12-15 12:37:05', '2021-12-15 17:37:05', 0, 'yes'),
(2, 23, 1, 'We are glad you are happy with our service. Which team made you happy ?', '', 'checkbox', 2, '2021-12-06 10:02:32', '2021-12-06 10:02:32', 5, 'yes'),
(3, 23, 1, 'Oh! What could we have done better to make you happier?', '', 'checkbox', 3, '2021-12-06 10:02:38', '2021-12-06 10:02:38', 6, 'yes'),
(4, 23, 1, 'We\'re sorry your experience wasn\'t good! What can we improve?', '', 'checkbox', 4, '2021-12-06 10:02:44', '2021-12-06 10:02:44', 7, 'yes'),
(5, 23, 1, 'What did you like about  *teamname*?', '', 'textarea', 5, '2021-12-06 09:52:53', '2021-12-06 09:52:53', 0, 'yes'),
(6, 23, 1, 'What could have been better in  *teamname*?', '', 'textarea', 6, '2021-12-06 09:52:47', '2021-12-06 09:52:47', 0, 'yes'),
(7, 23, 1, 'What went wrong with *teamname*?', '', 'textarea', 7, '2021-12-06 09:52:40', '2021-12-06 09:52:40', 0, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `option_value` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `question_id`, `department_id`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '0', '2021-12-07 03:52:16', '2021-12-07 03:52:16'),
(2, 1, NULL, '1', '2021-12-07 03:52:21', '2021-12-07 03:52:21'),
(3, 1, NULL, '2', '2021-12-07 03:52:27', '2021-12-07 03:52:27'),
(4, 1, NULL, '3', '2021-12-07 03:52:32', '2021-12-07 03:52:32'),
(5, 1, NULL, '4', '2021-12-07 03:52:38', '2021-12-07 03:52:38'),
(6, 1, NULL, '5', '2021-12-07 03:52:43', '2021-12-07 03:52:43'),
(7, 1, NULL, '6', '2021-12-07 03:52:49', '2021-12-07 03:52:49'),
(8, 1, NULL, '7', '2021-12-07 03:52:55', '2021-12-07 03:52:55'),
(9, 1, NULL, '8', '2021-12-07 03:53:00', '2021-12-07 03:53:00'),
(10, 1, NULL, '9', '2021-12-07 03:53:06', '2021-12-07 03:53:06'),
(12, 2, 5, 'Billing', '2021-12-16 12:44:10', '2021-12-16 17:44:10'),
(13, 3, 5, 'Billing', '2021-12-16 12:44:10', '2021-12-16 17:44:10'),
(14, 4, 5, 'Billing', '2021-12-16 12:44:10', '2021-12-16 17:44:10'),
(15, 5, NULL, 'Enter your message here', '2021-12-02 08:22:55', '2021-12-02 08:22:55'),
(16, 6, NULL, 'Enter your message here', '2021-12-02 08:23:04', '2021-12-02 08:23:04'),
(17, 7, NULL, 'Enter your message here', '2021-12-02 08:23:14', '2021-12-02 08:23:14'),
(21, 0, NULL, 'Any Other', '2021-12-02 08:11:25', '2021-12-02 08:11:25'),
(22, 1, NULL, '10', '2021-12-07 03:53:06', '2021-12-07 03:53:06'),
(23, 2, 8, 'Nursing', '2021-12-16 12:28:21', '2021-12-16 12:28:21'),
(25, 2, 10, 'Pharmacy', '2021-12-16 12:28:55', '2021-12-16 12:28:55'),
(27, 3, 8, 'Nursing', '2021-12-16 12:28:26', '2021-12-16 12:28:26'),
(29, 3, 10, 'Pharmacy', '2021-12-16 12:29:00', '2021-12-16 12:29:00'),
(31, 4, 8, 'Nursing', '2021-12-16 12:28:30', '2021-12-16 12:28:30'),
(33, 4, 10, 'Pharmacy', '2021-12-16 12:29:04', '2021-12-16 12:29:04'),
(44, 2, 15, 'Doctors', '2021-12-16 12:29:26', '2021-12-16 12:29:26'),
(45, 3, 15, 'Doctors', '2021-12-16 12:29:36', '2021-12-16 12:29:36'),
(46, 4, 15, 'Doctors', '2021-12-16 12:29:41', '2021-12-16 12:29:41'),
(47, 2, 16, 'Food  and Beverages', '2021-12-16 12:29:57', '2021-12-16 12:29:57'),
(48, 3, 16, 'Food  and Beverages', '2021-12-16 12:30:01', '2021-12-16 12:30:01'),
(49, 4, 16, 'Food  and Beverages', '2021-12-16 12:30:05', '2021-12-16 12:30:05'),
(50, 2, 17, 'Maintenance', '2021-12-16 12:30:19', '2021-12-16 12:30:19'),
(51, 3, 17, 'Maintenance', '2021-12-16 12:30:22', '2021-12-16 12:30:22'),
(52, 4, 17, 'Maintenance', '2021-12-16 12:30:26', '2021-12-16 12:30:26'),
(56, 2, 18, 'Lab and Radiology', '2021-12-24 06:35:24', '2021-12-24 06:35:24'),
(57, 3, 18, 'Lab and Radiology', '2021-12-24 06:35:24', '2021-12-24 06:35:24'),
(58, 4, 18, 'Lab and Radiology', '2021-12-24 06:35:24', '2021-12-24 06:35:24'),
(59, 2, 19, 'Test Team', '2021-12-31 10:17:54', '2021-12-31 10:17:54'),
(60, 3, 19, 'Test Team', '2021-12-31 10:17:54', '2021-12-31 10:17:54'),
(61, 4, 19, 'Test Team', '2021-12-31 10:17:54', '2021-12-31 10:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_levels`
--

CREATE TABLE `role_levels` (
  `id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `role_level` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_levels`
--

INSERT INTO `role_levels` (`id`, `designation_id`, `organization_id`, `role_level`, `created_at`, `updated_at`) VALUES
(2, 2, 23, 'TM1', '2021-12-20 07:47:11', '2021-12-20 02:17:11'),
(3, 2, 23, 'TM2', '2021-12-24 06:43:49', '2021-12-24 06:43:49'),
(4, 2, 23, 'TM3', '2021-12-24 06:44:04', '2021-12-24 06:44:04'),
(5, 3, 23, 'SL1', '2021-12-24 06:44:18', '2021-12-24 06:44:18'),
(6, 3, 23, 'SL2', '2021-12-24 06:44:30', '2021-12-24 06:44:30'),
(7, 3, 23, 'SL3', '2021-12-24 06:44:43', '2021-12-24 06:44:43'),
(8, 3, 23, 'SL4', '2021-12-24 06:44:56', '2021-12-24 06:44:56'),
(9, 4, 23, 'ML1', '2021-12-24 06:45:16', '2021-12-24 06:45:16'),
(10, 4, 23, 'ML2', '2021-12-24 06:45:31', '2021-12-24 06:45:31'),
(11, 4, 23, 'ML3', '2021-12-24 06:45:47', '2021-12-24 06:45:47'),
(12, 4, 23, 'ML4', '2021-12-24 06:46:08', '2021-12-24 06:46:08'),
(13, 5, 23, 'JL1', '2021-12-24 06:46:29', '2021-12-24 06:46:29'),
(14, 5, 23, 'JL2', '2021-12-24 06:46:41', '2021-12-24 06:46:41'),
(15, 5, 23, 'JL3', '2021-12-24 06:46:54', '2021-12-24 06:46:54'),
(16, 5, 23, 'JL4', '2021-12-24 06:47:06', '2021-12-24 06:47:06'),
(17, 6, 23, 'SS1', '2021-12-24 06:47:25', '2021-12-24 06:47:25'),
(18, 6, 23, 'SS2', '2021-12-24 06:47:39', '2021-12-24 06:47:39'),
(19, 6, 23, 'SS3', '2021-12-24 06:47:51', '2021-12-24 06:47:51'),
(20, 6, 23, 'SS4', '2021-12-24 06:48:05', '2021-12-24 06:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_names`
--

CREATE TABLE `role_names` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `designation_role_id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_names`
--

INSERT INTO `role_names` (`id`, `organization_id`, `designation_id`, `designation_role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(22, 23, 6, 17, 'Feedback Executive', '2021-12-31 06:51:48', '2021-12-31 06:51:48'),
(23, 23, 4, 9, 'HOD', '2021-12-31 06:54:18', '2021-12-31 06:54:18'),
(24, 23, 3, 5, 'Unit Head', '2021-12-31 06:54:46', '2021-12-31 06:54:46'),
(25, 23, 2, 2, 'Group CEO', '2021-12-31 06:56:02', '2021-12-31 06:56:02'),
(26, 23, 6, 19, 'Junior CX Executive', '2021-12-31 12:16:30', '2021-12-31 12:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `sla_configurations`
--

CREATE TABLE `sla_configurations` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `x_minutes` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(11) NOT NULL,
  `admin_user_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `isopen` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `organization_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `admin_user_id`, `title`, `description`, `isopen`, `created_at`, `updated_at`, `organization_id`) VALUES
(1, 321, 'Pre-Discharge', 'Tell us about your stay so far and help us improve our services', 'yes', '2021-12-31 07:21:32', '2021-12-31 07:21:32', 23),
(3, 321, 'Post Discharge', 'Tell us about your recent stay & treatment at Omni Hospitals and help us improve our services', 'yes', '2021-12-31 07:17:00', '2021-12-31 07:17:00', 23),
(4, 321, '6 month review', 'How was your recovery over the last 6 months?', 'yes', '2021-12-31 12:21:48', '2021-12-31 12:21:48', 23);

-- --------------------------------------------------------

--
-- Table structure for table `survey_answered`
--

CREATE TABLE `survey_answered` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answerid` int(11) DEFAULT NULL,
  `answeredby_person` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `ticket_status` enum('opened','on_hold','awaiting_reply','completed','accetped','action_taken') DEFAULT NULL,
  `ticket_remarks` text DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_answered`
--

INSERT INTO `survey_answered` (`id`, `survey_id`, `organization_id`, `logged_user_id`, `question_id`, `answerid`, `answeredby_person`, `rating`, `ticket_status`, `ticket_remarks`, `person_id`, `created_at`, `updated_at`) VALUES
(2, 1, 23, 321, 1, 6, '', 5, 'action_taken', 'called customer. updated', 1, '2021-12-31 12:29:16', '2021-12-31 12:29:16'),
(3, 1, 23, 321, 4, 31, '', 5, 'action_taken', 'called customer. updated', 1, '2021-12-31 12:29:16', '2021-12-31 12:29:16'),
(4, 1, 23, 321, 7, 31, 'Not caring patient properly', 5, 'action_taken', 'called customer. updated', 1, '2021-12-31 12:29:16', '2021-12-31 12:29:16'),
(5, 1, 23, 321, 7, 21, '', 5, 'action_taken', 'called customer. updated', 1, '2021-12-31 12:29:16', '2021-12-31 12:29:16'),
(13, 1, 23, 321, 1, 9, '', 8, 'opened', 'Called customer today. Phone ringing no response', 3, '2021-12-31 11:30:21', '2021-12-31 11:30:21'),
(14, 1, 23, 321, 3, 60, '', 8, 'opened', 'Called customer today. Phone ringing no response', 3, '2021-12-31 11:30:21', '2021-12-31 11:30:21'),
(15, 1, 23, 321, 6, 60, 'Something', 8, 'opened', 'Called customer today. Phone ringing no response', 3, '2021-12-31 11:30:21', '2021-12-31 11:30:21'),
(16, 1, 23, 321, 6, 21, '', 8, 'opened', 'Called customer today. Phone ringing no response', 3, '2021-12-31 11:30:21', '2021-12-31 11:30:21'),
(17, 1, 23, 321, 1, 10, '', 9, NULL, NULL, 4, '2021-12-31 12:23:06', '2021-12-31 12:23:06'),
(18, 1, 23, 321, 2, 44, '', 9, NULL, NULL, 4, '2021-12-31 12:23:17', '2021-12-31 12:23:17'),
(19, 1, 23, 321, 5, 44, 'They were kind and encouraged me quite a lot', 9, NULL, NULL, 4, '2021-12-31 12:23:32', '2021-12-31 12:23:32'),
(20, 1, 23, 321, 5, 21, '', 9, NULL, NULL, 4, '2021-12-31 12:23:32', '2021-12-31 12:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `survey_persons`
--

CREATE TABLE `survey_persons` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobile` varchar(150) DEFAULT NULL,
  `gender` char(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `organization_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_persons`
--

INSERT INTO `survey_persons` (`id`, `survey_id`, `firstname`, `lastname`, `email`, `mobile`, `gender`, `created_at`, `updated_at`, `organization_id`, `logged_user_id`) VALUES
(1, 1, 'Venkat', NULL, 'venkat@deepredink.com', '9052691535', 'male', '2021-12-31 06:25:23', '2021-12-31 06:25:23', 23, 321),
(2, 1, 'Prekash', NULL, 'shubhang@deepredink.com', '9885012345', 'male', '2021-12-31 07:18:13', '2021-12-31 07:18:13', 23, 321),
(3, 1, 'Ranjith R', NULL, 'ranjith@deepredink.com', '9885047096', 'male', '2021-12-31 10:36:24', '2021-12-31 10:36:24', 23, 321),
(4, 1, 'Raju', NULL, 'raju@deepredink.com', '9885323628', 'male', '2021-12-31 12:22:51', '2021-12-31 12:22:51', 23, 321);

-- --------------------------------------------------------

--
-- Table structure for table `themeoptions`
--

CREATE TABLE `themeoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_cta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_conditions_cta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drno_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode_invoice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themeoptions`
--

INSERT INTO `themeoptions` (`id`, `header_logo`, `footer_logo`, `favicon`, `footer_address`, `facebook_url`, `twitter_url`, `linkedin_url`, `instagram_url`, `pinterest_url`, `youtube_url`, `copyright`, `mobile`, `email`, `privacy_cta`, `terms_conditions_cta`, `mobile_no_invoice`, `gst_no_invoice`, `company_invoice`, `drno_invoice`, `street_invoice`, `landmark_invoice`, `city_invoice`, `state_invoice`, `pincode_invoice`, `created_at`, `updated_at`) VALUES
(1, '61ce921f00dfc_1640927775.png', NULL, '61ce921f025d5_1640927775.png', NULL, 'https://www.facebook.com/taruni.in', 'https://twitter.com/TaruniOfficial', NULL, 'https://www.instagram.com/taruni.in/', 'https://in.pinterest.com/taruniOfficial/', 'https://www.youtube.com/channel/UCecFAgCOVpGA5g0ZnlJvvvQ', '© 2021 NPS - All Rights Reserved.', NULL, NULL, NULL, NULL, '8977528118', '36AACCT8644E1Z8 [ Telangana (36) ]', 'Taruni Clothing Pvt Ltd Malani Excel', '10-3-150 $151', 'St.Johns Road', 'Beside Ratnadeep Sup. Market', 'Secunderabad', 'Telangana', '500026', NULL, '2021-12-31 05:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `update_status_response_logs`
--

CREATE TABLE `update_status_response_logs` (
  `id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `ticket_status` enum('opened','on_hold','awaiting_reply','completed','accetped','action_taken') DEFAULT NULL,
  `ticket_remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_status_response_logs`
--

INSERT INTO `update_status_response_logs` (`id`, `person_id`, `logged_user_id`, `organization_id`, `survey_id`, `ticket_status`, `ticket_remarks`, `created_at`, `updated_at`) VALUES
(1, 11, 321, 23, 1, 'action_taken', 'Testing', '2021-12-24 04:36:52', '2021-12-24 04:36:52'),
(2, 16, 321, 23, 1, 'opened', 'Ticket is still opened', '2021-12-31 05:31:58', '2021-12-31 05:31:58'),
(3, 16, 321, 23, 1, 'action_taken', 'Action taken', '2021-12-31 05:32:19', '2021-12-31 05:32:19'),
(4, 3, 321, 23, 1, 'opened', 'Called customer today. Phone ringing no response', '2021-12-31 11:30:21', '2021-12-31 11:30:21'),
(5, 1, 321, 23, 1, 'awaiting_reply', 'called. no response', '2021-12-31 12:27:53', '2021-12-31 12:27:53'),
(6, 1, 321, 23, 1, 'action_taken', 'called customer. updated', '2021-12-31 12:29:16', '2021-12-31 12:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `reportingto` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT 0,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `decrypt_password` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `pincode` char(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `donot_send_newsletter` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `is_guest` int(11) DEFAULT NULL,
  `guest_email` text DEFAULT NULL,
  `sent_email` int(11) DEFAULT NULL,
  `social_media` text DEFAULT NULL,
  `identifier` text DEFAULT NULL,
  `ip` text DEFAULT NULL,
  `is_active_status` enum('0','1') NOT NULL DEFAULT '1',
  `remember_token` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_email_verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `organization_id`, `department`, `reportingto`, `role`, `email`, `password`, `decrypt_password`, `phone`, `country`, `state`, `city`, `address`, `firstname`, `lastname`, `age`, `pincode`, `gender`, `profile`, `profile_pic`, `user_type`, `donot_send_newsletter`, `date`, `is_guest`, `guest_email`, `sent_email`, `social_media`, `identifier`, `ip`, `is_active_status`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`, `is_email_verified`) VALUES
(11, NULL, NULL, NULL, 1, 'admin@nps.com', '$2y$10$kweucu9H/5FY4fCnuaHVEee20DvM27FvD9LpzDo4UgyklO6ioxWOi', '123456', '9090909090', 'india', 'Telangana', 'hyderabad', 'MALANI EXCEL,10-3-150 & 151, 4th floor, St. John\'s Road,\r\nBeside Ratnadeep Supermarket,Beside Ratnadeep Supermarket,', 'Incor', NULL, NULL, '500026', 'Male', '61a852217e298_1638421025.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'GDoxfkqw6LRN86t5T1WntslmTxH6SALegc4Y0BDOSltvrCNt1ceeW6m7l9sT', '2021-07-02 01:33:40', '2021-10-25 14:35:03', '2021-09-28 07:53:01', 0),
(317, 21, NULL, NULL, 2, 'sads@deepredink.com', '$2y$10$7AS3byAR87DBLClRGMjEu.Th7YHE6RxFaIIxnXOW8fS7UcLVVZQR2', 'hyeD1p66', '988345678', NULL, NULL, NULL, NULL, 'Aditya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.104.149', '0', NULL, '2021-12-01 17:14:08', '2021-12-01 17:14:08', '2021-12-01 12:14:08', 1),
(318, 22, NULL, NULL, 2, 'amazon@gmail.com', '$2y$10$m2FL.05H3fFwwZHV85apB.xP5vwJSEOgMxerHd7lC2ix2gjG7fUQ6', 'h1j7sMnC', '9700334319', NULL, NULL, NULL, NULL, 'amazon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.211.207', '0', NULL, '2021-12-01 17:39:47', '2021-12-01 17:39:47', '2021-12-01 12:39:47', 1),
(321, 23, NULL, 337, 2, 'omni@incor.in', '$2y$10$DX4jVt5OQsNwq4uJ799hJ.2OT/6HjQOhjdy0/V74iThMuetzvcLgW', '9OUlXBR0', '9700334152', NULL, NULL, NULL, NULL, 'Abdullah Saleem', NULL, NULL, NULL, NULL, '61ce925f051ec_1640927839.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.208.26', '0', NULL, '2021-12-02 09:45:18', '2021-12-02 09:45:18', '2021-12-02 04:45:18', 1),
(337, 28, NULL, NULL, 2, 'venkat1@deepredink.com', '$2y$10$ZOY2w4UcqqyVqXJGmKFStOnkXq6rfjSBUTb9jajoSi5yawNHmqoay', 'awwJ2Fvx', '9052691535', NULL, NULL, NULL, NULL, 'K Venkat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.206.59.123', '0', NULL, '2021-12-14 07:23:05', '2021-12-14 07:23:05', '2021-12-14 02:23:05', 1),
(338, 28, NULL, NULL, 4, 'venkatyadav.1986@gmail.com', '$2y$10$uxXM5eCgFgVNhDxljejYJeg8Q.q3s18gbto7Msi7MkO4tH8ztuzjy', 'QiqgeYZq', '9052691535', NULL, NULL, NULL, NULL, 'Yadav', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.206.59.123', '1', NULL, '2021-12-14 07:35:46', '2021-12-14 07:35:46', '2021-12-14 02:35:46', 1),
(344, 23, 5, 0, 4, 'venkat@deepredink.com', '$2y$10$3rk9ak1eUP0OpY0kRNq7feS4fqjeSMD2CUEjrtm6kOqOrOsslydzO', '7aNSRgGV', '9885047096', NULL, NULL, NULL, NULL, 'Venkat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '103.211.39.52', '1', NULL, '2021-12-31 10:59:53', '2021-12-31 10:59:53', '2021-12-31 10:59:53', 1),
(345, 23, 0, 0, 4, 'shubhang@deepredink.com', '$2y$10$YCx2olENog.z6/1IL2kOV.JNiP68uagHtWqoycmO0IahovRNm3k7u', 'idANYObb', '9885047096', NULL, NULL, NULL, NULL, 'Shuhbhang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '103.211.39.52', '1', NULL, '2021-12-31 11:00:23', '2021-12-31 11:00:23', '2021-12-31 11:00:23', 1),
(346, 23, 15, 321, 3, 'ranjith.ram@gmail.com', '$2y$10$SFJTWrFi05fgX.1/xRCF/eX0yteC2F7jLgiOH/jPZir7O17fg18GS', '23gZrp6h', '9885047096', NULL, NULL, NULL, NULL, 'Dr.Ranjith', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.104.149', '1', NULL, '2021-12-31 11:01:04', '2021-12-31 11:37:04', '2021-12-31 11:37:04', 1),
(347, 23, 16, 321, 3, 'ashwini@deepredink.com', '$2y$10$8c9nGNH7zzvDj/LmWu.9NOFmpQd1gBMLJTh8OyRPmUO2Z6kZVm602', '4XF1zngO', '9885047096', NULL, NULL, NULL, NULL, 'Ashwini', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '103.211.39.52', '1', NULL, '2021-12-31 11:04:30', '2021-12-31 11:04:30', '2021-12-31 11:04:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', '', '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(2, 'Company admin', '', '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(3, 'HOD', '', '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(4, 'Feedback Executive', 'general', '2021-09-16 06:34:08', '2021-09-16 06:34:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_fields_configurables`
--
ALTER TABLE `customer_fields_configurables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_levels`
--
ALTER TABLE `group_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_levels`
--
ALTER TABLE `role_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_names`
--
ALTER TABLE `role_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sla_configurations`
--
ALTER TABLE `sla_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_answered`
--
ALTER TABLE `survey_answered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_persons`
--
ALTER TABLE `survey_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themeoptions`
--
ALTER TABLE `themeoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_status_response_logs`
--
ALTER TABLE `update_status_response_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_fields_configurables`
--
ALTER TABLE `customer_fields_configurables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `group_levels`
--
ALTER TABLE `group_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `role_levels`
--
ALTER TABLE `role_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role_names`
--
ALTER TABLE `role_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sla_configurations`
--
ALTER TABLE `sla_configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `survey_answered`
--
ALTER TABLE `survey_answered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `survey_persons`
--
ALTER TABLE `survey_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `themeoptions`
--
ALTER TABLE `themeoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `update_status_response_logs`
--
ALTER TABLE `update_status_response_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
