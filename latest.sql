-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 04:33 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arrot2`
--

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `bill_amount` double(16,2) NOT NULL,
  `payment_status` enum('paid','unpaid','partials') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'partials',
  `payment_amount` double(16,2) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_issue_date` date NOT NULL,
  `check_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `order_id`, `bill_amount`, `payment_status`, `payment_amount`, `payment_type`, `check_issue_date`, `check_number`, `bank_name`, `check_photo`, `user_id`, `buyer_id`, `created_at`, `updated_at`) VALUES
(1, 2, 150.00, 'partials', 100.00, 'check', '2021-04-25', '23456', 'islami bank', '1698276090866455.jpg', 2, 'BUYER-001', '2021-04-28 03:31:30', '2021-04-28 03:31:30'),
(3, 2, 150.00, 'partials', 50.00, 'check', '2021-04-30', '1234', 'islami bank', '1698276516207503.jpg', 4, 'BUYER-001', '2021-04-28 03:38:15', '2021-04-28 03:38:15'),
(4, 1, 240.00, 'partials', 240.00, 'check', '2021-04-21', '1234567', 'islami bank', '1698278832346432.jpg', 4, 'BUYER-001', '2021-04-28 04:15:04', '2021-04-28 04:15:04'),
(6, 5, 120.00, 'partials', 120.00, 'check', '2021-04-30', '1232', 'islami bank', '1698294208743272.jpeg', 2, 'BUYER-001', '2021-04-28 08:19:28', '2021-04-28 08:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'logo.png',
  `br_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `br_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `br_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `br_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'defaultphoto.png',
  `buyer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` date NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `buyer_id`, `buyer_name`, `buyer_address`, `buyer_website`, `buyer_telephone`, `buyer_email`, `buyer_nid`, `buyer_logo`, `br_name`, `br_email`, `br_phone`, `br_image`, `buyer_type`, `trade_license`, `expire_date`, `tagline`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'BUYER-001', 'Pran RFL', 'Pabna', 'azizul.intels.co', '01738040305', 'azizul656589@gmail.com', '12345678', '1698258695710832.png', 'Azizul', 'azizul@gmail.com', '01738040305', '1698258695875443.png', 'non_profit', '1698258695277835.jpg', '2024-06-29', 'Hello', 2, '2021-04-27 22:55:01', '2021-04-27 22:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(52, '2014_10_12_000000_create_users_table', 1),
(53, '2014_10_12_100000_create_password_resets_table', 1),
(54, '2019_08_19_000000_create_failed_jobs_table', 1),
(55, '2021_04_19_084646_create_buyers_table', 1),
(56, '2021_04_19_090121_create_products_table', 1),
(57, '2021_04_19_100727_create_product_prices_table', 1),
(58, '2021_04_20_032217_create_sellers_table', 1),
(59, '2021_04_20_041007_create_units_table', 1),
(60, '2021_04_21_082033_create_orders_table', 1),
(61, '2021_04_21_082659_create_order_products_table', 1),
(62, '2021_04_22_071752_create_billings_table', 1),
(63, '2021_04_24_091654_create_purchases_table', 1),
(64, '2021_04_24_091838_create_purchase_products_table', 1),
(65, '2021_04_25_062959_create_seller_proposes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `amount` double(16,2) DEFAULT NULL,
  `status` enum('pending','accepted','processing','shipping','received','rejected','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` enum('paid','unpaid','partials') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `buyer_id`, `delivery_date`, `amount`, `status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'BUYER-001', '2021-05-01', NULL, 'completed', 'paid', '2021-04-27 23:56:58', '2021-04-28 04:15:42'),
(2, 2, 'BUYER-001', '2021-05-01', NULL, 'received', 'paid', '2021-04-28 00:36:56', '2021-04-28 03:38:16'),
(3, 2, 'BUYER-001', '2021-05-01', NULL, 'rejected', 'unpaid', '2021-04-28 04:17:29', '2021-04-28 04:30:42'),
(4, 2, 'BUYER-001', '2021-04-30', NULL, 'accepted', 'unpaid', '2021-04-28 04:53:57', '2021-04-28 05:02:31'),
(5, 2, 'BUYER-001', '2021-04-30', NULL, 'received', 'paid', '2021-04-28 07:40:15', '2021-04-28 08:19:28'),
(6, 2, 'BUYER-001', NULL, NULL, 'pending', 'unpaid', '2021-04-28 08:19:47', '2021-04-28 08:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `qty` double(8,2) NOT NULL,
  `unite_price` double(8,2) DEFAULT NULL,
  `delivered_qty` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `product_id`, `order_id`, `qty`, `unite_price`, `delivered_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10.00, 30.00, 8.00, '2021-04-27 23:56:58', '2021-04-28 04:10:57'),
