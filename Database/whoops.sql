-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 08:09 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whoops`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `answer`, `date`, `user_id`, `post_id`) VALUES
(50, ' am making a simplistic mark-and-compact garbage collector. Without going too much into details, the API it exposes is like this: /// Describes the internal structure of a managed object. pub s', '2022-02-16 23:45:52', 2, 21),
(54, 'f you try to overwrite your memory with a program that uses parallel processing, you should first verify that its worth it.\r\n\r\nFor instance, check if your disk is at 80%-100% writing speed; if that is the case, then your program could also just use a single core, because it is blocked by disk writing speed anyway.\r\n\r\nIf this is not the case, I recommend you to use the debugger or ad console/GUI outputs to your program to verify that everything gets executed in the right order.', '2022-02-16 23:53:29', 1, 21),
(135, 'There were several options for HPC infastructure considered: MPICH, Open MPI and MS MPI. Initially tried to use MPICH2 but gave up as the latest stable release 1.4.1 for Windows dated back by 2013 and no support since those times. Open MPI is not supported by Windows. Then only MS MPI option left.', '2022-02-17 09:01:51', 2, 22),
(136, 'The hosts.txt - MPI Machines File - is a text file, the lines of which contain the network names of the computers on which R scripts will be launched. In each line, after the computer name is separated by a space (for MS MPI), the number of MPI processes to be launched. Usually it equals the amount of processors in each node', '2022-02-17 09:03:13', 2, 22),
(137, 'The alert message just like a pop-up window on the screen. Using this you can alert to the user with some information and message. PHP doesn’t support alert message box because it is a server-side language but you can use JavaScript code within the PHP body to alert the message box on the screen.', '2022-02-17 09:04:15', 2, 26),
(138, 'A big difference between the Skylake server and the Skylake desktop processor is the interconnect between the cores. The desktop processor has a ringbus interconnect, while the server processor has a mesh network between the cores. ', '2022-02-17 09:07:31', 11, 25),
(139, 'To convert string to integer using PHP built-in function, intval(), provide the string as argument to the function. The function will return the integer value corresponding to the string content.', '2022-02-17 09:08:28', 11, 24);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `date`, `user_id`) VALUES
(21, 'Managing the lifetimes of garbage-collected objects', '2022-02-16 18:18:04', 1),
(22, 'How to setup workers for parallel processing in R using snowfall and multiple Windows nodes?', '2022-02-16 20:28:17', 2),
(24, 'How do I convert a string to a number in PHP?', '2022-02-17 05:32:29', 11),
(25, 'memory bandwidth for many channels x86 systems', '2022-02-17 05:36:28', 11),
(26, 'How to pop an alert message box using PHP ?', '2022-02-17 08:50:58', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `image_url`, `email`, `password`) VALUES
(1, 'test', 'IMG-620dbf1f00d780.36160264.jpg', 'test@test.com', '$2y$10$P0GA'),
(2, 'Mohamed ', 'IMG-620dbf1f00d780.36160264.jpg', 'mohamed@gmail.com', '25553'),
(10, 'Omar', 'IMG-620dbf1f00d780.36160264.jpg', 'Omar@gmail.com', '1234oom'),
(11, 'Mohsen', 'IMG-620dc180208dc2.83193105.jpg', 'Mohsen@gmail.com', '123mm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
