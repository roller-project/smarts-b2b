-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2018 at 12:49 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `b2bexchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `is_active`, `created`) VALUES
(3, 'thietkewebvip@gmail.com', 'a131b831377a7ecb892750b1c2d118aaeca47647', 1, '2018-12-03 23:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `app_id` bigint(20) NOT NULL,
  `app_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `app_domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `app_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `app_author` bigint(20) NOT NULL,
  `app_config` text COLLATE utf8_unicode_ci NOT NULL,
  `app_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`app_id`, `app_name`, `app_domain`, `app_url`, `app_author`, `app_config`, `app_created`) VALUES
(2, 'Demo Apps', 'develop.com', 'demo-apps', 3, '', '2018-12-04 00:46:48'),
(3, 'Sell Off', 'anhkhoa.com', 'sell-off', 3, '', '2018-12-04 11:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `apps_menu`
--

CREATE TABLE `apps_menu` (
  `menu_id` bigint(20) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `menu_sort` int(2) NOT NULL,
  `menu_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apps_menu`
--

INSERT INTO `apps_menu` (`menu_id`, `app_id`, `menu_name`, `menu_url`, `menu_icon`, `parent_id`, `menu_sort`, `menu_type`) VALUES
(22, 2, 'Room Data', 'room-data', '', 0, 0, 'slider');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `text_id` bigint(20) NOT NULL,
  `text_contents` longtext COLLATE utf8_unicode_ci NOT NULL,
  `text_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `menu_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `team_group_id` bigint(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plance`
--

CREATE TABLE `plance` (
  `plance_id` int(10) NOT NULL,
  `account_id` bigint(20) NOT NULL,
  `root_account_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `limit_apps` int(10) NOT NULL,
  `limit_hdd` int(10) NOT NULL,
  `limit_bandwith` int(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plance`
--

INSERT INTO `plance` (`plance_id`, `account_id`, `root_account_email`, `limit_apps`, `limit_hdd`, `limit_bandwith`, `created`, `name`) VALUES
(1, 3, '', 1, 1, 1, '2018-12-03 23:44:11', 'Fee Trader');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` bigint(20) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `account_id` bigint(20) NOT NULL,
  `can_read` int(1) NOT NULL,
  `can_write` int(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `app_domain` (`app_domain`),
  ADD KEY `app_author` (`app_author`);

--
-- Indexes for table `apps_menu`
--
ALTER TABLE `apps_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `app_id` (`app_id`) USING BTREE,
  ADD KEY `menu_url` (`menu_url`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`text_id`),
  ADD KEY `app_id` (`app_id`),
  ADD KEY `team_group_id` (`team_group_id`),
  ADD KEY `menu_url` (`menu_url`);

--
-- Indexes for table `plance`
--
ALTER TABLE `plance`
  ADD PRIMARY KEY (`plance_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `app_id` (`app_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `app_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `apps_menu`
--
ALTER TABLE `apps_menu`
  MODIFY `menu_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `text_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plance`
--
ALTER TABLE `plance`
  MODIFY `plance_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `apps`
--
ALTER TABLE `apps`
  ADD CONSTRAINT `apps_ibfk_1` FOREIGN KEY (`app_author`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apps_menu`
--
ALTER TABLE `apps_menu`
  ADD CONSTRAINT `apps_menu_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `apps` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `apps` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_2` FOREIGN KEY (`team_group_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_ibfk_3` FOREIGN KEY (`menu_url`) REFERENCES `apps_menu` (`menu_url`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plance`
--
ALTER TABLE `plance`
  ADD CONSTRAINT `plance_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`app_id`) REFERENCES `apps` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE;
