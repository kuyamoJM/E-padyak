-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 09:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_epadyak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barangay`
--

CREATE TABLE `tbl_barangay` (
  `barangay_id` int(11) NOT NULL,
  `town_id` int(11) NOT NULL,
  `barangay` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_barangay`
--

INSERT INTO `tbl_barangay` (`barangay_id`, `town_id`, `barangay`) VALUES
(1, 1, 'Agumaymayan'),
(2, 1, 'Amoingon'),
(3, 1, 'Apitong'),
(4, 1, 'Balagasan'),
(5, 1, 'Balaring'),
(6, 1, 'Balimbing'),
(7, 1, 'Balogo'),
(8, 1, 'Bamban'),
(9, 1, 'Bangbangalon'),
(10, 1, 'Bantad'),
(11, 1, 'Bantay'),
(12, 1, 'Bayuti'),
(13, 1, 'Binunga'),
(14, 1, 'Boi'),
(15, 1, 'Boton'),
(16, 1, 'Buliasnin'),
(17, 1, 'Bunganay'),
(18, 1, 'Caganhao'),
(19, 1, 'Canat'),
(20, 1, 'Catubugan'),
(21, 1, 'Cawit'),
(22, 1, 'Daig'),
(23, 1, 'Daypay'),
(24, 1, 'Duyay'),
(25, 1, 'Hinapulan'),
(26, 1, 'Ihatub'),
(27, 1, 'Isok I'),
(28, 1, 'Isok II'),
(29, 1, 'Laylay'),
(30, 1, 'Lupac'),
(31, 1, 'Mahinhin'),
(32, 1, 'Mainit'),
(33, 1, 'Malbog'),
(34, 1, 'Maligaya'),
(35, 1, 'Malusak (Poblacion)'),
(36, 1, 'Mansiwat'),
(37, 1, 'Mataas na Bayan (Poblacion)'),
(38, 1, 'Maybo'),
(39, 1, 'Mercado (Poblacion)'),
(40, 1, 'Murallon (Poblacion)'),
(41, 1, 'Ogbac'),
(42, 1, 'Pawa'),
(43, 1, 'Pili'),
(44, 1, 'Poctoy'),
(45, 1, 'Poras'),
(46, 1, 'Puting Buhangin'),
(47, 1, 'Puyog'),
(48, 1, 'Sabong'),
(49, 1, 'San Miguel (Poblacion)'),
(50, 1, 'Santol'),
(51, 1, 'Sawi'),
(52, 1, 'Tabi'),
(53, 1, 'Tabigue'),
(54, 1, 'Tagwak'),
(55, 1, 'Tambunan'),
(56, 1, 'Tampus (Poblacion)'),
(57, 1, 'Tanza'),
(58, 1, 'Tugos'),
(59, 1, 'Tumagabok'),
(60, 1, 'Tumapon'),
(61, 4, 'Bagacay'),
(62, 4, 'Bagtingon'),
(63, 4, 'Barangay I (Poblacion)'),
(64, 4, 'Barangay II (Poblacion)'),
(65, 4, 'Barangay III (Poblacion)'),
(66, 4, 'Barangay IV (Poblacion)'),
(67, 4, 'Bicas-bicas'),
(68, 4, 'Caigangan'),
(69, 4, 'Daykitin'),
(70, 4, 'Libas'),
(71, 4, 'Malbog'),
(72, 4, 'Sihi'),
(73, 4, 'Timbo (Sanggulong)'),
(74, 4, 'Tungib-Lipata'),
(75, 4, 'Yook'),
(76, 3, 'Antipolo'),
(77, 3, 'Bachao Ibaba '),
(78, 3, 'Bachao Ilaya'),
(79, 3, 'Bacongbacong'),
(80, 3, 'Bahi'),
(81, 3, 'Bangbang'),
(82, 3, 'Banot'),
(83, 3, 'Banuyo'),
(84, 3, 'Barangay I (Poblacion)'),
(85, 3, 'Barangay II (Poblacion)'),
(86, 3, 'Barangay III (Poblacion)'),
(87, 3, 'Bognuyan'),
(88, 3, 'Cabugao'),
(89, 3, 'Dawis'),
(90, 3, 'Dili'),
(91, 3, 'Libtangin'),
(92, 3, 'Mahunig'),
(93, 3, 'Mangiliol'),
(94, 3, 'Masiga'),
(95, 3, 'Matandang Gasan'),
(96, 3, 'Pangi'),
(97, 3, 'Pingan'),
(98, 3, 'Tabionan'),
(99, 3, 'Tapuyan'),
(100, 3, 'Tiguion'),
(101, 2, 'Anapog-Sibucao'),
(102, 2, 'Argao'),
(103, 2, 'Balanacan'),
(104, 2, 'Banto'),
(105, 2, 'Bintakay'),
(106, 2, 'Bocboc'),
(107, 2, 'Butansapa'),
(108, 2, 'Candahon'),
(109, 2, 'Capayang'),
(110, 2, 'Danao'),
(111, 2, 'Dulong Bayan (Poblacion)'),
(112, 2, 'Gitnang Bayan (Poblacion)'),
(113, 2, 'Guisian'),
(114, 2, 'Hindaharan'),
(115, 2, 'Hinanggayon'),
(116, 2, 'Ino'),
(117, 2, 'Janagdong'),
(118, 2, 'Lamesa'),
(119, 2, 'Laon'),
(120, 2, 'Magapua'),
(121, 2, 'Malayak'),
(122, 2, 'Malusak'),
(123, 2, 'Mampaitan'),
(124, 2, 'Mangyan-Mababad'),
(125, 2, 'Market Site (Poblacion)'),
(126, 2, 'Mataas na Bayan '),
(127, 2, ' Mendez'),
(128, 2, 'Nangka I'),
(129, 2, ' Nangka II'),
(130, 2, 'Paye'),
(131, 2, 'Pili'),
(132, 2, 'Puting Buhangin'),
(133, 2, 'Sayao'),
(134, 2, 'Silangan'),
(135, 2, 'Sumangga'),
(136, 2, 'Tarug'),
(137, 2, 'Villa Mendez (Poblacion)'),
(138, 6, 'Alobo'),
(139, 6, 'Angas'),
(140, 6, 'Aturan'),
(141, 6, 'Bagong Silang Poblacion (2nd Zone)'),
(142, 6, 'Baguidbirin'),
(143, 6, 'Baliis'),
(144, 6, 'Balogo'),
(145, 6, 'Banahaw Poblacion (3rd Zone)'),
(146, 6, 'Bangcuangan'),
(147, 6, 'Banogbog'),
(148, 6, 'Biga'),
(149, 6, 'Botilao'),
(150, 6, 'Buyabod'),
(151, 6, 'Dating Bayan '),
(152, 6, 'Devilla'),
(153, 6, 'Dolores'),
(154, 6, 'Haguimit'),
(155, 6, 'Hupi'),
(156, 6, 'Ipil'),
(157, 6, 'Jolo'),
(158, 6, 'Kaganhao'),
(159, 6, 'Kalangkang'),
(160, 6, 'Kamandugan'),
(161, 6, 'Kasily'),
(162, 6, 'Kilo-kilo'),
(163, 6, 'Kinaman'),
(164, 6, 'Labo'),
(165, 6, 'Lamesa'),
(166, 6, 'Landy'),
(167, 6, 'Lapu-lapu Poblacion (5th Zone)'),
(168, 6, 'Libjo'),
(169, 6, 'Lipa'),
(170, 6, 'Lusok'),
(171, 6, 'Maharlika Poblacion (1st Zone)'),
(172, 6, 'Makulapnit'),
(173, 6, 'Maniwaya'),
(174, 6, 'Manlibunan'),
(175, 6, 'Masaguisi'),
(176, 6, 'Masalukot'),
(177, 6, 'Matalaba'),
(178, 6, 'Mongpong'),
(179, 6, 'Morales'),
(180, 6, 'Napo'),
(181, 6, 'Pag-asa Poblaion (4th Zone)'),
(182, 6, 'Pantayin'),
(183, 6, 'Polo'),
(184, 6, 'Pulong-Parang'),
(185, 6, 'Punong'),
(186, 6, 'San Antonio'),
(187, 6, 'San Isidro'),
(188, 6, 'Tagum'),
(189, 6, 'Tamayo'),
(190, 6, 'Tambangan'),
(191, 6, 'Tawiran'),
(192, 6, 'Taytay'),
(193, 5, 'Bangwayin'),
(194, 5, 'Bayakbakin'),
(195, 5, 'Bolo'),
(196, 5, 'Bondiw'),
(197, 5, 'Buangan'),
(198, 5, 'Cabuyo'),
(199, 5, 'Cagpo'),
(200, 5, 'Dampulan'),
(201, 5, 'Kay Duke'),
(202, 5, 'Mabuhay'),
(203, 5, 'Makawayan'),
(204, 5, 'Malibago'),
(205, 5, 'Malinao'),
(206, 5, 'Maranlig'),
(207, 5, 'Marlangga'),
(208, 5, 'Matuyatuya'),
(209, 5, 'Nangka'),
(210, 5, 'Pakaskasan'),
(211, 5, 'Payanas'),
(212, 5, 'Poblacion'),
(213, 5, 'Poctoy'),
(214, 5, 'Sibuyao'),
(215, 5, 'Suha'),
(216, 5, 'Talawan'),
(217, 5, 'Tigwi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand`, `is_deleted`) VALUES
(1, 'Shimano', 0),
(3, 'Trail Bike', 0),
(4, 'Centurion', 1),
(5, 'Flameer', 1),
(6, 'Treck Bike', 0),
(7, 'Mountain Bike', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `price`, `amount`) VALUES
(30, 5, 0, 2, '0.00', '0.00'),
(31, 5, 0, 2, '0.00', '0.00'),
(32, 5, 0, 1, '0.00', '0.00'),
(33, 5, 0, 1, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category`, `is_deleted`) VALUES
(1, 'Accesories', 0),
(2, 'Sprocket', 0),
(3, 'Rear Sprockets', 1),
(4, 'Handle Bars', 0),
(5, 'Clothing', 0),
(6, 'Bikes', 0),
(7, 'Brake Lever', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE `tbl_content` (
  `content_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`content_id`, `title`, `content`) VALUES
(1, 'About us', 'Owner of an online shopping website that offers customers in the province a simple, safe, and quick online purchasing experience. The company\'s online store allows customers to quickly purchase the products of their choosing from home with a variety of payment choices. The store offers products across a range of categories, including handle bars, clothes, bikes, and accessories.'),
(2, 'Terms of Use', 'Your use of the e-padyak service and website is subject to these Terms & Conditions. You agree to the terms of these Terms & Conditions by accessing the e-padyak Bike Store website. You must frequently review the Terms and Conditions before placing orders as we have the right to make changes at any moment. You still have all of your legal rights despite this.'),
(3, 'Privacy Policy', 'This page explains our practices for collecting, using, and disclosing your personal information when you use our services. We won\'t use or disclose your information in any way other than what is disclosed in this privacy statement. We use your personal information to deliver and improve our services. You consent to the collection and use of information in line with this policy by using the Service. Terms used above, unless otherwise defined, have the same meanings as those found in our Terms & Conditions.'),
(4, 'Email', 'epadyak@gmail.com'),
(5, 'Contact', '09087654321; 332-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_charge`
--

CREATE TABLE `tbl_delivery_charge` (
  `delivery_charge_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `town_id` int(11) NOT NULL,
  `delivery_charge` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_delivery_charge`
--

INSERT INTO `tbl_delivery_charge` (`delivery_charge_id`, `store_id`, `town_id`, `delivery_charge`) VALUES
(2, 2, 2, '100.00'),
(3, 2, 1, '120.00'),
(4, 2, 3, '200.00'),
(5, 2, 4, '250.00'),
(6, 2, 6, '200.00'),
(7, 2, 5, '150.00'),
(8, 4, 1, '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE `tbl_email` (
  `email_id` int(11) NOT NULL,
  `emaild_address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`email_id`, `emaild_address`, `password`) VALUES
(1, 'epadyak2022@gmail.com', 'E-Padyak2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mode_of_payment`
--

CREATE TABLE `tbl_mode_of_payment` (
  `mode_of_payment_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `details` varchar(50) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mode_of_payment`
--

INSERT INTO `tbl_mode_of_payment` (`mode_of_payment_id`, `store_id`, `mode_of_payment`, `details`, `is_deleted`) VALUES
(1, 2, 'Gcash', '09123456789', 0),
(2, 2, 'Smart Padala', '3344-4423-3424-3432; 2443-5534-5334-5553', 0),
(3, 2, 'Test Delete', 'Delete This', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_ordered` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `total_amount` decimal(10,2) NOT NULL,
  `mode_of_payment_id` int(11) NOT NULL,
  `order_type` varchar(20) NOT NULL,
  `delivery_charge` decimal(10,2) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `barangay_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_number`, `user_id`, `date_ordered`, `status`, `total_amount`, `mode_of_payment_id`, `order_type`, `delivery_charge`, `remarks`, `barangay_id`) VALUES
(1, 'ORD-00000001-0002', 8, '2022-12-10', 'Completed', '10000.00', 1, 'For Pick-up', '0.00', 'Near Landbank', 1),
(2, 'ORD-00000002-0002', 8, '2022-12-13', 'Pending', '11400.00', 1, 'For Delivery', '200.00', 'dasd', 94),
(3, 'ORD-00000003-0004', 8, '2022-12-13', 'Completed', '24030.00', 0, 'For Delivery', '50.00', 'Look For Jenny', 16),
(4, 'ORD-00000004-0002', 3, '2022-12-14', 'Completed', '9100.00', 0, 'For Delivery', '100.00', 'Near Gasoline Station. Look for Mr. Dy.', 119),
(5, 'ORD-00000005-0001', 8, '2023-01-04', 'Pending', '5600.00', 0, 'For Pick-up', '0.00', 'Test', 0),
(6, 'ORD-00000006-0001', 8, '2023-01-04', 'Pending', '5600.00', 0, 'For Pick-up', '0.00', 'Test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `order_id`, `reference_number`, `details`, `status`) VALUES
(1, 1, '34242423432', 'Please confirm asap', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stocks` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `img_3d` text NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `brand_id`, `category_id`, `store_id`, `product_name`, `description`, `price`, `stocks`, `photo`, `img_3d`, `is_deleted`) VALUES
(1, 1, 2, 1, 'DEORE XT Chainring 12-speed', 'SHIMANO BIKE-EU', '1500.00', 20, '75269800 1669981225.jpg', '', 0),
(2, 1, 3, 1, 'CS-HG50', '8 Speed Rear Cassette 12-25T/11-32T Road Bike Gear Sprocket Silvers', '1300.00', 50, '94575300 1670156922.jpg', '', 0),
(3, 5, 4, 1, 'Retro Bike Handlebar', 'Aluminum Alloy Bent Bar Bicycle Handlebar 31.8x640mm', '650.00', 20, '36185800 1670156887.jpg', '', 0),
(4, 6, 5, 1, 'Ultraight Bike Grip', 'MTB Grip Handle Bike Handle Grip Anti-Skid Shock-Absorbing Soft Bicycle Cycling Handlebar', '72.00', 32, '48433400 1670006973.jpg', '', 0),
(5, 1, 5, 2, 'delete this', 'for test delete', '100.00', 0, '32404000 1670179197.jpg', '', 1),
(6, 7, 4, 4, 'F100', 'Handle Bar for Road Bike', '800.00', 50, '57244900 1670438325.jpg', '', 0),
(7, 5, 6, 4, 'Q-E4-MB-555', 'Red Mountain Bike', '11990.00', 0, '08043100 1670440230.jpg', '<div class=\"sketchfab-embed-wrapper\"> <iframe title=\"Mountain Bike\" frameborder=\"0\" allowfullscreen mozallowfullscreen=\"true\" webkitallowfullscreen=\"true\" allow=\"autoplay; fullscreen; xr-spatial-tracking\" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share width=\"640\" height=\"480\" src=\"https://sketchfab.com/models/e647e652b7a143728071cd4178e3d3c2/embed\"> </iframe> <p style=\"font-size: 13px; font-weight: normal; margin: 5px; color: #4A4A4A;\"> <a href=\"https://sketchfab.com/3d-models/mountain-bike-e647e652b7a143728071cd4178e3d3c2?utm_medium=embed&utm_campaign=share-popup&utm_content=e647e652b7a143728071cd4178e3d3c2\" target=\"_blank\" style=\"font-weight: bold; color: #1CAAD9;\"> Mountain Bike </a> by <a href=\"https://sketchfab.com/BT73?utm_medium=embed&utm_campaign=share-popup&utm_content=e647e652b7a143728071cd4178e3d3c2\" target=\"_blank\" style=\"font-weight: bold; color: #1CAAD9;\"> BT73 </a> on <a href=\"https://sketchfab.com?utm_medium=embed&utm_campaign=share-popup&utm_content=e647e652b7a143728071cd4178e3d3c2\" target=\"_blank\" style=\"font-weight: bold; color: #1CAAD9;\">Sketchfab</a></p></div>', 0),
(8, 6, 6, 2, 'Road Bike', 'Road Bike', '5000.00', 3, '93408600 1670525759.jpg', '', 0),
(9, 6, 6, 2, 'Road Bike 2', 'Road BIke', '5000.00', 1, '80741100 1670525722.jpg', '', 0),
(10, 6, 6, 2, 'Road Bike 3', 'Road Bike ', '5000.00', 0, '19865000 1670525242.jpg', '', 0),
(11, 6, 6, 2, 'Road Bike 4', 'Road Bike ', '5000.00', 0, '45129200 1670526060.jpg', '', 0),
(12, 6, 6, 2, 'Road Bike 5', 'Road Bike ', '5000.00', 0, '12173400 1670526200.jpg', '', 0),
(13, 3, 6, 2, 'Trail Bike ', 'Trail Bike ', '3500.00', 0, '68584300 1670526341.jpg', '', 0),
(14, 3, 6, 2, 'Trail Bike 2', 'Trail Bike', '3500.00', 0, '09529200 1670526295.jpg', '', 0),
(15, 3, 6, 2, 'Trail Bike 3', 'Trail Bike', '3500.00', 0, '46941500 1670525411.jpg', '', 0),
(16, 3, 6, 2, 'Trail Bike 4', 'Trail Bike ', '3500.00', 0, '37165900 1670526242.jpg', '', 0),
(17, 7, 6, 2, 'Mountain Bike ', 'Mountain Bike', '4000.00', 21, '69656300 1670525854.jpg', '', 0),
(18, 7, 6, 2, 'Mountain Bike 2', 'Mountain Bike', '4000.00', 0, '35402100 1670525618.jpg', '', 0),
(19, 1, 7, 2, 'Shimano', 'Brake Lever', '700.00', 0, '24035900 1670525055.jpg', '', 0),
(20, 1, 7, 2, 'Brake lever 2', 'Brake Lever', '600.00', 50, '37061800 1670479401.jpg', '', 0),
(21, 5, 7, 2, 'Brake Lever 3', 'Brake Lever', '600.00', 25, '61668600 1670525450.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_order`
--

CREATE TABLE `tbl_product_order` (
  `product_order_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_order`
--

INSERT INTO `tbl_product_order` (`product_order_id`, `order_id`, `product_id`, `quantity`, `price`, `amount`) VALUES
(1, 1, 9, 1, '5000.00', '5000.00'),
(3, 1, 8, 1, '5000.00', '5000.00'),
(11, 2, 21, 2, '600.00', '1200.00'),
(12, 2, 8, 2, '5000.00', '10000.00'),
(13, 3, 7, 2, '11990.00', '23980.00'),
(14, 4, 8, 1, '5000.00', '5000.00'),
(15, 4, 17, 1, '4000.00', '4000.00'),
(16, 5, 2, 2, '1300.00', '2600.00'),
(17, 5, 1, 2, '1500.00', '3000.00'),
(20, 6, 1, 2, '1500.00', '3000.00'),
(21, 6, 2, 2, '1300.00', '2600.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratings`
--

CREATE TABLE `tbl_ratings` (
  `ratings_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ratings`
--

INSERT INTO `tbl_ratings` (`ratings_id`, `product_id`, `user_id`, `ratings`, `review`) VALUES
(1, 8, 8, 3, 'The quick brown fox jumps over the head of the lazy dog near the river.'),
(2, 8, 3, 4, 'Good Quality. Slight Scratches.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replaced_item`
--

CREATE TABLE `tbl_replaced_item` (
  `replace_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_returned` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_replaced_item`
--

INSERT INTO `tbl_replaced_item` (`replace_id`, `order_id`, `product_id`, `store_id`, `quantity`, `date_returned`, `reason`) VALUES
(1, 4, 17, 2, 1, '2023-01-09 20:01:13', 'Pinalitan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_returned_item`
--

CREATE TABLE `tbl_returned_item` (
  `return_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_returned` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_returned_item`
--

INSERT INTO `tbl_returned_item` (`return_id`, `order_id`, `product_id`, `store_id`, `quantity`, `date_returned`, `reason`) VALUES
(1, 4, 17, 2, 1, '2023-01-09 02:40:52', 'ayaw ko na'),
(2, 4, 8, 2, 1, '2023-01-09 02:43:09', 'Test'),
(3, 1, 20, 2, 1, '2023-01-09 02:45:55', 'test'),
(4, 1, 9, 2, 1, '2023-01-09 02:50:59', 'aAA'),
(5, 1, 20, 2, 1, '2023-01-09 02:51:15', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_running_inventory`
--

CREATE TABLE `tbl_running_inventory` (
  `running_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_in` int(11) NOT NULL,
  `product_out` int(11) NOT NULL,
  `stocks` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_running_inventory`
--

INSERT INTO `tbl_running_inventory` (`running_id`, `product_id`, `product_in`, `product_out`, `stocks`, `date`, `remarks`) VALUES
(1, 6, 50, 0, 50, '2022-12-07 18:49:56', 'Dumating'),
(2, 7, 2, 0, 2, '2022-12-07 19:16:50', 'Limited Stock'),
(3, 8, 5, 0, 5, '2022-12-08 04:06:09', 'aniel'),
(4, 9, 2, 0, 2, '2022-12-08 19:06:11', 'From Supplier'),
(5, 20, 50, 0, 50, '2022-12-08 19:06:34', 'Received from supplier'),
(6, 21, 25, 0, 25, '2022-12-08 19:11:06', 'Received from supplier'),
(7, 3, 20, 0, 20, '2022-12-08 19:52:52', 'Received from supplier'),
(8, 17, 22, 0, 22, '2022-12-08 21:09:48', 'Received froms Supplier'),
(9, 2, 50, 0, 50, '2022-12-08 21:55:07', 'Remarks'),
(10, 1, 20, 0, 20, '2022-12-08 21:55:13', 'Remarks'),
(11, 4, 32, 0, 32, '2022-12-08 21:55:20', 'Remarks'),
(15, 9, 0, 2, 0, '2022-12-12 02:35:51', 'Sold to: Malimata, Marcelo Miciano<br /> with Order #: 00000001-0002'),
(16, 20, 0, 2, 48, '2022-12-12 02:35:51', 'Sold to: Malimata, Marcelo Miciano<br /> with Order #: 00000001-0002'),
(17, 8, 0, 1, 4, '2022-12-12 02:35:51', 'Sold to: Malimata, Marcelo Miciano<br /> with Order #: 00000001-0002'),
(18, 7, 0, 2, 0, '2022-12-13 17:44:07', 'Sold to: Malimata, Marcelo Miciano<br /> with Order #: 00000003-0004'),
(19, 8, 0, 2, 2, '2022-12-13 20:42:17', 'Sold to: Macdon, Romel Mataac<br /> with Order #: 00000004-0002'),
(20, 17, 0, 2, 20, '2022-12-13 20:42:17', 'Sold to: Macdon, Romel Mataac<br /> with Order #: 00000004-0002'),
(24, 17, 1, 0, 21, '2023-01-09 02:40:52', 'Returned from order #: ORD-00000004-0002<br />Reason: ayaw ko na'),
(25, 8, 1, 0, 3, '2023-01-09 02:43:09', 'Returned from order #: ORD-00000004-0002<br />Reason: Test'),
(26, 20, 1, 0, 49, '2023-01-09 02:45:55', 'Returned from order #: ORD-00000001-0002<br />Reason: test'),
(27, 9, 1, 0, 1, '2023-01-09 02:50:59', 'Returned from order #: ORD-00000001-0002<br />Reason: aAA'),
(28, 20, 1, 0, 50, '2023-01-09 02:51:15', 'Returned from order #: ORD-00000001-0002<br />Reason: Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_security_question`
--

CREATE TABLE `tbl_security_question` (
  `sq_id` int(11) NOT NULL,
  `security_question` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_security_question`
--

INSERT INTO `tbl_security_question` (`sq_id`, `security_question`, `is_deleted`) VALUES
(3, 'Where did you spent your summer vacation?', 0),
(4, 'Who is your childhood crush?', 0),
(6, 'What is the name of your favorite pet?', 0),
(7, 'Where did you spent your Christmas vacation?', 0),
(8, 'What is the capital of the Philippines?', 0),
(9, 'What is the name of your grade 1 teacher?', 0),
(10, 'What is the last name of your favorite Grade School Teacher?', 0),
(11, 'What is the last name of your crush', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store`
--

CREATE TABLE `tbl_store` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `terms_and_conditions` text NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'no-image.jpg',
  `document_proof` varchar(50) NOT NULL,
  `dti_number` varchar(50) NOT NULL,
  `registration_date` date NOT NULL DEFAULT current_timestamp(),
  `accept_delivery` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_store`
--

INSERT INTO `tbl_store` (`store_id`, `store_name`, `barangay_id`, `location`, `description`, `terms_and_conditions`, `photo`, `document_proof`, `dti_number`, `registration_date`, `accept_delivery`) VALUES
(1, 'Surg Cycle', 40, 'Purok II', 'Nagatinda po kami ng pyesa ng bike', 'Test the test', '19316700 1670058932.jpg', '', '234234234324', '2022-11-13', 0),
(2, 'Bike-a-holic', 40, 'Gov. D. Reyes St.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 'The quick brown fox jumps over the lazy dog.', '43807600 1670059428.jpg', '', '2343432432424', '2022-12-03', 1),
(3, 'Mile\'s Bike', 50, '#53 Highway', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 'The quick brown fox jumps over the head  of the lazy dog near the river.', '04761200 1670059457.jpg', '', '213232312312', '2022-12-03', 0),
(4, 'Bike Zone Sporting Goods Shop', 35, 'CRWR+87Q, Quezon St,', 'Different Bikes and accessories available', 'Test Terms and conditions', 'no-image.jpg', '70905500 1670433210.jpg', '3242342341', '2022-12-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store_subscription`
--

CREATE TABLE `tbl_store_subscription` (
  `store_subscription_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `expiration_date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_store_subscription`
--

INSERT INTO `tbl_store_subscription` (`store_subscription_id`, `store_id`, `subscription_id`, `expiration_date`, `status`) VALUES
(1, 1, 4, '2023-11-13', 'Active'),
(3, 2, 3, '2023-03-03', 'Active'),
(4, 3, 4, '2023-12-03', 'Active'),
(5, 4, 4, '2023-12-08', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE `tbl_subscription` (
  `subscription_id` int(11) NOT NULL,
  `subscription` varchar(50) NOT NULL,
  `renewal` varchar(20) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`subscription_id`, `subscription`, `renewal`, `fee`, `is_deleted`) VALUES
(2, 'Plan A', 'Monthly', '200.00', 0),
(3, 'Plan B', 'Quarterly', '500.00', 0),
(4, 'Plan C', 'Annual', '1000.00', 0),
(11, 'Plan D', 'Monthly', '250.00', 1),
(12, 'Plan E', 'Quarterly', '450.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_town`
--

CREATE TABLE `tbl_town` (
  `town_id` int(11) NOT NULL,
  `town` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_town`
--

INSERT INTO `tbl_town` (`town_id`, `town`) VALUES
(1, 'Boac'),
(2, 'Mogpog'),
(3, 'Gasan'),
(4, 'Buenavista'),
(5, 'Torrijos'),
(6, 'Sta. Cruz');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `birthday` date NOT NULL DEFAULT current_timestamp(),
  `barangay_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `user_access` varchar(50) NOT NULL,
  `store_id` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'profile.png',
  `sq_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `email`, `fname`, `mname`, `lname`, `gender`, `contact`, `birthday`, `barangay_id`, `location`, `user_access`, `store_id`, `photo`, `sq_id`, `answer`, `is_approved`, `is_active`, `is_deleted`) VALUES
(1, 'admin', 'admin', 'adminepdyak@gmail.com', 'Aniel', 'dela Cruz', 'dela Cruz', 'Female', '09123456789', '1999-01-01', 1, '#32 Noviembre St. ', 'Admin', 0, '97885700 1670960075.jpg', 3, '1', 1, 1, 0),
(3, 'romel101', '111111', 'romelmacdon@gmail.com', 'Romel', 'Mataac', 'Macdon', 'Male', '09123456789', '1992-11-29', 6, '11 Purok 4', 'Customer', 0, 'profile.png', 9, 'answer', 1, 1, 0),
(4, 'gloria201', 'qqqqqq', 'gloria201@gmail.com', 'Gloria', 'Macapagal', 'Arroyo', 'Female', '09304275158', '1950-09-20', 63, '32 St.', 'Merchant', 1, '234823904.jpg', 3, 'answer', 1, 1, 0),
(5, 'ramon101', '111111', 'ramonmagsaysay@gmail.com', 'Ramon', 'Madrigal', 'Magsaysay', 'Male', '09087654321', '1990-05-02', 5, 'Purok III', 'Merchant', 2, 'profile.png', 3, 'answer', 1, 1, 0),
(6, 'aubrey', '111111', 'aubreymiles@gmail.com', 'Aubrey', 'Ocampo', 'Miles', 'Male', '09123456789', '1980-11-29', 50, 'Purok I', 'Merchant', 3, 'profile.png', 7, 'answer', 1, 1, 0),
(7, 'princess', '222222', 'princessoliveros@gmail.com', 'Princessa', 'Mayores', 'Mayores', 'Female', '09123456789', '1995-12-21', 135, 'Purok 3', 'Merchant', 4, '31400900 1670963769.png', 11, 'answer', 1, 1, 0),
(8, 'marcelo', 'akoaymaylobo', 'marcelo@gmail.com', 'Marcelo', 'Miciano', 'Malimata', 'Male', '09086734124', '1998-04-23', 47, '#23', 'Customer', 0, '05462800 1670960263.jpg', 3, 'answer', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barangay`
--
ALTER TABLE `tbl_barangay`
  ADD PRIMARY KEY (`barangay_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `tbl_delivery_charge`
--
ALTER TABLE `tbl_delivery_charge`
  ADD PRIMARY KEY (`delivery_charge_id`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `tbl_mode_of_payment`
--
ALTER TABLE `tbl_mode_of_payment`
  ADD PRIMARY KEY (`mode_of_payment_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_order`
--
ALTER TABLE `tbl_product_order`
  ADD PRIMARY KEY (`product_order_id`);

--
-- Indexes for table `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  ADD PRIMARY KEY (`ratings_id`);

--
-- Indexes for table `tbl_replaced_item`
--
ALTER TABLE `tbl_replaced_item`
  ADD PRIMARY KEY (`replace_id`);

--
-- Indexes for table `tbl_returned_item`
--
ALTER TABLE `tbl_returned_item`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `tbl_running_inventory`
--
ALTER TABLE `tbl_running_inventory`
  ADD PRIMARY KEY (`running_id`);

--
-- Indexes for table `tbl_security_question`
--
ALTER TABLE `tbl_security_question`
  ADD PRIMARY KEY (`sq_id`);

--
-- Indexes for table `tbl_store`
--
ALTER TABLE `tbl_store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `tbl_store_subscription`
--
ALTER TABLE `tbl_store_subscription`
  ADD PRIMARY KEY (`store_subscription_id`);

--
-- Indexes for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `tbl_town`
--
ALTER TABLE `tbl_town`
  ADD PRIMARY KEY (`town_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barangay`
--
ALTER TABLE `tbl_barangay`
  MODIFY `barangay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_delivery_charge`
--
ALTER TABLE `tbl_delivery_charge`
  MODIFY `delivery_charge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_mode_of_payment`
--
ALTER TABLE `tbl_mode_of_payment`
  MODIFY `mode_of_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_product_order`
--
ALTER TABLE `tbl_product_order`
  MODIFY `product_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  MODIFY `ratings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_replaced_item`
--
ALTER TABLE `tbl_replaced_item`
  MODIFY `replace_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_returned_item`
--
ALTER TABLE `tbl_returned_item`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_running_inventory`
--
ALTER TABLE `tbl_running_inventory`
  MODIFY `running_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_security_question`
--
ALTER TABLE `tbl_security_question`
  MODIFY `sq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_store_subscription`
--
ALTER TABLE `tbl_store_subscription`
  MODIFY `store_subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_town`
--
ALTER TABLE `tbl_town`
  MODIFY `town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
