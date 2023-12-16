-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 12:25 AM
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
-- Database: `launchpad`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_registration`
--

CREATE TABLE `company_registration` (
  `Company_ID` int(11) NOT NULL,
  `Student_ID` varchar(20) NOT NULL,
  `Company_name` varchar(100) NOT NULL,
  `Company_logo` varchar(100) NOT NULL,
  `Company_description` text NOT NULL,
  `Registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_registration`
--

INSERT INTO `company_registration` (`Company_ID`, `Student_ID`, `Company_name`, `Company_logo`, `Company_description`, `Registration_date`) VALUES
(69, '22-UR-0007', 'SmartCo', 'images/657607840f43f.jpg', 'SmartCo Description', '2023-12-11 02:46:28'),
(70, '21-UR-0123', 'Globe', 'images/657607e48efb1.jpg', 'Globe Description', '2023-12-11 02:48:04'),
(72, '23-UR-0987', 'TnT', 'images/6576482ba4762.jpg', 'desc', '2023-12-11 07:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `EvaluationID` int(11) NOT NULL,
  `Phase` varchar(50) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Evaluator_ID` int(11) NOT NULL,
  `Comments` text NOT NULL,
  `ApprovalStatus` varchar(50) NOT NULL,
  `Evaluation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ideation_phase`
--

