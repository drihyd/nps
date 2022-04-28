-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2022 at 10:38 AM
-- Server version: 8.0.29
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omnihosp_nps21`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int NOT NULL,
  `organization_id` int NOT NULL,
  `department_id` int NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `organization_id`, `department_id`, `activity_name`) VALUES
(4, 23, 5, 'Registration'),
(5, 23, 5, 'Final Bill'),
(6, 23, 8, 'Room Clean'),
(7, 23, 16, 'Cost high'),
(8, 23, 16, 'No table clean'),
(9, 23, 8, 'Attitude'),
(10, 23, 8, 'Medicine Administration'),
(11, 23, 5, 'Late Billing'),
(12, 23, 15, 'Attitude'),
(13, 23, 15, 'Counselling'),
(14, 23, 5, 'Wrong Billing'),
(15, 23, 5, 'Insurance Assistance'),
(16, 23, 16, 'Proper Cooked'),
(17, 23, 16, 'Quality and Test'),
(18, 23, 16, 'Delay Serving'),
(19, 23, 16, 'Hygiene'),
(20, 23, 17, 'AC Not working'),
(21, 23, 17, 'Poor Room Light'),
(22, 23, 17, 'Plumbing'),
(23, 23, 17, 'Electrical'),
(24, 23, 8, 'Proper Communication'),
(25, 23, 8, 'Empathy'),
(26, 23, 8, 'Sympathy'),
(27, 23, 15, 'Empathy'),
(28, 23, 15, 'Sympathy'),
(29, 36, 21, 'Vizag-Final Billing'),
(30, 36, 21, 'Vizag-late billing'),
(37, 36, 23, 'Vizag - Extra Billing'),
(38, 36, 23, 'Vizag - final billing');

-- --------------------------------------------------------

--
-- Table structure for table `api_clients`
--

CREATE TABLE `api_clients` (
  `id` int NOT NULL,
  `api_token` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_clients`
--

INSERT INTO `api_clients` (`id`, `api_token`) VALUES
(2, '89616bad112871a8f7d8e1753a14948dc186f513840923e59012e1f0d8822976');

-- --------------------------------------------------------

--
-- Table structure for table `customer_fields_configurables`
--

