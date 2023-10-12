-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 12:57 PM
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
-- Database: `swift_deliva`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `companyID` varchar(70) DEFAULT NULL,
  `companyName` varchar(250) DEFAULT NULL,
  `owner` varchar(70) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `lga` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `companyID`, `companyName`, `owner`, `state`, `lga`, `date`) VALUES
(1, 'eYot6sXUFvfSv4TAPY3wnoFirbJ5PPO9WzVStKXVpFf2*HZcUYtUGquk7kw7', 'Okoro Logistics', 'wvGIteF*8zTdAI68K3q8zBbZZ8Z2BsNRw0B91YGINOiyC*ZejYXdgcMJYAeZ', 'Abia', 'Aba North', '2023-09-20 15:58:05'),
(2, 'wHpK4ydJF3u74zPaZgegwwfCG8n4DE5disdAo4n8lbtyApKHj4PeG2HMBRNt', 'Akpan joy', 'p53BHNnqOUrARwDDjcQjrFTnJKXxmx1fN00HMyR8q8CABxWWUrmQCXScrzPs', 'Abia', 'Aba North', '2023-09-20 16:09:25'),
(3, 'pZjZiOxCMrYL1D0yWmFNUPQEroFwUZmU5byfJNkr52rrKZExmoy9lp2x748B', 'Riches Logistics', 'jEt*n2rv1o8TDODqeVh94gDmX6VfOhPD4O7BYEdVxhyPGkWEEGBMRNDD2hxI', 'Abia', 'Aba North', '2023-09-27 14:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `companyName` varchar(70) DEFAULT NULL,
  `driverName` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `companyName`, `driverName`) VALUES
(1, 'eYot6sXUFvfSv4TAPY3wnoFirbJ5PPO9WzVStKXVpFf2*HZcUYtUGquk7kw7', 'ABKlBKRFoBJg0zmvwvtnENzSgPdXDaaphGTpwvkCvM3GqEtj6zbkPff6E1RB'),
(2, 'eYot6sXUFvfSv4TAPY3wnoFirbJ5PPO9WzVStKXVpFf2*HZcUYtUGquk7kw7', 'JOK6fMW2Yr2DQrROZoG*JOVfIsunmtqWsZ7YcuVJH0CQEymglQlWXjal3r89'),
(3, 'pZjZiOxCMrYL1D0yWmFNUPQEroFwUZmU5byfJNkr52rrKZExmoy9lp2x748B', 'UX25MxhGTVrf9sgjv1jMIXG2QZ6a63ebpQnXBKpatd22yiDljPiXa1BEVpn9');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderID` varchar(70) DEFAULT NULL,
  `driverID` varchar(70) DEFAULT NULL,
  `companyID` varchar(70) DEFAULT NULL,
  `packageID` varchar(70) DEFAULT NULL,
  `payment_status` int(2) DEFAULT NULL,
  `order_status` int(11) NOT NULL,
  `pickUpDate` varchar(250) DEFAULT NULL,
  `deliveryDate` varchar(250) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderID`, `driverID`, `companyID`, `packageID`, `payment_status`, `order_status`, `pickUpDate`, `deliveryDate`, `date`) VALUES
