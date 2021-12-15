-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 08:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyvemaybay`
--

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE `airline` (
  `AirlineID` char(3) COLLATE utf8_vietnamese_ci NOT NULL,
  `AirlineName` varchar(25) COLLATE utf8_vietnamese_ci NOT NULL,
  `CountryID` char(3) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `airline`
--

INSERT INTO `airline` (`AirlineID`, `AirlineName`, `CountryID`) VALUES
('BL', 'Pacific Airlines', 'VN'),
('VJ', 'Vietjet Air', 'VN'),
('VN', 'Vietnam Airlines', 'VN');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `AirportID` char(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `AirportName` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `CityID` char(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `State` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Length` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`AirportID`, `AirportName`, `CityID`, `State`, `Length`) VALUES
('BKK', 'Suvarnabhumi', 'BK', 'Hoạt động', 4),
('DAD', 'Đà Nẵng', 'DN', 'Hoạt động', 4),
('DEL', 'Indira Gandhi', 'NDH', 'Hoạt động', 4),
('DMK', 'Don Mueang', 'BK', 'Hoạt động', 4),
('HAN', 'Nội Bài', 'HN', 'Hoạt động', 4),
('HND', 'Haneda', 'TKY', 'Hoạt động', 4),
('ICN', 'Incheon', 'SEO', 'Hoạt động', 4),
('NRT', 'Narita', 'TKY', 'Hoạt động', 4),
('SGN', 'Tân Sơn Nhất', 'TPHCM', 'Hoạt động', 4),
('VCS', 'Côn Đảo', 'BRVT', 'Hoạt động', 4);

-- --------------------------------------------------------

--
-- Table structure for table `baggage`
--

