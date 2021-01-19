-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 12:55 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercewebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispatch`
--

CREATE TABLE `dispatch` (
  `serial` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `OrderID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Consignment_No` int(11) DEFAULT NULL,
  `Company_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispatch`
--

INSERT INTO `dispatch` (`serial`, `created_at`, `OrderID`, `UserID`, `Consignment_No`, `Company_name`) VALUES
(1, '2020-10-19 22:40:32', 3, 2, 123, 'bluedart Courier'),
(7, '2020-10-19 22:47:17', 4, 2, 123, 'bluedart Courier');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `ContactNo` varchar(11) DEFAULT NULL,
  `Credits` int(11) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`created_at`, `UserID`, `Name`, `ContactNo`, `Credits`, `EmailID`, `type`) VALUES
('2020-10-18 19:46:07', 1, 'Rishabh Aggarwal', '2147483647', 1960, 'ri.sbh23@gmail.com', 'Admin'),
('2020-10-19 21:03:47', 2, 'Abhishek Yadav', '2147483647', 1800, 'abhishekchd@gmail.com', 'Vendor'),
('2020-10-14 14:54:37', 3, 'Satyam', '123456789', 100, 'Stayam@gmail.com', 'Vendor'),
('2020-10-14 14:54:37', 4, 'Bhushan Jindal', '2147483647', 0, 'bhushan@gmail.com', 'Vendor'),
('2020-10-14 14:54:37', 5, 'Rishav Arora', '2147483647', 20, 'Rishav@gmail.com', 'Vendor');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CustomerName` varchar(255) DEFAULT NULL,
  `Cust_Email` varchar(255) DEFAULT NULL,
  `Cust_Address` varchar(255) DEFAULT NULL,
  `Cust_phone` varchar(25) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `size` int(20) DEFAULT NULL,
  `Date` datetime DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`OrderID`, `ProductID`, `UserID`, `CustomerName`, `Cust_Email`, `Cust_Address`, `Cust_phone`, `amount`, `quantity`, `size`, `Date`, `status`, `Comments`) VALUES
(1, 1, 2, 'Rishabh Aggarwal', 'rishabh@gmail.coim', 'Kurukshetra Haryana', '9996690023', 500, 1, 25, '2020-10-18 17:22:07', NULL, NULL),
(2, 1, 2, 'Abhishk', 'abhi@gmail.coim', '`asd', '1234567', 500, 1, 25, '2020-10-18 17:23:19', NULL, NULL),
(3, 1, 2, NULL, NULL, 'Rishabh aggarwal\'s Residence', '9996690023', 500, 1, 42, '2020-10-20 03:10:54', 'CONFIRMED', 'no new Additional comments'),
(4, 8, 2, NULL, NULL, 'Kurti house, Lokhandwala Mumbai, India', 'New Kurti', 1500, 1, 30, '2020-10-20 03:16:17', 'DISPATCHED', 'please pack in waterproof baggage!');

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `Serial` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `ImageName` varchar(255) DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`Serial`, `ProductID`, `ImageName`, `ImagePath`) VALUES
(1, 1, '1.jpg', '/assets/images/uploads/2/'),
(2, 2, '2.jpg', '/assets/images/uploads/2/'),
(3, 3, '3.jpg', '/assets/images/uploads/2/'),
(4, 4, '4.jpg', '/assets/images/uploads/2/'),
(5, 5, '5.jpg', '/assets/images/uploads/2/'),
(6, 6, '6.jpg', '/assets/images/uploads/2/'),
(7, 7, '7.jpg', '/assets/images/uploads/2/'),
(8, 8, '8.jpg', '/assets/images/uploads/2/'),
(9, 9, '9.jpg', '/assets/images/uploads/2/'),
(10, 10, '10.jpg', '/assets/images/uploads/2/'),
(11, 11, '11.jpg', '/assets/images/uploads/2/');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Time` time DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductDesc` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `TotalStock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Date`, `Time`, `UserID`, `ProductID`, `ProductName`, `ProductDesc`, `price`, `TotalStock`) VALUES
('2020-10-18', '17:18:40', 2, 1, 'Red Sweat Shirt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 500, 32),
('2020-09-07', '17:19:23', 2, 2, 'Fila Tshirt', 'Fila Teshirt is white in color and best', 600, 35),
('2020-09-07', '17:20:11', 2, 3, 'Line Shirt', 'Line shirt is fulls Sleves and working preety Well', 600, 50),
('2020-09-07', '17:20:49', 2, 4, 'Brown Over Shirt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 100, 15),
('2020-09-07', '17:21:24', 2, 5, 'Blue Color T Shirt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1000, 15),
('2020-09-07', '01:16:07', 2, 6, 'New Product Testing', 'Product To manage the Work', 500, 10),
('2020-09-08', '01:18:07', 2, 7, 'Girls Product', 'Latest Indian Wear ', 200, 34),
('2020-10-09', '01:28:28', 2, 8, 'Black Kurti', 'Daily Waer black Kurti for Girls/Women', 1500, 14),
('2020-10-19', '01:29:50', 2, 9, 'New Black Kurti', 'Updated Product New Black Kurti', 500, 1),
('2020-10-19', '01:31:12', 2, 10, 'Blue Jeans ', 'Blue JEans for Women Daily Wear', 2000, 20),
('2020-10-20', '02:33:47', 2, 11, 'Rameshwaram Saree', 'Rameshwaram Saree ethnic ', 500, 35);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `Serial` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Size` int(11) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`Serial`, `ProductID`, `Size`, `Stock`) VALUES
(1, 1, 42, 19),
(2, 1, 25, 13),
(3, 2, 40, 5),
(4, 2, 42, 10),
(5, 2, 44, 20),
(6, 3, 34, 20),
(7, 3, 36, 10),
(8, 3, 38, 10),
(9, 3, 40, 10),
(10, 4, 40, 5),
(11, 4, 44, 10),
(12, 5, 40, 10),
(13, 5, 42, 5),
(14, 6, 20, 10),
(15, 7, 30, 34),
(16, 8, 30, 4),
(17, 8, 32, 10),
(18, 9, 20, 1),
(19, 10, 34, 20),
(20, 11, 34, 10),
(21, 11, 36, 20),
(22, 11, 40, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Serial` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Username` varchar(255) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Serial`, `created_at`, `Username`, `UserID`, `Name`, `password`) VALUES
(6, '2020-10-14 14:57:43', 'admin', 1, 'Rishabh Aggarwal', 'admin'),
(7, '2020-10-14 14:57:43', 'vendor', 2, 'Abhishek Yadav', 'vendor'),
(8, '2020-10-14 14:57:43', 'user', 3, 'Satyam Chaurasiya', 'user'),
(9, '2020-10-14 14:57:43', 'Bhushan', 4, 'Bhushan Jindal', 'Bhushan'),
(10, '2020-10-14 14:57:43', 'Rishav', 5, 'Rishav Arora', 'Rishav');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`Serial`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`Serial`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Serial`),
  ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispatch`
--
ALTER TABLE `dispatch`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD CONSTRAINT `dispatch_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order_items` (`OrderID`),
  ADD CONSTRAINT `dispatch_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `merchants` (`UserID`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `merchants` (`UserID`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `productimage`
--
ALTER TABLE `productimage`
  ADD CONSTRAINT `productimage_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `merchants` (`UserID`);

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `merchants` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
