-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 26, 2014 at 01:15 AM
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
-- Table structure for table `z_modules_fields`
--

CREATE TABLE `z_modules_fields` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `field_name` varchar(200) DEFAULT NULL,
  `field_display_name` varchar(200) DEFAULT NULL,
  `field_type` varchar(200) DEFAULT NULL,
  `searchable` int(1) DEFAULT NULL,
  `related_information` text,
  `sorting` int(11) NOT NULL DEFAULT '999',
  `encrypted` int(1) NOT NULL DEFAULT '0',
  `search_display_name` varchar(200) DEFAULT NULL,
  `help_text` text,
  `required` int(1) DEFAULT NULL,
  PRIMARY KEY (`field_id`),
  UNIQUE KEY `module_id` (`module_id`,`field_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `z_modules_fields`
--

INSERT INTO `z_modules_fields` (`field_id`, `module_id`, `field_name`, `field_display_name`, `field_type`, `searchable`, `related_information`, `sorting`, `encrypted`, `search_display_name`, `help_text`, `required`) VALUES
(1, 1, 'title', 'Title', 'varchar', 1, NULL, 5, 0, NULL, NULL, 1),
(2, 1, 'description', 'Description:', 'text', 1, NULL, 10, 1, NULL, NULL, NULL),
(3, 1, 'category', 'Category:', 'selectbox', 1, '{"1":"Men Seeking Women","2":"Women Seeking Men"}', 15, 0, NULL, NULL, 1),
(4, 1, 'age', 'Age:', 'int', 1, NULL, 20, 0, NULL, NULL, 1),
(5, 1, 'location', 'Location:', 'addressbox', 1, NULL, 1, 0, NULL, NULL, NULL),
(6, 1, 'virgin', 'Are you virgin?', 'checkbox', 1, NULL, 25, 0, 'Virgin', NULL, NULL),
(7, 1, 'images', 'Images', 'images', 0, NULL, 30, 0, NULL, NULL, NULL),
(8, 1, 'marital_status', 'Marital Status:', 'selectbox', 1, '{"1":"Single","2":"Separated","3":"Divorced","4":"Widowed","5":"Married"}', 35, 0, NULL, NULL, NULL),
(9, 1, 'body', 'Body:', 'selectbox', 1, '{"1":"Atheletic","2":"Average","3":"Big","4":"Curvy","5":"Fit","6":"Heavy","7":"HWP","8":"Skinny","9":"Thin"}', 40, 0, NULL, NULL, NULL),
(10, 1, 'height', 'Height', 'varchar', 0, NULL, 45, 0, NULL, NULL, NULL),
(11, 1, 'body_art', 'Body Art:', 'varchar', 0, NULL, 50, 0, NULL, NULL, NULL),
(12, 1, 'diet', 'Diet:', 'varchar', 0, NULL, 55, 0, NULL, NULL, NULL),
(13, 1, 'likes', 'Likes:', 'varchar', 0, NULL, 60, 0, NULL, NULL, NULL),
(14, 1, 'dislikes', 'Dislikes:', 'varchar', 0, NULL, 65, 0, NULL, NULL, NULL),
(15, 1, 'drinks', 'Drinks:', 'varchar', 0, NULL, 70, 0, NULL, NULL, NULL),
(16, 1, 'drugs', 'Drugs:', 'varchar', 0, NULL, 75, 0, NULL, NULL, NULL),
(17, 1, 'education', 'Education:', 'varchar', 0, NULL, 80, 0, NULL, NULL, NULL),
(18, 1, 'profession', 'Profession:', 'varchar', 0, NULL, 85, 0, NULL, NULL, NULL),
(19, 1, 'zodiac', 'Zodiac:', 'varchar', 0, NULL, 90, 0, NULL, NULL, NULL),
(20, 1, 'smoke', 'Smoke:', 'varchar', 0, NULL, 95, 0, NULL, NULL, NULL),
(21, 1, 'video', 'Video:', 'videos', 0, NULL, 31, 0, NULL, NULL, 0),
(22, 2, 'title', 'Title', 'varchar', 1, NULL, 1, 0, NULL, NULL, 1),
(23, 2, 'description', 'Description:', 'text', 1, NULL, 2, 0, NULL, NULL, 0),
(24, 2, 'videos', 'Videos:', 'videos', 0, NULL, 3, 0, NULL, NULL, 0),
(25, 2, 'urls', 'Related PDF or Other File URLS:', 'urls', 0, NULL, 4, 0, NULL, NULL, 0),
(26, 3, 'title', 'Title:', 'varchar', 1, NULL, 1, 0, NULL, NULL, 1),
(27, 3, 'description', 'Description:', 'text', 1, NULL, 2, 0, NULL, NULL, 0),
(28, 3, 'videos', 'Videos:', 'videos', 0, NULL, 3, 0, NULL, NULL, 0),
(29, 5, 'title', 'Title', 'varchar', 1, NULL, 1, 0, NULL, NULL, 0),
(30, 5, 'emails', 'List of Emails', 'text', 0, NULL, 2, 0, NULL, NULL, 0),
(31, 5, 'message', 'Message:', 'text', 0, NULL, 3, 0, NULL, NULL, 0),
(32, 5, 'urls', 'Related PDF or Other File URLS:', 'urls', 0, NULL, 4, 0, NULL, NULL, 0),
(33, 4, 'title', 'Group Name:', 'varchar', 1, NULL, 1, 0, NULL, NULL, 0),
(34, 4, 'location', 'Location:', 'addressbox', 1, NULL, 2, 0, NULL, NULL, 0),
(35, 4, 'description', 'Group Description:', 'text', 1, NULL, 3, 0, NULL, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