CREATE TABLE `baggage` (
  `BaggageID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `baggage`
--

INSERT INTO `baggage` (`BaggageID`, `Price`, `Weight`) VALUES
(1, 165000, 15),
(2, 187000, 20),
(3, 251000, 25),
(4, 358000, 30);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityID` char(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `CityName` varchar(25) COLLATE utf8_vietnamese_ci NOT NULL,
  `CountryID` char(3) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityID`, `CityName`, `CountryID`) VALUES
('BK', 'Bangkok', 'TH'),
('BRVT', 'Bà Rịa - Vũng Tàu', 'VN'),
('CD', 'Côn Đảo', 'VN'),
('DN', 'Đà Nẵng', 'VN'),
('HN', 'Hà Nội', 'VN'),
('HSH', 'Honshu', 'JP'),
('NDH', 'New Delhi', 'IN'),
('SEO', 'Seoul', 'KR'),
('TKY', 'Tokyo', 'JP'),
('TPHCM', 'Hồ Chí Minh', 'VN'),
('VT', 'Vientiane', 'LA');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryID` char(3) COLLATE utf8_vietnamese_ci NOT NULL,
  `CountryName` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryID`, `CountryName`) VALUES
('CN', 'Trung Quốc'),
('IN', 'Ấn Độ'),
('JP', 'Nhật Bản'),
('KR', 'Hàn Quốc'),
('LA', 'Lào'),
('RU', 'Liên Bang Nga'),
('SG', 'Singapore'),
('TH', 'Thái Lan'),
('US', 'Hoa Kỳ'),
('VN', 'Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `Fullname` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Phonenumber` char(11) COLLATE utf8_vietnamese_ci NOT NULL,
  `Gender` char(4) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Fullname`, `Email`, `Password`, `Phonenumber`, `Gender`) VALUES
(1, 'Minh Híu', 'hiu123@vemaybay.com', 'hiu123', '0943028493', 'Nam'),
(2, 'Nguyễn Vĩnh Tiến', 'tien23851@vemaybay.com', 'toan123', '0932430072', 'Nữ'),
(3, 'Lê Ngọc Tòn', 'nhanvien2@vemaybay.com', 'werw', '0924559304', 'Nữ'),
(4, 'trí bi benh', 'starbutterfly652@vemaybay.com', 'toan123', '0932430071', 'Nam'),
(5, 'trí bi benh', 'starbutterfly652@vemaybay.com', 'toan123', '0932430071', 'Nam'),
(10, 'wer3rq34', 'starbutterfly652@gmail.com', 'ercfref', '0932430072', 'Nữ'),
(11, 'Vinh Tien', 'tien231@gmail.com', 'vinhtien1234', '0932430072', 'Nam'),
(12, 'Nguyen Vinh Tien', 'tien231@gmail.com', 'vinhtien1234', '0932430072', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `FlightID` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `PlaneID` char(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `AirlineID` char(3) COLLATE utf8_vietnamese_ci NOT NULL,
  `PathID` char(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `EndDate` date NOT NULL,
  `AdultPrice` int(11) DEFAULT NULL,
  `ChildrenPrice` int(11) DEFAULT NULL,
  `ToddlerPrice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`FlightID`, `StartDate`, `StartTime`, `EndTime`, `PlaneID`, `AirlineID`, `PathID`, `EndDate`, `AdultPrice`, `ChildrenPrice`, `ToddlerPrice`) VALUES
(1, '2021-12-18', '04:00:00', '07:00:00', 'ABA321', 'VN', 'DAD-HAN', '2021-12-18', 1200000, 900000, 500000),
(2, '2021-12-18', '23:00:00', '03:15:00', 'ABA330', 'VJ', 'DAD-HAN', '2021-12-19', 990000, 750000, 340000),
(3, '2021-12-18', '05:30:00', '08:30:00', 'ABA321', 'BL', 'DAD-HAN', '2021-12-18', 1200000, 950000, 350000),
(4, '2021-12-20', '07:40:00', '10:40:00', 'ABA330', 'VJ', 'HAN-DAD', '2021-12-20', 970000, 515000, 340000);

-- --------------------------------------------------------

--
-- Table structure for table `flightpath`
--

CREATE TABLE `flightpath` (
  `PathID` char(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `StartAirport` char(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `EndAirport` char(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `flightpath`
--

INSERT INTO `flightpath` (`PathID`, `StartAirport`, `EndAirport`, `Time`) VALUES
('DAD-HAN', 'DAD', 'HAN', '03:00:00'),
('DAD-SGN', 'DAD', 'SGN', '04:15:00'),
('HAN-DAD', 'HAN', 'DAD', '03:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemberID` int(11) NOT NULL,
  `Fullname` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Phonenumber` char(11) COLLATE utf8_vietnamese_ci NOT NULL,
  `Gender` char(4) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberID`, `Fullname`, `Email`, `Password`, `Phonenumber`, `Gender`) VALUES
(1, 'Nguyễn Vĩnh Tiến', 'tien23851@gmail.com', 'vinhtien123', '0932430072', 'Nam'),
(2, 'Ngyen Vinh TIen', 'tien231@gmail.com', 'vinhtien123', '0933445684', 'Nam'),
(3, 'e42fgrtnryj bfv ', 'tienervwer231@gmail.com', 'vinhtien123', '0965331211', 'Nam'),
(4, 'nguyen vinh tien', 'tien34@gmail.com', 'vinhtien123', '0945568333', 'Nam'),
(5, 'nguyenvinhtien', 'tien33424@gmail.com', 'vinhtien123', '0945678432', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderID` int(11) NOT NULL,
  `TicketID` int(11) NOT NULL,
  `PassengerName` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Age` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `TicketPrice` int(11) NOT NULL,
  `BaggagePrice` int(11) NOT NULL,
  `BaggageWeight` int(11) NOT NULL,
  `SeatCode` varchar(3) COLLATE utf8_vietnamese_ci NOT NULL,
  `Class` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `Type` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `BaggageID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderID`, `TicketID`, `PassengerName`, `Age`, `TicketPrice`, `BaggagePrice`, `BaggageWeight`, `SeatCode`, `Class`, `Type`, `BaggageID`) VALUES
(23, 215, 't43gtgt4', 'Children', 1900000, 165000, 15, '4E', 'Business', 'Chuyến Đi', NULL),
(23, 216, '4tg34g3t5rg', 'Adult', 2400000, 0, 0, '4F', 'Business', 'Chuyến Đi', NULL),
(26, 215, '456yjnhbvgb', 'Children', 1900000, 251000, 25, '4E', 'Business', 'Chuyến Đi', NULL),
(26, 216, 'erfefg3t5rg', 'Children', 1900000, 0, 0, '4F', 'Business', 'Chuyến Đi', NULL),
(27, 226, '4g5btwhnwber', 'Children', 950000, 165000, 15, '6D', 'Economy', 'Chuyến Đi', NULL),
(27, 227, 'vbtrtgrwbre', 'Toddler', 350000, 0, 0, '6E', 'Economy', 'Chuyến Đi', NULL),
(28, 12, 'cerwvrewvwr', 'Adult', 1980000, 165000, 15, '2F', 'Business', 'Chuyến Đi', NULL),
(28, 198, 'gthy4j6he', 'Toddler', 700000, 165000, 15, '1F', 'Business', 'Chuyến đi', NULL),
(28, 210, 'vb3ytwvrarf', 'Children', 1900000, 165000, 15, '3F', 'Business', 'Chuyến đi', NULL),
(28, 258, 'tvbtbetbsrvr', 'Children', 515000, 165000, 15, '11F', 'Economy', 'Chuyến đi', NULL),
(28, 408, 'rwfgrtgerrg', 'Children', 1030000, 165000, 15, '4F', 'Business', 'Chuyến Về', NULL),
(31, 204, 'vtbnymui', 'Children', 1900000, 165000, 15, '2F', 'Business', 'Chuyến đi', NULL),
(31, 390, 'n bdfcrdrfd', 'Children', 1900000, 0, 0, '1F', 'Business', 'Chuyến Về', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `FlightID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `State` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `OrderDate` date NOT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `ContactEmail` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `ContactName` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `TotalWeight` int(11) NOT NULL,
  `ReturnFlight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `FlightID`, `Quantity`, `TotalPrice`, `State`, `EmployeeID`, `OrderDate`, `MemberID`, `ContactEmail`, `ContactName`, `Address`, `TotalWeight`, `ReturnFlight`) VALUES
(23, 3, 2, 4465000, 'Đã Thanh Toán', NULL, '2021-12-11', 5, 'nhanvien2@vemaybay.com', 'Lê Ngọc Tòn', '4trtt4r34tr', 15, NULL),
(26, 3, 2, 4051000, 'Đã Thanh Toán', NULL, '2021-12-11', 5, 'tien231@gmail.com', 'fghtwgq4', '4trtt4r34tr', 25, NULL),
(27, 3, 2, 1465000, 'Đã Thanh Toán', NULL, '2021-12-12', 5, 'tien231@gmail.com', '4gbh2q34g', '34gbwt4gea', 15, NULL),
(28, 2, 1, 2145000, 'Đã Thanh Toán', NULL, '2021-12-14', 5, 'tien231@gmail.com', '4t56h3g', 'f4vr4rvr', 15, NULL),
(31, 3, 2, 3965000, 'Chưa thanh toán', NULL, '2021-12-15', 1, 'starbutterfly652@gmail.com', 'wer3rq34', 'bhnehvrsae', 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE `plane` (
  `PlaneID` char(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `PlaneName` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `State` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `SeatAmount` int(11) NOT NULL,
  `Rows` int(11) DEFAULT NULL,
  `Columns` int(11) DEFAULT NULL,
  `BusinessClassRow` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `plane`
--

INSERT INTO `plane` (`PlaneID`, `PlaneName`, `State`, `SeatAmount`, `Rows`, `Columns`, `BusinessClassRow`) VALUES
('ABA321', 'Airbus A321', 'Active', 192, 32, 6, 4),
('ABA330', 'Airbus A330', 'Active', 186, 31, 6, 4),
('ABA350', 'Airbus A350', 'Active', 30, NULL, NULL, NULL),
('ATR72', 'ATR72-500', 'Active', 30, NULL, NULL, NULL),
('BOE737M', 'Boeing 737 MAX', 'Active', 30, NULL, NULL, NULL),
('BOE787', 'Boeing 787', 'Active', 261, 29, 9, 3),
('BOE7879', 'Boeing 787-9 Dreamliner', 'Active', 30, NULL, NULL, 4),
('EME195', 'Embrear E195', 'Active', 30, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TicketID` int(11) NOT NULL,
  `State` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `SeatCode` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL,
  `FlightID` int(11) NOT NULL,
  `Class` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`TicketID`, `State`, `SeatCode`, `FlightID`, `Class`) VALUES
(1, 'Empty', '1A', 2, 'Business'),
(2, 'Empty', '1B', 2, 'Business'),
(3, 'Empty', '1C', 2, 'Business'),
(4, 'Empty', '1D', 2, 'Business'),
(5, 'Empty', '1E', 2, 'Business'),
(6, 'Empty', '1F', 2, 'Business'),
(7, 'Empty', '2A', 2, 'Business'),
(8, 'Empty', '2B', 2, 'Business'),
(9, 'Empty', '2C', 2, 'Business'),
(10, 'Empty', '2D', 2, 'Business'),
(11, 'Empty', '2E', 2, 'Business'),
(12, 'Occupied', '2F', 2, 'Business'),
(13, 'Empty', '3A', 2, 'Business'),
(14, 'Empty', '3B', 2, 'Business'),
(15, 'Empty', '3C', 2, 'Business'),
(16, 'Empty', '3D', 2, 'Business'),
(17, 'Empty', '3E', 2, 'Business'),
(18, 'Empty', '3F', 2, 'Business'),
(19, 'Empty', '4A', 2, 'Business'),
(20, 'Empty', '4B', 2, 'Business'),
(21, 'Empty', '4C', 2, 'Business'),
(22, 'Empty', '4D', 2, 'Business'),
(23, 'Empty', '4E', 2, 'Business'),
(24, 'Empty', '4F', 2, 'Business'),
(25, 'Empty', '5A', 2, 'Economy'),
(26, 'Empty', '5B', 2, 'Economy'),
(27, 'Empty', '5C', 2, 'Economy'),
(28, 'Empty', '5D', 2, 'Economy'),
(29, 'Empty', '5E', 2, 'Economy'),
(30, 'Empty', '5F', 2, 'Economy'),
(31, 'Empty', '6A', 2, 'Economy'),
(32, 'Empty', '6B', 2, 'Economy'),
(33, 'Empty', '6C', 2, 'Economy'),
(34, 'Empty', '6D', 2, 'Economy'),
(35, 'Empty', '6E', 2, 'Economy'),
(36, 'Empty', '6F', 2, 'Economy'),
(37, 'Empty', '7A', 2, 'Economy'),
(38, 'Empty', '7B', 2, 'Economy'),
(39, 'Empty', '7C', 2, 'Economy'),
(40, 'Empty', '7D', 2, 'Economy'),
(41, 'Empty', '7E', 2, 'Economy'),
(42, 'Empty', '7F', 2, 'Economy'),
(43, 'Empty', '8A', 2, 'Economy'),
(44, 'Empty', '8B', 2, 'Economy'),
(45, 'Empty', '8C', 2, 'Economy'),
(46, 'Empty', '8D', 2, 'Economy'),
(47, 'Empty', '8E', 2, 'Economy'),
(48, 'Empty', '8F', 2, 'Economy'),
(49, 'Empty', '9A', 2, 'Economy'),
(50, 'Empty', '9B', 2, 'Economy'),
(51, 'Empty', '9C', 2, 'Economy'),
(52, 'Empty', '9D', 2, 'Economy'),
(53, 'Empty', '9E', 2, 'Economy'),
(54, 'Empty', '9F', 2, 'Economy'),
(55, 'Empty', '10A', 2, 'Economy'),
(56, 'Empty', '10B', 2, 'Economy'),
(57, 'Empty', '10C', 2, 'Economy'),
(58, 'Empty', '10D', 2, 'Economy'),
(59, 'Empty', '10E', 2, 'Economy'),
(60, 'Empty', '10F', 2, 'Economy'),
(61, 'Empty', '11A', 2, 'Economy'),
(62, 'Empty', '11B', 2, 'Economy'),
(63, 'Empty', '11C', 2, 'Economy'),
(64, 'Empty', '11D', 2, 'Economy'),
(65, 'Empty', '11E', 2, 'Economy'),
(66, 'Empty', '11F', 2, 'Economy'),
(67, 'Empty', '12A', 2, 'Economy'),
(68, 'Empty', '12B', 2, 'Economy'),
(69, 'Empty', '12C', 2, 'Economy'),
(70, 'Empty', '12D', 2, 'Economy'),
(71, 'Empty', '12E', 2, 'Economy'),
(72, 'Empty', '12F', 2, 'Economy'),
(73, 'Empty', '13A', 2, 'Economy'),
(74, 'Empty', '13B', 2, 'Economy'),
(75, 'Empty', '13C', 2, 'Economy'),
(76, 'Empty', '13D', 2, 'Economy'),
(77, 'Empty', '13E', 2, 'Economy'),
(78, 'Empty', '13F', 2, 'Economy'),
(79, 'Empty', '14A', 2, 'Economy'),
(80, 'Empty', '14B', 2, 'Economy'),
(81, 'Empty', '14C', 2, 'Economy'),
(82, 'Empty', '14D', 2, 'Economy'),
(83, 'Empty', '14E', 2, 'Economy'),
(84, 'Empty', '14F', 2, 'Economy'),
(85, 'Empty', '15A', 2, 'Economy'),
(86, 'Empty', '15B', 2, 'Economy'),
(87, 'Empty', '15C', 2, 'Economy'),
(88, 'Empty', '15D', 2, 'Economy'),
(89, 'Empty', '15E', 2, 'Economy'),
(90, 'Empty', '15F', 2, 'Economy'),
(91, 'Empty', '16A', 2, 'Economy'),
(92, 'Empty', '16B', 2, 'Economy'),
(93, 'Empty', '16C', 2, 'Economy'),
(94, 'Empty', '16D', 2, 'Economy'),
(95, 'Empty', '16E', 2, 'Economy'),
(96, 'Empty', '16F', 2, 'Economy'),
(97, 'Empty', '17A', 2, 'Economy'),
(98, 'Empty', '17B', 2, 'Economy'),
(99, 'Empty', '17C', 2, 'Economy'),
(100, 'Empty', '17D', 2, 'Economy'),
(101, 'Empty', '17E', 2, 'Economy'),
(102, 'Empty', '17F', 2, 'Economy'),
(103, 'Empty', '18A', 2, 'Economy'),
(104, 'Empty', '18B', 2, 'Economy'),
(105, 'Empty', '18C', 2, 'Economy'),
(106, 'Empty', '18D', 2, 'Economy'),
(107, 'Empty', '18E', 2, 'Economy'),
(108, 'Empty', '18F', 2, 'Economy'),
(109, 'Empty', '19A', 2, 'Economy'),
(110, 'Empty', '19B', 2, 'Economy'),
(111, 'Empty', '19C', 2, 'Economy'),
(112, 'Empty', '19D', 2, 'Economy'),
(113, 'Empty', '19E', 2, 'Economy'),
(114, 'Empty', '19F', 2, 'Economy'),
(115, 'Empty', '20A', 2, 'Economy'),
(116, 'Empty', '20B', 2, 'Economy'),
(117, 'Empty', '20C', 2, 'Economy'),
(118, 'Empty', '20D', 2, 'Economy'),
(119, 'Empty', '20E', 2, 'Economy'),
(120, 'Empty', '20F', 2, 'Economy'),
(121, 'Empty', '21A', 2, 'Economy'),
(122, 'Empty', '21B', 2, 'Economy'),
(123, 'Empty', '21C', 2, 'Economy'),
(124, 'Empty', '21D', 2, 'Economy'),
(125, 'Empty', '21E', 2, 'Economy'),
(126, 'Empty', '21F', 2, 'Economy'),
(127, 'Empty', '22A', 2, 'Economy'),
(128, 'Empty', '22B', 2, 'Economy'),
(129, 'Empty', '22C', 2, 'Economy'),
(130, 'Empty', '22D', 2, 'Economy'),
(131, 'Empty', '22E', 2, 'Economy'),
(132, 'Empty', '22F', 2, 'Economy'),
(133, 'Empty', '23A', 2, 'Economy'),
(134, 'Empty', '23B', 2, 'Economy'),
(135, 'Empty', '23C', 2, 'Economy'),
(136, 'Empty', '23D', 2, 'Economy'),
(137, 'Empty', '23E', 2, 'Economy'),
(138, 'Empty', '23F', 2, 'Economy'),
(139, 'Empty', '24A', 2, 'Economy'),
(140, 'Empty', '24B', 2, 'Economy'),
(141, 'Empty', '24C', 2, 'Economy'),
(142, 'Empty', '24D', 2, 'Economy'),
(143, 'Empty', '24E', 2, 'Economy'),
(144, 'Empty', '24F', 2, 'Economy'),
(145, 'Empty', '25A', 2, 'Economy'),
(146, 'Empty', '25B', 2, 'Economy'),
(147, 'Empty', '25C', 2, 'Economy'),
(148, 'Empty', '25D', 2, 'Economy'),
(149, 'Empty', '25E', 2, 'Economy'),
(150, 'Empty', '25F', 2, 'Economy'),
(151, 'Empty', '26A', 2, 'Economy'),
(152, 'Empty', '26B', 2, 'Economy'),
(153, 'Empty', '26C', 2, 'Economy'),
(154, 'Empty', '26D', 2, 'Economy'),
(155, 'Empty', '26E', 2, 'Economy'),
(156, 'Empty', '26F', 2, 'Economy'),
(157, 'Empty', '27A', 2, 'Economy'),
(158, 'Empty', '27B', 2, 'Economy'),
(159, 'Empty', '27C', 2, 'Economy'),
(160, 'Empty', '27D', 2, 'Economy'),
(161, 'Empty', '27E', 2, 'Economy'),
(162, 'Empty', '27F', 2, 'Economy'),
(163, 'Empty', '28A', 2, 'Economy'),
(164, 'Empty', '28B', 2, 'Economy'),
(165, 'Empty', '28C', 2, 'Economy'),
(166, 'Empty', '28D', 2, 'Economy'),
(167, 'Empty', '28E', 2, 'Economy'),
(168, 'Empty', '28F', 2, 'Economy'),
(169, 'Empty', '29A', 2, 'Economy'),
(170, 'Empty', '29B', 2, 'Economy'),
(171, 'Empty', '29C', 2, 'Economy'),
(172, 'Empty', '29D', 2, 'Economy'),
(173, 'Empty', '29E', 2, 'Economy'),
(174, 'Empty', '29F', 2, 'Economy'),
(175, 'Empty', '30A', 2, 'Economy'),
(176, 'Empty', '30B', 2, 'Economy'),
(177, 'Empty', '30C', 2, 'Economy'),
(178, 'Empty', '30D', 2, 'Economy'),
(179, 'Empty', '30E', 2, 'Economy'),
(180, 'Empty', '30F', 2, 'Economy'),
(181, 'Empty', '31A', 2, 'Economy'),
(182, 'Empty', '31B', 2, 'Economy'),
(183, 'Empty', '31C', 2, 'Economy'),
(184, 'Empty', '31D', 2, 'Economy'),
(185, 'Empty', '31E', 2, 'Economy'),
(186, 'Empty', '31F', 2, 'Economy'),
(187, 'Empty', '32A', 2, 'Economy'),
(188, 'Empty', '32B', 2, 'Economy'),
(189, 'Empty', '32C', 2, 'Economy'),
(190, 'Empty', '32D', 2, 'Economy'),
(191, 'Empty', '32E', 2, 'Economy'),
(192, 'Empty', '32F', 2, 'Economy'),
(193, 'Occupied', '1A', 3, 'Business'),
(194, 'Occupied', '1B', 3, 'Business'),
(195, 'Empty', '1C', 3, 'Business'),
(196, 'Empty', '1D', 3, 'Business'),
(197, 'Empty', '1E', 3, 'Business'),
(198, 'Occupied', '1F', 3, 'Business'),
(199, 'Empty', '2A', 3, 'Business'),
(200, 'Empty', '2B', 3, 'Business'),
(201, 'Empty', '2C', 3, 'Business'),
(202, 'Empty', '2D', 3, 'Business'),
(203, 'Empty', '2E', 3, 'Business'),
(204, 'Occupied', '2F', 3, 'Business'),
(205, 'Empty', '3A', 3, 'Business'),
(206, 'Empty', '3B', 3, 'Business'),
(207, 'Empty', '3C', 3, 'Business'),
(208, 'Empty', '3D', 3, 'Business'),
(209, 'Empty', '3E', 3, 'Business'),
(210, 'Occupied', '3F', 3, 'Business'),
(211, 'Empty', '4A', 3, 'Business'),
(212, 'Empty', '4B', 3, 'Business'),
(213, 'Empty', '4C', 3, 'Business'),
(214, 'Empty', '4D', 3, 'Business'),
(215, 'Occupied', '4E', 3, 'Business'),
(216, 'Occupied', '4F', 3, 'Business'),
(217, 'Empty', '5A', 3, 'Economy'),
(218, 'Occupied', '5B', 3, 'Economy'),
(219, 'Occupied', '5C', 3, 'Economy'),
(220, 'Empty', '5D', 3, 'Economy'),
(221, 'Occupied', '5E', 3, 'Economy'),
(222, 'Occupied', '5F', 3, 'Economy'),
(223, 'Empty', '6A', 3, 'Economy'),
(224, 'Empty', '6B', 3, 'Economy'),
(225, 'Empty', '6C', 3, 'Economy'),
(226, 'Occupied', '6D', 3, 'Economy'),
(227, 'Occupied', '6E', 3, 'Economy'),
(228, 'Empty', '6F', 3, 'Economy'),
(229, 'Empty', '7A', 3, 'Economy'),
(230, 'Empty', '7B', 3, 'Economy'),
(231, 'Empty', '7C', 3, 'Economy'),
(232, 'Empty', '7D', 3, 'Economy'),
(233, 'Empty', '7E', 3, 'Economy'),
(234, 'Empty', '7F', 3, 'Economy'),
(235, 'Empty', '8A', 3, 'Economy'),
(236, 'Empty', '8B', 3, 'Economy'),
(237, 'Empty', '8C', 3, 'Economy'),
(238, 'Empty', '8D', 3, 'Economy'),
(239, 'Empty', '8E', 3, 'Economy'),
(240, 'Empty', '8F', 3, 'Economy'),
(241, 'Empty', '9A', 3, 'Economy'),
(242, 'Empty', '9B', 3, 'Economy'),
(243, 'Empty', '9C', 3, 'Economy'),
(244, 'Empty', '9D', 3, 'Economy'),
(245, 'Empty', '9E', 3, 'Economy'),
(246, 'Empty', '9F', 3, 'Economy'),
(247, 'Empty', '10A', 3, 'Economy'),
(248, 'Empty', '10B', 3, 'Economy'),
(249, 'Empty', '10C', 3, 'Economy'),
(250, 'Empty', '10D', 3, 'Economy'),
(251, 'Empty', '10E', 3, 'Economy'),
(252, 'Empty', '10F', 3, 'Economy'),
(253, 'Empty', '11A', 3, 'Economy'),
(254, 'Empty', '11B', 3, 'Economy'),
(255, 'Empty', '11C', 3, 'Economy'),
(256, 'Empty', '11D', 3, 'Economy'),
(257, 'Empty', '11E', 3, 'Economy'),
(258, 'Occupied', '11F', 3, 'Economy'),
(259, 'Empty', '12A', 3, 'Economy'),
(260, 'Empty', '12B', 3, 'Economy'),
(261, 'Empty', '12C', 3, 'Economy'),
(262, 'Empty', '12D', 3, 'Economy'),
(263, 'Empty', '12E', 3, 'Economy'),
(264, 'Empty', '12F', 3, 'Economy'),
(265, 'Empty', '13A', 3, 'Economy'),
(266, 'Empty', '13B', 3, 'Economy'),
(267, 'Empty', '13C', 3, 'Economy'),
(268, 'Empty', '13D', 3, 'Economy'),
(269, 'Empty', '13E', 3, 'Economy'),
(270, 'Empty', '13F', 3, 'Economy'),
(271, 'Empty', '14A', 3, 'Economy'),
(272, 'Empty', '14B', 3, 'Economy'),
(273, 'Empty', '14C', 3, 'Economy'),
(274, 'Empty', '14D', 3, 'Economy'),
(275, 'Empty', '14E', 3, 'Economy'),
(276, 'Empty', '14F', 3, 'Economy'),
(277, 'Empty', '15A', 3, 'Economy'),
(278, 'Empty', '15B', 3, 'Economy'),
(279, 'Empty', '15C', 3, 'Economy'),
(280, 'Empty', '15D', 3, 'Economy'),
(281, 'Empty', '15E', 3, 'Economy'),
(282, 'Empty', '15F', 3, 'Economy'),
(283, 'Empty', '16A', 3, 'Economy'),
(284, 'Empty', '16B', 3, 'Economy'),
(285, 'Empty', '16C', 3, 'Economy'),
(286, 'Empty', '16D', 3, 'Economy'),
(287, 'Empty', '16E', 3, 'Economy'),
(288, 'Empty', '16F', 3, 'Economy'),
(289, 'Empty', '17A', 3, 'Economy'),
(290, 'Empty', '17B', 3, 'Economy'),
(291, 'Empty', '17C', 3, 'Economy'),
(292, 'Empty', '17D', 3, 'Economy'),
(293, 'Empty', '17E', 3, 'Economy'),
(294, 'Empty', '17F', 3, 'Economy'),
(295, 'Empty', '18A', 3, 'Economy'),
(296, 'Empty', '18B', 3, 'Economy'),
(297, 'Empty', '18C', 3, 'Economy'),
(298, 'Empty', '18D', 3, 'Economy'),
(299, 'Empty', '18E', 3, 'Economy'),
(300, 'Empty', '18F', 3, 'Economy'),
(301, 'Empty', '19A', 3, 'Economy'),
(302, 'Empty', '19B', 3, 'Economy'),
(303, 'Empty', '19C', 3, 'Economy'),
(304, 'Empty', '19D', 3, 'Economy'),
(305, 'Empty', '19E', 3, 'Economy'),
(306, 'Empty', '19F', 3, 'Economy'),
(307, 'Empty', '20A', 3, 'Economy'),
(308, 'Empty', '20B', 3, 'Economy'),
(309, 'Empty', '20C', 3, 'Economy'),
(310, 'Empty', '20D', 3, 'Economy'),
(311, 'Empty', '20E', 3, 'Economy'),
(312, 'Empty', '20F', 3, 'Economy'),
(313, 'Empty', '21A', 3, 'Economy'),
(314, 'Empty', '21B', 3, 'Economy'),
(315, 'Empty', '21C', 3, 'Economy'),
(316, 'Empty', '21D', 3, 'Economy'),
(317, 'Empty', '21E', 3, 'Economy'),
(318, 'Empty', '21F', 3, 'Economy'),
(319, 'Empty', '22A', 3, 'Economy'),
(320, 'Empty', '22B', 3, 'Economy'),
(321, 'Empty', '22C', 3, 'Economy'),
(322, 'Empty', '22D', 3, 'Economy'),
(323, 'Empty', '22E', 3, 'Economy'),
(324, 'Empty', '22F', 3, 'Economy'),
(325, 'Empty', '23A', 3, 'Economy'),
(326, 'Empty', '23B', 3, 'Economy'),
(327, 'Empty', '23C', 3, 'Economy'),
(328, 'Empty', '23D', 3, 'Economy'),
(329, 'Empty', '23E', 3, 'Economy'),
(330, 'Empty', '23F', 3, 'Economy'),
(331, 'Empty', '24A', 3, 'Economy'),
(332, 'Empty', '24B', 3, 'Economy'),
(333, 'Empty', '24C', 3, 'Economy'),
(334, 'Empty', '24D', 3, 'Economy'),
(335, 'Empty', '24E', 3, 'Economy'),
(336, 'Empty', '24F', 3, 'Economy'),
(337, 'Empty', '25A', 3, 'Economy'),
(338, 'Empty', '25B', 3, 'Economy'),
(339, 'Empty', '25C', 3, 'Economy'),
(340, 'Empty', '25D', 3, 'Economy'),
(341, 'Empty', '25E', 3, 'Economy'),
(342, 'Empty', '25F', 3, 'Economy'),
(343, 'Empty', '26A', 3, 'Economy'),
(344, 'Empty', '26B', 3, 'Economy'),
(345, 'Empty', '26C', 3, 'Economy'),
(346, 'Empty', '26D', 3, 'Economy'),
(347, 'Empty', '26E', 3, 'Economy'),
(348, 'Empty', '26F', 3, 'Economy'),
(349, 'Empty', '27A', 3, 'Economy'),
(350, 'Empty', '27B', 3, 'Economy'),
(351, 'Empty', '27C', 3, 'Economy'),
(352, 'Empty', '27D', 3, 'Economy'),
(353, 'Empty', '27E', 3, 'Economy'),
(354, 'Empty', '27F', 3, 'Economy'),
(355, 'Empty', '28A', 3, 'Economy'),
(356, 'Empty', '28B', 3, 'Economy'),
(357, 'Empty', '28C', 3, 'Economy'),
(358, 'Empty', '28D', 3, 'Economy'),
(359, 'Empty', '28E', 3, 'Economy'),
(360, 'Empty', '28F', 3, 'Economy'),
(361, 'Empty', '29A', 3, 'Economy'),
(362, 'Empty', '29B', 3, 'Economy'),
(363, 'Empty', '29C', 3, 'Economy'),
(364, 'Empty', '29D', 3, 'Economy'),
(365, 'Empty', '29E', 3, 'Economy'),
(366, 'Empty', '29F', 3, 'Economy'),
(367, 'Empty', '30A', 3, 'Economy'),
(368, 'Empty', '30B', 3, 'Economy'),
(369, 'Empty', '30C', 3, 'Economy'),
(370, 'Empty', '30D', 3, 'Economy'),
(371, 'Empty', '30E', 3, 'Economy'),
(372, 'Empty', '30F', 3, 'Economy'),
(373, 'Empty', '31A', 3, 'Economy'),
(374, 'Empty', '31B', 3, 'Economy'),
(375, 'Empty', '31C', 3, 'Economy'),
(376, 'Empty', '31D', 3, 'Economy'),
(377, 'Empty', '31E', 3, 'Economy'),
(378, 'Empty', '31F', 3, 'Economy'),
(379, 'Empty', '32A', 3, 'Economy'),
(380, 'Empty', '32B', 3, 'Economy'),
(381, 'Empty', '32C', 3, 'Economy'),
(382, 'Empty', '32D', 3, 'Economy'),
(383, 'Empty', '32E', 3, 'Economy'),
(384, 'Empty', '32F', 3, 'Economy'),
(385, 'Empty', '1A', 4, 'Business'),
(386, 'Empty', '1B', 4, 'Business'),
(387, 'Empty', '1C', 4, 'Business'),
(388, 'Empty', '1D', 4, 'Business'),
(389, 'Empty', '1E', 4, 'Business'),
(390, 'Occupied', '1F', 4, 'Business'),
(391, 'Empty', '2A', 4, 'Business'),
(392, 'Empty', '2B', 4, 'Business'),
(393, 'Empty', '2C', 4, 'Business'),
(394, 'Empty', '2D', 4, 'Business'),
(395, 'Empty', '2E', 4, 'Business'),
(396, 'Empty', '2F', 4, 'Business'),
(397, 'Empty', '3A', 4, 'Business'),
(398, 'Empty', '3B', 4, 'Business'),
(399, 'Empty', '3C', 4, 'Business'),
(400, 'Empty', '3D', 4, 'Business'),
(401, 'Empty', '3E', 4, 'Business'),
(402, 'Empty', '3F', 4, 'Business'),
(403, 'Empty', '4A', 4, 'Business'),
(404, 'Empty', '4B', 4, 'Business'),
(405, 'Empty', '4C', 4, 'Business'),
(406, 'Empty', '4D', 4, 'Business'),
(407, 'Empty', '4E', 4, 'Business'),
(408, 'Occupied', '4F', 4, 'Business'),
(409, 'Empty', '5A', 4, 'Economy'),
(410, 'Empty', '5B', 4, 'Economy'),
(411, 'Empty', '5C', 4, 'Economy'),
(412, 'Empty', '5D', 4, 'Economy'),
(413, 'Empty', '5E', 4, 'Economy'),
(414, 'Empty', '5F', 4, 'Economy'),
(415, 'Empty', '6A', 4, 'Economy'),
(416, 'Empty', '6B', 4, 'Economy'),
(417, 'Empty', '6C', 4, 'Economy'),
(418, 'Empty', '6D', 4, 'Economy'),
(419, 'Empty', '6E', 4, 'Economy'),
(420, 'Empty', '6F', 4, 'Economy'),
(421, 'Empty', '7A', 4, 'Economy'),
(422, 'Empty', '7B', 4, 'Economy'),
(423, 'Empty', '7C', 4, 'Economy'),
(424, 'Empty', '7D', 4, 'Economy'),
(425, 'Empty', '7E', 4, 'Economy'),
(426, 'Empty', '7F', 4, 'Economy'),
(427, 'Empty', '8A', 4, 'Economy'),
(428, 'Empty', '8B', 4, 'Economy'),
(429, 'Empty', '8C', 4, 'Economy'),
(430, 'Empty', '8D', 4, 'Economy'),
(431, 'Empty', '8E', 4, 'Economy'),
(432, 'Empty', '8F', 4, 'Economy'),
(433, 'Empty', '9A', 4, 'Economy'),
(434, 'Empty', '9B', 4, 'Economy'),
(435, 'Empty', '9C', 4, 'Economy'),
(436, 'Empty', '9D', 4, 'Economy'),
(437, 'Empty', '9E', 4, 'Economy'),
(438, 'Empty', '9F', 4, 'Economy'),
(439, 'Empty', '10A', 4, 'Economy'),
(440, 'Empty', '10B', 4, 'Economy'),
(441, 'Empty', '10C', 4, 'Economy'),
(442, 'Empty', '10D', 4, 'Economy'),
(443, 'Empty', '10E', 4, 'Economy'),
(444, 'Empty', '10F', 4, 'Economy'),
(445, 'Empty', '11A', 4, 'Economy'),
(446, 'Empty', '11B', 4, 'Economy'),
(447, 'Empty', '11C', 4, 'Economy'),
(448, 'Empty', '11D', 4, 'Economy'),
(449, 'Empty', '11E', 4, 'Economy'),
(450, 'Empty', '11F', 4, 'Economy'),
(451, 'Empty', '12A', 4, 'Economy'),
(452, 'Empty', '12B', 4, 'Economy'),
(453, 'Empty', '12C', 4, 'Economy'),
(454, 'Empty', '12D', 4, 'Economy'),
(455, 'Empty', '12E', 4, 'Economy'),
(456, 'Empty', '12F', 4, 'Economy'),
(457, 'Empty', '13A', 4, 'Economy'),
(458, 'Empty', '13B', 4, 'Economy'),
(459, 'Empty', '13C', 4, 'Economy'),
(460, 'Empty', '13D', 4, 'Economy'),
(461, 'Empty', '13E', 4, 'Economy'),
(462, 'Empty', '13F', 4, 'Economy'),
(463, 'Empty', '14A', 4, 'Economy'),
(464, 'Empty', '14B', 4, 'Economy'),
(465, 'Empty', '14C', 4, 'Economy'),
(466, 'Empty', '14D', 4, 'Economy'),
(467, 'Empty', '14E', 4, 'Economy'),
(468, 'Empty', '14F', 4, 'Economy'),
(469, 'Empty', '15A', 4, 'Economy'),
(470, 'Empty', '15B', 4, 'Economy'),
(471, 'Empty', '15C', 4, 'Economy'),
(472, 'Empty', '15D', 4, 'Economy'),
(473, 'Empty', '15E', 4, 'Economy'),
(474, 'Empty', '15F', 4, 'Economy'),
(475, 'Empty', '16A', 4, 'Economy'),
(476, 'Empty', '16B', 4, 'Economy'),
(477, 'Empty', '16C', 4, 'Economy'),
(478, 'Empty', '16D', 4, 'Economy'),
(479, 'Empty', '16E', 4, 'Economy'),
(480, 'Empty', '16F', 4, 'Economy'),
(481, 'Empty', '17A', 4, 'Economy'),
(482, 'Empty', '17B', 4, 'Economy'),
(483, 'Empty', '17C', 4, 'Economy'),
(484, 'Empty', '17D', 4, 'Economy'),
(485, 'Empty', '17E', 4, 'Economy'),
(486, 'Empty', '17F', 4, 'Economy'),
(487, 'Empty', '18A', 4, 'Economy'),
(488, 'Empty', '18B', 4, 'Economy'),
(489, 'Empty', '18C', 4, 'Economy'),
(490, 'Empty', '18D', 4, 'Economy'),
(491, 'Empty', '18E', 4, 'Economy'),
(492, 'Empty', '18F', 4, 'Economy'),
(493, 'Empty', '19A', 4, 'Economy'),
(494, 'Empty', '19B', 4, 'Economy'),
(495, 'Empty', '19C', 4, 'Economy'),
(496, 'Empty', '19D', 4, 'Economy'),
(497, 'Empty', '19E', 4, 'Economy'),
(498, 'Empty', '19F', 4, 'Economy'),
(499, 'Empty', '20A', 4, 'Economy'),
(500, 'Empty', '20B', 4, 'Economy'),
(501, 'Empty', '20C', 4, 'Economy'),
(502, 'Empty', '20D', 4, 'Economy'),
(503, 'Empty', '20E', 4, 'Economy'),
(504, 'Empty', '20F', 4, 'Economy'),
(505, 'Empty', '21A', 4, 'Economy'),
(506, 'Empty', '21B', 4, 'Economy'),
(507, 'Empty', '21C', 4, 'Economy'),
(508, 'Empty', '21D', 4, 'Economy'),
(509, 'Empty', '21E', 4, 'Economy'),
(510, 'Empty', '21F', 4, 'Economy'),
(511, 'Empty', '22A', 4, 'Economy'),
(512, 'Empty', '22B', 4, 'Economy'),
(513, 'Empty', '22C', 4, 'Economy'),
(514, 'Empty', '22D', 4, 'Economy'),
(515, 'Empty', '22E', 4, 'Economy'),
(516, 'Empty', '22F', 4, 'Economy'),
(517, 'Empty', '23A', 4, 'Economy'),
(518, 'Empty', '23B', 4, 'Economy'),
(519, 'Empty', '23C', 4, 'Economy'),
(520, 'Empty', '23D', 4, 'Economy'),
(521, 'Empty', '23E', 4, 'Economy'),
(522, 'Empty', '23F', 4, 'Economy'),
(523, 'Empty', '24A', 4, 'Economy'),
(524, 'Empty', '24B', 4, 'Economy'),
(525, 'Empty', '24C', 4, 'Economy'),
(526, 'Empty', '24D', 4, 'Economy'),
(527, 'Empty', '24E', 4, 'Economy'),
(528, 'Empty', '24F', 4, 'Economy'),
(529, 'Empty', '25A', 4, 'Economy'),
(530, 'Empty', '25B', 4, 'Economy'),
(531, 'Empty', '25C', 4, 'Economy'),
(532, 'Empty', '25D', 4, 'Economy'),
(533, 'Empty', '25E', 4, 'Economy'),
(534, 'Empty', '25F', 4, 'Economy'),
(535, 'Empty', '26A', 4, 'Economy'),
(536, 'Empty', '26B', 4, 'Economy'),
(537, 'Empty', '26C', 4, 'Economy'),
(538, 'Empty', '26D', 4, 'Economy'),
(539, 'Empty', '26E', 4, 'Economy'),
(540, 'Empty', '26F', 4, 'Economy'),
(541, 'Empty', '27A', 4, 'Economy'),
(542, 'Empty', '27B', 4, 'Economy'),
(543, 'Empty', '27C', 4, 'Economy'),
(544, 'Empty', '27D', 4, 'Economy'),
(545, 'Empty', '27E', 4, 'Economy'),
(546, 'Empty', '27F', 4, 'Economy'),
(547, 'Empty', '28A', 4, 'Economy'),
(548, 'Empty', '28B', 4, 'Economy'),
(549, 'Empty', '28C', 4, 'Economy'),
(550, 'Empty', '28D', 4, 'Economy'),
(551, 'Empty', '28E', 4, 'Economy'),
(552, 'Empty', '28F', 4, 'Economy'),
(553, 'Empty', '29A', 4, 'Economy'),
(554, 'Empty', '29B', 4, 'Economy'),
(555, 'Empty', '29C', 4, 'Economy'),
(556, 'Empty', '29D', 4, 'Economy'),
(557, 'Empty', '29E', 4, 'Economy'),
(558, 'Empty', '29F', 4, 'Economy'),
(559, 'Empty', '30A', 4, 'Economy'),
(560, 'Empty', '30B', 4, 'Economy'),
(561, 'Empty', '30C', 4, 'Economy'),
(562, 'Empty', '30D', 4, 'Economy'),
(563, 'Empty', '30E', 4, 'Economy'),
(564, 'Empty', '30F', 4, 'Economy'),
(565, 'Empty', '31A', 4, 'Economy'),
(566, 'Empty', '31B', 4, 'Economy'),
(567, 'Empty', '31C', 4, 'Economy'),
(568, 'Empty', '31D', 4, 'Economy'),
(569, 'Empty', '31E', 4, 'Economy'),
(570, 'Empty', '31F', 4, 'Economy'),
(571, 'Empty', '1A', 1, 'Business'),
(572, 'Empty', '1B', 1, 'Business'),
(573, 'Empty', '1C', 1, 'Business'),
(574, 'Empty', '1D', 1, 'Business'),
(575, 'Empty', '1E', 1, 'Business'),
(576, 'Empty', '1F', 1, 'Business'),
(577, 'Empty', '2A', 1, 'Business'),
(578, 'Empty', '2B', 1, 'Business'),
(579, 'Empty', '2C', 1, 'Business'),
(580, 'Empty', '2D', 1, 'Business'),
(581, 'Empty', '2E', 1, 'Business'),
(582, 'Empty', '2F', 1, 'Business'),
(583, 'Empty', '3A', 1, 'Business'),
(584, 'Empty', '3B', 1, 'Business'),
(585, 'Empty', '3C', 1, 'Business'),
(586, 'Empty', '3D', 1, 'Business'),
(587, 'Empty', '3E', 1, 'Business'),
(588, 'Empty', '3F', 1, 'Business'),
(589, 'Empty', '4A', 1, 'Business'),
(590, 'Empty', '4B', 1, 'Business'),
(591, 'Empty', '4C', 1, 'Business'),
(592, 'Empty', '4D', 1, 'Business'),
(593, 'Empty', '4E', 1, 'Business'),
(594, 'Empty', '4F', 1, 'Business'),
(595, 'Empty', '5A', 1, 'Economy'),
(596, 'Empty', '5B', 1, 'Economy'),
(597, 'Empty', '5C', 1, 'Economy'),
(598, 'Empty', '5D', 1, 'Economy'),
(599, 'Empty', '5E', 1, 'Economy'),
(600, 'Empty', '5F', 1, 'Economy'),
(601, 'Empty', '6A', 1, 'Economy'),
(602, 'Empty', '6B', 1, 'Economy'),
(603, 'Empty', '6C', 1, 'Economy'),
(604, 'Empty', '6D', 1, 'Economy'),
(605, 'Empty', '6E', 1, 'Economy'),
(606, 'Empty', '6F', 1, 'Economy'),
(607, 'Empty', '7A', 1, 'Economy'),
(608, 'Empty', '7B', 1, 'Economy'),
(609, 'Empty', '7C', 1, 'Economy'),
(610, 'Empty', '7D', 1, 'Economy'),
(611, 'Empty', '7E', 1, 'Economy'),
(612, 'Empty', '7F', 1, 'Economy'),
(613, 'Empty', '8A', 1, 'Economy'),
(614, 'Empty', '8B', 1, 'Economy'),
(615, 'Empty', '8C', 1, 'Economy'),
(616, 'Empty', '8D', 1, 'Economy'),
(617, 'Empty', '8E', 1, 'Economy'),
(618, 'Empty', '8F', 1, 'Economy'),
(619, 'Empty', '9A', 1, 'Economy'),
(620, 'Empty', '9B', 1, 'Economy'),
(621, 'Empty', '9C', 1, 'Economy'),
(622, 'Empty', '9D', 1, 'Economy'),
(623, 'Empty', '9E', 1, 'Economy'),
(624, 'Empty', '9F', 1, 'Economy'),
(625, 'Empty', '10A', 1, 'Economy'),
(626, 'Empty', '10B', 1, 'Economy'),
(627, 'Empty', '10C', 1, 'Economy'),
(628, 'Empty', '10D', 1, 'Economy'),
(629, 'Empty', '10E', 1, 'Economy'),
(630, 'Empty', '10F', 1, 'Economy'),
(631, 'Empty', '11A', 1, 'Economy'),
(632, 'Empty', '11B', 1, 'Economy'),
(633, 'Empty', '11C', 1, 'Economy'),
(634, 'Empty', '11D', 1, 'Economy'),
(635, 'Empty', '11E', 1, 'Economy'),
(636, 'Empty', '11F', 1, 'Economy'),
(637, 'Empty', '12A', 1, 'Economy'),
(638, 'Empty', '12B', 1, 'Economy'),
(639, 'Empty', '12C', 1, 'Economy'),
(640, 'Empty', '12D', 1, 'Economy'),
(641, 'Empty', '12E', 1, 'Economy'),
(642, 'Empty', '12F', 1, 'Economy'),
(643, 'Empty', '13A', 1, 'Economy'),
(644, 'Empty', '13B', 1, 'Economy'),
(645, 'Empty', '13C', 1, 'Economy'),
(646, 'Empty', '13D', 1, 'Economy'),
(647, 'Empty', '13E', 1, 'Economy'),
(648, 'Empty', '13F', 1, 'Economy'),
(649, 'Empty', '14A', 1, 'Economy'),
(650, 'Empty', '14B', 1, 'Economy'),
(651, 'Empty', '14C', 1, 'Economy'),
(652, 'Empty', '14D', 1, 'Economy'),
(653, 'Empty', '14E', 1, 'Economy'),
(654, 'Empty', '14F', 1, 'Economy'),
(655, 'Empty', '15A', 1, 'Economy'),
(656, 'Empty', '15B', 1, 'Economy'),
(657, 'Empty', '15C', 1, 'Economy'),
(658, 'Empty', '15D', 1, 'Economy'),
(659, 'Empty', '15E', 1, 'Economy'),
(660, 'Empty', '15F', 1, 'Economy'),
(661, 'Empty', '16A', 1, 'Economy'),
(662, 'Empty', '16B', 1, 'Economy'),
(663, 'Empty', '16C', 1, 'Economy'),
(664, 'Empty', '16D', 1, 'Economy'),
(665, 'Empty', '16E', 1, 'Economy'),
(666, 'Empty', '16F', 1, 'Economy'),
(667, 'Empty', '17A', 1, 'Economy'),
(668, 'Empty', '17B', 1, 'Economy'),
(669, 'Empty', '17C', 1, 'Economy'),
(670, 'Empty', '17D', 1, 'Economy'),
(671, 'Empty', '17E', 1, 'Economy'),
(672, 'Empty', '17F', 1, 'Economy'),
(673, 'Empty', '18A', 1, 'Economy'),
(674, 'Empty', '18B', 1, 'Economy'),
(675, 'Empty', '18C', 1, 'Economy'),
(676, 'Empty', '18D', 1, 'Economy'),
(677, 'Empty', '18E', 1, 'Economy'),
(678, 'Empty', '18F', 1, 'Economy'),
(679, 'Empty', '19A', 1, 'Economy'),
(680, 'Empty', '19B', 1, 'Economy'),
(681, 'Empty', '19C', 1, 'Economy'),
(682, 'Empty', '19D', 1, 'Economy'),
(683, 'Empty', '19E', 1, 'Economy'),
(684, 'Empty', '19F', 1, 'Economy'),
(685, 'Empty', '20A', 1, 'Economy'),
(686, 'Empty', '20B', 1, 'Economy'),
(687, 'Empty', '20C', 1, 'Economy'),
(688, 'Empty', '20D', 1, 'Economy'),
(689, 'Empty', '20E', 1, 'Economy'),
(690, 'Empty', '20F', 1, 'Economy'),
(691, 'Empty', '21A', 1, 'Economy'),
(692, 'Empty', '21B', 1, 'Economy'),
(693, 'Empty', '21C', 1, 'Economy'),
(694, 'Empty', '21D', 1, 'Economy'),
(695, 'Empty', '21E', 1, 'Economy'),
(696, 'Empty', '21F', 1, 'Economy'),
(697, 'Empty', '22A', 1, 'Economy'),
(698, 'Empty', '22B', 1, 'Economy'),
(699, 'Empty', '22C', 1, 'Economy'),
(700, 'Empty', '22D', 1, 'Economy'),
(701, 'Empty', '22E', 1, 'Economy'),
(702, 'Empty', '22F', 1, 'Economy'),
(703, 'Empty', '23A', 1, 'Economy'),
(704, 'Empty', '23B', 1, 'Economy'),
(705, 'Empty', '23C', 1, 'Economy'),
(706, 'Empty', '23D', 1, 'Economy'),
(707, 'Empty', '23E', 1, 'Economy'),
(708, 'Empty', '23F', 1, 'Economy'),
(709, 'Empty', '24A', 1, 'Economy'),
(710, 'Empty', '24B', 1, 'Economy'),
(711, 'Empty', '24C', 1, 'Economy'),
(712, 'Empty', '24D', 1, 'Economy'),
(713, 'Empty', '24E', 1, 'Economy'),
(714, 'Empty', '24F', 1, 'Economy'),
(715, 'Empty', '25A', 1, 'Economy'),
(716, 'Empty', '25B', 1, 'Economy'),
(717, 'Empty', '25C', 1, 'Economy'),
(718, 'Empty', '25D', 1, 'Economy'),
(719, 'Empty', '25E', 1, 'Economy'),
(720, 'Empty', '25F', 1, 'Economy'),
(721, 'Empty', '26A', 1, 'Economy'),
(722, 'Empty', '26B', 1, 'Economy'),
(723, 'Empty', '26C', 1, 'Economy'),
(724, 'Empty', '26D', 1, 'Economy'),
(725, 'Empty', '26E', 1, 'Economy'),
(726, 'Empty', '26F', 1, 'Economy'),
(727, 'Empty', '27A', 1, 'Economy'),
(728, 'Empty', '27B', 1, 'Economy'),
(729, 'Empty', '27C', 1, 'Economy'),
(730, 'Empty', '27D', 1, 'Economy'),
(731, 'Empty', '27E', 1, 'Economy'),
(732, 'Empty', '27F', 1, 'Economy'),
(733, 'Empty', '28A', 1, 'Economy'),
(734, 'Empty', '28B', 1, 'Economy'),
(735, 'Empty', '28C', 1, 'Economy'),
(736, 'Empty', '28D', 1, 'Economy'),
(737, 'Empty', '28E', 1, 'Economy'),
(738, 'Empty', '28F', 1, 'Economy'),
(739, 'Empty', '29A', 1, 'Economy'),
(740, 'Empty', '29B', 1, 'Economy'),
(741, 'Empty', '29C', 1, 'Economy'),
(742, 'Empty', '29D', 1, 'Economy'),
(743, 'Empty', '29E', 1, 'Economy'),
(744, 'Empty', '29F', 1, 'Economy'),
(745, 'Empty', '30A', 1, 'Economy'),
(746, 'Empty', '30B', 1, 'Economy'),
(747, 'Empty', '30C', 1, 'Economy'),
(748, 'Empty', '30D', 1, 'Economy'),
(749, 'Empty', '30E', 1, 'Economy'),
(750, 'Empty', '30F', 1, 'Economy'),
(751, 'Empty', '31A', 1, 'Economy'),
(752, 'Empty', '31B', 1, 'Economy'),
(753, 'Empty', '31C', 1, 'Economy'),
(754, 'Empty', '31D', 1, 'Economy'),
(755, 'Empty', '31E', 1, 'Economy'),
(756, 'Empty', '31F', 1, 'Economy'),
(757, 'Empty', '32A', 1, 'Economy'),
(758, 'Empty', '32B', 1, 'Economy'),
(759, 'Empty', '32C', 1, 'Economy'),
(760, 'Empty', '32D', 1, 'Economy'),
(761, 'Empty', '32E', 1, 'Economy'),
(762, 'Empty', '32F', 1, 'Economy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`AirlineID`),
  ADD KEY `CountryID` (`CountryID`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`AirportID`),
  ADD KEY `CityID` (`CityID`);

--
-- Indexes for table `baggage`
--
ALTER TABLE `baggage`
  ADD PRIMARY KEY (`BaggageID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityID`),
  ADD KEY `CountryID` (`CountryID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`FlightID`),
  ADD KEY `PlaneID` (`PlaneID`),
  ADD KEY `flight_ibfk_3` (`PathID`),
  ADD KEY `AirlineID` (`AirlineID`);

--
-- Indexes for table `flightpath`
--
ALTER TABLE `flightpath`
  ADD PRIMARY KEY (`PathID`),
  ADD KEY `StartAirport` (`StartAirport`),
  ADD KEY `EndAirport` (`EndAirport`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemberID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phonenumber` (`Phonenumber`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderID`,`TicketID`),
  ADD KEY `BaggageID` (`BaggageID`),
  ADD KEY `TicketID` (`TicketID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `FlightID` (`FlightID`),
  ADD KEY `orders_ibfk_3` (`EmployeeID`),
  ADD KEY `ReturnFlight` (`ReturnFlight`),
  ADD KEY `orders_ibfk_2` (`MemberID`);

--
-- Indexes for table `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`PlaneID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TicketID`),
  ADD KEY `FlightID` (`FlightID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baggage`
--
ALTER TABLE `baggage`
  MODIFY `BaggageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `FlightID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=763;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `airline`
--
ALTER TABLE `airline`
  ADD CONSTRAINT `airline_ibfk_1` FOREIGN KEY (`CountryID`) REFERENCES `country` (`CountryID`);

--
-- Constraints for table `airport`
--
ALTER TABLE `airport`
  ADD CONSTRAINT `airport_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `city` (`CityID`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`CountryID`) REFERENCES `country` (`CountryID`);

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`PlaneID`) REFERENCES `plane` (`PlaneID`),
  ADD CONSTRAINT `flight_ibfk_3` FOREIGN KEY (`PathID`) REFERENCES `flightpath` (`PathID`),
  ADD CONSTRAINT `flight_ibfk_4` FOREIGN KEY (`AirlineID`) REFERENCES `airline` (`AirlineID`);

--
-- Constraints for table `flightpath`
--
ALTER TABLE `flightpath`
  ADD CONSTRAINT `flightpath_ibfk_1` FOREIGN KEY (`StartAirport`) REFERENCES `airport` (`AirportID`),
  ADD CONSTRAINT `flightpath_ibfk_2` FOREIGN KEY (`EndAirport`) REFERENCES `airport` (`AirportID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`BaggageID`) REFERENCES `baggage` (`BaggageID`) ON DELETE SET NULL,
  ADD CONSTRAINT `orderdetails_ibfk_3` FOREIGN KEY (`TicketID`) REFERENCES `ticket` (`TicketID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`MemberID`) REFERENCES `member` (`MemberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`ReturnFlight`) REFERENCES `flight` (`FlightID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`FlightID`) REFERENCES `flight` (`FlightID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
