CREATE TABLE `users` (
  `Serial` int PRIMARY KEY AUTO_INCREMENT,
  `created_at` timestamp,
  `Username` varchar(255),
  `UserID` int,
  `Name` varchar(255),
  `password` varchar(255)
);

CREATE TABLE `order_items` (
  `OrderID` int PRIMARY KEY AUTO_INCREMENT,
  `ProductID` int,
  `UserID` int,
  `CustomerName` varchar(255),
  `Cust_Email` varchar(255),
  `Cust_Address` varchar(255),
  `Cust_phone` varchar(255),
  `amount` int,
  `size` int,
  `quantity` int DEFAULT 1,
  `Date` datetime,
  `status` varchar(255)
);

CREATE TABLE `dispatch` (
  `OrderID` int,
  `UserID` int,
  `status` varchar(255),
  `Consignment_No` int,
  `Company_name` varchar(255),
  `created_at` datetime
);

CREATE TABLE `products` (
  `created_at` datetime DEFAULT (now()),
  `UserID` int,
  `ProductID` int PRIMARY KEY AUTO_INCREMENT,
  `ProductName` varchar(255),
  `ProductDesc` varchar(255),
  `price` int,
  `TotalStock` int
);

CREATE TABLE `Sizes` (
  `Serial` int PRIMARY KEY AUTO_INCREMENT,
  `ProductID` int,
  `Size` int,
  `Stock` int
);

CREATE TABLE `BalanceSheet` (
  `Serial` int PRIMARY KEY AUTO_INCREMENT,
  `Date` Date,
  `UserID` int,
  `ProductID` int,
  `Credit` int,
  `Debit` int,
  `FreeDays` int
);

CREATE TABLE `ProductImage` (
  `Serial` int PRIMARY KEY AUTO_INCREMENT,
  `ProductID` int,
  `ImageName` varchar(255),
  `ImagePath` varchar(255)
);

CREATE TABLE `merchants` (
  `created_at` timestamp,
  `UserID` int PRIMARY KEY AUTO_INCREMENT,
  `Name` varchar(255),
  `ContactNo` varchar(255),
  `Credits` int,
  `EmailID` varchar(255),
  `type` varchar(255)
);

ALTER TABLE `users` ADD FOREIGN KEY (`UserID`) REFERENCES `merchants` (`UserID`);

ALTER TABLE `order_items` ADD FOREIGN KEY (`UserID`) REFERENCES `merchants` (`UserID`);

ALTER TABLE `order_items` ADD FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

ALTER TABLE `dispatch` ADD FOREIGN KEY (`OrderID`) REFERENCES `order_items` (`OrderID`);

ALTER TABLE `dispatch` ADD FOREIGN KEY (`UserID`) REFERENCES `merchants` (`UserID`);

ALTER TABLE `products` ADD FOREIGN KEY (`UserID`) REFERENCES `merchants` (`UserID`);

ALTER TABLE `Sizes` ADD FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

ALTER TABLE `BalanceSheet` ADD FOREIGN KEY (`UserID`) REFERENCES `merchants` (`UserID`);

ALTER TABLE `BalanceSheet` ADD FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

ALTER TABLE `ProductImage` ADD FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);
