-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 10:33 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `type` varchar(30) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `event_time` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `event_date` date NOT NULL,
  `eventLocation` varchar(255) NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `university_id` varchar(3) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `scope` varchar(30) NOT NULL,
  `eventDesc` varchar(250) NOT NULL,
  `pNum` varchar(25) NOT NULL,
  `rsoAff` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `name`, `type`, `event_time`, `event_date`, `eventLocation`, `lat`, `lon`, `university_id`, `scope`, `eventDesc`, `pNum`, `rsoAff`) VALUES
(178, 'weCrazy', 'social', '11:00pm', '2018-07-10', '3849 stonefield drive', 28.6054, -81.1669, 'UCF', 'public', 'this event is for the fun of it all and I just love being here today in this world. God bless america and its emence amount of opportunties. I am so glad to be studying anything I want with the love of my life ', '9548997868', 'Cool guys'),
(185, 'girl party', 'social', '12:00pm', '2018-07-16', '2624 College Knight court', 28.5787, -81.2086, '', 'public', 'this event is for the fun of it all and I just love being here today in this world. God bless america and its emence amount of opportunties. I am so glad to be studying anything I want with the love of my life ', '9548997868', 'crazy girls club'),
(186, 'screammmm', 'social', '11:00pm', '2018-07-03', '233 wildwood circle', 34.6128, -83.5277, 'UCF', 'public', 'xcyfvgubhij', '9548997868', 'Cool guys'),
(187, 'Stand up for rights', 'social', '11:00am', '2018-07-23', 'Downtown Orlando', 28.5383, -81.3792, 'UCF', 'public', 'we gotta do it for the kids', '9548997868', 'Campus Peace Action'),
(188, 'First UF event!', 'social', '2:00pm', '2018-07-25', 'University of florida', 29.6436, -82.3549, 'UF', 'public', 'this event is for the fun of it all and I just love being here today in this world. God bless america and its emence amount of opportunties. I am so glad to be studying anything I want with the love of my life ', '9548997768', 'First UF Org'),
(189, 'j', 'social', '11:00pm', '2018-07-03', '233 wildwood circle', 34.6128, -83.5277, 'UF', 'private', 'this event is for the fun of it all and I just love being here today in this world. God bless america and its emence amount of opportunties. I am so glad to be studying anything I want with the love of my life ', '9548997868', 'First UF Org'),
(191, 'Hackathon', 'technical', '3:00pm', '2018-07-17', 'Vespr coffee Orlando', 28.5557, -81.2077, 'UCF', 'public', 'This is a test of the API to see if it finds vespr coffe. But we are also having a hackathon here so come on bye!', '9548997868', 'Cool guys'),
(192, 'test event', 'technical', '2:00pm', '2018-07-30', 'university of central florida', 28.6024, -81.2001, 'UCF', 'public', 'Testong', '9548997868', 'Wine Club');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `rsoID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`rsoID`, `email`) VALUES
(9, '0'),
(9, '0'),
(9, 'caraline@gmail.com'),
(12, 'frank@gmail.com'),
(13, 'jiexiong4159@knights.ucf.edu'),
(13, 'mikegreen@hotmail.com'),
(13, 'haug.freddy01@gmail.com'),
(13, 'jinglerants@gmail.com'),
(13, 'jinglerants@gmail.com1'),
(13, 'jiexiong4159@knights.ucf.edu'),
(13, 'mikegreen@hotmail.com'),
(13, 'haug.freddy01@gmail.com'),
(13, 'jinglerants@gmail.com'),
(13, 'jinglerants@gmail.com1'),
(15, 'rawr@gmail.com'),
(15, 'mikegreen@hotmail.com'),
(15, 'jane@hotmail.com'),
(15, 'wrfaefa@gmail.com'),
(15, 'gggg@hotmail.com'),
(6, 'jiexiong4159@knights.ucf.edu'),
(7, 'jiexiong4159@knights.ucf.edu'),
(7, 'jiexiong4159@knights.ucf.edu'),
(12, 'jiexiong4159@knights.ucf.edu'),
(12, 'jiexiong4159@knights.ucf.edu'),
(11, 'jiexiong4159@knights.ucf.edu'),
(16, 'cpez@gmail.com'),
(16, ''),
(16, ''),
(16, ''),
(16, ''),
(17, 'haug.freddy01@gmail.com'),
(17, 'cpez@gmail.com'),
(17, 'haug.freddy01@gmail.com'),
(17, 'haug.freddy01@gmail.com'),
(17, 'haug.freddy01@gmail.com'),
(17, 'jiexiong4159@knights.ucf.edu'),
(18, 'haug.freddy01@gmail.com'),
(18, 'haug.freddy01@gmail.com'),
(18, 'haug.freddy01@gmail.com'),
(18, 'haug.freddy01@gmail.com'),
(18, 'haug.freddy01@gmail.com'),
(18, 'jiexiong4159@knights.ucf.edu'),
(13, 'haug.freddy01@gmail.com'),
(13, 'fooky@gmail.com'),
(19, 'haug.freddy01@gmail.com'),
(19, 'haug.freddy01@gmail.com'),
(19, 'fooky@gmail.com'),
(19, 'haug.freddy01@gmail.com'),
(19, 'haug.freddy01@gmail.com'),
(20, 'jinglerants@gmail.com'),
(20, 'dumbgi@hotmail.com'),
(20, 'jinglerants@gmail.com'),
(20, 'jinglerants@gmail.com'),
(20, 'jinglerants@gmail.com'),
(20, 'dumbgi@hotmail.com'),
(12, 'r.wilson@gmail.com'),
(21, 'jinglerants@gmail.com'),
(21, 'r.wilson@gmail.com'),
(21, 'haug.freddy01@gmail.com'),
(21, 'fooky@gmail.com'),
(21, 'y.hung@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) NOT NULL,
  `comment_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `comments` varchar(250) NOT NULL,
  `ratingscore` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rso`
--

CREATE TABLE `rso` (
  `RSO_id` int(20) NOT NULL,
  `nameRSO` varchar(30) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `u_id` varchar(11) NOT NULL,
  `rsoDes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rso`
--

INSERT INTO `rso` (`RSO_id`, `nameRSO`, `usertype`, `adminEmail`, `u_id`, `rsoDes`) VALUES
(1, '', 'superadmin', '0', '0', 0),
(2, '', 'admin', '0', '0', 0),
(3, '', 'student', '0', '0', 0),
(6, 'fine club', '', 'jinglerants@gmail.com', 'UCF', 0),
(7, 'Tech Club', '', 'cpez@gmail.com', 'UCF', 0),
(10, 'party organization', '', 'johnboy@knights.ucf.edu', 'UCF', 0),
(11, 'party', '', 'johnboy@knights.ucf.edu', 'UCF', 0),
(12, 'Fans of the Beach', '', 'frank@gmail.com', 'UCF', 0),
(13, 'Cool guys', '', 'jiexiong4159@knights.ucf.edu', 'UCF', 0),
(15, 'Camilo\'s Dream Club', '', 'mikegreen@hotmail.com', 'UCF', 0),
(16, 'Go-Go Dancer Club', '', 'cpez@gmail.com', 'UCF', 0),
(17, 'Film Club', '', 'cpez@gmail.com', 'UCF', 0),
(18, 'crazy girls club', '', 'haug.freddy01@gmail.com', 'UCF', 0),
(19, 'Campus Peace Action', '', 'fooky@gmail.com', 'UCF', 0),
(20, 'First UF Org', '', 'dumbgi@hotmail.com', 'UF', 0),
(21, 'Wine Club', '', 'r.wilson@gmail.com', 'UCF', 0);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `univ_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `sa` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`univ_id`, `name`, `city`, `description`, `sa`) VALUES
(1, 'UCF', 'Orlando', 'University of Central Florida', 'jiexiong4159@knights.ucf.edu'),
(3, 'UM', 'Miami', 'University of Miami', 't.Dixie@gmail.com'),
(4, 'UF', 'Gainsville', 'University of Florida', 'cgomez@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL,
  `univeristy_id` varchar(50) NOT NULL,
  `priv` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `LastName`, `Email`, `password`, `image`, `univeristy_id`, `priv`) VALUES
