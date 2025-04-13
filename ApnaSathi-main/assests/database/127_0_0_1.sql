-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2024 at 04:51 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apnasathi_db`
--
CREATE DATABASE IF NOT EXISTS `apnasathi_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `apnasathi_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_phone_number` varchar(100) NOT NULL,
  `admin_role` enum('super admin','admin') DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_email` (`admin_email`),
  UNIQUE KEY `admin_phone_number` (`admin_phone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_user`
--

DROP TABLE IF EXISTS `new_user`;
CREATE TABLE IF NOT EXISTS `new_user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `user_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `new_user`
--

INSERT INTO `new_user` (`user_id`, `user_email`, `user_password`, `user_type`, `user_name`) VALUES
(1, 'a@gmail.com', '$2y$10$4C6.8SseKRAZ6kj12M6AoeZt.kYz/eIrFPMAsFK3q6eUWMm56BWCO', 'beneficiary', 'vyankatesh mundaware'),
(2, 'lkj@gmail.com', '$2y$10$SP4SR.Bb7/A.JP4KwnhmNOjIMivODFkS.QUqXUlpodLQqWtLekM/W', 'beneficiary', 'Mundaware'),
(3, 'rushi@gmail.com', '$2y$10$03CYN78PumqTLlqhyqQjruJJ2/6ov2z2ph1SEm4yzYV0A7TySe6n.', 'beneficiary', 'Rushi '),
(4, 'd@gmail.com', '$2y$10$jyizcsK4MNEcMvNOwQqn5.wuXevOLXveWpaWFy.ufvUwsmpgbeSy6', 'donor', 'Donor'),
(5, 'test_1@gmail.com', '$2y$10$72Zpjzt85CG2OIF92KZ73Oa7o2h56DHZG9ndICs43SSH44ano/BNy', 'donor', 'Test'),
(6, 'mytest@gmail.co', '$2y$10$JYQkuKFkoX5ll2o1HrT10eCWj0LAlNUeJrghl9KmsGESwWzytkMwK', 'donor', 'Test '),
(7, 'vyankateshmundaware@gmail.com', '$2y$10$oDNZJOCwtJzE8psKT0a1KuaFW80jobW1/C8dabIWwe2h7LaL9VGSG', 'donor', 'Vyankatesh Mundaware'),
(8, 'demotest@mail.com', '$2y$10$xej3gdSLkkKfW.qKYq1YJemqDzIf9WawcvAZp9aFvsFeNNQaiMGwm', 'beneficiary', 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

DROP TABLE IF EXISTS `user_contact`;
CREATE TABLE IF NOT EXISTS `user_contact` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) DEFAULT NULL,
  `user_contact` int DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_subject` varchar(100) DEFAULT NULL,
  `user_message` text,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_contact`
--

INSERT INTO `user_contact` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_subject`, `user_message`) VALUES
(1, 'Vyankatesh Shyam Mundaware', 2147483647, 'vyankateshmundaware@gmail.com', 'XXXXXXXXXXXXXXX', 'XXXXXXXXXXXXXXXXX'),
(2, 'Vyankatesh ', 998877, 'vyan@gmai.com', 'Website ', 'Hello This is the test email'),
(3, 'vyan', 990099, 'vyan@gmail.com', 'demo', 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

DROP TABLE IF EXISTS `user_feedback`;
CREATE TABLE IF NOT EXISTS `user_feedback` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) DEFAULT NULL,
  `user_contact` int DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_subject` varchar(200) DEFAULT NULL,
  `user_rating` varchar(100) DEFAULT NULL,
  `user_message` text,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_registration`
--

