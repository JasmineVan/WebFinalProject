-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Jan 14, 2022 at 03:00 PM
-- Server version: 8.0.1-dmr
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `dayoff`
--

CREATE TABLE `dayoff` (
  `DayOffID` int(11) NOT NULL,
  `EmployeeID` varchar(6) NOT NULL,
  `DateRequest` date DEFAULT NULL,
  `NumberOfRequest` int(2) DEFAULT NULL,
  `Temp` int(2) DEFAULT NULL,
  `Reason` varchar(1000) DEFAULT NULL,
  `Attachment` text,
  `RequestStatus` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dayoff`
--

INSERT INTO `dayoff` (`DayOffID`, `EmployeeID`, `DateRequest`, `NumberOfRequest`, `Temp`, `Reason`, `Attachment`, `RequestStatus`) VALUES
(1, 'EM0001', '2022-01-01', 0, NULL, 'The first request was created by system', NULL, 0),
(2, 'EM0002', '2022-01-01', 0, NULL, 'The first request was created by system', NULL, 0),
(3, 'EM0003', '2022-01-01', 0, NULL, 'The first request was created by system', NULL, 0),
(4, 'EM0004', '2022-01-01', 0, NULL, 'The first request was created by system', NULL, 0),
(5, 'EM0005', '2022-01-01', 0, NULL, 'The first request was created by system', NULL, 0),
(6, 'EM0006', '2022-01-01', 0, NULL, 'The first request was created by system', NULL, 0),
(7, 'EM0007', '2022-01-01', 0, NULL, 'The first request was created by system', NULL, 0),
(8, 'EM0008', '2022-01-01', 0, NULL, 'The first request was created by system', NULL, 0),
(9, 'EM0009', '2022-01-01', 0, NULL, 'The first request was created by system', NULL, 0),
(10, 'EM0010', '2022-01-01', 0, NULL, 'The first request was created by system', NULL, 0),
(17, 'EM0001', '2022-01-13', NULL, 2, 'Sick', '../uploads3/EM0001-Reason.txt', 1),
(18, 'EM0006', '2022-01-13', NULL, 2, 'Moon Vacation', '../uploads3/EM0006-Reason.txt', 1),
(20, 'EM0011', '2021-01-01', NULL, NULL, 'The first request was created by system', NULL, 0),
(21, 'EM0012', '2021-01-01', NULL, NULL, 'The first request was created by system', NULL, 0),
(22, 'EM0013', '2021-01-01', NULL, NULL, 'The first request was created by system', NULL, 0),
(23, 'EM0014', '2021-01-01', NULL, NULL, 'The first request was created by system', NULL, 0),
(24, 'EM0015', '2021-01-01', NULL, NULL, 'The first request was created by system', NULL, 0),
(25, 'EM0016', '2021-01-01', NULL, NULL, 'The first request was created by system', NULL, 0),
(26, 'EM0017', '2021-01-01', NULL, NULL, 'The first request was created by system', NULL, 0),
(27, 'EM0018', '2021-01-01', NULL, NULL, 'The first request was created by system', NULL, 0),
(28, 'EM0019', '2021-01-01', NULL, NULL, 'The first request was created by system', NULL, 0),
(29, 'EM0020', '2021-01-01', NULL, NULL, 'The first request was created by system', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` varchar(10) NOT NULL,
  `DepartmentName` varchar(20) NOT NULL,
  `DepartmentLeader` varchar(6) DEFAULT NULL,
  `DepartmentDescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`, `DepartmentLeader`, `DepartmentDescription`) VALUES
('PB1', 'IT', 'EM0001', 'Department of Information Technology'),
('PB2', 'Sale', 'EM0003', 'Department of Marketing'),
('PB3', 'Engineer', 'EM0005', 'Department of Engineer'),
('PB4', 'HR', 'EM0004', 'Department of Human resources'),
('PB5', 'AV', 'EM0019', 'Department of Audiovisual');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` varchar(6) NOT NULL,
  `EmployeeName` varchar(20) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `AccountPassword` varchar(8) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Info` varchar(50) DEFAULT NULL,
  `Department` varchar(50) NOT NULL,
  `LeaderFlag` int(1) DEFAULT NULL,
  `AvatarPath` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `EmployeeName`, `DateOfBirth`, `AccountPassword`, `Email`, `Info`, `Department`, `LeaderFlag`, `AvatarPath`) VALUES
