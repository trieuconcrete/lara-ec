-- -------------------------------------------------------------
-- TablePlus 5.3.0(486)
--
-- https://tableplus.com/
--
-- Database: shop_laravel_db
-- Generation Time: 0005-03-07 15:14:30.0930
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_color_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_color_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` mediumtext COLLATE utf8mb4_unicode_ci,
  `billing_address2` mediumtext COLLATE utf8mb4_unicode_ci,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `product_colors`;
CREATE TABLE `product_colors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `color_id` bigint unsigned DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `sizes` json DEFAULT NULL,
  `options` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_colors_product_id_foreign` (`product_id`),
  KEY `product_colors_color_id_foreign` (`color_id`),
  CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `brand_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `original_price` int DEFAULT NULL,
  `selling_price` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `trending` tinyint DEFAULT '0' COMMENT '0=not-trending,1=trending',
  `status` tinyint DEFAULT '0' COMMENT '0=hidden,1=publish',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sale_off` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10029 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_md` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_sm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contents` json DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0:hidden, 1:visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` tinyint NOT NULL DEFAULT '0' COMMENT '0=client,1=member',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `description`, `address`, `website`, `phone`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Brand 1', 'brand-1', 1, NULL, NULL, NULL, NULL, 'uploads/brand/1677654297.png', '2023-02-19 02:44:58', '2023-03-01 07:06:28'),
