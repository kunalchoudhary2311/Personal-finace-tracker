-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2026 at 11:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal_finace_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `budget_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `monthly_limit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`budget_id`, `user_id`, `category`, `monthly_limit`) VALUES
(2, 13, 'food', 150.00),
(3, 13, 'Breakfast', 100.00),
(4, 13, 'shopping', 1000.00),
(5, 15, 'food', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `expense_amount` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `expense_date` date NOT NULL,
  `is_auto` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `user_id`, `category`, `expense_amount`, `description`, `expense_date`, `is_auto`) VALUES
(2, 13, 'food', 1000.00, 'samosa', '2026-01-31', 0),
(3, 13, 'food', 1000.00, 'panipuri', '2026-02-01', 0),
(4, 13, 'food', 100.00, 'panipuri', '2026-02-01', 0),
(5, 13, 'shopping', 100.00, 'gens', '2026-02-01', 0),
(33, 15, 'food', 100.00, 'panipuri', '2026-01-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `income_date` date DEFAULT NULL,
  `frequency` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `user_id`, `source`, `amount`, `income_date`, `frequency`) VALUES
(5, 13, 'salary', 10000.00, '2026-01-31', 'Monthly'),
(6, 15, 'salary', 50000.00, '2026-02-01', 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email_id` varchar(150) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `verification_token` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email_id`, `Password`, `verification_token`, `is_verified`, `created_at`) VALUES
(15, 'Kunal choudhary', 'kunalchoudharyet@gmail.com', '$2y$10$xGSaIiMbRzmwMOiNHEYMeO.aVtZJMaeOq5wiGeWgrUgd2AsviEL/2', '', 1, '2026-02-01 07:42:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`budget_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email_id` (`Email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
