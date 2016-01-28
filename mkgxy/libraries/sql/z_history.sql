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
-- Table structure for table `z_history`
--

CREATE TABLE `z_history` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_history`
--

INSERT INTO `z_history` (`history_id`, `uid`, `is_private`, `history_title`, `history_description`, `city_id`, `address`, `address2`, `showAddress`, `history_lat`, `history_lng`, `history_date`, `history_category`, `history_created_dt`, `history_updated_dt`, `history_status`, `history_approved`, `related_to_me`, `history_image`, `history_video`, `history_urls`, `history_points`, `history_points_results`) VALUES
('01D117FC-CE85-445F-FB7A-4C57B32CAC4A', '112913147917981568678', 1, 'Manish Bhani Marriage', 'Marriage of Manish with Renu (Bhani)', 18866, 'Baba Notandas Darbar Road, Sidhi Vinayak Nagar, Ulhasnagar, Maharashtra 421001, India', NULL, 1, 19.236847879478926, 73.16254200935361, '2006-08-20 01:00:00', NULL, '2014-10-19 04:16:43', '2014-10-19 12:49:56', 1, 1, 1, '["http:\\/\\/mkgalaxy.com\\/images\\/98760013_JPG.jpg"]', '[]', NULL, 3, 'Very Bad Match'),
('1FC40221-3E64-749A-81FA-10D0B091FA1A', '112913147917981568678', 1, 'Blah blah <!--Fun With ....-->', 'Blah blah <!--I met with someone and have good time. One of the best time in my life.-->', 18638, 'WING-A, Industrial Area, Bhandup West, Mumbai, Maharashtra 400078, India', NULL, 1, 19.162744439768783, 72.93824546557619, '2009-06-06 18:00:00', NULL, '2014-10-19 02:21:38', '2014-10-19 12:49:56', 1, 1, 1, '[]', '[]', NULL, 31, 'Very Good Match'),
('4D11EEA3-CC09-B0D9-26F4-B9C7B19B1759', '112913147917981568678', 1, 'Nikhil Khanchandani was born', 'Nikhil khanchandani was born on this day in ulhasnagar at 1:10 pm.', 18866, 'Gol Maiden Road, Sidhi Vinayak Nagar, Ulhasnagar, Maharashtra 421001, India', '', 1, 19.233150465225826, 73.15665187835691, '2000-04-07 13:10:00', NULL, '2014-10-21 22:48:30', '2014-10-21 22:48:30', 1, 1, 1, '[]', '[]', '[]', 25, 'Good Match'),
('4D57C3DD-6219-6EE6-6BAE-16D0A4E986F3', '112913147917981568678', 0, 'Watched Bang Bang Movie', 'I watched bang bang movie in Amc mercado theatre. Movie is ok and good to watch for one time.', 144001, '3111 Mission College Boulevard, Santa Clara, CA, United States', NULL, 1, 37.3891074, -121.9832197, '2014-10-04 15:05:00', NULL, '2014-10-19 01:51:51', '2014-10-19 12:49:56', 1, 1, 1, '["http:\\/\\/img.superhitcafe.com\\/2014\\/09\\/The-Most-Awaited-Action-Thriller-Movie-Bang-Bang-SuperHitCafe.com_.jpg"]', '["https:\\/\\/www.youtube.com\\/watch?v=NhIFVlsHzwQ"]', NULL, 26, 'Good Match'),
('651E3925-CBE4-A63D-0091-8C1A0C0AAEDE', '112913147917981568678', 1, 'I bought my First Mobile - Alcatel', 'I bought my life''s first mobile and mobile was alcatel, it charges Rs. 9 for outgoing and Rs. 3 for incoming at that time.', 18866, 'Kalyan-Badlapur Road, Vitthalwadi, Ulhasnagar, Maharashtra 421002, India', 'Silver apartments, 102 and 103, Behind SBI, Ulhasnagar 421003', 1, 19.230279514111277, 73.15700590978702, '2000-04-06 18:00:00', NULL, '2014-10-21 22:50:59', '2014-10-21 22:52:08', 1, 1, 1, '[]', '[]', '[]', 19, 'Normal Match'),
('68887B7F-3BA2-2793-E078-89148030D5C3', '112913147917981568678', 0, 'Manish Khanchandani Was Born', 'I was born on 5th june, 1974 and Nakshtra at that time was Jyestha.', 18866, 'Dr Rita Hospital Road, Press Bazar, Ulhasnagar, Maharashtra 421002, India', '', 1, 19.2298687, 73.1615127, '1974-06-05 12:30:00', NULL, '2014-10-19 15:09:37', '2014-10-25 23:39:39', 1, 1, 1, '[]', '[]', '[]', 28, 'Good Match'),
('6950B753-6463-2AA0-B716-7A736E575C85', '112913147917981568678', 1, 'Discussion With Bhani', 'I discussed with bhani. She wanted to have baby, I told if she keeps her attitude good then i will talk to mom regarding baby. She promises to keep her nature good. I will have to talk to mom on nov 10, 2014 regarding this. She is very eager to get the baby.', 144008, '1230 San Tomas Aquino Road, San Jose, CA 95117, USA', '1230 San Tomas Aquino Road #114, San Jose, CA 95117, USA', 1, 37.303057, -121.978297, '2014-10-19 12:30:00', NULL, '2014-10-21 21:53:45', '2014-10-21 22:28:19', 1, 1, 1, '[]', '[]', '[]', 24, 'Normal Match'),
('89B3B228-D19C-5E09-7F06-90F0BC1CA411', '112913147917981568678', 1, 'Khanchandani Best', 'Url: http://expressindia.indianexpress.com/ie/daily/20000209/isp09100.html\r\nDr Manish Khanchandani of Ulhasnagar, with 4.5 points, emerged best in the inaugural All-Maharashtra Medico rapid chess tournament, organised by Medico Chess Federation, at the Mulund Gymkhana, Mulund (E), recently. Dr Deepak Vaze of Kalyan won the runner-up spot with four points.\r\n\r\nDr Deepak Tandel of Thane claimed the second Open Medico regular competition title with 11 points. Dr Rajpathak was runner-up.', 18638, 'Mulund West, Mumbai, Maharashtra 400080, India', NULL, 1, 19.1725542, 72.94253700000002, '2000-02-06 17:00:00', NULL, '2014-10-19 04:24:09', '2014-10-19 12:49:56', 1, 1, 1, '[]', '[]', NULL, 25, 'Good Match'),
('B4E219A6-CDF1-B4D6-E729-680A0386F2C3', '100546875099861959996', 1, 'Met With Mila', 'I met with mila (phone number: 4086650923) and it was good gfe exp with dfk, daty, fs, bbj, taste was good in daty, I entered the apartment and someone told me on phone to press 1626, and I pressed 1626 but gate did not opened and so i called him and he said someone will come and opened the door, After few min, a nice girl came out and opened the door, i followed her to some room (i did not remember the room number but it was on first floor), i paid her $160 for 1 hour, I went to take shower and after shower, i started loving her, kissing and daty for some time then she started bj and then fs, i came back after that, it was quick but i wanted more, may be next time i will do more.', 144008, '330 Elan Village Lane, San Jose, CA 95134, USA', '', 1, 37.399996, -121.92673200000002, '2014-10-31 19:00:00', NULL, '2014-11-01 17:32:38', '2014-11-01 17:36:06', 1, 1, 1, '[]', '[]', '[]', 26, 'Good Match'),
('BC048048-F67B-25DD-07BB-95D847C90D2A', '100546875099861959996', 1, 'Went to 7 day spa', 'I went to 7 day spa in san jose with phone number as 408-515-0509 and address as 2166 STORY RD as san jose. I parked my car at the back side of the place and went to upstairs on 2nd floor, I pressed the bell and nobody opened the door and i pressed again the bell and i girl opened the door. it was 2 door with 2 locks in each door (as if they are fearing with somebody). I entered the room and i saw a man on table drinking alcohol and girl told me to give $40 for the room and i gave $40 to the girl and girl showed me one room and told me to remove clothes for massage. I removed all the clothes and she came after some time and told me $150 for 30 min full service and i said i cannot pay so much and she said she can do 10 minutes full service for $100 and i said no and i said that i dont want to do anything, can you can retrun my $40 and she said the amount is not refundable (i asked refund because i feel very unconfortable with all the atmosphere. I wear all the clothes and went out and i saw 1 more male looking in different 8 camera''s and there was 1 more girl who was tall standing in the main room and i came back with very disappointed atmosphere.', 144008, '2170 Story Road, San Jose, CA 95122, USA', '2166 Story Road, San Jose, CA 95122, USA', 1, 37.34505217708501, -121.83471220852891, '2014-10-31 18:00:00', NULL, '2014-11-02 06:18:15', '2014-11-02 06:20:33', 1, 1, 1, '[]', '[]', '[]', 26, 'Good Match'),
('C6A38B94-2BB6-DE4E-8C3D-E8EB65805CE8', '112913147917981568678', 1, 'Bhani Returns to US', 'Bhani Returns to US after long time of 2 and 1/2 years. She was in india and malaysia in this period.', 144008, '1104 Palm Ridge Lane, San Jose, CA, United States', NULL, 1, 37.2479046, -121.85594179999998, '2013-02-18 14:30:00', NULL, '2014-10-19 04:53:27', '2014-10-19 12:49:57', 1, 1, 1, '[]', '[]', NULL, 23, 'Normal Match'),
('CF62C276-E0A2-554A-4DFF-819C8D423AA1', '112913147917981568678', 0, 'Joined Chuck Jeffersons Judo', 'I joine the judo club in san jose, club is very nice as sir teaches all the parts of judo in each session like grappling technique, throwing technique, randori, etc.', 144008, '400 Saratoga Avenue, San Jose, CA 95129, USA', '', 1, 37.3207312162288, -121.970084720871, '2014-11-13 19:15:00', NULL, '2014-11-15 04:46:26', '2014-11-15 13:46:26', 1, 0, 1, '[]', '[]', '["http:\\/\\/www.cjjudo.com\\/"]', 25, 'Good Match'),
('53AF8909-8991-E25B-D102-EE312DC8C7D6', '112913147917981568678', 1, 'New baby process started', 'I started new baby process, I did raw intercourse with bhani as she wanted baby and so i decided to do the procedure for the same. She is very much excited to get baby and i want to support that.', 144008, '1230 San Tomas Aquino Road, San Jose, CA 95117, USA', '1230 San Tomas Aquino Road #114, San Jose, CA, United States', 1, 37.30303139752264, -121.97851694113922, '2014-11-13 23:00:00', NULL, '2014-11-15 04:48:40', '2014-11-15 13:48:40', 1, 1, 1, '[]', '[]', '[]', 25, 'Good Match');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
