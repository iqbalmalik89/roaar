-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2016 at 04:52 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roaar`
--
CREATE DATABASE IF NOT EXISTS `roaar` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `roaar`;

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `docID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `filename` varchar(128) NOT NULL,
  `type` varchar(16) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`docID`, `userID`, `filename`, `type`, `date_added`) VALUES
(16, 1, '5ifeHxiWKYs', 'ytvid', '2016-03-02 16:35:26'),
(15, 2, '1456780303-Pilot Registration | ROAAR 2016-02-23 13-43-06.png', 'doc', '2016-02-29 21:11:43'),
(12, 1, '1456746369-karl-ehic.png', 'doc', '2016-02-29 11:46:09'),
(11, 1, '1456746268-karl-drivinglicence.png', 'doc', '2016-02-29 11:44:28'),
(14, 1, '1456746871-Karl Cooper CV.pdf', 'doc', '2016-02-29 11:54:31'),
(21, 2, '1456942876-Beating the Blues V2.mp4', 'vid', '2016-03-02 18:21:16'),
(19, 1, '1456937726-GOPR0914.MP4', 'vid', '2016-03-02 16:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `emailID` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `message` varchar(2048) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`emailID`, `name`, `subject`, `message`) VALUES
(1, 'Airline Interested', 'Airline Interested', 'Hi [fname] [sname],\n\nThere is an airline interested in you!\n\nRegards,\nROAAR'),
(2, 'Interview Requested', 'Interview Requested', 'Hi [fname],\n\nThere is an interview requested.\n\nRegards,\nROAAR');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `experienceID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `exp-aircraft-type` varchar(64) NOT NULL,
  `exp-captain-time` int(11) NOT NULL,
  `exp-firstofficer-time` int(11) NOT NULL,
  `exp-instructor-time` int(11) NOT NULL,
  `exp-dateoflastflight` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`experienceID`, `userID`, `exp-aircraft-type`, `exp-captain-time`, `exp-firstofficer-time`, `exp-instructor-time`, `exp-dateoflastflight`) VALUES
(1, 1, 'Select Aircraft Type', 22, 22, 22, '2016-01-06'),
(2, 1, 'Select Aircraft Type', 99, 99, 99, '2015-12-31'),
(3, 1, 'Select Aircraft Type', 222, 222, 222, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `historyID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `exp-history-airline-company` varchar(64) NOT NULL,
  `exp-history-from` date NOT NULL,
  `exp-history-to` date NOT NULL,
  `exp-history-position` varchar(64) NOT NULL,
  `exp-history-leaving` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`historyID`, `userID`, `exp-history-airline-company`, `exp-history-from`, `exp-history-to`, `exp-history-position`, `exp-history-leaving`) VALUES
(1, 1, 'my company', '2016-01-01', '2016-01-02', 'Select your Position', 'crazy reason for leaving'),
(2, 2, 'Select an Option', '0000-00-00', '0000-00-00', 'Select your Position', '2312312312'),
(3, 2, '', '0000-00-00', '0000-00-00', 'Select your Position', 'wewewe');

-- --------------------------------------------------------

--
-- Table structure for table `instructor-experience`
--

