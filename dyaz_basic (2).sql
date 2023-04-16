-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 12:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dyaz_basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `acid_products`
--

CREATE TABLE `acid_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acid_products`
--

INSERT INTO `acid_products` (`id`, `product_name`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Sulphuric Acid', 1055, NULL, '2023-03-28 00:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chalan` int(11) DEFAULT NULL,
  `alluser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense` int(11) DEFAULT NULL,
  `hr` int(11) DEFAULT NULL,
  `adminuserrole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `category`, `product`, `customer`, `bank`, `site`, `production`, `report`, `sale`, `chalan`, `alluser`, `expense`, `hr`, `adminuserrole`, `schedule`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-06-05 03:57:32', '$2y$10$ALbMmGnqCeBflP.JT8LWNu/swsmervF2UFssUBA3QKo52c6CrA9Ye', '01964870827', NULL, '1', '1', '1', '1', '1', '1', '1', 1, '1', 1, 1, '1', 1, 1, 'Up7ECETS3AgEo28KwGNLxJmdAx2LIaYGvIPWwM3oaw5fb1TVP5MGjTRRx4p1', NULL, '202207230834attachment_127807231.jfif', '2022-06-05 03:57:32', '2022-07-23 03:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `ac_name`, `ano_name`, `branch`, `balance`, `created_at`, `updated_at`) VALUES