('EM0001', 'Trinh Van Thuong', '2020-01-20', '11111111', 'EM0001@gmail.com', 'The first employee of this company', 'IT', 1, '../uploads/EM0001-WhiteCat.jpg'),
('EM0002', 'Nguyen Son Tung', '2021-12-07', 'EM0002', 'EM0002@gmail.com', 'The second employee of this company', 'Engineer', 0, '../uploads/avatar.jpg'),
('EM0003', 'Pham Phuong Anh', '2021-12-20', '33333333', 'EM0003@gmail.com', 'The third employee of this company', 'Sale', 1, '../uploads/avatar.jpg'),
('EM0004', 'Vo Quoc Viet', '2021-12-06', '44444444', 'EM0004@gmail.com', 'The fourth employee of this company', 'HR', 1, '../uploads/avatar.jpg'),
('EM0005', 'Nguyen Huu', '2021-12-04', '55555555', 'EM0005@gmail.com', 'The fifth employee of this company', 'Engineer', 1, '../uploads/avatar.jpg'),
('EM0006', 'Trinh Nghia', '2021-09-07', '66666666', 'EM0006@gmail.com', 'The sixth employee of this company', 'IT', 0, '../uploads/avatar.jpg'),
('EM0007', 'Pham Quoc Anh', '2021-07-18', 'EM0007', 'EM0007@gmail.com', 'The seventh employee of this company', 'Sale', 0, '../uploads/avatar.jpg'),
('EM0008', 'Tran Anh', '2021-09-05', 'EM0008', 'EM0008@gmail.com', 'The eigth employee of this company', 'Engineer', 0, '../uploads/avatar.jpg'),
('EM0009', 'Tran Hoang Phu', '2021-09-06', 'EM0009', 'EM0009@gmail.com', 'The nineth employee of this company', 'IT', 0, '../uploads/avatar.jpg'),
('EM0010', 'Truong Huu Hao', '2021-09-15', 'EM0010', 'EM0010@gmail.com', 'The tenth employee of this company', 'IT', 0, '../uploads/avatar.jpg'),
('EM0011', 'Truong Tan Sang', NULL, 'EM0011', 'EM0011@gmail.com', NULL, 'AV', 0, '../uploads/avatar.jpg'),
('EM0012', 'Pham Quang Truong', NULL, 'EM0012', 'EM0012@gmail.com', NULL, 'AV', 0, '../uploads/avatar.jpg'),
('EM0013', 'Truong Thi Ha', NULL, 'EM0013', 'EM0013@gmail.com', NULL, 'Sale', 0, '../uploads/avatar.jpg'),
('EM0014', 'Nguyen Hue Man', NULL, 'EM0014', 'EM0014@gmail.com', NULL, 'IT', 0, '../uploads/avatar.jpg'),
('EM0015', 'Dao Duy Tu', NULL, 'EM0015', 'EM0015@gmail.com', NULL, 'AV', 0, '../uploads/avatar.jpg'),
('EM0016', 'Ho Van Thanh', NULL, 'EM0016', 'EM0016@gmail.com', NULL, 'Sale', 0, '../uploads/avatar.jpg'),
('EM0017', 'Trung Dung', NULL, 'EM0017', 'EM0017@gmail.com', NULL, 'Engineer', 0, '../uploads/avatar.jpg'),
('EM0018', 'Nguyen Van Su', NULL, 'EM0018', 'EM0018@gmail.com', NULL, 'HR', 0, '../uploads/avatar.jpg'),
('EM0019', 'John Harley', NULL, '00190019', 'EM0019@gmail.com', NULL, 'AV', 1, '../uploads/avatar.jpg'),
('EM0020', 'Hoang Van Thu', NULL, 'EM0020', 'EM0020@gmail.com', NULL, 'Sale', 0, '../uploads/avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `TaskID` int(10) NOT NULL,
  `TaskName` varchar(50) NOT NULL,
  `EmployeeID` varchar(8) NOT NULL,
  `TaskStatus` int(1) NOT NULL,
  `DatePublish` date DEFAULT NULL,
  `DateSubmit` date NOT NULL,
  `DateEmployeeSubmit` date DEFAULT NULL,
  `TaskDescription` varchar(1000) NOT NULL,
  `FileFromLeader` text,
  `FileFromEmployee` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`TaskID`, `TaskName`, `EmployeeID`, `TaskStatus`, `DatePublish`, `DateSubmit`, `DateEmployeeSubmit`, `TaskDescription`, `FileFromLeader`, `FileFromEmployee`) VALUES