(3, 'Brand 2', 'brand-2', 1, NULL, NULL, NULL, NULL, 'uploads/brand/1677654304.png', '2023-02-19 02:45:25', '2023-03-01 07:06:23'),
(4, 'Brand 3', 'brand-3', 1, NULL, NULL, NULL, NULL, 'uploads/brand/1677654311.png', '2023-02-19 02:45:51', '2023-03-01 07:06:16'),
(5, 'Brand 4', 'brand-4', 1, NULL, NULL, NULL, NULL, 'uploads/brand/1677654327.png', '2023-02-19 02:46:35', '2023-03-01 07:05:27'),
(25, 'Brand 5', 'brand-5', 1, NULL, NULL, NULL, NULL, 'uploads/brand/1677654339.png', '2023-02-25 03:00:23', '2023-03-01 07:05:39'),
(26, 'Brand 6', 'brand-6', 1, NULL, NULL, NULL, NULL, 'uploads/brand/1677654352.png', '2023-03-01 07:05:52', '2023-03-01 07:05:52');

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(24, 2, 10017, NULL, 1, '2023-03-06 14:59:47', '2023-03-06 14:59:47'),
(25, 2, 10024, NULL, 1, '2023-03-07 04:44:03', '2023-03-07 04:44:03'),
(26, 2, 10023, NULL, 1, '2023-03-07 06:01:44', '2023-03-07 06:01:44');

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Pillowcase', 'pillowcase', NULL, 'Pillowcase', 'uploads/category/1677654452-2rCDq.jpeg', NULL, NULL, NULL, 1, '2023-02-18 07:53:46', '2023-03-01 07:07:32'),
(4, 'Jumpsuits', 'jumpsuits', NULL, 'Jumpsuits', 'uploads/category/1677654491-ElbuM.jpeg', 'This is the Jumpsuits', 'This is the Jumpsuits', 'This is the Jumpsuits', 1, '2023-02-22 08:05:13', '2023-03-01 07:08:11'),
(6, 'Hats', 'hats', NULL, 'Hats', 'uploads/category/1677654549-cJKS2.jpeg', NULL, NULL, NULL, 1, '2023-02-24 03:20:40', '2023-03-01 07:09:09'),
(7, 'T-Shirt', 't-shirt', NULL, NULL, 'uploads/category/1677654618-UG1yF.jpeg', 'T-Shirt', 'T-Shirt', 'T-Shirt', 1, '2023-02-24 14:31:01', '2023-03-01 07:10:18'),
(9, 'Bags', 'bags', NULL, 'Bags', 'uploads/category/1677654654-C687C.jpeg', 'Bags', 'Bags', 'Bags', 1, '2023-03-01 07:10:54', '2023-03-01 07:11:03'),
(10, 'Sandan', 'sandan', NULL, 'Sandan', 'uploads/category/1677654689-LHsJn.jpeg', NULL, NULL, NULL, 1, '2023-03-01 07:11:29', '2023-03-01 07:11:29'),
(11, 'Scarf Cap', 'scarf-cap', NULL, 'Scarf Cap', 'uploads/category/1677654784-EbxDR.jpeg', NULL, NULL, NULL, 1, '2023-03-01 07:13:04', '2023-03-01 07:13:04'),
(12, 'Shoes', 'shoes', NULL, 'Shoes', 'uploads/category/1677654806-0E9Gr.jpeg', NULL, NULL, NULL, 1, '2023-03-01 07:13:26', '2023-03-01 07:13:26');

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Blue', 'blue', 1, '2023-02-25 04:20:43', '2023-03-01 07:16:11'),
(4, 'Green', 'green', 1, '2023-02-25 08:26:41', '2023-03-01 07:15:57'),
(5, 'Red', 'red', 1, '2023-02-25 08:26:49', '2023-02-25 08:26:49'),
(6, 'White', 'white', 1, '2023-03-01 07:16:23', '2023-03-01 07:16:23'),
(7, 'Yellow', 'yellow', 1, '2023-03-01 07:16:48', '2023-03-01 07:16:48'),
(8, 'Purple', 'purple', 1, '2023-03-01 07:17:09', '2023-03-01 07:17:09'),
(9, 'Orange', 'orange', 1, '2023-03-01 07:17:31', '2023-03-01 07:17:31');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_11_030051_add_details_to_users_table', 2),
(7, '2023_02_11_042320_create_categories_table', 3),
(8, '2023_02_18_082528_create_brands_table', 4),
(11, '2023_02_19_040924_create_products_table', 5),
(12, '2023_02_19_041753_create_product_images_table', 5),
(13, '2023_02_25_024322_create_colors_table', 6),
(15, '2023_02_25_044639_create_product_colors_table', 7),
(16, '2023_02_26_013950_create_sliders_table', 8),
(17, '2023_03_03_043907_add_column_sale_off_to_products_table', 9),
(18, '2023_03_04_064749_create_wishlists_table', 10),
(19, '2023_03_05_081437_create_carts_table', 11),
(20, '2023_03_06_035636_create_orders_table', 12),
(21, '2023_03_06_040331_create_order_items_table', 12);

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(10, 11, 10027, NULL, 2, 239.00, '2023-03-06 07:46:13', '2023-03-06 07:46:13'),
(11, 11, 10021, NULL, 1, 339.00, '2023-03-06 07:46:13', '2023-03-06 07:46:13'),
(12, 11, 10022, NULL, 1, 139.00, '2023-03-06 07:46:13', '2023-03-06 07:46:13'),
(13, 12, 10015, NULL, 1, 240.00, '2023-03-06 08:14:00', '2023-03-06 08:14:00'),
(14, 12, 10023, NULL, 1, 239.00, '2023-03-06 08:14:00', '2023-03-06 08:14:00'),
(15, 12, 10017, NULL, 1, 29.00, '2023-03-06 08:14:00', '2023-03-06 08:14:00'),
(16, 13, 10015, NULL, 1, 240.00, '2023-03-06 08:15:47', '2023-03-06 08:15:47'),
(17, 13, 10017, NULL, 1, 29.00, '2023-03-06 08:15:49', '2023-03-06 08:15:49'),
(24, 17, 10015, NULL, 1, 240.00, '2023-03-06 13:22:51', '2023-03-06 13:22:51'),
(25, 17, 10023, NULL, 1, 239.00, '2023-03-06 13:22:51', '2023-03-06 13:22:51'),
(27, 19, 10015, NULL, 1, 240.00, '2023-03-06 13:26:03', '2023-03-06 13:26:03'),
(28, 20, 10027, NULL, 1, 239.00, '2023-03-06 13:47:12', '2023-03-06 13:47:12'),
(29, 21, 10015, NULL, 1, 240.00, '2023-03-06 13:49:29', '2023-03-06 13:49:29'),
(30, 22, 10015, NULL, 1, 240.00, '2023-03-06 13:54:10', '2023-03-06 13:54:10'),
(31, 23, 10015, NULL, 5, 240.00, '2023-03-06 14:05:05', '2023-03-06 14:05:05'),
(32, 24, 10017, NULL, 1, 29.00, '2023-03-06 14:32:02', '2023-03-06 14:32:02'),
(33, 25, 10017, NULL, 1, 29.00, '2023-03-06 14:39:52', '2023-03-06 14:39:52'),
(34, 26, 10017, NULL, 1, 29.00, '2023-03-06 14:43:01', '2023-03-06 14:43:01');

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `first_name`, `last_name`, `email`, `phone`, `billing_address`, `billing_address2`, `zipcode`, `city`, `country`, `state`, `status_message`, `notes`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(11, 2, 'QmfKM3LsGaAf', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', NULL, 'Cash On Delivery', NULL, '2023-03-06 07:46:13', '2023-03-06 07:46:13'),
(12, 2, 'RuyS4bcjcIWr', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', 'affvsdfvd', 'Cash On Delivery', NULL, '2023-03-06 08:14:00', '2023-03-06 08:14:00'),
(13, 2, 'WM18lVmompz9', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', NULL, 'Cash On Delivery', NULL, '2023-03-06 08:15:46', '2023-03-06 08:15:46'),
(17, 2, 'CpQa43TgapDX', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', NULL, 'Cash On Delivery', NULL, '2023-03-06 13:22:50', '2023-03-06 13:22:50'),
(19, 2, 'eVYGg5Wlk8LS', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', NULL, 'Cash On Delivery', NULL, '2023-03-06 13:26:03', '2023-03-06 13:26:03'),
(20, 2, 'miUIweQLknTD', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', NULL, 'Cash On Delivery', NULL, '2023-03-06 13:47:11', '2023-03-06 13:47:11'),
(21, 2, 'f8cwojW4cEwv', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', NULL, 'on', NULL, '2023-03-06 13:49:28', '2023-03-06 13:49:28'),
(22, 2, 'PgZHbCRBEvPC', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', NULL, 'Paypal', NULL, '2023-03-06 13:54:08', '2023-03-06 13:54:08'),
(23, 2, 'K6QZZPnYfqy5', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', NULL, NULL, NULL, '2023-03-06 14:05:04', '2023-03-06 14:05:04'),
(24, 2, 'gFPfCvaJweNj', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', NULL, 'Card Payment', NULL, '2023-03-06 14:32:02', '2023-03-06 14:32:02'),
(25, 2, 'WMHOTIDIDu7f', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', NULL, 'Paypal', NULL, '2023-03-06 14:39:52', '2023-03-06 14:39:52'),
(26, 2, '1rsiq8EksGhW', 'trieu', 'nguyen', 'admin@gmail.com', '0905242897', 'Da Nang', NULL, '550000', 'Da Nang', 'Vietnam', NULL, 'in progress', NULL, 'Card Payment', NULL, '2023-03-06 14:43:01', '2023-03-06 14:43:01');

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `quantity`, `sizes`, `options`, `created_at`, `updated_at`) VALUES
(3, 10021, 1, 40, NULL, NULL, '2023-02-25 08:46:21', '2023-02-25 13:54:04'),
(6, 10020, 5, 9, NULL, NULL, '2023-02-25 14:17:11', '2023-02-25 14:17:11'),
(7, 10020, 1, 1, NULL, NULL, '2023-02-25 14:23:15', '2023-02-25 14:23:15'),
(8, 10022, 1, 6, NULL, NULL, '2023-02-27 07:53:43', '2023-02-27 07:54:02'),
(9, 10021, 4, 0, NULL, NULL, '2023-03-04 04:01:27', '2023-03-04 04:01:27'),
(10, 10021, 5, 0, NULL, NULL, '2023-03-04 04:01:27', '2023-03-04 04:01:27'),
(11, 10021, 6, 0, NULL, NULL, '2023-03-04 04:01:27', '2023-03-04 04:01:27'),
(12, 10021, 7, 0, NULL, NULL, '2023-03-04 04:01:27', '2023-03-04 04:01:27'),
(13, 10021, 8, 0, NULL, NULL, '2023-03-04 04:01:27', '2023-03-04 04:01:27');

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(38, 10015, 'uploads/product/1677655721-nRUfk.jpg', '2023-03-01 07:28:41', '2023-03-01 07:28:41'),
(39, 10015, 'uploads/product/1677656115-dn2sX.jpg', '2023-03-01 07:35:15', '2023-03-01 07:35:15'),
(40, 10022, 'uploads/product/1677656159-iTg2f.jpg', '2023-03-01 07:35:59', '2023-03-01 07:35:59'),
(41, 10022, 'uploads/product/1677656159-1HALG.jpg', '2023-03-01 07:35:59', '2023-03-01 07:35:59'),
(42, 10021, 'uploads/product/1677656212-KGMec.jpg', '2023-03-01 07:36:52', '2023-03-01 07:36:52'),
(43, 10021, 'uploads/product/1677656212-3o6BH.jpg', '2023-03-01 07:36:52', '2023-03-01 07:36:52'),
(44, 10020, 'uploads/product/1677656254-rbcUx.jpg', '2023-03-01 07:37:34', '2023-03-01 07:37:34'),
(45, 10020, 'uploads/product/1677656254-rJdqH.jpg', '2023-03-01 07:37:34', '2023-03-01 07:37:34'),
(46, 10017, 'uploads/product/1677656349-sgoHB.jpg', '2023-03-01 07:39:09', '2023-03-01 07:39:09'),
(47, 10017, 'uploads/product/1677656349-urcmC.jpg', '2023-03-01 07:39:09', '2023-03-01 07:39:09'),
(48, 10023, 'uploads/product/1677656387-t5qlv.jpg', '2023-03-01 07:39:47', '2023-03-01 07:39:47'),
(49, 10023, 'uploads/product/1677656387-hFLSg.jpg', '2023-03-01 07:39:47', '2023-03-01 07:39:47'),
(50, 10024, 'uploads/product/1677656419-jfheh.jpg', '2023-03-01 07:40:19', '2023-03-01 07:40:19'),
(51, 10024, 'uploads/product/1677656419-gME5g.jpg', '2023-03-01 07:40:19', '2023-03-01 07:40:19'),
(52, 10025, 'uploads/product/1677656471-9sSJt.jpg', '2023-03-01 07:41:11', '2023-03-01 07:41:11'),
(53, 10025, 'uploads/product/1677656471-c5EQe.jpg', '2023-03-01 07:41:11', '2023-03-01 07:41:11'),
(54, 10026, 'uploads/product/1677656606-1ZbCF.jpg', '2023-03-01 07:43:26', '2023-03-01 07:43:26'),
(55, 10026, 'uploads/product/1677656606-mjvOP.jpg', '2023-03-01 07:43:26', '2023-03-01 07:43:26'),
(56, 10027, 'uploads/product/1677656665-5fXDf.jpg', '2023-03-01 07:44:25', '2023-03-01 07:44:25'),
(57, 10027, 'uploads/product/1677656665-SATse.jpg', '2023-03-01 07:44:25', '2023-03-01 07:44:25'),
(58, 10028, 'uploads/product/1677656699-ZuExA.jpg', '2023-03-01 07:44:59', '2023-03-01 07:44:59'),
(59, 10028, 'uploads/product/1677656699-KQH6H.jpg', '2023-03-01 07:44:59', '2023-03-01 07:44:59');

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `deleted_at`, `created_at`, `updated_at`, `sale_off`) VALUES
(10015, 7, 2, 'Colorful Pattern Shirts', 'colorful-pattern-shirts', 'Colorful Pattern Shirts', 'Colorful Pattern Shirts', 239, 240, 0, 1, 1, 'Iphone 14 pro', 'Iphone 14 pro', 'Iphone 14 pro', NULL, '2023-02-23 07:34:24', '2023-03-06 14:05:05', 10),
(10017, 7, 4, 'Flowers Sleeve Lapel Shirt', 'flowers-sleeve-lapel-shirt', 'Flowers Sleeve Lapel Shirt', 'Flowers Sleeve Lapel Shirt', 46, 29, 2, 1, 1, NULL, NULL, NULL, NULL, '2023-02-24 14:13:45', '2023-03-06 14:43:01', 0),
(10020, 7, 2, 'Colorful Hawaiian Shirts', 'colorful-hawaiian-shirts', 'Colorful Hawaiian Shirts', 'Colorful Hawaiian Shirts', 236, 124, NULL, 1, 1, NULL, NULL, NULL, NULL, '2023-02-25 08:44:35', '2023-03-01 07:37:34', 0),
(10021, 7, 3, 'Vintage Floral Oil Shirts', 'vintage-floral-oil-shirts', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum eligendi? Officia doloremque facere quia. Voluptatum, accusantium!', 'Vintage Floral Oil Shirts', 446, 339, 10, 1, 1, NULL, NULL, NULL, NULL, '2023-02-25 08:46:21', '2023-03-04 04:49:56', 10),
(10022, 7, 2, 'Plain Color Pocket Shirts', 'plain-color-pocket-shirts', 'Plain Color Pocket Shirts', 'Plain Color Pocket Shirts', 256, 139, 5, 1, 1, NULL, NULL, NULL, NULL, '2023-02-27 07:53:43', '2023-03-03 06:46:20', 20),
(10023, 7, 3, 'Ethnic Floral Casual Shirts', 'ethnic-floral-casual-shirts', 'Ethnic Floral Casual Shirts', 'Ethnic Floral Casual Shirts', 246, 239, 5, 1, 1, NULL, NULL, NULL, NULL, '2023-03-01 07:39:47', '2023-03-01 07:39:47', 0),
(10024, 10, NULL, 'Stitching Hole Sandals', 'stitching-hole-sandals', 'Stitching Hole Sandals', 'Stitching Hole Sandals', 1276, 1276, 5, 1, 1, NULL, NULL, NULL, NULL, '2023-03-01 07:40:19', '2023-03-01 07:40:19', 0),
(10025, 7, 25, 'Mens Porcelain Shirt', 'mens-porcelain-shirt', 'Mens Porcelain Shirt', 'Mens Porcelain Shirt', 246, 239, 5, 1, 1, NULL, NULL, NULL, NULL, '2023-03-01 07:40:59', '2023-03-01 07:40:59', 0),
(10026, 10, 4, 'Praesent maximus', 'praesent-maximus', 'Praesent maximus', 'Praesent maximus', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, '2023-03-01 07:43:26', '2023-03-01 07:43:36', 0),
(10027, 12, NULL, 'Curabitur porta', 'curabitur-porta', 'Curabitur porta', 'Curabitur porta', 256, 239, 5, 1, 1, NULL, NULL, NULL, NULL, '2023-03-01 07:44:25', '2023-03-03 06:30:41', 5),
(10028, 6, NULL, 'Sed dapibus orci', 'sed-dapibus-orci', 'Sed dapibus orci', 'Sed dapibus orci', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, '2023-03-01 07:44:59', '2023-03-01 07:46:15', 0);

INSERT INTO `sliders` (`id`, `title`, `image`, `title_md`, `title_sm`, `link`, `text_link`, `contents`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Slider 1', 'uploads/slider/1677592675-Om6f0.png', 'Medium Title', 'Small Title', 'Link', 'Text Link', NULL, 'Slider 1', 0, '2023-02-28 13:57:55', '2023-03-04 04:11:00'),
(4, 'Great Collection', 'uploads/slider/1677594329-AVpiX.png', 'Fashion Trending', 'Hot promotions', 'Link', 'Text Link', NULL, 'Save more with coupons & up to 20% off', 1, '2023-02-28 13:58:26', '2023-02-28 14:25:29'),
(5, 'On all products', 'uploads/slider/1677594284-cp29p.png', 'Supper value deals', 'Trade-in offer', 'Link', 'Text Link', NULL, 'Save more with coupons & up to 70% off', 1, '2023-02-28 13:58:54', '2023-02-28 14:25:58');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'Trieunb', 'trieunb08@gmail.com', NULL, '$2y$10$AtDIF5BvHjH1lO9T/LFiiujxBiItdZqwbUI3Vq3MUuRGxiTnEX0v.', NULL, '2023-02-11 02:33:09', '2023-02-11 02:33:09', 0),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$c6K8TWHLS.uXx2G6n4nPGOKzTEyuI7MFXc3.7yqwWfILuC/cryr1m', 'Gn0bhDwOcSSaLIc24K8pvkS6GbVEcVH2rpTlfDlIrtoOJ2epBDhUv86jZOil', '2023-02-11 03:18:12', '2023-02-11 03:18:12', 1),
(3, 'Nguyen Ba Trieu', 'trieunb@concrete-corp.com', NULL, '$2y$10$WYve.D32d/jja/JpGmT3eeOMaQBmDu9Cw6tgola6Gxa/jNeor6Wlq', 'cs5koOfVPvBUKUWQVmVnqzRGLzhRWOA9wyIMLv2IqPcQ1k2zsfjcJHISBxAt', '2023-03-06 02:48:21', '2023-03-06 02:48:21', 0);

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(32, 2, 10015, '2023-03-06 08:17:11', '2023-03-06 08:17:11'),
(33, 2, 10020, '2023-03-06 09:02:39', '2023-03-06 09:02:39'),
(34, 2, 10023, '2023-03-06 11:53:34', '2023-03-06 11:53:34'),
(35, 2, 10028, '2023-03-06 12:36:00', '2023-03-06 12:36:00'),
(36, 2, 10017, '2023-03-06 14:11:47', '2023-03-06 14:11:47'),
(37, 2, 10026, '2023-03-07 04:43:48', '2023-03-07 04:43:48'),
(38, 2, 10024, '2023-03-07 06:01:06', '2023-03-07 06:01:06');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;