(2, 2, 2, 8.00, 10.00, 5.00, '2021-04-28 00:36:56', '2021-04-28 03:18:35'),
(3, 1, 2, 6.00, 25.00, 4.00, '2021-04-28 00:36:56', '2021-04-28 03:18:35'),
(4, 2, 3, 3.00, 8.00, NULL, '2021-04-28 04:17:29', '2021-04-28 04:17:29'),
(5, 1, 3, 3.00, 20.00, NULL, '2021-04-28 04:17:30', '2021-04-28 04:17:30'),
(6, 2, 4, 4.00, 10.00, NULL, '2021-04-28 04:53:57', '2021-04-28 05:02:30'),
(7, 1, 4, 5.00, 22.00, NULL, '2021-04-28 04:53:57', '2021-04-28 05:02:31'),
(8, 2, 5, 6.00, 8.00, 5.00, '2021-04-28 07:40:15', '2021-04-28 07:52:47'),
(9, 1, 5, 5.00, 20.00, 4.00, '2021-04-28 07:40:15', '2021-04-28 07:52:48'),
(10, 2, 6, 3.00, 8.00, NULL, '2021-04-28 08:19:47', '2021-04-28 08:19:47'),
(11, 1, 6, 3.00, 20.00, NULL, '2021-04-28 08:19:47', '2021-04-28 08:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `product_type`, `unit_id`, `product_description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'veg-000', 'Alu', 'vegetable', 2, 'This is daimond alu', '1698262414881924.jpg', '2021-04-27 23:54:07', '2021-04-27 23:54:07'),
(2, 'met-001', 'Dim', 'meat', 1, 'Dim', '1698265060190545.jpg', '2021-04-28 00:36:10', '2021-04-28 00:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE `product_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sales_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `purchase_rate` double(16,2) DEFAULT NULL,
  `sales_rate` double(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_prices`
--

INSERT INTO `product_prices` (`id`, `product_id`, `sales_date`, `updated_date`, `purchase_rate`, `sales_rate`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, 20.00, '2021-04-27 23:54:07', '2021-04-27 23:54:07'),
(2, 1, '2021-04-28', NULL, NULL, 22.00, '2021-04-28 00:02:40', '2021-04-28 00:02:40'),
(3, 2, NULL, NULL, NULL, 8.00, '2021-04-28 00:36:10', '2021-04-28 00:36:10'),
(17, 2, '2021-04-30', NULL, NULL, 10.00, '2021-04-28 02:34:39', '2021-04-28 02:34:39'),
(18, 1, '2021-04-30', NULL, NULL, 25.00, '2021-04-28 02:34:39', '2021-04-28 02:34:39'),
(19, 1, '2021-04-30', NULL, NULL, 30.00, '2021-04-28 03:53:05', '2021-04-28 03:53:05'),
(20, 2, '2021-04-30', NULL, NULL, 10.00, '2021-04-28 05:02:30', '2021-04-28 05:02:30'),
(21, 1, '2021-04-30', NULL, NULL, 22.00, '2021-04-28 05:02:30', '2021-04-28 05:02:30'),
(22, 2, '2021-04-30', NULL, NULL, 8.00, '2021-04-28 07:44:02', '2021-04-28 07:44:02'),
(23, 1, '2021-04-30', NULL, NULL, 20.00, '2021-04-28 07:44:02', '2021-04-28 07:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_products`
--

CREATE TABLE `purchase_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `purchase_qnty` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_expire_date` date DEFAULT NULL,
  `sr_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller_proposes`
--

CREATE TABLE `seller_proposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('pending','accept','reject','processing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pice', '2021-04-27 23:52:57', '2021-04-27 23:52:57'),
(2, 'KG', '2021-04-27 23:53:03', '2021-04-27 23:53:03'),
(3, 'Li', '2021-04-27 23:53:21', '2021-04-27 23:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `buyer_id`, `seller_id`, `name`, `email`, `phone`, `role`, `password`, `image`, `verification_code`, `is_verified`, `parent_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'AZIZUL ISLAM', 'supplier@gmail.com', '01738040305', 'supplier', '$2y$10$95e8LUX74wCkMnkzg0UJ/.GPf2NFUwdjcBuSklgwonyozKMH6l40e', 'defaultphoto.png', NULL, 0, NULL, NULL, NULL, '2021-04-27 22:52:24', '2021-04-27 23:35:42'),
(2, 'BUYER-001', NULL, 'Pran RFL', 'azizul656589@gmail.com', '01738040305', 'buyer', '$2y$10$95e8LUX74wCkMnkzg0UJ/.GPf2NFUwdjcBuSklgwonyozKMH6l40e', '1698258695710832.png', NULL, 0, NULL, NULL, NULL, '2021-04-27 22:55:01', '2021-04-27 22:55:01'),
(3, 'BUYER-001', NULL, 'Warehouse', 'wr@gmail.com', '01738040305', 'warehouse', '$2y$10$DNsKCuD1woQMAPAbgXeW.uPuIsPqGXPBGZniVH2Ir8FyRl3hyC5a.', '1698273185731885.png', NULL, 0, 2, NULL, NULL, '2021-04-28 02:45:20', '2021-04-28 02:45:20'),
(4, 'BUYER-001', NULL, 'Accounts', 'account@gmail.com', '01738040305', 'accounts', '$2y$10$9O3quoocaBHmGVbpfuuPQ.oarrdZDNg3wQDgb18fOHghE.e9Qhhia', '1698276206498005.png', NULL, 0, 2, NULL, NULL, '2021-04-28 03:33:20', '2021-04-28 03:33:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_products`
--
ALTER TABLE `purchase_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_proposes`
--
ALTER TABLE `seller_proposes`
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
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_products`
--
ALTER TABLE `purchase_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_proposes`
--
ALTER TABLE `seller_proposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
