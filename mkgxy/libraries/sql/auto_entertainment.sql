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
-- Table structure for table `auto_entertainment`
--

CREATE TABLE `auto_entertainment` (
  `id` varchar(50) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `videos` text,
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
-- Dumping data for table `auto_entertainment`
--

INSERT INTO `auto_entertainment` (`id`, `city_id`, `uid`, `title`, `description`, `videos`, `rc_created_dt`, `rc_updated_dt`, `rc_deleted_dt`, `rc_status`, `rc_approved`, `rc_deleted`) VALUES
('317E0C2A-C823-4621-7AE2-8B241BA267D9', 144008, '112913147917981568678', 'Mahabharat BR Chopra', '1988 BR Chopra mahabharata', '["https:\\/\\/www.youtube.com\\/watch?v=lCrKQqHAVK8","https:\\/\\/www.youtube.com\\/watch?v=QwtGNtOPRZc","https:\\/\\/www.youtube.com\\/watch?v=qKSs1J-XWvs","https:\\/\\/www.youtube.com\\/watch?v=nc6enVSPcJI","https:\\/\\/www.youtube.com\\/watch?v=WoUdfsfI6FU","https:\\/\\/www.youtube.com\\/watch?v=AgveSXt9TPg","https:\\/\\/www.youtube.com\\/watch?v=D1Dt7SoYNb4","https:\\/\\/www.youtube.com\\/watch?v=GuhMjosoSqE","https:\\/\\/www.youtube.com\\/watch?v=VjELJsDOVtU","https:\\/\\/www.youtube.com\\/watch?v=aDOlebCcbnY","https:\\/\\/www.youtube.com\\/watch?v=6NtcSQJYFEw","https:\\/\\/www.youtube.com\\/watch?v=E_AF9sz2DBA","https:\\/\\/www.youtube.com\\/watch?v=lEEOdH_6fFg","https:\\/\\/www.youtube.com\\/watch?v=kLWXMYFgKlg","https:\\/\\/www.youtube.com\\/watch?v=l3HxXSsjwtk","https:\\/\\/www.youtube.com\\/watch?v=JDcpppA96RQ"]', '2014-11-24 07:15:20', '2014-11-24 07:15:20', NULL, 1, 1, 0),
('48860EBC-A0E3-26BD-7FB9-B979AA457424', 144008, '112913147917981568678', 'Bhoothnath Returns 2014 Full Movies Hindi Comedy English Sub HD', 'Bhoothnath Returns is a 2014 Indian supernatural comedy film directed by Nitesh Tiwari and produced by Bhushan Kumar. A sequel to 2008 film Bhoothnath, the film revolves around Bhoothnath (Amitabh Bachchan) who is mocked in a Bhoothworld for his inability to scare children before being sent back to Earth to redeem himself. The movie also had cameo appearances from Shah Rukh Khan (although he occupied a lead role in the prequel) and Ranbir Kapoor. The film was released on 11 April 2014, and became a commercial success at the box office', '["https:\\/\\/www.youtube.com\\/watch?v=tduQE0pvoA0"]', '2014-11-24 07:22:28', '2014-11-24 07:22:28', NULL, 1, 1, 0),
('1CEDB277-D4FE-D573-C0C3-21E695F346B0', 144008, '112913147917981568678', 'Race 2 (2013) Full Movies English Sub Online| Hindi Best Action Movies 2013', 'Race 2 Full Movies is a Bollywood action thriller film directed by Abbas Burmawalla, Mustan Burmawalla and produced under the Tips Music Films banner. It is the sequel to the 2008 film, Race and stars an ensemble cast that includes Anil Kapoor and Saif Ali Khan reprising their roles as Robert D''Costa and Ranveer Singh respectively, while Deepika Padukone, John Abraham, Jacqueline Fernandez and Ameesha Patel are new additions to the cast.', '["https:\\/\\/www.youtube.com\\/watch?v=0BslqqvIRIQ"]', '2014-11-24 07:28:47', '2014-11-24 07:28:47', NULL, 1, 1, 0),
('EA893013-16A4-7BB7-42A4-CB3388A82429', 144001, '112913147917981568678', 'Masters (Malayalam Movie) - Full Length Action Hindi Movie', '', '["https:\\/\\/www.youtube.com\\/watch?v=PN6G8XmiV5A&feature=related"]', '2014-11-24 07:42:38', '2014-11-24 07:42:38', NULL, 1, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
