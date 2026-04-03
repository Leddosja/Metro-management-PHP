-- MySQL dump 10.13  Distrib 8.0.30, for macos12 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	5.7.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Viaggio`
--

DROP TABLE IF EXISTS `Viaggio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Viaggio` (
  `idViaggio` int(11) NOT NULL,
  `idStazionePartenza` int(11) NOT NULL,
  `idStazioneArrivo` int(11) NOT NULL,
  `prenotazioneObbligatoria` varchar(45) DEFAULT NULL,
  `promozione` varchar(45) DEFAULT NULL,
  `Treno_idTreno` int(11) NOT NULL,
  PRIMARY KEY (`idViaggio`,`Treno_idTreno`),
  KEY `fk_Viaggio_Treno1_idx` (`Treno_idTreno`),
  CONSTRAINT `fk_Viaggio_Treno1` FOREIGN KEY (`Treno_idTreno`) REFERENCES `Treno` (`idTreno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Viaggio`
--

LOCK TABLES `Viaggio` WRITE;
/*!40000 ALTER TABLE `Viaggio` DISABLE KEYS */;
INSERT INTO `Viaggio` VALUES (1,1,27,'si','10',1),(2,28,49,'si','5',2),(3,50,68,'si','5',3),(4,69,90,'si','5',4),(5,91,102,'no','0',5),(6,103,121,'no','0',6);
/*!40000 ALTER TABLE `Viaggio` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-29 23:28:07
