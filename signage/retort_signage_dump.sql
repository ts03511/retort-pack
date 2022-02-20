-- MySQL dump 10.16  Distrib 10.2.19-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: retort_signage
-- ------------------------------------------------------
-- Server version	10.2.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `beer_menu`
--

DROP TABLE IF EXISTS `beer_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beer_menu` (
  `no` int(1) NOT NULL,
  `brewery1` varchar(100) DEFAULT NULL,
  `brewery2` varchar(100) DEFAULT NULL,
  `beername1` varchar(100) DEFAULT NULL,
  `beername2` varchar(100) DEFAULT NULL,
  `locality` varchar(100) DEFAULT NULL,
  `style1` varchar(100) DEFAULT NULL,
  `style2` varchar(100) DEFAULT NULL,
  `abv` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beer_menu`
--

LOCK TABLES `beer_menu` WRITE;
/*!40000 ALTER TABLE `beer_menu` DISABLE KEYS */;
INSERT INTO `beer_menu` VALUES (1,'KIRIN BEER','','一番搾り','','生麦','ピルスナー','','5.0'),(2,'KIRIN BEER','','一番搾り黒生','','岡山県','ダークラガー','','5.0'),(3,'TK Brewing','','Behid The Cloud','','川崎市','ニューイングランドIPA','','6.5'),(4,'YOKOHAMA','BAY BREWING','ベイヴァイスボック','','戸塚市','ヴァイツェンボック','','7.0'),(5,'Be Easy','Brewing','あれねIPA','test','青森県','IPA','','7.2'),(6,'南信州ビール','aaa','ヤマソーホップ','','長野県','フルーツビール','','9.0'),(7,'','','','','','','','');
/*!40000 ALTER TABLE `beer_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beer_menu_tran`
--

DROP TABLE IF EXISTS `beer_menu_tran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beer_menu_tran` (
  `no` int(1) NOT NULL,
  `brewery1` varchar(100) DEFAULT NULL,
  `brewery2` varchar(100) DEFAULT NULL,
  `beername1` varchar(100) DEFAULT NULL,
  `beername2` varchar(100) DEFAULT NULL,
  `locality` varchar(100) DEFAULT NULL,
  `style1` varchar(100) DEFAULT NULL,
  `style2` varchar(100) DEFAULT NULL,
  `abv` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beer_menu_tran`
--

LOCK TABLES `beer_menu_tran` WRITE;
/*!40000 ALTER TABLE `beer_menu_tran` DISABLE KEYS */;
INSERT INTO `beer_menu_tran` VALUES (1,'KIRIN BEER','','一番搾り','','生麦','ピルスナー','','5.0'),(2,'KIRIN BEER','','一番搾り黒生','','岡山県','ダークラガー','','5.0'),(3,'TK Brewing','','Behid The Cloud','','川崎市','ニューイングランドIPA','','6.5'),(4,'YOKOHAMA','BAY BREWING','ベイヴァイスボック','','戸塚市','ヴァイツェンボック','','7.0'),(5,'Be Easy','Brewing','あれねIPA','test','青森県','IPA','','7.2'),(6,'南信州ビール','aaa','ヤマソーホップ','','長野県','フルーツビール','','9.0'),(7,'','','','','','','','');
/*!40000 ALTER TABLE `beer_menu_tran` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-30 16:40:52
