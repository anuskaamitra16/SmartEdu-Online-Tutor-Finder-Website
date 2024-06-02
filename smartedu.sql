-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306:4306
-- Generation Time: May 23, 2024 at 09:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartedu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `password`) VALUES
(1, 'anu', 'a@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `problem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `type`, `email`, `phone`, `problem`) VALUES
(1, 'Aarav Sheikh', 'Teacher', 'ar@gmail.com', '9903450087', 'I am not getting appropriate posts.'),
(2, 'Ankit', 'Student', 'k@gmail.com', '9878656434', 'My teacher always come late. Look into the matter please. ');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('unread','read') DEFAULT 'unread',
  `message` varchar(255) DEFAULT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `sender_id`, `receiver_id`, `timestamp`, `status`, `message`, `reply`) VALUES
(1, 1, 3, '2024-05-22 19:52:37', 'read', 'You have received a tuition request from student ID: 1', 'Call me in 8893456732 in evening.'),
(4, 4, 9, '2024-05-23 05:35:03', 'read', 'You have received a tuition request from student ID: 4', 'Call me in 8765645676.');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `q1` varchar(11) NOT NULL,
  `q2` varchar(11) NOT NULL,
  `q3` varchar(11) NOT NULL,
  `q4` varchar(11) NOT NULL,
  `review_text` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `teacher_id`, `student_id`, `rating`, `q1`, `q2`, `q3`, `q4`, `review_text`, `timestamp`) VALUES
