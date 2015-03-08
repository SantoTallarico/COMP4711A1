-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 12:03 AM
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
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
`bookID` int(10) unsigned zerofill NOT NULL COMMENT 'A book''s ID # (00001234)',
  `title` text NOT NULL COMMENT 'A book''s title (The Green Mile)',
  `author` text NOT NULL COMMENT 'A book''s author (John Travolta)',
  `date_pub` date DEFAULT NULL COMMENT 'Date of publication',
  `date_load` date NOT NULL COMMENT 'Date of upload',
  `uploader` text COMMENT 'Owner'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `title`, `author`, `date_pub`, `date_load`, `uploader`) VALUES
(0000000001, '50 Shades of Grey', 'E. L. James', '2011-03-01', '2015-03-08', 'admin'),
(0000000002, '1984', 'George Orwell', '1949-06-08', '2015-03-05', 'admin'),
(0000000003, 'The Fellowship of the Ring', 'J. R. R. Tolkien', '1954-06-01', '2015-03-08', 'admin'),
(0000000004, 'The Two Towers', 'J. R. R. Tolkien', '1954-11-01', '2015-03-08', 'admin'),
(0000000005, 'The Return of the King', 'J. R. R. Tolkien', '1955-10-01', '2015-03-08', 'admin'),
(0000000006, 'The Hobbit', 'J. R. R. Tolkien', '1937-09-01', '2015-03-08', 'admin'),
(0000000007, 'Lord of the Flies', 'William Golding', '1954-09-17', '2015-03-08', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book_genres`
--

CREATE TABLE IF NOT EXISTS `book_genres` (
  `bookID` int(10) unsigned zerofill NOT NULL,
  `genreID` int(8) unsigned zerofill NOT NULL,
  `genreName` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_genres`
--

INSERT INTO `book_genres` (`bookID`, `genreID`, `genreName`) VALUES
(0000000002, 00000002, 'Adventure'),
(0000000002, 00000003, 'Horror'),
(0000000001, 00000001, 'Action'),
(0000000001, 00000005, 'Romance'),
(0000000007, 00000002, 'Adventure'),
(0000000007, 00000003, 'Horror'),
(0000000003, 00000001, 'Action'),
(0000000003, 00000002, 'Adventure'),
(0000000004, 00000001, 'Action'),
(0000000004, 00000002, 'Adventure'),
(0000000005, 00000001, 'Action'),
(0000000005, 00000002, 'Adventure'),
(0000000006, 00000001, 'Action'),
(0000000006, 00000002, 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
`genreID` int(8) unsigned zerofill NOT NULL,
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
-- Indexes for table `books`
--
ALTER TABLE `books`
 ADD PRIMARY KEY (`bookID`), ADD UNIQUE KEY `bookID` (`bookID`);

--
-- Indexes for table `book_genres`
--
ALTER TABLE `book_genres`
 ADD KEY `genreID` (`genreID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
 ADD PRIMARY KEY (`genreID`), ADD UNIQUE KEY `genreName` (`genreName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
MODIFY `bookID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'A book''s ID # (00001234)',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
MODIFY `genreID` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_genres`
--
ALTER TABLE `book_genres`
ADD CONSTRAINT `book_genres_ibfk_1` FOREIGN KEY (`genreID`) REFERENCES `genres` (`genreID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
