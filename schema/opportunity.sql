-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2015 at 01:11 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `hostid`, `name`, `startdate`, `enddate`, `addr1`, `addr2`, `city`, `state`, `zip`, `islocal`, `isvirtual`, `ticketprice`, `description`) VALUES
(1, 3, 'Hackathon Raffle', '2015-10-10', '2015-10-11', '1122 east cool drive', NULL, 'tempe', 'az', 85282, 1, 1, '5.00', 'An raffle to raise money for future hackathons'),
(2, 3, 'Diamond Backs Game Raffle', '2015-10-10', '2015-10-11', '1111 e awesome dr', '', 'tempe', 'az', 85282, 0, 0, '100.00', 'raffle event description'),
(3, 3, 'American Association of Cancer Raffle ', NULL, NULL, '1905 E. Greenway Dr.', '', 'Tempe', 'Arizona', 85282, NULL, NULL, '100.00', 'Raise money'),
(4, 3, 'Soccer team raffle', NULL, NULL, '1905 E. Greenway Dr.', '', 'Tempe', 'Arizona', 85282, NULL, NULL, '200.00', 'A raffle to raise money for soccer game'),
(5, 3, 'Baseball team raffle', NULL, NULL, '2148 S. 90th Glen', '', 'Tolleson', 'Arizona', 85353, NULL, NULL, '200.00', 'A raffle to raise money for  baseball game'),
(6, 3, 'College fund raffle', NULL, NULL, '1905 E. Greenway Dr.', '', 'Tempe', 'Arizona', 85282, NULL, NULL, '100.00', 'A raffle to earn money for college fund'),
(7, 3, 'Raffle name', NULL, NULL, '619 buckners ln', '', 'Mineral', 'Arizona', 89789, NULL, NULL, '10.00', 'Raffle description');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `eventid`, `name`, `description`, `pathtopic`, `storeprice`) VALUES
(1, 1, 'Macbook Pro', 'macbook pros are cool', 'http://store.storeimages.cdn-apple.com/4735/as-images.apple.com/is/image/AppleInc/aos/published/images/M/AC/MACBOOKPRO/MACBOOKPRO?wid=1200&hei=630&fmt=jpeg&qlt=95&op_sharpen=0&resMode=bicub&op_usm=0.5,0.5,0,0&iccEmbed=0&layer=comp&.v=1425922618098', '100.00'),
(2, 1, 'iPhone', 'an iphone 6s', 'http://cdn0.vox-cdn.com/uploads/chorus_asset/file/798874/DSCF1913.0.jpg', '100.00'),
(3, 1, 'Car', 'Car description', 'http://media.caranddriver.com/images/media/51/dissected-lotus-based-infiniti-emerg-e-sports-car-concept-top-image-photo-451994-s-original.jpg', '100.00'),
(12, 1, 'House', 'A house for raffle', 'http://o.homedsgn.com/wp-content/uploads/2013/02/a-house-19-800x548.jpg', '100000.00');

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
('1H6u9vkAPATHTKqbI6p3SeJRzYo8zdLR3mJvVirM', 9, 1475280000),
('2z5gyXVVb3xdmpPfAwwoCC9urfN6pexY6FWdJPeK', 12, 1475280000),
('CROSvU6BfhnmyO49zJ3FDMEvy5usDEdaOvHdg45V', 4, 1475280000),
('DijSDlZEuVgJB4wy0UjN04zdhPravvcUcTIcoqsf', 10, 1475280000),
('iamalex', 2, 1444602834),
('iamgod', 1, 1444602834),
('iamphil', 3, 1444602834),
('N7dBzwqn4FF1eRcFLiCz6FE93VZxQZqH7kjEgpHO', 13, 1475280000),
('NSDHPgCn7seOwRx1vIUOVnBKSxVZl17gtQBtnMuc', 15, 1475280000),
('PxBipEEk17jJpNd4HAqSsPlkpxnAVJvati2LV0Z0', 11, 1475280000),
('Q4CnRHPNeySVwnlOuznWs6QSP8bTgadSCtBYPVok', 17, 1475280000),
('QtBT98yWP4SN19RuVHeqIVYmFVXDKqdypXeDdg1j', 16, 1475280000),
('Uth69WJU1eSPBsMFSy9U5QTptpKYlbmdoeh5yInl', 8, 1475280000),
('uxSIBJUWMxgxi2I4NNKzdGR93AyM6HLFeDxqmkD0', 14, 1475280000),
('VFp4B8Cf4aya1Yu64jcL5HzT2QhL5bDVlX3K7thw', 6, 1475280000),
('xjflBEuw1z58epNdZX7wKcgP1YwBdz6It4UNaZip', 5, 1475280000),
('zis9DVotLppy3qhW7MuqMSwQKtbTzoevwsUZUFBt', 7, 1475280000);

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
('3zdP5yHuBe0VHkXBkWvd6ULuSrwKKLtzzQQgAOv4', 1445166725, 'DijSDlZEuVgJB4wy0UjN04zdhPravvcUcTIcoqsf'),
('cXDHKq0c9WdmY9bjOjPWm2oH9vvUIhHaVdy2WLiY', 1445141591, 'zis9DVotLppy3qhW7MuqMSwQKtbTzoevwsUZUFBt'),
('E9KbxzulCdpeFMnIZj55Vc9YoRGAAWD4si2jtNr7', 1445170430, 'PxBipEEk17jJpNd4HAqSsPlkpxnAVJvati2LV0Z0'),
('FvlNN6FthivxMJhFfM2veBK3mcjX5SmEJIuZvh4x', 1445177809, 'N7dBzwqn4FF1eRcFLiCz6FE93VZxQZqH7kjEgpHO'),
('gltvT4RgIPtwmAu4g6iseM2uS0rfuteZaLmTJnXO', 1445178349, 'Q4CnRHPNeySVwnlOuznWs6QSP8bTgadSCtBYPVok'),
('hzLs7fboIS0UqFvcg8loKO6aXKkJMT2x2Zs2fLuw', 1445124589, 'xjflBEuw1z58epNdZX7wKcgP1YwBdz6It4UNaZip'),
('n3XUlVDSLgCpk8jSoalqrFk1c8bPQW1Nhour2EI5', 1445124674, 'VFp4B8Cf4aya1Yu64jcL5HzT2QhL5bDVlX3K7thw'),
('oIFdPBlfiFG87mZoK1esycSq7N10B8kokQ1F1wIr', 1445178237, 'QtBT98yWP4SN19RuVHeqIVYmFVXDKqdypXeDdg1j'),
('OYThKi4AkgFBDdQo8ypVZyitAnPezAP67vYllKiH', 1445177849, 'uxSIBJUWMxgxi2I4NNKzdGR93AyM6HLFeDxqmkD0'),
('sjG93Cgo3QYJPCaGby35UUj3wBKQCmwKMXQjM8b2', 1445145778, 'Uth69WJU1eSPBsMFSy9U5QTptpKYlbmdoeh5yInl'),
('sw5vuSa2orlLnWyloLVqS13ElVvOkyF0NU7Qrpoj', 1445122911, 'CROSvU6BfhnmyO49zJ3FDMEvy5usDEdaOvHdg45V'),
('Tt4TjKH9SZXvZy5nEGG9kvPgYbUylLA6L81o4Ej2', 1445177526, '2z5gyXVVb3xdmpPfAwwoCC9urfN6pexY6FWdJPeK'),
('z8p7YoJgaj7Vl7EzMmZsCbYwTLRUfPyCSVz5BSw1', 1445177867, 'NSDHPgCn7seOwRx1vIUOVnBKSxVZl17gtQBtnMuc'),
('ziSFPriWo9AEPDvAzzLO96Vp7rFn8jtIPIcbKoSB', 1445145953, '1H6u9vkAPATHTKqbI6p3SeJRzYo8zdLR3mJvVirM');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_sessions`
--

INSERT INTO `oauth_sessions` (`id`, `owner_type`, `owner_id`, `client_id`, `client_redirect_uri`) VALUES
(1, 'client', 'testclient', 'testclient', NULL),
(2, 'user', '1', 'testclient', NULL),
(3, 'user', '2', 'testclient', NULL),
(4, 'user', '1', 'testclient', NULL),
(5, 'user', '3', 'testclient', NULL),
(6, 'user', '3', 'testclient', NULL),
(7, 'user', '3', 'testclient', NULL),
(8, 'user', '3', 'testclient', NULL),
(9, 'user', '3', 'testclient', NULL),
(10, 'user', '3', 'testclient', NULL),
(11, 'user', '3', 'testclient', NULL),
(12, 'user', '3', 'testclient', NULL),
(13, 'user', '3', 'testclient', NULL),
(14, 'user', '3', 'testclient', NULL),
(15, 'user', '3', 'testclient', NULL),
(16, 'user', '3', 'testclient', NULL),
(17, 'user', '3', 'testclient', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ordernumber`, `ticketquantity`) VALUES
(1, '1sdfjshdjksdh', 1),
(2, 'jkhkjhkjhk', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `eventid`, `name`, `email`, `phone`, `orderid`) VALUES
(2, 1, 'Jacob Parra', 'jacob@gmail.com', '6232226677', 1),
(3, 1, 'Armand', 'armand@gmail.com', '6232226677', 1),
(4, 1, 'Omar Reyes', 'omar@gmail.xom', '1112226666', 1),
(5, 1, 'Carlos Reyes', 'carlos@gmail.com', '8882229929', 1),
(6, 1, 'Lucy Reyes', 'lucy@gmail.com', '9182941828', 1),
(7, 1, 'Bob guys', 'bob@gmail.com', '9228872878', 1),
(8, 1, 'Lola Keys', 'lola@gmail.com', '9281838288', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL,
  `participantid` int(11) DEFAULT NULL,
  `eventid` int(11) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `confirmation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `participantid`, `eventid`, `orderid`, `confirmation`) VALUES
(2, 2, 1, 1, 'TUUtcKQTZu'),
(3, 2, 1, 1, '0480392325'),
(4, 2, 1, 1, '8203244902');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

DROP TABLE IF EXISTS `winners`;
CREATE TABLE IF NOT EXISTS `winners` (
  `id` int(11) NOT NULL,
  `itemid` int(11) DEFAULT NULL,
  `participantid` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

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
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `participantid_idxfk` (`participantid`),
  ADD KEY `eventid_idxfk_2` (`eventid`),
  ADD KEY `orderid_idxfk_1` (`orderid`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `hosts`
--
ALTER TABLE `hosts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `oauth_session_scopes`
--
ALTER TABLE `oauth_session_scopes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
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
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`participantid`) REFERENCES `participants` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`eventid`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`);

--
-- Constraints for table `winners`
--
ALTER TABLE `winners`
  ADD CONSTRAINT `winners_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `winners_ibfk_2` FOREIGN KEY (`participantid`) REFERENCES `participants` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