(1, '20230922125420', 'ABKlBKRFoBJg0zmvwvtnENzSgPdXDaaphGTpwvkCvM3GqEtj6zbkPff6E1RB', 'eYot6sXUFvfSv4TAPY3wnoFirbJ5PPO9WzVStKXVpFf2*HZcUYtUGquk7kw7', '20230922125420650d725c5498f', 0, 4, '22-09-2023', '24-09-2023 02:07:00', '2023-09-22 12:54:20'),
(2, '20230922131505', 'ABKlBKRFoBJg0zmvwvtnENzSgPdXDaaphGTpwvkCvM3GqEtj6zbkPff6E1RB', 'eYot6sXUFvfSv4TAPY3wnoFirbJ5PPO9WzVStKXVpFf2*HZcUYtUGquk7kw7', '20230922131505650d77398b823', 1, 4, '22-09-2023', '23-09-2023 02:48:00', '2023-09-22 13:15:05'),
(3, '20230923154936', NULL, 'eYot6sXUFvfSv4TAPY3wnoFirbJ5PPO9WzVStKXVpFf2*HZcUYtUGquk7kw7', '20230923154936650eecf02bb56', 0, 6, '23-09-2023', '25-09-2023 01:09:00', '2023-09-23 15:49:36'),
(4, '20230925190006', 'ABKlBKRFoBJg0zmvwvtnENzSgPdXDaaphGTpwvkCvM3GqEtj6zbkPff6E1RB', 'eYot6sXUFvfSv4TAPY3wnoFirbJ5PPO9WzVStKXVpFf2*HZcUYtUGquk7kw7', '202309251900066511bc961768b', 0, 4, '25-09-2023', '27-09-2023 02:22:00', '2023-09-25 19:00:06'),
(5, '20230926123326', 'JOK6fMW2Yr2DQrROZoG*JOVfIsunmtqWsZ7YcuVJH0CQEymglQlWXjal3r89', 'eYot6sXUFvfSv4TAPY3wnoFirbJ5PPO9WzVStKXVpFf2*HZcUYtUGquk7kw7', '202309261233266512b376a6248', 0, 2, '26-09-2023', '27-09-2023 01:17:00', '2023-09-26 12:33:26'),
(6, '20230927144130', 'UX25MxhGTVrf9sgjv1jMIXG2QZ6a63ebpQnXBKpatd22yiDljPiXa1BEVpn9', 'pZjZiOxCMrYL1D0yWmFNUPQEroFwUZmU5byfJNkr52rrKZExmoy9lp2x748B', '20230927144130651422faa5ef2', 0, 2, '27-09-2023', '28-09-2023 01:12:00', '2023-09-27 14:41:30'),
(7, '20231003122040', 'ABKlBKRFoBJg0zmvwvtnENzSgPdXDaaphGTpwvkCvM3GqEtj6zbkPff6E1RB', 'eYot6sXUFvfSv4TAPY3wnoFirbJ5PPO9WzVStKXVpFf2*HZcUYtUGquk7kw7', '20231003122040651beaf8de13b', 1, 4, '03-10-2023', '05-10-2023 03:22:00', '2023-10-03 12:20:40'),
(8, '20231004115819', NULL, 'eYot6sXUFvfSv4TAPY3wnoFirbJ5PPO9WzVStKXVpFf2*HZcUYtUGquk7kw7', '20231004115819651d373b5d8cb', 0, 0, '05-10-2023', '06-10-2023 03:43:00', '2023-10-04 11:58:19'),
(9, '20231004120234', 'ABKlBKRFoBJg0zmvwvtnENzSgPdXDaaphGTpwvkCvM3GqEtj6zbkPff6E1RB', 'eYot6sXUFvfSv4TAPY3wnoFirbJ5PPO9WzVStKXVpFf2*HZcUYtUGquk7kw7', '20231004120234651d383abe4d9', 1, 8, '04-10-2023', '06-10-2023 01:15:00', '2023-10-04 12:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `packageID` varchar(70) DEFAULT NULL,
  `senderID` varchar(70) DEFAULT NULL,
  `receiverID` varchar(70) DEFAULT NULL,
  `trackingID` varchar(70) DEFAULT NULL,
  `packageDescription` varchar(260) DEFAULT NULL,
  `packageItems` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`packageItems`)),
  `deliveryInstruction` text DEFAULT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `deliveryStatus` int(2) DEFAULT NULL,
  `method` varchar(10) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `packageID`, `senderID`, `receiverID`, `trackingID`, `packageDescription`, `packageItems`, `deliveryInstruction`, `paymentMethod`, `deliveryStatus`, `method`, `date`) VALUES
