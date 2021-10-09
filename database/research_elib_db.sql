-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 05:54 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research_elib_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `memorandum`
--

CREATE TABLE `memorandum` (
  `memo_id` int(255) NOT NULL,
  `memo_user_id` int(255) NOT NULL,
  `memo_title` varchar(32) NOT NULL,
  `memo_number` int(255) NOT NULL,
  `memo_series` int(255) NOT NULL,
  `memo_filename` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `researcher`
--

CREATE TABLE `researcher` (
  `researcher_id` int(255) NOT NULL,
  `researcher_user_id` int(255) DEFAULT NULL,
  `researcher_first_name` varchar(20) NOT NULL,
  `researcher_middle_name` varchar(20) NOT NULL,
  `researcher_last_name` varchar(20) NOT NULL,
  `researcher_office` varchar(32) NOT NULL,
  `researcher_designation` varchar(32) NOT NULL,
  `researcher_profile_picture` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `research_creation`
--

CREATE TABLE `research_creation` (
  `creation_researcher_id` int(255) NOT NULL,
  `creation_research_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `research_journal`
--

CREATE TABLE `research_journal` (
  `journal_id` int(11) NOT NULL,
  `journal_title` varchar(64) NOT NULL,
  `journal_publisher_name` varchar(32) NOT NULL,
  `journal_date_publish` date NOT NULL,
  `journal_editor_team` varchar(32) NOT NULL,
  `journal_filename` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `research_output`
--

CREATE TABLE `research_output` (
  `research_id` int(11) NOT NULL,
  `research_title` varchar(50) NOT NULL,
  `research_abstract` varchar(100) NOT NULL,
  `research_date_publish` date NOT NULL,
  `research_journal_id` int(11) NOT NULL,
  `research_filename` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_middle_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `user_email_address` varchar(30) NOT NULL,
  `user_designation` varchar(30) NOT NULL,
  `user_office` varchar(50) NOT NULL,
  `user_type` tinyint(255) NOT NULL COMMENT '1:admin, 0:normal user',
  `user_pwd_state` tinyint(4) NOT NULL COMMENT '1: updated, 0: default',
  `user_profile_picture` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memorandum`
--
ALTER TABLE `memorandum`
  ADD PRIMARY KEY (`memo_id`),
  ADD KEY `memo_user_id_foreign_key` (`memo_user_id`);

--
-- Indexes for table `researcher`
--
ALTER TABLE `researcher`
  ADD PRIMARY KEY (`researcher_id`),
  ADD KEY `user_id_foreign_key` (`researcher_user_id`);

--
-- Indexes for table `research_creation`
--
ALTER TABLE `research_creation`
  ADD PRIMARY KEY (`creation_researcher_id`,`creation_research_id`),
  ADD KEY `creation_resaerch_id_foreign_key` (`creation_research_id`);

--
-- Indexes for table `research_journal`
--
ALTER TABLE `research_journal`
  ADD PRIMARY KEY (`journal_id`);

--
-- Indexes for table `research_output`
--
ALTER TABLE `research_output`
  ADD PRIMARY KEY (`research_id`),
  ADD KEY `research_journal_foreign_key` (`research_journal_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `memorandum`
--
ALTER TABLE `memorandum`
  MODIFY `memo_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `researcher`
--
ALTER TABLE `researcher`
  MODIFY `researcher_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_journal`
--
ALTER TABLE `research_journal`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_output`
--
ALTER TABLE `research_output`
  MODIFY `research_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `memorandum`
--
ALTER TABLE `memorandum`
  ADD CONSTRAINT `memo_user_id_foreign_key` FOREIGN KEY (`memo_user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `researcher`
--
ALTER TABLE `researcher`
  ADD CONSTRAINT `user_id_foreign_key` FOREIGN KEY (`researcher_user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `research_creation`
--
ALTER TABLE `research_creation`
  ADD CONSTRAINT `creation_resaerch_id_foreign_key` FOREIGN KEY (`creation_research_id`) REFERENCES `research_output` (`research_id`),
  ADD CONSTRAINT `creation_researcher_id_foreign_key` FOREIGN KEY (`creation_researcher_id`) REFERENCES `researcher` (`researcher_id`);

--
-- Constraints for table `research_output`
--
ALTER TABLE `research_output`
  ADD CONSTRAINT `research_journal_foreign_key` FOREIGN KEY (`research_journal_id`) REFERENCES `research_journal` (`journal_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
