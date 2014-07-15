-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2014 at 08:07 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `frc-attend`
--

-- --------------------------------------------------------

--
-- Table structure for table `ptolemy_attendance`
--

CREATE TABLE IF NOT EXISTS `ptolemy_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `student_attendance` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=71 ;

--
-- Dumping data for table `ptolemy_attendance`
--

INSERT INTO `ptolemy_attendance` (`id`, `student_id`, `student_attendance`) VALUES
(51, 194326, '2014-07-01 13:12:43'),
(52, 135642, '2014-07-01 13:12:49'),
(53, 200045, '2014-07-01 13:12:57'),
(54, 359100, '2014-07-01 13:13:08'),
(55, 790156, '2014-07-01 13:13:22'),
(56, 890216, '2014-07-01 13:13:36'),
(57, 893456, '2014-07-01 13:13:55'),
(58, 905143, '2014-07-01 13:14:16'),
(59, 194326, '2014-07-01 13:14:20'),
(60, 135642, '2014-07-01 13:14:22'),
(61, 200045, '2014-07-01 13:14:25'),
(62, 359100, '2014-07-01 13:14:28'),
(63, 790156, '2014-07-01 13:14:31'),
(64, 890216, '2014-07-01 13:14:34'),
(65, 893456, '2014-07-01 13:14:37'),
(66, 905143, '2014-07-01 13:14:40'),
(67, 194326, '2014-07-02 04:57:02'),
(68, 194326, '2014-07-02 04:57:21'),
(69, 194326, '2014-07-03 21:02:32'),
(70, 194326, '2014-07-03 21:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `ptolemy_hours`
--

CREATE TABLE IF NOT EXISTS `ptolemy_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_worked` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ptolemy_hours`
--

INSERT INTO `ptolemy_hours` (`id`, `student_id`, `date`, `time_worked`) VALUES
(1, 194326, '2014-07-01', '00:01:37'),
(2, 135642, '2014-07-01', '00:01:33'),
(3, 200045, '2014-07-01', '00:01:28'),
(4, 359100, '2014-07-01', '00:01:20'),
(5, 790156, '2014-07-01', '00:01:09'),
(6, 890216, '2014-07-01', '00:00:58'),
(7, 893456, '2014-07-01', '00:00:42'),
(8, 905143, '2014-07-01', '00:00:24'),
(9, 194326, '2014-07-02', '00:00:19'),
(10, 194326, '2014-07-03', '00:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `ptolemy_members`
--

CREATE TABLE IF NOT EXISTS `ptolemy_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `student_name` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_date_registered` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ptolemy_members`
--

INSERT INTO `ptolemy_members` (`id`, `student_id`, `student_name`, `student_date_registered`) VALUES
(1, 194326, 'David Anderson', '2014-06-30 23:48:12'),
(2, 135642, 'Jeff Moreau', '2014-06-30 23:48:23'),
(3, 200045, 'Donnel Udina', '2014-06-30 23:48:32'),
(4, 359100, 'Karin Chakwas', '2014-06-30 23:48:41'),
(5, 790156, 'Saren Arterius', '2014-06-30 23:48:50'),
(6, 890216, 'Ashley Williams', '2014-06-30 23:49:00'),
(7, 893456, 'Garrus Vakarian', '2014-06-30 23:49:09'),
(8, 905143, 'Kaidan Alenko', '2014-06-30 23:49:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
