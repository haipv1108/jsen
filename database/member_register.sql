-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2015 at 04:06 PM
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
-- Table structure for table `member_register`
--

CREATE TABLE IF NOT EXISTS `member_register` (
  `user_id` int(10) unsigned NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name_furi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mail_address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(3) unsigned NOT NULL,
  `birthday` date NOT NULL,
  `phonenumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `current_job` smallint(5) unsigned NOT NULL,
  `level` tinyint(3) unsigned NOT NULL,
  `active` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_register`
--

INSERT INTO `member_register` (`user_id`, `user_name`, `user_name_furi`, `mail_address`, `password`, `gender`, `birthday`, `phonenumber`, `current_job`, `level`, `active`) VALUES
(1, 'Ha', 'nguyen ngoc ha', 'abc@gmail.com', '12345', 1, '1994-03-15', '0123456789', 1, 3, 0),
(2, 'ha123', 'ha111', '1234@gmail.com', '12345', 1, '1111-11-11', '12345678', 1, 2, 0),
(3, 'ha12345456', 'ha111', '123411@gmail.com', '12345', 0, '1111-11-11', '90274533', 2, 1, 0),
(4, 'mh371', 'mh371', 'mh471@gmail.com', '123456', 0, '1223-11-11', '1234567890', 2, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member_register`
--
ALTER TABLE `member_register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member_register`
--
ALTER TABLE `member_register`
  MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
