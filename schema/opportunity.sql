-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2015 at 07:45 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opportunity`
--
CREATE DATABASE IF NOT EXISTS `opportunity` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `opportunity`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `hostid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `addr1` varchar(255) DEFAULT NULL,
  `addr2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `islocal` tinyint(1) DEFAULT NULL,
  `isvirtual` tinyint(1) DEFAULT NULL,
  `ticketprice` decimal(9,2) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `hostid`, `name`, `startdate`, `enddate`, `addr1`, `addr2`, `city`, `state`, `zip`, `islocal`, `isvirtual`, `ticketprice`, `description`) VALUES
(1, 3, 'Hackathon Rafle', '2015-10-10', '2015-10-11', '1122 east cool drive', NULL, 'tempe', 'az', 85282, 1, 1, '5.00', 'An raffle to raise money for future hackathons');

-- --------------------------------------------------------

--
-- Table structure for table `hosts`
--

DROP TABLE IF EXISTS `hosts`;
CREATE TABLE IF NOT EXISTS `hosts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hosts`
--

INSERT INTO `hosts` (`id`, `firstname`, `lastname`, `email`, `phone`, `username`, `password`) VALUES
(3, 'Omar', 'Reyes', 'reyomar80@hotmail.com', '6232366671', 'omar', '$2y$12$Bip.LAVcyNShFfRXIZO./e83kmSka9dCDTkTXvKTdbcs5CnuOjDk2');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `eventid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `pathtopic` varchar(255) DEFAULT NULL,
  `storeprice` decimal(9,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  `expire_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`access_token`, `session_id`, `expire_time`) VALUES
('CROSvU6BfhnmyO49zJ3FDMEvy5usDEdaOvHdg45V', 4, 1475280000),
('iamalex', 2, 1444602834),
('iamgod', 1, 1444602834),
('iamphil', 3, 1444602834),
('VFp4B8Cf4aya1Yu64jcL5HzT2QhL5bDVlX3K7thw', 6, 1475280000),
('xjflBEuw1z58epNdZX7wKcgP1YwBdz6It4UNaZip', 5, 1475280000);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_token_scopes`
--

DROP TABLE IF EXISTS `oauth_access_token_scopes`;
CREATE TABLE IF NOT EXISTS `oauth_access_token_scopes` (
  `id` int(10) unsigned NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_access_token_scopes`
--

INSERT INTO `oauth_access_token_scopes` (`id`, `access_token`, `scope`) VALUES
(1, 'iamgod', 'basic'),
(2, 'iamgod', 'email'),
(3, 'iamgod', 'photo'),
(4, 'iamphil', 'email'),
(5, 'iamalex', 'photo');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `auth_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  `expire_time` int(11) NOT NULL,
  `client_redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_code_scopes`
--

DROP TABLE IF EXISTS `oauth_auth_code_scopes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_code_scopes` (
  `id` int(10) unsigned NOT NULL,
  `auth_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `secret`, `name`) VALUES
('testclient', '', 'Test Client');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_client_redirect_uris`
--

DROP TABLE IF EXISTS `oauth_client_redirect_uris`;
CREATE TABLE IF NOT EXISTS `oauth_client_redirect_uris` (
  `id` int(10) unsigned NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_client_redirect_uris`
--

INSERT INTO `oauth_client_redirect_uris` (`id`, `client_id`, `redirect_uri`) VALUES
(1, 'testclient', 'http://example.com/redirect');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `refresh_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expire_time` int(11) NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`refresh_token`, `expire_time`, `access_token`) VALUES
('hzLs7fboIS0UqFvcg8loKO6aXKkJMT2x2Zs2fLuw', 1445124589, 'xjflBEuw1z58epNdZX7wKcgP1YwBdz6It4UNaZip'),
('n3XUlVDSLgCpk8jSoalqrFk1c8bPQW1Nhour2EI5', 1445124674, 'VFp4B8Cf4aya1Yu64jcL5HzT2QhL5bDVlX3K7thw'),
('sw5vuSa2orlLnWyloLVqS13ElVvOkyF0NU7Qrpoj', 1445122911, 'CROSvU6BfhnmyO49zJ3FDMEvy5usDEdaOvHdg45V');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_scopes`
--

DROP TABLE IF EXISTS `oauth_scopes`;
CREATE TABLE IF NOT EXISTS `oauth_scopes` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_scopes`
--

INSERT INTO `oauth_scopes` (`id`, `description`) VALUES
('basic', 'Basic details about your account'),
('email', 'Your email address'),
('photo', 'Your photo');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_sessions`
--

DROP TABLE IF EXISTS `oauth_sessions`;
CREATE TABLE IF NOT EXISTS `oauth_sessions` (
  `id` int(10) unsigned NOT NULL,
  `owner_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_redirect_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_sessions`
--

INSERT INTO `oauth_sessions` (`id`, `owner_type`, `owner_id`, `client_id`, `client_redirect_uri`) VALUES
(1, 'client', 'testclient', 'testclient', NULL),
(2, 'user', '1', 'testclient', NULL),
(3, 'user', '2', 'testclient', NULL),
(4, 'user', '1', 'testclient', NULL),
(5, 'user', '3', 'testclient', NULL),
(6, 'user', '3', 'testclient', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_session_scopes`
--

DROP TABLE IF EXISTS `oauth_session_scopes`;
CREATE TABLE IF NOT EXISTS `oauth_session_scopes` (
  `id` int(10) unsigned NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `ordernumber` varchar(255) DEFAULT NULL,
  `ticketquantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(11) NOT NULL,
  `eventid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL,
  `participantid` int(11) DEFAULT NULL,
  `eventid` int(11) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `confirmation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

DROP TABLE IF EXISTS `winner`;
CREATE TABLE IF NOT EXISTS `winner` (
  `id` int(11) NOT NULL,
  `itemid` int(11) DEFAULT NULL,
  `participantid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `hostid_idxfk` (`hostid`);

--
-- Indexes for table `hosts`
--
ALTER TABLE `hosts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `eventid_idxfk` (`eventid`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`access_token`),
  ADD KEY `oauth_access_tokens_session_id_foreign` (`session_id`);

--
-- Indexes for table `oauth_access_token_scopes`
--
ALTER TABLE `oauth_access_token_scopes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_token_scopes_access_token_foreign` (`access_token`),
  ADD KEY `oauth_access_token_scopes_scope_foreign` (`scope`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`auth_code`),
  ADD KEY `oauth_auth_codes_session_id_foreign` (`session_id`);

--
-- Indexes for table `oauth_auth_code_scopes`
--
ALTER TABLE `oauth_auth_code_scopes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_code_scopes_auth_code_foreign` (`auth_code`),
  ADD KEY `oauth_auth_code_scopes_scope_foreign` (`scope`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_client_redirect_uris`
--
ALTER TABLE `oauth_client_redirect_uris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`refresh_token`),
  ADD KEY `oauth_refresh_tokens_access_token_foreign` (`access_token`);

--
-- Indexes for table `oauth_scopes`
--
ALTER TABLE `oauth_scopes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_sessions`
--
ALTER TABLE `oauth_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_sessions_client_id_foreign` (`client_id`);

--
-- Indexes for table `oauth_session_scopes`
--
ALTER TABLE `oauth_session_scopes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_session_scopes_session_id_foreign` (`session_id`),
  ADD KEY `oauth_session_scopes_scope_foreign` (`scope`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `eventid_idxfk_1` (`eventid`),
  ADD KEY `orderid_idxfk` (`orderid`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `participantid_idxfk` (`participantid`),
  ADD KEY `eventid_idxfk_2` (`eventid`),
  ADD KEY `orderid_idxfk_1` (`orderid`);

--
-- Indexes for table `winner`
--
ALTER TABLE `winner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `itemid_idxfk` (`itemid`),
  ADD KEY `participantid_idxfk_1` (`participantid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hosts`
--
ALTER TABLE `hosts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_access_token_scopes`
--
ALTER TABLE `oauth_access_token_scopes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `oauth_auth_code_scopes`
--
ALTER TABLE `oauth_auth_code_scopes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_client_redirect_uris`
--
ALTER TABLE `oauth_client_redirect_uris`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `oauth_sessions`
--
ALTER TABLE `oauth_sessions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `oauth_session_scopes`
--
ALTER TABLE `oauth_session_scopes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `winner`
--
ALTER TABLE `winner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`hostid`) REFERENCES `hosts` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `events` (`id`);

--
-- Constraints for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD CONSTRAINT `oauth_access_tokens_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `oauth_access_token_scopes`
--
ALTER TABLE `oauth_access_token_scopes`
  ADD CONSTRAINT `oauth_access_token_scopes_access_token_foreign` FOREIGN KEY (`access_token`) REFERENCES `oauth_access_tokens` (`access_token`) ON DELETE CASCADE,
  ADD CONSTRAINT `oauth_access_token_scopes_scope_foreign` FOREIGN KEY (`scope`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD CONSTRAINT `oauth_auth_codes_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `oauth_auth_code_scopes`
--
ALTER TABLE `oauth_auth_code_scopes`
  ADD CONSTRAINT `oauth_auth_code_scopes_auth_code_foreign` FOREIGN KEY (`auth_code`) REFERENCES `oauth_auth_codes` (`auth_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `oauth_auth_code_scopes_scope_foreign` FOREIGN KEY (`scope`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD CONSTRAINT `oauth_refresh_tokens_access_token_foreign` FOREIGN KEY (`access_token`) REFERENCES `oauth_access_tokens` (`access_token`) ON DELETE CASCADE;

--
-- Constraints for table `oauth_sessions`
--
ALTER TABLE `oauth_sessions`
  ADD CONSTRAINT `oauth_sessions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `oauth_session_scopes`
--
ALTER TABLE `oauth_session_scopes`
  ADD CONSTRAINT `oauth_session_scopes_scope_foreign` FOREIGN KEY (`scope`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `oauth_session_scopes_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`participantid`) REFERENCES `participants` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`eventid`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`);

--
-- Constraints for table `winner`
--
ALTER TABLE `winner`
  ADD CONSTRAINT `winner_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `winner_ibfk_2` FOREIGN KEY (`participantid`) REFERENCES `participants` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
