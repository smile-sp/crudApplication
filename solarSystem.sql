-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2017 at 05:51 PM
-- Server version: 5.0.15
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `solar_system`
--
CREATE DATABASE `solar_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `solar_system`;

-- --------------------------------------------------------

--
-- Table structure for table `planet`
--

CREATE TABLE IF NOT EXISTS `planet` (
  `id` int(10) NOT NULL auto_increment,
  `Name` varchar(255) NOT NULL,
  `Size` float NOT NULL,
  `CoordinateX` float NOT NULL,
  `CoordinateY` float NOT NULL,
  `CoordinateZ` float NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `planet`
--

INSERT INTO `planet` (`id`, `Name`, `Size`, `CoordinateX`, `CoordinateY`, `CoordinateZ`) VALUES
(2, 'planet1', 7.66, 2.66, 3.33, 5.55),
(3, 'planet2', 87, 55, 55.4, 22.66);

-- --------------------------------------------------------

--
-- Table structure for table `solar`
--

CREATE TABLE IF NOT EXISTS `solar` (
  `id` int(10) NOT NULL auto_increment,
  `Name` varchar(255) NOT NULL,
  `Size` float NOT NULL,
  `CoordinateX` float NOT NULL,
  `CoordinateY` float NOT NULL,
  `CoordinateZ` float NOT NULL,
  `sunId` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `solar`
--

INSERT INTO `solar` (`id`, `Name`, `Size`, `CoordinateX`, `CoordinateY`, `CoordinateZ`, `sunId`) VALUES
(1, 'solarOne', 99.99, 66.59, 44.49, 55.59, 1),
(2, 'solar2', 7777.9, 1.11, 2.22, 3.33, 0),
(7, 'solar3', 99.99, 4.22, 3.33, 8.99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `solar_planet`
--

CREATE TABLE IF NOT EXISTS `solar_planet` (
  `solar_id` int(11) NOT NULL,
  `planet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solar_planet`
--

INSERT INTO `solar_planet` (`solar_id`, `planet_id`) VALUES
(8, 1),
(8, 2),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sun`
--

CREATE TABLE IF NOT EXISTS `sun` (
  `id` int(10) NOT NULL auto_increment,
  `Name` varchar(255) NOT NULL,
  `Size` float NOT NULL,
  `CoordinateX` float NOT NULL,
  `CoordinateY` float NOT NULL,
  `CoordinateZ` float NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sun`
--

INSERT INTO `sun` (`id`, `Name`, `Size`, `CoordinateX`, `CoordinateY`, `CoordinateZ`) VALUES
(2, 'sun1', 9000, 7.77, 2.22, 44.55);