(5, 'Payment', 'Shelby Mercado', '40', 'Eos sequi illo omni', 77, '2023-03-25 07:07:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(14, 'Chips', '2023-03-22 04:40:01', '2023-04-06 03:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `chalans`
--

CREATE TABLE `chalans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chalan_date` date NOT NULL,
  `chalan_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `rate` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `nbalance` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chalans`
--

INSERT INTO `chalans` (`id`, `customer_id`, `company`, `address`, `chalan_date`, `chalan_no`, `t_driver`, `t_no`, `qty`, `rate`, `total`, `nbalance`, `created_at`, `updated_at`) VALUES
(14, 647, 'Al Amin', 'Faridpur', '2023-03-28', 'RSA34888415', 'Al Amin', 'GHA-6721', 10, 3000, 30000, 270000, '2023-03-28 05:45:41', NULL),
(15, 649, 'Square', 'Dhaka', '2023-03-28', 'RSA42671968', NULL, NULL, 10, 2000, 20000, 180000, '2023-03-28 05:50:44', NULL),
(16, 646, 'Friends', 'Dhaka', '2023-03-28', 'RSA34798214', NULL, NULL, 10, 1000, 10000, 90000, '2023-03-28 05:50:57', NULL),
(17, 651, 'Hamid', 'Dhaka', '2023-03-28', 'RSA19346984', NULL, NULL, 10, 500, 5000, 45000, '2023-03-28 05:51:10', NULL),
(18, 650, 'Khadiza', 'Dhaka', '2023-03-28', 'RSA39691906', NULL, NULL, 10, 300, 3000, 27000, '2023-03-28 05:51:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dea_cus` int(11) DEFAULT NULL,
  `advance` float DEFAULT NULL,
  `delivery` float DEFAULT NULL,
  `due` float DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `rateType` varchar(255) DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `address`, `phone`, `email`, `dea_cus`, `advance`, `delivery`, `due`, `rate`, `rateType`, `balance`, `created_at`, `updated_at`) VALUES
(646, 'Friends Chemical', 'Dhaka', '1234567781', 'friends@chemical.com', 1, 100, 30, 70, 1000, 'FOB', 70000, '2023-04-12 06:20:27', '2023-04-12 00:20:27'),
(649, 'Ayesha Trading Corpor.', 'Dhaka', '12345678', 'ayesha@gmail.com', 1, 100, 10, 90, 2000, 'FOB', 180000, '2023-03-28 05:50:44', '2023-03-28 05:50:44'),
(650, 'Khadiza Enterprise', 'Dhaka', '12344576', 'khadiza@gmail.com', 1, 100, 10, 90, 300, 'FOB', 27000, '2023-03-28 05:51:33', '2023-03-28 05:51:33'),
(651, 'Hamid', 'Dhaka', '5432543524', 'hamid@gmail.com', 1, 205, 10, 195, 600, 'FOB', 87956, '2023-04-05 06:31:19', '2023-04-05 00:31:19'),
(652, 'Al Amin Chemicals', 'Dhaka', '12345678', 'alamin@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenseType_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expenseType_id`, `date`, `amount`, `details`, `created_at`, `updated_at`) VALUES
(1, 2, '2014-02-05', 29.00, 'Aut voluptatem Prae', '2023-03-29 04:09:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenseType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`id`, `expenseType`, `created_at`, `updated_at`) VALUES
(1, 'Fare', '2023-01-31 03:47:47', NULL),
(2, 'Rent', '2023-01-31 03:49:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_05_035221_create_sessions_table', 1),
(7, '2022_06_05_093510_create_admins_table', 2),
(8, '2022_06_08_050819_create_brands_table', 3),
(9, '2022_06_11_072712_create_sliders_table', 4),
(10, '2022_06_11_080003_create_sliders_table', 5),
(11, '2022_06_12_044009_create_categories_table', 6),
(12, '2022_06_12_044635_create_sub_categories_table', 6),
(13, '2022_06_12_101831_create_products_table', 7),
(14, '2022_06_12_102120_create_multi_imgs_table', 7),
(15, '2022_06_15_111136_create_carts_table', 8),
(16, '2022_06_18_051335_create_wishlists_table', 9),
(17, '2022_06_19_061429_create_coupons_table', 10),
(18, '2022_06_20_055345_create_ship_divisions_table', 11),
(19, '2022_06_20_082833_create_ship_districts_table', 12),
(20, '2022_06_21_050936_create_ship_states_table', 13),
(21, '2022_06_22_153813_create_shippings_table', 14),
(22, '2022_06_25_052407_create_oders_table', 14),
(23, '2022_06_25_075304_create_orders_table', 15),
(24, '2022_06_25_075738_create_order_items_table', 15),
(25, '2022_06_30_065319_create_site_settings_table', 16),
(26, '2022_06_30_110044_create_seos_table', 17),
(27, '2022_07_02_062717_create_reviews_table', 18),
(28, '2022_08_01_044732_create_locations_table', 19),
(29, '2022_12_17_142839_create_quotations_table', 20),
(30, '2022_12_18_071520_create_quotations_table', 21),
(31, '2022_12_18_083754_create_quotation_items_table', 22),
(32, '2022_12_21_072212_create_customers_table', 22),
(33, '2022_12_22_051900_create_quotation_items_table', 23),
(34, '2022_12_22_051908_create_quotations_table', 23),
(35, '2022_12_22_051920_create_customers_table', 23),
(36, '2022_12_22_062042_create_quotation_items_table', 24),
(37, '2023_01_10_060905_create_banks_table', 25),
(38, '2023_01_10_071658_create_suppliers_table', 26),
(39, '2023_01_10_111709_create_purchases_table', 27),
(40, '2023_01_10_111933_create_purchase_items_table', 27),
(41, '2023_01_10_114539_create_payment_items_table', 27),
(42, '2023_01_31_092320_create_expense_types_table', 28),
(43, '2023_01_31_095728_create_employees_table', 29),
(44, '2023_01_31_103138_create_designations_table', 29),
(45, '2023_02_25_093329_create_sulphur_stocks_table', 30),
(46, '2023_02_27_054051_create_productions_table', 31),
(47, '2023_02_27_092217_create_todays_productions_table', 32),
(48, '2023_03_01_052946_create_dealers_table', 33),
(49, '2023_03_01_091128_create_schedules_table', 34),
(50, '2023_03_02_094932_create_schedules_table', 35),
(51, '2023_03_02_113137_create_schedule_dates_table', 36),
(52, '2023_03_13_103924_create_sales_table', 36),
(53, '2023_03_13_103937_create_sales_items_table', 36),
(54, '2023_03_14_101450_create_sales_payment_items_table', 37),
(55, '2023_03_14_104021_create_acid_products_table', 38),
(56, '2023_03_15_085403_create_chalans_table', 39),
(57, '2023_03_22_061304_create_requisitions_table', 40),
(58, '2023_03_22_061552_create_requisition_types_table', 41),
(59, '2023_03_22_072837_create_requisitions_table', 42),
(60, '2023_03_29_095153_create_expenses_table', 43),
(61, '2023_04_08_054857_create_sites_table', 44);

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
-- Table structure for table `payment_items`
--

CREATE TABLE `payment_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `b_paid_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_items`
--

INSERT INTO `payment_items` (`id`, `purchase_id`, `bank_id`, `b_paid_amount`, `created_at`, `updated_at`) VALUES
(59, 66, 5, 12.00, '2023-03-27 10:48:23', '2023-03-27 10:48:23'),
(60, 67, 5, 50000.00, '2023-03-28 05:25:50', '2023-03-28 05:25:50'),
(61, 68, 5, 50000.00, '2023-03-28 05:26:24', '2023-03-28 05:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(12, 179, '1', '2023-03-27 10:53:10', '2023-03-27 10:53:10'),
(13, 179, '5', '2023-03-28 05:20:31', '2023-03-28 05:20:31'),
(14, 181, '100', '2023-03-28 05:37:46', '2023-03-28 05:37:46'),
(15, 181, '300', '2023-03-28 05:39:21', '2023-03-28 05:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `selling_price` int(255) DEFAULT NULL,
  `discount_price` int(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `selling_price`, `discount_price`, `status`, `qty`, `created_at`, `updated_at`) VALUES
(182, '14', 'Sulphur Pellet', 'SP', 300, 200, 1, 200, '2023-02-26 00:12:52', '2023-04-13 02:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `chalan_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `ldate` date DEFAULT NULL,
  `boen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `besb` date DEFAULT NULL,
  `boed` date DEFAULT NULL,
  `track` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` double(8,2) NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `purchase_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_flat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `chalan_no`, `purchase_date`, `ldate`, `boen`, `besb`, `boed`, `track`, `details`, `sub_total`, `grand_total`, `purchase_discount`, `discount_flat`, `total_vat`, `p_paid_amount`, `due_amount`, `status`, `created_at`, `updated_at`) VALUES
(66, 1, 'Velit libero velit', NULL, NULL, 'Qui ipsum voluptas', '2011-11-24', '1988-06-25', 'Labore ab Nam ipsum', '1970-01-19', 1472.00, 1461.00, NULL, '11', NULL, '12', '1449', 'Reached Factory', '2023-03-27 10:48:23', '2023-03-27 10:50:47'),
(67, 2, '123', NULL, NULL, '567', '2023-03-31', '2023-03-30', '1234', '2023-03-30', 50000.00, 50000.00, NULL, NULL, NULL, '50000', '0', 'Reached Factory', '2023-03-28 05:25:50', '2023-03-28 05:36:17'),
(68, 2, '45', NULL, NULL, '653', '2023-03-28', '2023-03-28', '32', '2023-03-28', 50000.00, 50000.00, NULL, NULL, NULL, '50000', '0', 'Reached Factory', '2023-03-28 05:26:24', '2023-03-28 05:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double(8,2) NOT NULL,
  `rateType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_id`, `product_id`, `qty`, `batch_no`, `rate`, `rateType`, `amount`, `created_at`, `updated_at`) VALUES
(75, 66, 179, 92, 'Sit velit quo qui a', 16.00, 'FOB', 1472.00, '2023-03-27 10:48:23', '2023-03-27 10:48:23'),
(76, 67, 181, 500, '45', 100.00, 'FOB', 50000.00, '2023-03-28 05:25:50', '2023-03-28 05:25:50'),
(77, 68, 181, 500, '42', 100.00, 'FOB', 50000.00, '2023-03-28 05:26:24', '2023-03-28 05:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `auth_id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quotation_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `sub_total` double(8,2) NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `discount_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_flat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `total_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_items`
--

CREATE TABLE `quotation_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requisitions`
--

CREATE TABLE `requisitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requisitionType_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisitions`
--

INSERT INTO `requisitions` (`id`, `requisitionType_id`, `date`, `amount`, `status`, `details`, `created_at`, `updated_at`) VALUES
(3, 4, '2023-03-28', 50000.00, 'Unpaid', 'SS 316 10 MM,  8 feet / 4 feet', '2023-03-28 05:19:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requisition_types`
--

CREATE TABLE `requisition_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requisitionType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisition_types`
--

INSERT INTO `requisition_types` (`id`, `requisitionType`, `created_at`, `updated_at`) VALUES
(2, 'Water Pump', '2023-03-28 05:14:52', NULL),
(3, 'Shaft', '2023-03-28 05:15:01', NULL),
(4, 'Metal Sheet', '2023-03-28 05:15:08', NULL),
(5, 'Almirah', '2023-03-28 05:16:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` date NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` bigint(20) NOT NULL,
  `grand_total` bigint(20) NOT NULL,
  `discount_flat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_per` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `sale_date`, `invoice`, `details`, `sub_total`, `grand_total`, `discount_flat`, `discount_per`, `total_vat`, `p_paid_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(55, 646, '1984-11-23', 'INV88658395', 'Necessitatibus quis', 40000, 40000, '39', NULL, NULL, '20', '39980', '2023-04-13 01:04:20', NULL),
(56, 649, '1970-02-22', 'INV30363003', 'Deserunt aliquid ut', 8000, 8000, '96', NULL, NULL, '24', '7976', '2023-04-13 01:46:50', NULL),
(57, 648, '1983-12-05', 'INV85521264', 'Eveniet culpa velit', 2000, 2000, '97', NULL, NULL, '11', '1989', '2023-04-13 02:10:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double(8,2) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`id`, `sale_id`, `product_id`, `qty`, `rate`, `amount`, `created_at`, `updated_at`) VALUES
(51, 55, 182, '200', 200.00, 40000, '2023-04-13 01:04:20', '2023-04-13 01:04:20'),
(52, 56, 182, '20', 200.00, 4000, '2023-04-13 01:46:50', '2023-04-13 01:46:50'),
(53, 56, 182, '20', 200.00, 4000, '2023-04-13 01:46:50', '2023-04-13 01:46:50'),
(54, 57, 182, '10', 200.00, 2000, '2023-04-13 02:10:22', '2023-04-13 02:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `sales_payment_items`
--

CREATE TABLE `sales_payment_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `b_paid_amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_payment_items`
--

INSERT INTO `sales_payment_items` (`id`, `sale_id`, `bank_id`, `b_paid_amount`, `created_at`, `updated_at`) VALUES
(37, 55, 5, 20, '2023-04-13 01:04:20', '2023-04-13 01:04:20'),
(38, 56, 5, 24, '2023-04-13 01:46:50', '2023-04-13 01:46:50'),
(39, 57, 5, 11, '2023-04-13 02:10:22', '2023-04-13 02:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_date` date DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `schedule_date`, `customer_id`, `qty`, `stock`, `time`, `created_at`, `updated_at`) VALUES
(34, '2023-03-28', 647, 10, 1125, '17:40:00', '2023-03-28 05:47:36', '2023-03-28 05:47:36'),
(35, '2023-03-28', 650, 10, 1125, '11:51:00', '2023-03-28 05:52:32', '2023-03-28 05:52:32'),
(36, '2023-03-28', 646, 10, 1125, '13:56:00', '2023-03-28 05:52:32', '2023-03-28 05:52:32'),
(37, '2023-03-28', 651, 10, 1125, '14:56:00', '2023-03-28 05:52:32', '2023-03-28 05:52:32'),
(38, '2023-03-28', 649, 10, 1125, '16:00:00', '2023-03-28 05:52:32', '2023-03-28 05:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('vGsvCgWcHdofP3goFHi9JlXJ5EKmN6qbrQRqiD23', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVUFNS0VFbW5POVpnUDZTZzgwRm9aOU82bU1EWUVaTWRJNHlKMGhvMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0L21hbmFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE5OiJwYXNzd29yZF9oYXNoX2FkbWluIjtzOjYwOiIkMnkkMTAkQUxiTW1HbnFDZUJmbFAuSlQ4TFdOdS9zd3NtZXJ2RjJVRnNzVUJBM1FLbzUyYzZDckE5WWUiO30=', 1681552848);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watermark` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`, `address`, `phone`, `email`, `logo`, `watermark`, `created_at`, `updated_at`) VALUES
(1, 'Dyaz basics', 'as', '9829821', 'dah2@gmail.com', 'upload/logo/1763227622713771.jpg', 'upload/logo/1762946018085904.png', '2023-04-08 04:21:53', '2023-04-15 01:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subTitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startingPrice` int(11) DEFAULT NULL,
  `slideStyle` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `address`, `mobile`, `email_address`, `phone`, `city`, `state`, `zip`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Tashya Oneal', 'Aut ex omnis illum', '19', 'tajakoci@mailinator.com', '66', 'Non dolor omnis ut s', 'Lorem nisi quis quas', '68540', NULL, '2023-01-10 03:14:10', NULL),
(2, 'Dubai Chemicals', 'Dubai, UAE', '3873821314', 'dubai@chemicals.com', NULL, 'Dubai', 'Dubai', '1234', NULL, '2023-03-28 05:00:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `todays_productions`
--

CREATE TABLE `todays_productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todays_productions`
--

INSERT INTO `todays_productions` (`id`, `product`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'Sulphuric Acid', '0', '2023-02-27 03:43:52', '2023-02-27 03:43:52'),
(7, 'Sulphuric Acid', '2', '2023-03-27 10:55:12', '2023-03-27 10:55:12'),
(8, 'Sulphuric Acid', '3', '2023-03-28 05:21:10', '2023-03-28 05:21:10'),
(9, 'Sulphuric Acid', '280', '2023-03-28 05:38:49', '2023-03-28 05:38:49'),
(10, 'Sulphuric Acid', '840', '2023-03-28 05:39:43', '2023-03-28 05:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acid_products`
--
ALTER TABLE `acid_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chalans`
--
ALTER TABLE `chalans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_items`
--
ALTER TABLE `payment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_items_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_items_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_items_quotation_id_foreign` (`quotation_id`);

--
-- Indexes for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_types`
--
ALTER TABLE `requisition_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_items_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `sales_payment_items`
--
ALTER TABLE `sales_payment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_payment_items_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sites_email_unique` (`email`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todays_productions`
--
ALTER TABLE `todays_productions`
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
-- AUTO_INCREMENT for table `acid_products`
--
ALTER TABLE `acid_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chalans`
--
ALTER TABLE `chalans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=653;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `payment_items`
--
ALTER TABLE `payment_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `quotation_items`
--
ALTER TABLE `quotation_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requisition_types`
--
ALTER TABLE `requisition_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sales_payment_items`
--
ALTER TABLE `sales_payment_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `todays_productions`
--
ALTER TABLE `todays_productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_items`
--
ALTER TABLE `payment_items`
  ADD CONSTRAINT `payment_items_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_items_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD CONSTRAINT `quotation_items_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD CONSTRAINT `sales_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_payment_items`
--
ALTER TABLE `sales_payment_items`
  ADD CONSTRAINT `sales_payment_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
