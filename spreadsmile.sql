-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2020 at 06:53 PM
-- Server version: 10.4.10-MariaDB
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
-- Database: `spreadsmile`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `agent_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `district_id` int(5) NOT NULL,
  `area_id` int(5) NOT NULL,
  `landmark` text NOT NULL,
  `agent_image` varchar(500) NOT NULL,
  PRIMARY KEY (`agent_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(5) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `district_id`, `area`) VALUES
(1, 1, 'vastral'),
(2, 6, 'shubhanpura'),
(3, 1, 'maninagar'),
(4, 6, 'ilorapark'),
(5, 1, 'navrangpura'),
(6, 1, 'chandkheda'),
(7, 2, 'modhera'),
(8, 2, 'radhanpur'),
(9, 2, 'bahuchraji'),
(10, 2, 'kadi'),
(11, 4, 'chitra'),
(12, 4, 'devgadh'),
(13, 4, 'fulsar'),
(14, 4, 'khodiyar_nagar'),
(15, 3, 'arya nagar'),
(16, 3, 'kailash nagar'),
(17, 3, 'vavdi'),
(18, 3, 'sadar'),
(19, 5, 'varacha'),
(20, 5, 'bhthar'),
(21, 5, 'vasant vihar'),
(22, 5, 'haripura'),
(23, 6, 'gorwa'),
(24, 6, 'sama talav');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(100) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district`) VALUES
(1, 'Ahemadabad'),
(2, 'mehsana'),
(3, 'rajkot'),
(4, 'bhavanagar'),
(5, 'surat'),
(6, 'vadodara');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

DROP TABLE IF EXISTS `donor`;
CREATE TABLE IF NOT EXISTS `donor` (
  `donor_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` bigint(11) DEFAULT NULL,
  `district_id` int(10) DEFAULT NULL,
  `area_id` int(10) DEFAULT NULL,
  `landmark` text DEFAULT NULL,
  `person_count` int(4) DEFAULT NULL,
  `accepted_status` tinyint(1) DEFAULT 0,
  `recieved_status` tinyint(1) DEFAULT 0,
  `agent_id` int(10) DEFAULT NULL,
  `donation_date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`donor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `feedback_star` int(2) NOT NULL,
  `feedback_msg` text NOT NULL,
  `feedback_sugg` text NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `image_dis` text NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `image`, `image_dis`) VALUES
(1, '../sweetsmile/i2.jpg', '22/1/2020'),
(2, '../sweetsmile/i3.jfif', '25/01/2020'),
(4, '../sweetsmile/i5.jfif', '04/04/2020'),
(5, '../sweetsmile/i6.jpg', '25/03/2020'),
(6, '../sweetsmile/i7.jpg', '10/06/2020'),
(7, '../sweetsmile/i8.jfif', '17/0/2020'),
(8, '../sweetsmile/i9.jfif', '13/03/2020'),
(9, '../sweetsmile/i10.jpg', '23/07/2020'),
(11, '../sweetsmile/i4.jfif', 'sfsnfkf');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_donor`
--

DROP TABLE IF EXISTS `monthly_donor`;
CREATE TABLE IF NOT EXISTS `monthly_donor` (
  `monthly_donor_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no1` bigint(10) NOT NULL,
  `phone_no2` bigint(10) NOT NULL,
  `district_id` int(5) NOT NULL,
  `area_id` int(5) NOT NULL,
  `landmark` text NOT NULL,
  `food` text NOT NULL,
  PRIMARY KEY (`monthly_donor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
