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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MEDIA`
--

LOCK TABLES `MEDIA` WRITE;
/*!40000 ALTER TABLE `MEDIA` DISABLE KEYS */;
INSERT INTO `MEDIA` VALUES (1,'image/jpeg','b0106221-eac5-45b2-a6d5-2b985c83d924.JPG02023-02-02 13:43:43','2023-02-02 12:43:43',66),(2,'','IMG-5720.jpg12023-02-02 13:43:43','2023-02-02 12:43:43',66),(3,'','IMG-5718.jpg22023-02-02 13:43:43','2023-02-02 12:43:43',66),(4,'','IMG-5720.jpg02023-02-02 13:43:51','2023-02-02 12:43:51',67),(5,'','IMG-5720.jpg02023-02-02 13:43:54','2023-02-02 12:43:54',68),(6,'','IMG-5720.jpg02023-02-02 13:44:02','2023-02-02 12:44:02',69),(7,'','IMG-5720.jpg02023-02-02 13:45:14','2023-02-02 12:45:14',70),(8,'image/jpeg','b0106221-eac5-45b2-a6d5-2b985c83d924.JPG02023-02-02 13:45:22','2023-02-02 12:45:22',71),(9,'','IMG-5720.jpg02023-02-02 13:45:46','2023-02-02 12:45:46',72);
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `POST`
--

LOCK TABLES `POST` WRITE;
/*!40000 ALTER TABLE `POST` DISABLE KEYS */;
INSERT INTO `POST` VALUES (1,'commentaire','2023-02-02',NULL),(2,'commentaire','2023-02-02',NULL),(3,'commentaire','2023-02-02',NULL),(4,'commentaire','2023-02-02',NULL),(5,'commentaire\r\n','2023-02-02',NULL),(6,'commentaire\r\n','2023-02-02',NULL),(7,'commentaire','2023-02-02',NULL),(8,'commentaire','2023-02-02',NULL),(9,'commentaire','2023-02-02',NULL),(10,'commentaire','2023-02-02',NULL),(11,'commentaire 4','2023-02-02',NULL),(12,'commentaire444','2023-02-02',NULL),(13,'comm','2023-02-02',NULL),(14,'ccc','2023-02-02',NULL),(15,'sdsdf','2023-02-02',NULL),(16,'dsfsf','2023-02-02',NULL),(17,'dddd','2023-02-02',NULL),(18,'<yx<yx','2023-02-02',NULL),(19,'<yx<yx','2023-02-02',NULL),(20,'adfa','2023-02-02',NULL),(21,'adasd','2023-02-02',NULL),(22,'adasd','2023-02-02',NULL),(23,'as','2023-02-02',NULL),(24,'sfsdfsdf','2023-02-02',NULL),(25,'sfsdfsdf','2023-02-02',NULL),(26,'sfsdfsdf','2023-02-02',NULL),(27,'sfsdfsdf','2023-02-02',NULL),(28,'sfsdfsdf','2023-02-02',NULL),(29,'sfsdfsdf','2023-02-02',NULL),(30,'asdasd','2023-02-02',NULL),(31,'dads','2023-02-02',NULL),(32,'dads','2023-02-02',NULL),(33,'dads','2023-02-02',NULL),(34,'dads','2023-02-02',NULL),(35,'dads','2023-02-02',NULL),(36,'sdsad','2023-02-02',NULL),(37,'sdsad','2023-02-02',NULL),(38,'sdsad','2023-02-02',NULL),(39,'sdsad','2023-02-02',NULL),(40,'sads','2023-02-02',NULL),(41,'sdf','2023-02-02',NULL),(42,'adfadf','2023-02-02',NULL),(43,'sdfdfsf','2023-02-02',NULL),(44,'wqe','2023-02-02',NULL),(45,'wqe','2023-02-02',NULL),(46,'wqe','2023-02-02',NULL),(47,'wqe','2023-02-02',NULL),(48,'wqe','2023-02-02',NULL),(49,'wqe','2023-02-02',NULL),(50,'wqe','2023-02-02',NULL),(51,'wqe','2023-02-02',NULL),(52,'wqe','2023-02-02',NULL),(53,'wqe','2023-02-02',NULL),(54,'lkjj','2023-02-02',NULL),(55,'kgizgzuzuzu','2023-02-02',NULL),(56,'kgizgzuzuzu','2023-02-02',NULL),(57,'kgizgzuzuzu','2023-02-02',NULL),(58,'dsfsdf','2023-02-02',NULL),(59,'ljnkjjhhSDAD','2023-02-02',NULL),(60,'ADFDSF','2023-02-02',NULL),(61,'ADFDSF','2023-02-02',NULL),(62,'ASDASDASD','2023-02-02',NULL),(63,'ASDASDASD','2023-02-02',NULL),(64,'dfgdfg','2023-02-02',NULL),(65,'asdasd','2023-02-02',NULL),(66,'ngjhgu','2023-02-02',NULL),(67,'ékljhuohiu','2023-02-02',NULL),(68,'ékljhuohiu','2023-02-02',NULL),(69,'jkhjui','2023-02-02',NULL),(70,'jkhjui','2023-02-02',NULL),(71,'oui','2023-02-02',NULL),(72,'fasd','2023-02-02',NULL);
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

-- Dump completed on 2023-02-02 14:50:22
