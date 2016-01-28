-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Host: remote-mysql3.servage.net
-- Generation Time: Oct 25, 2014 at 11:58 PM
-- Server version: 5.5.35
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
-- Table structure for table `personals`
--

CREATE TABLE IF NOT EXISTS `personals` (
  `personal_id` varchar(50) NOT NULL,
  `base_id` varchar(50) DEFAULT NULL,
  `age` int(4) DEFAULT NULL,
  `other_details` text,
  PRIMARY KEY (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personals`
--

INSERT INTO `personals` (`personal_id`, `base_id`, `age`, `other_details`) VALUES
('BABC459A-1BBE-6BCD-E862-A993BC47CDC1', '98166D29-5D5D-1575-01D9-E74991B7023E', 0, '{"body":"0","height":"0","marital_status":"0"}');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `record_id` varchar(50) NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` longtext,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `showAddress` int(1) NOT NULL DEFAULT '1',
  `record_status` int(1) NOT NULL DEFAULT '1',
  `admin_status` int(11) NOT NULL DEFAULT '0',
  `soft_delete` int(1) NOT NULL DEFAULT '0',
  `hard_delete` int(1) NOT NULL DEFAULT '0',
  `soft_delete_dt` timestamp NULL DEFAULT NULL,
  `hard_delete_dt` timestamp NULL DEFAULT NULL,
  `soft_delete_user` varchar(50) DEFAULT NULL,
  `hard_delete_user` varchar(50) DEFAULT NULL,
  `record_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `record_updated_date` timestamp NULL DEFAULT NULL,
  `ifield1` int(11) DEFAULT NULL,
  `ifield2` int(11) DEFAULT NULL,
  `ifield3` int(11) DEFAULT NULL,
  `ifield4` int(11) DEFAULT NULL,
  `ifield5` int(11) DEFAULT NULL,
  `ifield6` int(11) DEFAULT NULL,
  `ifield7` int(11) DEFAULT NULL,
  `ifield8` int(11) DEFAULT NULL,
  `ifield9` int(11) DEFAULT NULL,
  `ifield10` int(11) DEFAULT NULL,
  `ffield1` float DEFAULT NULL,
  `ffield2` float DEFAULT NULL,
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`record_id`, `module_id`, `user_id`, `city_id`, `title`, `details`, `lat`, `lon`, `address`, `showAddress`, `record_status`, `admin_status`, `soft_delete`, `hard_delete`, `soft_delete_dt`, `hard_delete_dt`, `soft_delete_user`, `hard_delete_user`, `record_created_date`, `record_updated_date`, `ifield1`, `ifield2`, `ifield3`, `ifield4`, `ifield5`, `ifield6`, `ifield7`, `ifield8`, `ifield9`, `ifield10`, `ffield1`, `ffield2`) VALUES
('9E57E1C5-E9CB-AAE0-7DD2-E55A84C51CB3', 2, '112913147917981568678', 144008, 'Manish Khanchandani', '{"description":"I am practising law since 20 years and i am efficient immigration lawyer.","image":"https:\\/\\/lh6.googleusercontent.com\\/-nLg0dFRo0DQ\\/AAAAAAAAAAI\\/AAAAAAAAGQs\\/AO_UIb6UHAM\\/photo.jpg","charges":"100","paypal_email":"finance@mkgalaxy.com"}', 37.388754414105065, -121.89494006347655, '1831 Sheri Ann Circle, San Jose, CA 95131, USA', 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, '2014-09-21 04:07:33', '2014-09-21 04:07:31', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, NULL),
('D5EB0421-4A7A-3308-A62F-AFBABDD55836', 2, '117652198097778721736', 144008, 'Immigration Lawyer', '{"description":"i am immigration lawyer","image":"https:\\/\\/lh4.googleusercontent.com\\/-_m8MVZUbJTc\\/AAAAAAAAAAI\\/AAAAAAAAAEg\\/LHho4RqMFho\\/photo.jpg","charges":"10","paypal_email":"manish@mkgalaxy.com"}', 37.3867, -121.897, '1025 McKay Drive, San Jose, CA 95131, USA', 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, '2014-09-21 04:15:07', '2014-09-21 04:15:07', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `records_category`
--

CREATE TABLE IF NOT EXISTS `records_category` (
  `record_id` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`record_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `records_category`
--

INSERT INTO `records_category` (`record_id`, `category_id`) VALUES
('9E57E1C5-E9CB-AAE0-7DD2-E55A84C51CB3', 1),
('D5EB0421-4A7A-3308-A62F-AFBABDD55836', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_id` varchar(50) NOT NULL,
  `base_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `base_id`) VALUES
('726168A6-0C2E-4B75-7DD2-59EFDD8C6D66', 'BEAB4E06-7431-AEE5-4D63-AB2ED1BFCFDD');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `uid` varchar(50) NOT NULL,
  `paypal_email_address` varchar(150) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `fav_locations` text,
  `dob` datetime DEFAULT NULL COMMENT 'date of birth',
  `birth_city` varchar(200) DEFAULT NULL,
  `birth_city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`uid`, `paypal_email_address`, `phone_number`, `fav_locations`, `dob`, `birth_city`, `birth_city_id`) VALUES
('100546875099861959996', 'finance@mkgalaxy.com', '4085052726', NULL, NULL, NULL, NULL),
('108014758311611089087', NULL, NULL, NULL, NULL, NULL, NULL),
('112913147917981568678', 'finance@mkgalaxy.com', '4085052726', NULL, '1974-06-05 12:30:00', 'Ulhāsnagar, Maharashtra, India', 18866),
('117652198097778721736', 'manish@mkgalaxy.com', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `z_amber_alert`
--

CREATE TABLE IF NOT EXISTS `z_amber_alert` (
  `alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `amber_alert_title` varchar(200) DEFAULT NULL,
  `amber_alert_description` text,
  `amber_alert_status` enum('Pending','Processed','Completed','Closed','Rejected') DEFAULT NULL,
  `admin_comments` text,
  `amber_alert_email` varchar(150) DEFAULT NULL,
  `amber_alert_phone` varchar(20) DEFAULT NULL,
  `amber_alert_approved` int(1) DEFAULT '0',
  `amber_alert_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amber_alert_updated` timestamp NULL DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `showAddress` int(1) NOT NULL DEFAULT '1',
  `amber_alert_image` varchar(255) DEFAULT NULL,
  `amber_lat` double DEFAULT NULL,
  `amber_lng` double DEFAULT NULL,
  `amber_alert_category` enum('Child Kidnapping','Adult Kidnapping','Animal Kidnapping','Item Stolen','Other') DEFAULT NULL,
  PRIMARY KEY (`alert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_amber_alert`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_anticorruption`
--

CREATE TABLE IF NOT EXISTS `z_anticorruption` (
  `corruption_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `details` text,
  `cor_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cor_updated` timestamp NULL DEFAULT NULL,
  `cor_approved` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`corruption_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_anticorruption`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_dating`
--

CREATE TABLE IF NOT EXISTS `z_dating` (
  `dating_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `i_am` enum('male','female','couple') DEFAULT NULL,
  `looking_for_female` int(1) DEFAULT NULL,
  `looking_for_male` int(1) DEFAULT NULL,
  `looking_for_couple` int(1) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dating_created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dating_updated_dt` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `age` int(4) DEFAULT NULL,
  `profession` int(4) DEFAULT NULL,
  `education` int(4) DEFAULT NULL,
  `virgin` int(1) DEFAULT NULL,
  `first_date_fantasy` varchar(200) DEFAULT NULL,
  `religion` int(11) DEFAULT NULL,
  `caste` int(11) DEFAULT NULL,
  `xtras` text,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`dating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_dating`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_domains`
--

CREATE TABLE IF NOT EXISTS `z_domains` (
  `domain_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`domain_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `z_domains`
--

INSERT INTO `z_domains` (`domain_id`, `domain`, `city_id`, `status`) VALUES
(1, 'xcity.mkgalaxy.com', 18866, 0),
(2, 'xcity.mkgalaxy.com', 144008, 1);

-- --------------------------------------------------------

--
-- Table structure for table `z_double_money`
--

CREATE TABLE IF NOT EXISTS `z_double_money` (
  `money_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `money_created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `money_updated_dt` timestamp NULL DEFAULT NULL,
  `money_status` int(1) DEFAULT '1',
  `money_state` enum('Pending','Processing','Completed','Closed','Deleted') DEFAULT NULL,
  `money_amount` double DEFAULT NULL,
  `money_earned` double DEFAULT NULL,
  `money_admin_fee` double DEFAULT NULL,
  `money_net_fee` double DEFAULT NULL,
  PRIMARY KEY (`money_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_double_money`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_help`
--

CREATE TABLE IF NOT EXISTS `z_help` (
  `help_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `help_title` varchar(200) DEFAULT NULL,
  `help_description` text,
  `help_type` enum('provider','wanted') DEFAULT NULL,
  `help_pay` double DEFAULT NULL,
  `help_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `help_updated` timestamp NULL DEFAULT NULL,
  `help_status` int(1) NOT NULL DEFAULT '1',
  `help_winner_uid` varchar(50) DEFAULT NULL,
  `help_approved` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`help_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_help`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_help_applicants`
--

CREATE TABLE IF NOT EXISTS `z_help_applicants` (
  `applicant_id` int(11) NOT NULL AUTO_INCREMENT,
  `help_id` int(11) DEFAULT NULL,
  `applicant_uid` varchar(50) DEFAULT NULL,
  `applicant_date` timestamp NULL DEFAULT NULL,
  `applicant_comments` text,
  `applicant_rate` double DEFAULT NULL,
  `applicant_status` int(1) NOT NULL DEFAULT '1',
  `applicant_approved` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_help_applicants`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_history`
--

CREATE TABLE IF NOT EXISTS `z_history` (
  `history_id` varchar(50) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `is_private` int(1) DEFAULT '0',
  `history_title` varchar(200) DEFAULT NULL,
  `history_description` text,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `showAddress` int(1) NOT NULL DEFAULT '1',
  `history_lat` double DEFAULT NULL,
  `history_lng` double DEFAULT NULL,
  `history_date` datetime DEFAULT NULL,
  `history_category` int(11) DEFAULT NULL,
  `history_created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `history_updated_dt` timestamp NULL DEFAULT NULL,
  `history_status` int(1) NOT NULL DEFAULT '1',
  `history_approved` int(1) NOT NULL DEFAULT '0',
  `related_to_me` int(1) NOT NULL DEFAULT '1',
  `history_image` text,
  `history_video` text,
  `history_urls` text,
  `history_points` float DEFAULT NULL,
  `history_points_results` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`history_id`),
  KEY `city_id` (`city_id`),
  KEY `is_private` (`is_private`,`city_id`,`history_status`,`history_approved`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_history`
--

INSERT INTO `z_history` (`history_id`, `uid`, `is_private`, `history_title`, `history_description`, `city_id`, `address`, `address2`, `showAddress`, `history_lat`, `history_lng`, `history_date`, `history_category`, `history_created_dt`, `history_updated_dt`, `history_status`, `history_approved`, `related_to_me`, `history_image`, `history_video`, `history_urls`, `history_points`, `history_points_results`) VALUES
('01D117FC-CE85-445F-FB7A-4C57B32CAC4A', '112913147917981568678', 1, 'Manish Bhani Marriage', 'Marriage of Manish with Renu (Bhani)', 18866, 'Baba Notandas Darbar Road, Sidhi Vinayak Nagar, Ulhasnagar, Maharashtra 421001, India', NULL, 1, 19.236847879478926, 73.16254200935361, '2006-08-20 01:00:00', NULL, '2014-10-19 07:16:43', '2014-10-19 15:49:56', 1, 1, 1, '["http:\\/\\/mkgalaxy.com\\/images\\/98760013_JPG.jpg"]', '[]', NULL, 3, 'Very Bad Match'),
('1FC40221-3E64-749A-81FA-10D0B091FA1A', '112913147917981568678', 1, 'Blah blah <!--Fun With ....-->', 'Blah blah <!--I met with someone and have good time. One of the best time in my life.-->', 18638, 'WING-A, Industrial Area, Bhandup West, Mumbai, Maharashtra 400078, India', NULL, 1, 19.162744439768783, 72.93824546557619, '2009-06-06 18:00:00', NULL, '2014-10-19 05:21:38', '2014-10-19 15:49:56', 1, 1, 1, '[]', '[]', NULL, 31, 'Very Good Match'),
('4D11EEA3-CC09-B0D9-26F4-B9C7B19B1759', '112913147917981568678', 1, 'Nikhil Khanchandani was born', 'Nikhil khanchandani was born on this day in ulhasnagar at 1:10 pm.', 18866, 'Gol Maiden Road, Sidhi Vinayak Nagar, Ulhasnagar, Maharashtra 421001, India', '', 1, 19.233150465225826, 73.15665187835691, '2000-04-07 13:10:00', NULL, '2014-10-22 01:48:30', '2014-10-22 01:48:30', 1, 1, 1, '[]', '[]', '[]', 25, 'Good Match'),
('4D57C3DD-6219-6EE6-6BAE-16D0A4E986F3', '112913147917981568678', 0, 'Watched Bang Bang Movie', 'I watched bang bang movie in Amc mercado theatre. Movie is ok and good to watch for one time.', 144001, '3111 Mission College Boulevard, Santa Clara, CA, United States', NULL, 1, 37.3891074, -121.9832197, '2014-10-04 15:05:00', NULL, '2014-10-19 04:51:51', '2014-10-19 15:49:56', 1, 1, 1, '["http:\\/\\/img.superhitcafe.com\\/2014\\/09\\/The-Most-Awaited-Action-Thriller-Movie-Bang-Bang-SuperHitCafe.com_.jpg"]', '["https:\\/\\/www.youtube.com\\/watch?v=NhIFVlsHzwQ"]', NULL, 26, 'Good Match'),
('651E3925-CBE4-A63D-0091-8C1A0C0AAEDE', '112913147917981568678', 1, 'I bought my First Mobile - Alcatel', 'I bought my life''s first mobile and mobile was alcatel, it charges Rs. 9 for outgoing and Rs. 3 for incoming at that time.', 18866, 'Kalyan-Badlapur Road, Vitthalwadi, Ulhasnagar, Maharashtra 421002, India', 'Silver apartments, 102 and 103, Behind SBI, Ulhasnagar 421003', 1, 19.230279514111277, 73.15700590978702, '2000-04-06 18:00:00', NULL, '2014-10-22 01:50:59', '2014-10-22 01:52:08', 1, 1, 1, '[]', '[]', '[]', 19, 'Normal Match'),
('68887B7F-3BA2-2793-E078-89148030D5C3', '112913147917981568678', 1, 'Manish Khanchandani Was Born', 'I was born on 5th june, 1974 and Nakshtra at that time was Jyestha.', 18866, 'Ulhasnagar, Maharashtra 421002, India', NULL, 1, 19.2298687, 73.1615127, '1974-06-05 12:30:00', NULL, '2014-10-19 18:09:37', '2014-10-20 03:58:41', 1, 1, 1, '[]', '[]', '[]', 28, 'Good Match'),
('6950B753-6463-2AA0-B716-7A736E575C85', '112913147917981568678', 1, 'Discussion With Bhani', 'I discussed with bhani. She wanted to have baby, I told if she keeps her attitude good then i will talk to mom regarding baby. She promises to keep her nature good. I will have to talk to mom on nov 10, 2014 regarding this. She is very eager to get the baby.', 144008, '1230 San Tomas Aquino Road, San Jose, CA 95117, USA', '1230 San Tomas Aquino Road #114, San Jose, CA 95117, USA', 1, 37.303057, -121.978297, '2014-10-19 12:30:00', NULL, '2014-10-22 00:53:45', '2014-10-22 01:28:19', 1, 1, 1, '[]', '[]', '[]', 24, 'Normal Match'),
('89B3B228-D19C-5E09-7F06-90F0BC1CA411', '112913147917981568678', 1, 'Khanchandani Best', 'Url: http://expressindia.indianexpress.com/ie/daily/20000209/isp09100.html\r\nDr Manish Khanchandani of Ulhasnagar, with 4.5 points, emerged best in the inaugural All-Maharashtra Medico rapid chess tournament, organised by Medico Chess Federation, at the Mulund Gymkhana, Mulund (E), recently. Dr Deepak Vaze of Kalyan won the runner-up spot with four points.\r\n\r\nDr Deepak Tandel of Thane claimed the second Open Medico regular competition title with 11 points. Dr Rajpathak was runner-up.', 18638, 'Mulund West, Mumbai, Maharashtra 400080, India', NULL, 1, 19.1725542, 72.94253700000002, '2000-02-06 17:00:00', NULL, '2014-10-19 07:24:09', '2014-10-19 15:49:56', 1, 1, 1, '[]', '[]', NULL, 25, 'Good Match'),
('C6A38B94-2BB6-DE4E-8C3D-E8EB65805CE8', '112913147917981568678', 1, 'Bhani Returns to US', 'Bhani Returns to US after long time of 2 and 1/2 years. She was in india and malaysia in this period.', 144008, '1104 Palm Ridge Lane, San Jose, CA, United States', NULL, 1, 37.2479046, -121.85594179999998, '2013-02-18 14:30:00', NULL, '2014-10-19 07:53:27', '2014-10-19 15:49:57', 1, 1, 1, '[]', '[]', NULL, 23, 'Normal Match');

-- --------------------------------------------------------

--
-- Table structure for table `z_items`
--

CREATE TABLE IF NOT EXISTS `z_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `item_title` varchar(200) DEFAULT NULL,
  `item_description` text,
  `item_type` enum('place','people','business','thing','other') DEFAULT NULL,
  `item_created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_updated_date` timestamp NULL DEFAULT NULL,
  `item_approved` int(1) NOT NULL DEFAULT '0',
  `item_status` int(1) NOT NULL DEFAULT '1',
  `item_city_id` int(11) DEFAULT NULL,
  `item_address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_items_reviews`
--

CREATE TABLE IF NOT EXISTS `z_items_reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `review_uid` varchar(50) DEFAULT NULL,
  `review_details` text,
  `review_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `review_updated_date` timestamp NULL DEFAULT NULL,
  `review_status` int(1) NOT NULL DEFAULT '1',
  `review_approved` int(1) NOT NULL DEFAULT '0',
  `rating` int(4) DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_items_reviews`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_laws`
--

CREATE TABLE IF NOT EXISTS `z_laws` (
  `law_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `law` varchar(200) DEFAULT NULL,
  `law_desc` text,
  `law_created` timestamp NULL DEFAULT NULL,
  `law_updated` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`law_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_laws`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_law_votes`
--

CREATE TABLE IF NOT EXISTS `z_law_votes` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `law_id` int(11) DEFAULT NULL,
  `rating` int(2) DEFAULT NULL,
  `comments` text,
  `vote_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vote_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_law_votes`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_maid_service`
--

CREATE TABLE IF NOT EXISTS `z_maid_service` (
  `maid_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `maid_title` varchar(200) DEFAULT NULL,
  `maid_description` text,
  `maid_creation_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `maid_updated_dt` timestamp NULL DEFAULT NULL,
  `maid_approved` int(1) NOT NULL DEFAULT '0',
  `maid_status` int(1) NOT NULL DEFAULT '1',
  `maid_city_id` int(11) DEFAULT NULL,
  `maid_address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`maid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_maid_service`
--


-- --------------------------------------------------------

--
-- Table structure for table `z_news`
--

CREATE TABLE IF NOT EXISTS `z_news` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `item_title` varchar(200) DEFAULT NULL,
  `item_description` text,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `showAddress` int(1) NOT NULL DEFAULT '1',
  `item_lat` double DEFAULT NULL,
  `item_lng` double DEFAULT NULL,
  `item_date` timestamp NULL DEFAULT NULL,
  `item_created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_updated_dt` timestamp NULL DEFAULT NULL,
  `item_status` int(1) NOT NULL DEFAULT '1',
  `item_approved` int(1) NOT NULL DEFAULT '0',
  `item_image` text,
  `item_video` text,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `z_news`
--

INSERT INTO `z_news` (`item_id`, `uid`, `item_title`, `item_description`, `city_id`, `address`, `address2`, `showAddress`, `item_lat`, `item_lng`, `item_date`, `item_created_dt`, `item_updated_dt`, `item_status`, `item_approved`, `item_image`, `item_video`) VALUES
(1, '112913147917981568678', 'News is better', 'this is great news about many people living here', 143871, '500-598 South Taaffe Street, Sunnyvale, CA 94086, USA', '', 1, 37.3689, -122.035, '2014-10-10 08:00:00', '2014-10-10 13:07:02', '2014-10-10 13:07:02', 1, 0, '["http:\\/\\/www.streetdefense.com\\/Kali20Eskrima.JPG","http:\\/\\/becominglayla.com\\/wp-content\\/uploads\\/fight-still-stamped.jpg"]', '["https:\\/\\/www.youtube.com\\/watch?v=gO6tYl4eAaU","https:\\/\\/www.youtube.com\\/watch?v=m4ApWdAMa9w"]');

-- --------------------------------------------------------

--
-- Table structure for table `z_shout`
--

CREATE TABLE IF NOT EXISTS `z_shout` (
  `shout_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `shout` text,
  `shout_status` int(1) NOT NULL DEFAULT '0',
  `shout_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shout_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shout_id`),
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`,`city_id`,`shout_status`,`shout_deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `z_shout`
--

