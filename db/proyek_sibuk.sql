-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2017 at 02:11 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_sibuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `user_name` varchar(125) DEFAULT NULL,
  `admin_email` varchar(125) NOT NULL,
  `admin_password` varchar(225) NOT NULL,
  `admin_kontak_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `admin_email`, `admin_password`, `admin_kontak_hp`) VALUES
(1, 'firmawan', 'firmawaneiwan@gmail.com', '7384abd23c2a53daf36e41ee9640860a42858f51', '085726270879');

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

CREATE TABLE `booking_room` (
  `id` bigint(20) NOT NULL,
  `book_room_id` bigint(20) DEFAULT NULL,
  `book_mhs_id` bigint(20) DEFAULT NULL,
  `book_support_id` bigint(20) DEFAULT NULL,
  `book_support_code` varchar(255) DEFAULT NULL,
  `book_pic_name` varchar(125) DEFAULT NULL,
  `book_day` varchar(15) NOT NULL,
  `book_use_for` varchar(125) DEFAULT NULL,
  `book_use_description` varchar(225) DEFAULT NULL,
  `book_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `book_use_reality` timestamp NULL DEFAULT NULL,
  `book_confirmed_by_support_id` int(10) DEFAULT NULL,
  `book_last_modified` varchar(25) DEFAULT NULL,
  `book_status` enum('pending','accepted','rejected','confirm','done') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_room`
--

INSERT INTO `booking_room` (`id`, `book_room_id`, `book_mhs_id`, `book_support_id`, `book_support_code`, `book_pic_name`, `book_day`, `book_use_for`, `book_use_description`, `book_created`, `book_use_reality`, `book_confirmed_by_support_id`, `book_last_modified`, `book_status`) VALUES
(9, 2, 1, 2, NULL, 'iwan', 'senin', NULL, NULL, '2017-01-03 03:53:32', NULL, NULL, NULL, 'pending'),
(10, 3, 1, 4, '601483421234', 'iwan', 'selasa', 'Pengganti Inet pertemuan ke 6', 'sadskdsad kdjsak dkasdjkasdjaskd', '2017-01-03 05:27:14', NULL, NULL, '2017-01-03 12:27:14', 'accepted'),
(11, 1, 7, 3, NULL, 'elis', 'selasa', 'Pengganti Inet pertemuan ke 6', 'dlald salkdaldklas', '2017-01-03 05:54:21', NULL, NULL, NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `booking_room_fc`
--

CREATE TABLE `booking_room_fc` (
  `id` bigint(20) NOT NULL,
  `id_booking` bigint(20) NOT NULL,
  `id_fc` bigint(20) NOT NULL,
  `data_status` enum('acc','reject') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_room_fc`
--

INSERT INTO `booking_room_fc` (`id`, `id_booking`, `id_fc`, `data_status`) VALUES
(10, 9, 1, 'acc'),
(11, 10, 3, 'acc'),
(12, 10, 3, 'acc'),
(13, 11, 5, 'acc');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) NOT NULL,
  `user_name` varchar(125) DEFAULT NULL,
  `user_email` varchar(125) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `mhs_kontak_hp` varchar(15) DEFAULT NULL,
  `mhs_gender` enum('f','m') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_name`, `user_email`, `user_password`, `mhs_kontak_hp`, `mhs_gender`) VALUES
(1, 'iwan', '14102065@st3telkom.ac.id', '7384abd23c2a53daf36e41ee9640860a42858f51', '085726270879', 'm'),
(5, 'ddakajk', '14102061@st3telkom.ac.id', 'jvm', '02932090', NULL),
(6, 'G novandra', '14102062@st3telkom.ac.id', '5dcd0b26e1a7281baf38a4e381f988f5aa2eeff6', '02903290', NULL),
(7, 'elis', '14102059@st3telkom.ac.id', 'eed02cf597a4851cf2e73662260969662d27f082', '02930290', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint(20) NOT NULL,
  `support_by_admin_id` bigint(20) DEFAULT NULL,
  `support_name` varchar(125) DEFAULT NULL,
  `support_email` varchar(125) DEFAULT NULL,
  `support_kontak_hp` varchar(15) DEFAULT NULL,
  `support_gender` enum('pria','wanita') DEFAULT NULL,
  `data_status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `support_by_admin_id`, `support_name`, `support_email`, `support_kontak_hp`, `support_gender`, `data_status`) VALUES
