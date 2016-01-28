-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Host: remote-mysql3.servage.net
-- Generation Time: Sep 01, 2014 at 06:42 PM
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
-- Table structure for table `base_data`
--

CREATE TABLE IF NOT EXISTS `base_data` (
  `base_id` varchar(50) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `contactbyphone` int(1) DEFAULT NULL,
  `contactbytext` int(1) DEFAULT NULL,
  `phonenumber` varchar(200) DEFAULT NULL,
  `contactname` varchar(200) DEFAULT NULL,
  `totalCost` float DEFAULT NULL,
  `showAddress` int(1) DEFAULT NULL,
  `images` text,
  `base_lat` float(20,12) DEFAULT NULL,
  `base_lng` float(20,12) DEFAULT NULL,
  `base_address` varchar(255) DEFAULT NULL,
  `base_created_dt` timestamp NULL DEFAULT NULL,
  `base_updated_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `base_status` int(1) NOT NULL DEFAULT '1',
  `base_soft_delete` int(1) NOT NULL DEFAULT '0',
  `base_soft_deleete_by` varchar(50) DEFAULT NULL,
  `base_soft_delete_dt` timestamp NULL DEFAULT NULL,
  `base_hard_delete` int(1) NOT NULL DEFAULT '0',
  `base_hard_delete_by` varchar(50) DEFAULT NULL,
  `base_hard_delete_dt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`base_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
