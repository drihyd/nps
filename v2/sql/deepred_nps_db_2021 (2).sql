-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2021 at 06:57 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deepred_nps_db_2021`
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
(4, 25, 'Billing', 'on', '2021-12-03 11:38:23', '2021-12-03 11:38:23');

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
(27, 'Deployment Private Limited', 'yes', 'DPL', NULL, 'Financial District, Nanakramguda, Paayilis Rd', 'Gachibowli, Nanakaramguda', '500128', 'Warangal', 'india', '09LXCCE1234F1Q2', 'Financial District, Nanakramguda, Paayilis Rd', 'Gachibowli, Nanakaramguda', '500128', 'Warangal', 'india', 'Harish', 'harish.gorantla123@gmail.com', '9032555564', '', 2, 'qKf2TPbL', '2021-12-03', '1', '0', 'yes', '2021-12-03 11:33:28', '2021-12-03 16:33:28');

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
(1, 23, 1, 'How likely are you to refer omni hospital to your friends & family?', '1 is bad, 10 is good(i.e., \"How much pain are you in right now?\")', 'radio', 1, '2021-12-02 05:29:14', '2021-12-02 10:29:14', 0, 'yes'),
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
  `option_value` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `question_id`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '2021-12-02 01:47:31', '2021-12-02 01:47:31'),
(2, 1, '2', '2021-12-02 01:47:31', '2021-12-02 01:47:31'),
(3, 1, '3', '2021-12-02 01:47:31', '2021-12-02 01:47:31'),
(4, 1, '4', '2021-12-02 01:47:31', '2021-12-02 01:47:31'),
(5, 1, '5', '2021-12-02 01:47:31', '2021-12-02 01:47:31'),
(6, 1, '6', '2021-12-02 01:47:31', '2021-12-02 01:47:31'),
(7, 1, '7', '2021-12-02 01:47:31', '2021-12-02 01:47:31'),
(8, 1, '8', '2021-12-02 01:47:31', '2021-12-02 01:47:31'),
(9, 1, '9', '2021-12-02 01:47:31', '2021-12-02 01:47:31'),
(10, 1, '10', '2021-12-02 01:47:31', '2021-12-02 01:47:31'),
(12, 2, 'Billing', '2021-12-02 08:10:57', '2021-12-02 08:10:57'),
(13, 3, 'Billing', '2021-12-02 08:11:14', '2021-12-02 08:11:14'),
(14, 4, 'Billing', '2021-12-02 08:11:25', '2021-12-02 08:11:25'),
(15, 5, 'Enter your message here', '2021-12-02 08:22:55', '2021-12-02 08:22:55'),
(16, 6, 'Enter your message here', '2021-12-02 08:23:04', '2021-12-02 08:23:04'),
(17, 7, 'Enter your message here', '2021-12-02 08:23:14', '2021-12-02 08:23:14'),
(18, 2, 'Cleaning', '2021-12-02 08:10:57', '2021-12-02 08:10:57'),
(19, 3, 'Cleaning', '2021-12-02 08:11:14', '2021-12-02 08:11:14'),
(20, 4, 'Cleaning', '2021-12-02 08:11:25', '2021-12-02 08:11:25'),
(21, 0, 'Any Other', '2021-12-02 08:11:25', '2021-12-02 08:11:25');

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
(1, 321, 'OMNI Feedback Survey', 'To improve your experiences, can you please help us by answering these simple questions in the survey.', 'yes', '2021-12-06 10:11:36', '2021-12-06 10:11:36', 23);

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
  `person_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_answered`
--

INSERT INTO `survey_answered` (`id`, `survey_id`, `organization_id`, `logged_user_id`, `question_id`, `answerid`, `answeredby_person`, `person_id`, `created_at`, `updated_at`) VALUES
(18, 1, 23, 322, 1, 8, '', 3, '2021-12-06 11:50:12', '2021-12-06 11:50:12'),
(20, 1, 23, 322, 3, 19, '', 3, '2021-12-06 11:50:16', '2021-12-06 11:50:16'),
(21, 1, 23, 322, 6, 19, 'Loreem ipsums Loreem ipsums Loreem ipsums Loreem ipsums Loreem ipsums', 3, '2021-12-06 11:50:21', '2021-12-06 11:50:21'),
(22, 1, 23, 322, 6, 21, 'need improve staff', 3, '2021-12-06 11:50:26', '2021-12-06 11:50:26');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `organization_id` int(11) DEFAULT NULL,
  `logged_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_persons`
--

INSERT INTO `survey_persons` (`id`, `survey_id`, `firstname`, `lastname`, `email`, `mobile`, `created_at`, `updated_at`, `organization_id`, `logged_user_id`) VALUES
(1, 1, 'jayaraju', NULL, 'jayaraju@deepredink.com', '9700334319', '2021-12-06 11:49:52', '2021-12-06 11:49:52', 23, 322),
(2, 1, 'venkat', NULL, 'venkat@deepredink.com', '9700334356', '2021-12-06 15:13:45', '2021-12-06 15:13:45', 23, NULL),
(3, 1, 'priya', NULL, 'priya@deepredink.com', '9752154158', '2021-12-06 16:41:48', '2021-12-06 16:41:48', 23, NULL);

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
(1, '6197120450963_1637290500.png', NULL, '619712046c2d1_1637290500.png', NULL, 'https://www.facebook.com/taruni.in', 'https://twitter.com/TaruniOfficial', NULL, 'https://www.instagram.com/taruni.in/', 'https://in.pinterest.com/taruniOfficial/', 'https://www.youtube.com/channel/UCecFAgCOVpGA5g0ZnlJvvvQ', '© 2021 NPS - All Rights Reserved.', NULL, NULL, NULL, NULL, '8977528118', '36AACCT8644E1Z8 [ Telangana (36) ]', 'Taruni Clothing Pvt Ltd Malani Excel', '10-3-150 $151', 'St.Johns Road', 'Beside Ratnadeep Sup. Market', 'Secunderabad', 'Telangana', '500026', NULL, '2021-11-18 21:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `organization_id`, `role`, `email`, `password`, `decrypt_password`, `phone`, `country`, `state`, `city`, `address`, `firstname`, `lastname`, `age`, `pincode`, `gender`, `profile`, `profile_pic`, `user_type`, `donot_send_newsletter`, `date`, `is_guest`, `guest_email`, `sent_email`, `social_media`, `identifier`, `ip`, `is_active_status`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`, `is_email_verified`) VALUES
(11, NULL, 1, 'admin@nps.com', '$2y$10$kweucu9H/5FY4fCnuaHVEee20DvM27FvD9LpzDo4UgyklO6ioxWOi', NULL, '9090909090', 'india', 'Telangana', 'hyderabad', 'MALANI EXCEL,10-3-150 & 151, 4th floor, St. John\'s Road,\r\nBeside Ratnadeep Supermarket,Beside Ratnadeep Supermarket,', 'Incor', NULL, NULL, '500026', 'Male', '61a852217e298_1638421025.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'c0rfsBDjhWMKgVtsZZLjrfNZKpjuJ7iLKgNgegJe2FsLJxzqAMjkWacNSs8L', '2021-07-02 01:33:40', '2021-10-25 14:35:03', '2021-09-28 07:53:01', 0),
(316, 20, 2, 'venkat@deepredink.com', '$2y$10$BHWJhiM81P6.JJNwOIt./.5P.VPohOk7Sz0ZzUTNKXu75XaibY0iu', '0qb1RVtg', '9052691535', NULL, NULL, NULL, NULL, 'Venkat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '124.123.180.79', '0', NULL, '2021-11-30 16:52:54', '2021-11-30 16:52:54', '2021-11-30 11:52:54', 1),
(317, 21, 2, 'sads@deepredink.com', '$2y$10$7AS3byAR87DBLClRGMjEu.Th7YHE6RxFaIIxnXOW8fS7UcLVVZQR2', 'hyeD1p66', '988345678', NULL, NULL, NULL, NULL, 'Aditya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.104.149', '0', NULL, '2021-12-01 17:14:08', '2021-12-01 17:14:08', '2021-12-01 12:14:08', 1),
(318, 22, 2, 'amazon@gmail.com', '$2y$10$m2FL.05H3fFwwZHV85apB.xP5vwJSEOgMxerHd7lC2ix2gjG7fUQ6', 'h1j7sMnC', '9700334319', NULL, NULL, NULL, NULL, 'amazon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.211.207', '0', NULL, '2021-12-01 17:39:47', '2021-12-01 17:39:47', '2021-12-01 12:39:47', 1),
(319, 20, 3, 'hod@deepredink.com', '$2y$10$BHWJhiM81P6.JJNwOIt./.5P.VPohOk7Sz0ZzUTNKXu75XaibY0iu', '0qb1RVtg', '9052691535', NULL, NULL, NULL, NULL, 'Venkat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '124.123.180.79', '0', NULL, '2021-11-30 16:52:54', '2021-11-30 16:52:54', '2021-11-30 11:52:54', 1),
(320, NULL, 4, 'executive@gmail.com', '$2y$10$SoknHNd3Zm0ciG1sCz75kudKobkKfGIMU6JVAEmD2GWjAUDPVKZIG', '1NI9SmGa', '9700334319', NULL, NULL, NULL, NULL, 'Executive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.211.207', '0', NULL, '2021-12-01 18:00:04', '2021-12-01 18:00:04', '2021-12-01 13:00:04', 1),
(321, 23, 2, 'omni@gmail.com', '$2y$10$DX4jVt5OQsNwq4uJ799hJ.2OT/6HjQOhjdy0/V74iThMuetzvcLgW', '9OUlXBR0', '9700334152', NULL, NULL, NULL, NULL, 'Omni user1', NULL, NULL, NULL, NULL, '61a8535a1b098_1638421338.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.208.26', '0', NULL, '2021-12-02 09:45:18', '2021-12-02 09:45:18', '2021-12-02 04:45:18', 1),
(322, 23, 4, 'testuser@gmail.com', '$2y$10$3sd/OrFKc.dFfY/QGKc1I.B06DkIvNg/stZLCKhMUhR6XFtzuUhQy', 'r5qEp4Jt', '9052691535', NULL, NULL, NULL, NULL, 'testuser 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '49.205.208.26', '1', NULL, '2021-12-02 10:04:17', '2021-12-02 10:04:49', '2021-12-02 05:04:49', 1),
(323, 25, 2, 'harish.gorantla123@gmail.com', '$2y$10$N4ADSzMNLc7oTfqMMUOp7.nzUZxUtVmXRdUalyRGxErMKRMmEVt/.', '3nCtxo86', '9032555564', NULL, NULL, NULL, NULL, 'Harish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183.82.104.149', '0', NULL, '2021-12-03 16:26:47', '2021-12-03 16:26:47', '2021-12-03 11:26:47', 1);

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
(4, 'Executive', 'general', '2021-09-16 06:34:08', '2021-09-16 06:34:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `survey_answered`
--
ALTER TABLE `survey_answered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `survey_persons`
--
ALTER TABLE `survey_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `themeoptions`
--
ALTER TABLE `themeoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
