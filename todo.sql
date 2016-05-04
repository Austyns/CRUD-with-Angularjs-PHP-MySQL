-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2016 at 08:13 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
`id` int(11) NOT NULL,
  `name_task` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `reg_at` datetime NOT NULL,
  `reg_to` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `name_task`, `status`, `reg_at`, `reg_to`) VALUES
(4, 'Looking at beautiful womens', 'Completed', '2016-04-22 14:59:27', '0000-00-00 00:00:00'),
(5, 'Attend Startup Friday', 'Completed', '2016-04-22 20:05:53', '0000-00-00 00:00:00'),
(6, 'Finish This Bullshit', 'Completed', '2016-04-23 20:45:38', '2008-04-25 08:37:17'),
(7, 'Complete My 100000 th lines of Code', 'Completed', '2016-04-23 20:47:46', '2008-04-25 08:37:17'),
(9, 'The Last to test Delete', 'Completed', '2016-04-23 20:50:10', '2008-04-25 08:37:17'),
(10, 'Alert box in angularjs', 'pending', '2016-04-23 22:18:39', '2008-04-25 08:37:17'),
(11, 'AngulsrJs function to Properly fomat datetime and allow to show mins and days ago', 'pending', '2016-04-23 22:21:11', '2016-04-25 08:37:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
