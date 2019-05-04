CREATE DATABASE  IF NOT EXISTS `local_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `local_db`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: local_db
-- ------------------------------------------------------
-- Server version	5.6.42

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
-- Table structure for table `player_spin`
--

DROP TABLE IF EXISTS `player_spin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_spin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `spin_date` datetime DEFAULT NULL,
  `bet_amount` int(11) DEFAULT NULL,
  `win_amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_player_id` (`player_id`),
  KEY `idx_spin_date` (`spin_date`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_spin`
--

LOCK TABLES `player_spin` WRITE;
/*!40000 ALTER TABLE `player_spin` DISABLE KEYS */;
INSERT INTO `player_spin` VALUES (1,1,'2019-03-01 10:00:00',500000,0),(2,1,'2019-03-01 10:00:01',500000,100000),(3,1,'2019-03-01 10:00:02',500000,250000),(4,2,'2019-03-01 10:00:03',500000,0),(5,2,'2019-03-01 10:00:04',400000,12000000),(6,1,'2019-03-02 10:00:03',120000,40000),(7,2,'2019-03-02 10:00:05',120000,40000),(8,3,'2019-03-02 11:00:07',50000,1000000);
/*!40000 ALTER TABLE `player_spin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scheduled_task`
--

DROP TABLE IF EXISTS `scheduled_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scheduled_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `execution_date` datetime NOT NULL,
  `expirtaion_date` datetime DEFAULT NULL,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `task_type_id` int(11) DEFAULT '1',
  `last_handled_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_execution_date` (`execution_date`),
  KEY `fkey_task_state_idx` (`state_id`),
  KEY `fkey_task_type_idx` (`task_type_id`),
  CONSTRAINT `fkey_task_type` FOREIGN KEY (`task_type_id`) REFERENCES `task_type` (`task_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scheduled_task`
--

LOCK TABLES `scheduled_task` WRITE;
/*!40000 ALTER TABLE `scheduled_task` DISABLE KEYS */;
INSERT INTO `scheduled_task` VALUES (1,'2019-01-01 00:00:00','2022-01-01 00:00:00',0,1,0);
/*!40000 ALTER TABLE `scheduled_task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_state`
--

DROP TABLE IF EXISTS `task_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_state` (
  `state_id` int(11) NOT NULL,
  `state_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_state`
--

LOCK TABLES `task_state` WRITE;
/*!40000 ALTER TABLE `task_state` DISABLE KEYS */;
INSERT INTO `task_state` VALUES (-1,'error'),(0,'pending'),(1,'in_progress'),(2,'completed');
/*!40000 ALTER TABLE `task_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_type`
--

DROP TABLE IF EXISTS `task_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_type` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_type`
--

LOCK TABLES `task_type` WRITE;
/*!40000 ALTER TABLE `task_type` DISABLE KEYS */;
INSERT INTO `task_type` VALUES (0,'unknown'),(1,'aggregate_spins');
/*!40000 ALTER TABLE `task_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-04 16:57:45
