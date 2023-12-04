-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 04:41 PM
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
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `product_id` int(50) NOT NULL,
  `a_userid` int(20) NOT NULL,
  `a_quantity` int(20) NOT NULL,
  `a_price` int(20) NOT NULL,
  `a_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`product_id`, `a_userid`, `a_quantity`, `a_price`, `a_img`) VALUES
(6, 1, 1, 34999, 'Galaxy M53 5G.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(10) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `b_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `b_name`, `b_img`) VALUES
(1, 'LENOVO', 'Lenovo.jpg'),
(2, 'DELL', 'Dell.jpg'),
(3, 'ADDIDAS', 'addidas.png'),
(4, 'SAMSUNG', 'SAMSUNG.png'),
(5, 'HP', 'HP.png'),
(6, 'Chings', 'Chings.png'),
(7, 'Ugaoo', 'Ugaoo.png');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(10) NOT NULL,
  `category_name` varchar(40) NOT NULL,
  `category_code` varchar(40) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `category_name`, `category_code`, `image`) VALUES
(1, 'Electronic', 'IT001', 'Electronic.jpg'),
(2, 'food', 'FD001', 'food.png'),
(3, 'Seeds', 'SEADS001', 'Seads.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `u_id` int(10) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_mail` varchar(50) NOT NULL,
  `u_mobile` varchar(10) NOT NULL,
  `u_date` datetime NOT NULL DEFAULT current_timestamp(),
  `u_pass` varchar(50) NOT NULL,
  `u_role` varchar(50) NOT NULL DEFAULT 'user',
  `u_img` varchar(150) NOT NULL DEFAULT 'bydefault.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`u_id`, `u_name`, `u_mail`, `u_mobile`, `u_date`, `u_pass`, `u_role`, `u_img`) VALUES
(1, 'kush1', 'kush@gmail.com', '6932587412', '2023-03-24 18:48:13', '1230', 'user', '6932587412.jpg'),
(5, 'tanish123', 'tejasvmodi@gmail.com', '123456709', '2023-04-30 09:39:05', '2003', 'Admin', '123456709.png'),
(7, 'palak', 'palak@gmail.com', '7896321455', '2023-05-04 16:28:00', '12', 'user', 'bydefault.jpg'),
(8, 'tejasv', 'tejasv@gmail.com', '9909999099', '2023-05-04 16:40:59', 'tej', 'user', 'bydefault.jpg'),
(10, 'Tejasv', 'moditejasv@gmail.com', '6354492871', '2023-05-11 09:25:04', '12305', 'user', '6354492871.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` varchar(100) NOT NULL,
  `p_id` int(75) NOT NULL,
  `user_id` int(200) NOT NULL,
  `o_quantity` int(20) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `p_id`, `user_id`, `o_quantity`, `order_status`, `order_date`, `order_total`) VALUES
('6464eae62fbf6', 3, 7, 2, 'ordered', '2023-05-17', 48400),
('6464eb59b4c0c', 6, 7, 1, 'ordered', '2023-05-17', 34999),
('646615a59e146', 6, 7, 1, 'ordered', '2023-05-18', 34999),
('646615a59e146', 4, 7, 1, 'ordered', '2023-05-18', 15999),
('646615a59e146', 7, 7, 1, 'ordered', '2023-05-18', 20),
('64670a953f1a0', 1, 7, 25, 'ordered', '2023-05-19', 3299975),
('64670acacbf8d', 1, 7, 3, 'ordered', '2023-05-19', 395997),
('6468bde8d6291', 7, 1, 1, 'ordered', '2023-05-20', 20),
('6468bde8d6291', 5, 1, 1, 'ordered', '2023-05-20', 56190),
('6468bde8d6291', 9, 1, 5, 'ordered', '2023-05-20', 745),
('6468d79341203', 1, 1, 1, 'ordered', '2023-05-20', 131999);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_code` varchar(50) NOT NULL,
  `cat_id` int(20) NOT NULL,
  `subcat_id` int(20) NOT NULL,
  `b_id` int(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `minimum_qty` int(20) NOT NULL,
  `p_desc` varchar(150) NOT NULL,
  `quantity` int(20) NOT NULL,
  `discount` int(10) NOT NULL,
  `r_price` int(100) NOT NULL,
  `p_price` int(100) NOT NULL,
  `pstatus` varchar(50) NOT NULL,
  `p_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_code`, `cat_id`, `subcat_id`, `b_id`, `unit`, `minimum_qty`, `p_desc`, `quantity`, `discount`, `r_price`, `p_price`, `pstatus`, `p_image`) VALUES
(1, 'Galaxy S22 Ultra 5G', 'PT001', 1, 2, 4, 'Piece', 1, 'The first Galaxy S with embedded S Pen. Write comfortably like pen on paper, turn quick notes into legible text and use Air Actions to control your ph', 23, 5, 126999, 131999, 'Active', 'Galaxy S22 Ultra 5G.jpg'),
(3, 'Galaxy M33 5G', 'PT003', 1, 2, 4, 'Piece', 1, '', 183, 5, 17999, 24200, 'Active', 'Galaxy M33 5G.jpg'),
(4, 'Galaxy M13', 'PT004', 1, 2, 4, 'Piece', 1, '6000mAh lithium-ion battery, 1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories in', 5, 10, 9999, 15999, 'Active', 'Galaxy M13.jpg'),
(5, 'IdeaCentre AIO 3', 'PT005', 1, 3, 1, 'Piece', 1, 'Processor: 11th Gen Intel Core i3-1115G4 | Speed: 3.0 GHz (Base) - 4.1 GHz (Max) | 2 Cores | 4 Threads | 6MB Cache\r\nOS: Pre-Loaded Windows 11 Home wit', 29, 10, 49000, 56190, 'Active', 'IdeaCentre AIO 3.jpg'),
(6, 'Galaxy M53 5G', 'PT006', 1, 2, 4, 'Piece', 1, 'Segment Best 108MP Quad Camera Setup, with exciting features like Single Take, Object Eraser, and Photo Remaster\r\n6.7-inch Super AMOLED Plus Display, ', 278, 5, 27999, 34999, 'Active', 'Galaxy M53 5G.jpg'),
(7, 'chowmein', 'ch1231', 2, 4, 6, 'psc', 1, '', 34, 10, 15, 20, 'Open', 'chowmein.png'),
(8, 'SunFlower', 'SF001', 3, 7, 7, 'Piece', 1, 'Cultivated primarily for harvesting', 59, 10, 250, 325, 'Active', 'SunFlower.png'),
(9, 'Aster', 'A001', 3, 7, 7, 'psc', 1, 'These flowers are commonly known as China', 63, 10, 99, 149, 'Open', 'Aster.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_id` int(50) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_desc` varchar(150) NOT NULL,
  `cat_id` int(50) NOT NULL,
  `sccode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_id`, `sub_name`, `sub_desc`, `cat_id`, `sccode`) VALUES
(2, 'Mobile', '', 1, 'MB001'),
(3, 'Computer', '', 1, 'CP001'),
(4, 'chinese', 'chiniese food made in china so dont take it ', 2, 'CT123'),
(7, 'Flower Seeds', 'Growing your colourful garden from flower seeds ', 3, 'FS001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD KEY `a_userid` (`a_userid`),
  ADD KEY `add_to_cart_ibfk_2` (`product_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `b_name` (`b_name`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_code` (`category_code`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_name` (`u_name`,`u_mail`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_code` (`p_code`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `subcat_id` (`subcat_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `sccode` (`sccode`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD CONSTRAINT `add_to_cart_ibfk_1` FOREIGN KEY (`a_userid`) REFERENCES `login` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add_to_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_table_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `brand` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`subcat_id`) REFERENCES `sub_cat` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD CONSTRAINT `sub_cat_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