(1, '20230922125420650d725c5498f', 'nlS4H8KXSBCWcvs1b8GyNErFwzsNuzj6VzUPgi1kfoaKCCPdb2CA3socOFcb', '20230922125420650d725c53152', '202309261222466512b0f6569bf', 'Electronics', '[{\"item_name\":\"Phones\",\"item_quantiy\":5,\"item_weight\":87,\"item_length\":35,\"item_height\":33,\"item_width\":35,\"Price\":87},{\"item_name\":\"Mouse\",\"item_quantiy\":7,\"item_weight\":34,\"item_length\":84,\"item_height\":83,\"item_width\":84,\"Price\":2963.1},{\"item_name\":\"Laptops\",\"item_quantiy\":7,\"item_weight\":98,\"item_length\":34,\"item_height\":38,\"item_width\":34,\"Price\":98},{\"item_name\":\"Televisons\",\"item_quantiy\":2,\"item_weight\":56,\"item_length\":34,\"item_height\":39,\"item_width\":34,\"Price\":56}]', 'This package is to be delivered at the receiver side in time, endevour to communicate with the receiver properly.', 'Cash on delivery', 2, NULL, '2023-09-22 12:54:20'),
(2, '20230922131505650d77398b823', 'L6GZPWrDtEOKPaMQKkAszvBRsBFUtNChLznfCuFnG9cCXgOJgNDgS8owhpET', '20230922131505650d773988b67', '202309261222476512b0f776fa5', 'Cereals', '[{\"item_name\":\"Bags of beans\",\"item_quantiy\":4,\"item_weight\":73,\"item_length\":56,\"item_height\":87,\"item_width\":55,\"Price\":4445.7},{\"item_name\":\"Bags of rice\",\"item_quantiy\":7,\"item_weight\":63,\"item_length\":87,\"item_height\":89,\"item_width\":87,\"Price\":6097.61}]', 'This packages are perishable goods and should be handles with care, and should be delivered in time.', 'Card', 2, NULL, '2023-09-22 13:15:05'),
(3, '20230923154936650eecf02bb56', 'L6GZPWrDtEOKPaMQKkAszvBRsBFUtNChLznfCuFnG9cCXgOJgNDgS8owhpET', '20230923154936650eecf02a2b6', '20230923154936650eecf02fcf4', 'House hold stuffs', '[{\"item_name\":\"Spoons\",\"item_quantiy\":63,\"item_weight\":92,\"item_length\":363,\"item_height\":663,\"item_width\":363,\"Price\":276769.35},{\"item_name\":\"Plates\",\"item_quantiy\":37,\"item_weight\":123,\"item_length\":65,\"item_height\":65,\"item_width\":65,\"Price\":6495.94},{\"item_name\":\"Buckets\",\"item_quantiy\":7,\"item_weight\":45,\"item_length\":76,\"item_height\":22,\"item_width\":76,\"Price\":45}]', 'This package is very important to me, please deliver it in time', 'Cash on delivery', 3, NULL, '2023-09-23 15:49:36'),
(4, '202309251900066511bc961768b', 'L6GZPWrDtEOKPaMQKkAszvBRsBFUtNChLznfCuFnG9cCXgOJgNDgS8owhpET', '202309251900066511bc96142ce', '202309261222486512b0f8474b5', 'Fans', '[{\"item_name\":\"celing fan\",\"item_quantiy\":4,\"item_weight\":33,\"item_length\":45,\"item_height\":73,\"item_width\":45,\"Price\":33}]', 'I want this package to be delievred in time.', 'Cash on delivery', 2, NULL, '2023-09-25 19:00:06'),
(5, '202309261233266512b376a6248', 'L6GZPWrDtEOKPaMQKkAszvBRsBFUtNChLznfCuFnG9cCXgOJgNDgS8owhpET', '202309261233266512b376a421d', '202309261237086512b45455748', 'Laptops', '[{\"item_name\":\"acer laptop\",\"item_quantiy\":5,\"item_weight\":44,\"item_length\":55,\"item_height\":44,\"item_width\":43,\"Price\":44},{\"item_name\":\"hp laptop\",\"item_quantiy\":3,\"item_weight\":56,\"item_length\":87,\"item_height\":34,\"item_width\":33,\"Price\":56},{\"item_name\":\"dell laptop\",\"item_quantiy\":8,\"item_weight\":46,\"item_length\":64,\"item_height\":36,\"item_width\":44,\"Price\":46}]', 'This is a fragile item and i need it to be handled with care, thanks.', 'Cash on delivery', 2, NULL, '2023-09-26 12:33:26'),
(6, '20230927144130651422faa5ef2', 'L6GZPWrDtEOKPaMQKkAszvBRsBFUtNChLznfCuFnG9cCXgOJgNDgS8owhpET', '20230927144130651422faa251b', '20230927144736651424688c7e3', 'Laptop devices', '[{\"item_name\":\"oHSSJJS\",\"item_quantiy\":4,\"item_weight\":344,\"item_length\":33,\"item_height\":55,\"item_width\":33,\"Price\":344}]', 'i like the package', 'Cash on delivery', 2, NULL, '2023-09-27 14:41:30'),
(7, '20231003122040651beaf8de13b', 'L6GZPWrDtEOKPaMQKkAszvBRsBFUtNChLznfCuFnG9cCXgOJgNDgS8owhpET', '20231003122040651beaf8dbe35', '20231003122454651bebf68934b', 'Fridge', '[{\"item_name\":\"lg friege\",\"item_quantiy\":5,\"item_weight\":55,\"item_length\":74,\"item_height\":98,\"item_width\":45,\"Price\":4985.75},{\"item_name\":\"lg star friege\",\"item_quantiy\":5,\"item_weight\":76,\"item_length\":56,\"item_height\":4,\"item_width\":4,\"Price\":76}]', 'I like this package treat with care', 'Card', 2, NULL, '2023-10-03 12:20:40'),
(8, '20231004115819651d373b5d8cb', 'L6GZPWrDtEOKPaMQKkAszvBRsBFUtNChLznfCuFnG9cCXgOJgNDgS8owhpET', '20231004115819651d373b5a191', '20231004115819651d373b635c5', 'Bags', '[{\"item_name\":\"Ladies bags\",\"item_quantiy\":6,\"item_weight\":34,\"item_length\":65,\"item_height\":3,\"item_width\":3,\"Price\":34},{\"item_name\":\"Mens bags\",\"item_quantiy\":23,\"item_weight\":4,\"item_length\":73,\"item_height\":7,\"item_width\":5,\"Price\":4}]', 'This bag is very important to me.', 'Cash on delivery', 0, NULL, '2023-10-04 11:58:19'),
(9, '20231004120234651d383abe4d9', 'L6GZPWrDtEOKPaMQKkAszvBRsBFUtNChLznfCuFnG9cCXgOJgNDgS8owhpET', '20231004120234651d383abc4dd', '20231004141421651d571d59520', 'Electronics', '[{\"item_name\":\"Televsion sets\",\"item_quantiy\":3,\"item_weight\":45,\"item_length\":3,\"item_height\":3,\"item_width\":8,\"Price\":45},{\"item_name\":\"Lg refrigirators \",\"item_quantiy\":8,\"item_weight\":32,\"item_length\":76,\"item_height\":35,\"item_width\":34,\"Price\":32}]', 'This package are highly important, keep in good condition.', 'Card', 1, NULL, '2023-10-04 12:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `paymentID` varchar(70) DEFAULT NULL,
  `orderID` varchar(250) NOT NULL,
  `referenceID` varchar(250) NOT NULL,
  `paymentAmount` int(250) NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `paymentID`, `orderID`, `referenceID`, `paymentAmount`, `paymentMethod`, `date`) VALUES
