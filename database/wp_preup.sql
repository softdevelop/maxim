-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2014 at 12:42 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `maxim`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_preup`
--

CREATE TABLE IF NOT EXISTS `wp_preup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `man_name` varchar(250) NOT NULL,
  `man_pin` int(11) NOT NULL,
  `man_phone` int(11) NOT NULL,
  `man_identity` int(11) NOT NULL,
  `man_address` varchar(250) NOT NULL,
  `man_postort` varchar(250) NOT NULL,
  `man_email` varchar(250) NOT NULL,
  `women_name` varchar(250) NOT NULL,
  `women_pin` int(11) NOT NULL,
  `women_phone` int(11) NOT NULL,
  `women_identity` int(11) NOT NULL,
  `women_address` varchar(250) NOT NULL,
  `women_postort` varchar(250) NOT NULL,
  `women_email` varchar(250) NOT NULL,
  `is_ready` varchar(250) NOT NULL,
  `cohabiting_date` varchar(250) NOT NULL,
  `purpose` text NOT NULL,
  `property_to_exclude_1` text NOT NULL,
  `property_to_exclude_2` text NOT NULL,
  `property_single` tinyint(4) NOT NULL,
  `lieu_of_private_property` varchar(250) NOT NULL,
  `other_info` text NOT NULL,
  `agree_terms` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `wp_preup`
--

INSERT INTO `wp_preup` (`id`, `man_name`, `man_pin`, `man_phone`, `man_identity`, `man_address`, `man_postort`, `man_email`, `women_name`, `women_pin`, `women_phone`, `women_identity`, `women_address`, `women_postort`, `women_email`, `is_ready`, `cohabiting_date`, `purpose`, `property_to_exclude_1`, `property_to_exclude_2`, `property_single`, `lieu_of_private_property`, `other_info`, `agree_terms`) VALUES
(46, 'aa', 2147483647, 2147483647, 123, 'asd', 'asd', 'ntkien92@outlook.com', '12321', 213213, 2147483647, 1232132132, '321312', '313', 'ntkien92@outlook.com', '', '08-10-2014', 'all egendom som var och en av oss utfått och i framtiden eventuellt kommer att erhålla genom arv, gåva och testamente skall omfattas av äktenskapsförordet.', '[""]', '[""]', 1, 'Giftorättsgods', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
