-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 10:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `offside`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_address` varchar(255) NOT NULL,
  `branch_phone` varchar(11) NOT NULL,
  `branch_manger` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `branch_address`, `branch_phone`, `branch_manger`, `created_at`, `updated_at`) VALUES
(1, 'فرع بوكلى', 'بوكلى', '01229759659', 'كريم دياب', '2024-02-26 23:05:36', '2024-02-26 23:05:36'),
(2, 'فرع جمال عبد الناصر', 'ش جمال عبدالناصر', '01558056772', 'دياب', '2024-02-26 23:05:36', '2024-02-26 23:05:36'),
(5, 'dasdasda', 'dsadsadas', '2121212121', 'karim', '2024-02-26 22:06:41', '2024-02-26 22:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `branches_details`
--

CREATE TABLE `branches_details` (
  `branche_details_id` int(10) NOT NULL,
  `branche_id` int(10) NOT NULL,
  `warehouse_id` int(10) NOT NULL,
  `products_id` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `branches_details`
--

INSERT INTO `branches_details` (`branche_details_id`, `branche_id`, `warehouse_id`, `products_id`, `Quantity`, `Created_at`, `Updated_at`) VALUES
(1, 1, 32, 1, 31, '2024-02-21 20:50:38', '2024-02-25 18:42:27'),
(2, 1, 32, 4, 3, '2024-02-21 20:50:38', '2024-02-21 20:50:38'),
(3, 2, 33, 4, 6, '2024-02-21 20:50:38', '2024-02-21 20:50:38'),
(4, 1, 34, 4, 6, '2024-02-21 20:50:38', '2024-02-21 20:50:38'),
(5, 2, 34, 1, 5, '2024-02-21 20:50:38', '2024-02-21 20:50:38'),
(6, 2, 34, 4, 4, '2024-02-21 20:50:38', '2024-02-21 20:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `branche_warehouse`
--

CREATE TABLE `branche_warehouse` (
  `branches_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `branche_warehouse`
--

INSERT INTO `branche_warehouse` (`branches_id`, `warehouse_id`) VALUES
(5, 32),
(5, 33),
(5, 37);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone_number` varchar(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

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
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `main_category_id` int(11) NOT NULL,
  `main_category_name` varchar(255) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`main_category_id`, `main_category_name`, `description`) VALUES
(1, 'چاكيت', 'adsafdafgsdgsd gsfg sfdhsgdhsdh'),
(2, 'كوتشي', 'gfd gfdhgdhsfgjfhdg hsfg sf sfj gfsj sfhj fj sf'),
(3, 'بنطلون', 'يشسيشسي سش يبسشب ش '),
(4, 'تيشرت', 'سيب يب سلس ليباسلاسيا');

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
(5, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `sub_category_1_id` int(11) NOT NULL,
  `sub_category_2_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `main_category_id`, `sub_category_1_id`, `sub_category_2_id`, `price`, `quantity_in_stock`, `product_description`, `created_at`, `updated_at`) VALUES
