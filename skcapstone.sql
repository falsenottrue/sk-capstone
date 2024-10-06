-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 05:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skcapstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `demographics`
--

CREATE TABLE `demographics` (
  `person_id` int(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `marital_status` enum('Single','Married','Divorced','Widowed') DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `education_level` enum('High School','Bachelor''s','Master''s','Doctorate','Other') DEFAULT NULL,
  `employment_status` enum('Employed','Unemployed','Student','Retired') DEFAULT NULL,
  `annual_income` int(11) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `number_of_dependents` int(11) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `hobbies` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prinfo`
--

CREATE TABLE `prinfo` (
  `id` int(255) NOT NULL,
  `fname` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mname` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lname` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `age` int(100) NOT NULL,
  `birthday` date NOT NULL,
  `users_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `usernm` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `passwrd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usernm`, `passwrd`, `email`, `created_at`) VALUES
(6, 'polsnottrue', '$2y$10$/VIhCZa83iuAGCTfODp6Se/1ykTupwyCG6mEezWpSOyBxsSrnshJK', 'falsenottrue@yahoo.com', '2024-10-05 00:00:00'),
(7, 'testing123', '$2y$10$jru74k8AyTYUPDBHJ2GTlupg476IhhpFTG92P0MRd4GGjpgQRWwcm', 'testing@yahoo.com', '2024-10-06 00:00:00'),
(8, 'testing', '$2y$10$lLS9cpDkppqB5g2NBfzbauSacGdY8yx6.AzVOU2U/hl/CJJrT0x2m', 'yologames6@gmail.com', '2024-10-06 22:27:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demographics`
--
ALTER TABLE `demographics`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `prinfo`
--
ALTER TABLE `prinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`usernm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demographics`
--
ALTER TABLE `demographics`
  MODIFY `person_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prinfo`
--
ALTER TABLE `prinfo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prinfo`
--
ALTER TABLE `prinfo`
  ADD CONSTRAINT `prinfo_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