(1, 'UML diagram', 'EM0006', 1, '2022-01-05', '2021-12-31', NULL, 'Write some more UML', NULL, NULL),
(2, 'Final step', 'EM0006', 2, '2022-01-05', '2021-12-30', NULL, 'Meeting QA, QC team.', NULL, NULL),
(3, 'Floor 4 ', 'EM0002', 1, '2022-01-05', '2021-12-30', NULL, 'Fix the electricity system in floor 4. Please take a look and get back to write report at floor 3', NULL, NULL),
(5, 'HaNoi', 'EM0006', 3, '2022-01-05', '2021-12-30', NULL, 'Prepare for the meeting in Ha Noi', NULL, NULL),
(6, 'Game Concept v1', 'EM0006', 4, '2022-01-05', '2022-10-01', NULL, 'Write game concept version 1 for final project', NULL, NULL),
(7, 'Final Project', 'EM0006', 6, '2022-01-05', '2022-01-31', NULL, 'De the website using React JS', NULL, NULL),
(8, 'Report', 'EM0006', 5, '2022-01-05', '2022-01-11', '2022-01-10', 'Write report for NL project', NULL, NULL),
(9, 'Game Dev', 'EM0006', 7, '2022-01-01', '2022-01-11', '2022-01-12', 'Making a 2D game using Unity engine on Web platform', NULL, NULL),
(10, 'UML diagram 2', 'EM0009', 1, '2022-01-13', '2022-02-04', NULL, 'Draw the UML diagram using draw.io tool', NULL, NULL),
(11, 'Design UI', 'EM0010', 1, '2022-01-14', '2022-02-01', NULL, 'Design the shoping website user interface', NULL, NULL),
(12, 'Report', 'EM0014', 1, '2022-01-14', '2022-01-27', NULL, 'Make the monthly report for the meeting on Friday', NULL, NULL),
(13, 'Information', 'EM0007', 1, '2022-01-14', '2022-02-04', NULL, 'Research the company research. What does your prospect do, and who are their customers?', '../uploads2/13-Docs.txt', NULL),
(14, 'Presentation', 'EM0013', 1, '2022-01-14', '2022-01-28', NULL, 'Once you’ve thoroughly gotten to know your prospect, you can start thinking about optimizing your sales demo.', NULL, NULL),
(15, 'Sale demo script', 'EM0007', 1, '2022-01-14', '2022-01-26', NULL, 'The script should be the core of any sales demo. Whether your sales force is one person or many, your demo needs a consistent message.', NULL, NULL),
(16, 'Deliver Demo', 'EM0016', 1, '2022-01-14', '2022-01-25', NULL, 'Deliver a demo to the prospective customer.', NULL, NULL),
(17, 'Summarize ', 'EM0016', 1, '2022-01-14', '2022-01-20', NULL, 'Summarize past conversations', NULL, NULL),
(18, 'Explain the product or service', 'EM0020', 1, '2022-01-14', '2022-01-28', NULL, 'Furthermore, if your company provides excellent customer service to help with the onboarding process and beyond, include that information in this part of the demo. Knowing help will be available when needed does wonders to reassure a doubtful prospect.', NULL, NULL),
(19, 'HR hiring', 'EM0018', 1, '2022-01-14', '2022-01-19', NULL, 'Your new employee needs to complete Form W-4 (Employee’s Withholding Certificate), which asks them how much federal income tax to withhold from their pay. You then submit the form to the IRS.', NULL, NULL),
(20, 'Telecom Audio', 'EM0011', 1, '2022-01-14', '2022-01-27', NULL, 'Focused on the effective high-quality delivery of audio visual / telecom services throughout ESD’s organization. This individual will be tasked with installing, configuring, supporting and troubleshooting ESD’s line of AV equipment, software applications and VOIP telephones. This individual will also be responsible for researching potential enhancements and developing proposals on how to improve the environment.', NULL, NULL),
(21, 'ESD corp', 'EM0012', 1, '2022-01-14', '2022-01-20', NULL, 'nstall, configure, support and administrate AV, Telecom, and supporting equipment at all ESD office locations', NULL, NULL),
(22, 'Meeting', 'EM0011', 1, '2022-01-14', '2022-01-19', NULL, 'Provide onsite and in-meeting technical support during critical board and executive meetings', NULL, NULL),
(23, 'Remote Assist', 'EM0015', 1, '2022-01-14', '2022-01-28', NULL, 'ssist with Zoom, Webex, MS Teams and other meeting application setup, configuration and administration', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dayoff`
--
ALTER TABLE `dayoff`
  ADD PRIMARY KEY (`DayOffID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD UNIQUE KEY `MaNV` (`EmployeeID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`TaskID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dayoff`
--
ALTER TABLE `dayoff`
  MODIFY `DayOffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `TaskID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
