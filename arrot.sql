-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 06:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arrot`
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
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_issue_date` date NOT NULL,
  `check_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `order_id`, `bill_amount`, `payment_status`, `payment_amount`, `payment_type`, `check_issue_date`, `check_number`, `bank_name`, `check_photo`, `user_id`, `buyer_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2000.00, 'partials', 455.00, 'check', '2021-05-13', '145', 'Sonali Bank', '1699531037096424.png', 2, 'BUYER-001', '2021-05-11 23:58:20', '2021-05-11 23:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'logo.png',
  `br_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `br_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `br_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `br_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'defaultphoto.png',
  `buyer_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_license` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` date NOT NULL,
  `tagline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `buyer_id`, `buyer_name`, `buyer_address`, `buyer_website`, `buyer_telephone`, `buyer_email`, `buyer_nid`, `buyer_logo`, `br_name`, `br_email`, `br_phone`, `br_image`, `buyer_type`, `trade_license`, `expire_date`, `tagline`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'BUYER-001', 'Md buyer Rahman', 'Dhaka,Bangladesh', 'www.selevenit.com', '01925555115', 'mahfujurmoon5@gmail.com', '487887454545', '1699524694371918.png', 'Md Jony islam', 'mahfujurmoon5@gmail.com', '0192225541', '1699524694405246.png', 'non_profit', '1699524694260044.jpg', '2021-05-13', 'demo tag line', 2, '2021-05-11 22:17:31', '2021-05-11 22:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_19_084646_create_buyers_table', 1),
