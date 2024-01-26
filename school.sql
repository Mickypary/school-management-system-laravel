-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 11:56 AM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 2, 3, '2024-01-02 08:32:13', '2024-01-11 14:40:26'),
(2, 3, NULL, 4, 3, 2, 2, '2024-01-04 18:17:01', '2024-01-04 18:17:01'),
(3, 4, 1, 6, 5, 1, 1, '2024-01-04 22:03:59', '2024-01-15 10:58:14'),
(4, 5, NULL, 4, 2, 1, 3, '2024-01-06 23:26:21', '2024-01-06 23:26:21'),
(5, 6, NULL, 4, 2, 3, 2, '2024-01-06 23:28:55', '2024-01-06 23:28:55'),
(6, 7, 2, 6, 5, 1, 2, '2024-01-06 23:32:11', '2024-01-15 10:58:14'),
(7, 2, 1, 3, 2, 3, 1, '2024-01-08 13:35:39', '2024-01-12 06:17:32'),
(8, 7, NULL, 7, 6, 1, 1, '2024-01-09 08:03:09', '2024-01-09 08:26:16'),
(9, 8, 2, 1, 1, 1, 2, '2024-01-11 12:49:00', '2024-01-11 14:40:26'),
(10, 9, NULL, 8, 6, 3, 3, '2024-01-11 12:51:31', '2024-01-11 12:51:31'),
(11, 10, 3, 2, 1, 1, 3, '2024-01-11 14:44:29', '2024-01-11 14:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 100, 33, 100, '2024-01-02 08:22:44', '2024-01-02 08:22:44'),
(2, 1, 10, 100, 33, 100, '2024-01-02 08:22:44', '2024-01-02 08:22:44'),
(3, 1, 12, 100, 33, 100, '2024-01-02 08:22:44', '2024-01-02 08:22:44'),
(4, 1, 11, 100, 33, 100, '2024-01-02 08:22:44', '2024-01-02 08:22:44'),
(5, 2, 9, 100, 33, 100, '2024-01-02 08:23:43', '2024-01-02 08:23:43'),
(6, 2, 10, 100, 33, 100, '2024-01-02 08:23:43', '2024-01-02 08:23:43'),
(7, 2, 12, 100, 33, 100, '2024-01-02 08:23:43', '2024-01-02 08:23:43'),
(8, 2, 11, 100, 33, 100, '2024-01-02 08:23:43', '2024-01-02 08:23:43'),
(9, 3, 9, 100, 33, 100, '2024-01-02 08:24:21', '2024-01-02 08:24:21'),
(10, 3, 10, 100, 33, 100, '2024-01-02 08:24:21', '2024-01-02 08:24:21'),
(11, 3, 12, 100, 33, 100, '2024-01-02 08:24:21', '2024-01-02 08:24:21'),
(12, 3, 11, 100, 33, 100, '2024-01-02 08:24:21', '2024-01-02 08:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Head Teacher', '2024-01-02 08:17:26', '2024-01-19 20:08:34'),
(2, 'Assistant Teacher', '2024-01-19 20:08:47', '2024-01-19 20:08:47'),
(3, 'Teacher', '2024-01-19 20:09:00', '2024-01-19 20:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `leave_purpose_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 12, 2, '2024-01-09', '2024-01-23', '2024-01-25 12:46:39', '2024-01-25 12:46:39'),
(3, 13, 5, '2024-01-25', '2024-04-17', '2024-01-25 12:47:42', '2024-01-25 14:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `previous_salary` int(11) DEFAULT NULL,
  `present_salary` int(11) DEFAULT NULL,
  `increment_salary` int(11) DEFAULT NULL,
  `effected_salary_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_salary_date`, `created_at`, `updated_at`) VALUES
(1, 12, 450000, 450000, 0, '1970-01-01', '2024-01-20 13:42:26', '2024-01-20 13:42:26'),
(2, 13, 300000, 300000, 0, '1970-01-01', '2024-01-21 11:36:34', '2024-01-21 11:36:34'),
(3, 13, 300000, 320000, 20000, '2024-01-21', '2024-01-21 13:39:06', '2024-01-21 13:39:06'),
(4, 12, 450000, 470000, 20000, '2024-01-22', '2024-01-22 13:34:57', '2024-01-22 13:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'First Term Exam', '2024-01-02 08:16:53', '2024-01-02 08:16:53'),
(2, 'Second Term Exam', '2024-01-02 08:17:00', '2024-01-02 08:17:00'),
(3, 'Third Term Exam', '2024-01-02 08:17:08', '2024-01-02 08:17:08');

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
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Registration Fee', '2024-01-02 08:16:13', '2024-01-02 08:16:13'),
(2, 'Monthly Fee', '2024-01-02 08:16:27', '2024-01-02 08:16:27'),
(3, 'Exam Fee', '2024-01-17 12:11:39', '2024-01-17 12:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(5, 2, 1, 1600, '2024-01-02 08:25:56', '2024-01-02 08:25:56'),
(6, 2, 2, 1600, '2024-01-02 08:25:56', '2024-01-02 08:25:56'),
(7, 2, 3, 1600, '2024-01-02 08:25:56', '2024-01-02 08:25:56'),
(8, 2, 4, 1600, '2024-01-02 08:25:56', '2024-01-02 08:25:56'),
(15, 1, 1, 300, '2024-01-15 10:59:02', '2024-01-15 10:59:02'),
(16, 1, 2, 300, '2024-01-15 10:59:02', '2024-01-15 10:59:02'),
(17, 1, 3, 600, '2024-01-15 10:59:02', '2024-01-15 10:59:02'),
(18, 1, 4, 600, '2024-01-15 10:59:02', '2024-01-15 10:59:02'),
(19, 1, 7, 700, '2024-01-15 10:59:02', '2024-01-15 10:59:02'),
(20, 1, 8, 700, '2024-01-15 10:59:02', '2024-01-15 10:59:02'),
(21, 1, 5, 500, '2024-01-15 10:59:02', '2024-01-15 10:59:02'),
(22, 1, 6, 500, '2024-01-15 10:59:02', '2024-01-15 10:59:02'),
(27, 3, 1, 250, '2024-01-18 07:48:11', '2024-01-18 07:48:11'),
(28, 3, 2, 250, '2024-01-18 07:48:11', '2024-01-18 07:48:11'),
(29, 3, 3, 350, '2024-01-18 07:48:11', '2024-01-18 07:48:11'),
(30, 3, 4, 350, '2024-01-18 07:48:11', '2024-01-18 07:48:11'),
(31, 3, 5, 450, '2024-01-18 07:48:11', '2024-01-18 07:48:11'),
(32, 3, 6, 450, '2024-01-18 07:48:11', '2024-01-18 07:48:11'),
(33, 3, 7, 550, '2024-01-18 07:48:11', '2024-01-18 07:48:11'),
(34, 3, 8, 550, '2024-01-18 07:48:11', '2024-01-18 07:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Family Problem', NULL, NULL),
(2, 'Personal Problem', NULL, NULL),
(3, 'Health Problem', '2024-01-25 12:46:25', '2024-01-25 14:12:25'),
(4, 'Friend Problem', '2024-01-25 12:47:42', '2024-01-25 12:47:42'),
(5, 'Testing', '2024-01-25 14:14:56', '2024-01-25 14:14:56');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_03_164901_create_sessions_table', 1),
(7, '2023_11_20_182119_create_student_classes_table', 1),
(8, '2023_11_24_192034_create_student_years_table', 1),
(9, '2023_12_02_085625_create_student_groups_table', 1),
(10, '2023_12_02_104851_create_student_shifts_table', 1),
(11, '2023_12_02_200905_create_fee_categories_table', 1),
(12, '2023_12_04_183918_create_fee_category_amounts_table', 1),
(13, '2023_12_14_105439_create_exam_types_table', 1),
(14, '2023_12_14_230443_create_subjects_table', 1),
(15, '2023_12_22_140950_create_assign_subjects_table', 1),
(16, '2023_12_24_211518_create_designations_table', 1),
(17, '2023_12_29_093451_create_assign_students_table', 1),
(18, '2023_12_29_094351_create_student_discounts_table', 1),
(19, '2024_01_19_193055_create_employee_salary_logs_table', 2),
(20, '2024_01_23_120717_create_leave_purposes_table', 3),
(21, '2024_01_23_120749_create_employee_leaves_table', 4);

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
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('pHwTK4JAieRZIHt1l86UmDo8NNjJvkjai3KvsAZw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNkk3U3U1WlZXUmlxZ0FyTE1rVzY5SU45SGFiYXF1aE9RM2JiSWsxMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRMNmk0NXdrbm9EcUNCcmFJMkU4QllPVk1uaXQxaDU0TURpYWdZcUtxQXIxWi56Mmc3WlU4ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZS9sZWF2ZS92aWV3Ijt9fQ==', 1706266040),
('WgRj1DsbqqY3I9pFjPtKPQLh7LXZTAqFWNoTO9hX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZS9sZWF2ZS92aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6Imt5SUdpZ1Qxd2tKMm54cDA5WEt2VHhtU3pTdnZIeFRxenhtUzhZY1AiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkTDZpNDV3a25vRHFDQnJhSTJFOEJZT1ZNbml0MWg1NE1EaWFnWXFLcUFyMVouejJnN1pVOGUiO30=', 1706195697);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Year 1A', '2024-01-02 08:14:33', '2024-01-02 08:14:33'),
(2, 'Year 1B', '2024-01-02 08:14:42', '2024-01-02 08:14:42'),
(3, 'Year 2A', '2024-01-02 08:14:49', '2024-01-02 08:14:49'),
(4, 'Year 2B', '2024-01-02 08:14:57', '2024-01-02 08:14:57'),
(5, 'Year 3A', '2024-01-02 08:15:05', '2024-01-02 08:15:05'),
(6, 'Year 3B', '2024-01-02 08:15:13', '2024-01-02 08:15:13'),
(7, 'Year 4A', '2024-01-09 07:59:41', '2024-01-09 07:59:41'),
(8, 'Year 4B', '2024-01-09 07:59:50', '2024-01-09 07:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `student_discounts`
--

CREATE TABLE `student_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_discounts`
--

INSERT INTO `student_discounts` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2024-01-02 08:32:13', '2024-01-02 08:32:13'),
(2, 2, 1, 4, '2024-01-04 18:17:01', '2024-01-04 18:17:01'),
(3, 3, 1, 10, '2024-01-04 22:03:59', '2024-01-04 22:03:59'),
(4, 4, 1, 7, '2024-01-06 23:26:21', '2024-01-06 23:26:21'),
(5, 5, 1, 9, '2024-01-06 23:28:55', '2024-01-06 23:28:55'),
(6, 6, 1, 3, '2024-01-06 23:32:11', '2024-01-06 23:32:11'),
(7, 7, 1, 5, '2024-01-08 13:35:39', '2024-01-08 13:35:39'),
(8, 8, 1, 3, '2024-01-09 08:03:09', '2024-01-09 08:03:09'),
(9, 9, 1, 6, '2024-01-11 12:49:00', '2024-01-11 12:49:00'),
(10, 10, 1, 3, '2024-01-11 12:51:31', '2024-01-11 12:51:31'),
(11, 11, 1, 4, '2024-01-11 14:44:29', '2024-01-11 14:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Art', '2024-01-02 08:17:38', '2024-01-02 08:17:38'),
(2, 'Science', '2024-01-02 08:17:45', '2024-01-02 08:17:45'),
(3, 'Commercial', '2024-01-02 08:17:52', '2024-01-02 08:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Shift A', '2024-01-02 08:15:46', '2024-01-02 08:15:46'),
(2, 'Shift B', '2024-01-02 08:15:54', '2024-01-02 08:15:54'),
(3, 'Shift C', '2024-01-02 08:16:02', '2024-01-02 08:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2018', '2024-01-02 08:18:01', '2024-01-02 08:18:01'),
(2, '2019', '2024-01-02 08:18:09', '2024-01-02 08:18:09'),
(3, '2020', '2024-01-02 08:18:16', '2024-01-02 08:18:16'),
(4, '2021', '2024-01-02 08:18:23', '2024-01-02 08:18:23'),
(5, '2022', '2024-01-02 08:18:30', '2024-01-02 08:18:30'),
(6, '2023', '2024-01-09 07:58:13', '2024-01-09 07:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mathematics', '2024-01-02 08:19:03', '2024-01-02 08:19:03'),
(2, 'English Language', '2024-01-02 08:19:11', '2024-01-02 08:19:11'),
(3, 'Chemistry', '2024-01-02 08:19:18', '2024-01-02 08:19:18'),
(4, 'Physics', '2024-01-02 08:19:26', '2024-01-02 08:19:26'),
(5, 'Biology', '2024-01-02 08:19:33', '2024-01-02 08:19:33'),
(6, 'ICT', '2024-01-02 08:19:40', '2024-01-02 08:19:40'),
(7, 'Geography', '2024-01-02 08:20:01', '2024-01-02 08:20:01'),
(8, 'Global Perspective', '2024-01-02 08:20:08', '2024-01-02 08:20:08'),
(9, 'Numeracy', '2024-01-02 08:21:13', '2024-01-02 08:21:13'),
(10, 'Literacy', '2024-01-02 08:21:20', '2024-01-02 08:21:20'),
(11, 'Science', '2024-01-02 08:21:29', '2024-01-02 08:21:29'),
(12, 'History', '2024-01-02 08:21:37', '2024-01-02 08:21:37'),
(13, 'Arabic', '2024-01-02 08:21:47', '2024-01-02 08:21:47'),
(14, 'Yoruba', '2024-01-02 08:21:53', '2024-01-02 08:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) DEFAULT NULL COMMENT 'Student,Employee,Admin',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `father_email` varchar(255) DEFAULT NULL,
  `mother_email` varchar(255) DEFAULT NULL,
  `father_mobile` varchar(255) DEFAULT NULL,
  `mother_phone` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `id_no` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL COMMENT 'admin=head of software, operator=computer operator, user=employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `father_email`, `mother_email`, `father_mobile`, `mother_phone`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', NULL, '$2y$12$L6i45wknoDqCBraI2E8BYOVMnit1h54MDiagYqKqAr1Z.z2g7ZU8e', NULL, NULL, NULL, '09062684833', 'address', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-01-17 11:52:54'),
(2, 'Student', 'Ali Khan', NULL, NULL, '$2y$12$UoWbBebsuE.VRH4dLv9oeuFa6NWgS0wN/Ca4xE05rPbI2Iom2jUja', NULL, NULL, NULL, '2345678909', 'India', 'male', '202401020932.KINGSLEY JASON CHIBUIKEM.jpg', 'Abu Khan', 'Ma Khan', 'khan@gmail.com', 'makhan@gmail.com', '15171819087', NULL, 'Muslim', 'GVS20180001', '1970-01-01', '8950', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-02 08:32:13', '2024-01-08 13:32:48'),
(3, 'Student', 'John', NULL, NULL, '$2y$12$Bw8UK.H/jFSlGoczu6d5p.kIp30fCOdlFtQJLVLqogkgONXr0wM1O', NULL, NULL, NULL, '1234567890', NULL, 'male', '202401041917.Olumuyiwa Oluwadarasimi.jpg', 'Smith', 'Love', 'smith@gmail.com', 'love@gmail.com', '0923456786', NULL, 'Christianity', 'GVS20200003', '2019-10-29', '8053', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-04 18:17:00', '2024-01-04 18:17:00'),
(4, 'Student', 'Rohim', NULL, NULL, '$2y$12$heIUiJ5aAdjuw1ek/64AaOBmbwE21VJiWft2GK2yST8nZ3iYnuXcm', NULL, NULL, NULL, '34343434345', 'USA', 'female', '202401042303.Niayomi Yussuf Emmanuel.png', 'Abdul', 'Nazma', 'abdul@gmail.com', 'nazma@gmail.com', '454545454545', NULL, 'Christianity', 'GVS20220004', '2019-10-22', '3492', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-04 22:03:59', '2024-01-06 23:20:01'),
(5, 'Student', 'Lily', NULL, NULL, '$2y$12$oSk4I.OcF4.ntCHdao/qVe6gE0j0W7mHFj4GV2nTyO7jWJNJQLfCK', NULL, NULL, NULL, '1314151686', 'Phillipine', 'female', '202401070026.Screenshot 2024-01-06 103422.png', 'Ojo', 'Monalisa', 'ojo@gmail.com', 'monalisa@gmail.com', '1234567890', NULL, 'Muslim', 'GVS20190005', '2013-05-30', '6836', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-06 23:26:21', '2024-01-06 23:26:21'),
(6, 'Student', 'Fawziyan', NULL, NULL, '$2y$12$qMN8x04EwvkFz/NYwZRZY.EZnE3EB9lryMQvdE6KHaVYdqho1yhEG', NULL, NULL, NULL, '3465789087', 'Ikeja Lagos', 'female', '202401070028.Fawziyah.png', 'Sowami', 'Lola', 'sowami@gmail.com', 'love@gmail.com', '3456789098', NULL, 'Muslim', 'GVS20190006', '2000-02-17', '6369', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-06 23:28:55', '2024-01-06 23:28:55'),
(7, 'Student', 'Feranmi', NULL, NULL, '$2y$12$sRFAXVkNz3rOuUXZTegFROl0.LIYgj.5HwAIJAdKKJYFauwlIjOD6', NULL, NULL, NULL, '2526272829', 'Ketu Lagos', 'male', '202401070032.Feranmi_Awotedu.png', 'Awotedu', 'Ademilola', 'awotedu@gmail.com', 'ademilola@gmail.com', '09123456789', NULL, 'Christianity', 'GVS20220007', '2003-01-14', '5272', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-06 23:32:11', '2024-01-06 23:32:11'),
(8, 'Student', 'Andrea', NULL, NULL, '$2y$12$KZscYQejXr3ZtpNim4C16usBo/cZcXv5/LuCqpYQw2nmCBgceiCqG', NULL, NULL, NULL, '1243657698', 'Magodo', 'female', '202401111349.OGIRRI DANIELLA.jpg', 'Anthony', 'Angela', 'anthony@gmail.com', 'angela@gmail.com', '123456789098', NULL, 'Christianity', 'GVS20180008', '2024-01-23', '6138', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-11 12:49:00', '2024-01-11 12:49:00'),
(9, 'Student', 'Amanda', NULL, NULL, '$2y$12$VD7Qos8ZesyRL7HgtLPN0Ob2/MVjNU/82naJ71CCqhmHdKfW0inlC', NULL, NULL, NULL, '123456787676', 'Ketu', 'female', '202401111351.YUSUUF EMMANUELLA NIFEMI.jpg', 'James', 'Amelia', 'james@gmail.com', 'amelia@gmail.com', '9876543210', NULL, 'Christianity', 'GVS20230009', '2009-02-12', '5205', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-11 12:51:31', '2024-01-11 12:51:31'),
(10, 'Student', 'Demilade', NULL, NULL, '$2y$12$qRPpmVZTEQBL9ugZgqCvje9ql54U6FIDYeAMOqG4rGkCcwGg6MPvK', NULL, NULL, NULL, '688643457888', 'Lekki', 'male', '202401111544.demilade pic.png', 'Adesoye', 'Venita', 'adesoye@gmail.com', 'venita@gmail.com', '34678976444', NULL, 'Christianity', 'GVS20180010', '2014-01-14', '4109', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-11 14:44:29', '2024-01-11 14:45:05'),
(11, 'Admin', 'Amos Solomon', 'amos@gmail.com', NULL, '$2y$12$/8sK3AH24i8Szps6s9aeTu70V2bAqbEoCqXwyKtbdSlB8ehKFIHny', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8423', 'Operator', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-19 19:45:36', '2024-01-19 19:45:36'),
(12, 'Employee', 'Afolabi Olalekan', 'afolabi.lalekan@gmail.com', NULL, '$2y$12$Hh7Q.3.iHxNydfi5qxsqVePaKTFfjAabZazedWulu05gAL6OqdzNK', NULL, NULL, NULL, '09030209698', 'Ikorodu Ketu', 'male', '202401202240.OLOWU DASOLA.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Muslim', '2012090001', '1981-02-12', '9570', NULL, '2012-09-12', 1, 470000, 1, NULL, NULL, NULL, '2024-01-20 13:42:26', '2024-01-22 13:34:57'),
(13, 'Employee', 'Ajayi Akintunde', 'ajayi.akintunde@grenvilleschool.com', NULL, '$2y$12$1fHGK7OunHX50pp0LOhzZunBM6n1xssAlNwrPOu.nuJUIJZDGslQq', NULL, NULL, NULL, '08123456789', 'Ogba', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Christianity', '2021050013', '1976-04-09', '8684', NULL, '2021-05-18', 3, 320000, 1, NULL, NULL, NULL, '2024-01-21 11:36:34', '2024-01-21 13:39:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_discounts`
--
ALTER TABLE `student_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_years_name_unique` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_discounts`
--
ALTER TABLE `student_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
