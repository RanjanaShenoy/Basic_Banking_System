-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 08:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `To_Name` varchar(30) NOT NULL,
  `From_Name` varchar(30) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Trtime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`To_Name`, `From_Name`, `Amount`, `Trtime`) VALUES
('Sudha', 'Sanjana', 1000, '2021-07-12 19:12:59'),
('Jaya', 'Maya', 1000, '2021-07-12 19:15:02'),
('Ramnath', 'Ranjana', 2000, '2021-07-12 19:20:48'),
('pranav', 'Maya', 2000, '2021-07-12 19:22:44'),
('Jaya', 'Abhijna', 1000, '2021-07-12 19:48:29'),
('pranav', 'Maya', 1000, '2021-07-12 20:35:20'),
('Sudha', 'Sanjana', 5000, '2021-07-12 20:52:45'),
('Jaya', 'Ramnath', 1000, '2021-07-12 20:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(30) NOT NULL,
  `Balance` int(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `Balance`, `email`) VALUES
('Abhijna', 15000, 'abhijna@gmail.com'),
('Jaya', 43000, 'jaya@gmail.com'),
('Maya', 20000, 'pai@gmail.com'),
('pranav', 24000, 'shenoy@gmail.com'),
('Ramnath', 25000, 'Ramnath@gmail.com'),
('Ranjana', 33000, 'ranjana@gmail.com'),
('Reethu', 25000, 'reethu@gmail.com'),
('Sanjana', 16000, 'sanjana@gmail.com'),
('Sudha', 44000, 'sudha@yahoo.com'),
('Tanuja', 14000, 'Tanuja@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