(5, '2021_04_19_090121_create_products_table', 1),
(6, '2021_04_19_100727_create_product_prices_table', 1),
(7, '2021_04_20_032217_create_sellers_table', 1),
(8, '2021_04_20_041007_create_units_table', 1),
(9, '2021_04_21_082033_create_orders_table', 1),
(10, '2021_04_21_082659_create_order_products_table', 1),
(11, '2021_04_22_071752_create_billings_table', 1),
(12, '2021_04_24_091654_create_purchases_table', 1),
(13, '2021_04_24_091838_create_purchase_products_table', 1),
(14, '2021_04_25_062959_create_seller_proposes_table', 1),
(15, '2021_05_02_062619_create_contacts_table', 1),
(16, '2021_05_04_055728_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('4a639385-dc90-4b2f-b664-16655ce09d9d', 'App\\Notifications\\OrderStatus', 'App\\User', 1, '{\"order_id\":2,\"status\":\"received\"}', NULL, '2021-05-11 23:57:50', '2021-05-11 23:57:50'),
('4ec2f3cd-964b-47fd-8641-0b53958aee70', 'App\\Notifications\\OrderStatus', 'App\\User', 2, '{\"order_id\":2,\"status\":\"shipping\"}', NULL, '2021-05-11 22:34:50', '2021-05-11 22:34:50'),
('85255988-c39a-479a-adfd-a37abe735c03', 'App\\Notifications\\OrderStatus', 'App\\User', 2, '{\"order_id\":2,\"status\":\"accepted\"}', NULL, '2021-05-11 22:34:42', '2021-05-11 22:34:42'),
('b712212d-f77a-457e-b950-cbf5b206e2b2', 'App\\Notifications\\OrderBill', 'App\\User', 1, '{\"order_id\":2,\"payment_amount\":\"455\"}', NULL, '2021-05-11 23:58:20', '2021-05-11 23:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 2, 'BUYER-001', NULL, NULL, 'pending', 'unpaid', '2021-05-11 22:25:48', '2021-05-11 22:25:48'),
(2, 2, 'BUYER-001', '2021-05-15', NULL, 'received', 'partials', '2021-05-11 22:26:58', '2021-05-11 23:58:20');

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
(1, 3, 1, 10.00, 100.00, NULL, '2021-05-11 22:25:48', '2021-05-11 22:25:48'),
(2, 2, 1, 20.00, 100.00, NULL, '2021-05-11 22:25:48', '2021-05-11 22:25:48'),
(3, 3, 2, 10.00, 100.00, 10.00, '2021-05-11 22:26:58', '2021-05-11 23:57:50'),
(4, 2, 2, 10.00, 100.00, 10.00, '2021-05-11 22:26:58', '2021-05-11 23:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `product_type`, `unit_id`, `product_description`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'VEG-001', 'Onion', 'vegetable', 1, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '1699524863692687.jpg', NULL, '2021-05-11 22:20:12', '2021-05-11 22:20:12'),
(2, 'VEG-002', 'Orange  new', 'vegetable', 1, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '1699524903845097.jpg', NULL, '2021-05-11 22:20:50', '2021-05-11 22:20:50'),
(3, 'VEG-003', 'APple', 'vegetable', 1, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '1699524931415090.jpg', NULL, '2021-05-11 22:21:17', '2021-05-11 22:21:17');

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
(1, 1, NULL, NULL, NULL, 120.00, '2021-05-11 22:20:12', '2021-05-11 22:20:12'),
(2, 2, NULL, NULL, NULL, 100.00, '2021-05-11 22:20:50', '2021-05-11 22:20:50'),
(3, 3, NULL, NULL, NULL, 100.00, '2021-05-11 22:21:17', '2021-05-11 22:21:17'),
(4, 3, '2021-05-15', NULL, NULL, 100.00, '2021-05-11 22:34:42', '2021-05-11 22:34:42'),
(5, 2, '2021-05-15', NULL, NULL, 100.00, '2021-05-11 22:34:42', '2021-05-11 22:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `shipment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_products`
--

CREATE TABLE `purchase_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_qty` bigint(20) UNSIGNED NOT NULL,
  `unite_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_passport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `seller_id`, `seller_name`, `seller_address`, `seller_website`, `seller_telephone`, `seller_email`, `seller_passport`, `seller_nid`, `sr_name`, `sr_email`, `sr_phone`, `sr_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'SELLER-001', 'Md Seller Rahman', 'DHaka', 'www.selevenit.com', '01925574878', 'seller@gmail.com', NULL, '76574654567485', 'md jony islam', 'jony@gmail.com', '019254646475', '1699525035533193.png', 3, '2021-05-11 22:22:56', '2021-05-11 22:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `seller_proposes`
--

CREATE TABLE `seller_proposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('pending','accepted','rejected','processing','purchase') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_proposes`
--

INSERT INTO `seller_proposes` (`id`, `product_id`, `seller_id`, `price`, `quantity`, `status`, `total`, `created_at`, `updated_at`) VALUES
(1, '1', '3', 20.00, 1, 'purchase', NULL, '2021-05-12 04:06:56', '2021-05-12 04:06:56'),
(2, '2', '3', 50.00, 10, 'pending', NULL, '2021-05-12 04:06:56', '2021-05-12 04:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'kG', '2021-05-11 22:18:26', '2021-05-11 22:18:26'),
(2, 'Litter', '2021-05-11 22:18:37', '2021-05-11 22:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'defaultphoto.png',
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, NULL, NULL, 'Md Supplier Rahman', 'supplier@gmail.com', '01925555115', 'supplier', '$2y$10$dR9G8IA/kwD/Lls9B6GKDOCZZcugMunhGmRNSUWUL75yCd6RVle8W', 'defaultphoto.png', NULL, 1, NULL, NULL, NULL, '2021-05-11 22:11:39', '2021-05-11 22:11:39'),
(2, 'BUYER-001', NULL, 'Md buyer Rahman', 'mahfujurmoon5@gmail.com', '01925555115', 'buyer', '$2y$10$dzM6ZdS/NcqPDWgd3M5Q6uAc7qiA1W0t5pdfoArw9ZkU3CZA0i5ES', '1699524694371918.png', '44a84f15588fcac06c29444574bc8f0ca9a0fe2d', 1, 1, NULL, NULL, '2021-05-11 22:17:31', '2021-05-11 22:17:31'),
(3, NULL, 'SELLER-001', 'Md Seller Rahman', 'seller@gmail.com', '01925574878', 'seller', '$2y$10$7UUWbbpM6h7oGQ2wfANS7.VT6p9MniUkBG6TXfYzEJAxawz3995pm', '1699525035474579.png', 'e048851c7743c5b0dbad459ff8fb86d0a76325f7', 1, 1, NULL, NULL, '2021-05-11 22:22:56', '2021-05-11 22:22:56');

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seller_proposes`
--
ALTER TABLE `seller_proposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
