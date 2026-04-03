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
-- Table structure for table `Stazione`
--

DROP TABLE IF EXISTS `Stazione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Stazione` (
  `idStazione` int(11) NOT NULL,
  `nomeStazione` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Linea_idLinea` int(11) NOT NULL,
  `Viaggio_idViaggio` int(11) NOT NULL,
  `Viaggio_Treno_idTreno` int(11) NOT NULL,
  PRIMARY KEY (`idStazione`,`Linea_idLinea`,`Viaggio_idViaggio`,`Viaggio_Treno_idTreno`),
  KEY `fk_Stazione_Linea_idx` (`Linea_idLinea`),
  KEY `fk_Stazione_Viaggio1_idx` (`Viaggio_idViaggio`,`Viaggio_Treno_idTreno`),
  CONSTRAINT `fk_Stazione_Linea` FOREIGN KEY (`Linea_idLinea`) REFERENCES `Linea` (`idLinea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Stazione_Viaggio1` FOREIGN KEY (`Viaggio_idViaggio`, `Viaggio_Treno_idTreno`) REFERENCES `Viaggio` (`idViaggio`, `Treno_idTreno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Stazione`
--

LOCK TABLES `Stazione` WRITE;
/*!40000 ALTER TABLE `Stazione` DISABLE KEYS */;
INSERT INTO `Stazione` VALUES (1,'Battistini',1,1,1),(2,'Cornelia',1,1,1),(3,'Baldo degli Ubaldi',1,1,1),(4,'Valle Aurelia',1,1,1),(5,'Cipro',1,1,1),(6,'Ottaviano',1,1,1),(7,'Lepanto',1,1,1),(8,'Flaminio',1,1,1),(9,'Spagna',1,1,1),(10,'Barberini',1,1,1),(11,'Repubblica',1,1,1),(12,'Termini',1,1,1),(13,'Vittorio Emanuele',1,1,1),(14,'Manzoni',1,1,1),(15,'San Giovanni',1,1,1),(16,'Re di Roma',1,1,1),(17,'Ponte Lungo',1,1,1),(18,'Furio Camillo',1,1,1),(19,'Colli Albani',1,1,1),(20,'Arco di Travertino',1,1,1),(21,'Porta Furba',1,1,1),(22,'Numidio Quadrato',1,1,1),(23,'Lucio Sestio',1,1,1),(24,'Giulio Agricola',1,1,1),(25,'Sabaugusta',1,1,1),(26,'Cinecittà',1,1,1),(27,'Anagnina',1,1,1),(28,'Laurentina',2,2,2),(29,'EUR Fermi',2,2,2),(30,'EUR Palasport',2,2,2),(31,'EUR Magliana',2,2,2),(32,'Marconi',2,2,2),(33,'Basilica S.Paolo',2,2,2),(34,'Garbatella',2,2,2),(35,'Piramide',2,2,2),(36,'Circo Massimo',2,2,2),(37,'Colosseo',2,2,2),(38,'Cavour',2,2,2),(39,'Termini',2,2,2),(40,'Castro Pretorio',2,2,2),(41,'Policlinico',2,2,2),(42,'Bologna',2,2,2),(43,'Tiburtina Fs',2,2,2),(44,'Quintiliani',2,2,2),(45,'Monti Tiburtini',2,2,2),(46,'Pietralata',2,2,2),(47,'S.Maria del Soccorso',2,2,2),(48,'Ponte Mammolo',2,2,2),(49,'Rebibbia',2,2,2),(50,'Laurentina',3,3,3),(51,'EUR Fermi',3,3,3),(52,'EUR Palasport',3,3,3),(53,'EUR Magliana',3,3,3),(54,'Marconi',3,3,3),(55,'Basilica S.Paolo',3,3,3),(56,'Garbatella',3,3,3),(57,'Piramide',3,3,3),(58,'Circo Massimo',3,3,3),(59,'Colosseo',3,3,3),(60,'Cavour',3,3,3),(61,'Termini',3,3,3),(62,'Castro Pretorio',3,3,3),(63,'Policlinico',3,3,3),(64,'Bologna',3,3,3),(65,'S.Agnese Annibaliano',3,3,3),(66,'Libia',3,3,3),(67,'Conca d\'Oro',3,3,3),(68,'Jonio',3,3,3),(69,'San Giovanni',4,4,4),(70,'Lodi',4,4,4),(71,'Pigneto',4,4,4),(72,'Malatesta',4,4,4),(73,'Teano',4,4,4),(74,'Gardenie',4,4,4),(75,'Mirti',4,4,4),(76,'Parco di Centocelle',4,4,4),(77,'Alessandrino',4,4,4),(78,'Torre Spaccata',4,4,4),(79,'Torre Maura',4,4,4),(80,'Giardinetti',4,4,4),(81,'Torrenova',4,4,4),(82,'Torre Angela',4,4,4),(83,'Torre Gaia',4,4,4),(84,'Grotte Celoni',4,4,4),(85,'Due Leoni-Fontana Candida',4,4,4),(86,'Borghesiana',4,4,4),(87,'Bolognetta',4,4,4),(88,'Finocchio',4,4,4),(89,'Graniti',4,4,4),(90,'Monte Compatri-Pantano',4,4,4),(91,'Laziali',5,5,5),(92,'S.Bibiana',5,5,5),(93,'Porta Maggiore',5,5,5),(94,'Ponte Casilino',5,5,5),(95,'S.Elena',5,5,5),(96,'Villini',5,5,5),(97,'Alessi',5,5,5),(98,'Filarete',5,5,5),(99,'Tor Pignattara',5,5,5),(100,'Berardi',5,5,5),(101,'Balzani',5,5,5),(102,'Centocelle',5,5,5),(103,'Flaminio',6,6,6),(104,'Euclide',6,6,6),(105,'Acqua Acetosa',6,6,6),(106,'Saxa Rubra',6,6,6),(107,'Montebello',6,6,6),(108,'Sacrofano',6,6,6),(109,'Riano',6,6,6),(110,'Castelnuovo di Porto',6,6,6),(111,'Morlupo',6,6,6),(112,'Rignano Flaminio',6,6,6),(113,'Sant\'Oreste',6,6,6),(114,'Civita Castellana',6,6,6),(115,'Catalano',6,6,6),(116,'Fabrica di Roma',6,6,6),(117,'Vignanello',6,6,6),(118,'Soriano nel Cimino',6,6,6),(119,'Vitorchiano',6,6,6),(120,'Bagnaia',6,6,6),(121,'Viterbo',6,6,6);
/*!40000 ALTER TABLE `Stazione` ENABLE KEYS */;
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