DROP TABLE IF EXISTS `volunteer_registration`;
CREATE TABLE IF NOT EXISTS `volunteer_registration` (
  `registration_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `donor_name` varchar(100) NOT NULL,
  `donor_mobile` varchar(20) NOT NULL,
  `donor_birthdate` date NOT NULL,
  `age` int DEFAULT NULL,
  `donor_availability` enum('EveryDay','WeekEnd','CustomDates') DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `donor_id_proof` varchar(100) NOT NULL,
  `donor_photo` varchar(100) NOT NULL,
  `foundation_type` enum('Individual','Foundation') DEFAULT NULL,
  `foundation_name` varchar(100) DEFAULT NULL,
  `donor_type` varchar(100) DEFAULT 'volunteer',
  `application_status` enum('Unapproved','Approved') DEFAULT 'Unapproved',
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`registration_id`),
  KEY `donor_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `volunteer_registration`
--

INSERT INTO `volunteer_registration` (`registration_id`, `user_id`, `donor_name`, `donor_mobile`, `donor_birthdate`, `age`, `donor_availability`, `startdate`, `enddate`, `donor_id_proof`, `donor_photo`, `foundation_type`, `foundation_name`, `donor_type`, `application_status`, `user_email`) VALUES
(1, 0, 'kalkote', '0987987878', '2024-10-17', NULL, 'EveryDay', '0000-00-00', '0000-00-00', 'uploads/Screenshot (14).png', 'uploads/Screenshot (3).png', 'Individual', '', 'volunteer', 'Unapproved', ''),
(2, 0, 'kalkote', '9890976898', '2024-10-17', NULL, 'EveryDay', '0000-00-00', '0000-00-00', 'uploads/first_sem_fee_receipt.pdf', 'uploads/sem_first_fee_receipt(5).pdf', 'Individual', '', 'volunteer', 'Unapproved', ''),
(3, 0, 'kalkote', '9878909878', '2024-10-17', NULL, 'EveryDay', '0000-00-00', '0000-00-00', 'uploads/23_10_2024.pdf', 'uploads/sem_first_fee_receipt(3).pdf', 'Individual', '', 'volunteer', 'Unapproved', ''),
(4, 0, 'kalkote', '8987890987', '2024-10-10', 0, 'EveryDay', '0000-00-00', '0000-00-00', 'uploads/23_10_2024.pdf', 'uploads/23_10_2024.pdf', 'Individual', '', 'volunteer', 'Unapproved', ''),
(5, 7, 'kalkote', '9890987678', '2024-10-17', 0, 'EveryDay', '0000-00-00', '0000-00-00', 'uploads/23_10_2024.pdf', 'uploads/23_10_2024.pdf', 'Individual', '', 'volunteer', 'Unapproved', 'vyankateshmundaware@gmail.com'),
(6, 7, 'kalkote', '3456789098', '2024-10-17', 0, 'CustomDates', '2024-10-17', '2024-10-20', 'uploads/23_10_2024.pdf', 'uploads/23_10_2024.pdf', 'Foundation', 'ok', 'volunteer', 'Unapproved', 'vyankateshmundaware@gmail.com'),
(7, 7, 'Vyankatesh ', '0099887766', '2024-10-18', 0, 'EveryDay', '0000-00-00', '0000-00-00', 'uploads/1.pdf', 'uploads/Vyankatesh.jpg', 'Individual', '', 'volunteer', 'Unapproved', 'vyankateshmundaware@gmail.com'),
(8, 7, 'Vyankatesh ', '9988776655', '2024-10-18', 0, 'EveryDay', '0000-00-00', '0000-00-00', 'uploads/1.pdf', 'uploads/incom.jpg', 'Individual', '', 'volunteer', 'Unapproved', 'vyankateshmundaware@gmail.com'),
(9, 7, 'cy', '0099887766', '1995-10-18', 29, 'EveryDay', '0000-00-00', '0000-00-00', 'uploads/1.pdf', 'uploads/incom.jpg', 'Foundation', 'Test', 'volunteer', 'Unapproved', 'vyankateshmundaware@gmail.com');
--
-- Database: `bookworld`
--
CREATE DATABASE IF NOT EXISTS `bookworld` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bookworld`;
--
-- Database: `college`
--
CREATE DATABASE IF NOT EXISTS `college` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `college`;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `email`) VALUES
(1, '\r\nvyankatesh ', 'vyankateshmundaware@gmail.com\r\n'),
(2, '\r\nv', 'vy@gmail.com\r\n'),
(3, '\r\nVyankatesh Shyam Mundaware', 'mundaware@gmail.com\r\n');
--
-- Database: `demo_database`
--
CREATE DATABASE IF NOT EXISTS `demo_database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `demo_database`;

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

DROP TABLE IF EXISTS `demo`;
CREATE TABLE IF NOT EXISTS `demo` (
  `user_name` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
--
-- Database: `mycollege`
--
CREATE DATABASE IF NOT EXISTS `mycollege` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `mycollege`;

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--

DROP TABLE IF EXISTS `students_info`;
CREATE TABLE IF NOT EXISTS `students_info` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
--
-- Database: `students`
--
CREATE DATABASE IF NOT EXISTS `students` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `students`;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

DROP TABLE IF EXISTS `college`;
CREATE TABLE IF NOT EXISTS `college` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `employeename` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employeename`, `email`) VALUES
(1, 'Vyankatesh Mundaware', 'vyankateshmundaware@gmail.com'),
(2, 'Vyankatesh Mundaware', 'vyankateshmundaware@gmail.com'),
(3, 'Shyam Mundaware', 'shyammundaware@gmail.com'),
(4, 'Raju', 'raju@gmail.com'),
(5, 'Maya', 'maya@gmail.com'),
(6, 'Chaya', 'chaya@gmail.com'),
(7, 'Maya', 'maya@gmail.com'),
(8, 'Chaya', 'chaya@gmail.com'),
(9, 'Maya', 'maya@gmail.com'),
(10, 'Chaya', 'chaya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

DROP TABLE IF EXISTS `student_data`;
CREATE TABLE IF NOT EXISTS `student_data` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
--
-- Database: `your_database_name`
--
CREATE DATABASE IF NOT EXISTS `your_database_name` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `your_database_name`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
