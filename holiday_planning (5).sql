-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 06:53 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holiday_planning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `airport_id` int(11) NOT NULL,
  `airport_name` varchar(255) NOT NULL,
  `airport_city` varchar(255) NOT NULL,
  `airport_state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`airport_id`, `airport_name`, `airport_city`, `airport_state`) VALUES
(1, 'Chhatrapati Shivaji International Airport', 'Mumbai', 'Maharashtra'),
(2, 'Indhira Gandhi Airport', 'Delhi', 'Gurgaon'),
(3, 'Mohali Airport', 'Chandigarh', 'Punjab'),
(4, 'Manali Airport', 'Manali', 'Himachal Pradesh');

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `hotel_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `booked` tinyint(1) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_contact` int(11) NOT NULL,
  `user_aadhar_no` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `user_name`, `user_email`, `user_password`, `user_address`, `user_contact`, `user_aadhar_no`, `created_at`, `deleted_at`, `deleted`) VALUES
(1, 'Jiten', 'jt@gmail.com', '$2y$10$3xJD4k2KwAm5NuuIoxGLg.44zvoKu1mtpk4C764rO0jlwg7yInf7K', '402,Sapna pArk apt,UNR-3', 123456790, 123, '2018-10-23 17:53:57', '0000-00-00 00:00:00', 0),
(2, 'sahil', 'sadhwanisahil64@gmail.com', '$2y$10$uKVz55.asNT3j9H4hSVhU.Cww47LNS9DaPHG32gNI0N6VyKqP3J1S', 'wdsd', 4354, 34353, '2018-10-23 17:46:45', '0000-00-00 00:00:00', 0),
(3, 'sanjay', 'snj@gmail.com', '$2y$10$vwBgiyQDtZFsTsToYkMwGOfsWsGD50.nQ4MAg/JgWvEGv3y.PVheG', 'unr', 2147483647, 33333333, '2018-10-22 16:00:55', '0000-00-00 00:00:00', 0),
(4, 'dhiraj', 'dhiraj@gmail.com', '$2y$10$CDcsZCrhkGXXK8.F4Awa7Oyo6MF4Y898aL97F2T5k8uRHVxNUgBC2', 'bewas chowk, ulhasnagar-1', 2147483647, 1145555555, '2018-11-03 03:38:29', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_customize_package`
--

