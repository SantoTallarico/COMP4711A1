-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2015 at 02:14 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3
 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
 
 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
 
--
-- Database: `books`
--
 
-- --------------------------------------------------------
 
--
-- Table structure for table `book`
--
 
CREATE TABLE IF NOT EXISTS `books` (
`bookID` int(10) unsigned zerofill NOT NULL COMMENT 'A book''s ID # (00001234)',
  `title` text NOT NULL COMMENT 'A book''s title (The Green Mile)',
  `author` text NOT NULL COMMENT 'A book''s author (John Travolta)',
  `date_pub` date DEFAULT NULL COMMENT 'Date of publication',
  `date_load` date NOT NULL COMMENT 'Date of upload',
  `uploader` text COMMENT 'Owner'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
 
--
-- Dumping data for table `book`
--
 
INSERT INTO `books` (`bookID`, `title`, `author`, `date_pub`, `date_load`, `uploader`) VALUES
(0000000001, '50 Shades of Grey', 'E. L. James', '2011-03-01', '2015-03-05', 'admin'),
(0000000002, '1984', 'George Orwell', '1949-06-08', '2015-03-05', 'admin');
 
-- --------------------------------------------------------
 
--
-- Table structure for table `genres`
--
 
CREATE TABLE IF NOT EXISTS `genres` (
`genreID` smallint(8) unsigned zerofill NOT NULL,
  `genreName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
 
--
-- Dumping data for table `genres`
--
 
INSERT INTO `genres` (`genreID`, `genreName`) VALUES
(00000001, 'Action'),
(00000002, 'Adventure'),
(00000004, 'Comedy'),
(00000003, 'Horror'),
(00000005, 'Romance');
 
--
-- Indexes for dumped tables
--
 
--
-- Indexes for table `book`
--
ALTER TABLE `books`
 ADD PRIMARY KEY (`bookID`), ADD UNIQUE KEY `bookID` (`bookID`);
 
--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
 ADD PRIMARY KEY (`genreID`), ADD UNIQUE KEY `genreName` (`genreName`);
 
--
-- AUTO_INCREMENT for dumped tables
--
 
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `books`
MODIFY `bookID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'A book''s ID # (00001234)',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
MODIFY `genreID` smallint(8) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;