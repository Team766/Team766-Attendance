-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2014 at 11:13 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

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
`id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_attendance` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=171 ;

--
-- Dumping data for table `ptolemy_attendance`
--

INSERT INTO `ptolemy_attendance` (`id`, `student_id`, `student_attendance`) VALUES
(104, 786508, '2014-07-12 13:05:38'),
(105, 782694, '2014-07-12 13:06:01'),
(106, 782717, '2014-07-12 13:06:26'),
(107, 783486, '2014-07-12 13:09:01'),
(108, 769553, '2014-07-12 13:12:22'),
(109, 782647, '2014-07-12 13:48:24'),
(110, 782707, '2014-07-12 14:24:30'),
(111, 785212, '2014-07-12 14:41:54'),
(112, 782647, '2014-07-12 15:14:30'),
(113, 787293, '2014-07-12 15:33:43'),
(114, 769553, '2014-07-12 15:36:01'),
(115, 782694, '2014-07-12 16:54:31'),
(116, 787293, '2014-07-12 16:57:27'),
(117, 782717, '2014-07-12 16:57:33'),
(118, 782707, '2014-07-12 16:57:47'),
(119, 782707, '2014-07-12 16:57:51'),
(120, 782707, '2014-07-12 17:00:00'),
(123, 785212, '2014-07-12 17:01:41'),
(124, 786508, '2014-07-12 17:02:54'),
(125, 786508, '2014-07-14 17:26:35'),
(126, 786508, '2014-07-14 17:42:27'),
(127, 786508, '2014-07-18 13:07:24'),
(128, 786508, '2014-07-18 13:07:42'),
(137, 786508, '2014-07-19 09:54:44'),
(138, 786508, '2014-07-19 09:54:48'),
(139, 786508, '2014-07-19 09:54:52'),
(140, 786508, '2014-07-19 09:55:01'),
(141, 786508, '2014-07-19 09:55:28'),
(142, 786508, '2014-07-19 09:55:41'),
(143, 786508, '2014-07-19 09:55:56'),
(144, 786508, '2014-07-19 09:56:02'),
(145, 782717, '2014-07-19 13:04:33'),
(146, 786508, '2014-07-19 13:04:41'),
(147, 610622, '2014-07-19 13:05:55'),
(148, 610543, '2014-07-19 13:06:02'),
(149, 769553, '2014-07-19 13:06:47'),
(150, 782694, '2014-07-19 13:16:14'),
(151, 785212, '2014-07-19 13:16:29'),
(152, 786628, '2014-07-19 13:24:12'),
(155, 610622, '2014-07-19 15:02:49'),
(156, 780216, '2014-07-19 15:13:15'),
(157, 777625, '2014-07-19 15:13:47'),
(158, 769569, '2014-07-19 15:32:14'),
(159, 769569, '2014-07-19 15:32:18'),
(160, 785212, '2014-07-19 15:33:07'),
(161, 780216, '2014-07-19 15:33:20'),
(162, 780216, '2014-07-19 15:33:35'),
(163, 785212, '2014-07-19 15:33:42'),
(164, 610543, '2014-07-19 16:51:20'),
(165, 782694, '2014-07-19 16:58:18'),
(166, 785212, '2014-07-19 17:05:27'),
(167, 782717, '2014-07-19 17:05:37'),
(168, 786508, '2014-07-19 17:05:41'),
(169, 769569, '2014-07-19 20:41:57'),
(170, 769569, '2014-07-19 20:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `ptolemy_hours`
--

CREATE TABLE IF NOT EXISTS `ptolemy_hours` (
`id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_worked` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `ptolemy_hours`
--

INSERT INTO `ptolemy_hours` (`id`, `student_id`, `date`, `time_worked`) VALUES
(11, 786508, '2014-07-14', '00:15:52'),
(12, 782694, '2014-07-12', '03:48:30'),
(13, 782717, '2014-07-12', '03:51:07'),
(14, 769553, '2014-07-12', '02:23:39'),
(15, 782647, '2014-07-12', '01:26:06'),
(16, 782707, '2014-07-12', '02:35:26'),
(17, 785212, '2014-07-12', '02:19:47'),
(18, 787293, '2014-07-12', '01:23:44'),
(19, 786508, '2014-07-18', '00:00:18'),
(20, 769569, '2014-07-18', '00:00:12'),
(21, 786508, '2014-07-12', '03:57:16'),
(22, 769569, '2014-07-19', '00:00:19'),
(23, 786508, '2014-07-19', '04:01:32'),
(24, 610622, '2014-07-19', '01:56:54'),
(25, 782694, '2014-07-19', '03:42:04'),
(26, 782717, '2014-07-19', '04:01:04'),
(27, 785212, '2014-07-19', '03:48:23'),
(28, 610543, '2014-07-19', '03:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `ptolemy_members`
--

CREATE TABLE IF NOT EXISTS `ptolemy_members` (
`id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `student_name` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_date_registered` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `ptolemy_members`
--

INSERT INTO `ptolemy_members` (`id`, `student_id`, `student_name`, `student_date_registered`) VALUES
(16, 786508, 'Brett Levenson', NULL),
(17, 782694, 'Alex Carlson', NULL),
(18, 782717, 'Thatcher Freeman', NULL),
(19, 783486, 'Ben Hickman', NULL),
(20, 769553, 'Ryan Mostofi', NULL),
(21, 782647, 'Ritwik Kesavath', NULL),
(22, 782707, 'Kyle Dixon', NULL),
(23, 785212, 'Kaveh Pezeshki', NULL),
(24, 787293, 'Sklyar MacMillan', NULL),
(26, 769569, 'Patrick Tam', '2014-07-19 06:05:54'),
(27, 610622, 'Edward Ghazarossian', '2014-07-19 13:05:17'),
(28, 610543, 'Annamarie Wire', '2014-07-19 13:05:47'),
(29, 786628, 'Andrew Yates', '2014-07-19 13:23:48'),
(31, 780216, 'Wesley Fischer', '2014-07-19 15:13:12'),
(32, 777625, 'Jacob Killelea', '2014-07-19 15:13:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ptolemy_attendance`
--
ALTER TABLE `ptolemy_attendance`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ptolemy_hours`
--
ALTER TABLE `ptolemy_hours`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ptolemy_members`
--
ALTER TABLE `ptolemy_members`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ptolemy_attendance`
--
ALTER TABLE `ptolemy_attendance`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `ptolemy_hours`
--
ALTER TABLE `ptolemy_hours`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `ptolemy_members`
--
ALTER TABLE `ptolemy_members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
