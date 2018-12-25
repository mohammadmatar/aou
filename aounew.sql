-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2018 at 04:21 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.13-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aounew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_id`, `name`, `email`, `address`, `img`, `password`, `phone_number`, `summary`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 201801, 'Sahar', 'admin@aou.com', 'Riyadh Saudi Arabia', 'admin.png', '$2y$10$0DBuxjA7NnOktpz/SqYrHe5hDkUbBOr5KKdLpr3jL5nyvEUYQ5Ty6', '1234567890', 'I am the Admin of AOU website', 'admin', 'q40fL6nko7MnPSUh43RYonbnUt7gqoH5UNpadWJynoiu7XptGyEHALMyScpZ', '2018-12-21 08:57:30', '2018-12-21 09:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `inv_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inv_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'invo.png',
  `course_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `location`, `sub_admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Riyadh', 'Riyadh', 3, '2018-06-09 00:16:09', '0000-00-00 00:00:00'),
(2, 'Jeddah', 'Jeddah', 1, '2018-06-09 02:13:15', '2018-12-23 16:44:39'),
(3, 'Dammam', 'Dammam', 5, '2018-06-09 02:11:10', NULL),
(4, 'Medina', 'Medina', 7, '2018-06-09 04:10:20', NULL),
(5, 'Al-Hasa', 'Al-Hasa', 1, '2018-06-09 08:22:27', '2018-12-21 23:27:27'),
(6, 'Hail', 'Hail', 1, '2018-06-08 22:00:00', '2018-08-26 20:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Mostafa Mohamed', 'mostafamohmed59@gmail.com', 'مرحبا بك فى موقعنا', 'hhhhhhhhhhhhhhhhhhhhhhhhhhh', '2018-06-17 15:24:26', '2018-06-17 15:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `instuctor_id` int(10) UNSIGNED NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `img`, `summary`, `discount`, `hours`, `price`, `level`, `seats`, `branch_id`, `instuctor_id`, `field_id`, `status`, `created_at`, `updated_at`) VALUES
(22, 'Java Development', '1545588150.Passed_JXFE-26.png', 'Java development', 10, 100, 1000, 3, 20, 1, 1, 4, 1, '2018-12-23 16:02:30', '2018-12-23 16:25:41'),
(23, 'Mohammad', '1545679306.passed_JXFE-24.png', '123213213adasdasdasdas', 767, 66, 876, 1, 876, 1, 1, 1, 0, '2018-12-24 17:21:46', '2018-12-24 17:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Management', NULL, NULL),
(2, 'Accounting', NULL, NULL),
(3, 'Economics', NULL, NULL),
(4, 'Technology', NULL, NULL),
(5, 'Geography', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(10) UNSIGNED NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-user.png',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `instructor_id`, `img`, `name`, `email`, `phone_number`, `password`, `address`, `cv`, `status`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '1545679174.Passed_JXFE-20.png', 'Mohammad Matar', 'm@m.com', '1234567890', '$2y$10$BrjqqOny2nouiUh1OEeZDO7BtqLKB9TyVkiuptowOkD/WJlR8JLxi', 'Amman Jordan', '1545156662.200375030-1_198005_30994595542.pdf', 1, 'ysG0JGMNdQo4V9wXKx9mIK3J21545156662', 'HbYMLl9bl0f8abmEzSASLyMa3rq69dUVVi5uBWV4kexl2IiE7kSNnaXePQ5h', '2018-12-18 16:39:33', '2018-12-24 17:19:34'),
(4, 4, 'default-user.png', 'Mohammad', 'a@a.com', '0987654321', '$2y$10$Ygw0ZZMuXUNX56Ivz85VFuYK5wEUTl/Xd5z64/1RcDT79wH5wK3S2', 'Cairo', '1545589895.200375030-1_198005_30994595542.pdf', 1, 'UpvhBy0rwLH9VPU7FeWre4inS1545589895', NULL, '2018-12-23 16:57:06', '2018-12-23 16:57:06'),
(5, 7, 'default-user.png', '123213', 'sourcing_user@jamalon.com', '1234567890', '$2y$10$TvrLfr4dZh3.SjA3kRgnaOoXJPwzQHec1t.DfzrGVRRCaU8U6PVI6', 'Amman', '1545635646.sick.jpeg', 1, 'OzSlJQ3SkZ2ahoJJTepbpsL4W1545635646', NULL, '2018-12-24 16:42:32', '2018-12-24 16:42:32'),
(6, 9, 'default-user.png', 'munir matar', 'm.mm@m.com', '123223432432', '$2y$10$onFKiQuWMAatzWv9NlcNL.jLs0m7B7TiRAfhzSqk6u8z52QQh.FGm', 'Amman', '1545677068.arabic_1.jpg', 1, 'hUsSZOvmz91Z2riB5vDcBg4Em1545677068', NULL, '2018-12-24 16:48:14', '2018-12-24 16:48:14');

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
(3, '2018_03_28_110358_create_branches_table', 1),
(6, '2018_03_28_120018_create_courses_table', 1),
(7, '2018_03_28_120303_create_applications_table', 1),
(9, '2018_05_24_123415_create_fields_table', 1),
(10, '2018_06_17_171944_create_contacts_table', 2),
(19, '2017_05_16_054037_create_instructors_table', 3),
(23, '2018_03_28_122743_create_requests_table', 3),
(26, '2018_03_28_115835_create_students_table', 4),
(28, '2018_03_28_105943_create_sub_admins_table', 5),
(29, '2018_03_28_115924_create_admins_table', 5),
(30, '2018_06_20_233408_create_signs_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_status` int(11) NOT NULL DEFAULT '0',
  `admin_status` int(11) NOT NULL DEFAULT '0',
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `sub_status`, `admin_status`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 22, '2018-12-23 16:02:30', '2018-12-23 16:25:41'),
(2, 0, 0, 23, '2018-12-24 17:21:46', '2018-12-24 17:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `signs`
--

CREATE TABLE `signs` (
  `id` int(10) UNSIGNED NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-user.png',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signs`
--

INSERT INTO `signs` (`id`, `instructor_id`, `img`, `name`, `email`, `phone_number`, `password`, `address`, `cv`, `status`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 7, 'default-user.png', '123213', 'sourcing_user@jamalon.com', '1234567890', '$2y$10$TvrLfr4dZh3.SjA3kRgnaOoXJPwzQHec1t.DfzrGVRRCaU8U6PVI6', 'Amman', '1545635646.sick.jpeg', 1, 'OzSlJQ3SkZ2ahoJJTepbpsL4W1545635646', NULL, '2018-12-24 05:14:06', '2018-12-24 16:42:31'),
(2, 8, 'default-user.png', 'Mohammad', 'cc_user@jamalon.com', '1234567890', '$2y$10$8GIdyuAaMKSLXItuTAZCounx45rre7qsSYzuQ5x6vKgKQAK38pxyO', 'Amman Jordan', '1545635714.2018-12-05 12:48:20.png', 2, 'bNf2yBMd5CXogzlsTPDggvfX11545635714', NULL, '2018-12-24 05:15:14', '2018-12-24 16:42:29'),
(3, 9, 'default-user.png', 'munir matar', 'm.mm@m.com', '123223432432', '$2y$10$onFKiQuWMAatzWv9NlcNL.jLs0m7B7TiRAfhzSqk6u8z52QQh.FGm', 'Amman', '1545677068.arabic_1.jpg', 1, 'hUsSZOvmz91Z2riB5vDcBg4Em1545677068', NULL, '2018-12-24 16:44:28', '2018-12-24 16:48:13'),
(4, 10, 'default-user.png', 'Mohammad', 'm.a@mm.com', '1232423423423', '$2y$10$L5vATd8XAGIcWvu.3jsMluTikGTFcE14DdWIpA9CYMaUffF8GREVa', 'Amman', '1545678122.hotmail.jpg', 0, 'yh31dAA8Vnv6GT27JeMlgelzB1545678122', NULL, '2018-12-24 17:02:02', '2018-12-24 17:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-user.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `img`, `password`, `name`, `level`, `branch_id`, `email`, `confirmed`, `phone_number`, `address`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'default-user.png', '$2y$10$/Gc2fmUzOhH7HzktdwcM5u6mifuHDp3HSx1LRLVD2kZxorMdtQ2m6', 'Mohammad', 3, 2, 'm.matar@jamalon.com', 1, '12234567890', 'Amman', '85r6ubpSD8ppMdBi8BEZtcTYa1545440195', 'om5YdVo46lse48INtdo1OnNy9mUpABgCOeVetNXVKcWA9pNhG5gzf6jLZe7N', '2018-12-21 22:56:35', '2018-12-22 08:43:43'),
(2, 2, 'default-user.png', '$2y$10$Hb5gYtYRxMxzEpt6HTafCe2O6hIzHahvXva2/6FaO0/DO8XcQKsse', 'Sahar', 2, 4, 'm.munir.matar@gmail.com', 1, '1234567890', 'Riyadh', 'ZbB0xgD6lyTWKarmsJuceubfo1545474701', 'Loj8KA8FPaEZnrnmL2ke3iTn4VhJcioBKIWbxfmRsqn5ozQlNadoneJ1F2iO', '2018-12-22 08:24:06', '2018-12-22 09:12:46'),
(3, 3, 'default-user.png', '$2y$10$zJe0Ddmh/IQ1NJuELm7cN.uNLzOE9S75vm7GYiF0mJFQiiqRGrbZa', 'Mohammad', 3, 6, 'm.matar@gmail.com', 0, '0786186287', 'Amman', 'LzgAYgvXA7TLDF65MvxOSDSSR1545677612', NULL, '2018-12-24 16:53:32', '2018-12-24 16:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `sub_admins`
--

CREATE TABLE `sub_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_admin_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sub.png',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_admins`
--

INSERT INTO `sub_admins` (`id`, `sub_admin_id`, `name`, `img`, `email`, `phone_number`, `address`, `password`, `summary`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 201801, 'Mohammad', '1545396320.47575875_10217866244517898_4144524555945246720_n.jpg', 'm.matar@m.com', '0987654321', 'Jeddah', '$2y$10$5wEJ8lK/6tdwmb0o81rMgeY9hp0lDI//Kb6pesz.cm7lK5jIGerKW', 'I am the admin of Jeddah', 'sub_admin', 'MfP6ewNMII53PIK1sVYiAFaORIuXPakSKDLKnVjHAqjXxvXMd2IH8KoHiezZ', '2018-12-21 10:45:20', '2018-12-22 20:45:03'),
(2, 201802, 'Sahar', '1545396506.best_startups.png', 'sahar@m.com', '0987654321', 'Riyadh', '$2y$10$kY/4X.Y4nb3EyEGON4WF4eR4VsKrntGG8y1Ip8xED4mvKi8WoiMny', 'I am the admin of riyadh', 'sub_admin', 'dywD352X0wYvi2Y2eWVrAoHSQoPRL8fIlmbxzbDwryYj6O7QrYNert9k1jPL', '2018-12-21 10:48:26', '2018-12-21 10:57:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_admin_id_unique` (`admin_id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inv_no` (`inv_no`),
  ADD KEY `applications_course_id_index` (`course_id`),
  ADD KEY `applications_student_id_index` (`student_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_sub_admin_id_index` (`sub_admin_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_branch_id_index` (`branch_id`),
  ADD KEY `courses_instuctor_id_index` (`instuctor_id`),
  ADD KEY `courses_field_id_index` (`field_id`) USING BTREE;

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructors_instructor_id_unique` (`instructor_id`),
  ADD UNIQUE KEY `instructors_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_course_id_index` (`course_id`);

--
-- Indexes for table `signs`
--
ALTER TABLE `signs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `signs_instructor_id_unique` (`instructor_id`),
  ADD UNIQUE KEY `signs_email_unique` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_branch_id_index` (`branch_id`);

--
-- Indexes for table `sub_admins`
--
ALTER TABLE `sub_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_admins_sub_admin_id_unique` (`sub_admin_id`),
  ADD UNIQUE KEY `sub_admins_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `signs`
--
ALTER TABLE `signs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_admins`
--
ALTER TABLE `sub_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_sub_admin_id_foreign` FOREIGN KEY (`sub_admin_id`) REFERENCES `sub_admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_instuctor_id_foreign` FOREIGN KEY (`instuctor_id`) REFERENCES `instructors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
