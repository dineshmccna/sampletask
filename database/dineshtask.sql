-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2020 at 09:48 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dineshtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_setting`
--

CREATE TABLE `email_setting` (
  `id` int(1) NOT NULL,
  `server_name` varchar(50) NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `port` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `connection` enum('ssl','tls') NOT NULL,
  `authendication` enum('true','false') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_setting`
--

INSERT INTO `email_setting` (`id`, `server_name`, `from_email`, `port`, `username`, `password`, `connection`, `authendication`, `status`) VALUES
(1, 'smtp.gmail.com', 'dineshmkumar91@gmail.com', 465, 'dineshmkumar91@gmail.com', '', 'ssl', 'true', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `programming_languages`
--

CREATE TABLE `programming_languages` (
  `id` int(255) NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programming_languages`
--

INSERT INTO `programming_languages` (`id`, `language_name`, `status`) VALUES
(1, 'C', 'Active'),
(2, 'C++', 'Active'),
(3, 'Java', 'Active'),
(4, 'PHP', 'Active'),
(5, 'C Sharp', 'Active'),
(6, 'ASP .NET', 'Active'),
(7, 'VB .NET', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(255) NOT NULL,
  `user_type` enum('user','admin','superadmin') NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Others') NOT NULL,
  `address` text,
  `languages` text NOT NULL,
  `user_photo` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `user_type`, `user_name`, `mobile_number`, `email_id`, `gender`, `address`, `languages`, `user_photo`, `status`, `password`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin', '9790673706', 'dineshmkumar91@gmail.com', 'Male', 'Coimbatore', '1,2,3,5', 'uploads/user_photo/1.jpg', 'Active', '12345', '2020-02-15 10:16:07', NULL, '2020-02-16 20:53:39'),
(2, 'user', 'Dinesh', '9789746652', 'ddk@gmail.com', 'Male', 'Coimbatore', '1,2,3', 'uploads/user_photo/2.jpg', 'Active', '12345', '2020-02-15 22:02:58', NULL, NULL),
(3, 'user', 'dineshj', '97897466522', 'ddk@gmail.com', 'Male', 'Coimbatore', '2,3,4', 'uploads/user_photo/3.jpg', 'Inactive', '12345', '2020-02-15 22:34:20', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_setting`
--
ALTER TABLE `email_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programming_languages`
--
ALTER TABLE `programming_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_setting`
--
ALTER TABLE `email_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `programming_languages`
--
ALTER TABLE `programming_languages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
