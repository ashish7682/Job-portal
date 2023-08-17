-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 10:09 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicants`
--

CREATE TABLE `tblapplicants` (
  `APPLICANTID` int(11) NOT NULL,
  `FNAME` varchar(90) NOT NULL,
  `LNAME` varchar(90) NOT NULL,
  `MNAME` varchar(90) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `SEX` varchar(11) NOT NULL,
  `CIVILSTATUS` varchar(30) NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `BIRTHPLACE` varchar(255) NOT NULL,
  `AGE` int(2) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `EMAILADDRESS` varchar(90) NOT NULL,
  `CONTACTNO` varchar(90) NOT NULL,
  `DEGREE` text NOT NULL,
  `APPLICANTPHOTO` varchar(255) NOT NULL,
  `NATIONALID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblapplicants`
--

INSERT INTO `tblapplicants` (`APPLICANTID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `SEX`, `CIVILSTATUS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `USERNAME`, `PASS`, `EMAILADDRESS`, `CONTACTNO`, `DEGREE`, `APPLICANTPHOTO`, `NATIONALID`) VALUES
(2019016, 'asd', 'asd', 'asd', 'asd', 'Female', 'none', '1980-01-29', 'asd', 39, 'aa', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'a@gmil.com', '12312312', 'asd', 'photos/final.png', ''),
(2019018, 'asdasd', 'asd', 'asd', 'sadas', 'Female', 'Single', '1992-01-12', 'sad', 27, 'ss', 'c1c93f88d273660be5358cd4ee2df2c2f3f0e8e7', 'a@gmil.com', 'sad', 'sad', '', ''),
(2019020, 'sad', 'sad', 'sad', 'asdsad', 'Female', 'Single', '1992-10-14', 'asdsad', 27, 'ddd', '9c969ddf454079e3d439973bbab63ea6233e4087', 'a@gmil.com', '123123', 'sadsadsad', 'photos/077db70b-ab84-46c4-bbaa-a5dd6b7332a4_200x200.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblattachmentfile`
--

CREATE TABLE `tblattachmentfile` (
  `FILEID` int(11) NOT NULL,
  `JOBID` int(11) NOT NULL,
  `FILE_NAME` varchar(90) NOT NULL,
  `FILE_LOCATION` varchar(255) NOT NULL,
  `USERATTACHMENTID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblattachmentfile`
--

INSERT INTO `tblattachmentfile` (`FILEID`, `JOBID`, `FILE_NAME`, `FILE_LOCATION`, `USERATTACHMENTID`) VALUES
(201900001, 2, 'Resume', 'photos/24122019073209Filtering a Group of Data VB.Net and SQL Server 2019.docx', 2019020),
(2147483647, 2, 'Resume', 'photos/24122019072801Filtering a Group of Data VB.Net and SQL Server 2019.docx', 2019019);

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumbers`
--

CREATE TABLE `tblautonumbers` (
  `AUTOID` int(11) NOT NULL,
  `AUTOSTART` varchar(30) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOKEY` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblautonumbers`
--

INSERT INTO `tblautonumbers` (`AUTOID`, `AUTOSTART`, `AUTOEND`, `AUTOINC`, `AUTOKEY`) VALUES
(1, '02983', 8, 1, 'userid'),
(2, '000', 79, 1, 'employeeid'),
(3, '0', 21, 1, 'APPLICANT'),
(4, '0000', 2, 1, 'FILEID');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGORYID` int(11) NOT NULL,
  `CATEGORY` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGORYID`, `CATEGORY`) VALUES
(10, 'Technology'),
(11, 'Managerial'),
(12, 'Engineer'),
(13, 'IT'),
(14, 'Civil Engineer'),
(15, 'HR'),
(23, 'Sales'),
(24, 'Banking'),
(25, 'Finance'),
(26, 'BPO'),
(27, 'Degital Marketing'),
(28, 'Shipping');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `COMPANYID` int(11) NOT NULL,
  `COMPANYNAME` varchar(90) NOT NULL,
  `COMPANYADDRESS` varchar(90) NOT NULL,
  `COMPANYCONTACTNO` varchar(30) NOT NULL,
  `COMPANYSTATUS` varchar(90) NOT NULL,
  `COMPANYMISSION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`COMPANYID`, `COMPANYNAME`, `COMPANYADDRESS`, `COMPANYCONTACTNO`, `COMPANYSTATUS`, `COMPANYMISSION`) VALUES
