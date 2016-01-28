-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Host: remote-mysql3.servage.net
-- Generation Time: Aug 25, 2014 at 06:13 PM
-- Server version: 5.5.25
-- PHP Version: 5.2.42-servage30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rollypolly`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE IF NOT EXISTS `businesses` (
  `biz_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `biz_name` varchar(255) DEFAULT NULL,
  `placeid` varchar(500) DEFAULT NULL,
  `biz_lat` float DEFAULT NULL,
  `biz_lng` float DEFAULT NULL,
  `details` text,
  `owner_id` varchar(50) DEFAULT NULL,
  `owner_created_id` datetime DEFAULT NULL,
  `owner_updated_dt` datetime DEFAULT NULL,
  `owner_flag` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`biz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `businesses`
--

