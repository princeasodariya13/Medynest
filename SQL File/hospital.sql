-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2025 at 02:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adminName` varchar(255) DEFAULT NULL,
  `contactno` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `adminName`, `contactno`, `profile_pic`, `creationDate`) VALUES
(1, 'admin@gmail.com', '123456@', 'maharshi', 1234567890, 'uploads/profile_pics/68ea5146e5d57.jpg', '2024-10-07 16:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `userStatus`, `doctorStatus`) VALUES
(38, 'Cardiologists', 23, 17, 700, '2025-10-20', '7:15 PM', 1, 1),
(39, 'Neurologists', 21, 17, 500, '2025-10-13', '10:00 PM', 1, 1),
(40, 'Dentists', 24, 17, 1000, '2025-10-15', '9:30 PM', 1, 1),
(41, 'Cardiologists', 23, 18, 700, '2025-10-30', '10:00 PM', 1, 1),
(42, 'Dentists', 24, 17, 1000, '2025-10-31', '1:00 PM', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `profile_pic`) VALUES
(21, 'Neurologists', 'Prince', 'shilaj', '500', 9898989898, 'prince@gmail.com', '95e512b6a142a522c0f9e00580419056', '2025-10-11 12:23:43', ''),
(22, 'Gynecologists', 'jeel', 'bopal', '600', 9898989898, 'jeel@gmail.com', '524a580a299fba2f9aa83b36539eb858', '2025-10-11 12:27:49', ''),
(23, 'Cardiologists', 'maharshi', 'kalupur', '700', 9898984567, 'maharshi@gmail.com', '57688dda3604251fc69426e80c80e93e', '2025-10-11 12:28:53', ''),
(24, 'Dentists', 'jay', 'surat', '1000', 9898767655, 'jay@gmail.com', 'f0e7d0d17cff891edbc9cdf92dcd9297', '2025-10-11 15:37:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `docEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(93, 23, 'maharshi@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-11 16:06:58', NULL, 1),
(94, 23, 'maharshi@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-11 16:15:46', NULL, 1),
(95, 23, 'maharshi@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-11 16:18:19', NULL, 1),
(96, 21, 'prince@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-12 07:09:20', NULL, 1),
(97, 23, 'maharshi@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-12 07:15:19', NULL, 1),
(98, 23, 'maharshi@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-12 07:33:28', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`) VALUES
(18, 'Dentists', '2025-10-07 14:44:13'),
(19, 'Gynecologists', '2025-10-07 14:44:22'),
(20, 'ENT', '2025-10-07 14:44:26'),
(21, 'Cardiologists', '2025-10-07 14:44:45'),
(22, 'Orthopedic', '2025-10-07 14:44:50'),
(23, 'Neurologists', '2025-10-07 14:45:24'),
(24, 'Oncologists', '2025-10-07 14:45:33'),
(27, 'Surgeon', '2025-10-16 14:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(1, 2, '80/120', '110', '85', '97', 'Dolo,\r\nLevocit 5mg', '2025-05-16 09:07:16'),
(2, 1, '12', '22', '222', '333', 'peracetamol', '2025-10-05 11:35:17'),
(3, 3, '130', '555', '78', '650', 'dolo', '2025-10-07 05:59:30'),
(4, 4, '110', '85', '60', '101', 'Dolo 500\r\ncough syrup', '2025-10-08 03:42:45'),
(5, 5, '120', '85', '50', '102', 'dolo 500', '2025-10-08 05:24:50'),
(6, 7, '55', '85', '60', '101', 'cough syrup', '2025-10-15 14:13:30'),
(7, 8, '55', '85', '55', 'vvveee', 'vitamin D', '2025-10-15 16:51:02'),
(8, 9, '130', '555', '78', '650', 'vitamin C', '2025-10-16 15:53:29'),
(9, 9, '130', '555', '78', '650', 'dolo 300', '2025-10-16 15:53:44'),
(10, 10, '120', '85', '50', '102', 'dolo 500', '2025-11-04 05:57:14'),
(11, 12, '100', '150', '50', '50', 'dolo 500', '2025-10-11 15:57:43'),
(12, 15, '100', '150', '50', '50', 'dolo', '2025-10-11 16:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`) VALUES
(11, 21, 'prince', 9876543234, 'prince1@gmail.com', 'male', 'shilaj,ahmedabad', 21, 'fever', '2025-10-11 13:04:31'),
(12, 21, 'mercy', 9876545678, 'mercy@gmail.com', 'male', 'kalupur,ahmedabad', 18, 'body pain', '2025-10-11 13:06:03'),
(13, 21, 'Jeel', 9876567898, 'jeel@gmail.com', 'male', 'bopal,ahmedabad', 19, 'fever', '2025-10-11 13:26:01'),
(14, 24, 'sumo', 9876789876, 'sumo@gmail.com', 'male', 'surat', 20, 'body pain', '2025-10-11 15:54:29'),
(15, 23, 'dhruv', 9876789876, 'dhruv@gmail.com', 'male', 'gandhidham', 20, 'fever', '2025-10-11 16:19:47'),
(16, 23, 'prem', 9876789876, 'prem@gmail.com', 'male', 'porbandar', 21, 'headache ', '2025-10-12 07:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `email`, `userip`, `loginTime`, `logout`, `status`) VALUES
(98, 17, 'prince1@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-11 16:08:49', '11-10-2025 09:39:18 PM', 1),
(99, NULL, 'jay@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-11 16:09:35', NULL, 0),
(100, 18, 'dhruv@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-11 16:17:33', NULL, 1),
(101, 17, 'prince1@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-12 07:22:34', NULL, 1),
(102, 17, 'prince1@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-12 07:25:51', NULL, 1),
(103, NULL, 'dhruv@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-12 07:35:19', NULL, 0),
(104, 18, 'dhruv@gmail.com', 0x3a3a3100000000000000000000000000, '2025-10-12 07:35:28', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `profile_pic`) VALUES
(17, 'prince', 'shilaj', 'ahmedabad', 'male', 'prince1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2025-10-11 13:38:40', 'uploads/profile_pics/68ea5f16e86c0.png'),
(18, 'dhruv', 'gandhidham', 'bhuj', 'male', 'dhruv@gmail.com', '7199101025e18e6f160d764a7ca71180', '2025-10-11 16:17:13', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
