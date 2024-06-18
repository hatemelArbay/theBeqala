-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 03:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `userPID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(11) NOT NULL,
  `userPID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `userPID`) VALUES
(24, 36),
(25, 37),
(26, 38),
(27, 39),
(28, 40),
(29, 41),
(30, 42),
(31, 43),
(32, 44),
(33, 45),
(34, 46),
(35, 47),
(36, 48),
(37, 49),
(38, 50);

-- --------------------------------------------------------

--
-- Table structure for table `custorder`
--

CREATE TABLE `custorder` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `isDelivered` tinyint(1) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `cardNumber` varchar(20) NOT NULL,
  `cardName` varchar(20) NOT NULL,
  `expDate` varchar(20) NOT NULL,
  `cvv` int(11) NOT NULL,
  `totalBill` int(11) NOT NULL,
  `custID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productDescription` varchar(4000) NOT NULL,
  `productCategory` varchar(50) NOT NULL,
  `productPrice` double NOT NULL,
  `productImg` varchar(100) NOT NULL,
  `productDate` date NOT NULL,
  `productQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `productDescription`, `productCategory`, `productPrice`, `productImg`, `productDate`, `productQuantity`) VALUES
(31, 'Guava fruit', 'fresh Guava fruit from our national gardens', 'Fruits', 15, '../Uploads/Guava fruit.png', '2023-05-05', 5),
(33, 'Cantaloupe ', 'fresh  organic Cantaloupe coming straight away from our own egyptian farms', 'Fruits', 50, '../Uploads/Cantaloupe .png', '2023-05-05', 50),
(34, 'ColaCola 330ml', 'ColaCola diet 330ml', 'Beverages', 7, '../Uploads/ColaCola 330ml.png', '2023-05-05', 50),
(35, 'KitKate chocolate ', 'delicious KitKate chocolate ', 'Snacks', 15, '../Uploads/KitKate chocolate .png', '2023-05-05', 40),
(36, 'Tomato', 'Sweet Tomato', 'Vegetables', 10, '../Uploads/Tomato.png', '2023-05-05', 20),
(37, 'Cheerios Cornflakes ', 'sweet honey Cheerios Cornflakes ', 'Cereals', 50, '../Uploads/Cheerios Cornflakes .png', '2023-05-05', 5),
(38, 'Singles Cheese ', 'Fresh Singles Cheese ', 'Dairy', 110, '../Uploads/Singles Cheese .png', '2023-05-05', 10),
(39, 'Frozen mixed Vegetables ', 'good selection of tasty and imported mixed Vegetables from Oman', 'FrozenFood', 50, '../Uploads/Frozen mixed Vegetables .png', '2023-05-05', 50),
(41, 'milk bottle 1L', 'fresh milk', 'Milk', 30, '../Uploads/milk bottle 1L.png', '2023-05-05', 50),
(42, 'Dutch Lady milk', 'Dutch Lady low fat milk', 'Milk', 50, '../Uploads/Dutch Lady milk.png', '2023-05-05', 5),
(43, 'Good to Go chocolate milk', 'delicious cholcolate milk ', 'Milk', 30, '../Uploads/Good to Go chocolate milk.jpg', '2023-05-05', 20),
(44, 'milk bottle 100ml', 'fresh milk in a glass bottle ', 'Milk', 20, '../Uploads/milk bottle 100ml.png', '2023-05-05', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userPID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `phoneNum` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userPID`, `name`, `userName`, `pass`, `phoneNum`, `address`, `email`) VALUES
(36, 'John Doe', 'jdoe', 'password123', '555-1234', '123 Main St', 'jdoe@email.com'),
(37, 'Jane Smith', 'jsmith', 'qwerty456', '555-5678', '456 Oak St', 'jsmith@email.com'),
(38, 'Bob Johnson', 'bjohnson', 'letmein789', '555-9012', '789 Elm St', 'bjohnson@email.com'),
(39, 'Alice Brown', 'abrown', 'password1', '555-3456', '234 Pine St', 'abrown@email.com'),
(40, 'Mike Wilson', 'mwilson', 'mypassword', '555-7890', '567 Maple St', 'mwilson@email.com'),
(41, 'Sara Lee', 'slee', 'cakeboss', '555-2345', '890 Cherry St', 'slee@email.com'),
(42, 'David Garcia', 'dgarcia', 'password1234', '555-6789', '1234 Walnut St', 'dgarcia@email.com'),
(43, 'Karen Brown', 'kbrown', '123abc', '555-1234', '567 Pine St', 'kbrown@email.com'),
(44, 'Robert Smith', 'rsmith', 'password12345', '555-5678', '890 Oak St', 'rsmith@email.com'),
(45, 'Linda Davis', 'ldavis', 'ilovecats', '555-9012', '234 Elm St', 'ldavis@email.com'),
(46, 'Tom Wilson', 'twilson', 'password123456', '555-3456', '567 Pine St', 'twilson@email.com'),
(47, 'Mary Johnson', 'mjohnson', 'mypassword123', '555-7890', '890 Maple St', 'mjohnson@email.com'),
(48, 'Kevin Lee', 'klee', 'password987', '555-2345', '1234 Cherry St', 'klee@email.com'),
(49, 'Emily Garcia', 'egarcia', 'letmein', '555-6789', '456 Walnut St', 'egarcia@email.com'),
(50, 'hatem', 'hatem', '123', '01117766693', 'rehab', 'hatemel3arby@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `userPID` (`userPID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`),
  ADD KEY `userPID` (`userPID`);

--
-- Indexes for table `custorder`
--
ALTER TABLE `custorder`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `custId` (`custId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `custID` (`custID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userPID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `custorder`
--
ALTER TABLE `custorder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`userPID`) REFERENCES `user` (`userPID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`userPID`) REFERENCES `user` (`userPID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `custorder`
--
ALTER TABLE `custorder`
  ADD CONSTRAINT `custorder_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `custorder_ibfk_2` FOREIGN KEY (`custId`) REFERENCES `customer` (`custID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
