-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2017 at 08:34 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'uncategorized'),
(2, 'Site News'),
(3, 'Latest news'),
(4, 'Latest news'),
(5, 'Hype'),
(6, 'Weird'),
(7, 'Exellent_stuff'),
(8, 'Great'),
(9, 'Geekish'),
(10, 'Weirdo'),
(11, 'Shark_tank'),
(12, 'Awesome_aweful'),
(13, 'Awesome_aweful');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `email_add`, `name`, `comment`) VALUES
(1, 3, 'karicho@hotmail.com', 'Alpha', 'Yeah, it is the greatest'),
(2, 3, 'karicho@hotmail.com', 'Karicho', 'I totally agree with that'),
(3, 4, 'karicho@hotmail.com', 'Goth', 'Who cares????'),
(4, 5, 'awesome@weird.com', 'Anonymous', 'Thank you, atleast i wont spend any more bucks on softwares'),
(5, 6, 'me@me.com', 'Anonymous_007', 'Really, ok, I partially agree with you...'),
(6, 7, 'Wow@geek.com', 'geek', 'What about online gaming with that kind of speed, you wouldn&#039;t even need to have Nvidia products any where close to you, everything would go &#039;cloud&#039;...that is how we get to cloud 9!!!!'),
(7, 7, 'tt@algorithm.com', 'algolithm', 'Why have 90gbps when I cannot fully utilize 100mbps'),
(8, 8, 'K@chandaria.com', 'chandaria', 'Really'),
(9, 8, 'sloppy@chandaria.com', 'Sloppy', 'That&#039;s awful'),
(10, 9, 'hacker@anonymous.com', 'anonymous_069', 'Really, just stay without eating for 7 days'),
(11, 9, '45@keepitreal.com', 'me', 'I totally agree with that.'),
(12, 9, 'karicho@hotmail.com', 'kk', 'I agree with you, the moment you find what you like, you can like it more than food'),
(13, 1, 'K@chandaria.com', 'Django', 'Really, can you have your heading as &#039;Hello world&#039;...!!?'),
(14, 11, 'www@www.org', 'Kingfisher', 'Stop wasting our time please'),
(15, 8, 'morris@jhdsfh.com', 'morris', 'Hiyo ni kali');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id_no`, `user_id`, `title`, `body`, `category_id`, `posted`) VALUES
(1, 1, 'Hello world', 'This is my first post.', 2, '2017-02-17 19:39:59'),
(2, 1, 'Awesome Moments', 'That moment when you are able to hack into an account that you have been work on for days.', 2, '2017-02-17 19:57:43'),
(4, 1, 'Challenge', 'What do we call a three humped camel...', 3, '2017-02-19 17:46:28'),
(5, 1, 'Splendid Softwares', 'I would like to bring to your attention that we have a website called softonic softwares where you can download any softwares you want for free, so you can go ahead and download Fedora OS which is one of the major distribution of Linux. Got!', 1, '0000-00-00 00:00:00'),
(6, 1, 'Geek and nerds', 'We program or do our staff the whole day without minding what is happening around us, I think this is both awful and awesome.', 6, '2017-02-26 12:36:04'),
(7, 1, 'Fibre stuff', 'Imagine that we are celebrating 100mbps of internet while NASA(National Aeronautic Space Administration) are enjoying 90 gbps!!!! Do you know that with that king of internet you can have a hacker erase your 2 tetrabytes hardisk within 25 seconds!', 5, '2017-02-26 15:13:49'),
(8, 1, 'Delete Me', 'I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted. I am just about to be deleted.', 2, '2017-02-27 10:08:26'),
(9, 1, '#glassFishEnthusiast', 'I love java programming more than I love food. I love java programming more than I love food. I love java programming more than I love food. I love java programming more than I love food. I love java programming more than I love food. I love java programming more than I love food. I love java programming more than I love food. I love java programming more than I love food. I love java programming more than I love food.', 11, '2017-02-27 10:35:42'),
(10, 1, 'Testing', 'I love hacking web apps. I love hacking web apps. I love hacking web apps. I love hacking web apps. I love hacking web apps. I love hacking web apps. I love hacking web apps. I love hacking web apps. I love hacking web apps. I love hacking web apps. I love hacking web apps.', 10, '2017-02-27 10:44:32'),
(11, 1, 'Weird_really?', 'I am going to post weird post &#039;Weird_really? Weird_really? Weird_really? Weird_really? Weird_really? Weird_really? Weird_really? Weird_really? v Weird_really? Weird_really? Weird_really? Weird_really? Weird_really? Weird_really? Weird_really?&#039; ,isn&#039;t that weird.....but it is not as weird as LOREM IPSUM crap!', 10, '2017-03-05 15:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
