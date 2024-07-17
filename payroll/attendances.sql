-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 07:45 PM
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
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `in_time` timestamp NULL DEFAULT NULL,
  `out_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `in_time`, `out_time`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-07-01 03:34:08', '2024-07-01 13:26:54', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(2, 2, '2024-07-01 04:21:47', '2024-07-01 10:54:56', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(3, 3, NULL, NULL, '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(4, 4, '2024-07-01 04:10:31', '2024-07-01 15:26:23', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(5, 5, '2024-07-01 04:17:16', '2024-07-01 13:32:16', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(6, 6, '2024-07-01 07:17:01', '2024-07-01 10:53:55', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(7, 8, '2024-07-01 03:51:01', '2024-07-01 17:07:29', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(8, 9, '2024-07-01 08:43:49', '2024-07-01 17:46:54', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(9, 10, '2024-07-01 07:11:40', '2024-07-01 10:50:42', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(10, 2, NULL, NULL, '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(11, 3, '2024-07-02 09:35:51', '2024-07-02 14:40:12', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(12, 5, '2024-07-02 05:06:19', '2024-07-02 15:24:45', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(13, 6, '2024-07-02 08:19:52', '2024-07-02 10:46:57', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(14, 7, NULL, NULL, '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(15, 8, '2024-07-02 04:58:24', '2024-07-02 15:34:16', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(16, 9, '2024-07-02 02:37:07', '2024-07-02 18:07:57', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(17, 10, '2024-07-02 09:59:47', '2024-07-02 11:07:56', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(18, 1, '2024-07-03 04:54:08', '2024-07-03 14:42:02', '2024-07-15 10:43:10', '2024-07-15 10:43:10'),
(19, 2, '2024-07-03 09:37:40', '2024-07-03 11:07:43', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(20, 3, '2024-07-03 06:46:21', '2024-07-03 17:43:47', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(21, 4, '2024-07-03 11:12:57', '2024-07-03 12:49:38', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(22, 6, '2024-07-03 07:26:55', '2024-07-03 07:55:16', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(23, 7, '2024-07-03 04:56:30', '2024-07-03 12:59:37', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(24, 8, '2024-07-03 02:32:35', '2024-07-03 16:36:50', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(25, 9, '2024-07-03 11:14:50', '2024-07-03 10:36:38', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(26, 10, '2024-07-03 09:01:03', '2024-07-03 11:37:39', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(27, 1, '2024-07-04 09:48:31', '2024-07-04 12:42:00', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(28, 2, '2024-07-04 12:28:01', '2024-07-04 11:17:33', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(29, 5, '2024-07-04 03:22:49', '2024-07-04 17:24:43', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(30, 6, '2024-07-04 02:30:01', '2024-07-04 16:16:46', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(31, 7, '2024-07-04 05:54:38', '2024-07-04 18:28:40', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(32, 8, '2024-07-04 06:50:07', '2024-07-04 11:47:25', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(33, 10, '2024-07-04 02:57:13', '2024-07-04 16:18:23', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(34, 1, '2024-07-05 11:20:10', '2024-07-05 11:22:02', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(35, 3, '2024-07-05 03:10:16', '2024-07-05 13:52:24', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(36, 4, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(37, 5, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(38, 6, '2024-07-05 03:48:45', '2024-07-05 11:18:00', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(39, 7, '2024-07-05 06:30:43', '2024-07-05 16:35:10', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(40, 8, '2024-07-05 09:35:22', '2024-07-05 11:19:13', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(41, 9, '2024-07-05 04:10:41', '2024-07-05 17:02:42', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(42, 10, '2024-07-05 10:21:47', '2024-07-05 10:42:18', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(43, 1, '2024-07-06 02:55:40', '2024-07-06 10:48:08', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(44, 2, '2024-07-06 04:30:52', '2024-07-06 16:32:07', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(45, 4, '2024-07-06 04:44:17', '2024-07-06 16:30:48', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(46, 6, '2024-07-06 04:58:59', '2024-07-06 11:06:52', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(47, 8, '2024-07-06 07:41:47', '2024-07-06 16:26:18', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(48, 9, '2024-07-06 02:34:59', '2024-07-06 13:20:35', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(49, 10, '2024-07-06 02:58:47', '2024-07-06 13:33:54', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(50, 1, '2024-07-07 03:36:23', '2024-07-07 13:39:43', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(51, 2, '2024-07-07 04:58:15', '2024-07-07 15:16:54', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(52, 3, '2024-07-07 03:49:53', '2024-07-07 15:42:17', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(53, 4, '2024-07-07 03:04:29', '2024-07-07 06:44:10', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(54, 7, '2024-07-07 04:20:50', '2024-07-07 10:28:57', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(55, 9, '2024-07-07 03:15:59', '2024-07-07 16:55:11', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(56, 10, '2024-07-07 03:08:42', '2024-07-07 09:54:11', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(57, 1, '2024-07-08 03:04:21', '2024-07-08 14:59:54', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(58, 2, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(59, 4, '2024-07-08 03:35:59', '2024-07-08 17:19:58', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(60, 6, '2024-07-08 05:07:07', '2024-07-08 09:57:18', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(61, 7, '2024-07-08 04:50:19', '2024-07-08 15:35:02', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(62, 8, '2024-07-08 06:48:32', '2024-07-08 11:10:42', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(63, 10, '2024-07-08 08:46:48', '2024-07-08 12:41:51', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(64, 1, '2024-07-09 02:52:28', '2024-07-09 13:08:01', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(65, 3, '2024-07-09 10:46:28', '2024-07-09 11:27:29', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(66, 6, '2024-07-09 08:56:55', '2024-07-09 10:33:18', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(67, 7, '2024-07-09 04:22:59', '2024-07-09 17:23:13', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(68, 9, '2024-07-09 02:35:12', '2024-07-09 16:55:40', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(69, 10, '2024-07-09 11:41:45', '2024-07-09 10:23:35', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(70, 1, '2024-07-10 05:34:11', '2024-07-10 10:52:23', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(71, 2, '2024-07-10 06:38:04', '2024-07-10 08:07:20', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(72, 3, '2024-07-10 06:05:41', '2024-07-10 15:53:39', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(73, 6, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(74, 7, '2024-07-10 03:44:08', '2024-07-10 13:35:15', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(75, 8, '2024-07-10 08:10:47', '2024-07-10 11:24:49', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(76, 9, '2024-07-10 05:27:52', '2024-07-10 17:35:41', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(77, 4, '2024-07-11 08:45:06', '2024-07-11 14:35:07', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(78, 5, '2024-07-11 03:14:19', '2024-07-11 12:11:29', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(79, 6, '2024-07-11 10:35:24', '2024-07-11 11:03:03', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(80, 7, '2024-07-11 12:00:15', '2024-07-11 06:48:38', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(81, 8, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(82, 10, '2024-07-11 04:11:50', '2024-07-11 17:23:13', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(83, 1, '2024-07-12 11:55:56', '2024-07-12 07:26:45', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(84, 2, '2024-07-12 10:14:58', '2024-07-12 10:42:41', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(85, 3, '2024-07-12 03:40:52', '2024-07-12 15:06:21', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(86, 4, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(87, 5, '2024-07-12 06:58:55', '2024-07-12 10:58:29', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(88, 6, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(89, 7, '2024-07-12 08:23:55', '2024-07-12 11:25:30', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(90, 8, '2024-07-12 03:02:51', '2024-07-12 15:40:06', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(91, 9, '2024-07-12 08:03:16', '2024-07-12 10:40:42', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(92, 10, '2024-07-12 03:52:59', '2024-07-12 15:31:55', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(93, 1, '2024-07-13 04:26:37', '2024-07-13 13:57:55', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(94, 3, '2024-07-13 07:35:34', '2024-07-13 10:31:03', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(95, 4, '2024-07-13 04:40:07', '2024-07-13 13:59:24', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(96, 7, '2024-07-13 02:49:56', '2024-07-13 18:16:21', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(97, 8, '2024-07-13 11:49:25', '2024-07-13 15:12:26', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(98, 9, '2024-07-13 03:51:20', '2024-07-13 14:50:46', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(99, 10, '2024-07-13 04:06:59', '2024-07-13 11:09:20', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(100, 1, '2024-07-14 06:01:38', '2024-07-14 11:11:18', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(101, 2, '2024-07-14 06:19:50', '2024-07-14 14:09:15', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(102, 3, '2024-07-14 03:47:46', '2024-07-14 17:50:16', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(103, 4, '2024-07-14 08:21:38', '2024-07-14 17:09:24', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(104, 5, '2024-07-14 05:00:11', '2024-07-14 14:47:41', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(105, 6, '2024-07-14 08:12:49', '2024-07-14 12:24:31', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(106, 7, '2024-07-14 03:02:10', '2024-07-14 17:26:18', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(107, 8, '2024-07-14 03:13:38', '2024-07-14 12:43:09', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(108, 9, '2024-07-14 03:13:26', '2024-07-14 16:27:14', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(109, 10, '2024-07-14 10:45:30', '2024-07-14 11:04:36', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(110, 1, '2024-07-15 04:00:44', '2024-07-15 12:43:56', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(111, 3, '2024-07-15 11:51:00', '2024-07-15 11:18:52', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(112, 6, '2024-07-15 11:20:48', '2024-07-15 11:16:44', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(113, 7, '2024-07-15 05:11:10', '2024-07-15 11:09:05', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(114, 8, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(115, 9, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(116, 1, '2024-07-16 03:52:25', '2024-07-16 11:01:11', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(117, 3, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(118, 4, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(119, 5, '2024-07-16 06:55:42', '2024-07-16 15:13:11', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(120, 6, '2024-07-16 04:53:48', '2024-07-16 16:46:37', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(121, 7, '2024-07-16 05:16:56', '2024-07-16 11:12:22', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(122, 8, '2024-07-16 02:38:46', '2024-07-16 14:50:06', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(123, 9, '2024-07-16 02:34:38', '2024-07-16 12:39:51', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(124, 10, '2024-07-16 08:39:55', '2024-07-16 11:03:41', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(125, 2, '2024-07-17 04:11:51', '2024-07-17 09:34:57', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(126, 3, '2024-07-17 07:57:44', '2024-07-17 12:51:05', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(127, 4, '2024-07-17 04:00:48', '2024-07-17 14:27:41', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(128, 5, '2024-07-17 04:10:55', '2024-07-17 17:14:07', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(129, 7, '2024-07-17 06:39:34', '2024-07-17 11:22:15', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(130, 8, '2024-07-17 04:34:12', '2024-07-17 13:32:40', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(131, 9, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(132, 10, '2024-07-17 10:52:48', '2024-07-17 10:32:47', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(133, 1, '2024-07-18 04:00:52', '2024-07-18 15:58:32', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(134, 3, '2024-07-18 03:43:32', '2024-07-18 06:49:01', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(135, 4, '2024-07-18 04:37:03', '2024-07-18 14:14:44', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(136, 5, '2024-07-18 07:18:19', '2024-07-18 15:17:41', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(137, 6, '2024-07-18 03:03:53', '2024-07-18 17:39:51', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(138, 7, '2024-07-18 05:11:00', '2024-07-18 14:44:34', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(139, 8, '2024-07-18 09:25:15', '2024-07-18 16:39:16', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(140, 9, '2024-07-18 07:07:06', '2024-07-18 06:32:28', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(141, 10, '2024-07-18 04:56:49', '2024-07-18 15:29:42', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(142, 1, '2024-07-19 04:59:46', '2024-07-19 10:36:11', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(143, 2, '2024-07-19 05:15:51', '2024-07-19 11:19:12', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(144, 3, '2024-07-19 10:33:29', '2024-07-19 17:17:01', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(145, 4, '2024-07-19 02:44:56', '2024-07-19 15:07:31', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(146, 5, '2024-07-19 11:16:46', '2024-07-19 07:33:58', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(147, 6, '2024-07-19 04:44:13', '2024-07-19 18:09:29', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(148, 7, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(149, 8, '2024-07-19 04:20:45', '2024-07-19 14:11:03', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(150, 10, '2024-07-19 03:32:05', '2024-07-19 14:47:38', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(151, 1, '2024-07-20 08:42:42', '2024-07-20 11:02:00', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(152, 4, '2024-07-20 03:37:00', '2024-07-20 11:28:51', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(153, 5, '2024-07-20 04:35:28', '2024-07-20 12:40:06', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(154, 7, '2024-07-20 04:37:32', '2024-07-20 15:46:02', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(155, 10, '2024-07-20 04:47:40', '2024-07-20 17:06:57', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(156, 1, '2024-07-21 02:31:27', '2024-07-21 15:38:11', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(157, 2, '2024-07-21 03:09:17', '2024-07-21 16:59:18', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(158, 3, '2024-07-21 06:32:12', '2024-07-21 11:07:48', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(159, 4, '2024-07-21 06:55:29', '2024-07-21 10:59:27', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(160, 5, '2024-07-21 04:48:20', '2024-07-21 14:05:53', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(161, 6, '2024-07-21 09:25:47', '2024-07-21 10:37:04', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(162, 7, '2024-07-21 02:59:40', '2024-07-21 14:38:57', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(163, 8, '2024-07-21 07:52:14', '2024-07-21 14:11:03', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(164, 1, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(165, 2, '2024-07-22 03:38:42', '2024-07-22 12:30:54', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(166, 3, '2024-07-22 09:11:30', '2024-07-22 16:25:25', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(167, 4, '2024-07-22 08:22:16', '2024-07-22 15:34:11', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(168, 5, '2024-07-22 04:01:19', '2024-07-22 17:10:23', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(169, 6, '2024-07-22 04:35:56', '2024-07-22 13:24:54', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(170, 7, '2024-07-22 03:32:37', '2024-07-22 12:51:18', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(171, 8, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(172, 9, '2024-07-22 04:55:38', '2024-07-22 17:29:02', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(173, 10, '2024-07-22 09:38:27', '2024-07-22 10:33:30', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(174, 1, '2024-07-23 06:52:48', '2024-07-23 17:22:22', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(175, 2, '2024-07-23 05:13:48', '2024-07-23 11:16:44', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(176, 3, '2024-07-23 10:23:50', '2024-07-23 13:19:52', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(177, 4, '2024-07-23 04:58:11', '2024-07-23 16:12:34', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(178, 5, '2024-07-23 03:30:22', '2024-07-23 12:43:07', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(179, 6, '2024-07-23 06:12:39', '2024-07-23 09:42:11', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(180, 7, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(181, 9, '2024-07-23 04:40:42', '2024-07-23 16:14:05', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(182, 1, '2024-07-24 02:56:22', '2024-07-24 10:21:02', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(183, 2, '2024-07-24 11:35:00', '2024-07-24 17:04:46', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(184, 3, '2024-07-24 03:25:24', '2024-07-24 10:56:49', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(185, 4, '2024-07-24 04:56:34', '2024-07-24 14:10:56', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(186, 5, '2024-07-24 04:42:16', '2024-07-24 16:07:05', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(187, 6, '2024-07-24 09:13:14', '2024-07-24 15:00:34', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(188, 7, '2024-07-24 06:34:01', '2024-07-24 09:59:27', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(189, 9, '2024-07-24 05:52:31', '2024-07-24 09:30:18', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(190, 10, '2024-07-24 03:36:06', '2024-07-24 13:10:19', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(191, 1, '2024-07-25 06:11:08', '2024-07-25 11:00:25', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(192, 2, '2024-07-25 10:45:54', '2024-07-25 11:00:20', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(193, 3, '2024-07-25 04:15:12', '2024-07-25 14:03:14', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(194, 5, '2024-07-25 10:41:17', '2024-07-25 10:34:14', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(195, 6, '2024-07-25 03:42:30', '2024-07-25 15:15:15', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(196, 7, '2024-07-25 09:37:07', '2024-07-25 08:47:26', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(197, 8, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(198, 9, '2024-07-25 03:27:54', '2024-07-25 14:29:52', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(199, 10, '2024-07-25 03:32:20', '2024-07-25 18:06:26', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(200, 1, '2024-07-26 05:45:10', '2024-07-26 10:31:48', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(201, 2, '2024-07-26 04:40:09', '2024-07-26 13:26:01', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(202, 3, '2024-07-26 05:48:54', '2024-07-26 10:43:39', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(203, 5, '2024-07-26 04:36:12', '2024-07-26 10:46:50', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(204, 6, '2024-07-26 04:18:47', '2024-07-26 15:12:33', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(205, 7, '2024-07-26 08:40:22', '2024-07-26 15:40:22', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(206, 8, '2024-07-26 03:19:13', '2024-07-26 18:27:02', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(207, 9, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(208, 2, '2024-07-27 09:15:56', '2024-07-27 17:15:00', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(209, 4, '2024-07-27 04:16:26', '2024-07-27 17:29:29', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(210, 5, '2024-07-27 10:19:29', '2024-07-27 11:02:44', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(211, 6, '2024-07-27 04:55:58', '2024-07-27 16:42:25', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(212, 8, '2024-07-27 03:41:42', '2024-07-27 13:09:51', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(213, 9, '2024-07-27 04:48:20', '2024-07-27 18:04:09', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(214, 10, '2024-07-27 07:10:20', '2024-07-27 17:47:13', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(215, 1, '2024-07-28 11:47:22', '2024-07-28 10:27:25', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(216, 3, '2024-07-28 04:12:36', '2024-07-28 15:36:29', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(217, 4, '2024-07-28 06:11:03', '2024-07-28 16:38:30', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(218, 5, '2024-07-28 08:33:51', '2024-07-28 12:01:04', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(219, 6, '2024-07-28 03:11:03', '2024-07-28 13:50:22', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(220, 7, '2024-07-28 04:03:58', '2024-07-28 15:04:00', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(221, 8, '2024-07-28 04:37:21', '2024-07-28 16:13:09', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(222, 9, '2024-07-28 02:50:02', '2024-07-28 12:36:12', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(223, 10, '2024-07-28 02:45:31', '2024-07-28 14:35:19', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(224, 1, '2024-07-29 06:37:10', '2024-07-29 15:12:18', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(225, 2, '2024-07-29 02:33:22', '2024-07-29 15:13:15', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(226, 3, '2024-07-29 10:05:37', '2024-07-29 14:38:07', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(227, 5, '2024-07-29 07:34:26', '2024-07-29 10:44:41', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(228, 7, '2024-07-29 04:14:25', '2024-07-29 17:19:41', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(229, 8, NULL, NULL, '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(230, 9, '2024-07-29 09:27:27', '2024-07-29 11:16:21', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(231, 10, '2024-07-29 02:43:47', '2024-07-29 17:23:52', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(232, 2, '2024-07-30 05:55:34', '2024-07-30 10:18:39', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(233, 3, '2024-07-30 11:21:21', '2024-07-30 16:22:34', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(234, 4, '2024-07-30 07:01:14', '2024-07-30 11:23:59', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(235, 5, '2024-07-30 08:09:08', '2024-07-30 13:12:28', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(236, 6, '2024-07-30 09:46:14', '2024-07-30 10:45:35', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(237, 7, '2024-07-30 06:49:44', '2024-07-30 09:19:48', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(238, 8, '2024-07-30 04:54:31', '2024-07-30 16:33:56', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(239, 9, '2024-07-30 03:30:20', '2024-07-30 17:23:23', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(240, 10, '2024-07-30 03:24:41', '2024-07-30 12:49:58', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(241, 1, '2024-07-31 03:45:29', '2024-07-31 17:46:33', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(242, 2, '2024-07-31 07:18:50', '2024-07-31 08:02:58', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(243, 3, '2024-07-31 02:57:26', '2024-07-31 11:45:27', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(244, 4, '2024-07-31 05:16:26', '2024-07-31 17:42:14', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(245, 5, '2024-07-31 07:19:16', '2024-07-31 11:21:51', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(246, 6, '2024-07-31 07:47:09', '2024-07-31 10:40:06', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(247, 7, '2024-07-31 04:17:10', '2024-07-31 11:53:28', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(248, 8, '2024-07-31 04:15:31', '2024-07-31 13:51:31', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(249, 9, '2024-07-31 02:54:47', '2024-07-31 12:15:16', '2024-07-15 10:43:11', '2024-07-15 10:43:11'),
(250, 10, '2024-07-31 04:42:52', '2024-07-31 14:39:52', '2024-07-15 10:43:11', '2024-07-15 10:43:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
