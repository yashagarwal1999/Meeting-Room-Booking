-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 07:59 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtl`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Name` varchar(300) DEFAULT NULL,
  `Password` varchar(500) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Name`, `Password`, `Email`, `Phone`) VALUES
('yash', '202cb962ac59075b964b07152d234b70', 'a@a.com', '1234567890'),
('random', '202cb962ac59075b964b07152d234b70', 'aaa@a.com', '7020963749'),
('Yash', '202cb962ac59075b964b07152d234b70', 'agarvalyash12@gmail.com', '1234567890'),
('yash', '202cb962ac59075b964b07152d234b70', 'q@q.com', '1234567890'),
('yash', '202cb962ac59075b964b07152d234b70', 's@a.com', '1234567890'),
('XYZ', '202cb962ac59075b964b07152d234b70', 'xyz@gmail.com', '7894561230');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `book_id` bigint(20) NOT NULL,
  `slot_id` bigint(20) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `room_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`book_id`, `slot_id`, `user_id`, `booking_date`, `room_id`) VALUES
(1, 1, 'agarvalyash12@gmail.com', '2020-04-08', 1),
(2, 9, 'a@a.com', '2020-04-08', 4),
(3, 12, 'a@a.com', '2020-04-08', 4),
(4, 19, 'a@a.com', '2020-04-08', 4),
(5, 14, 'agarvalyash12@gmail.com', '2020-04-08', 6),
(6, 0, 'agarvalyash12@gmail.com', '2020-04-12', 0),
(7, 0, 'agarvalyash12@gmail.com', '2020-04-12', 0),
(8, 0, 'agarvalyash12@gmail.com', '2020-04-12', 4),
(9, 9, 'agarvalyash12@gmail.com', '2020-04-12', 4),
(10, 1, 'agarvalyash12@gmail.com', '2020-04-13', 1),
(11, 9, 'agarvalyash12@gmail.com', '2020-04-13', 4),
(24, 17, 'agarvalyash12@gmail.com', '2020-04-16', 9),
(25, 9, 'agarvalyash12@gmail.com', '2020-04-16', 4),
(26, 16, 'agarvalyash12@gmail.com', '2020-04-16', 8),
(27, 19, 'agarvalyash12@gmail.com', '2020-04-18', 4),
(31, 1, 'agarvalyash12@gmail.com', '2020-04-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `user_name` varchar(300) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_feedback` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`user_name`, `user_email`, `user_feedback`) VALUES
('Yash', 'agarvalyash12@gmail.com', 'Really good website'),
('Agarwal Yash', 'agarvalyash12@gmail.com', 'Really amazing website!!!!!!!!!!!!!!!!!'),
('XYZ', 'agarvalyash12@gmail.com', 'Amazing');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` bigint(30) NOT NULL,
  `rname` varchar(200) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `rphone` varchar(10) DEFAULT NULL,
  `rarea` varchar(300) DEFAULT NULL,
  `rcity` varchar(300) DEFAULT NULL,
  `pic_location` varchar(300) DEFAULT NULL,
  `info` varchar(2000) DEFAULT NULL,
  `amenities` varchar(500) DEFAULT NULL,
  `availability` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `rname`, `location`, `rphone`, `rarea`, `rcity`, `pic_location`, `info`, `amenities`, `availability`) VALUES
(1, 'Great Room', 'dhankawadi room 3', '1234567890', 'Dhankawadi', 'Pune', 'pics/1', 'The Pune Connaught Place Centre has a prestigious location on Bund Garden Road in the heart of Pune\'s central business district. Located in the most important commercial hub of the city, the centre is close to Indian and multinational corporations working in banking and financial services, management consultancy, accounting, IT and software production. Located on the second floor of an upmarket office building, the centre is also well located for enjoying the many cultural activities in Pune, including classical music and theatre. Pune, which is known for its educational facilities and relative prosperity, is an increasingly important location for IT and automobile companies. The centre is well located for travel to the airport and IT districts and there are a number of hotels nearby.', '#Fan#light#Projector#Find customer parking on-site or nearby.#Find Videoconferencing facilities at this location.', 'Y'),
(2, 'Meeting Room', 'dhankawadi room 4', '1234567890', 'Katraj', 'Pune', 'pics/2', 'The Platinum Tower business centre is located on the 6th floor which is located on Naylor Road. Platinum Tower is an exclusive corporate and technology park set in the heart of Pune’s CBD. This central location makes it an ideal place for the operations of many major enterprises. The business centre is just 1 Km away from the nearest railway station and 7 Kms from the airport. The building has many amenities including a selection of restaurants , cafeteria and banks. The Platinum Tower business centre offers a perfect solution for local and overseas companies looking for flexible and fully-equipped offices with comprehensive services at a reasonable price.', '#Fan#light#Projector#Find customer parking on-site or nearby.#Find Videoconferencing facilities at this location.', 'Y'),
(3, 'Big Room', 'dhankawadi room 5', '1234567890', 'Katraj', 'Pune', 'pics/3', 'The Pune WTC business centre is located in India\'s fourth operational World Trade Centre in Kharadi, the centre of Pune’s Eastern IT Corridor. The 1.6 million square feet integrated business park is a hub for international trade, providing various services and facilities designed specifically to meet the needs of clients in ITES. This large corporate park contains amenities including many F&B outlets, cafeterias, banks and retail. The centre is just 9 Kms away from the city airport and 12 Kms from the main railway station. Companies like Hyundai Motor India Ltd, Sterlite Group and POSCO Steel have their offices in this complex. The Pune WTC centre offers a perfect solution for local and overseas companies looking for flexible and fully-equipped offices with comprehensive services at a reasonable price.', '#Fan#light#Projector#Find customer parking on-site or nearby.#Find Videoconferencing facilities at this location.', 'Y'),
(4, 'Nice Room', 'dhankawadi room 9', '1234567890', 'Dhankawadi', 'Pune', 'pics/4', 'The Pune WTC business centre is located in India\'s fourth operational World Trade Centre in Kharadi, the centre of Pune’s Eastern IT Corridor. The 1.6 million square feet integrated business park is a hub for international trade, providing various services and facilities designed specifically to meet the needs of clients in ITES. This large corporate park contains amenities including many F&B outlets, cafeterias, banks and retail. The centre is just 9 Kms away from the city airport and 12 Kms from the main railway station. Companies like Hyundai Motor India Ltd, Sterlite Group and POSCO Steel have their offices in this complex. The Pune WTC centre offers a perfect solution for local and overseas companies looking for flexible and fully-equipped offices with comprehensive services at a reasonable price.', '#Fan#light#Projector#Find customer parking on-site or nearby.#Find Videoconferencing facilities at this location.', 'Y'),
(5, 'Cool Room', 'dhankawadi room 7', '1234567890', 'Dhankawadi', 'Mumbai', 'pics/5', 'The Pune WTC business centre is located in India\'s fourth operational World Trade Centre in Kharadi, the centre of Pune’s Eastern IT Corridor. The 1.6 million square feet integrated business park is a hub for international trade, providing various services and facilities designed specifically to meet the needs of clients in ITES. This large corporate park contains amenities including many F&B outlets, cafeterias, banks and retail. The centre is just 9 Kms away from the city airport and 12 Kms from the main railway station. Companies like Hyundai Motor India Ltd, Sterlite Group and POSCO Steel have their offices in this complex. The Pune WTC centre offers a perfect solution for local and overseas companies looking for flexible and fully-equipped offices with comprehensive services at a reasonable price.', '#Fan#light#Projector#Find customer parking on-site or nearby.#Find Videoconferencing facilities at this location.', 'Y'),
(6, 'Golden Room', 'Dhankawadi room 5', '1234567890', 'Dhankawadi', 'Pune', 'pics/6', 'The Pune WTC business centre is located in India\'s fourth operational World Trade Centre in Kharadi, the centre of Pune’s Eastern IT Corridor. The 1.6 million square feet integrated business park is a hub for international trade, providing various services and facilities designed specifically to meet the needs of clients in ITES. This large corporate park contains amenities including many F&B outlets, cafeterias, banks and retail. The centre is just 9 Kms away from the city airport and 12 Kms from the main railway station. Companies like Hyundai Motor India Ltd, Sterlite Group and POSCO Steel have their offices in this complex. The Pune WTC centre offers a perfect solution for local and overseas companies looking for flexible and fully-equipped offices with comprehensive services at a reasonable price.', '#Fan#light#Projector#Find customer parking on-site or nearby.#Find Videoconferencing facilities at this location.', 'Y'),
(7, 'Ajax Room', 'dhankawadi room 5', '1234567890', 'Dhankawadi', 'Pune', 'pics/7', 'The Pune WTC business centre is located in India\'s fourth operational World Trade Centre in Kharadi, the centre of Pune’s Eastern IT Corridor. The 1.6 million square feet integrated business park is a hub for international trade, providing various services and facilities designed specifically to meet the needs of clients in ITES. This large corporate park contains amenities including many F&B outlets, cafeterias, banks and retail. The centre is just 9 Kms away from the city airport and 12 Kms from the main railway station. Companies like Hyundai Motor India Ltd, Sterlite Group and POSCO Steel have their offices in this complex. The Pune WTC centre offers a perfect solution for local and overseas companies looking for flexible and fully-equipped offices with comprehensive services at a reasonable price.', '#Fan#light#Projector#Find customer parking on-site or nearby.#Find Videoconferencing facilities at this location.', 'Y'),
(8, 'Perplexed Room', 'dhankawadi room 5', '1234567890', 'Dhankawadi', 'Pune', 'pics/8', 'The Pune WTC business centre is located in India\'s fourth operational World Trade Centre in Kharadi, the centre of Pune’s Eastern IT Corridor. The 1.6 million square feet integrated business park is a hub for international trade, providing various services and facilities designed specifically to meet the needs of clients in ITES. This large corporate park contains amenities including many F&B outlets, cafeterias, banks and retail. The centre is just 9 Kms away from the city airport and 12 Kms from the main railway station. Companies like Hyundai Motor India Ltd, Sterlite Group and POSCO Steel have their offices in this complex. The Pune WTC centre offers a perfect solution for local and overseas companies looking for flexible and fully-equipped offices with comprehensive services at a reasonable price.', '#Fan#light#Projector#Find customer parking on-site or nearby.#Find Videoconferencing facilities at this location.', 'Y'),
(9, 'Finders Room', 'dhankawadi room 3', '1234567890', 'Dhankawadi', 'Pune', 'pics/9', 'The Pune WTC business centre is located in India\'s fourth operational World Trade Centre in Kharadi, the centre of Pune’s Eastern IT Corridor. The 1.6 million square feet integrated business park is a hub for international trade, providing various services and facilities designed specifically to meet the needs of clients in ITES. This large corporate park contains amenities including many F&B outlets, cafeterias, banks and retail. The centre is just 9 Kms away from the city airport and 12 Kms from the main railway station. Companies like Hyundai Motor India Ltd, Sterlite Group and POSCO Steel have their offices in this complex. The Pune WTC centre offers a perfect solution for local and overseas companies looking for flexible and fully-equipped offices with comprehensive services at a reasonable price.', '#Fan#light#Projector#Find customer parking on-site or nearby.#Find Videoconferencing facilities at this location.', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slot_id` bigint(20) NOT NULL,
  `room_id` bigint(20) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `price` int(10) DEFAULT 1000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slot_id`, `room_id`, `start_time`, `end_time`, `price`) VALUES
(1, 1, '08:00:00', '09:00:00', 1000),
(2, 1, '10:00:00', '12:00:00', 4000),
(3, 1, '13:00:00', '15:00:00', 1000),
(4, 1, '15:00:00', '16:00:00', 1000),
(5, 1, '17:00:00', '18:00:00', 1000),
(6, 1, '20:00:00', '23:00:00', 1000),
(7, 1, '23:00:00', '24:00:00', 1000),
(8, 2, '08:00:00', '10:00:00', 1000),
(9, 4, '15:00:00', '18:00:00', 1000),
(10, 2, '08:00:00', '10:00:00', 1200),
(11, 3, '08:00:00', '10:00:00', 1200),
(12, 4, '11:00:00', '12:00:00', 1200),
(13, 5, '08:00:00', '10:00:00', 1200),
(14, 6, '08:00:00', '10:00:00', 1200),
(15, 7, '08:00:00', '10:00:00', 1200),
(16, 8, '08:00:00', '10:00:00', 1200),
(17, 9, '08:00:00', '10:00:00', 2200),
(18, 3, '08:00:00', '10:00:00', 1800),
(19, 4, '19:00:00', '20:00:00', 1300),
(20, 5, '08:00:00', '10:00:00', 200),
(21, 6, '08:00:00', '10:00:00', 200),
(22, 7, '08:00:00', '10:00:00', 200),
(23, 8, '08:00:00', '10:00:00', 200),
(24, 2, '08:00:00', '10:00:00', 3200),
(25, 9, '08:00:00', '10:00:00', 3200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slot_id`),
  ADD KEY `room_id` (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `book_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `slot_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `slots`
--
ALTER TABLE `slots`
  ADD CONSTRAINT `slots_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
