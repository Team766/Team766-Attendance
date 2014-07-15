-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2014 at 02:48 AM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.2

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=127 ;

--
-- Dumping data for table `ptolemy_attendance`
--

INSERT INTO `ptolemy_attendance` (`id`, `student_id`, `student_attendance`) VALUES
(98, 769569, '2014-07-09 22:03:23'),
(99, 769569, '2014-07-09 22:03:27'),
(100, 769569, '2014-07-09 22:03:37'),
(101, 769569, '2014-07-09 22:03:46'),
(102, 769569, '2014-07-09 22:03:52'),
(103, 769569, '2014-07-09 22:03:55'),
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
(121, 786508, '2014-07-12 17:00:58'),
(123, 785212, '2014-07-12 17:01:41'),
(124, 786508, '2014-07-12 17:02:54'),
(125, 786508, '2014-07-14 17:26:35'),
(126, 786508, '2014-07-14 17:42:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ptolemy_attendance`
--
ALTER TABLE `ptolemy_attendance`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ptolemy_attendance`
--
ALTER TABLE `ptolemy_attendance`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
