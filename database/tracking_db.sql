-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 07:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_list`
--

CREATE TABLE `attendance_list` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `classroom` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0=Off-time,1=Early-Time,2=In-Time,3=Late-Time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_list`
--

INSERT INTO `attendance_list` (`id`, `date`, `firstname`, `lastname`, `subject`, `classroom`, `status`) VALUES
(1, '2023-06-26 00:00:00', 'Mohammad Del Nazz', 'Ho', 'English', 'Class_002_NIgga_G11', 0),
(23, '2023-06-30 04:04:53', 'Zedtic Marc', 'Acaoz', 'English', 'Class_001_Apollo_G12', 0),
(25, '2023-07-02 02:49:25', 'AdministratorX', 'nigga', 'English', 'Class_002_NIgga_G11', 0),
(28, '2023-07-02 11:51:37', 'Zedtic Marccc', 'cc', 'Math 101', 'Class_001_Apollo_G12', 0),
(29, '2023-07-02 11:58:44', 'AdministratorX', 'niggaz', 'English', 'Class_001_Apollo_G12', 0),
(30, '2023-07-02 12:37:35', 'Leo Aljon', 'Padilla', 'Programming', 'Class_001_Apollo_G12', 0),
(31, '2023-07-02 12:37:48', 'Leo Aljon', 'Padilla', 'Programming', 'Class_001_Apollo_G12', 0),
(32, '2023-07-02 12:40:02', 'Zedtic Marc', 'Acao', 'Programming', 'Class_003_Zeus_G12', 0),
(34, '2023-07-02 04:29:45', 'nigga', 'niggaz', 'English', 'Class_002_NIgga_G11', 0),
(35, '2023-07-02 04:30:33', 'nigga', 'niggaz', 'English', 'Class_002_NIgga_G11', 0),
(37, '2023-07-02 06:25:48', 'Leo Aljon', 'Padilla', 'Programming', 'Class_003_Zeus_G12', 0),
(38, '2023-07-03 03:28:54', 'Leo Aljon', 'Padilla', 'Programming', 'Class_003_Zeus_G12', 0),
(39, '2023-07-05 09:42:35', 'Mohammad Del Nazz', 'Ho', 'English', 'Class_003_Zeus_G12', 0),
(40, '2023-07-05 04:25:50', 'Leo Aljon', 'Padilla', 'English', 'Class_003_Zeus_G12', 0),
(41, '2023-07-06 12:59:34', 'VIsitor', 'VIsitor', 'Programming', 'Class_001_Apollo_G12', 0),
(42, '2023-07-06 02:22:31', 'VIsitor', 'VIsitor', 'Programming', 'Class_002_NIgga_G11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classroom_list`
--

CREATE TABLE `classroom_list` (
  `id` int(30) NOT NULL,
  `class_id` varchar(250) NOT NULL,
  `class_name` varchar(250) NOT NULL,
  `grade_level` varchar(250) NOT NULL,
  `students` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom_list`
--

INSERT INTO `classroom_list` (`id`, `class_id`, `class_name`, `grade_level`, `students`) VALUES
(1, 'Class_001', 'Apollo', 'G12', 41),
(4, 'Class_002', 'NIgga', 'G11', 20),
(6, 'Class_003', 'Zeus', 'G12', 35);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_list`
--

CREATE TABLE `faculty_list` (
  `id` int(30) NOT NULL,
  `school_id` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `avatar` text NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_list`
--

INSERT INTO `faculty_list` (`id`, `school_id`, `subject`, `firstname`, `lastname`, `email`, `password`, `avatar`, `date_created`) VALUES
(1, '201406', '', 'Zedtic Marc', 'Acao', 'xxx@sample.com', 'd40242fb23c45206fadee4e2418f274f', '1608011100_avatar.jpg', '2020-12-15 13:45:18'),
(2, '1234', 'English', 'nigga', 'niggaz', 'nigga@gmail.com', '9271d6eecedd55fcfa6143a33029d496', 'no-image-available.png', '2023-06-05 01:41:26'),
(3, '658785857', 'English', 'Mohammad Del Nazz', 'Ho', '12345@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1687638480_Screenshot 2023-06-10 223420.png', '2023-06-25 04:28:07'),
(5, '026280', 'Programming', 'Leo Aljon', 'Padilla', 'leo@gmail.com', '0f759dd1ea6c4c76cedc299039ca4f23', '1688188860_342471741_770577271097377_81100SIR_n.jpg', '2023-07-01 13:21:57'),
(6, '0001', 'Programming', 'VIsitor', 'VIsitor', 'visitor@teacher.com', '127870930d65c57ee65fcc47f2170d38', 'no-image-available.png', '2023-07-06 00:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `subject_list`
--

CREATE TABLE `subject_list` (
  `id` int(30) NOT NULL,
  `code` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `schedule_in` time NOT NULL,
  `schedule_out` time NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_list`
--

INSERT INTO `subject_list` (`id`, `code`, `subject`, `schedule_in`, `schedule_out`, `description`) VALUES
(2, 'ENG-102', 'English', '07:00:00', '08:00:00', 'English'),
(3, 'M-101', 'Math 101', '08:00:00', '09:00:00', 'Math - Advance Algebra '),
(4, 'ICT-10', 'Programming', '13:00:00', '16:00:00', 'Learning coding with Java Programming Language'),
(6, 'CS_ICT11/12-ICTPT-IIk-14', 'CSS', '13:00:00', '16:00:00', 'css');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'TEACHER TRACKING SYSTEM', 'Admin@deped.comm', '+6948 8542 623', '0000  NNCHS, Poblaction ,Nabunturan, 8800', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `avatar` text NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `avatar`, `date_created`) VALUES
(1, 'Admin', '', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', '1687649640_20210915_073540-2.jpg', '2020-11-26 10:57:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_list`
--
ALTER TABLE `attendance_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom_list`
--
ALTER TABLE `classroom_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_list`
--
ALTER TABLE `faculty_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_list`
--
ALTER TABLE `subject_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_list`
--
ALTER TABLE `attendance_list`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `classroom_list`
--
ALTER TABLE `classroom_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faculty_list`
--
ALTER TABLE `faculty_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject_list`
--
ALTER TABLE `subject_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