(1, '20230922131505650d7739905a6', '20230922131505', '3130431609', 1054331, 'Card', '2023-09-22 13:15:05'),
(10, '202309261223496512b13562654', '20230922125420', '', 320410, 'Cash on delivery', '2023-09-26 12:23:49'),
(11, '202309261223596512b13f7a27b', '20230925190006', '', 3300, 'Cash on delivery', '2023-09-26 12:23:59'),
(12, '202309261237596512b487bfa16', '20230926123326', '', 14600, 'Cash on delivery', '2023-09-26 12:37:59'),
(13, '20230927145349651425ddef0a2', '20230927144130', '', 34400, 'Cash on delivery', '2023-09-27 14:53:49'),
(14, '202309291354176516bae98cf39', '20230925190006', '', 3300, 'Cash on delivery', '2023-09-29 13:54:17'),
(15, '202309291354306516baf6c7fd2', '20230922125420', '', 320410, 'Cash on delivery', '2023-09-29 13:54:30'),
(16, '20231003122040651beaf8e0d1a', '20231003122040', '3162654684', 506175, 'Card', '2023-10-03 12:20:40'),
(17, '20231003122642651bec62d5a8c', '20230925190006', '', 3300, 'Cash on delivery', '2023-10-03 12:26:42'),
(18, '20231004120234651d383ac15ec', '20231004120234', '3165715166', 77, 'Card', '2023-10-04 12:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `id` int(11) NOT NULL,
  `receiverID` varchar(70) DEFAULT NULL,
  `receiverName` varchar(70) DEFAULT NULL,
  `receiverAddress` varchar(100) DEFAULT NULL,
  `receiverContact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`id`, `receiverID`, `receiverName`, `receiverAddress`, `receiverContact`) VALUES
(1, '20230922125420650d725c53152', 'Joseph Mathew', 'No 87 ayanwo close by mile 2 round rumuatra junction.', '08193635673'),
(2, '20230922131505650d773988b67', 'John Kalu', '43 okonkwo street by odoqgwu filling station ada goarge, ph', '09173738284'),
(3, '20230923154936650eecf02a2b6', 'Jonny Paul', '49 amadi street ph', '08165188232'),
(4, '202309251900066511bc96142ce', 'Jonny Paul', '80 ugo street by etche road', '08257847363'),
(5, '202309261233266512b376a421d', 'Micheal Esu', 'Computer engineering department, university of uyo, uyo.', '07182747753'),
(6, '20230927144130651422faa251b', 'Andy Paul', 'Uniuyo permsite junction, uyo', '09146463634'),
(7, '20231003122040651beaf8dbe35', 'Daniel Paul', 'Mile one close ph', '08173535564'),
(8, '20231004115819651d373b5a191', 'John Cruz', 'Oganiru street by mile 3 junction.', '09172663632'),
(9, '20231004120234651d383abc4dd', 'John Tomas', 'Rumuagholu close by evi queen junction port harcourt.', '08155536366');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `tracking_id` varchar(70) DEFAULT NULL,
  `package_id` varchar(70) DEFAULT NULL,
  `status_description` text DEFAULT NULL,
  `status_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `tracking_id`, `package_id`, `status_description`, `status_time`) VALUES
