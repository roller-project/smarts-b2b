-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2018 at 01:22 AM
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
(1, 'thietkewebvip@gmail.com', '', 0, '2018-11-22 13:22:33');

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
(1, 'Demo Apps', 'localhost', '', 1, '', '2018-11-22 13:23:17');

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
(19, 1, 'Menu Vip 10', 'create-menu', '', 0, 0, 'slider'),
(20, 1, 'Menu Vip 1', 'create-menu-1543785256', '', 0, 0, 'slider'),
(21, 1, 'Test Menu', 'create-menu-1543785262', '', 20, 0, 'slider');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `app_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `apps_menu`
--
ALTER TABLE `apps_menu`
  MODIFY `menu_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `text_id` bigint(20) NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`app_id`) REFERENCES `apps` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE;