CREATE TABLE `ideation_phase` (
  `IdeationID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Project_logo` varchar(255) NOT NULL,
  `Project_Overview` text NOT NULL,
  `Project_Modelcanvas` varchar(255) NOT NULL,
  `Submission_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_registration`
--

CREATE TABLE `instructor_registration` (
  `Instructor_ID` int(11) NOT NULL,
  `Instructor_fname` varchar(100) NOT NULL,
  `Instructor_lname` varchar(100) NOT NULL,
  `Instructor_email` varchar(100) NOT NULL,
  `Instructor_password` varchar(255) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Instructor_contactno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_registration`
--

INSERT INTO `instructor_registration` (`Instructor_ID`, `Instructor_fname`, `Instructor_lname`, `Instructor_email`, `Instructor_password`, `Department`, `Instructor_contactno`) VALUES
(25, 'JC', 'Reyer', 'jc@psu.edu.ph', '12!@qwQW', 'College of Computing', '09123456789'),
(26, 'cj', 'jc', 'cj@psu.edu.ph', '12qw!@QW', 'College of Architecture', '09523456789'),
(27, 'Abc', 'Def', 'abc_def@psu.edu.ph', 'zxZX12!@', 'College of Engineering', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `investor_request`
--

CREATE TABLE `investor_request` (
  `InvestorRequestID` int(11) NOT NULL,
  `PublishedProjectID` int(11) NOT NULL,
  `InvestorName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SourceofIncome` varchar(100) NOT NULL,
  `IdentityProof` varchar(255) NOT NULL,
  `RequestedDocuments` varchar(255) NOT NULL,
  `Submission_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pitching_phase`
--

CREATE TABLE `pitching_phase` (
  `PitchingID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `VideoPitch` varchar(255) NOT NULL,
  `PitchDeck` varchar(255) NOT NULL,
  `Submission_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Project_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Project_title` varchar(100) NOT NULL,
  `Project_Description` text NOT NULL,
  `Project_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_ID`, `Company_ID`, `Project_title`, `Project_Description`, `Project_date`) VALUES
(1, 69, 'Smart Home Automation System', 'Developing an intelligent home automation system that utilizes IoT devices to enhance convenience and energy efficiency.', '2023-12-10 19:50:17'),
(2, 69, 'Augmented Reality Campus Navigation', 'Implementing an augmented reality solution to help students navigate the campus easily, providing real-time directions and information.', '2023-12-10 19:55:20'),
(3, 69, 'Eco-Friendly Waste Management System', 'Designing a waste management system focused on sustainability, promoting recycling, and reducing environmental impact.', '2023-12-10 19:55:20'),
(4, 69, 'Virtual Health Assistant App', 'Creating a mobile application that serves as a virtual health assistant, providing users with personalized health tips and tracking features.', '2023-12-10 19:50:17'),
(5, 69, 'AI-Powered Language Learning Platform', 'Building an artificial intelligence-driven language learning platform that adapts to users\' proficiency levels and learning styles for efficient language acquisition.', '2023-12-10 19:55:20'),
(6, 69, 'Smart Agriculture Monitoring System', 'Developing a smart monitoring system for agriculture that integrates sensors and data analytics to optimize crop growth and resource utilization.', '2023-12-10 19:55:20'),
(13, 69, 'Hello System', 'hello descp', '2023-12-11 07:09:02'),
(14, 69, 'PapasaKa System', 'This system...', '2023-12-11 07:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `project_member`
--

CREATE TABLE `project_member` (
  `Projectmember_ID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Student_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_mentor`
--

CREATE TABLE `project_mentor` (
  `Mentorassign_ID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Mentor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `published_project`
--

CREATE TABLE `published_project` (
  `PublishedProjectID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Published_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `Student_ID` varchar(50) NOT NULL,
  `Student_fname` varchar(100) NOT NULL,
  `Student_lname` varchar(100) NOT NULL,
  `Student_email` varchar(100) NOT NULL,
  `Student_password` varchar(255) NOT NULL,
  `Course` varchar(255) NOT NULL,
  `Year` varchar(20) NOT NULL,
  `Block` varchar(20) NOT NULL,
  `Student_contactno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`Student_ID`, `Student_fname`, `Student_lname`, `Student_email`, `Student_password`, `Course`, `Year`, `Block`, `Student_contactno`) VALUES
('21-UR-0123', 'Elijah', 'Vennise', '22ur2907@psu.edu.ph', '12qw!@QW', 'BS Information Technology', '2nd Year', 'D', '+639673845232'),
('22-UR-0007', 'Allen James', 'Alvaro', '22ur0007@psu.edu.ph', '@Llen123', 'BS Information Technology', '3rd Year', 'A', '09123457890'),
('23-UR-0987', 'Patrick', 'Tomas', '23ur0987@psu.edu.ph', 'asAS12!@', 'BS Computer Engineering', '4th Year', 'D', '+639673845232');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_registration`
--
ALTER TABLE `company_registration`
  ADD PRIMARY KEY (`Company_ID`),
  ADD KEY `Fk_company_registration` (`Student_ID`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`EvaluationID`),
  ADD KEY `Fk_one_evaluation` (`Evaluator_ID`),
  ADD KEY `Fk_two_ecaluation` (`Project_ID`);

--
-- Indexes for table `ideation_phase`
--
ALTER TABLE `ideation_phase`
  ADD PRIMARY KEY (`IdeationID`),
  ADD KEY `Fk_ideation_phase` (`Project_ID`);

--
-- Indexes for table `instructor_registration`
--
ALTER TABLE `instructor_registration`
  ADD PRIMARY KEY (`Instructor_ID`),
  ADD UNIQUE KEY `Instructor_ID` (`Instructor_ID`),
  ADD UNIQUE KEY `Instructor_email` (`Instructor_email`);

--
-- Indexes for table `investor_request`
--
ALTER TABLE `investor_request`
  ADD PRIMARY KEY (`InvestorRequestID`),
  ADD KEY `Fk_investor` (`PublishedProjectID`);

--
-- Indexes for table `pitching_phase`
--
ALTER TABLE `pitching_phase`
  ADD PRIMARY KEY (`PitchingID`),
  ADD KEY `Fk_pitching` (`Project_ID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_ID`),
  ADD KEY `Fk_project_owner` (`Company_ID`);

--
-- Indexes for table `project_member`
--
ALTER TABLE `project_member`
  ADD PRIMARY KEY (`Projectmember_ID`),
  ADD KEY `Fk_project_member` (`Project_ID`),
  ADD KEY `FkTwo_project_member_` (`Student_ID`);

--
-- Indexes for table `project_mentor`
--
ALTER TABLE `project_mentor`
  ADD PRIMARY KEY (`Mentorassign_ID`),
  ADD KEY `Fk_mentor_assign` (`Project_ID`),
  ADD KEY `FkTwo_mentor_assign` (`Mentor_ID`);

--
-- Indexes for table `published_project`
--
ALTER TABLE `published_project`
  ADD PRIMARY KEY (`PublishedProjectID`),
  ADD KEY `Fk_published` (`Project_ID`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`Student_ID`),
  ADD UNIQUE KEY `Student_email` (`Student_email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_registration`
--
ALTER TABLE `company_registration`
  MODIFY `Company_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `EvaluationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ideation_phase`
--
ALTER TABLE `ideation_phase`
  MODIFY `IdeationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_registration`
--
ALTER TABLE `instructor_registration`
  MODIFY `Instructor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `investor_request`
--
ALTER TABLE `investor_request`
  MODIFY `InvestorRequestID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pitching_phase`
--
ALTER TABLE `pitching_phase`
  MODIFY `PitchingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `Project_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project_member`
--
ALTER TABLE `project_member`
  MODIFY `Projectmember_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_mentor`
--
ALTER TABLE `project_mentor`
  MODIFY `Mentorassign_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `published_project`
--
ALTER TABLE `published_project`
  MODIFY `PublishedProjectID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_registration`
--
ALTER TABLE `company_registration`
  ADD CONSTRAINT `Fk_company_registration` FOREIGN KEY (`Student_ID`) REFERENCES `student_registration` (`Student_ID`);

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `Fk_one_evaluation` FOREIGN KEY (`Evaluator_ID`) REFERENCES `instructor_registration` (`Instructor_ID`),
  ADD CONSTRAINT `Fk_two_ecaluation` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);

--
-- Constraints for table `ideation_phase`
--
ALTER TABLE `ideation_phase`
  ADD CONSTRAINT `Fk_ideation_phase` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);

--
-- Constraints for table `investor_request`
--
ALTER TABLE `investor_request`
  ADD CONSTRAINT `Fk_investor` FOREIGN KEY (`PublishedProjectID`) REFERENCES `published_project` (`PublishedProjectID`);

--
-- Constraints for table `pitching_phase`
--
ALTER TABLE `pitching_phase`
  ADD CONSTRAINT `Fk_pitching` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `Fk_project_owner` FOREIGN KEY (`Company_ID`) REFERENCES `company_registration` (`Company_ID`);

--
-- Constraints for table `project_member`
--
ALTER TABLE `project_member`
  ADD CONSTRAINT `FkTwo_project_member_` FOREIGN KEY (`Student_ID`) REFERENCES `student_registration` (`Student_ID`),
  ADD CONSTRAINT `Fk_project_member` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);

--
-- Constraints for table `project_mentor`
--
ALTER TABLE `project_mentor`
  ADD CONSTRAINT `FkTwo_mentor_assign` FOREIGN KEY (`Mentor_ID`) REFERENCES `instructor_registration` (`Instructor_ID`),
  ADD CONSTRAINT `Fk_mentor_assign` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);

--
-- Constraints for table `published_project`
--
ALTER TABLE `published_project`
  ADD CONSTRAINT `Fk_published` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
