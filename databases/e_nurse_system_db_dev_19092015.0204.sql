-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2015 at 08:04 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_nurse_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `nus_bed`
--

CREATE TABLE IF NOT EXISTS `nus_bed` (
  `nb_id` int(11) NOT NULL,
  `nb_bed_no` varchar(20) NOT NULL,
  `nw_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_bed`
--

INSERT INTO `nus_bed` (`nb_id`, `nb_bed_no`, `nw_id`) VALUES
(1, '801A', 1),
(2, '801B', 1),
(3, '801C', 1),
(4, '821A', 2),
(5, '821B', 2),
(6, '201A', 6),
(7, '201B', 6),
(8, '202A', 6),
(9, 'A', 9);

-- --------------------------------------------------------

--
-- Table structure for table `nus_bed_status`
--

CREATE TABLE IF NOT EXISTS `nus_bed_status` (
  `nbs_id` int(11) NOT NULL,
  `nbs_code` varchar(20) NOT NULL,
  `nbs_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_bed_status`
--

INSERT INTO `nus_bed_status` (`nbs_id`, `nbs_code`, `nbs_desc`) VALUES
(1, 'A', 'AVAILABLE'),
(2, 'AB', 'AVAILABLE BUT BOOKED'),
(3, 'D', 'DISCHARGED'),
(4, 'DB', 'DISCHARGED BUT BOOKED');

-- --------------------------------------------------------

--
-- Table structure for table `nus_patient`
--

CREATE TABLE IF NOT EXISTS `nus_patient` (
  `np_pmi_id` varchar(20) NOT NULL,
  `np_fullname` varchar(200) NOT NULL,
  `np_ic` varchar(20) NOT NULL,
  `np_passport` varchar(20) NOT NULL,
  `npg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nus_patient_bed`
--

CREATE TABLE IF NOT EXISTS `nus_patient_bed` (
  `npd_id` int(11) NOT NULL,
  `np_pmi_id` int(11) NOT NULL,
  `nb_id` int(11) NOT NULL,
  `nbs_id` int(11) NOT NULL,
  `npd_datetime` datetime NOT NULL,
  `ns_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nus_patient_gender`
--

CREATE TABLE IF NOT EXISTS `nus_patient_gender` (
  `npg_id` int(11) NOT NULL,
  `npg_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_patient_gender`
--

INSERT INTO `nus_patient_gender` (`npg_id`, `npg_desc`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `nus_staff`
--

CREATE TABLE IF NOT EXISTS `nus_staff` (
  `ns_id` int(11) NOT NULL,
  `ns_fullname` varchar(200) NOT NULL,
  `ns_username` varchar(200) NOT NULL,
  `ns_password` varchar(200) NOT NULL,
  `nst_id` int(11) NOT NULL,
  `nw_id` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_staff`
--

INSERT INTO `nus_staff` (`ns_id`, `ns_fullname`, `ns_username`, `ns_password`, `nst_id`, `nw_id`) VALUES
(1, 'Administrator', 'admin', 'admin', 1, 0),
(2, 'Nurse 1', 'nurse', 'nurse', 3, 1),
(3, 'CEO', 'ceo', 'ceo', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nus_staff_type`
--

CREATE TABLE IF NOT EXISTS `nus_staff_type` (
  `nst_id` int(11) NOT NULL,
  `nst_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_staff_type`
--

INSERT INTO `nus_staff_type` (`nst_id`, `nst_desc`) VALUES
(1, 'Administrator'),
(2, 'CEO'),
(3, 'Nurse');

-- --------------------------------------------------------

--
-- Table structure for table `nus_ward`
--

CREATE TABLE IF NOT EXISTS `nus_ward` (
  `nw_id` int(11) NOT NULL,
  `nw_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_ward`
--

INSERT INTO `nus_ward` (`nw_id`, `nw_name`) VALUES
(1, 'PAEDS WARD'),
(2, 'MEDICAL WARD'),
(3, 'SURGICAL WARD 1'),
(4, 'SURGICAL WARD 2A'),
(5, 'SURGICAL WARD 2B'),
(6, 'O&G'),
(7, 'FEMALE MEDICAL WARD'),
(8, 'HDU'),
(9, 'ICU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nus_bed`
--
ALTER TABLE `nus_bed`
  ADD PRIMARY KEY (`nb_id`);

--
-- Indexes for table `nus_bed_status`
--
ALTER TABLE `nus_bed_status`
  ADD PRIMARY KEY (`nbs_id`);

--
-- Indexes for table `nus_patient`
--
ALTER TABLE `nus_patient`
  ADD PRIMARY KEY (`np_pmi_id`);

--
-- Indexes for table `nus_patient_bed`
--
ALTER TABLE `nus_patient_bed`
  ADD PRIMARY KEY (`npd_id`);

--
-- Indexes for table `nus_patient_gender`
--
ALTER TABLE `nus_patient_gender`
  ADD PRIMARY KEY (`npg_id`);

--
-- Indexes for table `nus_staff`
--
ALTER TABLE `nus_staff`
  ADD PRIMARY KEY (`ns_id`);

--
-- Indexes for table `nus_staff_type`
--
ALTER TABLE `nus_staff_type`
  ADD PRIMARY KEY (`nst_id`);

--
-- Indexes for table `nus_ward`
--
ALTER TABLE `nus_ward`
  ADD PRIMARY KEY (`nw_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nus_bed`
--
ALTER TABLE `nus_bed`
  MODIFY `nb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `nus_bed_status`
--
ALTER TABLE `nus_bed_status`
  MODIFY `nbs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nus_patient_bed`
--
ALTER TABLE `nus_patient_bed`
  MODIFY `npd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nus_patient_gender`
--
ALTER TABLE `nus_patient_gender`
  MODIFY `npg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nus_staff`
--
ALTER TABLE `nus_staff`
  MODIFY `ns_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nus_staff_type`
--
ALTER TABLE `nus_staff_type`
  MODIFY `nst_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nus_ward`
--
ALTER TABLE `nus_ward`
  MODIFY `nw_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
