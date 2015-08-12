-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2015 at 12:42 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jsen`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_line`
--

CREATE TABLE IF NOT EXISTS `area_line` (
  `area_line_id` int(10) unsigned NOT NULL,
  `area_line_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prefecture_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(10) unsigned NOT NULL,
  `city_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prefecture_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_work`
--

CREATE TABLE IF NOT EXISTS `ci_work` (
  `work_id` int(10) unsigned NOT NULL,
  `work_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `salary` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `feature` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_work`
--

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE IF NOT EXISTS `feature` (
  `work_id` int(10) unsigned NOT NULL,
  `feature_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_work`
--

CREATE TABLE IF NOT EXISTS `group_work` (
  `system_work_id` int(10) unsigned NOT NULL,
  `group_work_id` int(10) unsigned NOT NULL,
  `group_work_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE IF NOT EXISTS `line` (
  `line_id` int(10) unsigned NOT NULL,
  `line_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `area_line_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prefecture`
--

CREATE TABLE IF NOT EXISTS `prefecture` (
  `prefecture_id` int(10) unsigned NOT NULL,
  `prefecture_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `area_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `station_id` int(10) unsigned NOT NULL,
  `station_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `line_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_work`
--

CREATE TABLE IF NOT EXISTS `system_work` (
  `system_work_id` int(10) unsigned NOT NULL,
  `system_work_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `station_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_line`
--
ALTER TABLE `area_line`
  ADD PRIMARY KEY (`area_line_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `ci_work`
--
ALTER TABLE `ci_work`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `group_work`
--
ALTER TABLE `group_work`
  ADD PRIMARY KEY (`group_work_id`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`line_id`);

--
-- Indexes for table `prefecture`
--
ALTER TABLE `prefecture`
  ADD PRIMARY KEY (`prefecture_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_id`,`line_id`);

--
-- Indexes for table `system_work`
--
ALTER TABLE `system_work`
  ADD PRIMARY KEY (`system_work_id`,`station_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_work`
--
ALTER TABLE `ci_work`
  MODIFY `work_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
