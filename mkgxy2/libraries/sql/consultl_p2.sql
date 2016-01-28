-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2015 at 08:37 AM
-- Server version: 5.6.23
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `consultl_p2`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_details`
--

CREATE TABLE IF NOT EXISTS `image_details` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `coordinates` text,
  `imageFile` varchar(255) DEFAULT NULL,
  `extraFields` text,
  `detail_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`detail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `image_details`
--

INSERT INTO `image_details` (`detail_id`, `id`, `coordinates`, `imageFile`, `extraFields`, `detail_dt`) VALUES
(6, 6, '223,124,291,60,309,152', NULL, NULL, '2015-04-05 20:34:39'),
(7, 6, '63,190,95,120,160,201,74,240', NULL, NULL, '2015-04-05 20:34:44'),
(8, 6, '207,154,280,164,232,217,155,55,194,50', NULL, NULL, '2015-04-05 20:34:53'),
(9, 6, '29,39,114,54,52,100', NULL, NULL, '2015-04-05 20:34:53'),
(20, 10, '129,157,251,155,203,285,110,283', NULL, NULL, '2015-04-10 01:37:07'),
(11, 3, '205,36,220,288,668,290,730,223,666,63', NULL, NULL, '2015-04-05 20:58:20'),
(12, 3, '184,113,318,157,287,350,199,350,105,338', NULL, NULL, '2015-04-05 20:58:46'),
(13, 3, '594,419,776,294,823,432', NULL, NULL, '2015-04-05 20:59:07'),
(18, 10, '88,115,152,59,229,110', NULL, NULL, '2015-04-10 01:37:07'),
(19, 10, '299,49,424,48,390,135', NULL, NULL, '2015-04-10 01:37:07'),
(15, 5, '88,135,150,53,209,187', 'chess.jpg', '{"itemDescription":"Hat","modelNumber":"1234-WXYZ","manufacturingPartNumber":"GUESS-03292015-EAST","manufacturingDescription":"women''s helen kaminski 9'' raefeo straw hat"}', '2015-04-05 23:27:33'),
(16, 5, '149,285,304,236,310,350,183,398,70,372', 'kid_7465.jpg', '{"itemDescription":"T Shirt","modelNumber":"1234-WXYZ","manufacturingPartNumber":"GUESS-03292015-EAST","manufacturingDescription":"women''s helen kaminski 9'' raefeo straw hat"}', '2015-04-05 23:27:33'),
(14, 8, '51,72,100,19,139,83', NULL, '{"itemDescription":"","modelNumber":"","manufacturingPartNumber":"","manufacturingDescription":""}', '2015-04-05 21:14:37'),
(29, 13, '544,641,567,636,584,638,589,646,571,637,546,652,573,669,573,675,536,674,552,660', 'square-earrings-gold.jpg', '{"itemDescription":"Bracelet","modelNumber":"90210","manufacturingPartNumber":"2015","manufacturingDescription":"melrose bracelet"}', '2015-04-10 07:08:17'),
(25, 13, '387,554,398,286', 'square-earrings-gold3 zoara.com.jpg', '{"itemDescription":"Necklace","modelNumber":"90210","manufacturingPartNumber":"2015","manufacturingDescription":"bling bling"}', '2015-04-10 06:11:43'),
(26, 13, '420,240,394,295,390,337,394,368,398,427,402,328,390,447,388,497,401,318', NULL, NULL, '2015-04-10 06:33:51'),
(27, 13, '519,219,459,294,422,352', NULL, NULL, '2015-04-10 06:33:51'),
(28, 13, '384,497,389,563,400,493,401,440,405,408,412,381,418,359,426,337,441,313', NULL, NULL, '2015-04-10 06:33:51'),
(30, 13, '287,679,285,875,251,869,209,848,176,826,157,783,155,752,163,722,185,708,223,691,255,681', 'womens hat.jpg', '{"itemDescription":"Head Gear","modelNumber":"3434","manufacturingPartNumber":"21023","manufacturingDescription":"hi top hat"}', '2015-04-11 03:51:19'),
(31, 13, '355,338', NULL, NULL, '2015-04-11 03:55:21'),
(32, 13, '371,281,361,330,346,362,351,388,360,419,360,438,353,454,341,482,321,514,304,557,292,612,292,675,292,714,290,786,292,856,288,911,286,976,286,1018,312,1016,344,1012,362,1024,370,1040,401,1045,416,1047,433,1114,445,1071,433,1023,450,949,467,857,481,780,489,709,494,595,492,521,540,394,505,466,536,404,538,326,548,268,566,246,578,249,544,233,530,250,511,285,500,313,492,323,463,329,447,332,416,330,408,330,383,326,373,322,372,316,379,298,389,281', NULL, NULL, '2015-04-11 03:55:21'),
(33, 13, '533,678,578,682,588,677,589,668,581,661,592,647,578,632,551,636,541,646,551,649,560,655,575,663,581,663,581,675,565,670,555,663,545,659,540,665,542,671,555,668', NULL, NULL, '2015-04-11 04:21:20'),
(34, 13, '430,148,430,147,430,145,430,143,430,142,430,140,430,138,430,138,430,137,430,136,430,135,430,134,430,133,430,132,430,130,430,129,430,127,430,126,430,125,430,124,430,122,431,121,431,119,431,117,432,115,434,113,434,111,434,110,434,109,434,108,435,106,435,105,436,103,437,102,437,101,438,100,439,99,440,98,441,97,442,96,442,95,443,95,443,94,444,94,444,93,444,92,445,92,445,91,446,90,447,89,448,89,449,89,449,88,449,87,451,86,452,86,452,85,453,85,455,84,455,83,456,82,457,81,458,81,459,80,460,80,461,79,462,79,464,79,465,79,466,79,467,79,468,79,469,79,470,79,471,78,473,78,474,78,475,78,476,78,478,78,480,78,482,78,484,78,486,78,487,78,490,78,492,78,494,78,496,78,498,78,501,78,503,78,505,78,508,78,510,78,512,78,515,78,517,78,519,78,520,78,522,79,523,79,524,80,525,81,526,82,526,83,527,84,527,85,528,85,528,87,529,88,530,90,530,91,530,93,530,95,530,97,530,99,530,101,530,103,530,105,530,106,530,107,530,108,530,110,530,112,530,116,530,119,529,123,529,126,529,129,528,131,528,133,528,134,528,136,528,138,528,140,528,143,528,145,528,146,527,148,527,150,527,154,526,156,525,159,525,162,525,164,524,167,523,169,523,171,523,173,523,175,523,177,521,178,521,179,521,180,521,181,521,183,521,184,521,185,519,187,519,188,518,190,517,191,516,193,516,194,514,196,513,196,511,198,510,200,508,202,507,203,504,205,503,206,502,206,501,207,500,208,499,209,498,210,497,211,495,211,495,212,494,212,493,212,492,212,491,213,490,213,489,213,487,213,486,213,485,214,482,214,481,214,479,214,478,214,477,214,476,214,473,214,472,214,471,214,470,214,469,214,468,214,466,214,465,214,464,214,463,214,462,214,461,213,460,213,459,213,458,213,457,212,456,211,455,211,454,211,453,210,452,209,451,206,451,205,450,203,450,202,449,201,449,201,448,200,447,200,447,199,447,197,446,196,446,195,445,194,444,193,443,191,442,189,441,188,440,187,439,185,439,184,439,183,438,183,438,181,437,180,437,179,437,178,437,177,437,176,437,175,437,174,437,173,436,172,436,171,436,170,436,169,436,168,436,167,436,166,436,166,435,165,435,164,435,163,435,162,434,161,434,160,434,159,433,159,433,157,433,156,433,156,433,155,432,155,432,154,432,153,431,153,431,150,431,149,431,148,431,147,431,146,431,145,432,144', NULL, '{"itemDescription":"","modelNumber":"","manufacturingPartNumber":"","manufacturingDescription":""}', '2015-04-11 04:21:20'),
(35, 13, '464,184,470,183,474,183,479,184,485,185,490,184,491,189,483,194,473,196,463,190', NULL, NULL, '2015-04-11 04:21:54'),
(36, 14, '493,428,487,483,504,547,539,566,593,563,634,540,652,493,659,468,670,464,686,485,705,512,749,536,799,532,828,518,840,479,836,448,828,414,818,392,799,378,777,374,744,374,714,385,695,400,676,428,669,438,652,439,630,424,602,410,580,408,552,406,526,412', NULL, NULL, '2015-04-12 08:09:21'),
(37, 14, '640,638,652,619,673,607,682,597,696,598,707,594,724,599,739,609,753,619,742,628,725,638,704,643', NULL, NULL, '2015-04-12 08:14:27'),
(107, 31, '503,32,503,33,503,34,503,36,503,38,503,39,503,41,503,43,503,44,503,45,503,48,503,50,503,51,503,54,503,56,503,57,503,57,503,58,503,59,503,60,503,60,503,61,503,62,504,69,504,70,504,75,504,76,505,76', NULL, '{"itemDescription":"Brazillian Blowout","modelNumber":"","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.hairstyle.com"}', '2015-06-23 03:53:19'),
(108, 31, '468,35,468,36,468,39,468,42,468,46,468,49,468,51,468,54,468,56,468,57,468,58,468,59,468,60,468,61,468,62,468,62,468,63,468,64,468,65,468,65,468,66,468,67,468,68,468,69,468,70', NULL, '{"itemDescription":"brazillian Blowout","modelNumber":"","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.hairstyle.com"}', '2015-06-23 03:53:19'),
(109, 31, '439,50,438,51,438,54,438,57,438,59,438,62,438,64,438,68,438,70,438,72,438,73,438,75,438,77', NULL, '{"itemDescription":"brazillian Blowout","modelNumber":"","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.hairstyle.com"}', '2015-06-23 03:53:19'),
(110, 31, '428,64,428,65,428,67,428,70,428,71,428,73,428,75,428,77,428,79,428,80,428,85,428,87,428,88,428,88,428,89,428,90,428,91,428,92,428,93,428,94,428,95,428,96,428,97,428,97,428,98,428,100,428,101,428,103', NULL, '{"itemDescription":"brazillian Blowout","modelNumber":"","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.hairstyle.com"}', '2015-06-23 03:53:19'),
(102, 31, '431,97,431,96,431,95,431,94,431,93,431,92,431,91,431,90,431,89,431,88,431,87,431,85,431,82,431,79,431,77,431,75,431,73,431,72,431,71,431,69,431,68,431,67,431,67,431,66,431,65,431,64,431,63', NULL, '{"itemDescription":"brazillian Blowout","modelNumber":"","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.hairstyle.com"}', '2015-06-23 03:53:19'),
(103, 31, '454,40,454,41,454,43,454,44,454,45,454,46,454,48,454,50,454,52,454,55,454,57,454,60,454,62,454,64,454,66,454,67,454,67,454,68,454,69,454,69,454,70,454,71,454,72', NULL, '{"itemDescription":"brazillian Blowout","modelNumber":"","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.hairstyle.com"}', '2015-06-23 03:53:19'),
(104, 31, '483,33,483,34,483,36,483,37,483,38,483,39,483,40,483,41,483,43,483,45,483,48,483,51,483,52,483,53,483,55,483,56,483,57,483,58,483,60,483,63,483,64,483,65,483,66,483,67,483,68,483,69,483,70,483,71,483,72,483,74,483,75,483,76,484,76,484,77,484,78,484,79', NULL, '{"itemDescription":"brazillian Blowout","modelNumber":"","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.hairstyle.com"}', '2015-06-23 03:53:19'),
(105, 31, '513,36,513,37,513,39,513,41,513,44,513,47,513,51,513,53,513,66,513,67,513,68,513,69,513,70,514,70,514,72,514,72,514,73,514,74,514,75,514,75,514,76,514,77,514,78,514,78,514,79', NULL, '{"itemDescription":"brazillian Blowout","modelNumber":"","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.hairstyle.com"}', '2015-06-23 03:53:19'),
(106, 31, '532,78,532,79,532,80,532,83,532,85,532,89,532,91,532,92,532,94,532,95,532,96,533,96,533,97,533,98,533,99,534,99,534,101,534,101,535,102,535,103,535,104,536,105,536,107,536,109,537,110,537,111,537,111,538,112,538,113,538,113,538,114,539,114,539,115,539,116,539,116', NULL, '{"itemDescription":"brazillian Blowout","modelNumber":"","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.hairstyle.com"}', '2015-06-23 03:53:19'),
(86, 26, '821,258,811,273,798,295,784,321,776,340,761,377,753,405,744,440,734,488,722,546,715,589,708,622,696,657,692,680,717,690,745,701,771,703,800,707,829,706,848,706,864,713,859,698,857,677,855,677,859,648,869,600,880,547,897,479,913,410,925,367,935,325,941,302,939,283,933,294,918,311,905,327,897,335,890,344,877,353,868,358,847,367,837,351,830,339,821,333,817,321,813,314', NULL, NULL, '2015-04-24 06:08:36'),
(87, 26, '688,696,677,713,690,722,701,727,716,733,726,736,761,747,765,754,809,756,810,754,853,749,868,748,871,742,874,737,878,737,886,734,886,730,868,716,853,718,825,719,762,716,728,710', NULL, NULL, '2015-04-24 11:36:36'),
(88, 30, '41,64,116,29,112,116', 'kizomba3.jpg', '{"itemDescription":"Description 1","modelNumber":"model 1","manufacturingPartNumber":"part 1","manufacturingDescription":"man desc 1","url":"http:\\/\\/mkgalaxy.com"}', '2015-05-02 04:33:47'),
(95, 31, '420,243,399,277,391,318,391,347,391,382,397,401,390,433,385,482,384,518,384,549,391,564,401,521,405,481,410,428,421,370,442,324,471,285,499,249,522,224,513,217,488,244,456,288,429,327,407,370,402,339', 'f_1434858134_square-earrings-gold3 zoara.com.jpg', '{"itemDescription":"Necklace Ring","modelNumber":"Ring Necklace","manufacturingPartNumber":"54yes","manufacturingDescription":"Necklace Ring","url":"http:\\/\\/www.6pm.com"}', '2015-06-21 06:40:21'),
(94, 31, '288,677,243,685,192,705,167,716,152,743,154,775,164,808,188,836,223,857,258,870,285,874', 'f_1434857362_womens hat.jpg', '{"itemDescription":"Top Hat","modelNumber":"HA456","manufacturingPartNumber":"HatWtop","manufacturingDescription":"Straw top hat ","url":"http:\\/\\/www.hats.com"}', '2015-06-21 06:27:54'),
(90, 30, '32,147,124,148,111,223,40,223,11,177,9,122', 'f_1431187116_kizomba2.jpg', '{"itemDescription":"my new description comes here","modelNumber":"model 1234","manufacturingPartNumber":"part number","manufacturingDescription":"desc2","url":"http:\\/\\/facebook.com"}', '2015-05-09 18:58:05'),
(91, 31, '376,258,367,301,366,315,360,332,353,349,348,362,350,384,356,409,357,435,350,467,336,490,322,514,297,583,289,650,290,698,286,944,286,1020,310,1015,340,1011,362,1022,369,1044,420,1045,433,1116,443,1070,431,1021,447,955,470,842,488,734,494,627,494,535,499,490,521,438,541,389,540,330,543,285,559,253,575,248,549,237,537,240,509,294,498,321,474,331,436,333,403,331,371,323,371,308,385,284,400,257', 'f_1433816916_anvil women pink tank top4.jpg', '{"itemDescription":"miss match shirt","modelNumber":"90210","manufacturingPartNumber":"","manufacturingDescription":"Pink t shirt","url":"www.myshirt.com"}', '2015-06-09 05:11:30'),
(92, 32, '232,77,232,78,231,78,230,78,227,78,223,77,218,75,216,72,214,69,213,65,212,62,210,60,210,56,210,53,210,49,212,45,214,39,218,35,221,32,224,29,229,28,233,28,237,27,242,26,247,26,252,25,256,25,260,25,263,25,266,25,269,25,272,28,274,31,276,36,278,40,279,43,280,46,281,49,282,51,282,54,282,56,282,61,282,65,282,71,281,77,279,83,276,87,273,90,271,92,265,93,261,93,257,93,252,93,248,91,246,91,244,90,241,89,239,88,238,87,236,86,235,85,235,84,235,84,235,83,233,82,233,81,233,80,233,79,233,78,232,78,232,77', NULL, NULL, '2015-06-20 07:52:24'),
(74, 14, '610,220,618,220,621,220,626,220,634,220,639,220,645,220,649,220,653,220,656,220,659,220,663,220,667,220,673,220,677,219,683,218,691,214,698,211,704,207,708,205,714,202,717,201,721,199,723,197', NULL, NULL, '2015-04-19 07:11:08'),
(75, 14, '639,188,640,188,644,187,650,185,657,182,663,179,669,176,676,172,680,169,685,164,688,162,692,159,696,157,698,155,702,153,705,151,707,150,708,149', NULL, NULL, '2015-04-19 07:11:08'),
(76, 14, '709,147,709,146,709,145,710,142,710,140,713,137,713,135,714,132,715,131,715,130,716,130,717,129,719,128,720,127,721,126,725,123,727,122,728,122,729,121,730,121,731,120,732,120,733,119', NULL, NULL, '2015-04-19 07:11:08'),
(77, 14, '634,197,634,196,634,193,635,190,636,185,638,181,640,178,642,174,646,169,649,163,651,161,655,157,657,155,659,153', NULL, NULL, '2015-04-19 07:11:08'),
(78, 14, '609,207,609,203,609,203,609,201,609,199,610,195,612,189,615,183,617,177,620,172,622,167,623,164,625,159,627,156,628,155,629,153,630,152,631,151,632,151', NULL, NULL, '2015-04-19 07:11:08'),
(79, 14, '622,213,624,213,624,213,625,213,626,213,629,209,633,203,636,195,638,187,640,180,641,175,642,171,643,167,644,163,646,158,647,156,649,151,650,147,652,145,654,143', NULL, NULL, '2015-04-19 07:11:08'),
(80, 14, '621,239,622,238,624,235,627,232,630,227,634,222,638,215,643,208,647,202,651,195,655,189,658,184,660,181,662,178,664,176,667,174', NULL, NULL, '2015-04-19 07:11:08'),
(81, 14, '674,222,678,220,679,219,681,218,682,217,683,216,685,215,685,214,687,214,689,212,690,211,692,210,693,208,695,206,697,204,701,202,704,200,706,198,707,197,708,197,710,197,710,196,712,196,713,196', NULL, NULL, '2015-04-19 07:11:08'),
(82, 14, '699,237,701,237,706,235,711,232,716,229,721,225,725,223,729,220,731,219,733,217,736,216,739,214,741,213,742,211,745,211,745,210,747,210', NULL, NULL, '2015-04-19 07:11:08'),
(83, 14, '310,2268,299,2279,288,2301,283,2316,282,2328,290,2327,299,2313,310,2302,323,2296,341,2298,351,2307,358,2319,358,2327,364,2325,364,2310,355,2298,347,2294,330,2289,321,2287,322,2279,320,2274', NULL, NULL, '2015-04-19 07:14:25'),
(84, 14, '997,1806,956,1845,932,1874,912,1903,902,1926,901,1945,905,1959,910,1996,920,2026,930,2055,933,2073,944,2103,949,2143,945,2187,941,2219,938,2232,955,2246,975,2261,999,2273,1037,2278,1083,2289,1135,2305,1164,2314,1210,2319,1256,2328,1279,2327,1289,2306,1311,2313,1347,2310,1389,2310,1409,2305,1407,2296,1394,2286,1371,2270,1338,2248,1312,2234,1269,2213,1228,2188,1194,2160,1167,2119,1072,1935,1035,1847,1014,1808', NULL, NULL, '2015-04-19 07:17:44'),
(63, 14, '665,229,665,228,667,225,669,219,671,211,673,203,676,197,677,194,679,191,681,189,682,187,684,185,686,184', NULL, NULL, '2015-04-19 07:11:08'),
(64, 14, '651,210,652,204,652,202,652,194,653,183,655,172,656,161,656,155,656,150', NULL, NULL, '2015-04-19 07:11:08'),
(65, 14, '617,209,617,208,617,207,617,205,617,202,617,199,617,194,617,187,617,179,617,171,617,165,617,159,617,156', NULL, NULL, '2015-04-19 07:11:08'),
(66, 14, '591,234,591,234,590,229,590,225,590,222,590,220,590,218,590,216,590,212,590,206,590,200,590,193,590,185,590,181,589,176,589,172,589,170,588,169', NULL, NULL, '2015-04-19 07:11:08'),
(67, 14, '555,213,555,212,555,206,555,197,555,188,555,181,555,173,555,167,555,164,555,160,555,158', NULL, NULL, '2015-04-19 07:11:08'),
(68, 14, '530,233,529,230,529,226,529,222,529,217,529,212,529,207,529,201,529,196,529,193,529,192,529,191,529,189,529,188,529,187', NULL, NULL, '2015-04-19 07:11:08'),
(69, 14, '517,242,516,239,516,238,516,237,516,233,516,227,516,222,516,216,516,211,516,208,516,206,516,204,516,203,516,202,516,201,516,200,516,198,516,197,516,195,516,194,516,192,516,190,515,187,514,183,514,180,512,178,511,176,511,175', NULL, NULL, '2015-04-19 07:11:08'),
(70, 14, '499,234,499,234,500,234,504,233,509,231,514,228,519,226,527,224,533,221,540,218,549,214,557,211,566,205,576,200,583,195,592,191,598,186,602,183,607,180,611,179,613,177', NULL, NULL, '2015-04-19 07:11:08'),
(71, 14, '501,217,503,217,508,217,517,217,527,214,538,211,549,207,559,205,567,201,572,200,577,197,581,195,584,194,588,192,593,191,597,189,602,188,607,185,613,182,618,179,621,177,626,176,629,174', NULL, NULL, '2015-04-19 07:11:08'),
(72, 14, '505,204,506,204,507,204,514,202,523,200,533,198,541,196,551,194,557,192,562,191,568,189,574,187,579,185,583,182,589,179,594,176,599,173,602,171,606,166,609,165,613,163', NULL, NULL, '2015-04-19 07:11:08'),
(73, 14, '492,197,494,196,498,196,504,196,510,195,518,192,524,188,532,183,539,178,546,174,552,171,558,169,565,167,570,165,574,164,580,163,585,161,588,161,592,160,596,157,600,157,603,156,605,156,607,156,609,155,611,155,612,155,613,155,614,155,615,154', NULL, NULL, '2015-04-19 07:11:08'),
(111, 42, '116,45,116,63,117,88,94,117,94,122,123,107,143,98,169,90,212,86,235,88,235,92,234,103,231,123,276,98,251,80,232,65,207,19,183,10,164,14,146,19,131,27', 'f_1435117955_womens hat.jpg', '{"itemDescription":"Top Hat","modelNumber":"bz23-21","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.hats.com"}', '2015-06-24 06:49:53'),
(112, 42, '142,116,142,128,143,140,147,149,149,146', 'f_1435118025_square-earrings-gold.jpg', '{"itemDescription":"Triple Box","modelNumber":"g32","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.jerods.com"}', '2015-06-24 06:50:25'),
(113, 42, '85,182,61,186,56,189,54,202,59,231,66,263,70,286,235,286,235,269,238,245,246,214,254,186,226,174,216,188,201,220,188,239,174,250,140,256,110,253,94,242,82,212', 'f_1435118092_anvil women pink tank top4.jpg', '{"itemDescription":"Anvil Tank Top","modelNumber":"ttp54","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.shirtstop.com"}', '2015-06-24 06:51:25'),
(114, 42, '173,112,172,112,171,112,171,112,170,112,169,112,168,112,168,113,167,113,166,113,165,114,165,115,165,116,165,117,164,117,164,118,163,118,163,119,162,119,162,121,162,122,162,122,161,122,161,123,161,124,161,125,160,125,160,126,160,127,160,127,160,128,160,129,160,130,160,131,160,132,161,132,161,133,162,133,162,134,163,134,163,134,164,134,165,134,165,135,166,135,167,135,168,135,168,135,169,135,170,135,170,135,171,135,172,135,173,135,173,135,174,135,175,135,176,135,177,135,178,134,178,134,178,133,179,133,180,132,181,132,181,132,182,132,182,131,183,131,183,130,183,129,184,129,184,127,184,126,184,125,184,124,184,122,184,121,183,117', NULL, '{"itemDescription":"Light Shadow Blend","modelNumber":"blush","manufacturingPartNumber":"","manufacturingDescription":"","url":"http:\\/\\/www.saphora.com"}', '2015-06-24 06:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `main_image`
--

CREATE TABLE IF NOT EXISTS `main_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resizeImg` int(1) NOT NULL DEFAULT '0',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `defaultRecord` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `main_image`
--

INSERT INTO `main_image` (`id`, `uid`, `fileName`, `created_dt`, `resizeImg`, `width`, `height`, `defaultRecord`) VALUES
(31, NULL, 'FemaleStoryboard.jpg', '2015-06-09 05:07:38', 0, 324, 240, 0),
(30, NULL, 'Pk-Movie-Box-Office-Prediction-and-Budget.jpg', '2015-05-02 04:33:06', 0, 324, 240, 0),
(42, NULL, 'f_1435117686_Depositphotos_26194961_l.jpg', '2015-06-24 06:48:07', 1, 440, 324, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `maxRecordPerPage` int(11) DEFAULT '1',
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `maxRecordPerPage`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE IF NOT EXISTS `tracking` (
  `tracking_id` int(11) NOT NULL AUTO_INCREMENT,
  `main_image_id` int(11) DEFAULT NULL,
  `image_detail_id` int(11) DEFAULT NULL,
  `clicked_time` datetime NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tracking_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`tracking_id`, `main_image_id`, `image_detail_id`, `clicked_time`, `ip`) VALUES
(1, 30, 88, '2015-05-23 18:38:26', '50.131.45.246'),
(2, 30, 88, '2015-05-23 19:02:16', '50.131.45.246'),
(3, 30, 90, '2015-05-23 19:02:32', '50.131.45.246'),
(4, 31, 91, '2015-06-09 02:30:30', '50.131.45.246'),
(5, 31, 91, '2015-06-20 04:15:12', '67.181.89.89'),
(6, 31, 93, '2015-06-21 03:19:56', '50.131.45.246'),
(7, 31, 95, '2015-06-21 04:23:56', '67.181.89.89'),
(8, 31, 95, '2015-06-23 00:46:42', '50.131.45.246'),
(9, 31, 106, '2015-06-23 00:59:13', '50.131.45.246'),
(10, 31, 95, '2015-06-23 00:59:26', '50.131.45.246'),
(11, 42, 114, '2015-06-24 03:58:44', '50.131.45.246'),
(12, 42, 113, '2015-06-24 03:59:08', '50.131.45.246'),
(13, 42, 111, '2015-06-24 03:59:23', '50.131.45.246'),
(14, 42, 113, '2015-06-28 15:48:58', '50.131.45.246');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;