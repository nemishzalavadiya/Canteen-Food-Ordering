-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2019 at 06:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PhpProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Designation` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Salary` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`Username`, `Password`, `Designation`, `Email`, `Salary`) VALUES
('kumar', 'kumar\r\n', 'chef', '123@gmail.com', '50000'),
('nem', 'nem', 'chef', '1267@gmail.com', '11232'),
('nemish', 'nemish', 'admin', '13101999znemish@gmail.com', '0'),
('worker', 'wo', 'worker', '345@gmail.com', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `Menu`
--

CREATE TABLE `Menu` (
  `Category` varchar(30) NOT NULL,
  `ItemName` varchar(30) NOT NULL,
  `Price` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Menu`
--

INSERT INTO `Menu` (`Category`, `ItemName`, `Price`) VALUES
('gujarati', 'bateta', 25),
('gujarati', 'bhakhari', 15),
('gujarati', 'bhel', 12),
('dessert', 'choco', 40),
('punjabi', 'makhani', 100),
('italic', 'meggie', 25),
('punjabi', 'paneer', 150),
('punjabi', 'parotha', 30),
('punjabi', 'randhvo', 30),
('gujarati', 'rotalo', 34);

-- --------------------------------------------------------

--
-- Table structure for table `Ordering`
--

CREATE TABLE `Ordering` (
  `OrderNo` int(3) NOT NULL,
  `Food` varchar(3000) NOT NULL,
  `Dessert` varchar(3000) NOT NULL,
  `Total_Price` int(6) NOT NULL,
  `Ch` int(1) NOT NULL DEFAULT '1',
  `Date_of_Order` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ordering`
--

INSERT INTO `Ordering` (`OrderNo`, `Food`, `Dessert`, `Total_Price`, `Ch`, `Date_of_Order`) VALUES
(1, 'bhakhari 15*1.makhani 100*1.Total Food Price=115', 'Total Dessert Price=0', 115, 1, '2019-04-07'),
(2, 'makhani 100*1.meggie 25*1.Total Food Price=125', 'Total Dessert Price=0', 125, 1, '2019-04-07'),
(3, 'bhakhari 15*1.meggie 25*1.Total Food Price=40', 'Total Dessert Price=0', 40, 1, '2019-04-07'),
(4, 'bhel 12*1.makhani 100*1.Total Food Price=112', 'Total Dessert Price=0', 112, 0, '2019-04-07'),
(5, 'makhani 100*1.Total Food Price=100', 'Total Dessert Price=0', 100, 0, '2019-04-07'),
(6, 'parotha 30*1.Total Food Price=30', 'Total Dessert Price=0', 30, 0, '2019-04-07'),
(7, 'rotalo 34*1.Total Food Price=34', 'Total Dessert Price=0', 34, 0, '2019-04-07'),
(8, 'rotalo 34*1.Total Food Price=34', 'Total Dessert Price=0', 34, 0, '2019-04-07'),
(9, 'rotalo 34*1.Total Food Price=34', 'Total Dessert Price=0', 34, 0, '2019-04-07'),
(10, 'rotalo 34*1.Total Food Price=34', 'Total Dessert Price=0', 34, 0, '2019-04-07'),
(11, 'rotalo 34*1.Total Food Price=34', 'Total Dessert Price=0', 34, 0, '2019-04-07'),
(12, 'rotalo 34*1.Total Food Price=34', 'Total Dessert Price=0', 34, 0, '2019-04-07'),
(13, 'rotalo 34*1.Total Food Price=34', 'Total Dessert Price=0', 34, 0, '2019-04-07'),
(14, 'rotalo 34*1.Total Food Price=34', 'Total Dessert Price=0', 34, 0, '2019-04-07'),
(15, 'rotalo 34*1.Total Food Price=34', 'Total Dessert Price=0', 34, 0, '2019-04-07'),
(16, 'rotalo 34*1.Total Food Price=34', 'Total Dessert Price=0', 34, 0, '2019-04-07'),
(17, 'rotalo 34*1.Total Food Price=34', 'Total Dessert Price=0', 34, 0, '2019-04-07'),
(18, 'bateta 25*1.bhakhari 15*1.bhel 12*1.meggie 25*1.parotha 30*1.Total Food Price=107', 'Total Dessert Price=0', 107, 0, '2019-04-07'),
(19, 'bhel 12*1.makhani 100*1.meggie 25*1.randhvo 30*1.Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(20, 'bhel 12*1.makhani 100*1.meggie 25*1.randhvo 30*1.Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(21, 'bhel 12*1.makhani 100*1.meggie 25*1.randhvo 30*1.Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(22, 'bhel 12*1.makhani 100*1.meggie 25*1.randhvo 30*1.Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(23, 'bhel 12*1.makhani 100*1.meggie 25*1.randhvo 30*1.Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(24, 'bhel 12*1.makhani 100*1.meggie 25*1.randhvo 30*1.Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(25, 'bhel 12*1.makhani 100*1.meggie 25*1.randhvo 30*1.Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(26, 'bhel 12*1.makhani 100*1.meggie 25*1.randhvo 30*1.Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(27, 'bhel 12*1.makhani 100*1.meggie 25*1.randhvo 30*1.Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(28, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(29, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(30, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(31, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(32, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(33, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(34, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(35, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(36, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(37, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(38, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(39, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(40, 'Total Food Price=167', 'Total Dessert Price=0', 167, 0, '2019-04-07'),
(41, 'Total Food Price=67', 'Total Dessert Price=40', 107, 0, '2019-04-07'),
(42, 'Total Food Price=730', 'Total Dessert Price=120', 850, 0, '2019-04-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`ItemName`);

--
-- Indexes for table `Ordering`
--
ALTER TABLE `Ordering`
  ADD PRIMARY KEY (`OrderNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Ordering`
--
ALTER TABLE `Ordering`
  MODIFY `OrderNo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
