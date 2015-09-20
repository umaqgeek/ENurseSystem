-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2015 at 08:14 PM
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
  `np_pmi_id` varchar(20) NOT NULL,
  `nw_id` int(11) NOT NULL,
  `nbs_id` int(11) NOT NULL,
  `nb_datetime` datetime NOT NULL,
  `ns_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_bed`
--

INSERT INTO `nus_bed` (`nb_id`, `nb_bed_no`, `np_pmi_id`, `nw_id`, `nbs_id`, `nb_datetime`, `ns_id`) VALUES
(1, '801A', '8910310652137', 1, 0, '2015-09-19 11:00:00', 2),
(2, '801B', '9305180859449', 1, 0, '2015-09-19 06:00:00', 2),
(3, '801C', '', 1, 2, '0000-00-00 00:00:00', 2),
(4, '821A', '', 2, 1, '0000-00-00 00:00:00', 5),
(5, '821B', '', 2, 2, '0000-00-00 00:00:00', 5),
(6, '201A', '9011240859226', 6, 0, '2015-09-20 04:00:00', 4),
(7, '201B', '', 6, 1, '0000-00-00 00:00:00', 4),
(8, '202A', '', 6, 1, '0000-00-00 00:00:00', 4),
(9, 'A', '', 9, 2, '0000-00-00 00:00:00', 6),
(10, 'HDU01', '', 8, 1, '0000-00-00 00:00:00', 7),
(21, '821C', '', 2, 2, '0000-00-00 00:00:00', 0),
(24, '821D', '', 2, 1, '0000-00-00 00:00:00', 5),
(25, '821E', '', 2, 2, '0000-00-00 00:00:00', 5),
(26, '821F', '', 2, 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nus_bed_status`
--

CREATE TABLE IF NOT EXISTS `nus_bed_status` (
  `nbs_id` int(11) NOT NULL,
  `nbs_code` varchar(20) NOT NULL,
  `nbs_desc` varchar(200) NOT NULL,
  `nc_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_bed_status`
--

INSERT INTO `nus_bed_status` (`nbs_id`, `nbs_code`, `nbs_desc`, `nc_id`) VALUES
(1, 'A', 'AVAILABLE', 1),
(2, 'AB', 'AVAILABLE BUT BOOKED', 2),
(3, 'D', 'DISCHARGED', 3),
(4, 'DB', 'DISCHARGED BUT BOOKED', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nus_color`
--

CREATE TABLE IF NOT EXISTS `nus_color` (
  `nc_id` int(11) NOT NULL,
  `nc_desc` varchar(200) NOT NULL,
  `nc_color` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_color`
--

INSERT INTO `nus_color` (`nc_id`, `nc_desc`, `nc_color`) VALUES
(1, 'Dark Green', 'rgba(0,255,0,0.5)'),
(2, 'Yellow', 'rgba(255,255,0,0.5)'),
(3, 'Light Red', 'rgba(255,90,0,0.5)'),
(4, 'Light Pink', 'rgba(255,170,90,0.5)'),
(5, 'Blue', 'rgba(0,90,255,0.5)'),
(6, 'Pink', 'rgba(255,90,255,0.5)');

-- --------------------------------------------------------

--
-- Table structure for table `nus_patient`
--

CREATE TABLE IF NOT EXISTS `nus_patient` (
  `np_pmi_id` varchar(20) NOT NULL,
  `np_fullname` varchar(200) NOT NULL,
  `np_ic` varchar(20) NOT NULL,
  `np_passport` varchar(20) NOT NULL,
  `np_gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_patient`
--

INSERT INTO `nus_patient` (`np_pmi_id`, `np_fullname`, `np_ic`, `np_passport`, `np_gender`) VALUES
('8910310652137', 'umar mukhtar bin hambaran', '891031065213', '-', '1'),
('9011240859226', 'raja fatin zahiah binti raja zulkifli', '901124085922', '-', '2'),
('9305180859449', 'nur umira binti mustafa', '930518085944', '-', '2');

-- --------------------------------------------------------

--
-- Table structure for table `nus_patient_gender`
--

CREATE TABLE IF NOT EXISTS `nus_patient_gender` (
  `npg_id` int(11) NOT NULL,
  `npg_desc` varchar(200) NOT NULL,
  `npg_code` varchar(20) NOT NULL,
  `nc_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_patient_gender`
--

INSERT INTO `nus_patient_gender` (`npg_id`, `npg_desc`, `npg_code`, `nc_id`) VALUES
(1, 'Male', 'M', 5),
(2, 'Female', 'F', 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nus_staff`
--

INSERT INTO `nus_staff` (`ns_id`, `ns_fullname`, `ns_username`, `ns_password`, `nst_id`, `nw_id`) VALUES
(1, 'Administrator', 'admin', 'admin', 1, 0),
(2, 'Nurse 1', 'nurse', 'nurse', 3, 1),
(3, 'CEO', 'ceo', 'ceo', 2, 0),
(4, 'Nurse 2', 'nurse2', 'nurse2', 3, 6),
(5, 'Nurse 3', 'nurse3', 'nurse3', 3, 2),
(6, 'Nurse 4', 'nurse4', 'nurse4', 3, 9),
(7, 'Nurse 5', 'nurse5', 'nurse5', 3, 8);

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
-- Indexes for table `nus_color`
--
ALTER TABLE `nus_color`
  ADD PRIMARY KEY (`nc_id`);

--
-- Indexes for table `nus_patient`
--
ALTER TABLE `nus_patient`
  ADD PRIMARY KEY (`np_pmi_id`),
  ADD UNIQUE KEY `np_ic` (`np_ic`);

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
  MODIFY `nb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `nus_bed_status`
--
ALTER TABLE `nus_bed_status`
  MODIFY `nbs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nus_color`
--
ALTER TABLE `nus_color`
  MODIFY `nc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nus_patient_gender`
--
ALTER TABLE `nus_patient_gender`
  MODIFY `npg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nus_staff`
--
ALTER TABLE `nus_staff`
  MODIFY `ns_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
