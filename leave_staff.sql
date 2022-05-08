-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 07:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_staff`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(10) NOT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `time_log` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-11-03 05:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `CreationDate`) VALUES
(2, 'Information Technologies', 'ICT', '2017-11-01 07:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `emp_id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Av_leave` varchar(150) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL,
  `user_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`emp_id`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Designation`, `Address`, `Av_leave`, `Phonenumber`, `Status`, `RegDate`, `role`, `location`, `user_status`) VALUES
(2, 'Zamokuhle', 'Mhlanga', 'mhlangzamokuhle@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '30 June 1996', 'Information Technology Officer', 'Dalriach West Indingilizi Road Mbabane Farm 835', '22', '26878353037', 1, '2017-11-10 13:40:02', 'Admin', 'AFP-13.png', ''),
(9, 'Doctor', 'Mhlanga', 'lyonsoftwaretech@gmail.com', 'f9f16d97c90d8c6f2cab37bb6d1f1992', 'male', '30 June 1996', 'Information Technology Officer', 'Mbabane', '20', '26879353037', 1, '2022-03-05 07:44:52', 'Staff', 'AFP-13.png', ''),
(10, 'Siyabonga', 'Shongwe', 'siyabonga.s.shongwe@gmail.com', '776ba234bab8dcef6f27ada5f7850333', 'male', '23 April 1988', 'Information Technology Officer', 'Siteki', '8', '26879248267', 1, '2022-03-05 07:52:20', 'Staff', 'IMG_20220316_235101.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` date NOT NULL,
  `AdminRemark` mediumtext NOT NULL,
  `registra_remarks` mediumtext NOT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT 0,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `num_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `ToDate`, `FromDate`, `Description`, `PostingDate`, `AdminRemark`, `registra_remarks`, `AdminRemarkDate`, `Status`, `admin_status`, `IsRead`, `empid`, `num_days`) VALUES
(20, 'Casual Leave', '20-04-2022', '27-04-2022', 'Family gathering & sorting out family issues..', '2022-04-13', '', 'Leave approved', '2022-04-13 15:05:41 ', 1, 1, 1, 2, 8),
(21, 'Medical Leave', '20-04-2022', '21-04-2022', 'Medical Check Up', '2022-04-13', '', 'Permission granted...', '2022-04-13 19:54:19', 1, 1, 1, 10, 2),
(22, 'Casual Leave', '14-04-2022', '27-04-2022', 'Family holidays...', '2022-04-13', '', 'You will be needed during these selected dates..please choose other dates', '2022-04-13 19:44:23 ', 2, 2, 1, 9, 14),
(23, 'Casual Leave', '03-05-2022', '17-05-2022', 'Home leave', '2022-04-13', '', 'Okay', '2022-04-13 19:47:19 ', 1, 1, 1, 10, 15),
(24, 'Casual Leave', '14-06-2022', '30-06-2022', 'Family outings', '2022-04-13', '', 'OK..', '2022-04-13 20:03:10 ', 1, 1, 1, 10, 17),
(25, 'Casual Leave', '14-04-2022', '21-04-2022', 'FAMILY EVENTS...', '2022-04-13', '', 'Approved..', '2022-04-13 21:09:05 ', 1, 1, 1, 9, 8),
(26, 'Medical Leave', '20-04-2022', '20-04-2022', 'Medication appointment...', '2022-04-13', '', 'Affirmative....', '2022-04-13 22:07:43 ', 0, 1, 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `date_from` varchar(200) NOT NULL,
  `date_to` varchar(200) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `LeaveType`, `Description`, `date_from`, `date_to`, `CreationDate`) VALUES
(5, 'Casual Leave', 'Casual Leave', '2021-05-23', '2021-06-20', '2021-05-19 14:32:03'),
(6, 'Medical Leave', 'Medical Leave', '2021-05-05', '2021-05-28', '2021-05-19 15:29:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
