-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2021 at 01:14 AM
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
(16, 'Amazon', 'yes', 'amzn', NULL, 'Financial District, Nanakramguda, Paayilis Rd', 'Gachibowli, Nanakaramguda', '500032', 'Hyderabad', 'india', '122222122222222jgfutfyutfuifiuyglkglugh', 'Financial District, Nanakramguda, Paayilis Rd', 'Gachibowli, Nanakaramguda', '500032', 'Hyderabad', 'india', 'Harish', 'harish.babu@deepredink.com', '9032555564', '', NULL, NULL, '2021-11-26', '1', '0', 'yes', '2021-11-26 10:32:43', '2021-11-26 15:32:43'),
(17, 'Deepredink', 'no', 'DRI', NULL, 'Kavuri Hills', 'Kavuri Hills', '500086', 'Hyd', 'india', 'GBNDD4124578548', 'Kavuri Hills', 'Kavuri Hills', '500086', 'Hyd', 'india', 'vamsi kollu', 'kolluvamsi981@gmail.com', '9700334319', '', 2, 'EwMuxAC1', NULL, NULL, NULL, 'yes', '2021-11-26 12:11:07', '2021-11-26 17:11:07'),
(18, 'Amazon', 'no', 'AMI', NULL, 'Kavri Hills', 'Kavri Hills', '500086', 'Hyderabad', 'india', 'GHDD4521452458', 'Kavri Hills', 'Kavri Hills', '500086', 'Hyderabad', 'india', 'harish', 'harish.gorantla123@gmail.com', '970334319', '', 2, 'BOwODuvu', '2021-11-26', '5', '2', 'yes', '2021-11-26 12:19:38', '2021-11-26 17:19:38'),
(19, 'Deep Blue Company', 'no', 'DBC', NULL, 'Jubilee Enclave', '', '500081', 'Hyderabad', 'india', 'BCJ123ZSDSDC', 'Jubilee Enclave', '', '500081', 'Hyderabad', 'india', 'Ranjith', 'ranjith@deepredink.com', '9885047096', '', 2, 'DrOPPmt1', '2021-11-30', '1', '0', 'yes', '2021-11-30 04:51:51', '2021-11-30 09:51:51');

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
  `role` int(11) DEFAULT 0,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
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

INSERT INTO `users` (`id`, `role`, `email`, `password`, `phone`, `country`, `state`, `city`, `address`, `firstname`, `lastname`, `age`, `pincode`, `gender`, `profile`, `profile_pic`, `user_type`, `donot_send_newsletter`, `date`, `is_guest`, `guest_email`, `sent_email`, `social_media`, `identifier`, `ip`, `is_active_status`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`, `is_email_verified`) VALUES
(11, 1, 'admin@nps.com', '$2y$10$kweucu9H/5FY4fCnuaHVEee20DvM27FvD9LpzDo4UgyklO6ioxWOi', '9090909090', 'india', 'Telangana', 'hyderabad', 'MALANI EXCEL,10-3-150 & 151, 4th floor, St. John\'s Road,\r\nBeside Ratnadeep Supermarket,Beside Ratnadeep Supermarket,', 'Incor', 'groups', NULL, '500026', 'Male', '6197174f63c0d_1637291855.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Iu8RTFFDDmBP5tNNIhCLsllqxFLXjwVlTbJEZF0SbPr5Z2FWL1iET3x138CS', '2021-07-02 01:33:40', '2021-10-25 14:35:03', '2021-09-28 07:53:01', 0),
(310, 2, 'kolluvamsi981@gmail.com', '$2y$10$VPf9GifbzZuxScob6I6idOTx20kr74x8TYdAnrZQQg6xr06uvaEMy', '9700334319', NULL, NULL, NULL, NULL, 'vamsi kollu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2021-11-26 07:05:31', NULL),
(311, 2, 'kolluvamsi981@gmail.com', '$2y$10$ZBldE2hfNv7qEZT8bro0Yezcq38nWepBtPvxUx.OKFpy66auePwRy', '9700334319', NULL, NULL, NULL, NULL, 'vamsi kollu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2021-11-26 07:09:08', NULL),
(312, 2, 'kolluvamsi981@gmail.com', '$2y$10$b327zupelxmRygTwmopBG.Jo/gKEwuKivNThOt0nGmJGOprSU9Ey6', '9700334319', NULL, NULL, NULL, NULL, 'vamsi kollu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2021-11-26 07:11:08', NULL),
(313, 2, 'harish.babu@deepredink.com', '$2y$10$tmYfftiaRir4qFfR16l0OuPXcPK2yRJ5kMrzMqHd9WV6LOHFlwfxa', '970334319', NULL, NULL, NULL, NULL, 'harish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2021-11-26 07:17:05', NULL),
(314, 2, 'harish.gorantla123@gmail.com', '$2y$10$rx3gSr/jYQb2EM9VY8OiSu7L2a4RaRGoZW.AN0Bl.0GFYp4QG4Q1O', '970334319', NULL, NULL, NULL, NULL, 'harish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2021-11-26 07:19:29', 1),
(315, 2, 'ranjith@deepredink.com', '$2y$10$O6DYumK8DIQnt1GA8J5M.uGuTbYpJLZEn5EwhEPp3uXCYc01bcZGG', '9885047096', NULL, NULL, NULL, NULL, 'Ranjith', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2021-11-29 23:51:26', NULL);

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
(2, 'Financial Manager', '', '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(3, 'Content Manager', '', '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(4, 'General', 'general', '2021-09-16 06:34:08', '2021-09-16 06:34:22'),
(5, 'Guest Customer', 'guest_cust', '2021-09-16 06:34:08', '2021-09-16 06:34:22');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `themeoptions`
--
ALTER TABLE `themeoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
