-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Sep 07, 2020 at 04:11 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klu`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignmentfiletypequestion`
--

DROP TABLE IF EXISTS `assignmentfiletypequestion`;
CREATE TABLE IF NOT EXISTS `assignmentfiletypequestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `ques` text NOT NULL,
  `QuestionType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignmentquiz`
--

DROP TABLE IF EXISTS `assignmentquiz`;
CREATE TABLE IF NOT EXISTS `assignmentquiz` (
  `Qid` int(11) NOT NULL AUTO_INCREMENT,
  `Topic` varchar(255) NOT NULL,
  `FilePath` varchar(255) DEFAULT NULL,
  `Qname` text NOT NULL,
  `opA` text NOT NULL,
  `opB` text NOT NULL,
  `opC` text NOT NULL,
  `opD` text NOT NULL,
  `correct` text NOT NULL,
  `correct2` text,
  `correct3` text,
  `QuestionType` varchar(255) DEFAULT NULL,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Qid`),
  KEY `FK_RegNo` (`StaffID`),
  KEY `FK_CourseID` (`CourseID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignmentshortans`
--

DROP TABLE IF EXISTS `assignmentshortans`;
CREATE TABLE IF NOT EXISTS `assignmentshortans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `ques` text NOT NULL,
  `Ans` varchar(255) NOT NULL,
  `QuestionType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignmenttruefalse`
--

DROP TABLE IF EXISTS `assignmenttruefalse`;
CREATE TABLE IF NOT EXISTS `assignmenttruefalse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `ques` text NOT NULL,
  `opA` varchar(255) NOT NULL,
  `opB` varchar(255) NOT NULL,
  `ans` varchar(255) NOT NULL,
  `QuestionType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignstudentfiletypeans`
--

DROP TABLE IF EXISTS `assignstudentfiletypeans`;
CREATE TABLE IF NOT EXISTS `assignstudentfiletypeans` (
  `studentMarkId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `Topic` varchar(255) NOT NULL,
  `ques` text,
  `id` int(11) DEFAULT NULL,
  `Ans` text NOT NULL,
  `Mark` int(11) DEFAULT NULL,
  PRIMARY KEY (`studentMarkId`),
  KEY `FK_questionid` (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignstudentquizans`
--

DROP TABLE IF EXISTS `assignstudentquizans`;
CREATE TABLE IF NOT EXISTS `assignstudentquizans` (
  `studentMarkId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `ques` text,
  `Ans` varchar(255) DEFAULT NULL,
  `Ans2` varchar(255) DEFAULT NULL,
  `Ans3` varchar(255) DEFAULT NULL,
  `Mark` int(11) NOT NULL,
  `Qid` int(11) DEFAULT NULL,
  PRIMARY KEY (`studentMarkId`),
  KEY `FK_questionid` (`Qid`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignstudentshortans`
--

DROP TABLE IF EXISTS `assignstudentshortans`;
CREATE TABLE IF NOT EXISTS `assignstudentshortans` (
  `studentMarkId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `Topic` varchar(255) NOT NULL,
  `ques` text,
  `id` int(11) DEFAULT NULL,
  `Ans` varchar(255) NOT NULL,
  `Mark` int(11) DEFAULT NULL,
  PRIMARY KEY (`studentMarkId`),
  KEY `FK_questionid` (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignstudenttruefalse`
--

DROP TABLE IF EXISTS `assignstudenttruefalse`;
CREATE TABLE IF NOT EXISTS `assignstudenttruefalse` (
  `studentMarkId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `ques` text,
  `id` int(11) DEFAULT NULL,
  `Ans` varchar(255) DEFAULT NULL,
  `Mark` int(11) NOT NULL,
  PRIMARY KEY (`studentMarkId`),
  KEY `FK_questionid` (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assigntopic`
--

DROP TABLE IF EXISTS `assigntopic`;
CREATE TABLE IF NOT EXISTS `assigntopic` (
  `TopicID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `QuestionType` varchar(255) DEFAULT NULL,
  `StartTime` bigint(20) DEFAULT NULL,
  `ExpiryTime` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`TopicID`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `ChatID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `ID` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `ques` text NOT NULL,
  `date1` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ChatID`),
  KEY `FK_CourseID` (`CourseID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ChatID`, `CourseID`, `ID`, `Name`, `ques`, `date1`) VALUES
(1, 'CSE123', '11', 'Pravenn', ' hi', '2020-09-02 06:41:04'),
(2, 'Cse18R2005', '123', 'Shibin Varghese', ' What is Oops?\r\n', '2020-09-03 16:55:06'),
(3, 'Cse18R2005', '222', 'surya', 'Hi there', '2020-09-03 16:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `CourseID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Dept` text NOT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `Duration` varchar(255) NOT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `CompilerRequired` tinyint(1) NOT NULL,
  PRIMARY KEY (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `Name`, `Dept`, `StaffID`, `Duration`, `ExpiryDate`, `CompilerRequired`) VALUES
('CSE123', 'OOPS', 'CSE', '1', '12 weks', '2020-08-19', 1),
('Cse18R2005', 'Java ', 'CSE', '123', '12 weeks', '2020-10-03', 1),
('Cse18R203205', 'NeW cOURSE', 'CSE', '1', '12 weeks', '2020-09-18', 0),
('1234', 'Shibin Varghese', 'ECE', '1', '12 weeks', '2020-09-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `filetypequestion`
--

DROP TABLE IF EXISTS `filetypequestion`;
CREATE TABLE IF NOT EXISTS `filetypequestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `Topic` varchar(255) NOT NULL,
  `ques` text NOT NULL,
  `QuestionType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filetypequestion`
--

INSERT INTO `filetypequestion` (`id`, `CourseID`, `StaffID`, `unit`, `Topic`, `ques`, `QuestionType`) VALUES
(1, 'Cse18R2005', '123', '1', 'Java Programming', 'OOPs?', 'filetype'),
(4, 'CSE123', '1', '1', 'new topic 3.0', 'Hi everyone', 'filetype'),
(3, 'CSE123', '1', '1', 'new topic 5', 'hehehe', 'filetype');

-- --------------------------------------------------------

--
-- Table structure for table `practicequiz`
--

DROP TABLE IF EXISTS `practicequiz`;
CREATE TABLE IF NOT EXISTS `practicequiz` (
  `Qid` int(11) NOT NULL AUTO_INCREMENT,
  `Unit` varchar(255) NOT NULL,
  `Topic` varchar(255) NOT NULL,
  `FilePath` varchar(255) DEFAULT NULL,
  `Qname` text NOT NULL,
  `opA` text NOT NULL,
  `opB` text NOT NULL,
  `opC` text NOT NULL,
  `opD` text NOT NULL,
  `correct` text NOT NULL,
  `correct2` text,
  `correct3` text,
  `QuestionType` varchar(255) DEFAULT NULL,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Qid`),
  KEY `FK_RegNo` (`StaffID`),
  KEY `FK_CourseID` (`CourseID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practicequiz`
--

INSERT INTO `practicequiz` (`Qid`, `Unit`, `Topic`, `FilePath`, `Qname`, `opA`, `opB`, `opC`, `opD`, `correct`, `correct2`, `correct3`, `QuestionType`, `CourseID`, `StaffID`) VALUES
(1, '1', 'Java Programming', NULL, 'This is single choice mcq', 'alien', 'surya', 'sURYA', 'asda', 'surya', '', '', 'mcq', 'Cse18R2005', '123');

-- --------------------------------------------------------

--
-- Table structure for table `practicestudentquizans`
--

DROP TABLE IF EXISTS `practicestudentquizans`;
CREATE TABLE IF NOT EXISTS `practicestudentquizans` (
  `studentMarkId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `ques` text,
  `Ans` varchar(255) DEFAULT NULL,
  `Ans2` varchar(255) DEFAULT NULL,
  `Ans3` varchar(255) DEFAULT NULL,
  `Mark` int(11) NOT NULL,
  `Qid` int(11) DEFAULT NULL,
  PRIMARY KEY (`studentMarkId`),
  KEY `FK_questionid` (`Qid`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practicestudentquizans`
--

INSERT INTO `practicestudentquizans` (`studentMarkId`, `CourseID`, `RegNo`, `unit`, `topic`, `ques`, `Ans`, `Ans2`, `Ans3`, `Mark`, `Qid`) VALUES
(1, 'Cse18R2005', '222', '1', 'Java Programming', 'This is single choice mcq', 'alien', NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `practicestudenttruefalse`
--

DROP TABLE IF EXISTS `practicestudenttruefalse`;
CREATE TABLE IF NOT EXISTS `practicestudenttruefalse` (
  `studentMarkId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `ques` text,
  `id` int(11) DEFAULT NULL,
  `Ans` varchar(255) DEFAULT NULL,
  `Mark` int(11) NOT NULL,
  PRIMARY KEY (`studentMarkId`),
  KEY `FK_questionid` (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `practicetruefalse`
--

DROP TABLE IF EXISTS `practicetruefalse`;
CREATE TABLE IF NOT EXISTS `practicetruefalse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `Topic` varchar(255) NOT NULL,
  `ques` text NOT NULL,
  `opA` varchar(255) NOT NULL,
  `opB` varchar(255) NOT NULL,
  `ans` varchar(255) NOT NULL,
  `QuestionType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `input` varchar(100) NOT NULL,
  `output` varchar(100) NOT NULL,
  `format` text NOT NULL,
  `t1in` varchar(100) NOT NULL,
  `t1out` varchar(1000) NOT NULL,
  `t2in` varchar(100) NOT NULL,
  `t2out` varchar(100) NOT NULL,
  `ques` varchar(500) NOT NULL,
  `title` varchar(100) NOT NULL,
  `Number` varchar(100) NOT NULL,
  `language` varchar(255) NOT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `CourseID` varchar(255) DEFAULT NULL,
  `StartTime` bigint(20) DEFAULT NULL,
  `ExpiryTime` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `Qid` int(11) NOT NULL AUTO_INCREMENT,
  `Unit` varchar(255) NOT NULL,
  `Topic` varchar(255) NOT NULL,
  `FilePath` varchar(255) DEFAULT NULL,
  `Qname` text NOT NULL,
  `opA` text NOT NULL,
  `opB` text NOT NULL,
  `opC` text NOT NULL,
  `opD` text NOT NULL,
  `correct` text NOT NULL,
  `correct2` text,
  `correct3` text,
  `QuestionType` varchar(255) DEFAULT NULL,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Qid`),
  KEY `FK_RegNo` (`StaffID`),
  KEY `FK_CourseID` (`CourseID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`Qid`, `Unit`, `Topic`, `FilePath`, `Qname`, `opA`, `opB`, `opC`, `opD`, `correct`, `correct2`, `correct3`, `QuestionType`, `CourseID`, `StaffID`) VALUES
(1, '1', 'Marathon', NULL, 'who r u?', 'alien', 'surya', 'devil', 'luci', 'surya', '', '', 'mcq', 'CSE123', '1'),
(2, '2', 'NewCourse', NULL, 'Hello there', 'alien', 'surya', 'devil', 'wqe', 'sd', '', '', 'mcq', 'CSE123', '1'),
(3, '1', 'karthick', NULL, 'New  Trial MCQ 2?', 'alien', 'surya', 'devil', 'hi', 'hello', '', '', 'mcq', 'CSE123', '1'),
(4, '1', 'new Topic', NULL, 'This is single choice mcq', 'alien', 'surya', 'devil', 'luci', 'surya', '', '', 'mcq', 'CSE123', '1'),
(5, '1', 'new Topic', NULL, 'New  Trial MCQ 2?', 'alien', 'surya', 'devil', 'asda', 'sdfsdf', '', '', 'mcq', 'CSE123', '1'),
(6, '14', 'new topic 2.0', NULL, 'Hello there', 'alien', 'surya', 'ssda', 'df', 'sdfsdf', '', '', 'mcq', 'CSE123', '1'),
(7, '1', 'Java Programming', NULL, 'What is a class?', 'template', 'oops', 'new', 'instantiate', 'template', '', '', 'mcq', 'Cse18R2005', '123'),
(8, '1', 'Java Programming', NULL, 'Opps?', 'Object Oriented Programming', 'Procedural prog', 'Sequential Prog', 'Functional Prog', 'Object Oriented Programming', '', '', 'mcq', 'Cse18R2005', '123'),
(9, '1', 'new topic 5', NULL, 'who r u?', 'alien', 'surya', 'devil', 'luci', 'surya', '', '', 'mcq', 'CSE123', '1'),
(10, '1', 'new topic 5', NULL, 'Hello there', 'alien', 'surya', 'qwe', 'wqe', 'surya', '', '', 'mcq', 'CSE123', '1'),
(11, '23', 'new topic 5', NULL, 'who r u?', 'alien', 'surya', 'devil', 'sf', 'alien', '', '', 'mcq', 'CSE123', '1');

-- --------------------------------------------------------

--
-- Table structure for table `registeredcourse`
--

DROP TABLE IF EXISTS `registeredcourse`;
CREATE TABLE IF NOT EXISTS `registeredcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_RegNo` (`RegNo`),
  KEY `FK_CourseID` (`CourseID`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registeredcourse`
--

INSERT INTO `registeredcourse` (`id`, `CourseID`, `RegNo`) VALUES
(89, 'CSE123', '1'),
(88, '1234', '22'),
(87, 'CSE123', '22'),
(86, 'Cse18R203205', '22'),
(85, '1234', '1'),
(84, 'Cse18R2005', '1'),
(90, 'Cse18R203205', '1');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE IF NOT EXISTS `resources` (
  `ResourceID` int(11) NOT NULL AUTO_INCREMENT,
  `FilePath` varchar(255) DEFAULT NULL,
  `Unit` varchar(255) DEFAULT NULL,
  `VideoLink` text,
  `Extlink` text,
  `Topic` text,
  `CourseID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ResourceID`),
  KEY `FK_CourseID` (`CourseID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`ResourceID`, `FilePath`, `Unit`, `VideoLink`, `Extlink`, `Topic`, `CourseID`) VALUES
(1, '', '1', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/mAtkPQO1FcA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '', 'Java Programming', 'Cse18R2005'),
(2, 'BSc Nursing.pdf', '3', '', '', 'C Sharp', 'Cse18R2005');

-- --------------------------------------------------------

--
-- Table structure for table `shortans`
--

DROP TABLE IF EXISTS `shortans`;
CREATE TABLE IF NOT EXISTS `shortans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `Topic` varchar(255) NOT NULL,
  `ques` text NOT NULL,
  `Ans` varchar(255) NOT NULL,
  `QuestionType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shortans`
--

INSERT INTO `shortans` (`id`, `CourseID`, `StaffID`, `unit`, `Topic`, `ques`, `Ans`, `QuestionType`) VALUES
(1, 'Cse18R2005', '123', '1', 'Java Programming', 'Define Inheritance ?', '', 'shortans'),
(2, 'CSE123', '1', '1', 'new topic 5', 'Hi everyone', '', 'shortans');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `StaffID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Dept` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  PRIMARY KEY (`StaffID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Name`, `Password`, `Dept`, `Email`, `PhoneNo`) VALUES
('1', 'Shibin Varghese', '1', 'cse', 'shibinshibin96@gmail.com', '+919567797009'),
('12345', 'Shibin Varghese', '1', 'cse', 'shibinshibin96@gmail.com', '+919567797009'),
('123', 'Shibin Varghese', '123', 'cse', 'shibinshibin96@gmail.com', '+919567797009');

-- --------------------------------------------------------

--
-- Table structure for table `staffannouncement`
--

DROP TABLE IF EXISTS `staffannouncement`;
CREATE TABLE IF NOT EXISTS `staffannouncement` (
  `AnnouncementID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `Ans` text NOT NULL,
  `date1` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AnnouncementID`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffannouncement`
--

INSERT INTO `staffannouncement` (`AnnouncementID`, `CourseID`, `StaffID`, `Ans`, `date1`) VALUES
(1, 'Cse18R2005', '123', ' file uploaded', '2020-09-03 16:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `staffregisteredcourse`
--

DROP TABLE IF EXISTS `staffregisteredcourse`;
CREATE TABLE IF NOT EXISTS `staffregisteredcourse` (
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  KEY `FK_RegNo` (`StaffID`),
  KEY `FK_CourseID` (`CourseID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `RegNo` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `CLG` varchar(255) NOT NULL,
  `Dept` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `CourseID` varchar(255) DEFAULT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  PRIMARY KEY (`RegNo`),
  KEY `FK_CourseID` (`CourseID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`RegNo`, `Password`, `Name`, `CLG`, `Dept`, `Email`, `CourseID`, `PhoneNo`) VALUES
('11', '1', 'Pravenn', 'klu', 'Civil Engineering', 'shibinshibin96@gmail.com', '', '+919567797009'),
('22', '1', 'james', 'klu', 'Mechanical Engineering', 'shibinshibin96@gmail.com', '', '+919567797009'),
('44', '4', 'Shibin Varghese', 'klu', 'Mechanical Engineering', 'shibinshibin96@gmail.com', NULL, '+919567797009'),
('33', '3', 'Shibin Varghese', 'klu', 'cse', 'shibinshibin96@gmail.com', NULL, '+919567797009'),
('1', '1', 'Karthick', 'klu', 'cse', 'sjdj@122.com', '', '+919567797009'),
('222', '2', 'surya', 'klu', 'cse', '12345@gmail.com', '', '875158548'),
('5', '5', 'Shibin Varghese', 'klu', 'cse', 'shibinshibin96@gmail.com', '', '+919567797009'),
('3', '3', 'Shibin Varghese', 'klu', 'cse', 'shibinshibin96@gmail.com', '', '+919567797009'),
('4', '4', 'Shibin Varghese', 'klu', 'ffd', 'shibinshibin96@gmail.com', '', '+919567797009');

-- --------------------------------------------------------

--
-- Table structure for table `studentfiletypeans`
--

DROP TABLE IF EXISTS `studentfiletypeans`;
CREATE TABLE IF NOT EXISTS `studentfiletypeans` (
  `studentMarkId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `Topic` varchar(255) NOT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `ques` text,
  `id` int(11) DEFAULT NULL,
  `Ans` text NOT NULL,
  `Mark` int(11) DEFAULT NULL,
  PRIMARY KEY (`studentMarkId`),
  KEY `FK_questionid` (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentfiletypeans`
--

INSERT INTO `studentfiletypeans` (`studentMarkId`, `CourseID`, `RegNo`, `Topic`, `unit`, `ques`, `id`, `Ans`, `Mark`) VALUES
(1, 'Cse18R2005', '1', 'Java Programming', '1', 'OOPs?', 1, 'New Note (2).txt', 50),
(2, 'Cse18R2005', '222', 'Java Programming', '1', 'OOPs?', 1, 'BSc Nursing.pdf', 100),
(4, 'CSE123', '11', 'new topic 5', '1', 'hehehe', 3, 'BSc Nursing.pdf', 52),
(5, 'CSE123', '1', 'new topic 3.0', '1', 'Hi everyone', 4, 'CourseDetails.php', 12),
(6, 'CSE123', '1', 'new topic 5', '1', 'hehehe', 3, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentlabresponse`
--

DROP TABLE IF EXISTS `studentlabresponse`;
CREATE TABLE IF NOT EXISTS `studentlabresponse` (
  `StudentLabId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `Ans` text NOT NULL,
  PRIMARY KEY (`StudentLabId`),
  KEY `FK_questionid` (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentmark`
--

DROP TABLE IF EXISTS `studentmark`;
CREATE TABLE IF NOT EXISTS `studentmark` (
  `studentMarkId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `questionid` int(11) NOT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `QuestionType` varchar(255) DEFAULT NULL,
  `Mark` int(11) NOT NULL,
  PRIMARY KEY (`studentMarkId`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentquizans`
--

DROP TABLE IF EXISTS `studentquizans`;
CREATE TABLE IF NOT EXISTS `studentquizans` (
  `studentMarkId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `ques` text,
  `Ans` varchar(255) DEFAULT NULL,
  `Ans2` varchar(255) DEFAULT NULL,
  `Ans3` varchar(255) DEFAULT NULL,
  `Mark` int(11) NOT NULL,
  `Qid` int(11) DEFAULT NULL,
  PRIMARY KEY (`studentMarkId`),
  KEY `FK_questionid` (`Qid`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentquizans`
--

INSERT INTO `studentquizans` (`studentMarkId`, `CourseID`, `RegNo`, `unit`, `topic`, `ques`, `Ans`, `Ans2`, `Ans3`, `Mark`, `Qid`) VALUES
(19, 'Cse18R2005', '222', '1', 'Java Programming', 'What is a class?', 'template', NULL, NULL, 1, 7),
(20, 'Cse18R2005', '222', '1', 'Java Programming', 'Opps?', 'Procedural prog', NULL, NULL, 0, 8),
(18, 'Cse18R2005', '1', '1', 'Java Programming', 'What is a class?', 'template', NULL, NULL, 1, 7),
(17, 'CSE123', '11', '14', 'new topic 2.0', 'Hello there', 'alien', NULL, NULL, 0, 6),
(15, 'CSE123', '11', '1', 'new Topic', 'This is single choice mcq', 'alien', NULL, NULL, 0, 4),
(16, 'CSE123', '11', '1', 'new Topic', 'New  Trial MCQ 2?', 'surya', NULL, NULL, 0, 5),
(21, 'CSE123', '22', '14', 'new topic 2.0', 'Hello there', 'surya', NULL, NULL, 0, 6),
(41, 'CSE123', '5', '14', 'new topic 2.0', 'Hello there', 'surya', NULL, NULL, 0, 6),
(42, 'CSE123', '5', '1', 'new topic 5', 'who r u?', 'surya', NULL, NULL, 1, 9),
(43, 'CSE123', '5', '1', 'new topic 5', 'Hello there', 'surya', NULL, NULL, 1, 10),
(44, 'CSE123', '5', '23', 'new topic 5', 'who r u?', 'surya', NULL, NULL, 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `studentshortans`
--

DROP TABLE IF EXISTS `studentshortans`;
CREATE TABLE IF NOT EXISTS `studentshortans` (
  `studentMarkId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `Topic` varchar(255) NOT NULL,
  `ques` text,
  `id` int(11) DEFAULT NULL,
  `Ans` varchar(255) NOT NULL,
  `Mark` int(11) DEFAULT NULL,
  PRIMARY KEY (`studentMarkId`),
  KEY `FK_questionid` (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentshortans`
--

INSERT INTO `studentshortans` (`studentMarkId`, `CourseID`, `RegNo`, `unit`, `Topic`, `ques`, `id`, `Ans`, `Mark`) VALUES
(1, 'Cse18R2005', '1', '1', 'Java Programming', 'Define Inheritance ?', 1, 'Reusability, ', 50),
(2, 'Cse18R2005', '222', '1', 'Java Programming', 'Define Inheritance ?', 1, 'none', 100),
(3, 'CSE123', '5', '1', 'new topic 5', 'Hi everyone', 2, 'Hello there', 20),
(4, 'CSE123', '11', '1', 'new topic 5', 'Hi everyone', 2, 'hi there', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studenttruefalse`
--

DROP TABLE IF EXISTS `studenttruefalse`;
CREATE TABLE IF NOT EXISTS `studenttruefalse` (
  `studentMarkId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `ques` text,
  `id` int(11) DEFAULT NULL,
  `Ans` varchar(255) DEFAULT NULL,
  `Mark` int(11) NOT NULL,
  PRIMARY KEY (`studentMarkId`),
  KEY `FK_questionid` (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_RegNo` (`RegNo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenttruefalse`
--

INSERT INTO `studenttruefalse` (`studentMarkId`, `CourseID`, `RegNo`, `unit`, `topic`, `ques`, `id`, `Ans`, `Mark`) VALUES
(1, 'Cse18R2005', '1', '1', 'Java Programming', 'Template?', 1, 'True', 1),
(2, 'Cse18R2005', '222', '1', 'Java Programming', 'Template?', 1, 'False', 0),
(3, 'CSE123', '5', '1', 'new topic 5', 'Hi everyone', 2, 'fa', 1),
(4, 'CSE123', '11', '1', 'new topic 5', 'Hi everyone', 2, 'tr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `TopicID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `QuestionType` varchar(255) DEFAULT NULL,
  `StartTime` bigint(20) DEFAULT NULL,
  `ExpiryTime` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`TopicID`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`TopicID`, `CourseID`, `StaffID`, `unit`, `topic`, `QuestionType`, `StartTime`, `ExpiryTime`) VALUES
(1, 'CSE123', '1', '1', 'Marathon', 'mcq', 1598733060, 1598891460),
(2, 'CSE123', '1', '2', 'NewCourse', 'mcq', 1598734800, 1598843160),
(3, 'CSE123', '1', '1', 'karthick', 'mcq', 1598734860, 1598893260),
(4, 'CSE123', '1', '1', 'new Topic', 'mcq', 1599019860, 1599192660),
(5, 'CSE123', '1', '14', 'new topic 2.0', 'mcq', 1599023100, 1599973500),
(6, 'Cse18R2005', '123', '1', 'Java Programming', 'mcq', 1599063720, 1599236520),
(7, 'CSE123', '1', '1', 'new topic 5', 'mcq', 1599183960, 1600134360),
(8, 'CSE123', '1', '1', 'new topic 3.0', 'mcq', 1599270480, 1600393680);

-- --------------------------------------------------------

--
-- Table structure for table `truefalse`
--

DROP TABLE IF EXISTS `truefalse`;
CREATE TABLE IF NOT EXISTS `truefalse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` varchar(255) DEFAULT NULL,
  `StaffID` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `Topic` varchar(255) NOT NULL,
  `ques` text NOT NULL,
  `opA` varchar(255) NOT NULL,
  `opB` varchar(255) NOT NULL,
  `ans` varchar(255) NOT NULL,
  `QuestionType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CourseID` (`CourseID`),
  KEY `FK_StaffID` (`StaffID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truefalse`
--

INSERT INTO `truefalse` (`id`, `CourseID`, `StaffID`, `unit`, `Topic`, `ques`, `opA`, `opB`, `ans`, `QuestionType`) VALUES
(1, 'Cse18R2005', '123', '1', 'Java Programming', 'Template?', 'True', 'False', 'True', 'trufalse'),
(2, 'CSE123', '1', '1', 'new topic 5', 'Hi everyone', 'tr', 'fa', 'fa', 'trufalse');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
