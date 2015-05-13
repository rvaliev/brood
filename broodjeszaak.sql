-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 03:05 PM
-- Server version: 5.6.21-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `broodjeszaak`
--
CREATE DATABASE IF NOT EXISTS `broodjeszaak` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `broodjeszaak`;

-- --------------------------------------------------------

--
-- Table structure for table `beleg`
--

CREATE TABLE IF NOT EXISTS `beleg` (
`beleg_id` int(50) NOT NULL,
  `beleg_naam` varchar(200) NOT NULL,
  `beleg_samenstelling` varchar(200) NOT NULL,
  `beleg_prijs` double NOT NULL,
  `beleg_image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beleg`
--

INSERT INTO `beleg` (`beleg_id`, `beleg_naam`, `beleg_samenstelling`, `beleg_prijs`, `beleg_image`) VALUES
(1, 'Tonijn pikant', 'tonijn, pepper, zout, suiker, mayonaise', 0.5, 'image.img'),
(2, 'Tomaten', 'tomaten', 0.7, 'image.img'),
(3, 'Augurken', 'augurken', 0.7, 'image.img'),
(4, 'Sla', 'sla', 0.4, 'image.img'),
(5, 'Kip andalouse', 'kip, mayonaise, ketchup, ei', 0.5, 'image.img'),
(6, 'Ei', 'ei', 0.6, 'image.img'),
(7, 'Mayonaise', 'zonnebloemolie, ei geel, citroen ', 0.4, 'image.img'),
(8, 'Ketchup', 'tomaten, suiker, azijn', 0.4, 'image.img');

-- --------------------------------------------------------

--
-- Table structure for table `bestelling`
--

CREATE TABLE IF NOT EXISTS `bestelling` (
`bestelling_id` int(50) NOT NULL,
  `totaal_prijs` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bestelling`
--

INSERT INTO `bestelling` (`bestelling_id`, `totaal_prijs`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `bestel_regel`
--

CREATE TABLE IF NOT EXISTS `bestel_regel` (
  `bestel_id` int(50) NOT NULL,
  `compositie_id` int(50) NOT NULL,
  `aantal` int(50) NOT NULL,
  `sandwich_prijs` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bestel_regel`
--

INSERT INTO `bestel_regel` (`bestel_id`, `compositie_id`, `aantal`, `sandwich_prijs`) VALUES
(1, 1, 1, 3.9),
(1, 2, 2, 3.1);

-- --------------------------------------------------------

--
-- Table structure for table `brood`
--

CREATE TABLE IF NOT EXISTS `brood` (
`brood_id` int(50) NOT NULL,
  `brood_naam` varchar(200) NOT NULL,
  `brood_samenstelling` varchar(200) NOT NULL,
  `brood_prijs` double NOT NULL,
  `brood_image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brood`
--

INSERT INTO `brood` (`brood_id`, `brood_naam`, `brood_samenstelling`, `brood_prijs`, `brood_image`) VALUES
(1, 'Klein wit', 'bloem, gist, water, suiker, zout', 2, 'image.img'),
(2, 'Klein bruin', 'bloem, gist, water, suiker, zout', 2, 'image.img'),
(3, 'Groot wit', 'bloem, gist, water, suiker, zout', 3, 'image.img'),
(4, 'Groot bruin', 'bloem, gist, water, suiker, zout', 3, 'image.img');

-- --------------------------------------------------------

--
-- Table structure for table `compositie`
--

CREATE TABLE IF NOT EXISTS `compositie` (
  `compositie_id` int(50) NOT NULL,
  `brood_id` int(50) NOT NULL,
  `beleg_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compositie`
--

INSERT INTO `compositie` (`compositie_id`, `brood_id`, `beleg_id`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(2, 1, 2),
(2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(50) NOT NULL,
  `voornaam` varchar(200) NOT NULL,
  `familienaam` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `wachtwoord` varchar(200) NOT NULL,
  `registratie_datum` datetime NOT NULL,
  `bestel_status` tinyint(1) NOT NULL DEFAULT '0',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `email_hash` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `voornaam`, `familienaam`, `email`, `wachtwoord`, `registratie_datum`, `bestel_status`, `verified`, `email_hash`) VALUES
(1, 'Ruslan', 'Valiev', 'rvaliev22@gmail.com', '123456', '2015-05-09 11:16:27', 0, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beleg`
--
ALTER TABLE `beleg`
 ADD PRIMARY KEY (`beleg_id`);

--
-- Indexes for table `bestelling`
--
ALTER TABLE `bestelling`
 ADD PRIMARY KEY (`bestelling_id`);

--
-- Indexes for table `brood`
--
ALTER TABLE `brood`
 ADD PRIMARY KEY (`brood_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beleg`
--
ALTER TABLE `beleg`
MODIFY `beleg_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `bestelling`
--
ALTER TABLE `bestelling`
MODIFY `bestelling_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brood`
--
ALTER TABLE `brood`
MODIFY `brood_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
