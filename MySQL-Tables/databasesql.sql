-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2015 at 09:16 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `team`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employeeID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`employeeID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `fileID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(32) NOT NULL,
  `projectID` int(10) unsigned DEFAULT NULL,
  `user` varchar(32) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`fileID`),
  KEY `projectID` (`projectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileID`, `location`, `projectID`, `user`, `date`) VALUES
(1, 'uploads/watch1.jpg', 1, 'hey', '2015-11-12 18:24:37'),
(3, 'uploads/watch1.jpg', 1, 'njohn', '2015-11-12 18:24:37'),
(4, 'uploads/sports2.png', 1, 'njohn', '2015-11-12 18:24:37'),
(5, 'uploads/sports3.jpg', 2, 'njohn', '2015-11-12 18:24:37'),
(6, 'uploads/NickJohnson_Journal7.doc', 2, 'njohn', '2015-11-13 19:39:01'),
(7, 'uploads/projectlogo.png', 2, 'njohn', '2015-11-15 22:49:06'),
(8, 'uploads/logo.png', 2, 'njohn', '2015-11-15 22:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `forum_messages`
--

CREATE TABLE IF NOT EXISTS `forum_messages` (
  `messageID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(140) NOT NULL,
  `user` varchar(20) NOT NULL,
  `projectID` int(10) unsigned DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`messageID`),
  KEY `projectID` (`projectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `forum_messages`
--

INSERT INTO `forum_messages` (`messageID`, `message`, `user`, `projectID`, `date`) VALUES
(1, 'hey', 'njohn', NULL, '2015-11-12 18:24:22'),
(2, 'hey', 'njohn', NULL, '2015-11-12 18:24:22'),
(3, 'hey', 'njohn', NULL, '2015-11-12 18:24:22'),
(4, 'hi', 'njohn', NULL, '2015-11-12 18:24:22'),
(5, 'hoi', 'njohn', NULL, '2015-11-12 18:24:22'),
(6, 'hi', 'njohn', NULL, '2015-11-12 18:24:22'),
(7, 'hi', 'njohn', NULL, '2015-11-12 18:24:22'),
(8, 'hi', 'njohn', NULL, '2015-11-12 18:24:22'),
(9, 'hi', 'njohn', NULL, '2015-11-12 18:24:22'),
(10, 'hi', 'njohn', NULL, '2015-11-12 18:24:22'),
(11, 'hi', 'njohn', NULL, '2015-11-12 18:24:22'),
(12, 'hi', 'njohn', NULL, '2015-11-12 18:24:22'),
(13, 'hi', 'njohn', NULL, '2015-11-12 18:24:22'),
(14, 'hi', 'njohn', NULL, '2015-11-12 18:24:22'),
(15, 'hi', 'njohn', NULL, '2015-11-12 18:24:22'),
(16, 'yo', 'njohn', NULL, '2015-11-12 18:24:22'),
(17, 'project1', 'njohn', 1, '2015-11-12 18:24:22'),
(18, 'project2', 'njohn', 2, '2015-11-12 18:24:22'),
(19, 'hey', 'njohn', 1, '2015-11-12 18:25:37'),
(20, 'hey project 3', 'njohn', 3, '2015-11-13 18:55:36'),
(21, 'project 4', 'njohn', 4, '2015-11-13 19:19:02'),
(22, 'whatsup', 'sjohn1', 1, '2015-11-13 19:19:28'),
(23, 'Whatsuppppp', 'sjohn1', 2, '2015-11-13 19:19:39'),
(24, 'test', 'njohn', 1, '2015-11-15 21:44:47'),
(25, 'test2', 'njohn', 1, '2015-11-15 21:45:19'),
(26, 'hey', 'njohn', 1, '2015-11-17 22:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `help_requests`
--

CREATE TABLE IF NOT EXISTS `help_requests` (
  `ticketID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(140) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`ticketID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `help_requests`
--

INSERT INTO `help_requests` (`ticketID`, `message`, `name`, `phone`, `email`, `date`, `userID`) VALUES
(1, 'This is just a test.', 'Nick Johnson', '512-522-4324', 'gasfsdf@gmail.com', '2015-11-12 18:20:16', 0),
(2, 'test 2', 'Joe Johnson', '2342-42342-2343', 'asdfsdaf@gmail.com', '2015-11-12 18:22:19', 0),
(3, 'TESTING', 'Nick', '512-522-4324', 'sdfasdf@gmail.com', '2015-11-15 23:26:42', 0),
(4, 'Does this even work??', 'Michael', '234-423-2342', 'slkdfsldf@gmail.com', '2015-11-17 23:59:28', 0),
(5, 'wassssssup', 'Michael', '234-423-2342', 'slkdfsldf@gmail.com', '2015-11-18 00:03:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `images2`
--

CREATE TABLE IF NOT EXISTS `images2` (
  `location` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images2`
--

INSERT INTO `images2` (`location`) VALUES
('uploads/ace.png'),
('uploads/watch.jpg'),
('uploads/header2.png'),
('uploads/paper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `instant_messaging`
--

CREATE TABLE IF NOT EXISTS `instant_messaging` (
  `instantMessageID` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(10) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`instantMessageID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_records`
--

CREATE TABLE IF NOT EXISTS `login_records` (
  `userID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attemptID` int(32) DEFAULT NULL,
  `result` enum('Failure','Success') DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `login_records`
--

INSERT INTO `login_records` (`userID`, `username`, `date`, `attemptID`, `result`) VALUES
(1, 'njohn', '2015-11-13 19:58:11', NULL, NULL),
(2, 'sjohn1', '2015-11-13 19:58:40', NULL, NULL),
(3, 'njohn', '2015-11-13 21:38:41', NULL, NULL),
(4, 'njohn', '2015-11-15 21:37:47', NULL, NULL),
(5, 'njohn', '2015-11-15 21:43:21', NULL, NULL),
(6, 'njohn', '2015-11-15 22:15:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions2`
--

CREATE TABLE IF NOT EXISTS `permissions2` (
  `userID` int(10) unsigned NOT NULL,
  `projectID` int(10) unsigned NOT NULL,
  `permission` varchar(32) NOT NULL,
  KEY `userID` (`userID`),
  KEY `projectID` (`projectID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `private_messaging`
--

CREATE TABLE IF NOT EXISTS `private_messaging` (
  `privateMessageID` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(10) unsigned NOT NULL,
  `recievingUserID` int(32) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`privateMessageID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projectname` varchar(32) NOT NULL,
  `description` varchar(140) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `projectManagerID` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectname`, `description`, `date`, `projectManagerID`) VALUES
(1, 'TestProject', 'This is for project 1', '2015-11-12 18:24:59', 0),
(2, 'Test2', 'This is just a test.', '2015-11-12 18:24:59', 0),
(3, 'project 3', 'heasdjfhjasdfs', '2015-11-12 18:24:59', 0),
(4, 'Project 4', 'This is the description for project 4', '2015-11-13 19:01:17', 0),
(5, 'Project 5 ', 'This is project5', '2015-11-18 20:13:07', 0),
(6, 'Project 5 ', 'This is project5', '2015-11-18 20:13:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_assigned`
--

CREATE TABLE IF NOT EXISTS `users_assigned` (
  `permissionID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(20) NOT NULL,
  `projectID` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`permissionID`),
  KEY `projectID` (`projectID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `userID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `unique_username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`userID`, `username`, `password`) VALUES
(1, 'njohn', '32aa0c466818e1ccba25b8793db98c94'),
(3, 'sjohn1', 'd0b60ebb1bd279a4b76549fdad85cb32');

-- --------------------------------------------------------

--
-- Table structure for table `user_previous_passwords`
--

CREATE TABLE IF NOT EXISTS `user_previous_passwords` (
  `userID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `previousPassword` varchar(32) NOT NULL,
  `projectID` int(10) unsigned DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_privacy`
--

CREATE TABLE IF NOT EXISTS `user_privacy` (
  `privacyID` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(10) unsigned NOT NULL,
  `username` varchar(32) NOT NULL,
  `PhoneNum` enum('All','Partial','None') DEFAULT NULL,
  `Email` enum('All','Partial','None') DEFAULT NULL,
  `Company` enum('All','Partial','None') DEFAULT NULL,
  `Address` enum('All','Partial','None') DEFAULT NULL,
  `FirstName` enum('All','Partial','None') DEFAULT NULL,
  `LastName` enum('All','Partial','None') DEFAULT NULL,
  PRIMARY KEY (`privacyID`),
  KEY `userID` (`userID`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `company` varchar(20) DEFAULT NULL,
  `address` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `forename`, `surname`, `email`, `username`, `password`, `company`, `address`) VALUES
(1, 'Nick', 'Johnson', 'njohn@farmingdale.edu', 'njohn', '32aa0c466818e1ccba25b8793db98c94', NULL, NULL),
(2, 'Bilal', 'sdfasdfds', 'asdfsd@gmail.com', 'bilal1', '913418e993f0b9c5838549ec64271757', NULL, NULL),
(3, 'wewe', 'hey', 'sdfsdf@gmail.com', 'taco1', 'c835fe642881e15848b3e51b8819e119', NULL, NULL),
(4, 'Cathy', 'Johnson', 'sdfsdf212@yasdf.com', 'cjohn', '31d98c08e51eea35745586472231a4fd', NULL, NULL),
(5, 'robert', 'johnson', 'sdfsdfds@2qwda.com', 'rjohn', '5a90326ce497eecf56ca9d15a3ae598f', NULL, NULL),
(6, 'Samantha', 'Johnson', 'asdasdas@gao.com', 'sjohn1', 'd0b60ebb1bd279a4b76549fdad85cb32', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_profile` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`id`);

--
-- Constraints for table `forum_messages`
--
ALTER TABLE `forum_messages`
  ADD CONSTRAINT `forum_messages_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`id`);

--
-- Constraints for table `instant_messaging`
--
ALTER TABLE `instant_messaging`
  ADD CONSTRAINT `instant_messaging_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_profile` (`id`);

--
-- Constraints for table `login_records`
--
ALTER TABLE `login_records`
  ADD CONSTRAINT `login_records_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_profile` (`id`),
  ADD CONSTRAINT `login_records_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user_profile` (`username`);

--
-- Constraints for table `permissions2`
--
ALTER TABLE `permissions2`
  ADD CONSTRAINT `permissions2_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_profile` (`id`),
  ADD CONSTRAINT `permissions2_ibfk_2` FOREIGN KEY (`projectID`) REFERENCES `projects` (`id`);

--
-- Constraints for table `private_messaging`
--
ALTER TABLE `private_messaging`
  ADD CONSTRAINT `private_messaging_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_profile` (`id`);

--
-- Constraints for table `users_assigned`
--
ALTER TABLE `users_assigned`
  ADD CONSTRAINT `users_assigned_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `users_assigned_ibfk_2` FOREIGN KEY (`permissionID`) REFERENCES `user_profile` (`id`);

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_profile` (`id`);

--
-- Constraints for table `user_previous_passwords`
--
ALTER TABLE `user_previous_passwords`
  ADD CONSTRAINT `user_previous_passwords_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_profile` (`id`);

--
-- Constraints for table `user_privacy`
--
ALTER TABLE `user_privacy`
  ADD CONSTRAINT `user_privacy_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_profile` (`id`),
  ADD CONSTRAINT `user_privacy_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user_profile` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