CREATE TABLE `customer_fields_configurables` (
  `id` int NOT NULL,
  `organization_id` int NOT NULL,
  `survey_id` int DEFAULT NULL,
  `input_type` varchar(50) DEFAULT NULL,
  `input_name` varchar(50) DEFAULT NULL,
  `label` varchar(100) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `placeholder` varchar(100) DEFAULT NULL,
  `input_id` varchar(50) DEFAULT NULL,
  `is_display` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_fields_configurables`
--

INSERT INTO `customer_fields_configurables` (`id`, `organization_id`, `survey_id`, `input_type`, `input_name`, `label`, `class_name`, `placeholder`, `input_id`, `is_display`) VALUES
(1, 23, NULL, 'radio', 'gender', 'Gender', NULL, NULL, NULL, 'yes'),
(2, 36, NULL, 'radio', 'gender', 'Gender', NULL, NULL, NULL, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int NOT NULL,
  `organization_id` int NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `is_display` enum('on','off') NOT NULL DEFAULT 'on',
  `sorting` smallint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `organization_id`, `department_name`, `is_display`, `sorting`) VALUES
(2, 20, 'Billing', 'on', 1),
(3, 25, 'House keeping', 'on', 2),
(4, 25, 'Billing', 'on', 3),
(5, 23, 'Billing', 'on', 4),
(8, 23, 'Nursing', 'on', 5),
(10, 23, 'Pharmacy', 'on', 6),
(15, 23, 'Doctors', 'on', 7),
(16, 23, 'Food and Beverages', 'on', 8),
(17, 23, 'Maintenance', 'on', 9),
(22, 36, 'Nursing', 'on', 12),
(23, 36, 'Billing', 'on', 13),
(25, 23, 'Other', 'on', 14),
(26, 23, 'House Keeping', 'on', 14);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int NOT NULL,
  `organization_id` int DEFAULT '0',
  `admin_user_id` int DEFAULT NULL,
  `specification_id` int DEFAULT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `organization_id`, `admin_user_id`, `specification_id`, `doctor_name`, `created_at`) VALUES
(7, 23, 321, 5, 'Dr B. Jaipal Reddy', '2022-03-28 09:09:34'),
(8, 23, 321, 6, 'Dr M. Chandra Shekar', '2022-03-28 09:09:44'),
(9, 23, 321, 2, 'Dr O. Rama Pakkira', '2022-03-28 10:06:16'),
(10, 23, 321, 7, 'Dr L. Venkatesh', '2022-03-28 10:08:22'),
(12, 36, 358, 10, 'DR. L Venkatesh', '2022-04-01 07:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `escaltion_trigger_log`
--

CREATE TABLE `escaltion_trigger_log` (
  `id` int NOT NULL,
  `person_id` int DEFAULT NULL,
  `escalation_number` char(10) DEFAULT NULL,
  `gateway_type` char(5) DEFAULT NULL COMMENT 'email,sms',
  `esc_subject` varchar(200) DEFAULT NULL,
  `organization_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reactivate_escation` char(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_levels`
--

CREATE TABLE `group_levels` (
  `id` int NOT NULL,
  `organization_id` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(20) DEFAULT NULL,
  `esc_minitues` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_levels`
--

INSERT INTO `group_levels` (`id`, `organization_id`, `name`, `alias`, `esc_minitues`) VALUES
(2, 23, 'Top Management', 'L5', 60),
(3, 23, 'Sr Leaders', 'L4', 30),
(4, 23, 'Mid Leaders', 'L3', 20),
(5, 23, 'Jr Leaders', 'L2', 0),
(6, 23, 'Staff', 'L1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mapping_depatemnts_to_users`
--

CREATE TABLE `mapping_depatemnts_to_users` (
  `id` int NOT NULL,
  `department_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapping_depatemnts_to_users`
--

INSERT INTO `mapping_depatemnts_to_users` (`id`, `department_id`, `user_id`, `created_at`, `updated_at`) VALUES
(22, 20, 369, '2022-04-21 15:21:12', '2022-04-21 15:21:12'),
(21, 5, 353, '2022-04-21 15:20:23', '2022-04-21 15:20:23'),
(25, 20, 363, '2022-04-21 15:23:28', '2022-04-21 15:23:28'),
(24, 18, 351, '2022-04-21 15:22:53', '2022-04-21 15:22:53'),
(20, 15, 370, '2022-04-21 14:54:22', '2022-04-21 14:54:22'),
(19, 5, 370, '2022-04-21 14:54:22', '2022-04-21 14:54:22'),
(32, 16, 349, '2022-04-22 17:07:30', '2022-04-22 17:07:30'),
(31, 5, 349, '2022-04-22 17:07:30', '2022-04-22 17:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `organization_id` int DEFAULT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `organization_id`, `gateway_type`, `username`, `password`, `api_key`, `secret_key`, `port_no`, `from_name`, `from_address`, `mobile`, `host_name`, `is_active`) VALUES
(1, 23, 'sms', 'Rakesh.s@mahindrauniversity.edu.in', '46DUFF', 'sadf', NULL, 'afsdfa', 'asdfa', 'sdf', '', 'asdf', 'yes'),
(2, 36, 'email', 'omniv@incor.in', '123456', 'skjdfsjdkfhjkshsdfdfjk', NULL, '', '', '', '', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int NOT NULL,
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
  `role` int DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `license_startdate` date DEFAULT NULL,
  `license_period_year` varchar(20) DEFAULT NULL,
  `license_period_month` varchar(20) DEFAULT NULL,
  `is_active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `company_name`, `is_group`, `short_name`, `company_url`, `favicon_url`, `brand_logo`, `slug`, `address_1`, `address_2`, `pincode`, `city`, `country`, `gst_no`, `billing_address_1`, `billing_address_2`, `billing_pincode`, `billing_city`, `billing_country`, `admin_name`, `admin_email`, `admin_mobile`, `admin_alter_mobile`, `role`, `password`, `license_startdate`, `license_period_year`, `license_period_month`, `is_active`) VALUES
(23, 'OMNI Kukatpally', 'yes', 'Omni - Kukatpally', NULL, 'https://www.google.com/s2/favicons?domain=omnihospitals.in', 'kukatpally.png', 'omni-kukatpally', 'Kukataplly road no 12', 'near BJP Office', '500086', 'Hyderabad', 'india', '05ABDCE1234F1Z2', 'Kukataplly road no 12', 'near JNTU', '500086', 'Hyderabad', 'india', 'Abdullah Saleem1', 'omni@incor.in', '9700334152', '98745654135', 2, '9jGEzxdJ', '2021-12-16', '1', '4', 'yes'),
(36, 'Incor Health Pvt.ltd', 'no', 'Omni Vizag', 'https://omnihospitals.in/vizag', 'https://www.google.com/s2/favicons?domain=omnihospitals.in', 'vizag.png', 'omni-vizag', 'Chinna Waltair, Pedda Waltair,', '', '530003', 'Vizag', 'india', '05ABDCE1234F1Z2', 'Chinna Waltair, Pedda Waltair,', '', '530003', 'Vizag', 'india', 'omni vizag', 'omnivizag@incor.in', '8888001001', '', 2, 'sA05ZCc6', '2022-03-29', '1', '0', 'yes'),
(37, 'Incor Health Pvt.ltd', 'no', 'Omni Kothapet', 'https://omnihospitals.in/kothapet/', 'https://www.google.com/s2/favicons?domain=omnihospitals.in', 'kothapet.png', 'omni-kothapet', 'Sy. No.9/1/A, Plot No.W-11,B-9, Kothapet Rd, opp. PVT Market Building,', 'Near SVC Cinema Theatre, Dilsukhnagar,', '500036', 'Hyderabad', 'india', '05ABDCE1234F1Z2', 'Sy. No.9/1/A, Plot No.W-11,B-9, Kothapet Rd, opp. PVT Market Building,', 'Near SVC Cinema Theatre, Dilsukhnagar,', '500036', 'Hyderabad', 'india', 'omni kothapet', 'omnikothapet@incor.in', '8096369999', '', 2, 'whCyXMcq', '2022-03-29', '1', '0', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `passing_departments`
--

CREATE TABLE `passing_departments` (
  `id` int NOT NULL,
  `person_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `passing_page` char(20) NOT NULL DEFAULT 'no',
  `survey_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sorting` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persons_voice_message`
--

CREATE TABLE `persons_voice_message` (
  `id` int NOT NULL,
  `voice_file` text,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `person_id` int DEFAULT NULL,
  `organization_id` int DEFAULT NULL,
  `survey_id` int DEFAULT NULL,
  `logged_user_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons_voice_message`
--

INSERT INTO `persons_voice_message` (`id`, `voice_file`, `created_at`, `updated_at`, `person_id`, `organization_id`, `survey_id`, `logged_user_id`) VALUES
(1, 'd67bd45d18774140b6b83c8812e86d2a_PID_4.mp3', '2022-04-28 10:48:48', '2022-04-28 10:48:48', 4, 0, 0, 321),
(2, '6955c979867848778357c41a2ab806d5_PID_5.mp3', '2022-04-28 10:52:20', '2022-04-28 10:52:20', 5, 0, 0, 354);

-- --------------------------------------------------------

--
-- Table structure for table `processes`
--

CREATE TABLE `processes` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `organization_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processes`
--

INSERT INTO `processes` (`id`, `name`, `slug`, `organization_id`) VALUES
(4, 'Process2', 'process2', 23),
(5, 'Process1', 'process1', 23);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `organization_id` int DEFAULT NULL,
  `survey_id` int DEFAULT NULL,
  `label` varchar(200) DEFAULT NULL,
  `sublabel` varchar(255) DEFAULT NULL,
  `input_type` varchar(100) DEFAULT NULL,
  `sequence_order` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `next_qustion_id` int NOT NULL DEFAULT '0',
  `active` enum('yes','no') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `organization_id`, `survey_id`, `label`, `sublabel`, `input_type`, `sequence_order`, `next_qustion_id`, `active`) VALUES
(1, 23, 1, 'How likely is it that you would recommend OMNI Hospitals to your friends or family?', '', 'radio', 1, 0, 'yes'),
(2, 23, 1, 'Which department made you happy?', '', 'checkbox', 2, 5, 'yes'),
(3, 23, 1, 'Which department would you like to improve?', '', 'checkbox', 3, 6, 'yes'),
(4, 23, 1, 'Which department made you unhappy?', '', 'checkbox', 4, 7, 'yes'),
(5, 23, 1, 'What did you like about  *teamname*?', '', 'textarea', 5, 0, 'yes'),
(6, 23, 1, 'What could have been better in  *teamname*?', '', 'textarea', 6, 0, 'yes'),
(7, 23, 1, 'What went wrong with *teamname*?', '', 'textarea', 7, 0, 'yes'),
(11, 23, 3, 'How likely is it that you would recommend OMNI Hospitals to your friends or family?', '', 'radio', 1, 0, 'yes'),
(12, 23, 3, 'Which department made you happy?', '', 'checkbox', 2, 15, 'yes'),
(13, 23, 3, 'Which department would you like to improve?', '', 'checkbox', 3, 16, 'yes'),
(14, 23, 3, 'Which department made you unhappy?', '', 'checkbox', 4, 17, 'yes'),
(15, 23, 3, 'What did you like about  *teamname*?', '', 'textarea', 5, 0, 'yes'),
(16, 23, 3, 'What could have been better in  *teamname*?', '', 'textarea', 6, 0, 'yes'),
(17, 23, 3, 'What went wrong with *teamname*?', '', 'textarea', 7, 0, 'yes'),
(33, 36, 7, 'How likely is it that you would recommend OMNI Vizag Hospitals to your friends or family?', '', 'radio', 1, 0, 'yes'),
(34, 36, 7, 'What is the most important reason for recommending OMNI?', '', 'checkbox', 2, 15, 'yes'),
(35, 36, 7, 'What should change so that you would definitely recommend OMNI?', '', 'checkbox', 3, 16, 'yes'),
(36, 36, 7, 'What is the most important reason for NOT recommending OMNI?', '', 'checkbox', 4, 17, 'yes'),
(37, 36, 7, 'What did you like about  *teamname*?', '', 'textarea', 5, 0, 'yes'),
(38, 36, 7, 'What could have been better in  *teamname*?', '', 'textarea', 6, 0, 'yes'),
(39, 36, 7, 'What went wrong with *teamname*?', '', 'textarea', 7, 0, 'yes'),
(40, 36, 8, 'How likely is it that you would recommend OMNI Vizag Hospitals to your friends or family?', '', 'radio', 1, 0, 'yes'),
(41, 36, 8, 'What is the most important reason for recommending OMNI. Which Team Made You Happy ?', '', 'checkbox', 2, 37, 'yes'),
(42, 36, 8, 'What should change so that you would definitely recommend OMNI?', '', 'checkbox', 3, 38, 'yes'),
(43, 36, 8, 'What is the most important reason for NOT recommending OMNI?', '', 'checkbox', 4, 39, 'yes'),
(44, 36, 8, 'What did you like about  *teamname*?', '', 'textarea', 5, 0, 'yes'),
(45, 36, 8, 'What could have been better in  *teamname*?', '', 'textarea', 6, 0, 'yes'),
(46, 36, 8, 'What went wrong with *teamname*?', '', 'textarea', 7, 0, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` int NOT NULL,
  `organization_id` int DEFAULT NULL,
  `question_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `option_value` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `organization_id`, `question_id`, `department_id`, `option_value`) VALUES
(1, 23, 1, NULL, '0'),
(2, 23, 1, NULL, '1'),
(3, 23, 1, NULL, '2'),
(4, 23, 1, NULL, '3'),
(5, 23, 1, NULL, '4'),
(6, 23, 1, NULL, '5'),
(7, 23, 1, NULL, '6'),
(8, 23, 1, NULL, '7'),
(9, 23, 1, NULL, '8'),
(10, 23, 1, NULL, '9'),
(12, 23, 2, 5, 'Billing'),
(13, 23, 3, 5, 'Billing'),
(14, 23, 4, 5, 'Billing'),
(15, 23, 5, NULL, 'Enter your message here'),
(16, 23, 6, NULL, 'Enter your message here'),
(17, 23, 7, NULL, 'Enter your message here'),
(21, 23, 0, NULL, 'Any Other'),
(22, 23, 1, NULL, '10'),
(23, 23, 2, 8, 'Nursing'),
(25, 23, 2, 10, 'Pharmacy'),
(27, 23, 3, 8, 'Nursing'),
(29, 23, 3, 10, 'Pharmacy'),
(31, 23, 4, 8, 'Nursing'),
(33, 23, 4, 10, 'Pharmacy'),
(44, 23, 2, 15, 'Doctors'),
(45, 23, 3, 15, 'Doctors'),
(46, 23, 4, 15, 'Doctors'),
(47, 23, 2, 16, 'Food  and Beverages'),
(48, 23, 3, 16, 'Food  and Beverages'),
(49, 23, 4, 16, 'Food  and Beverages'),
(50, 23, 2, 17, 'Maintenance'),
(51, 23, 3, 17, 'Maintenance'),
(52, 23, 4, 17, 'Maintenance'),
(56, 23, 2, 18, 'Radiology'),
(57, 23, 3, 18, 'Radiology'),
(58, 23, 4, 18, 'Radiology'),
(65, 23, 11, NULL, '0'),
(66, 23, 11, NULL, '1'),
(67, 23, 11, NULL, '2'),
(68, 23, 11, NULL, '3'),
(69, 23, 11, NULL, '4'),
(70, 23, 11, NULL, '5'),
(71, 23, 11, NULL, '6'),
(72, 23, 11, NULL, '7'),
(73, 23, 11, NULL, '8'),
(74, 23, 11, NULL, '9'),
(76, 23, 15, NULL, 'Enter your message here'),
(77, 23, 16, NULL, 'Enter your message here'),
(78, 23, 17, NULL, 'Enter your message here'),
(79, 23, 12, 5, 'Billing'),
(80, 23, 13, 5, 'Billing'),
(81, 23, 14, 5, 'Billing'),
(82, 23, 12, 8, 'Nursing'),
(83, 23, 13, 8, 'Nursing'),
(84, 23, 14, 8, 'Nursing'),
(85, 23, 12, 10, 'Pharmacy'),
(86, 23, 13, 10, 'Pharmacy'),
(87, 23, 14, 10, 'Pharmacy'),
(88, 23, 12, 15, 'Doctors'),
(89, 23, 13, 15, 'Doctors'),
(90, 23, 14, 15, 'Doctors'),
(91, 23, 12, 16, 'Food And Beverages'),
(92, 23, 13, 16, 'Food And Beverages'),
(93, 23, 14, 16, 'Food And Beverages'),
(94, 23, 12, 17, 'Maintenance'),
(95, 23, 13, 17, 'Maintenance'),
(96, 23, 14, 17, 'Maintenance'),
(97, 23, 12, 18, 'Radiology'),
(98, 23, 13, 18, 'Radiology'),
(99, 23, 14, 18, 'Radiology'),
(100, 23, 12, 20, 'Laboratory'),
(101, 23, 13, 20, 'Laboratory'),
(102, 23, 14, 20, 'Laboratory'),
(103, 23, 11, NULL, '10'),
(122, 36, 33, NULL, '0'),
(123, 36, 33, NULL, '1'),
(124, 36, 33, NULL, '2'),
(125, 36, 33, NULL, '3'),
(126, 36, 33, NULL, '4'),
(127, 36, 33, NULL, '5'),
(128, 36, 33, NULL, '6'),
(129, 36, 33, NULL, '7'),
(130, 36, 33, NULL, '8'),
(131, 36, 33, NULL, '9'),
(132, 36, 40, NULL, '0'),
(133, 36, 40, NULL, '1'),
(134, 36, 40, NULL, '2'),
(135, 36, 40, NULL, '3'),
(136, 36, 40, NULL, '4'),
(137, 36, 40, NULL, '5'),
(138, 36, 40, NULL, '6'),
(139, 36, 40, NULL, '7'),
(140, 36, 40, NULL, '8'),
(141, 36, 40, NULL, '9'),
(142, 36, 34, 23, 'Billing'),
(143, 36, 35, 23, 'Billing'),
(144, 36, 36, 23, 'Billing'),
(145, 36, 41, 23, 'Billing'),
(146, 36, 42, 23, 'Billing'),
(147, 36, 43, 23, 'Billing'),
(148, 36, 34, 22, 'Nursing'),
(149, 36, 35, 22, 'Nursing'),
(150, 36, 36, 22, 'Nursing'),
(151, 36, 41, 22, 'Nursing'),
(152, 36, 42, 22, 'Nursing'),
(153, 36, 43, 22, 'Nursing'),
(154, 36, 0, NULL, 'Any Other'),
(155, NULL, 2, 24, 'Test'),
(156, NULL, 3, 24, 'Test'),
(157, NULL, 4, 24, 'Test'),
(158, NULL, 12, 24, 'Test'),
(159, NULL, 13, 24, 'Test'),
(160, NULL, 14, 24, 'Test'),
(161, NULL, 2, 25, 'Other'),
(162, NULL, 3, 25, 'Other'),
(163, NULL, 4, 25, 'Other'),
(164, NULL, 12, 25, 'Other'),
(165, NULL, 13, 25, 'Other'),
(166, NULL, 14, 25, 'Other'),
(167, NULL, 2, 26, 'House Keeping'),
(168, NULL, 3, 26, 'House Keeping'),
(169, NULL, 4, 26, 'House Keeping'),
(170, NULL, 12, 26, 'House Keeping'),
(171, NULL, 13, 26, 'House Keeping'),
(172, NULL, 14, 26, 'House Keeping');

-- --------------------------------------------------------

--
-- Table structure for table `rating_of_departments`
--

CREATE TABLE `rating_of_departments` (
  `id` int NOT NULL,
  `person_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `department_name` varchar(50) DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `organization_id` int DEFAULT NULL,
  `logged_user_id` int DEFAULT NULL,
  `survey_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rating_of_departments`
--

INSERT INTO `rating_of_departments` (`id`, `person_id`, `rating`, `department_name`, `department_id`, `organization_id`, `logged_user_id`, `survey_id`) VALUES
(1, 1, 7, 'Billing', 5, 23, 354, 1),
(2, 1, 7, 'Pharmacy', 10, 23, 354, 1),
(3, 2, 2, 'Billing', 5, 23, 370, 3),
(4, 2, 2, 'Doctors', 15, 23, 370, 3),
(5, 4, 7, 'Nursing', 8, 23, 321, 1),
(6, 5, 9, 'Pharmacy', 10, 23, 354, 1),
(7, 5, 9, 'Food and Beverages', 16, 23, 354, 1),
(8, 5, 9, 'Maintenance', 17, 23, 354, 1),
(9, 3, 1, 'Billing', 5, 23, 354, 1),
(10, 6, 5, 'Billing', 5, 23, 321, 1),
(11, 6, 5, 'Nursing', 8, 23, 321, 1),
(12, 6, 5, 'Other', 25, 23, 321, 1),
(13, 7, 5, 'Billing', 5, 23, 370, 3),
(14, 7, 5, 'House Keeping', 26, 23, 370, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rating_of_dep_activities`
--

CREATE TABLE `rating_of_dep_activities` (
  `id` int NOT NULL,
  `person_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activity_name` varchar(50) DEFAULT NULL,
  `activity_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `organization_id` int DEFAULT NULL,
  `logged_user_id` int DEFAULT NULL,
  `survey_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rating_of_dep_activities`
--

INSERT INTO `rating_of_dep_activities` (`id`, `person_id`, `rating`, `activity_name`, `activity_id`, `department_id`, `department_name`, `organization_id`, `logged_user_id`, `survey_id`) VALUES
(13, 2, 2, 'Registration', 4, 5, '', 23, 370, 3),
(14, 2, 2, 'Final Bill', 5, 5, '', 23, 370, 3),
(15, 2, 2, 'Attitude', 12, 15, '', 23, 370, 3),
(16, 2, 2, 'Sympathy', 28, 15, '', 23, 370, 3),
(17, 1, 7, 'Registration', 4, 5, '', 23, 370, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_levels`
--

CREATE TABLE `role_levels` (
  `id` int NOT NULL,
  `designation_id` int NOT NULL,
  `organization_id` int DEFAULT NULL,
  `role_level` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_levels`
--

INSERT INTO `role_levels` (`id`, `designation_id`, `organization_id`, `role_level`) VALUES
(2, 2, 23, 'TM1'),
(3, 2, 23, 'TM2'),
(4, 2, 23, 'TM3'),
(5, 3, 23, 'SL1'),
(6, 3, 23, 'SL2'),
(7, 3, 23, 'SL3'),
(8, 3, 23, 'SL4'),
(9, 4, 23, 'ML1'),
(10, 4, 23, 'ML2'),
(11, 4, 23, 'ML3'),
(12, 4, 23, 'ML4'),
(13, 5, 23, 'JL1'),
(14, 5, 23, 'JL2'),
(15, 5, 23, 'JL3'),
(16, 5, 23, 'JL4'),
(17, 6, 23, 'SS1'),
(18, 6, 23, 'SS2'),
(19, 6, 23, 'SS3'),
(20, 6, 23, 'SS4');

-- --------------------------------------------------------

--
-- Table structure for table `role_names`
--

CREATE TABLE `role_names` (
  `id` int NOT NULL,
  `organization_id` int NOT NULL,
  `designation_id` int NOT NULL,
  `designation_role_id` int NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_names`
--

INSERT INTO `role_names` (`id`, `organization_id`, `designation_id`, `designation_role_id`, `role_name`) VALUES
(22, 23, 6, 17, 'Feedback Executive'),
(23, 23, 4, 9, 'HOD'),
(24, 23, 3, 5, 'Unit Head'),
(25, 23, 2, 2, 'Group CEO'),
(27, 23, 6, 17, 'Customer Support');

-- --------------------------------------------------------

--
-- Table structure for table `sla_configurations`
--

CREATE TABLE `sla_configurations` (
  `id` int NOT NULL,
  `organization_id` int NOT NULL,
  `level_id` int NOT NULL,
  `x_minutes` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int NOT NULL,
  `organization_id` int DEFAULT '0',
  `admin_user_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `organization_id`, `admin_user_id`, `name`, `created_at`) VALUES
(2, 23, 321, 'Cardiology', '2022-03-28 07:04:00'),
(3, 23, 321, 'Radiology', '2022-03-28 07:04:21'),
(5, 23, 321, 'Diabetology', '2022-03-28 09:59:50'),
(6, 23, 321, 'Pediatrician', '2022-03-28 10:02:51'),
(7, 23, 321, 'Physician', '2022-03-28 10:08:03'),
(9, 36, 358, 'ENT', '2022-04-01 07:31:55'),
(10, 36, 358, 'Vascular surgery', '2022-04-01 07:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int NOT NULL,
  `admin_user_id` int DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `description` text,
  `isopen` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `organization_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `admin_user_id`, `title`, `slug`, `description`, `isopen`, `organization_id`) VALUES
(1, 321, 'IPD on bed', NULL, 'Tell us about your stay so far and help us improve our services', 'yes', 23),
(3, 321, 'Post Discharge', NULL, 'Tell us about your recent stay & treatment at Omni Hospitals and help us improve our services', 'yes', 23),
(7, 321, 'Pre Discharge', NULL, 'Tell us about your stay so far and help us improve our services', 'yes', 36),
(8, 321, 'Post Discharge', NULL, 'Tell us about your recent stay & treatment at Omni Hospitals and help us improve our servicesTell us about your recent stay & treatment at Omni Hospitals and help us improve our services', 'yes', 36),
(9, 321, 'OPD', 'opd', 'OPD Questionnaire', 'yes', 23);

-- --------------------------------------------------------

--
-- Table structure for table `survey_answered`
--

CREATE TABLE `survey_answered` (
  `id` int NOT NULL,
  `person_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `ticket_status` enum('opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back','closed_satisfied','closed_unsatisfied','patient_level_closure','process_level_closure','assigned','transferred','process_closure_req','process_closure_notreq') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `survey_id` int DEFAULT NULL,
  `organization_id` int DEFAULT NULL,
  `logged_user_id` int DEFAULT NULL,
  `question_id` int DEFAULT NULL,
  `answerid` int DEFAULT NULL,
  `answeredby_person` text,
  `department_activities` text,
  `department_name_id` int DEFAULT '0',
  `department_status` varchar(50) DEFAULT NULL,
  `ticket_remarks` text,
  `process_level_closure` varchar(250) DEFAULT NULL,
  `category_process_level` char(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `survey_answered`
--

INSERT INTO `survey_answered` (`id`, `person_id`, `rating`, `ticket_status`, `survey_id`, `organization_id`, `logged_user_id`, `question_id`, `answerid`, `answeredby_person`, `department_activities`, `department_name_id`, `department_status`, `ticket_remarks`, `process_level_closure`, `category_process_level`) VALUES
(1, 1, 7, 'opened', 1, 23, 354, 1, 8, '', NULL, 0, NULL, NULL, NULL, NULL),
(2, 1, 7, 'opened', 1, 23, 354, 3, 5, '', 'Registration', 5, 'process_closure_req', 'Process is required', '', ''),
(3, 1, 7, 'opened', 1, 23, 354, 3, 10, '', NULL, 10, NULL, NULL, NULL, NULL),
(4, 2, 2, 'closed_satisfied', 3, 23, 370, 11, 0, '', NULL, 0, NULL, 'Process coluse requred', '', ''),
(5, 2, 2, 'closed_satisfied', 3, 23, 370, 14, 5, '', 'Registration,Final Bill', 5, 'process_closure_req', 'Process coluse requred', '', ''),
(6, 2, 2, 'closed_satisfied', 3, 23, 370, 14, 15, '', 'Attitude,Sympathy', 15, 'process_closure_req', 'Process coluse requred', '', ''),
(7, 3, 3, 'opened', 1, 23, 370, 1, 4, '', NULL, 0, NULL, NULL, NULL, NULL),
(8, 4, 7, 'opened', 1, 23, 321, 1, 8, '', NULL, 0, NULL, NULL, NULL, NULL),
(9, 4, 7, 'opened', 1, 23, 321, 3, 8, '', NULL, 8, NULL, NULL, NULL, NULL),
(10, 5, 9, NULL, 1, 23, 354, 1, 10, '', NULL, 0, NULL, NULL, NULL, NULL),
(11, 5, 9, NULL, 1, 23, 354, 2, 10, '', NULL, 10, NULL, NULL, NULL, NULL),
(12, 5, 9, NULL, 1, 23, 354, 2, 16, '', NULL, 16, NULL, NULL, NULL, NULL),
(13, 5, 9, NULL, 1, 23, 354, 2, 17, '', NULL, 17, NULL, NULL, NULL, NULL),
(16, 3, 5, 'opened', 1, 23, 354, 1, 6, '', NULL, 0, NULL, NULL, NULL, NULL),
(17, 6, 5, 'opened', 1, 23, 321, 1, 6, '', NULL, 0, NULL, NULL, NULL, NULL),
(18, 6, 5, 'opened', 1, 23, 321, 4, 5, '', NULL, 5, NULL, NULL, NULL, NULL),
(19, 6, 5, 'opened', 1, 23, 321, 4, 8, '', NULL, 8, NULL, NULL, NULL, NULL),
(20, 6, 5, 'opened', 1, 23, 321, 4, 25, 'Other deparmtnes improve', NULL, 25, NULL, NULL, NULL, NULL),
(21, 7, 5, 'opened', 3, 23, 370, 11, 0, '', NULL, 0, NULL, NULL, NULL, NULL),
(22, 7, 5, 'opened', 3, 23, 370, 14, 5, '', NULL, 5, NULL, NULL, NULL, NULL),
(23, 7, 5, 'opened', 3, 23, 370, 14, 26, '', NULL, 26, NULL, NULL, NULL, NULL),
(24, 8, 9, NULL, 1, 23, 370, 1, 10, '', NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_persons`
--

CREATE TABLE `survey_persons` (
  `id` int NOT NULL,
  `assigned_ticket` int DEFAULT '0',
  `transferred_ticket` int DEFAULT '0',
  `ticket_series_number` int DEFAULT NULL,
  `ticker_final_number` varchar(50) DEFAULT NULL,
  `survey_id` int DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobile` varchar(150) DEFAULT NULL,
  `gender` char(10) DEFAULT NULL,
  `bed_name` varchar(100) DEFAULT NULL,
  `uhid` varchar(100) DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `doctor_id` int DEFAULT NULL,
  `ward_id` int DEFAULT NULL,
  `inpatient_id` varchar(50) DEFAULT NULL,
  `feedback_date` date DEFAULT NULL,
  `feedback_was_givenby` char(30) DEFAULT NULL,
  `patient_attender_name` varchar(200) DEFAULT NULL,
  `know_about_hospital` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `organization_id` int DEFAULT NULL,
  `logged_user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `survey_persons`
--

INSERT INTO `survey_persons` (`id`, `assigned_ticket`, `transferred_ticket`, `ticket_series_number`, `ticker_final_number`, `survey_id`, `rating`, `firstname`, `lastname`, `email`, `mobile`, `gender`, `bed_name`, `uhid`, `discharge_date`, `doctor_id`, `ward_id`, `inpatient_id`, `feedback_date`, `feedback_was_givenby`, `patient_attender_name`, `know_about_hospital`, `organization_id`, `logged_user_id`) VALUES
(1, 0, 0, 1, '#2201', 1, 7, 'Adilaxmi', NULL, 'adilaxmi@gmail.com', '9052691535', 'male', 'Bed-01', 'UHID-01', '2022-04-28', 8, 2, '78943', '2022-04-28', 'patient', NULL, 3, 23, 354),
(2, 0, 0, 2, '#2202', 3, 2, 'Gopal', NULL, 'gopal@deepredink.com', '7894561234', 'male', 'Bed-04', 'UHID-1', '2022-04-28', 9, 3, '78941', '2022-04-28', 'patient_attender', 'Teju', 3, 23, 370),
(3, 0, 0, 3, '#2203', 1, 5, 'Venkat', NULL, 'venkat@deepredink.com', '9052691535', 'male', 'Bed-01', 'UHID-1', '2022-04-28', 7, 2, '78941', '2022-04-28', 'patient', NULL, 2, 23, 370),
(4, 0, 0, 4, '#2204', 1, 7, 'jayaraju', NULL, 'jayaraju@deepredink.com', '9700334319', 'male', '451247', 'UHID4124', '2022-04-28', 8, 2, '01', '2022-04-28', 'patient', NULL, 3, 23, 321),
(5, 0, 0, 5, '#2205', 1, 9, 'ramesh', NULL, 'ramesh@deepredink.com', '9845124587', 'male', '45124', '4646', '2022-04-28', 8, 2, '02', '2022-04-28', 'patient', NULL, 3, 23, 354),
(6, 0, 0, 6, '#2206', 1, 5, 'Vijay', NULL, 'vijay@gmail.com', '9052691533', 'male', 'Bed-01', 'UHID-1', '2022-04-28', 8, 3, '78941', '2022-04-28', 'patient', NULL, 4, 23, 321),
(7, 0, 0, 7, '#2207', 3, 5, 'Raghu', NULL, 'raghu@gmail.com', '7894561234', 'male', 'Bed-01', 'UHID-1', '2022-04-28', 8, 2, '78941', '2022-04-28', 'patient', NULL, 3, 23, 370),
(8, 0, 0, 8, '#2208', 1, 9, 'test', NULL, 'test@gmail.com', '9090909090', 'male', 'Bed-01', 'UHID-1', '2022-04-28', 8, 2, '78941', '2022-04-28', 'patient', NULL, 3, 23, 370);

-- --------------------------------------------------------

--
-- Table structure for table `themeoptions`
--

CREATE TABLE `themeoptions` (
  `id` bigint UNSIGNED NOT NULL,
  `header_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facebook_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_cta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_conditions_cta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drno_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode_invoice` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` int NOT NULL,
  `assigned_user_id` int DEFAULT '0',
  `person_id` int DEFAULT NULL,
  `logged_user_id` int DEFAULT NULL,
  `organization_id` int DEFAULT NULL,
  `survey_id` int DEFAULT NULL,
  `ticket_status` enum('opened','phone_ringing_no_response','connected_refused_to_talk','connected_asked_for_call_back','closed_satisfied','closed_unsatisfied','patient_level_closure','process_level_closure','assigned','transferred','process_closure_req','process_closure_notreq') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ticket_remarks` text,
  `process_level_closure` text,
  `category_process_level` char(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_status_response_logs`
--

INSERT INTO `update_status_response_logs` (`id`, `assigned_user_id`, `person_id`, `logged_user_id`, `organization_id`, `survey_id`, `ticket_status`, `ticket_remarks`, `process_level_closure`, `category_process_level`) VALUES
(1, 0, 2, 370, 23, 3, 'opened', 'Taken feedback from patient (Updated by Venkat)', '', ''),
(2, 0, 2, 370, 23, 3, 'process_closure_req', 'Process coluse requred (Updated by Venkat)', '', ''),
(3, 0, 2, 370, 23, 3, 'process_closure_req', 'Process coluse requred (Updated by Venkat)', '', ''),
(4, 0, 2, 370, 23, 3, 'process_closure_req', 'Process coluse requred (Updated by Venkat)', '', ''),
(5, 0, 1, 354, 23, 1, 'process_closure_req', 'Process is required (Updated by Venkat)', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `organization_id` int DEFAULT '0',
  `department` int DEFAULT NULL,
  `reportingto` int DEFAULT NULL,
  `role` int DEFAULT '0',
  `designation_id` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  `decrypt_password` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` text,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `pincode` char(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `donot_send_newsletter` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `is_guest` int DEFAULT NULL,
  `guest_email` text,
  `sent_email` int DEFAULT NULL,
  `social_media` text,
  `identifier` text,
  `ip` text,
  `is_active_status` enum('0','1') NOT NULL DEFAULT '1',
  `remember_token` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_email_verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `organization_id`, `department`, `reportingto`, `role`, `designation_id`, `email`, `password`, `decrypt_password`, `phone`, `country`, `state`, `city`, `address`, `firstname`, `lastname`, `age`, `pincode`, `gender`, `profile`, `profile_pic`, `user_type`, `donot_send_newsletter`, `date`, `is_guest`, `guest_email`, `sent_email`, `social_media`, `identifier`, `ip`, `is_active_status`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`, `is_email_verified`) VALUES
(11, 0, NULL, NULL, 1, NULL, 'admin@nps.com', '$2y$10$kweucu9H/5FY4fCnuaHVEee20DvM27FvD9LpzDo4UgyklO6ioxWOi', '123456', '9090909090', 'india', 'Telangana', 'hyderabad', 'MALANI EXCEL,10-3-150 & 151, 4th floor, St. John\'s Road,\r\nBeside Ratnadeep Supermarket,Beside Ratnadeep Supermarket,', 'Incor', NULL, NULL, '500026', 'Male', '61a852217e298_1638421025.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'PKhnipHgm3TPaRqK1rtRJm9ytqWxyPUAk4Y7N42L96plrjiinIvclTPUU1Q7', '2021-07-02 01:33:40', '2021-10-25 14:35:03', '2021-09-28 07:53:01', 0),
(321, 23, NULL, 344, 2, NULL, 'omni@incor.in', '$2y$10$SZtNPmuqXm.BkegZR2dKfeCHg.Zel.a96U.hp82SB691seDVkfY2C', 'omni@123', '9705423333', NULL, NULL, NULL, NULL, 'sailakshmi', NULL, NULL, NULL, NULL, '61ce925f051ec_1640927839.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.208.26', '0', NULL, '2021-12-02 09:45:18', '2022-04-15 15:26:27', '2021-12-02 04:45:18', 1),
(349, 23, 5, 365, 3, NULL, 'tejasri.m@incor.in', '$2y$10$cnnik81DZvMwi4M48SgT4umxohcQDkUm74MKLX4fBVnJmhkjimOoe', 'teju@123', '7093794813', NULL, NULL, NULL, NULL, 'Teja sri-Billing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '124.123.166.143', '1', NULL, '2022-01-04 13:42:51', '2022-04-22 17:07:30', '2022-04-22 17:07:30', 1),
(351, 23, 18, 0, 3, NULL, 'omniradiology@incor.in', '$2y$10$oS91iL4GsttzY0yCw/ZYL.JWXIShVokpjd6nR7NpQcj8OD07j.N8.', 'ss49l35H', '9676799400', NULL, NULL, NULL, NULL, 'Abdullah Saleem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.115.215', '1', NULL, '2022-01-04 13:57:53', '2022-04-21 15:22:53', '2022-04-21 15:22:53', 1),
(352, 23, 5, 349, 4, NULL, 'omni@incor.in', '$2y$10$8HKegE/y2/.LuzeYawsGnuqLIRA5npAQwWLqAyCv0YtmMt6YdXmwm', 'sAilakshmi@9', '860099081', NULL, NULL, NULL, NULL, 'Abdullah Saleem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-01-07 16:59:26', '2022-04-12 13:19:26', '2022-01-07 17:33:19', 1),
(353, 23, 5, 0, 3, NULL, 'omni@incor.in', '$2y$10$p05q3miXPLSoIbu/23ZZr.rnxOdlMSDEoT80fxp7vZEZE1RZx27rG', 'E1Xz8vkS', '9898989898', NULL, NULL, NULL, NULL, 'Abdullah Saleem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.115.215', '1', NULL, '2022-03-25 17:00:14', '2022-04-21 15:20:23', '2022-04-21 15:20:23', 1),
(354, 23, 0, 0, 4, NULL, 'sailakshmi.nallamilli@gmail.com', '$2y$10$NF0BVHrJ8zIQY49013ZZiuEcilNfNm8fiREScd1l6.bEY9W3fz0Fm', '5UgKlW5Z', '9100090692', NULL, NULL, NULL, NULL, 'sailakshmi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-03-29 12:34:50', '2022-04-15 15:58:52', '2022-04-15 15:58:52', 1),
(356, 0, 0, 344, 1, NULL, 'coo@incor.in', '$2y$10$kweucu9H/5FY4fCnuaHVEee20DvM27FvD9LpzDo4UgyklO6ioxWOi', '123456', '9052691524', NULL, NULL, NULL, NULL, 'Omni COO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '157.47.62.38', '1', NULL, '2022-03-29 12:35:48', '2022-03-29 12:35:48', '2022-03-29 12:35:48', 1),
(358, 36, NULL, NULL, 2, NULL, 'omnivizag@incor.in', '$2y$10$XGJlF9XgP9R9FfFdPKwynu57dVXAS9aftW8HJAf4jcvCIIY44CjfG', 'GHRTDNH', '8888001001', NULL, NULL, NULL, NULL, 'omni vizag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106.195.74.138', '0', NULL, '2022-03-29 18:12:02', '2022-04-15 15:52:52', '2022-03-29 18:12:02', 1),
(359, 37, NULL, NULL, 2, NULL, 'omnikothapet@incor.in', '$2y$10$MA8bJ6Z5X112K1cpigYyDeC9fCT5NOwrzJ9P85VVqJldSZuu0dhXK', 'BzhihtvK', '8096369999', NULL, NULL, NULL, NULL, 'omni kothapet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.104.149', '0', NULL, '2022-03-29 18:38:53', '2022-03-29 18:38:53', '2022-03-29 18:38:53', 1),
(361, 36, 0, 349, 4, NULL, 'prasad.vizag@gmail.com', '$2y$10$eB44Wk5ZEF.tz82LIJIELOiOZmULR3MmUActfCcKW.v0yxctimrmC', '4gensv5f', '8787878787', NULL, NULL, NULL, NULL, 'Prasad Vizag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.206.58.0', '1', NULL, '2022-04-04 09:38:21', '2022-04-04 09:38:21', '2022-04-04 09:38:21', 1),
(362, 36, 23, 0, 3, NULL, 'vizag.hod@gmail.com', '$2y$10$HQr8E1OkvPgGAu9x8lTPdO.Ik2swwOIqiNiunk1MJlH3a9.bLVcDi', '6rrCSNcJ', '6969696969', NULL, NULL, NULL, NULL, 'Vizag HOD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.206.58.0', '1', NULL, '2022-04-04 09:39:31', '2022-04-04 09:39:31', '2022-04-04 09:39:31', 1),
(363, 23, 20, 365, 3, NULL, 'venkatesh.komire@incor.in', '$2y$10$ATeKIRN7As.eNFnU3/XebepUsHCSF3.zgF.9KonAoAI6WqVWm9GFS', 'k@venkatesh', '9154505086', NULL, NULL, NULL, NULL, 'Venkatesh-Lab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.115.215', '1', NULL, '2022-04-05 09:26:33', '2022-04-21 15:23:28', '2022-04-21 15:23:28', 1),
(365, 23, 20, 321, 5, NULL, 'haneef.sk@incor.in', '$2y$10$SBdASgzH0EkaZXVX72Xv4.I.a0cLp8NvhvXNT3WG.fyAqQ7EDPdGi', 'abbuhaneef', '9440997186', NULL, NULL, NULL, NULL, 'haneef-ops', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-04-15 15:52:26', '2022-04-15 16:42:49', '2022-04-15 15:55:52', 1),
(366, 23, 0, 0, 7, NULL, 'customer@deepredink.com', '$2y$10$YNFv/BSV5u8.5mWy.ih2ZePKOkf4NqceujK0o9.ON4msWNunO45p6', '7B7Z50dO', '9052691535', NULL, NULL, NULL, NULL, 'Rajesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.115.215', '1', NULL, '2022-04-18 11:19:56', '2022-04-18 11:19:56', '2022-04-18 11:19:56', 1),
(367, 23, 0, 0, 7, NULL, 'jayaraju@deepredink.com', '$2y$10$WQiatzQ00sIf0mOlNxjHHuzngo0NeYSUvq2nqSxo4GUKZE0tl.6Ka', 'uDOAQFk0', '8080598745', NULL, NULL, NULL, NULL, 'Jayaraju', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.115.215', '1', NULL, '2022-04-18 11:45:13', '2022-04-18 11:45:13', '2022-04-18 11:45:13', 1),
(368, 23, 0, 0, 7, NULL, '4kvenkatesh@gmail.com', '$2y$10$nCU75qgbtnJR3Tdwmp0gHeL0DnvXbt91uNBvxuXDaY0/QeVdB.Xg.', 'S7g1L6TL', '7896543234', NULL, NULL, NULL, NULL, 'venkatesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.107.250', '1', NULL, '2022-04-18 15:41:54', '2022-04-18 15:41:54', '2022-04-18 15:41:54', 1),
(369, 23, 20, 365, 3, NULL, 'tejurocks22@gmail.com', '$2y$10$KHNZKATKPGndoKAsob1V2.W5jcEp/11CXN2hnec7pk8n2ITJRGnPy', 'rCgsdt6a', '9100090692', NULL, NULL, NULL, NULL, 'pavani f n b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.115.215', '1', NULL, '2022-04-18 16:02:15', '2022-04-21 15:21:12', '2022-04-21 15:21:12', 1),
(370, 23, 5, 0, 3, NULL, 'venkat@deepredink.com', '$2y$10$UwYTAvRFXZjD9/31uP2t3Ojq.m1lO34PMN0v3EP7CJtH1vU3Coek6', 'JEkQ8rbp', '9052691535', NULL, NULL, NULL, NULL, 'Venkat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.115.215', '1', NULL, '2022-04-21 06:58:19', '2022-04-21 14:54:22', '2022-04-21 14:54:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `id` int NOT NULL,
  `organization_id` int DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `admin_user_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `organization_id`, `name`, `admin_user_id`, `created_at`) VALUES
(2, 23, 'General', 321, '2022-03-28 07:57:25'),
(3, 23, 'Pediatrici', 321, '2022-03-28 07:57:38'),
(5, 36, 'OP ward', 358, '2022-04-01 07:41:27');

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
-- Indexes for table `mapping_depatemnts_to_users`
--
ALTER TABLE `mapping_depatemnts_to_users`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `api_clients`
--
ALTER TABLE `api_clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_fields_configurables`
--
ALTER TABLE `customer_fields_configurables`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `escaltion_trigger_log`
--
ALTER TABLE `escaltion_trigger_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_levels`
--
ALTER TABLE `group_levels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mapping_depatemnts_to_users`
--
ALTER TABLE `mapping_depatemnts_to_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `passing_departments`
--
ALTER TABLE `passing_departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persons_voice_message`
--
ALTER TABLE `persons_voice_message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `processes`
--
ALTER TABLE `processes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `rating_of_departments`
--
ALTER TABLE `rating_of_departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rating_of_dep_activities`
--
ALTER TABLE `rating_of_dep_activities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `role_levels`
--
ALTER TABLE `role_levels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role_names`
--
ALTER TABLE `role_names`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sla_configurations`
--
ALTER TABLE `sla_configurations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `survey_answered`
--
ALTER TABLE `survey_answered`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `survey_persons`
--
ALTER TABLE `survey_persons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `themeoptions`
--
ALTER TABLE `themeoptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `update_status_response_logs`
--
ALTER TABLE `update_status_response_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
