-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 04, 2024 at 10:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+06:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `joined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `joined`) VALUES
(1, 'admin', '1801', '2024-03-03 19:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `institution` varchar(250) NOT NULL,
  `degree` varchar(250) NOT NULL,
  `timeline` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `institution`, `degree`, `timeline`, `description`) VALUES
(4, 'Khulna University of Engineering and Technology, Khulna, Bangladesh', 'B.Sc in Computer Science and Engineering', '2022 - Present', 'I am currently studying computer science at\r\n                                    Khulna University of Engineering and\r\n                                    Technology. I am in my <b>3rd year</b> of study.'),
(5, 'Notre Dame College, Dhaka, Bangladesh', 'Higher Secondary School Certificate', '2018 - 2020', 'I completed my HSC from Notre Dame College, Dhaka. I got GPA 5.00 out of 5.00 in my HSC exam.'),
(6, 'Monipur High School, Dhaka, Bangladesh', 'Secondary School Certificate', '2008-2018', 'I completed my SSC from Monipur High School, Dhaka. I got GPA 5.00 out of 5.00 in my SSC exam.');

-- --------------------------------------------------------

--
-- Table structure for table `extracurricular`
--

CREATE TABLE `extracurricular` (
  `id` int(11) NOT NULL,
  `club` varchar(250) NOT NULL,
  `work` varchar(250) NOT NULL,
  `timeline` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extracurricular`
--

INSERT INTO `extracurricular` (`id`, `club`, `work`, `timeline`, `description`) VALUES
(2, 'SGIPC, KUET', 'Contest Manager', '2022 - Present', 'I have been working as a contest manager in SGIPC, KUET since 2024. I have been managing the contests and helping the contestants.'),
(3, 'HACK, KUET', 'General Member', '2022 - Present', 'I am a general member of HACK, KUET. I have been participating in various events and workshops organized by HACK, KUET and worked with hardware and software projects.'),
(4, 'NDITC, Notre Dame College', 'General Member', '2018 - 2020', 'I was an active member of Notre Dame IT Club. I participated and volunteered in various events and workshops organized by NDITC.');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` varchar(500) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `time`, `message`, `seen`) VALUES
(8, 'Mohammad Abir Rahman', 'abirzishan32@gmail.com', 'nb ', '2024-03-04 01:43:25', 'vghvhvjbj', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `link`, `photo`) VALUES
(8, 'Financial Advisor', 'A console application built with C++ that can manage daily transactions and write reports.', 'https://github.com/taut0logy/Personal-Finance-Manager-App', 'console.jpeg'),
(9, 'Finance Manager', 'A desktop aplication built for financial analysis, reports and plans.', 'https://github.com/taut0logy/Financial-Advisor', 'desktop.jpeg'),
(12, 'Andoid', 'desc', 'https://www.facebook.com/stories/1572570196194946/UzpfSVNDOjEyMzU1ODk4OTcwOTQwOTM=?view_single=false', 'a-cat-in-a-house--1.png');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `percentage` int(2) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `percentage`, `description`) VALUES
(1, 'C++', 80, 'Besides developing console applications, I have developed various games using C++ and honed my algorithmic skills in Competitive programming.'),
(2, 'C', 85, 'I have been coding in C for 3 years. I have developed various console applications using C. and honed my algorithmic skills in Competitive programming.'),
(3, 'Java', 80, 'I have built desktop and mobile applications using Java. I have learned JavaFX, Swing ang other libraries.'),
(4, 'Kotlin', 65, 'I have built android applications with Kotlin. I have learned the basics and some advanced concepts.'),
(5, 'PHP', 71, 'I am learning PHP and building web applications using PHP and MySQL. I have developed a simple blog using PHP.'),
(7, 'HTML + CSS', 80, 'I have been learnig front end web development sor 3 months. I have gained profociency in building responsive webpages.'),
(10, 'JavaScript', 70, 'I have made a few web applications and games using JavaScript.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extracurricular`
--
ALTER TABLE `extracurricular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `extracurricular`
--
ALTER TABLE `extracurricular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
