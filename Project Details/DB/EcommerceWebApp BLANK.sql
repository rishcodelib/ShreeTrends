-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 08:17 PM
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
-- Table structure for table `balancesheet`
--

CREATE TABLE `balancesheet` (
  `Serial` int(11) NOT NULL,
  `Date` date DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `StockAvailable` int(50) DEFAULT NULL,
  `Credit` int(11) DEFAULT NULL,
  `Debit` int(11) DEFAULT NULL,
  `FreeDays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `type` varchar(255) DEFAULT NULL,
  `is_Authorized` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`created_at`, `UserID`, `Name`, `ContactNo`, `Credits`, `EmailID`, `type`, `is_Authorized`) VALUES
('2020-10-20 18:36:14', 1, 'Rishabh Aggarwal', '9996690023', 100000000, 'rishabh@gmail.com', 'Admin', 0),
('2020-10-26 19:10:57', 2, 'Abhishek Yadav', '9996630023', 2520, 'abhishekchd@gmail.com', 'Vendor', 0);

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
  `TotalStock` int(11) DEFAULT NULL,
  `is_Available` int(11) DEFAULT NULL,
  `FreeDay` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '2020-10-20 18:34:58', 'admin', 1, 'Rishabh Aggarwal', 'admin'),
(2, '2020-10-20 18:35:40', 'vendor', 2, 'Abhishek Yadav', 'vendor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balancesheet`
--
ALTER TABLE `balancesheet`
  ADD PRIMARY KEY (`Serial`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

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
-- AUTO_INCREMENT for table `balancesheet`
--
ALTER TABLE `balancesheet`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dispatch`
--
ALTER TABLE `dispatch`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balancesheet`
--
ALTER TABLE `balancesheet`
  ADD CONSTRAINT `balancesheet_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `merchants` (`UserID`),
  ADD CONSTRAINT `balancesheet_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

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
