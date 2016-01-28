-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 26, 2014 at 01:14 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `consultl_mkgxymain`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_life_reminder`
--

CREATE TABLE `auto_life_reminder` (
  `id` varchar(50) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `emails` text,
  `message` text,
  `urls` text,
  `rc_created_dt` datetime DEFAULT NULL,
  `rc_updated_dt` datetime DEFAULT NULL,
  `rc_deleted_dt` datetime DEFAULT NULL,
  `rc_status` int(1) NOT NULL DEFAULT '1',
  `rc_approved` int(1) NOT NULL DEFAULT '0',
  `rc_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `comboIndex` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
