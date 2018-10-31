-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2018 at 09:04 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categori_id` int(11) NOT NULL AUTO_INCREMENT,
  `categori_name` varchar(300) NOT NULL,
  `categori_yazi` varchar(1100) NOT NULL,
  PRIMARY KEY (`categori_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categori_id`, `categori_name`, `categori_yazi`) VALUES
(10, 'Sports', 'Sport is Life'),
(9, 'Politica ', 'You know that The Earth rotates these attribute'),
(11, 'Science', 'Science is improving in the world.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `commen_added` varchar(200) NOT NULL,
  `comment_eposta` varchar(200) NOT NULL,
  `comment_mesaj` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_topic_id` int(11) NOT NULL DEFAULT '0',
  `comment_per` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `commen_added`, `comment_eposta`, `comment_mesaj`, `comment_date`, `comment_topic_id`, `comment_per`) VALUES
(1, 'ilqar', 'tcr@gmail.com', 'The Interesting Engineering -Computer Engineering', '2018-05-07 11:03:12', 1, 1),
(2, ' ilqar', 'Murad@gmail.com', 'Real always win with Referee', '2018-05-07 11:30:19', 1, 1),
(3, 'ilqar', 'ilkombim@gmail.com', 'Liverpool are Champion', '2018-05-07 10:59:00', 1, 1),
(4, 'ilqa', 'kk@gmail.comj', 'We work  with useful jobs for world', '2018-05-07 10:59:00', 1, 0),
(5, 'ilqar', 'Men@gmail.com', 'The Progress of World is depend on countries', '2018-05-07 10:59:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mesajlar`
--

DROP TABLE IF EXISTS `mesajlar`;
CREATE TABLE IF NOT EXISTS `mesajlar` (
  `mesaj_id` int(11) NOT NULL AUTO_INCREMENT,
  `mesaj_head` varchar(200) NOT NULL,
  `mesaj_yazi` varchar(1000) NOT NULL,
  `mesaj_send` varchar(200) NOT NULL,
  `mesaj_whom` int(11) NOT NULL DEFAULT '0',
  `mesaj_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mesaj_read` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mesaj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesajlar`
--

INSERT INTO `mesajlar` (`mesaj_id`, `mesaj_head`, `mesaj_yazi`, `mesaj_send`, `mesaj_whom`, `mesaj_date`, `mesaj_read`) VALUES
(10, 'Referee', 'Why do we always lose referee..? ', 'John', 1, '2018-05-06 21:13:51', 0),
(11, 'Referee', 'Why do we always lose referee..? ', 'John', 1, '2018-05-06 21:14:10', 0),
(12, 'Voleyball', 'We play....', 'Jeremy', 1, '2018-05-06 21:15:40', 0),
(13, 'Job', 'What do you do', 'ilqar', 4, '2018-05-06 21:36:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_head` varchar(250) NOT NULL,
  `topic_yazi` text NOT NULL,
  `topic_added` varchar(250) NOT NULL,
  `topic_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic_catagory` int(11) NOT NULL DEFAULT '0',
  `topic_condi` int(11) NOT NULL DEFAULT '0',
  `topic_hit` int(11) NOT NULL DEFAULT '0',
  `topic_resim` varchar(400) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_head`, `topic_yazi`, `topic_added`, `topic_date`, `topic_catagory`, `topic_condi`, `topic_hit`, `topic_resim`) VALUES
(28, 'EPL Records', 'Manchester City have won this season\'s Premier League title in swaggering style and can now chase further records in their remaining games.\r\n\r\nHere we looks at the landmarks already achieved by Pep Guardiola\'s side and those still within their sights.\r\n\r\nRecords already achieved\r\n\r\nEarliest title win\r\n\r\nCity missed out on a new record with defeat to Manchester United but matched their neighbours\' previous mark from 2000-01 by winning the league with five games to go.\r\n\r\nConsecutive victories', 'ilqar', '2018-05-27 13:59:00', 10, 1, 0, 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/MC-Shahter_%282%29.jpg/350px-MC-Shahter_%282%29.jpg'),
(29, 'Study in Europe', '\r\n Scholarships to Study in Europe main image\r\nIf you’re a prospective international student planning to study in Europe at bachelor’s, master’s or doctoral level, you might be eligible for a scholarship.\r\n\r\nAdvertisement\r\nUK scholarships are listed in an article all of their own, as are scholarships for Germany, scholarships for Russia, scholarships for Eastern Europe and scholarships to study in the Nordic countries.\r\n\r\nScroll down the list below for a range of other scholarships to study in Europe…\r\n\r\nTo study anywhere in Europe:\r\nErasmus Mundus Scholarships – Initiative led by the European Commission to provide funding for students all over the world to study in Europe at selected institutions.\r\nGoEuro European Study Abroad Scholarship – 10 individual scholarships of €2,000 for students enrolled in any eligible university in Europe, as well as two €500 Instagram prizes.', 'ilqar', '2018-05-07 10:59:00', 11, 1, 0, 'https://www.study.eu/assets/study-eu_logo-ee9afe0c98ee9ac266f676d5dcb967023df14f95661b91c7812bef38a3b0c03a.png'),
(30, 'Turkey is preparing for elections', 'The Turkish president announced that parliamentary and presidential elections, originally scheduled for November 2019, will now be held on 24 June, meaning a new political system that will increase the powers of the president will take effect a year early. \r\n\r\nTurkey is switching from a parliamentary system to a presidential one, abolishing the office of the prime minister and decreasing the powers of the parliament, following a narrowly approved referendum last year. The changes take effect with the next election.\r\n\r\n', 'ilqar', '2018-05-07 11:30:19', 9, 1, 0, 'https://i.ytimg.com/vi/Z_NQr90UpD8/hqdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `uye_id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_name` varchar(200) NOT NULL,
  `uye_password` varchar(200) NOT NULL,
  `uye_eposta` varchar(200) NOT NULL,
  `uye_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uye_order` int(11) NOT NULL DEFAULT '0',
  `uye_onay` int(11) NOT NULL DEFAULT '0',
  `uye_about` varchar(500) NOT NULL,
  PRIMARY KEY (`uye_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_name`, `uye_password`, `uye_eposta`, `uye_date`, `uye_order`, `uye_onay`, `uye_about`) VALUES
(12, 'Leo', '202cb962ac59075b964b07152d234b70', 'ilqar95ilqar@box.az', '2018-05-17 22:27:11', 0, 0, ''),
(4, 'ilqar', '944626adf9e3b76a3919b50dc0b080a4', 'kerim@gmail.com', '2018-05-05 21:47:11', 1, 1, 'Sen a ne var'),
(9, 'Murad', '81dc9bdb52d04dc20036dbd8313ed055', 'ilqarhu@gmail.com', '2018-05-07 11:30:19', 0, 0, '  '),
(13, 'Gerson', '202cb962ac59075b964b07152d234b70', 'huseynli-95@mail.ru', '2018-05-07 11:30:19', 0, 0, 'I\'m from Portogulia  '),
(11, 'John', '81dc9bdb52d04dc20036dbd8313ed055', 'huseynli-95@mail.ru', '2018-05-07 11:03:12', 0, 1, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