(1, 'Mike', 'Green', 'mikegreen@hotmail.com', '12345678', '1528660592(1).png', 'UF', 2),
(2, 'Jie', 'Xiong', 'jiexiong4159@knights.ucf.edu', '12341234', '1528660592(1).png', 'UCF', 3),
(3, 'jane', 'Gong', 'jane@hotmail.com', '12341234', 'ä¸‰ä¸ª.png', 'FAU', 1),
(4, 'Meng', 'zhang', 'meng@hotmail.com', '12345678', 'WeChat Image_20180421122751.jpg', 'UF', 1),
(6, 'Freddy', 'Haug', 'haug.freddy01@gmail.com', '$2y$10$iGrfhZ8R.35DODtE3WFw7uTzs.1KEaY8QE3ZzZzhxiX6cu3EaJCvy', '3580257638659741530571487.PNG', 'UCF', 2),
(8, 'boom', 'meee', 'jinglerants@gmail.com', '$2y$10$dwkF0T9ceCxJt8pFX/vzB.jsaMdx.W69..ej5koGdxJucLZt3uhjO', '8796869919719631530575478.jpg', 'UCF', 2),
(10, 'fred', 'freasd', 'frank@gmail.com', '12341234', '5568523433294491530894574.PNG', 'UCF', 2),
(15, 'Frederick', 'Haug', 'dumbgi@hotmail.com', 'weewee77', '5062061303319461531094488.jpg', 'UF', 2),
(16, 'camilo', 'gomez', 'cgomez@gmail.com', '12345123', '88883450213281531350176.PNG', 'UF', 3),
(17, 'camilo', 'pez', 'cpez@gmail.com', 'pez1234567', '473232910988871531350274.jpg', 'FAU', 2),
(20, 'John', 'Kane', 'johnboy@knights.ucf.edu', '12341234', '5126460886115911531774310.jpg', 'UCF', 2),
(21, 'Fooky', 'Haug', 'fooky@gmail.com', '12345678', '9081611569698961532197458.jpg', 'UCF', 2),
(33, 'Timothy', 'Dixie', 't.Dixie@gmail.com', '12341234', '', 'UM', 3),
(34, 'yuhhu', 'Hung', 'y.hung@gmail.com', '12341234', '1120328648641521532548184.jpg', 'UCF', 1),
(35, 'rain', 'wilson', 'r.wilson@gmail.com', '12341234', '7209926439343741532549277.jpg', 'UCF', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `rso`
--
ALTER TABLE `rso`
  ADD PRIMARY KEY (`RSO_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`univ_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rso`
--
ALTER TABLE `rso`
  MODIFY `RSO_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `univ_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
