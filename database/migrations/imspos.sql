-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2019 at 07:24 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imspos`
--

-- --------------------------------------------------------

--
-- Table structure for table `advancesalaries`
--

CREATE TABLE `advancesalaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advance_salary` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advancesalaries`
--

INSERT INTO `advancesalaries` (`id`, `employee_id`, `month`, `year`, `advance_salary`, `created_at`, `updated_at`) VALUES
(2, 1, 'March', '2019', '5000.00', '2019-04-07 21:55:32', '2019-04-07 23:25:38'),
(3, 1, 'January', '2019', '2000.00', '2019-04-07 22:38:50', '2019-04-07 22:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `att_date` date NOT NULL,
  `att_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `att_date`, `att_year`, `attendance`, `month`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-04-10', '2019', 'Present', 'April', '2019-04-09 18:00:00', NULL),
(2, 2, '2019-04-10', '2019', 'Present', 'April', '2019-04-09 18:00:00', NULL),
(3, 1, '2019-04-11', '2019', 'Present', 'April', '2019-04-10 18:00:00', NULL),
(4, 2, '2019-04-11', '2019', 'Present', 'April', '2019-04-10 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_id`, `cat_name`, `cat_slug`, `status`, `created_at`, `updated_at`) VALUES
(13, NULL, 'Mobile', 'mobile', 1, '2019-04-08 08:56:35', '2019-04-08 08:56:35'),
(14, NULL, 'Car', 'car', 1, '2019-04-08 08:56:54', '2019-04-08 08:57:02'),
(15, NULL, 'Food', 'food', 1, '2019-04-12 22:24:26', '2019-04-12 22:24:26'),
(16, 15, 'Barger', 'barger', 1, '2019-04-12 22:24:44', '2019-04-12 22:24:44'),
(17, NULL, 'Bike', 'bike', 1, '2019-04-18 02:20:28', '2019-04-18 02:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_brance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `shopname`, `address`, `photo`, `account_holder`, `account_number`, `bank_name`, `bank_brance`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Shahrair Hosen', 'customer@me.com', '01710835653', 'Dokhan', 'Dhaka', 'public/images/customer/shahrair-1554567265.png', 'Shahriar', '9454545095', NULL, 'Dutch Bangla Bank', 'Dhaka', '2019-04-06 10:14:25', '2019-04-06 10:14:46'),
(2, 'Piyash', 'piyash@me.com', '01810835652', 'Nai', 'Dhaka', 'public/images/customer/piyash-1555128996.png', 'Piyash', '387349343', 'Dutch Bangla Bank', 'Mirpur', 'Dhaka', '2019-04-12 22:16:36', '2019-04-12 22:16:36'),
(3, 'Nazmul', 'nazmul@me.com', '01710835655', 'Nai', 'Millika, Dhaka', 'public/images/customer/nazmul-1555142029.png', 'Nazmul', '3826494324', 'Dutch Bangla Bank', 'Mirpur', 'Dhaka', '2019-04-13 01:53:49', '2019-04-13 01:53:49'),
(4, 'Test', 'test@me.com', '01710835656', 'Nai', 'Dhaka', 'public/images/customer/test-1555142232.png', 'Nazmul fdfdf', '335676767', 'Dutch Bangla Bank', 'Mirpur', 'Dhaka', '2019-04-13 01:57:12', '2019-04-13 01:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'phone number formate is 11 digit',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `vacation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `experience`, `photo`, `nid`, `salary`, `vacation`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Shahrair Hosen', 'customer@me.com', '01710835653', 'Dhaka', 'PHP', 'public/images/employee/shahrair-hosen-1554616588.png', '354654665', '10000', '14', 'Dhaka', '2019-04-06 23:56:28', '2019-04-06 23:56:28'),
(2, 'Shahrair', 'customer5@me.com', '01710835654', 'Dhaka', 'Laravel', 'public/images/employee/shahrair-1554699254.png', '343434343', '20000', '14', 'Dhaka', '2019-04-07 22:54:14', '2019-04-07 22:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `month` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `details`, `amount`, `month`, `date`, `created_at`, `updated_at`) VALUES
(2, 'Something', '1000.00', 'January', '2019-04-10', '2019-04-09 14:10:53', '2019-04-09 14:10:53'),
(3, 'Hello', '500.00', 'January', '2019-04-10', '2019-04-09 14:21:09', '2019-04-09 14:21:09'),
(4, 'Electricity Bill', '4000.00', 'April', '2019-04-10', '2019-04-10 08:16:23', '2019-04-10 08:16:23'),
(5, 'Net Bill', '1000.00', 'April', '2019-04-10', '2019-04-10 08:16:49', '2019-04-10 08:16:49');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_03_30_132626_create_employees_table', 2),
(7, '2019_04_03_170641_create_customers_table', 3),
(8, '2019_04_06_162009_create_suppliers_table', 4),
(11, '2019_04_07_052526_create_advance_salaries_table', 5),
(12, '2019_04_08_035832_create_salaries_table', 6),
(14, '2019_04_08_103137_create_categories_table', 7),
(15, '2019_04_08_151149_create_products_table', 8),
(16, '2019_04_09_181042_create_expenses_table', 9),
(18, '2019_04_10_164547_create_attendances_table', 10),
(20, '2019_04_12_032853_create_settings_table', 11),
(21, '2019_04_13_032235_create_pos_table', 12),
(22, '2019_04_13_134323_create_orders_table', 12),
(23, '2019_04_13_134605_create_orderdetails_table', 12),
(24, '2014_10_12_000000_create_users_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitcost` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `unitcost`, `total`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 1, '1', '1452000', '2019-04-12 18:00:00', NULL),
(4, 3, 3, 1, '1', '1331000', '2019-04-12 18:00:00', NULL),
(5, 4, 3, 1, '1', '1331000', '2019-04-12 18:00:00', NULL),
(6, 5, 2, 1, '1', '1452000', '2019-04-13 18:00:00', NULL),
(7, 6, 4, 1, '1', '133100', '2019-04-17 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_products` int(11) NOT NULL,
  `sub_total` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `order_status`, `total_products`, `sub_total`, `tax`, `total`, `pay`, `due`, `payment_status`, `created_at`, `updated_at`) VALUES
(3, 1, '2019-04-13', 'Success', 2, '2,300,000.00', '483,000.00', '2,783,000.00', '2783000', '00', 'HandCash', '2019-04-12 18:00:00', NULL),
(4, 3, '2019-04-13', 'Success', 1, '1,100,000.00', '231,000.00', '1,331,000.00', '1331000', '00', 'HandCash', '2019-04-12 18:00:00', NULL),
(5, 4, '2019-04-14', 'Pending', 1, '1,200,000.00', '252,000.00', '1,452,000.00', '1452000', '00', 'HandCash', '2019-04-13 18:00:00', NULL),
(6, 3, '2019-04-18', 'Pending', 1, '110,000.00', '23,100.00', '133,100.00', '133100', '00', 'HandCash', '2019-04-17 18:00:00', NULL);

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
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_godown` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bye_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `buying_price` decimal(12,2) NOT NULL,
  `selling_price` decimal(12,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `supplier_id`, `product_name`, `product_code`, `product_godown`, `product_route`, `product_image`, `bye_date`, `expire_date`, `buying_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(2, 14, 1, 'BMW', '33454', 'A', '2', 'public/images/product/-1554822287.jpeg', '2009-08-11', '2009-08-11', '1000000.00', '1200000.00', 0, '2019-04-09 09:04:47', '2019-04-09 09:04:47'),
(3, 14, 1, 'Mercedes Benz', '33454', 'A', '2', 'public/images/product/-1554822287.jpeg', '2009-08-11', '2009-08-11', '1000000.00', '1100000.00', 0, '2019-04-12 00:48:12', '2019-04-12 00:48:12'),
(4, 17, 1, 'Keeway', '34434', 'B', '3', 'public/images/product/-1555575718.jpg', '2019-04-10', '2019-04-30', '100000.00', '110000.00', 0, '2019-04-18 02:21:58', '2019-04-18 02:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_address`, `company_email`, `company_phone`, `company_logo`, `company_mobile`, `company_city`, `company_country`, `company_zipcode`, `created_at`, `updated_at`) VALUES
(1, 'SM Inventory', 'Mirpur, Dhaka, Bangladesh', 'email@me.com', '01710835653', 'public/images/company/-1555044056.png', '01710835652', 'Dhaka', 'Bangladesh', '1216', '2019-04-11 19:00:00', '2019-04-11 22:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brance_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `type`, `shop`, `photo`, `account_holder`, `account_number`, `bank_name`, `brance_name`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Shahrair', 'customer@me.com', '01710835653', 'Dhaka', 'distributer', 'Dukan', 'public/images/supplier/shahrair-1554613881.png', 'Shahriar', '83459341', NULL, NULL, 'Dhaka', '2019-04-06 23:11:21', '2019-04-06 23:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Super Admin', 'shahriarmurolcse@gmail.com', '2019-04-14 19:00:00', '$2y$12$oQH2YjQjpAxFSaMRC4kUCeYiTFiMw3a7KDEYG48CjhUdHGQwzkHIe', 'public/images/users/super-admin-1555566262.jpg', 'superadmin', 'l1KcY3wZiGMRb4pN5W5uIQqvn2q0yTU8axMUiLpW2skFW5dROqlEryrdlmff', '2019-04-14 19:00:00', '2019-04-17 23:44:22'),
(4, 'Admin', 'admin@me.com', NULL, '$2y$10$fL65YlbZpMvNSbFmutZD8eT5Dj5oN.Fj/wVsoWQ1W2Glee/weyghm', 'public/images/users/admin-1555614996.jpg', 'admin', 'XFHs3QSAgLcPgxH9fMwwx6XzAo1NyAC9wVtrFvmOH08dyg2EoYU9JOXFPIyG', '2019-04-18 13:16:36', '2019-04-18 13:16:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advancesalaries`
--
ALTER TABLE `advancesalaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `employees_phone_unique` (`phone`),
  ADD UNIQUE KEY `employees_nid_unique` (`nid`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`);

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
-- AUTO_INCREMENT for table `advancesalaries`
--
ALTER TABLE `advancesalaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