(2, 'URC', 'Bry Camugao', '023654', '', 'weqwe'),
(3, 'Copreros', 'Mabinay\'s', '035656', '', ''),
(4, 'Quest', 'Kabankalan City', '23165', '', ''),
(6, 'Palacios Company', 'Kabankalan City', '0625656899', '', ''),
(7, 'IT Company', 'Kabankalan City', '04564123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `INCID` int(11) NOT NULL,
  `EMPLOYEEID` varchar(30) NOT NULL,
  `FNAME` varchar(50) NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `MNAME` varchar(50) NOT NULL,
  `ADDRESS` varchar(90) NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `BIRTHPLACE` varchar(90) NOT NULL,
  `AGE` int(11) NOT NULL,
  `SEX` varchar(30) NOT NULL,
  `CIVILSTATUS` varchar(30) NOT NULL,
  `TELNO` varchar(40) NOT NULL,
  `EMP_EMAILADDRESS` varchar(90) NOT NULL,
  `CELLNO` varchar(30) NOT NULL,
  `POSITION` varchar(50) NOT NULL,
  `WORKSTATS` varchar(90) NOT NULL,
  `EMPPHOTO` varchar(255) NOT NULL,
  `EMPUSERNAME` varchar(90) NOT NULL,
  `EMPPASSWORD` varchar(125) NOT NULL,
  `DATEHIRED` date NOT NULL,
  `COMPANYID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`INCID`, `EMPLOYEEID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `SEX`, `CIVILSTATUS`, `TELNO`, `EMP_EMAILADDRESS`, `CELLNO`, `POSITION`, `WORKSTATS`, `EMPPHOTO`, `EMPUSERNAME`, `EMPPASSWORD`, `DATEHIRED`, `COMPANYID`) VALUES
(76, '2018001', 'Chambe', 'Narciso', 'Captain', 'mabinay', '1992-01-23', 'Mabinay', 26, 'Male', 'Married', '032656', 'chambe@yahoo.com', '', 'Fuel Tender', '', '', '2018001', 'f3593fd40c55c33d1788309d4137e82f5eab0dea', '2018-05-23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `FEEDBACKID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `REGISTRATIONID` int(11) NOT NULL,
  `FEEDBACK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbljob`
--

CREATE TABLE `tbljob` (
  `JOBID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `CATEGORY` varchar(90) NOT NULL,
  `OCCUPATIONTITLE` varchar(90) NOT NULL,
  `REQ_NO_EMPLOYEES` int(11) NOT NULL,
  `SALARIES` double NOT NULL,
  `DURATION_EMPLOYEMENT` varchar(90) NOT NULL,
  `QUALIFICATION_WORKEXPERIENCE` text NOT NULL,
  `JOBDESCRIPTION` text NOT NULL,
  `PREFEREDSEX` varchar(30) NOT NULL,
  `SECTOR_VACANCY` text NOT NULL,
  `JOBSTATUS` varchar(90) NOT NULL,
  `DATEPOSTED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljob`
--

INSERT INTO `tbljob` (`JOBID`, `COMPANYID`, `CATEGORY`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`, `DATEPOSTED`) VALUES
(1, 2, 'Technology', 'ISD', 6, 15000, 'jan 30', 'Two year Experience', 'We are looking for bachelor of science in information technology.\r\nasdasdasd', 'Male/Female', 'yes', '', '2018-05-20 00:00:00'),
(2, 2, 'Technology', 'Accounting', 1, 15000, 'may 20', 'Two years Experience', 'We are looking for bachelor of science in Acountancy', 'Female', 'yes', '', '2018-05-20 02:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbljobregistration`
--

CREATE TABLE `tbljobregistration` (
  `REGISTRATIONID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `JOBID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `APPLICANT` varchar(90) NOT NULL,
  `REGISTRATIONDATE` date NOT NULL,
  `REMARKS` varchar(255) NOT NULL DEFAULT 'Pending',
  `FILEID` int(11) NOT NULL,
  `PENDINGAPPLICATION` tinyint(1) NOT NULL DEFAULT '1',
  `HVIEW` tinyint(1) NOT NULL DEFAULT '1',
  `DATETIMEAPPROVED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `USERID` varchar(30) NOT NULL,
  `FULLNAME` varchar(40) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `PICLOCATION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `FULLNAME`, `USERNAME`, `PASS`, `ROLE`, `PICLOCATION`) VALUES
('00018', 'JANO ', 'admin', 'admin', 'Administrator', 'photos/077db70b-ab84-46c4-bbaa-a5dd6b7332a4_200x200.png'),
('2018001', 'Chambe Narciso', 'Narciso', 'f3593fd40c55c33d1788309d4137e82f5eab0dea', 'Employee', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblapplicants`
--
ALTER TABLE `tblapplicants`
  ADD PRIMARY KEY (`APPLICANTID`);

--
-- Indexes for table `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  ADD PRIMARY KEY (`FILEID`);

--
-- Indexes for table `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  ADD PRIMARY KEY (`AUTOID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGORYID`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`COMPANYID`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`INCID`),
  ADD UNIQUE KEY `EMPLOYEEID` (`EMPLOYEEID`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`FEEDBACKID`);

--
-- Indexes for table `tbljob`
--
ALTER TABLE `tbljob`
  ADD PRIMARY KEY (`JOBID`);

--
-- Indexes for table `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  ADD PRIMARY KEY (`REGISTRATIONID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblapplicants`
--
ALTER TABLE `tblapplicants`
  MODIFY `APPLICANTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019021;

--
-- AUTO_INCREMENT for table `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  MODIFY `FILEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT for table `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  MODIFY `AUTOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGORYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `COMPANYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `INCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `FEEDBACKID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbljob`
--
ALTER TABLE `tbljob`
  MODIFY `JOBID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  MODIFY `REGISTRATIONID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
