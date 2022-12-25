-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 01:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `MobileNumber` varchar(15) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', '111002242', 'admin@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '2020-06-04 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblapplyjob`
--

CREATE TABLE `tblapplyjob` (
  `ID` int(10) NOT NULL,
  `UserId` int(5) DEFAULT NULL,
  `JobId` int(5) DEFAULT NULL,
  `Applydate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(200) DEFAULT NULL,
  `ResponseDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblapplyjob`
--

INSERT INTO `tblapplyjob` (`ID`, `UserId`, `JobId`, `Applydate`, `Status`, `ResponseDate`) VALUES
(1, 1, 2, '2020-06-11 13:54:07', 'Sorted', '2020-06-11 13:54:07'),
(2, 1, 3, '2020-06-04 11:54:10', 'Sorted', '2020-06-04 11:54:10'),
(3, 3, 7, '2020-09-02 18:16:54', 'Sorted', '2020-09-02 18:16:54'),
(4, 6, 16, '2022-12-05 00:41:11', 'Sorted', '2022-12-05 00:41:11'),
(5, 6, 19, '2022-12-15 14:52:13', 'Sorted', '2022-12-15 14:52:13'),
(6, 7, 24, '2022-12-15 15:09:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(2, 'Information Technology Development ', 'Information technology (IT) development managers oversee a company\'s computer-related activities. They supervise IT workers, manage upgrades of systems and software, negotiate with product vendors, and ensure the security of a company\'s IT infrastructure.', '2022-09-14 06:32:34', '2020-06-05 11:53:56', 1),
(7, 'Application Development', 'The application developer processes users\' needs to customize the software for computer programs, designs prototype applications, implements, and tests source code and troubleshoots software applications.', '2022-12-15 12:24:16', NULL, 0),
(8, 'Software Tools Development', 'A Software Development Tool, also known as a Software Programming Tool, is a computer program used by software developers to create, edit, manage, support, and debug other applications, frameworks, and programs', '2022-12-15 12:25:20', NULL, 0),
(9, 'Network Engineering', 'Network Engineers are responsible for designing, implementing, monitoring and managing the local and wide area networks of an organisation to ensure maximum uptime for users.', '2022-12-15 12:28:38', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbleducation`
--

CREATE TABLE `tbleducation` (
  `ID` int(10) NOT NULL,
  `UserID` int(5) DEFAULT NULL,
  `Qualification` varchar(200) DEFAULT NULL,
  `ClgorschName` varchar(200) DEFAULT NULL,
  `PassingYear` varchar(200) DEFAULT NULL,
  `Stream` varchar(200) DEFAULT NULL,
  `CGPA` varchar(10) DEFAULT NULL,
  `Percentage` decimal(4,0) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbleducation`
--

INSERT INTO `tbleducation` (`ID`, `UserID`, `Qualification`, `ClgorschName`, `PassingYear`, `Stream`, `CGPA`, `Percentage`, `CreationDate`) VALUES
(7, 6, 'Graduation', 'UiTM', '2020', NULL, '4', NULL, '2022-12-04 14:56:21'),
(8, 7, 'Graduation', 'UiTM', '2018', NULL, '4', NULL, '2022-12-16 00:29:56'),
(9, 7, 'Post Graduation', 'UiTM', '2020', NULL, '3.6', NULL, '2022-12-16 00:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployers`
--

CREATE TABLE `tblemployers` (
  `id` int(11) NOT NULL,
  `ConcernPerson` varchar(150) DEFAULT NULL,
  `EmpEmail` varchar(250) DEFAULT NULL,
  `EmpPassword` varchar(250) DEFAULT NULL,
  `CompnayName` varchar(255) DEFAULT NULL,
  `CompanyTagline` mediumtext DEFAULT NULL,
  `CompnayDescription` mediumtext DEFAULT NULL,
  `CompanyUrl` varchar(255) DEFAULT NULL,
  `CompnayLogo` varchar(200) DEFAULT NULL,
  `noOfEmployee` char(10) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `typeBusinessEntity` varchar(255) DEFAULT NULL,
  `lcation` varchar(255) DEFAULT NULL,
  `establishedIn` char(200) DEFAULT NULL,
  `RegDtae` timestamp NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployers`
--

INSERT INTO `tblemployers` (`id`, `ConcernPerson`, `EmpEmail`, `EmpPassword`, `CompnayName`, `CompanyTagline`, `CompnayDescription`, `CompanyUrl`, `CompnayLogo`, `noOfEmployee`, `industry`, `typeBusinessEntity`, `lcation`, `establishedIn`, `RegDtae`, `LastUpdationDate`, `Is_Active`) VALUES
(9, 'Ridhwan Azahari', 'ridhwan@gmail.com', '$2y$12$K/DO3k.Q8tmHxfwFqn/QRO/rhl1Xo/ZkvV8jghEw1MPbTlG5uVFZu', 'IT Solution Sdn Bhd', 'A Moments of Technology', '1. Analyze the requirements of the company and organize IT the resources of the company accordingly\r\n2. Evaluating the needs of the company amd choosing the most suitable software, hardware and other IT requirements such as networking\r\n3. Provide troubleshooting solutions of software and hardware problems.\r\n4. Setting up new users’ accounts and profiles and dealing with password issues\r\n5. Ensure that all IT requirements of a company are fulfilled\r\n', 'htpp://www.itsolution.my', 'a267e9e3961262e032bd8ad3cc8bd004.jpg', '20', 'Information technology', 'Partnership', 'Perlis', 'Sept, 2018', '2022-12-15 12:38:32', '2022-12-15 14:21:00', 1),
(11, 'Aini', 'aini@gmail.com', '$2y$12$w5TSsA/f8kBPDxfWGm9yn.hRSLbs9oKq9jQT1zuwUm9zXmo67.tx.', 'Intel Sdn Bhd', 'Go off and do something wonderful', 'Intel Corporation is an American multinational corporation and technology company headquartered in Santa Clara, California. It is the world\'s largest semiconductor chip manufacturer by revenue, and is one of the developers of the x86 series of instruction sets, the instruction sets found in most personal computers.', 'http://www.intel.com', '6b6ac7fb5725b6d3f30896e30fda28c8.png', NULL, NULL, NULL, NULL, NULL, '2022-12-15 14:35:44', '2022-12-15 14:35:44', 1),
(12, 'aa', 'asd@gmail.com', '$2y$12$ts5zTrIixs5G4Obxk0M3ieis8/9tn2yK5qaqX2uJvQQanZtGCrz3G', 'aa', 'aa', 'aa', 'https://asd.com', '60635d4bd6e99b482ac5fb9727080db8jpeg', NULL, NULL, NULL, NULL, NULL, '2022-12-16 12:23:01', '2022-12-16 12:23:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblexperience`
--

CREATE TABLE `tblexperience` (
  `ID` int(10) NOT NULL,
  `UserID` int(10) DEFAULT NULL,
  `EmployerName` varchar(200) DEFAULT NULL,
  `EmployementType` varchar(200) DEFAULT NULL,
  `Designation` varchar(200) DEFAULT NULL,
  `Ctc` decimal(10,0) DEFAULT NULL,
  `FromDate` varchar(200) DEFAULT NULL,
  `ToDate` varchar(200) DEFAULT NULL,
  `Skills` varchar(200) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblexperience`
--

INSERT INTO `tblexperience` (`ID`, `UserID`, `EmployerName`, `EmployementType`, `Designation`, `Ctc`, `FromDate`, `ToDate`, `Skills`, `CreationDate`) VALUES
(1, 1, 'ABC PVT LTD', 'Full Time', 'Software Developer', '50000', '2012-06-05', '2014-09-07', 'PHP,PDO', '2020-06-03 11:12:01'),
(2, 1, 'PAL pvt ltd', 'Full Time', 'Software Developer', '60000', '2014-09-08', '2018-06-09', 'PHP,PDO', '2020-06-03 11:14:41'),
(3, 1, 'FALT pvt ltd', 'Full Time', 'Software Developer', '75000', '2019-09-08', '', 'PHP, PDO', '2020-06-03 11:17:54'),
(4, 1, 'HMT Pvt ltd', 'fulltime', 'Software Developer', '75000', '2020-01-09', '', 'PHP, PDO, HTML, Excel', '2020-06-03 12:12:40'),
(5, 3, 'ABC', 'Fulltimw', 'Software Developer', '25000', '2019-07-02', '2020-02-29', '', '2020-09-02 18:15:05'),
(6, 3, 'XYZ', 'Fulltime', 'Software Developer', '40000', '2020-03-01', '2020-09-02', '', '2020-09-02 18:15:43'),
(7, 6, 'Yayasan Amal Malaysia', 'partime', 'Designer', '1500', '2017-01-17', '2018-06-19', '', '2022-12-04 14:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbljobs`
--

CREATE TABLE `tbljobs` (
  `jobId` int(11) NOT NULL,
  `employerId` int(11) NOT NULL,
  `jobCategory` varchar(255) DEFAULT NULL,
  `jobTitle` varchar(255) DEFAULT NULL,
  `jobType` varchar(255) DEFAULT NULL,
  `salaryPackage` char(200) DEFAULT NULL,
  `skillsRequired` varchar(255) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `jobLocation` varchar(255) DEFAULT NULL,
  `jobDescription` mediumtext DEFAULT NULL,
  `JobExpdate` date DEFAULT NULL,
  `postinDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `isActive` int(1) NOT NULL,
  `city` varchar(50) NOT NULL,
  `allowance_provide` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljobs`
--

INSERT INTO `tbljobs` (`jobId`, `employerId`, `jobCategory`, `jobTitle`, `jobType`, `salaryPackage`, `skillsRequired`, `experience`, `jobLocation`, `jobDescription`, `JobExpdate`, `postinDate`, `updationDate`, `isActive`, `city`, `allowance_provide`) VALUES
(19, 9, 'Application Development', 'Software Application Developer', NULL, '200', 'PHP', NULL, 'Perlis', 'good', '2023-01-04', '2022-12-15 12:57:35', '2022-12-15 14:30:17', 0, 'Kuala Perlis', NULL),
(22, 9, 'Application Development', 'Designer', NULL, '400', 'Android Studio', NULL, 'Perlis', 'A designer is an organisation or individual whose business involves preparing or modifying designs for construction projects, or arranging for, or instructing, others to do this. Designs include drawings, design details, specifications, bills of quantity and design calculations', '2023-01-04', '2022-12-15 14:25:27', NULL, 1, 'Kuala Perlis', NULL),
(23, 9, 'Software Tools Development', 'Software Application Developer', NULL, NULL, 'PHP', NULL, 'Perlis', 'Also known as a software developer or software architect, an application developer is responsible for developing and modifying source code for software applications. These applications are aimed at aiding customers with computer tasks or programs.', '2023-01-07', '2022-12-15 14:27:00', '2022-12-16 13:30:50', 1, 'Kuala Perlis', NULL),
(24, 11, 'Network Engineering', 'Database', NULL, '200', 'PHP', NULL, 'Perak', 'A database role specifies a set of database level permissions that let a user perform specific tasks. Database roles are not fixed and can be created, modified, and removed. Database roles let you collect users into a single unit to which you can apply permissions.', '2023-01-03', '2022-12-15 14:37:11', NULL, 1, 'Ipoh', NULL),
(25, 12, 'Application Development', 'Java Developer', NULL, '123', 'asdad', NULL, 'Perak', 'asda', '2022-12-10', '2022-12-17 02:23:04', '2022-12-17 04:14:50', 1, 'Taiping', NULL),
(26, 12, 'Application Development', 'Java Developer', NULL, '', 'asdasd', 'asda', 'Kedah', 'asdsad', '2022-12-10', '2022-12-17 02:27:59', '2022-12-17 02:28:52', 1, 'jitra', NULL),
(27, 12, 'Application Development', 'Software Application Developer', NULL, '12', 'asd', NULL, 'Kedah', 'asdad', '2022-12-16', '2022-12-17 07:43:48', '2022-12-17 07:47:33', 1, 'jitra', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbljobseekers`
--

CREATE TABLE `tbljobseekers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `EmailId` varchar(150) DEFAULT NULL,
  `ContactNumber` varchar(15) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `Resume` varchar(150) DEFAULT NULL,
  `AboutMe` mediumtext DEFAULT NULL,
  `ProfilePic` varchar(200) DEFAULT NULL,
  `Skills` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljobseekers`
--

INSERT INTO `tbljobseekers` (`id`, `FullName`, `EmailId`, `ContactNumber`, `Password`, `Resume`, `AboutMe`, `ProfilePic`, `Skills`, `RegDate`, `LastUpdationDate`, `IsActive`) VALUES
(4, 'Anis', 'anis@gmail.com', '11102345', '$2y$12$KLwA7of5n.MfO10Pe3lY.eOqJ3BQlTWWcF7JDphzVwkCrVZhWOkCC', '1882b910d3fd6d426061f72127d767c01669461825.pdf', NULL, 'e94d2f9d87dbbf3b5dd71bb7140939721669461955.jpg', NULL, '2022-11-26 11:23:45', '2022-11-26 11:25:55', 1),
(5, 'testing', 'test@gmail', '999', '$2y$12$HJJ27l8M7bvD3/HHgGQ3XutZw8If2KPeU/383M.KMfjFITAlHjzvu', '2cc2e15d6353c5f63cd0da5f36272a111670155482.pdf', NULL, NULL, NULL, '2022-12-04 12:04:42', NULL, 1),
(6, 'Aina', 'aina@gmail.com', '124356456', '$2y$12$czq9JUF0EjY0VVZH6SNCoOlu3NwxApfxgH7MZEA8EBLxjnJmzoM2q', '1882b910d3fd6d426061f72127d767c01670165440.pdf', 'Hi There', 'e94d2f9d87dbbf3b5dd71bb7140939721670165642.jpg', 'PHP', '2022-12-04 14:50:40', '2022-12-04 14:54:22', 1),
(7, 'Anisah', 'anisah@gmail.com', '0134852438', '$2y$12$pMkRTRQHKgFwzooPSTnvAOe39WcKjXAtteV1n31ml0kap3fnsBGh.', '1882b910d3fd6d426061f72127d767c01671150431.pdf', 'Hi everybody', 'b12f0f79830cce3151085f4c4fa3a2a31671116917.jpg', 'PHP', '2022-12-15 15:07:56', '2022-12-16 00:27:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

CREATE TABLE `tblmessage` (
  `ID` int(10) NOT NULL,
  `JobID` int(5) DEFAULT NULL,
  `UserID` int(5) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `ResponseDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmessage`
--

INSERT INTO `tblmessage` (`ID`, `JobID`, `UserID`, `Message`, `Status`, `ResponseDate`) VALUES
(1, 3, 1, 'Your resume has been sort listed. Kindly comes with original documents at a time.', 'Sorted', '2020-06-11 13:54:25'),
(2, 2, 1, 'You are sort listed comes with your original document', 'Sorted', '2020-08-31 18:30:00'),
(3, 7, 3, 'Sort listed', 'Sorted', '2020-09-01 18:30:00'),
(4, 16, 6, 'congrat', 'Sorted', '2022-12-05 00:41:11'),
(5, 19, 6, 'Congrat', 'Sorted', '2022-12-15 14:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `ID` int(11) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` longtext DEFAULT NULL,
  `Email` varchar(200) NOT NULL,
  `MobileNumber` bigint(10) NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', '<div class=\"iw-heading  style1 vc_custom_1511523196571 border-color-theme\" style=\"outline: none; box-sizing: border-box; margin-top: 0px; margin-right: auto; margin-left: auto; color: rgb(119, 119, 119); font-family: \" open=\"\" sans\";=\"\" font-size:=\"\" 13px;=\"\" width:=\"\" 670px;=\"\" margin-bottom:=\"\" 35px=\"\" !important;\"=\"\"><div class=\"iwh-description\" style=\"text-align: justify; outline: none; box-sizing: border-box; color: rgb(51, 51, 51); font-size: 16px; line-height: 28px;\">Our Internship Portal creates an opportunity for both student and organization to embrace an easy internship process. Student can register for free on this Internship Portal and they can receive different internship posting and updates that is related to their career search or their specific field. As an organization, you can make use of our Internship Portal to post different internship openings as well as use them for searching for the most deserving student for vacancies. This helps to save time and help streamline the right student for a particular internship. This Internship&nbsp;Portal can be used by both organization to post internship openings and student to find the internship placement of their choice. Our Internship Portal creates a platform for people seeking for the internship placement opportunities as well as corporations seeking best student for internship openings, to come together. We are one of the best Internship Portal and we also have provisions that make it possible for them to collect the required knowledge and background of each company or student. All the internship placement are categorically organized in groups related to each field and industry. Internship Portals have aided numerous student get suitable for their internship and given a boost to their career growth. So do not hesitate to explore your career opportunities with our Internship Portal and give your career the elevation that you have always been waiting for.</div></div>', '2020-06-05 12:18:06', 0, '2022-12-13 00:45:11'),
(2, 'contactus', 'Contact Us', 'www.internshipportal.com', 'internshipportal@gmail.com', 1110022421, '2022-11-26 11:20:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblapplyjob`
--
ALTER TABLE `tblapplyjob`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `tbleducation`
--
ALTER TABLE `tbleducation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblemployers`
--
ALTER TABLE `tblemployers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblexperience`
--
ALTER TABLE `tblexperience`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `tbljobs`
--
ALTER TABLE `tbljobs`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `tbljobseekers`
--
ALTER TABLE `tbljobseekers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblapplyjob`
--
ALTER TABLE `tblapplyjob`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbleducation`
--
ALTER TABLE `tbleducation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblemployers`
--
ALTER TABLE `tblemployers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblexperience`
--
ALTER TABLE `tblexperience`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbljobs`
--
ALTER TABLE `tbljobs`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbljobseekers`
--
ALTER TABLE `tbljobseekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
