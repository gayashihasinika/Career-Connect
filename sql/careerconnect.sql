

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 01:52 PM
-- Server version: 10.4.28-MariaDB-log
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_recruitment`
--
CREATE DATABASE IF NOT EXISTS `careerconnect` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `careerconnect`;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `user_id` varchar(36) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `is_phone_verified` tinyint(1) DEFAULT NULL,
  `is_email_verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`user_id`, `user_name`, `name`, `email`, `password`, `nic`, `address`, `phone`, `is_phone_verified`, `is_email_verified`) VALUES
('ue68ab44-c127-4e93-b0cc-f0db9f84ba6c', 'UOC', 'University of Colombo', 'uoc', 'ucsc', '000000000001', 'UOC UCSC 2', '13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `job_id` varchar(36) NOT NULL,
  `applicant_id` varchar(36) NOT NULL,
  `cv_id` varchar(36) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`job_id`, `applicant_id`, `cv_id`, `date`, `status`) VALUES
('j878904a-e200-48b0-b6e2-fc23f290646c', 'ue68ab44-c127-4e93-b0cc-f0db9f84ba6c', 'c6e81130-f047-4f74-b79a-bc53a70f3e6d', '2024-03-05 13:44:14', 'interview');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `user_id` varchar(36) NOT NULL,
  `cv_id` varchar(36) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`user_id`, `cv_id`, `name`) VALUES
('ue68ab44-c127-4e93-b0cc-f0db9f84ba6c', 'c6e81130-f047-4f74-b79a-bc53a70f3e6d', 'Template CV'),
('ue68ab44-c127-4e93-b0cc-f0db9f84ba6c', 'c79bacff-a96b-42d9-93bf-1ea68eb5ddb3', 'IT CV');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `user_id` varchar(36) NOT NULL,
  `company_name` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `is_phone_verified` tinyint(1) DEFAULT NULL,
  `is_email_verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`user_id`, `company_name`, `email`, `password`, `address`, `phone`, `is_phone_verified`, `is_email_verified`) VALUES
('a0', 'Carrier Me', 'admin', 'ucsc', '', '', 0, 0),
('eb764706-0b97-4afa-9320-3e5a372a21f1', 'Test Company', 'emp@uoc.lk', 'ucsc', 'Colombo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `job_id` varchar(36) NOT NULL,
  `applicant_id` varchar(36) NOT NULL,
  `cv_id` varchar(36) NOT NULL,
  `employer_id` varchar(36) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`job_id`, `applicant_id`, `cv_id`, `employer_id`, `date`) VALUES
('j878904a-e200-48b0-b6e2-fc23f290646c', 'ue68ab44-c127-4e93-b0cc-f0db9f84ba6c', 'c6e81130-f047-4f74-b79a-bc53a70f3e6d', 'eb764706-0b97-4afa-9320-3e5a372a21f1', '2024-03-14 08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` varchar(36) NOT NULL,
  `employer_id` varchar(36) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `job_category` varchar(50) DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `employment_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `employer_id`, `title`, `description`, `job_category`, `posted_date`, `deadline`, `salary`, `employment_type`) VALUES
('j878904a-e200-48b0-b6e2-fc23f290646c', 'eb764706-0b97-4afa-9320-3e5a372a21f1', 'Manager', 'Blank', 'education', '2024-03-05', '2024-03-05', 50000, 'full-time'),
('j9208204-5047-42cd-8e02-2fb53999855c', 'eb764706-0b97-4afa-9320-3e5a372a21f1', 'Junior SE', 'FullStack Development Experience', 'technology', '2024-03-05', '2024-03-14', 50000, 'full-time');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`job_id`,`applicant_id`,`cv_id`) USING BTREE,
  ADD KEY `fk_applications_applicants` (`applicant_id`,`cv_id`);

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`cv_id`,`user_id`),
  ADD KEY `fk_cvs_applicants` (`user_id`);

--
-- Indexes for table `employers`
-- 
ALTER TABLE `employers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`job_id`,`applicant_id`),
  ADD KEY `fk_interviews_employers` (`employer_id`),
  ADD KEY `fk_interviews_applications` (`applicant_id`,`cv_id`,`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `fk_jobs_employers` (`employer_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cvs`
--
ALTER TABLE `cvs`
  ADD CONSTRAINT `fk_cvs_applicants` FOREIGN KEY (`user_id`) REFERENCES `applicants` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `fk_interviews_applications` FOREIGN KEY (`applicant_id`,`cv_id`,`job_id`) REFERENCES `applications` (`applicant_id`, `cv_id`, `job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_interviews_employers` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `fk_jobs_employers` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
