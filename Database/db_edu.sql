-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2024 at 04:36 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `job` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `job`, `name`, `surname`, `phone`, `login`, `password`, `email`) VALUES
(1, 1, 'Asadbek', 'Piyshenbaev', '933680414', 'asadbek01', 'asad1234', 'asad@gmail.com'),
(3, 1, 'Omirbay', 'Tajenov', '+998933540516', 'omir01', '123', 'omirbay@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `control`
--

CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `control`
--

INSERT INTO `control` (`id`, `student_id`, `name`) VALUES
(80, 1, '[{\"d\": \"2024-01-02\", \"k\": \"02\", \"cont\": \"joq\"}, {\"d\": \"2024-01-03\", \"k\": \"03\", \"cont\": \"joq\"}]'),
(81, 2, '[{\"d\": \"2024-01-02\", \"k\": \"02\", \"cont\": \"joq\"}, {\"d\": \"2024-01-03\", \"k\": \"03\", \"cont\": \"joq\"}]'),
(82, 3, '[{\"d\": \"2024-01-03\", \"k\": \"03\", \"cont\": \"joq\"}]'),
(83, 4, '[{\"d\": \"2024-01-03\", \"k\": \"03\", \"cont\": \"joq\"}]'),
(84, 5, '[{\"d\": \"2024-01-03\", \"k\": \"03\", \"cont\": \"bar\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(1, 'BackEnd'),
(2, 'Frontend'),
(3, 'Mobilografiya');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `month` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `course_id`, `gname`, `month`, `price`, `date`) VALUES
(2, 1, 'BackEnd#2', 6, 500000, '2024-01-02'),
(3, 1, 'BackEnd#1', 6, 500000, '2023-12-30'),
(5, 2, 'FrontEnd#1', 6, 500000, '2023-12-30'),
(6, 3, 'Mobilografiya#1', 11, 1000000, '2023-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imgs`
--

INSERT INTO `imgs` (`id`, `user_id`, `img`) VALUES
(1, 1, 'e45dac845408213d3e58c655fd23f2a31023.jpg'),
(14, 2, '-6S4l0kuGUEnWn-eRNZBjRlXcEHDANso.jpg'),
(16, 2, 'png-transparent-profile-logo-computer-icons-user-user-blue-heroes-logo-thumbnail.png'),
(17, 1, 'png-transparent-profile-logo-computer-icons-user-user-blue-heroes-logo-thumbnail.png'),
(18, 1, 'png-transparent-profile-logo-computer-icons-user-user-blue-heroes-logo-thumbnail.png'),
(19, 1, 'png-transparent-profile-logo-computer-icons-user-user-blue-heroes-logo-thumbnail.png');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `group_id` json NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `group_id`, `name`, `surname`, `email`, `phone`, `date`) VALUES
(1, '[{\"id\": \"2\"}, {\"id\": \"3\"}, {\"id\": \"5\"}]', 'Asadbek', 'Alisher', 'asadbekpiyshenbaev1@gmail.com', '+998932071213', '2023-12-30'),
(2, '[{\"id\": \"2\"}, {\"id\": \"3\"}]', 'Omirbay', 'Tajenov', 'omirbay@gmail.com', '+998933540516', '2023-12-30'),
(3, '[{\"id\": \"2\"}]', 'Jamshid', 'Piyshenbaev', 'jamshidpiyshenbaev1@gmail.com', '+998937181846', '2024-01-03'),
(4, '[{\"id\": \"2\"}]', 'Ilham', 'Piyshenbaev', 'asadbekpiyshenbaev1@gmail.com', '+998932071213', '2024-01-03'),
(5, '[{\"id\": \"2\"}]', 'Muzaffar', 'Piyshenbaev', 'asadbekpiyshenbaev1@gmail.com', '+99893207121311', '2024-01-03'),
(6, '[{\"id\": \"3\"}, {\"id\": \"3\"}]', 'Alisher', 'Bazarbaev', 'asas@as', '+998932071213322', '2024-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `group_id` json NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `group_id`, `name`, `surname`, `phone`, `login`, `password`, `email`, `img`) VALUES
(19, '[{\"id\": \"3\"}]', 'Omirbay', 'Tajenov', '+998933540516', 'qwdqwd', 'asadbek01@', 'omirbay@gmail.com', '2da4655b5f29319844819ebdc3d77fda.jpeg'),
(20, '[{\"id\": \"6\"}]', 'Asadbek1', 'Piyshenbaev', '+998932071221', 'qwdqwd', 'wqeqe', 'asadbekpiyshenbaev1@gmail.com', ''),
(21, '[{\"id\": \"5\"}]', 'Alisher', 'Bazarbaev', '+99893207121311', 'qwdqwd', 'wqeqe', 'asas@as', ''),
(22, '[{\"id\": \"2\"}]', 'Alisher', 'Bazarbaev', '+99893207121311212', 'qwdqwd', 'wqeqe', 'asas@as', '');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_img`
--

CREATE TABLE `teachers_img` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_img`
--
ALTER TABLE `teachers_img`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teachers_img`
--
ALTER TABLE `teachers_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
