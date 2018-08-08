# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.20)
# Database: secure_login
# Generation Time: 2014-09-29 15:08:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table friends
# ------------------------------------------------------------

DROP TABLE IF EXISTS `friends`;

CREATE TABLE `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;

INSERT INTO `friends` (`id`, `user_id`, `friend`)
VALUES
	(1,1,2),
	(2,1,3),
	(3,1,4),
	(4,1,5),
	(5,1,6),
	(6,1,7),
	(7,1,8),
	(8,1,9),
	(9,1,10),
	(10,1,11),
	(11,1,12),
	(12,2,3),
	(13,2,4),
	(14,2,5),
	(15,2,6),
	(16,2,7),
	(17,3,4),
	(18,3,5),
	(19,3,6),
	(20,3,8),
	(21,3,10),
	(22,4,5),
	(23,4,6),
	(24,4,12),
	(25,5,6),
	(26,5,7),
	(27,5,8),
	(28,5,9),
	(29,5,10),
	(30,5,11),
	(31,6,7),
	(32,6,8),
	(33,6,9),
	(34,6,10),
	(35,6,11),
	(36,7,8),
	(37,7,9),
	(38,7,10),
	(39,7,11),
	(40,7,12),
	(41,8,10),
	(42,8,11),
	(43,9,12),
	(44,10,12),
	(45,11,12);

/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table login_attempts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `storage_a` int(11) NOT NULL,
  `storage_b` int(11) NOT NULL,
  `status` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;

INSERT INTO `messages` (`id`, `message`, `time`, `user_id`, `receiver`, `storage_a`, `storage_b`, `status`)
VALUES
	(1,'Hey how was your weekend?!',1412002962,4,1,4,1,'unread');

/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `display_name` varchar(60) NOT NULL,
  `profile_image` varchar(120) NOT NULL,
  `status` varchar(250) NOT NULL,
  `type_status` varchar(300) NOT NULL DEFAULT 'stopped',
  `last_seen` int(11) NOT NULL,
  `session_status` varchar(7) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `display_name`, `profile_image`, `status`, `type_status`, `last_seen`, `session_status`, `email`, `password`, `salt`)
VALUES
	(1,'anna','Anna','anna.jpg','at work, can\'t talk','stopped',1412002875,'offline','','',''),
	(2,'albert','Albert Toss','albert.jpg','','stopped',1412002881,'offline','','',''),
	(3,'tracy','Tracy','tracy.jpg','','stopped',1412002888,'offline','','',''),
	(4,'john','John Doe','john.jpg','','stopped',1412003139,'online','test@example.com','00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc','f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef'),
	(5,'mike','Mike Boss','mike.jpg','today I am playing at discowave','stopped',1412002894,'offline','','',''),
	(6,'jane','Jane Doe','jane.jpg','','stopped',1412002908,'offline','','',''),
	(7,'betty','Betty Faces','betty.jpg','','stopped',1412002901,'offline','','',''),
	(8,'carla','Carla J','carla.jpg','','stopped',1408482289,'offline','','',''),
	(9,'jessy','Jessy M','jessy.jpg','','stopped',1408482289,'offline','','',''),
	(10,'sismic','The Sismic','sismic.jpg','','stopped',1412002916,'offline','','',''),
	(11,'mustaf','Mustaf Bo','mustaf.jpg','','stopped',1408898790,'offline','','',''),
	(12,'soap','Soap T','soap.jpg','','stopped',1412002923,'offline','','','');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
