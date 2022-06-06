-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 12:36 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `accountId` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `accountUserName` varchar(25) NOT NULL,
  `accountPassword` varchar(200) NOT NULL,
  `userTypeId` int(11) NOT NULL,
  `accountStatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`accountId`, `personId`, `accountUserName`, `accountPassword`, `userTypeId`, `accountStatus`) VALUES
(1, 1, 'Juan', '92eaf3719159c372f3d50337e0a14f57', 1, 1),
(2, 2, 'Cherry', '7b75d91d2856e9e74fe7cfbb857dcf2f', 1, 1),
(3, 3, 'John', '61409aa1fd47d4a5332de23cbf59a36f', 1, 1),
(4, 4, 'Reymark', '0997fce17b930336780ad66e8b3d8ac5', 4, 1),
(5, 5, 'Liezel', '0adee70625a51a037e645a643e0fa38f', 4, 1),
(6, 6, 'Samantha', 'a457529c4fc8ca95e65012a109661826', 4, 1),
(7, 0, 'Laguna', '90cd956a59da5c160ee0f2e7442e3389', 5, 1),
(8, 0, 'Sta Rosa', 'bb1900db3dd9b1c844131c02f555a05c', 5, 1),
(9, 0, 'Canlubang', '5833374ab3d6be436fe8d950f3efbee2', 5, 1),
(10, 7, 'Mark', 'b82a9a13f4651e9abcbde90cd24ce2cb', 6, 1),
(11, 8, 'James', 'd52e32f3a96a64786814ae9b5279fbe5', 6, 1),
(12, 9, 'Danilo', '62bf43e2db266caa78d4f0bd18fb5f7e', 6, 1),
(13, 10, 'Ken', 'b1a6f0b085d099ebe0b1689157357d08', 6, 1),
(14, 11, 'Paolo', '71c5da4b0d83456b94f6841561eb613b', 6, 1),
(15, 12, 'Anthony', '20f1aeb7819d7858684c898d1e98c1bb', 2, 1),
(16, 13, 'Cedes', '76421907eb4310572c524eacaa5f53ef', 2, 1),
(17, 14, 'Alyana', '0349dd1c0df4b776c31a4a8784f8f151', 2, 1),
(18, 15, 'Alyzah', '1466032ff85092738337c347f8aedb59', 2, 1),
(19, 0, 'LIC', '901fa3f629ea54c9893f3b18434c4b9d', 3, 1),
(20, 0, 'Abenson', '28640e3cd59974cb0c459f04e392d35a', 3, 2),
(21, 0, 'Apple', '9f6290f4436e5a2351f12e03b6433c3c', 3, 1),
(22, 0, 'Abenson', '28640e3cd59974cb0c459f04e392d35a', 3, 1),
(23, 0, 'Viajero', '9f95073fc06f79336571d2db3383c4ab', 3, 1),
(24, 0, 'Babycare', '8b98dcb0209458e5cc9386f22733bfc8', 3, 1),
(25, 0, 'Healthwell', '67e8f76456505247ee29828d0be86c84', 3, 1),
(26, 0, 'Sstore', 'cd32e6b0e15d8760f395cb7e431a89ab', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `adminId` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `adminStatus` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`adminId`, `personId`, `adminStatus`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblbarangay`
--

