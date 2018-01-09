-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 31, 2017 at 02:18 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `passcrypter_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `Credentials`
--

CREATE TABLE `Credentials` (
  `CredentialsId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `SiteName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tag` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iv` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Domain` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Credentials`
--

INSERT INTO `Credentials` (`CredentialsId`, `UserId`, `SiteName`, `username`, `email`, `password`, `Tag`, `iv`, `Domain`) VALUES
(8, 2, '', '', 'email', '', '', '', ''),
(9, 2, '', '', 'email', '', 'asd', '', ''),
(10, 2, '', '', 'email', '', 'asdasd', '', ''),
(11, 2, '', '', 'email', '', 'asdasdasd', '', ''),
(12, 2, '', '', 'email', '', 'asdasd', '', ''),
(13, 2, 'facebook', 'mousss1', 'email', 'asdasdasd', 'social', '', ''),
(14, 2, 'twitter', '', 'email', '', 'social', '', ''),
(15, 10, '', '{X*Â¢Â·Â‚Â¸ÂžÃ‰:OsÂ', 'email', '{X*Â¢Â·Â‚Â¸ÂžÃ‰:OsÂ', 'Other', '47901081303c25865a409a2f107b123d', ''),
(16, 10, '', 'QZÂ¼ÂµÃ‰%Ãƒ9Â³Ã', 'email', 'QZÂ¼ÂµÃ‰%Ãƒ9Â³Ã', 'Social', '196918af0fb535074982f19fcdc178a3', ''),
(17, 0, '', 'vÃƒ`Â¨uÂŸ/Â—Ã·&Ã¾Âœ', 'email', 'vÃƒ`Â¨uÂŸ/Â—Ã·&Ã¾Âœ', 'Social', 'd3d85092a6ff71522dbbbbd0ac332627', ''),
(18, 0, '', 'qÂ¢,Ã—Ã¢ Ã™ÃžVÂ›RÃ¯Â', 'email', 'qÂ¢,Ã—Ã¢ Ã™ÃžVÂ›RÃ¯Â', 'Social', 'bf27b767a2c00c9a947e00b5d02cb06c', ''),
(19, 0, '', '7Ã±Â³ÃµÂ¹Ã§rÃŠSRW', 'email', '7Ã¦Â˜8ÃŒ Ã¶BCÃœÂ', 'Social', '90b8a6930629e8f6542fc5cc3b427146', ''),
(20, 0, '', 'Ã½Â¸Ã„YÂ¬ÃœÃš$ÃÃ½Â', 'email', 'Ã½Â¸xÃ“.Ã²Ã™=Â 0Â ', 'Social', 'a387e2789d9f419dc1f5fe408d908b94', ''),
(21, 0, '', 'Â§^|dÂ™Ã gIxTÂ–ÂƒÂ', 'email', 'Â§^|dÂ™Ã gIxTÂ–ÂƒÂ', 'Social', '2c38cb85b5e1f7301cd736ea09c81c32', ''),
(22, 0, '', 'Â”ÂŽT?JÂÂ¥"ÂˆDÂ¹', 'email', 'Â”ÂŽT?JÂÂ¥"ÂˆDÂ¹', 'Social', 'c1447b23519c74f9e1a3bb1e8046fa51', ''),
(23, 0, '', 'Â¿Â›G! Ã©/ULÃŸÃÂ´uR', 'email', 'Â¿Â›G! Ã©/ULÃŸÃÂ´uR', 'Social', '7d5f6834f529a621ff208539dbbd6b5d', ''),
(24, 0, '', 'zÂšÂ¶Ã·ÃŽxwVÃ§Â®2Ã’Â', 'email', 'zÂšÂ¶Ã·ÃŽxwVÃ§Â®2Ã’Â', 'asd', '9fa062d6af9efbd31896df52105b8b4a', ''),
(25, 0, '', '~Â–Ã¾Ã¡Ã…Â¦Ãµ\r\nÃ–qÃ', 'email', '~Â–Ã¾Ã¡Ã…Â¦Ãµ\r\nÃ–qÃ', 'asd', '99a4f1c169bfc0b4944d5716f75f4c7b', ''),
(26, 14, 'asd', 'kÃ‡Â³UÂ­Ã‡Ã»Ã¿ÃŽCÂ—', 'email', 'kÃ‡Â³UÂ­Ã‡Ã»Ã¿ÃŽCÂ—', 'asd', '299d0ab8e80ed980ca718f36c2298f91', ''),
(27, 14, 'asd', 'Â*h,Ã4ÂŸÂ“|Â’5gÃ', 'Â*h,Ã4ÂŸÂ“|Â’5gÃ', 'Â*h,Ã4ÂŸÂ“|Â’5gÃ', 'asd', 'e831baa0cd56059de87468781371a0af', ''),
(28, 14, 'facebook.com', 'TÃ6CN\0OÂ©Â¯ÂˆF;Ã¼', 'TÃ6CN\0OÂ©Â¯ÂˆF;Ã¼', 'TÃ6CN\0OÂ©Â¯ÂˆF;Ã¼', 'Social', '81eac39047f1d54ee71623bded854329', ''),
(29, 14, 'twitter.com', 'Ã¡Ã·Ã§Â’gÂŒ Â«R]>Â©Â', 'Ã¡Ã·Ã§Â’gÂŒ Â«R]>Â©Â', 'Ã¡Ã·Ã§Â’gÂŒ Â«R]>Â©Â', 'asd', 'b33df4e74de0ef8ab4a2a79a25b4a154', 'twitter');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserId` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserId`, `email`, `password`) VALUES
(1, 'moussaa1', '1qwer%'),
(2, 'mousss1', '1qwer%'),
(3, 'mousss2', '1qwer%'),
(4, 'mousss6', '1qwer%'),
(5, 'mousss7', '1qwer%'),
(6, 'mousss8', '1qwer%'),
(7, 'mousss9', '1qwer%'),
(8, 'mousss10', '1qwer%'),
(9, 'asdasd@gmail.com', ''),
(14, 'mail3@gmail.com', 'ed92e4c7e54e3f4a29d8041ec93124bd3c1ec4825701cac42b3fffaf0bd7120a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Credentials`
--
ALTER TABLE `Credentials`
  ADD PRIMARY KEY (`CredentialsId`),
  ADD UNIQUE KEY `CredentialsId` (`CredentialsId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserId` (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Credentials`
--
ALTER TABLE `Credentials`
  MODIFY `CredentialsId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;