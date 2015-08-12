-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2015 at 10:51 AM
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
-- Table structure for table `prefecture`
--

CREATE TABLE IF NOT EXISTS `prefecture` (
  `prefecture_id` int(10) unsigned NOT NULL,
  `prefecture_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `area_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prefecture`
--

INSERT INTO `prefecture` (`prefecture_id`, `prefecture_name`, `area_name`) VALUES
(1, '北海', '北海道・東北'),
(2, '青森', '北海道・東北'),
(3, '岩手', '北海道・東北'),
(4, '宮城', '北海道・東北'),
(5, '秋田', '北海道・東北'),
(6, '山形', '北海道・東北'),
(7, '福島', '北海道・東北'),
(8, '東京', '関東'),
(9, '神奈川', '関東'),
(10, '埼玉', '関東'),
(11, '千葉', '関東'),
(12, '茨城', '関東'),
(13, '栃木', '関東'),
(14, '群馬', '関東'),
(15, '山梨', '甲信越・北陸'),
(16, '新潟', '甲信越・北陸'),
(17, '長野', '甲信越・北陸'),
(18, '富山', '甲信越・北陸'),
(19, '石川', '甲信越・北陸'),
(20, '福井', '甲信越・北陸'),
(21, '愛知', '東海'),
(22, '岐阜', '東海'),
(23, '静岡', '東海'),
(24, '三重', '東海'),
(25, '大阪', '関西'),
(26, '兵庫', '関西'),
(27, '京都', '関西'),
(28, '滋賀', '関西'),
(29, '奈良', '関西'),
(30, '和歌山', '関西'),
(31, '鳥取', '中国・四国'),
(32, '島根', '中国・四国'),
(33, '岡山', '中国・四国'),
(34, '広島', '中国・四国'),
(35, '山口', '中国・四国'),
(36, '徳島', '中国・四国'),
(37, '香川', '中国・四国'),
(38, '愛媛', '中国・四国'),
(39, '高知', '中国・四国'),
(40, '福岡', '九州・沖縄'),
(41, '佐賀', '九州・沖縄'),
(42, '長崎', '九州・沖縄'),
(43, '熊本', '九州・沖縄'),
(44, '大分', '九州・沖縄'),
(45, '宮崎', '九州・沖縄'),
(46, '鹿児島', '九州・沖縄'),
(47, '沖縄', '九州・沖縄');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prefecture`
--
ALTER TABLE `prefecture`
  ADD PRIMARY KEY (`prefecture_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
