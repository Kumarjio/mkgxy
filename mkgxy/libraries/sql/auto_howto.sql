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
-- Table structure for table `auto_howto`
--

CREATE TABLE `auto_howto` (
  `id` varchar(50) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `videos` text,
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

--
-- Dumping data for table `auto_howto`
--

INSERT INTO `auto_howto` (`id`, `city_id`, `uid`, `title`, `description`, `videos`, `urls`, `rc_created_dt`, `rc_updated_dt`, `rc_deleted_dt`, `rc_status`, `rc_approved`, `rc_deleted`) VALUES
('271F6EDF-EF19-6CF2-093E-B6B2F5B98C35', 144001, '112913147917981568678', 'Authentic Sindhi Kadhi/Dal (Mixed Vegetable Curry) By Veena', 'One of the most popular Sindhi dishes- a healthy, yummy curry! Veena Gidwani shows you a simple way to make this healthy (and yummy) Sindhi Kadhi/ Dal in this video. So full of vegetables, the best way to make any meal wholesome!\r\n\r\n8 tbsps Besan or gram flour\r\n100 gms pumpkin or dudhi\r\n1 medium sized carrot\r\n1 medium sized brinjal\r\n2 drumsticks, diced\r\n2 medium sized carrots, cut round\r\n10-15 french beans, slit into half\r\n8-10 lady fingers (bhindi)\r\n10 to 12 cluster beans (gawar)\r\n1 onion\r\n2 medium sized potatoes, diced\r\n2 tsp methi seeds (fenugreek)\r\n2 tsp cumin needs\r\ntamarind soaked in a cup of water\r\n1/2 tsp red chilli powder\r\nturmeric powder (haldi)\r\n1 inch piece of jaggery\r\nsalt to taste\r\n8 tbsp vegetable oil\r\nginger, finely chopped\r\ngreen chillies, finely chopped\r\n10-12 curry leaves\r\ncoriander leaves, finely chopped\r\n4 cups of water', '["https:\\/\\/www.youtube.com\\/watch?v=FmPNB2ay8bU"]', '[]', '2014-11-24 07:59:22', '2014-11-24 07:59:22', NULL, 1, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
