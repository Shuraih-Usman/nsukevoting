-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 12:39 PM
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
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `email`, `password`, `created_at`) VALUES
(1, 'Shuraihu Usman', 'admin@mail.com', '$2y$12$RqmXC3DIMQOar77ZhMZbdOFp24BmMw1cDBh8Tu6bVP0SwcosbSrAO', '2024-05-17 19:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `position_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `fullname`, `nickname`, `level`, `image`, `gender`, `status`, `created_at`, `position_id`, `updated_at`) VALUES
(2, 'Shuraihu Usman Abdulaziz', 'Team 1', '400', '1716010071.jpg', 'Male', 0, '2024-05-18 12:27:51', 3, '2024-05-18 12:27:51'),
(3, 'Yahaya Musa', 'Team 2', '200', '1716055531.png', 'male', 0, '2024-05-19 01:05:31', 3, '2024-05-19 01:05:31'),
(4, 'John Doe', 'Team 3', '200', '1716055551.jpg', 'male', 0, '2024-05-19 01:05:51', 3, '2024-05-19 01:05:51'),
(5, 'Margot Yesufu', 'Team 3', '400', '1716055578.jpg', 'male', 0, '2024-05-19 01:06:18', 4, '2024-05-19 01:06:18'),
(6, 'Candidate 6', 'Team 3', '400', '1716055596.jpg', 'female', 0, '2024-05-19 01:06:36', 4, '2024-05-19 01:06:36'),
(7, 'Candidate 6', 'Team 3', '400', '1716055603.jpg', 'female', 0, '2024-05-19 01:06:43', 4, '2024-05-19 01:06:43'),
(8, 'Candidate 7', 'Team 3', '400', '1716055606.jpg', 'female', 0, '2024-05-19 01:06:46', 4, '2024-05-19 01:06:46'),
(9, 'Candidate 8', 'Team 3', '400', '1716055615.jpg', 'male', 0, '2024-05-19 01:06:55', 5, '2024-05-19 01:06:55'),
(10, 'Candidate 9', 'Team 3', '400', '1716055619.jpg', 'male', 0, '2024-05-19 01:06:59', 5, '2024-05-19 01:06:59'),
(11, 'Candidate 10', 'Team 3', '400', '1716055623.jpg', 'male', 0, '2024-05-19 01:07:03', 5, '2024-05-19 01:07:03'),
(12, 'Candidate 11', 'Team 3', '400', '1716055627.jpg', 'male', 0, '2024-05-19 01:07:07', 6, '2024-05-19 01:07:07'),
(13, 'Candidate 12', 'Team 3', '400', '1716055630.jpg', 'male', 0, '2024-05-19 01:07:10', 6, '2024-05-19 01:07:10'),
(14, 'Candidate 13', 'Team 3', '400', '1716055633.jpg', 'male', 0, '2024-05-19 01:07:13', 6, '2024-05-19 01:07:13'),
(15, 'Usman Abdulaziz', 'Team 11', '300', '1716137690.png', 'male', 0, '2024-05-19 23:54:50', 3, '2024-05-19 23:54:50'),
(16, 'Shuraihu Usman', 'Team 11', '300', '1717604017.jpg', 'male', 0, '2024-06-05 23:13:37', 6, '2024-06-05 23:13:37'),
(17, 'Test Candidate 1', 'Team 1', '400', '1732102025.jpg', 'male', 0, '2024-11-20 19:27:05', 3, '2024-11-20 19:27:05'),
(18, 'Test Candidate 1', 'Team 1', '400', '1732102026.jpg', 'male', 0, '2024-11-20 19:27:06', 3, '2024-11-20 19:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `election_time`
--

CREATE TABLE `election_time` (
  `id` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `election_time`
--

INSERT INTO `election_time` (`id`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, '2024-11-20 03:33:00', '2024-11-21 03:33:00', '2024-05-19 14:58:16', '2024-05-19 14:58:16');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'President', 0, '2024-05-18 20:57:40', '2024-05-18 20:57:40'),
(4, 'Vice President', 0, '2024-05-19 00:59:07', '2024-05-19 00:59:07'),
(5, 'Scecretary general', 0, '2024-05-19 00:59:23', '2024-05-19 00:59:23'),
(6, 'Vice Secretary General', 0, '2024-05-19 00:59:35', '2024-05-19 00:59:35'),
(7, 'Library', 0, '2024-05-19 23:53:06', '2024-05-19 23:53:06'),
(8, 'COurse Rep', 0, '2024-05-19 23:53:52', '2024-05-19 23:53:52'),
(9, 'SUG President', 0, '2024-11-20 19:29:43', '2024-11-20 19:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `matric_number` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `level` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `matric_number`, `otp`, `date_of_birth`, `email`, `phone`, `status`, `image`, `level`, `gender`, `created_at`, `updated_at`) VALUES
(2, 'Shuraihu Usman', '021949029383', NULL, '2024-05-15', 'shuraihusman@gmail.com', '08140419490', 1, '1716043965.png', '200', 'male', '2024-05-18 21:52:45', '2024-05-19 20:22:30'),
(3, 'usman Usman', '08140419490', NULL, '2024-05-19', 'hausaebooks@gmail.com', '08140419490', 1, '1716137777.jpg', '300', 'male', '2024-05-19 23:56:17', '2024-05-20 00:02:45'),
(4, 'Shuraihu Usman', '081404194901', NULL, '2024-05-20', 'shuraihusman@gmail.com', '08140419490', 1, '1716205729.jpg', '200', 'male', '2024-05-20 18:48:49', '2024-05-20 18:50:52'),
(5, 'Abraham', '3232333334', NULL, '2024-05-20', 'ab4jamb@gmail.com', '3232333334', 1, '1716221683.jpg', '200', 'male', '2024-05-20 23:14:43', '2024-05-20 23:19:36'),
(6, 'Shuraihu Usman', '081404194905555', NULL, '2024-06-02', 'shuraihusman@gmail.com', '081404194905555', 1, '1717353464.jpg', '400', 'male', '2024-06-03 01:37:44', '2024-06-03 01:41:21'),
(7, 'Shuraihu Usman', '555656655656', NULL, '2024-06-19', 'shuraihusman@gmail.com', '08140419490', 0, '1717603986.jpg', '100', 'male', '2024-06-05 23:13:06', '2024-06-05 23:13:06'),
(8, 'usman Usman', '0814041949033', '979676', '2024-10-16', 'brytedree@gmail.com', '08140419490', 0, '1729200710.jpg', '400', 'male', '2024-10-18 04:31:50', '2024-10-18 04:34:03'),
(9, 'usman Usman', '0814041949033', NULL, '2024-10-16', 'shuraihusman@gmail.com', '08140419490', 0, '1729200820.jpg', '400', 'male', '2024-10-18 04:33:40', '2024-10-18 04:33:40'),
(10, 'Shuraihu Usmanwwee', '232323232323', '318531', '2024-10-17', 'shuraihusman@gmail.com', '08140419490', 0, '1729200881.webp', '300', 'male', '2024-10-18 04:34:41', '2024-10-18 04:36:49'),
(11, 'Student test 1', '0000', NULL, '2024-11-28', 'student@mail.com', '08140419490', 0, '1732102142.jpg', '200', 'male', '2024-11-20 19:29:02', '2024-11-20 19:29:02'),
(12, 'student 2', '1111', NULL, '2024-11-21', 'hausaebooks@gmail.com', '08140419490', 1, '1732102279.jpg', '300', 'male', '2024-11-20 19:31:19', '2024-11-20 19:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `student_id`, `candidate_id`, `election_id`, `created_at`, `updated_at`) VALUES
(6, 2, 3, 3, '2024-05-19 09:27:22', '2024-05-19 09:27:22'),
(7, 2, 7, 4, '2024-05-19 09:27:22', '2024-05-19 09:27:22'),
(8, 2, 10, 5, '2024-05-19 09:27:22', '2024-05-19 09:27:22'),
(9, 2, 13, 6, '2024-05-19 09:27:23', '2024-05-19 09:27:23'),
(10, 3, 15, 3, '2024-05-20 00:02:45', '2024-05-20 00:02:45'),
(11, 3, 5, 4, '2024-05-20 00:02:45', '2024-05-20 00:02:45'),
(12, 3, 9, 5, '2024-05-20 00:02:45', '2024-05-20 00:02:45'),
(13, 3, 12, 6, '2024-05-20 00:02:45', '2024-05-20 00:02:45'),
(14, 4, 3, 3, '2024-05-20 18:50:51', '2024-05-20 18:50:51'),
(15, 4, 6, 4, '2024-05-20 18:50:51', '2024-05-20 18:50:51'),
(16, 4, 9, 5, '2024-05-20 18:50:51', '2024-05-20 18:50:51'),
(17, 4, 12, 6, '2024-05-20 18:50:51', '2024-05-20 18:50:51'),
(18, 5, 3, 3, '2024-05-20 23:19:36', '2024-05-20 23:19:36'),
(19, 5, 5, 4, '2024-05-20 23:19:36', '2024-05-20 23:19:36'),
(20, 5, 9, 5, '2024-05-20 23:19:36', '2024-05-20 23:19:36'),
(21, 5, 12, 6, '2024-05-20 23:19:36', '2024-05-20 23:19:36'),
(22, 6, 3, 3, '2024-06-03 01:41:21', '2024-06-03 01:41:21'),
(23, 6, 5, 4, '2024-06-03 01:41:21', '2024-06-03 01:41:21'),
(24, 6, 9, 5, '2024-06-03 01:41:21', '2024-06-03 01:41:21'),
(25, 6, 13, 6, '2024-06-03 01:41:21', '2024-06-03 01:41:21'),
(26, 12, 3, 3, '2024-11-20 19:36:48', '2024-11-20 19:36:48'),
(27, 12, 5, 4, '2024-11-20 19:36:48', '2024-11-20 19:36:48'),
(28, 12, 9, 5, '2024-11-20 19:36:48', '2024-11-20 19:36:48'),
(29, 12, 16, 6, '2024-11-20 19:36:49', '2024-11-20 19:36:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidates_position` (`position_id`);

--
-- Indexes for table `election_time`
--
ALTER TABLE `election_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vote_1` (`student_id`),
  ADD KEY `vote_2` (`candidate_id`),
  ADD KEY `vote_3` (`election_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `election_time`
--
ALTER TABLE `election_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_position` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `vote_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vote_2` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`),
  ADD CONSTRAINT `vote_3` FOREIGN KEY (`election_id`) REFERENCES `positions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
