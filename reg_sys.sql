-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2013 at 11:03 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reg_sys`
--
CREATE DATABASE IF NOT EXISTS `reg_sys` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reg_sys`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `fees` double NOT NULL DEFAULT '0',
  `duration` int(11) NOT NULL,
  `discipline` varchar(100) NOT NULL,
  `f_id` int(11) NOT NULL,
  `pre-requisites` varchar(500) NOT NULL,
  `start_date` date NOT NULL,
  `no_of_students` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `name`, `fees`, `duration`, `discipline`, `f_id`, `pre-requisites`, `start_date`, `no_of_students`) VALUES
(1, 'Database Management Systems', 10000, 3, 'CSE', 8, '', '0000-00-00', 0),
(2, 'Operating Systems', 30000, 8, 'CSE', 8, '', '0000-00-00', 0),
(3, 'Environment Education', 5000, 2, 'General', 8, '', '0000-00-00', 0),
(4, 'Fluid Mechanics', 4000, 12, 'Mechanical Engg', 8, '', '0000-00-00', 0),
(5, 'Fluid Mech Advanced', 3000, 3, 'ME', 8, 'Basic ME', '2013-11-24', 0),
(6, 'Microprocessor', 5000, 12, 'EE', 8, 'Basic EE', '2013-11-24', 0),
(7, 'Data Structures', 5000, 6, 'CSE', 8, 'C++ programs', '2013-09-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(10) NOT NULL,
  `surname` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(200) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `acc_no` bigint(20) NOT NULL,
  `acc_bal` double NOT NULL,
  `country` varchar(20) DEFAULT NULL,
  `class_no` varchar(10) DEFAULT NULL,
  `profile` varchar(300) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `login`, `password`, `name`, `surname`, `email`, `website`, `phone`, `acc_no`, `acc_bal`, `country`, `class_no`, `profile`) VALUES
(1, 'banda', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', '', '', 0, 0, 0, '', '', ''),
(2, 'vivek1', '061a01a98f80f415b1431236b62bb10b', 'Vivek', 'Tejwani', 'vivek@g.com', 'http://www.google.com', 231, 421421, 42141, '', '', 'df'),
(3, 'vivek12', '061a01a98f80f415b1431236b62bb10b', 'Vivek', 'Tejwani', 'vivek@g.com', 'http://www.google.com', 231, 421421, 42141, '', '', 'jkj'),
(4, 'vivek123', '061a01a98f80f415b1431236b62bb10b', 'Vivek', 'Tejwani', 'vivek@g.com', 'http://www.google.com', 231, 421421, 42141, '', '', 'jk'),
(5, 'vivek1234', '061a01a98f80f415b1431236b62bb10b', 'Vivek', 'Tejwani', 'vivek@g.com', 'http://www.google.com', 231, 421421, 42141, '', '', 'jkj'),
(6, 'vivek12345', 'd297dda509b172cfcac253e56079a042', 'Vivek', 'Tejwani', 'vivek@g.com', 'http://www.google.com', 231, 421421, 42141, '', '', 'jk'),
(7, 'vivek1233', '7d077f716c9a40f5660456534922464f', 'Vivek', 'Tejwani', 'vivek@g.com', 'http://www.google.com', 231, 421421, 42141, '', '', 'jokkj'),
(8, 'gbanda', 'c157cd3cfba5c444f2f0e6378f3da47e', 'Gourinath', 'Banda', 'gb@iiti.ac.in', 'http://gbanda.com', 21431, 214112, 30000, 'india', 'nalks', 'I teach OS'),
(9, 'gbanda1', 'c157cd3cfba5c444f2f0e6378f3da47e', 'Gourinath', 'Banda', 'gb@iiti.ac.in', 'http://gbanda.com', 21431, 214112, 4214, 'india', 'nalks', 'fsakln'),
(10, 'gbanda2', '7885444af42e4b30c518c5be17c8850b', 'Gourinath', 'Banda', 'gb@iiti.ac.in', 'http://gbanda.com', 21431, 214112, 4214, 'india', 'nalks', 'few'),
(11, 'kahuja', '3499776ee73013a17c9ce7c3c3b252e5', 'Kapil', 'Ahuja', 'kahuja@iiti.ac.in', 'http://www.kahuja.com', 24125, 241920, 235190, 'sanoi', 'fnowi', 'wfln');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `request_info` varchar(500) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`r_id`, `s_id`, `f_id`, `c_id`, `request_info`) VALUES
(1, 2, 8, 3, 'Request to postpone exams.'),
(2, 1, 8, 1, 'Teach all that you examine!');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `street` varchar(50) DEFAULT NULL,
  `pin_code` bigint(20) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account_no` bigint(20) NOT NULL,
  `account_bal` double NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `phone` bigint(20) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `login`, `password`, `name`, `surname`, `street`, `pin_code`, `city`, `email`, `account_no`, `account_bal`, `website`, `phone`) VALUES
(1, 'vivek123', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', NULL, NULL, '', '', 0, 0, NULL, 0),
(2, 'vivek1', '061a01a98f80f415b1431236b62bb10b', 'Vivek', 'Tejwani', '1238fnk', 400052, 'nfdkfn', 'vivek@gma.com', 92183, 62831, 'http://www.l.com', 902183),
(3, 'vivek_tej', '7d077f716c9a40f5660456534922464f', 'Vivek', 'Tejwani', 'Carter Road', 4000522, 'Mumbai', 'vivekt.iiti@gmail.com', 210983, 38210, 'http://www.google.com', 9584530997);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `quiz1` double NOT NULL DEFAULT '0',
  `quiz2` double NOT NULL DEFAULT '0',
  `mid_sem` double NOT NULL DEFAULT '0',
  `end_sem` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`s_id`, `c_id`, `quiz1`, `quiz2`, `mid_sem`, `end_sem`) VALUES
(2, 2, 0, 0, 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `c_f` FOREIGN KEY (`c_id`) REFERENCES `faculty` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `r_c` FOREIGN KEY (`r_id`) REFERENCES `courses` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r_s` FOREIGN KEY (`r_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
