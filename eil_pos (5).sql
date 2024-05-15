-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 10:45 AM
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
-- Table structure for table `account_transactions`
--

CREATE TABLE `account_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `debit` decimal(12,2) DEFAULT NULL,
  `credit` decimal(12,2) DEFAULT NULL,
  `balance` decimal(12,2) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_transactions`
--

INSERT INTO `account_transactions` (`id`, `account_id`, `branch_id`, `purpose`, `debit`, `credit`, `balance`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Deposit', 200000.00, NULL, -200000.00, NULL, '2024-05-06 22:12:22', '2024-05-06 22:12:22'),
(2, 1, 1, 'Deposit', 5000.00, NULL, -205000.00, NULL, '2024-05-06 22:51:31', '2024-05-06 22:51:31'),
(3, 1, 1, 'Deposit', 200000.00, NULL, -405000.00, NULL, '2024-05-06 22:53:47', '2024-05-06 22:53:47'),
(4, 1, 1, 'Deposit', 40000.00, NULL, -445000.00, NULL, '2024-05-06 22:56:12', '2024-05-06 22:56:12'),
(5, 1, 1, 'Deposit', 40000.00, NULL, -485000.00, NULL, '2024-05-06 22:57:39', '2024-05-06 22:57:39'),
(6, 1, 1, 'receive', NULL, 700.00, -484300.00, NULL, '2024-05-06 23:14:21', '2024-05-06 23:14:21'),
(7, 1, 1, 'Withdraw', NULL, 2000.00, -482300.00, NULL, '2024-05-06 23:26:32', '2024-05-06 23:26:32'),
(8, 1, 1, 'Withdraw', NULL, 4000.00, -478300.00, NULL, '2024-05-06 23:43:36', '2024-05-06 23:43:36'),
(9, 1, 1, 'Withdraw', NULL, 1500.00, -476800.00, NULL, '2024-05-07 00:50:38', '2024-05-07 00:50:38'),
(10, 3, 1, 'Withdraw', NULL, 900000.00, 900000.00, NULL, '2024-05-07 00:53:53', '2024-05-07 00:53:53'),
(11, 1, 1, 'Withdraw', NULL, 100.00, -476700.00, NULL, '2024-05-07 03:08:37', '2024-05-07 03:08:37'),
(12, 1, 1, 'Deposit', 20000.00, NULL, -496700.00, NULL, '2024-05-07 03:18:30', '2024-05-07 03:18:30'),
(13, 1, 1, 'Deposit', 10000.00, NULL, -506700.00, NULL, '2024-05-07 03:19:42', '2024-05-07 03:19:42'),
(14, 1, 1, 'Withdraw', NULL, 5000.00, -501700.00, NULL, '2024-05-09 02:24:24', '2024-05-09 02:24:24'),
(15, 1, 1, 'Withdraw', NULL, 1000.00, -500700.00, NULL, '2024-05-12 04:07:33', '2024-05-12 04:07:33'),
(16, 1, 1, 'Withdraw', NULL, 970.00, -499730.00, NULL, '2024-05-12 04:08:01', '2024-05-12 04:08:01'),
(17, 1, 1, 'Withdraw', NULL, 13890.40, -485839.60, NULL, '2024-05-12 05:54:30', '2024-05-12 05:54:30'),
(18, 1, 1, 'Withdraw', NULL, 34750.00, -451089.60, NULL, '2024-05-12 22:21:31', '2024-05-12 22:21:31'),
(19, 1, 1, 'Withdraw', NULL, 620850.00, 169760.40, NULL, '2024-05-12 22:51:08', '2024-05-12 22:51:08'),
(20, 1, 1, 'Withdraw', NULL, 11058.00, 180818.40, NULL, '2024-05-12 22:56:33', '2024-05-12 22:56:33'),
(21, 1, 1, 'Withdraw', NULL, 11400.00, 192218.40, NULL, '2024-05-12 23:15:23', '2024-05-12 23:15:23'),
(22, 1, 1, 'Withdraw', NULL, 11400.00, 203618.40, NULL, '2024-05-13 22:09:50', '2024-05-13 22:09:50'),
(23, 1, 1, 'Withdraw', NULL, 120.00, 203738.40, NULL, '2024-05-13 22:39:42', '2024-05-13 22:39:42'),
(24, 1, 1, 'Withdraw', NULL, 11400.00, 215138.40, NULL, '2024-05-13 22:40:28', '2024-05-13 22:40:28'),
(25, 1, 1, 'Withdraw', NULL, 370.00, 215508.40, NULL, '2024-05-14 01:21:42', '2024-05-14 01:21:42'),
(26, 1, 1, 'Withdraw', NULL, 11300.50, 226808.90, NULL, '2024-05-14 02:27:54', '2024-05-14 02:27:54'),
(27, 1, 1, 'Withdraw', NULL, 11400.00, 238208.90, NULL, '2024-05-14 03:10:24', '2024-05-14 03:10:24'),
(28, 1, 1, 'Withdraw', NULL, 250.00, 238458.90, NULL, '2024-05-14 03:13:24', '2024-05-14 03:13:24'),
(29, 1, 1, 'Withdraw', NULL, 11610.90, 250069.80, NULL, '2024-05-14 04:06:26', '2024-05-14 04:06:26'),
(30, 1, 1, 'Deposit', 15000.00, NULL, 235069.80, NULL, '2024-05-14 23:36:00', '2024-05-14 23:36:00'),
(31, 1, 1, 'Deposit', 1800000.00, NULL, 1564930.20, NULL, '2024-05-14 23:38:51', '2024-05-14 23:38:51'),
(32, 1, 1, 'Withdraw', NULL, 48300.00, -1516630.20, NULL, '2024-05-14 23:39:50', '2024-05-14 23:39:50'),
(33, 5, 1, 'Withdraw', NULL, 114000.00, 114000.00, NULL, '2024-05-14 23:41:22', '2024-05-14 23:41:22'),
(34, 5, 1, 'Withdraw', NULL, 464581.50, 578581.50, NULL, '2024-05-14 23:42:45', '2024-05-14 23:42:45'),
(35, 2, 1, 'Deposit', 900.00, NULL, -900.00, NULL, '2024-05-15 00:37:14', '2024-05-15 00:37:14'),
(36, 2, 1, 'Deposit', 151245.00, NULL, 152145.00, NULL, '2024-05-15 00:42:48', '2024-05-15 00:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `actual_payments`
--

CREATE TABLE `actual_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` enum('receive','pay') NOT NULL,
  `payment_method` int(11) NOT NULL,
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
(1, 1, 'pay', 1, NULL, 1, 200000.00, '2024-05-07', NULL, '2024-05-06 22:12:22', '2024-05-06 22:12:22'),
(2, 1, 'pay', 1, NULL, 1, 5000.00, '2024-05-07', NULL, '2024-05-06 22:51:31', '2024-05-06 22:51:31'),
(3, 1, 'pay', 1, NULL, 1, 200000.00, '2024-05-07', NULL, '2024-05-06 22:53:47', '2024-05-06 22:53:47'),
(4, 1, 'pay', 1, NULL, 1, 40000.00, '2024-05-07', NULL, '2024-05-06 22:56:12', '2024-05-06 22:56:12'),
(5, 1, 'pay', 1, NULL, 1, 40000.00, '2024-05-07', NULL, '2024-05-06 22:57:39', '2024-05-06 22:57:39'),
(6, 1, 'receive', 1, 2, NULL, 700.00, '2024-05-07', NULL, '2024-05-06 23:14:21', '2024-05-06 23:14:21'),
(7, 1, 'receive', 1, 1, NULL, 2000.00, '2023-01-27', NULL, '2024-05-06 23:26:32', '2024-05-06 23:26:32'),
(8, 1, 'receive', 1, 3, NULL, 4000.00, '2024-05-07', NULL, '2024-05-06 23:43:36', '2024-05-06 23:43:36'),
(9, 1, 'receive', 1, 1, NULL, 1500.00, '2024-05-07', NULL, '2024-05-07 00:50:38', '2024-05-07 00:50:38'),
(10, 1, 'receive', 3, 1, NULL, 900000.00, '2024-05-07', NULL, '2024-05-07 00:53:53', '2024-05-07 00:53:53'),
(11, 1, 'pay', 1, NULL, 3, 20000.00, '2024-05-07', NULL, '2024-05-07 03:18:30', '2024-05-07 03:18:30'),
(12, 1, 'receive', 1, 1, NULL, 5000.00, '2024-05-09', NULL, '2024-05-09 02:24:24', '2024-05-09 02:24:24'),
(13, 1, 'receive', 1, 8, NULL, 1000.00, '2024-05-12', NULL, '2024-05-12 04:07:33', '2024-05-12 04:07:33'),
(14, 1, 'receive', 1, 3, NULL, 970.00, '2024-05-12', NULL, '2024-05-12 04:08:01', '2024-05-12 04:08:01'),
(15, 1, 'receive', 1, 3, NULL, 13890.40, '2024-05-12', NULL, '2024-05-12 05:54:30', '2024-05-12 05:54:30'),
(16, 1, 'receive', 1, 1, NULL, 34750.00, '2024-05-13', NULL, '2024-05-12 22:21:31', '2024-05-12 22:21:31'),
(17, 1, 'receive', 1, 1, NULL, 620850.00, '2024-05-13', NULL, '2024-05-12 22:51:08', '2024-05-12 22:51:08'),
(18, 1, 'receive', 1, 3, NULL, 11058.00, '2024-05-13', NULL, '2024-05-12 22:56:33', '2024-05-12 22:56:33'),
(19, 1, 'receive', 1, 1, NULL, 11400.00, '2024-05-13', NULL, '2024-05-12 23:15:23', '2024-05-12 23:15:23'),
(20, 1, 'receive', 1, 1, NULL, 11400.00, '2024-05-14', NULL, '2024-05-13 22:09:50', '2024-05-13 22:09:50'),
(21, 1, 'receive', 1, 1, NULL, 120.00, '2024-05-14', NULL, '2024-05-13 22:39:42', '2024-05-13 22:39:42'),
(22, 1, 'receive', 1, 1, NULL, 11400.00, '2024-05-14', NULL, '2024-05-13 22:40:28', '2024-05-13 22:40:28'),
(23, 1, 'receive', 1, 3, NULL, 370.00, '2024-05-14', NULL, '2024-05-14 01:21:42', '2024-05-14 01:21:42'),
(24, 1, 'receive', 1, 3, NULL, 11300.50, '2024-05-14', NULL, '2024-05-14 02:27:54', '2024-05-14 02:27:54'),
(25, 1, 'receive', 1, 1, NULL, 11400.00, '2024-05-14', NULL, '2024-05-14 03:10:24', '2024-05-14 03:10:24'),
(26, 1, 'receive', 1, 1, NULL, 250.00, '2024-05-14', NULL, '2024-05-14 03:13:24', '2024-05-14 03:13:24'),
(27, 1, 'receive', 1, 3, NULL, 11610.90, '2024-05-14', NULL, '2024-05-14 04:06:26', '2024-05-14 04:06:26'),
(28, 1, 'pay', 1, NULL, 2, 15000.00, '2024-05-15', NULL, '2024-05-14 23:36:00', '2024-05-14 23:36:00'),
(29, 1, 'pay', 1, NULL, 3, 1800000.00, '2024-05-15', NULL, '2024-05-14 23:38:51', '2024-05-14 23:38:51'),
(30, 1, 'receive', 1, 4, NULL, 48300.00, '2024-05-15', NULL, '2024-05-14 23:39:50', '2024-05-14 23:39:50'),
(31, 1, 'receive', 5, 5, NULL, 114000.00, '2024-05-15', NULL, '2024-05-14 23:41:22', '2024-05-14 23:41:22'),
(32, 1, 'receive', 5, 5, NULL, 464581.50, '2024-05-15', NULL, '2024-05-14 23:42:45', '2024-05-14 23:42:45'),
(33, 1, 'pay', 2, NULL, 5, 900.00, '2024-05-15', NULL, '2024-05-15 00:37:14', '2024-05-15 00:37:14'),
(34, 1, 'pay', 2, NULL, 4, 151245.00, '2024-05-15', NULL, '2024-05-15 00:42:48', '2024-05-15 00:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch_name` varchar(150) NOT NULL,
  `manager_name` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `account` varchar(255) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `opening_balance` decimal(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `branch_name`, `manager_name`, `phone_number`, `account`, `email`, `opening_balance`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 'Cash', 'Cash', 'Cash', '123456', NULL, 0.00, '2024-05-06 21:37:25', '2024-05-06 21:37:25'),
(2, 'Bkash', 'Mobile Banking', 'Bkash', '01846456834', '01846456834', NULL, 0.00, '2024-05-06 21:38:12', '2024-05-06 21:38:12'),
(3, 'Nagad', 'Mobile Banking', 'Nagad', '01846456834', '01846456834', NULL, 0.00, '2024-05-06 21:39:53', '2024-05-06 21:39:53'),
(4, 'Rocket', 'Mobile Banking', 'Rocket', '01846456834', '01846456834', NULL, 0.00, '2024-05-06 21:42:50', '2024-05-06 21:42:50'),
(5, 'City Bank', 'Banasree Bank', 'something', '04511240555', '04511240555', NULL, 0.00, '2024-05-06 21:43:35', '2024-05-06 21:43:35');

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
(1, 'Eclipse Blends and Blossom', 'House 41, Road 6, Block E, Banasree, Rampura, Dhaka, Bangladesh', '01917344267', 'ebb@gmail.com', NULL, NULL, '2024-05-06 03:15:55', '2024-05-06 03:15:55'),
(2, 'Sweet Dreams', 'Dhaka', '+1 (527) 793-3398', 'sweet.dreams@gmail.com', '1260305410.png', NULL, '2024-05-07 23:24:28', '2024-05-07 23:24:28'),
(3, 'Eclipse Cyber Cafe', 'Dhaka', '+1 (527) 793-3398', 'cyber.cafe@gmail.com', '344009968.png', NULL, '2024-05-07 23:25:43', '2024-05-07 23:25:43');

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
(1, 'Local Brand', 'local-brand', NULL, NULL, '2024-05-06 03:40:22', '2024-05-06 03:40:22'),
(2, 'Hatil', 'hatil', NULL, NULL, '2024-05-06 03:40:29', '2024-05-06 03:40:29'),
(3, 'Walton', 'walton', NULL, NULL, '2024-05-06 03:40:37', '2024-05-06 03:40:37'),
(4, 'Samsung', 'samsung', NULL, NULL, '2024-05-06 03:40:44', '2024-05-06 03:40:44'),
(5, 'Apple', 'apple', NULL, NULL, '2024-05-06 03:40:59', '2024-05-06 03:40:59');

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
(2, 'Food', 'food', NULL, 1, '2024-05-06 03:35:55', '2024-05-06 03:35:58'),
(3, 'Electronics', 'electronics', NULL, 1, '2024-05-06 03:36:17', '2024-05-06 03:36:19'),
(4, 'Fashion', 'fashion', NULL, 1, '2024-05-06 03:36:39', '2024-05-06 03:36:41'),
(5, 'Furniture', 'furniture', NULL, 0, '2024-05-06 03:37:55', '2024-05-06 03:37:55');

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
(1, 1, 'Jackob', NULL, '01723343865', NULL, 0.00, 0.00, 0.00, 1610570.00, 1610570.00, '2024-05-06 23:02:11', '2024-05-14 03:13:24'),
(3, 1, 'William', NULL, '+1 (349) 525-6061', NULL, 0.00, 0.00, -750.00, 52449.80, 53199.80, '2024-05-06 23:02:58', '2024-05-14 04:06:26'),
(4, 1, 'Belal', NULL, '21432143214', NULL, 0.00, 0.00, 0.00, 48300.00, 48300.00, '2024-05-07 21:45:30', '2024-05-14 23:39:50'),
(5, 1, 'Habib', NULL, '43541112315', NULL, 0.00, 0.00, 0.00, 578581.50, 578581.50, '2024-05-07 21:45:41', '2024-05-14 23:42:45'),
(6, 1, 'Rohim', NULL, '545541555545', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-05-07 21:45:53', '2024-05-07 21:45:53'),
(7, 1, 'Korim', NULL, '545645454545', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-05-07 21:46:03', '2024-05-07 21:46:03'),
(8, 1, 'Anisur', NULL, '546451564', NULL, 0.00, 0.00, 0.00, 1000.00, 1000.00, '2024-05-07 21:46:12', '2024-05-12 04:07:33'),
(9, 1, 'Saiful', NULL, '455456456', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-05-07 21:46:33', '2024-05-07 21:46:33'),
(10, 1, 'Keramot', NULL, '4564546456', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-05-07 21:46:42', '2024-05-07 21:46:42'),
(11, 1, 'Tamim', NULL, '4544565456', NULL, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-05-07 21:47:04', '2024-05-07 21:47:04');

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
(1, 1, 'Ishtiaq', 'Dhaka', '+1 (902) 627-1635', 'istiaq@gmail.com', NULL, NULL, NULL, NULL, '0', '2024-05-07 21:47:54', '2024-05-07 21:47:54'),
(2, 1, 'Rakib', 'Dhaka', '+1 (902) 627-1635', 'rakib@gmail.com', NULL, NULL, NULL, NULL, '0', '2024-05-07 21:48:20', '2024-05-07 21:48:20'),
(3, 1, 'Nayeem', 'Dhaka', '+1 (349) 525-6061', 'nayeem@gmail.com', NULL, NULL, NULL, NULL, '0', '2024-05-07 21:48:47', '2024-05-07 21:48:47'),
(4, 1, 'Soikot', 'Dhaka', '+1 (349) 525-6061', 'soikot@gmail.com', NULL, NULL, NULL, NULL, '0', '2024-05-07 21:49:19', '2024-05-07 21:49:19'),
(5, 1, 'Miftahul', 'dhaka', '123179213', 'miftahul@gmail.com', NULL, NULL, NULL, NULL, '0', '2024-05-07 21:49:56', '2024-05-07 21:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salaries`
--

CREATE TABLE `employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `debit` decimal(12,2) DEFAULT NULL COMMENT 'Submit Salary',
  `creadit` decimal(12,2) DEFAULT NULL COMMENT 'Employee Salary on Employee Salary Table',
  `balance` decimal(12,2) NOT NULL COMMENT 'creadit - debit',
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(12, '2024_03_27_050102_create_psizes_table', 1),
(13, '2024_03_30_062219_create_banks_table', 1),
(14, '2024_03_30_070215_create_employees_table', 1),
(15, '2024_03_31_035725_create_expense_categories_table', 1),
(16, '2024_03_31_035749_create_expenses_table', 1),
(17, '2024_03_31_075613_create_products_table', 1),
(18, '2024_04_02_043320_create_purchases_table', 1),
(20, '2024_04_02_045010_create_purchase_items_table', 1),
(21, '2024_04_02_051218_create_payment_methods_table', 1),
(22, '2024_04_02_051435_create_actual_payments_table', 1),
(23, '2024_04_02_051856_create_taxes_table', 1),
(25, '2024_04_03_051500_create_transactions_table', 1),
(26, '2024_04_18_084751_create_sales_table', 1),
(27, '2024_04_18_090501_create_sale_items_table', 1),
(28, '2024_04_18_091047_create_pos_settings_table', 1),
(29, '2024_04_18_091250_create_damages_table', 1),
(30, '2024_04_24_063523_create_employee_salaries_table', 1),
(31, '2024_04_30_042330_create_sms_table', 1),
(32, '2024_04_30_043422_create_sms_categories_table', 1),
(33, '2024_04_30_085908_create_jobs_table', 1),
(34, '2024_05_05_094007_create_account_transactions_table', 1),
(35, '2024_04_02_044525_create_promotions_table', 2),
(36, '2024_04_02_062515_create_promotion_details_table', 2);

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
(1, 'EIL POS', 'uploads/pos_setting/2145806252.png', 'Banasree,Dhaka,Bangladesh', 'ebbdemo@gmail.com', 'https:/www.ebb.com', NULL, 'Demo Header', 'Demo Footer', 'a4', 'Both', 'single', 5, 2, '2024-05-06 03:15:55', '2024-05-15 00:11:08');

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
  `size_id` int(11) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `branch_id`, `barcode`, `category_id`, `subcategory_id`, `brand_id`, `cost`, `price`, `details`, `image`, `stock`, `main_unit_stock`, `total_sold`, `color`, `size_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 'Walton Primo X TV', 1, '123456', 3, 3, 3, 18000.00, 30000.00, NULL, NULL, 100, 20, 30, '#000000', 7, 2, '2024-05-06 03:48:45', '2024-05-14 23:38:51'),
(2, 'Walton Mobile HD', 1, '123457', 3, 4, 3, 9000.00, 12000.00, NULL, NULL, 75, 90, 28, '#000000', 6, 2, '2024-05-06 03:56:33', '2024-05-14 23:41:22'),
(3, 'T-shirt', 1, '1234568', 4, 5, 1, 150.00, 250.00, NULL, NULL, 291, 100, 39, '#000000', 1, 2, '2024-05-06 04:03:42', '2024-05-14 23:36:00'),
(4, 'Jeans Pant', 1, '1234569', 4, 6, 1, 350.00, 500.00, NULL, NULL, 86, 100, 24, '#000000', 4, 2, '2024-05-06 04:06:33', '2024-05-14 23:41:22'),
(6, 'Black Coffee', 1, '123465', 2, 1, 1, 90.00, 120.00, NULL, NULL, 18, 200, 102, '#000000', NULL, 2, '2024-05-06 04:26:23', '2024-05-15 00:37:14'),
(7, 'Single Sofa', 1, '879454', 5, 7, 2, 30000.00, 50000.00, NULL, NULL, 9, 20, 11, '#000000', NULL, 2, '2024-05-06 04:28:08', '2024-05-15 00:42:48'),
(8, 'Single Table for single man', 1, '200544', 5, 8, 2, 2000.00, 3000.00, NULL, NULL, 110, 200, 0, '#000000', NULL, 2, '2024-05-06 04:29:04', '2024-05-06 22:56:12'),
(9, 'Fresh Automill Rice', 1, '546413', 2, 2, 1, 50.00, 80.00, NULL, NULL, 115, 200, 10, '#000000', NULL, 1, '2024-05-06 04:30:10', '2024-05-14 23:39:50'),
(10, 'Walton Regrigaretor', 1, '54468454', 3, 9, 3, 200.00, 300.00, NULL, NULL, 0, 0, 20, '#000000', 7, 3, '2024-05-07 23:09:44', '2024-05-14 23:41:22'),
(11, 'Burger', 1, '54555555556', 2, 2, 1, 50.00, 100.00, NULL, NULL, 90, 100, 10, '#000000', NULL, 2, '2024-05-07 23:10:35', '2024-05-14 23:42:45'),
(12, 'Nike smart Shoe', 1, '57465452', 4, 6, 1, 200.00, 250.00, NULL, NULL, 100, 0, 0, '#000000', 4, 2, '2024-05-07 23:11:43', '2024-05-07 23:11:43'),
(13, 'Watch', 1, '4547645', 3, 4, 3, 415.00, 500.00, NULL, NULL, 103, 0, 0, '#000000', 6, 2, '2024-05-07 23:12:32', '2024-05-15 00:42:48'),
(14, 'Water Bottol', 1, '451231', 3, 4, 3, 200.00, 300.00, NULL, NULL, 90, 0, 10, '#000000', 6, 2, '2024-05-07 23:13:16', '2024-05-14 23:42:45'),
(15, 'Smart Shoe', 1, '2024001', 4, 6, 1, 500.00, 700.00, NULL, NULL, 10, 0, 0, '#000000', 1, 2, '2024-05-12 04:47:47', '2024-05-12 04:47:47');

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
  `status` enum('active','expired','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `promotion_name`, `description`, `start_date`, `end_date`, `discount_type`, `discount_value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Flat Discount', NULL, '2024-05-01', '2024-05-31', 'percentage', 5, 'active', '2024-05-07 04:25:49', NULL),
(2, 'Top Sale', NULL, '2024-05-01', '2024-05-11', 'percentage', 15, 'active', '2024-05-08 03:48:08', NULL),
(3, 'Top Customer', NULL, '2024-05-07', '2024-05-14', 'percentage', 3, 'active', '2024-05-08 03:48:44', NULL),
(4, 'Price Discount', NULL, '2024-05-01', '2024-05-31', 'fixed_amount', 250, 'active', '2024-05-08 03:51:16', NULL),
(5, 'Top Customer1', NULL, '2024-05-01', '2024-05-31', 'fixed_amount', 500, 'active', '2024-05-12 00:04:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotion_details`
--

CREATE TABLE `promotion_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promotion_id` bigint(20) UNSIGNED NOT NULL,
  `promotion_type` enum('wholesale','products','customers','branch') NOT NULL,
  `logic` text NOT NULL,
  `additional_conditions` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotion_details`
--

INSERT INTO `promotion_details` (`id`, `promotion_id`, `promotion_type`, `logic`, `additional_conditions`, `created_at`, `updated_at`) VALUES
(13, 1, 'products', '2,7,11', NULL, '2024-05-09 00:12:44', '2024-05-09 00:12:44'),
(14, 4, 'products', '8,10', 2000, '2024-05-09 00:13:29', '2024-05-09 00:13:29'),
(15, 3, 'customers', '3,5', 2000, '2024-05-11 23:21:13', '2024-05-11 23:21:13'),
(16, 5, 'customers', '3,5', 500, '2024-05-12 00:06:00', '2024-05-12 00:06:00');

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
(1, 4, 'M', '2024-05-06 03:45:03', '2024-05-06 03:45:03'),
(2, 4, 'S', '2024-05-06 03:45:12', '2024-05-06 03:45:12'),
(3, 4, 'L', '2024-05-06 03:45:21', '2024-05-06 03:45:21'),
(4, 4, 'XL', '2024-05-06 03:45:30', '2024-05-06 03:45:30'),
(5, 4, 'XXL', '2024-05-06 03:45:37', '2024-05-06 03:45:37'),
(6, 3, '12 Inch', '2024-05-06 03:45:51', '2024-05-06 03:45:51'),
(7, 3, '34 inch', '2024-05-06 03:46:01', '2024-05-06 03:46:01');

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
  `discount` varchar(255) DEFAULT NULL,
  `discount_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `sub_total` decimal(12,2) NOT NULL,
  `tax` int(11) DEFAULT NULL,
  `grand_total` decimal(12,2) NOT NULL DEFAULT 0.00,
  `paid` decimal(12,2) NOT NULL DEFAULT 0.00,
  `due` decimal(12,2) NOT NULL DEFAULT 0.00,
  `carrying_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_method` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `branch_id`, `supplier_id`, `purchse_date`, `total_quantity`, `total_amount`, `discount`, `discount_amount`, `sub_total`, `tax`, `grand_total`, `paid`, `due`, `carrying_cost`, `payment_method`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-05-07', 20.00, 270000.00, NULL, 0.00, 270000.00, NULL, 270000.00, 200000.00, 70000.00, 0.00, 1, NULL, '2024-05-06 22:12:22', '2024-05-06 22:12:22'),
(2, 1, 1, '2024-05-07', 20.00, 5000.00, '1', -250.00, 4750.00, NULL, 4750.00, 5000.00, -250.00, 0.00, 1, NULL, '2024-05-06 22:51:31', '2024-05-06 22:51:31'),
(3, 1, 1, '2024-05-07', 15.00, 150900.00, NULL, 0.00, 150900.00, 5, 158445.00, 200000.00, -41555.00, 0.00, 1, NULL, '2024-05-06 22:53:47', '2024-05-06 22:53:47'),
(4, 1, 1, '2024-05-07', 35.00, 21250.00, NULL, 0.00, 21250.00, NULL, 21250.00, 40000.00, -18750.00, 0.00, 1, NULL, '2024-05-06 22:56:12', '2024-05-06 22:56:12'),
(5, 1, 1, '2024-05-07', 3.00, 27000.00, NULL, 0.00, 27000.00, NULL, 27000.00, 40000.00, -13000.00, 0.00, 1, NULL, '2024-05-06 22:57:39', '2024-05-06 22:57:39'),
(6, 1, 3, '2024-05-07', 200.00, 30000.00, NULL, 0.00, 30000.00, NULL, 30000.00, 10000.00, 0.00, 0.00, 1, NULL, '2024-05-07 03:18:30', '2024-05-07 03:19:42'),
(7, 1, 2, '2024-05-15', 100.00, 15000.00, NULL, 0.00, 15000.00, NULL, 15000.00, 15000.00, 0.00, 0.00, 1, NULL, '2024-05-14 23:36:00', '2024-05-14 23:36:00'),
(8, 1, 3, '2024-05-15', 100.00, 1800000.00, NULL, 0.00, 1800000.00, NULL, 1800000.00, 1800000.00, 0.00, 0.00, 1, NULL, '2024-05-14 23:38:50', '2024-05-14 23:38:50'),
(9, 1, 5, '2024-05-15', 10.00, 900.00, NULL, 0.00, 900.00, NULL, 900.00, 900.00, 0.00, 0.00, 2, NULL, '2024-05-15 00:37:14', '2024-05-15 00:37:14'),
(10, 1, 4, '2024-05-15', 8.00, 151245.00, NULL, 0.00, 151245.00, NULL, 151245.00, 151245.00, 0.00, 0.00, 2, NULL, '2024-05-15 00:42:48', '2024-05-15 00:42:48');

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
(1, 1, 1, 18000.00, 10, 180000.00, '2024-05-06 22:12:22', '2024-05-06 22:12:22'),
(2, 1, 2, 9000.00, 10, 90000.00, '2024-05-06 22:12:22', '2024-05-06 22:12:22'),
(3, 2, 3, 150.00, 10, 1500.00, '2024-05-06 22:51:31', '2024-05-06 22:51:31'),
(4, 2, 4, 350.00, 10, 3500.00, '2024-05-06 22:51:31', '2024-05-06 22:51:31'),
(5, 3, 6, 90.00, 10, 900.00, '2024-05-06 22:53:47', '2024-05-06 22:53:47'),
(6, 3, 7, 30000.00, 5, 150000.00, '2024-05-06 22:53:47', '2024-05-06 22:53:47'),
(7, 4, 8, 2000.00, 10, 20000.00, '2024-05-06 22:56:12', '2024-05-06 22:56:12'),
(8, 4, 9, 50.00, 25, 1250.00, '2024-05-06 22:56:12', '2024-05-06 22:56:12'),
(9, 5, 2, 9000.00, 3, 27000.00, '2024-05-06 22:57:39', '2024-05-06 22:57:39'),
(10, 6, 3, 150.00, 200, 30000.00, '2024-05-07 03:18:30', '2024-05-07 03:18:30'),
(11, 7, 3, 150.00, 100, 15000.00, '2024-05-14 23:36:00', '2024-05-14 23:36:00'),
(12, 8, 1, 18000.00, 100, 1800000.00, '2024-05-14 23:38:51', '2024-05-14 23:38:51'),
(13, 9, 6, 90.00, 10, 900.00, '2024-05-15 00:37:14', '2024-05-15 00:37:14'),
(14, 10, 7, 30000.00, 5, 150000.00, '2024-05-15 00:42:48', '2024-05-15 00:42:48'),
(15, 10, 13, 415.00, 3, 1245.00, '2024-05-15 00:42:48', '2024-05-15 00:42:48');

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
  `tax` int(11) DEFAULT NULL,
  `receivable` decimal(12,2) DEFAULT NULL,
  `paid` decimal(12,2) NOT NULL DEFAULT 0.00,
  `returned` decimal(12,2) NOT NULL DEFAULT 0.00,
  `final_receivable` decimal(12,2) NOT NULL DEFAULT 0.00,
  `due` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_purchase_cost` decimal(12,2) DEFAULT NULL,
  `profit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_method` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `branch_id`, `customer_id`, `sale_date`, `sale_by`, `invoice_number`, `order_type`, `delivery_charge`, `quantity`, `total`, `discount`, `change_amount`, `actual_discount`, `tax`, `receivable`, `paid`, `returned`, `final_receivable`, `due`, `total_purchase_cost`, `profit`, `payment_method`, `note`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2023-01-27', 0, '102049', 'general', NULL, 10, 2500.00, 'No Discount', 2500.00, 0.00, NULL, 2500.00, 2500.00, 0.00, 2500.00, 0.00, NULL, 2350.00, 1, NULL, '2024-05-06 23:26:32', '2024-05-07 03:08:37'),
(3, 1, 3, '2024-05-07', 0, '106905', 'general', NULL, 13, 3250.00, 'No Discount', 3250.00, 0.00, NULL, 3250.00, 4000.00, 0.00, 3250.00, -750.00, NULL, 3100.00, 1, NULL, '2024-05-06 23:43:36', '2024-05-06 23:43:36'),
(4, 1, 1, '2024-05-07', 0, '121106', 'general', NULL, 6, 1500.00, 'No Discount', 1500.00, 0.00, NULL, 1500.00, 1500.00, 0.00, 1500.00, 0.00, NULL, 1350.00, 1, NULL, '2024-05-07 00:50:38', '2024-05-07 00:50:38'),
(5, 1, 1, '2024-05-07', 0, '110048', 'general', NULL, 30, 900000.00, 'No Discount', 900000.00, 0.00, NULL, 900000.00, 900000.00, 0.00, 900000.00, 0.00, NULL, 882000.00, 3, NULL, '2024-05-07 00:53:53', '2024-05-07 00:53:53'),
(6, 1, 1, '2024-05-09', 0, '102342', 'general', NULL, 10, 5000.00, 'No Discount', 5000.00, 0.00, NULL, 5000.00, 5000.00, 0.00, 5000.00, 0.00, NULL, 4650.00, 1, NULL, '2024-05-09 02:24:24', '2024-05-09 02:24:24'),
(7, 1, 8, '2024-05-12', 0, '101757', 'general', NULL, 2, 1000.00, 'No Discount', 1000.00, 0.00, NULL, 1000.00, 1000.00, 0.00, 1000.00, 0.00, NULL, 500.00, 1, NULL, '2024-05-12 04:07:33', '2024-05-12 04:07:33'),
(8, 1, 3, '2024-05-12', 0, '103252', 'general', NULL, 2, 1000.00, 'No Discount', 970.00, 0.00, NULL, 970.00, 970.00, 0.00, 970.00, 0.00, NULL, 470.00, 1, NULL, '2024-05-12 04:08:01', '2024-05-12 04:08:01'),
(9, 1, 3, '2024-05-12', 0, '108409', 'general', NULL, 101, 14320.00, 'No Discount', 13890.40, 0.00, NULL, 13890.40, 13890.40, 0.00, 13890.40, 0.00, NULL, 13650.40, 1, NULL, '2024-05-12 05:54:30', '2024-05-12 05:54:30'),
(10, 1, 1, '2024-05-13', 0, '117340', 'general', NULL, 11, 34750.00, 'No Discount', 34750.00, 0.00, NULL, 34750.00, 34750.00, 0.00, 34750.00, 0.00, NULL, 25550.00, 1, NULL, '2024-05-12 22:21:31', '2024-05-12 22:21:31'),
(11, 1, 1, '2024-05-13', 0, '109299', 'general', NULL, 13, 620850.00, 'No Discount', 620850.00, 0.00, NULL, 620850.00, 620850.00, 0.00, 620850.00, 0.00, NULL, 611700.00, 1, NULL, '2024-05-12 22:51:08', '2024-05-12 22:51:08'),
(12, 1, 3, '2024-05-13', 0, '103289', 'general', NULL, 1, 11400.00, 'No Discount', 11058.00, 0.00, NULL, 11058.00, 11058.00, 0.00, 11058.00, 0.00, NULL, 2058.00, 1, NULL, '2024-05-12 22:56:33', '2024-05-12 22:56:33'),
(13, 1, 1, '2024-05-13', 0, '121051', 'general', NULL, 1, 11400.00, 'No Discount', 11400.00, 0.00, NULL, 11400.00, 11400.00, 0.00, 11400.00, 0.00, NULL, 2400.00, 1, NULL, '2024-05-12 23:15:23', '2024-05-12 23:15:23'),
(14, 1, 1, '2024-05-14', 0, '107835', 'general', NULL, 1, 11400.00, 'No Discount', 11400.00, 0.00, NULL, 11400.00, 11400.00, 0.00, 11400.00, 0.00, NULL, 2400.00, 1, NULL, '2024-05-13 22:09:50', '2024-05-13 22:09:50'),
(15, 1, 1, '2024-05-14', 0, '108602', 'general', NULL, 1, 120.00, 'No Discount', 120.00, 0.00, NULL, 120.00, 120.00, 0.00, 120.00, 0.00, NULL, 30.00, 1, NULL, '2024-05-13 22:39:42', '2024-05-13 22:39:42'),
(16, 1, 1, '2024-05-14', 0, '102422', 'general', NULL, 1, 11400.00, 'No Discount', 11400.00, 0.00, NULL, 11400.00, 11400.00, 0.00, 11400.00, 0.00, NULL, 2400.00, 1, NULL, '2024-05-13 22:40:28', '2024-05-13 22:40:28'),
(17, 1, 3, '2024-05-14', 0, '103967', 'general', NULL, 3, 870.00, 'No Discount', 370.00, 0.00, NULL, 370.00, 370.00, 0.00, 370.00, 0.00, NULL, -220.00, 1, NULL, '2024-05-14 01:21:42', '2024-05-14 01:21:42'),
(18, 1, 3, '2024-05-14', 0, '100579', 'general', NULL, 2, 11650.00, '3', 11300.50, 0.00, NULL, 11300.50, 11300.50, 0.00, 11300.50, 0.00, NULL, 2150.50, 1, NULL, '2024-05-14 02:27:54', '2024-05-14 02:27:54'),
(19, 1, 1, '2024-05-14', 0, '110670', 'general', NULL, 1, 11400.00, 'No Discount', 11400.00, 0.00, NULL, 11400.00, 11400.00, 0.00, 11400.00, 0.00, NULL, 2400.00, 1, NULL, '2024-05-14 03:10:24', '2024-05-14 03:10:24'),
(20, 1, 1, '2024-05-14', 0, '113062', 'general', NULL, 1, 250.00, 'No Discount', 250.00, 0.00, NULL, 250.00, 250.00, 0.00, 250.00, 0.00, NULL, 100.00, 1, NULL, '2024-05-14 03:13:24', '2024-05-14 03:13:24'),
(21, 1, 3, '2024-05-14', 0, '112742', 'general', NULL, 1, 11400.00, '3', 11058.00, 552.90, 5, 11610.90, 11610.90, 0.00, 11610.90, 0.00, NULL, 2610.90, 1, NULL, '2024-05-14 04:06:26', '2024-05-14 04:06:26'),
(22, 1, 4, '2024-05-15', 0, '104404', 'general', NULL, 11, 48300.00, 'No Discount', 48300.00, 0.00, NULL, 48300.00, 48300.00, 0.00, 48300.00, 0.00, NULL, 18250.00, 1, NULL, '2024-05-14 23:39:50', '2024-05-14 23:39:50'),
(23, 1, 5, '2024-05-15', 0, '109109', 'general', NULL, 30, 119500.00, NULL, 114000.00, 0.00, NULL, 114000.00, 114000.00, 0.00, 114000.00, 0.00, NULL, 104450.00, 5, NULL, '2024-05-14 23:41:22', '2024-05-14 23:41:22'),
(24, 1, 5, '2024-05-15', 0, '113853', 'general', NULL, 30, 478950.00, '3', 464581.50, 0.00, NULL, 464581.50, 464581.50, 0.00, 464581.50, 0.00, NULL, 434331.50, 5, NULL, '2024-05-14 23:42:45', '2024-05-14 23:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `discount` int(11) DEFAULT NULL,
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

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `rate`, `discount`, `main_unit_qty`, `sub_unit_qty`, `qty`, `sub_total`, `total_purchase_cost`, `created_at`, `updated_at`) VALUES
(3, 2, 3, 250.00, NULL, NULL, NULL, 10, 2500.00, 1500.00, '2024-05-06 23:26:32', '2024-05-06 23:26:32'),
(4, 3, 3, 250.00, NULL, NULL, NULL, 13, 3250.00, 1950.00, '2024-05-06 23:43:36', '2024-05-06 23:43:36'),
(5, 4, 3, 250.00, NULL, NULL, NULL, 6, 1500.00, 900.00, '2024-05-07 00:50:38', '2024-05-07 00:50:38'),
(6, 5, 1, 30000.00, NULL, NULL, NULL, 30, 900000.00, 540000.00, '2024-05-07 00:53:53', '2024-05-07 00:53:53'),
(7, 6, 4, 500.00, NULL, NULL, NULL, 10, 5000.00, 3500.00, '2024-05-09 02:24:24', '2024-05-09 02:24:24'),
(8, 7, 3, 250.00, NULL, NULL, NULL, 1, 250.00, 150.00, '2024-05-12 04:07:33', '2024-05-12 04:07:33'),
(9, 7, 4, 500.00, NULL, NULL, NULL, 1, 500.00, 350.00, '2024-05-12 04:07:33', '2024-05-12 04:07:33'),
(10, 8, 3, 250.00, NULL, NULL, NULL, 1, 250.00, 150.00, '2024-05-12 04:08:01', '2024-05-12 04:08:01'),
(11, 8, 4, 500.00, NULL, NULL, NULL, 1, 500.00, 350.00, '2024-05-12 04:08:01', '2024-05-12 04:08:01'),
(12, 9, 3, 250.00, NULL, NULL, NULL, 1, 250.00, 150.00, '2024-05-12 05:54:30', '2024-05-12 05:54:30'),
(13, 9, 6, 120.00, NULL, NULL, NULL, 100, 12000.00, 9000.00, '2024-05-12 05:54:30', '2024-05-12 05:54:30'),
(14, 10, 2, 12000.00, NULL, NULL, NULL, 1, 12000.00, 9000.00, '2024-05-12 22:21:31', '2024-05-12 22:21:31'),
(15, 10, 10, 300.00, NULL, NULL, NULL, 10, 3000.00, 2000.00, '2024-05-12 22:21:31', '2024-05-12 22:21:31'),
(16, 11, 2, 12000.00, NULL, NULL, NULL, 10, 120000.00, 90000.00, '2024-05-12 22:51:08', '2024-05-12 22:51:08'),
(17, 11, 3, 250.00, NULL, NULL, NULL, 3, 750.00, 450.00, '2024-05-12 22:51:08', '2024-05-12 22:51:08'),
(18, 12, 2, 12000.00, NULL, NULL, NULL, 1, 12000.00, 9000.00, '2024-05-12 22:56:33', '2024-05-12 22:56:33'),
(19, 13, 2, 12000.00, NULL, NULL, NULL, 1, 12000.00, 9000.00, '2024-05-12 23:15:23', '2024-05-12 23:15:23'),
(20, 14, 2, 12000.00, NULL, NULL, NULL, 1, 12000.00, 9000.00, '2024-05-13 22:09:50', '2024-05-13 22:09:50'),
(21, 15, 6, 120.00, 0, NULL, NULL, 1, 120.00, 90.00, '2024-05-13 22:39:42', '2024-05-13 22:39:42'),
(22, 16, 2, 12000.00, 5, NULL, NULL, 1, 11400.00, 9000.00, '2024-05-13 22:40:28', '2024-05-13 22:40:28'),
(23, 17, 3, 250.00, 0, NULL, NULL, 1, 250.00, 150.00, '2024-05-14 01:21:42', '2024-05-14 01:21:42'),
(24, 17, 6, 120.00, 0, NULL, NULL, 1, 120.00, 90.00, '2024-05-14 01:21:42', '2024-05-14 01:21:42'),
(25, 17, 4, 500.00, 0, NULL, NULL, 1, 500.00, 350.00, '2024-05-14 01:21:42', '2024-05-14 01:21:42'),
(26, 18, 3, 250.00, 0, NULL, NULL, 1, 250.00, 150.00, '2024-05-14 02:27:54', '2024-05-14 02:27:54'),
(27, 18, 2, 12000.00, 5, NULL, NULL, 1, 11400.00, 9000.00, '2024-05-14 02:27:54', '2024-05-14 02:27:54'),
(28, 19, 2, 12000.00, 5, NULL, NULL, 1, 11400.00, 9000.00, '2024-05-14 03:10:24', '2024-05-14 03:10:24'),
(29, 20, 3, 250.00, 0, NULL, NULL, 1, 250.00, 150.00, '2024-05-14 03:13:24', '2024-05-14 03:13:24'),
(30, 21, 2, 12000.00, 5, NULL, NULL, 1, 11400.00, 9000.00, '2024-05-14 04:06:26', '2024-05-14 04:06:26'),
(31, 22, 7, 50000.00, 5, NULL, NULL, 1, 47500.00, 30000.00, '2024-05-14 23:39:50', '2024-05-14 23:39:50'),
(32, 22, 9, 80.00, 0, NULL, NULL, 10, 800.00, 500.00, '2024-05-14 23:39:50', '2024-05-14 23:39:50'),
(33, 23, 2, 12000.00, 5, NULL, NULL, 10, 114000.00, 90000.00, '2024-05-14 23:41:22', '2024-05-14 23:41:22'),
(34, 23, 4, 500.00, 0, NULL, NULL, 10, 5000.00, 3500.00, '2024-05-14 23:41:22', '2024-05-14 23:41:22'),
(35, 23, 10, 300.00, 0, NULL, NULL, 10, 500.00, 2000.00, '2024-05-14 23:41:22', '2024-05-14 23:41:22'),
(36, 24, 11, 100.00, 5, NULL, NULL, 10, 950.00, 500.00, '2024-05-14 23:42:45', '2024-05-14 23:42:45'),
(37, 24, 14, 300.00, 0, NULL, NULL, 10, 3000.00, 2000.00, '2024-05-14 23:42:45', '2024-05-14 23:42:45'),
(38, 24, 7, 50000.00, 5, NULL, NULL, 10, 475000.00, 300000.00, '2024-05-14 23:42:45', '2024-05-14 23:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `number` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_categories`
--

CREATE TABLE `sms_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 2, 'Juice', 'juice', NULL, 0, '2024-05-06 03:38:16', '2024-05-06 03:38:16'),
(2, 2, 'Frozen Food', 'frozen-food', NULL, 0, '2024-05-06 03:38:29', '2024-05-06 03:38:29'),
(3, 3, 'TV or Monitor', 'tv-or-monitor', NULL, 0, '2024-05-06 03:38:46', '2024-05-06 03:38:46'),
(4, 3, 'Mobile', 'mobile', NULL, 0, '2024-05-06 03:38:55', '2024-05-06 03:38:55'),
(5, 4, 'T-shirt', 't-shirt', NULL, 0, '2024-05-06 03:39:05', '2024-05-06 03:39:05'),
(6, 4, 'Pant', 'pant', NULL, 0, '2024-05-06 03:39:17', '2024-05-06 03:39:17'),
(7, 5, 'Sofa', 'sofa', NULL, 0, '2024-05-06 03:39:31', '2024-05-06 03:39:31'),
(8, 5, 'Table', 'table', NULL, 0, '2024-05-06 03:39:39', '2024-05-06 03:39:39'),
(9, 3, 'Refrigaretor', 'refrigaretor', NULL, 0, '2024-05-07 23:08:46', '2024-05-07 23:08:46');

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
  `wallet_balance` decimal(14,2) NOT NULL DEFAULT 0.00,
  `total_receivable` decimal(20,2) NOT NULL DEFAULT 0.00,
  `total_payable` decimal(20,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `branch_id`, `name`, `email`, `phone`, `address`, `opening_receivable`, `opening_payable`, `wallet_balance`, `total_receivable`, `total_payable`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jhon Wick', NULL, '+88 01715000027', NULL, NULL, NULL, -3555.00, 481445.00, 485000.00, '2024-05-06 04:30:54', '2024-05-06 22:57:40'),
(2, 1, 'SK Traders', NULL, '+1 (349) 525-6061', NULL, NULL, NULL, 0.00, 15000.00, 15000.00, '2024-05-06 04:31:55', '2024-05-14 23:36:00'),
(3, 1, 'PK Traders', NULL, '+88 01715000027', NULL, NULL, NULL, 0.00, 1830000.00, 1810000.00, '2024-05-06 21:33:51', '2024-05-14 23:38:51'),
(4, 1, 'Super Traders', NULL, '01738743583', NULL, NULL, NULL, 0.00, 151245.00, 151245.00, '2024-05-06 21:34:16', '2024-05-15 00:42:48'),
(5, 1, 'My Store', NULL, '01984545834', NULL, NULL, NULL, 0.00, 900.00, 900.00, '2024-05-06 21:35:16', '2024-05-15 00:37:14');

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
(1, 'Govt. Tax', '5', '2024-05-06 03:46:37', '2024-05-06 03:46:37'),
(2, '10', '10', '2024-05-06 03:46:51', '2024-05-06 03:46:51'),
(3, '7', '7', '2024-05-06 03:47:02', '2024-05-06 03:47:02'),
(4, '15', '15', '2024-05-06 03:47:10', '2024-05-06 03:47:10');

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
(1, '2024-05-07', 'pay', 'Purchase#5', NULL, 1, 485000.00, 481445.00, -3555.00, 1, NULL, '2024-05-06 22:12:22', '2024-05-06 22:57:40'),
(2, '2024-05-07', 'receive', 'Sale#1', 2, NULL, 700.00, 748.13, 48.13, 1, NULL, '2024-05-06 23:14:21', '2024-05-06 23:14:21'),
(3, '2024-05-14', 'receive', 'Sale#20', 1, NULL, 1610070.00, 1610570.00, 500.00, 1, NULL, '2024-05-06 23:26:32', '2024-05-14 03:13:24'),
(4, '2024-05-07', 'receive', 'Sale#2', 1, NULL, 400.00, NULL, 400.00, 1, NULL, '2024-05-06 23:42:32', '2024-05-06 23:42:32'),
(5, '2024-05-14', 'receive', 'Sale#21', 3, NULL, 53199.80, 52449.80, -750.00, 1, NULL, '2024-05-06 23:43:36', '2024-05-14 04:06:26'),
(6, '2024-05-07', 'receive', 'Sale#2', 1, NULL, 100.00, NULL, 100.00, 1, NULL, '2024-05-07 03:08:37', '2024-05-07 03:08:37'),
(7, '2024-05-15', 'pay', 'Purchase#8', NULL, 3, 1820000.00, 1830000.00, 10000.00, 1, NULL, '2024-05-07 03:18:30', '2024-05-14 23:38:51'),
(8, '2024-05-07', 'pay', 'Purchase#6', NULL, 3, 10000.00, NULL, -10000.00, 1, NULL, '2024-05-07 03:19:42', '2024-05-07 03:19:42'),
(9, '2024-05-12', 'receive', 'Sale#7', 8, NULL, 1000.00, 1000.00, 0.00, 1, NULL, '2024-05-12 04:07:33', '2024-05-12 04:07:33'),
(10, '2024-05-15', 'pay', 'Purchase#7', NULL, 2, 15000.00, 15000.00, 0.00, 1, NULL, '2024-05-14 23:36:00', '2024-05-14 23:36:00'),
(11, '2024-05-15', 'receive', 'Sale#22', 4, NULL, 48300.00, 48300.00, 0.00, 1, NULL, '2024-05-14 23:39:50', '2024-05-14 23:39:50'),
(12, '2024-05-15', 'receive', 'Sale#24', 5, NULL, 578581.50, 578581.50, 0.00, 5, NULL, '2024-05-14 23:41:22', '2024-05-14 23:42:45'),
(13, '2024-05-15', 'pay', 'Purchase#9', NULL, 5, 900.00, 900.00, 0.00, 2, NULL, '2024-05-15 00:37:14', '2024-05-15 00:37:14'),
(14, '2024-05-15', 'pay', 'Purchase#10', NULL, 4, 151245.00, 151245.00, 0.00, 2, NULL, '2024-05-15 00:42:48', '2024-05-15 00:42:48');

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
(1, 'KG', '1', '*', 1000, '2024-05-06 03:41:23', '2024-05-06 03:41:23'),
(2, 'pc', '1', '*', 1, '2024-05-06 03:41:41', '2024-05-06 03:41:41'),
(3, 'Dozon', '12', '/', 12, '2024-05-06 03:42:23', '2024-05-06 03:42:23'),
(4, 'Pair', '2', '/', 2, '2024-05-06 03:42:50', '2024-05-06 03:42:50'),
(5, 'Liter', '1', '*', 1000, '2024-05-06 04:13:26', '2024-05-06 04:13:26');

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
(1, 'EBB', 'ebb@gmail.com', NULL, 1, '$2y$10$HkATiONt8miuTP.kJgmXCumEcebwPc7OSoBeTjJsgzz5rZYcP5u3O', NULL, '2024-05-06 03:15:55', '2024-05-06 03:15:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_transactions`
--
ALTER TABLE `account_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_transactions_account_id_foreign` (`account_id`),
  ADD KEY `account_transactions_branch_id_foreign` (`branch_id`);

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
-- Indexes for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_salaries_branch_id_foreign` (`branch_id`),
  ADD KEY `employee_salaries_employee_id_foreign` (`employee_id`);

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
  ADD KEY `promotion_details_promotion_id_foreign` (`promotion_id`);

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
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sms_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `sms_categories`
--
ALTER TABLE `sms_categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `account_transactions`
--
ALTER TABLE `account_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `actual_payments`
--
ALTER TABLE `actual_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promotion_details`
--
ALTER TABLE `promotion_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `psizes`
--
ALTER TABLE `psizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_categories`
--
ALTER TABLE `sms_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_transactions`
--
ALTER TABLE `account_transactions`
  ADD CONSTRAINT `account_transactions_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `account_transactions_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD CONSTRAINT `employee_salaries_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

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