CREATE TABLE `customer_customize_package` (
  `customer_customize_package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customize_package_source_name` varchar(255) NOT NULL,
  `customize_package_destination_name` varchar(255) NOT NULL,
  `flight_id_departure` int(11) NOT NULL,
  `flight_id_arrival` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `customize_package_price` int(11) NOT NULL,
  `total_flight_price` int(11) NOT NULL,
  `total_hotel_price` int(11) NOT NULL,
  `on_date` date NOT NULL,
  `off_date` date NOT NULL,
  `contact_to_communicate` int(11) NOT NULL,
  `total_no_of_travellers` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_customize_package`
--

INSERT INTO `customer_customize_package` (`customer_customize_package_id`, `user_id`, `customize_package_source_name`, `customize_package_destination_name`, `flight_id_departure`, `flight_id_arrival`, `hotel_id`, `customize_package_price`, `total_flight_price`, `total_hotel_price`, `on_date`, `off_date`, `contact_to_communicate`, `total_no_of_travellers`, `created_at`) VALUES
(8, 2, 'Delhi', 'Manali', 7, 8, 5, 12000, 9800, 2200, '2018-10-17', '2018-10-20', 2147483647, 2, '2018-10-16 05:06:32'),
(9, 2, 'Delhi', 'Manali', 7, 8, 5, 12000, 9800, 2200, '2018-10-17', '2018-10-25', 2147483647, 2, '2018-10-17 09:32:31'),
(10, 2, 'Delhi', 'Manali', 7, 8, 5, 12000, 9800, 2200, '2018-10-28', '2018-10-30', 1347979, 2, '2018-10-24 04:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer_package_booking`
--

CREATE TABLE `customer_package_booking` (
  `package_booking_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_no_of_travellers` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `contact_to_communicate` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_package_booking`
--

INSERT INTO `customer_package_booking` (`package_booking_id`, `package_id`, `customer_id`, `total_no_of_travellers`, `total_price`, `date`, `contact_to_communicate`) VALUES
(5, 3, 2, 1, 60000, '2018-11-15', 84155122),
(7, 3, 2, 3, 186000, '2018-11-15', 2147483647),
(8, 157, 1, 2, 46000, '2018-10-18', 98989988),
(9, 160, 3, 1, 140500, '2019-02-12', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `customize_package_book_travellers`
--

CREATE TABLE `customize_package_book_travellers` (
  `customer_customize_package_id` int(11) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `person_age` int(11) NOT NULL,
  `person_gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customize_package_book_travellers`
--

INSERT INTO `customize_package_book_travellers` (`customer_customize_package_id`, `person_name`, `person_age`, `person_gender`) VALUES
(8, 'Sahil', 1, 'MALE'),
(8, 'Sadhwani', 2, 'MALE'),
(9, 'xyz', 1, 'MALE'),
(9, 'abc', 1, 'FEMALE'),
(10, 'Sahil', 1, 'MALE'),
(10, 'Jiten', 2, 'MALE'),
(0, '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cutomer_customize_package_day`
--

CREATE TABLE `cutomer_customize_package_day` (
  `customer_customize_package_id` int(11) NOT NULL,
  `customize_day` int(11) NOT NULL,
  `customize_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `each_day_hotel`
--

CREATE TABLE `each_day_hotel` (
  `customer_customize_package_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `customize_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`user_id`, `user_name`, `user_email`, `user_feedback`) VALUES
(2, 'Sahil Sadhwani', 'sadhwanisahil64@gmail.com', 'ss'),
(2, 'Sahil Sadhwani', 'sadhwanisahil64@gmail.com', 'ss'),
(1, 'Sahil Sadhwani', 'asassx@g.c', 'ddbhdb'),
(2, 'sanjay', 'sanjay@gamil.com', 'very good website'),
(2, 'sanjay', 'pqr@gamil.com', 'very good website'),
(2, 'dhiraj', 'sanjay@gamil.com', ' good website'),
(2, 'harsh', 'abc@gamil.com', 'nice packages'),
(2, 'jiten', 'ssahil@gamil.com', 'very good website'),
(2, 'latika', 'efg@gamil.com', 'very good website'),
(2, 'dhiren', 'pqr@gamil.com', 'very good website'),
(2, 'rahul', 'gfd@gamil.com', 'very good website'),
(2, 'sahil', 'qwe@gamil.com', 'very good website'),
(2, 'sanjay', 'opi@gamil.com', 'very good website'),
(2, 'sanjay', 'abc@gamil.com', 'very good website'),
(2, 'Harsh Singh', 'singh@gmail.com', 'very good website');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` int(11) NOT NULL,
  `flight_no` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_id`, `flight_no`, `company_name`, `capacity`) VALUES
(3, 'HP 4234', 'Air India', 600),
(4, 'UAE 7954', 'FLY EMIRATES', 900),
(5, 'IE 4143', 'Indigo', 250),
(6, 'IE 3456', 'Indigo', 250),
(7, 'IE 144', 'Indigo', 200),
(8, 'IE 415', 'Indigo', 200),
(9, 'JE 1442', 'Jet Airways', 250),
(10, 'JE 2552', 'Jet Airways', 250),
(11, 'SP 2A12', 'SpiceJet', 150),
(12, 'SP 4B13', 'SpiceJet', 170),
(13, 'KF 4567', 'KingFisher', 150),
(14, 'KE 3424', 'KingFisher', 150),
(15, 'EM 3425', 'Emirates', 250),
(16, 'EM 4532', 'Emiratees', 250),
(17, 'QA 1122', 'Quatar Airways', 300),
(18, 'QA 3344', 'Quatar Airways', 300),
(19, 'IE S435', 'Indigo', 200),
(20, 'IE S435', 'Indigo', 200),
(21, 'Go G435', 'Go Air', 200),
(22, 'IE P935', 'Indigo', 200),
(23, 'SP 1435', 'SpiceJet', 200),
(24, 'AR 2424', 'Air India', 200),
(25, 'AR 2323', 'Air India', 200),
(26, 'IE I987', 'Indigo', 200),
(27, 'GO G767', 'Go Air', 200),
(28, 'IE 6590', 'Indigo', 200),
(29, 'IE 4142', 'Indigo', 250),
(30, 'IE 5342', 'Indigo', 250),
(31, 'KE 2232', 'KingFisher', 150),
(32, 'KE 9873', 'KingFisher', 150),
(33, 'JE 8754', 'Jet Airways', 250),
(34, 'JE 6734', 'Jet Airways', 250),
(35, 'IE 3242', 'Indigo', 200),
(36, 'QA 6667', 'Quatar Airways', 300),
(37, 'GO 9764', 'Go Air', 150),
(38, 'QA 2245', 'Quatar Airways', 350),
(39, 'SP 5478', 'SpiceJet', 150);

-- --------------------------------------------------------

--
-- Table structure for table `flight_availability`
--

CREATE TABLE `flight_availability` (
  `flight_id` int(11) NOT NULL,
  `scheduling_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `seats_available` int(11) NOT NULL,
  `total_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_availability`
--

INSERT INTO `flight_availability` (`flight_id`, `scheduling_id`, `date`, `seats_available`, `total_seats`) VALUES
(3, 1, '2018-10-08', 100, 600),
(13, 11, '2018-10-26', 100, 150),
(14, 12, '2018-10-26', 100, 150),
(15, 13, '2018-10-26', 100, 250),
(16, 14, '2018-10-26', 100, 250),
(17, 15, '2018-10-26', 100, 300),
(18, 16, '2018-10-26', 100, 300);

-- --------------------------------------------------------

--
-- Table structure for table `flight_book`
--

CREATE TABLE `flight_book` (
  `flight_booking_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flight_price` int(11) NOT NULL,
  `flight_date` date NOT NULL,
  `contact_to_communicate` varchar(255) NOT NULL,
  `total_no_of_travellers` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_book`
--

INSERT INTO `flight_book` (`flight_booking_id`, `flight_id`, `user_id`, `flight_price`, `flight_date`, `contact_to_communicate`, `total_no_of_travellers`, `total_price`) VALUES
(15, 3, 2, 2400, '2018-10-18', '8380806866', 2, 4800),
(16, 3, 2, 2400, '2018-10-25', '9820098200', 2, 4800),
(17, 3, 2, 2400, '2018-11-21', '9852098520', 2, 4800);

-- --------------------------------------------------------

--
-- Table structure for table `flight_book_travellers`
--

CREATE TABLE `flight_book_travellers` (
  `flight_booking_id` int(11) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `person_age` int(11) NOT NULL,
  `person_gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_book_travellers`
--

INSERT INTO `flight_book_travellers` (`flight_booking_id`, `person_name`, `person_age`, `person_gender`) VALUES
(15, 'Sahil', 1, 'MALE'),
(15, 'Sadhwani', 2, 'MALE'),
(0, 'Sanjay', 17, 'MALE'),
(0, 'Sanjay', 17, 'MALE'),
(0, 'dhiraj', 19, 'MALE'),
(0, 'ok', 1, 'MALE'),
(16, 'bye', 1, 'FEMALE'),
(17, 'bye', 1, 'FEMALE'),
(16, 'Sanjay', 2, 'MALE'),
(16, 'Sahil', 4, 'MALE'),
(17, 'rahul', 2, 'MALE'),
(17, 'karan', 1, 'MALE');

-- --------------------------------------------------------

--
-- Table structure for table `flight_class`
--

CREATE TABLE `flight_class` (
  `flight_id` int(11) NOT NULL,
  `class_type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_class`
--

INSERT INTO `flight_class` (`flight_id`, `class_type`, `price`) VALUES
(3, 'BUSINESS', 2400),
(4, 'ECONOMY', 6900),
(5, 'ECONOMY', 3500),
(6, 'ECONOMY', 4000),
(7, 'ECONOMY', 2300),
(8, 'ECONOMY', 7500),
(9, 'ECONOMY', 3400),
(10, 'ECONOMY', 4000),
(11, 'ECONOMY', 3500),
(12, 'ECONOMY', 3500),
(13, 'BUSINESS', 6000),
(14, 'BUSINESS', 7000),
(15, 'BUSINESS', 12000),
(16, 'BUSINESS', 14000),
(17, 'BUSINESS', 15000),
(18, 'BUSINESS', 14000),
(19, 'ECONOMY', 5000),
(20, 'ECONOMY', 4000),
(21, 'ECONOMY', 5200),
(22, 'ECONOMY', 6000),
(23, 'ECONOMY', 6500),
(24, 'ECONOMY', 5000),
(25, 'ECONOMY', 7000),
(26, 'ECONOMY', 4500),
(27, 'ECONOMY', 7500);

-- --------------------------------------------------------

--
-- Table structure for table `flight_scheduling`
--

CREATE TABLE `flight_scheduling` (
  `scheduling_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `airport_id` int(11) NOT NULL,
  `flight_source` varchar(255) NOT NULL,
  `flight_destination` varchar(255) NOT NULL,
  `arrival_time` time NOT NULL,
  `departure_time` time NOT NULL,
  `flight_departure_date` date NOT NULL,
  `flight_arrival_date` date NOT NULL,
  `total_hours` int(11) NOT NULL,
  `arrival_time_format` varchar(11) NOT NULL,
  `departure_time_format` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_scheduling`
--

INSERT INTO `flight_scheduling` (`scheduling_id`, `flight_id`, `airport_id`, `flight_source`, `flight_destination`, `arrival_time`, `departure_time`, `flight_departure_date`, `flight_arrival_date`, `total_hours`, `arrival_time_format`, `departure_time_format`) VALUES
(1, 3, 2, 'Delhi', 'Dubai', '11:00:00', '23:00:00', '2018-10-08', '2018-10-09', 12, 'AM', 'PM'),
(2, 4, 2, 'Mumbai', 'Himachal Pradesh', '09:00:00', '03:00:00', '2018-10-10', '2018-10-11', 7, 'AM', 'AM'),
(3, 5, 3, 'Mumbai', 'Chandigarh', '12:00:00', '08:00:00', '2018-10-04', '2018-10-04', 3, 'PM', 'AM'),
(4, 6, 3, 'Banglore', 'Chandigarh', '08:00:00', '02:00:00', '2018-10-19', '2018-10-20', 6, 'AM', 'AM'),
(5, 7, 2, 'Delhi', 'Manali', '07:00:00', '04:00:00', '2018-10-24', '2018-10-24', 3, 'PM', 'PM'),
(6, 8, 4, 'Manali', 'Delhi', '02:00:00', '09:00:00', '2018-10-18', '2018-10-18', 4, 'PM', 'AM'),
(7, 9, 2, 'Delhi', 'Dubai', '15:00:00', '09:00:00', '2018-10-26', '2018-10-26', 6, 'PM', 'AM'),
(8, 10, 2, 'Delhi', 'Dubai', '16:00:00', '10:00:00', '2018-11-10', '2018-11-10', 8, 'PM', 'AM'),
(9, 11, 2, 'Delhi', 'Dubai', '09:00:00', '15:00:00', '2018-10-26', '2018-10-26', 6, 'PM', 'AM'),
(10, 12, 2, 'Delhi', 'Dubai', '05:00:00', '13:00:00', '2018-10-26', '2018-10-26', 8, 'PM', 'AM'),
(11, 13, 2, 'Delhi', 'Dubai', '03:00:00', '11:00:00', '2018-10-26', '2018-10-26', 8, 'PM', 'AM'),
(12, 14, 2, 'Delhi', 'Dubai', '06:00:00', '15:00:00', '2018-10-26', '2018-10-26', 9, 'PM', 'AM'),
(13, 15, 2, 'Delhi', 'Dubai', '19:00:00', '03:00:00', '2018-10-26', '2018-10-26', 10, 'PM', 'AM'),
(14, 16, 2, 'Delhi', 'Dubai', '17:00:00', '01:00:00', '2018-10-26', '2018-10-26', 7, 'PM', 'AM'),
(15, 17, 2, 'Delhi', 'Dubai', '15:00:00', '09:00:00', '2018-10-26', '2018-10-26', 6, 'PM', 'AM'),
(16, 18, 2, 'Delhi', 'Dubai', '13:00:00', '04:00:00', '2018-10-26', '2018-10-26', 11, 'PM', 'AM'),
(17, 19, 2, 'Delhi', 'Manali', '10:00:00', '06:00:00', '2018-10-30', '2018-10-30', 4, 'AM', 'PM'),
(18, 20, 2, 'Delhi', 'Manali', '11:00:00', '06:00:00', '2018-10-30', '2018-10-30', 5, 'AM', 'PM'),
(19, 21, 2, 'Delhi', 'Manali', '13:00:00', '07:00:00', '2018-10-30', '2018-10-30', 6, 'AM', 'PM'),
(20, 22, 2, 'Delhi', 'Manali', '02:00:00', '09:00:00', '2018-10-30', '2018-10-30', 5, 'AM', 'PM'),
(21, 23, 2, 'Delhi', 'Manali', '04:00:00', '10:00:00', '2018-10-30', '2018-10-30', 6, 'AM', 'PM'),
(22, 24, 4, 'Manali', 'Delhi', '10:00:00', '06:00:00', '2018-10-30', '2018-10-30', 4, 'AM', 'PM'),
(23, 25, 4, 'Manali', 'Delhi', '12:00:00', '08:00:00', '2018-10-30', '2018-10-30', 5, 'AM', 'PM'),
(24, 26, 4, 'Manali', 'Delhi', '06:00:00', '11:00:00', '2018-10-30', '2018-10-30', 5, 'AM', 'PM'),
(25, 27, 4, 'Manali', 'Delhi', '10:00:00', '06:00:00', '2018-10-30', '2018-10-30', 4, 'AM', 'PM');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_address` text NOT NULL,
  `hotel_city` varchar(255) NOT NULL,
  `hotel_package` varchar(255) NOT NULL,
  `hotel_star` int(11) NOT NULL,
  `hotel_rooms` int(11) NOT NULL,
  `number_of_economy` int(11) NOT NULL,
  `number_of_deluxe` int(11) NOT NULL,
  `number_of_suite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `hotel_address`, `hotel_city`, `hotel_package`, `hotel_star`, `hotel_rooms`, `number_of_economy`, `number_of_deluxe`, `number_of_suite`) VALUES
(1, 'Country Inn & Suites / Similar', '50 Pawnee Ave. \r\nAlpharetta, GA 30004', 'Amritsar', 'Himachal Pradesh', 3, 10, 3, 4, 3),
(2, 'Grand View (Old Wing ) or Similar', '394 Greenrose Ave. \r\nReynoldsburg, OH 43068', 'Dalhousie', 'Himachal Pradesh', 3, 10, 5, 3, 2),
(3, 'Meghavan Resort / Similar', '839 Baker St. \r\nLake Jackson, TX 77566', 'Dharamshala', 'Himachal Pradesh', 3, 19, 10, 5, 4),
(4, 'Hotel Shobhla (Executive Room)', '839 Baker St. \r\nLake Jackson, TX 77566', 'Kullu', 'Himachal Pradesh', 3, 7, 4, 2, 1),
(5, 'Honeymoon Inn (Ram Regency) or Similar', '839 Baker St. \r\nLake Jackson, TX 77566', 'Manali', 'Himachal Pradesh', 4, 10, 5, 3, 2),
(6, 'Hotel East Bourne / Sukh Sagar (Super Deluxe Room) / Similar', '839 Baker St. \r\nLake Jackson, TX 77566', 'Shimla', 'Himachal Pradesh', 3, 8, 4, 3, 1),
(7, 'Hotel Orchid', '445 High St. \r\nMall Road, TX 77566', 'Manali', 'Manali', 4, 15, 8, 5, 2),
(8, 'Snow Valley', '305 Low St. \r\nSolang, TX 77566', 'Manali', 'North India', 3, 12, 10, 1, 1),
(9, 'NH Koningshof', 'Locht 117, 5504 RM Veldhoven, Netherlands', 'Amsterdam', 'Europe', 3, 5, 2, 2, 1),
(10, 'Mercure Paris Le Bourget', '2 Rue Jean Perrin, 93150 Le Blanc-Mesnil, France', 'Paris', 'Europe', 4, 5, 2, 2, 1),
(11, 'Best Western Chavannes De Bogis ', 'Les Champs-Blancs, 1279 Chavannes-de-Bogis, Switzerland', 'Geneva', 'Europe', 4, 5, 2, 2, 1),
(12, 'Hotel City Oberland', 'Höheweg 7, 3800 Interlaken, Switzerland', 'Central Swiss', 'Europe', 4, 5, 2, 2, 1),
(13, 'Hotel Seelos', 'Wettersteinstraße 226, 6100 Seefeld in Tirol, Austria', 'Austria', 'Europe', 3, 5, 2, 2, 1),
(14, 'Fortune Acron Regina', 'Off Fort Aguada Road, Candolim, Bardez, Goa 403515', 'Goa', 'Goa', 5, 6, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_book`
--

CREATE TABLE `hotel_book` (
  `hotel_booking_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `no_of_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_no_of_rooms`
--

CREATE TABLE `hotel_no_of_rooms` (
  `hotel_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `no_of_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_no_of_rooms`
--

INSERT INTO `hotel_no_of_rooms` (`hotel_id`, `room_type_id`, `no_of_rooms`) VALUES
(3, 3, 10),
(3, 4, 5),
(3, 5, 4),
(1, 4, 3),
(1, 5, 4),
(1, 6, 3),
(2, 4, 5),
(2, 5, 3),
(2, 6, 2),
(5, 4, 5),
(5, 5, 3),
(5, 6, 2),
(6, 4, 4),
(6, 5, 3),
(6, 6, 1),
(4, 4, 4),
(4, 5, 2),
(4, 6, 1),
(9, 3, 2),
(9, 4, 2),
(9, 5, 1),
(10, 3, 2),
(10, 4, 2),
(10, 5, 1),
(11, 3, 2),
(11, 4, 2),
(11, 5, 1),
(12, 3, 2),
(12, 4, 2),
(12, 5, 1),
(13, 3, 2),
(13, 4, 2),
(13, 5, 1),
(14, 3, 2),
(14, 4, 2),
(14, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_book_travellers`
--

CREATE TABLE `package_book_travellers` (
  `package_booking_id` int(11) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `person_age` int(11) NOT NULL,
  `person_gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_book_travellers`
--

INSERT INTO `package_book_travellers` (`package_booking_id`, `person_name`, `person_age`, `person_gender`) VALUES
(5, 'Sahil', 1, 'MALE'),
(6, 'Sahil', 1, 'MALE'),
(7, 'abc', 2, 'MALE'),
(7, 'Jiten', 2, 'MALE'),
(7, 'harsh', 1, 'MALE'),
(8, 'Sahil', 1, 'MALE'),
(8, 'Harsh', 1, 'MALE'),
(9, 'sanjay', 2, 'MALE');

-- --------------------------------------------------------

--
-- Table structure for table `package_day`
--

CREATE TABLE `package_day` (
  `package_id` int(11) NOT NULL,
  `package_day` int(11) NOT NULL,
  `package_description` text NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_day`
--

INSERT INTO `package_day` (`package_id`, `package_day`, `package_description`, `hotel_id`) VALUES
(3, 1, 'Arrive Amritsar station/airport & reach our hotel (at your own).After Lunch at 02:30 pm proceed to visit (India-Pakistan) Wagha Border, to see the Flag retreat Ceremony performed by the Jawans of the Border Security Force. Return back to the Hotel. Night Halt at Amritsar.', 1),
(3, 2, 'After breakfast visit Jalianwala Bagh & Golden Temple. After lunch proceed to Dalhousie (7-8 hrs. journey), Night halt at Dalhousie.', 1),
(3, 3, 'After breakfast visit Rock Garden and Chamera Dam. Enjoy Boating (at your own cost) Lunch at Hotel and In the evening enjoy shopping at the famous Tibetans Market at your own Night halt at Dalhousie.\r\n\r\n', 2),
(3, 4, 'After breakfast we visit Khajjiar, (If road is open). which is also known as Mini Swiss for a breath taking view of the ground covered with pine trees. After lunch day is free for shopping. Night halt at Dalhousie.\r\n\r\n', 2),
(3, 5, 'After early breakfast we proceed to Dharamshala by road (7-8 hrs. journey). After Lunch visit to Bhagsunath Temple and Dalai Lama Temple, Dinner and night halt at Dharamshala.', 2),
(3, 6, 'After breakfast visit proceed to Kullu.( 7-8hrs Journey.) Lunch will be Provided enroute. Reach Kullu & after check-in at hotel, evening is free for rest. Night halt at Kullu.', 3),
(3, 7, 'After breakfast visit Manikaran, located in Parvati Valley between River Beas & Parvati. Lunch at hotel .In the evening visit Ancient Ragunath Temple (By Walk) Night halt at Kullu.', 4),
(3, 8, 'After breakfast proceed to Manali (2 hrs journey), enroute enjoy River Rafting (at your own Cost). Arrive Manali & check in at Hotel. Evening free to explore Magnificient Climate of This exotic destination. Night halt at Manali.', 4),
(3, 9, 'After breakfast visit Solang Valley (known as shooting point) and enjoy Ski Himalayan Cable Car Ride (at our cost) & also visit the famous Hadimba Devi Temple. After lunch day is free. Night halt at Manali.\r\n\r\n', 5),
(3, 10, 'After breakfast full day visit at snow point Rohtang / Madhi / Gulaba (Till our vehicle can reach). Night halt at Manali.\r\n\r\nRohtang will be closed On Tuesday.\r\n', 5),
(3, 11, 'After early breakfast proceed to Shimla (10 hrs. journey), enroute we will visit Hanogi Mata temple. Lunch will be Provided Enroute. Night halt at Shimla.', 5),
(3, 12, 'After breakfast visit Kufri, Mini Zoo and enjoy horse riding (at your own cost) Enjoy Natural Beauty. After lunch we will have free time for shopping at Mall Road. Night halt at Shimla.', 6),
(3, 13, 'After breakfast proceed to Chandigarh (5 hrs. journey). After lunch visit Rock Garden & Pinjore Garden, thereafter we will proceed to Ambala Cantt. to board 12472 UP Swaraj Express departing at 17:50 hours. with memorable experience of the tour conducted by Heena Tours & Travels. (Passengers booking early flight will have to take a taxi from Shimla at own cost).\r\n\r\nThis Tours starts with Lunch on Day 1 and ends with Lunch on Day 13.', 6),
(158, 1, 'duabi', 0),
(158, 2, 'dubai', 0),
(158, 3, 'du', 0),
(158, 4, 'bai', 0),
(159, 1, 'Take the flight and reach to Mohali Airport at morning 8 am. From there sit into taxi which will take you to manali by 7pm', 0),
(159, 2, 'Head up to the Solang valley to enjoy snow and paragliding', 0),
(159, 3, 'Go to the mall road for shopping and Hadimba temple', 0),
(159, 4, 'Leave Manali by 5am', 0),
(160, 1, 'Assemble at Chhatrapati Shivaji International airport 3 ½ hrs. Prior to your departure to board your flight departing for Brussels. Arrive Brussels and Proceed towards Amsterdam to our hotel. Please note Check in Time in Amsterdam Hotel is 1600 Hrs. Kindly Manage to relax in Hotel Lobby. Day free for rest. Overnight at Hotel.\\', 0),
(160, 2, 'After breakfast we proceed to Zaanse Schans, famous for Historical Windmills and Distinctive green wooden Houses recreated for the look of 18th century village. Then, also visit Cheese Factory & Wooden shoe factory. Then we proceed for an authentic Indian lunch prepared by our own chef. Later we take you for a CANAL CRUISE, which will take you pass famous mansions, museums and landmarks of this great city. Enjoy dinner Overnight Amsterdam.', 0),
(160, 3, 'After breakfast proceed to Paris, Enroute Photo Stop at BRUSSELS ATOMIUM and visit of world famous MINI EUROPE, has reproductions of monuments in the European Union on show, at a scale of 1:25. Then reach Paris and check in. Overnight stay at Hotel.', 0),
(160, 4, 'After breakfast, we proceed for a GUIDED CITY TOUR of this amazing metropolis; we will take you to the famous grand boulevard \'The Champs Elysees, The Arch de Triomphe, the famous Opera Charles Garnier, the Grand Cathedral of Notre Dame. Also enjoy memorable CRUISE ON THE RIVER SEINE\'. This cruise gives you an orientation tour of Paris. Followed by Packed Lunch & also visit perfume Showroom. Afternoon visit Eiffel Tower Level-3 which gives a lifetime experience viewing the city of Paris from an altitude of around 1000 feet overnight stays at the Hotel.', 0),
(160, 5, 'After breakfast we proceed for a fun filled day at DISNEYLAND PARIS which is similar to the one at Orlando in USA, where you will meet all your favorite Disney Cartoon characters performing a Parade. Overnight stay at the Hotel.', 0),
(160, 6, 'After breakfast, check out from hotel and proceed to Geneva. We will reach Geneva and visit Geneva famous landmarks like UNO building from outside, broken chair, floral clock, and jet de eau which is called the tallest fountain of Europe. Later we proceed to Paris. In the evening check in at the hotel. Overnight stay at Hotel.', 0),
(160, 7, 'After breakfast, check out from the hotel and proceed to visit Glacier 3000 is a snowy wonderland for outdoor and adventure enthusiasts, with a wide variety of activities available. Head to the top on cable car ride and enjoy the views.The Peak Walk is the only suspension bridge in the world that stretches between two mountaintops, and at 351 feet (107 meters) long, it provides an unparalleled panorama of the Alps, including the Matterhorn. Then proceed to Interlaken and Check in at the Hotel. Overnight stay in Interlaken Hotel.', 0),
(160, 8, 'After breakfast proceed to Bern Capital of Switzerland we will have free time in Bern. Later return back to the Interlaken and free time for leisure. Overnight stay in Hotel.', 0),
(160, 9, 'After breakfast, we drive towards LAUTERBRUNEN & arrive at The TRUMMELBACHFALLS. You will never ever find such amazing falls anywhere else in the world. & later we proceed to board a TRAIN to JUNGFRAUJOCH. On arrival at THE TOP OF EUROPE which is at the altitude of 11,333 ft. Have a look at the spectacular points of attractions which include the ICE PALACE, SPINHX TERRACE. Return back to the Hotel. Overnight stay in Hotel.', 0),
(160, 10, 'After breakfast, we proceed towards the base of Mt.Titlis. Two different cable cars including \'TITLIS ROTAIR\' the first rotating Gondola & we reach the top of the mountain where at a height of 10,000 feet above sea level you can enjoy the snow in the open & also have fun with the ICE FLYER & ICE SPORTS (weather permitting). After lunch we proceed to the lovely city of Lucerne where we visit the LION MONUMENT &THE KAPPELBRUCKE - THE WOODEN BRIDGE. In the evening, free time for being around & shopping in Lucerne. Have dinner and overnight stay at Hotel.', 0),
(160, 11, 'This morning we depart from Interlaken to Schaffhausen to visit majestic Rhine falls, enjoy boat ride on Rhine river. Later we proceed to hotel in Innsbruck, Austria. Check-in at the hotel. Overnight stay at Hotel.', 0),
(160, 12, 'After breakfast proceed to visit Salzburg and take a walking tour of the city where the legendary movie – Sound Of Music was shot. Schloss Mirabell – The Palace in Mirabellgarten built by the Prince – Archbishop Wolf Dietrich for his Mistress and also the Birthplace of Mozart.After on the way lunch will visit the spectacular world of SWAROVSKI CRYSTAL WORLD later we proceed for an orientation tour of this beautiful city, where we take you pass The Winter Olympic Stadium. We will also visit the \'THE GOLDEN DACH\' (Golden Roof). Overnight stay at Hotel.', 0),
(160, 13, 'Proceed to Munich Airport (Approx. 2 hrs Drive) to board the flight to Mumbai. Arrive Mumbai & End of Memorable Tour Conducted by Heena Tours & Travels.', 0),
(162, 1, 'Arrival in Goa', 0),
(162, 2, 'Full day combined sightseeing of North & South Goa. Fort Aguada, Sinquerim Beach, Shree Manguesh Temple, Old Goa Churches, Dona Paula, Shopping time at Panjim, Miramar Beach, Lunch at Spice Plantation - at extra cost, Mandovi River Cruise at extra cost. (Spice Plantation opened only from Oct till May)', 0),
(162, 3, 'Day at Leisure', 0),
(162, 4, 'In the morning transfer to the airport to board the flight for your onward destination', 0),
(163, 1, 'wsdsd', 0),
(163, 2, 'fcd', 0),
(163, 3, 'eeedfed', 0),
(163, 4, 'sd', 0),
(164, 1, 'saxsadadsaaxssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 0),
(164, 2, 'sadsadsadasdasfssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssc', 0),
(164, 3, 'sdsdsdsddsdsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 0),
(164, 4, 'sdsddccccccccssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 0),
(164, 5, 'ssdsdsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 0);

-- --------------------------------------------------------

--
-- Table structure for table `place_itenary`
--

CREATE TABLE `place_itenary` (
  `package_source` varchar(255) NOT NULL,
  `itenary_acc_to_location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `hotel_price` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `hotel_id`, `hotel_price`, `room_type_id`) VALUES
(5, 1, 1000, 3),
(6, 1, 1500, 4),
(7, 1, 2000, 5),
(8, 2, 1200, 3),
(9, 2, 1400, 4),
(10, 2, 1800, 5),
(11, 3, 1250, 3),
(12, 3, 1700, 4),
(13, 3, 2300, 5),
(14, 4, 1200, 3),
(15, 4, 1400, 4),
(16, 4, 1800, 5),
(17, 5, 2200, 3),
(18, 5, 2400, 4),
(19, 5, 3000, 5),
(20, 6, 1200, 3),
(21, 6, 1400, 4),
(22, 6, 1800, 5),
(23, 7, 3000, 3),
(24, 7, 3500, 4),
(25, 7, 4000, 5),
(26, 8, 3500, 3),
(27, 8, 4100, 4),
(28, 8, 4800, 5);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(11) NOT NULL,
  `room_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type_name`) VALUES
(3, 'Economy'),
(4, 'Deluxe'),
(5, 'Suite');

-- --------------------------------------------------------

--
-- Table structure for table `static_packages`
--

CREATE TABLE `static_packages` (
  `package_id` int(11) NOT NULL,
  `package_source` varchar(255) NOT NULL,
  `package_destination` varchar(255) NOT NULL,
  `package_no_of_days` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `hotel_id_1` int(11) NOT NULL,
  `hotel_id_2` int(11) NOT NULL,
  `hotel_id_3` int(11) NOT NULL,
  `hotel_id_4` int(11) NOT NULL,
  `hotel_id_5` int(11) NOT NULL,
  `hotel_id_6` int(11) NOT NULL,
  `hotel_id_7` int(11) NOT NULL,
  `hotel_id_8` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `package_price` int(11) NOT NULL,
  `date` date NOT NULL,
  `add_image_1` varchar(255) DEFAULT NULL,
  `add_image_2` varchar(255) DEFAULT NULL,
  `add_image_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static_packages`
--

INSERT INTO `static_packages` (`package_id`, `package_source`, `package_destination`, `package_no_of_days`, `flight_id`, `hotel_id_1`, `hotel_id_2`, `hotel_id_3`, `hotel_id_4`, `hotel_id_5`, `hotel_id_6`, `hotel_id_7`, `hotel_id_8`, `room_id`, `package_price`, `date`, `add_image_1`, `add_image_2`, `add_image_3`) VALUES
(3, 'Mumbai', 'Himachal Pradesh', 13, 5, 1, 2, 3, 4, 5, 6, 7, 8, 3, 6200, '0000-00-00', 'bg-2.jpg', 'bg-1.jpg', 'bg-3.jpg'),
(159, '', 'Manali', 4, 6, 7, 8, 0, 0, 0, 0, 0, 0, 0, 13000, '2018-10-26', 'ffcc33.png', 'bg-home.jpg', 'img3.jpg'),
(160, '', 'Europe', 13, 0, 9, 10, 11, 12, 13, 0, 0, 0, 0, 140500, '2019-02-12', 'london1.jpg', 'usa1.jpg', 'europe1.jpg'),
(162, '', 'Goa', 4, 0, 14, 14, 14, 14, 0, 0, 0, 0, 0, 20000, '2018-12-12', 'bg-2.jpg', 'hotel_image_2.jpg', 'south1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`airport_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `customer_customize_package`
--
ALTER TABLE `customer_customize_package`
  ADD PRIMARY KEY (`customer_customize_package_id`);

--
-- Indexes for table `customer_package_booking`
--
ALTER TABLE `customer_package_booking`
  ADD PRIMARY KEY (`package_booking_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `flight_book`
--
ALTER TABLE `flight_book`
  ADD PRIMARY KEY (`flight_booking_id`);

--
-- Indexes for table `flight_class`
--
ALTER TABLE `flight_class`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `flight_scheduling`
--
ALTER TABLE `flight_scheduling`
  ADD PRIMARY KEY (`scheduling_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_book`
--
ALTER TABLE `hotel_book`
  ADD PRIMARY KEY (`hotel_booking_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `static_packages`
--
ALTER TABLE `static_packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `airport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_customize_package`
--
ALTER TABLE `customer_customize_package`
  MODIFY `customer_customize_package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_package_booking`
--
ALTER TABLE `customer_package_booking`
  MODIFY `package_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `flight_book`
--
ALTER TABLE `flight_book`
  MODIFY `flight_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `flight_class`
--
ALTER TABLE `flight_class`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `flight_scheduling`
--
ALTER TABLE `flight_scheduling`
  MODIFY `scheduling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hotel_book`
--
ALTER TABLE `hotel_book`
  MODIFY `hotel_booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `static_packages`
--
ALTER TABLE `static_packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
