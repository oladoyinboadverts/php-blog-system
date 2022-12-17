-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 07:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pass` varchar(400) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`, `email`) VALUES
(1, 'oladoyinbov', '$5$ro$t/egULwhDxSN4MaCt3/nxqpUTJmAg51q44WTfI4SYn8', 'oladoyinbov@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `comment` mediumtext NOT NULL,
  `date` varchar(400) NOT NULL,
  `cid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `commentbox` varchar(300) NOT NULL,
  `related` varchar(300) NOT NULL,
  `views` varchar(300) NOT NULL,
  `indexno` int(100) NOT NULL,
  `categoryno` int(100) NOT NULL,
  `tagsno` int(100) NOT NULL,
  `relatedno` int(100) NOT NULL,
  `recentno` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`commentbox`, `related`, `views`, `indexno`, `categoryno`, `tagsno`, `relatedno`, `recentno`) VALUES
('Enable', 'Enable', '1', 5, 5, 5, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `content` longtext NOT NULL,
  `slug` varchar(400) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `content`, `slug`, `views`) VALUES
(1, 'Privacy Policy', 'Lorem ipsum dolor sit amet, omnis signiferumque in mei, mei ex enim concludaturque. Senserit salutandi euripidis no per, modus maiestatis scribentur est an. Cum ei doctus oporteat contentiones, vix graeci vocibus alienum no. Quando homero aeterno cu pro, mel ne novum ridens aliquando, harum facete per an. Ea suas pertinax has, solet officiis pericula cu pro, possit inermis qui ad. An mea tale perfecto sententiae, eos inani epicuri concludaturque ex.\r\n\r\nUsu an adhuc nihil. Et usu molestiae persequeris, option facilisis intellegebat vim eu, modus ullum dictas ex usu. Apeirian quaerendum pro in, no vix utinam dolore sadipscing. An cum case wisi, in case labitur expetendis per, eu sea populo adolescens dissentiet. No vivendo assueverit usu, ceteros repudiare ad vim. Ius facer integre vituperatoribus ei, duo ne vidit brute delicatissimi. Eos no dicta deseruisse, dicta sapientem expetendis mel et.\r\n\r\nMei esse denique fabellas no, eu has solum definitionem. Cu laoreet intellegam inciderint eos. Per ea meliore mandamus voluptatibus, at sumo propriae suscipiantur nam. His molestiae comprehensam ut, cum simul temporibus eu. Nam aliquip maiestatis scribentur in.\r\n\r\nAd est cetero reprimique. Alienum oporteat forensibus at his, ne vero epicurei sit, duo ad ceteros oporteat. No utroque torquatos vix, ullum reformidans et est, ea accumsan copiosae sit. Eam consul volumus ut, vim et posse viderer fierent, te est sumo mundi tation. Cum atomorum tractatos forensibus in.\r\n\r\nAt ornatus nostrum vix. Mel elaboraret definitiones ea. No ancillae facilisi nam, te latine aperiam alterum sed. Est fastidii singulis gubergren ex, melius definitiones his in, his id minim animal prompta. Causae audiam molestie has et. In vero dicunt mel, mazim munere maluisset ei sit, sea persius imperdiet ea.\r\n\r\nAt aperiam lucilius vel, etiam munere scaevola pro no. Ei quo mucius meliore, sed ne equidem dignissim. At congue ponderum sit, purto electram ius ad. Te has euismod admodum appellantur, per ea populo adipisci consequat. Ius meis dolorem scriptorem eu, augue legere an sit. Clita everti concludaturque no has.', 'privacy-policy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `category` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `tags` varchar(400) NOT NULL,
  `date` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `imagealt` varchar(300) NOT NULL,
  `metatitle` varchar(300) NOT NULL,
  `metadesc` varchar(400) NOT NULL,
  `metatags` varchar(400) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `homepage` varchar(300) NOT NULL,
  `sep` varchar(200) NOT NULL,
  `siteurl` varchar(500) NOT NULL,
  `metatags` varchar(500) NOT NULL,
  `metadesc` varchar(100) NOT NULL,
  `metauser` varchar(300) NOT NULL,
  `copyright` varchar(300) NOT NULL,
  `imagedir` varchar(400) NOT NULL,
  `headercode` longtext NOT NULL,
  `footercode` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `homepage`, `sep`, `siteurl`, `metatags`, `metadesc`, `metauser`, `copyright`, `imagedir`, `headercode`, `footercode`) VALUES
(1, 'My Blog', '|', 'http://127.0.0.1/blog/', 'my blog, music, videos', 'home of unlimited gists and entertainments', 'foster', 'My Blog', 'http://127.0.0.1/blog/static/', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `fullname` varchar(400) NOT NULL,
  `password` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
