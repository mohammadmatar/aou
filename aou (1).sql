-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 11:35 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aou`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_id`, `img`, `password`, `name`, `Address`, `summary`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 201801, '1543426527.2014_vaeth_mercedes_benz_a45_amg-wide.jpg', '$2y$10$UUS8iIjjX9/9EtaOhStPmerN7.5TSkTuHcleaucuX86EI5A4glERa', 'sahar', 'Cairo, Egypt', 'Admin of the main branch of jaddah branch this the summary here added...Admin of the main branch of jaddah branch this the summary here added...Admin of the main branch of jaddah branch this the summary here added...Admin of the main branch of jaddah branch this the summary here added', 'izU2j9pXOEBzGYLfO49PUHmQklDhMHk2pPE1Jv9mTdcjUvdfgWab1CzO7EXj', '2018-06-09 13:38:11', '2018-11-28 15:35:27'),
(2, 201802, 'admin.jpg', '$2y$10$BeveVt.wifjE8fzqzQ7HO.WSbie6NCoh7AcrPIAnRPEH7SWSFz0R.', 'Sayed hesham', 'Ryidah, Ksa', 'Admin of the main branch of jaddah branch this the summary here added...Admin of the main branch of jaddah branch this the summary here added...Admin of the main branch of jaddah branch this the summary here added...Admin of the main branch of jaddah branch this the summary here added', NULL, '2018-06-09 13:46:46', '2018-06-09 13:46:46');

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

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `inv_no`, `acc_no`, `inv_img`, `course_id`, `student_id`, `status`, `bank_name`, `notes`, `created_at`, `updated_at`) VALUES
(2, '2', '8', 'invo.png', 2, 1, 0, 'Alahli Bank', NULL, '2018-06-16 01:31:22', '2018-06-16 01:31:22'),
(4, '4', '47', 'invo.png', 5, 1, 1, 'Naser Bank', NULL, '2018-06-16 01:35:40', '2018-06-16 01:35:40'),
(6, '6', '9', 'invo.png', 3, 1, 2, NULL, NULL, '2018-06-17 20:09:59', '2018-06-17 21:34:06'),
(7, '15478jhf', '14256995', 'invo.png', 1, 1, 3, 'QNB', 'Sorry i have a special condition that will stop me of continuing this course', '2018-11-13 13:17:41', '2018-11-23 07:32:53'),
(9, '7887897', '15', '1544118829.2014_vaeth_mercedes_benz_a45_amg-wide.jpg', 7, 1, 1, 'Qatar', NULL, '2018-12-06 15:53:49', '2018-12-06 16:28:43');

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
(1, 'Egypt', 'Cairo,Egypt.', 3, '2018-06-09 00:16:09', '0000-00-00 00:00:00'),
(2, 'Kawiat', 'Kuawait,Kuwait.', 8, '2018-06-09 02:13:15', NULL),
(3, 'Sudan', 'Khartom, Sudan.', 5, '2018-06-09 02:11:10', NULL),
(4, 'Oman', 'Oman, Oman.', 7, '2018-06-09 04:10:20', NULL),
(5, 'Jordan', 'Jordan, Jordan.', 2, '2018-06-09 08:22:27', NULL),
(6, 'KSA', 'Ryidah, KSA.', 1, '2018-06-08 22:00:00', '2018-08-26 20:53:42');

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
(1, 'Data Analysis Course', 'data_analysis.png', 'Data analysis is an important science to be studied. It allows you to analyse data and get user actions and pereferences. Also it is helpful in big companies when it does anything or something.', 500, 120, 1200, 1, 32, 6, 1, 4, 1, '2018-06-12 06:13:33', NULL),
(2, 'Web Design Course', 'web_design.jpg', 'Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied.', 700, 36, 4000, 4, 50, 1, 1, 4, 1, NULL, NULL),
(3, 'Politics Course', 'politics.jpg', 'Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something. Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something. Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something.', 500, 90, 3000, 2, 32, 5, 1, 1, 1, NULL, NULL),
(4, 'Data Analysis Course', 'data_analysis.png', 'Data analysis is an important science to be studied. It allows you to analyse data and get user actions and pereferences. Also it is helpful in big companies when it does anything or something.', 200, 80, 3000, 3, 10, 1, 2, 4, 1, NULL, NULL),
(5, 'Web Design Course', 'web_design.jpg', 'Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied.', 500, 50, 4000, 4, 40, 6, 2, 4, 1, NULL, NULL),
(6, 'Politics Course', 'politics.jpg', 'Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something. Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something. Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something.', 500, 50, 4000, 4, 40, 5, 2, 2, 1, NULL, NULL),
(7, 'Data analysis Course', 'data_analysis.png', 'Data analysis is an important science to be studied. It allows you to analyse data and get user actions and pereferences. Also it is helpful in big companies when it does anything or something.', 400, 90, 4000, 3, 15, 2, 1, 4, 1, NULL, NULL),
(8, 'Web Design Course', 'web_design.jpg', 'Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied.', 200, 120, 2000, 4, 32, 5, 3, 3, 0, NULL, NULL),
(9, 'Security course', '1532738351.login_icon.png', 'Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something. Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something. Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something.', 800, 70, 5000, 4, 20, 3, 1, 5, 0, NULL, '2018-07-27 22:39:11'),
(10, 'Data Analysis Course', 'data_analysis.png', 'Data analysis is an important science to be studied. It allows you to analyse data and get user actions and pereferences. Also it is helpful in big companies when it does anything or something.', 700, 40, 2000, 4, 15, 4, 3, 4, 1, NULL, NULL),
(11, 'Web Design Course', 'web_design.jpg', 'Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied.', 500, 50, 3500, 4, 40, 2, 3, 4, 1, NULL, NULL),
(12, 'Politics Course', 'politics.jpg', 'Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something. Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something. Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something.', 700, 50, 4000, 3, 18, 2, 3, 4, 1, NULL, NULL),
(13, 'Data Analysis Course', 'data_analysis.png', 'Data analysis is an important science to be studied. It allows you to analyse data and get user actions and pereferences. Also it is helpful in big companies when it does anything or something.', 500, 140, 5000, 4, 0, 5, 2, 4, 1, NULL, NULL),
(15, 'Politics Course', 'politics.jpg', 'Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something. Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something. Politics is an important science to be studied. it allows you to learn about law and become a lawer. also it is helpful in big companies when it does anything or something.', 500, 80, 5000, 2, 15, 1, 2, 5, 1, NULL, NULL),
(17, 'Web Design Course', 'web_design.jpg', 'Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied.', 700, 70, 5000, 4, 40, 3, 3, 2, 1, NULL, NULL),
(18, 'Web Design Course', 'web_design.jpg', 'Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied. it allows you to design websites and create resposive websites and pereferences. also it is helpful in big companies when it does anything or something. Web design is an important science to be studied.', 700, 120, 4000, 3, 15, 4, 1, 1, 1, NULL, NULL),
(20, 'Data analysis', '1529194977.politics.jpg', 'Data analysis is an important science to be studied. It allows you to analyse data and get user actions and pereferences. Also it is helpful in big companies when it does anything or something.', 500, 14, 5000, 2, 50, 6, 2, 1, 0, '2018-06-16 22:22:57', '2018-06-17 19:04:17'),
(21, 'ahmad emam', '1544120436.2014_vaeth_mercedes_benz_a45_amg-wide.jpg', 'fghjkl;lkjhgfdsdfghj', 2, 2, 2000, 3, 2, 1, 3, 1, 0, '2018-12-06 16:20:36', '2018-12-06 16:20:36');

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
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inst.png',
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `instructor_id`, `img`, `summary`, `password`, `name`, `Address`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 201801, 'user.png', 'The role is responsible for designing, coding and modifying websites, from layout to function and according to a client\'s specifications.', '$2y$10$eA7TKqKd0nD0Ol/qbYz8POn/peT.ViN.9ExGIPDjdMOlvwq9K2D8G', 'Mostafa Mohamed', 'Giza, Egypt', '2018-06-08 22:53:16', '2018-06-08 22:53:16', 'WZvLBasPHcPiDy6w5eKAmFdicx33N87EwwxnI38xsPfARPVvOdpW60S9KbOZ'),
(2, 201802, 'user.png', 'The role is responsible for designing, coding and modifying websites, from layout to function and according to a client\'s specifications.', '$2y$10$RdST/Hc2Q3S25E8yV2077usj3ibbQR18ov4DphQAWlZCOMoUOmPBq', 'Ahmed Mohamed', 'Cairo, Egypt', '2018-06-09 08:21:08', '2018-06-09 08:21:08', 'A7hb0vZOmjPGRB2LTj1FE3NxiSWrSNl0UXQc6lCMkImOiNI9AuksBpLOZF4F'),
(3, 201803, '1532699591.10343541_645076028906259_962317935502270377_n.jpg', 'The role is responsible for designing, coding and modifying websites, from layout to function and according to a client\'s specifications.', '$2y$10$2CiSmg8fg8IPxV2FdHLrRe7NIzjPl4ORF.u4d06Hz0Gm7/UbrnQ26', 'Abdallah Ali', 'ryidah, ksa', '2018-06-09 08:23:17', '2018-07-27 11:53:11', 's7qRagUBDml3s9xyjzk5hrtt8j3IvXNJXEXShdOlTW22BF0KZKFw9c0oVJPx');

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
(1, '2017_05_16_054037_create_instructors_table', 1),
(2, '2018_03_28_105943_create_sub_admins_table', 1),
(3, '2018_03_28_110358_create_branches_table', 1),
(4, '2018_03_28_115835_create_students_table', 1),
(5, '2018_03_28_115924_create_admins_table', 1),
(6, '2018_03_28_120018_create_courses_table', 1),
(7, '2018_03_28_120303_create_applications_table', 1),
(8, '2018_03_28_122743_create_requests_table', 1),
(9, '2018_05_24_123415_create_fields_table', 1),
(10, '2018_06_17_171944_create_contacts_table', 2),
(11, '2018_06_20_233408_create_signs_table', 3);

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
(1, 0, 0, 20, '2018-06-16 22:22:57', '2018-07-03 16:47:47'),
(2, 0, 0, 8, NULL, NULL),
(3, 0, 0, 21, '2018-12-06 16:20:36', '2018-12-06 16:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `signs`
--

CREATE TABLE `signs` (
  `id` int(10) UNSIGNED NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inst.png',
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signs`
--

INSERT INTO `signs` (`id`, `instructor_id`, `email`, `img`, `summary`, `password`, `name`, `Address`, `cv`, `status`, `created_at`, `updated_at`) VALUES
(1, 201804, NULL, '1529541510.instructor.jpg', 'any sumary about instructor added here....any sumary about instructor added here....any sumary about instructor added here.', '111111', 'مصطفى محمد', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', 0, '2018-06-20 22:38:30', '2018-06-20 23:16:29'),
(2, 201805, NULL, '1529544498.5a84ac8657a7c.jpeg', 'any sumary about instructor added here....any sumary about instructor added here....any sumary about instructor added here.', '123456', 'احمد امام', 'الشيخ زايد', '', 0, '2018-06-20 23:28:18', '2018-06-20 23:28:18'),
(3, 2018030, NULL, '1530655025.images.jpg', 'The role is responsible for designing, coding and modifying websites, from layout to function and according to a client\'s specifications.', '11551994', 'احمد امام', 'الهرم الجيزه', '', 0, '2018-07-03 19:57:05', '2018-07-03 19:57:05'),
(4, 2018031, 'm@m.com', '1544115604.2014_vaeth_mercedes_benz_a45_amg-wide.jpg', 'hhhhhhhhhhhhhhhhhhhhhhhhh', '111111', 'ahmad emam', 'asdasd', '19295.pdf', 0, '2018-12-06 15:00:04', '2018-12-06 15:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'st.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `email`, `phone`, `img`, `password`, `name`, `Address`, `level`, `remember_token`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 201801, NULL, NULL, '1543426217.wp2485528.jpg', '$2y$10$RY6.SdH7tIb8XBpT6NiDruU/0CBGO6t0r9vTPjBBYV7TX/eIupEmu', 'rawand', 'Cairo, Egypt', 1, '3wfqg0BKwhEm6YDT0pR8GUzGcbnYVOK1VRQqDxCrWiyLIrF5MKM9yRqpHVV0', 2, '2018-06-11 16:50:46', '2018-11-28 15:30:17'),
(3, 201803, NULL, NULL, '1532713769.10343541_645076028906259_962317935502270377_n.jpg', '$2y$10$EPaBDHMlnIYWST5MiL9YU.o1GLCizXZbq/ouzkhllIZwPBH7f5AMO', 'Alaa Hossam', 'gadah saudi arbia', 3, NULL, 4, '2018-07-27 15:49:29', '2018-07-27 15:49:29'),
(4, 201804, 'aa', '22222222', '1544019052.2014_vaeth_mercedes_benz_a45_amg-wide.jpg', '$2y$10$VYXq8/emcSiI5Mf2d4gXReBlZqYm0KkZTNIBUYrJnSDWnIiFVSJfq', 'ششششششششش', 'asdasd', 3, NULL, 1, '2018-12-05 12:10:52', '2018-12-05 12:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `sub_admins`
--

CREATE TABLE `sub_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_admin_id` int(11) NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sub.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_admins`
--

INSERT INTO `sub_admins` (`id`, `sub_admin_id`, `img`, `password`, `name`, `Address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 201801, '1532708387.1654355_753621821315683_1947581847_n.jpg', '$2y$10$ZVocS/GxPLTw8gUk/cXoJ.yG.oaJ0gkFhPgMoocRxE0tPTkJyxMFa', 'Abdallah Mohamed', 'Ryidah, KSA.', 'LjvWCM5lodwfOPoILkWfptVfXXF8bbU4KIkT3EikWKEqZ6DqvbbJq8EBSjrJ', '2018-06-09 08:29:38', '2018-07-27 14:19:47'),
(2, 201802, '1532642625.1016560_564586253609353_633338593_n copy.jpg', '$2y$10$6cDhSgf.Z..mbxT4RPOANugA/bjitZFEHqg5H.pomgz5fvBjssX8G', 'Hossam Hasan', 'Jordan, Jordan', '1SxXuWMsjo8w5xYfg99ErNoyrLB9QSLRApEIowJH8nwQyYywWAUcF2mLxZCg', '2018-06-09 08:30:59', '2018-07-26 20:03:46'),
(3, 201803, 'sub.jpg', '$2y$10$VIs1DLwYhJfle.JRdfBUR.9HLxamju0R7vndMql4z8.gD20OXHjp2', 'Mohamed Hassan', 'Cairo, Egypt', NULL, '2018-06-09 08:33:10', '2018-06-09 08:33:10'),
(5, 201804, 'sub.jpg', '$2y$10$q3MMKqN.5j9yvn/SSJhrzuQVcrynL72jGci9TxeWBPBkqEmWFQAaS', 'Mostafa Mohamed', 'khartom, Sudan', NULL, '2018-06-09 15:22:37', '2018-06-09 15:22:37'),
(6, 201805, 'sub.jpg', '$2y$10$SuQDvE9KbuQuboaSbp/2juT.0CjcksCuzEUogrsGlLuFBjVpn85j.', 'Ahmed Emam', 'bahrain, bahrain', NULL, '2018-06-09 15:23:10', '2018-06-09 15:23:10'),
(7, 201806, 'sub.jpg', '$2y$10$iUc9CxYdxNtb0Aif2A4OKezDFdhoQrs4sUMkELdJwxJXG/PPBHGgG', 'Ahmed Emam', 'Oman, Oman', 'Pom3FQvbU8Aidm1yb09HW3X5jB52kqE0KdftYJyiWBtULPRAb3CUbUwqPJP0', '2018-06-09 15:23:50', '2018-06-09 15:23:50'),
(8, 201807, 'sub.jpg', '$2y$10$q84CW2fD01fbNMla5g24ueifcdGYfk86oxVw6cqzQNQOMAsigPH2C', 'Hussein Yasser', 'Kuwait, kuwait', NULL, '2018-06-09 15:25:07', '2018-06-09 15:25:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_admin_id_unique` (`admin_id`);

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
  ADD UNIQUE KEY `instructors_instructor_id_unique` (`instructor_id`);

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
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD KEY `students_branch_id_index` (`branch_id`);

--
-- Indexes for table `sub_admins`
--
ALTER TABLE `sub_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_admins_sub_admin_id_unique` (`sub_admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `signs`
--
ALTER TABLE `signs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_admins`
--
ALTER TABLE `sub_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
