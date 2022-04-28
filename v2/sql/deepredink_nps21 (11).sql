-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2022 at 02:10 AM
-- Server version: 10.3.34-MariaDB
-- PHP Version: 7.4.28

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
(1, 23, NULL, 'radio', 'gender', 'Gender', NULL, NULL, NULL, 'yes', '2021-12-24 03:01:15', '2021-12-24 03:01:15'),
(2, 36, NULL, 'radio', 'gender', 'Gender', NULL, NULL, NULL, 'yes', '2021-12-24 03:01:15', '2021-12-24 03:01:15');

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
(16, 23, 'Food and Beverages', 'on', '2022-04-19 02:27:20', '2022-04-19 02:27:20'),
(17, 23, 'Maintenance', 'on', '2021-12-15 12:44:24', '2021-12-15 12:44:24'),
(18, 23, 'Radiology', 'on', '2022-01-04 08:20:58', '2022-01-04 13:50:58'),
(20, 23, 'Laboratory', 'on', '2022-01-04 08:21:13', '2022-01-04 08:21:13'),
(22, 36, 'Nursing', 'on', '2022-04-04 06:40:33', '2022-04-04 06:40:33'),
(23, 36, 'Billing', 'on', '2022-04-04 06:40:40', '2022-04-04 06:40:40');

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
(12, 36, 358, 10, 'DR. L Venkatesh', '2022-04-01 07:38:09', '2022-04-04 08:40:09');

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
(23, 'OMNI Kukatpally', 'yes', 'Omni - Kukatpally', NULL, 'https://www.google.com/s2/favicons?domain=omnihospitals.in', 'kukatpally.png', 'omni-kukatpally', 'Kukataplly road no 12', 'near BJP Office', '500086', 'Hyderabad', 'india', '05ABDCE1234F1Z2', 'Kukataplly road no 12', 'near JNTU', '500086', 'Hyderabad', 'india', 'Abdullah Saleem1', 'omni@incor.in', '9700334152', '98745654135', 2, '9jGEzxdJ', '2021-12-16', '1', '4', 'yes', '2022-04-12 08:23:25', '2022-04-12 13:53:25'),
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
(1, 1, 143, 'passed', 7, '2022-04-04 06:45:54', '2022-04-04 06:45:54', 0),
(2, 1, 154, 'no', 7, '2022-04-04 12:15:46', '2022-04-04 12:15:46', 30),
(3, 2, 14, 'passed', 1, '2022-04-04 06:46:43', '2022-04-04 06:46:43', 0),
(4, 2, 49, 'passed', 1, '2022-04-04 06:47:08', '2022-04-04 06:47:08', 1),
(5, 2, 21, 'passed', 1, '2022-04-04 06:47:11', '2022-04-04 06:47:11', 30),
(6, 3, 144, 'passed', 7, '2022-04-04 06:50:37', '2022-04-04 06:50:37', 0),
(7, 3, 154, 'no', 7, '2022-04-04 12:20:30', '2022-04-04 12:20:30', 30),
(8, 4, 93, 'passed', 3, '2022-04-04 06:55:55', '2022-04-04 06:55:55', 0),
(9, 4, 21, 'passed', 3, '2022-04-04 06:56:17', '2022-04-04 06:56:17', 30),
(10, 5, 144, 'passed', 7, '2022-04-04 06:56:41', '2022-04-04 06:56:41', 0),
(11, 5, 150, 'passed', 7, '2022-04-04 06:57:01', '2022-04-04 06:57:01', 1),
(12, 5, 154, 'no', 7, '2022-04-04 12:26:27', '2022-04-04 12:26:27', 30),
(13, 6, 33, 'passed', 1, '2022-04-04 06:59:10', '2022-04-04 06:59:10', 0),
(14, 6, 21, 'passed', 1, '2022-04-04 06:59:13', '2022-04-04 06:59:13', 30),
(15, 7, 46, 'passed', 1, '2022-04-04 07:00:53', '2022-04-04 07:00:53', 0),
(16, 7, 21, 'passed', 1, '2022-04-04 07:01:49', '2022-04-04 07:01:49', 30),
(17, 8, 81, 'passed', 3, '2022-04-04 07:06:40', '2022-04-04 07:06:40', 0),
(18, 8, 93, 'passed', 3, '2022-04-04 07:06:57', '2022-04-04 07:06:57', 1),
(19, 8, 96, 'passed', 3, '2022-04-04 07:07:09', '2022-04-04 07:07:09', 2),
(20, 8, 21, 'no', 3, '2022-04-04 12:36:32', '2022-04-04 12:36:32', 30),
(21, 9, 81, 'passed', 3, '2022-04-04 07:09:33', '2022-04-04 07:09:33', 0),
(22, 9, 93, 'passed', 3, '2022-04-04 07:09:48', '2022-04-04 07:09:48', 1),
(23, 9, 96, 'passed', 3, '2022-04-04 07:09:58', '2022-04-04 07:09:58', 2),
(24, 9, 21, 'no', 3, '2022-04-04 12:39:25', '2022-04-04 12:39:25', 30),
(25, 10, 27, 'passed', 1, '2022-04-14 11:29:10', '2022-04-14 11:29:10', 0),
(26, 10, 21, 'passed', 1, '2022-04-14 11:29:16', '2022-04-14 11:29:16', 30),
(27, 11, 12, 'passed', 1, '2022-04-14 11:31:24', '2022-04-14 11:31:24', 0),
(28, 11, 25, 'passed', 1, '2022-04-14 11:31:37', '2022-04-14 11:31:37', 1),
(29, 11, 21, 'no', 1, '2022-04-14 17:01:15', '2022-04-14 17:01:15', 30),
(30, 12, 47, 'passed', 1, '2022-04-14 11:33:49', '2022-04-14 11:33:49', 0),
(31, 12, 50, 'passed', 1, '2022-04-14 11:33:57', '2022-04-14 11:33:57', 1),
(32, 12, 21, 'passed', 1, '2022-04-14 11:34:01', '2022-04-14 11:34:01', 30),
(33, 13, 14, 'passed', 1, '2022-04-14 11:36:59', '2022-04-14 11:36:59', 0),
(34, 13, 31, 'passed', 1, '2022-04-14 11:37:15', '2022-04-14 11:37:15', 1),
(35, 13, 49, 'passed', 1, '2022-04-14 11:37:35', '2022-04-14 11:37:35', 2),
(36, 13, 52, 'passed', 1, '2022-04-14 11:37:42', '2022-04-14 11:37:42', 3),
(37, 13, 21, 'no', 1, '2022-04-14 17:06:48', '2022-04-14 17:06:48', 30),
(38, 14, 63, 'passed', 1, '2022-04-14 11:41:20', '2022-04-14 11:41:20', 0),
(39, 14, 21, 'passed', 1, '2022-04-14 11:41:24', '2022-04-14 11:41:24', 30),
(40, 15, 14, 'passed', 1, '2022-04-15 10:59:45', '2022-04-15 10:59:45', 0),
(41, 15, 21, 'no', 1, '2022-04-15 16:29:30', '2022-04-15 16:29:30', 30),
(45, 16, 81, 'ready', 3, '2022-04-15 16:45:20', '2022-04-15 16:45:20', 0),
(48, 17, 81, 'passed', 3, '2022-04-15 11:19:15', '2022-04-15 11:19:15', 0),
(49, 17, 102, 'passed', 3, '2022-04-15 11:19:35', '2022-04-15 11:19:35', 1),
(50, 17, 21, 'passed', 3, '2022-04-15 11:19:43', '2022-04-15 11:19:43', 30),
(51, 18, 81, 'ready', 3, '2022-04-15 17:09:09', '2022-04-15 17:09:09', 0),
(52, 18, 102, 'no', 3, '2022-04-15 17:09:09', '2022-04-15 17:09:09', 1),
(53, 19, 81, 'passed', 3, '2022-04-15 11:41:35', '2022-04-15 11:41:35', 0),
(54, 19, 102, 'passed', 3, '2022-04-15 11:41:51', '2022-04-15 11:41:51', 1),
(55, 19, 21, 'no', 3, '2022-04-15 17:10:59', '2022-04-15 17:10:59', 30),
(56, 20, 81, 'passed', 3, '2022-04-18 01:38:27', '2022-04-18 01:38:27', 0),
(57, 20, 84, 'passed', 3, '2022-04-18 01:38:34', '2022-04-18 01:38:34', 1),
(58, 20, 21, 'passed', 3, '2022-04-18 01:38:45', '2022-04-18 01:38:45', 30),
(62, 23, 81, 'ready', 3, '2022-04-18 15:33:45', '2022-04-18 15:33:45', 0),
(63, 24, 81, 'passed', 3, '2022-04-18 10:05:17', '2022-04-18 10:05:17', 0),
(64, 24, 21, 'passed', 3, '2022-04-18 10:05:21', '2022-04-18 10:05:21', 30),
(65, 25, 81, 'passed', 3, '2022-04-18 10:21:52', '2022-04-18 10:21:52', 0),
(66, 25, 93, 'passed', 3, '2022-04-18 10:22:08', '2022-04-18 10:22:08', 1),
(67, 25, 102, 'passed', 3, '2022-04-18 10:22:21', '2022-04-18 10:22:21', 2),
(68, 25, 21, 'no', 3, '2022-04-18 15:51:33', '2022-04-18 15:51:33', 30),
(75, 22, 81, 'passed', 3, '2022-04-18 11:20:41', '2022-04-18 11:20:41', 0),
(76, 22, 93, 'passed', 3, '2022-04-18 11:20:51', '2022-04-18 11:20:51', 1),
(77, 22, 102, 'passed', 3, '2022-04-18 11:20:59', '2022-04-18 11:20:59', 2),
(78, 22, 21, 'passed', 3, '2022-04-18 11:21:11', '2022-04-18 11:21:11', 30),
(79, 27, 14, 'passed', 1, '2022-04-18 11:34:49', '2022-04-18 11:34:49', 0),
(80, 27, 21, 'passed', 1, '2022-04-18 11:35:02', '2022-04-18 11:35:02', 30),
(85, 30, 14, 'passed', 1, '2022-04-18 11:55:02', '2022-04-18 11:55:02', 0),
(86, 30, 31, 'passed', 1, '2022-04-18 11:55:13', '2022-04-18 11:55:13', 1),
(87, 30, 33, 'passed', 1, '2022-04-18 12:22:21', '2022-04-18 12:22:21', 2),
(88, 30, 49, 'passed', 1, '2022-04-18 12:22:27', '2022-04-18 12:22:27', 3),
(89, 30, 21, 'no', 1, '2022-04-18 17:24:46', '2022-04-18 17:24:46', 30),
(90, 31, 87, 'passed', 3, '2022-04-19 09:01:52', '2022-04-19 09:01:52', 0),
(91, 31, 96, 'passed', 3, '2022-04-19 09:03:00', '2022-04-19 09:03:00', 1),
(92, 31, 99, 'passed', 3, '2022-04-19 09:03:06', '2022-04-19 09:03:06', 2),
(93, 31, 21, 'passed', 3, '2022-04-19 09:06:55', '2022-04-19 09:06:55', 30),
(94, 32, 81, 'passed', 3, '2022-04-19 09:28:15', '2022-04-19 09:28:15', 0),
(95, 32, 21, 'passed', 3, '2022-04-19 09:28:21', '2022-04-19 09:28:21', 30),
(99, 50, 81, 'passed', 3, '2022-04-19 11:36:11', '2022-04-19 11:36:11', 0),
(100, 50, 84, 'passed', 3, '2022-04-19 11:36:34', '2022-04-19 11:36:34', 1),
(101, 50, 21, 'passed', 3, '2022-04-19 11:36:39', '2022-04-19 11:36:39', 30),
(126, 51, 84, 'ready', 3, '2022-04-19 18:09:43', '2022-04-19 18:09:43', 0),
(127, 51, 21, 'no', 3, '2022-04-19 18:09:43', '2022-04-19 18:09:43', 30),
(128, 54, 81, 'passed', 3, '2022-04-20 07:23:10', '2022-04-20 07:23:10', 0),
(129, 54, 93, 'passed', 3, '2022-04-20 07:23:24', '2022-04-20 07:23:24', 1),
(130, 54, 102, 'passed', 3, '2022-04-20 07:23:33', '2022-04-20 07:23:33', 2),
(131, 54, 21, 'passed', 3, '2022-04-20 07:23:38', '2022-04-20 07:23:38', 30),
(132, 55, 81, 'passed', 3, '2022-04-21 01:36:45', '2022-04-21 01:36:45', 0),
(133, 55, 84, 'passed', 3, '2022-04-21 01:36:50', '2022-04-21 01:36:50', 1),
(134, 55, 21, 'passed', 3, '2022-04-21 01:37:02', '2022-04-21 01:37:02', 30);

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
(1, '5afe73096525cf24ec5407d447eac295_PID_3.mp3', '2022-04-04 12:20:55', '2022-04-04 12:20:55', 3, 0, 0, 362),
(2, 'ec79665cb27d297d632403e2c41f1c44_PID_5.mp3', '2022-04-04 12:27:14', '2022-04-04 12:27:14', 5, 0, 0, 361),
(3, '670ea41c71bc37ea771d9355fbd306b0_PID_9.mp3', '2022-04-04 12:40:17', '2022-04-04 12:40:17', 9, 0, 0, 349),
(4, '74af5798dac5c0795910514c6cbc5fc0_PID_11.mp3', '2022-04-14 17:01:57', '2022-04-14 17:01:57', 11, 0, 0, 321),
(5, '01a5f708ab1f08d658c14a1a5f473858_PID_13.mp3', '2022-04-14 17:07:57', '2022-04-14 17:07:57', 13, 0, 0, 321),
(6, 'fa27aed62ade185499b49c6d64fc82c0_PID_15.mp3', '2022-04-15 16:30:37', '2022-04-15 16:30:37', 15, 0, 0, 354),
(7, '897a6e4eff2db19ca5c116cda5408082_PID_19.mp3', '2022-04-15 17:12:27', '2022-04-15 17:12:27', 19, 0, 0, 321),
(8, 'dfd10d17e805f927f1fa68b03aa91e88_PID_25.mp3', '2022-04-18 15:52:36', '2022-04-18 15:52:36', 25, 0, 0, 321),
(9, '4b31749410786276131371d974934d2c_PID_30.mp3', '2022-04-18 17:21:34', '2022-04-18 17:21:34', 30, 0, 0, 321),
(10, 'f04684731585be01f3235392c0e6cef7_PID_30.mp3', '2022-04-18 17:52:41', '2022-04-18 17:52:41', 30, 0, 0, 321);

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
(4, 'Process2', 'process2', 23, '2022-04-06 03:35:22', '2022-04-06 09:05:22'),
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
(33, 36, 7, 'How likely is it that you would recommend OMNI Vizag Hospitals to your friends or family?', '', 'radio', 1, '2022-04-04 02:21:53', '2022-04-04 02:21:53', 0, 'yes'),
(34, 36, 7, 'What is the most important reason for recommending OMNI?', '', 'checkbox', 2, '2022-04-04 02:12:21', '2022-04-04 02:12:21', 15, 'yes'),
(35, 36, 7, 'What should change so that you would definitely recommend OMNI?', '', 'checkbox', 3, '2022-04-04 02:12:24', '2022-04-04 02:12:24', 16, 'yes'),
(36, 36, 7, 'What is the most important reason for NOT recommending OMNI?', '', 'checkbox', 4, '2022-04-04 02:12:29', '2022-04-04 02:12:29', 17, 'yes'),
(37, 36, 7, 'What did you like about  *teamname*?', '', 'textarea', 5, '2021-12-06 09:52:53', '2021-12-06 09:52:53', 0, 'yes'),
(38, 36, 7, 'What could have been better in  *teamname*?', '', 'textarea', 6, '2021-12-06 09:52:47', '2021-12-06 09:52:47', 0, 'yes'),
(39, 36, 7, 'What went wrong with *teamname*?', '', 'textarea', 7, '2021-12-06 09:52:40', '2021-12-06 09:52:40', 0, 'yes'),
(40, 36, 8, 'How likely is it that you would recommend OMNI Vizag Hospitals to your friends or family?', '', 'radio', 1, '2022-04-04 02:22:01', '2022-04-04 02:22:01', 0, 'yes'),
(41, 36, 8, 'What is the most important reason for recommending OMNI. Which Team Made You Happy ?', '', 'checkbox', 2, '2022-04-04 02:12:08', '2022-04-04 02:12:08', 37, 'yes'),
(42, 36, 8, 'What should change so that you would definitely recommend OMNI?', '', 'checkbox', 3, '2022-04-04 02:11:58', '2022-04-04 02:11:58', 38, 'yes'),
(43, 36, 8, 'What is the most important reason for NOT recommending OMNI?', '', 'checkbox', 4, '2022-04-04 02:11:45', '2022-04-04 02:11:45', 39, 'yes'),
(44, 36, 8, 'What did you like about  *teamname*?', '', 'textarea', 5, '2022-01-11 10:02:21', '2022-01-11 10:02:21', 0, 'yes'),
(45, 36, 8, 'What could have been better in  *teamname*?', '', 'textarea', 6, '2022-01-11 10:02:26', '2022-01-11 10:02:26', 0, 'yes'),
(46, 36, 8, 'What went wrong with *teamname*?', '', 'textarea', 7, '2022-01-11 10:02:30', '2022-01-11 10:02:30', 0, 'yes');

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
(91, 23, 12, 16, 'Food And Beverages', '2022-04-19 02:25:36', '2022-04-19 02:25:36'),
(92, 23, 13, 16, 'Food And Beverages', '2022-04-19 02:25:38', '2022-04-19 02:25:38'),
(93, 23, 14, 16, 'Food And Beverages', '2022-04-19 02:25:41', '2022-04-19 02:25:41'),
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
(122, 36, 33, NULL, '0', '2022-04-01 12:29:41', '2022-04-01 12:29:41'),
(123, 36, 33, NULL, '1', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(124, 36, 33, NULL, '2', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(125, 36, 33, NULL, '3', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(126, 36, 33, NULL, '4', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(127, 36, 33, NULL, '5', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(128, 36, 33, NULL, '6', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(129, 36, 33, NULL, '7', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(130, 36, 33, NULL, '8', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(131, 36, 33, NULL, '9', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(132, 36, 40, NULL, '0', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(133, 36, 40, NULL, '1', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(134, 36, 40, NULL, '2', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(135, 36, 40, NULL, '3', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(136, 36, 40, NULL, '4', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(137, 36, 40, NULL, '5', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(138, 36, 40, NULL, '6', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(139, 36, 40, NULL, '7', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(140, 36, 40, NULL, '8', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(141, 36, 40, NULL, '9', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(142, 36, 34, 23, 'Billing', '2022-04-04 06:39:51', '2022-04-04 06:39:51'),
(143, 36, 35, 23, 'Billing', '2022-04-04 06:39:57', '2022-04-04 06:39:57'),
(144, 36, 36, 23, 'Billing', '2022-04-04 06:40:00', '2022-04-04 06:40:00'),
(145, 36, 41, 23, 'Billing', '2022-04-04 06:40:03', '2022-04-04 06:40:03'),
(146, 36, 42, 23, 'Billing', '2022-04-04 06:40:06', '2022-04-04 06:40:06'),
(147, 36, 43, 23, 'Billing', '2022-04-04 06:40:09', '2022-04-04 06:40:09'),
(148, 36, 34, 22, 'Nursing', '2022-04-04 06:40:13', '2022-04-04 06:40:13'),
(149, 36, 35, 22, 'Nursing', '2022-04-04 06:40:18', '2022-04-04 06:40:18'),
(150, 36, 36, 22, 'Nursing', '2022-04-04 06:40:20', '2022-04-04 06:40:20'),
(151, 36, 41, 22, 'Nursing', '2022-04-04 06:40:23', '2022-04-04 06:40:23'),
(152, 36, 42, 22, 'Nursing', '2022-04-04 06:40:25', '2022-04-04 06:40:25'),
(153, 36, 43, 22, 'Nursing', '2022-04-04 06:40:27', '2022-04-04 06:40:27'),
(154, 36, 0, NULL, 'Any Other', '2022-04-01 12:30:00', '2022-04-01 12:30:00'),
(155, NULL, 2, 24, 'Test', '2022-04-06 03:38:44', '2022-04-06 03:38:44'),
(156, NULL, 3, 24, 'Test', '2022-04-06 03:38:44', '2022-04-06 03:38:44'),
(157, NULL, 4, 24, 'Test', '2022-04-06 03:38:44', '2022-04-06 03:38:44'),
(158, NULL, 12, 24, 'Test', '2022-04-06 03:38:44', '2022-04-06 03:38:44'),
(159, NULL, 13, 24, 'Test', '2022-04-06 03:38:44', '2022-04-06 03:38:44'),
(160, NULL, 14, 24, 'Test', '2022-04-06 03:38:44', '2022-04-06 03:38:44');

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
(1, 1, 8, '2022-04-04 12:15:46', '2022-04-04 12:15:46', 'Billing', 143, 36, 362, 7),
(2, 2, 5, '2022-04-04 12:15:55', '2022-04-04 12:15:55', 'Billing', 14, 23, 321, 1),
(3, 2, 5, '2022-04-19 02:27:50', '2022-04-19 02:27:50', 'Food and Beverages', 49, 23, 321, 1),
(4, 3, 6, '2022-04-04 12:20:30', '2022-04-04 12:20:30', 'Billing', 144, 36, 362, 7),
(5, 4, 2, '2022-04-19 02:28:06', '2022-04-19 02:28:06', 'Food and Beverages', 93, 23, 321, 3),
(6, 5, 4, '2022-04-04 12:26:27', '2022-04-04 12:26:27', 'Billing', 144, 36, 361, 7),
(7, 5, 4, '2022-04-04 12:26:27', '2022-04-04 12:26:27', 'Nursing', 150, 36, 361, 7),
(8, 6, 1, '2022-04-04 12:28:41', '2022-04-04 12:28:41', 'Pharmacy', 33, 23, 352, 1),
(9, 7, 3, '2022-04-04 12:30:33', '2022-04-04 12:30:33', 'Doctors', 46, 23, 352, 1),
(10, 8, 5, '2022-04-04 12:36:32', '2022-04-04 12:36:32', 'Billing', 81, 23, 349, 3),
(11, 8, 5, '2022-04-19 02:28:03', '2022-04-19 02:28:03', 'Food and Beverages', 93, 23, 349, 3),
(12, 8, 5, '2022-04-04 12:36:32', '2022-04-04 12:36:32', 'Maintenance', 96, 23, 349, 3),
(13, 9, 5, '2022-04-04 12:39:25', '2022-04-04 12:39:25', 'Billing', 81, 23, 349, 3),
(14, 9, 5, '2022-04-19 02:28:01', '2022-04-19 02:28:01', 'Food and Beverages', 93, 23, 349, 3),
(15, 9, 5, '2022-04-04 12:39:25', '2022-04-04 12:39:25', 'Maintenance', 96, 23, 349, 3),
(16, 10, 8, '2022-04-14 16:58:58', '2022-04-14 16:58:58', 'Nursing', 27, 23, 321, 1),
(17, 11, 9, '2022-04-14 17:01:15', '2022-04-14 17:01:15', 'Billing', 12, 23, 321, 1),
(18, 11, 9, '2022-04-14 17:01:15', '2022-04-14 17:01:15', 'Pharmacy', 25, 23, 321, 1),
(19, 12, 9, '2022-04-19 02:27:52', '2022-04-19 02:27:52', 'Food and Beverages', 47, 23, 321, 1),
(20, 12, 9, '2022-04-14 17:03:37', '2022-04-14 17:03:37', 'Maintenance', 50, 23, 321, 1),
(21, 13, 5, '2022-04-14 17:06:48', '2022-04-14 17:06:48', 'Billing', 14, 23, 321, 1),
(22, 13, 5, '2022-04-14 17:06:48', '2022-04-14 17:06:48', 'Nursing', 31, 23, 321, 1),
(23, 13, 5, '2022-04-19 02:27:47', '2022-04-19 02:27:47', 'Food and Beverages', 49, 23, 321, 1),
(24, 13, 5, '2022-04-14 17:06:48', '2022-04-14 17:06:48', 'Maintenance', 52, 23, 321, 1),
(25, 14, 7, '2022-04-14 17:10:50', '2022-04-14 17:10:50', 'Laboratory', 63, 23, 321, 1),
(26, 15, 2, '2022-04-15 16:29:30', '2022-04-15 16:29:30', 'Billing', 14, 23, 354, 1),
(30, 16, 1, '2022-04-15 16:45:20', '2022-04-15 16:45:20', 'Billing', 81, 23, 354, 3),
(32, 17, 1, '2022-04-15 11:35:10', '2022-04-15 17:05:10', 'Laboratory', 102, 23, 354, 3),
(33, 17, 1, '2022-04-15 11:35:10', '2022-04-15 17:05:10', 'Laboratory', 102, 23, 354, 3),
(34, 18, 2, '2022-04-15 17:09:09', '2022-04-15 17:09:09', 'Billing', 81, 23, 321, 3),
(35, 18, 2, '2022-04-15 17:09:09', '2022-04-15 17:09:09', 'Laboratory', 102, 23, 321, 3),
(36, 19, 1, '2022-04-15 11:45:01', '2022-04-15 17:15:01', 'Billing', 81, 23, 321, 3),
(37, 19, 1, '2022-04-15 11:45:01', '2022-04-15 17:15:01', 'Billing', 81, 23, 321, 3),
(38, 20, 4, '2022-04-18 07:08:20', '2022-04-18 07:08:20', 'Billing', 81, 23, 321, 3),
(39, 20, 4, '2022-04-18 07:08:20', '2022-04-18 07:08:20', 'Nursing', 84, 23, 321, 3),
(42, 23, 2, '2022-04-18 15:33:45', '2022-04-18 15:33:45', 'Billing', 81, 23, 354, 3),
(43, 24, 2, '2022-04-18 15:34:57', '2022-04-18 15:34:57', 'Billing', 81, 23, 354, 3),
(44, 25, 1, '2022-04-18 10:24:28', '2022-04-18 15:54:28', 'Laboratory', 102, 23, 321, 3),
(45, 25, 1, '2022-04-19 02:27:58', '2022-04-19 02:27:58', 'Food and Beverages', 93, 23, 321, 3),
(46, 25, 1, '2022-04-18 15:51:33', '2022-04-18 15:51:33', 'Laboratory', 102, 23, 321, 3),
(51, 22, 3, '2022-04-18 16:50:31', '2022-04-18 16:50:31', 'Billing', 81, 23, 354, 3),
(52, 22, 3, '2022-04-19 02:27:55', '2022-04-19 02:27:55', 'Food and Beverages', 93, 23, 354, 3),
(53, 22, 3, '2022-04-18 16:50:31', '2022-04-18 16:50:31', 'Laboratory', 102, 23, 354, 3),
(54, 27, 2, '2022-04-18 17:04:46', '2022-04-18 17:04:46', 'Billing', 14, 23, 321, 1),
(58, 30, 5, '2022-04-18 17:24:46', '2022-04-18 17:24:46', 'Billing', 14, 23, 321, 1),
(59, 30, 5, '2022-04-18 17:24:46', '2022-04-18 17:24:46', 'Nursing', 31, 23, 321, 1),
(60, 30, 5, '2022-04-18 17:24:46', '2022-04-18 17:24:46', 'Pharmacy', 33, 23, 321, 1),
(61, 30, 5, '2022-04-19 02:27:44', '2022-04-19 02:27:44', 'Food and Beverages', 49, 23, 321, 1),
(62, 31, 3, '2022-04-19 14:31:41', '2022-04-19 14:31:41', 'Pharmacy', 87, 23, 321, 3),
(63, 31, 3, '2022-04-19 14:31:41', '2022-04-19 14:31:41', 'Maintenance', 96, 23, 321, 3),
(64, 31, 3, '2022-04-19 14:31:41', '2022-04-19 14:31:41', 'Radiology', 99, 23, 321, 3),
(65, 32, 3, '2022-04-19 14:58:05', '2022-04-19 14:58:05', 'Billing', 81, 23, 321, 3),
(68, 50, 5, '2022-04-19 17:05:56', '2022-04-19 17:05:56', 'Billing', 81, 23, 321, 3),
(69, 50, 5, '2022-04-19 17:05:56', '2022-04-19 17:05:56', 'Nursing', 84, 23, 321, 3),
(82, 51, 5, '2022-04-19 18:09:43', '2022-04-19 18:09:43', 'Nursing', 84, 23, 321, 3),
(83, 54, 3, '2022-04-20 12:52:57', '2022-04-20 12:52:57', 'Billing', 81, 23, 321, 3),
(84, 54, 3, '2022-04-20 12:52:57', '2022-04-20 12:52:57', 'Food And Beverages', 93, 23, 321, 3),
(85, 54, 3, '2022-04-20 12:52:57', '2022-04-20 12:52:57', 'Laboratory', 102, 23, 321, 3),
(86, 55, 4, '2022-04-21 07:06:37', '2022-04-21 07:06:37', 'Billing', 81, 23, 321, 3),
(87, 55, 4, '2022-04-21 07:06:37', '2022-04-21 07:06:37', 'Nursing', 84, 23, 321, 3);

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
(1, 1, 8, '2022-04-04 12:15:54', '2022-04-04 12:15:54', 'Vizag - final billing', 38, 143, '', 36, 362, 7),
(3, 2, 5, '2022-04-04 12:17:08', '2022-04-04 12:17:08', 'Cost high', 7, 49, '', 23, 321, 1),
(4, 2, 5, '2022-04-04 12:17:08', '2022-04-04 12:17:08', 'Hygiene', 19, 49, '', 23, 321, 1),
(5, 3, 6, '2022-04-04 12:20:37', '2022-04-04 12:20:37', 'Vizag - Extra Billing', 37, 144, '', 36, 362, 7),
(6, 4, 2, '2022-04-04 12:25:55', '2022-04-04 12:25:55', 'Hygiene', 19, 93, '', 23, 321, 3),
(7, 5, 4, '2022-04-04 12:26:41', '2022-04-04 12:26:41', 'Vizag - Extra Billing', 37, 144, '', 36, 361, 7),
(8, 5, 4, '2022-04-04 12:26:41', '2022-04-04 12:26:41', 'Vizag - final billing', 38, 144, '', 36, 361, 7),
(9, 7, 3, '2022-04-04 12:30:53', '2022-04-04 12:30:53', 'Attitude', 12, 46, '', 23, 352, 1),
(14, 8, 5, '2022-04-04 12:37:09', '2022-04-04 12:37:09', 'AC Not working', 20, 96, '', 23, 349, 3),
(15, 8, 5, '2022-04-04 12:37:09', '2022-04-04 12:37:09', 'Poor Room Light', 21, 96, '', 23, 349, 3),
(20, 9, 5, '2022-04-04 12:39:58', '2022-04-04 12:39:58', 'AC Not working', 20, 96, '', 23, 349, 3),
(21, 9, 5, '2022-04-04 12:39:58', '2022-04-04 12:39:58', 'Poor Room Light', 21, 96, '', 23, 349, 3),
(22, 10, 8, '2022-04-14 16:59:10', '2022-04-14 16:59:10', 'Any Other', 26, 27, '', 23, 321, 1),
(23, 11, 9, '2022-04-14 17:01:24', '2022-04-14 17:01:24', 'Final Bill', 5, 12, '', 23, 321, 1),
(24, 11, 9, '2022-04-14 17:01:24', '2022-04-14 17:01:24', 'Late Billing', 11, 12, '', 23, 321, 1),
(27, 12, 9, '2022-04-14 17:03:57', '2022-04-14 17:03:57', 'Poor Room Light', 21, 50, '', 23, 321, 1),
(28, 12, 9, '2022-04-14 17:03:57', '2022-04-14 17:03:57', 'Electrical', 23, 50, '', 23, 321, 1),
(36, 13, 5, '2022-04-14 17:07:42', '2022-04-14 17:07:42', 'Poor Room Light', 21, 52, '', 23, 321, 1),
(37, 13, 5, '2022-04-14 17:07:42', '2022-04-14 17:07:42', 'Electrical', 23, 52, '', 23, 321, 1),
(38, 15, 2, '2022-04-15 16:29:45', '2022-04-15 16:29:45', 'Late Billing', 11, 14, '', 23, 354, 1),
(39, 17, 1, '2022-04-15 11:35:10', '2022-04-15 17:05:10', 'Late Billing', 11, 102, '', 23, 354, 3),
(40, 19, 1, '2022-04-15 11:45:01', '2022-04-15 17:15:01', 'Registration', 4, 81, '', 23, 321, 3),
(41, 19, 1, '2022-04-15 11:45:01', '2022-04-15 17:15:01', 'Late Billing', 11, 81, '', 23, 321, 3),
(42, 19, 1, '2022-04-15 11:45:01', '2022-04-15 17:15:01', 'Insurance Assistance', 15, 81, '', 23, 321, 3),
(45, 20, 4, '2022-04-18 07:08:33', '2022-04-18 07:08:33', 'Room Clean', 6, 84, '', 23, 321, 3),
(46, 20, 4, '2022-04-18 07:08:33', '2022-04-18 07:08:33', 'Attitude', 9, 84, '', 23, 321, 3),
(48, 24, 2, '2022-04-18 15:35:16', '2022-04-18 15:35:16', 'Final Bill', 5, 81, '', 23, 354, 3),
(49, 24, 2, '2022-04-18 15:35:17', '2022-04-18 15:35:17', 'Late Billing', 11, 81, '', 23, 354, 3),
(51, 25, 1, '2022-04-18 15:52:08', '2022-04-18 15:52:08', 'Quality and Test', 17, 93, '', 23, 321, 3),
(52, 25, 1, '2022-04-18 15:52:08', '2022-04-18 15:52:08', 'Delay Serving', 18, 93, '', 23, 321, 3),
(55, 22, 3, '2022-04-18 16:50:51', '2022-04-18 16:50:51', 'Cost high', 7, 93, '', 23, 354, 3),
(56, 27, 2, '2022-04-18 17:04:49', '2022-04-18 17:04:49', 'Final Bill', 5, 14, '', 23, 321, 1),
(69, 30, 5, '2022-04-18 17:52:27', '2022-04-18 17:52:27', 'No table clean', 8, 49, '', 23, 321, 1),
(70, 30, 5, '2022-04-18 17:52:27', '2022-04-18 17:52:27', 'Proper Cooked', 16, 49, '', 23, 321, 1),
(71, 31, 3, '2022-04-19 14:33:00', '2022-04-19 14:33:00', 'AC Not working', 20, 96, '', 23, 321, 3),
(72, 31, 3, '2022-04-19 14:33:00', '2022-04-19 14:33:00', 'Poor Room Light', 21, 96, '', 23, 321, 3),
(73, 32, 3, '2022-04-19 14:58:15', '2022-04-19 14:58:15', 'Registration', 4, 81, '', 23, 321, 3),
(74, 32, 3, '2022-04-19 14:58:15', '2022-04-19 14:58:15', 'Insurance Assistance', 15, 81, '', 23, 321, 3),
(76, 50, 5, '2022-04-19 17:06:34', '2022-04-19 17:06:34', 'Room Clean', 6, 84, '', 23, 321, 3),
(77, 50, 5, '2022-04-19 17:06:34', '2022-04-19 17:06:34', 'Attitude', 9, 84, '', 23, 321, 3),
(78, 51, 5, '2022-04-19 18:03:11', '2022-04-19 18:03:11', 'Registration', 4, 81, '', 23, 321, 3),
(81, 54, 3, '2022-04-20 12:53:24', '2022-04-20 12:53:24', 'No table clean', 8, 93, '', 23, 321, 3),
(82, 54, 3, '2022-04-20 12:53:24', '2022-04-20 12:53:24', 'Proper Cooked', 16, 93, '', 23, 321, 3),
(83, 54, 3, '2022-04-20 12:53:24', '2022-04-20 12:53:24', 'Quality and Test', 17, 93, '', 23, 321, 3),
(86, 55, 4, '2022-04-21 07:06:50', '2022-04-21 07:06:50', 'Room Clean', 6, 84, '', 23, 321, 3),
(87, 55, 4, '2022-04-21 07:06:50', '2022-04-21 07:06:50', 'Attitude', 9, 84, '', 23, 321, 3);

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
(27, 23, 6, 17, 'Customer Support', '2022-04-18 01:31:38', '2022-04-18 07:01:38');

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
  `person_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `ticket_status` enum('opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back','closed_satisfied','closed_unsatisfied','patient_level_closure','process_level_closure','assigned','transferred') CHARACTER SET latin1 DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answerid` int(11) DEFAULT NULL,
  `answeredby_person` text DEFAULT NULL,
  `department_activities` text DEFAULT NULL,
  `department_name_id` int(11) DEFAULT 0,
  `department_status` varchar(50) DEFAULT NULL,
  `ticket_remarks` text DEFAULT NULL,
  `process_level_closure` varchar(250) DEFAULT NULL,
  `category_process_level` char(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_answered`
--

INSERT INTO `survey_answered` (`id`, `person_id`, `rating`, `ticket_status`, `survey_id`, `organization_id`, `logged_user_id`, `question_id`, `answerid`, `answeredby_person`, `department_activities`, `department_name_id`, `department_status`, `ticket_remarks`, `process_level_closure`, `category_process_level`, `created_at`, `updated_at`) VALUES
(1, 1, 8, NULL, 7, 36, 362, 33, 0, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-04 12:15:40', '2022-04-04 12:15:40'),
(2, 1, 8, NULL, 7, 36, 362, 35, 143, '', NULL, 143, NULL, NULL, NULL, NULL, '2022-04-04 12:15:46', '2022-04-04 12:15:46'),
(3, 2, 5, 'opened', 1, 23, 321, 1, 6, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-04 12:15:49', '2022-04-04 12:15:49'),
(4, 1, 8, NULL, 7, 36, 362, 38, 143, 'NA', 'Vizag - final billing', 143, NULL, NULL, NULL, NULL, '2022-04-04 12:15:54', '2022-04-04 12:15:54'),
(5, 2, 5, 'opened', 1, 23, 321, 4, 14, '', NULL, 14, NULL, NULL, NULL, NULL, '2022-04-04 12:15:55', '2022-04-04 12:15:55'),
(6, 2, 5, 'opened', 1, 23, 321, 4, 49, '', NULL, 49, NULL, NULL, NULL, NULL, '2022-04-04 12:15:55', '2022-04-04 12:15:55'),
(7, 2, 5, 'opened', 1, 23, 321, 7, 14, 'Final billing processing takes too much time', 'Final Bill', 14, NULL, NULL, NULL, NULL, '2022-04-04 12:16:43', '2022-04-04 12:16:43'),
(8, 2, 5, 'opened', 1, 23, 321, 7, 49, 'Cost is high compare with other hospitals', 'Cost high,Hygiene', 49, NULL, NULL, NULL, NULL, '2022-04-04 12:17:08', '2022-04-04 12:17:08'),
(9, 2, 5, 'opened', 1, 23, 321, 7, 21, '', '', 21, NULL, NULL, NULL, NULL, '2022-04-04 12:17:11', '2022-04-04 12:17:11'),
(10, 3, 6, 'patient_level_closure', 7, 36, 362, 33, 0, '', NULL, 0, NULL, 'I understood the problem we will rectify', '', '', '2022-04-04 06:52:16', '2022-04-04 12:22:16'),
(11, 3, 6, 'patient_level_closure', 7, 36, 362, 36, 144, '', NULL, 144, NULL, 'I understood the problem we will rectify', '', '', '2022-04-04 06:52:16', '2022-04-04 12:22:16'),
(12, 3, 6, 'patient_level_closure', 7, 36, 362, 39, 144, 'NA', 'Vizag - Extra Billing', 144, NULL, 'I understood the problem we will rectify', '', '', '2022-04-04 06:52:16', '2022-04-04 12:22:16'),
(13, 4, 2, 'opened', 3, 23, 321, 11, 0, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-04 12:25:35', '2022-04-04 12:25:35'),
(14, 4, 2, 'opened', 3, 23, 321, 14, 93, '', NULL, 93, NULL, NULL, NULL, NULL, '2022-04-04 12:25:39', '2022-04-04 12:25:39'),
(15, 4, 2, 'opened', 3, 23, 321, 17, 93, 'No Taste', 'Hygiene', 93, NULL, NULL, NULL, NULL, '2022-04-04 12:25:55', '2022-04-04 12:25:55'),
(16, 4, 2, 'opened', 3, 23, 321, 17, 21, 'Please put more bread items', '', 21, NULL, NULL, NULL, NULL, '2022-04-04 12:26:17', '2022-04-04 12:26:17'),
(17, 5, 4, 'connected_refused_to_talk', 7, 36, 361, 33, 0, '', NULL, 0, NULL, 'refused to talk', '', '', '2022-04-04 06:59:27', '2022-04-04 12:29:27'),
(18, 5, 4, 'connected_refused_to_talk', 7, 36, 361, 36, 144, '', NULL, 144, NULL, 'refused to talk', '', '', '2022-04-04 06:59:27', '2022-04-04 12:29:27'),
(19, 5, 4, 'connected_refused_to_talk', 7, 36, 361, 36, 150, '', NULL, 150, NULL, 'refused to talk', '', '', '2022-04-04 06:59:27', '2022-04-04 12:29:27'),
(20, 5, 4, 'connected_refused_to_talk', 7, 36, 361, 39, 144, 'NA', 'Vizag - Extra Billing,Vizag - final billing', 144, NULL, 'refused to talk', '', '', '2022-04-04 06:59:27', '2022-04-04 12:29:27'),
(21, 5, 4, 'connected_refused_to_talk', 7, 36, 361, 39, 150, 'not caring to patients', '', 150, NULL, 'refused to talk', '', '', '2022-04-04 06:59:27', '2022-04-04 12:29:27'),
(22, 6, 1, 'opened', 1, 23, 352, 1, 2, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-04 12:28:26', '2022-04-04 12:28:26'),
(23, 6, 1, 'opened', 1, 23, 352, 4, 33, '', NULL, 33, NULL, NULL, NULL, NULL, '2022-04-04 12:28:41', '2022-04-04 12:28:41'),
(24, 6, 1, 'opened', 1, 23, 352, 7, 33, 'Please maintain Pharmacy drugs', '', 33, NULL, NULL, NULL, NULL, '2022-04-04 12:29:10', '2022-04-04 12:29:10'),
(25, 6, 1, 'opened', 1, 23, 352, 7, 21, '', '', 21, NULL, NULL, NULL, NULL, '2022-04-04 12:29:13', '2022-04-04 12:29:13'),
(26, 7, 3, 'opened', 1, 23, 352, 1, 4, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-04 12:30:30', '2022-04-04 12:30:30'),
(27, 7, 3, 'opened', 1, 23, 352, 4, 46, '', NULL, 46, NULL, NULL, NULL, NULL, '2022-04-04 12:30:33', '2022-04-04 12:30:33'),
(28, 7, 3, 'opened', 1, 23, 352, 7, 46, 'No good doctors attitute', 'Attitude', 46, NULL, NULL, NULL, NULL, '2022-04-04 12:30:53', '2022-04-04 12:30:53'),
(29, 7, 3, 'opened', 1, 23, 352, 7, 21, 'Please communicate preperly with patients', '', 21, NULL, NULL, NULL, NULL, '2022-04-04 12:31:49', '2022-04-04 12:31:49'),
(30, 8, 5, 'closed_satisfied', 3, 23, 349, 11, 0, '', NULL, 0, NULL, 'taken feedback and we wiil improve', '', '', '2022-04-04 07:15:26', '2022-04-04 12:45:26'),
(31, 8, 5, 'closed_satisfied', 3, 23, 349, 14, 81, '', NULL, 81, NULL, 'taken feedback and we wiil improve', '', '', '2022-04-04 07:15:26', '2022-04-04 12:45:26'),
(32, 8, 5, 'closed_satisfied', 3, 23, 349, 14, 93, '', NULL, 93, NULL, 'taken feedback and we wiil improve', '', '', '2022-04-04 07:15:26', '2022-04-04 12:45:26'),
(33, 8, 5, 'closed_satisfied', 3, 23, 349, 14, 96, '', NULL, 96, NULL, 'taken feedback and we wiil improve', '', '', '2022-04-04 07:15:26', '2022-04-04 12:45:26'),
(34, 8, 5, 'closed_satisfied', 3, 23, 349, 17, 81, '', 'Late Billing,Insurance Assistance', 81, NULL, 'taken feedback and we wiil improve', '', '', '2022-04-04 07:15:26', '2022-04-04 12:45:26'),
(35, 8, 5, 'closed_satisfied', 3, 23, 349, 17, 93, 'NA', 'Cost high,Delay Serving', 93, NULL, 'taken feedback and we wiil improve', '', '', '2022-04-04 07:15:26', '2022-04-04 12:45:26'),
(36, 8, 5, 'closed_satisfied', 3, 23, 349, 17, 96, 'NA', 'AC Not working,Poor Room Light', 96, NULL, 'taken feedback and we wiil improve', '', '', '2022-04-04 07:15:26', '2022-04-04 12:45:26'),
(37, 9, 5, 'assigned', 3, 23, 349, 11, 0, '', NULL, 0, NULL, 'Ticket assigned to support team', '', '', '2022-04-18 06:37:52', '2022-04-18 12:07:52'),
(38, 9, 5, 'assigned', 3, 23, 349, 14, 81, '', NULL, 81, NULL, 'Ticket assigned to support team', '', '', '2022-04-18 06:37:52', '2022-04-18 12:07:52'),
(39, 9, 5, 'assigned', 3, 23, 349, 14, 93, '', NULL, 93, NULL, 'Ticket assigned to support team', '', '', '2022-04-18 06:37:52', '2022-04-18 12:07:52'),
(40, 9, 5, 'assigned', 3, 23, 349, 14, 96, '', NULL, 96, NULL, 'Ticket assigned to support team', '', '', '2022-04-18 06:37:52', '2022-04-18 12:07:52'),
(41, 9, 5, 'assigned', 3, 23, 349, 17, 81, '', 'Late Billing,Insurance Assistance', 81, NULL, 'Ticket assigned to support team', '', '', '2022-04-18 06:37:52', '2022-04-18 12:07:52'),
(42, 9, 5, 'assigned', 3, 23, 349, 17, 93, 'NA', 'Cost high,Proper Cooked', 93, NULL, 'Ticket assigned to support team', '', '', '2022-04-18 06:37:52', '2022-04-18 12:07:52'),
(43, 9, 5, 'assigned', 3, 23, 349, 17, 96, 'NA', 'AC Not working,Poor Room Light', 96, NULL, 'Ticket assigned to support team', '', '', '2022-04-18 06:37:52', '2022-04-18 12:07:52'),
(44, 10, 8, 'opened', 1, 23, 321, 1, 9, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-14 16:58:55', '2022-04-14 16:58:55'),
(45, 10, 8, 'opened', 1, 23, 321, 3, 27, '', NULL, 27, NULL, NULL, NULL, NULL, '2022-04-14 16:58:58', '2022-04-14 16:58:58'),
(46, 10, 8, 'opened', 1, 23, 321, 6, 27, 'Night time attendance', 'Any Other', 27, NULL, NULL, NULL, NULL, '2022-04-14 16:59:10', '2022-04-14 16:59:10'),
(47, 10, 8, 'opened', 1, 23, 321, 6, 21, '', '', 21, NULL, NULL, NULL, NULL, '2022-04-14 16:59:16', '2022-04-14 16:59:16'),
(48, 11, 9, NULL, 1, 23, 321, 1, 10, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-14 17:01:07', '2022-04-14 17:01:07'),
(49, 11, 9, NULL, 1, 23, 321, 2, 12, '', NULL, 12, NULL, NULL, NULL, NULL, '2022-04-14 17:01:15', '2022-04-14 17:01:15'),
(50, 11, 9, NULL, 1, 23, 321, 2, 25, '', NULL, 25, NULL, NULL, NULL, NULL, '2022-04-14 17:01:15', '2022-04-14 17:01:15'),
(51, 11, 9, NULL, 1, 23, 321, 5, 12, '', 'Final Bill,Late Billing', 12, NULL, NULL, NULL, NULL, '2022-04-14 17:01:24', '2022-04-14 17:01:24'),
(52, 11, 9, NULL, 1, 23, 321, 5, 25, 'Late billing', '', 25, NULL, NULL, NULL, NULL, '2022-04-14 17:01:37', '2022-04-14 17:01:37'),
(53, 12, 9, NULL, 1, 23, 321, 1, 10, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-14 17:03:28', '2022-04-14 17:03:28'),
(54, 12, 9, NULL, 1, 23, 321, 2, 47, '', NULL, 47, NULL, NULL, NULL, NULL, '2022-04-14 17:03:37', '2022-04-14 17:03:37'),
(55, 12, 9, NULL, 1, 23, 321, 2, 50, '', NULL, 50, NULL, NULL, NULL, NULL, '2022-04-14 17:03:37', '2022-04-14 17:03:37'),
(56, 12, 9, NULL, 1, 23, 321, 5, 47, 'NA', 'Cost high,Delay Serving', 47, NULL, NULL, NULL, NULL, '2022-04-14 17:03:49', '2022-04-14 17:03:49'),
(57, 12, 9, NULL, 1, 23, 321, 5, 50, '', 'Poor Room Light,Electrical', 50, NULL, NULL, NULL, NULL, '2022-04-14 17:03:57', '2022-04-14 17:03:57'),
(58, 12, 9, NULL, 1, 23, 321, 5, 21, '', '', 21, NULL, NULL, NULL, NULL, '2022-04-14 17:04:01', '2022-04-14 17:04:01'),
(59, 13, 5, 'opened', 1, 23, 321, 1, 6, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-14 17:05:33', '2022-04-14 17:05:33'),
(60, 13, 5, 'opened', 1, 23, 321, 4, 14, '', NULL, 14, NULL, NULL, NULL, NULL, '2022-04-14 17:06:48', '2022-04-14 17:06:48'),
(61, 13, 5, 'opened', 1, 23, 321, 4, 31, '', NULL, 31, NULL, NULL, NULL, NULL, '2022-04-14 17:06:48', '2022-04-14 17:06:48'),
(62, 13, 5, 'opened', 1, 23, 321, 4, 49, '', NULL, 49, NULL, NULL, NULL, NULL, '2022-04-14 17:06:48', '2022-04-14 17:06:48'),
(63, 13, 5, 'opened', 1, 23, 321, 4, 52, '', NULL, 52, NULL, NULL, NULL, NULL, '2022-04-14 17:06:48', '2022-04-14 17:06:48'),
(64, 13, 5, 'opened', 1, 23, 321, 7, 14, 'NA', 'Registration,Late Billing,Wrong Billing', 14, NULL, NULL, NULL, NULL, '2022-04-14 17:06:59', '2022-04-14 17:06:59'),
(65, 13, 5, 'opened', 1, 23, 321, 7, 31, 'NA', 'Room Clean,Attitude', 31, NULL, NULL, NULL, NULL, '2022-04-14 17:07:15', '2022-04-14 17:07:15'),
(66, 13, 5, 'opened', 1, 23, 321, 7, 49, 'Food not good', 'Cost high,Proper Cooked', 49, NULL, NULL, NULL, NULL, '2022-04-14 17:07:35', '2022-04-14 17:07:35'),
(67, 13, 5, 'opened', 1, 23, 321, 7, 52, '', 'Poor Room Light,Electrical', 52, NULL, NULL, NULL, NULL, '2022-04-14 17:07:42', '2022-04-14 17:07:42'),
(68, 14, 7, 'opened', 1, 23, 321, 1, 8, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-14 17:10:38', '2022-04-14 17:10:38'),
(69, 14, 7, 'opened', 1, 23, 321, 3, 63, '', NULL, 63, NULL, NULL, NULL, NULL, '2022-04-14 17:10:50', '2022-04-14 17:10:50'),
(70, 14, 7, 'opened', 1, 23, 321, 6, 63, 'delay in lab reports', '', 63, NULL, NULL, NULL, NULL, '2022-04-14 17:11:20', '2022-04-14 17:11:20'),
(71, 14, 7, 'opened', 1, 23, 321, 6, 21, '', '', 21, NULL, NULL, NULL, NULL, '2022-04-14 17:11:24', '2022-04-14 17:11:24'),
(72, 15, 2, 'opened', 1, 23, 354, 1, 3, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-15 16:29:06', '2022-04-15 16:29:06'),
(73, 15, 2, 'opened', 1, 23, 354, 4, 14, '', NULL, 14, NULL, NULL, NULL, NULL, '2022-04-15 16:29:30', '2022-04-15 16:29:30'),
(74, 15, 2, 'opened', 1, 23, 354, 7, 14, '', 'Late Billing', 14, NULL, NULL, NULL, NULL, '2022-04-15 16:29:45', '2022-04-15 16:29:45'),
(78, 16, 1, 'opened', 3, 23, 354, 11, 0, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-15 16:45:10', '2022-04-15 16:45:10'),
(80, 16, 1, 'opened', 3, 23, 354, 14, 81, '', NULL, 81, NULL, NULL, NULL, NULL, '2022-04-15 16:45:20', '2022-04-15 16:45:20'),
(81, 17, 1, 'process_level_closure', 3, 23, 354, 11, 0, '', NULL, 0, NULL, 'As the server was done couldn\'t complete the process on time', 'Server issue-closed', 'process1', '2022-04-15 11:35:25', '2022-04-15 17:05:25'),
(83, 17, 1, 'process_level_closure', 3, 23, 354, 14, 102, '', NULL, 102, NULL, 'As the server was done couldn\'t complete the process on time', 'Server issue-closed', 'process1', '2022-04-15 11:35:25', '2022-04-15 17:05:25'),
(84, 17, 1, 'process_level_closure', 3, 23, 354, 14, 102, '', NULL, 102, NULL, 'As the server was done couldn\'t complete the process on time', 'Server issue-closed', 'process1', '2022-04-15 11:35:25', '2022-04-15 17:05:25'),
(85, 17, 1, 'process_level_closure', 3, 23, 354, 17, 102, 'Teja sri delaying the process and response is not well', 'Late Billing', 102, NULL, 'As the server was done couldn\'t complete the process on time', 'Server issue-closed', 'process1', '2022-04-15 11:35:25', '2022-04-15 17:05:25'),
(86, 17, 1, 'process_level_closure', 3, 23, 354, 17, 102, 'delay reports', '', 102, NULL, 'As the server was done couldn\'t complete the process on time', 'Server issue-closed', 'process1', '2022-04-15 11:35:25', '2022-04-15 17:05:25'),
(87, 17, 1, 'process_level_closure', 3, 23, 354, 17, 21, '', '', 21, NULL, 'As the server was done couldn\'t complete the process on time', 'Server issue-closed', 'process1', '2022-04-15 11:35:25', '2022-04-15 17:05:25'),
(88, 18, 2, 'opened', 3, 23, 321, 11, 0, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-15 17:08:54', '2022-04-15 17:08:54'),
(89, 18, 2, 'opened', 3, 23, 321, 14, 81, '', NULL, 81, NULL, NULL, NULL, NULL, '2022-04-15 17:09:09', '2022-04-15 17:09:09'),
(90, 18, 2, 'opened', 3, 23, 321, 14, 102, '', NULL, 102, NULL, NULL, NULL, NULL, '2022-04-15 17:09:09', '2022-04-15 17:09:09'),
(91, 19, 1, 'process_level_closure', 3, 23, 321, 11, 0, '', NULL, 0, NULL, 'Information delayed from nursing team.', 'Reports got delayed as Information been shared delay from the nursing team', 'process1', '2022-04-15 11:46:52', '2022-04-15 17:16:52'),
(92, 19, 1, 'process_level_closure', 3, 23, 321, 14, 81, '', NULL, 81, NULL, 'Information delayed from nursing team.', 'Reports got delayed as Information been shared delay from the nursing team', 'process1', '2022-04-15 11:46:52', '2022-04-15 17:16:52'),
(93, 19, 1, 'process_level_closure', 3, 23, 321, 14, 81, '', NULL, 81, NULL, 'Information delayed from nursing team.', 'Reports got delayed as Information been shared delay from the nursing team', 'process1', '2022-04-15 11:46:52', '2022-04-15 17:16:52'),
(94, 19, 1, 'process_level_closure', 3, 23, 321, 17, 81, 'MARREPPAGARI NOT RESPONDED WELL', 'Registration,Late Billing,Insurance Assistance', 81, NULL, 'Information delayed from nursing team.', 'Reports got delayed as Information been shared delay from the nursing team', 'process1', '2022-04-15 11:46:52', '2022-04-15 17:16:52'),
(95, 19, 1, 'process_level_closure', 3, 23, 321, 17, 81, 'DELAY REPORTS BY VENKATESH K', '', 81, NULL, 'Information delayed from nursing team.', 'Reports got delayed as Information been shared delay from the nursing team', 'process1', '2022-04-15 11:46:52', '2022-04-15 17:16:52'),
(96, 20, 4, 'patient_level_closure', 3, 23, 321, 11, 0, '', NULL, 0, NULL, 'Testing', '', '', '2022-04-18 09:55:03', '2022-04-18 15:25:03'),
(97, 20, 4, 'patient_level_closure', 3, 23, 321, 14, 81, '', NULL, 81, NULL, 'Testing', '', '', '2022-04-18 09:55:03', '2022-04-18 15:25:03'),
(98, 20, 4, 'patient_level_closure', 3, 23, 321, 14, 84, '', NULL, 84, NULL, 'Testing', '', '', '2022-04-18 09:55:03', '2022-04-18 15:25:03'),
(99, 20, 4, 'patient_level_closure', 3, 23, 321, 17, 81, 'NA', 'Registration,Final Bill', 81, NULL, 'Testing', '', '', '2022-04-18 09:55:03', '2022-04-18 15:25:03'),
(100, 20, 4, 'patient_level_closure', 3, 23, 321, 17, 84, 'NA', 'Room Clean,Attitude', 84, NULL, 'Testing', '', '', '2022-04-18 09:55:03', '2022-04-18 15:25:03'),
(101, 20, 4, 'patient_level_closure', 3, 23, 321, 17, 21, 'Closed Survey.', '', 21, NULL, 'Testing', '', '', '2022-04-18 09:55:03', '2022-04-18 15:25:03'),
(102, 21, 3, 'opened', 1, 23, 321, 1, 4, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-18 07:11:09', '2022-04-18 07:11:09'),
(105, 22, 3, 'closed_satisfied', 3, 23, 321, 11, 0, '', NULL, 0, NULL, 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(106, 22, 3, 'closed_satisfied', 3, 23, 321, 14, 81, '', NULL, 81, 'process_level_closure', 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(107, 22, 3, 'closed_satisfied', 3, 23, 321, 17, 81, '', 'Final Bill', 81, 'process_level_closure', 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(108, 22, 3, 'closed_satisfied', 3, 23, 321, 17, 21, '', '', 21, NULL, 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(109, 23, 2, 'opened', 3, 23, 354, 11, 0, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-18 15:33:36', '2022-04-18 15:33:36'),
(110, 23, 2, 'opened', 3, 23, 354, 14, 81, '', NULL, 81, NULL, NULL, NULL, NULL, '2022-04-18 15:33:45', '2022-04-18 15:33:45'),
(111, 24, 2, 'closed_satisfied', 3, 23, 354, 11, 0, '', NULL, 0, NULL, 'not responded', 'Technical issue', '', '2022-04-18 10:14:37', '2022-04-18 15:44:37'),
(112, 24, 2, 'closed_satisfied', 3, 23, 354, 14, 81, '', NULL, 81, NULL, 'not responded', 'Technical issue', '', '2022-04-18 10:14:37', '2022-04-18 15:44:37'),
(113, 24, 2, 'closed_satisfied', 3, 23, 354, 17, 81, 'Delay response', 'Final Bill,Late Billing', 81, NULL, 'not responded', 'Technical issue', '', '2022-04-18 10:14:37', '2022-04-18 15:44:37'),
(114, 24, 2, 'closed_satisfied', 3, 23, 354, 17, 21, '', '', 21, NULL, 'not responded', 'Technical issue', '', '2022-04-18 10:14:37', '2022-04-18 15:44:37'),
(115, 25, 1, 'process_level_closure', 3, 23, 321, 11, 0, '', NULL, 0, NULL, 'Due to server down there was delay \r\nTypo error', 'issue resolved', 'process1', '2022-04-18 10:33:08', '2022-04-18 16:03:08'),
(116, 25, 1, 'process_level_closure', 3, 23, 321, 14, 102, '', NULL, 102, NULL, 'Due to server down there was delay \r\nTypo error', 'issue resolved', 'process1', '2022-04-18 10:33:08', '2022-04-18 16:03:08'),
(117, 25, 1, 'process_level_closure', 3, 23, 321, 14, 93, '', NULL, 93, NULL, 'Due to server down there was delay \r\nTypo error', 'issue resolved', 'process1', '2022-04-18 10:33:08', '2022-04-18 16:03:08'),
(118, 25, 1, 'process_level_closure', 3, 23, 321, 14, 102, '', NULL, 102, NULL, 'Due to server down there was delay \r\nTypo error', 'issue resolved', 'process1', '2022-04-18 10:33:08', '2022-04-18 16:03:08'),
(119, 25, 1, 'process_level_closure', 3, 23, 321, 17, 102, 'delay response and wrng billing', 'Wrong Billing', 102, NULL, 'Due to server down there was delay \r\nTypo error', 'issue resolved', 'process1', '2022-04-18 10:33:08', '2022-04-18 16:03:08'),
(120, 25, 1, 'process_level_closure', 3, 23, 321, 17, 93, 'taste is not good', 'Quality and Test,Delay Serving', 93, NULL, 'Due to server down there was delay \r\nTypo error', 'issue resolved', 'process1', '2022-04-18 10:33:08', '2022-04-18 16:03:08'),
(121, 25, 1, 'process_level_closure', 3, 23, 321, 17, 102, 'wrong values', '', 102, NULL, 'Due to server down there was delay \r\nTypo error', 'issue resolved', 'process1', '2022-04-18 10:33:08', '2022-04-18 16:03:08'),
(125, 22, 3, 'closed_satisfied', 3, 23, 354, 11, 0, '', NULL, 0, NULL, 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(130, 22, 3, 'closed_satisfied', 3, 23, 354, 14, 81, '', NULL, 81, 'process_level_closure', 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(131, 22, 3, 'closed_satisfied', 3, 23, 354, 14, 93, '', NULL, 93, 'patient_level_closure', 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(132, 22, 3, 'closed_satisfied', 3, 23, 354, 14, 102, '', NULL, 102, 'process_level_closure', 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(133, 22, 3, 'closed_satisfied', 3, 23, 354, 17, 81, 'NA', 'Final Bill', 81, 'process_level_closure', 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(134, 22, 3, 'closed_satisfied', 3, 23, 354, 17, 93, 'Cost is high', 'Cost high', 93, 'patient_level_closure', 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(135, 22, 3, 'closed_satisfied', 3, 23, 354, 17, 102, 'Testing', '', 102, 'process_level_closure', 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(136, 22, 3, 'closed_satisfied', 3, 23, 354, 17, 21, 'Feedback is done', '', 21, NULL, 'Testing by venkat', 'Testing', 'process1', '2022-04-20 10:09:17', '2022-04-20 15:39:17'),
(137, 27, 2, 'opened', 1, 23, 321, 1, 3, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-18 17:04:43', '2022-04-18 17:04:43'),
(138, 27, 2, 'opened', 1, 23, 321, 4, 14, '', NULL, 14, NULL, NULL, NULL, NULL, '2022-04-18 17:04:46', '2022-04-18 17:04:46'),
(139, 27, 2, 'opened', 1, 23, 321, 7, 14, '', 'Final Bill', 14, NULL, NULL, NULL, NULL, '2022-04-18 17:04:49', '2022-04-18 17:04:49'),
(142, 27, 2, 'opened', 1, 23, 321, 7, 21, 'Test is done.', '', 21, NULL, NULL, NULL, NULL, '2022-04-18 17:09:01', '2022-04-18 17:09:01'),
(150, 30, 5, 'opened', 1, 23, 321, 1, 6, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-18 17:24:29', '2022-04-18 17:24:29'),
(151, 30, 5, 'opened', 1, 23, 321, 4, 14, '', NULL, 14, NULL, NULL, NULL, NULL, '2022-04-18 17:24:46', '2022-04-18 17:24:46'),
(152, 30, 5, 'opened', 1, 23, 321, 4, 31, '', NULL, 31, NULL, NULL, NULL, NULL, '2022-04-18 17:24:46', '2022-04-18 17:24:46'),
(153, 30, 5, 'opened', 1, 23, 321, 4, 33, '', NULL, 33, NULL, NULL, NULL, NULL, '2022-04-18 17:24:46', '2022-04-18 17:24:46'),
(154, 30, 5, 'opened', 1, 23, 321, 4, 49, '', NULL, 49, NULL, NULL, NULL, NULL, '2022-04-18 17:24:46', '2022-04-18 17:24:46'),
(155, 30, 5, 'opened', 1, 23, 321, 7, 14, 'Late billing', 'Registration,Late Billing,Wrong Billing', 14, NULL, NULL, NULL, NULL, '2022-04-18 17:25:02', '2022-04-18 17:25:02'),
(156, 30, 5, 'opened', 1, 23, 321, 7, 31, 'NA', 'Room Clean,Attitude,Medicine Administration', 31, NULL, NULL, NULL, NULL, '2022-04-18 17:25:13', '2022-04-18 17:25:13'),
(157, 30, 5, 'opened', 1, 23, 321, 7, 33, 'Late', '', 33, NULL, NULL, NULL, NULL, '2022-04-18 17:52:21', '2022-04-18 17:52:21'),
(158, 30, 5, 'opened', 1, 23, 321, 7, 49, '', 'No table clean,Proper Cooked', 49, NULL, NULL, NULL, NULL, '2022-04-18 17:52:27', '2022-04-18 17:52:27'),
(160, 31, 3, 'opened', 3, 23, 321, 11, 0, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-19 14:31:12', '2022-04-19 14:31:12'),
(161, 31, 3, 'opened', 3, 23, 321, 14, 87, '', NULL, 87, NULL, NULL, NULL, NULL, '2022-04-19 14:31:41', '2022-04-19 14:31:41'),
(162, 31, 3, 'opened', 3, 23, 321, 14, 96, '', NULL, 96, NULL, NULL, NULL, NULL, '2022-04-19 14:31:41', '2022-04-19 14:31:41'),
(163, 31, 3, 'opened', 3, 23, 321, 14, 99, '', NULL, 99, NULL, NULL, NULL, NULL, '2022-04-19 14:31:41', '2022-04-19 14:31:41'),
(165, 31, 3, 'opened', 3, 23, 321, 17, 96, 'Ac not working', 'AC Not working,Poor Room Light', 96, NULL, NULL, NULL, NULL, '2022-04-19 14:33:00', '2022-04-19 14:33:00'),
(166, 31, 3, 'opened', 3, 23, 321, 17, 99, 'Wrong reports', '', 99, NULL, NULL, NULL, NULL, '2022-04-19 14:33:06', '2022-04-19 14:33:06'),
(167, 31, 3, 'opened', 3, 23, 321, 17, 21, 'Bad experience', '', 21, NULL, NULL, NULL, NULL, '2022-04-19 14:36:55', '2022-04-19 14:36:55'),
(168, 31, 3, 'opened', 3, 23, 321, 17, 87, 'Medicine not available', '', 87, NULL, NULL, NULL, NULL, '2022-04-19 14:37:01', '2022-04-19 14:37:01'),
(169, 32, 3, 'opened', 3, 23, 321, 11, 0, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-19 14:58:01', '2022-04-19 14:58:01'),
(170, 32, 3, 'opened', 3, 23, 321, 14, 81, '', NULL, 81, NULL, NULL, NULL, NULL, '2022-04-19 14:58:05', '2022-04-19 14:58:05'),
(171, 32, 3, 'opened', 3, 23, 321, 17, 81, 'late process', 'Registration,Insurance Assistance', 81, NULL, NULL, NULL, NULL, '2022-04-19 14:58:15', '2022-04-19 14:58:15'),
(172, 32, 3, 'opened', 3, 23, 321, 17, 21, 'delay', '', 21, NULL, NULL, NULL, NULL, '2022-04-19 14:58:21', '2022-04-19 14:58:21'),
(173, 50, 5, 'opened', 3, 23, 321, 11, 0, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-19 17:05:24', '2022-04-19 17:05:24'),
(176, 50, 5, 'opened', 3, 23, 321, 14, 81, '', NULL, 81, NULL, NULL, NULL, NULL, '2022-04-19 17:05:56', '2022-04-19 17:05:56'),
(177, 50, 5, 'opened', 3, 23, 321, 14, 84, '', NULL, 84, NULL, NULL, NULL, NULL, '2022-04-19 17:05:56', '2022-04-19 17:05:56'),
(178, 50, 5, 'opened', 3, 23, 321, 17, 81, 'Late billing', 'Registration', 81, NULL, NULL, NULL, NULL, '2022-04-19 17:06:11', '2022-04-19 17:06:11'),
(179, 50, 5, 'opened', 3, 23, 321, 17, 84, 'Bad smell comes', 'Room Clean,Attitude', 84, NULL, NULL, NULL, NULL, '2022-04-19 17:06:34', '2022-04-19 17:06:34'),
(180, 50, 5, 'opened', 3, 23, 321, 17, 21, '', '', 21, NULL, NULL, NULL, NULL, '2022-04-19 17:06:39', '2022-04-19 17:06:39'),
(198, 51, 5, 'opened', 3, 23, 321, 11, 0, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-19 18:08:17', '2022-04-19 18:08:17'),
(202, 51, 5, 'opened', 3, 23, 321, 14, 84, '', NULL, 84, NULL, NULL, NULL, NULL, '2022-04-19 18:09:43', '2022-04-19 18:09:43'),
(203, 54, 3, 'process_level_closure', 3, 23, 321, 11, 0, '', NULL, 0, NULL, 'current problem', 'due to technical issue delay was happened', '', '2022-04-20 07:40:11', '2022-04-20 13:10:11'),
(204, 54, 3, 'process_level_closure', 3, 23, 321, 14, 81, '', NULL, 81, NULL, 'current problem', 'due to technical issue delay was happened', '', '2022-04-20 07:40:11', '2022-04-20 13:10:11'),
(205, 54, 3, 'process_level_closure', 3, 23, 321, 14, 93, '', NULL, 93, NULL, 'current problem', 'due to technical issue delay was happened', '', '2022-04-20 07:40:11', '2022-04-20 13:10:11'),
(206, 54, 3, 'process_level_closure', 3, 23, 321, 14, 102, '', NULL, 102, NULL, 'current problem', 'due to technical issue delay was happened', '', '2022-04-20 07:40:11', '2022-04-20 13:10:11'),
(207, 54, 3, 'process_level_closure', 3, 23, 321, 17, 81, 'wrong billing', 'Registration,Final Bill', 81, NULL, 'current problem', 'due to technical issue delay was happened', '', '2022-04-20 07:40:11', '2022-04-20 13:10:11'),
(208, 54, 3, 'process_level_closure', 3, 23, 321, 17, 93, 'quality is not gud', 'No table clean,Proper Cooked,Quality and Test', 93, NULL, 'current problem', 'due to technical issue delay was happened', '', '2022-04-20 07:40:11', '2022-04-20 13:10:11'),
(209, 54, 3, 'process_level_closure', 3, 23, 321, 17, 102, 'delay reports', '', 102, NULL, 'current problem', 'due to technical issue delay was happened', '', '2022-04-20 07:40:11', '2022-04-20 13:10:11'),
(210, 54, 3, 'process_level_closure', 3, 23, 321, 17, 21, 'nothg', '', 21, NULL, 'current problem', 'due to technical issue delay was happened', '', '2022-04-20 07:40:11', '2022-04-20 13:10:11'),
(211, 55, 4, 'opened', 3, 23, 321, 11, 0, '', NULL, 0, NULL, NULL, NULL, NULL, '2022-04-21 07:06:33', '2022-04-21 07:06:33'),
(212, 55, 4, 'opened', 3, 23, 321, 14, 81, '', NULL, 81, NULL, NULL, NULL, NULL, '2022-04-21 07:06:37', '2022-04-21 07:06:37'),
(213, 55, 4, 'opened', 3, 23, 321, 14, 84, '', NULL, 84, NULL, NULL, NULL, NULL, '2022-04-21 07:06:37', '2022-04-21 07:06:37'),
(214, 55, 4, 'opened', 3, 23, 321, 17, 81, 'TEST', 'Registration,Final Bill', 81, NULL, NULL, NULL, NULL, '2022-04-21 07:06:45', '2022-04-21 07:06:45'),
(215, 55, 4, 'opened', 3, 23, 321, 17, 84, 'TEST', 'Room Clean,Attitude', 84, NULL, NULL, NULL, NULL, '2022-04-21 07:06:50', '2022-04-21 07:06:50'),
(232, 55, 4, 'opened', 3, 23, 321, 17, 21, 'Feedback taken.', '', 21, NULL, NULL, NULL, NULL, '2022-04-21 07:19:13', '2022-04-21 07:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `survey_persons`
--

CREATE TABLE `survey_persons` (
  `id` int(11) NOT NULL,
  `assigned_ticket` int(11) DEFAULT 0,
  `transferred_ticket` int(11) DEFAULT 0,
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

INSERT INTO `survey_persons` (`id`, `assigned_ticket`, `transferred_ticket`, `ticket_series_number`, `ticker_final_number`, `survey_id`, `rating`, `firstname`, `lastname`, `email`, `mobile`, `gender`, `bed_name`, `uhid`, `discharge_date`, `doctor_id`, `ward_id`, `inpatient_id`, `feedback_date`, `feedback_was_givenby`, `patient_attender_name`, `know_about_hospital`, `created_at`, `updated_at`, `organization_id`, `logged_user_id`) VALUES
(1, 0, 0, 1, '#2201', 7, 8, 'jayaraju', NULL, 'jayaraju@deepredink.com', '9700334319', 'male', '78457', '451245', '2022-04-04', 12, 5, 'ip-01', '2022-04-04', 'patient', NULL, 2, '2022-04-04 06:45:40', '2022-04-04 06:45:40', 36, 362),
(2, 0, 0, 1, '#2201', 1, 5, 'Tess Jackson', NULL, 'Tess_Jackson@incor.in', '8989898989', 'male', 'Bed-01', 'UHID-01', '2022-04-04', 7, 2, '78941', '2022-04-04', 'patient', NULL, 2, '2022-04-04 06:45:49', '2022-04-04 06:45:49', 23, 321),
(3, 0, 0, 2, '#2202', 7, 6, 'Rakesh', NULL, 'rakeshv@gmail.com', '9754875487', 'male', '654215', '3254524', '2022-04-04', 12, 5, 'ip-02', '2022-04-04', 'patient', NULL, 4, '2022-04-04 06:50:18', '2022-04-04 06:50:18', 36, 362),
(4, 0, 0, 2, '#2202', 3, 2, 'Harley Newton', NULL, 'Harley_Newton@incor.in', '9898989899', 'male', 'Bed-02', 'UHID-02', '2022-04-04', 8, 2, '78942', '2022-04-04', 'patient_attender', 'Raja', 2, '2022-04-04 06:55:35', '2022-04-04 06:55:35', 23, 321),
(5, 0, 0, 3, '#2203', 7, 4, 'ramesh', NULL, 'ramesh@gmail.com', '9700545145', 'male', '745878', '564525', '2022-04-07', 12, 5, 'ip-01', '2022-04-04', 'patient', NULL, 4, '2022-04-04 06:56:20', '2022-04-04 06:56:20', 36, 361),
(6, 0, 0, 3, '#2203', 1, 1, 'Daniel Delgado', NULL, 'Daniel_Delgado@incor.in', '9052697845', 'male', 'Bed-02', 'UHID-03', '2022-04-04', 8, 3, NULL, '2022-04-04', 'patient_attender', 'Jaya', 4, '2022-04-04 06:58:26', '2022-04-04 06:58:26', 23, 352),
(7, 0, 0, 4, '#2204', 1, 3, 'Camille Wagner', NULL, 'Camille_Wagner@gmail.com', '7894561234', 'male', 'Bed-04', 'UHID-1', '2022-04-04', 9, 2, '78943', '2022-04-04', 'patient_attender', 'Radha', 5, '2022-04-04 07:00:30', '2022-04-04 07:00:30', 23, 352),
(8, 0, 0, 5, '#2205', 3, 5, 'vinod kumar', NULL, 'vinod.v@gmial.com', '9745874877', 'male', '7845878', '45787', '2022-04-04', 9, 2, 'ip-03', '2022-04-04', 'patient', NULL, 5, '2022-04-04 07:06:19', '2022-04-04 07:06:19', 23, 349),
(9, 366, 0, 6, '#2206', 3, 5, 'vinod kumar', NULL, 'vinod.k@gmail.com', '9854875487', 'male', '451454', '45456', '2022-04-04', 9, 2, '7847', '2022-04-04', 'patient', NULL, 5, '2022-04-18 06:37:52', '2022-04-18 12:07:52', 23, 349),
(10, 0, 0, 7, '#2207', 1, 8, 'Ranjith R', NULL, 'ranjith.ram@gmail.com', '9885047096', 'male', '101', '17878787', '2022-04-14', 8, 3, NULL, '2022-04-14', 'patient', NULL, 1, '2022-04-14 11:28:55', '2022-04-14 11:28:55', 23, 321),
(11, 0, 0, 8, '#2208', 1, 9, 'venkatesh', NULL, 'venkatesh@gmail.com', '9845785874', 'male', '451245', 'UHID45125', '2022-04-14', 8, 2, 'IP-01', '2022-04-14', 'patient', NULL, 5, '2022-04-14 11:31:07', '2022-04-14 11:31:07', 23, 321),
(12, 0, 0, 9, '#2209', 1, 9, 'Rahul', NULL, 'rahul@gmail.com', '9845754875', 'male', '784578', '78548', '2022-04-14', 8, 3, 'IP-02', '2022-04-14', 'patient_attender', 'Sandeep', 4, '2022-04-14 11:33:28', '2022-04-14 11:33:28', 23, 321),
(13, 0, 0, 10, '#2210', 1, 5, 'Damodar', NULL, 'damodar@gmail.com', '8458745874', 'male', '365854', 'UHID5897', '2022-04-14', 9, 2, 'IP-03', '2022-04-14', 'patient_attender', 'Madhan kumar', 5, '2022-04-14 11:35:33', '2022-04-14 11:35:33', 23, 321),
(14, 0, 0, 11, '#2211', 1, 7, 'sandeep', NULL, 'sandeep@gmail.com', '9854587584', 'male', '74464', '645124', '2022-04-14', 10, 2, 'IP-04', '2022-04-14', 'patient', NULL, 2, '2022-04-14 11:40:38', '2022-04-14 11:40:38', 23, 321),
(15, 0, 0, 12, '#2212', 1, 2, 'vekatesh', NULL, '4kvenkatesh@gmail.com', '9603203737', 'male', '4-singleroom', '105011003', '2022-04-15', 10, 2, '1009876543', '2022-04-15', 'patient_attender', 'swathi', 1, '2022-04-15 10:59:06', '2022-04-15 10:59:06', 23, 354),
(16, 0, 0, 13, '#2213', 3, 1, 'swathi', NULL, '4kvenkatesh@gmail.com', '9603203737', 'female', '4-singleroom', '105011003', '2022-04-15', 10, 2, '1234567890', '2022-04-15', 'patient', NULL, 1, '2022-04-15 11:04:22', '2022-04-15 11:04:22', 23, 354),
(17, 0, 363, 14, '#2214', 3, 1, 'haneef', NULL, 'ahmed.haneef72@gmail.com', '9440997186', 'male', '739', '105001122', '2022-04-15', 7, 2, '1234567890', '2022-04-15', 'patient', NULL, 2, '2022-04-15 11:35:10', '2022-04-15 17:05:10', 23, 354),
(18, 0, 0, 15, '#2215', 3, 2, 'venkatesh.k', NULL, '4kvenkatesh@gmail.com', '9603203737', 'male', '5', '2345678', '2022-04-15', 9, NULL, '12344557676', '2022-04-15', 'patient', NULL, 2, '2022-04-15 11:38:54', '2022-04-15 11:38:54', 23, 321),
(19, 0, 349, 16, '#2216', 3, 1, 'sheela', NULL, '4kvenkatesh@gmail.com', '9603203737', 'female', '7', '867564453', '2022-04-15', 8, 3, '988676757', '2022-04-15', 'patient_attender', 'VENKATESH', 3, '2022-04-15 11:45:01', '2022-04-15 17:15:01', 23, 321),
(20, 0, 0, 17, '#2217', 3, 4, 'Venkat', NULL, 'venkat@deepredink.com', '9052691535', 'male', 'B-01', 'UHID-1', '2022-04-18', 7, 3, '78941', '2022-04-18', 'patient', NULL, 1, '2022-04-18 01:38:13', '2022-04-18 01:38:13', 23, 321),
(21, 0, 0, 18, '#2218', 1, 3, 'Venkat', NULL, 'venkat@deepredink.com', '0905269153', 'male', 'Bed-01', 'UHID-1', '2022-04-18', 7, 3, '78941', '2022-04-18', 'patient', NULL, 2, '2022-04-18 01:41:09', '2022-04-18 01:41:09', 23, 321),
(22, 0, 0, 19, '#2219', 3, 3, 'saleem', NULL, 'sailakshmi.nallamilli@gmail.com', '9100090692', 'male', '2', '123475683', '2022-04-18', 10, 2, '12352', '2022-04-18', 'patient', NULL, 4, '2022-04-18 09:49:24', '2022-04-18 09:49:24', 23, 354),
(23, 0, 0, 20, '#2220', 3, 2, 'Teja Sri', NULL, 'tejurocks22@gmail.com', '7093794813', 'female', '3', '10503386', '2022-04-18', 10, 2, '1236987297', '2022-04-18', 'patient_attender', 'Sreeja', 5, '2022-04-18 10:03:36', '2022-04-18 10:03:36', 23, 354),
(24, 368, 0, 21, '#2221', 3, 2, 'Teja Sri', NULL, 'tejurocks22@gmail.com', '7093794813', 'female', '3', '105034987', '2022-04-18', 10, 2, '154226865', '2022-04-18', 'patient_attender', 'Sreeja', 5, '2022-04-18 10:12:27', '2022-04-18 15:42:27', 23, 354),
(25, 0, 363, 22, '#2222', 3, 1, 'vijaya', NULL, 'sailakshmi.nallamilli@gmail.com', '9100090692', 'female', '3', '54231', '2022-04-18', 8, 3, '34354565', '2022-04-18', 'patient_attender', 'VENKATESH', 3, '2022-04-18 10:24:28', '2022-04-18 15:54:28', 23, 321),
(27, 0, 0, 23, '#2223', 1, 2, 'Venkat', NULL, 'venkat@deepredink.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-18', 8, 3, 'IP-01', '2022-04-18', 'patient_attender', 'RJ', 4, '2022-04-18 11:34:43', '2022-04-18 11:34:43', 23, 321),
(28, 0, 0, 24, '#2224', 1, 0, 'Test', NULL, 'venkat@deepredink.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-18', 10, 3, 'IP-01', '2022-04-18', 'patient_attender', 'RJ', 2, '2022-04-18 17:16:11', '2022-04-18 17:16:11', 23, 321),
(29, 0, 0, 25, '#2225', 1, 0, 'Test', NULL, 'venkat@deepredink.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-18', 10, 3, 'IP-01', '2022-04-18', 'patient_attender', 'RJ', 2, '2022-04-18 17:17:17', '2022-04-18 17:17:17', 23, 321),
(30, 0, 0, 26, '#2226', 1, 5, 'jayaraju', NULL, 'jayaraju@deepredink.com', '9700334319', 'male', '4511248', 'UHID4512458', '2022-04-20', 8, 2, 'IP-01', '2022-04-18', 'patient', NULL, 2, '2022-04-18 11:54:29', '2022-04-18 11:54:29', 23, 321),
(31, 0, 0, 27, '#2227', 3, 3, 'sowjanya', NULL, 'sailakshmi.nallamilli@gmail.com', '9100090692', 'female', '1', '12421', '2022-04-19', 7, 2, '56546', '2022-04-19', 'patient', NULL, 4, '2022-04-19 09:01:12', '2022-04-19 09:01:12', 23, 321),
(32, 0, 0, 28, '#2228', 3, 3, 'jc', NULL, 'sailakshmi.nallamilli@gmail.com', '9100090692', 'male', '1', '123483', '2022-04-19', 10, 2, '12398', '2022-04-19', 'patient', NULL, 1, '2022-04-19 09:28:01', '2022-04-19 09:28:01', 23, 321),
(33, 0, 0, 29, '#2229', 3, 0, 'Test', NULL, 'test@gmail.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-19', 8, 3, 'IP-01', '2022-04-19', 'patient', NULL, 1, '2022-04-19 16:29:18', '2022-04-19 16:29:18', 23, 321),
(34, 0, 0, 30, '#2230', 3, 0, 'Test', NULL, 'test789@gmail.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-19', 8, 2, 'IP-01', '2022-04-19', 'patient', NULL, 3, '2022-04-19 16:41:38', '2022-04-19 16:41:38', 23, 321),
(35, 0, 0, 31, '#2231', 3, 0, 'Test', NULL, 'test789@gmail.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-19', 8, 2, 'IP-01', '2022-04-19', 'patient', NULL, 3, '2022-04-19 16:43:14', '2022-04-19 16:43:14', 23, 321),
(36, 0, 0, 32, '#2232', 3, 0, 'Test', NULL, 'test789@gmail.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-19', 8, 2, 'IP-01', '2022-04-19', 'patient', NULL, 3, '2022-04-19 16:44:12', '2022-04-19 16:44:12', 23, 321),
(37, 0, 0, 33, '#2233', 3, 0, 'Test', NULL, 'test789@gmail.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-19', 8, 2, 'IP-01', '2022-04-19', 'patient', NULL, 3, '2022-04-19 16:44:37', '2022-04-19 16:44:37', 23, 321),
(38, 0, 0, 34, '#2234', 3, 0, 'Test', NULL, 'test789@gmail.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-19', 8, 2, 'IP-01', '2022-04-19', 'patient', NULL, 3, '2022-04-19 16:45:19', '2022-04-19 16:45:19', 23, 321),
(39, 0, 0, 35, '#2235', 3, 0, 'Test', NULL, 'test789@gmail.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-19', 8, 2, 'IP-01', '2022-04-19', 'patient', NULL, 3, '2022-04-19 16:45:30', '2022-04-19 16:45:30', 23, 321),
(40, 0, 0, 36, '#2236', 3, 0, 'Test', NULL, 'test789@gmail.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-19', 8, 2, 'IP-01', '2022-04-19', 'patient', NULL, 3, '2022-04-19 16:47:49', '2022-04-19 16:47:49', 23, 321),
(41, 0, 0, 37, '#2237', 3, 0, 'Test', NULL, 'test7899@gmail.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-19', 8, 2, 'IP-01', '2022-04-19', 'patient_attender', 'venkat', 3, '2022-04-19 16:48:14', '2022-04-19 16:48:14', 23, 321),
(42, 0, 0, 38, '#2238', 3, 0, 'Test', NULL, 'test7899@gmail.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-23', 8, 2, 'IP-01', '2022-04-21', 'patient', NULL, 2, '2022-04-19 16:48:34', '2022-04-19 16:48:34', 23, 321),
(43, 0, 0, 39, '#2239', 3, 0, 'Test', NULL, 'venkat7899@deepredink.com', '9090909099', 'male', 'B-01', 'U-01', '2022-04-19', 7, 2, 'IP-01', '2022-04-19', 'patient_attender', 'venkat', 2, '2022-04-19 16:52:29', '2022-04-19 16:52:29', 23, 321),
(44, 0, 0, 40, '#2240', 3, 0, 'Test', NULL, 'venkat7899@deepredink.com', '9090909099', 'female', 'B-01', 'U-01', '2022-04-19', 7, 2, 'IP-01', '2022-04-19', 'patient', NULL, 4, '2022-04-19 16:52:58', '2022-04-19 16:52:58', 23, 321),
(45, 0, 0, 41, '#2241', 3, 0, 'Test', NULL, 'venkat7899@deepredink.com', '9090909099', 'female', 'B-01', 'U-01', '2022-04-19', 7, 2, 'IP-01', '2022-04-19', 'patient', NULL, 2, '2022-04-19 16:53:19', '2022-04-19 16:53:19', 23, 321),
(46, 0, 0, 42, '#2242', 3, 0, 'Test', NULL, 'venkat7899@deepredink.com', '9090909099', 'female', 'B-01', 'U-01', '2022-04-19', 7, 2, 'IP-01', '2022-04-19', 'patient', NULL, 2, '2022-04-19 16:57:09', '2022-04-19 16:57:09', 23, 321),
(47, 0, 0, 43, '#2243', 3, 0, 'Test', NULL, 'venkat7899@deepredink.com', '9090909099', 'female', 'B-01', 'U-01', '2022-04-19', 7, 2, 'IP-01', '2022-04-19', 'patient_attender', 'venkat', 2, '2022-04-19 16:57:19', '2022-04-19 16:57:19', 23, 321),
(48, 0, 0, 44, '#2244', 3, 0, 'Test', NULL, '0123test@gmail.com', '9052691535', 'male', 'BH-123', 'U-01', '2022-04-19', 10, 2, 'IP-01', '2022-04-19', 'patient', NULL, 5, '2022-04-19 16:58:48', '2022-04-19 16:58:48', 23, 321),
(49, 0, 0, 45, '#2245', 3, 0, 'Test', NULL, 'test@gmail.com', '9090909099', 'male', 'B-01', 'U-01', '2022-04-19', 8, 2, 'IP-01', '2022-04-19', 'patient_attender', 'venkat', 1, '2022-04-19 17:05:10', '2022-04-19 17:05:10', 23, 321),
(50, 0, 0, 46, '#2246', 3, 5, 'Test', NULL, 'test@gmail.com', '9090909099', 'male', 'B-01', 'U-01', '2022-04-19', 8, 2, 'IP-01', '2022-04-19', 'patient_attender', 'venkat', 1, '2022-04-19 11:35:24', '2022-04-19 11:35:24', 23, 321),
(51, 0, 0, 47, '#2247', 3, 5, 'Test', NULL, 'venkat@deepredink.com', '9090909099', 'male', 'BH-123', 'U-01', '2022-04-19', 7, 2, 'IP-01', '2022-04-19', 'patient', NULL, 2, '2022-04-19 12:21:45', '2022-04-19 12:21:45', 23, 321),
(52, 0, 0, 48, '#2248', 3, 0, 'phani', NULL, 'sailakshmi.nallamilli@gmail.com', '9100090692', 'male', '4', '76443', '2022-04-20', 8, 3, '23435', '2022-04-20', 'patient', NULL, 1, '2022-04-20 12:52:27', '2022-04-20 12:52:27', 23, 321),
(53, 0, 0, 49, '#2249', 3, 0, 'phani', NULL, 'sailakshmi.nallamilli@gmail.com', '9100090692', 'male', '4', '76443', '2022-04-20', 8, 3, '23435', '2022-04-20', 'patient', NULL, 1, '2022-04-20 12:52:36', '2022-04-20 12:52:36', 23, 321),
(54, 0, 0, 50, '#2250', 3, 3, 'phani', NULL, 'sailakshmi.nallamilli@gmail.com', '9100090692', 'male', '4', '76443', '2022-04-20', 8, 3, '23435', '2022-04-20', 'patient', NULL, 1, '2022-04-20 07:22:46', '2022-04-20 07:22:46', 23, 321),
(55, 0, 0, 51, '#2251', 3, 4, 'Renu', NULL, 'renu@gmail.com', '9052691535', 'male', '123456', 'UHID-01', '2022-04-21', 8, 2, '78941', '2022-04-21', 'patient_attender', 'Radha', 4, '2022-04-21 01:36:33', '2022-04-21 01:36:33', 23, 321);

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
  `assigned_user_id` int(11) DEFAULT 0,
  `person_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `ticket_status` enum('opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back','closed_satisfied','closed_unsatisfied','patient_level_closure','process_level_closure','assigned','transferred') DEFAULT NULL,
  `ticket_remarks` text DEFAULT NULL,
  `process_level_closure` text DEFAULT NULL,
  `category_process_level` char(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_status_response_logs`
--

INSERT INTO `update_status_response_logs` (`id`, `assigned_user_id`, `person_id`, `logged_user_id`, `organization_id`, `survey_id`, `ticket_status`, `ticket_remarks`, `process_level_closure`, `category_process_level`, `created_at`, `updated_at`) VALUES
(1, 0, 3, 362, 36, 7, 'patient_level_closure', 'I understood the problem we will rectify', '', '', '2022-04-04 06:52:16', '2022-04-04 06:52:16'),
(2, 0, 5, 361, 36, 7, 'connected_refused_to_talk', 'refused to talk', '', '', '2022-04-04 06:59:27', '2022-04-04 06:59:27'),
(3, 0, 8, 349, 23, 3, 'closed_satisfied', 'taken feedback and we wiil improve', '', '', '2022-04-04 07:15:26', '2022-04-04 07:15:26'),
(4, 363, 9, 349, 23, 3, 'assigned', 'Ticket assigned to support team (Assigned to Varun)', '', '', '2022-04-05 03:57:05', '2022-04-05 03:57:05'),
(5, 0, 17, 354, 23, 3, 'process_level_closure', 'As the server was done couldn\'t complete the process on time', 'Server issue-closed', 'process1', '2022-04-15 11:26:58', '2022-04-15 11:26:58'),
(6, 0, 17, 354, 23, 3, 'process_level_closure', 'As the server was done couldn\'t complete the process on time', 'Server issue-closed', '', '2022-04-15 11:32:00', '2022-04-15 11:32:00'),
(7, 0, 17, 354, 23, 3, 'transferred', 'As the server was done couldn\'t complete the process on time (Transferred to Teja sri-Billing)', 'Server issue-closed', '', '2022-04-15 11:32:52', '2022-04-15 11:32:52'),
(8, 0, 17, 354, 23, 3, 'transferred', 'As the server was done couldn\'t complete the process on time (Transferred to Venkatesh-Lab)', 'Server issue-closed', '', '2022-04-15 11:35:10', '2022-04-15 11:35:10'),
(9, 0, 17, 354, 23, 3, 'process_level_closure', 'As the server was done couldn\'t complete the process on time', 'Server issue-closed', 'process1', '2022-04-15 11:35:25', '2022-04-15 11:35:25'),
(10, 0, 19, 321, 23, 3, 'transferred', 'Everything has been done on time from the billing department (Transferred to Venkatesh-Lab)', '', '', '2022-04-15 11:44:52', '2022-04-15 11:44:52'),
(11, 0, 19, 321, 23, 3, 'transferred', 'Information delayed from nursing team. (Transferred to Teja sri-Billing)', '', '', '2022-04-15 11:45:01', '2022-04-15 11:45:01'),
(12, 0, 19, 321, 23, 3, 'process_level_closure', 'Information delayed from nursing team.', 'Reports got delayed as Information been shared delay from the nursing team', 'process1', '2022-04-15 11:46:52', '2022-04-15 11:46:52'),
(13, 366, 9, 349, 23, 3, 'assigned', 'Ticket assigned to support team (Assigned to Rajesh)', '', '', '2022-04-18 05:50:41', '2022-04-18 05:50:41'),
(14, 367, 9, 349, 23, 3, 'assigned', 'Ticket assigned to support team (Assigned to Jayaraju)', '', '', '2022-04-18 06:15:36', '2022-04-18 06:15:36'),
(15, 366, 9, 349, 23, 3, 'assigned', 'Ticket assigned to support team (Assigned to Rajesh)', '', '', '2022-04-18 06:23:08', '2022-04-18 06:23:08'),
(16, 366, 9, 349, 23, 3, 'assigned', 'Ticket assigned to support team (Assigned to Rajesh)', '', '', '2022-04-18 06:28:59', '2022-04-18 06:28:59'),
(17, 367, 9, 349, 23, 3, 'assigned', 'Ticket assigned to support team (Assigned to Jayaraju)', '', '', '2022-04-18 06:32:18', '2022-04-18 06:32:18'),
(18, 366, 9, 349, 23, 3, 'assigned', 'Ticket assigned to support team (Assigned to Rajesh)', '', '', '2022-04-18 12:07:52', '2022-04-18 12:07:52'),
(19, 0, 20, 321, 23, 3, 'patient_level_closure', 'Testing', '', '', '2022-04-18 15:25:03', '2022-04-18 15:25:03'),
(20, 0, 24, 354, 23, 3, 'process_level_closure', 'Due to Technical issue there was a delay', 'Technical issue', 'process2', '2022-04-18 15:38:16', '2022-04-18 15:38:16'),
(21, 0, 24, 354, 23, 3, 'process_level_closure', 'Due to Technical issue there was a delay', 'Technical issue', 'process2', '2022-04-18 15:38:17', '2022-04-18 15:38:17'),
(22, 368, 24, 354, 23, 3, 'assigned', 'Due to Technical issue there was a delay (Assigned to venkatesh)', 'Technical issue', '', '2022-04-18 15:42:27', '2022-04-18 15:42:27'),
(23, 0, 24, 354, 23, 3, 'connected_refused_to_talk', 'not responded', 'Technical issue', '', '2022-04-18 15:44:14', '2022-04-18 15:44:14'),
(24, 0, 24, 354, 23, 3, 'closed_satisfied', 'not responded', 'Technical issue', '', '2022-04-18 15:44:37', '2022-04-18 15:44:37'),
(25, 0, 25, 321, 23, 3, 'transferred', 'Due to server down there was delay \r\nTypo error (Transferred to Venkatesh-Lab)', '', '', '2022-04-18 15:54:28', '2022-04-18 15:54:28'),
(26, 0, 25, 321, 23, 3, 'patient_level_closure', 'Due to server down there was delay \r\nTypo error', '', '', '2022-04-18 15:59:13', '2022-04-18 15:59:13'),
(27, 0, 25, 321, 23, 3, 'process_level_closure', 'Due to server down there was delay \r\nTypo error', 'issue resolved', 'process1', '2022-04-18 16:03:08', '2022-04-18 16:03:08'),
(28, 0, 54, 321, 23, 3, 'process_level_closure', 'due to technical issues delay happened', 'due to technical issue delay was happened', 'process1', '2022-04-20 12:57:33', '2022-04-20 12:57:33'),
(29, 0, 54, 321, 23, 3, 'process_level_closure', 'current problem', 'due to technical issue delay was happened', '', '2022-04-20 13:05:50', '2022-04-20 13:05:50'),
(30, 0, 54, 321, 23, 3, 'process_level_closure', 'current problem', 'due to technical issue delay was happened', '', '2022-04-20 13:10:11', '2022-04-20 13:10:11'),
(31, 0, 22, 354, 23, 3, 'process_level_closure', 'Testing by venkat (Updated by Teja sri-Billing)', 'Testing', 'process1', '2022-04-20 15:32:41', '2022-04-20 15:32:41'),
(32, 0, 22, 354, 23, 3, 'patient_level_closure', 'Testing by venkat (Updated by pavani f n b)', 'Testing', '', '2022-04-20 15:33:51', '2022-04-20 15:33:51'),
(33, 0, 22, 354, 23, 3, 'process_level_closure', 'Testing by venkat (Updated by Venkatesh-Lab)', 'Testing', 'process1', '2022-04-20 15:39:17', '2022-04-20 15:39:17');

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
(11, 0, NULL, NULL, 1, NULL, 'admin@nps.com', '$2y$10$kweucu9H/5FY4fCnuaHVEee20DvM27FvD9LpzDo4UgyklO6ioxWOi', '123456', '9090909090', 'india', 'Telangana', 'hyderabad', 'MALANI EXCEL,10-3-150 & 151, 4th floor, St. John\'s Road,\r\nBeside Ratnadeep Supermarket,Beside Ratnadeep Supermarket,', 'Incor', NULL, NULL, '500026', 'Male', '61a852217e298_1638421025.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'pMlliH05ez6KvBjIanW57MjG5JovvjAw2tYBWq7r5apPyWrXMwBhpFUZh2fm', '2021-07-02 01:33:40', '2021-10-25 14:35:03', '2021-09-28 07:53:01', 0),
(321, 23, NULL, 344, 2, NULL, 'omni@incor.in', '$2y$10$SZtNPmuqXm.BkegZR2dKfeCHg.Zel.a96U.hp82SB691seDVkfY2C', 'omni@123', '9705423333', NULL, NULL, NULL, NULL, 'sailakshmi', NULL, NULL, NULL, NULL, '61ce925f051ec_1640927839.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.208.26', '0', NULL, '2021-12-02 09:45:18', '2022-04-15 15:26:27', '2021-12-02 04:45:18', 1),
(349, 23, 5, 365, 3, NULL, 'tejasri.m@incor.in', '$2y$10$cnnik81DZvMwi4M48SgT4umxohcQDkUm74MKLX4fBVnJmhkjimOoe', 'teju@123', '7093794813', NULL, NULL, NULL, NULL, 'Teja sri-Billing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-04 13:42:51', '2022-04-15 16:45:26', '2022-04-15 15:53:06', 1),
(351, 23, 18, 345, 3, NULL, 'omniradiology@incor.in', '$2y$10$oS91iL4GsttzY0yCw/ZYL.JWXIShVokpjd6nR7NpQcj8OD07j.N8.', 'ss49l35H', '9676799400', NULL, NULL, NULL, NULL, 'Abdullah Saleem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-04 13:57:53', '2022-04-12 13:19:26', '2022-01-04 13:57:53', 1),
(352, 23, 5, 349, 4, NULL, 'omni@incor.in', '$2y$10$8HKegE/y2/.LuzeYawsGnuqLIRA5npAQwWLqAyCv0YtmMt6YdXmwm', 'sAilakshmi@9', '860099081', NULL, NULL, NULL, NULL, 'Abdullah Saleem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-07 16:59:26', '2022-04-12 13:19:26', '2022-01-07 17:33:19', 1),
(353, 23, 15, 345, 3, NULL, 'omni@incor.in', '$2y$10$p05q3miXPLSoIbu/23ZZr.rnxOdlMSDEoT80fxp7vZEZE1RZx27rG', 'E1Xz8vkS', '9898989898', NULL, NULL, NULL, NULL, 'Abdullah Saleem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '157.47.62.38', '1', NULL, '2022-03-25 17:00:14', '2022-04-12 13:19:26', '2022-03-29 12:36:08', 1),
(354, 23, 0, 0, 4, NULL, 'sailakshmi.nallamilli@gmail.com', '$2y$10$NF0BVHrJ8zIQY49013ZZiuEcilNfNm8fiREScd1l6.bEY9W3fz0Fm', '5UgKlW5Z', '9100090692', NULL, NULL, NULL, NULL, 'sailakshmi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-03-29 12:34:50', '2022-04-15 15:58:52', '2022-04-15 15:58:52', 1),
(356, 0, 0, 344, 1, NULL, 'coo@incor.in', '$2y$10$kweucu9H/5FY4fCnuaHVEee20DvM27FvD9LpzDo4UgyklO6ioxWOi', '123456', '9052691524', NULL, NULL, NULL, NULL, 'Omni COO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '157.47.62.38', '1', NULL, '2022-03-29 12:35:48', '2022-03-29 12:35:48', '2022-03-29 12:35:48', 1),
(358, 36, NULL, NULL, 2, NULL, 'omnivizag@incor.in', '$2y$10$XGJlF9XgP9R9FfFdPKwynu57dVXAS9aftW8HJAf4jcvCIIY44CjfG', 'GHRTDNH', '8888001001', NULL, NULL, NULL, NULL, 'omni vizag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106.195.74.138', '0', NULL, '2022-03-29 18:12:02', '2022-04-15 15:52:52', '2022-03-29 18:12:02', 1),
(359, 37, NULL, NULL, 2, NULL, 'omnikothapet@incor.in', '$2y$10$MA8bJ6Z5X112K1cpigYyDeC9fCT5NOwrzJ9P85VVqJldSZuu0dhXK', 'BzhihtvK', '8096369999', NULL, NULL, NULL, NULL, 'omni kothapet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.104.149', '0', NULL, '2022-03-29 18:38:53', '2022-03-29 18:38:53', '2022-03-29 18:38:53', 1),
(361, 36, 0, 349, 4, NULL, 'prasad.vizag@gmail.com', '$2y$10$eB44Wk5ZEF.tz82LIJIELOiOZmULR3MmUActfCcKW.v0yxctimrmC', '4gensv5f', '8787878787', NULL, NULL, NULL, NULL, 'Prasad Vizag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.206.58.0', '1', NULL, '2022-04-04 09:38:21', '2022-04-04 09:38:21', '2022-04-04 09:38:21', 1),
(362, 36, 23, 0, 3, NULL, 'vizag.hod@gmail.com', '$2y$10$HQr8E1OkvPgGAu9x8lTPdO.Ik2swwOIqiNiunk1MJlH3a9.bLVcDi', '6rrCSNcJ', '6969696969', NULL, NULL, NULL, NULL, 'Vizag HOD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.206.58.0', '1', NULL, '2022-04-04 09:39:31', '2022-04-04 09:39:31', '2022-04-04 09:39:31', 1),
(363, 23, 20, 365, 3, NULL, 'venkatesh.komire@incor.in', '$2y$10$ATeKIRN7As.eNFnU3/XebepUsHCSF3.zgF.9KonAoAI6WqVWm9GFS', 'k@venkatesh', '9154505086', NULL, NULL, NULL, NULL, 'Venkatesh-Lab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-04-05 09:26:33', '2022-04-15 16:52:26', '2022-04-15 15:55:06', 1),
(365, 23, 20, 321, 5, NULL, 'haneef.sk@incor.in', '$2y$10$SBdASgzH0EkaZXVX72Xv4.I.a0cLp8NvhvXNT3WG.fyAqQ7EDPdGi', 'abbuhaneef', '9440997186', NULL, NULL, NULL, NULL, 'haneef-ops', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-04-15 15:52:26', '2022-04-15 16:42:49', '2022-04-15 15:55:52', 1),
(366, 23, 0, 0, 7, NULL, 'customer@deepredink.com', '$2y$10$YNFv/BSV5u8.5mWy.ih2ZePKOkf4NqceujK0o9.ON4msWNunO45p6', '7B7Z50dO', '9052691535', NULL, NULL, NULL, NULL, 'Rajesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.115.215', '1', NULL, '2022-04-18 11:19:56', '2022-04-18 11:19:56', '2022-04-18 11:19:56', 1),
(367, 23, 0, 0, 7, NULL, 'jayaraju@deepredink.com', '$2y$10$WQiatzQ00sIf0mOlNxjHHuzngo0NeYSUvq2nqSxo4GUKZE0tl.6Ka', 'uDOAQFk0', '8080598745', NULL, NULL, NULL, NULL, 'Jayaraju', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.115.215', '1', NULL, '2022-04-18 11:45:13', '2022-04-18 11:45:13', '2022-04-18 11:45:13', 1),
(368, 23, 0, 0, 7, NULL, '4kvenkatesh@gmail.com', '$2y$10$nCU75qgbtnJR3Tdwmp0gHeL0DnvXbt91uNBvxuXDaY0/QeVdB.Xg.', 'S7g1L6TL', '7896543234', NULL, NULL, NULL, NULL, 'venkatesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-04-18 15:41:54', '2022-04-18 15:41:54', '2022-04-18 15:41:54', 1),
(369, 23, 16, 365, 3, NULL, 'tejurocks22@gmail.com', '$2y$10$KHNZKATKPGndoKAsob1V2.W5jcEp/11CXN2hnec7pk8n2ITJRGnPy', 'rCgsdt6a', '9100090692', NULL, NULL, NULL, NULL, 'pavani f n b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14.99.143.38', '1', NULL, '2022-04-18 16:02:15', '2022-04-18 16:02:15', '2022-04-18 16:02:15', 1),
(370, 23, 5, 0, 3, NULL, 'venkat@deepredink.com', '$2y$10$UwYTAvRFXZjD9/31uP2t3Ojq.m1lO34PMN0v3EP7CJtH1vU3Coek6', 'JEkQ8rbp', '9052691535', NULL, NULL, NULL, NULL, 'Venkat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '124.123.184.67', '1', NULL, '2022-04-21 06:58:19', '2022-04-21 06:58:19', '2022-04-21 06:58:19', 1);

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
(2, 'Unit Head', '', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(3, 'HOD', '', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(4, 'Feedback Executive', 'general', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(5, 'Operational Head', 'othead', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(6, 'Unit Head', 'unithead', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(7, 'Customer Support', 'csuport', NULL, '2021-09-16 06:34:08', '2021-09-16 06:34:22');

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
(3, 23, 'Pediatrici', 321, '2022-03-28 07:57:38', '2022-04-04 14:43:25'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `passing_departments`
--
ALTER TABLE `passing_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persons_voice_message`
--
ALTER TABLE `persons_voice_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `processes`
--
ALTER TABLE `processes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `rating_of_departments`
--
ALTER TABLE `rating_of_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `rating_of_dep_activities`
--
ALTER TABLE `rating_of_dep_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `role_levels`
--
ALTER TABLE `role_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role_names`
--
ALTER TABLE `role_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `survey_persons`
--
ALTER TABLE `survey_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `themeoptions`
--
ALTER TABLE `themeoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `update_status_response_logs`
--
ALTER TABLE `update_status_response_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
