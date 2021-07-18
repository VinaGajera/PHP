-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 05:30 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain_like`
--

CREATE TABLE `complain_like` (
  `u_id` int(20) NOT NULL,
  `cid` int(30) NOT NULL,
  `rating_action` varchar(309) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_like`
--

INSERT INTO `complain_like` (`u_id`, `cid`, `rating_action`) VALUES
(2, 1, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `complain_tb`
--

CREATE TABLE `complain_tb` (
  `complaint_id` int(20) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `c_type` varchar(20) NOT NULL,
  `complaint_discription` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_worker_id` int(10) NOT NULL,
  `padding` enum('1','0') NOT NULL,
  `running` enum('1','0') NOT NULL,
  `complete` enum('1','0') NOT NULL,
  `image` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `recever_image` varchar(600) NOT NULL,
  `ctimestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `solvetimestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_tb`
--

INSERT INTO `complain_tb` (`complaint_id`, `complaint_title`, `c_type`, `complaint_discription`, `user_id`, `user_worker_id`, `padding`, `running`, `complete`, `image`, `c_address`, `recever_image`, `ctimestamp`, `solvetimestamp`) VALUES
(1, 'road damage', 'light', 'road reparing to last week than not work proper to this work', 4, 2, '', '', '1', 'complaintimage/r1.jpg complaintimage/r2.jpeg complaintimage/r3.jpg ', 'manek chock ahmedabad', 'solveimage/road_Solve1.jpg solveimage/road_Solve2.jpg ', '2020-10-25 05:52:53', '2020-10-25 05:52:53'),
(2, 'light not work', 'light', 'our area not work light so please check this', 6, 2, '', '', '1', 'complaintimage/broken_StreetLight1.jpg complaintimage/broken_StreetLight2.jpg ', 'gandhi chock ,ahmedabad', 'solveimage/solve_Streetlight2.jpg solveimage/solve_Streetlight3.jpg ', '2020-10-25 09:18:18', '2020-10-25 09:18:18'),
(3, 'pipe break', 'water', 'water pipe are break few days', 6, 3, '', '1', '', 'complaintimage/pipe_break4.jpg complaintimage/pipe_break5.jpg ', 'manekvada ,ahmedabad', '', '2020-10-25 09:20:10', '2020-10-25 09:20:10'),
(4, 'Pits in the road', 'road', 'more palce pits in the road please check it', 6, 3, '', '1', '', 'complaintimage/broken_road.jpg complaintimage/broken_road1.jpg ', 'jiyanivadi ,ahmedabad', '', '2020-10-25 09:23:02', '2020-10-25 09:23:02'),
(5, 'road work padding', 'road', 'make road in our area but work not complete so try to fast work of road', 4, 0, '1', '', '', 'complaintimage/broken_road5.jpg complaintimage/broken_road6.jpg ', 'hirani vadi,ahmedabad', '', '2020-10-25 09:25:20', '2020-10-25 09:25:20'),
(6, 'light not work', 'light', 'hello sir ,light not work in my area ', 7, 0, '1', '', '', 'complaintimage/solve_Streetlight1.jpg ', 'gandhi bag,ahmedabad', '', '2020-10-25 09:31:07', '2020-10-25 09:31:07'),
(7, 'pipe leakage', 'water', 'in flow days to our area main water pipeline is a damage place check it', 5, 2, '1', '', '', 'complaintimage/pipe_break.jpg complaintimage/pipe_break1.jpg complaintimage/pipe_break2.jpg ', 'gangavadi ahmedabad', '', '2020-10-25 10:07:57', '2020-10-25 10:07:57'),
(8, 'light problem', 'light', 'our area some day not light', 6, 2, '', '', '1', 'complaintimage/broken_StreetLight1.jpg complaintimage/broken_StreetLight2.jpg ', 'gandhi vadi chock', 'solveimage/solve_Streetlight2.jpg solveimage/solve_Streetlight3.jpg ', '2020-11-25 15:45:42', '2020-11-25 15:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `conus_id` int(20) NOT NULL,
  `c_username` varchar(20) NOT NULL,
  `c_useremail` varchar(50) NOT NULL,
  `c_usermessage` varchar(200) NOT NULL,
  `c_usertime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `notify_id` int(50) NOT NULL,
  `sender_user_id` int(50) NOT NULL,
  `complaint_id` int(30) NOT NULL,
  `sender_user_role` varchar(100) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `reciver_id` int(10) NOT NULL,
  `msg_recive` varchar(20) NOT NULL,
  `send_msg` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`notify_id`, `sender_user_id`, `complaint_id`, `sender_user_role`, `msg`, `reciver_id`, `msg_recive`, `send_msg`, `status`) VALUES
(1, 4, 1, 'user', 'When will the work start?', 0, 'admin', '2020-10-25 09:27:09', 1),
(2, 0, 1, 'admin', 'light realted problem', 2, 'worker', '2020-10-25 10:08:53', 0),
(3, 0, 1, 'admin', 'your work is start ', 4, 'user', '2020-10-25 10:09:22', 0),
(4, 1, 1, 'admin', 'what is the problem to start work?', 2, 'worker', '2020-10-25 10:28:52', 1),
(5, 2, 1, 'worker', 'sry for late work ', 1, 'admin', '2020-10-25 10:31:06', 0),
(6, 1, 1, 'admin', 'ok done', 2, 'worker', '2020-10-25 10:42:46', 1),
(7, 1, 1, 'admin', 'thank u for share your area problem', 4, 'user', '2020-10-25 10:43:30', 0),
(8, 1, 2, 'admin', 'light problem', 2, 'worker', '2020-10-25 10:43:59', 1),
(9, 2, 2, 'worker', 'check work', 1, 'admin', '2020-10-25 10:45:02', 0),
(11, 1, 2, 'admin', 'done', 2, 'worker', '2020-10-25 10:46:27', 0),
(13, 0, 3, 'admin', 'solve problem ', 3, 'worker', '2020-10-25 10:50:47', 0),
(14, 0, 3, 'admin', 'your complaint started thank you', 6, 'user', '2020-10-25 10:51:16', 1),
(15, 1, 4, 'admin', 'check work', 3, 'worker', '2020-10-25 10:52:33', 0),
(16, 1, 4, 'admin', 'your work is start', 6, 'user', '2020-10-25 10:52:49', 1),
(17, 6, 2, 'user', 'not proper work do your officer', 0, 'admin', '2020-10-25 10:54:38', 0),
(18, 1, 2, 'admin', 'ok do it again sry for that', 6, 'user', '2020-10-25 10:57:36', 1),
(19, 6, 2, 'user', 'not proper work do your officer', 0, 'admin', '2020-10-25 11:00:59', 0),
(20, 2, 2, 'worker', 'sry for that', 6, 'admin', '2020-10-25 11:10:38', 0),
(21, 1, 2, 'admin', 'ok done', 6, 'user', '2020-10-25 11:21:05', 1),
(22, 1, 2, 'admin', 'ok done', 6, 'user', '2020-10-25 11:25:22', 1),
(23, 1, 2, 'admin', 'done', 6, 'user', '2020-10-25 11:26:20', 1),
(24, 1, 7, 'admin', 'work your work', 2, 'worker', '2020-11-20 09:51:52', 1),
(25, 1, 8, 'admin', 'solve this problem', 2, 'worker', '2020-11-25 15:46:24', 1),
(26, 1, 8, 'admin', 'your complain is register', 6, 'user', '2020-11-25 15:46:45', 1),
(27, 6, 8, 'user', 'ok thank you', 0, 'admin', '2020-11-25 15:48:34', 0),
(28, 2, 8, 'worker', 'check this complaint', 1, 'admin', '2020-11-25 15:50:49', 0),
(29, 1, 8, 'admin', 'ok done', 2, 'worker', '2020-11-25 15:51:19', 0),
(30, 1, 8, 'admin', 'check your complaint ', 6, 'user', '2020-11-25 15:51:52', 0),
(31, 6, 8, 'user', 'worker not proper work in this light', 0, 'admin', '2020-11-25 15:58:46', 0),
(32, 1, 8, 'admin', 'sry to this', 6, 'user', '2020-11-25 15:59:36', 0),
(33, 2, 8, 'worker', 'sry for that', 6, 'admin', '2020-11-25 16:18:13', 0),
(34, 1, 8, 'admin', 'sry to that problem', 6, 'user', '2020-11-25 16:19:14', 0),
(35, 1, 8, 'admin', 'ok done', 6, 'user', '2020-11-25 16:20:41', 0),
(36, 1, 8, 'admin', 'ok', 6, 'user', '2020-11-25 16:22:53', 0),
(37, 1, 8, 'admin', 'hello', 6, 'user', '2020-11-25 16:24:45', 0),
(38, 1, 8, 'admin', 'sry for that', 6, 'user', '2020-11-25 16:29:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `recomplaint_tb`
--

CREATE TABLE `recomplaint_tb` (
  `r_c_id` int(20) NOT NULL,
  `c_id` int(20) NOT NULL,
  `sender_user_id` int(20) NOT NULL,
  `user_send_image` varchar(260) NOT NULL,
  `solver_worker_id` int(20) NOT NULL,
  `recomplain_solve_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recomplaint_tb`
--

INSERT INTO `recomplaint_tb` (`r_c_id`, `c_id`, `sender_user_id`, `user_send_image`, `solver_worker_id`, `recomplain_solve_image`) VALUES
(1, 2, 6, 'recomplainimg/broken_StreetLight3.jpg ', 2, 'solveimage/solve_Streetlight6.jpg '),
(3, 8, 6, 'recomplainimg/broken_StreetLight3.jpg ', 2, 'solveimage/solve_Streetlight3.jpg ');

-- --------------------------------------------------------

--
-- Table structure for table `usertb`
--

CREATE TABLE `usertb` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `security_que` varchar(100) NOT NULL,
  `sequrity_ans` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `user_area` varchar(50) NOT NULL,
  `user_pincode` varchar(12) NOT NULL,
  `account_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertb`
--

INSERT INTO `usertb` (`user_id`, `user_name`, `last_name`, `user_email`, `user_role`, `user_image`, `user_city`, `pwd`, `security_que`, `sequrity_ans`, `contact`, `user_area`, `user_pincode`, `account_time`) VALUES
(1, 'hemanshi ', 'vyas', 'hemanshivyas13@gmail.com', 'admin', 'adminprofilepic/9.png', 'ahmedabad', '12345', 'Your favourite colour ???', 'blue', '1345678765', 'nikol', '345631', '2020-10-25 04:53:57'),
(2, 'niv', 'patel', 'nivpatel12@gmail.com', 'worker', 'workerprofilepic/8.png', 'ahmedabad', '123', 'Your favourite food ???', 'gulabjamun', '9865654645', 'gandhi chock', '555455', '2020-10-25 09:04:33'),
(3, 'kunjal', 'patel', 'kunjalp16@gmail.com', 'worker', 'workerprofilepic/10.jpg', 'ahmedabad', '123456', 'Your favourite movie ???', 'rama', '7877656545', 'gandhi choke', '654534', '2020-10-25 09:07:07'),
(4, 'hemangi', 'vyas', 'hv@gmail.com', 'user', 'userprofilepic/13.png', 'ahmedabad', '1234', 'your favourite colour ???', 'blue', '1234456677', 'nikol', '564578', '2020-10-25 09:26:18'),
(5, 'rajiv', 'patel', 'rajivpatel@gmail.com', 'user', 'userprofilepic/1.jpg', 'ahmedabad', '999', 'your favourite colour ???', 'black', '1234567888', 'nathvani ', '123445', '2020-10-25 08:37:09'),
(6, 'mayank', 'gupta', 'mayank@gmail.com', 'user', 'userprofilepic/6.png', 'ahmedabad', '777', 'your favourite colour ???', 'green', '1234567687', 'gandhi bag', '123455', '2020-10-25 08:41:03'),
(7, 'nareshbhai', 'patel', 'np@gmail.com', 'user', 'userprofilepic/4.png', 'ahmedabad', 'npatel', 'your favourite colour ???', 'red', '1234456666', 'near chock', '676767', '2020-10-25 08:48:20'),
(8, 'hirav', 'patel', 'hirav@gmail.com', 'worker', 'workerprofilepic/4.png', 'ahmedabad', 'hirav', 'Your favourite food ???', 'pizza', '9965465454', 'nayekvada', '778768', '2020-10-25 08:59:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain_tb`
--
ALTER TABLE `complain_tb`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`conus_id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `recomplaint_tb`
--
ALTER TABLE `recomplaint_tb`
  ADD PRIMARY KEY (`r_c_id`);

--
-- Indexes for table `usertb`
--
ALTER TABLE `usertb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain_tb`
--
ALTER TABLE `complain_tb`
  MODIFY `complaint_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `conus_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `notify_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `recomplaint_tb`
--
ALTER TABLE `recomplaint_tb`
  MODIFY `r_c_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usertb`
--
ALTER TABLE `usertb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
