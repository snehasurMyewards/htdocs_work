-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 07:46 PM
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
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User 1', 'user1@example.com', NULL, '$2y$10$V/fRn9XvkppBKp4IwEucvep2lEGjxK7XC5kQzAjutnnpRfDHyN14O', NULL, '2024-07-15 10:33:58', '2024-07-15 10:33:58'),
(2, 'User 2', 'user2@example.com', NULL, '$2y$10$dRwiv9U2PL1Q3qwFIWe1zuUOU5jj9r5ITLM14dh438/Bw.6aoy7oa', NULL, '2024-07-15 10:33:58', '2024-07-15 10:33:58'),
(3, 'User 3', 'user3@example.com', NULL, '$2y$10$ChtqZv/5YGhcBKr/WCrBdOKeEboI4TeIkrDslyL0QsuJ0amfhTFl6', NULL, '2024-07-15 10:33:58', '2024-07-15 10:33:58'),
(4, 'User 4', 'user4@example.com', NULL, '$2y$10$gv2mTPqljpPqvzrrf6clHecoI4ytq3CIpwQWii4vQjHOraGWhvclC', NULL, '2024-07-15 10:33:58', '2024-07-15 10:33:58'),
(5, 'User 5', 'user5@example.com', NULL, '$2y$10$5DpiGctQ3rAnNFKBhlrWrujSPlusEKKytyEowwEnVtt.ThdNRhQpC', NULL, '2024-07-15 10:33:58', '2024-07-15 10:33:58'),
(6, 'User 6', 'user6@example.com', NULL, '$2y$10$skjxHL7DKKpdRKA6X7115eVWLiuuHSbqHkQ62JxzpvdspdSNoGS66', NULL, '2024-07-15 10:33:58', '2024-07-15 10:33:58'),
(7, 'User 7', 'user7@example.com', NULL, '$2y$10$yNCLQbIDnvlhlchnzIqZKOGf22DNNpE0dns.Tq7of67AxjIEFc7.6', NULL, '2024-07-15 10:33:58', '2024-07-15 10:33:58'),
(8, 'User 8', 'user8@example.com', NULL, '$2y$10$GVLXatFuV5cV007HCGt6oO2nwXygLRRnT.PXZhJ1meYSlezW76rCu', NULL, '2024-07-15 10:33:58', '2024-07-15 10:33:58'),
(9, 'User 9', 'user9@example.com', NULL, '$2y$10$EpLC0q6X5oRIlIqYDOnx7OVGvcQ5STmEvbJS4OvwJOBU20/aW.YpS', NULL, '2024-07-15 10:33:58', '2024-07-15 10:33:58'),
(10, 'User 10', 'user10@example.com', NULL, '$2y$10$X2zDg7jd5hqIgCxnIUMIDOsQkiwRXL3CGtQ.XdxAH0oEwqzPguDJS', NULL, '2024-07-15 10:33:59', '2024-07-15 10:33:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
