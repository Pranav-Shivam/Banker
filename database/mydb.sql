-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 11:43 AM
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
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_admin`
--

CREATE TABLE `bank_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_admin`
--

INSERT INTO `bank_admin` (`id`, `email`, `password`) VALUES
(1, 'admin@banking.com', 'bankadmin'),
(2, 'advisory@banking.com', 'bankadvisor');

-- --------------------------------------------------------

--
-- Table structure for table `bank_advisory`
--

CREATE TABLE `bank_advisory` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'UNBLOCK'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_advisory`
--

INSERT INTO `bank_advisory` (`id`, `email`, `password`, `status`) VALUES
(1, 'advisory@banking.com', 'bankadvisor', 'UNBLOCK');

-- --------------------------------------------------------

--
-- Table structure for table `cust`
--

CREATE TABLE `cust` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust`
--

INSERT INTO `cust` (`id`, `name`, `email`, `password`) VALUES
(1, 'Shivam', 'Shiva@gmail.com', '45698'),
(2, 'Pranav', 'pranav@gmail.com', '45698'),
(3, 'Demo', 'demo@demo.com', 'demo@123');

-- --------------------------------------------------------

--
-- Table structure for table `customer_inf`
--

CREATE TABLE `customer_inf` (
  `id` int(11) NOT NULL,
  `SIN` int(11) NOT NULL,
  `cname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL DEFAULT 'MALE',
  `phNo` varchar(15) NOT NULL,
  `address` varchar(191) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 400,
  `saving` int(11) NOT NULL DEFAULT 200,
  `chequin` int(11) NOT NULL DEFAULT 200,
  `loanApply` varchar(12) NOT NULL DEFAULT 'NOT APPLIED',
  `status` varchar(8) NOT NULL DEFAULT 'ACTIVE',
  `photo` varchar(100) NOT NULL,
  `pin` varchar(15) NOT NULL,
  `Register_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cardNo` varchar(16) NOT NULL,
  `exDate` text NOT NULL DEFAULT '10/25',
  `cvv` int(3) NOT NULL,
  `cardStatus` varchar(11) NOT NULL DEFAULT 'ACTIVE',
  `cust_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_inf`
--

