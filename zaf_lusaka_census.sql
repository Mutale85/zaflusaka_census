-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2024 at 12:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zaf_lusaka_census`
--

-- --------------------------------------------------------

--
-- Table structure for table `children_and_dependants`
--

CREATE TABLE `children_and_dependants` (
  `id` int(11) NOT NULL,
  `service_number` text NOT NULL,
  `fullnames` text NOT NULL,
  `gender` text NOT NULL,
  `relationship` text NOT NULL,
  `nrc` text DEFAULT NULL,
  `occupation` text DEFAULT NULL,
  `level_of_education` text DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children_and_dependants`
--

INSERT INTO `children_and_dependants` (`id`, `service_number`, `fullnames`, `gender`, `relationship`, `nrc`, `occupation`, `level_of_education`, `age`, `parent_id`) VALUES
(10, '938474', 'Rita Mwembe', 'Female', 'Inlaw', '345263/89/1', 'None', 'High School', 21, 2),
(11, '938474', 'Carol Hamuyuni', 'Female', 'Inlaw', '676352/89/1', 'Working', 'High School', 25, 2),
(12, '8973652', 'Given Phiri', 'Female', 'Daughter', '', 'Dependent', 'Primary School', 7, 2),
(13, '8973652', 'Aarron phiri', 'Male', 'Son', '', 'Dependant', 'Primary School', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `civilian_personnel`
--

CREATE TABLE `civilian_personnel` (
  `id` int(11) NOT NULL,
  `man_number` text NOT NULL,
  `firstname` text NOT NULL,
  `surname` text NOT NULL,
  `occupation` text NOT NULL,
  `phone_number` text NOT NULL,
  `deployment_station` text NOT NULL,
  `marital_status` text NOT NULL,
  `gender` text NOT NULL,
  `spouse_firstname` text NOT NULL,
  `spouse_surname` text NOT NULL,
  `spouse_nrc` text NOT NULL,
  `spouse_phone_number` text NOT NULL,
  `spouse_occupation` text NOT NULL,
  `spouse_employer` text NOT NULL,
  `quarter_number` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `civilian_residents`
--

CREATE TABLE `civilian_residents` (
  `id` int(11) NOT NULL,
  `service_number` text DEFAULT NULL,
  `occupation` text DEFAULT NULL,
  `firstname` text NOT NULL,
  `surname` text NOT NULL,
  `phone_number` text NOT NULL,
  `deployment_station` text DEFAULT NULL,
  `marital_status` text NOT NULL,
  `gender` text NOT NULL,
  `spouse_firstname` text NOT NULL,
  `spouse_surname` text NOT NULL,
  `spouse_service_number` text DEFAULT NULL,
  `spouse_rank` text DEFAULT NULL,
  `spouse_nrc` text NOT NULL,
  `spouse_phone_number` text NOT NULL,
  `spouse_occupation` text NOT NULL,
  `spouse_employer` text NOT NULL,
  `quarter_number` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `civilian_residents`
--

INSERT INTO `civilian_residents` (`id`, `service_number`, `occupation`, `firstname`, `surname`, `phone_number`, `deployment_station`, `marital_status`, `gender`, `spouse_firstname`, `spouse_surname`, `spouse_service_number`, `spouse_rank`, `spouse_nrc`, `spouse_phone_number`, `spouse_occupation`, `spouse_employer`, `quarter_number`, `parent_id`) VALUES
(3, '8973652', 'Civilian Personnel', 'Abisha', 'Phiri', '0977335522', 'Zaf Lusaka', 'Married', 'Male', 'Gwendoline', 'Bwalya', '', '', '439876/98/1', '0977001122', 'House wife', '', 'MA 60, room 65.\r\nZAF Lusaka', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `service_number` text NOT NULL,
  `password` text NOT NULL,
  `time_login` datetime NOT NULL DEFAULT current_timestamp(),
  `user_ip` text NOT NULL,
  `user_country` text DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id`, `parent_id`, `service_number`, `password`, `time_login`, `user_ip`, `user_country`, `logout_time`) VALUES
(156, 1, '938126', '$2y$10$J9RysAYw6ys/kwcVlvthzub3LvdBfofsxIdyehCptd9E8GhLXZWgC', '2022-01-26 16:05:16', '::1', NULL, '2022-01-26 16:08:28'),
(157, 1, '938126', '$2y$10$J9RysAYw6ys/kwcVlvthzub3LvdBfofsxIdyehCptd9E8GhLXZWgC', '2022-01-26 16:08:54', '::1', NULL, '2022-01-26 19:30:35'),
(158, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-01-30 15:32:50', '::1', NULL, '2022-01-30 18:43:48'),
(159, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-02-21 16:40:43', '::1', NULL, NULL),
(160, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-03-14 13:53:22', '::1', NULL, NULL),
(161, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-03-14 15:45:19', '::1', NULL, '2022-03-14 15:46:57'),
(162, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-04-10 07:45:53', '::1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `motor_vehicles`
--

CREATE TABLE `motor_vehicles` (
  `id` int(11) NOT NULL,
  `service_number` text NOT NULL,
  `make` text NOT NULL,
  `model` text NOT NULL,
  `year` text NOT NULL,
  `reg_number` text NOT NULL,
  `color` text NOT NULL,
  `remarks` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motor_vehicles`
--

INSERT INTO `motor_vehicles` (`id`, `service_number`, `make`, `model`, `year`, `reg_number`, `color`, `remarks`, `parent_id`) VALUES
(6, '938474', 'Toyota', 'Vitz', '2011', 'BBF 7878', 'Silver', 'The vehicle is in good condition', 2),
(7, '938474', 'BMW', 'M3', '2012', 'BBZ 9901', 'Black Green', 'Vehicle is a runner', 2);

-- --------------------------------------------------------

--
-- Table structure for table `private_employees`
--

CREATE TABLE `private_employees` (
  `id` int(11) NOT NULL,
  `service_number` text NOT NULL,
  `fullnames` text NOT NULL,
  `gender` text NOT NULL,
  `age` text DEFAULT NULL,
  `nrc` text NOT NULL,
  `address` text NOT NULL,
  `employee_type` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `private_employees`
--

INSERT INTO `private_employees` (`id`, `service_number`, `fullnames`, `gender`, `age`, `nrc`, `address`, `employee_type`, `parent_id`) VALUES
(1, '938474', 'Siko Mumba', 'Male', '37', '998274/78/1', 'House Number 34,  Chelstone', 'Living Out', 2),
(2, '938474', 'Maureen Nagiye', 'Female', '23', '903728/98/1', '104 B, Pemblock Quarters, ZAF LUSAKA', 'Living In', 2);

-- --------------------------------------------------------

--
-- Table structure for table `service_personnel`
--

CREATE TABLE `service_personnel` (
  `id` int(11) NOT NULL,
  `service_number` text NOT NULL,
  `rank` text NOT NULL,
  `firstname` text NOT NULL,
  `surname` text NOT NULL,
  `trade_branch` text NOT NULL,
  `phone_number` text NOT NULL,
  `unit` text NOT NULL,
  `marital_status` text NOT NULL,
  `gender` text NOT NULL,
  `spouse_firstname` text NOT NULL,
  `spouse_surname` text NOT NULL,
  `spouse_service_number` text DEFAULT NULL,
  `spouse_rank` text DEFAULT NULL,
  `spouse_nrc` text NOT NULL,
  `spouse_phone_number` text NOT NULL,
  `spouse_occupation` text NOT NULL,
  `spouse_employer` text NOT NULL,
  `quarter_number` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_personnel`
--

INSERT INTO `service_personnel` (`id`, `service_number`, `rank`, `firstname`, `surname`, `trade_branch`, `phone_number`, `unit`, `marital_status`, `gender`, `spouse_firstname`, `spouse_surname`, `spouse_service_number`, `spouse_rank`, `spouse_nrc`, `spouse_phone_number`, `spouse_occupation`, `spouse_employer`, `quarter_number`, `parent_id`) VALUES
(1, '938474', 'FSGT', 'George Mutale', 'Mulenga', 'Fire', '+260976330092', 'ZAF Lusaka', 'Married', 'Male', 'Harriet H', 'Tembo', '', '', '266673/73/1', '0978428707', 'Nurse', 'Ministry of Health', 'House number 104B, \r\nPemblock Married Quarters\r\nZAF Lusaka', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `service_number` text NOT NULL,
  `user_type` enum('super_admin','admin') NOT NULL,
  `password` text NOT NULL,
  `user_name` text NOT NULL,
  `unit` text NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `active` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `service_number`, `user_type`, `password`, `user_name`, `unit`, `parent_id`, `active`) VALUES
(1, '938126', 'super_admin', '$2y$10$J9RysAYw6ys/kwcVlvthzub3LvdBfofsxIdyehCptd9E8GhLXZWgC', 'Enock Chanda', 'SSMU', 1, '1'),
(2, '938474', 'super_admin', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', 'Mutale Mulenga', 'ZAF Lusaka', 2, '1'),
(3, '938390', 'super_admin', '$2y$10$MF69b7aNzsZqpdaJRCknUuHv.eQxYo779bOD5O0I8j6PF.wA9pkRW', 'Harrison Banda', 'MT EUG', 3, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children_and_dependants`
--
ALTER TABLE `children_and_dependants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `civilian_personnel`
--
ALTER TABLE `civilian_personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `civilian_residents`
--
ALTER TABLE `civilian_residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motor_vehicles`
--
ALTER TABLE `motor_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `private_employees`
--
ALTER TABLE `private_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_personnel`
--
ALTER TABLE `service_personnel`
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
-- AUTO_INCREMENT for table `children_and_dependants`
--
ALTER TABLE `children_and_dependants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `civilian_personnel`
--
ALTER TABLE `civilian_personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `civilian_residents`
--
ALTER TABLE `civilian_residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `motor_vehicles`
--
ALTER TABLE `motor_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `private_employees`
--
ALTER TABLE `private_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_personnel`
--
ALTER TABLE `service_personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
