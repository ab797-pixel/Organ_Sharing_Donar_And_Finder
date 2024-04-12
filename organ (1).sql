-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2024 at 12:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organ`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `available_organs`
--

CREATE TABLE `available_organs` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `blood_type` varchar(10) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `cause_of_death` varchar(10) NOT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `organ_name` varchar(20) NOT NULL,
  `alive_timing` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `available_organs`
--

INSERT INTO `available_organs` (`id`, `doctor_id`, `patient_name`, `age`, `gender`, `blood_type`, `mobile`, `address`, `cause_of_death`, `reason`, `organ_name`, `alive_timing`) VALUES
(29, 13, 'flag', 12, 'FEMALE', 'b+', '9487741714', 'thiruvarur', 'Brain_Deat', 'kaal thadiki', 'Heart', '13 Feb 2024 18:26:23'),
(30, 13, 'go', 67, 'MALE', 'o-', '9487741714', '625,main road ,thiruvarur', 'Brain_Deat', 'bike assite', 'Heart', '13 Feb 2024 18:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `taluk` varchar(40) NOT NULL,
  `post` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `mobile`, `hospital_name`, `state`, `district`, `taluk`, `post`) VALUES
(13, 'pavithra', 'pavithra@gmail.com', '123', '9487741714', 'tmc', 'Tamil nadu', 'thiruvarur', 'thiruvarur', 'thiruvarur'),
(14, 'test', 'test@gmail.com', '123', '987643210', 'tmc', 'Tamil nadu', 'hi', 'nk', 'hs');

-- --------------------------------------------------------

--
-- Table structure for table `donate_organs`
--

CREATE TABLE `donate_organs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_doctor_id` int(11) DEFAULT NULL,
  `patient_name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `blood_type` varchar(10) NOT NULL,
  `donate_organ` varchar(10) NOT NULL,
  `reason` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donate_organs`
--

INSERT INTO `donate_organs` (`id`, `user_id`, `contact_doctor_id`, `patient_name`, `age`, `gender`, `address`, `mobile`, `blood_type`, `donate_organ`, `reason`) VALUES
(1, 3, 13, 'pavithra', 23, 'FEMALE', '102/3 thiruvarur', '9487741714', 'b+', 'EYE', 'nothiing');

-- --------------------------------------------------------

--
-- Table structure for table `organs`
--

CREATE TABLE `organs` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(30) NOT NULL,
  `alive_min` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organs`
--

INSERT INTO `organs` (`id`, `name`, `quantity`, `alive_min`) VALUES
(13, 'Heart', 0, 45),
(14, 'EYE', 0, 15),
(15, 'kidney', 0, 120);

-- --------------------------------------------------------

--
-- Table structure for table `request_organs`
--

CREATE TABLE `request_organs` (
  `id` int(30) NOT NULL,
  `organ_name` varchar(30) NOT NULL,
  `user_id` int(30) DEFAULT NULL,
  `doctor_id` int(30) DEFAULT NULL,
  `patient_name` varchar(50) NOT NULL,
  `expected_date` date NOT NULL,
  `age` int(10) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `mobile` varchar(30) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `blood_type` varchar(10) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `available_doctor_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_organs`
--

INSERT INTO `request_organs` (`id`, `organ_name`, `user_id`, `doctor_id`, `patient_name`, `expected_date`, `age`, `address`, `mobile`, `gender`, `blood_type`, `status`, `available_doctor_id`) VALUES
(24, 'HEART', 3, NULL, 'plla', '2024-01-20', 34, '2,main road ,thiruvarur', '9487741714', 'MALE', 'b+', 'Pending', 13),
(29, 'KIDNEY', 0, 13, 'octor reqesrt', '2024-02-12', 67, '102/3 thiruvarur', '9487741714', 'FEMALE', 'F7', 'Available', 0),
(30, 'EYE', 0, 13, 'flag', '2024-02-13', 12, '123 man', '9487741714', 'MALE', 'o-', 'Available', 0),
(31, 'EYE', 0, 13, 'flag', '2024-02-13', 12, '123 man', '9487741714', 'MALE', 'o-', 'Pending', 0),
(32, 'HEART', 0, 13, 'go', '2024-02-13', 9, '6769', '9487741714', 'MALE', '9=', 'Available', 13),
(33, 'HEART', 0, 13, 'go', '2024-02-13', 9, '6769', '9487741714', 'MALE', '9=', 'Pending', 0),
(34, 'KIDNEY', 3, 0, 'test', '2024-02-11', 12, '123,MAIN PDK', '908765432', 'MALE', 'b+', 'Available', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `aadhar` varchar(20) DEFAULT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `aadhar`, `address`) VALUES
(3, 'pavithra', 'pavithra@gmail.com', '123', '9487741714', '12345678912', '625,main road ,thiruvarur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_organs`
--
ALTER TABLE `available_organs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate_organs`
--
ALTER TABLE `donate_organs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organs`
--
ALTER TABLE `organs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_organs`
--
ALTER TABLE `request_organs`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available_organs`
--
ALTER TABLE `available_organs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `donate_organs`
--
ALTER TABLE `donate_organs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organs`
--
ALTER TABLE `organs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `request_organs`
--
ALTER TABLE `request_organs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