(1, 3, 1, 4, '5', '4', '4', '5', 'She is a great teacher with good knowledge.Teaches the students very well.', '2024-05-22 20:02:00'),
(2, 1, 4, 4, '4', '4', '4', '4', 'She is a good english tutor.', '2024-05-23 05:41:14'),
(3, 9, 4, 5, '5', '5', '5', '5', 'He is a great teacher. Always clear out doubts.', '2024-05-23 05:42:34'),
(4, 4, 4, 4, '4', '5', '5', '4', 'Knowlegable teacher.', '2024-05-23 05:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `studentpost`
--

CREATE TABLE `studentpost` (
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` int(11) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `location` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentpost`
--

INSERT INTO `studentpost` (`pid`, `name`, `class`, `subjects`, `phone`, `location`, `budget`, `info`, `student_id`) VALUES
(1, 'Sam', 3, 'Maths,English,Computer', '9903450087', 'Behala', '2000-5000', 'i want home tuition.', 1),
(2, 'Alice', 2, 'SST,Science', '9903450087', 'Behala', '2000-5000', 'i want home tuition.', 1),
(3, 'Shreya', 8, 'Maths,Computer', '7789345672', 'New Alipore', '1000-3000', 'i want a tutor urgently.', 2),
(4, 'Khushi', 4, 'Science,Bengali', '9878656434', 'Rashbehari', '2000-5000', 'Want a skilled teacher.', 3),
(5, 'Rumi', 7, 'English,Bengali', '9878656434', 'Rashbehari', '2000-5000', 'Want a skilled teacher.', 3),
(6, 'Muskan', 9, 'Maths,English,SST,Science', '9078779087', 'Behala', '1000-3000', 'i need proper guidance.', 4),
(7, 'Zara', 10, 'Maths,English,Science', '9805891230', 'New Alipore', '2000-5000', 'Need a teacher to guide my daughter for boards.', 5),
(8, 'Ankit', 6, 'Science,Bengali,Hindi', '8790123765', 'Rashbehari', '2000-5000', 'Want a knowlegable tutor.', 6),
(9, 'Rehan', 4, 'Maths,English,SST', '9081267854', 'Behala', '1000-3000', 'I want a english spoken teacher.', 7),
(10, 'Aqsa', 6, 'Science,Computer', '9081267854', 'Behala', '1000-3000', 'Teacher should have good knowledge of computer.', 7),
(11, 'Ishita', 11, 'Maths,Science', '8803412895', 'Rashbehari', '2000-5000', 'Need a skilled teacher.', 8),
(12, 'Sourav', 12, 'Maths,English,Bengali', '9250178436', 'New Alipore', '1000-5000', 'Need a teacher who will provide valuable notes.', 9),
(13, 'Anirban', 8, 'SST,Science', '8901673986', 'Rashbehari', '1000-4000', 'Need a skilled teacher.', 10),
(14, 'Ritika', 6, 'Maths,Hindi', '8901673986', 'Rashbehari', '1000-5000', 'Need a skilled teacher.', 10),
(16, 'Yasmin', 4, 'English,SST,Science', '9081267854', 'Behala', '1000-5000', 'Need a knowlegable teacher.', 12);

-- --------------------------------------------------------

--
-- Table structure for table `studentrequests`
--

CREATE TABLE `studentrequests` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentrequests`
--

INSERT INTO `studentrequests` (`id`, `teacher_id`, `post_id`, `request_date`) VALUES
(1, 5, 5, '2024-05-22 19:54:07'),
(2, 3, 2, '2024-05-22 19:57:05'),
(3, 4, 6, '2024-05-22 20:04:45'),
(4, 8, 3, '2024-05-22 20:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `agreed_terms` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `name`, `type`, `email`, `mobile`, `password`, `agreed_terms`) VALUES
(1, 'Peter', 'parent', 'p@gmail.com', '9903456789', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(2, 'Shreya', 'student', 'sr@gmail.com', '7789056478', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(3, 'Priyank', 'parent', 'k@gmail.com', '9908790546', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(4, 'Muskan', 'student', 'm@gmail.com', '8907865098', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(5, 'Maryam', 'parent', 'ya@gmail.com', '9805891230', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(6, 'Ankit', 'student', 'ak@gmail.com', '8790123765', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(7, 'Noor', 'parent', 'o@gmail.com', '9081267854', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(8, 'Ishita', 'student', 'i@gmail.com', '8803412895', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(9, 'Sourav', 'student', 'v@gmail.com', '9250178436', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(10, 'Rupsa', 'parent', 'sa@gmail.com', '8901673986', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(12, 'Yasmin', 'student', 'ys@gmail.com', '8971123456', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed');

-- --------------------------------------------------------

--
-- Table structure for table `teachernotifications`
--

CREATE TABLE `teachernotifications` (
  `notification_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('unread','read') DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachernotifications`
--

INSERT INTO `teachernotifications` (`notification_id`, `teacher_id`, `student_id`, `pid`, `message`, `timestamp`, `status`) VALUES
(1, 5, 3, 5, 'You have received an application from a teacher', '2024-05-22 19:54:08', 'unread'),
(2, 3, 1, 2, 'You have received an application from a teacher', '2024-05-22 19:57:05', 'read'),
(3, 4, 4, 6, 'You have received an application from a teacher', '2024-05-22 20:04:45', 'read'),
(4, 8, 2, 3, 'You have received an application from a teacher', '2024-05-22 20:13:51', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `agreed_terms` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tid`, `name`, `email`, `mobile`, `password`, `agreed_terms`) VALUES
(1, 'Sharmistha Mitra', 's@gmail.com', '9989763423', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(2, 'Aarav Sheikh', 'ar@gmail.com', '8971123456', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(3, 'Ananya Patel', 'p@gmail.com', '8893456732', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(4, 'Vivek Mehta', 'v@gmail.com', '9989675456', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(5, 'Yasmin Ali', 'y@gmail.com', '8895434521', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(6, 'Naveen Dixit', 'n@gmail.com', '8965123789', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(7, 'Tanvi Kapoor', 't@gmail.com', '9986554123', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(9, 'Zaid Khan', 'z@gmail.com', '8897854123', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed'),
(10, 'Sarah Thomas', 'st@gmail.com', '9831267894', '81dc9bdb52d04dc20036dbd8313ed055', 'agreed');

-- --------------------------------------------------------

--
-- Table structure for table `teachprofile`
--

CREATE TABLE `teachprofile` (
  `teid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `timg` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `preferences` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `request` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachprofile`
--

INSERT INTO `teachprofile` (`teid`, `name`, `timg`, `gender`, `qualification`, `subjects`, `experience`, `location`, `preferences`, `salary`, `request`) VALUES
(1, 'Sharmistha Mitra', '1716442470pro2.jpg', 'Female', 'BBA', 'English,SST,Bengali,Hindi', '4', 'Behala ', 'Student\'s Place,Teacher\'s Place', '1000-5000', 0),
(2, 'Aarav Sheikh', '1716398749pro1.jpg', 'Male', 'BHM', 'Maths,English,Science', '5', 'New Alipore', 'Online,Student\'s Place', '2000-6000', 0),
(3, 'Ananya Patel', '1716398911pro3.png', 'Female', 'BCA', 'Maths,Science,Computer', '5', 'Behala ', 'Student\'s Place,Teacher\'s Place', '1000-5000', 0),
(4, 'Vivek Mehta', '1716399499pro4.jpeg', 'Male', 'Bsc in Maths', 'Maths,Science,Computer', '6', 'New Alipore', 'Student\'s Place,Teacher\'s Place', '2000-6000', 0),
(5, 'Yasmin Ali', '1716398325pro5.jpg', 'Female', 'BCA', 'Maths,English,Computer', '6', 'Rashbehari', 'Online,Teacher\'s Place', '3000-6000', 0),
(6, 'Naveen Dixit', '1716405531pro6.png', 'Male', 'BHM', 'English,SST,Science,Hindi', '5', 'Rashbehari', 'Online,Student\'s Place', '1000-5000', 0),
(7, 'Tanvi Kapoor', '1716405672pro7.jpg', 'Female', 'BA in English', 'English,SST,Science', '6', 'Rashbehari', 'Online,Teacher\'s Place', '2000-6000', 0),
(9, 'Zaid Khan', '1716406016pro9.jpg', 'Male', 'MCA', 'Maths,English,Science,Computer', '7', 'Behala ', 'Student\'s Place,Teacher\'s Place', '2000-7000', 0),
(10, 'Sarah Thomas', '1716406355pro10.jpg', 'Female', 'BHM', 'English,SST,Science,Computer,Bengali', '5', 'New Alipore', 'Online,Student\'s Place', '2000-6000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachrequests`
--

CREATE TABLE `teachrequests` (
  `request_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachrequests`
--

INSERT INTO `teachrequests` (`request_id`, `student_id`, `teacher_id`, `request_date`) VALUES
(3, 4, 1, '2024-05-23 05:34:46'),
(4, 4, 9, '2024-05-23 05:35:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `studentpost`
--
ALTER TABLE `studentpost`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk_student_id` (`student_id`);

--
-- Indexes for table `studentrequests`
--
ALTER TABLE `studentrequests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `teachernotifications`
--
ALTER TABLE `teachernotifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `teachprofile`
--
ALTER TABLE `teachprofile`
  ADD PRIMARY KEY (`teid`);

--
-- Indexes for table `teachrequests`
--
ALTER TABLE `teachrequests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentpost`
--
ALTER TABLE `studentpost`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `studentrequests`
--
ALTER TABLE `studentrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachernotifications`
--
ALTER TABLE `teachernotifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachprofile`
--
ALTER TABLE `teachprofile`
  MODIFY `teid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachrequests`
--
ALTER TABLE `teachrequests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `students` (`sid`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `teachers` (`tid`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`tid`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`sid`);

--
-- Constraints for table `studentpost`
--
ALTER TABLE `studentpost`
  ADD CONSTRAINT `fk_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`sid`);

--
-- Constraints for table `studentrequests`
--
ALTER TABLE `studentrequests`
  ADD CONSTRAINT `studentrequests_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`tid`),
  ADD CONSTRAINT `studentrequests_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `studentpost` (`pid`);

--
-- Constraints for table `teachrequests`
--
ALTER TABLE `teachrequests`
  ADD CONSTRAINT `teachrequests_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`sid`),
  ADD CONSTRAINT `teachrequests_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
