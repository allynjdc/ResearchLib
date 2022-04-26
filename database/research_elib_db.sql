-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 06:08 PM
-- Server version: 10.4.24-MariaDB
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
-- Table structure for table `dev_role`
--

CREATE TABLE `dev_role` (
  `dev_role_id` int(255) NOT NULL,
  `dev_role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dev_role`
--

INSERT INTO `dev_role` (`dev_role_id`, `dev_role_name`) VALUES
(1, 'Editor-in-Chief'),
(2, 'Executive Editor'),
(3, 'Publications Manager'),
(4, 'Technical Editor'),
(5, 'Copy Editor'),
(6, 'Layout Artist'),
(7, 'Editorial Consultant');

-- --------------------------------------------------------

--
-- Table structure for table `dev_team`
--

CREATE TABLE `dev_team` (
  `dev_id` int(225) NOT NULL,
  `dev_journal_id` int(255) NOT NULL,
  `dev_first_name` varchar(1024) NOT NULL,
  `dev_middle_name` varchar(1024) NOT NULL,
  `dev_last_name` varchar(1024) NOT NULL,
  `dev_role_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, 'ALLYN JOY', 'DIEZ', 'CALCABEN', 'TAGUM NATIONAL TRADE SCHOOL', 'SPECIAL SCIENCE TEACHER I', 'default_profile_picture.jpg', 'allynjoy.calcaben@deped.gov.ph'),
(3, 1, 'Jemwel', 'Oghoc', 'Autor', 'Tagum City National High School', 'Teacher III', 'default_profile_picture.jpg', 'jemwel.autor@deped.gov.ph'),
(6, 1, 'Rodelyn ', 'Y', 'Cuamag', 'Tagum City National High School', 'Master Teacher I', 'default_profile_picture.jpg', 'rodelyn.cuamag@deped.gov.ph'),
(7, 1, 'Agnes Marian ', 'F', 'Alolor', 'Tagum City National Comprehensive High School', 'Teacher I', 'default_profile_picture.jpg', 'agnes.alolor@deped.gov,ph'),
(8, 1, 'Analyn ', 'M', 'Gaballo', 'Pagsabangan Elementary School', 'Teacher I', 'default_profile_picture.jpg', 'analyn.gaballo@deped.gov.ph'),
(9, 1, 'Ramel', 'M', 'Abay', 'La Filipina National High School', 'Master Teacher I', 'default_profile_picture.jpg', 'ramel.abay001@deped.gov.ph'),
(10, 1, 'May Ann', 'L', 'Go', 'Tagum City National Comprehensive High School', 'Teacher I', 'default_profile_picture.jpg', 'mayann.go@deped.gov.ph'),
(11, 1, 'Ellen', 'L', 'Generalao', 'Tagum National Trade School', 'Master Teacher I', 'default_profile_picture.jpg', 'ellen.generalao@deped.gov.ph'),
(12, 1, 'Linor', 'B', 'Majestad', 'Laureta Elementary School', 'Teacher I', 'default_profile_picture.jpg', 'linor.majestad001@deped.gov.ph'),
(13, 1, 'Alona', 'E', 'Flores', 'Tagum City National High School', 'Master Teacher II', 'default_profile_picture.jpg', 'alona.flores001@deped.gov.ph'),
(14, 1, 'Cromwell', 'F', 'Gopo', 'Tagum National Trade School', 'Teacher III', 'default_profile_picture.jpg', 'cromwell.gopo@deped.gov.ph'),
(15, 1, 'Glory Jean', 'B', 'Leop', 'Tagum City National High School', 'Master Teacher I', 'default_profile_picture.jpg', 'glory.leop@deped.gov.ph'),
(16, 1, 'Rowelyn', 'G', 'Rabe', 'Madaum Elementary School', 'Teacher I', 'default_profile_picture.jpg', 'rowelyn.rabe@deped.gov.ph'),
(17, 1, 'Mike', 'M', 'Leopardas', 'Magugpo Pilot Central Elementary School', 'Master Teacher I', 'default_profile_picture.jpg', 'mike.leopardas@deped.gov.ph'),
(18, 1, 'Jernilyn Grace', 'F', 'Leopardas', 'Magugpo Pilot Central Elementary School', 'Teacher I', 'default_profile_picture.jpg', 'jernilyngrace.leopardas@deped.gov.ph'),
(19, 1, 'Ian Jane', 'Petalcorin', 'Orillaneda', 'Suaybaguio-Riña Elementary School', 'Teacher III', 'default_profile_picture.jpg', 'ianjane.petalcorin001@deped.gov.ph'),
(20, 1, 'Frances Angelica May', 'R', 'Seguido', 'Tagum City National High School', 'Teacher I', 'default_profile_picture.jpg', 'francesangelicamay.seguido@deped.gov.ph'),
(21, 1, 'Zyrill Nathalie', 'L', 'Digal', 'Liboganon Integrated School', 'Teacher I', 'default_profile_picture.jpg', 'zyrillnathalie.digal001@deped.gov.ph'),
(22, 1, 'Unique ', 'L', 'Sajol', 'Don Ricardo Briz Central Elementary School', 'Teacher I', 'default_profile_picture.jpg', 'unique.sajol@deped.gov.ph'),
(23, 1, 'Cherry Ann', 'T', 'Nicolas', 'La Filipina National High School', 'Teacher I', 'default_profile_picture.jpg', 'cherryann.nicolas@deped.gov.ph'),
(24, 1, 'Maybelle', 'G', 'Isidoro', 'Pandapan Integrated School', 'Teacher I', 'default_profile_picture.jpg', 'maybelle.isidoro@deped.gov.ph'),
(25, 1, 'Josephine', 'L', 'Fadul', 'Tagum City Division', 'Schools Division Superintendent', 'default_profile_picture.jpg', 'tagum.city@deped.gov.ph'),
(26, 1, 'Mervin', 'G', 'Salmon', 'Tagum City Division', 'Public Schools District Supervisor', 'default_profile_picture.jpg', 'mervin.salmon001@deped.gov.ph'),
(27, 1, 'Paulino', 'P', 'Tado', 'Tagum National Trade School', 'Master Teacher II', 'default_profile_picture.jpg', 'paulino.tado@deped.gov.ph'),
(28, 1, 'Liezle', 'D', 'Ababat', 'Laureta National High School', 'Master Teacher II', 'default_profile_picture.jpg', 'liezle.ababat@deped.gov.ph'),
(29, 1, 'Elaine', 'D.', 'Sta. Ana', 'Pandapan Integrated School', 'Teacher III', 'default_profile_picture.jpg', 'elaine.staana@deped.gov.ph'),
(30, 1, 'Romel', 'S', 'Villarubia', 'Tagum City National High School', 'Master Teacher I', 'default_profile_picture.jpg', 'romel.villarubia001@deped.gov.ph'),
(31, 1, 'Ramonita', 'F', 'Viloria', 'Tagum City National High School', 'Teacher III', 'default_profile_picture.jpg', 'ramonita.viloria@deped.gov.ph'),
(32, 1, 'Rolando', 'N', 'Sioting Jr.', 'Apokon Elementary School', 'Master Teacher I', 'default_profile_picture.jpg', 'rolando.siotingjr@deped.gov.ph');

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
(1, 27),
(6, 16),
(6, 34),
(7, 17),
(8, 18),
(9, 19),
(9, 31),
(10, 20),
(11, 21),
(12, 22),
(13, 23),
(14, 24),
(15, 25),
(16, 26),
(17, 29),
(17, 34),
(18, 29),
(19, 30),
(19, 31),
(20, 31),
(21, 31),
(22, 31),
(23, 31),
(24, 31),
(25, 32),
(26, 33),
(27, 34),
(28, 34),
(29, 34),
(30, 34),
(31, 34),
(32, 35);

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
(10, 1, 'Pintok: Period. Straightforward', 'A word in Hiligaynon characterized by directness in manner or speech, without subtlety or evasion just as how RESEARCH is straightforward as an invaluable tool for building on crucial knowledge, placing trust into logical thinking as the most reliable means to begin to understand the complexities of various issues; to maintain integrity in disproving lies and upholding important truths; to serve as the seed for analyzing convoluted sets of data; as well as to serve as ‘nourishment,’ or exercise for the mind.', 1, 1, '2815-1887', 'Page Star Printing Press', '2022-04-28', 'Unknown Development Team', 'Pintok 2022.pdf', '../resources/journals/Pintok 2022.pdf', '2022-04-10 09:04:06', '2022-04-10 09:04:06', 'Pintok 2022.png');

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
(16, 'H5P: Interactive Intervention in Teaching Grade7 Mathematics  Through the Learning Management System', '0', 'Schools Division', 'Basic Research', 'Teaching and Learning', 'Submitted', 'There are numerous techniques to make online learning a realistic alternative in the current educational environment. The effectiveness of the H5P interactive intervention in teaching mathematics was investigated using a quasi-experimental design employing a purposive sampling in Grade 7 students. The experimental group used the intervention while the control group used the digital modules in the learning management system. The data were collected using an online synchronous timed pretest and posttest. The data were tabulated, presented, evaluated, and interpreted. The findings revealed that students had an average mastery level in the pretest, which leveled up to moving towards mastery in the posttest. When the mean difference of the pretest and posttest of the experimental group was tested, it was found out that the computed p-value of 0.0065 was lower than the 0.05 level of significance; thus, the intervention was successful. From the findings, it is suggested that utilization of H5P interactive learning material through learning management systems in teaching mathematics be continued by the learners, intensified through additional training of teachers, and maximized through adoption by online class teachers.', '2022-04-28', 'Tagum City National High School', ' H5P intervention, teaching mathematics, learning management system, experimental', 10, '2-6', 'H5P - Cuamag.pdf', '../resources/research/H5P - Cuamag.pdf'),
(17, 'Illustrated Hands-on Information Sheet: Intervention in Improving the Practical Skills Knowledge of Grade 8 Technology and Livelihood Education Students', '0', 'Schools Division', 'Basic Research', 'Teaching and Learning', 'Submitted', 'With the spread of the Covid-19 virus, new challenges are posed in delivering practical instructions in teaching students’ hands-on skills in Technology and Livelihood Education. This study aims to determine the significance of an illustrated hands-on material composed of illustrations and actual pictures in improving students\' practical skills and knowledge. Simple random sampling was utilized to choose 160 students to participate in the study that uses a descriptive research design. A pre-test and post-test were given to the participants that will be analyzed using a quantitative descriptive approach to find the difference of the test results and will be statistically treated using the mean, standard deviation, and t-test of significant difference. Based on the results, students manifested a low level of pre-test results before using the Illustrated Hands-on Information Sheet, which shows that they have a poor understanding of the practical concepts in Technology and Livelihood Education. After using the intervention material, students demonstrated a very high level of post-test results, which means that the participants have a clear understanding and mastery of the practical concepts in the subject. This shows that the participants better understood the processes and steps to consider in performing hands-on tasks. This implies that the intervention material has a significant effect in improving the practical skills knowledge of the students in remote learning. ', '2022-04-28', 'Tagum City National Comprehensive High School', ' hands-on, intervention, illustrated, information sheet, practical skills, action research', 10, '7-11', 'Illustrated Hands-on Information Sheet - Alolor.pdf', '../resources/research/Illustrated Hands-on Information Sheet - Alolor.pdf'),
(18, 'Improving Teachers’ Technological Literacy through Five-Step Technology-  Driven Instruction Strategy', '0', 'Schools Division', 'Basic Research', 'Teaching and Learning', 'Submitted', 'Technological literacy of teachers in the new normal is deemed necessary in adopting technology-driven instruction strategy to improve learning outcomes. This action research utilizing a purposive sampling aimed to determine teachers’ technological literacy level through a five-step technology-driven instruction strategy. The level of teachers’ technological literacy before and after implementing the five-step technology-driven instruction strategy is moderate and high. There is a significant difference in teachers\' technological literacy before and after implementing a five-step technology-driven instruction strategy. This implies that the five-step technology-driven instruction strategy effectively improves teachers’ technological literacy. On this basis, training on five-step technology-driven instruction of teachers may be utilized for teachers’ effectiveness in the teaching-learning process using technology in the new normal set-up.', '2022-04-28', 'Pagsabangan Elementary School', ' teaching-learning, five-step technology-driven instruction, technological literacy, qualitative research, Philippines', 10, '12-16', 'Teachers’ Technological Literacy - Gaballo.pdf', '../resources/research/Teachers’ Technological Literacy - Gaballo.pdf'),
(19, 'Investigating the Transition Stage of Basic Skills to Higher Mathematics of Grade 7 Learners: Perspective of Teachers', '0', 'Schools Division', 'Basic Research', 'Teaching and Learning', 'Submitted', 'This study aimed to discuss the teachers\' perceptions of the transition stage of basic skills to higher mathematics of grade 7 learners. The participants of the study were the Grade 7 teachers taught in the face-to-face instructions. Purposive sampling was used in this study to select the participants from the secondary schools of Tagum City. The researchers employed a qualitative phenomenological case study design using in-depth interviews to gather information from the participants. Results showed that learners’ lack of mastery in basic skills, learning in the new environment affects transition, learners’ perception of mathematics is negative, curriculum implementation is challenging, and teaching strategies should be varied. Findings also suggested that remedial classes may be conducted, interactive instructions may be implemented, and hiring competent teachers to teach mathematics may be recommended. Furthermore, the Department of Education may continue to design programs that will support teachers in handling learners in the transition stage of their education career.', '2022-04-28', 'La Filipina National High School', ' transition stage, basic skills, higher mathematics, phenomenological case study', 10, '17-22', 'Transition Stage of Basic Skills to Higher Mathematics of Grade 7 - Abay.pdf', '../resources/research/Transition Stage of Basic Skills to Higher Mathematics of Grade 7 - Abay.pdf'),
(20, 'Keeping Arts Education Alive: A Phenomenological Inquiry', '0', 'Schools Division', 'Basic Research', 'Teaching and Learning', 'Submitted', 'This phenomenological inquiry explores the experiences of Arts and Design students in distance learning. Moreover, this study discovers the coping mechanism and insights of the students in distance learning. In School A, purposive sampling was used in choosing 15 participants for the in-depth interviews and focused group discussion. The revealing themes for the experiences of Arts and Design students in distance learning were developing self-efficacy, lacking teacher’s guidance, managing time, enhancing creativity and innovation. To cope with the challenges in distance learning, the Arts and Design students were utilizing the internet as a learning supplement, getting support from family and peers, adapting to the changes to the mode of learning, and facing challenges positively. The Arts and Design students continue to face these challenges with insights for the provision of educational technology, setting goals for the future, promoting arts education to others, and participating in classroom discussions and activities. This study suggests that action is needed to place the arts on education agendas and that arts matter for all learners at all levels of education. The benefits of arts education are part of a powerful strategy to keep the arts strong in our nation’s schools.', '2022-04-28', 'Tagum City National Comprehensive High School', ' arts education, arts and design students, phenomenology, distance learning', 10, '23-29', 'Keeping Arts Education Alive - Go.pdf', '../resources/research/Keeping Arts Education Alive - Go.pdf'),
(21, 'Pakikipagsapalaran sa Bagong Mundo ng Pagtuturo: Paggalugad sa Online na Pagkatuto sa Filipino', '0', 'Schools Division', 'Basic Research', 'Teaching and Learning', 'Submitted', 'Ang pandaigdigang krisis pangkalusugan na nararanasan ay nagbigay ng kakaibang mukha sa larangan ng edukasyon. Ito ay nagdulot ng pagpapasara ng mga paaralan, pagsasagawa ng distance learning at mahigpit sa pagpapatupad ng public health safety protocols upang mapigilan ang pagkalap at pagkahawa ng sakit na COVID-19. Sa transisyong nararanasan natin sa Bagong Kadawyan (New Normal) ng pagtuturo isang malaking hamon ngayon kung paano maipagpapatuloy ang epektibong paghahatid ng kaalaman at pagtuturo ng mga kasanayang inaasahang malinang ng mga mag- aaral sa kabila ng krisis na ito. Isa sa mga naging pamamaraan ng pagtuturo ngayong pandemya ay ang online distance learning. Hindi ganoon kadali ang pagsasakatuparan ng nasabing pamamaraan dahil dapat taglayin ang batayang kasanayan sa ICT ng kapwa mag-aaral at guro upang maipagpatuloy ang pagkatuto kahit layo at distansiya man ang pagitan. Maliban pa riyan, ang kakulangan at kahinaan ng pasilidad ng internet sa ating bansa ang isa sa mga hamon sa panahon ng pagpapatupad ng online distance learning. Dagdag pa rito ang pinansiyal na kakayahan ng mga magulang na masuportahan ang pangangailangan ng mga anak. Layunin ng kuwalitatibong pag-aaral na ito na alamin, ilarawan at suriin ang karanasan ng mga piling mag-aaral na gumagamit ng online distance learning sa panahon ng pandemya. Maliban pa rito, matukoy rin ang pananaw at saloobin ng mga mag-aaral upang mapatatag at mapalalim pa ang implementasyon ng online distance learning.  ', '2022-04-28', 'Tagum National Trade School', ' bagong mundo ng pagtuturo, online na pagkatuto sa Filipino, kuwalitatibong pag-aaral, phenomenology', 10, '30-34', 'Pakikipagsapalaran sa Bagong Mundo ng Pagtuturo - Generalao.pdf', '../resources/research/Pakikipagsapalaran sa Bagong Mundo ng Pagtuturo - Generalao.pdf'),
(22, 'Pupils at Risk of Dropping Out in Modular Distance Learning: A Qualitative Inquiry', '0', 'Schools Division', 'Basic Research', 'Teaching and Learning', 'Submitted', 'The new average education transformed the classroom into a home school. This study aimed to find out the experiences, coping mechanisms, and insights of the pupils at risk of dropping out in modular distance learning. The participants of this study were the grade 6 pupils at risk of dropping out. Purposive sampling was used in this study to choose the participants from the elementary schools of Tagum City. The researcher employed a qualitative phenomenological research design using in-depth interviews and focus group discussions on gathering participants\' information. Results showed that learners struggle in utilizing self-learning modules in this new normal education. However, some expressed that it shaped them into independent ones. They find ways to cope with those burdens happening in modular distance learning. Furthermore, learners did their best to study at home with the help of their family members. Findings suggest that constant teacher communication, parents’ support, and proper motivation may be intensified to address the concerns of difficult lessons. Moreover, the Department of Education may provide programs to support the teachers, parents, and learners in enhancing modular study.', '2022-04-28', 'Laureta Elementary School', ' pupils at risk of dropping out, modular distance learning, phenomenology', 10, '35-40', 'Pupils at Risk of Dropping Out in Modular Distance Learning - Majestad.pdf', '../resources/research/Pupils at Risk of Dropping Out in Modular Distance Learning - Majestad.pdf'),
(23, 'The Effect of Google Classroom as a Learning Platform in the Performance of Students in Mathematics', '0', 'Schools Division', 'Basic Research', 'Teaching and Learning', 'Submitted', 'This research aimed to test the effect of Google Classroom as a learning platform on students\' performance in Mathematics. A quasi-experimental study of two Grade 11 sections was conducted on functions and rational functions during a lesson. The respondents were selected through purposive sampling. The study was conducted during the first quarter of the first semester of 2021-2022. The study implemented three phases: pre-experimentation, experimentation, and post experimentation. A pre-test was given to both groups. Group A (control group) received modular instruction, while Group B (experimental group) received the treatment using Google Classroom. Afterward, a post-test was given to both groups. The data gathered were tabulated, computed, and analyzed using appropriate statistical tools, such as Mean, T-test, and ANCOVA. The pre-test results indicated that the control group had the edge over the experimental group at the start of the experiment. Results in the post-test demonstrated that the two groups performed well equally in Mathematics. However, comparing the mean gain scores between the two groups revealed that the experimental group was higher than the control group. This pointed out that using Google Classroom as a learning platform in teaching Mathematics was better than the modular way of teaching.  ', '2022-04-28', 'Tagum City National High School', 'google classroom, performance in mathematics, action research', 10, '41-46', 'Google Classroom as a Learning Platform - Flores.pdf', '../resources/research/Google Classroom as a Learning Platform - Flores.pdf'),
(24, 'The Role of Technology in the 21st Century Education of Learners', '0', 'Schools Division', 'Basic Research', 'Teaching and Learning', 'Submitted', 'Technology is one of the most powerful influences in today\'s educational scene. This mixed methods study aimed to determine and describe the lived experiences of senior high school learners in terms of the role of technology in 21st century education. The researcher collected data from 100 senior high school (SHS) learners using simple random sampling for the quantitative phase (QTP) and five from SHS students using purposive sampling for the qualitative phase (QLP) for SY 2021-2022. Survey questionnaires and an in-depth interview guide were utilized to gather data and were analyzed using frequency, percentage, mean, and thematic analysis. Results revealed that because of the widespread availability of internet mobile connections, there has been a significant number of students that use technology. As a result, students have a high level of computer skills and use of technology because it is useful and relevant in the educational process. Similarly, students see the value of incorporating technology into classroom discussions since it increases their interest in the subject. Furthermore, technology is viewed as an important tool for learning, and the importance of using social media is proved by learners\' average daily usage. The introduction of popular media into the lives of students has had a significant impact on this. Despite the negative effects of social media, students still find it useful in the classroom since it can spark other people\'s interests and inspire them to learn. It implies that instructional delivery and assessment need to be addressed with respect to the needs of the 21st century learners.', '2022-04-28', 'Tagum National Trade School', 'role of technology, 21st century education, convergent parallel approach, Tagum City  ', 10, '47-58', 'The Role of Technology in the 21st Century Education of Learners - Gopo.pdf', '../resources/research/The Role of Technology in the 21st Century Education of Learners - Gopo.pdf'),
(25, 'Topic, Inference, Proof, Sum-up (TIPS): A Strategy in Developing  Reading Comprehension in Science Among Learners', '0', 'Schools Division', 'Basic Research', 'Teaching and Learning', 'Submitted', 'Today\'s scientific education relies on higher-level thinking skills rather than basic academic information. This study examined the effective use of the Topic, Inference, Proof, Sum-up (TIPS) strategy in developing reading comprehension in science among learners. The investigation was conducted using a quasi-experimental design in School A of Tagum City Division, Davao del Norte. The 70 Grade 7 students who participated were chosen through a purposive sampling technique. The data were collected using synchronous online timed pretest and posttest, and the results were then tabulated and textually presented, analyzed, and interpreted. The findings reveal that no significant difference between the experimental group\'s pretest and posttest has a p-value of 0.13, which is larger than the 0.05 level for significance (p > 0.05). The null hypothesis is therefore not refuted. This indicates that there is no significant difference between the experimental group\'s pretest and post-test scores when the TIPS strategy is used. Students have below-average reading comprehension, lack skills, abilities, struggle to utilize the TIPS strategy and have the same competency level before and after the intervention. The findings suggest improving research-based academic interventions in all fields to investigate other factors of poor reading comprehension, developing a parallel test that aligns with standardized test material, and evaluating each key stage area that needs improvement.', '2022-04-28', 'Tagum City National High School', ' reading comprehension, reading strategy, science, quasi-experiment, teaching-learning', 10, '59-63', 'Topic, Inference, Proof, Sum-up (TIPS) - Leop.pdf', '../resources/research/Topic, Inference, Proof, Sum-up (TIPS) - Leop.pdf'),
(26, 'Utilization of eReading Approach in Improving Reading Ability  Among Grade 3 Learners in Basic Sight Words', '0', 'Schools Division', 'Basic Research', 'Teaching and Learning', 'Submitted', 'Reading is a vital aspect of literacy development. With the present covid-19 pandemic, teachers and learners have faced sweeping, unprecedented changes to teaching and learning. eReading Approach as a reading intervention will help increase learners’ reading performance. The study was conducted to improve the reading ability among Grade 3 learners. Action research utilized the quasi-experimental research design to gather information from the respondents. To determine whether any difference exists, pre-test and post-test were conducted. The result was gathered, tabularized, and interpreted. Results showed that there was a significant difference between pre-test and post-test, especially in the experimental group where the eReading approach was being applied. Findings also suggested that the teacher-advisers and reading teachers may apply this approach to improve reading ability among learners. Moreover, teachers may undergo training on video editing to provide better video materials for better reading intervention.', '2022-04-28', 'Madaum Elementary School', ' eReading approach, basic sight words, reading ability, action research ', 10, '64-69', 'Utilization of eReading Approach in Improving Reading Ability - Rabe.pdf', '../resources/research/Utilization of eReading Approach in Improving Reading Ability - Rabe.pdf'),
(27, 'Digital Library: A Web-Based Research File Management System', '0', 'Schools Division', 'Basic Research', 'Governance', 'Submitted', 'In today\'s digital world, keeping data and having copies of documents was no longer a problem. This study aimed to create a web-based file management system for the Department of Education, Tagum City Division, to replace manual file and record administration with a dependable, efficient, and secure system. Design and development research highlighted the parallels between instructional design and scientific problem-solving strategies. The Digital Library was developed using Feature Driven Development, which prioritized quality at all stages because it was meticulously designed and tested after implementation until it was accepted. The webpages were designed to be distinct from the official DepEd RXI – Tagum City Division Official Website because this study was intended to be unrelated. This system was created to archive previously published research papers digitally, and it categorizes the research outputs to make tracking easier. The search filter was designed to help find a research output using keywords. The Teacher-Researchers and the Schools Division Research Committee can use saved files to conduct literature reviews and decide which research subjects to pursue. On this basis, the Digital Library might be used with Cloud Storage and Web Hosting to provide convenient and easy access to Teacher-Researchers outside the Division Office.', '2022-04-28', 'Tagum National Trade School', ' digital library, file management system, design, and development, feature-driven development, governance', 10, '71-75', 'Digital Library - Calcaben.pdf', '../resources/research/Digital Library - Calcaben.pdf'),
(29, 'Dynamics of Community-School Partnership in Implementing Reading Intervention Program During COVID-19 Pandemic:  A Phenomenological Inquiry', '0', 'Schools Division', 'Basic Research', 'Governance', 'Submitted', '  Engagement of stakeholders in school is a vital element that plays a pivotal role towards the school’s success while engaging them effectively within the spectrum of their responsibility. This study explored the experiences of school heads on their approaches in engaging stakeholders during the COVID-19 pandemic in the implementation of community-based reading intervention programs that would enhance students’ literacy skills in Tagum City Division. Further, this investigated their coping strategies amidst the pitfalls of stakeholders’ participation in the program. In exploring the approaches of school heads, the researcher employed the qualitative – phenomenological study of which the primary instrument of data gathering was through in-depth interview of the seven participants who were school heads, selected through purposive sampling. In terms of school heads’ approaches in engaging stakeholders, the following themes emerged namely: planning and organizing, implementing innovative practices, capacitating, and orienting the stakeholders, and establishing a strong home-school partnership. Further, the themes that surfaced for school heads’ coping approaches were intensifying resource generation efforts, effective information dissemination and communication with stakeholders, and strengthening community linkages. It has implications on the need for school heads to sustain various approaches towards effective engagement of stakeholders amidst the pandemic. To achieve holistic education, stakeholders need to play a supportive role in education and the Department of Education must consider the enactment of a policy for stakeholders’ engagement. Thus, it has a continued synergy to every school’s effort exemplified in strong partnerships among multi-stakeholders especially during crises.  ', '2022-04-28', 'Magugpo Pilot Central Elementary School', '  community-school partnerships, reading intervention program, COVID-19 pandemic, qualitative-phenomenological method, Tagum City, Philippines  ', 10, '76-83', 'Community-School Partnership in Implementing Reading Intervention Program - Leopardas.pdf', '../resources/research/Community-School Partnership in Implementing Reading Intervention Program - Leopardas.pdf'),
(30, 'Exploring the Domain of Early Language, Literacy, and Numeracy:  Accounts of Teachers and Parents', '0', 'Schools Division', 'Basic Research', 'Governance', 'Submitted', 'This qualitative study explores the experiences of teachers and parents in the implementation of Mother Tongue-Based Multilingual Education (MTB-MLE) subject and the use of Mother Tongue (MT) language as a medium of instruction. Moreover, this study discovers the coping mechanism and insights of the teachers and parents. In Schools A, B, and C, purposive sampling was used in choosing 15 participants for the in-depth interviews and focused group discussion. In this study, the teachers’ and parents’ responses are centered to MTB-MLE as a subject per se and as a medium of instruction. The results revealed the themes for experiences: struggling with MT language use, sustaining MT for instruction, determining the downside of MTB-MLE subject, preferring English for numeracy, and losing interest to learn. To cope with the challenges, teachers, and parents’ resort to bridging the languages, creating solutions, and strengthening parent-teacher links. The participants continue to experience the challenges with insights for re-evaluating the curriculum, intensifying the second language use, and retaining the mother tongue language instruction. This implies that an evaluation is needed to address the challenges in teaching particularly in using MT as the medium of instruction in the primary schools. The benefits of using the second language may be considered following the demands of 21st century education.', '2022-04-28', 'Suaybaguio-Riña Elementary School', ' mother tongue-based multilingual education, literacy, numeracy, K to 3 learners', 10, '84-94', 'Exploring the Domain of Early Language, Literacy, and Numeracy - Orillaneda.pdf', '../resources/research/Exploring the Domain of Early Language, Literacy, and Numeracy - Orillaneda.pdf'),
(31, 'In-Depth Explication of Project EAGLE: A Qualitative Inquiry', '0', 'Schools Division', 'Basic Research', 'Governance', 'Submitted', 'This study aimed to discuss the prevalent Project EAGLE in relation to looping of the Department of Education Tagum City Division. The participants of the study were administrators and teachers as the project implementers, and parents and learners as the project beneficiaries. Purposive sampling was used in this study to select the participants from the two project implementing schools. The researchers employed a qualitative phenomenological case study design using in-depth interview and focus group discussion to gather information from the participants. Results showed that the project E.A.G.L.E substantiate the pedagogy of the teachers, develop teachers’ competence, gain parental support, create teaching innovation, and adapt curricular changes. Findings also suggested continuing the concept of looping and continuing the project E.A.G.L.E implementation. This implied that teachers could take advantage of opportunities in the lesson to consolidate students’ learning outcomes holistically. Furthermore, the Department of Education can continue the project through strengthening the support in the teaching and learning process, enhancing transition process per grade level, and designing assessments for learning intended to track students’ progress year-round.', '2022-04-28', 'Tagum City Division', 'project EAGLE, looping, phenomenological case study, Tagum City', 10, '95-99', 'In-Depth Explication of Project Eagle - Seguido et al.pdf', '../resources/research/In-Depth Explication of Project Eagle - Seguido et al.pdf'),
(32, 'Life After Retirement: The Stories of Retirees', '0', 'Schools Division', 'Basic Research', 'Governance', 'Submitted', ' Life after retirement is a complex world of uncertainties and happiness. This qualitative research design employing a multiple-case study approach on teachers’ retirement aimed to describe the experiences of the three retirees, namely: Sunset Traveler, Farmer in the Dusk, and Businessman in Twilight Zone, who were selected through purposive sampling. Through in-depth interviews (IDI), results revealed that the experiences of the retirees were taking pleasure in retirement, spending quality time with family, being free from pressure, and adjusting to routines. They cope by doing religious activities, asking for help from family members, and prioritizing health. The retirees ask for provision for hospitalization benefits, investing for the future, financial management, and government provision on more comprehensive retirement benefits. These imply the need to highlight the provision for looking into the health and wellness and the retirement benefits and packages of the retired teachers. ', '2022-04-28', 'Tagum City Division', '  governance, multiple-case study, life after retirement, Davao del Norte ', 10, '100-109', 'Life After Retirement - Fadul.pdf', '../resources/research/Life After Retirement - Fadul.pdf'),
(33, 'Profiling of Teachers on their Engagement in Research: Basis for Intervention', '0', 'Schools Division', 'Action Research', 'Governance', 'Submitted', 'The issue of teachers\' reluctance to perform research is related to the following factors: lack of research time, lack of instruction for research, and lack of knowledge in choosing an appropriate research technique. This study aimed to profile the teaching and non-teaching personnel in the Division of Tagum City in terms of their engagement in research through a quantitative non-experimental design. A standardized researcher-made survey questionnaire was administered to the teaching and non-teaching personnel identified through simple random sampling to collect the data. Data were analyzed using frequency and percentage. Results revealed that most respondents are married, baccalaureate degree holders, and are in the Teacher I position. Further, most of the respondents have no proper training and have no opportunity to attend intensive research training. A high percentage of respondents cannot disseminate and publish the results and findings in academic journals. The level of difficulty of most teachers in making the various parts and all the technical aspects of research varies from moderate to difficult. In this way, rigorous research training is recommended for teachers.', '2022-04-28', 'Tagum City Division', ' profile of teachers, engagement in research, Tagum City, Davao del Norte, Philippines', 10, '110-124', 'Profiling of Teachers on their Engagement - Salmon.pdf', '../resources/research/Profiling of Teachers on their Engagement - Salmon.pdf'),
(34, 'Project EAGLE: Comparative Analysis on Its Impact in Improving Academic Success of Recipient Vis-À-Vis Non-Recipient Learners', '0', 'Schools Division', 'Basic Research', 'Governance', 'Submitted', 'Enhancing the academic success of learners can be a challenging task for teachers and it is in this context that Project E.A.G.L.E. utilizing looping strategy was implemented. This study determined the impact of project E.A.G.L.E. in improving the academic success of recipient vis-à-vis non-recipient learners in two implementing schools in Tagum City Division. A quantitative research design was employed using a causal-comparative approach utilizing secondary data: the pre-assessment of kindergarteners’ learning domains development and the grades of learners in grades one and two. Data were analyzed using mean, ANOVA, and T-test and results showed that the profile of the Project E.A.G.L.E. recipient and non-recipient learners for two schools indicated an average overall development in the domain. Further, the level of grade one E.A.G.L.E. and non-E.A.G.L.E. recipient learners for school A were high and average respectively, but high for both E.A.G.L.E. and non-E.A.G.L.E. learners in grade two. For school B, E.A.G.L.E. and non-E.A.G.L.E. learners’ level of academic success was average. There was no significant difference between recipient and non-recipient kindergarteners\' post learning domains development assessment for both schools. There was no significant difference between grades one and two learners\' academic success for the two schools. However, there was an overall significant difference between the grades one and two recipient and non-recipient learners’ academic success for both schools. It is recommended that Project E.A.G.L.E. using looping strategy must be intensified by reviewing the mechanisms to further improve its implementation and academic success of the learners. ', '2022-04-28', 'Tagum City Division', ' project EAGLE, academic success, recipient and non-recipient learners, causal-comparative approach', 10, '125-133', 'A Comparative Analysis on Its Impact in Improving Academic - Tado et al.pdf', '../resources/research/A Comparative Analysis on Its Impact in Improving Academic - Tado et al.pdf'),
(35, 'Assessing the Crisis Self-Efficacy in Relation to Work Commitment of Teachers Amidst COVID-19 ', '0', 'Schools Division', 'Basic Research', 'Human Resource Development', 'Submitted', 'The COVID-19 outbreak significantly impacted public education in terms of teacher instruction, school operations, and policy changes. A paradigm shift was on the horizon, and teachers\' crisis self-efficacy and commitment to their work were investigated. The study examined the impact of crisis self-efficacy on the commitment of teachers to work in the era of the COVID-19 pandemic. A questionnaire adapted for this study was retrieved from google forms online and was distributed to 61 elementary school teachers in the Division of Tagum City, Davao del Norte, Philippines. Data analysis was done using the mean, standard deviation, Pearson r, and regression analysis. Findings indicated that the commitment of teachers was significantly influenced by crisis self-efficacy. Throughout the time of crisis, commitment to work was best predicted by teachers\' preventive, achievement, and uncertainty management skills. Further, a high degree of self-efficacy was observed in the aspect of action and prevention. Also noted was a high level of work commitment to teaching and learning. Correlation analysis revealed a link between crisis self-efficacy and the commitment of the teachers. The researcher recommended conducting a comparative study using a greater number of respondents in a different area to validate the finding of this study.', '2022-04-28', 'Apokon Elementary School', 'crisis self-efficacy, work commitment, teachers, COVID-19 pandemic', 10, '135-143', 'Assessing the Crisis Self-Efficacy in Relation to Work Commitment of Teachers - Sioting Jr.pdf', '../resources/research/Assessing the Crisis Self-Efficacy in Relation to Work Commitment of Teachers - Sioting Jr.pdf');

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
(1, 'ajautor', 'a6f2df33c90bf193238b14f611e0e44f', 'Allyn Joy', 'Calcaben', 'Autor', 'allynjoy.calcaben@deped.gov.ph', 'Special Science Teacher I', 'Tagum National Trade School', 1, 1, 1, 'blob.png'),
(2, 'jautor', 'd41d8cd98f00b204e9800998ecf8427e', 'Jemwel', 'Oghoc', 'Autor', 'joautor@up.edu.ph', 'Master Teacher III', 'Tagum City National High School', 0, 1, 1, ''),
(3, 'kitidul', 'd41d8cd98f00b204e9800998ecf8427e', 'Christine', 'Uriarte', 'Idul', 'christine.idul001@deped.gov.ph', 'Master Teacher I', 'Magugpo Pilot Central Elementary School', 0, 1, 1, '_Y7A8174.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dev_role`
--
ALTER TABLE `dev_role`
  ADD PRIMARY KEY (`dev_role_id`);

--
-- Indexes for table `dev_team`
--
ALTER TABLE `dev_team`
  ADD PRIMARY KEY (`dev_id`),
  ADD KEY `dev_journal_id` (`dev_journal_id`),
  ADD KEY `dev_role_id` (`dev_role_id`);

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
-- AUTO_INCREMENT for table `dev_team`
--
ALTER TABLE `dev_team`
  MODIFY `dev_id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memorandum`
--
ALTER TABLE `memorandum`
  MODIFY `memo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `researcher`
--
ALTER TABLE `researcher`
  MODIFY `researcher_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `research_journal`
--
ALTER TABLE `research_journal`
  MODIFY `journal_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `research_output`
--
ALTER TABLE `research_output`
  MODIFY `research_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dev_team`
--
ALTER TABLE `dev_team`
  ADD CONSTRAINT `dev_journal_id` FOREIGN KEY (`dev_journal_id`) REFERENCES `research_journal` (`journal_id`),
  ADD CONSTRAINT `dev_role_id` FOREIGN KEY (`dev_role_id`) REFERENCES `dev_role` (`dev_role_id`);

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