INSERT INTO `customer_inf` (`id`, `SIN`, `cname`, `email`, `password`, `gender`, `phNo`, `address`, `balance`, `saving`, `chequin`, `loanApply`, `status`, `photo`, `pin`, `Register_date`, `cardNo`, `exDate`, `cvv`, `cardStatus`, `cust_img`) VALUES
(1, 125369998, 'Pranav', 'tomar@gmail.com', '45698', 'MALE', '8271468400', '95/1, Banerjee para road sarsunaKolkata 700061', 385, 185, 200, 'APPLIED', 'ACTIVE', '', '1234', '2022-07-16 11:34:36', '2602245360905587', '10/25', 537, 'ACTIVE', ''),
(2, 125369999, 'Shankar', 'Shiva@gmail.com', '45698', 'Male', '8271468400', 'Kedarnath, H.P', 400, 200, 200, 'APPLIED', 'ACTIVE', '', '4569', '2022-07-18 04:30:10', '2602245360905586', '10/25', 115, 'ACTIVE', ''),
(4, 123537001, 'Radhe', 'Radhe@shyam.com', '45698', 'FEMALE', '9939377111', 'Kalyan Kunj- Rata-813207, Banka, Bihar, India', 400, 200, 200, 'APPLIED', 'ACTIVE', '', '9939', '2022-07-18 19:31:31', '2602245360905592', '10/25', 531, 'ACTIVE', ''),
(5, 789456964, 'Pranav Shivam', 'pranav27singh@gmail.com', '45698', 'MALE', '9717391205', 'Nerhu Colony, Banka, Bihar,India', 400, 200, 200, 'APPLIED', 'ACTIVE', '', '8956', '2022-07-22 10:19:55', '1534111310686168', '10/25', 466, 'ACTIVE', ''),
(7, 789456124, 'Anirban Chandra', 'anirbanchandra21@gmail.com', '45698', 'MALE', '07044630781', '95/1, Banerjee para road sarsunaKolkata 700061', 400, 200, 200, 'APPLIED', 'ACTIVE', '', '8956', '2022-07-22 11:30:38', '6157474669939543', '10/25', 401, 'ACTIVE', ''),
(8, 147852964, 'demo', 'demo@demo.com', 'xyz@demo', 'OTHERS', '07044630781', '95/1, Banerjee para road sarsunaKolkata 700061', 375, 185, 190, 'NOT APPLIED', 'ACTIVE', '', '7896', '2022-07-22 11:39:42', '8330219317928175', '10/25', 976, 'ACTIVE', '760_1659089830_team_06.jpg'),
(9, 12346, '', 'ankush@gmail.com', 'ankush@1234', '', '', 'Demo Address Here', 400, 200, 200, 'APPLIED', 'ACTIVE', '', '74569', '2022-07-25 04:44:19', '1377613599928365', '10/25', 437, 'ACTIVE', ''),
(10, 1235, 'Test Updated', 'testing@test.com', 'test@123', 'MALE', '9876543210', 'Demo Address Here', 400, 200, 200, 'APPLIED', 'ACTIVE', '', '1234', '2022-07-25 05:28:50', '6282644870489193', '10/25', 748, 'ACTIVE', '729_1659088913_team_01.jpg'),
(11, 1235, 'abc@abc.com', 'abc@abc.com', 'abc@123', 'MALE', '9988191519', 'Demo', 400, 200, 200, 'NOT APPLIED', 'ACTIVE', '', '1234', '2022-08-01 13:16:09', '5986723078769976', '10/25', 238, 'ACTIVE', '850_1659359769_Screenshot (94).png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_transaction`
--

CREATE TABLE `customer_transaction` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `toname` varchar(191) NOT NULL DEFAULT 'XYZ',
  `toaccount` varchar(191) NOT NULL,
  `transactionTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `balance` varchar(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `rfNo` varchar(13) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'debited'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_transaction`
--

INSERT INTO `customer_transaction` (`id`, `email`, `toname`, `toaccount`, `transactionTime`, `balance`, `debit`, `credit`, `rfNo`, `status`) VALUES
(10, 'tomar@gmail.com', 'anirba', 'anirbanchandra21@gmail.com', '2022-07-22 08:09:12', '385', 15, 0, 'Rx55747', 'debited'),
(11, 'demo@demo.com', 'anirba', 'anirbanchandra69@gmail.com', '2022-07-29 08:18:43', '390', 10, 0, 'Rx35087', 'debited'),
(12, 'demo@demo.com', 'anirba', 'anirbanchandra21@gmail.com', '2022-07-29 08:19:21', '375', 15, 0, 'Rx85441', 'debited');

-- --------------------------------------------------------

--
-- Table structure for table `student1`
--

CREATE TABLE `student1` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `course` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student1`
--

INSERT INTO `student1` (`id`, `name`, `email`, `phone`, `course`) VALUES
(1, 'Anirban Chandra', 'anirbanchandra21@gmail.com', '7044630781', 'MCA'),
(4, 'Pranav', 'pranav21@gmail.com', '8271468400', 'MCA'),
(6, 'Shambhu', 'anirbanchandra21@gmail.com', '07044630781', 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`) VALUES
(1, 'Yahoo', 'Baba'),
(2, 'Salman', 'Khan'),
(3, 'Shahid', 'Kapoor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_admin`
--
ALTER TABLE `bank_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bank_advisory`
--
ALTER TABLE `bank_advisory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_inf`
--
ALTER TABLE `customer_inf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student1`
--
ALTER TABLE `student1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_admin`
--
ALTER TABLE `bank_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_advisory`
--
ALTER TABLE `bank_advisory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cust`
--
ALTER TABLE `cust`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_inf`
--
ALTER TABLE `customer_inf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student1`
--
ALTER TABLE `student1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
