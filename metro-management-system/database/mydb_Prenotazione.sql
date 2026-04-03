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
-- Table structure for table `Prenotazione`
--

DROP TABLE IF EXISTS `Prenotazione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Prenotazione` (
  `idPrenotazione` int(11) NOT NULL,
  `Utente_matricolaUtente` int(11) NOT NULL,
  `Viaggio_idViaggio` int(11) NOT NULL,
  `Viaggio_Treno_idTreno` int(11) NOT NULL,
  `idStazionePartenza` int(11) DEFAULT NULL,
  `idStazioneArrivo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPrenotazione`,`Utente_matricolaUtente`,`Viaggio_idViaggio`,`Viaggio_Treno_idTreno`),
  KEY `fk_Prenotazione_Utente1_idx` (`Utente_matricolaUtente`),
  KEY `fk_Prenotazione_Viaggio1_idx` (`Viaggio_idViaggio`,`Viaggio_Treno_idTreno`),
  CONSTRAINT `fk_Prenotazione_Utente1` FOREIGN KEY (`Utente_matricolaUtente`) REFERENCES `Utente` (`matricolaUtente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenotazione_Viaggio1` FOREIGN KEY (`Viaggio_idViaggio`, `Viaggio_Treno_idTreno`) REFERENCES `Viaggio` (`idViaggio`, `Treno_idTreno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Prenotazione`
--

LOCK TABLES `Prenotazione` WRITE;
/*!40000 ALTER TABLE `Prenotazione` DISABLE KEYS */;
INSERT INTO `Prenotazione` VALUES (1,1,1,1,3,16),(2,2,2,2,33,24),(960330944,1,1,1,23,24),(1327339042,1,1,1,24,12);
/*!40000 ALTER TABLE `Prenotazione` ENABLE KEYS */;
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
