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
-- Table structure for table `z_modules`
--

CREATE TABLE `z_modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(200) DEFAULT NULL,
  `menu_display_name` varchar(200) DEFAULT NULL,
  `module_status` int(1) NOT NULL DEFAULT '1',
  `parent` varchar(50) NOT NULL DEFAULT 'Root',
  `display_list_template` varchar(50) NOT NULL DEFAULT 'Default',
  `display_detail_template` varchar(50) NOT NULL DEFAULT 'Default',
  `browse_page` int(1) NOT NULL DEFAULT '1',
  `my_page` int(1) NOT NULL DEFAULT '1',
  `new_page` int(1) NOT NULL DEFAULT '1',
  `approval_needed` int(1) NOT NULL DEFAULT '1',
  `page_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `z_modules`
--

INSERT INTO `z_modules` (`module_id`, `module_name`, `menu_display_name`, `module_status`, `parent`, `display_list_template`, `display_detail_template`, `browse_page`, `my_page`, `new_page`, `approval_needed`, `page_title`) VALUES
(1, 'dating', 'Dating', 1, 'Root', 'Default', 'Default', 1, 1, 1, 0, 'Online Dating'),
(2, 'howto', 'How To', 1, 'Root', 'Default', 'Default', 1, 1, 1, 0, NULL),
(3, 'entertainment', 'Entertainment', 1, 'Root', 'Default', 'Default', 1, 1, 1, 0, NULL),
(4, 'meetup', 'Meetup', 1, 'Root', 'Default', 'Default', 1, 1, 1, 0, NULL),
(5, 'life_reminder', 'Life Reminder', 1, 'Root', 'Default', 'Default', 0, 1, 1, 0, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
