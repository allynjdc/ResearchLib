-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 06:01 PM
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
(6, 1, 161, 2021, 'Meeting on the Conduct of Virtual Training', '2021-03-26', 'DM161-03-26-2021-MEETING-ON-THE-CONDUCT-OF-VIRTUAL-TRAINING (1).pdf', '../resources/memo/DM161-03-26-2021-MEETING-ON-THE-CONDUCT-OF-VIRTUAL-TRAINING (1).pdf', '2021-11-01 01:11:39', '2021-11-01 01:11:39'),
(7, 1, 196, 2021, 'Virtual Training on Advancing Research in 6D Stage 2 Outline Presentation', '2021-04-13', 'DM196-04-13-2021-VIRTUAL-TRAINING-ON-ADVANCING-RESEARCH-IN-6D-STAGE-2-OUTLINE-PRESENTATION.pdf', '../resources/memo/DM196-04-13-2021-VIRTUAL-TRAINING-ON-ADVANCING-RESEARCH-IN-6D-STAGE-2-OUTLINE-PRESENTATION.pdf', '2021-11-01 01:11:07', '2021-11-01 01:11:07'),
(8, 1, 207, 2021, 'Virtual Training on Advancing Research in 6D Scheme', '2021-04-15', 'DM207-04-15-2021-VIRTUAL-TRAINING-ON-ADVANCING-RESEARCH-IN-6D-SCHEME.pdf', '../resources/memo/DM207-04-15-2021-VIRTUAL-TRAINING-ON-ADVANCING-RESEARCH-IN-6D-SCHEME.pdf', '2021-11-01 01:11:08', '2021-11-01 01:11:08'),
(9, 1, 242, 2021, 'Conduct of Virtual Training in Advancing Research Through 6D', '2021-04-28', 'DM242-04-28-2021-CONDUCT-OF-VIRTUAL-TRAINING-IN-ADVANCING-RESEARCH-THROUGH-6D.pdf', '../resources/memo/DM242-04-28-2021-CONDUCT-OF-VIRTUAL-TRAINING-IN-ADVANCING-RESEARCH-THROUGH-6D.pdf', '2021-11-01 02:11:00', '2021-11-01 02:11:00'),
(10, 1, 284, 2021, 'Virtual Training on Advancing Research in 6D Scheme for Second Batch', '2021-05-12', 'DM284-05-12-2021-VIRTUAL-TRAINING-ON-ADVANCING-RESEARCH-THROUGH-6D-SCHEME-FOR-SECOND-BATCH (3).pdf', '../resources/memo/DM284-05-12-2021-VIRTUAL-TRAINING-ON-ADVANCING-RESEARCH-THROUGH-6D-SCHEME-FOR-SECOND-BATCH (3).pdf', '2021-11-01 02:11:17', '2021-11-01 02:11:17'),
(11, 1, 424, 2021, 'Virtual Training of Trainers on Research Data Analysis', '2021-07-16', 'DM424-07-16-2021-VIRTUAL-TRAINING-OF-TRAINERS-ON-RESEARCH-DATA-ANALYSIS.pdf', '../resources/memo/DM424-07-16-2021-VIRTUAL-TRAINING-OF-TRAINERS-ON-RESEARCH-DATA-ANALYSIS.pdf', '2021-11-01 02:11:44', '2021-11-01 02:11:44'),
(12, 1, 483, 2021, 'Virtual Training on Advancing Research in 6D Scheme', '2021-08-12', 'DM483-08-12-2021-VIRTUAL-TRAINING-ON-ADVANCING-RESEARCH-IN-6D-SCHEME.pdf', '../resources/memo/DM483-08-12-2021-VIRTUAL-TRAINING-ON-ADVANCING-RESEARCH-IN-6D-SCHEME.pdf', '2021-11-01 02:11:29', '2021-11-01 02:11:29');

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
(2, 1, 'Christine ', 'Uriarte', 'Idul', 'Tagum National Trade School', 'Teacher I', '_Y7A8174.JPG', 'christine.idul001@deped.gov.ph'),
(3, 1, 'Jemwel', 'Oghoc', 'Autor', 'Tagum City National High School', 'Teacher III', 'default_profile_picture.jpg', 'jemwel.autor@deped.gov.ph'),
(4, 1, 'Audrey ', 'Albite', 'Claren', 'Tagum City National High School', 'Teacher II', 'default_profile_picture.jpg', 'audrey.claren@deped.gov.ph');