(2, 1, 'kurniawan', 'pangkalanbun16@gmail.com', '09898389', 'pria', '1'),
(3, 1, 'Ahmad', 'ahmad@gmail.com', '0898239289', 'pria', '1'),
(4, NULL, 'taka', 'takashidiskon@gmail.com', '08290920392', 'pria', '1');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` bigint(20) NOT NULL,
  `room_support_id` bigint(20) NOT NULL,
  `room_name` varchar(125) NOT NULL,
  `room_floor` varchar(15) DEFAULT NULL,
  `room_file_map` varchar(225) DEFAULT NULL,
  `room_available_begin` enum('07:00','07:50','08:40','09:30','10:20','11:10','12:00','12:50','13:40','14:30','15:20','16:10','17:00','17:50','18:40') NOT NULL,
  `room_available_end` enum('07:00','07:50','08:40','09:30','10:20','11:10','12:00','12:50','13:40','14:30','15:20','16:10','17:00','17:50','18:40') NOT NULL,
  `room_available_day` enum('senin','selasa','rabu','kamis','jumat','sabtu') NOT NULL,
  `data_status` enum('yes','no') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_support_id`, `room_name`, `room_floor`, `room_file_map`, `room_available_begin`, `room_available_end`, `room_available_day`, `data_status`) VALUES
(1, 3, 'DC003', '2', 'map-dc303.png', '08:40', '10:20', 'selasa', 'yes'),
(2, 2, 'T7', '2', '90319.jpg', '07:00', '08:40', 'senin', 'yes'),
(3, 4, 'DC001', '1', NULL, '10:20', '08:40', 'selasa', 'yes'),
(4, 2, 'DC202', '2', 'map-dc001.png', '12:00', '14:30', 'senin', 'yes'),
(5, 3, 'T10', '2', NULL, '14:30', '16:10', 'kamis', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `room_fasilities`
--

CREATE TABLE `room_fasilities` (
  `id` bigint(20) NOT NULL,
  `fc_room_id` bigint(20) DEFAULT NULL,
  `fc_name` varchar(125) DEFAULT NULL,
  `fc_qty` int(10) DEFAULT NULL,
  `fc_quality_status` enum('ready','damaged','off') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_fasilities`
--

INSERT INTO `room_fasilities` (`id`, `fc_room_id`, `fc_name`, `fc_qty`, `fc_quality_status`) VALUES
(1, 2, 'Proyektor LCD', 2, 'ready'),
(2, 2, 'Papan tulis', 3, 'ready'),
(3, 3, 'Proyektor LCD', 2, 'ready'),
(4, 3, 'AC', 2, 'ready'),
(5, 1, 'Proyektor LCD', 1, 'ready'),
(6, 4, 'papan tulis', 2, 'ready'),
(7, 5, 'Proyektor LCD', 1, 'damaged'),
(8, 5, 'Proyektor LCD', 1, 'ready');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_room_id` (`book_room_id`),
  ADD KEY `book_mhs_id` (`book_mhs_id`),
  ADD KEY `book_support_id` (`book_support_id`),
  ADD KEY `book_room_id_2` (`book_room_id`),
  ADD KEY `book_mhs_id_2` (`book_mhs_id`),
  ADD KEY `book_support_id_2` (`book_support_id`);

--
-- Indexes for table `booking_room_fc`
--
ALTER TABLE `booking_room_fc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_booking` (`id_booking`),
  ADD KEY `id_fc` (`id_fc`),
  ADD KEY `id_booking_2` (`id_booking`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mhs_user_email` (`user_email`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `support_by_admin_id` (`support_by_admin_id`),
  ADD KEY `support_by_admin_id_2` (`support_by_admin_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_support_id` (`room_support_id`),
  ADD KEY `room_support_id_2` (`room_support_id`),
  ADD KEY `room_support_id_3` (`room_support_id`),
  ADD KEY `room_available_day` (`room_available_day`);

--
-- Indexes for table `room_fasilities`
--
ALTER TABLE `room_fasilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fc_room_id` (`fc_room_id`),
  ADD KEY `fc_room_id_2` (`fc_room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking_room`
--
ALTER TABLE `booking_room`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `booking_room_fc`
--
ALTER TABLE `booking_room_fc`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `room_fasilities`
--
ALTER TABLE `room_fasilities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD CONSTRAINT `booking_room_ibfk_1` FOREIGN KEY (`book_mhs_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_room_ibfk_2` FOREIGN KEY (`book_room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_room_ibfk_3` FOREIGN KEY (`book_support_id`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_room_fc`
--
ALTER TABLE `booking_room_fc`
  ADD CONSTRAINT `booking_room_fc_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking_room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`support_by_admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_support_id`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_fasilities`
--
ALTER TABLE `room_fasilities`
  ADD CONSTRAINT `room_fasilities_ibfk_1` FOREIGN KEY (`fc_room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
