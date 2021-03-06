-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 26, 2014 at 01:13 AM
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
-- Table structure for table `auto_pre_comments`
--

CREATE TABLE `auto_pre_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(50) DEFAULT NULL,
  `comment_uid` varchar(50) DEFAULT NULL,
  `comments` text,
  `comment_created_dt` datetime DEFAULT NULL,
  `comment_updated_dt` datetime DEFAULT NULL,
  `comment_deleted_dt` datetime DEFAULT NULL,
  `comment_status` int(1) DEFAULT '1',
  `comment_approved` int(1) DEFAULT '0',
  `comment_deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
