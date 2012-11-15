-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2012 at 10:44 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `sm_meeting_request`
--

CREATE TABLE IF NOT EXISTS `sm_meeting_request` (
  `meeting_id` int(15) NOT NULL AUTO_INCREMENT,
  `meeting_date` date NOT NULL,
  `start_time` varchar(30) NOT NULL,
  `end_time` varchar(30) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `agenda` text NOT NULL,
  `participents` text NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1',
  `location` varchar(15) NOT NULL,
  `reminder` int(30) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `hosted_by` varchar(30) NOT NULL,
  `hosted_date` date NOT NULL,
  PRIMARY KEY (`meeting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `sm_meeting_request`
--

INSERT INTO `sm_meeting_request` (`meeting_id`, `meeting_date`, `start_time`, `end_time`, `topic`, `agenda`, `participents`, `status`, `location`, `reminder`, `remarks`, `hosted_by`, `hosted_date`) VALUES
(33, '2012-10-11', '10:14 AM', '10:15 AM', 'tata', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', 'nznzn@mail.com;nanda@mail.com;svss@mail.com;npunee', '1', 'oody2', 0, '', 'tata1', '2012-10-11'),
(34, '2012-10-15', '10:30 AM', '11:30 AM', 'Induction Program', '<p>\r\n	Hi all</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Please Attand the meeting.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Regards,</p>\r\n<p>\r\n	HR Tata Elxsi</p>\r\n<p>\r\n	Regards , TATA ELXSI LIMITED<br />\r\n	ITPB Road Whitefield Bangalore 560 048 India<br />\r\n	Cell +91 8050 560680<br />\r\n	<a href="http://www.tataelxsi.com">www.tataelxsi.com</a></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'nandakumar@tataelxsi.co.in;marshadsaleem@tataelxsi', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(35, '2012-10-12', '11:34 AM', '11:51 AM', 'Induction Program', '<p>\r\n	Hi All</p>\r\n<p>\r\n	<strong>&nbsp; &nbsp;Please attand <em>Induction</em> program.</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Regards</p>\r\n<p>\r\n	HR Manager</p>\r\n<p>\r\n	Regards ,<br />\r\n	TATA ELXSI LIMITED<br />\r\n	ITPB Road Whitefield Bangalore 560 048 India<br />\r\n	Cell +91 8050 560680<br />\r\n	<a href="http://www.tataelxsi.com">www.tataelxsi.com</a></p>\r\n', 'nandakumar@tataelxsi.co.in;marshadsaleem@tataelxsi', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(36, '2012-10-12', '11:30 AM', '12:30 PM', 'Induction Program', '<p>\r\n	Hi All</p>\r\n<p>\r\n	&nbsp; Please attend Induction Program.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Regards,</p>\r\n<p>\r\n	HR Manager</p>\r\n<p>\r\n	TATA ELXSI LIMITED<br />\r\n	ITPB Road Whitefield Bangalore 560 048 India<br />\r\n	Cell +91 8050 560680<br />\r\n	<a href="http://www.tataelxsi.com">www.tataelxsi.com</a></p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'nandakumar@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in;sudheera@tataelxsi.co.in', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(37, '2012-10-12', '11:00 AM', '12:30 PM', 'Induction Program', '<p>\r\n	Hi All</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp;Please attend Indection program.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Regards,</p>\r\n<p>\r\n	HR Manager</p>\r\n<p>\r\n	TATA ELXSI LIMITED<br />\r\n	ITPB Road Whitefield Bangalore 560 048 India<br />\r\n	Cell +91 8050 560680<br />\r\n	<a href="http://www.tataelxsi.com">www.tataelxsi.com</a></p>\r\n<p>\r\n	&nbsp; &nbsp;</p>\r\n', 'nandakumar@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in;sudheera@tataelxsi.co.in', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(38, '2012-10-12', '11:07 AM', '11:30 AM', 'Induction Program', '<p>\r\n	Hi All</p>\r\n<p>\r\n	&nbsp; &nbsp; Please attend the <strong><em>Induction</em></strong> Program.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Regards,</p>\r\n<p>\r\n	HR Manager</p>\r\n<p>\r\n	TATA ELXSI LIMITED<br />\r\n	ITPB Road Whitefield Bangalore 560 048 India<br />\r\n	Cell +91 8050 560680<br />\r\n	<a href="http://www.tataelxsi.com">www.tataelxsi.com</a></p>\r\n', 'nandakumar@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in;sudheera@tataelxsi.co.in', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(39, '2012-10-12', '11:32 AM', '11:40 AM', 'Induction Program', '<p>\r\n	Hi All</p>\r\n<p>\r\n	&nbsp; &nbsp;Please attend <strong><em>Induction</em></strong> Program.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Regards,</p>\r\n<p>\r\n	<strong>HR Manager&nbsp;</strong></p>\r\n<p>\r\n	TATA ELXSI LIMITED<br />\r\n	ITPB Road Whitefield Bangalore 560 048 India<br />\r\n	Cell +91 8050 560680<br />\r\n	<a href="http://www.tataelxsi.com">www.tataelxsi.com</a></p>\r\n', 'nandakumar@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in;sudheera@tataelxsi.co.in', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(40, '2012-10-12', '12:06 PM', '12:13 PM', 'Induction Program', '<div>\r\n	Hi All</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&nbsp; &nbsp;Please attend Induction Program.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Regards,</div>\r\n<div>\r\n	HR Manager&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	TATA ELXSI LIMITED</div>\r\n<div>\r\n	ITPB Road Whitefield Bangalore 560 048 India</div>\r\n<div>\r\n	Cell +91 8050 560680</div>\r\n<div>\r\n	www.tataelxsi.com</div>\r\n', 'nandakumar@tataelxsi.co.in;nandakumar@tataelxsi.co.in,marshadsaleem@tataelxsi.co.in,sudheera@tataelxsi.co.in', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(41, '2012-10-12', '12:10 PM', '12:22 PM', 'Induction Program', '<p>\r\n	&nbsp;</p>\r\n<div>\r\n	Hi All</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&nbsp; &nbsp;Please attend Induction Program.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Regards,</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	HR Manager&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	TATA ELXSI LIMITED</div>\r\n<div>\r\n	ITPB Road Whitefield Bangalore 560 048 India</div>\r\n<div>\r\n	Cell +91 8050 560680</div>\r\n<div>\r\n	www.tataelxsi.com</div>\r\n', 'nandakumar@tataelxsi.co.in,marshadsaleem@tataelxsi.co.in,sudheera@tataelxsi.co.in;', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(42, '2012-10-12', '01:19 PM', '01:20 PM', 'Induction Program', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', 'nandakumar@tataelxsi.co.in;nandakumar@tataelxsi.co.in,marshadsaleem@tataelxsi.co.in,sudheera@tataelxsi.co.in', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(43, '2012-10-12', '01:26 PM', '02:26 PM', 'Induction Program', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', 'marshadsaleem@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in,nandakumar@tataelxsi.co.in', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(44, '2012-10-12', '01:27 PM', '02:27 PM', 'Induction Program', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', 'marshadsaleem@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in,nandakumar@tataelxsi.co.in', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(45, '2012-10-12', '01:33 PM', '02:33 PM', 'Induction Program', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', 'marshadsaleem@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in,nandakumar@tataelxsi.co.in', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(46, '2012-10-12', '01:34 PM', '02:34 PM', 'Induction Program', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', 'marshadsaleem@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in,nandakumar@tataelxsi.co.in', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-12'),
(47, '2012-10-14', '17:10:00 PM', '17:40:00 PM', 'Induction Program', '<p>This is some <strong>sample text</strong>.</p>\r\n', 'nandakumar@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in', '1', 'Grukul 5', 35, '', 'tata1', '2012-10-12'),
(48, '2012-11-15', '10:00 AM', '11:00 AM', ' Web Portal Sample Email', '<p>\r\n	Hi&nbsp;</p>\r\n<p>\r\n	&nbsp; &nbsp; Sample testing email.</p>\r\n<p>\r\n	Regards</p>\r\n<p>\r\n	HR Manager</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'nandakumar@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in,nandakumar@tataelxsi.co.in', '1', 'Grukul 4', 0, '', 'tata1', '2012-10-15'),
(49, '2012-11-15', '10:00 AM', '11:30 AM', ' Web Portal Sample Email', '<p>\r\n	Sample Web Portal Mail</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Regards</p>\r\n<p>\r\n	HR Manager</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'nandakumar@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in,nandakumar@tataelxsi.co.in', '1', 'Grukul 4', 0, '', 'tata1', '2012-10-15'),
(50, '2012-10-15', '06:32 PM', '06:33 PM', 'Induction Program', '<p>\r\n	Sample Web mail</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Regards</p>\r\n<p>\r\n	Manager</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'nandakumar@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in,nandakumar@tataelxsi.co.in', '1', 'Grukul 5', 0, '', 'tata1', '2012-10-15'),
(51, '2012-11-15', '10:00 AM', '11:00 AM', ' Web Portal Sample Email', '<p>\r\n	Schedule Manager Sample Email.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Regards</p>\r\n<p>\r\n	Schedule Manager</p>\r\n', 'reddykr@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in,nandakumar@tataelxsi.co.in', '1', 'Grukul 4', 0, '', 'tata1', '2012-10-15'),
(52, '2012-10-17', '17:40:00 PM', '18:40:00 PM', 'Induction Program', '<p>\r\n	Test Email request</p>\r\n', 'nandakumar@tataelxsi.co.in;nanda@mail.com;nandakumar@tataelxsi.co.in', '1', 'Grukul 5', 30, '', 'polycom', '2012-10-17'),
(53, '2012-10-17', '18:50:00 PM', '19:51:00 PM', 'Induction Program', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', 'nandakumar@tataelxsi.co.in;nanda@mail.com;nandakumar@tataelxsi.co.in', '1', 'Grukul 5', 30, '', 'polycom', '2012-10-17'),
(54, '0000-00-00', '', '', 'Induction Program', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', ';', '1', 'Grukul 4', 0, '', 'polycom', '2012-10-17'),
(55, '0000-00-00', '', '', 'Induction Program', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', ';', '1', 'Grukul 5', 0, '', 'polycom', '2012-10-17'),
(56, '2012-10-17', '', '', 'Induction Program', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', ';', '1', 'Grukul 5', 0, '', 'polycom', '2012-10-17'),
(57, '2012-10-17', '16:55:00 PM', '16:55:00 PM', 'Induction Program', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', ';', '1', 'Grukul 5', 0, '', 'polycom', '2012-10-17'),
(58, '2012-10-17', '18:00:00 PM', '18:17:00 PM', 'Induction Program', '<p>\r\n	This is some <strong>sample text</strong>.</p>\r\n', ';nanda@mail.com;nandakumar@tataelxsi.co.in', '1', 'Grukul 5', 30, '', 'polycom', '2012-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `sm_user_group`
--

CREATE TABLE IF NOT EXISTS `sm_user_group` (
  `group_id` int(30) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  `user_email` text NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` date NOT NULL,
  `group_status` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sm_user_group`
--

INSERT INTO `sm_user_group` (`group_id`, `group_name`, `user_email`, `created_by`, `created_date`, `group_status`) VALUES
(4, 'tata', 'nanda@mail.com;svss@mail.com', 'tata1', '2012-10-10', 1),
(5, 'polycom', 'nanda@mail.com;svss@mail.com;npuneethrai@tataelxsi.co.in', 'tata1', '2012-10-10', 1),
(6, 'cgi', 'nanda@mail.com;svss@mail.com;npuneethrai@tataelxsi.co.in', 'tata1', '2012-10-10', 1),
(7, 'cloud', 'nanda@mail.com;tsct@maikl.com;svss@mail.com;npuneethrai@tataelxsi.co.in;me@tata.cds;marshadsaleem@tataelxsi.co.in;marshadsaleem@tataelxsi.co.in', 'sudhir', '2012-10-11', 1),
(8, 'Telwebrtc', '', 'sudhir', '2012-10-11', 1),
(9, 'polycom', 'me@tata.cds;sudheera@tataelxsi.co.in', 'tata1', '2012-10-12', 1),
(10, 'elxsions', 'marshadsaleem@tataelxsi.co.in,nandakumar@tataelxsi.co.in', 'tata1', '2012-10-12', 1),
(11, 'twst', 'nanda@mail.com;svss@mail.com;npuneethrai@tataelxsi.co.in', 'tata1', '2012-10-15', 1),
(12, 'polycom', 'nanda@mail.com;nandakumar@tataelxsi.co.in', 'polycom', '2012-10-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_user_registor`
--

CREATE TABLE IF NOT EXISTS `sm_user_registor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `mail_id` varchar(35) NOT NULL,
  `mobile_number` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `create_date` date NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '0',
  `admin_user` int(10) NOT NULL DEFAULT '0',
  `invalid_counter` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `sm_user_registor`
--

INSERT INTO `sm_user_registor` (`id`, `first_name`, `last_name`, `mail_id`, `mobile_number`, `username`, `password`, `create_date`, `user_status`, `admin_user`, `invalid_counter`) VALUES
(4, 'nanda123', 'kumar3', 'nanda@mail.com', '978787878', 'tata', 'Uld4NGMya3hNak09', '2012-10-03', 1, 0, 0),
(9, 'ploycom', 'cbu', 'cbu@polycom.com', '7686876', 'polycom', 'VGVsXzEyMzQ1', '2012-10-10', 1, 1, 0),
(24, 'ravi', 'Saleem', 'nandakumar@tataelxsi.co.in', '8880043247', 'ravi', 'ITIzNFF3ZXI=', '2012-10-12', 1, 0, 0),
(25, 'tata', 'mani', 'tatamani@tataelxsi.co.in', '989898989', 'tataelxsi', 'ITIzUVdFcg==', '2012-10-16', 1, 0, 2),
(26, 'ravi', 'kk', 'ravikaka@tataelxsi.co', '987987987', 'tataravi', 'ITIzUXdlcg==', '2012-10-16', 1, 0, 0),
(27, 'tata', 'raju', 'tsct@maikl.com', '8880043247', 'tata', 'VGVsXzEyMzQ1', '2012-10-16', 1, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
