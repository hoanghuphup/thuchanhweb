-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 26, 2020 lúc 02:46 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `adminUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminEmail`, `adminUser`, `adminPass`) VALUES
(1, 'Hoang', 'Hoangpro@gmail.com', 'Hoangpro', '2ee8796149935d9cb7713ba190f7681e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `sld` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productName` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solg` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `getsize` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cartID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cartID`, `productID`, `sld`, `productName`, `price`, `solg`, `image`, `getsize`) VALUES
(12, 15, '5mkautp9st73p9opdk4jkgiis1', 'pnats', '2000', 1, 'b89b5e6ee9.gif', ''),
(13, 14, '8pcbc24aegdagvvpgp70tmqvb4', 'tÃª1', '1000', 2, '5e7b1dda30.gif', ''),
(14, 15, '3rs5567vof8llnooisj9f8oivv', 'pnats', '2000', 2, 'b89b5e6ee9.gif', 'L'),
(15, 14, '3rs5567vof8llnooisj9f8oivv', 'tÃª1', '1000', 2, '5e7b1dda30.gif', 'M');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`catID`, `catName`) VALUES
(1, 'tee'),
(2, 'pants'),
(3, 'jacket'),
(22, 'hoodie');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `accountname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `accountname`, `country`, `phone`, `email`, `password`) VALUES
(1, 'hoang', 'gialai', 'hcm', 'hoang', 'GL', 'pass', 'hoang', '012'),
(2, 'hoang', 'gialai', 'hcm', 'hoang', 'HP', 'pass2', 'hoang2', '020202');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` text COLLATE utf8_unicode_ci NOT NULL,
  `catID` int(11) NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productID`, `productName`, `catID`, `mota`, `image`, `price`, `size`) VALUES
(17, 'creamtee', 1, '<p>aÌo</p>', '1e0ac04e52.jpg', '350000', 1),
(18, 'greentee', 1, '<p>aÌo</p>', 'c18cd4f563.jpg', '169000', 2),
(19, 'xotee', 1, '<p>aÌo</p>', '1f10fbc2e9.gif', '199000', 3),
(20, 'basic sweatpants', 2, '<p>qu&acirc;Ì€n</p>', '47140fa80e.jpg', '400000', 1),
(21, 'hologramtee', 1, '<p>aÌo</p>', 'a46418b113.jpg', '269000', 2),
(22, 'cargo pants', 2, '<p>qu&acirc;Ì€n</p>', 'e39b022e6f.jpg', '369000', 2),
(23, 'raw shorts', 2, '<p>qu&acirc;Ì€n</p>', '6d3e47870b.jpg', '230000', 3),
(24, 'F.I jacket', 3, '<p>jacket</p>', '61e51065a5.jpg', '639000', 1),
(25, 'bru jacket', 3, '<p>jacket</p>', '8236dbb84e.gif', '530000', 2),
(26, 'nun jacket', 3, '<p>jacket</p>', '19167757dc.gif', '399000', 3),
(27, 'bogo hoodie', 22, '<p>hoodie</p>', '82283e0e76.jpg', '550000', 1),
(28, 'tag zip hoodie', 22, '<p>hoodie</p>', '3314f79c64.jpg', '499000', 2),
(29, 'kassidy hoodie', 22, '<p>hoodie</p>', '96523558d1.jpg', '399000', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
