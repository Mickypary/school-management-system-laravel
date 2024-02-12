-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 02:13 PM
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
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `date` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_employee_salaries`
--

INSERT INTO `account_employee_salaries` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 12, '2024-01', 454333.33333333, '2024-02-03 17:20:59', '2024-02-03 17:20:59'),
(2, 13, '2024-01', 309333.33333333, '2024-02-03 17:20:59', '2024-02-03 17:20:59'),
(3, 14, '2024-01', 164333.33333333, '2024-02-03 17:20:59', '2024-02-03 17:20:59'),
(4, 15, '2024-01', 145000, '2024-02-03 17:20:59', '2024-02-03 17:20:59'),
(5, 16, '2024-01', 120000, '2024-02-03 17:20:59', '2024-02-03 17:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `student_id`, `fee_category_id`, `year_id`, `class_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 1, 1, '2024-02', 285, '2024-02-02 12:54:44', '2024-02-02 12:54:44'),
(4, 8, 1, 1, 1, '2024-02', 282, '2024-02-02 12:54:44', '2024-02-02 12:54:44'),
(5, 10, 1, 1, 2, '2024-02', 288, '2024-02-02 12:55:20', '2024-02-02 12:55:20'),
(6, 2, 2, 1, 1, '2024-02', 1520, '2024-02-02 12:59:52', '2024-02-02 12:59:52'),
(7, 8, 2, 1, 1, '2024-02', 1504, '2024-02-02 12:59:52', '2024-02-02 12:59:52'),
(8, 2, 1, 2, 3, '2024-02', 570, '2024-02-02 13:01:40', '2024-02-02 13:01:40'),
(9, 9, 3, 6, 8, '2024-01', 534, '2024-02-02 13:09:11', '2024-02-02 13:09:11');

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
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `date` date NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attendance_status`, `created_at`, `updated_at`) VALUES
(5, 12, '2024-01-26', 'Present', '2024-01-26 19:43:10', '2024-01-26 19:43:10'),
(6, 13, '2024-01-26', 'Leave', '2024-01-26 19:43:10', '2024-01-26 19:43:10'),
(7, 14, '2024-01-26', 'Present', '2024-01-26 19:43:10', '2024-01-26 19:43:10'),
(8, 15, '2024-01-26', 'Leave', '2024-01-26 19:43:10', '2024-01-26 19:43:10'),
(9, 12, '2024-01-25', 'Present', '2024-01-26 19:44:49', '2024-01-26 19:44:49'),
(10, 13, '2024-01-25', 'Present', '2024-01-26 19:44:49', '2024-01-26 19:44:49'),
(11, 14, '2024-01-25', 'Present', '2024-01-26 19:44:49', '2024-01-26 19:44:49'),
(12, 15, '2024-01-25', 'Present', '2024-01-26 19:44:49', '2024-01-26 19:44:49'),
(13, 12, '2024-01-31', 'Absent', '2024-01-26 20:51:30', '2024-01-26 20:51:30'),
(14, 13, '2024-01-31', 'Absent', '2024-01-26 20:51:30', '2024-01-26 20:51:30'),
(15, 14, '2024-01-31', 'Absent', '2024-01-26 20:51:30', '2024-01-26 20:51:30'),
(16, 15, '2024-01-31', 'Absent', '2024-01-26 20:51:30', '2024-01-26 20:51:30'),
(25, 12, '2024-01-27', 'Leave', '2024-01-27 09:22:56', '2024-01-27 09:22:56'),
(26, 13, '2024-01-27', 'Leave', '2024-01-27 09:22:56', '2024-01-27 09:22:56'),
(27, 14, '2024-01-27', 'Leave', '2024-01-27 09:22:56', '2024-01-27 09:22:56'),
(28, 15, '2024-01-27', 'Leave', '2024-01-27 09:22:56', '2024-01-27 09:22:56'),
(29, 16, '2024-01-27', 'Leave', '2024-01-27 09:22:56', '2024-01-27 09:22:56'),
(30, 12, '2024-02-01', 'Absent', '2024-01-27 11:48:24', '2024-01-27 11:48:24'),
(31, 13, '2024-02-01', 'Absent', '2024-01-27 11:48:24', '2024-01-27 11:48:24'),
(32, 14, '2024-02-01', 'Absent', '2024-01-27 11:48:24', '2024-01-27 11:48:24'),
(33, 15, '2024-02-01', 'Absent', '2024-01-27 11:48:24', '2024-01-27 11:48:24'),
(34, 16, '2024-02-01', 'Absent', '2024-01-27 11:48:24', '2024-01-27 11:48:24'),
(35, 12, '2024-02-08', 'Absent', '2024-01-27 11:49:46', '2024-01-27 11:49:46'),
(36, 13, '2024-02-08', 'Absent', '2024-01-27 11:49:46', '2024-01-27 11:49:46'),
(37, 14, '2024-02-08', 'Absent', '2024-01-27 11:49:46', '2024-01-27 11:49:46'),
(38, 15, '2024-02-08', 'Absent', '2024-01-27 11:49:46', '2024-01-27 11:49:46'),
(39, 16, '2024-02-08', 'Absent', '2024-01-27 11:49:46', '2024-01-27 11:49:46');

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
(4, 12, 450000, 470000, 20000, '2024-01-22', '2024-01-22 13:34:57', '2024-01-22 13:34:57'),
(5, 14, 170000, 170000, 0, '1970-01-01', '2024-01-26 14:34:07', '2024-01-26 14:34:07'),
(6, 15, 150000, 150000, 0, '1970-01-01', '2024-01-26 14:36:13', '2024-01-26 14:36:13'),
(7, 16, 120000, 120000, 0, '1970-01-01', '2024-01-26 21:24:08', '2024-01-26 21:24:08');

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
-- Table structure for table `global_settings`
--

CREATE TABLE `global_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `reg_prefix` varchar(255) DEFAULT NULL,
  `institute_email` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) NOT NULL,
  `grade_point` varchar(255) NOT NULL,
  `start_mark` varchar(255) NOT NULL,
  `end_mark` varchar(255) NOT NULL,
  `start_point` varchar(255) NOT NULL,
  `end_point` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `grade_name`, `grade_point`, `start_mark`, `end_mark`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5', '80', '100', '5', '5', 'Excellent', '2024-01-30 14:02:38', '2024-02-08 09:15:37'),
