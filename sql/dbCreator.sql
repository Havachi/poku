-- --------------------------------------------------------
-- Host :                       127.0.0.1
-- Server Version:           	8.0.14 - MySQL Community Server - GPL
-- Server OS:                	Win64
-- HeidiSQL Version:            9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export database's structure for poku
CREATE DATABASE IF NOT EXISTS `poku`
/*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `poku`;

/*
-- Primaries Tables
*/

-- Export table's structure of poku. comic
CREATE TABLE IF NOT EXISTS `comic` (
  `id` int unsigned AUTO_INCREMENT NOT NULL,
  `roTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `enTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `jpTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `frTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `synonyms` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `enSynopsis` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `jpSynopsis` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `frSynopsis` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `episodes` tinyint DEFAULT NULL,
  `startAiring` date DEFAULT NULL,
  `endAiring` date DEFAULT NULL,
  `broadcast` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` tinyint DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `premiered` tinyint(2) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roTitle` (`roTitle`),
  UNIQUE KEY `enTitle` (`enTitle`),
  UNIQUE KEY `jpTitle` (`jpTitle`),
  UNIQUE KEY `frTitle` (`frTitle`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- Export table's structure of poku. status
CREATE TABLE IF NOT EXISTS `status` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- Export table's structure of poku. premiered
CREATE TABLE IF NOT EXISTS `premiered` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `FKseason` tinyint unsigned NOT NULL,
  `FKyear` tinyint unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- Export table's structure of poku. season
CREATE TABLE IF NOT EXISTS `season` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `season` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `season` (`season`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- Export table's structure of poku. year
CREATE TABLE IF NOT EXISTS `year` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `year` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `year` (`year`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- Export table's structure of poku. comicType
CREATE TABLE IF NOT EXISTS `comicType` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- Export table's references of poku. premiered
ALTER TABLE comic
ADD FOREIGN KEY (status) REFERENCES status(id);
ADD FOREIGN KEY (premiered) REFERENCES premiered(id);
ADD FOREIGN KEY (type) REFERENCES type(id);

-- Export table's references of poku. users
ALTER TABLE premiered
ADD FOREIGN KEY (FKseason) REFERENCES season(id);
ADD FOREIGN KEY (FKyear) REFERENCES year(id);

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;