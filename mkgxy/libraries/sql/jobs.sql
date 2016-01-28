-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Host: remote-mysql3.servage.net
-- Generation Time: Aug 31, 2014 at 07:54 PM
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
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` varchar(50) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `compensation` varchar(255) DEFAULT NULL,
  `contactbyphone` int(1) DEFAULT NULL,
  `contactbytext` int(1) DEFAULT NULL,
  `phonenumber` varchar(200) DEFAULT NULL,
  `contactname` varchar(200) DEFAULT NULL,
  `totalCost` float DEFAULT NULL,
  `showAddress` int(1) DEFAULT NULL,
  `telecommuting` int(1) DEFAULT NULL,
  `part_time` int(1) DEFAULT NULL,
  `contract` int(1) DEFAULT NULL,
  `non_profit` int(1) DEFAULT NULL,
  `internship` int(1) DEFAULT NULL,
  `direct_contact` int(1) DEFAULT NULL,
  `disabilities` int(1) DEFAULT NULL,
  `job_lat` float(20,12) DEFAULT NULL,
  `job_lng` float(20,12) DEFAULT NULL,
  `job_address` varchar(255) DEFAULT NULL,
  `job_created_dt` timestamp NULL DEFAULT NULL,
  `job_updated_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `job_status` int(1) NOT NULL DEFAULT '1',
  `job_soft_delete` int(1) NOT NULL DEFAULT '0',
  `job_soft_deleete_by` varchar(50) DEFAULT NULL,
  `job_soft_delete_dt` timestamp NULL DEFAULT NULL,
  `job_hard_delete` int(1) NOT NULL DEFAULT '0',
  `job_hard_delete_by` varchar(50) DEFAULT NULL,
  `job_hard_delete_dt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