(2, 'A', '4', '70', '79', '4', '4.99', 'Very Good', '2024-01-31 06:14:16', '2024-02-08 09:19:44'),
(3, 'B', '3.5', '60', '69', '3.5', '3.99', 'Good', '2024-01-31 06:16:20', '2024-02-08 09:19:52'),
(4, 'C', '3', '50', '59', '3', '3.49', 'Average', '2024-01-31 06:18:28', '2024-02-08 09:20:01'),
(5, 'D', '2', '40', '49', '2', '2.99', 'Fair', '2024-01-31 06:21:26', '2024-02-08 09:20:11'),
(6, 'E', '1', '30', '39', '1', '1.99', 'Needs Improvement', '2024-01-31 06:23:36', '2024-02-08 09:20:18'),
(7, 'F', '0', '0', '38', '0', '0.99', 'Fail', '2024-01-31 06:26:46', '2024-02-08 09:21:26');

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
(21, '2024_01_23_120749_create_employee_leaves_table', 4),
(22, '2024_01_26_110526_create_employee_attendances_table', 5),
(23, '2024_01_27_160007_create_student_marks_table', 6),
(24, '2024_01_30_134810_create_marks_grades_table', 7),
(25, '2024_01_31_074836_create_account_student_fees_table', 8),
(26, '2024_02_02_211816_create_account_employee_salaries_table', 9),
(27, '2024_02_03_185934_create_other_account_costs_table', 10),
(28, '2024_02_07_151150_create_global_settings_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `other_account_costs`
--

CREATE TABLE `other_account_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_account_costs`
--

INSERT INTO `other_account_costs` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '2024-02-06', 1000, 'Web Devvvvvv', '202402060945website image 370 x 250.png', '2024-02-06 08:25:13', '2024-02-06 08:45:33');

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
('1kxrnsNyYTc33JImmikhEzl2z2m4DtZMdSEGpifu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibzR1aUxnUFI5TW92d3hTNWJFS05YaFFyejZrMW1oQXhsTlB5OW9MMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJEw2aTQ1d2tub0RxQ0JyYUkyRThCWU9WTW5pdDFoNTRNRGlhZ1lxS3FBcjFaLnoyZzdaVThlIjt9', 1707732576),
('hmXg6KYKL82BWbhkbYnbDA5v4zQ9G9lcJvlcBPyS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidkZzeXpYM04wOTJlM2xBQ0RyZXBwQVJTSWtwVmQyaDVjMnMyVkpsUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkTDZpNDV3a25vRHFDQnJhSTJFOEJZT1ZNbml0MWg1NE1EaWFnWXFLcUFyMVouejJnN1pVOGUiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcmVwb3J0cy9zdHVkZW50L3Jlc3VsdC92aWV3Ijt9czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0OToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3JlcG9ydHMvc3R1ZGVudC9yZXN1bHQvdmlldyI7fX0=', 1707669633),
('JiA2Qy8sT7XjffoOdLCf2sn6cjBGxcDTn7aMnjjI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicVRTZ1FCTkh0dkZPZlFYY1l3UTNqdUVQcHhkWU81Z1lnTEVOWUtGVCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjUzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcmVwb3J0cy9tYXJrc2hlZXQvZ2VuZXJhdGUvdmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1707741646);

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
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id=user_id',
  `id_no` varchar(255) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(3, 2, 'GVS20180001', 1, 1, 10, 1, 50, '2024-01-30 09:37:13', '2024-01-30 09:37:13'),
(4, 8, 'GVS20180008', 1, 1, 10, 1, 90, '2024-01-30 09:37:13', '2024-01-30 09:37:13'),
(7, 2, 'GVS20180001', 1, 1, 9, 1, 90, '2024-02-09 20:59:40', '2024-02-09 20:59:40'),
(8, 8, 'GVS20180008', 1, 1, 9, 1, 18, '2024-02-09 20:59:40', '2024-02-09 20:59:40'),
(9, 2, 'GVS20180001', 1, 1, 12, 1, 55, '2024-02-11 11:02:09', '2024-02-11 11:02:09'),
(10, 8, 'GVS20180008', 1, 1, 12, 1, 67, '2024-02-11 11:02:09', '2024-02-11 11:02:09'),
(11, 2, 'GVS20180001', 1, 1, 11, 1, 100, '2024-02-11 11:02:32', '2024-02-11 11:02:32'),
(12, 8, 'GVS20180008', 1, 1, 11, 1, 88, '2024-02-11 11:02:32', '2024-02-11 11:02:32');

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
(2, 'Student', 'Ali Khan', NULL, NULL, '$2y$12$UoWbBebsuE.VRH4dLv9oeuFa6NWgS0wN/Ca4xE05rPbI2Iom2jUja', NULL, NULL, NULL, '2345678909', 'India', 'male', 'ade.jpg', 'Abu Khan', 'Ma Khan', 'khan@gmail.com', 'makhan@gmail.com', '15171819087', NULL, 'Muslim', 'GVS20180001', '1970-01-01', '8950', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-01-02 08:32:13', '2024-01-08 13:32:48'),
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
(13, 'Employee', 'Ajayi Akintunde', 'ajayi.akintunde@grenvilleschool.com', NULL, '$2y$12$1fHGK7OunHX50pp0LOhzZunBM6n1xssAlNwrPOu.nuJUIJZDGslQq', NULL, NULL, NULL, '08123456789', 'Ogba', 'male', '202401261452.demilade pic.png', NULL, NULL, NULL, NULL, NULL, NULL, 'Christianity', '2021050013', '1976-04-09', '8684', NULL, '2021-05-18', 3, 320000, 1, NULL, NULL, NULL, '2024-01-21 11:36:34', '2024-01-26 13:52:21'),
(14, 'Employee', 'Michael Oyewumi', 'michaeloyewumi@gmail.com', NULL, '$2y$12$JffsQTVflxl56/R0FazfiuVCupsgiE4NwE7DFPpY3RH0yMFmoRrIy', NULL, NULL, NULL, '09123456787', 'Ikeja', 'male', '202401261534.Mofeoluwa Lawal.JPG', NULL, NULL, NULL, NULL, NULL, NULL, 'Christianity', '2023100014', '1983-06-22', '8435', NULL, '2023-10-17', 3, 170000, 1, NULL, NULL, NULL, '2024-01-26 14:34:07', '2024-01-26 14:34:07'),
(15, 'Employee', 'Eno Adesida', 'eno.adesida@grenvilleschool.com', NULL, '$2y$12$lygxx3YQ11npV0Ih5r6WLu6/ZMTiTesKvGB0JvpYZPtYXH0sQzOdy', NULL, NULL, NULL, '08123456789', 'Egbeda', 'female', '202401261536.ololade_fasanya.png', NULL, NULL, NULL, NULL, NULL, NULL, 'Christianity', '2021060015', '1986-08-13', '3287', NULL, '2021-06-16', 1, 150000, 1, NULL, NULL, NULL, '2024-01-26 14:36:13', '2024-01-26 14:36:13'),
(16, 'Employee', 'Courage Agbon', 'courage.agbon@grenvilleschool.com', NULL, '$2y$12$4QA0BTp.uF8vpLv2rUHDv.XBDq1Xck61gYOdVL5cMqBuaus4gZaN6', NULL, NULL, NULL, '1234567890', 'Magodo', 'female', '202401262224.Okorafor_Amanda.JPG', NULL, NULL, NULL, NULL, NULL, NULL, 'Christianity', '2021050016', '1989-02-09', '7330', NULL, '2021-05-18', 2, 120000, 1, NULL, NULL, NULL, '2024-01-26 21:24:08', '2024-01-26 21:24:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `global_settings`
--
ALTER TABLE `global_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

--
-- Indexes for table `marks_grades`
--
ALTER TABLE `marks_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_account_costs`
--
ALTER TABLE `other_account_costs`
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
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `global_settings`
--
ALTER TABLE `global_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `other_account_costs`
--
ALTER TABLE `other_account_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
