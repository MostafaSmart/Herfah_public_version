-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 مايو 2024 الساعة 22:04
-- إصدار الخادم: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herfah_db`
--
CREATE DATABASE IF NOT EXISTS `herfah_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `herfah_db`;

-- --------------------------------------------------------

--
-- بنية الجدول `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personal_image` varchar(255) NOT NULL DEFAULT 'assets/imgs/avatar-06.png',
  `rate` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `clients`
--

INSERT INTO `clients` (`id`, `personal_image`, `rate`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'assets/imgs/avatar-06.png', '10', 12, NULL, NULL),
(2, 'assets/imgs/avatar-06.png', '10', 17, '2024-05-10 16:54:42', '2024-05-10 16:54:42'),
(3, 'assets/imgs/avatar-06.png', NULL, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `client_worker_orders`
--

CREATE TABLE `client_worker_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `startDate` date DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `testimonial` varchar(255) DEFAULT NULL,
  `Amount` decimal(8,2) DEFAULT NULL,
  `Num_Days` int(11) DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `client_worker_orders`
--

INSERT INTO `client_worker_orders` (`id`, `startDate`, `status`, `testimonial`, `Amount`, `Num_Days`, `client_id`, `worker_id`, `created_at`, `updated_at`) VALUES
(3, NULL, 'قيد العمل', NULL, NULL, NULL, 1, 8, NULL, NULL),
(4, NULL, 'قيد المراجعة', NULL, NULL, NULL, 1, 7, '2024-05-05 19:59:48', '2024-05-05 19:59:48'),
(5, NULL, 'قيد المراجعة', NULL, NULL, NULL, 2, 7, '2024-05-10 16:54:42', '2024-05-10 16:54:42'),
(6, NULL, 'قيد المراجعة', NULL, NULL, NULL, 2, 2, '2024-05-10 17:46:51', '2024-05-10 17:46:51'),
(20, '2024-05-10', 'قيد العمل', '', 8000.00, 3, 2, 2, '2024-05-10 21:40:10', '2024-05-10 21:40:10'),
(21, '2024-05-17', 'قيد العمل', '', 8000.00, 3, 2, 2, '2024-05-10 21:41:00', '2024-05-10 21:41:00'),
(22, '2024-05-17', 'قيد العمل', '', 8000.00, 3, 2, 2, '2024-05-10 21:42:44', '2024-05-10 21:42:44'),
(23, '2024-05-17', 'قيد العمل', '', 8000.00, 3, 2, 2, '2024-05-10 21:47:55', '2024-05-10 21:47:55'),
(24, NULL, 'قيد العمل', '', 8000.00, 3, 2, 2, '2024-05-10 21:49:15', '2024-05-10 21:49:15'),
(25, NULL, 'قيد العمل', '', 8000.00, 3, 2, 2, '2024-05-10 21:50:19', '2024-05-10 21:50:19'),
(26, NULL, 'قيد العمل', '', 8000.00, 3, 2, 2, '2024-05-10 21:53:26', '2024-05-10 21:53:26'),
(27, '2024-05-16', 'قيد العمل', '', 8000.00, 3, 2, 7, '2024-05-10 21:58:40', '2024-05-10 21:58:40'),
(28, '2024-05-16', 'قيد العمل', '', 20000.00, 3, 3, 7, '2024-05-10 22:07:41', '2024-05-10 22:07:41'),
(29, '2024-05-16', 'قيد العمل', '', 20000.00, 3, 3, 7, '2024-05-10 22:10:34', '2024-05-10 22:10:34'),
(30, '2024-05-16', 'قيد العمل', '', 20000.00, 3, 3, 7, '2024-05-10 22:13:14', '2024-05-10 22:13:14'),
(31, NULL, 'قيد المراجعة', NULL, NULL, NULL, 2, 5, '2024-05-10 22:51:35', '2024-05-10 22:51:35'),
(32, '2024-05-16', 'قيد العمل', '', 20000.00, 3, 2, 5, '2024-05-10 22:56:21', '2024-05-10 22:56:21');

-- --------------------------------------------------------

--
-- بنية الجدول `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `D_Name` varchar(255) NOT NULL,
  `D_About` text NOT NULL,
  `NumOfWorker` int(11) NOT NULL,
  `imgcover` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `departments`
--

INSERT INTO `departments` (`id`, `D_Name`, `D_About`, `NumOfWorker`, `imgcover`, `created_at`, `updated_at`) VALUES
(1, 'سباكة', 'مهنة السباكة هي مهنة حرفية تشمل تركيب وصيانة أنظمة الأنابيب والصحة العامة في المباني والمنشآت', 5, 'Images\\2024\\5\\10\\depts/Plumbing.jpg', NULL, '2024-05-10 18:27:15'),
(2, 'كهرباء', 'مهنة الكهربائي تشمل تركيب وصيانة أنظمة الكهرباء في المباني والمنشآت', 10, 'Images\\2024\\5\\10\\depts/electrical.jpg', NULL, '2024-05-10 18:26:57'),
(3, 'طلاء', 'مهنة الطلاء تشمل طلاء تلوين الجدران والأسطح ولحفاظ على جمالها في المباني والمنشآت', 16, 'Images\\2024\\5\\10\\depts/painter.jpg', NULL, '2024-05-11 16:41:27'),
(4, 'بلاط', 'مهنة المبلط تشمل تركيب وصيانة السيراميك للجدران والأرضيات في المباني والمنشآت', 10, 'Images\\2024\\5\\10\\depts/tiler.jpg', NULL, '2024-05-10 18:27:54'),
(5, 'بناء', 'مهنة اليناء هي بناء الهيكل الأساسي للمباني والمنشآت وتاكد من قوة البناء', 30, 'Images\\2024\\5\\10\\depts/constructor.jpg', NULL, '2024-05-10 18:27:43'),
(6, 'تليس', 'مهنة التليس هي مهنة تسوية الجدران لزيادة حماية البيت وتسهيل عملية الطلاء', 12, 'Images\\2024\\5\\10\\depts/download (1).jpg', NULL, '2024-05-10 18:27:33'),
(7, 'نجارة', 'مهنة النجارة وهي المهنة المتعلقة بتحويل الأخشاب الى أشياء مهمة للمباني والمنشأت', 5, 'Images\\2024\\5\\10\\depts/carpentry.jpg', NULL, '2024-05-10 18:26:45'),
(8, 'ديكور', 'مهندس الديكور هو المسؤول عن المضهر الجمالي للبيت', 12, 'Images\\2024\\5\\10\\depts/decoriatton.jpg', NULL, '2024-05-10 18:27:23'),
(9, 'Computer Science', 'Files/Files/Files/Files/Files/', 0, 'Images\\2024\\5\\10\\depts/صورة3.png', '2024-05-10 18:16:18', '2024-05-10 18:16:18'),
(10, 'Information Systems', 'Files/Files/Files/Files/Files/Files/', 0, 'Images\\2024\\5\\10\\depts/apartment-2179337_1920.jpg', '2024-05-10 18:17:20', '2024-05-10 18:17:20');

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `jobs`
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
-- بنية الجدول `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Message_Title` varchar(255) NOT NULL,
  `Message_Body` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_13_081456_create_clients_table', 1),
(5, '2024_04_13_082129_create_departments_table', 1),
(6, '2024_04_16_111016_create_messages_table', 1),
(7, '2024_04_16_111031_create_requests_table', 1),
(8, '2024_04_16_161728_create_workers_table', 1),
(9, '2024_04_16_163757_create_portfolis_table', 1),
(10, '2024_04_16_163849_create_client_worker_orders_table', 1),
(11, '2024_04_25_115216_create_notifications_table', 1),
(12, '2024_05_10_210006_add_column_to_table', 2);

-- --------------------------------------------------------

--
-- بنية الجدول `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('09b7b2f7-6573-4951-893c-df2fbc4218b4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 18, '{\"Name\":\"Asem\",\"Type\":\"Work Order\"}', NULL, '2024-05-11 16:46:37', '2024-05-11 16:46:37'),
('0c5d0f00-eba8-4b80-967a-617ce0dd5a4d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"Name\":\"Mohammed\",\"Type\":\"Work Order\"}', NULL, '2024-05-11 15:53:50', '2024-05-11 15:53:50'),
('0eba45c9-6c2c-4278-a021-d8c9008febb8', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 17, '{\"Name\":\"Mohammed\",\"Type\":\"Work Order\"}', NULL, '2024-05-10 19:07:09', '2024-05-10 19:07:09'),
('26f3a236-c826-4157-8c22-8ea0cca8c8c4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 17, '{\"Name\":\"Mohammed\",\"Type\":\"Worker Order\"}', NULL, '2024-05-10 22:51:41', '2024-05-10 22:51:41'),
('3743fa38-222c-4421-b321-39caaa41d0d4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"Name\":\"Mohammed\",\"Type\":\"Work Order\"}', NULL, '2024-05-10 19:07:09', '2024-05-10 19:07:09'),
('487decbc-8b32-4032-9e13-2e3cf34e04ef', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"Name\":\"Mohammed\",\"Type\":\"Worker Order\"}', NULL, '2024-05-10 16:54:43', '2024-05-10 16:54:43'),
('7c840d42-39c6-4167-89e4-3882d24b4961', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"Name\":\"Mohammed\",\"Type\":\"Worker Order\"}', NULL, '2024-05-10 22:51:41', '2024-05-10 22:51:41'),
('a26c9888-6566-4efb-bdaa-fd313d742138', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"Name\":\"AbdulHameed\",\"Type\":\"Worker Order\"}', NULL, '2024-05-05 19:59:48', '2024-05-05 19:59:48'),
('b5d9dec3-3be9-422a-a05e-74ff91e28a29', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 17, '{\"Name\":\"Mohammed\",\"Type\":\"Worker Order\"}', NULL, '2024-05-10 17:46:54', '2024-05-10 17:46:54'),
('b731fe4a-680a-4854-8085-b938eec722fd', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"Name\":\"Mohammed\",\"Type\":\"Worker Order\"}', NULL, '2024-05-10 17:46:53', '2024-05-10 17:46:53'),
('c7483ba3-f8e7-472a-a353-5096497aed74', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 17, '{\"Name\":\"Mohammed\",\"Type\":\"Work Order\"}', NULL, '2024-05-11 15:53:50', '2024-05-11 15:53:50'),
('da9f90ac-cbaf-4a7b-996b-f39b7754b8de', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"Name\":\"Asem\",\"Type\":\"Work Order\"}', NULL, '2024-05-11 16:46:37', '2024-05-11 16:46:37');

-- --------------------------------------------------------

--
-- بنية الجدول `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `portfolis`
--

CREATE TABLE `portfolis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `About_Project` text NOT NULL,
  `Images` varchar(255) NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `portfolis`
--

INSERT INTO `portfolis` (`id`, `About_Project`, `Images`, `worker_id`, `created_at`, `updated_at`) VALUES
(1, 'dashboarddashboarddashboard', '[\"Images\\\\2024\\\\5\\\\11\\\\portfolios\\/constructor.jpg\",\"Images\\\\2024\\\\5\\\\11\\\\portfolios\\/tiler.jpg\",\"Images\\\\2024\\\\5\\\\11\\\\portfolios\\/painter.jpg\",\"Images\\\\2024\\\\5\\\\11\\\\portfolios\\/electrical.jpg\",\"Images\\\\2024\\\\5\\\\11\\\\portfolios\\/Plumbing.jpg\"]', 9, '2024-05-11 16:41:26', '2024-05-11 16:41:26');

-- --------------------------------------------------------

--
-- بنية الجدول `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `R_Type` varchar(255) NOT NULL,
  `R_FilePath` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `requests`
--

INSERT INTO `requests` (`id`, `R_Type`, `R_FilePath`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Worker Order', 'WorkOrder\\2024\\5\\5\\1714949988order.json', 'Successful', '2024-05-05 19:59:48', '2024-05-10 22:07:42'),
(2, 'Worker Order', 'WorkOrder\\2024\\5\\10\\1715370883order.json', 'Successful', '2024-05-10 16:54:43', '2024-05-10 21:58:40'),
(3, 'Worker Order', 'WorkOrder\\2024\\5\\10\\1715374011order.json', 'Successful', '2024-05-10 17:46:52', '2024-05-10 21:41:00'),
(4, 'Work Order', 'WorkerOrder\\2024\\5\\10\\1715378828order.json', 'Cancelled', '2024-05-10 19:07:08', '2024-05-10 23:02:04'),
(5, 'Worker Order', 'WorkOrder\\2024\\5\\11\\1715392295order.json', 'Successful', '2024-05-10 22:51:36', '2024-05-10 22:56:22'),
(6, 'Work Order', 'WorkerOrder\\2024\\5\\11\\1715453629order.json', 'Successful', '2024-05-11 15:53:49', '2024-05-11 16:41:27'),
(7, 'Work Order', 'WorkerOrder\\2024\\5\\11\\1715456796order.json', 'Pending', '2024-05-11 16:46:36', '2024-05-11 16:46:36');

-- --------------------------------------------------------

--
-- بنية الجدول `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FJNwgRxpApzbZgREnmiHYNElplIo2QQUEeQ1ddI3', 18, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia2JoZllPWlJUMUZ2NXlhMXJ4YmJqcTE0b2h1bzRiYURHMzlEMnpPdCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc2hvd1dvcmtSZXF1ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTg7fQ==', 1715456487),
('frxIVqyTTePtRAOaYgkFuMLoauxOIS7orHnRa8Tn', 18, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic0NiSmFibmRiaEcxUVl1YUhjM3pKR2Rxb1NlaDRMWXlzWmdiWkhYWCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc2hvd1dvcmtSZXF1ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTg7fQ==', 1715457055),
('QRlLa9QRlJwr5PcSRrZPFhByUAEZ1LV2JYYqfXeU', 18, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib0ZNYXp3ZUFzWkY4dnJXZXhHdHZIMk5KeFhJQWJ6bGhCNUFyOERENCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdG9yZUZyb21PcmRlclRvLzYiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxODt9', 1715456289);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `Autho` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `l_name`, `Gender`, `PhoneNumber`, `Autho`, `email`, `birthdate`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Malek  Alomsainf', 'Malek  Alomsainf', 'ذكر', '+967772891095', 0, 'Malek@gmail.com', '2000-10-27', NULL, '$2y$12$ncTmNkWtYj3OCZSozTHCqeMjHyqUOTnao/uNWz6TC/dR1xvu7wIV.', NULL, '2024-05-05 18:32:48', '2024-05-05 18:32:48'),
(2, 'مصطفى', 'مهلي', 'ذكر', '777252369', 2, 'mostafa@gmail.com', '2001-11-20', NULL, '$2y$12$v8JAampU5esqSoHAK/ff1.iZLT9v3ptdpb5jeGEYljiGAY35p.ICm', NULL, '2024-05-05 18:34:30', '2024-05-05 18:34:30'),
(3, 'Ahmed', 'Saaid', 'ذكر', '778564213', 1, 'ahmed@gmail.com', '1987-05-01', NULL, '123456789', NULL, NULL, NULL),
(4, 'Aymen', 'Mohammed', 'ذكر', '775632956', 2, 'ِaymen@gmail.com', '1993-10-16', NULL, '123456789', NULL, NULL, NULL),
(5, 'عبدالله', 'قاسم', 'ذكر', '778899632', 1, 'abdullah@gmail.com', '2024-04-03', NULL, '123456789', NULL, NULL, NULL),
(6, 'قاسم', 'محمد', 'ذكر', '772356471', 1, 'qassem@gmail.com', '2024-04-25', NULL, '123456789', NULL, NULL, NULL),
(7, 'Ahmed', 'Ameen', 'ذكر', '775632984', 1, 'ahmed11@gmail.com', '2024-04-18', NULL, '123456789', NULL, NULL, NULL),
(8, 'Ali', 'Mohammed', 'ذكر', '775896322', 1, 'ali@gmail.com', '2024-04-18', NULL, '123456789', NULL, NULL, NULL),
(10, 'سعد', 'عبدالله', 'ذكر', '772215632', 2, 'saad@gmail.com', '1995-07-17', NULL, '123456789', NULL, NULL, NULL),
(11, 'Salem', 'Ameen', 'ذكر', '775896322', 1, 'salem@gmail.com', '2020-08-02', NULL, '123456789', NULL, NULL, NULL),
(12, 'AbdulHameed', 'AlQasemy', 'ذكر', '778963521', 2, 'vymen22@gmail.com', '2024-05-09', NULL, '$2y$12$47cxYQdzxHfIBTS7gH/YPOESAHSx3nKn5ES.SEM2L2UhWE8Y1.C.m', NULL, '2024-05-05 19:26:16', '2024-05-05 19:26:16'),
(17, 'Mohammed', 'Sadiq', 'ذكر', '773021206', 2, 'moosadiq11@gmail.com', '2000-07-10', NULL, '$2y$12$xB6AtxNHsuCbBZHf2fPfWOgL57utJ7ds2g3RsRdU1/FMGD6nH0Rxq', NULL, '2024-05-10 16:41:08', '2024-05-11 16:41:26'),
(18, 'Asem', 'ahmed', 'ذكر', '777888555', 0, 'asem@gmail.com', '2000-10-02', NULL, '$2y$12$ABag3A3WSjpU6ER9eA8/ue5oJv//cY4fqiMTyBXLKoq0XavErtOyS', NULL, '2024-05-11 16:36:34', '2024-05-11 16:36:34');

-- --------------------------------------------------------

--
-- بنية الجدول `workers`
--

CREATE TABLE `workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` varchar(255) NOT NULL,
  `personal_image` varchar(255) NOT NULL,
  `Image_cover` varchar(255) NOT NULL,
  `price_perHour` decimal(8,2) NOT NULL,
  `price_perMatter` decimal(8,2) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `workers`
--

INSERT INTO `workers` (`id`, `about`, `personal_image`, `Image_cover`, `price_perHour`, `price_perMatter`, `status`, `department_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2 Years Experience ', 'assets/imgs/avatar.png', 'assets/imgs/course-02.jpg', 1000.00, 100.00, 'Valiable', 1, 3, NULL, NULL),
(2, '10 Years Experience ', 'assets/imgs/avatar.png', 'assets/imgs/course-02.jpg', 2000.00, 3000.00, 'Valiable', 2, 2, NULL, NULL),
(3, '5 Years Experience ', 'assets/imgs/avatar.png', 'assets/imgs/course-02.jpg', 3000.00, 4000.00, 'Valiable', 3, 5, NULL, NULL),
(4, '8 Years Experience ', 'assets/imgs/avatar.png', 'assets/imgs/course-02.jpg', 2000.00, 3000.00, 'Valiable', 5, 6, NULL, NULL),
(5, '10 Years Experience ', 'assets/imgs/avatar.png', 'assets/imgs/course-02.jpg', 4000.00, 3000.00, 'busy', 4, 7, NULL, '2024-05-10 22:56:22'),
(6, '2 Years Experience ', 'assets/imgs/avatar.png', 'assets/imgs/course-02.jpg', 1000.00, 4000.00, 'Valiable', 6, 8, NULL, NULL),
(7, '21 Years Experience ', 'assets/imgs/avatar.png', 'assets/imgs/course-02.jpg', 2000.00, 3000.00, 'busy', 7, 10, NULL, '2024-05-10 22:13:14'),
(8, '2 Years Experience ', 'assets/imgs/avatar.png', 'assets/imgs/course-02.jpg', 4000.00, 3000.00, 'Valiable', 8, 11, NULL, NULL),
(9, 'Ruff hmgh yfjghn n', 'Images\\2024\\5\\11\\Worker\\Covers/carpentry.jpg', 'Images\\2024\\5\\11\\Worker/decoriatton.jpg', 3500.00, 5000.00, 'active', 3, 17, '2024-05-11 16:41:26', '2024-05-11 16:41:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- Indexes for table `client_worker_orders`
--
ALTER TABLE `client_worker_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_worker_orders_client_id_foreign` (`client_id`),
  ADD KEY `client_worker_orders_worker_id_foreign` (`worker_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
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
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `portfolis`
--
ALTER TABLE `portfolis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolis_worker_id_foreign` (`worker_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workers_department_id_foreign` (`department_id`),
  ADD KEY `workers_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_worker_orders`
--
ALTER TABLE `client_worker_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `portfolis`
--
ALTER TABLE `portfolis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `client_worker_orders`
--
ALTER TABLE `client_worker_orders`
  ADD CONSTRAINT `client_worker_orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `client_worker_orders_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`);

--
-- قيود الجداول `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `portfolis`
--
ALTER TABLE `portfolis`
  ADD CONSTRAINT `portfolis_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `workers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