CREATE TABLE `instructor-experience` (
  `instr-experienceID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `instr-exp-instructor-aircraft-type` varchar(64) NOT NULL,
  `instr-exp-training-type` varchar(64) NOT NULL,
  `instr-exp-airline-company` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructor-experience`
--

INSERT INTO `instructor-experience` (`instr-experienceID`, `userID`, `instr-exp-instructor-aircraft-type`, `instr-exp-training-type`, `instr-exp-airline-company`) VALUES
(1, 1, 'Select Aircraft Type', 'Select Type of Training', 'Select an option'),
(2, 1, 'Select Aircraft Type', 'Select Type of Training', 'Select an option');

-- --------------------------------------------------------

--
-- Table structure for table `licence`
--

CREATE TABLE `licence` (
  `licenceID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `licence-no` varchar(64) NOT NULL,
  `licence-type` varchar(64) NOT NULL,
  `licence-coi` varchar(64) NOT NULL,
  `licence-typeratings` varchar(64) NOT NULL,
  `licence-doi` date NOT NULL,
  `licence-doe` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `licence`
--

INSERT INTO `licence` (`licenceID`, `userID`, `licence-no`, `licence-type`, `licence-coi`, `licence-typeratings`, `licence-doi`, `licence-doe`) VALUES
(4, 1, '123456789', 'FAA ATPL', 'GB', 'B461 BAe 146-100 Pax', '2015-01-01', '2016-01-01'),
(5, 1, '987654321', 'JAA ATPL', 'AF', 'A320 Airbus A320-100/200', '2010-01-01', '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `refs`
--

CREATE TABLE `refs` (
  `refID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `companyname` varchar(64) NOT NULL,
  `staffname` varchar(128) NOT NULL,
  `contactnumber` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refs`
--

INSERT INTO `refs` (`refID`, `userID`, `companyname`, `staffname`, `contactnumber`, `email`) VALUES
(1, 1, 'test company', 'test name', '012345678', 'text@test.com'),
(2, 1, 'second company', 'second name', '3456789', '567890');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `sname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `dob` date NOT NULL,
  `address1` varchar(64) NOT NULL,
  `address2` varchar(64) NOT NULL,
  `address3` varchar(64) NOT NULL,
  `city` varchar(64) NOT NULL,
  `county` varchar(64) NOT NULL,
  `country` varchar(64) NOT NULL,
  `telno-code` varchar(64) NOT NULL,
  `telno-1` varchar(64) NOT NULL,
  `telno-2` varchar(64) NOT NULL,
  `type-of-work` varchar(64) NOT NULL,
  `passport1-no` varchar(64) NOT NULL,
  `passport1-country` varchar(64) NOT NULL,
  `passport1-date` date NOT NULL,
  `passport1-expiry` date NOT NULL,
  `passport2-no` varchar(64) NOT NULL,
  `passport2-country` varchar(64) NOT NULL,
  `passport2-date` date NOT NULL,
  `passport2-expiry` varchar(64) NOT NULL,
  `medical-date` date NOT NULL,
  `medical-dateexp` date NOT NULL,
  `aircraft-type` varchar(64) NOT NULL,
  `proficiency-check` date NOT NULL,
  `proficiency-renewal` date NOT NULL,
  `instrument-aircraft-type` varchar(64) NOT NULL,
  `instrument-check` date NOT NULL,
  `instrument-renewal` date NOT NULL,
  `6months-aircraft-type` varchar(64) NOT NULL,
  `captain-time` int(11) NOT NULL,
  `firstofficer-time` int(11) NOT NULL,
  `instructor-time` int(11) NOT NULL,
  `total-captain-time` int(11) NOT NULL,
  `total-firstofficer-time` int(11) NOT NULL,
  `total-instructor-time` int(11) NOT NULL,
  `hear-about` varchar(64) NOT NULL,
  `misc` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `profile-pic` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(4) NOT NULL,
  `pilot` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fname`, `sname`, `email`, `dob`, `address1`, `address2`, `address3`, `city`, `county`, `country`, `telno-code`, `telno-1`, `telno-2`, `type-of-work`, `passport1-no`, `passport1-country`, `passport1-date`, `passport1-expiry`, `passport2-no`, `passport2-country`, `passport2-date`, `passport2-expiry`, `medical-date`, `medical-dateexp`, `aircraft-type`, `proficiency-check`, `proficiency-renewal`, `instrument-aircraft-type`, `instrument-check`, `instrument-renewal`, `6months-aircraft-type`, `captain-time`, `firstofficer-time`, `instructor-time`, `total-captain-time`, `total-firstofficer-time`, `total-instructor-time`, `hear-about`, `misc`, `password`, `profile-pic`, `date_created`, `admin`, `pilot`) VALUES
(3, 'Karl', 'Cooper', 'cooperk937@hotmail.co.uk', '1992-01-06', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '2016-04-11 10:36:09', 0, 1),
(7, 'Shy', 'Rotem', 'shyrotem@gmail.com', '2000-01-01', '12 Cecilia ct', '', '', 'Howell', 'NJ', 'US', '1', '732', '618-8595', 'Full Time', '123456789', 'US', '2000-01-01', '2010-01-01', '123456789', 'AI', '2001-01-01', '2012-02-02', '2016-01-01', '2016-01-01', 'B736 Boeing 737-600 pax', '2010-01-01', '2010-01-01', 'B461 BAe 146 Freighter (-100QT & QC)', '2012-01-01', '2014-03-02', 'B462 BAe 146-200 Pax', 10, 0, 0, 210, 20, 0, 'Friend of client', '', '4692d19f4e3e89905421d223c56d22a754fb849e', '', '2016-04-21 23:36:01', 0, 0),
(2, 'Darren', 'Walker', 'darrenawalker@yahoo.co.uk', '1980-10-25', '', '', '', '', '', 'Please select a country', 'Code', '', '', 'Please select', '1234', 'Please select a country', '2016-02-02', '2016-02-25', '1234', 'Please select a country', '2016-02-09', '2016-02-04', '2016-02-03', '2016-02-04', 'Select Aircraft Type', '2016-02-18', '2016-02-03', 'Select Aircraft Type', '2016-02-02', '2016-02-04', 'Select Aircraft Type', 1, 1, 1, 1, 1, 2, 'Select an Option', '', '9406bad620e7c57be365bf28938ab2fdb9654a52', 'thumbnail_1456780309.jpg', '2016-02-29 21:10:44', 0, 1),
(1, '', '', 'admin', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 0, 0, 0, 0, 0, 0, '', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', '2016-03-29 01:00:51', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`docID`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`emailID`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experienceID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`historyID`);

--
-- Indexes for table `instructor-experience`
--
ALTER TABLE `instructor-experience`
  ADD PRIMARY KEY (`instr-experienceID`);

--
-- Indexes for table `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`licenceID`);

--
-- Indexes for table `refs`
--
ALTER TABLE `refs`
  ADD PRIMARY KEY (`refID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `docID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `emailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `experienceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `instructor-experience`
--
ALTER TABLE `instructor-experience`
  MODIFY `instr-experienceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `licence`
--
ALTER TABLE `licence`
  MODIFY `licenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `refs`
--
ALTER TABLE `refs`
  MODIFY `refID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
