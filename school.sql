-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 11:52 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(11) NOT NULL,
  `ANAME` varchar(150) NOT NULL,
  `APASS` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `ANAME`, `APASS`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `CID` int(11) NOT NULL,
  `CNAME` varchar(150) NOT NULL,
  `CSEC` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`CID`, `CNAME`, `CSEC`) VALUES
(7, 'I', 'A'),
(8, 'I', 'B'),
(9, 'I', 'C'),
(10, 'II', 'A'),
(11, 'II', 'B'),
(12, 'II', 'C'),
(13, 'III', 'A'),
(14, 'III', 'B'),
(15, 'IV', 'A'),
(16, 'IV', 'B'),
(18, 'IV', 'C'),
(19, 'V', 'A'),
(20, 'V', 'B'),
(21, 'V', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `EID` int(11) NOT NULL,
  `ENAME` varchar(150) NOT NULL,
  `ETYPE` varchar(150) NOT NULL,
  `EDATE` varchar(150) NOT NULL,
  `SESSION` varchar(150) NOT NULL,
  `CLASS` varchar(255) NOT NULL,
  `Sub_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`EID`, `ENAME`, `ETYPE`, `EDATE`, `SESSION`, `CLASS`, `Sub_ID`) VALUES
(18, 'Term', 'I-Term', '19-04-2019', 'FN', 'I', 9),
(19, 'Term', 'I-Term', '21-04-2019', 'FN', 'II', 9);

-- --------------------------------------------------------

--
-- Table structure for table `hclass`
--

CREATE TABLE `hclass` (
  `HID` int(11) NOT NULL,
  `TID` int(11) NOT NULL,
  `CLA` varchar(150) NOT NULL,
  `SEC` varchar(150) NOT NULL,
  `SUB` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hclass`
--

INSERT INTO `hclass` (`HID`, `TID`, `CLA`, `SEC`, `SUB`) VALUES
(1, 1, 'VIII', 'A', 'English'),
(4, 4, 'III', 'B', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `MID` int(11) NOT NULL,
  `REGNO` varchar(150) NOT NULL,
  `SUB` varchar(150) NOT NULL,
  `MARK` varchar(150) NOT NULL,
  `TERM` varchar(150) NOT NULL,
  `CLASS` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`MID`, `REGNO`, `SUB`, `MARK`, `TERM`, `CLASS`) VALUES
(1, 'S101', 'Tamil', '95', 'I-Term', 'III'),
(2, 'S101', 'English', '65', 'II-Term', 'III');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `RID` int(11) NOT NULL,
  `EID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `STU_ID` int(11) NOT NULL,
  `MARKS` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `TID` int(11) NOT NULL,
  `TNAME` varchar(150) NOT NULL,
  `TPASS` varchar(150) NOT NULL,
  `QUAL` varchar(150) NOT NULL,
  `SAL` varchar(150) NOT NULL,
  `PNO` varchar(150) NOT NULL,
  `MAIL` varchar(150) NOT NULL,
  `PADDR` text NOT NULL,
  `IMG` varchar(150) NOT NULL,
  `SUB` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`TID`, `TNAME`, `TPASS`, `QUAL`, `SAL`, `PNO`, `MAIL`, `PADDR`, `IMG`, `SUB`) VALUES
(3, 'ram', '1234', 'MCA', '15000', '9875641230', 'ram@gmail.com', 'Salem', 'staff/2.jpg', 'English'),
(4, 'Sam', '123', 'MBA', '15000', '1234', 'sam@gmail.com', 'moghbazar', 'staff/atten.jpg', 'Maths'),
(16, 'Sanjida Reza', '1234', 'Msc', '50000', '01754646456654', 'example@gmail.com', 'sdsadadasdad', 'staff/teacher.jpg', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `stu`
--

CREATE TABLE `stu` (
  `SID` int(5) NOT NULL,
  `SNAME` varchar(10) NOT NULL,
  `SPASS` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu`
--

INSERT INTO `stu` (`SID`, `SNAME`, `SPASS`) VALUES
(1, 'rafa', 123);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `RNO` varchar(150) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `FNAME` varchar(150) NOT NULL,
  `DOB` varchar(150) NOT NULL,
  `GEN` varchar(150) NOT NULL,
  `PHO` varchar(150) NOT NULL,
  `MAIL` varchar(150) NOT NULL,
  `ADDR` text NOT NULL,
  `SIMG` varchar(150) NOT NULL,
  `AID` int(11) NOT NULL,
  `PASS` varchar(255) NOT NULL DEFAULT '1234',
  `CID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `RNO`, `NAME`, `FNAME`, `DOB`, `GEN`, `PHO`, `MAIL`, `ADDR`, `SIMG`, `AID`, `PASS`, `CID`) VALUES
(1, 'S101', 'Anitha', 'Ram', '17-10-2003', 'Female', '9874561230', 'raf@gmail.com', 'Salem', 'student/images.jpg', 1, '1234', 7),
(3, 'S102', 'Kavya', 'Ram', '19-11-2002', 'Female', '8529634710', 'ram@gmail.com', 'Salem', 'student/images.jpg', 4, '1234', 7),
(4, 'S103', 'Kishor', 'Ravi', '17-03-2005', 'Male', '8794561230', 'ravi@gmail.com', 'Salem', 'student/images.jpg', 4, '1234', 7),
(5, 'S104', 'Touhid Islam', 'Rafiqul', '27-06-2010', 'Male', '0175729470', 'example@gmail.com', 'dfgdgdggccbcbvcbcxbcb', 'student/images.jpg', 3, '1234', 7),
(6, 'S105', 'Rifah Tasnia Nisa', 'Rafiqul Islam Chowdhury', '18-03-2001', 'Female', '0175729470', 'example@gmail.com', 'sfsfsffsfdsfxvxvxcv', 'student/images.jpg', 0, '1234', 7),
(7, 'S105', 'Rifah Tasnia Nisa', 'Rafiqul Islam Chowdhury', '18-03-2001', 'Female', '0175729470', 'example@gmail.com', 'sfsfsffsfdsfxvxvxcv', 'student/images.jpg', 1, '1234', 7),
(8, 'S106', 'Ariful Islam Chowdhury', 'sdgdfgdgdfsgsdfgfdsgfdsgsdg', '18-12-2015', 'Male', '0175729470', 'example@gmail.com', 'fdgdffdgfdgdgdsfg', 'student/images.jpg', 1, '1234', 7),
(9, 'S107', 'Sajid', 'fdgdfgdfgdfgdg', '19-09-2003', 'Male', '0175729470', 'example@gmail.com', 'gdfdgdfg', 'student/images.jpg', 1, '2345', 7),
(10, 'S107', 'Sajid', 'fdgdfgdfgdfgdg', '19-09-2003', 'Male', '0175729470', 'example@gmail.com', 'gdfdgdfg', 'student/images.jpg', 1, '2345', 7),
(11, 'S107', 'Sajid', 'fdgdfgdfgdfgdg', '19-09-2003', 'Male', '0175729470', 'example@gmail.com', 'gdfdgdfg', 'student/images.jpg', 1, '2345', 7),
(12, 'S108', 'Hasanu Rahman', 'dfsdfdsfsfsfsf', '20-04-2002', 'Male', '0175729470', 'example@gmail.com', 'sdfsfghffghfh', 'student/images.jpg', 1, '1234', 7),
(13, 'S109', 'Ashiq Hossain', 'fdgdfgdfgdfgdg', '17-11-2004', 'Male', '0175729470', 'example@gmail.com', 'fsdfsdfsfsfs', 'student/images.jpg', 1, '1234', 10);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `SID` int(5) NOT NULL,
  `SNAME` varchar(10) NOT NULL,
  `SPASS` int(10) NOT NULL,
  `SMAIL` varchar(20) NOT NULL,
  `SROLL` int(10) NOT NULL,
  `SDOB` varchar(150) NOT NULL,
  `SCLS` int(10) NOT NULL,
  `SSEC` varchar(10) NOT NULL,
  `SADDR` text NOT NULL,
  `SIMG` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`SID`, `SNAME`, `SPASS`, `SMAIL`, `SROLL`, `SDOB`, `SCLS`, `SSEC`, `SADDR`, `SIMG`) VALUES
(1, 'rafa', 123, 'sanjida@gmail.com', 101, '4-4-1996', 10, 'A', 'dhaka', 'staff/atten.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `SID` int(11) NOT NULL,
  `SNAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`SID`, `SNAME`) VALUES
(2, 'English'),
(3, 'Maths'),
(5, 'Social Science'),
(8, 'Bangla'),
(9, 'Science'),
(10, 'Religion');

-- --------------------------------------------------------

--
-- Table structure for table `sub_teacher`
--

CREATE TABLE `sub_teacher` (
  `ID` int(11) NOT NULL,
  `Sub_ID` int(11) DEFAULT NULL,
  `TID` int(11) DEFAULT NULL,
  `CID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_teacher`
--

INSERT INTO `sub_teacher` (`ID`, `Sub_ID`, `TID`, `CID`) VALUES
(3, 9, 16, 7),
(4, 9, 16, 8),
(5, 9, 16, 9),
(6, 9, 16, 10),
(7, 9, 16, 11),
(8, 9, 16, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `hclass`
--
ALTER TABLE `hclass`
  ADD PRIMARY KEY (`HID`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`RID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `stu`
--
ALTER TABLE `stu`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `sub_teacher`
--
ALTER TABLE `sub_teacher`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hclass`
--
ALTER TABLE `hclass`
  MODIFY `HID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stu`
--
ALTER TABLE `stu`
  MODIFY `SID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `SID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_teacher`
--
ALTER TABLE `sub_teacher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
