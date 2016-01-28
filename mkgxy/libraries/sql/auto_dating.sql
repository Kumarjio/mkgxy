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
-- Table structure for table `auto_dating`
--

CREATE TABLE `auto_dating` (
  `id` varchar(50) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `showAddress` int(1) DEFAULT NULL,
  `clatitude` double DEFAULT NULL,
  `clongitude` double DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `category` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `virgin` int(11) DEFAULT NULL,
  `images` text,
  `video` text,
  `marital_status` int(11) DEFAULT NULL,
  `body` int(11) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `body_art` varchar(255) DEFAULT NULL,
  `diet` varchar(255) DEFAULT NULL,
  `likes` varchar(255) DEFAULT NULL,
  `dislikes` varchar(255) DEFAULT NULL,
  `drinks` varchar(255) DEFAULT NULL,
  `drugs` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `zodiac` varchar(255) DEFAULT NULL,
  `smoke` varchar(255) DEFAULT NULL,
  `rc_created_dt` datetime DEFAULT NULL,
  `rc_updated_dt` datetime DEFAULT NULL,
  `rc_deleted_dt` datetime DEFAULT NULL,
  `rc_status` int(1) NOT NULL DEFAULT '1',
  `rc_approved` int(1) NOT NULL DEFAULT '0',
  `rc_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `clatitude` (`clatitude`),
  KEY `clongitude` (`clongitude`),
  KEY `title` (`title`),
  KEY `category` (`category`),
  KEY `age` (`age`),
  KEY `virgin` (`virgin`),
  KEY `marital_status` (`marital_status`),
  KEY `body` (`body`),
  KEY `comboIndex` (`clatitude`,`clongitude`,`title`,`category`,`age`,`virgin`,`marital_status`,`body`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