(1, '202309261222466512b0f6569bf', '20230922125420650d725c5498f', 'Approved', '2023-09-26 12:22:46'),
(2, '202309261222476512b0f776fa5', '20230922131505650d77398b823', 'Approved', '2023-09-26 12:22:47'),
(3, '202309261222486512b0f8474b5', '202309251900066511bc961768b', 'Approved', '2023-09-26 12:22:48'),
(5, '202309261222476512b0f776fa5', '20230922131505650d77398b823', 'Picked Up', '2023-09-26 12:23:16'),
(7, '202309261222476512b0f776fa5', '20230922131505650d77398b823', 'On the way', '2023-09-26 12:23:39'),
(8, '202309261222476512b0f776fa5', '20230922131505650d77398b823', 'Delivered', '2023-09-26 12:23:40'),
(10, '202309261222466512b0f6569bf', '20230922125420650d725c5498f', 'Delivered', '2023-09-26 12:23:49'),
(12, '202309261222486512b0f8474b5', '202309251900066511bc961768b', 'Delivered', '2023-09-26 12:23:59'),
(13, '202309261233266512b376a9071', '202309261233266512b376a6248', 'Pending', '2023-09-26 12:33:26'),
(14, '202309261237086512b45455748', '202309261233266512b376a6248', 'Approved', '2023-09-26 12:37:08'),
(15, '202309261237086512b45455748', '202309261233266512b376a6248', 'Picked Up', '2023-09-26 12:37:42'),
(16, '202309261237086512b45455748', '202309261233266512b376a6248', 'On the way', '2023-09-26 12:37:50'),
(17, '202309261237086512b45455748', '202309261233266512b376a6248', 'Delivered', '2023-09-26 12:37:59'),
(19, '20230927144130651422faaab57', '20230927144130651422faa5ef2', 'Pending', '2023-09-27 14:41:30'),
(20, '20230927144736651424688c7e3', '20230927144130651422faa5ef2', 'Approved', '2023-09-27 14:47:36'),
(21, '20230927144736651424688c7e3', '20230927144130651422faa5ef2', 'Picked Up', '2023-09-27 14:50:57'),
(22, '20230927144736651424688c7e3', '20230927144130651422faa5ef2', 'On the way', '2023-09-27 14:51:01'),
(23, '20230927144736651424688c7e3', '20230927144130651422faa5ef2', 'Delivered', '2023-09-27 14:53:49'),
(24, '202309261222486512b0f8474b5', '202309251900066511bc961768b', 'Picked Up', '2023-09-29 13:54:14'),
(25, '202309261222486512b0f8474b5', '202309251900066511bc961768b', 'On the way', '2023-09-29 13:54:15'),
(26, '202309261222466512b0f6569bf', '20230922125420650d725c5498f', 'Picked Up', '2023-09-29 13:54:27'),
(27, '202309261222466512b0f6569bf', '20230922125420650d725c5498f', 'On the way', '2023-09-29 13:54:28'),
(28, '20231003122040651beaf8e1d73', '20231003122040651beaf8de13b', 'Pending', '2023-10-03 12:20:40'),
(29, '20231003122454651bebf68934b', '20231003122040651beaf8de13b', 'Approved', '2023-10-03 12:24:54'),
(30, '20231003122454651bebf68934b', '20231003122040651beaf8de13b', 'Picked Up', '2023-10-03 12:26:40'),
(31, '20231003122454651bebf68934b', '20231003122040651beaf8de13b', 'On the way', '2023-10-03 12:26:45'),
(32, '20231003122454651bebf68934b', '20231003122040651beaf8de13b', 'Delivered', '2023-10-03 12:26:47'),
(33, '20231004115819651d373b635c5', '20231004115819651d373b5d8cb', 'Pending', '2023-10-04 11:58:19'),
(34, '20231004120234651d383ac3898', '20231004120234651d383abe4d9', 'Pending', '2023-10-04 12:02:34'),
(35, '20231004141421651d571d59520', '20231004120234651d383abe4d9', 'Approved', '2023-10-04 14:14:21'),
(36, '20231004141421651d571d59520', '20231004120234651d383abe4d9', 'Picked Up', '2023-10-04 14:14:36'),
(37, '20231004141421651d571d59520', '20231004120234651d383abe4d9', 'On the way', '2023-10-04 14:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userID` varchar(250) DEFAULT NULL,
  `fullName` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `lga` varchar(20) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userID`, `fullName`, `email`, `phone`, `password`, `state`, `lga`, `address`, `role`, `status`, `date`) VALUES
(1, 'wvGIteF*8zTdAI68K3q8zBbZZ8Z2BsNRw0B91YGINOiyC*ZejYXdgcMJYAeZ', 'Okoro James', 'okorojames@gmail.com', '07055553109', '8cb2237d0679ca88db6464eac60da96345513964', 'Abia', 'Aba North', '30 oro aka street rumuagholu ph', 'admin', NULL, '2023-09-20 15:58:05'),
(2, 'L6GZPWrDtEOKPaMQKkAszvBRsBFUtNChLznfCuFnG9cCXgOJgNDgS8owhpET', 'Richman Loveday', 'lovedayrichman@yahoo.com', '08165188232', '8cb2237d0679ca88db6464eac60da96345513964', 'Abia', 'Aba North', 'Okoro street by mile 4 junction ph.', 'customer', NULL, '2023-09-20 16:01:40'),
(3, 'p53BHNnqOUrARwDDjcQjrFTnJKXxmx1fN00HMyR8q8CABxWWUrmQCXScrzPs', 'Akpan Joy', 'akpanjoy@gmail.com', '08165435356', '8cb2237d0679ca88db6464eac60da96345513964', 'Abia', 'Aba North', '30 nkpolu close by main junction', 'admin', NULL, '2023-09-20 16:09:25'),
(4, 'ABKlBKRFoBJg0zmvwvtnENzSgPdXDaaphGTpwvkCvM3GqEtj6zbkPff6E1RB', 'James', 'james@gmail.com', '08162655533', '8cb2237d0679ca88db6464eac60da96345513964', 'Abia', 'Aba North', NULL, 'driver', 1, '2023-09-20 16:23:26'),
(5, 'YCkSGDbfbcIs3wOeOCIloT4gtS3w9cLhiPj619BMgXuRuPQIl8e7aSkYPvAY', 'Andy Jonathan', 'andyjonathan@gmail.com', '0815442387', '8cb2237d0679ca88db6464eac60da96345513964', 'Abia', 'Aba North', 'No 54 Asukwo Ibanga street uyo, akwa ibom', 'customer', NULL, '2023-09-22 12:44:31'),
(6, 'nlS4H8KXSBCWcvs1b8GyNErFwzsNuzj6VzUPgi1kfoaKCCPdb2CA3socOFcb', 'Marvelous Johnson', 'mave@gmail.com', '07053562264', '8cb2237d0679ca88db6464eac60da96345513964', 'Abia', 'Aba North', 'No 82 close by filling station junction rumuokoro, ph', 'customer', NULL, '2023-09-22 12:47:16'),
(7, 'JOK6fMW2Yr2DQrROZoG*JOVfIsunmtqWsZ7YcuVJH0CQEymglQlWXjal3r89', 'Chinedu Nwanougha', 'chinedu@gmail.com', '08162553745', '8cb2237d0679ca88db6464eac60da96345513964', 'Abia', 'Aba North', NULL, 'driver', 0, '2023-09-25 11:48:26'),
(8, 'jEt*n2rv1o8TDODqeVh94gDmX6VfOhPD4O7BYEdVxhyPGkWEEGBMRNDD2hxI', 'dffgg eeerr', 'richman@yahoo.com', '12345678', '8cb2237d0679ca88db6464eac60da96345513964', 'Abia', 'Aba North', 'address house', 'admin', NULL, '2023-09-27 14:30:59'),
(9, 'UX25MxhGTVrf9sgjv1jMIXG2QZ6a63ebpQnXBKpatd22yiDljPiXa1BEVpn9', 'Okon Chukwu', 'okonchukwu@yahoo.com', '08165188234', '8cb2237d0679ca88db6464eac60da96345513964', 'Abia', 'Aba North', NULL, 'driver', 0, '2023-09-27 14:37:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
