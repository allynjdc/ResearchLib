-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 03:04 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `memo_number` int(255) NOT NULL,
  `memo_series` int(255) NOT NULL,
  `memo_subject` varchar(1024) NOT NULL,
  `memo_date` date NOT NULL,
  `memo_filename` varchar(1024) NOT NULL,
  `memo_filepath` varchar(1024) NOT NULL,
  `memo_posted_at` datetime NOT NULL,
  `memo_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memorandum`
--

INSERT INTO `memorandum` (`memo_id`, `memo_user_id`, `memo_number`, `memo_series`, `memo_subject`, `memo_date`, `memo_filename`, `memo_filepath`, `memo_posted_at`, `memo_updated_at`) VALUES
(3, 1, 99, 2021, 'VIRTUAL TRAINING ON ADVANCING RESEARCH THROUGH 6D SCHEME - STAGE 4', '2021-10-14', 'COT-RPMS Rating Sheet for T I-III for SY 2020-2021 in the time of COVID-19.pdf', '../resources/memo/COT-RPMS Rating Sheet for T I-III for SY 2020-2021 in the time of COVID-19.pdf', '2021-10-17 03:10:27', '2021-10-17 03:10:27'),
(4, 1, 333, 2021, 'VIRTUAL TRAINING ON ADVANCING RESEARCH THROUGH 6D SCHEME - STAGE 3', '2021-10-08', 'ComProg_Q1_SUM02.pdf', '../resources/memo/ComProg_Q1_SUM02.pdf', '2021-10-16 05:10:21', '2021-10-16 05:10:21'),
(5, 3, 10, 2021, 'Sample', '2021-10-03', 'House_Bill_Estimate.pdf', '../resources/memo/House_Bill_Estimate.pdf', '2021-10-17 03:10:28', '2021-10-17 03:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `researcher`
--

CREATE TABLE `researcher` (
  `researcher_id` int(255) NOT NULL,
  `researcher_user_id` int(255) DEFAULT NULL,
  `researcher_first_name` varchar(1024) NOT NULL,
  `researcher_middle_name` varchar(1024) NOT NULL,
  `researcher_last_name` varchar(1024) NOT NULL,
  `researcher_office` varchar(1024) NOT NULL,
  `researcher_designation` varchar(1024) NOT NULL,
  `researcher_profile_picture` varchar(1024) NOT NULL,
  `researcher_email` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `researcher`
--

INSERT INTO `researcher` (`researcher_id`, `researcher_user_id`, `researcher_first_name`, `researcher_middle_name`, `researcher_last_name`, `researcher_office`, `researcher_designation`, `researcher_profile_picture`, `researcher_email`) VALUES
(1, 1, 'ALLYN JOY', 'DIEZ', 'CALCABEN', 'TAGUM NATIONAL TRADE SCHOOL', 'SPECIAL SCIENCE TEACHER I', 'blob.png', 'allynjoy.calcaben@deped.gov.ph'),
(2, 1, 'allyn', 'diez', 'calcaben', 'Tagum National Trade School', 'special teacher iii', 'ACE L1.png', 'aj.calcaben@deped.gov.ph'),
(3, 1, 'Jemwel', 'Oghoc', 'Autor', 'deped tagum city division', 'computer programmer iii', 'TNTS-removebg-preview (1).png', 'jemwel.autor@deped.gov.ph');

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
  `journal_id` int(255) NOT NULL,
  `journal_user_id` int(255) NOT NULL COMMENT 'user who uploaded the journal',
  `journal_title` varchar(1024) NOT NULL,
  `journal_description` varchar(2048) NOT NULL,
  `journal_volume` int(255) NOT NULL,
  `journal_issue` int(255) NOT NULL,
  `journal_issn` varchar(1024) NOT NULL,
  `journal_publisher_name` varchar(1024) NOT NULL,
  `journal_date_publish` date NOT NULL,
  `journal_editor_team` varchar(1024) NOT NULL,
  `journal_filename` varchar(1024) NOT NULL,
  `journal_filepath` varchar(1024) NOT NULL,
  `journal_posted_at` datetime NOT NULL,
  `journal_updated_at` datetime NOT NULL,
  `journal_photo` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `research_journal`
--

INSERT INTO `research_journal` (`journal_id`, `journal_user_id`, `journal_title`, `journal_description`, `journal_volume`, `journal_issue`, `journal_issn`, `journal_publisher_name`, `journal_date_publish`, `journal_editor_team`, `journal_filename`, `journal_filepath`, `journal_posted_at`, `journal_updated_at`, `journal_photo`) VALUES
(1, 1, 'PAKIGHINABI', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 3, '2134', 'DALDESCO Printing Press', '2021-10-25', 'Calcaben', 'MARIO-S.-GREGORIO.pdf', '../resources/journals/MARIO-S.-GREGORIO.pdf', '2021-10-23 04:10:08', '2021-10-23 07:10:21', 'VIRTUAL PARENTS ORIENTATION POSTER.png'),
(2, 1, 'PAKIGHINABITTTT', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3, 1, '2361', 'DALDESCO Printing Press', '2021-10-25', 'Calcaben', 'OUA-Memo_03222_Town Hall Meeting with Master Trainer Participants_2021_03_23.pdf', '../resources/journal/OUA-Memo_03222_Town Hall Meeting with Master Trainer Participants_2021_03_23.pdf', '2021-10-23 05:10:06', '2021-10-23 05:10:06', 'VIRTUAL PARENTS ORIENTATION POSTER.png'),
(3, 1, 'PAKIGHINABITTTT', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, 2, '2361', 'DALDESCO Printing Press', '2021-10-29', 'Calcaben', '', '../resources/journals/', '2021-10-23 05:10:47', '2021-10-23 06:10:05', ''),
(4, 1, 'WIKANG KATUTUBO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1, '1234', 'DALDESCO Printing Press', '2021-10-30', 'Calcaben', '', '../resources/journal/', '2021-10-23 05:10:29', '2021-10-23 05:10:29', ''),
(5, 1, 'WIKANG KATUTUBO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, 2, '1234-5681', 'DALDESCO Printing Press', '2021-11-11', 'Calcaben', 'Guidelines-in-Preparation-of-Special-Problem-Manuscript-for-Graduate-and-Undergraduate-Students-UP-Visayas-2016-Edition.pdf', '../resources/journals/Guidelines-in-Preparation-of-Special-Problem-Manuscript-for-Graduate-and-Undergraduate-Students-UP-Visayas-2016-Edition.pdf', '2021-10-23 05:10:58', '2021-10-23 07:10:25', 'kissclipart-virus-vector-clipart-virus-viral-vector-ca7ec8e2e2a4f9f2.png');

-- --------------------------------------------------------

--
-- Table structure for table `research_output`
--

CREATE TABLE `research_output` (
  `research_id` int(11) NOT NULL,
  `research_title` varchar(1024) NOT NULL,
  `research_doi` varchar(1024) NOT NULL,
  `research_category` varchar(1024) NOT NULL,
  `research_type` varchar(1024) NOT NULL,
  `research_agenda` varchar(1024) NOT NULL,
  `research_status` varchar(1024) NOT NULL,
  `research_abstract` varchar(2048) NOT NULL,
  `research_date_publish` date NOT NULL,
  `research_office` varchar(1024) NOT NULL,
  `research_keywords` varchar(512) NOT NULL,
  `research_journal_id` int(11) NOT NULL,
  `research_journal_pages` varchar(1024) NOT NULL,
  `research_cite_mla` varchar(1024) NOT NULL,
  `research_cite_apa` varchar(1024) NOT NULL,
  `research_cite_chicago` varchar(1024) NOT NULL,
  `research_filename` varchar(1024) NOT NULL,
  `research_filepath` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `user_username` varchar(1024) NOT NULL,
  `user_password` varchar(1024) NOT NULL,
  `user_first_name` varchar(1024) NOT NULL,
  `user_middle_name` varchar(1024) NOT NULL,
  `user_last_name` varchar(1024) NOT NULL,
  `user_email_address` varchar(1024) NOT NULL,
  `user_designation` varchar(1024) NOT NULL,
  `user_office` varchar(1024) NOT NULL,
  `user_type` tinyint(255) NOT NULL COMMENT '1:admin, 0:normal user',
  `user_pwd_state` tinyint(4) NOT NULL COMMENT '1: updated, 0: default',
  `user_profile_picture` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_first_name`, `user_middle_name`, `user_last_name`, `user_email_address`, `user_designation`, `user_office`, `user_type`, `user_pwd_state`, `user_profile_picture`) VALUES
(1, 'ajcalcaben', 'a6f2df33c90bf193238b14f611e0e44f', 'Allyn Joy', 'Diez', 'Calcaben', 'allynjoy.calcaben@deped.gov.ph', 'Special Science Teacher I', 'Tagum National Trade School', 1, 1, ''),
(2, 'jautor', 'a6f2df33c90bf193238b14f611e0e44f', 'Jemwel', 'Oghoc', 'Autor', 'joautor@up.edu.ph', 'Teacher III', 'Tagum City National High School', 0, 1, ''),
(3, 'jcautor', 'd41d8cd98f00b204e9800998ecf8427e', 'Jemma', 'Calcaben', 'Autor', 'jcautor@gmail.com', 'Master Teacher I', 'Magugpo Pilot Central Elementary School', 0, 1, 'My Post (4).png');

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
  ADD PRIMARY KEY (`journal_id`),
  ADD KEY `journal_user_id_foreign_key` (`journal_user_id`);

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
  MODIFY `memo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `researcher`
--
ALTER TABLE `researcher`
  MODIFY `researcher_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `research_journal`
--
ALTER TABLE `research_journal`
  MODIFY `journal_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `research_output`
--
ALTER TABLE `research_output`
  MODIFY `research_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `research_journal`
--
ALTER TABLE `research_journal`
  ADD CONSTRAINT `journal_user_id_foreign_key` FOREIGN KEY (`journal_user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `research_output`
--
ALTER TABLE `research_output`
  ADD CONSTRAINT `research_journal_foreign_key` FOREIGN KEY (`research_journal_id`) REFERENCES `research_journal` (`journal_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