CREATE TABLE `tblbarangay` (
  `barangayId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbarangay`
--

INSERT INTO `tblbarangay` (`barangayId`, `cityId`, `description`) VALUES
(1, 1, 'Del Carmen'),
(2, 1, 'Palma'),
(3, 1, 'Barangay I (Pob.)'),
(4, 1, 'Barangay II (Pob.)'),
(5, 1, 'Barangay III (Pob.)'),
(6, 2, 'Bitin'),
(7, 2, 'Calo'),
(8, 2, 'Dila'),
(9, 2, 'Maitim'),
(10, 2, 'Masaya'),
(11, 3, 'Santo Tomas (Calabuso)'),
(12, 3, 'Malaban'),
(13, 3, 'Dela Paz'),
(14, 3, 'San Francisco (Halang)'),
(15, 3, 'Canlalay'),
(16, 4, 'Baclaran'),
(17, 4, 'Banay-Banay'),
(18, 4, 'Banlic'),
(19, 4, 'Bigaa'),
(20, 4, 'Butong'),
(21, 5, 'Bagong Kalsada'),
(22, 5, 'Banadero'),
(23, 5, 'Banlic'),
(24, 5, 'Barandal'),
(25, 5, 'Barangay 1 (Poblacion)'),
(26, 6, 'Binagbag'),
(27, 6, 'Dayap'),
(28, 6, 'Ibabang Kinagunan'),
(29, 6, 'Ilayang Kinagunan'),
(30, 6, 'Kanlurang Calutan'),
(31, 7, 'Angeles'),
(32, 7, 'Bacong'),
(33, 7, 'Balungay'),
(34, 7, 'Buenavista'),
(35, 7, 'Caglate'),
(36, 8, 'Angeles'),
(37, 8, 'Balubad'),
(38, 8, 'Balugohin'),
(39, 8, 'Barangay Zone 1 (Poblacio'),
(40, 8, 'Barangay Zone 2 (Poblacio'),
(41, 9, 'Bagong Silang'),
(42, 9, 'Batabat Norte'),
(43, 9, 'Batabat Sur'),
(44, 9, 'Buenavista'),
(45, 9, 'Bukal'),
(46, 10, 'Aluyon'),
(47, 10, 'Amot'),
(48, 10, 'Anibawan'),
(49, 10, 'Bonifacio'),
(50, 10, 'Cabugao'),
(51, 11, 'Adia'),
(52, 11, 'Bagong Sikat'),
(53, 11, 'Balangon'),
(54, 11, 'Bangin'),
(55, 11, 'Banyaga'),
(56, 12, 'Balagbag'),
(57, 12, 'Concepcion'),
(58, 12, 'Concordia'),
(59, 12, 'Dalipit East'),
(60, 12, 'Dalipit West'),
(61, 13, 'Baclaran'),
(62, 13, 'Barangay 1 (Poblacion)'),
(63, 13, 'Barangay 10 (Poblacion)'),
(64, 13, 'Barangay 11 (Poblacion)'),
(65, 13, 'Barangay 12 (Poblacion)'),
(66, 14, 'Alangilan'),
(67, 14, 'Calawit'),
(68, 14, 'Looc'),
(69, 14, 'Magapi'),
(70, 14, 'Makina'),
(71, 15, 'Barangay 1 (Pob.)'),
(72, 15, 'Barangay 2 (Poblacion)'),
(73, 15, 'Barangay 3 (Poblacion)'),
(74, 15, 'Barangay 4 (Poblacion)'),
(75, 15, 'Barangay 5 (Poblacion)'),
(76, 16, 'Alagao'),
(77, 16, 'Aplaya'),
(78, 16, 'As-Is'),
(79, 16, 'Bagong Silang'),
(80, 16, 'Baguilawa'),
(81, 17, 'Burol Main'),
(82, 17, 'Burol I'),
(83, 17, 'Burol II'),
(84, 17, 'Burol III'),
(85, 17, 'Datu Esmael (Bago-A-Ingud'),
(86, 18, 'Dalusag'),
(87, 18, 'Batas Dao'),
(88, 18, 'Casta?os Cerca'),
(89, 18, 'Casta?os Lejos'),
(90, 18, 'Kabulusan'),
(91, 19, 'Aldiano Olaes'),
(92, 19, 'Barangay 1 Poblacion (Are'),
(93, 19, 'Barangay 2 Poblacion'),
(94, 19, 'Barangay 3 Poblacion'),
(95, 19, 'Barangay 4 Poblacion'),
(96, 20, 'Alingaro'),
(97, 20, 'Arnaldo'),
(98, 20, 'Bacao I'),
(99, 20, 'Bacao II'),
(100, 20, 'Bagumbayan'),
(101, 21, 'Alapan I-A'),
(102, 21, 'Alapan I-B'),
(103, 21, 'Alapan I-C'),
(104, 21, 'Alapan II-A'),
(105, 21, 'Alapan II-B'),
(106, 22, 'Bagumbayan'),
(107, 22, 'Mahabang Parang'),
(108, 22, 'Poblacion Ibaba'),
(109, 22, 'Poblacion Itaas'),
(110, 22, 'San Isidro'),
(111, 23, 'Bagong Nayon'),
(112, 23, 'Beverly Hills'),
(113, 23, 'Calawis'),
(114, 23, 'Cupang'),
(115, 23, 'Dalig'),
(116, 24, 'Evangelista'),
(117, 24, 'Rizal (Pob)'),
(118, 24, 'San Jose'),
(119, 24, 'San Salvador'),
(120, 24, 'Santiago'),
(121, 25, 'Bangad'),
(122, 25, 'Batingan'),
(123, 25, 'Bilibiran'),
(124, 25, 'Binitagan'),
(125, 25, 'Bombong');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `cartId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `categoryId` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`categoryId`, `description`) VALUES
(1, 'Electronic Devices'),
(2, 'Electronic Accessories'),
(3, 'TV & Home Appliances'),
(4, 'Health & Beauty'),
(5, 'Babies & Toys'),
(6, 'Groceries & Pets'),
(7, 'Home & Living'),
(8, 'Women\'s Fashion'),
(9, 'Men\'s Fashion'),
(10, 'Fashion Accessories'),
(11, 'Sports & Lifestyle'),
(12, 'Automotive & Motorcycles');

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `cityId` int(11) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`cityId`, `provinceId`, `description`) VALUES
(1, 1, 'Alaminos'),
(2, 1, 'Bay'),
(3, 1, 'Binan'),
(4, 1, 'Cabuyao'),
(5, 1, 'Calamba'),
(6, 2, 'Agdangan'),
(7, 2, 'Alabat'),
(8, 2, 'Atimonan'),
(9, 2, 'Buenavista'),
(10, 2, 'Burdeos'),
(11, 3, 'Agoncillo'),
(12, 3, 'Alitagtag'),
(13, 3, 'Balayan'),
(14, 3, 'Balete'),
(15, 3, 'Batangas'),
(16, 3, 'Bauan'),
(17, 4, 'Dasmarinas'),
(18, 4, 'General Emilio Aguinaldo'),
(19, 4, 'General Mariano Alvarez'),
(20, 4, 'General Trias'),
(21, 4, 'Imus'),
(22, 5, 'Angono'),
(23, 5, 'Antipolo'),
(24, 5, 'Baras'),
(25, 5, 'Binangonan');

-- --------------------------------------------------------

--
-- Table structure for table `tblcivilstatus`
--

CREATE TABLE `tblcivilstatus` (
  `civilStatusId` int(11) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcivilstatus`
--

INSERT INTO `tblcivilstatus` (`civilStatusId`, `description`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Widowed'),
(4, 'Divorced');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `customerId` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `CustomerStatus` int(25) NOT NULL,
  `memberId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`customerId`, `personId`, `CustomerStatus`, `memberId`) VALUES
(0, 0, 1, 3),
(1, 4, 1, 3),
(2, 5, 1, 2),
(3, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldelivery`
--

CREATE TABLE `tbldelivery` (
  `deliveryId` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `deliveryStatus` int(11) NOT NULL,
  `warehouseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldelivery`
--

INSERT INTO `tbldelivery` (`deliveryId`, `personId`, `deliveryStatus`, `warehouseId`) VALUES
(1, 7, 1, 1),
(2, 8, 1, 2),
(3, 9, 1, 3),
(4, 10, 1, 1),
(5, 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `employeeId` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `employeeStatus` int(10) NOT NULL,
  `warehouseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`employeeId`, `personId`, `employeeStatus`, `warehouseId`) VALUES
(1, 12, 1, 1),
(2, 13, 1, 2),
(3, 14, 1, 1),
(4, 15, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

CREATE TABLE `tblinventory` (
  `productId` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblinventory`
--

INSERT INTO `tblinventory` (`productId`, `stock`) VALUES
(1, 100),
(2, 100),
(3, 100),
(4, 5),
(5, 10),
(6, 9),
(7, 20),
(8, 25),
(9, 15),
(10, 20),
(11, 10),
(12, 15),
(13, 50),
(14, 20),
(15, 50),
(16, 30),
(17, 100),
(18, 75),
(19, 50),
(20, 20),
(21, 20),
(22, 10),
(23, 200),
(24, 100),
(25, 20),
(26, 150),
(27, 50),
(28, 60),
(29, 19),
(30, 20),
(31, 20),
(32, 15),
(33, 60),
(34, 50),
(35, 100),
(36, 1100),
(37, 100),
(38, 100),
(39, 100),
(40, 100),
(41, 100),
(42, 50),
(43, 120),
(44, 50),
(45, 60),
(46, 70),
(47, 99),
(48, 50),
(49, 60),
(50, 99),
(51, 99),
(52, 99),
(53, 60),
(54, 75),
(55, 99),
(56, 100),
(57, 50),
(58, 75),
(59, 0),
(60, 0),
(61, 0),
(62, 0),
(63, 99),
(64, 9),
(65, 199),
(66, 50),
(67, 10),
(68, 100),
(69, 100),
(70, 150),
(71, 60),
(72, 50),
(73, 50),
(74, 77),
(75, 199),
(76, 120),
(77, 50),
(78, 45);

-- --------------------------------------------------------

--
-- Table structure for table `tblinventorylog`
--

CREATE TABLE `tblinventorylog` (
  `invetoryLogId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `action` varchar(45) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `invetoryLogDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblinventorylog`
--

INSERT INTO `tblinventorylog` (`invetoryLogId`, `customerId`, `action`, `productId`, `quantity`, `invetoryLogDate`) VALUES
(1, 0, 'Add Stock', 4, 1, '2020-05-03 20:38:08'),
(2, 0, 'Add Stock', 4, 1, '2020-05-03 20:38:22'),
(3, 0, 'Add Stock', 4, 2, '2020-05-03 20:44:27'),
(4, 3, 'Purchase', 4, 2, '2020-05-03 20:46:15'),
(5, 3, 'Purchase', 4, 1, '2020-05-03 21:10:47'),
(6, 3, 'Purchase', 2, 10, '2020-05-03 21:14:43'),
(7, 0, 'Add Stock', 3, 99, '2020-05-03 21:53:00'),
(8, 0, 'Add Stock', 2, 40, '2020-05-03 21:53:22'),
(9, 0, 'Add Stock', 1, 39, '2020-05-03 21:53:30'),
(10, 0, 'Add Stock', 6, 10, '2020-05-04 09:49:16'),
(11, 0, 'Add Stock', 7, 20, '2020-05-04 09:49:20'),
(12, 0, 'Add Stock', 9, 15, '2020-05-04 09:49:25'),
(13, 0, 'Add Stock', 5, 10, '2020-05-04 10:02:15'),
(14, 0, 'Add Stock', 14, 20, '2020-05-04 10:02:20'),
(15, 0, 'Add Stock', 15, 50, '2020-05-04 10:02:25'),
(16, 0, 'Add Stock', 19, 50, '2020-05-04 10:23:53'),
(17, 0, 'Add Stock', 20, 20, '2020-05-04 10:24:00'),
(18, 0, 'Add Stock', 10, 20, '2020-05-04 10:27:59'),
(19, 0, 'Add Stock', 11, 10, '2020-05-04 10:28:08'),
(20, 0, 'Add Stock', 12, 15, '2020-05-04 10:28:14'),
(21, 0, 'Add Stock', 13, 50, '2020-05-04 10:28:20'),
(22, 0, 'Add Stock', 22, 10, '2020-05-04 10:48:26'),
(23, 0, 'Add Stock', 23, 200, '2020-05-04 10:48:35'),
(24, 0, 'Add Stock', 24, 100, '2020-05-04 10:48:41'),
(25, 0, 'Add Stock', 25, 20, '2020-05-04 10:48:46'),
(26, 0, 'Add Stock', 26, 150, '2020-05-04 10:48:53'),
(27, 0, 'Add Stock', 27, 50, '2020-05-04 10:49:00'),
(28, 0, 'Add Stock', 28, 60, '2020-05-04 10:49:06'),
(29, 0, 'Add Stock', 21, 20, '2020-05-04 10:49:24'),
(30, 0, 'Add Stock', 8, 25, '2020-05-04 10:50:56'),
(31, 0, 'Add Stock', 16, 30, '2020-05-04 10:51:03'),
(32, 0, 'Add Stock', 17, 100, '2020-05-04 10:51:07'),
(33, 0, 'Add Stock', 18, 75, '2020-05-04 10:51:12'),
(34, 0, 'Add Stock', 29, 20, '2020-05-04 10:57:14'),
(35, 0, 'Add Stock', 30, 20, '2020-05-04 10:57:20'),
(36, 0, 'Add Stock', 31, 20, '2020-05-04 11:00:29'),
(37, 0, 'Add Stock', 32, 15, '2020-05-04 11:00:38'),
(38, 0, 'Add Stock', 34, 50, '2020-05-04 11:37:18'),
(39, 0, 'Add Stock', 33, 60, '2020-05-04 11:37:25'),
(40, 0, 'Add Stock', 35, 100, '2020-05-04 11:49:44'),
(41, 0, 'Add Stock', 36, 1100, '2020-05-04 11:49:51'),
(42, 0, 'Add Stock', 37, 100, '2020-05-04 11:49:56'),
(43, 0, 'Add Stock', 38, 100, '2020-05-04 11:50:01'),
(44, 0, 'Add Stock', 39, 100, '2020-05-04 11:50:06'),
(45, 0, 'Add Stock', 40, 100, '2020-05-04 11:50:11'),
(46, 0, 'Add Stock', 41, 100, '2020-05-04 12:00:59'),
(47, 0, 'Add Stock', 42, 50, '2020-05-04 12:01:04'),
(48, 0, 'Add Stock', 43, 60, '2020-05-04 12:01:08'),
(49, 0, 'Add Stock', 43, 60, '2020-05-04 12:01:08'),
(50, 0, 'Add Stock', 44, 50, '2020-05-04 12:15:25'),
(51, 0, 'Add Stock', 45, 60, '2020-05-04 12:15:36'),
(52, 0, 'Add Stock', 46, 70, '2020-05-04 12:18:34'),
(53, 0, 'Add Stock', 47, 99, '2020-05-04 12:18:42'),
(54, 0, 'Add Stock', 48, 50, '2020-05-04 12:18:50'),
(55, 0, 'Add Stock', 49, 60, '2020-05-04 12:18:57'),
(56, 0, 'Add Stock', 50, 99, '2020-05-04 12:19:09'),
(57, 0, 'Add Stock', 51, 99, '2020-05-04 12:19:21'),
(58, 0, 'Add Stock', 52, 99, '2020-05-04 12:19:33'),
(59, 0, 'Add Stock', 53, 60, '2020-05-04 12:19:41'),
(60, 0, 'Add Stock', 54, 75, '2020-05-04 12:21:07'),
(61, 0, 'Add Stock', 55, 99, '2020-05-04 12:22:11'),
(62, 0, 'Add Stock', 56, 100, '2020-05-04 12:24:31'),
(63, 0, 'Add Stock', 57, 50, '2020-05-04 12:25:22'),
(64, 0, 'Add Stock', 58, 75, '2020-05-04 12:28:02'),
(65, 0, 'Add Stock', 63, 99, '2020-05-04 12:37:57'),
(66, 0, 'Add Stock', 64, 9, '2020-05-04 12:38:01'),
(67, 0, 'Add Stock', 65, 199, '2020-05-04 12:42:09'),
(68, 0, 'Add Stock', 73, 50, '2020-05-04 12:51:10'),
(69, 0, 'Add Stock', 66, 50, '2020-05-04 12:51:19'),
(70, 0, 'Add Stock', 67, 10, '2020-05-04 12:51:23'),
(71, 0, 'Add Stock', 68, 100, '2020-05-04 12:51:27'),
(72, 0, 'Add Stock', 69, 100, '2020-05-04 12:51:34'),
(73, 0, 'Add Stock', 70, 150, '2020-05-04 12:51:38'),
(74, 0, 'Add Stock', 71, 60, '2020-05-04 12:51:44'),
(75, 0, 'Add Stock', 72, 50, '2020-05-04 12:51:52'),
(76, 0, 'Add Stock', 74, 77, '2020-05-04 12:55:23'),
(77, 0, 'Add Stock', 75, 199, '2020-05-04 12:55:30'),
(78, 0, 'Add Stock', 76, 120, '2020-05-04 12:57:31'),
(79, 0, 'Add Stock', 77, 50, '2020-05-04 12:59:39'),
(80, 0, 'Add Stock', 78, 45, '2020-05-04 12:59:48'),
(81, 3, 'Purchase', 6, 1, '2020-05-04 14:04:24'),
(82, 1, 'Purchase', 29, 1, '2020-05-04 14:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblmember`
--

CREATE TABLE `tblmember` (
  `memberId` int(11) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmember`
--

INSERT INTO `tblmember` (`memberId`, `description`) VALUES
(1, 'Gold'),
(2, 'Premium'),
(3, 'Nonmember');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `orderId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderStatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderId`, `customerId`, `orderDate`, `orderStatus`) VALUES
(1, 3, '2020-05-03 20:45:38', 'Done'),
(2, 3, '2020-05-03 21:10:20', 'On-Process'),
(3, 3, '2020-05-03 21:12:27', 'On-Process'),
(4, 2, '2020-05-03 21:13:09', 'On-Process'),
(5, 3, '2020-05-04 14:02:29', 'Done'),
(6, 1, '2020-05-04 14:06:08', 'On-Process');

-- --------------------------------------------------------

--
-- Table structure for table `tblorderline`
--

CREATE TABLE `tblorderline` (
  `orderLineId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` double NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorderline`
--

INSERT INTO `tblorderline` (`orderLineId`, `orderId`, `productId`, `quantity`, `totalPrice`, `status`) VALUES
(1, 1, 4, 2, 50000, 'Accepted'),
(2, 2, 4, 1, 25000, 'Shipped'),
(3, 3, 2, 10, 120000, 'Shipped'),
(4, 4, 4, 2, 50000, 'Ordered'),
(5, 5, 6, 1, 9690, 'Accepted'),
(6, 6, 29, 1, 860, 'Ready to Ship');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `paymentId` int(11) NOT NULL,
  `orderLineId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `deliveryId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentdate` date NOT NULL,
  `warehousePayeeId` int(11) NOT NULL,
  `supplierpayeeId` int(11) NOT NULL,
  `paymentStatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`paymentId`, `orderLineId`, `supplierId`, `deliveryId`, `amount`, `paymentdate`, `warehousePayeeId`, `supplierpayeeId`, `paymentStatus`) VALUES
(1, 1, 3, 10, 50000, '2020-05-03', 1, 1, 'Received'),
(2, 5, 2, 10, 9690, '2020-05-04', 2, 2, 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `tblperson`
--

CREATE TABLE `tblperson` (
  `personId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `sexId` int(11) NOT NULL,
  `civilStatusId` int(11) NOT NULL,
  `birthDay` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `brangayId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `zipCode` int(25) NOT NULL,
  `cellPhoneNumber` varchar(11) NOT NULL,
  `telephoneNumber` varchar(45) NOT NULL,
  `userTypeId` int(11) NOT NULL,
  `dateEncoded` datetime NOT NULL,
  `PersonAddedBy` int(11) NOT NULL,
  `imagePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblperson`
--

INSERT INTO `tblperson` (`personId`, `firstName`, `middleName`, `lastName`, `sexId`, `civilStatusId`, `birthDay`, `address`, `brangayId`, `cityId`, `provinceId`, `zipCode`, `cellPhoneNumber`, `telephoneNumber`, `userTypeId`, `dateEncoded`, `PersonAddedBy`, `imagePath`) VALUES
(0, 'Company', 'Company', 'Company', 1, 1, '0000-00-00', 'Company', 1, 1, 1, 4025, 'Company', 'Company', 5, '0000-00-00 00:00:00', 1, ''),
(1, 'Juan', 'Dela', 'Cruz', 1, 2, '2016-12-07', 'Block 1 Lot 7', 77, 16, 3, 4025, '123-456', '321-456-789', 1, '2020-05-01 14:35:53', 0, ''),
(2, 'Cherry Anne', 'Garcia', 'Molino', 2, 2, '1973-02-14', 'Block 20', 35, 7, 2, 4025, '465-461', '987-123-123', 1, '2020-05-01 06:01:28', 1, ''),
(3, 'John Mark', 'Miranda', 'Reyes', 1, 1, '1969-06-10', 'Block 1 Sampalok St.', 8, 1, 1, 4025, '798-987', '101-132-103', 1, '2020-05-01 06:07:39', 1, ''),
(4, 'Reymark', 'Llacuna', 'Castillo', 1, 2, '1994-12-26', 'Block 45', 105, 21, 4, 4025, '456-135', '789-195-234', 4, '2020-05-01 12:09:56', 1, ''),
(5, 'Liezel', 'Paglinawan', 'Enriquez', 2, 1, '1973-09-19', 'Block 9 lot 20', 7, 1, 1, 4025, '195-297', '723-164-971', 4, '2020-05-01 12:17:28', 1, ''),
(6, 'Samantha', 'Jones', 'Mendoza', 2, 1, '2000-05-05', 'Block 35 Kamias St', 4, 1, 1, 4025, '437-916', '195-735-465', 4, '2020-05-01 12:21:13', 1, ''),
(7, 'Mark', 'Banasihan', 'Zabello', 1, 1, '1994-06-07', 'Block 22', 78, 16, 3, 4025, '731-456', '123-789', 6, '2020-05-01 02:14:40', 1, ''),
(8, 'James', 'Altoveros', 'Seva', 1, 1, '1984-06-06', 'Block 123', 2, 1, 1, 4025, '132-456', '132-456-789', 6, '2020-05-01 02:20:11', 1, ''),
(9, 'Danilo', 'Arandela', 'Lopez', 1, 1, '1984-07-28', 'Block 1', 34, 1, 1, 4025, '753-951', '159-783-456', 6, '2020-05-01 02:21:47', 1, ''),
(10, 'Ken', 'Azul', 'Enrera', 1, 3, '1969-05-14', 'Block 21', 5, 1, 1, 4025, '741-963', '369-158-147', 6, '2020-05-01 02:32:14', 1, ''),
(11, 'Paolo', 'Seva', 'Moring', 1, 1, '1996-05-30', 'Block 2', 2, 1, 1, 4025, '142-326', '159-963-781', 6, '2020-05-01 02:40:40', 1, ''),
(12, 'Anthony', 'Malabanan', 'Javier', 1, 1, '1975-05-12', 'Block 23', 1, 1, 1, 4025, '145-965', '365-745-856', 2, '2020-05-01 02:51:48', 1, ''),
(13, 'Cedes', 'Mari ', 'Entredicho', 1, 1, '1995-11-15', 'Block 146', 9, 1, 1, 4025, '152-958', '769-786-987', 2, '2020-05-01 02:53:33', 1, ''),
(14, 'Alyana', 'Javier', 'Malabanan', 2, 1, '1997-12-14', 'Alyana', 2, 1, 1, 4025, 'Alyana', 'Alyana', 2, '2020-05-01 03:01:10', 1, ''),
(15, 'Alyzah', 'Arona', 'Zaballa', 2, 2, '1999-12-25', 'Blovk 167', 44, 9, 2, 4025, '145-975', '904-120-130', 2, '2020-05-01 03:03:15', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `productId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`productId`, `categoryId`, `subCategoryId`, `description`, `price`, `productImage`, `supplierId`, `statusId`) VALUES
(1, 1, 1, 'Xiami Redmi Note 8', '8000.00', 'upload/redmi8_1584185003.png', 1, 1),
(2, 3, 17, 'LG 32 Inch TV', '12000.00', 'upload/1_1584185026.jpg', 1, 1),
(3, 1, 1, 'Realme 6', '13000.00', 'upload/Realme_6__L_1_1584364030.jpg', 1, 1),
(4, 1, 1, 'Iphone XS 256gb', '25000.00', 'upload/ImgW.ashx_1588508473.jpg', 3, 1),
(5, 1, 3, '16‑inch MacBook Pro - Space Gray', '141990.00', 'upload/mbp16touch-space-select-201911_1588555509.jpg', 3, 1),
(6, 1, 2, 'Huawei Mediapad T5 10.1 1080P Full HD Vivid Display', '9690.00', 'upload/tab1_1588555976.png', 2, 1),
(7, 1, 2, 'Huawei M3 lite 3GB RAM 32GB ROM 8MP Rear Camera + 8MP Front ', '9890.00', 'upload/tab2_1588556079.jpg', 2, 1),
(8, 1, 4, 'IPASON Desktop Intel 4 Core J3160 Computer 21.5 Monitor 8GB RAM ', '14111.00', 'upload/destap1_1588556186.jpg', 1, 1),
(9, 1, 4, 'Computer Set Package intel core i3 desktop complete set WITH WIFI ', '6500.00', 'upload/destap2_1588556236.jpg', 2, 1),
(10, 1, 5, ' APPO V380 1080P HD CCTV Home Wireless Smart Security', '550.00', 'upload/cam1_1588557123.jpg', 2, 1),
(11, 1, 5, 'CP Plus CP-GTC-T20L2-V3 1080P, 2MP Full HD Astra IR Bullet Camera', '516.00', 'upload/cam2_1588557165.jpg', 2, 1),
(12, 1, 6, 'AKASO V50X Native 4K30fps WiFi Action Camera with EIS', '4429.98', 'upload/acam1_1588557323.jpg', 2, 1),
(13, 1, 5, 'Ultimate Sports Action Cam, A7 Camera Under Water ', '479.50', 'upload/acam2_1588557489.jpg', 2, 1),
(14, 2, 10, 'Apple EarPods with 3.5mm Headphone Plug', '1490.00', 'upload/apple1_1588557673.jpg', 3, 1),
(15, 2, 10, 'Apple AirPods 2 with Charging Case', '7890.99', 'upload/apple2_1588557719.jpg', 3, 1),
(16, 1, 8, 'PlayStation 4 pro', '12500.00', 'upload/gc1_1588558113.jpg', 1, 1),
(17, 1, 8, 'Doubles Retro Mini Gameboy Handheld Video Game Console ', '479.99', 'upload/gc2_1588558188.jpg', 1, 1),
(18, 1, 9, '10pcs LED Illuminated Push Buttons Micro Switch for Arcade Machine ', '423.00', 'upload/d1_1588558460.jpg', 1, 1),
(19, 8, 44, 'LVLIN Korean Style Fashion T-shirt with extra size', '99.99', 'upload/dr2_1588558775.jpg', 4, 1),
(20, 8, 44, 'INSPI Tees Ladies Pet Collection tshirt printed graphic tee Ladies', '143.00', 'upload/dr1_1588558813.jpg', 4, 1),
(21, 8, 45, 'ShoePer Retro (Korean Chunky Sneakers Shoes for Women)', '391.02', 'upload/sh1_1588559706.jpg', 4, 1),
(22, 8, 45, 'Women fashion Trendy suede sandals 8818#', '250.00', 'upload/sh3_1588559995.jpg', 4, 1),
(23, 8, 46, 'LS Jewelry White Gold Pearl Hair Clip F01', '29.99', 'upload/a1_1588560072.jpg', 4, 1),
(24, 8, 46, 'Women Fashion 1PC UniMen Arab Shemagh Keffiyeh Palestine Scarf ', '131.00', 'upload/a2_1588560119.jpg', 4, 1),
(25, 8, 47, 'Doughnut Backpack Korean Back pack Backpack Bagpack Macaroon ', '283.00', 'upload/b1_1588560182.jpg', 4, 1),
(26, 8, 47, 'Doughnut Backpack Korean Back pack Backpack Bagpack Macaroon ', '349.99', 'upload/b2_1588560222.jpg', 4, 1),
(27, 9, 50, 'INSPI Tees Bible Verse Collection tshirt printed graphic tee Mens t shirt', '179.00', 'upload/m1_1588560322.jpg', 4, 1),
(28, 9, 50, 'INSPI Tees Sailing Collection tshirt printed graphic tee Mens t shirt shirt', '143.00', 'upload/m2_1588560486.jpg', 4, 1),
(29, 9, 49, 'Hawk 4897 Backpack', '860.00', 'upload/mb1_1588560993.jpg', 4, 1),
(30, 9, 49, 'Hawk 4909 Backpack', '860.00', 'upload/mb2_1588561020.jpg', 4, 1),
(31, 9, 51, 'NIKE KD 10 high cut basketball shoes for men women shoes kids shoes', '369.00', 'upload/ms1_1588561179.jpg', 4, 1),
(32, 9, 50, ' MME Fashion Stylish Casual Sneaker For Men', '3199.99', 'upload/ms2_1588561216.jpg', 4, 1),
(33, 9, 48, 'Korean Unisex Plain Baseball Cap', '50.00', 'upload/cup1_1588561349.jpg', 4, 1),
(34, 9, 48, 'COD new casual fashion hat unisex', '59.99', 'upload/cap2_1588561388.jpg', 4, 1),
(35, 5, 30, 'Colgate Kids Free From 3-5 Years Toothpaste', '104.00', 'upload/bc1_1588563697.jpg', 5, 1),
(36, 5, 30, 'BENCH- Baby Bench Cologne Lemon Drop', '73.60', 'upload/bc2_1588563739.jpg', 5, 1),
(37, 5, 30, ' The Original Baby Soft Cotton Back Towel Sweat Absorbent for Children ', '36.00', 'upload/bc4_1588563831.jpg', 5, 1),
(38, 5, 31, 'MamyPoko Easy to Wear Large', '64.80', 'upload/p1_1588564056.jpg', 5, 1),
(39, 5, 31, 'Dreamworks Baby 2-pc Diaper Clamps', '31.00', 'upload/p2_1588564122.jpg', 5, 1),
(40, 5, 31, 'EQ Pants Large', '286.88', 'upload/p3_1588564164.jpg', 5, 1),
(41, 4, 22, ' MZ Fit Me Matte Poreless Liquid Foundation 30 mL ', '119.00', 'upload/hm1_1588564672.jpg', 6, 1),
(42, 4, 22, 'O.TWO.O 12 Colors Easy to Wear Matte Lipstick', '60.00', 'upload/hm2_1588564704.jpg', 6, 1),
(43, 4, 22, 'SACE LADY 12 Hour Stay Matte Lipstick Makeup Waterproof', '105.00', 'upload/hm3_1588564847.jpg', 6, 1),
(44, 4, 23, ' Natural Facial Mask Sheet Essence Replenishment Moisture Mask', '7.84', 'upload/sc1_1588564988.jpg', 6, 1),
(45, 4, 23, '24K GOLD SCAR REMOVER SERUM BUY 1 TAKE 1', '949.00', 'upload/sc2_1588565056.png', 6, 1),
(46, 4, 24, 'Garden Lab Castor Oil 15 ml', '230.00', 'upload/hc1_1588565126.png', 6, 1),
(47, 4, 24, 'Tresemme Detox & Nourish Shampoo & Conditioner Travel Kit', '99.99', 'upload/hc2_1588565164.jpg', 6, 1),
(48, 4, 25, 'BENCH- Alcogel Classic Hand Sanitizer 750ML', '250.00', 'upload/bb1_1588565219.jpg', 6, 1),
(49, 4, 25, 'Palmolive Naturals Pinkish & Glow Beauty Bar Soap', '67.00', 'upload/bb2_1588565257.jpg', 6, 1),
(50, 4, 26, 'Charmee Menstrual Pants Medium', '45.60', 'upload/pc1_1588565360.jpg', 6, 1),
(51, 4, 26, ' White Result Whitening Deodorant 40ml firming', '79.00', 'upload/pc2_1588565397.jpg', 6, 1),
(52, 4, 27, 'Berocca Citrus Energy Vitamins Effervescent 15 Tablets', '870.00', 'upload/fs1_1588565519.jpg', 6, 1),
(53, 4, 27, 'Amazing Food Supplement Ampalaya 500mg Capsules Bottle', '500.00', 'upload/fs2_1588565557.jpg', 6, 1),
(54, 4, 28, 'HERP ORAL TABLET TREATMENT 400mg', '1200.00', 'upload/med1_1588566056.jpg', 6, 1),
(55, 4, 28, 'YiGanErJing Natural Herbal Cream', '65.00', 'upload/med2_1588566119.jpg', 6, 1),
(56, 4, 29, 'MAANGE 4Pc/Set Stainless Steel Blackhead Removal Kit', '92.44', 'upload/t1_1588566262.jpg', 6, 1),
(57, 4, 29, 'CkeyiN Face Massager Skin Tightening Machine Anti Aging ', '533.00', 'upload/t2_1588566311.jpg', 6, 1),
(58, 2, 11, 'EWA GTX-300 Colorful LED Illuminated Backlight USB Wired PC ', '287.94', 'upload/ca1_1588566474.jpg', 1, 1),
(59, 2, 10, 'TYLEX X-W22 Mini Wireless 2.4Ghz Home & Office 1600DPI 10M ', '159.00', 'upload/ca2_1588566513.png', 1, 1),
(60, 2, 11, 'Portable 3 in 1 USB 3.1 Type C HUB Converter Aluminum Alloy 4K Video ', '586.00', 'upload/ca3_1588566555.jpg', 1, 1),
(61, 2, 12, 'THINK TANK Mirrorless Mover 20 - Pewter', '2360.00', 'upload/cama1_1588566652.jpg', 1, 1),
(62, 2, 12, 'EWA RK20 26CM Selfie LED Ring Light Photo Studio Light With Tripod ', '386.51', 'upload/cama2_1588566712.jpg', 1, 1),
(63, 2, 14, '2019 New Deformation 2017/2018 iPad 9.7 air 1/2 mini 2 3 4 5 Tablet ', '1258.60', 'upload/ta1_1588566933.jpg', 3, 1),
(64, 2, 14, ' Ultra-thin Slider Camera Privacy Silicone Phone Case For iPhone', '1192.80', 'upload/ta2_1588567036.jpg', 3, 1),
(65, 6, 33, 'Arla Milk Goodness Lactose Free 1L', '105.00', 'upload/g1_1588567322.jpg', 7, 1),
(66, 6, 33, 'Strawberry Jam', '245.00', 'upload/g2_1588567415.jpg', 7, 1),
(67, 6, 33, 'Magnolia Pancake and Waffle Mix (400g)', '54.06', 'upload/g3_1588567456.jpg', 7, 1),
(68, 6, 33, 'MILNA Baby Cereals Beef Stew and Green Peas 120G ', '132.00', 'upload/g4_1588567543.jpg', 7, 1),
(69, 6, 33, 'KOKO KRUNCH 330g', '160.64', 'upload/g5_1588567577.jpg', 7, 1),
(70, 6, 33, ' Skippy Super Chunk Peanut Butter 1.36 KG Original', '499.00', 'upload/g6_1588567617.jpg', 7, 1),
(71, 6, 37, 'Alaska BUY 8, get FREE 8 Fortified Ready-to-Drink Milk 185mL', '312.00', 'upload/d2_1588567694.jpg', 7, 1),
(72, 6, 37, 'CAFE FILIPINO 2in1 in Paper Cup 12g', '10.63', 'upload/d3_1588567820.jpg', 7, 1),
(73, 6, 37, 'GOLDEN MORINGA MANGOSTEEN STEVIA COFFEE 12 sachet', '160.59', 'upload/d4_1588567861.jpg', 7, 1),
(74, 3, 19, 'GOLDEN MORINGA MANGOSTEEN STEVIA COFFEE 12 sachet', '1787.00', 'upload/ha1_1588568082.jpg', 2, 1),
(75, 3, 19, 'The Platinum Karaoke KS-10 Plus Junior 2 Player with 16,000+', '2772.00', 'upload/h2_1588568114.jpg', 2, 1),
(76, 3, 20, 'TYLEX X-M40 7 Inches Portable 360° Rotation Mini Wind Desk Fan', '419.00', 'upload/ar1_1588568243.jpg', 2, 1),
(77, 3, 20, 'EWA 500ml 7 LED Color Aromatherapy Essential Oil Diffuser ', '479.22', 'upload/ar2_1588568292.jpg', 2, 1),
(78, 3, 20, ' Portable Airconditioner Air Cooler Purifier Aircon USB Cable Small Mini ', '999.00', 'upload/ar3_1588568334.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproductstatus`
--

CREATE TABLE `tblproductstatus` (
  `productStatusId` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproductstatus`
--

INSERT INTO `tblproductstatus` (`productStatusId`, `description`) VALUES
(1, 'Available'),
(2, 'Not Available');

-- --------------------------------------------------------

--
-- Table structure for table `tblprovince`
--

CREATE TABLE `tblprovince` (
  `ProvinceId` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblprovince`
--

INSERT INTO `tblprovince` (`ProvinceId`, `description`) VALUES
(1, 'Laguna'),
(2, 'Quezon'),
(3, 'Batangas'),
(4, 'Cavite'),
(5, 'Rizal');

-- --------------------------------------------------------

--
-- Table structure for table `tblsale`
--

CREATE TABLE `tblsale` (
  `saleId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `salesTotal` double NOT NULL,
  `salesDate` datetime NOT NULL,
  `saleStatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsale`
--

INSERT INTO `tblsale` (`saleId`, `orderId`, `customerId`, `salesTotal`, `salesDate`, `saleStatus`) VALUES
(1, 1, 3, 50000, '2020-05-03 20:45:38', 'Done'),
(2, 2, 3, 25000, '2020-05-03 21:10:20', 'On-Process'),
(3, 3, 3, 120000, '2020-05-03 21:12:27', 'On-Process'),
(4, 4, 2, 50000, '2020-05-03 21:13:09', 'On-Process'),
(5, 5, 3, 9690, '2020-05-04 14:02:29', 'Done'),
(6, 6, 1, 860, '2020-05-04 14:06:08', 'On-Process');

-- --------------------------------------------------------

--
-- Table structure for table `tblsalesdetail`
--

CREATE TABLE `tblsalesdetail` (
  `saleDetailId` int(11) NOT NULL,
  `saleId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `saleQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsalesdetail`
--

INSERT INTO `tblsalesdetail` (`saleDetailId`, `saleId`, `productId`, `saleQuantity`) VALUES
(1, 1, 4, 2),
(2, 2, 4, 1),
(3, 3, 2, 10),
(4, 5, 6, 1),
(5, 6, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsetting`
--

CREATE TABLE `tblsetting` (
  `settingId` int(11) NOT NULL,
  `abbrevation` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `about` mediumtext NOT NULL,
  `mission` mediumtext NOT NULL,
  `vision` mediumtext NOT NULL,
  `cellphoneNumber` varchar(45) NOT NULL,
  `TelephoneNumber` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsex`
--

CREATE TABLE `tblsex` (
  `sexId` int(11) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsex`
--

INSERT INTO `tblsex` (`sexId`, `description`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tblshipment`
--

CREATE TABLE `tblshipment` (
  `shipmentId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `orderLineId` int(11) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `barangayId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblshipment`
--

INSERT INTO `tblshipment` (`shipmentId`, `customerId`, `orderId`, `orderLineId`, `provinceId`, `cityId`, `barangayId`) VALUES
(1, 3, 1, 1, 4, 18, 87),
(2, 3, 3, 3, 4, 18, 87),
(3, 3, 2, 2, 4, 18, 87),
(4, 3, 5, 5, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `subCategoryId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`subCategoryId`, `categoryId`, `description`) VALUES
(1, 1, 'Mobiles'),
(2, 1, 'Tablets'),
(3, 1, 'Laptops'),
(4, 1, 'Desktops'),
(5, 1, 'Security Cameras'),
(6, 1, 'Action/Video Cameras'),
(7, 1, 'Digital Cameras'),
(8, 1, 'Game Consoles'),
(9, 1, 'Gadgets'),
(10, 2, 'Mobiles Accessories '),
(11, 2, 'Computer Accessories'),
(12, 2, 'Camera Accessories'),
(13, 2, 'Console Accessories'),
(14, 2, 'Tablet Accessories'),
(15, 2, 'Wearable Technology'),
(16, 3, 'Personal Care Appliances'),
(17, 3, 'TV & Video Devices'),
(18, 3, 'TV Accessories'),
(19, 3, 'Home Audio'),
(20, 3, 'Cooling & Air Treatment'),
(21, 3, 'Small Kitchen Appliances'),
(22, 4, 'Make-Up'),
(23, 4, 'Skincare'),
(24, 4, 'Hair Care'),
(25, 4, 'Bath & Body'),
(26, 4, 'Personal Care'),
(27, 4, 'Food Supplements'),
(28, 4, 'Medical Supplies'),
(29, 4, 'Beauty Tools'),
(30, 5, 'Baby Personal Care'),
(31, 5, 'Diapering & Potty'),
(32, 6, 'Food Staples & Cooking Essentials'),
(33, 6, 'Breakfast Cereals & Spreads'),
(34, 6, 'Pet Food'),
(35, 6, 'Pet Healthcare'),
(36, 6, 'Pet Accessories'),
(37, 6, 'Drinks'),
(38, 7, 'Laundry & Cleaning Equipment'),
(39, 7, 'Kitchen & Dining'),
(40, 7, 'Furniture'),
(41, 7, 'Home Décor'),
(42, 7, 'Outdoor & Garden'),
(43, 7, 'Stationery & Craft'),
(44, 8, 'Women\'s Clothing'),
(45, 8, 'Women\'s Shoes'),
(46, 8, 'Accessories'),
(47, 8, 'Women Bags'),
(48, 9, 'Accessories'),
(49, 9, 'Men Bags'),
(50, 9, 'Men\'s Clothing'),
(51, 9, 'Men\'s Shoes'),
(52, 10, 'Women\'s Fashion Jewellery'),
(53, 10, 'Men\'s Jewellery'),
(54, 10, 'Sunglasses'),
(55, 10, 'Kids\' Jewellery'),
(56, 11, 'Musical Instruments'),
(57, 11, 'Sports Apparel'),
(58, 11, 'Books'),
(59, 11, 'Exercise & Fitness Equipment'),
(60, 12, 'Automotive'),
(61, 12, 'Vehicle Care'),
(62, 12, 'Automotive Oils & Fluids'),
(63, 12, 'Motorcycle Oils & Fluids'),
(64, 12, 'Fuels - Gasoline/Petrol, Diesel'),
(65, 12, 'Motorcycles');

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `supplierId` int(11) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `supplierAddress` varchar(255) NOT NULL,
  `telephoneNumber` varchar(45) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `supplierUserName` varchar(200) NOT NULL,
  `supplierPassword` varchar(200) NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`supplierId`, `supplierName`, `supplierAddress`, `telephoneNumber`, `emailAddress`, `supplierUserName`, `supplierPassword`, `statusId`) VALUES
(1, 'Lagunastar Industries Company', '3rd Flr Unit C-22 Banawe De Santa Rosa Bldg. Brgy. Balibago', '049-5308463', 'soldering102.blogspot.com', 'LIC', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(2, 'Abenson', 'Santa Rosa, Laguna ', '(049) 534 4669 ', 'Abenson@faqs', 'Abenson', '28640e3cd59974cb0c459f04e392d35a', 1),
(3, 'Apple Inc', 'Muntinlupa City', '(02) 8842 206', 'Apple@you', 'Apple', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(4, 'viajero wholesale', '35 Guido Ver, San Roque Angono, Rizal', '(63) 9175207951', 'ViajeroWholesale@gmail.com', 'Viajero', '9f95073fc06f79336571d2db3383c4ab', 1),
(5, 'baby care', 'Cabuyao Laguna', '(63)9726316', 'babycare@gmail.com', 'Babycare', '8b98dcb0209458e5cc9386f22733bfc8', 1),
(6, 'Healthwell', 'Santa Rosa, Laguna ', '(63)9580238', 'healthwell@gmail,com', 'Healthwell', '67e8f76456505247ee29828d0be86c84', 1),
(7, 'Sari-Sari Store', 'Calamba Laguna', '(063)261356', 'Sarisaristore@gmail.com', 'Sstore', 'cd32e6b0e15d8760f395cb7e431a89ab', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplierpayee`
--

CREATE TABLE `tblsupplierpayee` (
  `supplierpayeeId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `amountRecieve` int(11) NOT NULL,
  `warehouseId` int(11) NOT NULL,
  `supplierDate` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsupplierpayee`
--

INSERT INTO `tblsupplierpayee` (`supplierpayeeId`, `supplierId`, `amountRecieve`, `warehouseId`, `supplierDate`, `status`) VALUES
(1, 3, 50000, 3, '2020-05-03', 'On-Hand'),
(2, 2, 9690, 1, '2020-05-04', 'On-Hand');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserstatus`
--

CREATE TABLE `tbluserstatus` (
  `statusId` int(11) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluserstatus`
--

INSERT INTO `tbluserstatus` (`statusId`, `description`) VALUES
(1, 'Active'),
(2, 'Deactive'),
(3, 'Block');

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

CREATE TABLE `tblusertype` (
  `userTypeId` int(11) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusertype`
--

INSERT INTO `tblusertype` (`userTypeId`, `description`) VALUES
(1, 'admin'),
(2, 'employee'),
(3, 'supplier'),
(4, 'customer'),
(5, 'Warehouse'),
(6, 'Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `tblwarehouse`
--

CREATE TABLE `tblwarehouse` (
  `warehouseId` int(11) NOT NULL,
  `warehouseName` varchar(255) NOT NULL,
  `ProvinceId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `telephoneNumber` varchar(11) NOT NULL,
  `warehouseUserName` varchar(255) NOT NULL,
  `warehousePassword` varchar(255) NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblwarehouse`
--

INSERT INTO `tblwarehouse` (`warehouseId`, `warehouseName`, `ProvinceId`, `cityId`, `telephoneNumber`, `warehouseUserName`, `warehousePassword`, `statusId`) VALUES
(1, 'Laguna Hub', 1, 1, '123', 'Laguna', '90cd956a59da5c160ee0f2e7442e3389', 1),
(2, 'Sta Rosa Hub', 1, 28, '718', 'Sta Rosa', 'bb1900db3dd9b1c844131c02f555a05c', 1),
(3, 'Canlubang Hub', 3, 15, '735-793', 'Canlubang', '5833374ab3d6be436fe8d950f3efbee2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblwarehousepayee`
--

CREATE TABLE `tblwarehousepayee` (
  `warehousePayeeId` int(11) NOT NULL,
  `warehouseId` int(11) NOT NULL,
  `amountRecieve` int(11) NOT NULL,
  `deliveryId` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblwarehousepayee`
--

INSERT INTO `tblwarehousepayee` (`warehousePayeeId`, `warehouseId`, `amountRecieve`, `deliveryId`, `date`, `status`) VALUES
(1, 1, 50000, 10, '2020-05-03', 'On-Hand'),
(2, 1, 9690, 10, '2020-05-04', 'On-Hand');

-- --------------------------------------------------------

--
-- Table structure for table `tblzipcode`
--

CREATE TABLE `tblzipcode` (
  `zipCode` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblzipcode`
--

INSERT INTO `tblzipcode` (`zipCode`, `description`) VALUES
(4025, 'Cabuyao'),
(4026, 'Sta Rosa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`accountId`),
  ADD KEY `personId` (`personId`),
  ADD KEY `accountStatus` (`accountStatus`),
  ADD KEY `userTypeId` (`userTypeId`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`adminId`),
  ADD KEY `personId` (`personId`),
  ADD KEY `adminStatus` (`adminStatus`);

--
-- Indexes for table `tblbarangay`
--
ALTER TABLE `tblbarangay`
  ADD PRIMARY KEY (`barangayId`),
  ADD KEY `cityId` (`cityId`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`cityId`),
  ADD KEY `provinceId` (`provinceId`);

--
-- Indexes for table `tblcivilstatus`
--
ALTER TABLE `tblcivilstatus`
  ADD PRIMARY KEY (`civilStatusId`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `personId` (`personId`),
  ADD KEY `memberId` (`memberId`),
  ADD KEY `CustomerStatus` (`CustomerStatus`);

--
-- Indexes for table `tbldelivery`
--
ALTER TABLE `tbldelivery`
  ADD PRIMARY KEY (`deliveryId`),
  ADD KEY `personId` (`personId`),
  ADD KEY `deliveryStatus` (`deliveryStatus`),
  ADD KEY `warehouseId` (`warehouseId`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`employeeId`),
  ADD KEY `personId` (`personId`),
  ADD KEY `employeeStatus` (`employeeStatus`),
  ADD KEY `warehouseId` (`warehouseId`);

--
-- Indexes for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD UNIQUE KEY `productId_2` (`productId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `tblinventorylog`
--
ALTER TABLE `tblinventorylog`
  ADD PRIMARY KEY (`invetoryLogId`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `tblmember`
--
ALTER TABLE `tblmember`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `tblorderline`
--
ALTER TABLE `tblorderline`
  ADD PRIMARY KEY (`orderLineId`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`paymentId`),
  ADD KEY `warehousePayeeId` (`warehousePayeeId`),
  ADD KEY `supplierpayeeId` (`supplierpayeeId`);

--
-- Indexes for table `tblperson`
--
ALTER TABLE `tblperson`
  ADD PRIMARY KEY (`personId`),
  ADD KEY `sexId` (`sexId`),
  ADD KEY `[civilStatusId]` (`civilStatusId`),
  ADD KEY `[barangayId]` (`brangayId`),
  ADD KEY `cityId` (`cityId`),
  ADD KEY `provinceId` (`provinceId`),
  ADD KEY `zipCode` (`zipCode`),
  ADD KEY `userTypeId` (`userTypeId`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `supplierId` (`supplierId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `statusId` (`statusId`),
  ADD KEY `subCategoryId` (`subCategoryId`);

--
-- Indexes for table `tblproductstatus`
--
ALTER TABLE `tblproductstatus`
  ADD PRIMARY KEY (`productStatusId`);

--
-- Indexes for table `tblprovince`
--
ALTER TABLE `tblprovince`
  ADD PRIMARY KEY (`ProvinceId`);

--
-- Indexes for table `tblsale`
--
ALTER TABLE `tblsale`
  ADD PRIMARY KEY (`saleId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `tblsalesdetail`
--
ALTER TABLE `tblsalesdetail`
  ADD PRIMARY KEY (`saleDetailId`),
  ADD KEY `saleId` (`saleId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `tblsetting`
--
ALTER TABLE `tblsetting`
  ADD PRIMARY KEY (`settingId`);

--
-- Indexes for table `tblsex`
--
ALTER TABLE `tblsex`
  ADD PRIMARY KEY (`sexId`);

--
-- Indexes for table `tblshipment`
--
ALTER TABLE `tblshipment`
  ADD PRIMARY KEY (`shipmentId`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `barangayId` (`barangayId`),
  ADD KEY `cityId` (`cityId`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `orderLineId` (`orderLineId`),
  ADD KEY `provinceId` (`provinceId`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`subCategoryId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  ADD PRIMARY KEY (`supplierId`),
  ADD KEY `statusId` (`statusId`);

--
-- Indexes for table `tblsupplierpayee`
--
ALTER TABLE `tblsupplierpayee`
  ADD PRIMARY KEY (`supplierpayeeId`),
  ADD KEY `supplierId` (`supplierId`),
  ADD KEY `warehouseId` (`warehouseId`);

--
-- Indexes for table `tbluserstatus`
--
ALTER TABLE `tbluserstatus`
  ADD PRIMARY KEY (`statusId`);

--
-- Indexes for table `tblusertype`
--
ALTER TABLE `tblusertype`
  ADD PRIMARY KEY (`userTypeId`);

--
-- Indexes for table `tblwarehouse`
--
ALTER TABLE `tblwarehouse`
  ADD PRIMARY KEY (`warehouseId`),
  ADD KEY `cityId` (`cityId`),
  ADD KEY `ProvinceId` (`ProvinceId`),
  ADD KEY `statusId` (`statusId`);

--
-- Indexes for table `tblwarehousepayee`
--
ALTER TABLE `tblwarehousepayee`
  ADD PRIMARY KEY (`warehousePayeeId`),
  ADD KEY `warehouseId` (`warehouseId`);

--
-- Indexes for table `tblzipcode`
--
ALTER TABLE `tblzipcode`
  ADD PRIMARY KEY (`zipCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD CONSTRAINT `tblaccount_ibfk_1` FOREIGN KEY (`personId`) REFERENCES `tblperson` (`personId`),
  ADD CONSTRAINT `tblaccount_ibfk_2` FOREIGN KEY (`accountStatus`) REFERENCES `tbluserstatus` (`statusId`),
  ADD CONSTRAINT `tblaccount_ibfk_3` FOREIGN KEY (`userTypeId`) REFERENCES `tblusertype` (`userTypeId`);

--
-- Constraints for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD CONSTRAINT `tbladmin_ibfk_1` FOREIGN KEY (`personId`) REFERENCES `tblperson` (`personId`),
  ADD CONSTRAINT `tbladmin_ibfk_2` FOREIGN KEY (`adminStatus`) REFERENCES `tbluserstatus` (`statusId`);

--
-- Constraints for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD CONSTRAINT `tblcart_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `tblcustomer` (`customerId`),
  ADD CONSTRAINT `tblcart_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tblproduct` (`productId`);

--
-- Constraints for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD CONSTRAINT `tblcustomer_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `tblmember` (`memberId`),
  ADD CONSTRAINT `tblcustomer_ibfk_2` FOREIGN KEY (`personId`) REFERENCES `tblperson` (`personId`),
  ADD CONSTRAINT `tblcustomer_ibfk_3` FOREIGN KEY (`CustomerStatus`) REFERENCES `tbluserstatus` (`statusId`);

--
-- Constraints for table `tbldelivery`
--
ALTER TABLE `tbldelivery`
  ADD CONSTRAINT `tbldelivery_ibfk_1` FOREIGN KEY (`personId`) REFERENCES `tblperson` (`personId`),
  ADD CONSTRAINT `tbldelivery_ibfk_2` FOREIGN KEY (`deliveryStatus`) REFERENCES `tbluserstatus` (`statusId`),
  ADD CONSTRAINT `tbldelivery_ibfk_3` FOREIGN KEY (`warehouseId`) REFERENCES `tblwarehouse` (`warehouseId`);

--
-- Constraints for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD CONSTRAINT `tblemployee_ibfk_1` FOREIGN KEY (`personId`) REFERENCES `tblperson` (`personId`),
  ADD CONSTRAINT `tblemployee_ibfk_2` FOREIGN KEY (`employeeStatus`) REFERENCES `tbluserstatus` (`statusId`),
  ADD CONSTRAINT `tblemployee_ibfk_3` FOREIGN KEY (`warehouseId`) REFERENCES `tblwarehouse` (`warehouseId`);

--
-- Constraints for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD CONSTRAINT `tblinventory_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tblproduct` (`productId`);

--
-- Constraints for table `tblinventorylog`
--
ALTER TABLE `tblinventorylog`
  ADD CONSTRAINT `tblinventorylog_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `tblcustomer` (`customerId`),
  ADD CONSTRAINT `tblinventorylog_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tblproduct` (`productId`);

--
-- Constraints for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD CONSTRAINT `tblorder_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `tblcustomer` (`customerId`);

--
-- Constraints for table `tblorderline`
--
ALTER TABLE `tblorderline`
  ADD CONSTRAINT `tblorderline_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `tblorder` (`orderId`),
  ADD CONSTRAINT `tblorderline_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tblproduct` (`productId`);

--
-- Constraints for table `tblperson`
--
ALTER TABLE `tblperson`
  ADD CONSTRAINT `tblperson_ibfk_1` FOREIGN KEY (`civilStatusId`) REFERENCES `tblcivilstatus` (`civilStatusId`),
  ADD CONSTRAINT `tblperson_ibfk_2` FOREIGN KEY (`brangayId`) REFERENCES `tblbarangay` (`barangayId`),
  ADD CONSTRAINT `tblperson_ibfk_3` FOREIGN KEY (`cityId`) REFERENCES `tblcity` (`cityId`),
  ADD CONSTRAINT `tblperson_ibfk_4` FOREIGN KEY (`provinceId`) REFERENCES `tblprovince` (`ProvinceId`),
  ADD CONSTRAINT `tblperson_ibfk_5` FOREIGN KEY (`zipCode`) REFERENCES `tblzipcode` (`zipCode`),
  ADD CONSTRAINT `tblperson_ibfk_6` FOREIGN KEY (`sexId`) REFERENCES `tblsex` (`sexId`),
  ADD CONSTRAINT `tblperson_ibfk_7` FOREIGN KEY (`userTypeId`) REFERENCES `tblusertype` (`userTypeId`);

--
-- Constraints for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD CONSTRAINT `tblproduct_ibfk_2` FOREIGN KEY (`statusId`) REFERENCES `tblproductstatus` (`productStatusId`),
  ADD CONSTRAINT `tblproduct_ibfk_4` FOREIGN KEY (`categoryId`) REFERENCES `tblcategory` (`categoryId`),
  ADD CONSTRAINT `tblproduct_ibfk_5` FOREIGN KEY (`subCategoryId`) REFERENCES `tblsubcategory` (`subCategoryId`);

--
-- Constraints for table `tblsale`
--
ALTER TABLE `tblsale`
  ADD CONSTRAINT `tblsale_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `tblcustomer` (`customerId`);

--
-- Constraints for table `tblsalesdetail`
--
ALTER TABLE `tblsalesdetail`
  ADD CONSTRAINT `tblsalesdetail_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tblproduct` (`productId`),
  ADD CONSTRAINT `tblsalesdetail_ibfk_2` FOREIGN KEY (`saleId`) REFERENCES `tblsale` (`saleId`);

--
-- Constraints for table `tblshipment`
--
ALTER TABLE `tblshipment`
  ADD CONSTRAINT `tblshipment_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `tblcustomer` (`customerId`),
  ADD CONSTRAINT `tblshipment_ibfk_2` FOREIGN KEY (`barangayId`) REFERENCES `tblbarangay` (`barangayId`),
  ADD CONSTRAINT `tblshipment_ibfk_3` FOREIGN KEY (`cityId`) REFERENCES `tblcity` (`cityId`),
  ADD CONSTRAINT `tblshipment_ibfk_4` FOREIGN KEY (`orderId`) REFERENCES `tblorder` (`orderId`),
  ADD CONSTRAINT `tblshipment_ibfk_5` FOREIGN KEY (`orderLineId`) REFERENCES `tblorderline` (`orderLineId`),
  ADD CONSTRAINT `tblshipment_ibfk_6` FOREIGN KEY (`provinceId`) REFERENCES `tblprovince` (`ProvinceId`);

--
-- Constraints for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  ADD CONSTRAINT `tblsupplier_ibfk_1` FOREIGN KEY (`statusId`) REFERENCES `tblproductstatus` (`productStatusId`);

--
-- Constraints for table `tblwarehouse`
--
ALTER TABLE `tblwarehouse`
  ADD CONSTRAINT `tblwarehouse_ibfk_1` FOREIGN KEY (`cityId`) REFERENCES `tblcity` (`cityId`),
  ADD CONSTRAINT `tblwarehouse_ibfk_2` FOREIGN KEY (`ProvinceId`) REFERENCES `tblprovince` (`ProvinceId`),
  ADD CONSTRAINT `tblwarehouse_ibfk_3` FOREIGN KEY (`statusId`) REFERENCES `tbluserstatus` (`statusId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
