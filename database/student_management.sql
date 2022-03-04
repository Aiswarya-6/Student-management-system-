-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 08:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_03_054924_create_student_table', 1),
(6, '2022_03_03_143055_create_teacher_table', 1),
(7, '2022_03_04_035450_create_studentmarks_table', 2);

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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ReportingTeacherId` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `Name`, `Age`, `Gender`, `ReportingTeacherId`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Aiswarya', 22, 'Female', 1, NULL, '2022-03-03 10:38:44', '2022-03-03 10:38:44'),
(2, 'sheena', 22, 'Female', 1, NULL, '2022-03-03 10:39:58', '2022-03-03 10:39:58'),
(3, 'sheena', 22, 'Female', 1, NULL, '2022-03-03 10:40:30', '2022-03-03 10:40:30'),
(4, 'sheena', 22, 'Female', 1, NULL, '2022-03-03 10:40:54', '2022-03-03 10:40:54'),
(5, 'sheena', 22, 'Female', 1, NULL, '2022-03-03 10:41:14', '2022-03-03 10:41:14'),
(6, 'sheena', 22, 'Female', 1, NULL, '2022-03-03 10:42:33', '2022-03-03 10:42:33'),
(7, 'sheenathomas', 22, 'F', 5, NULL, '2022-03-03 10:42:43', '2022-03-04 01:55:08'),
(8, 'sheena', 22, 'Female', 1, NULL, '2022-03-03 10:42:59', '2022-03-03 10:42:59'),
(9, 'Aiswarya', 25, 'F', 6, '2022-03-04 01:21:01', '2022-03-03 10:43:34', '2022-03-04 01:21:01'),
(10, 'sheena', 22, 'Female', NULL, NULL, '2022-03-03 10:53:27', '2022-03-03 10:53:27'),
(11, 'sheena', 22, 'Female', NULL, NULL, '2022-03-03 10:53:47', '2022-03-03 10:53:47'),
(12, 'Aiswarya', 25, 'on', 1, '0000-00-00 00:00:00', '2022-03-03 11:40:28', '2022-03-03 12:46:59'),
(13, 'Sreepadh', 24, 'on', 3, '2022-03-03 12:46:53', '2022-03-03 11:40:48', '2022-03-03 12:46:53'),
(14, 'Aishudgdf', 47, 'M', 3, '2022-03-03 12:46:01', '2022-03-03 11:42:32', '2022-03-03 12:46:01'),
(15, 'Sreepadh', 24, 'M', 3, NULL, '2022-03-04 01:21:26', '2022-03-04 01:21:26'),
(16, 'Sreepadh mr', 25, 'M', 3, NULL, '2022-03-04 01:54:55', '2022-03-04 01:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentId` int(11) DEFAULT NULL,
  `termSelection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maths` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `science` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `studentId`, `termSelection`, `maths`, `science`, `history`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'one', '25', '20', '15', '2022-03-04 01:24:23', '2022-03-03 23:08:37', '2022-03-04 01:24:23'),
(2, 1, 'two', '30', '50', '75', '2022-03-03 23:47:28', '2022-03-03 23:26:03', '2022-03-03 23:47:28'),
(3, 3, 'two', '65', '50', '41', NULL, '2022-03-04 01:23:32', '2022-03-04 01:54:23'),
(4, 3, 'two', '22', '18', '18', '2022-03-04 01:54:40', '2022-03-04 01:54:37', '2022-03-04 01:54:40'),
(5, 3, 'one', '25', '20', '18', NULL, '2022-03-04 01:58:53', '2022-03-04 01:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ReportingTeacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `ReportingTeacher`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'John', NULL, NULL, NULL),
(2, 'James', NULL, NULL, NULL),
(3, 'Robert', NULL, NULL, NULL),
(4, 'William', NULL, NULL, NULL),
(5, 'Andrew', NULL, NULL, NULL),
(6, 'Dennis', NULL, NULL, NULL),
(7, 'Roy', NULL, NULL, NULL);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
