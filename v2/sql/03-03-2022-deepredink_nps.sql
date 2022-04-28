-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2022 at 07:38 AM
-- Server version: 10.3.34-MariaDB
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
(5, 23, 5, 'Final Bill', '2021-12-13 03:47:38', '2021-12-13 03:47:38'),
(6, 23, 8, 'Room Clean', '2022-01-03 10:26:02', '2022-01-03 10:26:02'),
(7, 23, 16, 'Cost high', '2022-01-03 10:26:18', '2022-01-03 10:26:18'),
(8, 23, 16, 'No table clean', '2022-01-03 10:26:50', '2022-01-03 10:26:50'),
(9, 23, 8, 'Attitude', '2022-01-04 07:27:40', '2022-01-04 07:27:40'),
(10, 23, 8, 'Medicine Administration', '2022-01-04 07:28:14', '2022-01-04 07:28:14'),
(11, 23, 5, 'Late Billing', '2022-01-04 07:29:33', '2022-01-04 07:29:33'),
(12, 23, 15, 'Attitude', '2022-01-04 07:30:07', '2022-01-04 07:30:07'),
(13, 23, 15, 'Counselling', '2022-01-04 07:30:27', '2022-01-04 07:30:27'),
(14, 23, 5, 'Wrong Billing', '2022-01-04 07:30:57', '2022-01-04 07:30:57'),
(15, 23, 5, 'Insurance Assistance', '2022-01-04 07:31:21', '2022-01-04 07:31:21'),
(16, 23, 16, 'Proper Cooked', '2022-01-04 07:32:07', '2022-01-04 07:32:07'),
(17, 23, 16, 'Quality and Test', '2022-01-04 07:32:34', '2022-01-04 07:32:34'),
(18, 23, 16, 'Delay Serving', '2022-01-04 07:32:48', '2022-01-04 07:32:48'),
(19, 23, 16, 'Hygiene', '2022-01-04 07:33:08', '2022-01-04 07:33:08'),
(20, 23, 17, 'AC Not working', '2022-01-04 07:33:44', '2022-01-04 07:33:44'),
(21, 23, 17, 'Poor Room Light', '2022-01-04 07:34:26', '2022-01-04 07:34:26'),
(22, 23, 17, 'Plumbing', '2022-01-04 07:34:58', '2022-01-04 07:34:58'),
(23, 23, 17, 'Electrical', '2022-01-04 07:35:22', '2022-01-04 07:35:22'),
(24, 23, 8, 'Proper Communication', '2022-01-04 07:35:36', '2022-01-04 07:35:36'),
(25, 23, 8, 'Empathy', '2022-01-04 07:37:30', '2022-01-04 07:37:30'),
(26, 23, 8, 'Sympathy', '2022-01-04 07:37:43', '2022-01-04 07:37:43'),
(27, 23, 15, 'Empathy', '2022-01-04 07:38:04', '2022-01-04 07:38:04'),
(28, 23, 15, 'Sympathy', '2022-01-04 07:38:13', '2022-01-04 07:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `api_clients`
--

CREATE TABLE `api_clients` (
  `id` int(11) NOT NULL,
  `api_token` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_clients`
--

INSERT INTO `api_clients` (`id`, `api_token`, `created_at`, `updated_at`) VALUES
(2, '89616bad112871a8f7d8e1753a14948dc186f513840923e59012e1f0d8822976', '2022-01-31 09:41:54', '2022-01-31 09:41:54');

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
(18, 23, 'Radiology', 'on', '2022-01-04 08:20:58', '2022-01-04 13:50:58'),
(20, 23, 'Laboratory', 'on', '2022-01-04 08:21:13', '2022-01-04 08:21:13'),
(21, 23, 'Other Departments', 'on', '2022-02-18 09:44:05', '2022-02-18 09:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `escaltion_trigger_log`
--

CREATE TABLE `escaltion_trigger_log` (
  `id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `escalation_number` char(10) DEFAULT NULL,
  `gateway_type` char(5) DEFAULT NULL COMMENT 'email,sms',
  `esc_subject` varchar(200) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reactivate_escation` char(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(2, 23, 'Top Management', 'L5', 4, '2022-02-03 10:59:38', '2022-02-03 16:29:38'),
(3, 23, 'Sr Leaders', 'L4', 3, '2022-02-03 10:59:31', '2022-02-03 16:29:31'),
(4, 23, 'Mid Leaders', 'L3', 2, '2022-02-03 10:59:23', '2022-02-03 16:29:23'),
(5, 23, 'Jr Leaders', 'L2', 0, '2022-01-11 11:13:14', '2022-01-11 16:43:14'),
(6, 23, 'Staff', 'L1', 0, '2022-01-11 11:13:07', '2022-01-11 16:43:07');

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
-- Table structure for table `passing_departments`
--

CREATE TABLE `passing_departments` (
  `id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `passing_page` char(20) NOT NULL DEFAULT 'no',
  `survey_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sorting` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 23, 1, 'How likely is it that you would recommend OMNI Hospitals to your friends or family?', '', 'radio', 1, '2022-01-11 06:36:15', '2022-01-11 06:36:15', 0, 'yes'),
(2, 23, 1, 'What is the most important reason for recommending OMNI?', '', 'checkbox', 2, '2022-01-11 06:28:21', '2022-01-11 11:58:21', 5, 'yes'),
(3, 23, 1, 'What should change so that you would definitely recommend OMNI?', '', 'checkbox', 3, '2022-01-11 06:28:08', '2022-01-11 11:58:08', 6, 'yes'),
(4, 23, 1, 'What is the most important reason for NOT recommending OMNI?', '', 'checkbox', 4, '2022-01-11 06:27:55', '2022-01-11 11:57:55', 7, 'yes'),
(5, 23, 1, 'What did you like about  *teamname*?', '', 'textarea', 5, '2021-12-06 09:52:53', '2021-12-06 09:52:53', 0, 'yes'),
(6, 23, 1, 'What could have been better in  *teamname*?', '', 'textarea', 6, '2021-12-06 09:52:47', '2021-12-06 09:52:47', 0, 'yes'),
(7, 23, 1, 'What went wrong with *teamname*?', '', 'textarea', 7, '2021-12-06 09:52:40', '2021-12-06 09:52:40', 0, 'yes'),
(11, 23, 3, 'How likely is it that you would recommend OMNI Hospitals to your friends or family?', '', 'radio', 1, '2022-01-11 10:02:02', '2022-01-11 10:02:02', 0, 'yes'),
(12, 23, 3, 'What is the most important reason for recommending OMNI. Which Team Made You Happy ?', '', 'checkbox', 2, '2022-01-11 10:02:09', '2022-01-11 10:02:09', 15, 'yes'),
(13, 23, 3, 'What should change so that you would definitely recommend OMNI?', '', 'checkbox', 3, '2022-01-11 10:02:13', '2022-01-11 10:02:13', 16, 'yes'),
(14, 23, 3, 'What is the most important reason for NOT recommending OMNI?', '', 'checkbox', 4, '2022-01-11 10:02:18', '2022-01-11 10:02:18', 17, 'yes'),
(15, 23, 3, 'What did you like about  *teamname*?', '', 'textarea', 5, '2022-01-11 10:02:21', '2022-01-11 10:02:21', 0, 'yes'),
(16, 23, 3, 'What could have been better in  *teamname*?', '', 'textarea', 6, '2022-01-11 10:02:26', '2022-01-11 10:02:26', 0, 'yes'),
(17, 23, 3, 'What went wrong with *teamname*?', '', 'textarea', 7, '2022-01-11 10:02:30', '2022-01-11 10:02:30', 0, 'yes');

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
(56, 2, 18, 'Radiology', '2022-01-04 08:20:58', '2022-01-04 13:50:58'),
(57, 3, 18, 'Radiology', '2022-01-04 08:20:58', '2022-01-04 13:50:58'),
(58, 4, 18, 'Radiology', '2022-01-04 08:20:58', '2022-01-04 13:50:58'),
(62, 2, 20, 'Laboratory', '2022-01-04 08:21:13', '2022-01-04 08:21:13'),
(63, 3, 20, 'Laboratory', '2022-01-04 08:21:13', '2022-01-04 08:21:13'),
(64, 4, 20, 'Laboratory', '2022-01-04 08:21:13', '2022-01-04 08:21:13'),
(65, 11, NULL, '0', '2022-01-10 06:07:20', '2022-01-10 06:07:20'),
(66, 11, NULL, '1', '2022-01-10 06:08:33', '2022-01-10 06:08:33'),
(67, 11, NULL, '2', '2022-01-10 06:08:43', '2022-01-10 06:08:43'),
(68, 11, NULL, '3', '2022-01-10 06:09:21', '2022-01-10 06:09:21'),
(69, 11, NULL, '4', '2022-01-10 06:09:32', '2022-01-10 06:09:32'),
(70, 11, NULL, '5', '2022-01-10 06:11:22', '2022-01-10 06:11:22'),
(71, 11, NULL, '6', '2022-01-10 06:11:34', '2022-01-10 06:11:34'),
(72, 11, NULL, '7', '2022-01-10 06:11:45', '2022-01-10 06:11:45'),
(73, 11, NULL, '8', '2022-01-10 06:11:56', '2022-01-10 06:11:56'),
(74, 11, NULL, '9', '2022-01-10 06:12:05', '2022-01-10 06:12:05'),
(76, 15, NULL, 'Enter your message here', '2022-01-10 06:22:19', '2022-01-10 06:22:19'),
(77, 16, NULL, 'Enter your message here', '2022-01-10 06:22:30', '2022-01-10 06:22:30'),
(78, 17, NULL, 'Enter your message here', '2022-01-10 06:22:41', '2022-01-10 06:22:41'),
(79, 12, 5, 'Billing', '2022-01-10 06:45:33', '2022-01-10 06:45:33'),
(80, 13, 5, 'Billing', '2022-01-10 06:45:38', '2022-01-10 06:45:38'),
(81, 14, 5, 'Billing', '2022-01-10 06:45:41', '2022-01-10 06:45:41'),
(82, 12, 8, 'Nursing', '2022-01-10 06:45:53', '2022-01-10 06:45:53'),
(83, 13, 8, 'Nursing', '2022-01-10 06:45:56', '2022-01-10 06:45:56'),
(84, 14, 8, 'Nursing', '2022-01-10 06:45:59', '2022-01-10 06:45:59'),
(85, 12, 10, 'Pharmacy', '2022-01-10 06:46:09', '2022-01-10 06:46:09'),
(86, 13, 10, 'Pharmacy', '2022-01-10 06:46:19', '2022-01-10 06:46:19'),
(87, 14, 10, 'Pharmacy', '2022-01-10 06:46:23', '2022-01-10 06:46:23'),
(88, 12, 15, 'Doctors', '2022-01-10 06:46:34', '2022-01-10 06:46:34'),
(89, 13, 15, 'Doctors', '2022-01-10 06:46:37', '2022-01-10 06:46:37'),
(90, 14, 15, 'Doctors', '2022-01-10 06:46:40', '2022-01-10 06:46:40'),
(91, 12, 16, 'Food And Beverage', '2022-01-10 06:46:48', '2022-01-10 06:46:48'),
(92, 13, 16, 'Food And Beverage', '2022-01-10 06:46:53', '2022-01-10 06:46:53'),
(93, 14, 16, 'Food And Beverage', '2022-01-10 06:46:56', '2022-01-10 06:46:56'),
(94, 12, 17, 'Maintenance', '2022-01-10 06:47:05', '2022-01-10 06:47:05'),
(95, 13, 17, 'Maintenance', '2022-01-10 06:47:09', '2022-01-10 06:47:09'),
(96, 14, 17, 'Maintenance', '2022-01-10 06:47:13', '2022-01-10 06:47:13'),
(97, 12, 18, 'Radiology', '2022-01-10 06:47:24', '2022-01-10 06:47:24'),
(98, 13, 18, 'Radiology', '2022-01-10 06:47:27', '2022-01-10 06:47:27'),
(99, 14, 18, 'Radiology', '2022-01-10 06:47:31', '2022-01-10 06:47:31'),
(100, 12, 20, 'Laboratory', '2022-01-10 06:47:47', '2022-01-10 06:47:47'),
(101, 13, 20, 'Laboratory', '2022-01-10 06:47:50', '2022-01-10 06:47:50'),
(102, 14, 20, 'Laboratory', '2022-01-10 06:48:00', '2022-01-10 06:48:00'),
(103, 11, NULL, '10', '2022-01-10 06:12:05', '2022-01-10 06:12:05'),
(104, 2, 21, 'Other Departments', '2022-02-18 09:44:05', '2022-02-18 09:44:05'),
(105, 3, 21, 'Other Departments', '2022-02-18 09:44:05', '2022-02-18 09:44:05'),
(106, 4, 21, 'Other Departments', '2022-02-18 09:44:05', '2022-02-18 09:44:05'),
(107, 12, 21, 'Other Departments', '2022-02-18 09:44:05', '2022-02-18 09:44:05'),
(108, 13, 21, 'Other Departments', '2022-02-18 09:44:05', '2022-02-18 09:44:05'),
(109, 14, 21, 'Other Departments', '2022-02-18 09:44:05', '2022-02-18 09:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `rating_of_departments`
--

CREATE TABLE `rating_of_departments` (
  `id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `department_name` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating_of_dep_activities`
--

CREATE TABLE `rating_of_dep_activities` (
  `id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `activity_name` varchar(50) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(25, 23, 2, 2, 'Group CEO', '2021-12-31 06:56:02', '2021-12-31 06:56:02');

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
(1, 321, 'Pre Discharge', 'Tell us about your stay so far and help us improve our services', 'yes', '2022-01-12 05:03:24', '2022-01-12 10:33:24', 23),
(3, 321, 'Post Discharge', 'Tell us about your recent stay & treatment at Omni Hospitals and help us improve our services', 'yes', '2022-01-12 05:06:24', '2022-01-12 10:36:24', 23);

-- --------------------------------------------------------

--
-- Table structure for table `survey_answered`
--

CREATE TABLE `survey_answered` (
  `id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answerid` int(11) DEFAULT NULL,
  `answeredby_person` text DEFAULT NULL,
  `department_activities` text DEFAULT NULL,
  `department_name_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `ticket_status` enum('opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back','closed_satisfied','closed_unsatisfied','patient_level_closure','process_level_closure') CHARACTER SET latin1 DEFAULT NULL,
  `ticket_remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey_persons`
--

CREATE TABLE `survey_persons` (
  `id` int(11) NOT NULL,
  `ticket_series_number` int(11) DEFAULT NULL,
  `ticker_final_number` varchar(50) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobile` varchar(150) DEFAULT NULL,
  `gender` char(10) DEFAULT NULL,
  `bed_name` varchar(100) DEFAULT NULL,
  `uhid` varchar(100) DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `organization_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_persons`
--

INSERT INTO `survey_persons` (`id`, `ticket_series_number`, `ticker_final_number`, `survey_id`, `firstname`, `lastname`, `email`, `mobile`, `gender`, `bed_name`, `uhid`, `discharge_date`, `created_at`, `updated_at`, `organization_id`, `logged_user_id`) VALUES
(1, 1, '#2201', 1, 'Venkat', NULL, 'venkat@deepredink.com', '9052691535', 'male', 'B-01', 'M-1', '2022-03-03', '2022-03-03 10:48:27', '2022-03-03 10:48:27', 23, 321),
(2, 2, '#2202', 1, 'Lakshmi Priya Valluri', NULL, 'priya@deepredink.com', '9784584525', 'female', 'dfghj', 'asdfgm', '2022-03-23', '2022-03-03 10:48:45', '2022-03-03 10:48:45', 23, 321);

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
  `ticket_status` enum('opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back','closed_satisfied','closed_unsatisfied','patient_level_closure','process_level_closure') DEFAULT NULL,
  `ticket_remarks` text DEFAULT NULL,
  `process_level_closure` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `designation_id` int(11) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `organization_id`, `department`, `reportingto`, `role`, `designation_id`, `email`, `password`, `decrypt_password`, `phone`, `country`, `state`, `city`, `address`, `firstname`, `lastname`, `age`, `pincode`, `gender`, `profile`, `profile_pic`, `user_type`, `donot_send_newsletter`, `date`, `is_guest`, `guest_email`, `sent_email`, `social_media`, `identifier`, `ip`, `is_active_status`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`, `is_email_verified`) VALUES
(11, NULL, NULL, NULL, 1, NULL, 'admin@nps.com', '$2y$10$kweucu9H/5FY4fCnuaHVEee20DvM27FvD9LpzDo4UgyklO6ioxWOi', '123456', '9090909090', 'india', 'Telangana', 'hyderabad', 'MALANI EXCEL,10-3-150 & 151, 4th floor, St. John\'s Road,\r\nBeside Ratnadeep Supermarket,Beside Ratnadeep Supermarket,', 'Incor', NULL, NULL, '500026', 'Male', '61a852217e298_1638421025.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'GDoxfkqw6LRN86t5T1WntslmTxH6SALegc4Y0BDOSltvrCNt1ceeW6m7l9sT', '2021-07-02 01:33:40', '2021-10-25 14:35:03', '2021-09-28 07:53:01', 0),
(317, 21, NULL, NULL, 2, NULL, 'sads@deepredink.com', '$2y$10$7AS3byAR87DBLClRGMjEu.Th7YHE6RxFaIIxnXOW8fS7UcLVVZQR2', 'hyeD1p66', '988345678', NULL, NULL, NULL, NULL, 'Aditya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.104.149', '0', NULL, '2021-12-01 17:14:08', '2021-12-01 17:14:08', '2021-12-01 12:14:08', 1),
(318, 22, NULL, NULL, 2, NULL, 'amazon@gmail.com', '$2y$10$m2FL.05H3fFwwZHV85apB.xP5vwJSEOgMxerHd7lC2ix2gjG7fUQ6', 'h1j7sMnC', '9700334319', NULL, NULL, NULL, NULL, 'amazon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.211.207', '0', NULL, '2021-12-01 17:39:47', '2021-12-01 17:39:47', '2021-12-01 12:39:47', 1),
(321, 23, NULL, 344, 2, NULL, 'omni@incor.in', '$2y$10$DX4jVt5OQsNwq4uJ799hJ.2OT/6HjQOhjdy0/V74iThMuetzvcLgW', '9OUlXBR0', '9700334152', NULL, NULL, NULL, NULL, 'Abdullah Saleem', NULL, NULL, NULL, NULL, '61ce925f051ec_1640927839.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.208.26', '0', NULL, '2021-12-02 09:45:18', '2021-12-02 09:45:18', '2021-12-02 04:45:18', 1),
(337, 28, NULL, NULL, 2, NULL, 'venkat1@deepredink.com', '$2y$10$ZOY2w4UcqqyVqXJGmKFStOnkXq6rfjSBUTb9jajoSi5yawNHmqoay', 'awwJ2Fvx', '9052691535', NULL, NULL, NULL, NULL, 'K Venkat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.206.59.123', '0', NULL, '2021-12-14 07:23:05', '2021-12-14 07:23:05', '2021-12-14 02:23:05', 1),
(338, 23, 10, 345, 4, NULL, 'dgiriprasad.ch@omnihospitals.in', '$2y$10$uxXM5eCgFgVNhDxljejYJeg8Q.q3s18gbto7Msi7MkO4tH8ztuzjy', 'QiqgeYZq', '9701871857', NULL, NULL, NULL, NULL, 'Mr. Giri Prasad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2021-12-14 07:35:46', '2022-01-07 16:57:39', '2022-01-07 16:57:39', 1),
(344, 23, 17, 0, 3, NULL, 'venkatyadav.1986@gmail.com', '$2y$10$3rk9ak1eUP0OpY0kRNq7feS4fqjeSMD2CUEjrtm6kOqOrOsslydzO', '7aNSRgGV', '09052691535', NULL, NULL, NULL, NULL, 'Venkaty Yadav', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.206.59.90', '1', NULL, '2021-12-31 10:59:53', '2022-02-14 16:26:48', '2022-02-14 16:26:48', 1),
(345, 23, 5, 344, 3, NULL, 'sailakshmi.nallamilli@gmail.com', '$2y$10$YCx2olENog.z6/1IL2kOV.JNiP68uagHtWqoycmO0IahovRNm3k7u', 'idANYObb', '9676193777', NULL, NULL, NULL, NULL, 'Dr. Waris', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.206.46.75', '1', NULL, '2021-12-31 11:00:23', '2022-01-25 12:09:02', '2022-01-25 12:09:02', 1),
(346, 23, 8, 345, 3, NULL, 'ranjith.ram@gmail.com', '$2y$10$SFJTWrFi05fgX.1/xRCF/eX0yteC2F7jLgiOH/jPZir7O17fg18GS', '23gZrp6h', '9705423333', NULL, NULL, NULL, NULL, 'Ms Rajeshwari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2021-12-31 11:01:04', '2022-01-04 13:40:14', '2022-01-04 13:40:14', 1),
(347, 23, 5, 349, 3, NULL, 'sshivakumar@omnihospitals.in', '$2y$10$8c9nGNH7zzvDj/LmWu.9NOFmpQd1gBMLJTh8OyRPmUO2Z6kZVm602', '4XF1zngO', '9100929081', NULL, NULL, NULL, NULL, 'Mr. Shivakumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2021-12-31 11:04:30', '2022-01-04 13:44:38', '2022-01-04 13:44:38', 1),
(348, 23, 5, 349, 3, NULL, 'dkukatpallymaintenance@omnihospitals.in', '$2y$10$ym7fn63Fh6idiwmmLZTgtO2yDUbDLT1sN8DXMkRBp.2tzYEhJBGS2', 'j6wZB2tf', '9100961167', NULL, NULL, NULL, NULL, 'Mr. Ashok Kiran Kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-04 05:23:26', '2022-01-04 13:49:56', '2022-01-04 13:49:56', 1),
(349, 23, 5, 345, 3, NULL, 'abdullahs@incor.in', '$2y$10$MhgS5PHx8rMCE4QgZWFMD.WqJ1TAP0KQTWRI7LIvOLvcn.4ux84Gu', 'RML6mqd1', '860099081', NULL, NULL, NULL, NULL, 'Abdullah Saleem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-04 13:42:51', '2022-01-11 17:40:22', '2022-01-11 17:40:22', 1),
(350, 23, 20, 345, 3, NULL, 'dkukatpallylab@omnihospitals.in', '$2y$10$uwtz1IXY8NZ9iD43vxBJM.U5a40MFDY3pY/gkLlXaFmwwKG4CHunW', 'WANES9lJ', '9100442771', NULL, NULL, NULL, NULL, 'Mr. Arun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-04 13:53:51', '2022-01-04 13:53:51', '2022-01-04 13:53:51', 1),
(351, 23, 18, 345, 3, NULL, 'no@email.com', '$2y$10$oS91iL4GsttzY0yCw/ZYL.JWXIShVokpjd6nR7NpQcj8OD07j.N8.', 'ss49l35H', '9676799400', NULL, NULL, NULL, NULL, 'Dr. Harish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-04 13:57:53', '2022-01-04 13:57:53', '2022-01-04 13:57:53', 1),
(352, 23, 5, 349, 4, NULL, 'sailakshmi.nallamilli@incor.in', '$2y$10$8HKegE/y2/.LuzeYawsGnuqLIRA5npAQwWLqAyCv0YtmMt6YdXmwm', 'sAilakshmi@9', '860099081', NULL, NULL, NULL, NULL, 'Sailakshmi N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-07 16:59:26', '2022-01-07 17:33:19', '2022-01-07 17:33:19', 1),
(353, 23, 0, 0, 5, NULL, 'sailakshmi.nallamilli@gmail.com', '$2y$10$NFs/KQoGSQ2NfdfraNOvHumP2i0h6YyA0kPZ8rTin2B5gEPfe6noa', 'm9WbPSB4', '9052691535', NULL, NULL, NULL, NULL, 'Sailakshmi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.206.59.90', '1', NULL, '2022-01-25 12:19:51', '2022-02-14 16:26:13', '2022-02-14 16:26:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `code`, `role_name_id`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', '', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(2, 'Company admin', '', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(3, 'HOD', '', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(4, 'Feedback Executive', 'general', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(5, 'Operational Head', 'othead', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(6, 'Unit Head', 'unithead', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_clients`
--
ALTER TABLE `api_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_token` (`api_token`);

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
-- Indexes for table `escaltion_trigger_log`
--
ALTER TABLE `escaltion_trigger_log`
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
-- Indexes for table `passing_departments`
--
ALTER TABLE `passing_departments`
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
-- Indexes for table `rating_of_departments`
--
ALTER TABLE `rating_of_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_of_dep_activities`
--
ALTER TABLE `rating_of_dep_activities`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `api_clients`
--
ALTER TABLE `api_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_fields_configurables`
--
ALTER TABLE `customer_fields_configurables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `escaltion_trigger_log`
--
ALTER TABLE `escaltion_trigger_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `passing_departments`
--
ALTER TABLE `passing_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `rating_of_departments`
--
ALTER TABLE `rating_of_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_of_dep_activities`
--
ALTER TABLE `rating_of_dep_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_persons`
--
ALTER TABLE `survey_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `themeoptions`
--
ALTER TABLE `themeoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `update_status_response_logs`
--
ALTER TABLE `update_status_response_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
