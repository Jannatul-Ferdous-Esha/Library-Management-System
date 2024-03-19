-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 06:31 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) DEFAULT NULL,
  `sadmin_name` varchar(30) DEFAULT NULL,
  `sadmin_password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(50) DEFAULT NULL,
  `author_name` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `total_no_of_book` int(11) DEFAULT NULL,
  `available_no_of_book` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `author_name`, `category`, `total_no_of_book`, `available_no_of_book`) VALUES
(1, 'Matal Hawa', 'Humayun Ahmed', 'Romantic', 7, 5),
(2, 'Misir Ali Somogro-1', 'Humayun Ahmed', 'Mystery', 10, 4),
(3, 'Krishnopokkho', 'Humayun Ahmed', 'Romantic', 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issue_no` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `t_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `issue_date` date NOT NULL DEFAULT current_timestamp(),
  `expire_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issue_no`, `s_id`, `t_id`, `book_id`, `issue_date`, `expire_date`, `return_date`) VALUES
(1, NULL, NULL, 1, '2019-11-11', '2019-11-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `issued_book`
--

CREATE TABLE `issued_book` (
  `book_id` int(11) DEFAULT NULL,
  `issue_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued_book`
--

INSERT INTO `issued_book` (`book_id`, `issue_no`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `s_address` varchar(50) DEFAULT NULL,
  `s_phone_no` varchar(20) DEFAULT NULL,
  `s_email_id` varchar(30) DEFAULT NULL,
  `s_password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_issued_book`
--

CREATE TABLE `s_issued_book` (
  `s_id` int(11) DEFAULT NULL,
  `issue_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `t_address` varchar(50) DEFAULT NULL,
  `t_phone_no` varchar(20) DEFAULT NULL,
  `t_email_id` varchar(30) DEFAULT NULL,
  `t_password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_issued_book`
--

CREATE TABLE `t_issued_book` (
  `t_id` int(11) DEFAULT NULL,
  `issue_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue_no`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `issued_book`
--
ALTER TABLE `issued_book`
  ADD KEY ` 	book_id` (`book_id`),
  ADD KEY ` 	issue_no` (`issue_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `s_issued_book`
--
ALTER TABLE `s_issued_book`
  ADD KEY `s_issued_book_ibfk_1` (`s_id`),
  ADD KEY `s_issued_book_ibfk_2` (`issue_no`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `t_issued_book`
--
ALTER TABLE `t_issued_book`
  ADD KEY `t_issued_book_ibfk_1` (`t_id`),
  ADD KEY `t_issued_book_ibfk_2` (`issue_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Constraints for table `issued_book`
--
ALTER TABLE `issued_book`
  ADD CONSTRAINT ` 	book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT ` 	issue_no` FOREIGN KEY (`issue_no`) REFERENCES `issue` (`issue_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_issued_book`
--
ALTER TABLE `s_issued_book`
  ADD CONSTRAINT `s_issued_book_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `s_issued_book_ibfk_2` FOREIGN KEY (`issue_no`) REFERENCES `issue` (`issue_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_issued_book`
--
ALTER TABLE `t_issued_book`
  ADD CONSTRAINT `t_issued_book_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_issued_book_ibfk_2` FOREIGN KEY (`issue_no`) REFERENCES `issue` (`issue_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