-- --------------------------------------------------------

--
-- Table structure for table `research_creation`
--

CREATE TABLE `research_creation` (
  `creation_researcher_id` int(255) NOT NULL,
  `creation_research_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `research_creation`
--

INSERT INTO `research_creation` (`creation_researcher_id`, `creation_research_id`) VALUES
(1, 7),
(1, 10),
(1, 12),
(1, 14),
(2, 9),
(2, 13),
(2, 14),
(3, 7),
(3, 8),
(3, 11),
(3, 14);

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
(6, 1, 'Educational Research Review', 'Educational Research Review is an international journal addressed to researchers and various agencies interested in the review of studies and theoretical papers in education at any level. The journal accepts high quality articles that are solving educational research problems by using a review approach. This may include thematic or methodological reviews, or meta-analyses. The journal does not limit its scope to any age range. The journal invites articles on the broad range of settings in which people learn and are educated (school settings, corporate training, formal or informal settings, etc.).', 33, 1, '1747-938X', 'Elsevier Ltd.', '2021-06-23', 'Calcaben', 'X1747938X.jpg', '../resources/journals/X1747938X.jpg', '2021-11-01 02:11:25', '2021-11-01 02:11:25', 'X1747938X.jpg'),
(7, 1, 'The Journal of Educational Research', 'Publishes papers on elementary, secondary and pre-K12 educational practice, latest trends and procedures, traditional practices and future curricula.', 50, 5, '1940-0675', 'Taylor & Francis Online', '2021-10-22', 'Calcaben', 'download.jfif', '../resources/journals/download.jfif', '2021-11-01 02:11:27', '2021-11-01 02:11:27', 'download.jfif'),
(8, 1, 'Journal of Experimental Psychology: Learning, Memory, and Cognition', 'The Journal of Experimental Psychology: Learning, Memory, and CognitionÂ® publishes original experimental and theoretical research on human cognition, with a special emphasis on learning, memory, language, and higher cognition.  The journal publishes impactful articles of any length, including literature reviews, meta-analyses, replications, theoretical notes, and commentaries on previously published works in the Journal of Experimental Psychology: Learning, Memory, and Cognition.  The journal places a high emphasis on methodological soundness and analytic rigor, as well as on the reproducibility and replicability of research.', 114, 8, '1939-1285', 'American Psychological Association', '2021-09-23', 'Calcaben', 'xlm-150.gif', '../resources/journals/xlm-150.gif', '2021-11-01 02:11:09', '2021-11-01 02:11:09', 'xlm-150.gif');

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
  `research_filename` varchar(1024) NOT NULL,
  `research_filepath` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `research_output`
--

INSERT INTO `research_output` (`research_id`, `research_title`, `research_doi`, `research_category`, `research_type`, `research_agenda`, `research_status`, `research_abstract`, `research_date_publish`, `research_office`, `research_keywords`, `research_journal_id`, `research_journal_pages`, `research_filename`, `research_filepath`) VALUES
(7, 'Relation between examineesâ€™ true knowledge and examination scores: systematic review and exemplary calculations on Multiple-True-False items', 'https://doi.org/10.1016/j.edurev.2021.100409', 'Regional', 'Basic Research', 'Teaching and Learning', 'Submitted', 'Multiple-True-False questions are one specific type of multiple-choice item that can be used to assess knowledge in written examinations. Within Multiple-True-False items, a number of statements within a single item are given, and each statement has to be marked separately as true or false. Various scoring methods for Multiple-True-False items exist and there is no consensus as to the ideal scoring method. The study aimed to systematically identify available scoring methods for Multiple-True-False items and to assess their usability and statistical parameters (i.e. available information included and expected chance scores from random guessing). Another objective was to examine the relation between examineesâ€™ true knowledge and expected scoring results. Data presented in this manuscript may help educators make informed choices about the scoring method to be selected and corresponding pass marks required for testing a certain level of true knowledge of examinees.', '2021-06-11', 'Tagum City National Comprehensive High School', 'Cluster-type true-false, Independent true-false, Kprim, Kprime, K\', Type X', 6, '140 - 145', 'CALCABEN-AJ-Tagum-National-Trade-School-final(updated).pdf', '../resources/research/CALCABEN-AJ-Tagum-National-Trade-School-final(updated).pdf'),
(8, 'Adolescent psychosocial factors and participation in education and employment in young adulthood: A systematic review and meta-analyses', 'https://doi.org/10.1016/j.edurev.2021.100404', 'District', 'Basic Research', 'Child Protection', 'Conducted', 'Adolescence is a critical period for successful transition into adulthood. This systematic review of empirical longitudinal evidence investigated the associations between adolescent psychosocial factors and education and employment status in young adulthood. Five electronic databases (MEDLINE, PsycINFO, CINAHL, ASSIA and ERIC) were searched. Meta-analysis was conducted by using odds ratios (OR) as our common effect size; a narrative synthesis of results was also completed. Of the 8970 references screened, 14 articles were included and mapped into seven domains, namely, behavioral problems, peer problems, substance use, prosocial skills, self-evaluations, aspirations and physical activity. The results showed that behavioral problems (overall OR: 1.48; 95% CI: 1.26â€“1.74) and peer problems (overall ORadj: 1.27; 95% CI: 1.02â€“1.57) were significantly associated with being out of education, employment and training (NEET) as young adults. Prosocial skills did not present a significant association (overall OR: 1.03; 95% CI: 0.92â€“1.15). Other domains were narratively synthesized. The role of substance use was less clear. Only a few studies were available for self-evaluations, aspirations and physical activity domains. Implications for research and practice are discussed.', '2021-10-08', 'Tagum City National Comprehensive High School', 'Systematic review-meta-analysis, Adolescents, Education, Employment, Young adults', 6, '100 - 50', 'OUA-Memo_03222_Town Hall Meeting with Master Trainer Participants_2021_03_23.pdf', '../resources/research/OUA-Memo_03222_Town Hall Meeting with Master Trainer Participants_2021_03_23.pdf'),
(9, 'Unlocking the potential of STEAM education: How exemplary teachers navigate assessment challenges', 'https://doi.org/10.1080/00220671.2021.1990002', 'Schools Division', 'Basic Research', 'Human Resource Development', 'Disseminated', 'While integrated STEAM education has been shown to support the cultivation of critical global competencies, teachers have identified classroom assessment as a key barrier to facilitating integrated learning. This research investigated how exemplary teachers navigated classroom assessment challenges and practices within integrated STEAM education contexts. Employing an in-depth qualitative design, this study drew on data from interviews with 14 exemplary STEAM teachers and assessment artifacts (e.g., assessments, resources, lesson/unit plans). Through an inductive analysis, synergies and tensions within three overarching themes were identified: planning for assessment, formative assessment, and grading/evaluation. Teachersâ€™ planning practice was characterized by a focus on key learning skills as well as divergent opinions regarding a backwards design approach. Central to teachersâ€™ STEAM education practice, formative assessment was used to drive the iterative design cycle. When grading, teachers relied on their professional judgment and supported student self-advocacy. Implications for theory and practice are discussed.', '2021-09-24', 'Magugpo Pilot Central Elementary School', 'Classroom assessment, formative assessment, grading, integrated education, STEAM education', 7, '90 - 99', 'System Evaluation.pdf', '../resources/research/System Evaluation.pdf'),
(10, 'Effect of the GeoGebra software-supported collaborative learning environment on seventh grade studentsâ€™ geometry achievement, retention and attitudes', 'https://doi.org/10.1080/00220671.2021.1983505', 'National', 'Action Research', 'Governance', 'Used', 'The purpose of this study was to examine the effects of using GeoGebra software in a computer-supported collaborative learning (CSCL) environment on seventh grade studentsâ€™ geometry achievement, retention of learning, and attitudes toward geometry. The study was designed using a quasi-experimental research method with pretest, post-test and delayed post-test. This study was carried out with 62 seventh grade students in a city in western Turkey. CSCL activities using GeoGebra software were implemented in the experimental group, while instruction in the control group continued with textbook-based direct instruction. The Geometry Achievement Test (GAT) and Geometry Attitude Scale (GAS) were applied to groups as pretest and post-test. A retention test was applied to both groups eight weeks after the post-test. Data were analyzed through SPSS 17.0 statistical software by using a t-test and ANCOVA test. It was indicated in this study that CSCL using GeoGebra software significantly increased seventh grade studentsâ€™ geometry achievement and retention of learning in comparison to textbook-based direct instruction. It was also determined that the CSCL environment with GeoGebra software significantly increased studentsâ€™ attitudes toward geometry.', '2021-10-18', 'Rizal Elementary School', 'Attitude toward geometry, computer-supported collaborative learning (CSCL), GeoGebra software, geometry achievement, retention of learning', 7, '20 - 26', 'CALCABEN-AJ-Tagum-National-Trade-School-final(updated).pdf', '../resources/research/CALCABEN-AJ-Tagum-National-Trade-School-final(updated).pdf'),
(11, 'The influence of childrenâ€™s reading ability on initial letter position encoding during a reading-like task.', 'https://doi.org/10.1037/xlm0000989', 'School', 'Action Research', 'DRRM', 'Submitted', '\r\nPrevious studies exploring the cost of reading sentences with words that have two transposed letters in adults showed that initial letter transpositions caused the most disruption to reading, indicating the important role that initial letters play in lexical identification (e.g., Rayner et al., 2006). Regarding children, it is not clear whether differences in reading ability would affect how they encode letter position information as they attempt to identify misspelled words in a reading-like task. The aim of this experiment was to explore how initial-letter position information is encoded by children compared to adults when reading misspelled words, containing transpositions, during a reading-like task. Four different conditions were used: control (words were correctly spelled), TL12 (letters in first and second positions were transposed), TL13 (letters in first and third positions were transposed), and TL23 (letters in second and third positions were transposed). Results showed that TL13 condition caused the most disruption, whereas TL23 caused the least disruption to reading of misspelled words. Although disruption for the TL13 condition was quite rapid in adults, the immediacy of disruption was less so for the TL23 and TL12 conditions. For children, effects of transposition also occurred quite rapidly but were longer lasting. The time course was particularly extended for the less skilled relative to the more skilled child readers. This pattern of effects suggests that both adults and children with higher, relative to lower, reading ability encode internal letter position information more flexibly to identify misspelled words, with transposed letters, during a reading-like task.', '2021-09-24', 'Tagum City National Comprehensive High School', 'childrenâ€™s reading ability, letter position encoding, reading-like task', 8, '1120 - 1129', 'OUA-Memo_03222_Town Hall Meeting with Master Trainer Participants_2021_03_23.pdf', '../resources/research/OUA-Memo_03222_Town Hall Meeting with Master Trainer Participants_2021_03_23.pdf'),
(12, 'Closing the gender gap in reading with readers theater', 'https://doi.org/10.1080/00220671.2021.1986460', 'Regional', 'Action Research', 'Gender Development', 'Conducted', 'This sequential explanatory analysis reports on the observed differences in growth on decoding, word knowledge, and reading comprehension between second grade males and females after participating in a readers theater treatment or business as usual instruction. The quantitative results revealed that males made greater gains than females in the treatment groups and females outperformed the males in the comparison group. A follow up survey of an unrelated sample of second and third grade males was conducted to further understand why males may have demonstrated more improvement when involved in readers theater. Several themes emerged indicating males liked the collaborative aspect of dramatic performance and believed it is a fun and nontraditional classroom activity. Readers theater also helped their ability to sustain, strengthen, and develop their reader identities through comedy.', '2021-03-18', 'Rizal Elementary School', 'Reading instruction, readers theater, male readers, decoding, word knowledge, reading comprehension', 7, '67 - 75', 'System Evaluation.pdf', '../resources/research/System Evaluation.pdf'),
(13, 'Rapid syntactic adaptation in self-paced reading: Detectable, but only with many participants.', 'https://doi.org/10.1037/xlm0001046', 'School', 'Basic Research', 'Inclusive Education', 'Disseminated', 'Temporarily ambiguous sentences that are disambiguated in favor of a less preferred parse are read more slowly than their unambiguous counterparts. This slowdown is referred to as a garden path effect. Recent self-paced reading studies have found that this effect decreased over the course of the experiment as participants were exposed to such syntactically ambiguous sentences. This decrease in the magnitude of the effect has been interpreted as evidence that readers calibrate their expectations to the context; this minimizes their surprise when they encounter these initially unexpected syntactic structures. Such recalibration of syntactic expectations, referred to as syntactic adaptation, is only one possible explanation for the decrease in garden path effect, however; this decrease could also be driven instead by increased familiarity with the self-paced reading paradigm (task adaptation). The goal of this article is to adjudicate between these two explanations. In a large between-group study (n = 642), we find evidence for syntactic adaptation over and above task adaptation. The magnitude of syntactic adaptation compared to task adaptation is very small, however. Power analyses show that a large number of participants is required to detect, with adequate power, syntactic adaptation in future between-subjects self-paced reading studies. This issue is exacerbated in experiments designed to detect modulations of the basic syntactic adaptation effect; such experiments are likely to be underpowered even with more than 1,200 participants. We conclude that while, contrary to recent suggestions, syntactic adaptation can be detected using self-paced reading, this paradigm is not very effective for studying this phenomenon. ', '2020-06-17', 'Magugpo Pilot Central Elementary School', ' Rapid syntactic adaptation, self-paced reading, Detectable', 8, '43 - 57', 'System Evaluation.pdf', '../resources/research/System Evaluation.pdf'),
(14, 'The semantics-syntax interface: Learning grammatical categories and hierarchical syntactic structure through semantics.', 'https://doi.org/10.1037/xlm0001044', 'National', 'Action Research', 'Others', 'Used', 'Language is infinitely productive because syntax defines dependencies between grammatical categories of words and constituents, so there is interchangeability of these words and constituents within syntactic structures. Previous laboratory-based studies of language learning have shown that complex language structures like hierarchical center embeddings (HCE) are very hard to learn, but these studies tend to simplify the language learning task, omitting semantics and focusing either on learning dependencies between individual words or on acquiring the category membership of those words. We tested whether categories of words and dependencies between these categories and between constituents, could be learned simultaneously in an artificial language with HCEâ€™s, when accompanied by scenes illustrating the sentenceâ€™s intended meaning. Across four experiments, we showed that participants were able to learn the HCE language varying words across categories and category-dependencies, and constituents across constituents-dependencies. They also were able to generalize the learned structure to novel sentences and novel scenes that they had not previously experienced. This simultaneous learning resulting in a productive complex language system, may be a consequence of grounding complex syntax acquisition in semantics.', '2020-11-24', 'Rizal Elementary School', 'semantics-syntax interface, grammatical categories, hierarchical syntactic structure, semantics', 8, '53 - 61', 'CALCABEN-AJ-Tagum-National-Trade-School-final(updated).pdf', '../resources/research/CALCABEN-AJ-Tagum-National-Trade-School-final(updated).pdf');

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
  `user_active_state` int(255) NOT NULL COMMENT '0 - deactivated; 1 - activated',
  `user_profile_picture` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_first_name`, `user_middle_name`, `user_last_name`, `user_email_address`, `user_designation`, `user_office`, `user_type`, `user_pwd_state`, `user_active_state`, `user_profile_picture`) VALUES
(1, 'ajautor', 'a6f2df33c90bf193238b14f611e0e44f', 'Allyn Joy', 'Calcaben', 'Autor', 'allynjoy.calcaben@deped.gov.ph', 'Special Science Teacher I', 'Tagum National Trade School', 1, 1, 0, 'blob.png'),
(2, 'jautor', 'a6f2df33c90bf193238b14f611e0e44f', 'Jemwel', 'Oghoc', 'Autor', 'joautor@up.edu.ph', 'Teacher III', 'Tagum City National High School', 0, 1, 0, ''),
(3, 'kitidul', 'd41d8cd98f00b204e9800998ecf8427e', 'Christine', 'Uriarte', 'Idul', 'christine.idul001@deped.gov.ph', 'Master Teacher I', 'Magugpo Pilot Central Elementary School', 0, 1, 0, '_Y7A8174.JPG');

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
  MODIFY `memo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `researcher`
--
ALTER TABLE `researcher`
  MODIFY `researcher_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `research_journal`
--
ALTER TABLE `research_journal`
  MODIFY `journal_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `research_output`
--
ALTER TABLE `research_output`
  MODIFY `research_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
