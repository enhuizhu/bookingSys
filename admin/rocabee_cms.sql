-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2013 at 06:31 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rocabee_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_admin`
--

CREATE TABLE IF NOT EXISTS `cms_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_admin`
--

INSERT INTO `cms_admin` (`id`, `admin`, `password`, `email`, `last_login`) VALUES
(1, 'rocabee', 'rocabe2013', 'admin@rocabee.com', '2013-02-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_languages`
--

CREATE TABLE IF NOT EXISTS `cms_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_key` varchar(200) NOT NULL,
  `value` text NOT NULL,
  `language` varchar(10) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cms_languages`
--

INSERT INTO `cms_languages` (`id`, `lang_key`, `value`, `language`, `section_id`) VALUES
(5, 'not_your_turn', 'it is not your turn 4', 'en', 1),
(6, 'contact', 'Contact', 'en', 5),
(7, 'tel', 'telephone', 'en', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cms_languages_section`
--

CREATE TABLE IF NOT EXISTS `cms_languages_section` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cms_languages_section`
--

INSERT INTO `cms_languages_section` (`id`, `name`) VALUES
(1, 'game'),
(5, 'contact us');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
