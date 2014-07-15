-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2014 at 02:49 AM
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
-- Table structure for table `ptolemy_members`
--

CREATE TABLE IF NOT EXISTS `ptolemy_members` (
`id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `student_name` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_date_registered` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

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
(24, 787293, 'Sklyar MacMillan', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ptolemy_members`
--
ALTER TABLE `ptolemy_members`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ptolemy_members`
--
ALTER TABLE `ptolemy_members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
