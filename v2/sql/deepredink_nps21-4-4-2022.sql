-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2022 at 12:59 AM
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
(28, 23, 15, 'Sympathy', '2022-01-04 07:38:13', '2022-01-04 07:38:13'),
(29, 36, 21, 'Vizag-Final Billing', '2022-04-01 06:42:23', '2022-04-01 06:42:23'),
(30, 36, 21, 'Vizag-late billing', '2022-04-01 06:42:40', '2022-04-01 06:42:40'),
(37, 36, 23, 'Vizag - Extra Billing', '2022-04-01 07:16:21', '2022-04-01 07:16:21'),
(38, 36, 23, 'Vizag - final billing', '2022-04-01 07:16:44', '2022-04-01 07:16:44');

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
(5, 23, 'Billing', 'on', '2022-04-01 07:15:19', '2022-04-01 12:45:19'),
(8, 23, 'Nursing', 'on', '2021-12-07 04:24:57', '2021-12-07 04:24:57'),
(10, 23, 'Pharmacy', 'on', '2021-12-13 03:46:16', '2021-12-13 08:46:16'),
(15, 23, 'Doctors', 'on', '2021-12-15 12:43:24', '2021-12-15 12:43:24'),
(16, 23, 'Food  and Beverage', 'on', '2021-12-15 12:44:13', '2021-12-15 17:44:13'),
(17, 23, 'Maintenance', 'on', '2021-12-15 12:44:24', '2021-12-15 12:44:24'),
(18, 23, 'Radiology', 'on', '2022-01-04 08:20:58', '2022-01-04 13:50:58'),
(20, 23, 'Laboratory', 'on', '2022-01-04 08:21:13', '2022-01-04 08:21:13'),
(22, 36, 'Vizag-Nursing', 'on', '2022-04-01 06:41:45', '2022-04-01 06:41:45'),
(23, 36, 'Vizag - billing', 'on', '2022-04-01 07:15:45', '2022-04-01 07:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT 0,
  `admin_user_id` int(11) DEFAULT NULL,
  `specification_id` int(11) DEFAULT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `organization_id`, `admin_user_id`, `specification_id`, `doctor_name`, `created_at`, `updated_at`) VALUES
