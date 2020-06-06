-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 04:56 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `website_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `adminLevel` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `adminLevel`) VALUES
(1, 'Ngan', 'ngan@gmail.com', 'nganadmin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE IF NOT EXISTS `tbl_branch` (
`branchId` int(11) NOT NULL,
  `branchName` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branchId`, `branchName`) VALUES
(3, 'Acer'),
(4, 'Dell1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
`cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(5, 3, 'etjifos9mvi0j26shthha1q812', 'May tinh', '120000', 1, '8228756c51.png'),
(7, 4, 'emah7tlmn8doee2msdgmil2cj5', '0', '120000', 1, 'c35bf30e06.png'),
(8, 3, 'emah7tlmn8doee2msdgmil2cj5', 'May tinh', '120000', 2, '8228756c51.png'),
(9, 3, 'emah7tlmn8doee2msdgmil2cj5', 'May tinh', '120000', 3, '8228756c51.png'),
(10, 3, 'tte8lese6e6v914n3i7ssusk11', 'May tinh', '120000', 3, '8228756c51.png'),
(11, 5, 'tte8lese6e6v914n3i7ssusk11', '0', '120000', 4, 'd7d92cb951.png'),
(12, 9, 'tte8lese6e6v914n3i7ssusk11', '127', '5000000', 1, 'aa6671728a.jpg'),
(13, 9, 'tte8lese6e6v914n3i7ssusk11', '127', '5000000', 3, 'aa6671728a.jpg'),
(14, 4, 'tte8lese6e6v914n3i7ssusk11', '0', '120000', 3, 'c35bf30e06.png'),
(18, 3, 'br6jqhlv6k76ppn44j2pfe5og5', 'May tinh', '120000', 2, '8228756c51.png'),
(19, 9, 'br6jqhlv6k76ppn44j2pfe5og5', '127', '5000000', 2, 'aa6671728a.jpg'),
(20, 4, 'br6jqhlv6k76ppn44j2pfe5og5', '0', '120000', 1, 'c35bf30e06.png'),
(21, 9, 'iht0g51pfv0s1705ohudrus1c3', '127', '5000000', 1, 'aa6671728a.jpg'),
(22, 4, '2tqn0g56ef6umk9ffpr2fvfpn2', 'Laptop HP', '15000000', 1, '10bd9136b8.jpg'),
(23, 12, '2tqn0g56ef6umk9ffpr2fvfpn2', 'Laptop HP', '20000000', 3, '1bc9308f5d.jpg'),
(33, 3, 'lrd413ltftd3dfskkfrvavovm0', 'Laptop Dell', '16000000', 1, 'efcc17d401.jpg'),
(37, 9, '1n2khcl7sid5lkipds4vhq0ab1', 'Laptop Acer', '5000000', 9, 'c20ae3f654.jpg'),
(41, 3, '6vdt6rlu41so1nklo13i5egl46', 'Laptop Dell', '16000000', 1, 'efcc17d401.jpg'),
(42, 3, '6vdt6rlu41so1nklo13i5egl46', 'Laptop Dell', '16000000', 1, 'efcc17d401.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
`catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'dell'),
(2, 'HP'),
(3, 'macbook'),
(4, 'ACER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE IF NOT EXISTS `tbl_compare` (
`id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
`Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`Id`, `Name`, `Address`, `phone`, `email`, `Password`, `Username`) VALUES
(2, 'Nguyá»…n Thanh NgÃ¢n', 'TPHCM', '0976802915', 'thanhngan654nnn@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ngan'),
(3, 'Ngan', 'TPHCM', '0976802915', 'nga@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
`Id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customerid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `dateOrder` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`Id`, `productId`, `productName`, `customerid`, `quantity`, `price`, `image`, `status`, `dateOrder`) VALUES
(9, 4, 'Laptop HP', 2, 3, '45000000', '10bd9136b8.jpg', 2, '2020-06-05 14:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
`productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `branchId` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `branchId`, `product_desc`, `type`, `price`, `image`) VALUES
(3, 'Laptop Dell', 1, 0, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 1, '16000000', 'efcc17d401.jpg'),
(4, 'Laptop HP', 2, 0, '<p>asdasdas</p>', 1, '15000000', '10bd9136b8.jpg'),
(5, 'Macbook Air', 3, 0, '<p>asdasdas</p>', 1, '30000000', '1636944979.jpg'),
(8, '123', 5, 0, '<p>them</p>', 0, '500000', 'bc41823c6e.jpg'),
(9, 'Laptop Acer', 4, 0, '<p>m&ocirc; táº£</p>', 1, '5000000', 'c20ae3f654.jpg'),
(10, '12', 5, 0, '<p>12</p>', 0, '120000', '276ec0da96.jpg'),
(11, 'Laptop HP', 2, 0, '<p>m&ocirc; táº£</p>', 0, '15500000', 'fbcb65a0e4.jpeg'),
(12, 'Laptop HP', 2, 0, '<p>m&ocirc; táº£</p>', 0, '20000000', '1bc9308f5d.jpg'),
(13, 'Laptop Dell i5', 1, 0, '<p>Core: i5</p>\r\n<p>M&agrave;n H&igrave;nh 14inch, full hd</p>\r\n<p>Card m&agrave;n hinh:<a href="https://www.thegioididong.com/hoi-dap/card-do-hoa-tich-hop-la-gi-950047" target="_blank">c</a>ard Ä‘á»“ há»a t&iacute;ch há»£p<span>, Intel UHD Graphics</span></p>', 0, '16000000', 'b2c03a8ba1.jpg'),
(14, 'Lap top HP', 2, 0, '<p>hp</p>', 0, '13000000', 'fd9294c83c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE IF NOT EXISTS `tbl_wishlist` (
`id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
 ADD PRIMARY KEY (`branchId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
 ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
 ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
 ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
MODIFY `branchId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
