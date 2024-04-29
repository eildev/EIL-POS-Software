-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 05:56 AM
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
-- Database: `eil_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `actual_payments`
--

CREATE TABLE `actual_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` enum('receive','pay') NOT NULL,
  `payment_method` int(20) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL,
  `date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actual_payments`
--

INSERT INTO `actual_payments` (`id`, `branch_id`, `payment_type`, `payment_method`, `customer_id`, `supplier_id`, `amount`, `date`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'pay', 5, NULL, 14, 20838.40, '2024-04-16', NULL, '2024-04-04 01:50:56', '2024-04-04 01:50:56'),
(2, 1, 'pay', 4, NULL, 14, 20838.40, '2024-04-16', NULL, '2024-04-04 02:09:43', '2024-04-04 02:09:43'),
(3, 1, 'pay', 4, NULL, 14, 20838.40, '2024-04-16', NULL, '2024-04-04 02:11:06', '2024-04-04 02:11:06'),
(4, 1, 'pay', 4, NULL, 14, 20838.40, '2024-04-16', NULL, '2024-04-04 02:11:35', '2024-04-04 02:11:35'),
(5, 1, 'pay', 4, NULL, 23, 10000.00, '2024-04-15', NULL, '2024-04-14 21:33:09', '2024-04-14 21:33:09'),
(6, 1, 'pay', 5, NULL, 16, 71077.74, '2024-04-02', NULL, '2024-04-16 23:50:09', '2024-04-16 23:50:09'),
(7, 1, 'pay', 5, NULL, 15, 2159.00, '2024-04-23', NULL, '2024-04-17 00:19:38', '2024-04-17 00:19:38'),
(8, 1, 'pay', 5, NULL, 16, 21779.00, '2024-04-08', NULL, '2024-04-17 00:35:44', '2024-04-17 00:35:44'),
(9, 1, 'pay', 4, NULL, 14, 117312.20, '2024-04-15', NULL, '2024-04-17 03:23:42', '2024-04-17 03:23:42'),
(10, 1, 'pay', 4, NULL, 17, 20579.00, '2024-04-15', NULL, '2024-04-17 03:27:51', '2024-04-17 03:27:51'),
(11, 1, 'pay', 5, NULL, 15, 100.00, '2024-04-09', NULL, '2024-04-17 03:47:08', '2024-04-17 03:47:08'),
(12, 1, 'pay', 5, NULL, 16, 30529.00, '2024-04-15', NULL, '2024-04-17 03:48:31', '2024-04-17 03:48:31'),
(13, 1, 'pay', 4, NULL, 16, 81348.20, '2024-04-15', NULL, '2024-04-17 04:15:15', '2024-04-17 04:15:15'),
(14, 1, 'pay', 6, NULL, 16, 307279.00, '2024-04-16', NULL, '2024-04-17 04:46:46', '2024-04-17 04:46:46'),
(15, 1, 'pay', 4, NULL, 12, 1023.00, '2024-04-09', NULL, '2024-04-17 22:13:29', '2024-04-17 22:13:29'),
(16, 1, 'pay', 4, NULL, 15, 1855.18, '2024-04-15', NULL, '2024-04-17 22:35:05', '2024-04-17 22:35:05'),
(17, 1, 'pay', 3, NULL, 14, 9246.30, '2024-04-16', NULL, '2024-04-17 23:03:36', '2024-04-17 23:03:36'),
(18, 1, 'pay', 3, NULL, 16, 17745.20, '2024-04-16', NULL, '2024-04-17 23:30:56', '2024-04-17 23:30:56'),
(19, 1, 'pay', 4, NULL, 16, 0.00, '2024-04-16', NULL, '2024-04-17 23:41:36', '2024-04-17 23:41:36'),
(20, 1, 'pay', 4, NULL, 14, 73892.70, '2024-04-09', NULL, '2024-04-17 23:59:17', '2024-04-17 23:59:17'),
(21, 1, 'pay', 4, NULL, 15, 10932.39, '2024-04-16', NULL, '2024-04-18 00:04:03', '2024-04-18 00:04:03'),
(22, 1, 'pay', 4, NULL, 14, 18065.25, '2024-04-16', NULL, '2024-04-18 00:07:26', '2024-04-18 00:07:26'),
(23, 1, 'pay', 4, NULL, 15, 21800.00, '2024-04-17', NULL, '2024-04-18 00:09:16', '2024-04-18 00:09:16'),
(24, 1, 'pay', 4, NULL, 16, 10000.00, '2024-04-16', NULL, '2024-04-18 00:13:35', '2024-04-18 00:13:35'),
(25, 1, 'pay', 4, NULL, 15, 2159.00, '2024-04-16', NULL, '2024-04-18 00:15:12', '2024-04-18 00:15:12'),
(26, 1, 'pay', 3, NULL, 16, 9985.50, '2024-04-16', NULL, '2024-04-18 00:16:19', '2024-04-18 00:16:19'),
(27, 1, 'pay', 5, NULL, 15, 100000.00, '2024-04-16', NULL, '2024-04-18 00:35:39', '2024-04-18 00:35:39'),
(28, 1, 'pay', 5, NULL, 24, 10930.00, '2024-04-17', NULL, '2024-04-18 02:17:24', '2024-04-18 02:17:24'),
(29, 1, 'pay', 3, NULL, 24, 10000.00, '2024-04-24', NULL, '2024-04-18 02:19:14', '2024-04-18 02:19:14'),
(30, 1, 'pay', 4, NULL, 17, 12000.00, '2024-04-30', NULL, '2024-04-18 02:21:49', '2024-04-18 02:21:49'),
(31, 1, 'pay', 4, NULL, 26, 110900.00, '2024-04-09', NULL, '2024-04-18 02:26:56', '2024-04-18 02:26:56'),
(32, 1, 'pay', 5, NULL, 26, 10000.00, '2024-04-16', NULL, '2024-04-18 02:28:39', '2024-04-18 02:28:39'),
(33, 1, 'pay', 4, NULL, 26, 3000.00, '2024-04-17', NULL, '2024-04-18 02:30:38', '2024-04-18 02:30:38'),
(34, 1, 'pay', 4, NULL, 28, 10930.00, '2024-04-23', NULL, '2024-04-18 02:37:51', '2024-04-18 02:37:51'),
(35, 1, 'pay', 3, NULL, 28, 1000.00, '2024-04-16', NULL, '2024-04-18 02:38:50', '2024-04-18 02:38:50'),
(36, 1, 'pay', 4, NULL, 15, 10000.00, '2024-04-16', NULL, '2024-04-18 02:41:03', '2024-04-18 02:41:03'),
(37, 1, 'pay', 5, NULL, 30, 2000.00, '2024-04-16', NULL, '2024-04-18 02:45:18', '2024-04-18 02:45:18'),
(38, 1, 'pay', 3, NULL, 16, 21800.00, '2024-04-16', NULL, '2024-04-18 04:04:41', '2024-04-18 04:04:41'),
(39, 1, 'pay', 6, NULL, 17, 84926.10, '2024-04-15', NULL, '2024-04-18 04:29:20', '2024-04-18 04:29:20'),
(40, 1, 'pay', 6, NULL, 22, 28107.42, '2024-04-08', NULL, '2024-04-18 05:32:31', '2024-04-18 05:32:31'),
(41, 1, 'pay', 5, NULL, 15, 109300.00, '2024-04-23', NULL, '2024-04-20 21:33:41', '2024-04-20 21:33:41'),
(42, 1, 'pay', 5, NULL, 15, 12120.00, '2024-04-24', NULL, '2024-04-20 21:37:40', '2024-04-20 21:37:40'),
(43, 1, 'pay', 4, NULL, 16, 8610.00, '2024-04-17', NULL, '2024-04-20 21:52:12', '2024-04-20 21:52:12'),
(44, 1, 'pay', 5, NULL, 16, 7000.00, '2024-04-17', NULL, '2024-04-20 21:52:51', '2024-04-20 21:52:51'),
(45, 1, 'pay', 6, NULL, 30, 12000.00, '2024-04-10', NULL, '2024-04-20 21:53:29', '2024-04-20 21:53:29'),
(46, 1, 'pay', 3, NULL, 15, 240.87, '2024-04-16', NULL, '2024-04-20 22:15:14', '2024-04-20 22:15:14'),
(47, 1, 'pay', 4, NULL, 16, 5000.00, '2024-04-23', NULL, '2024-04-21 04:03:30', '2024-04-21 04:03:30'),
(48, 1, 'pay', 4, NULL, 17, 610.00, '2024-04-02', NULL, '2024-04-22 00:46:50', '2024-04-22 00:46:50'),
(49, 1, 'receive', 4, 4, NULL, 218.00, '2024-04-23', NULL, '2024-04-22 00:59:03', '2024-04-22 00:59:03'),
(50, 1, 'pay', 4, NULL, 14, 610.00, '2024-04-16', NULL, '2024-04-22 03:14:39', '2024-04-22 03:14:39'),
(51, 1, 'pay', 4, NULL, 12, 68000.00, '2024-04-22', NULL, '2024-04-22 05:46:26', '2024-04-22 05:46:26'),
(52, 1, 'pay', 2, NULL, 16, 700.00, '2024-04-15', NULL, '2024-04-22 05:47:25', '2024-04-22 05:47:25'),
(53, 1, 'pay', 3, NULL, 15, 7000.00, '2024-04-23', NULL, '2024-04-23 21:34:45', '2024-04-23 21:34:45'),
(54, 1, 'pay', 3, NULL, 14, 310.00, '2024-04-16', NULL, '2024-04-23 22:32:11', '2024-04-23 22:32:11'),
(55, 1, 'pay', 2, NULL, 15, 10000.00, '2024-04-24', NULL, '2024-04-23 23:01:31', '2024-04-23 23:01:31'),
(56, 1, 'pay', 2, NULL, 15, 30000.00, '2024-04-17', NULL, '2024-04-24 02:14:29', '2024-04-24 02:14:29'),
(57, 1, 'pay', 5, NULL, 15, 300.00, '2024-04-16', NULL, '2024-04-24 02:25:46', '2024-04-24 02:25:46'),
(58, 1, 'pay', 2, NULL, 14, 5000.00, '2024-04-24', NULL, '2024-04-24 02:36:49', '2024-04-24 02:36:49'),
(59, 1, 'pay', 2, NULL, 19, 5000.00, '2024-04-24', NULL, '2024-04-24 02:41:18', '2024-04-24 02:41:18'),
(60, 1, 'pay', 4, NULL, 15, 500.00, '2024-04-16', NULL, '2024-04-24 04:09:53', '2024-04-24 04:09:53'),
(61, 1, 'receive', 2, 9, NULL, 1945.00, '2024-04-25', NULL, '2024-04-25 02:47:46', '2024-04-25 02:47:46'),
(62, 1, 'receive', 2, 3, NULL, 9510.00, '2024-04-25', NULL, '2024-04-25 05:29:01', '2024-04-25 05:29:01'),
(63, 1, 'receive', 4, 4, NULL, 951.00, '2024-04-25', NULL, '2024-04-25 05:49:11', '2024-04-25 05:49:11'),
(64, 1, 'receive', 2, 3, NULL, 951.00, '2024-04-28', NULL, '2024-04-27 22:30:45', '2024-04-27 22:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch_name` varchar(150) NOT NULL,
  `manager_name` varchar(150) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `opening_balance` decimal(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `branch_name`, `manager_name`, `phone_number`, `email`, `opening_balance`, `created_at`, `updated_at`) VALUES
