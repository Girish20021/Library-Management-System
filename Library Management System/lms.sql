-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 01:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(200) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `book_quantity` int(225) NOT NULL,
  `noofbooksissued` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `title`, `author`, `genre`, `book_quantity`, `noofbooksissued`) VALUES
(1, 'OOPL', 'Balagrusamy', 'IT', 35, 0),
(2, 'Electrical circuit analysis', 'Alexander', 'EEE', 25, 1),
(3, 'Python', 'unknown', 'IT', 40, 0),
(4, 'Data Structurs', 'unknown', 'IT', 40, 0),
(5, 'CPP', 'unknown', 'IT', 40, 0),
(6, 'ECA', 'Alexander', 'EEE', 50, 0),
(7, 'The last sin', 'unknown', 'EEE', 35, 0),
(8, 'OOPL', 'balagrusamy', 'IT', 75, 0),
(9, 'Discrete', 'rosen', 'IT', 97, 0),
(10, 'Signal', 'TBA', 'CSE', 30, 0),
(11, 'C++ programming', 'Unknown', 'IT', 66, 0),
(12, 'ECA', 'Unknown', 'EEE', 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(45) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `email`, `message`) VALUES
(1, 'Vamsee', 'Vamsee@gmail.com', 'Thats great.'),
(2, 'Rithvik', 'Rithvik123@gmail.com', 'Good.'),
(3, 'Bhanusumanth', 'Bhanu@gmail.com', 'All the best.'),
(4, 'Mani', 'Manikumar@gmail.com', 'Good.');

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `date_Of_Issue` date NOT NULL,
  `book_Id` int(100) NOT NULL,
  `book_Title` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `contact` bigint(50) NOT NULL,
  `date_Of_Return` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`date_Of_Issue`, `book_Id`, `book_Title`, `username`, `contact`, `date_Of_Return`) VALUES
('2021-04-28', 2, 'Electrical circuit analysis', 'library/user/Vamsee',9685741253, '2021-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(50) NOT NULL,
  `noofbooksissued` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `contact`, `noofbooksissued`) VALUES
(1, 'library/user/Vamsee', 'Vamsee@gmail.com', 9685741253, 1),
(2, 'library/user/Rithvik', 'Rithvik123@gmail.com', 9866554782, 0),
(3, 'library/user/Bhanusumanth', 'Bhanu@gmail.com', 9866557451, 0),
(4, 'library/user/Rithvik1', 'Rithvik1323@gmail.com', 748521364, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userslogin`
--

CREATE TABLE `userslogin` (
  `id` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userslogin`
--

INSERT INTO `userslogin` (`id`, `user`, `email`, `pass`, `date`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2021-04-15'),
(2, 'Vamsee', 'Vamsee@gmail.com', 'Vamsee', '2021-04-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userslogin`
--
ALTER TABLE `userslogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userslogin`
--
ALTER TABLE `userslogin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
