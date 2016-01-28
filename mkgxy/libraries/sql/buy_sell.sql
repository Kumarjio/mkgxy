-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Host: remote-mysql3.servage.net
-- Generation Time: Sep 01, 2014 at 12:49 PM
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
-- Table structure for table `buy_sell`
--

CREATE TABLE IF NOT EXISTS `buy_sell` (
  `buy_sell_id` varchar(50) NOT NULL,
  `base_id` varchar(50) NOT NULL,
  `price` float(20,12) DEFAULT NULL,
  `size_dimens` varchar(255) DEFAULT NULL,
  `condition` enum('new','like new','excellent','good','fair','other') DEFAULT NULL,
  `condition_other` varchar(200) NOT NULL,
  `owner_dealer` enum('owner','dealer') NOT NULL DEFAULT 'owner',
  `buy_sell_type` enum('buy','sell') DEFAULT NULL,
  PRIMARY KEY (`buy_sell_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