(1, 'چاكيت جلد حريمي', 1, 1, 4, 500.00, 5, 'يشيسشيسشيش', '2024-02-27 23:18:48', '2024-02-27 23:18:48'),
(2, 'چاكيت جلد رجالي', 1, 1, 5, 400.00, 3, 'بلىابلبلا', '2024-02-27 23:18:48', '2024-02-27 23:18:48'),
(3, 'چاكيت وتربروف رجالي', 1, 2, 5, 350.00, 3, 'لايابل', '2024-02-27 23:18:48', '2024-02-27 23:18:48'),
(4, 'چاكيت وتربروف حريمي', 1, 1, 4, 600.00, 2, 'بييسبسيشلdsadsad1212we21', '2024-02-27 23:18:48', '2024-02-27 22:39:01'),
(5, 'بنطلون سويت بانس رجالي', 3, 4, 5, 500.00, 6, 'سويت بانس رجالي تركي الخامة', '2024-02-27 21:18:55', '2024-02-27 21:18:55'),
(6, 'dasdasd', 1, 1, 4, 31.00, 112, 'fsdaf dsf sdfsd fsd fwdgwr', '2024-03-01 15:41:14', '2024-03-01 15:41:14'),
(7, 'fsafaf', 1, 2, 5, 21.00, 4444, 'fdgfdg s', '2024-03-01 15:42:07', '2024-03-01 15:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoices`
--

CREATE TABLE `purchase_invoices` (
  `invoice_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `purchase_invoices_note` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `purchase_invoices`
--

INSERT INTO `purchase_invoices` (`invoice_id`, `invoice_date`, `supplier_id`, `total_amount`, `purchase_invoices_note`, `created_at`, `updated_at`) VALUES
(3, '2024-02-06', 2, 121.00, 'ddf', '2024-02-25 17:57:01', '2024-02-25 17:57:01'),
(43, '2024-02-06', 2, 121.00, 'ddf', '2024-02-25 17:58:22', '2024-02-25 17:58:22'),
(76, '2024-02-07', 1, 567.00, '76', '2024-02-25 18:37:33', '2024-02-25 18:37:33'),
(99, '2024-01-30', 2, 32.00, 'dsv', '2024-02-25 17:54:54', '2024-02-25 17:54:54'),
(147, '2024-02-06', 2, 45.00, '4545', '2024-02-25 18:21:46', '2024-02-25 18:21:46'),
(576, '2024-02-07', 1, 567.00, '76', '2024-02-25 18:42:27', '2024-02-25 18:42:27'),
(964, '2024-02-05', 1, 2121.00, 'ssd', '2024-02-25 18:00:06', '2024-02-25 18:00:06'),
(987, '2024-02-06', 2, 45.00, '4545', '2024-02-25 18:06:34', '2024-02-25 18:06:34'),
(1323, '2024-01-30', 2, 32.00, 'dsv', '2024-02-25 17:52:41', '2024-02-25 17:52:41'),
(2147, '2024-02-06', 2, 45.00, '4545', '2024-02-25 18:26:49', '2024-02-25 18:26:49'),
(2345, '2024-01-30', 1, 22.00, '221', '2024-02-25 18:04:07', '2024-02-25 18:04:07'),
(2656, '2024-02-01', 1, 56.00, 'jhgjgh', '2024-02-25 17:49:14', '2024-02-25 17:49:14'),
(5000, '2024-02-07', 1, 2121.00, 'ssadf', '2024-02-23 19:39:32', '2024-02-23 19:39:32'),
(5267, '2024-02-06', 2, 45.00, '4545', '2024-02-25 18:17:17', '2024-02-25 18:17:17'),
(6000, '2024-02-16', 1, 90000.00, 'ttrtrtr', '2024-02-24 10:21:57', '2024-02-24 10:21:57'),
(6666, '2024-02-01', 1, 56.00, 'jhgjgh', '2024-02-25 17:38:59', '2024-02-25 17:38:59'),
(7678, '2024-02-16', 1, 323.00, 'fddfsd', '2024-02-25 17:31:31', '2024-02-25 17:31:31'),
(9264, '2024-02-05', 1, 2121.00, 'ssd', '2024-02-25 18:00:52', '2024-02-25 18:00:52'),
(9857, '2024-02-06', 2, 45.00, '4545', '2024-02-25 18:10:22', '2024-02-25 18:10:22'),
(11111, '2024-01-30', 1, 21212121.00, 'dsada', '2024-02-24 10:29:56', '2024-02-24 10:29:56'),
(26576, '2024-02-01', 1, 56.00, 'jhgjgh', '2024-02-25 17:48:28', '2024-02-25 17:48:28'),
(65768, '2024-02-01', 1, 56.00, 'jhgjgh', '2024-02-25 17:37:38', '2024-02-25 17:37:38'),
(66566, '2024-02-01', 1, 56.00, 'jhgjgh', '2024-02-25 17:43:41', '2024-02-25 17:43:41'),
(66576, '2024-02-01', 1, 56.00, 'jhgjgh', '2024-02-25 17:45:46', '2024-02-25 17:45:46'),
(66766, '2024-02-01', 1, 56.00, 'jhgjgh', '2024-02-25 17:40:43', '2024-02-25 17:40:43'),
(69633, '2024-01-31', 1, 12112121.00, 'dsadas', '2024-02-24 11:04:13', '2024-02-24 11:04:13'),
(91264, '2024-02-05', 1, 2121.00, 'ssd', '2024-02-25 18:02:37', '2024-02-25 18:02:37'),
(98257, '2024-02-06', 2, 45.00, '4545', '2024-02-25 18:11:29', '2024-02-25 18:11:29'),
(132313, '2024-01-31', 2, 21312.00, 'vbgnfnfgn', '2024-02-25 17:30:21', '2024-02-25 17:30:21'),
(212111, '2024-02-16', 1, 2121.00, 'sdad', '2024-02-24 10:38:06', '2024-02-24 10:38:06'),
(595996, '2024-02-14', 1, 2121.00, 'sdsaf', '2024-02-25 17:35:31', '2024-02-25 17:35:31'),
(982657, '2024-02-06', 2, 45.00, '4545', '2024-02-25 18:14:54', '2024-02-25 18:14:54'),
(999999, '2024-01-30', 1, 65151.00, 'vbnvnbv', '2024-02-24 11:02:39', '2024-02-24 11:02:39'),
(4324134, '2024-02-23', 1, 13132323.00, 'gsdgsd', '2024-02-25 17:28:08', '2024-02-25 17:28:08'),
(6556768, '2024-02-01', 1, 56.00, 'jhgjgh', '2024-02-25 17:38:31', '2024-02-25 17:38:31'),
(9852657, '2024-02-06', 2, 45.00, '4545', '2024-02-25 18:16:13', '2024-02-25 18:16:13'),
(9898989, '2024-02-14', 1, 221.00, 'sasa', '2024-02-24 11:06:40', '2024-02-24 11:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice_details`
--

CREATE TABLE `purchase_invoice_details` (
  `detail_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `purchase_invoice_details`
--

INSERT INTO `purchase_invoice_details` (`detail_id`, `invoice_id`, `product_id`, `quantity`, `purchase_price`, `total_price`, `created_at`, `updated_at`) VALUES
(11, 5000, 1, 50, 300.00, 15000.00, '2024-02-23 19:39:32', '2024-02-23 19:39:32'),
(18, 6000, 1, 62, 30.00, 1860.00, '2024-02-24 10:21:57', '2024-02-24 10:21:57'),
(24, 999999, 1, 3, 50.00, 150.00, '2024-02-24 11:02:39', '2024-02-24 11:02:39'),
(25, 69633, 1, 5, 30.00, 150.00, '2024-02-24 11:04:13', '2024-02-24 11:04:13'),
(26, 9898989, 1, 30, 30000.00, 900000.00, '2024-02-24 11:06:40', '2024-02-24 11:06:40'),
(27, 4324134, 1, 20, 2121.00, 42420.00, '2024-02-25 17:28:08', '2024-02-25 17:28:08'),
(28, 132313, 1, 30, 4234.00, 127020.00, '2024-02-25 17:30:21', '2024-02-25 17:30:21'),
(29, 7678, 1, 20, 23.00, 460.00, '2024-02-25 17:31:31', '2024-02-25 17:31:31'),
(30, 595996, 1, 20, 32.00, 640.00, '2024-02-25 17:35:31', '2024-02-25 17:35:31'),
(47, 9852657, 1, 20, 5.00, 100.00, '2024-02-25 18:16:13', '2024-02-25 18:16:13'),
(48, 5267, 1, 20, 5.00, 100.00, '2024-02-25 18:17:18', '2024-02-25 18:17:18'),
(49, 147, 1, 20, 5.00, 100.00, '2024-02-25 18:21:46', '2024-02-25 18:21:46'),
(50, 2147, 1, 20, 5.00, 100.00, '2024-02-25 18:26:49', '2024-02-25 18:26:49'),
(51, 76, 1, 11, 20.00, 220.00, '2024-02-25 18:37:33', '2024-02-25 18:37:33'),
(52, 576, 1, 11, 20.00, 220.00, '2024-02-25 18:42:27', '2024-02-25 18:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices`
--

CREATE TABLE `sales_invoices` (
  `invoice_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoice_details`
--

CREATE TABLE `sales_invoice_details` (
  `detail_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories1`
--

CREATE TABLE `sub_categories1` (
  `sub_category_1_id` int(11) NOT NULL,
  `sub_category_name_1` varchar(255) NOT NULL,
  `main_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `sub_categories1`
--

INSERT INTO `sub_categories1` (`sub_category_1_id`, `sub_category_name_1`, `main_category_id`) VALUES
(1, 'جلد', 1),
(2, 'وتر بروف', 1),
(3, 'حريمي', 2),
(4, 'رجالي', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories2`
--

CREATE TABLE `sub_categories2` (
  `sub_category_2_id` int(11) NOT NULL,
  `sub_category_name_2` varchar(255) NOT NULL,
  `sub_category_1_id` int(2) NOT NULL,
  `main_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `sub_categories2`
--

INSERT INTO `sub_categories2` (`sub_category_2_id`, `sub_category_name_2`, `sub_category_1_id`, `main_category_id`) VALUES
(4, 'حريمي', 1, 1),
(5, 'رجالي', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_address` varchar(255) NOT NULL,
  `supplier_phone_number` varchar(20) DEFAULT NULL,
  `supplier_email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_phone_number`, `supplier_email`, `created_at`, `updated_at`) VALUES
(1, 'karim', 'asdsafsaf', NULL, 'fsddda@fsafas.das', '2024-02-19 10:47:23', '2024-02-19 10:47:23'),
(2, 'adsdas', '16516516', NULL, 'fsddda@fsafas.das', '2024-02-19 10:48:10', '2024-02-19 10:48:10'),
(5, 'karim', 'asdsafsaf', '01251515', 'diab@diab.diab', '2024-02-20 17:28:31', '2024-02-20 17:28:31'),
(6, 'karim', '16516516', '16516516', 'diab@diab.diab', '2024-02-20 17:29:26', '2024-02-20 17:29:26'),
(7, 'fasfas', 'fdaf', '231323', 'fsddda@fsafas.das', '2024-02-23 17:13:12', '2024-02-23 17:13:12'),
(8, 'fsa', '13ad', '1221', 'diab@diab.diab', '2024-02-23 17:14:02', '2024-02-23 17:14:02'),
(10, 'karim mohamed diab', 'miami', '01558056772', 'diab@diab.diab', '2024-02-25 21:46:57', '2024-02-26 17:05:39'),
(11, '232323dadsad', 'sdac23cwd243', '01229759659', 'fsddda@fsafas.das', '2024-02-26 18:34:36', '2024-02-26 18:34:36'),
(12, '434343sadadsad32323', '%%', '01229759659', 'fsddda@fsafas.das', '2024-02-26 18:45:43', '2024-02-26 18:45:43');

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
(1, 'kimo', 'karim@karim.com', NULL, '$2y$12$EEhSkFv50cuqe1bckbOL/OxN8VTCJJ9e2KWuhHOVoRC6SDOedApB.', 'FB7JHuOQdD7aPkO7SXwsRBIKdEEYPTtJO58sopYpZ66xBigy8XpJ78Fec9Wp', '2024-02-18 17:46:21', '2024-02-18 17:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `warehouse_id` int(11) NOT NULL,
  `warehouse_name` varchar(255) NOT NULL,
  `warehouse_address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`warehouse_id`, `warehouse_name`, `warehouse_address`, `created_at`, `updated_at`) VALUES
(32, 'مخزن رئيسي 1', 'عبد الناصر', '2024-02-20 22:00:00', '2024-02-20 22:00:00'),
(33, 'مخزن رئيسي 2', 'البحر', '2024-02-20 22:00:00', '2024-02-20 22:00:00'),
(34, 'مخزن رئيسي 3 ', 'بوكلى', '2024-02-20 22:00:00', '2024-02-20 22:00:00'),
(35, 'مخزن رئيسي 4', 'العصافرة', '2024-02-26 19:21:38', '2024-02-26 19:47:17'),
(36, 'ffdfdfd', 'fsafaf', '2024-02-26 19:22:05', '2024-02-26 19:22:05'),
(37, 'dadasdsa', '2121', '2024-02-26 19:22:13', '2024-02-26 19:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses_details`
--

CREATE TABLE `warehouses_details` (
  `id` int(10) NOT NULL,
  `warehouse_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `products_id` int(10) NOT NULL,
  `Quantity` int(10) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `warehouses_details`
--

INSERT INTO `warehouses_details` (`id`, `warehouse_id`, `branch_id`, `products_id`, `Quantity`, `Created_at`, `Updated_at`) VALUES
(1, 32, 1, 1, 60, '2024-02-21 20:49:11', '2024-02-25 18:26:49'),
(2, 32, 1, 2, 3, '2024-02-21 20:49:11', '2024-02-21 20:49:11'),
(3, 32, 1, 4, 6, '2024-02-21 20:49:11', '2024-02-21 20:49:11'),
(4, 33, 2, 2, 6, '2024-02-21 20:49:11', '2024-02-21 20:49:11'),
(5, 34, 2, 4, 3, '2024-02-21 20:49:11', '2024-02-21 20:49:11'),
(6, 33, 1, 3, 2, '2024-02-21 20:49:11', '2024-02-21 20:49:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `branches_details`
--
ALTER TABLE `branches_details`
  ADD PRIMARY KEY (`branche_details_id`),
  ADD KEY `branche_id` (`branche_id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `branche_warehouse`
--
ALTER TABLE `branche_warehouse`
  ADD PRIMARY KEY (`branches_id`,`warehouse_id`),
  ADD KEY `warehouse_id` (`warehouse_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`main_category_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `main_category_id` (`main_category_id`),
  ADD KEY `sub_category_1_id` (`sub_category_1_id`),
  ADD KEY `sub_category_2_id` (`sub_category_2_id`);

--
-- Indexes for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `purchase_invoice_details`
--
ALTER TABLE `purchase_invoice_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `sales_invoice_details`
--
ALTER TABLE `sales_invoice_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sub_categories1`
--
ALTER TABLE `sub_categories1`
  ADD PRIMARY KEY (`sub_category_1_id`),
  ADD KEY `main_category_id` (`main_category_id`);

--
-- Indexes for table `sub_categories2`
--
ALTER TABLE `sub_categories2`
  ADD PRIMARY KEY (`sub_category_2_id`),
  ADD KEY `main_category_id` (`main_category_id`),
  ADD KEY `sub_category_1_id` (`sub_category_1_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- Indexes for table `warehouses_details`
--
ALTER TABLE `warehouses_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_id` (`warehouse_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `products_id` (`products_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branches_details`
--
ALTER TABLE `branches_details`
  MODIFY `branche_details_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `main_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_invoice_details`
--
ALTER TABLE `purchase_invoice_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_invoice_details`
--
ALTER TABLE `sales_invoice_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories1`
--
ALTER TABLE `sub_categories1`
  MODIFY `sub_category_1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories2`
--
ALTER TABLE `sub_categories2`
  MODIFY `sub_category_2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `warehouses_details`
--
ALTER TABLE `warehouses_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches_details`
--
ALTER TABLE `branches_details`
  ADD CONSTRAINT `branches_details_ibfk_1` FOREIGN KEY (`branche_id`) REFERENCES `branches` (`branch_id`),
  ADD CONSTRAINT `branches_details_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`warehouse_id`),
  ADD CONSTRAINT `branches_details_ibfk_3` FOREIGN KEY (`products_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `branche_warehouse`
--
ALTER TABLE `branche_warehouse`
  ADD CONSTRAINT `branche_warehouse_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`warehouse_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branche_warehouse_ibfk_2` FOREIGN KEY (`branches_id`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`main_category_id`) REFERENCES `main_categories` (`main_category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`sub_category_1_id`) REFERENCES `sub_categories1` (`sub_category_1_id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`sub_category_2_id`) REFERENCES `sub_categories2` (`sub_category_2_id`);

--
-- Constraints for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  ADD CONSTRAINT `purchase_invoices_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`);

--
-- Constraints for table `purchase_invoice_details`
--
ALTER TABLE `purchase_invoice_details`
  ADD CONSTRAINT `purchase_invoice_details_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `purchase_invoices` (`invoice_id`),
  ADD CONSTRAINT `purchase_invoice_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  ADD CONSTRAINT `sales_invoices_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`),
  ADD CONSTRAINT `sales_invoices_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `sales_invoice_details`
--
ALTER TABLE `sales_invoice_details`
  ADD CONSTRAINT `sales_invoice_details_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `sales_invoices` (`invoice_id`),
  ADD CONSTRAINT `sales_invoice_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `sub_categories1`
--
ALTER TABLE `sub_categories1`
  ADD CONSTRAINT `sub_categories1_ibfk_1` FOREIGN KEY (`main_category_id`) REFERENCES `main_categories` (`main_category_id`);

--
-- Constraints for table `sub_categories2`
--
ALTER TABLE `sub_categories2`
  ADD CONSTRAINT `sub_categories2_ibfk_1` FOREIGN KEY (`sub_category_1_id`) REFERENCES `sub_categories1` (`sub_category_1_id`),
  ADD CONSTRAINT `sub_categories2_ibfk_2` FOREIGN KEY (`main_category_id`) REFERENCES `main_categories` (`main_category_id`);

--
-- Constraints for table `warehouses_details`
--
ALTER TABLE `warehouses_details`
  ADD CONSTRAINT `warehouses_details_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`),
  ADD CONSTRAINT `warehouses_details_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `warehouses_details_ibfk_3` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`warehouse_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
