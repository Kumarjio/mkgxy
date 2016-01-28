-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Host: remote-mysql3.servage.net
-- Generation Time: Sep 01, 2014 at 12:02 AM
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
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `history_id` varchar(50) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `private` int(1) NOT NULL DEFAULT '0',
  `history_lat` float(20,12) DEFAULT NULL,
  `history_lng` float(20,12) DEFAULT NULL,
  `history_address` varchar(255) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `history_date` timestamp NULL DEFAULT NULL,
  `history_created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `history_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
