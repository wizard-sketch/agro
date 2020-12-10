-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 05:11 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agro`
--

-- --------------------------------------------------------

--
-- Table structure for table `buys`
--

CREATE TABLE `buys` (
  `username` varchar(20) NOT NULL,
  `pcode` varchar(5) NOT NULL,
  `noofitems` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `t_id` varchar(8) NOT NULL,
  `t_time` datetime(6) NOT NULL,
  `t_amount` int(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pcode` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pcode` varchar(5) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `price` int(8) NOT NULL,
  `quantity` int(3) NOT NULL,
  `type` varchar(10) NOT NULL,
  `brand` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pcode`, `pname`, `price`, `quantity`, `type`, `brand`) VALUES
('17001', 'Agrimin', 4500, 5, 'Fertilizer', 'Ferto'),
('17002', 'CFC', 5000, 20, 'Pesticide', 'Biofit');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `agri_card` varchar(15) DEFAULT NULL,
  `contact_us` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `username`, `password`, `address`, `email`, `phone_no`, `agri_card`, `contact_us`) VALUES
('Chandra', 'Chandra8', 'Chandra8901', 'Vellore Institute of Technology', 'Chandra@gmail.com', '8948283983', '9423-4234-3431', ''),
('Sekhar', 'Sekhar', 'Sekhar123456', 'SyamalaNagar,Guntur,AP,India', 'Sekhar@gmail.com', '7894728823', '4323-4276-6454', ''),
('Rohit', 'Rohit', 'Rohit8', 'P and T colony 3,Patamata,Vijayawada,AP,India', 'rohit929@gmail.com', '8919804383', '2345-5432-1234', ''),
('Sushanth', 'Sushanth', 'Sushanth890', 'Guntur,AP,India', 'saru@gmail.com', '8921321222', '7667-6565-6767', ''),
('lokesh', 'lokesh', 'lokesh890', 'VIT University,Vellore', 'lokesh@gmail.com', '7937293722', '4783-4224-4321', ''),
('Balaji', 'Balaji', 'balaji123', 'Mani street,Kanchipuram,Tamil Nadu', 'balaji123@gmail.com', '7010510834', '8594-5323-4355', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buys`
--
ALTER TABLE `buys`
  ADD PRIMARY KEY (`username`,`pcode`),
  ADD KEY `buys_ibfk_2` (`pcode`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `UNIQUE` (`username`),
  ADD KEY `pcode` (`pcode`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pcode`),
  ADD UNIQUE KEY `UNIPRONAME` (`pname`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `UNIMAIL` (`email`),
  ADD UNIQUE KEY `UNIPHNO` (`phone_no`),
  ADD UNIQUE KEY `UNICARD` (`agri_card`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buys`
--
ALTER TABLE `buys`
  ADD CONSTRAINT `buys_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buys_ibfk_2` FOREIGN KEY (`pcode`) REFERENCES `product` (`pcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`pcode`) REFERENCES `product` (`pcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
