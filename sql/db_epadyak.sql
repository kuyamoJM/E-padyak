-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 08:58 PM
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
(3, 'Nokian', 0),
(4, 'Centurion', 0),
(5, 'Flameer', 0),
(6, 'ZTTO', 0);

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
(2, 'Front Sprocket', 0),
(3, 'Rear Sprockets', 1),
(4, 'Handle Bars', 0),
(5, 'Handle Bar Grip', 0);

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
(1, 'About us', 'About us sdolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae suscipit tellus mauris a diam maecenas. Adipiscing at in tellus integer feugiat. \r\n\r\nLorem dolor sed viverra ipsum nunc. Ultrices sagittis orci a scelerisque purus semper eget duis. Tempus urna et pharetra pharetra massa. Non enim praesent elementum facilisis leo vel fringilla est ullamcorper. Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida neque. Ut venenatis tellus in metus vulputate eu scelerisque. Molestie nunc non blandit massa. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam. Viverra nibh cras pulvinar mattis nunc sed blandit libero volutpat. Quis imperdiet massa tincidunt nunc pulvinar sapien et. Purus faucibus ornare suspendisse sed nisi. \r\n\r\nMagna fringilla urna porttitor rhoncus dolor purus non. Id porta nibh venenatis cras sed felis eget velit. Nascetur ridiculus mus mauris vitae ultricies leo integer. Orci nulla pellentesque dignissim enim. Integer vitae justo eget magna fermentum iaculis eu. Nunc id cursus metus aliquam eleifend mi in. Risus sed vulputate odio ut enim blandit volutpat maecenas volutpat. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim. Maecenas accumsan lacus vel facilisis volutpat est velit egestas dui. Maecenas pharetra convallis posuere morbi leo urna. Turpis in eu mi bibendum neque egestas congue quisque. Eu turpis egestas pretium aenean pharetra magna ac. Nibh nisl condimentum id venenatis a condimentum vitae sapien. Ultrices dui sapien eget mi proin sed libero enim sed. Congue mauris rhoncus aenean vel elit scelerisque mauris pellentesque.'),
(2, 'Terms of Use', 'Terms Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 'Privacy Policy', 'Privacy Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'Email', 'epadyak@gmail.com'),
(5, 'Contact', '09087654321; 332-11-29');

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
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `brand_id`, `category_id`, `store_id`, `product_name`, `description`, `price`, `stocks`, `photo`, `is_deleted`) VALUES
(1, 1, 2, 1, 'DEORE XT Chainring 12-speed', 'SHIMANO BIKE-EU', '1500.00', 0, '75269800 1669981225.jpg', 0),
(2, 1, 3, 1, 'CS-HG50', '8 Speed Rear Cassette 12-25T/11-32T Road Bike Gear Sprocket Silvers', '1300.00', 4, '94575300 1670156922.jpg', 0),
(3, 5, 4, 1, 'Retro Bike Handlebar', 'Aluminum Alloy Bent Bar Bicycle Handlebar 31.8x640mm', '650.00', 0, '36185800 1670156887.jpg', 0),
(4, 6, 5, 1, 'Ultraight Bike Grip', 'MTB Grip Handle Bike Handle Grip Anti-Skid Shock-Absorbing Soft Bicycle Cycling Handlebar', '72.00', 0, '48433400 1670006973.jpg', 0),
(5, 1, 5, 2, 'delete this', 'for test delete', '100.00', 0, '32404000 1670179197.jpg', 1);

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
(1, 2, 5, 0, 0, '2022-12-04 19:11:04', '5'),
(2, 2, 4, 0, 4, '2022-12-04 19:11:41', '4');

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
  `dti_number` varchar(50) NOT NULL,
  `registration_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_store`
--

INSERT INTO `tbl_store` (`store_id`, `store_name`, `barangay_id`, `location`, `description`, `terms_and_conditions`, `photo`, `dti_number`, `registration_date`) VALUES
(1, 'Surg Cycle', 40, 'Purok II', 'Nagatinda po kami ng pyesa ng bike', 'Test the test', '19316700 1670058932.jpg', '234234234324', '2022-11-13'),
(2, 'Bike-a-holic', 40, 'Gov. D. Reyes St.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 'The quick brown fox jumps over the lazy dog.', '43807600 1670059428.jpg', '2343432432424', '2022-12-03'),
(3, 'Mile\'s Bike', 50, '#53 Highway', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.', 'The quick brown fox jumps over the head  of the lazy dog near the river.', '04761200 1670059457.jpg', '213232312312', '2022-12-03');

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
(4, 3, 4, '2023-12-03', 'Active');

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
  `is_deleted` int(11) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `email`, `fname`, `mname`, `lname`, `gender`, `contact`, `birthday`, `barangay_id`, `location`, `user_access`, `store_id`, `photo`, `sq_id`, `answer`, `is_approved`, `is_active`, `is_deleted`, `remarks`) VALUES
(1, 'admin', 'admin', 'adminepdyak@gmail.com', 'Aniel', 'dela Cruz', 'Lacerna', 'Female', '09123456789', '1999-01-01', 1, '#32 Noviembre St. ', 'Admin', 0, 'profile.png', 3, '1', 1, 1, 0, ''),
(3, 'romel101', '111111', 'romelmacdon@gmail.com', 'Romel', 'Mataac', 'Macdon', 'Male', '09123456789', '1992-11-29', 6, '11 Purok 4', 'Customer', 0, 'profile.png', 9, 'answer', 1, 1, 0, ''),
(4, 'gloria201', 'qqqqqq', 'gloria201@gmail.com', 'Gloria', 'Macapagal', 'Arroyo', 'Female', '09304275158', '1950-09-20', 63, '32 St.', 'Merchant', 1, '234823904.jpg', 3, 'answer', 1, 1, 0, ''),
(5, 'ramon101', '111111', 'ramonmagsaysay@gmail.com', 'Ramon', 'Madrigal', 'Magsaysay', 'Male', '09087654321', '1990-05-02', 5, 'Purok III', 'Merchant', 2, 'profile.png', 3, 'answer', 1, 1, 0, ''),
(6, 'aubrey', '111111', 'aubreymiles@gmail.com', 'Aubrey', 'Ocampo', 'Miles', 'Male', '09123456789', '1980-11-29', 50, 'Purok I', 'Merchant', 3, 'profile.png', 7, 'answer', 1, 1, 0, '');

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
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_running_inventory`
--
ALTER TABLE `tbl_running_inventory`
  MODIFY `running_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_security_question`
--
ALTER TABLE `tbl_security_question`
  MODIFY `sq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_store_subscription`
--
ALTER TABLE `tbl_store_subscription`
  MODIFY `store_subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