(7, 23, 321, 5, 'Dr B. Jaipal Reddy', '2022-03-28 09:09:34', '2022-04-01 13:04:29'),
(8, 23, 321, 6, 'Dr M. Chandra Shekar', '2022-03-28 09:09:44', '2022-03-31 07:18:10'),
(9, 23, 321, 2, 'Dr O. Rama Pakkira', '2022-03-28 10:06:16', '2022-03-31 07:18:15'),
(10, 23, 321, 7, 'Dr L. Venkatesh', '2022-03-28 10:08:22', '2022-03-31 07:18:21'),
(12, 36, 358, 9, 'DR. L Venkatesh', '2022-04-01 07:38:09', '2022-04-01 07:38:09');

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
(2, 23, 'Top Management', 'L5', 60, '2022-04-01 11:18:43', '2022-04-01 16:48:43'),
(3, 23, 'Sr Leaders', 'L4', 30, '2022-01-11 11:12:38', '2022-01-11 16:42:38'),
(4, 23, 'Mid Leaders', 'L3', 20, '2021-12-31 11:32:55', '2021-12-31 11:32:55'),
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
(1, 23, 'sms', 'Rakesh.s@mahindrauniversity.edu.in', '46DUFF', 'sadf', NULL, 'afsdfa', 'asdfa', 'sdf', '', 'asdf', 'yes', '2021-12-20 11:07:29', '2021-12-20 11:07:29'),
(2, 36, 'email', 'omniv@incor.in', '123456', 'skjdfsjdkfhjkshsdfdfjk', NULL, '', '', '', '', '', 'yes', '2022-04-01 07:46:47', '2022-04-01 13:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `is_group` enum('yes','no') DEFAULT 'no',
  `short_name` varchar(255) DEFAULT NULL,
  `company_url` varchar(255) DEFAULT NULL,
  `favicon_url` varchar(255) DEFAULT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
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

INSERT INTO `organizations` (`id`, `company_name`, `is_group`, `short_name`, `company_url`, `favicon_url`, `brand_logo`, `slug`, `address_1`, `address_2`, `pincode`, `city`, `country`, `gst_no`, `billing_address_1`, `billing_address_2`, `billing_pincode`, `billing_city`, `billing_country`, `admin_name`, `admin_email`, `admin_mobile`, `admin_alter_mobile`, `role`, `password`, `license_startdate`, `license_period_year`, `license_period_month`, `is_active`, `created_at`, `updated_at`) VALUES
(23, 'OMNI Kukatpally', 'yes', 'Omni - Kukatpally', NULL, 'https://www.google.com/s2/favicons?domain=omnihospitals.in', 'kukatpally.png', 'omni-kukatpally', 'Kukataplly road no 12', 'near BJP Office', '500086', 'Hyderabad', 'india', '05ABDCE1234F1Z2', 'Kukataplly road no 12', 'near JNTU', '500086', 'Hyderabad', 'india', 'Omni test user', 'omni@gmail.com', '9700334152', '98745654135', 2, '9jGEzxdJ', '2021-12-16', '1', '4', 'yes', '2022-03-31 10:37:04', '2022-03-31 10:37:04'),
(36, 'Incor Health Pvt.ltd', 'no', 'Omni Vizag', 'https://omnihospitals.in/vizag', 'https://www.google.com/s2/favicons?domain=omnihospitals.in', 'vizag.png', 'omni-vizag', 'Chinna Waltair, Pedda Waltair,', '', '530003', 'Vizag', 'india', '05ABDCE1234F1Z2', 'Chinna Waltair, Pedda Waltair,', '', '530003', 'Vizag', 'india', 'omni vizag', 'omnivizag@incor.in', '8888001001', '', 2, 'sA05ZCc6', '2022-03-29', '1', '0', 'yes', '2022-03-31 10:37:33', '2022-03-31 10:37:33'),
(37, 'Incor Health Pvt.ltd', 'no', 'Omni Kothapet', 'https://omnihospitals.in/kothapet/', 'https://www.google.com/s2/favicons?domain=omnihospitals.in', 'kothapet.png', 'omni-kothapet', 'Sy. No.9/1/A, Plot No.W-11,B-9, Kothapet Rd, opp. PVT Market Building,', 'Near SVC Cinema Theatre, Dilsukhnagar,', '500036', 'Hyderabad', 'india', '05ABDCE1234F1Z2', 'Sy. No.9/1/A, Plot No.W-11,B-9, Kothapet Rd, opp. PVT Market Building,', 'Near SVC Cinema Theatre, Dilsukhnagar,', '500036', 'Hyderabad', 'india', 'omni kothapet', 'omnikothapet@incor.in', '8096369999', '', 2, 'whCyXMcq', '2022-03-29', '1', '0', 'yes', '2022-03-31 10:37:53', '2022-03-31 10:37:53');

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

--
-- Dumping data for table `passing_departments`
--

INSERT INTO `passing_departments` (`id`, `person_id`, `department_id`, `passing_page`, `survey_id`, `created_at`, `updated_at`, `sorting`) VALUES
(1, 1, 14, 'passed', 1, '2022-03-24 10:10:02', '2022-03-24 10:10:02', 0),
(2, 1, 31, 'passed', 1, '2022-03-24 10:10:59', '2022-03-24 10:10:59', 1),
(3, 1, 21, 'passed', 1, '2022-03-24 10:11:04', '2022-03-24 10:11:04', 30),
(4, 2, 82, 'passed', 3, '2022-03-24 10:27:03', '2022-03-24 10:27:03', 0),
(5, 2, 100, 'passed', 3, '2022-03-24 10:27:28', '2022-03-24 10:27:28', 1),
(6, 2, 21, 'no', 3, '2022-03-24 15:56:54', '2022-03-24 15:56:54', 30),
(7, 3, 13, 'passed', 1, '2022-03-25 10:56:24', '2022-03-25 10:56:24', 0),
(8, 3, 27, 'passed', 1, '2022-03-25 10:57:06', '2022-03-25 10:57:06', 1),
(9, 3, 29, 'passed', 1, '2022-03-25 10:59:04', '2022-03-25 10:59:04', 2),
(10, 3, 45, 'passed', 1, '2022-03-25 10:59:24', '2022-03-25 10:59:24', 3),
(11, 3, 48, 'passed', 1, '2022-03-25 10:59:50', '2022-03-25 10:59:50', 4),
(12, 3, 21, 'passed', 1, '2022-03-25 10:59:57', '2022-03-25 10:59:57', 30),
(13, 4, 80, 'passed', 3, '2022-03-25 11:02:11', '2022-03-25 11:02:11', 0),
(14, 4, 92, 'passed', 3, '2022-03-25 11:02:17', '2022-03-25 11:02:17', 1),
(15, 4, 95, 'passed', 3, '2022-03-25 11:02:22', '2022-03-25 11:02:22', 2),
(16, 4, 98, 'passed', 3, '2022-03-25 11:02:26', '2022-03-25 11:02:26', 3),
(17, 4, 101, 'passed', 3, '2022-03-25 11:02:29', '2022-03-25 11:02:29', 4),
(18, 4, 21, 'no', 3, '2022-03-25 16:32:06', '2022-03-25 16:32:06', 30),
(19, 5, 44, 'passed', 1, '2022-03-25 11:09:46', '2022-03-25 11:09:46', 0),
(20, 5, 47, 'passed', 1, '2022-03-25 11:10:01', '2022-03-25 11:10:01', 1),
(21, 5, 21, 'passed', 1, '2022-03-25 11:10:04', '2022-03-25 11:10:04', 30),
(22, 6, 14, 'passed', 1, '2022-03-25 11:09:46', '2022-03-25 11:09:46', 0),
(23, 6, 33, 'passed', 1, '2022-03-25 11:10:31', '2022-03-25 11:10:31', 1),
(24, 6, 21, 'no', 1, '2022-03-25 16:39:37', '2022-03-25 16:39:37', 30),
(25, 7, 46, 'passed', 1, '2022-03-25 11:22:23', '2022-03-25 11:22:23', 0),
(26, 7, 21, 'passed', 1, '2022-03-25 11:22:27', '2022-03-25 11:22:27', 30),
(27, 10, 46, 'passed', 1, '2022-03-25 12:35:10', '2022-03-25 12:35:10', 0),
(28, 10, 21, 'no', 1, '2022-03-25 18:04:42', '2022-03-25 18:04:42', 30),
(29, 11, 14, 'passed', 1, '2022-03-28 06:23:17', '2022-03-28 06:23:17', 0),
(30, 11, 21, 'passed', 1, '2022-03-28 06:23:19', '2022-03-28 06:23:19', 30),
(31, 12, 81, 'passed', 3, '2022-03-28 06:28:09', '2022-03-28 06:28:09', 0),
(32, 12, 84, 'passed', 3, '2022-03-28 06:28:22', '2022-03-28 06:28:22', 1),
(33, 12, 21, 'passed', 3, '2022-03-28 06:28:25', '2022-03-28 06:28:25', 30),
(34, 13, 23, 'passed', 1, '2022-03-28 07:47:32', '2022-03-28 07:47:32', 0),
(35, 13, 21, 'passed', 1, '2022-03-28 07:47:35', '2022-03-28 07:47:35', 30),
(36, 17, 14, 'passed', 1, '2022-03-29 06:57:20', '2022-03-29 06:57:20', 0),
(37, 17, 21, 'passed', 1, '2022-03-29 06:57:23', '2022-03-29 06:57:23', 30),
(38, 18, 14, 'passed', 1, '2022-03-29 10:08:44', '2022-03-29 10:08:44', 0),
(39, 18, 33, 'passed', 1, '2022-03-29 10:08:49', '2022-03-29 10:08:49', 1),
(40, 18, 21, 'passed', 1, '2022-03-29 10:08:58', '2022-03-29 10:08:58', 30),
(44, 19, 14, 'passed', 1, '2022-04-01 06:27:16', '2022-04-01 06:27:16', 0),
(45, 19, 31, 'passed', 1, '2022-04-01 06:27:26', '2022-04-01 06:27:26', 1),
(46, 19, 21, 'passed', 1, '2022-04-01 06:27:32', '2022-04-01 06:27:32', 30);

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
-- Table structure for table `persons_voice_message`
--

CREATE TABLE `persons_voice_message` (
  `id` int(11) NOT NULL,
  `voice_file` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `person_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons_voice_message`
--

INSERT INTO `persons_voice_message` (`id`, `voice_file`, `created_at`, `updated_at`, `person_id`, `organization_id`, `survey_id`, `logged_user_id`) VALUES
(1, 'e8cbedd4b37e8ccd6b8a7d469afa467a_PID_2.mp3', '2022-03-24 15:58:01', '2022-03-24 15:58:01', 2, 0, 0, 321),
(2, '4cce5fac06227ba079f0fe1395eae9e7_PID_2.mp3', '2022-03-24 15:58:49', '2022-03-24 15:58:49', 2, 0, 0, 321),
(3, '3f5b8820007fe1219943df838098aa20_PID_4.mp3', '2022-03-25 16:33:02', '2022-03-25 16:33:02', 4, 0, 0, 321),
(4, '184441f0985cbdee864e1a37ef88876d_PID_6.mp3', '2022-03-25 16:41:07', '2022-03-25 16:41:07', 6, 0, 0, 321),
(5, '557c4195fbfef9e7b797c688e9c5d413_PID_10.mp3', '2022-03-25 18:05:42', '2022-03-25 18:05:42', 10, 0, 0, 321);

-- --------------------------------------------------------

--
-- Table structure for table `processes`
--

CREATE TABLE `processes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processes`
--

INSERT INTO `processes` (`id`, `name`, `slug`, `organization_id`, `created_at`, `updated_at`) VALUES
(4, 'Process22', 'process22', 23, '2022-04-01 07:50:33', '2022-04-01 13:20:33'),
(5, 'Process1', 'process1', 23, '2022-03-04 00:03:49', '2022-03-04 00:03:49');

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
(17, 23, 3, 'What went wrong with *teamname*?', '', 'textarea', 7, '2022-01-11 10:02:30', '2022-01-11 10:02:30', 0, 'yes'),
(29, 30, 3, 'What did you like about  *teamname*?', '', 'textarea', 5, '2022-01-11 10:02:21', '2022-01-11 10:02:21', 0, 'yes'),
(30, 30, 3, 'What could have been better in  *teamname*?', '', 'textarea', 6, '2022-01-11 10:02:26', '2022-01-11 10:02:26', 0, 'yes'),
(31, 30, 3, 'What went wrong with *teamname*?', '', 'textarea', 7, '2022-01-11 10:02:30', '2022-01-11 10:02:30', 0, 'yes'),
(32, 36, 7, 'are you wrong with billing?', 'ddd', 'radio', 2, '2022-04-01 08:11:06', '2022-04-01 13:41:06', 0, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `option_value` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `organization_id`, `question_id`, `department_id`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 23, 1, NULL, '0', '2022-04-01 12:29:41', '2022-04-01 12:29:41'),
(2, 23, 1, NULL, '1', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(3, 23, 1, NULL, '2', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(4, 23, 1, NULL, '3', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(5, 23, 1, NULL, '4', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(6, 23, 1, NULL, '5', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(7, 23, 1, NULL, '6', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(8, 23, 1, NULL, '7', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(9, 23, 1, NULL, '8', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(10, 23, 1, NULL, '9', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(12, 23, 2, 5, 'Billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(13, 23, 3, 5, 'Billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(14, 23, 4, 5, 'Billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(15, 23, 5, NULL, 'Enter your message here', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(16, 23, 6, NULL, 'Enter your message here', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(17, 23, 7, NULL, 'Enter your message here', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(21, 23, 0, NULL, 'Any Other', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(22, 23, 1, NULL, '10', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(23, 23, 2, 8, 'Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(25, 23, 2, 10, 'Pharmacy', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(27, 23, 3, 8, 'Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(29, 23, 3, 10, 'Pharmacy', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(31, 23, 4, 8, 'Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(33, 23, 4, 10, 'Pharmacy', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(44, 23, 2, 15, 'Doctors', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(45, 23, 3, 15, 'Doctors', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(46, 23, 4, 15, 'Doctors', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(47, 23, 2, 16, 'Food  and Beverages', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(48, 23, 3, 16, 'Food  and Beverages', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(49, 23, 4, 16, 'Food  and Beverages', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(50, 23, 2, 17, 'Maintenance', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(51, 23, 3, 17, 'Maintenance', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(52, 23, 4, 17, 'Maintenance', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(56, 23, 2, 18, 'Radiology', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(57, 23, 3, 18, 'Radiology', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(58, 23, 4, 18, 'Radiology', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(62, 23, 2, 20, 'Laboratory', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(63, 23, 3, 20, 'Laboratory', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(64, 23, 4, 20, 'Laboratory', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(65, 23, 11, NULL, '0', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(66, 23, 11, NULL, '1', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(67, 23, 11, NULL, '2', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(68, 23, 11, NULL, '3', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(69, 23, 11, NULL, '4', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(70, 23, 11, NULL, '5', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(71, 23, 11, NULL, '6', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(72, 23, 11, NULL, '7', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(73, 23, 11, NULL, '8', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(74, 23, 11, NULL, '9', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(76, 23, 15, NULL, 'Enter your message here', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(77, 23, 16, NULL, 'Enter your message here', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(78, 23, 17, NULL, 'Enter your message here', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(79, 23, 12, 5, 'Billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(80, 23, 13, 5, 'Billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(81, 23, 14, 5, 'Billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(82, 23, 12, 8, 'Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(83, 23, 13, 8, 'Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(84, 23, 14, 8, 'Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(85, 23, 12, 10, 'Pharmacy', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(86, 23, 13, 10, 'Pharmacy', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(87, 23, 14, 10, 'Pharmacy', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(88, 23, 12, 15, 'Doctors', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(89, 23, 13, 15, 'Doctors', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(90, 23, 14, 15, 'Doctors', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(91, 23, 12, 16, 'Food And Beverage', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(92, 23, 13, 16, 'Food And Beverage', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(93, 23, 14, 16, 'Food And Beverage', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(94, 23, 12, 17, 'Maintenance', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(95, 23, 13, 17, 'Maintenance', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(96, 23, 14, 17, 'Maintenance', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(97, 23, 12, 18, 'Radiology', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(98, 23, 13, 18, 'Radiology', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(99, 23, 14, 18, 'Radiology', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(100, 23, 12, 20, 'Laboratory', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(101, 23, 13, 20, 'Laboratory', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(102, 23, 14, 20, 'Laboratory', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(103, 23, 11, NULL, '10', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(107, 23, 12, 21, 'Vizag-Billing 1', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(108, 23, 13, 21, 'Vizag-Billing 1', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(109, 23, 14, 21, 'Vizag-Billing 1', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(110, 23, 2, 22, 'Vizag-Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(111, 23, 3, 22, 'Vizag-Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(112, 23, 4, 22, 'Vizag-Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(113, 23, 12, 22, 'Vizag-Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(114, 23, 13, 22, 'Vizag-Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(115, 23, 14, 22, 'Vizag-Nursing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(116, 23, 2, 23, 'Vizag - billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(117, 23, 3, 23, 'Vizag - billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(118, 23, 4, 23, 'Vizag - billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(119, 23, 12, 23, 'Vizag - billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(120, 23, 13, 23, 'Vizag - billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(121, 23, 14, 23, 'Vizag - billing', '2022-04-01 12:30:00', '2022-04-01 12:30:00');

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

--
-- Dumping data for table `rating_of_departments`
--

INSERT INTO `rating_of_departments` (`id`, `person_id`, `rating`, `created_at`, `updated_at`, `department_name`, `department_id`, `organization_id`, `logged_user_id`, `survey_id`) VALUES
(9, 1, 4, '2022-03-24 15:39:11', '2022-03-24 15:39:11', 'Billing', 14, 23, 321, 1),
(10, 1, 4, '2022-03-24 15:39:11', '2022-03-24 15:39:11', 'Nursing', 31, 23, 321, 1),
(11, 2, 9, '2022-03-24 15:56:54', '2022-03-24 15:56:54', 'Nursing', 82, 23, 321, 3),
(12, 2, 9, '2022-03-24 15:56:54', '2022-03-24 15:56:54', 'Laboratory', 100, 23, 321, 3),
(13, 3, 7, '2022-03-25 16:25:35', '2022-03-25 16:25:35', 'Billing', 13, 23, 321, 1),
(14, 3, 7, '2022-03-25 16:25:35', '2022-03-25 16:25:35', 'Nursing', 27, 23, 321, 1),
(15, 3, 7, '2022-03-25 16:25:35', '2022-03-25 16:25:35', 'Pharmacy', 29, 23, 321, 1),
(16, 3, 7, '2022-03-25 16:25:35', '2022-03-25 16:25:35', 'Doctors', 45, 23, 321, 1),
(17, 3, 7, '2022-03-25 16:25:36', '2022-03-25 16:25:36', 'Food  and Beverages', 48, 23, 321, 1),
(18, 4, 8, '2022-03-25 16:32:06', '2022-03-25 16:32:06', 'Billing', 80, 23, 321, 3),
(19, 4, 8, '2022-03-25 16:32:06', '2022-03-25 16:32:06', 'Food And Beverage', 92, 23, 321, 3),
(20, 4, 8, '2022-03-25 16:32:06', '2022-03-25 16:32:06', 'Maintenance', 95, 23, 321, 3),
(21, 4, 8, '2022-03-25 16:32:06', '2022-03-25 16:32:06', 'Radiology', 98, 23, 321, 3),
(22, 4, 8, '2022-03-25 16:32:06', '2022-03-25 16:32:06', 'Laboratory', 101, 23, 321, 3),
(23, 5, 9, '2022-03-25 16:35:40', '2022-03-25 16:35:40', 'Doctors', 44, 23, 321, 1),
(24, 5, 9, '2022-03-25 16:35:40', '2022-03-25 16:35:40', 'Food  and Beverages', 47, 23, 321, 1),
(25, 6, 6, '2022-03-25 16:39:37', '2022-03-25 16:39:37', 'Billing', 14, 23, 321, 1),
(26, 6, 6, '2022-03-25 16:39:37', '2022-03-25 16:39:37', 'Pharmacy', 33, 23, 321, 1),
(27, 7, 5, '2022-03-25 16:52:18', '2022-03-25 16:52:18', 'Doctors', 46, 23, 321, 1),
(28, 10, 6, '2022-03-25 18:04:42', '2022-03-25 18:04:42', 'Doctors', 46, 23, 321, 1),
(29, 11, 5, '2022-03-28 11:53:04', '2022-03-28 11:53:04', 'Billing', 14, 23, 352, 1),
(30, 12, 6, '2022-03-28 11:58:02', '2022-03-28 11:58:02', 'Billing', 81, 23, 352, 3),
(31, 12, 6, '2022-03-28 11:58:02', '2022-03-28 11:58:02', 'Nursing', 84, 23, 352, 3),
(32, 13, 9, '2022-03-28 13:17:29', '2022-03-28 13:17:29', 'Nursing', 23, 23, 352, 1),
(33, 17, 5, '2022-03-29 12:27:12', '2022-03-29 12:27:12', 'Billing', 14, 23, 321, 1),
(34, 18, 4, '2022-03-29 15:38:38', '2022-03-29 15:38:38', 'Billing', 14, 23, 321, 1),
(35, 18, 4, '2022-03-29 15:38:38', '2022-03-29 15:38:38', 'Pharmacy', 33, 23, 321, 1),
(38, 19, 5, '2022-04-01 11:57:08', '2022-04-01 11:57:08', 'Billing', 14, 23, 321, 1),
(39, 19, 5, '2022-04-01 11:57:08', '2022-04-01 11:57:08', 'Nursing', 31, 23, 321, 1);

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
  `department_id` int(11) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_of_dep_activities`
--

INSERT INTO `rating_of_dep_activities` (`id`, `person_id`, `rating`, `created_at`, `updated_at`, `activity_name`, `activity_id`, `department_id`, `department_name`, `organization_id`, `logged_user_id`, `survey_id`) VALUES
(14, 1, 4, '2022-03-24 15:40:59', '2022-03-24 15:40:59', 'Room Clean', 6, 31, '', 23, 321, 1),
(15, 1, 4, '2022-03-24 15:40:59', '2022-03-24 15:40:59', 'Attitude', 9, 31, '', 23, 321, 1),
(16, 2, 9, '2022-03-24 15:57:03', '2022-03-24 15:57:03', 'Attitude', 9, 82, '', 23, 321, 3),
(17, 2, 9, '2022-03-24 15:57:03', '2022-03-24 15:57:03', 'Empathy', 25, 82, '', 23, 321, 3),
(31, 3, 7, '2022-03-25 16:29:50', '2022-03-25 16:29:50', 'Cost high', 7, 48, '', 23, 321, 1),
(32, 3, 7, '2022-03-25 16:29:50', '2022-03-25 16:29:50', 'No table clean', 8, 48, '', 23, 321, 1),
(33, 3, 7, '2022-03-25 16:29:50', '2022-03-25 16:29:50', 'Proper Cooked', 16, 48, '', 23, 321, 1),
(34, 3, 7, '2022-03-25 16:29:50', '2022-03-25 16:29:50', 'Quality and Test', 17, 48, '', 23, 321, 1),
(42, 4, 8, '2022-03-25 16:32:22', '2022-03-25 16:32:22', 'Poor Room Light', 21, 95, '', 23, 321, 3),
(43, 4, 8, '2022-03-25 16:32:22', '2022-03-25 16:32:22', 'Plumbing', 22, 95, '', 23, 321, 3),
(44, 4, 8, '2022-03-25 16:32:22', '2022-03-25 16:32:22', 'Any Other', 23, 95, '', 23, 321, 3),
(45, 6, 6, '2022-03-25 16:39:46', '2022-03-25 16:39:46', 'Late Billing', 11, 14, '', 23, 321, 1),
(46, 6, 6, '2022-03-25 16:39:46', '2022-03-25 16:39:46', 'Insurance Assistance', 15, 14, '', 23, 321, 1),
(49, 5, 9, '2022-03-25 16:40:01', '2022-03-25 16:40:01', 'Quality and Test', 17, 47, '', 23, 321, 1),
(50, 7, 5, '2022-03-25 16:52:23', '2022-03-25 16:52:23', 'Empathy', 27, 46, '', 23, 321, 1),
(51, 10, 6, '2022-03-25 18:05:10', '2022-03-25 18:05:10', 'Attitude', 12, 46, '', 23, 321, 1),
(52, 10, 6, '2022-03-25 18:05:10', '2022-03-25 18:05:10', 'Any Other', 28, 46, '', 23, 321, 1),
(53, 11, 5, '2022-03-28 11:53:17', '2022-03-28 11:53:17', 'Registration', 4, 14, '', 23, 352, 1),
(54, 11, 5, '2022-03-28 11:53:17', '2022-03-28 11:53:17', 'Final Bill', 5, 14, '', 23, 352, 1),
(57, 12, 6, '2022-03-28 11:58:22', '2022-03-28 11:58:22', 'Room Clean', 6, 84, '', 23, 352, 3),
(58, 12, 6, '2022-03-28 11:58:22', '2022-03-28 11:58:22', 'Attitude', 9, 84, '', 23, 352, 3),
(59, 13, 9, '2022-03-28 13:17:32', '2022-03-28 13:17:32', 'Attitude', 9, 23, '', 23, 352, 1),
(60, 17, 5, '2022-03-29 12:27:20', '2022-03-29 12:27:20', 'Registration', 4, 14, '', 23, 321, 1),
(61, 18, 4, '2022-03-29 15:38:44', '2022-03-29 15:38:44', 'Registration', 4, 14, '', 23, 321, 1),
(63, 19, 5, '2022-04-01 11:57:26', '2022-04-01 11:57:26', 'Room Clean', 6, 31, '', 23, 321, 1),
(64, 19, 5, '2022-04-01 11:57:26', '2022-04-01 11:57:26', 'Attitude', 9, 31, '', 23, 321, 1);

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
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT 0,
  `admin_user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `organization_id`, `admin_user_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 23, 321, 'Cardiology', '2022-03-28 07:04:00', '2022-03-31 07:18:33'),
(3, 23, 321, 'Radiology', '2022-03-28 07:04:21', '2022-03-31 07:18:39'),
(5, 23, 321, 'Diabetology', '2022-03-28 09:59:50', '2022-03-31 07:19:04'),
(6, 23, 321, 'Pediatrician', '2022-03-28 10:02:51', '2022-03-31 07:19:10'),
(7, 23, 321, 'Physician', '2022-03-28 10:08:03', '2022-03-31 07:19:15'),
(9, 36, 358, 'ENT', '2022-04-01 07:31:55', '2022-04-01 07:31:55'),
(10, 36, 358, 'Vascular surgery', '2022-04-01 07:32:55', '2022-04-01 07:32:55');

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
(1, 321, 'Pre Discharge', 'Tell us about your stay so far and help us improve our services', 'yes', '2022-04-01 08:05:24', '2022-04-01 13:35:24', 23),
(3, 321, 'Post Discharge', 'Tell us about your recent stay & treatment at Omni Hospitals and help us improve our services', 'yes', '2022-01-12 05:06:24', '2022-01-12 10:36:24', 23),
(7, 321, 'Pre Discharge', 'Tell us about your stay so far and help us improve our services', 'yes', '2022-04-04 00:32:49', '2022-04-04 00:32:49', 36),
(8, 321, 'Post Discharge', 'Tell us about your recent stay & treatment at Omni Hospitals and help us improve our servicesTell us about your recent stay & treatment at Omni Hospitals and help us improve our services', 'yes', '2022-04-04 00:32:32', '2022-04-04 00:32:32', 36);

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
  `department_activities` text DEFAULT NULL,
  `department_name_id` int(11) DEFAULT 0,
  `rating` int(11) DEFAULT NULL,
  `ticket_status` enum('opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back','closed_satisfied','closed_unsatisfied','patient_level_closure','process_level_closure') CHARACTER SET latin1 DEFAULT NULL,
  `ticket_remarks` text DEFAULT NULL,
  `process_level_closure` varchar(250) DEFAULT NULL,
  `category_process_level` char(30) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_answered`
--

INSERT INTO `survey_answered` (`id`, `survey_id`, `organization_id`, `logged_user_id`, `question_id`, `answerid`, `answeredby_person`, `department_activities`, `department_name_id`, `rating`, `ticket_status`, `ticket_remarks`, `process_level_closure`, `category_process_level`, `person_id`, `created_at`, `updated_at`) VALUES
(1, 1, 23, 321, 1, 5, '', NULL, 0, 4, 'phone_ringing_no_response', 'Phone ringing but customer not lift my call.', '', '', 1, '2022-03-24 10:48:25', '2022-03-24 16:18:25'),
(2, 1, 23, 321, 4, 14, '', NULL, 14, 4, 'phone_ringing_no_response', 'Phone ringing but customer not lift my call.', '', '', 1, '2022-03-24 10:48:25', '2022-03-24 16:18:25'),
(3, 1, 23, 321, 4, 31, '', NULL, 31, 4, 'phone_ringing_no_response', 'Phone ringing but customer not lift my call.', '', '', 1, '2022-03-24 10:48:25', '2022-03-24 16:18:25'),
(4, 1, 23, 321, 7, 14, 'Final Billing process taking delay', 'Registration,Final Bill', 14, 4, 'phone_ringing_no_response', 'Phone ringing but customer not lift my call.', '', '', 1, '2022-03-24 10:48:25', '2022-03-24 16:18:25'),
(5, 1, 23, 321, 7, 31, 'Waiting hall room is no clean', 'Room Clean,Attitude', 31, 4, 'phone_ringing_no_response', 'Phone ringing but customer not lift my call.', '', '', 1, '2022-03-24 10:48:25', '2022-03-24 16:18:25'),
(6, 1, 23, 321, 7, 21, '', '', 21, 4, 'phone_ringing_no_response', 'Phone ringing but customer not lift my call.', '', '', 1, '2022-03-24 10:48:25', '2022-03-24 16:18:25'),
(7, 3, 23, 321, 11, 0, '', NULL, 0, 9, NULL, NULL, NULL, NULL, 2, '2022-03-24 15:56:45', '2022-03-24 15:56:45'),
(8, 3, 23, 321, 12, 82, '', NULL, 82, 9, NULL, NULL, NULL, NULL, 2, '2022-03-24 15:56:54', '2022-03-24 15:56:54'),
(9, 3, 23, 321, 12, 100, '', NULL, 100, 9, NULL, NULL, NULL, NULL, 2, '2022-03-24 15:56:54', '2022-03-24 15:56:54'),
(10, 3, 23, 321, 15, 82, '', 'Attitude,Empathy', 82, 9, NULL, NULL, NULL, NULL, 2, '2022-03-24 15:57:03', '2022-03-24 15:57:03'),
(11, 3, 23, 321, 15, 100, 'Quick to give reports', '', 100, 9, NULL, NULL, NULL, NULL, 2, '2022-03-24 15:57:28', '2022-03-24 15:57:28'),
(12, 1, 23, 321, 1, 8, '', NULL, 0, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:25:23', '2022-03-25 16:25:23'),
(13, 1, 23, 321, 3, 13, '', NULL, 13, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:25:35', '2022-03-25 16:25:35'),
(14, 1, 23, 321, 3, 27, '', NULL, 27, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:25:35', '2022-03-25 16:25:35'),
(15, 1, 23, 321, 3, 29, '', NULL, 29, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:25:35', '2022-03-25 16:25:35'),
(16, 1, 23, 321, 3, 45, '', NULL, 45, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:25:35', '2022-03-25 16:25:35'),
(17, 1, 23, 321, 3, 48, '', NULL, 48, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:25:35', '2022-03-25 16:25:35'),
(18, 1, 23, 321, 6, 13, 'testing billing', 'Registration,Final Bill,Late Billing,Wrong Billing,Any Other', 13, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:26:24', '2022-03-25 16:26:24'),
(19, 1, 23, 321, 6, 27, 'testing nursing', 'Room Clean,Attitude,Medicine Administration,Proper Communication', 27, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:27:06', '2022-03-25 16:27:06'),
(20, 1, 23, 321, 6, 29, 'nice', '', 29, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:29:04', '2022-03-25 16:29:04'),
(21, 1, 23, 321, 6, 45, 'Good concern for patients', 'Attitude,Counselling,Empathy,Any Other', 45, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:29:24', '2022-03-25 16:29:24'),
(22, 1, 23, 321, 6, 48, 'make some  hygeine food', 'Cost high,No table clean,Proper Cooked,Quality and Test', 48, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:29:50', '2022-03-25 16:29:50'),
(23, 1, 23, 321, 6, 21, '', '', 21, 7, NULL, NULL, NULL, NULL, 3, '2022-03-25 16:29:57', '2022-03-25 16:29:57'),
(24, 3, 23, 321, 11, 0, '', NULL, 0, 8, NULL, NULL, NULL, NULL, 4, '2022-03-25 16:31:59', '2022-03-25 16:31:59'),
(25, 3, 23, 321, 13, 80, '', NULL, 80, 8, NULL, NULL, NULL, NULL, 4, '2022-03-25 16:32:06', '2022-03-25 16:32:06'),
(26, 3, 23, 321, 13, 92, '', NULL, 92, 8, NULL, NULL, NULL, NULL, 4, '2022-03-25 16:32:06', '2022-03-25 16:32:06'),
(27, 3, 23, 321, 13, 95, '', NULL, 95, 8, NULL, NULL, NULL, NULL, 4, '2022-03-25 16:32:06', '2022-03-25 16:32:06'),
(28, 3, 23, 321, 13, 98, '', NULL, 98, 8, NULL, NULL, NULL, NULL, 4, '2022-03-25 16:32:06', '2022-03-25 16:32:06'),
(29, 3, 23, 321, 13, 101, '', NULL, 101, 8, NULL, NULL, NULL, NULL, 4, '2022-03-25 16:32:06', '2022-03-25 16:32:06'),
(30, 3, 23, 321, 16, 80, '', 'Late Billing,Wrong Billing,Any Other', 80, 8, NULL, NULL, NULL, NULL, 4, '2022-03-25 16:32:11', '2022-03-25 16:32:11'),
(31, 3, 23, 321, 16, 92, '', 'Proper Cooked,Quality and Test,Delay Serving,Hygiene', 92, 8, NULL, NULL, NULL, NULL, 4, '2022-03-25 16:32:17', '2022-03-25 16:32:17'),
(32, 3, 23, 321, 16, 95, '', 'Poor Room Light,Plumbing,Any Other', 95, 8, NULL, NULL, NULL, NULL, 4, '2022-03-25 16:32:22', '2022-03-25 16:32:22'),
(33, 3, 23, 321, 16, 98, 'erty', '', 98, 8, NULL, NULL, NULL, NULL, 4, '2022-03-25 16:32:26', '2022-03-25 16:32:26'),
(34, 3, 23, 321, 16, 101, 'werty', '', 101, 8, NULL, NULL, NULL, NULL, 4, '2022-03-25 16:32:29', '2022-03-25 16:32:29'),
(35, 1, 23, 321, 1, 10, '', NULL, 0, 9, NULL, NULL, NULL, NULL, 5, '2022-03-25 16:35:29', '2022-03-25 16:35:29'),
(36, 1, 23, 321, 2, 44, '', NULL, 44, 9, NULL, NULL, NULL, NULL, 5, '2022-03-25 16:35:40', '2022-03-25 16:35:40'),
(37, 1, 23, 321, 2, 47, '', NULL, 47, 9, NULL, NULL, NULL, NULL, 5, '2022-03-25 16:35:40', '2022-03-25 16:35:40'),
(38, 1, 23, 321, 1, 7, '', NULL, 0, 6, 'opened', NULL, NULL, NULL, 6, '2022-03-25 16:39:13', '2022-03-25 16:39:13'),
(39, 1, 23, 321, 4, 14, '', NULL, 14, 6, 'opened', NULL, NULL, NULL, 6, '2022-03-25 16:39:37', '2022-03-25 16:39:37'),
(40, 1, 23, 321, 4, 33, '', NULL, 33, 6, 'opened', NULL, NULL, NULL, 6, '2022-03-25 16:39:37', '2022-03-25 16:39:37'),
(41, 1, 23, 321, 7, 14, '', 'Late Billing,Insurance Assistance', 14, 6, 'opened', NULL, NULL, NULL, 6, '2022-03-25 16:39:46', '2022-03-25 16:39:46'),
(42, 1, 23, 321, 5, 44, 'Physicians should be personable, great listeners, and empathetic to the concerns of their patients', 'Attitude,Counselling', 44, 9, NULL, NULL, NULL, NULL, 5, '2022-03-25 16:39:46', '2022-03-25 16:39:46'),
(43, 1, 23, 321, 5, 47, 'Quality is good', 'Quality and Test', 47, 9, NULL, NULL, NULL, NULL, 5, '2022-03-25 16:40:01', '2022-03-25 16:40:01'),
(44, 1, 23, 321, 5, 21, '', '', 21, 9, NULL, NULL, NULL, NULL, 5, '2022-03-25 16:40:04', '2022-03-25 16:40:04'),
(45, 1, 23, 321, 7, 33, 'too much delay', '', 33, 6, 'opened', NULL, NULL, NULL, 6, '2022-03-25 16:40:31', '2022-03-25 16:40:31'),
(46, 1, 23, 321, 1, 6, '', NULL, 0, 5, 'opened', NULL, NULL, NULL, 7, '2022-03-25 16:52:08', '2022-03-25 16:52:08'),
(47, 1, 23, 321, 4, 46, '', NULL, 46, 5, 'opened', NULL, NULL, NULL, 7, '2022-03-25 16:52:18', '2022-03-25 16:52:18'),
(48, 1, 23, 321, 7, 46, 'Test Entry', 'Empathy', 46, 5, 'opened', NULL, NULL, NULL, 7, '2022-03-25 11:41:31', '2022-03-25 11:41:31'),
(49, 1, 23, 321, 7, 21, '', '', 21, 5, 'opened', NULL, NULL, NULL, 7, '2022-03-25 16:52:27', '2022-03-25 16:52:27'),
(50, 1, 23, 321, 1, 7, '', NULL, 0, 6, 'opened', NULL, NULL, NULL, 10, '2022-03-25 18:04:31', '2022-03-25 18:04:31'),
(51, 1, 23, 321, 4, 46, '', NULL, 46, 6, 'opened', NULL, NULL, NULL, 10, '2022-03-25 18:04:42', '2022-03-25 18:04:42'),
(52, 1, 23, 321, 7, 46, 'Was not willing to answer my questions', 'Attitude,Any Other', 46, 6, 'opened', NULL, NULL, NULL, 10, '2022-03-25 18:05:10', '2022-03-25 18:05:10'),
(53, 1, 23, 352, 1, 6, '', NULL, 0, 5, 'opened', NULL, NULL, NULL, 11, '2022-03-28 11:52:59', '2022-03-28 11:52:59'),
(54, 1, 23, 352, 4, 14, '', NULL, 14, 5, 'opened', NULL, NULL, NULL, 11, '2022-03-28 11:53:04', '2022-03-28 11:53:04'),
(55, 1, 23, 352, 7, 14, 'Bill process taking long', 'Registration,Final Bill', 14, 5, 'opened', NULL, NULL, NULL, 11, '2022-03-28 11:53:17', '2022-03-28 11:53:17'),
(56, 1, 23, 352, 7, 21, '', '', 21, 5, 'opened', NULL, NULL, NULL, 11, '2022-03-28 11:53:19', '2022-03-28 11:53:19'),
(57, 3, 23, 352, 11, 0, '', NULL, 0, 6, 'opened', NULL, NULL, NULL, 12, '2022-03-28 11:57:58', '2022-03-28 11:57:58'),
(58, 3, 23, 352, 14, 81, '', NULL, 81, 6, 'opened', NULL, NULL, NULL, 12, '2022-03-28 11:58:02', '2022-03-28 11:58:02'),
(59, 3, 23, 352, 14, 84, '', NULL, 84, 6, 'opened', NULL, NULL, NULL, 12, '2022-03-28 11:58:02', '2022-03-28 11:58:02'),
(60, 3, 23, 352, 17, 81, 'Testing', 'Registration,Late Billing', 81, 6, 'opened', NULL, NULL, NULL, 12, '2022-03-28 11:58:09', '2022-03-28 11:58:09'),
(61, 3, 23, 352, 17, 84, 'Testing', 'Room Clean,Attitude', 84, 6, 'opened', NULL, NULL, NULL, 12, '2022-03-28 11:58:22', '2022-03-28 11:58:22'),
(62, 3, 23, 352, 17, 21, '', '', 21, 6, 'opened', NULL, NULL, NULL, 12, '2022-03-28 11:58:25', '2022-03-28 11:58:25'),
(63, 1, 23, 352, 1, 10, '', NULL, 0, 9, NULL, NULL, NULL, NULL, 13, '2022-03-28 13:17:25', '2022-03-28 13:17:25'),
(64, 1, 23, 352, 2, 23, '', NULL, 23, 9, NULL, NULL, NULL, NULL, 13, '2022-03-28 13:17:29', '2022-03-28 13:17:29'),
(65, 1, 23, 352, 5, 23, 'Testing', 'Attitude', 23, 9, NULL, NULL, NULL, NULL, 13, '2022-03-28 07:50:03', '2022-03-28 07:50:03'),
(66, 1, 23, 352, 5, 21, '', '', 21, 9, NULL, NULL, NULL, NULL, 13, '2022-03-28 13:17:35', '2022-03-28 13:17:35'),
(67, 1, 23, 321, 1, 6, '', NULL, 0, 5, 'opened', NULL, NULL, NULL, 17, '2022-03-29 12:27:09', '2022-03-29 12:27:09'),
(68, 1, 23, 321, 4, 14, '', NULL, 14, 5, 'opened', NULL, NULL, NULL, 17, '2022-03-29 12:27:12', '2022-03-29 12:27:12'),
(69, 1, 23, 321, 7, 14, 'NA', 'Registration', 14, 5, 'opened', NULL, NULL, NULL, 17, '2022-03-29 12:27:20', '2022-03-29 12:27:20'),
(70, 1, 23, 321, 7, 21, '', '', 21, 5, 'opened', NULL, NULL, NULL, 17, '2022-03-29 12:27:23', '2022-03-29 12:27:23'),
(71, 1, 23, 321, 1, 5, '', NULL, 0, 4, 'opened', NULL, NULL, NULL, 18, '2022-03-29 15:38:34', '2022-03-29 15:38:34'),
(72, 1, 23, 321, 4, 14, '', NULL, 14, 4, 'opened', NULL, NULL, NULL, 18, '2022-03-29 15:38:38', '2022-03-29 15:38:38'),
(73, 1, 23, 321, 4, 33, '', NULL, 33, 4, 'opened', NULL, NULL, NULL, 18, '2022-03-29 15:38:38', '2022-03-29 15:38:38'),
(74, 1, 23, 321, 7, 14, 'NA', 'Registration', 14, 4, 'opened', NULL, NULL, NULL, 18, '2022-03-29 15:38:44', '2022-03-29 15:38:44'),
(75, 1, 23, 321, 7, 33, 'NA', '', 33, 4, 'opened', NULL, NULL, NULL, 18, '2022-03-29 15:38:49', '2022-03-29 15:38:49'),
(76, 1, 23, 321, 7, 21, '', '', 21, 4, 'opened', NULL, NULL, NULL, 18, '2022-03-29 15:38:58', '2022-03-29 15:38:58'),
(77, 1, 23, 321, 1, 6, '', NULL, 0, 5, 'connected_asked_for_call_back', 'Call back', '', '', 19, '2022-04-01 06:28:07', '2022-04-01 11:58:07'),
(80, 1, 23, 321, 4, 14, '', NULL, 14, 5, 'connected_asked_for_call_back', 'Call back', '', '', 19, '2022-04-01 06:28:07', '2022-04-01 11:58:07'),
(81, 1, 23, 321, 4, 31, '', NULL, 31, 5, 'connected_asked_for_call_back', 'Call back', '', '', 19, '2022-04-01 06:28:07', '2022-04-01 11:58:07'),
(82, 1, 23, 321, 7, 14, 'Testing', 'Registration', 14, 5, 'connected_asked_for_call_back', 'Call back', '', '', 19, '2022-04-01 06:28:07', '2022-04-01 11:58:07'),
(83, 1, 23, 321, 7, 31, 'Testing', 'Room Clean,Attitude', 31, 5, 'connected_asked_for_call_back', 'Call back', '', '', 19, '2022-04-01 06:28:07', '2022-04-01 11:58:07'),
(84, 1, 23, 321, 7, 21, '', '', 21, 5, 'connected_asked_for_call_back', 'Call back', '', '', 19, '2022-04-01 06:28:07', '2022-04-01 11:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `survey_persons`
--

CREATE TABLE `survey_persons` (
  `id` int(11) NOT NULL,
  `ticket_series_number` int(11) DEFAULT NULL,
  `ticker_final_number` varchar(50) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobile` varchar(150) DEFAULT NULL,
  `gender` char(10) DEFAULT NULL,
  `bed_name` varchar(100) DEFAULT NULL,
  `uhid` varchar(100) DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `ward_id` int(11) DEFAULT NULL,
  `inpatient_id` varchar(50) DEFAULT NULL,
  `feedback_date` date DEFAULT NULL,
  `feedback_was_givenby` char(30) DEFAULT NULL,
  `patient_attender_name` varchar(200) DEFAULT NULL,
  `know_about_hospital` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `organization_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_persons`
--

INSERT INTO `survey_persons` (`id`, `ticket_series_number`, `ticker_final_number`, `survey_id`, `rating`, `firstname`, `lastname`, `email`, `mobile`, `gender`, `bed_name`, `uhid`, `discharge_date`, `doctor_id`, `ward_id`, `inpatient_id`, `feedback_date`, `feedback_was_givenby`, `patient_attender_name`, `know_about_hospital`, `created_at`, `updated_at`, `organization_id`, `logged_user_id`) VALUES
(1, 1, '#2201', 1, 0, 'Venkat0337', NULL, 'venkat.0337@deepredink.com', '9052691535', 'male', 'B-01', 'UHID-01', '2022-03-30', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-24 15:38:59', '2022-03-24 15:38:59', 23, 321),
(2, 2, '#2202', 3, 0, 'Ranjith R', NULL, 'ranjith.ram@gmail.com', '9885047096', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-24 15:55:22', '2022-03-24 15:55:22', 23, 321),
(3, 3, '#2203', 1, 0, 'lakshmi priya', NULL, 'priya@deepredink.com', '8975623154', 'female', 'dfghj', 'asdfgm', '2022-03-31', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-25 16:25:14', '2022-03-25 16:25:14', 23, 321),
(4, 4, '#2204', 3, 0, 'Devi Prasanna', NULL, 'prasannavalluri@gmail.com', '8767890876', 'female', 'werty', 'werty', '2022-03-29', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-25 16:31:54', '2022-03-25 16:31:54', 23, 321),
(5, 5, '#2205', 1, 0, 'Naresh', NULL, 'Naresh@gmail.com', '8989898989', 'male', 'B-03', '123-01', '2022-03-27', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-25 16:35:24', '2022-03-25 16:35:24', 23, 321),
(6, 6, '#2206', 1, 0, 'jayaraju', NULL, 'jayaraju@deepredink.com', '9700334319', 'male', 'GW45147', 'UHID787458', '2022-03-31', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-25 16:39:02', '2022-03-25 16:39:02', 23, 321),
(7, 7, '#2207', 1, 0, 'Raghav Chadda', NULL, 'raghavc@deepredink.com', '9885047096', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-25 16:49:28', '2022-03-25 16:49:28', 23, 321),
(8, 8, '#2208', 1, 0, 'lakshmi priya', NULL, 'priya@deepredink.com', '8975623154', 'female', 'dfghj', 'asdfgm', '2022-03-31', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-25 17:23:05', '2022-03-25 17:23:05', 23, 321),
(9, 9, '#2209', 1, 0, 'lakshmi priya', NULL, 'priya@deepredink.com', '8975623154', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-25 17:26:39', '2022-03-25 17:26:39', 23, 321),
(10, 10, '#2210', 1, 0, 'Kishore Kumar', NULL, 'kishore@deepredink.com', '9888991223', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-25 17:57:24', '2022-03-25 17:57:24', 23, 321),
(11, 11, '#2211', 1, 0, 'Test Executive Feedback', NULL, 'executive@gmail.com', '9052697845', 'male', 'B-01', 'U-01', '2022-03-24', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-28 11:52:48', '2022-03-28 11:52:48', 23, 352),
(12, 12, '#2212', 3, 0, 'Test Executive Feedback -2', NULL, 'venkat@deepredink.com', '9090909099', 'male', 'B-01', 'U-01', '2022-03-26', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-28 11:57:53', '2022-03-28 11:57:53', 23, 352),
(13, 13, '#2213', 1, 0, 'Exective-4', NULL, 'executive4@gmail.com', '9898989898', 'male', 'B-01', 'U-01', '2022-04-02', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-28 13:17:21', '2022-03-28 13:17:21', 23, 352),
(14, 14, '#2214', 1, 0, 'Test at 0249', NULL, 'testat0249@gmail.com', '9052691535', 'male', NULL, 'U-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-28 14:49:34', '2022-03-28 14:49:34', 23, 321),
(15, 15, '#2215', 1, 0, 'Test at 0249', NULL, 'testat0249@gmail.com', '9052691535', 'male', NULL, 'U-01', NULL, 7, 2, NULL, NULL, NULL, NULL, 0, '2022-03-28 14:51:08', '2022-03-28 14:51:08', 23, 321),
(16, 16, '#2216', 1, 0, 'Test 0339', NULL, 'test0339@gmail.com', '9052691545', 'male', 'B-01', 'U-01', '2022-03-30', 7, 2, 'IP-01', NULL, NULL, NULL, 0, '2022-03-28 15:41:08', '2022-03-28 15:41:08', 23, 321),
(17, 17, '#2217', 1, 0, 'Test2903', NULL, 'Test2903@gmail.com', '9052697845', 'male', NULL, 'U-01', '2022-03-31', 9, NULL, 'IP-01', '2022-03-29', NULL, NULL, 0, '2022-03-29 12:27:03', '2022-03-29 12:27:03', 23, 321),
(18, 18, '#2218', 1, 0, 'Venkat 039', NULL, 'venkat039@gmail.com', '9052691535', 'male', 'B-01', 'U-01', '2022-03-29', 9, 2, 'IP-01', '2022-03-29', NULL, NULL, 0, '2022-03-29 15:38:29', '2022-03-29 15:38:29', 23, 321),
(19, 1, '#2201', 1, 5, '1156testfeedback', NULL, '1156testfeedback@gmail.com', '9052697845', 'male', 'B-01', 'U-01', '2022-04-01', 9, 2, 'IP-01', '2022-04-01', 'patient', NULL, 1, '2022-04-01 06:27:03', '2022-04-01 06:27:03', 23, 321),
(20, 0, '', 1, 0, 'Venkat - Kukatpally', NULL, 'venkatkukatpally@gmail.com', '9052691554', 'male', 'B-01', 'U-01', '2022-04-01', 7, 2, 'IP-01', '2022-04-01', 'patient', NULL, 1, '2022-04-01 18:10:12', '2022-04-01 18:10:12', 23, 321);

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
  `category_process_level` char(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_status_response_logs`
--

INSERT INTO `update_status_response_logs` (`id`, `person_id`, `logged_user_id`, `organization_id`, `survey_id`, `ticket_status`, `ticket_remarks`, `process_level_closure`, `category_process_level`, `created_at`, `updated_at`) VALUES
(1, 1, 321, 23, 1, 'phone_ringing_no_response', 'Phone ringing but customer not lift my call.', '', '', '2022-03-24 10:14:57', '2022-03-24 10:14:57'),
(2, 1, 321, 23, 1, 'phone_ringing_no_response', 'Phone ringing but customer not lift my call.', '', '', '2022-03-24 10:48:25', '2022-03-24 10:48:25'),
(3, 19, 321, 23, 1, 'connected_asked_for_call_back', 'Call back', '', '', '2022-04-01 06:28:07', '2022-04-01 06:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT 0,
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
(11, 0, NULL, NULL, 6, NULL, 'admin@nps.com', '$2y$10$kweucu9H/5FY4fCnuaHVEee20DvM27FvD9LpzDo4UgyklO6ioxWOi', '123456', '9090909090', 'india', 'Telangana', 'hyderabad', 'MALANI EXCEL,10-3-150 & 151, 4th floor, St. John\'s Road,\r\nBeside Ratnadeep Supermarket,Beside Ratnadeep Supermarket,', 'Incor', NULL, NULL, '500026', 'Male', '61a852217e298_1638421025.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0rbAKk0tuVnlCNfqcJmrjRqWukDnRFMJLinhYAIFfR8A9XxIdr5MI6XG9H9E', '2021-07-02 01:33:40', '2021-10-25 14:35:03', '2021-09-28 07:53:01', 0),
(317, 21, NULL, NULL, 2, NULL, 'sads@deepredink.com', '$2y$10$7AS3byAR87DBLClRGMjEu.Th7YHE6RxFaIIxnXOW8fS7UcLVVZQR2', 'hyeD1p66', '988345678', NULL, NULL, NULL, NULL, 'Aditya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.104.149', '0', NULL, '2021-12-01 17:14:08', '2021-12-01 17:14:08', '2021-12-01 12:14:08', 1),
(318, 22, NULL, NULL, 2, NULL, 'amazon@gmail.com', '$2y$10$m2FL.05H3fFwwZHV85apB.xP5vwJSEOgMxerHd7lC2ix2gjG7fUQ6', 'h1j7sMnC', '9700334319', NULL, NULL, NULL, NULL, 'amazon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.211.207', '0', NULL, '2021-12-01 17:39:47', '2021-12-01 17:39:47', '2021-12-01 12:39:47', 1),
(321, 23, NULL, 344, 2, NULL, 'omni@incor.in', '$2y$10$DX4jVt5OQsNwq4uJ799hJ.2OT/6HjQOhjdy0/V74iThMuetzvcLgW', '9OUlXBR0', '9700334152', NULL, NULL, NULL, NULL, 'Abdullah Saleem', NULL, NULL, NULL, NULL, '61ce925f051ec_1640927839.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.208.26', '0', NULL, '2021-12-02 09:45:18', '2021-12-02 09:45:18', '2021-12-02 04:45:18', 1),
(337, 28, NULL, NULL, 2, NULL, 'venkat1@deepredink.com', '$2y$10$ZOY2w4UcqqyVqXJGmKFStOnkXq6rfjSBUTb9jajoSi5yawNHmqoay', 'awwJ2Fvx', '9052691535', NULL, NULL, NULL, NULL, 'K Venkat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.206.59.123', '0', NULL, '2021-12-14 07:23:05', '2021-12-14 07:23:05', '2021-12-14 02:23:05', 1),
(344, 23, 0, 0, 6, NULL, 'ddr.vasudev@omnihospitals.in', '$2y$10$3rk9ak1eUP0OpY0kRNq7feS4fqjeSMD2CUEjrtm6kOqOrOsslydzO', '7aNSRgGV', '9885047096', NULL, NULL, NULL, NULL, 'Dr. B Vasudev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2021-12-31 10:59:53', '2022-01-04 13:36:43', '2022-01-04 13:36:43', 1),
(345, 23, 0, 344, 5, NULL, 'sailakshmi.nallamilli@gmail.com', '$2y$10$YCx2olENog.z6/1IL2kOV.JNiP68uagHtWqoycmO0IahovRNm3k7u', 'idANYObb', '9676193777', NULL, NULL, NULL, NULL, 'Dr. Waris', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '157.47.62.38', '1', NULL, '2021-12-31 11:00:23', '2022-03-29 12:33:35', '2022-03-29 12:33:35', 1),
(346, 23, 8, 345, 3, NULL, 'ranjith.ram@gmail.com', '$2y$10$SFJTWrFi05fgX.1/xRCF/eX0yteC2F7jLgiOH/jPZir7O17fg18GS', '23gZrp6h', '9705423333', NULL, NULL, NULL, NULL, 'Ms Rajeshwari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2021-12-31 11:01:04', '2022-01-04 13:40:14', '2022-01-04 13:40:14', 1),
(347, 23, 5, 349, 3, NULL, 'sshivakumar@omnihospitals.in', '$2y$10$8c9nGNH7zzvDj/LmWu.9NOFmpQd1gBMLJTh8OyRPmUO2Z6kZVm602', '4XF1zngO', '9100929081', NULL, NULL, NULL, NULL, 'Mr. Shivakumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2021-12-31 11:04:30', '2022-01-04 13:44:38', '2022-01-04 13:44:38', 1),
(348, 23, 5, 349, 3, NULL, 'dkukatpallymaintenance@omnihospitals.in', '$2y$10$ym7fn63Fh6idiwmmLZTgtO2yDUbDLT1sN8DXMkRBp.2tzYEhJBGS2', 'j6wZB2tf', '9100961167', NULL, NULL, NULL, NULL, 'Mr. Ashok Kiran Kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-04 05:23:26', '2022-01-04 13:49:56', '2022-01-04 13:49:56', 1),
(349, 23, 5, 345, 3, NULL, 'abdullahs@incor.in', '$2y$10$MhgS5PHx8rMCE4QgZWFMD.WqJ1TAP0KQTWRI7LIvOLvcn.4ux84Gu', 'RML6mqd1', '860099081', NULL, NULL, NULL, NULL, 'Abdullah Saleem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-04 13:42:51', '2022-01-11 17:40:22', '2022-01-11 17:40:22', 1),
(350, 23, 20, 345, 3, NULL, 'dkukatpallylab@omnihospitals.in', '$2y$10$uwtz1IXY8NZ9iD43vxBJM.U5a40MFDY3pY/gkLlXaFmwwKG4CHunW', 'WANES9lJ', '9100442771', NULL, NULL, NULL, NULL, 'Mr. Arun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-04 13:53:51', '2022-01-04 13:53:51', '2022-01-04 13:53:51', 1),
(351, 23, 18, 345, 3, NULL, 'no@email.com', '$2y$10$oS91iL4GsttzY0yCw/ZYL.JWXIShVokpjd6nR7NpQcj8OD07j.N8.', 'ss49l35H', '9676799400', NULL, NULL, NULL, NULL, 'Dr. Harish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-04 13:57:53', '2022-01-04 13:57:53', '2022-01-04 13:57:53', 1),
(352, 23, 5, 349, 4, NULL, 'sailakshmi.nallamilli@incor.in', '$2y$10$8HKegE/y2/.LuzeYawsGnuqLIRA5npAQwWLqAyCv0YtmMt6YdXmwm', 'sAilakshmi@9', '860099081', NULL, NULL, NULL, NULL, 'Sailakshmi N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-07 16:59:26', '2022-01-07 17:33:19', '2022-01-07 17:33:19', 1),
(353, 23, 15, 345, 3, NULL, 'naveen_chandra@gmail.com', '$2y$10$p05q3miXPLSoIbu/23ZZr.rnxOdlMSDEoT80fxp7vZEZE1RZx27rG', 'E1Xz8vkS', '9898989898', NULL, NULL, NULL, NULL, 'Naveen Chandra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '157.47.62.38', '1', NULL, '2022-03-25 17:00:14', '2022-03-29 12:36:08', '2022-03-29 12:36:08', 1),
(354, 23, 0, 344, 5, NULL, 'omnikurnool@gmail.com', '$2y$10$NF0BVHrJ8zIQY49013ZZiuEcilNfNm8fiREScd1l6.bEY9W3fz0Fm', '5UgKlW5Z', '9052697845', NULL, NULL, NULL, NULL, 'Omni kurnool', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '157.47.62.38', '1', NULL, '2022-03-29 12:34:50', '2022-03-29 12:34:50', '2022-03-29 12:34:50', 1),
(355, 23, 0, 344, 5, NULL, 'omnikukatpally@gmail.com', '$2y$10$y4lCVYkhy/YdDibW8h5zS.KLQ6X4CmKiE37VqkzGI7EUaw6eaYRuS', '87ouQF7b', '9052691524', NULL, NULL, NULL, NULL, 'Omni kukatpally', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '157.47.62.38', '1', NULL, '2022-03-29 12:35:48', '2022-03-29 12:35:48', '2022-03-29 12:35:48', 1),
(356, 23, 0, 344, 6, NULL, 'coo@incor.in', '$2y$10$kweucu9H/5FY4fCnuaHVEee20DvM27FvD9LpzDo4UgyklO6ioxWOi', '123456', '9052691524', NULL, NULL, NULL, NULL, 'Omni COO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '157.47.62.38', '1', NULL, '2022-03-29 12:35:48', '2022-03-29 12:35:48', '2022-03-29 12:35:48', 1),
(358, 36, NULL, NULL, 2, NULL, 'omnivizag@incor.in', '$2y$10$uczwZkL2HvpR5Usmbu3X8OAGr63Q9/oRa1v4HLwJ3e7kXpvUTnvNS', '4VmA0m1j', '8888001001', NULL, NULL, NULL, NULL, 'omni vizag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106.195.74.138', '0', NULL, '2022-03-29 18:12:02', '2022-03-29 18:12:02', '2022-03-29 18:12:02', 1),
(359, 37, NULL, NULL, 2, NULL, 'omnikothapet@incor.in', '$2y$10$MA8bJ6Z5X112K1cpigYyDeC9fCT5NOwrzJ9P85VVqJldSZuu0dhXK', 'BzhihtvK', '8096369999', NULL, NULL, NULL, NULL, 'omni kothapet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.104.149', '0', NULL, '2022-03-29 18:38:53', '2022-03-29 18:38:53', '2022-03-29 18:38:53', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `admin_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `organization_id`, `name`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(2, 23, 'General', 321, '2022-03-28 07:57:25', '2022-04-01 13:10:09'),
(3, 23, 'Pediatrician', 321, '2022-03-28 07:57:38', '2022-03-31 07:19:29'),
(5, 36, 'OP ward', 358, '2022-04-01 07:41:27', '2022-04-01 07:41:27');

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
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
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
-- Indexes for table `persons_voice_message`
--
ALTER TABLE `persons_voice_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processes`
--
ALTER TABLE `processes`
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
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
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
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `passing_departments`
--
ALTER TABLE `passing_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persons_voice_message`
--
ALTER TABLE `persons_voice_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `processes`
--
ALTER TABLE `processes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `rating_of_departments`
--
ALTER TABLE `rating_of_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rating_of_dep_activities`
--
ALTER TABLE `rating_of_dep_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `survey_answered`
--
ALTER TABLE `survey_answered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `survey_persons`
--
ALTER TABLE `survey_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `themeoptions`
--
ALTER TABLE `themeoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `update_status_response_logs`
--
ALTER TABLE `update_status_response_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