(7, 'Joel Pace', 'Ariana Contreras', 'Inez Estes', '+1 (713) 204-2627', 'favyc@mailinator.com', 25.00, '2024-03-30 21:45:21', '2024-03-30 21:45:21'),
(8, 'Soanli Bank', '2134133', '123123', '123', 'jk@jm.com', 213.00, '2024-04-23 04:16:58', '2024-04-23 04:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `manager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `phone`, `email`, `logo`, `manager_id`, `created_at`, `updated_at`) VALUES
(1, 'Eclipse Blends and Blossom', 'House 41, Road 6, Block E, Banasree, Rampura, Dhaka, Bangladesh', '01917344267', 'ebb@gmail.com', NULL, NULL, '2024-03-26 23:10:38', '2024-03-26 23:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Rinah Sutton', 'rinah-sutton', '1021067675.png', 'dfgdfgdf', '2024-03-31 01:31:38', '2024-03-31 01:39:10'),
(4, 'Dorian Berry', 'dorian-berry', NULL, 'In est dolores bland', '2024-03-31 01:34:00', '2024-03-31 01:34:00'),
(5, 'Yael Sandoval', 'yael-sandoval', NULL, 'Nisi fugiat esse r', '2024-04-01 02:38:56', '2024-04-01 02:38:56'),
(6, 'Emma Crane', 'emma-crane', NULL, 'In dolorum velit sol', '2024-04-01 02:39:03', '2024-04-01 02:39:03'),
(7, 'Ivory Torres', 'ivory-torres', NULL, 'Qui vel quam amet e', '2024-04-01 02:39:09', '2024-04-01 02:39:09'),
(8, 'Evan Maxwell', 'evan-maxwell', NULL, 'Blanditiis sunt simi', '2024-04-01 02:39:14', '2024-04-01 02:39:14'),
(9, 'Giacomo Mcleod', 'giacomo-mcleod', NULL, 'Sequi sapiente nihil', '2024-04-01 02:39:18', '2024-04-01 02:39:18'),
(10, 'Benjamin Noel', 'benjamin-noel', NULL, 'In labore incididunt', '2024-04-01 02:39:22', '2024-04-01 02:39:22'),
(11, 'Quyn Bauer', 'quyn-bauer', NULL, 'Eum hic tempora exer', '2024-04-01 02:39:28', '2024-04-01 02:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(31, 'Kiayada Harding', 'kiayada-harding', NULL, 1, '2024-03-30 22:03:38', '2024-03-30 22:03:40'),
(32, 'Thane Estes', 'thane-estes', NULL, 1, '2024-04-01 02:33:20', '2024-04-01 02:33:23'),
(33, 'Steel Fox', 'steel-fox', NULL, 1, '2024-04-01 02:33:28', '2024-04-01 02:33:31'),
(34, 'Robert Moore', 'robert-moore', NULL, 1, '2024-04-01 02:33:37', '2024-04-01 02:33:39'),
(35, 'Gay Fitzgerald', 'gay-fitzgerald', NULL, 1, '2024-04-01 02:33:45', '2024-04-01 02:34:10'),
(36, 'Ian Browning', 'ian-browning', NULL, 1, '2024-04-01 02:33:56', '2024-04-01 02:34:11'),
(37, 'Beatrice Hardy', 'beatrice-hardy', NULL, 1, '2024-04-01 02:34:02', '2024-04-01 02:34:11'),
(38, 'Seth Lowe', 'seth-lowe', NULL, 1, '2024-04-01 02:34:07', '2024-04-01 02:34:12'),
(39, 'Quincy Warren', 'quincy-warren', NULL, 1, '2024-04-01 02:34:17', '2024-04-01 02:34:22'),
(40, 'Rhonda Bridges', 'rhonda-bridges', NULL, 1, '2024-04-01 02:34:27', '2024-04-01 02:34:30'),
(41, 'coockie', 'coockie', NULL, 0, '2024-04-01 22:48:40', '2024-04-01 22:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `opening_receivable` decimal(12,2) DEFAULT NULL,
  `opening_payable` decimal(12,2) DEFAULT NULL,
  `wallet_balance` decimal(14,2) NOT NULL DEFAULT 0.00,
  `total_receivable` decimal(20,2) NOT NULL DEFAULT 0.00,
  `total_payable` decimal(20,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `branch_id`, `name`, `email`, `phone`, `address`, `opening_receivable`, `opening_payable`, `wallet_balance`, `total_receivable`, `total_payable`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lester Daniels', 'zizir@mailinator.com', '+1 (296) 747-2323', 'Aut officia voluptat', 80.00, 75.00, 52.00, 877.00, 880.00, '2024-03-30 21:47:51', '2024-04-21 23:22:51'),
(2, 1, 'Jhon Wick', NULL, '01723343865', NULL, 0.00, 0.00, 30.00, 2021.00, 2051.00, '2024-04-14 21:26:09', '2024-04-21 23:25:38'),
(3, 1, 'Cade Holt', 'xopifize@mailinator.com', '+1 (856) 897-6435', 'Consequat Aliqua Elit voluptatem La', 92.00, 14.00, -682.00, 10679.00, 11579.00, '2024-04-21 03:14:35', '2024-04-27 22:30:45'),
(4, 1, 'Jhon Wick', NULL, '01723343865', NULL, 0.00, 0.00, 0.00, 1169.00, 1169.00, '2024-04-21 03:15:11', '2024-04-25 05:49:11'),
(5, 1, 'john doe', NULL, '+1 (527) 793-3398', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-04-21 03:15:29', '2024-04-21 03:15:29'),
(6, 1, 'Ironman', NULL, '+1 (349) 525-6061', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-04-21 03:17:03', '2024-04-25 02:46:09'),
(7, 1, 'Thor', NULL, '+88 01715000027', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-04-21 03:17:11', '2024-04-25 02:45:55'),
(8, 1, 'Barry Allen', 'gupa@mailinator.com', '+1 (591) 686-7273', 'Suscipit saepe aute dolores culpa omnis', 69.00, 15.00, 0.00, 0.00, 0.00, '2024-04-21 22:23:43', '2024-04-25 02:45:36'),
(9, 1, 'Superman', NULL, '+1 (349) 525-6061', NULL, 0.00, 0.00, 0.00, 1945.00, 1945.00, '2024-04-25 02:47:10', '2024-04-25 02:47:46'),
(10, 1, 'Randall Huff', 'gunoxeriv@mailinator.com', '+1 (802) 501-6906', 'Veniam iste excepteur quod ipsa alias', 24.00, 94.00, 0.00, 0.00, 0.00, '2024-04-27 22:44:22', '2024-04-27 22:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `damages`
--

CREATE TABLE `damages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `main_unit_qty` int(11) DEFAULT NULL,
  `sub_unit_qty` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `nid` varchar(20) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `salary` decimal(12,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `branch_id`, `full_name`, `address`, `phone`, `email`, `nid`, `pic`, `designation`, `salary`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tatiana Rush', 'Ipsum eius ut quam e', '+1 (902) 627-1635', 'haky@mailinator.com', '22', NULL, 'Maiores eum vel enim', 2.00, '0', '2024-04-21 03:51:01', '2024-04-21 03:51:01'),
(2, 1, 'Brennan Acosta', 'Ipsam odio ratione e', '+1 (642) 164-6942', 'kehycinu@mailinator.com', '60', NULL, 'Adipisci delectus e', 8.00, '0', '2024-04-21 03:51:07', '2024-04-21 03:51:07'),
(3, 1, 'Ivory Ellison', 'Sint odio dolore ex', '+1 (259) 564-5498', 'sawav@mailinator.com', '83', NULL, 'Et fuga Quasi facer', 94.00, '0', '2024-04-21 03:51:12', '2024-04-21 03:51:12'),
(4, 1, 'Demetrius Mcfadden', 'Tenetur beatae qui N', '+1 (572) 616-4979', 'towafop@mailinator.com', '35', NULL, 'Eiusmod molestiae se', 10.00, '0', '2024-04-21 03:51:16', '2024-04-21 03:51:16'),
(5, 1, 'Casey Terrell', 'Eiusmod nulla ipsum', '+1 (878) 573-2932', 'joxikaq@mailinator.com', '18', NULL, 'Minima qui aut labor', 10.00, '0', '2024-04-21 03:51:23', '2024-04-21 03:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `expense_date` date NOT NULL,
  `expense_category_id` bigint(20) UNSIGNED NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `spender` int(11) NOT NULL,
  `bank_account_id` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `branch_id`, `expense_date`, `expense_category_id`, `purpose`, `amount`, `spender`, `bank_account_id`, `note`, `created_at`, `updated_at`) VALUES
(2, 1, '1970-08-09', 3, 'Asperiores cupidatat', 85.00, 5, 7, 'Asperiores est conse', '2024-03-31 03:07:01', '2024-03-31 03:07:01'),
(3, 1, '2024-04-17', 3, 'Asperiores cupidatat', 100.00, 1000, 7, 'dtgdfg', '2024-04-22 03:40:39', '2024-04-22 03:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Jhon Wickksdj', '2024-03-31 03:05:53', '2024-03-31 03:09:41'),
(3, 'afdasfdsad', '2024-03-31 03:06:51', '2024-03-31 03:08:50'),
(4, 'Mr. Fazle Mannan', '2024-04-22 03:40:10', '2024-04-22 03:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_21_060106_create_categories_table', 1),
(6, '2024_03_23_041120_create_sub_categories_table', 1),
(7, '2024_03_24_040653_create_brands_table', 1),
(8, '2024_03_24_041239_create_branches_table', 1),
(9, '2024_03_24_045439_create_customers_table', 1),
(10, '2024_03_25_034000_create_suppliers_table', 1),
(11, '2024_03_27_040311_create_units_table', 1),
(12, '2024_03_27_050102_create_psizes_table', 2),
(14, '2024_03_30_062219_create_banks_table', 2),
(16, '2024_03_30_070215_create_employees_table', 3),
(17, '2024_03_31_035725_create_expense_categories_table', 3),
(18, '2024_03_31_035749_create_expenses_table', 3),
(19, '2024_03_31_075613_create_products_table', 4),
(20, '2024_04_02_043320_create_purchases_table', 5),
(21, '2024_04_02_045010_create_purchase_items_table', 5),
(22, '2024_04_02_044525_create_promotions_table', 6),
(23, '2024_04_02_051218_create_payment_methods_table', 6),
(24, '2024_04_02_051435_create_actual_payments_table', 6),
(25, '2024_04_02_051856_create_taxes_table', 6),
(26, '2024_04_02_062515_create_promotion_details_table', 6),
(28, '2024_04_03_051500_create_transactions_table', 7),
(29, '2024_04_18_084751_create_sales_table', 8),
(30, '2024_04_18_090501_create_sale_items_table', 8),
(31, '2024_04_18_091047_create_pos_settings_table', 9),
(32, '2024_04_18_091250_create_damages_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Cash', '2024-04-03 00:26:05', '2024-04-22 03:43:08'),
(3, 'Rocket', '2024-04-03 00:26:20', '2024-04-03 00:26:20'),
(4, 'Bkash', '2024-04-03 00:26:30', '2024-04-03 00:26:30'),
(5, 'Upay', '2024-04-03 00:26:38', '2024-04-03 00:26:38'),
(6, 'Bank', '2024-04-03 00:26:44', '2024-04-03 00:26:44'),
(7, 'Nagad', '2024-04-22 03:42:29', '2024-04-22 03:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_settings`
--

CREATE TABLE `pos_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `header_text` varchar(255) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `invoice_type` enum('a4','pos') NOT NULL,
  `invoice_logo_type` enum('Logo','Name','Both') NOT NULL DEFAULT 'Logo',
  `barcode_type` enum('single','a4') NOT NULL,
  `low_stock` int(11) NOT NULL DEFAULT 10,
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_settings`
--

INSERT INTO `pos_settings` (`id`, `company`, `logo`, `address`, `email`, `facebook`, `phone`, `header_text`, `footer_text`, `invoice_type`, `invoice_logo_type`, `barcode_type`, `low_stock`, `dark_mode`, `created_at`, `updated_at`) VALUES
(1, 'EIL POS', NULL, 'Banasree,Dhaka,Bangladesh', 'ebbdemo@gmail.com', 'https:/www.ebb.com', NULL, 'Demo Header', 'Demo Footer', 'a4', 'Logo', 'single', 5, 2, '2024-04-21 22:13:56', '2024-04-27 21:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cost` decimal(8,2) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `details` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `main_unit_stock` int(11) NOT NULL DEFAULT 0,
  `total_sold` int(11) NOT NULL DEFAULT 0,
  `color` varchar(255) DEFAULT NULL,
  `size_id` int(11) NOT NULL DEFAULT 0,
  `unit_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `branch_id`, `barcode`, `category_id`, `subcategory_id`, `brand_id`, `cost`, `price`, `details`, `image`, `stock`, `main_unit_stock`, `total_sold`, `color`, `size_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(13, 'Blaine Crosby', 1, '121214', 32, 11, 5, 31.00, 990.00, NULL, NULL, 9, 62, 49, '#91c1fc', 2, 10, '2024-04-01 02:40:04', '2024-04-27 21:37:12'),
(14, 'Amy Compton', 1, 'Ad sed officia aliqu', 35, 10, 9, 61.00, 875.00, NULL, NULL, 1094, 2, 39, '#366ed2', 0, 10, '2024-04-01 02:41:14', '2024-04-25 02:47:46'),
(15, 'Phelan Malone', 1, 'Mollit nulla reprehe', 38, 7, 6, 31.00, 951.00, NULL, NULL, 1137, 93, 7, '#b25017', 0, 9, '2024-04-01 02:41:34', '2024-04-27 22:30:45'),
(16, 'Charity Anthony', 1, 'Qui possimus blandi', 35, 10, 9, 70.00, 218.00, NULL, NULL, 425, 44, 80, '#81f4ab', 0, 9, '2024-04-01 02:41:48', '2024-04-24 04:09:53'),
(17, 'Inga Brooks', 1, 'Culpa ipsa minim d', 33, 12, 6, 100.00, 119.00, NULL, NULL, 171, 1, 28, '#a031e5', 0, 9, '2024-04-01 02:41:59', '2024-04-25 02:47:46'),
(18, 'Lev Summers', 1, '1234', 31, 15, 5, 200.00, 300.00, NULL, NULL, 0, 0, 0, '#000000', 3, 9, '2024-04-01 23:01:41', '2024-04-01 23:01:41'),
(22, 'Alu', 1, '235465435', 31, 15, 4, 100.00, 150.00, NULL, '415675808.jpg', 200, 100, 0, '#000000', 3, 10, '2024-04-20 21:45:54', '2024-04-24 02:36:49'),
(23, 'Piaj', 1, '128346781', 40, 16, 5, 100.00, 150.00, NULL, NULL, 100, 100, 0, '#000000', 12, 10, '2024-04-27 21:38:17', '2024-04-27 21:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promotion_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `discount_type` enum('percentage','fixed_amount') NOT NULL,
  `discount_value` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `promotion_name`, `description`, `start_date`, `end_date`, `discount_type`, `discount_value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Imani Mckinney', 'Asperiores repudiated', '2024-04-02', '2024-04-30', 'percentage', 26, 0, '2024-04-02 02:19:03', NULL),
(2, 'Carissa Castillo', 'Autem exercitation d', '2024-04-02', '2024-04-30', 'fixed_amount', 21, 0, '2024-04-02 02:19:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotion_details`
--

CREATE TABLE `promotion_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Promotion_id` bigint(20) UNSIGNED NOT NULL,
  `Product_id` bigint(20) UNSIGNED NOT NULL,
  `additional_conditions` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `psizes`
--

CREATE TABLE `psizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `psizes`
--

INSERT INTO `psizes` (`id`, `category_id`, `size`, `created_at`, `updated_at`) VALUES
(2, 31, 'sfsdsfsdf', '2024-03-31 21:40:00', '2024-03-31 21:40:00'),
(3, 31, 'sfsdsfsdf', '2024-03-31 21:40:44', '2024-03-31 21:40:44'),
(4, 35, 'Jayme Kirkland', '2024-04-01 22:30:42', '2024-04-01 22:30:42'),
(5, 39, 'Hamilton Miranda', '2024-04-01 22:32:09', '2024-04-01 22:32:09'),
(6, 32, 'Stephen Warren', '2024-04-01 22:32:21', '2024-04-01 22:32:21'),
(7, 35, 'Kimberly Richard', '2024-04-01 22:32:26', '2024-04-01 22:32:26'),
(8, 34, 'Chastity Wells', '2024-04-01 22:32:37', '2024-04-01 22:32:37'),
(9, 39, 'Shaine Silva', '2024-04-01 22:32:43', '2024-04-01 22:32:43'),
(10, 32, 'Blossom Chapman', '2024-04-01 22:32:48', '2024-04-01 22:32:48'),
(11, 40, 'Laith Vazquez', '2024-04-01 22:32:54', '2024-04-01 22:32:54'),
(12, 40, 'Shay Randall', '2024-04-01 22:33:02', '2024-04-01 22:33:02'),
(13, 32, 'Ivor Carrillo', '2024-04-01 22:33:07', '2024-04-01 22:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `purchse_date` date NOT NULL,
  `total_quantity` decimal(12,2) NOT NULL,
  `total_amount` decimal(12,2) NOT NULL,
  `discount` int(20) DEFAULT NULL,
  `discount_amount` decimal(12,2) DEFAULT 0.00,
  `sub_total` decimal(12,2) NOT NULL,
  `tax` int(20) DEFAULT NULL,
  `grand_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid` decimal(12,2) NOT NULL DEFAULT 0.00,
  `due` decimal(12,2) NOT NULL DEFAULT 0.00,
  `carrying_cost` decimal(10,2) DEFAULT 0.00,
  `payment_method` int(20) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `branch_id`, `supplier_id`, `purchse_date`, `total_quantity`, `total_amount`, `discount`, `discount_amount`, `sub_total`, `tax`, `grand_total`, `paid`, `due`, `carrying_cost`, `payment_method`, `note`, `created_at`, `updated_at`) VALUES
(51, 1, 22, '2024-04-08', 60.00, 34530.00, 1, -8977.80, 25552.20, 10, 28107.42, 28107.42, 0.00, 0.00, 6, NULL, '2024-04-18 05:32:31', '2024-04-18 05:32:31'),
(52, 1, 15, '2024-04-23', 200.00, 109300.00, NULL, 0.00, 109300.00, NULL, 109300.00, 109300.00, 0.00, 0.00, 5, NULL, '2024-04-20 21:33:41', '2024-04-20 21:33:41'),
(53, 1, 15, '2024-04-24', 30.00, 12120.00, NULL, 0.00, 12120.00, NULL, 12120.00, 12120.00, 0.00, 0.00, 5, NULL, '2024-04-20 21:37:40', '2024-04-20 21:37:40'),
(54, 1, 16, '2024-04-17', 120.00, 8610.00, NULL, 0.00, 8610.00, NULL, 8610.00, 8610.00, 0.00, 0.00, 4, NULL, '2024-04-20 21:52:12', '2024-04-20 21:52:12'),
(55, 1, 16, '2024-04-17', 100.00, 7000.00, NULL, 0.00, 7000.00, NULL, 7000.00, 7000.00, 0.00, 0.00, 5, NULL, '2024-04-20 21:52:51', '2024-04-20 21:52:51'),
(56, 1, 30, '2024-04-10', 200.00, 12200.00, NULL, 0.00, 12200.00, NULL, 12200.00, 13700.00, 0.00, 0.00, 6, NULL, '2024-04-20 21:53:29', '2024-04-25 02:33:50'),
(57, 1, 15, '2024-04-16', 10.00, 310.00, 1, -80.60, 229.40, 5, 240.87, 240.87, 0.00, 0.00, 3, NULL, '2024-04-20 22:15:14', '2024-04-20 22:15:14'),
(58, 1, 16, '2024-04-23', 100.00, 7000.00, NULL, 0.00, 7000.00, NULL, 7000.00, 7000.00, 0.00, 0.00, 4, NULL, '2024-04-21 04:03:30', '2024-04-24 02:12:34'),
(60, 1, 14, '2024-04-16', 10.00, 610.00, NULL, 0.00, 610.00, NULL, 610.00, 610.00, 0.00, 0.00, 4, NULL, '2024-04-22 03:14:39', '2024-04-22 03:14:39'),
(62, 1, 16, '2024-04-15', 10.00, 700.00, NULL, 0.00, 700.00, NULL, 700.00, 1600.00, 0.00, 0.00, 2, NULL, '2024-04-22 05:47:25', '2024-04-25 02:32:42'),
(63, 1, 15, '2024-04-23', 100.00, 7000.00, NULL, 0.00, 7000.00, NULL, 7000.00, 7800.00, 0.00, 0.00, 3, NULL, '2024-04-23 21:34:45', '2024-04-25 02:29:30'),
(64, 1, 14, '2024-04-16', 10.00, 310.00, NULL, 0.00, 310.00, NULL, 310.00, 1010.00, 0.00, 0.00, 3, NULL, '2024-04-23 22:32:11', '2024-04-25 02:26:32'),
(65, 1, 15, '2024-04-24', 200.00, 13100.00, NULL, 0.00, 13100.00, NULL, 13100.00, 13700.00, 0.00, 0.00, 2, NULL, '2024-04-23 23:01:31', '2024-04-25 02:28:47'),
(66, 1, 15, '2024-04-17', 1020.00, 32010.00, NULL, 0.00, 32010.00, NULL, 32010.00, 32510.00, 0.00, 0.00, 2, NULL, '2024-04-24 02:14:29', '2024-04-25 02:15:31'),
(67, 1, 15, '2024-04-16', 10.00, 310.00, NULL, 0.00, 310.00, NULL, 310.00, 610.00, 0.00, 0.00, 5, NULL, '2024-04-24 02:25:46', '2024-04-24 22:10:55'),
(68, 1, 14, '2024-04-24', 100.00, 10000.00, NULL, 0.00, 10000.00, NULL, 10000.00, 10200.00, 0.00, 0.00, 2, NULL, '2024-04-24 02:36:49', '2024-04-24 22:09:50'),
(69, 1, 19, '2024-04-24', 100.00, 7000.00, NULL, 0.00, 7000.00, NULL, 7000.00, 15000.00, 0.00, 0.00, 2, NULL, '2024-04-24 02:41:18', '2024-04-24 22:07:15'),
(70, 1, 15, '2024-04-16', 10.00, 700.00, NULL, 0.00, 700.00, NULL, 700.00, 1900.00, 0.00, 0.00, 4, NULL, '2024-04-24 04:09:53', '2024-04-24 22:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_id`, `product_id`, `unit_price`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(73, 51, 15, 951.00, 10, 9510.00, '2024-04-18 05:32:31', '2024-04-18 05:32:31'),
(74, 51, 14, 875.00, 10, 8750.00, '2024-04-18 05:32:31', '2024-04-18 05:32:31'),
(75, 51, 17, 119.00, 10, 1190.00, '2024-04-18 05:32:31', '2024-04-18 05:32:31'),
(76, 51, 13, 990.00, 10, 9900.00, '2024-04-18 05:32:31', '2024-04-18 05:32:31'),
(77, 51, 16, 218.00, 10, 2180.00, '2024-04-18 05:32:31', '2024-04-18 05:32:31'),
(78, 51, 18, 300.00, 10, 3000.00, '2024-04-18 05:32:31', '2024-04-18 05:32:31'),
(79, 52, 16, 218.00, 100, 21800.00, '2024-04-20 21:33:41', '2024-04-20 21:33:41'),
(80, 52, 14, 875.00, 100, 87500.00, '2024-04-20 21:33:41', '2024-04-20 21:33:41'),
(81, 53, 14, 875.00, 10, 8750.00, '2024-04-20 21:37:40', '2024-04-20 21:37:40'),
(82, 53, 16, 218.00, 10, 2180.00, '2024-04-20 21:37:40', '2024-04-20 21:37:40'),
(83, 53, 17, 119.00, 10, 1190.00, '2024-04-20 21:37:40', '2024-04-20 21:37:40'),
(84, 54, 16, 70.00, 100, 7000.00, '2024-04-20 21:52:12', '2024-04-20 21:52:12'),
(85, 54, 14, 61.00, 10, 610.00, '2024-04-20 21:52:12', '2024-04-20 21:52:12'),
(86, 54, 22, 100.00, 10, 1000.00, '2024-04-20 21:52:12', '2024-04-20 21:52:12'),
(87, 55, 16, 70.00, 100, 7000.00, '2024-04-20 21:52:51', '2024-04-20 21:52:51'),
(88, 56, 14, 61.00, 200, 12200.00, '2024-04-20 21:53:29', '2024-04-20 21:53:29'),
(89, 57, 15, 31.00, 10, 310.00, '2024-04-20 22:15:14', '2024-04-20 22:15:14'),
(90, 58, 16, 70.00, 100, 7000.00, '2024-04-21 04:03:30', '2024-04-21 04:03:30'),
(92, 60, 14, 61.00, 10, 610.00, '2024-04-22 03:14:39', '2024-04-22 03:14:39'),
(95, 62, 16, 70.00, 10, 700.00, '2024-04-22 05:47:25', '2024-04-22 05:47:25'),
(96, 63, 16, 70.00, 100, 7000.00, '2024-04-23 21:34:45', '2024-04-23 21:34:45'),
(97, 64, 15, 31.00, 10, 310.00, '2024-04-23 22:32:11', '2024-04-23 22:32:11'),
(98, 65, 15, 31.00, 100, 3100.00, '2024-04-23 23:01:31', '2024-04-23 23:01:31'),
(99, 65, 17, 100.00, 100, 10000.00, '2024-04-23 23:01:31', '2024-04-23 23:01:31'),
(100, 66, 15, 31.00, 1000, 31000.00, '2024-04-24 02:14:29', '2024-04-24 02:14:29'),
(101, 66, 13, 31.00, 10, 310.00, '2024-04-24 02:14:29', '2024-04-24 02:14:29'),
(102, 66, 16, 70.00, 10, 700.00, '2024-04-24 02:14:29', '2024-04-24 02:14:29'),
(103, 67, 15, 31.00, 10, 310.00, '2024-04-24 02:25:46', '2024-04-24 02:25:46'),
(104, 68, 22, 100.00, 100, 10000.00, '2024-04-24 02:36:49', '2024-04-24 02:36:49'),
(105, 69, 16, 70.00, 100, 7000.00, '2024-04-24 02:41:18', '2024-04-24 02:41:18'),
(106, 70, 16, 70.00, 10, 700.00, '2024-04-24 04:09:53', '2024-04-24 04:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` date DEFAULT NULL,
  `sale_by` int(11) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `order_type` enum('general','online') NOT NULL DEFAULT 'general',
  `delivery_charge` decimal(8,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `total` decimal(12,2) NOT NULL DEFAULT 0.00,
  `discount` varchar(255) DEFAULT NULL,
  `change_amount` decimal(12,2) DEFAULT NULL,
  `actual_discount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `tax` int(20) DEFAULT NULL,
  `receivable` decimal(12,2) DEFAULT NULL,
  `paid` decimal(12,2) NOT NULL DEFAULT 0.00,
  `returned` decimal(12,2) NOT NULL DEFAULT 0.00,
  `final_receivable` decimal(12,2) NOT NULL DEFAULT 0.00,
  `due` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_purchase_cost` decimal(12,2) DEFAULT NULL,
  `profit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_method` int(20) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `branch_id`, `customer_id`, `sale_date`, `sale_by`, `invoice_number`, `order_type`, `delivery_charge`, `quantity`, `total`, `discount`, `change_amount`, `actual_discount`, `tax`, `receivable`, `paid`, `returned`, `final_receivable`, `due`, `total_purchase_cost`, `profit`, `payment_method`, `note`, `created_at`, `updated_at`) VALUES
(3, 1, 3, '2024-04-09', 0, '100587', 'general', NULL, 1, 703.74, '1', 738.93, 35.19, 5, 738.93, 1638.93, 0.00, 738.93, 200.00, NULL, 0.00, 4, NULL, '2024-04-21 05:16:29', '2024-04-25 04:29:45'),
(4, 1, 7, '2024-04-23', 0, '106900', 'general', NULL, 1, 197.00, '2', 206.85, 9.85, 5, 206.85, 206.85, 0.00, 206.85, 0.00, NULL, 0.00, 3, NULL, '2024-04-21 21:59:23', '2024-04-21 21:59:23'),
(5, 1, 4, '2024-04-09', 0, '122851', 'general', NULL, 1, 951.00, NULL, 951.00, 0.00, 5, 951.00, 998.55, -47.55, 951.00, -47.55, NULL, 0.00, 3, NULL, '2024-04-21 22:05:51', '2024-04-21 22:05:51'),
(6, 1, 3, '2024-04-10', 0, '108597', 'general', NULL, 1, 930.00, '2', 951.00, 46.50, 5, 976.50, 976.50, 0.00, 976.50, 0.00, NULL, 0.00, 5, NULL, '2024-04-21 22:30:29', '2024-04-21 22:30:29'),
(7, 1, 4, '2024-04-09', 0, '108657', 'general', NULL, 1, 875.00, '2', 854.00, 42.70, 5, 896.70, 896.70, 0.00, 896.70, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:32:44', '2024-04-21 22:32:44'),
(8, 1, 3, '2024-04-22', 0, '110750', 'general', NULL, 2, 1093.00, NULL, 1093.00, 0.00, NULL, 1093.00, 1093.00, 0.00, 1093.00, 0.00, NULL, 0.00, 3, NULL, '2024-04-21 22:34:22', '2024-04-21 22:34:22'),
(9, 1, 3, '2024-04-10', 0, '116793', 'general', NULL, 2, 1865.00, '2', 1844.00, 0.00, NULL, 1844.00, 1844.00, 0.00, 1844.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:35:21', '2024-04-21 22:35:21'),
(10, 1, 4, '2024-04-09', 0, '108351', 'general', NULL, 1, 951.00, NULL, 951.00, 47.55, 5, 998.55, 998.55, 0.00, 998.55, 0.00, NULL, 0.00, 3, NULL, '2024-04-21 22:35:54', '2024-04-21 22:35:54'),
(11, 1, 1, '2024-04-22', 0, '104008', 'general', NULL, 1, 990.00, NULL, 990.00, 0.00, NULL, 990.00, 990.00, 0.00, 990.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:54:30', '2024-04-21 22:54:30'),
(12, 1, 1, '2024-04-22', 0, '100942', 'general', NULL, 1, 990.00, NULL, 990.00, 0.00, NULL, 990.00, 990.00, 0.00, 990.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:54:37', '2024-04-21 22:54:37'),
(13, 1, 1, '2024-04-22', 0, '111898', 'general', NULL, 1, 990.00, NULL, 990.00, 0.00, NULL, 990.00, 990.00, 0.00, 990.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:54:38', '2024-04-21 22:54:38'),
(14, 1, 1, '2024-04-22', 0, '118105', 'general', NULL, 1, 990.00, NULL, 990.00, 0.00, NULL, 990.00, 990.00, 0.00, 990.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:54:38', '2024-04-21 22:54:38'),
(15, 1, 1, '2024-04-22', 0, '121155', 'general', NULL, 1, 990.00, NULL, 990.00, 0.00, NULL, 990.00, 990.00, 0.00, 990.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:54:39', '2024-04-21 22:54:39'),
(16, 1, 1, '2024-04-22', 0, '108142', 'general', NULL, 1, 990.00, NULL, 990.00, 0.00, NULL, 990.00, 990.00, 0.00, 990.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:54:48', '2024-04-21 22:54:48'),
(17, 1, 1, '2024-04-22', 0, '118048', 'general', NULL, 1, 990.00, NULL, 990.00, 0.00, NULL, 990.00, 990.00, 0.00, 990.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:56:06', '2024-04-21 22:56:06'),
(18, 1, 1, '2024-04-22', 0, '100143', 'general', NULL, 1, 990.00, NULL, 990.00, 0.00, NULL, 990.00, 990.00, 0.00, 990.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:56:21', '2024-04-21 22:56:21'),
(19, 1, 1, '2024-04-22', 0, '121079', 'general', NULL, 1, 990.00, NULL, 990.00, 0.00, NULL, 990.00, 990.00, 0.00, 990.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:56:27', '2024-04-21 22:56:27'),
(20, 1, 3, '2024-04-22', 0, '113870', 'general', NULL, 1, 218.00, NULL, 218.00, 0.00, NULL, 218.00, 218.00, 0.00, 218.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:56:45', '2024-04-21 22:56:45'),
(21, 1, 3, '2024-04-22', 0, '119080', 'general', NULL, 1, 218.00, NULL, 218.00, 0.00, NULL, 218.00, 218.00, 0.00, 218.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 22:56:51', '2024-04-21 22:56:51'),
(22, 1, 4, '2024-04-09', 0, '109434', 'general', NULL, 2, 1093.00, NULL, 1093.00, 0.00, NULL, 1093.00, 1093.00, 0.00, 1093.00, 0.00, NULL, 0.00, 5, NULL, '2024-04-21 23:01:43', '2024-04-21 23:01:43'),
(23, 1, 1, '2024-04-15', 0, '119000', 'general', NULL, 11, 10851.00, NULL, 10851.00, 0.00, NULL, 10851.00, 10851.00, 0.00, 10851.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 23:03:38', '2024-04-21 23:03:38'),
(24, 1, 3, '2024-04-22', 0, '112931', 'general', NULL, 10, 8750.00, NULL, 8750.00, 0.00, NULL, 8750.00, 8750.00, 0.00, 8750.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 23:08:11', '2024-04-21 23:08:11'),
(25, 1, 3, '2024-04-22', 0, '118004', 'general', NULL, 10, 8750.00, NULL, 8750.00, 0.00, NULL, 8750.00, 8750.00, 0.00, 8750.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 23:08:47', '2024-04-21 23:08:47'),
(26, 1, 3, '2024-04-22', 0, '120576', 'general', NULL, 10, 8750.00, NULL, 8750.00, 0.00, NULL, 8750.00, 8750.00, 0.00, 8750.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 23:09:26', '2024-04-21 23:09:26'),
(27, 1, 3, '2024-04-22', 0, '101002', 'general', NULL, 10, 8750.00, NULL, 8750.00, 0.00, NULL, 8750.00, 8750.00, 0.00, 8750.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 23:10:07', '2024-04-21 23:10:07'),
(28, 1, 3, '2024-04-22', 0, '106288', 'general', NULL, 10, 8750.00, NULL, 8750.00, 0.00, NULL, 8750.00, 8750.00, 0.00, 8750.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 23:10:54', '2024-04-21 23:10:54'),
(29, 1, 4, '2024-04-22', 0, '116207', 'general', NULL, 11, 8968.00, NULL, 8968.00, 0.00, NULL, 8968.00, 8968.00, 0.00, 8968.00, 0.00, NULL, 0.00, 6, NULL, '2024-04-21 23:11:55', '2024-04-21 23:11:55'),
(30, 1, 2, '2024-04-09', 0, '116461', 'general', NULL, 11, 9701.00, NULL, 9701.00, 0.00, NULL, 9701.00, 9701.00, 0.00, 9701.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 23:12:50', '2024-04-21 23:12:50'),
(31, 1, 3, '2024-04-09', 0, '117406', 'general', NULL, 1, 218.00, NULL, 218.00, 0.00, NULL, 218.00, 218.00, 0.00, 218.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 23:20:58', '2024-04-21 23:20:58'),
(32, 1, 1, '2024-04-15', 0, '101423', 'general', NULL, 1, 875.00, NULL, 875.00, 0.00, NULL, 875.00, 875.00, 0.00, 875.00, 0.00, NULL, 0.00, 3, NULL, '2024-04-21 23:22:51', '2024-04-21 23:22:51'),
(33, 1, 2, '2024-04-09', 0, '106945', 'general', NULL, 1, 951.00, NULL, 951.00, 0.00, NULL, 951.00, 951.00, 0.00, 951.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-21 23:24:03', '2024-04-21 23:24:03'),
(34, 1, 2, '2024-04-22', 0, '107122', 'general', NULL, 1, 951.00, NULL, 951.00, 0.00, NULL, 951.00, 900.00, 51.00, 951.00, 51.00, NULL, 0.00, 6, NULL, '2024-04-21 23:24:48', '2024-04-21 23:24:48'),
(35, 1, 2, '2024-04-22', 0, '102380', 'general', NULL, 1, 119.00, NULL, 119.00, 0.00, NULL, 119.00, 200.00, -81.00, 119.00, -81.00, NULL, 0.00, 3, NULL, '2024-04-21 23:25:38', '2024-04-21 23:25:38'),
(36, 1, 4, '2024-04-23', 0, '108574', 'general', NULL, 1, 218.00, NULL, 218.00, 0.00, NULL, 218.00, 218.00, 0.00, 218.00, 0.00, NULL, 0.00, 4, NULL, '2024-04-22 00:59:03', '2024-04-22 00:59:03'),
(37, 1, 9, '2024-04-25', 0, '112181', 'general', NULL, 3, 1945.00, NULL, 1945.00, 0.00, NULL, 1945.00, 1945.00, 0.00, 1945.00, 0.00, NULL, 0.00, 2, NULL, '2024-04-25 02:47:46', '2024-04-25 02:47:46'),
(38, 1, 3, '2024-04-25', 0, '118794', 'general', NULL, 10, 9510.00, NULL, 9510.00, 0.00, NULL, 9510.00, 9510.00, 0.00, 9510.00, 0.00, NULL, 9510.00, 2, NULL, '2024-04-25 05:29:01', '2024-04-25 05:29:01'),
(39, 1, 4, '2024-04-25', 0, '119524', 'general', NULL, 1, 951.00, NULL, 951.00, 0.00, NULL, 951.00, 951.00, 0.00, 951.00, 0.00, NULL, 920.00, 4, NULL, '2024-04-25 05:49:11', '2024-04-25 05:49:11'),
(40, 1, 3, '2024-04-28', 0, '106923', 'general', NULL, 1, 951.00, NULL, 951.00, 0.00, NULL, 951.00, 951.00, 0.00, 951.00, 0.00, NULL, 920.00, 2, NULL, '2024-04-27 22:30:45', '2024-04-27 22:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `main_unit_qty` int(11) DEFAULT NULL,
  `sub_unit_qty` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` decimal(12,2) NOT NULL,
  `total_purchase_cost` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `rate`, `main_unit_qty`, `sub_unit_qty`, `qty`, `sub_total`, `total_purchase_cost`, `created_at`, `updated_at`) VALUES
(1, 3, 15, 951.00, NULL, NULL, 1, 951.00, 951.00, '2024-04-21 05:16:29', '2024-04-21 05:16:29'),
(2, 4, 16, 218.00, NULL, NULL, 1, 218.00, 218.00, '2024-04-21 21:59:23', '2024-04-21 21:59:23'),
(3, 5, 15, 951.00, NULL, NULL, 1, 951.00, 951.00, '2024-04-21 22:05:51', '2024-04-21 22:05:51'),
(4, 6, 15, 951.00, NULL, NULL, 1, 951.00, 951.00, '2024-04-21 22:30:29', '2024-04-21 22:30:29'),
(5, 7, 14, 875.00, NULL, NULL, 1, 875.00, 875.00, '2024-04-21 22:32:44', '2024-04-21 22:32:44'),
(6, 8, 14, 875.00, NULL, NULL, 1, 875.00, 875.00, '2024-04-21 22:34:22', '2024-04-21 22:34:22'),
(7, 8, 16, 218.00, NULL, NULL, 1, 218.00, 218.00, '2024-04-21 22:34:22', '2024-04-21 22:34:22'),
(8, 9, 14, 875.00, NULL, NULL, 1, 875.00, 875.00, '2024-04-21 22:35:21', '2024-04-21 22:35:21'),
(9, 9, 13, 990.00, NULL, NULL, 1, 990.00, 990.00, '2024-04-21 22:35:21', '2024-04-21 22:35:21'),
(10, 10, 15, 951.00, NULL, NULL, 1, 951.00, 951.00, '2024-04-21 22:35:54', '2024-04-21 22:35:54'),
(11, 11, 13, 990.00, NULL, NULL, 1, 990.00, 990.00, '2024-04-21 22:54:30', '2024-04-21 22:54:30'),
(12, 12, 13, 990.00, NULL, NULL, 1, 990.00, 990.00, '2024-04-21 22:54:37', '2024-04-21 22:54:37'),
(13, 13, 13, 990.00, NULL, NULL, 1, 990.00, 990.00, '2024-04-21 22:54:38', '2024-04-21 22:54:38'),
(14, 14, 13, 990.00, NULL, NULL, 1, 990.00, 990.00, '2024-04-21 22:54:38', '2024-04-21 22:54:38'),
(15, 15, 13, 990.00, NULL, NULL, 1, 990.00, 990.00, '2024-04-21 22:54:39', '2024-04-21 22:54:39'),
(16, 16, 13, 990.00, NULL, NULL, 1, 990.00, 990.00, '2024-04-21 22:54:48', '2024-04-21 22:54:48'),
(17, 17, 13, 990.00, NULL, NULL, 1, 990.00, 990.00, '2024-04-21 22:56:07', '2024-04-21 22:56:07'),
(18, 18, 13, 990.00, NULL, NULL, 1, 990.00, 990.00, '2024-04-21 22:56:21', '2024-04-21 22:56:21'),
(19, 19, 13, 990.00, NULL, NULL, 1, 990.00, 990.00, '2024-04-21 22:56:27', '2024-04-21 22:56:27'),
(20, 20, 16, 218.00, NULL, NULL, 1, 218.00, 218.00, '2024-04-21 22:56:46', '2024-04-21 22:56:46'),
(21, 21, 16, 218.00, NULL, NULL, 1, 218.00, 218.00, '2024-04-21 22:56:51', '2024-04-21 22:56:51'),
(22, 22, 14, 875.00, NULL, NULL, 1, 875.00, 875.00, '2024-04-21 23:01:43', '2024-04-21 23:01:43'),
(23, 22, 16, 218.00, NULL, NULL, 1, 218.00, 218.00, '2024-04-21 23:01:43', '2024-04-21 23:01:43'),
(24, 23, 15, 951.00, NULL, NULL, 1, 951.00, 951.00, '2024-04-21 23:03:38', '2024-04-21 23:03:38'),
(25, 23, 13, 990.00, NULL, NULL, 10, 9900.00, 9900.00, '2024-04-21 23:03:38', '2024-04-21 23:03:38'),
(26, 24, 14, 875.00, NULL, NULL, 10, 8750.00, 8750.00, '2024-04-21 23:08:11', '2024-04-21 23:08:11'),
(27, 25, 14, 875.00, NULL, NULL, 10, 8750.00, 8750.00, '2024-04-21 23:08:47', '2024-04-21 23:08:47'),
(28, 26, 14, 875.00, NULL, NULL, 10, 8750.00, 8750.00, '2024-04-21 23:09:26', '2024-04-21 23:09:26'),
(29, 27, 14, 875.00, NULL, NULL, 10, 8750.00, 8750.00, '2024-04-21 23:10:07', '2024-04-21 23:10:07'),
(30, 28, 14, 875.00, NULL, NULL, 10, 8750.00, 8750.00, '2024-04-21 23:10:54', '2024-04-21 23:10:54'),
(31, 29, 16, 218.00, NULL, NULL, 1, 218.00, 218.00, '2024-04-21 23:11:55', '2024-04-21 23:11:55'),
(32, 29, 14, 875.00, NULL, NULL, 10, 8750.00, 8750.00, '2024-04-21 23:11:55', '2024-04-21 23:11:55'),
(33, 30, 15, 951.00, NULL, NULL, 1, 951.00, 951.00, '2024-04-21 23:12:50', '2024-04-21 23:12:50'),
(34, 30, 14, 875.00, NULL, NULL, 10, 8750.00, 8750.00, '2024-04-21 23:12:50', '2024-04-21 23:12:50'),
(35, 31, 16, 218.00, NULL, NULL, 1, 218.00, 218.00, '2024-04-21 23:20:59', '2024-04-21 23:20:59'),
(36, 32, 14, 875.00, NULL, NULL, 1, 875.00, 875.00, '2024-04-21 23:22:51', '2024-04-21 23:22:51'),
(37, 33, 15, 951.00, NULL, NULL, 1, 951.00, 951.00, '2024-04-21 23:24:03', '2024-04-21 23:24:03'),
(38, 34, 15, 951.00, NULL, NULL, 1, 951.00, 951.00, '2024-04-21 23:24:48', '2024-04-21 23:24:48'),
(39, 35, 17, 119.00, NULL, NULL, 1, 119.00, 119.00, '2024-04-21 23:25:38', '2024-04-21 23:25:38'),
(40, 36, 16, 218.00, NULL, NULL, 1, 218.00, 218.00, '2024-04-22 00:59:03', '2024-04-22 00:59:03'),
(41, 37, 15, 951.00, NULL, NULL, 1, 951.00, 951.00, '2024-04-25 02:47:46', '2024-04-25 02:47:46'),
(42, 37, 17, 119.00, NULL, NULL, 1, 119.00, 119.00, '2024-04-25 02:47:46', '2024-04-25 02:47:46'),
(43, 37, 14, 875.00, NULL, NULL, 1, 875.00, 875.00, '2024-04-25 02:47:46', '2024-04-25 02:47:46'),
(44, 38, 15, 951.00, NULL, NULL, 10, 9510.00, 9510.00, '2024-04-25 05:29:01', '2024-04-25 05:29:01'),
(45, 39, 15, 951.00, NULL, NULL, 1, 951.00, 951.00, '2024-04-25 05:49:11', '2024-04-25 05:49:11'),
(46, 40, 15, 951.00, NULL, NULL, 1, 951.00, 951.00, '2024-04-27 22:30:45', '2024-04-27 22:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 34, 'Drake Shepherd', 'drake-shepherd', '1263434067.webp', 0, '2024-04-01 02:37:26', '2024-04-17 00:53:05'),
(5, 36, 'Germaine Pena', 'germaine-pena', NULL, 0, '2024-04-01 02:37:37', '2024-04-01 02:37:37'),
(6, 38, 'Adele Nash', 'adele-nash', NULL, 0, '2024-04-01 02:37:45', '2024-04-01 02:37:45'),
(7, 38, 'Karyn Velez', 'karyn-velez', NULL, 0, '2024-04-01 02:37:52', '2024-04-01 02:37:52'),
(8, 39, 'Teagan Thomas', 'teagan-thomas', NULL, 0, '2024-04-01 02:37:57', '2024-04-01 02:37:57'),
(9, 38, 'Gisela Wood', 'gisela-wood', NULL, 0, '2024-04-01 02:38:03', '2024-04-01 02:38:03'),
(10, 35, 'Reed Aguilar', 'reed-aguilar', NULL, 0, '2024-04-01 02:38:08', '2024-04-01 02:38:08'),
(11, 32, 'Alden Franks', 'alden-franks', NULL, 0, '2024-04-01 02:38:22', '2024-04-01 02:38:22'),
(12, 33, 'Judith Nixon', 'judith-nixon', NULL, 0, '2024-04-01 02:38:29', '2024-04-01 02:38:29'),
(13, 37, 'Conan Hill', 'conan-hill', NULL, 0, '2024-04-01 02:38:34', '2024-04-01 02:38:34'),
(14, 39, 'Dakota Pearson', 'dakota-pearson', NULL, 0, '2024-04-01 02:38:42', '2024-04-01 02:38:42'),
(15, 31, 'Carson Powell', 'carson-powell', NULL, 0, '2024-04-01 22:36:06', '2024-04-01 22:36:06'),
(16, 40, 'Lev Summers', 'lev-summers', NULL, 0, '2024-04-01 22:36:15', '2024-04-01 22:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `opening_receivable` decimal(12,2) DEFAULT NULL,
  `opening_payable` decimal(12,2) DEFAULT NULL,
  `wallet_balance` decimal(14,2) DEFAULT 0.00,
  `total_receivable` decimal(20,2) DEFAULT 0.00,
  `total_payable` decimal(20,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `branch_id`, `name`, `email`, `phone`, `address`, `opening_receivable`, `opening_payable`, `wallet_balance`, `total_receivable`, `total_payable`, `created_at`, `updated_at`) VALUES
(12, 1, 'Peter Parker', 'xefipy@mailinator.com', '+1 (613) 853-5133', 'Unde enim expedita laborum veniam fuga', 59.00, 93.00, 67000.00, 68000.00, 69000.00, '2024-03-30 23:18:43', '2024-04-24 22:02:30'),
(14, 1, 'Iron man', 'nemet@mailinator.com', '+1 (422) 418-1899', 'Est totam laborum Consequatur nesciun', 53.00, 53.00, 31860.00, 10920.00, 11820.00, '2024-04-01 02:42:23', '2024-04-25 02:26:32'),
(15, 1, 'Bat man', 'ryjag@mailinator.com', '+1 (628) 645-6841', 'Maiores reiciendis ipsum earum recusan', 59.00, 62.00, 2726723.05, 184290.87, 188180.87, '2024-04-01 02:42:30', '2024-04-25 02:29:30'),
(16, 1, 'Super man', 'gutate@mailinator.com', '+1 (846) 538-2826', 'Qui eos aspernatur nemo cum aut praesen', 24.00, 28.00, 85320.00, 45110.00, 46010.00, '2024-04-01 02:42:36', '2024-04-25 02:32:43'),
(17, 1, 'Spiderman', 'gurasyfeby@mailinator.com', '+1 (201) 831-3041', 'Aute minus consequatur Laboris non ita', 17.00, 4.00, 0.00, 85536.10, 85536.10, '2024-04-01 02:42:41', '2024-04-23 21:43:36'),
(18, 1, 'Wonder Women', 'nerol@mailinator.com', '+1 (202) 648-1205', 'In tenetur proident vel voluptatibus e', 6.00, 44.00, 0.00, 0.00, 0.00, '2024-04-01 02:42:46', '2024-04-23 21:43:49'),
(19, 1, 'Tony Stark', 'qusyn@mailinator.com', '+1 (579) 272-7171', 'Sint ipsum voluptatum et itaque amet a', 39.00, 54.00, 20000.00, 7000.00, 15000.00, '2024-04-01 02:42:51', '2024-04-24 22:07:15'),
(20, 1, 'Maryam Abbott', 'remoqocyja@mailinator.com', '+1 (503) 547-2112', 'Hic a nesciunt quia voluptates ea et q', 20.00, 64.00, 0.00, 0.00, 0.00, '2024-04-01 21:36:25', '2024-04-01 21:36:25'),
(21, 1, 'Cassady Graham', 'wufuq@mailinator.com', '+1 (845) 728-3603', 'Quis est vero architecto dolore', 77.00, 87.00, 0.00, 0.00, 0.00, '2024-04-01 21:38:12', '2024-04-01 21:38:12'),
(22, 1, 'Jhon Wick', NULL, '+1 (349) 525-6061', NULL, NULL, NULL, 0.00, 28107.42, 28107.42, '2024-04-01 21:38:26', '2024-04-18 05:32:31'),
(23, 1, 'Jhon Wiliam', NULL, '+88 01715000027', NULL, NULL, NULL, 0.00, 0.00, 0.00, '2024-04-01 21:39:59', '2024-04-23 21:41:01'),
(24, 1, 'Mr. Fazle Mannan', NULL, '+1 (527) 793-3398', NULL, NULL, NULL, 0.00, 0.00, 0.00, '2024-04-01 21:45:15', '2024-04-01 21:45:15'),
(25, 1, 'Dexter Monroe', 'xulofe@mailinator.com', '+1 (838) 755-9659', 'Adipisicing enim doloremque aut dolorem', 43.00, 61.00, 0.00, 0.00, 0.00, '2024-04-01 21:52:26', '2024-04-01 21:52:26'),
(26, 1, 'Jack Tillman', 'wurekos@mailinator.com', '+1 (318) 733-9441', 'Rem qui nisi Nam consectetur enim enim', 94.00, 49.00, 0.00, 0.00, 0.00, '2024-04-02 00:11:31', '2024-04-02 00:11:31'),
(27, 1, 'Nerea Harrell', 'bihycehy@mailinator.com', '+1 (319) 987-6178', 'Quidem aspernatur delectus laboris odi', 75.00, 29.00, 0.00, 0.00, 0.00, '2024-04-02 01:31:13', '2024-04-02 01:31:13'),
(28, 1, 'Astra Palmer', 'zasygohyh@mailinator.com', '+1 (762) 384-9863', 'Nostrud ex qui dolor dolores illum est', 67.00, 36.00, -1180.00, 13110.00, 11930.00, '2024-04-02 21:38:59', '2024-04-18 02:38:50'),
(29, 1, 'Clayton Sanders', 'maxe@mailinator.com', '+1 (823) 376-5252', 'Labore beatae porro consectetur cillum', 62.00, 76.00, 0.00, 0.00, 0.00, '2024-04-02 21:39:17', '2024-04-02 21:39:17'),
(30, 1, 'Cara Boyd', 'codec@mailinator.com', '+1 (742) 366-3958', 'Elit quia et mollitia duis nesciunt d', 6.00, 31.00, 27080.00, 14380.00, 15300.00, '2024-04-18 02:40:03', '2024-04-25 02:33:50'),
(31, 1, 'Jhon Doe', 'user@gmail.com', '01723343865', NULL, NULL, NULL, 0.00, 0.00, 0.00, '2024-04-23 21:40:26', '2024-04-23 21:40:45'),
(32, 1, 'Tom Hanks', NULL, '+1 (349) 525-6061', NULL, NULL, NULL, 0.00, 0.00, 0.00, '2024-04-23 21:42:40', '2024-04-23 21:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `percentage`, `created_at`, `updated_at`) VALUES
(1, '5', '5', '2024-04-17 04:45:33', '2024-04-17 05:11:18'),
(2, '10', '10', '2024-04-17 04:45:47', '2024-04-17 05:11:26'),
(3, '15', '15', '2024-04-17 04:45:55', '2024-04-17 05:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `payment_type` enum('receive','pay') NOT NULL COMMENT 'Recieve or Pay',
  `particulars` varchar(255) DEFAULT NULL COMMENT 'Purchase #12 or Paid to Supplyer/Sale #10 Received from Customer',
  `customer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `debit` decimal(12,2) DEFAULT NULL,
  `credit` decimal(12,2) DEFAULT NULL,
  `balance` decimal(14,2) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `date`, `payment_type`, `particulars`, `customer_id`, `supplier_id`, `debit`, `credit`, `balance`, `payment_method`, `note`, `created_at`, `updated_at`) VALUES
(1, '2024-04-24', 'pay', 'Purchase#68', NULL, 14, 5920.00, 31758.40, 25838.40, 2, NULL, '2024-04-04 02:11:35', '2024-04-24 02:36:49'),
(2, '2024-04-15', 'pay', 'Purchase#16', NULL, 23, NULL, 10000.00, 10000.00, 4, NULL, '2024-04-14 21:33:09', '2024-04-14 21:33:09'),
(3, '2024-04-15', 'pay', 'Purchase#62', NULL, 16, 43110.00, 116187.74, 69077.74, 2, NULL, '2024-04-16 23:50:09', '2024-04-22 05:47:25'),
(4, '2024-04-16', 'pay', 'Purchase#70', NULL, 15, 279460.87, 291059.87, 12579.00, 4, NULL, '2024-04-17 00:19:38', '2024-04-24 04:09:53'),
(5, '2024-04-08', 'pay', 'Purchase#19', NULL, 16, NULL, 21779.00, 21779.00, 5, NULL, '2024-04-17 00:35:44', '2024-04-17 00:35:44'),
(6, '2024-04-15', 'pay', 'Purchase#20', NULL, 14, NULL, 117312.20, 117312.20, 4, NULL, '2024-04-17 03:23:42', '2024-04-17 03:23:42'),
(7, '2024-04-02', 'pay', 'Purchase#59', NULL, 17, 97536.10, 117205.10, 19669.00, 4, NULL, '2024-04-17 03:27:51', '2024-04-22 00:46:50'),
(8, '2024-04-09', 'pay', 'Purchase#22', NULL, 15, NULL, 100.00, 100.00, 5, NULL, '2024-04-17 03:47:08', '2024-04-17 03:47:08'),
(9, '2024-04-15', 'pay', 'Purchase#23', NULL, 16, NULL, 30529.00, 30529.00, 5, NULL, '2024-04-17 03:48:31', '2024-04-17 03:48:31'),
(10, '2024-04-15', 'pay', 'Purchase#24', NULL, 16, NULL, 81348.20, 81348.20, 4, NULL, '2024-04-17 04:15:15', '2024-04-17 04:15:15'),
(11, '2024-04-16', 'pay', 'Purchase#25', NULL, 16, NULL, 307279.00, 307279.00, 6, NULL, '2024-04-17 04:46:46', '2024-04-17 04:46:46'),
(12, '2024-04-22', 'pay', 'Purchase#61', NULL, 12, 68000.00, 69023.00, 1023.00, 4, NULL, '2024-04-17 22:13:29', '2024-04-22 05:46:26'),
(13, '2024-04-15', 'pay', 'Purchase#27', NULL, 15, NULL, 1855.18, 1855.18, 4, NULL, '2024-04-17 22:35:05', '2024-04-17 22:35:05'),
(14, '2024-04-16', 'pay', 'Purchase#28', NULL, 14, 9246.30, 9246.30, 0.00, 3, NULL, '2024-04-17 23:03:36', '2024-04-17 23:03:36'),
(15, '2024-04-16', 'pay', 'Purchase#29', NULL, 16, 17745.20, 17745.20, 0.00, 3, NULL, '2024-04-17 23:30:56', '2024-04-17 23:30:56'),
(16, '2024-04-16', 'pay', 'Purchase#30', NULL, 16, 0.00, 0.00, 0.00, 4, NULL, '2024-04-17 23:41:36', '2024-04-17 23:41:36'),
(17, '2024-04-09', 'pay', 'Purchase#31', NULL, 14, 73892.70, 73892.70, 0.00, 4, NULL, '2024-04-17 23:59:17', '2024-04-17 23:59:17'),
(18, '2024-04-16', 'pay', 'Purchase#32', NULL, 15, 10932.39, 10411.80, -520.59, 4, NULL, '2024-04-18 00:04:03', '2024-04-18 00:04:03'),
(19, '2024-04-16', 'pay', 'Purchase#33', NULL, 14, 18065.25, 17205.00, -860.25, 4, NULL, '2024-04-18 00:07:26', '2024-04-18 00:07:26'),
(20, '2024-04-17', 'pay', 'Purchase#34', NULL, 15, 21800.00, 21800.00, 0.00, 4, NULL, '2024-04-18 00:09:16', '2024-04-18 00:09:16'),
(21, '2024-04-16', 'pay', 'Purchase#35', NULL, 16, 10000.00, 21800.00, 11800.00, 4, NULL, '2024-04-18 00:13:35', '2024-04-18 00:13:35'),
(22, '2024-04-16', 'pay', 'Purchase#36', NULL, 15, 2159.00, 2159.00, 0.00, 4, NULL, '2024-04-18 00:15:12', '2024-04-18 00:15:12'),
(23, '2024-04-16', 'pay', 'Purchase#37', NULL, 16, 9985.50, 9510.00, -475.50, 3, NULL, '2024-04-18 00:16:19', '2024-04-18 00:16:19'),
(24, '2024-04-24', 'pay', 'Purchase#40', NULL, 24, 20930.00, 22830.00, 1900.00, 3, NULL, '2024-04-18 02:17:24', '2024-04-18 02:19:14'),
(25, '2024-04-17', 'pay', 'Purchase#44', NULL, 26, 123900.00, 123416.00, 484.00, 4, NULL, '2024-04-18 02:26:56', '2024-04-18 02:30:38'),
(26, '2024-04-16', 'pay', 'Purchase#46', NULL, 28, 11930.00, 13110.00, -1180.00, 3, NULL, '2024-04-18 02:37:51', '2024-04-18 02:38:50'),
(27, '2024-04-24', 'pay', 'Purchase#56', NULL, 30, 14200.00, 14380.00, 13800.00, 2, NULL, '2024-04-18 02:45:18', '2024-04-24 00:59:26'),
(28, '2024-04-08', 'pay', 'Purchase#51', NULL, 22, 28107.42, 28107.42, 0.00, 6, NULL, '2024-04-18 05:32:31', '2024-04-18 05:32:31'),
(29, '2024-04-25', 'receive', 'Sale#39', 4, NULL, 1169.00, 1169.00, 0.00, 4, NULL, '2024-04-22 00:59:03', '2024-04-25 05:49:11'),
(30, '2024-04-24', 'pay', 'Purchase#67', NULL, 15, 10.00, NULL, 10.00, 2, NULL, '2024-04-24 02:35:21', '2024-04-24 02:35:21'),
(31, '2024-04-24', 'pay', 'Purchase#68', NULL, 14, 5000.00, NULL, 5000.00, 2, NULL, '2024-04-24 02:37:03', '2024-04-24 02:37:03'),
(32, '2024-04-24', 'pay', 'Purchase#69', NULL, 19, 5000.00, 7000.00, 2000.00, 2, NULL, '2024-04-24 02:41:18', '2024-04-24 02:41:18'),
(33, '2024-04-24', 'pay', 'Purchase#69', NULL, 19, 2000.00, NULL, 2000.00, 2, NULL, '2024-04-24 02:41:35', '2024-04-24 02:41:35'),
(34, '2024-04-24', 'pay', 'Purchase#69', NULL, 19, 2000.00, NULL, 2000.00, 2, NULL, '2024-04-24 02:41:49', '2024-04-24 02:41:49'),
(35, '2024-04-24', 'pay', 'Purchase#69', NULL, 19, 2000.00, NULL, 2000.00, 2, NULL, '2024-04-24 02:43:58', '2024-04-24 02:43:58'),
(36, '2024-04-24', 'pay', 'Purchase#70', NULL, 15, 200.00, NULL, 200.00, 2, NULL, '2024-04-24 04:12:37', '2024-04-24 04:12:37'),
(37, '2024-04-24', 'pay', 'Purchase#70', NULL, 15, 0.00, NULL, 0.00, 2, NULL, '2024-04-24 04:15:37', '2024-04-24 04:15:37'),
(38, '2024-04-25', 'pay', 'Purchase#70', NULL, 15, 500.00, NULL, 500.00, 2, NULL, '2024-04-24 21:42:34', '2024-04-24 21:42:34'),
(39, '2024-04-25', 'pay', 'Purchase#70', NULL, 15, 100.00, NULL, 100.00, 2, NULL, '2024-04-24 21:57:50', '2024-04-24 21:57:50'),
(40, '2024-04-25', 'pay', 'Purchase#70', NULL, 15, 100.00, NULL, 100.00, 2, NULL, '2024-04-24 21:57:57', '2024-04-24 21:57:57'),
(41, '2024-04-25', 'pay', 'Purchase#70', NULL, 15, 100.00, NULL, 100.00, 2, NULL, '2024-04-24 21:59:15', '2024-04-24 21:59:15'),
(42, '2024-04-25', 'pay', 'Purchase#70', NULL, 15, 100.00, NULL, 100.00, 2, NULL, '2024-04-24 22:01:35', '2024-04-24 22:01:35'),
(43, '2024-04-25', 'pay', 'Purchase#61', NULL, 12, 1000.00, NULL, 1000.00, 2, NULL, '2024-04-24 22:02:30', '2024-04-24 22:02:30'),
(44, '2024-04-25', 'pay', 'Purchase#70', NULL, 15, 300.00, NULL, 300.00, 2, NULL, '2024-04-24 22:06:05', '2024-04-24 22:06:05'),
(45, '2024-04-25', 'pay', 'Purchase#69', NULL, 19, 4000.00, NULL, 4000.00, 2, NULL, '2024-04-24 22:07:15', '2024-04-24 22:07:15'),
(46, '2024-04-25', 'pay', 'Purchase#68', NULL, 14, 200.00, NULL, 200.00, 2, NULL, '2024-04-24 22:09:50', '2024-04-24 22:09:50'),
(47, '2024-04-25', 'pay', 'Purchase#67', NULL, 15, 300.00, NULL, 300.00, 2, NULL, '2024-04-24 22:10:55', '2024-04-24 22:10:55'),
(48, '2024-04-25', 'pay', 'Purchase#66', NULL, 15, 500.00, NULL, 500.00, 2, NULL, '2024-04-25 02:15:31', '2024-04-25 02:15:31'),
(49, '2024-04-25', 'pay', 'Purchase#64', NULL, 14, 700.00, NULL, 700.00, 2, NULL, '2024-04-25 02:26:32', '2024-04-25 02:26:32'),
(50, '2024-04-25', 'pay', 'Purchase#65', NULL, 15, 600.00, NULL, 600.00, 2, NULL, '2024-04-25 02:28:47', '2024-04-25 02:28:47'),
(51, '2024-04-25', 'pay', 'Purchase#63', NULL, 15, 800.00, NULL, 800.00, 2, NULL, '2024-04-25 02:29:30', '2024-04-25 02:29:30'),
(52, '2024-04-25', 'pay', 'Purchase#62', NULL, 16, 900.00, NULL, 900.00, 2, NULL, '2024-04-25 02:32:43', '2024-04-25 02:32:43'),
(53, '2024-04-25', 'pay', 'Purchase#56', NULL, 30, 1100.00, NULL, 1100.00, 2, NULL, '2024-04-25 02:33:50', '2024-04-25 02:33:50'),
(54, '2024-04-25', 'receive', 'Sale#37', 9, NULL, 1945.00, 1945.00, 0.00, 2, NULL, '2024-04-25 02:47:46', '2024-04-25 02:47:46'),
(55, '2024-04-28', 'receive', 'Sale#40', 3, NULL, 10561.00, 10461.00, 100.00, 2, NULL, '2024-04-25 04:12:16', '2024-04-27 22:30:45'),
(56, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 100.00, NULL, 100.00, 2, NULL, '2024-04-25 04:15:53', '2024-04-25 04:15:53'),
(57, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 100.00, NULL, 100.00, 2, NULL, '2024-04-25 04:16:28', '2024-04-25 04:16:28'),
(58, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 100.00, NULL, 100.00, 2, NULL, '2024-04-25 04:23:07', '2024-04-25 04:23:07'),
(59, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 100.00, NULL, 100.00, 2, NULL, '2024-04-25 04:23:24', '2024-04-25 04:23:24'),
(60, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 100.00, NULL, 100.00, 2, NULL, '2024-04-25 04:24:39', '2024-04-25 04:24:39'),
(61, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 100.00, NULL, 100.00, 2, NULL, '2024-04-25 04:25:13', '2024-04-25 04:25:13'),
(62, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 100.00, NULL, 100.00, 2, NULL, '2024-04-25 04:25:49', '2024-04-25 04:25:49'),
(63, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 50.00, NULL, 50.00, 2, NULL, '2024-04-25 04:26:22', '2024-04-25 04:26:22'),
(64, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 10.00, NULL, 10.00, 2, NULL, '2024-04-25 04:27:26', '2024-04-25 04:27:26'),
(65, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 10.00, NULL, 10.00, 2, NULL, '2024-04-25 04:27:39', '2024-04-25 04:27:39'),
(66, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 10.00, NULL, 10.00, 2, NULL, '2024-04-25 04:27:57', '2024-04-25 04:27:57'),
(67, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 10.00, NULL, 10.00, 2, NULL, '2024-04-25 04:28:18', '2024-04-25 04:28:18'),
(68, '2024-04-25', 'receive', 'Sale#3', 3, NULL, 10.00, NULL, 10.00, 2, NULL, '2024-04-25 04:29:45', '2024-04-25 04:29:45'),
(69, '2024-04-28', 'pay', NULL, NULL, 27, 7550.00, NULL, 7550.00, 2, NULL, '2024-04-28 04:27:49', '2024-04-28 04:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `related_to_unit` varchar(40) DEFAULT NULL,
  `related_sign` varchar(20) DEFAULT NULL,
  `related_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `related_to_unit`, `related_sign`, `related_by`, `created_at`, `updated_at`) VALUES
(9, 'Adria Hyde', 'Asperiores provident quae consequatur', '-', 89, '2024-03-30 21:48:27', '2024-03-30 21:48:27'),
(10, 'Jhon Wick', 'fs', '+', 32, '2024-04-01 02:22:58', '2024-04-01 02:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `branch_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'EBB', 'ebb@gmail.com', NULL, 1, '$2y$10$xwEoRveaDrhU8FSQpR8wZ.qCNhXXBsnvWQ0x1UVdvTSrAtg.lZLUG', NULL, '2024-03-26 23:10:38', '2024-03-26 23:10:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actual_payments`
--
ALTER TABLE `actual_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actual_payments_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `damages`
--
ALTER TABLE `damages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `damages_branch_id_foreign` (`branch_id`),
  ADD KEY `damages_product_id_foreign` (`product_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_branch_id_foreign` (`branch_id`),
  ADD KEY `expenses_expense_category_id_foreign` (`expense_category_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pos_settings`
--
ALTER TABLE `pos_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_barcode_unique` (`barcode`),
  ADD KEY `products_branch_id_foreign` (`branch_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_details`
--
ALTER TABLE `promotion_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotion_details_promotion_id_foreign` (`Promotion_id`),
  ADD KEY `promotion_details_product_id_foreign` (`Product_id`);

--
-- Indexes for table `psizes`
--
ALTER TABLE `psizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `psizes_category_id_foreign` (`category_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_branch_id_foreign` (`branch_id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_items_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_branch_id_foreign` (`branch_id`),
  ADD KEY `sales_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_items_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `actual_payments`
--
ALTER TABLE `actual_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `damages`
--
ALTER TABLE `damages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_settings`
--
ALTER TABLE `pos_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promotion_details`
--
ALTER TABLE `promotion_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `psizes`
--
ALTER TABLE `psizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actual_payments`
--
ALTER TABLE `actual_payments`
  ADD CONSTRAINT `actual_payments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `damages`
--
ALTER TABLE `damages`
  ADD CONSTRAINT `damages_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `damages_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_expense_category_id_foreign` FOREIGN KEY (`expense_category_id`) REFERENCES `expense_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promotion_details`
--
ALTER TABLE `promotion_details`
  ADD CONSTRAINT `promotion_details_product_id_foreign` FOREIGN KEY (`Product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotion_details_promotion_id_foreign` FOREIGN KEY (`Promotion_id`) REFERENCES `promotions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `psizes`
--
ALTER TABLE `psizes`
  ADD CONSTRAINT `psizes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_items_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD CONSTRAINT `sale_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
