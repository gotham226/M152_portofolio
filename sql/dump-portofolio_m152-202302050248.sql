-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: portofolio_m152
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.37-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `MEDIA`
--

DROP TABLE IF EXISTS `MEDIA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MEDIA` (
  `idMedia` int(11) NOT NULL AUTO_INCREMENT,
  `typeMedia` varchar(100) DEFAULT NULL,
  `nomMedia` varchar(100) DEFAULT NULL,
  `dateDeCreation` timestamp NULL DEFAULT NULL,
  `idPost` int(11) NOT NULL,
  PRIMARY KEY (`idMedia`),
  KEY `MEDIA_FK_1` (`idPost`),
  CONSTRAINT `MEDIA_FK_1` FOREIGN KEY (`idPost`) REFERENCES `POST` (`idPost`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MEDIA`
--

LOCK TABLES `MEDIA` WRITE;
/*!40000 ALTER TABLE `MEDIA` DISABLE KEYS */;
INSERT INTO `MEDIA` VALUES (218,'image/jpeg','halamadrid.jpg02023-02-05 01:31:45.jpg','2023-02-05 00:31:45',193),(219,'image/jpeg','fcaa18ec-cuántos-batman.jpg02023-02-05 01:32:52.jpg','2023-02-05 00:32:52',194);
/*!40000 ALTER TABLE `MEDIA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `POST`
--

DROP TABLE IF EXISTS `POST`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `POST` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(100) DEFAULT NULL,
  `dateDeCreation` date DEFAULT NULL,
  `dateDeModification` date DEFAULT NULL,
  PRIMARY KEY (`idPost`),
  KEY `POST_idPost_IDX` (`idPost`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `POST`
--

LOCK TABLES `POST` WRITE;
/*!40000 ALTER TABLE `POST` DISABLE KEYS */;
INSERT INTO `POST` VALUES (193,'Hala Madrid !','2023-02-05',NULL),(194,'Mon nouveau fond d\'écran !','2023-02-05',NULL);
/*!40000 ALTER TABLE `POST` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'portofolio_m152'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-05  2:48:49
