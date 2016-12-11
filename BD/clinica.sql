CREATE DATABASE  IF NOT EXISTS `clinica` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `clinica`;
-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: clinica
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `audit_trail`
--

DROP TABLE IF EXISTS `audit_trail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_trail` (
  `objectId` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_trail`
--

LOCK TABLES `audit_trail` WRITE;
/*!40000 ALTER TABLE `audit_trail` DISABLE KEYS */;
INSERT INTO `audit_trail` VALUES (1,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-10 14:13:49','LOG IN'),(2,'127.0.0.1conectado <br/> Email :admin@gmail.com','2016-12-10 14:14:30','LOG IN'),(3,'127.0.0.1conectado <br/> Email :','2016-12-10 14:19:13','LOG OUT'),(4,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-10 14:55:48','LOG IN'),(5,'127.0.0.1 conectado <br/> Email :dxintro@hotmail.com','2016-12-10 18:54:35','LOG IN'),(6,'User 54 deleted a reservation. Reservation ID: 1','2016-12-10 19:39:45','DELETE RESERVATION'),(7,'User 54 added reservation. Reservation ID: 2','2016-12-10 20:00:52','ADD RESERVATION'),(8,'User 54 added reservation. Reservation ID: 3','2016-12-10 20:32:09','ADD RESERVATION'),(9,'User 54 added reservation. Reservation ID: 4','2016-12-10 20:39:14','ADD RESERVATION'),(10,'User 54 added reservation. Reservation ID: 5','2016-12-10 20:40:37','ADD RESERVATION'),(11,'User 54 added reservation. Reservation ID: 6','2016-12-10 20:41:01','ADD RESERVATION'),(12,'User 54 added reservation. Reservation ID: 7','2016-12-11 00:54:44','ADD RESERVATION'),(13,'User 54 added reservation. Reservation ID: 8','2016-12-11 00:59:31','ADD RESERVATION'),(14,'User 54 added reservation. Reservation ID: 9','2016-12-11 00:59:40','ADD RESERVATION'),(15,'User 54 added reservation. Reservation ID: 10','2016-12-11 01:03:38','ADD RESERVATION'),(16,'User 54 added reservation. Reservation ID: 1','2016-12-11 01:15:36','ADD RESERVATION'),(17,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:19:57','UPDATE RESERVATION'),(18,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:20:06','UPDATE RESERVATION'),(19,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:20:14','UPDATE RESERVATION'),(20,'User 54 added reservation. Reservation ID: 2','2016-12-11 01:20:39','ADD RESERVATION'),(21,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:20:46','UPDATE RESERVATION'),(22,'User 54 added reservation. Reservation ID: 3','2016-12-11 01:21:09','ADD RESERVATION'),(23,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:21:24','UPDATE RESERVATION'),(24,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:22:16','UPDATE RESERVATION'),(25,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:22:29','UPDATE RESERVATION'),(26,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:23:55','UPDATE RESERVATION'),(27,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:24:20','UPDATE RESERVATION'),(28,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:24:24','UPDATE RESERVATION'),(29,'User 54 added reservation. Reservation ID: 4','2016-12-11 01:24:45','ADD RESERVATION'),(30,'User 54 added reservation. Reservation ID: 5','2016-12-11 01:24:59','ADD RESERVATION'),(31,'User 54 added reservation. Reservation ID: 6','2016-12-11 01:25:24','ADD RESERVATION'),(32,'User 54 added reservation. Reservation ID: 7','2016-12-11 01:26:59','ADD RESERVATION'),(33,'User 54 added reservation. Reservation ID: 8','2016-12-11 01:28:24','ADD RESERVATION'),(34,'User 54 added reservation. Reservation ID: 9','2016-12-11 01:28:53','ADD RESERVATION'),(35,'User 54 added reservation. Reservation ID: 10','2016-12-11 01:29:14','ADD RESERVATION'),(36,'User 54 added reservation. Reservation ID: 1','2016-12-11 01:32:14','ADD RESERVATION'),(37,'User 54 added reservation. Reservation ID: 2','2016-12-11 01:32:22','ADD RESERVATION'),(38,'User 54 updated a reservation. Reservation ID: 10','2016-12-11 01:32:32','UPDATE RESERVATION'),(39,'User 54 updated a reservation. Reservation ID: 10','2016-12-11 01:32:43','UPDATE RESERVATION'),(40,'127.0.0.1 Desconectado <br/> Email :','2016-12-11 01:33:27','LOG OUT'),(41,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-11 01:33:47','LOG IN');
/*!40000 ALTER TABLE `audit_trail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `constant_physiological`
--

DROP TABLE IF EXISTS `constant_physiological`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `constant_physiological` (
  `objectId` int(100) NOT NULL AUTO_INCREMENT,
  `petWeight` varchar(45) DEFAULT NULL,
  `petTemperature` varchar(45) DEFAULT NULL,
  `petHeartRate` varchar(45) DEFAULT NULL,
  `petMucous` decimal(2,0) DEFAULT NULL,
  `petBreathingFrecuency` varchar(10) DEFAULT NULL,
  `petSkinTurgor` varchar(20) DEFAULT NULL,
  `petPulse` varchar(100) DEFAULT NULL,
  `PetTllc` varchar(100) DEFAULT NULL,
  `PetObservation` varchar(250) DEFAULT NULL,
  `petAnamnesis` varchar(250) DEFAULT NULL,
  `petPreviousDiseases` varchar(250) DEFAULT NULL,
  `petPosiblesDiagnoses` varchar(250) DEFAULT NULL,
  `petDefinitiveDiagnoses` varchar(250) DEFAULT NULL,
  `petCboResponsibleTab` varchar(100) DEFAULT NULL,
  `petCboResponsiblePet` varchar(100) DEFAULT NULL,
  `petCreationAnamnesis` varchar(100) DEFAULT NULL,
  `petHistoryId` int(100) DEFAULT NULL,
  PRIMARY KEY (`objectId`),
  KEY `objectId` (`objectId`),
  CONSTRAINT `constant_physiological` FOREIGN KEY (`objectId`) REFERENCES `pets` (`objectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `constant_physiological`
--

LOCK TABLES `constant_physiological` WRITE;
/*!40000 ALTER TABLE `constant_physiological` DISABLE KEYS */;
/*!40000 ALTER TABLE `constant_physiological` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `objectId` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(45) DEFAULT NULL,
  `doctors_rate` varchar(45) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,'Dr. Ricardo Riquelme',NULL,1),(2,'Dra. Daniela Marcone',NULL,1);
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `get_users_reservation`
--

DROP TABLE IF EXISTS `get_users_reservation`;
/*!50001 DROP VIEW IF EXISTS `get_users_reservation`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `get_users_reservation` AS SELECT 
 1 AS `reservationobjectId`,
 1 AS `serviceObjectId`,
 1 AS `serviceId`,
 1 AS `userId`,
 1 AS `pettId`,
 1 AS `reserveDate`,
 1 AS `reserveTime`,
 1 AS `reserveDateTime`,
 1 AS `confirmed`,
 1 AS `doctorsId`,
 1 AS `timestamp`,
 1 AS `service_name`,
 1 AS `price`,
 1 AS `petsbOjectId`,
 1 AS `petName`,
 1 AS `petSpecies`,
 1 AS `petRace`,
 1 AS `petGender`,
 1 AS `petAge`,
 1 AS `petColor`,
 1 AS `petHistory`,
 1 AS `petIncome`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `objectId` int(100) NOT NULL AUTO_INCREMENT,
  `petCboVaccine` varchar(45) DEFAULT NULL,
  `petCboDeworming` varchar(45) DEFAULT NULL,
  `petCboDiet` varchar(45) DEFAULT NULL,
  `petCboProvenance` varchar(10) DEFAULT NULL,
  `petCboReproductiveStatus` varchar(20) DEFAULT NULL,
  `petAppliedProducts` decimal(2,0) DEFAULT NULL,
  `petDateDeworming` varchar(20) DEFAULT NULL,
  `petDietApplied` varchar(100) DEFAULT NULL,
  `petObservationHistory` varchar(500) DEFAULT NULL,
  `petPreviousDiagnostic` varchar(500) DEFAULT NULL,
  `petCboResponbibleHistory` varchar(100) DEFAULT NULL,
  `petCboPetOwner` varchar(100) DEFAULT NULL,
  `petHistorialCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `petId` int(100) DEFAULT NULL,
  PRIMARY KEY (`objectId`),
  KEY `objectId` (`objectId`),
  CONSTRAINT `pets_history` FOREIGN KEY (`objectId`) REFERENCES `pets` (`objectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pets` (
  `objectId` int(10) NOT NULL AUTO_INCREMENT,
  `petName` varchar(200) DEFAULT NULL,
  `petSpecies` varchar(200) DEFAULT NULL,
  `petRace` varchar(200) DEFAULT NULL,
  `petGender` varchar(200) DEFAULT NULL,
  `petAge` decimal(11,0) DEFAULT NULL,
  `petColor` varchar(200) DEFAULT NULL,
  `petHistory` varchar(200) DEFAULT NULL,
  `petIncome` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(10) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`objectId`),
  KEY `userId` (`userId`),
  CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pets`
--

LOCK TABLES `pets` WRITE;
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` VALUES (1,'d0xintro','Perro','dxintro','Hembra',321,'dxintro','dxintro','2016-12-09 17:57:53',54,1),(2,'1dxintro','Perro','dxintro','Hembra',321,'dxintro','dxintro','2016-12-09 17:58:14',54,1);
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `objectId` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_type` varchar(200) NOT NULL,
  PRIMARY KEY (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Allopurinol tabletas 300mg, 100/caja.',4944,10,'Tabletas y Capsulas'),(2,'Hidroxido De Al-Magnesium tabletas 200mg/100mg, 100/caja.',2970,10,'Tabletas and Capsulas'),(13,'Herplex-L 30 mL suplemento nutricional',111,122,'Tabletas and Capsulas'),(14,'Suplemento vitamínico Apetipet jarabe 100 mL con carnitina',19,12,'Vitaminas'),(15,'Suplemento vitamínico para gatos Apeticat 100 ml Taurina – Carnitina',0,23,'Vitamins');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `objectId` int(10) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(50) NOT NULL,
  `group` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'LAPAROTOMÍA EXPLORATORIA','CIRUGIA',8000,3),(2,'URESTROSTOMÍA CANINA','CIRUGIA',10000,1),(3,'OVARIOHISTERECTOMÍA FELINA','CIRUGIA',12000,3),(4,'QUISTE DERMOIDE UNILATERAL','CIRUGIA',15000,1),(6,'QUERATECTOMÍA','Cirujia',8000,3),(7,'LAMINECTOMÍA','Cirujia',2000,3),(8,'ECOGRAFÍA','Otro',100,1),(9,'ENDOSCOPIA','BASICO',100,1),(10,'PELUQUERIA','BASICO',211,0);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `objectId` int(10) NOT NULL AUTO_INCREMENT,
  `user_rut` varchar(100) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_level` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `contactNo` varchar(200) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (22,NULL,'test','21232f297a57a5a743894a0e4a801fc3','Juan','admin','test@test.com',1,'2013-12-05 17:11:09',NULL,NULL,NULL,0),(51,'17502169-8','admin','21232f297a57a5a743894a0e4a801fc3','admin','admin','admin@gmail.com',2,'2016-09-12 17:18:33','admin','graneros','21412432',1),(54,'17502169-8','Usuario','21232f297a57a5a743894a0e4a801fc3','dxintro','dxintro','dxintro@hotmail.com',1,'2016-12-09 17:56:32','dxintro','dxintro','312313213',1),(56,'17502169-8','Usuario','e10adc3949ba59abbe56e057f20f883e','Usuario','Usuario','dxintro@hotmail.com',1,'2016-12-10 18:26:57','Usuario','Usuario','2134',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_order`
--

DROP TABLE IF EXISTS `users_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_order` (
  `objectId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `usersId` int(11) NOT NULL,
  `productAmount` int(11) NOT NULL,
  `totalPrice` float NOT NULL,
  `orderDate` datetime NOT NULL,
  `batchOrderId` int(11) DEFAULT NULL,
  `active` tinyint(2) NOT NULL,
  `trackingNo` varchar(45) DEFAULT NULL,
  `center` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`objectId`),
  KEY `productId` (`productId`),
  KEY `usersId` (`usersId`),
  CONSTRAINT `users_order_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`objectId`),
  CONSTRAINT `users_order_ibfk_2` FOREIGN KEY (`usersId`) REFERENCES `users` (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_order`
--

LOCK TABLES `users_order` WRITE;
/*!40000 ALTER TABLE `users_order` DISABLE KEYS */;
INSERT INTO `users_order` VALUES (32,1,22,1,10,'2014-12-08 22:55:58',105877,0,NULL,NULL),(37,2,22,1,10,'2013-12-15 21:29:47',545358,0,NULL,NULL),(38,2,22,2,20,'2013-12-15 21:32:06',480923,0,NULL,NULL),(39,1,22,7,70,'2013-12-15 21:34:21',406463,0,NULL,NULL),(40,2,22,4,40,'2013-12-15 21:35:53',909225,0,NULL,NULL);
/*!40000 ALTER TABLE `users_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_reservation`
--

DROP TABLE IF EXISTS `users_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_reservation` (
  `objectId` int(10) NOT NULL AUTO_INCREMENT,
  `serviceId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `pettId` int(10) NOT NULL,
  `reserveDate` varchar(15) NOT NULL,
  `reserveTime` varchar(15) NOT NULL,
  `reserveDateTime` datetime NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `doctorsId` int(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`objectId`),
  KEY `serviceId` (`serviceId`),
  KEY `userId` (`userId`),
  KEY `doctorsId` (`doctorsId`),
  CONSTRAINT `users_reservation_ibfk_1` FOREIGN KEY (`serviceId`) REFERENCES `services` (`objectId`),
  CONSTRAINT `users_reservation_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`objectId`),
  CONSTRAINT `users_reservation_ibfk_3` FOREIGN KEY (`doctorsId`) REFERENCES `doctors` (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_reservation`
--

LOCK TABLES `users_reservation` WRITE;
/*!40000 ALTER TABLE `users_reservation` DISABLE KEYS */;
INSERT INTO `users_reservation` VALUES (1,9,54,1,'17/12/2016','10:00 AM','2016-12-17 10:00:00',2,2,'2016-12-11 01:32:14'),(2,10,54,2,'17/12/2016','10:00 AM','2016-12-17 10:00:00',2,2,'2016-12-11 01:32:43');
/*!40000 ALTER TABLE `users_reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `get_users_reservation`
--

/*!50001 DROP VIEW IF EXISTS `get_users_reservation`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `get_users_reservation` AS select `users_reservation`.`objectId` AS `reservationobjectId`,`svs`.`objectId` AS `serviceObjectId`,`users_reservation`.`serviceId` AS `serviceId`,`users_reservation`.`userId` AS `userId`,`users_reservation`.`pettId` AS `pettId`,`users_reservation`.`reserveDate` AS `reserveDate`,`users_reservation`.`reserveTime` AS `reserveTime`,`users_reservation`.`reserveDateTime` AS `reserveDateTime`,`users_reservation`.`confirmed` AS `confirmed`,`users_reservation`.`doctorsId` AS `doctorsId`,`users_reservation`.`timestamp` AS `timestamp`,`svs`.`service_name` AS `service_name`,`svs`.`price` AS `price`,`pets`.`objectId` AS `petsbOjectId`,`pets`.`petName` AS `petName`,`pets`.`petSpecies` AS `petSpecies`,`pets`.`petRace` AS `petRace`,`pets`.`petGender` AS `petGender`,`pets`.`petAge` AS `petAge`,`pets`.`petColor` AS `petColor`,`pets`.`petHistory` AS `petHistory`,`pets`.`petIncome` AS `petIncome` from ((`users_reservation` join `services` `svs` on((`users_reservation`.`serviceId` = `svs`.`objectId`))) join `pets` on((`users_reservation`.`pettId` = `pets`.`objectId`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-10 22:36:27
