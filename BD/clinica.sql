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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_trail`
--

LOCK TABLES `audit_trail` WRITE;
/*!40000 ALTER TABLE `audit_trail` DISABLE KEYS */;
INSERT INTO `audit_trail` VALUES (1,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-10 14:13:49','LOG IN'),(2,'127.0.0.1conectado <br/> Email :admin@gmail.com','2016-12-10 14:14:30','LOG IN'),(3,'127.0.0.1conectado <br/> Email :','2016-12-10 14:19:13','LOG OUT'),(4,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-10 14:55:48','LOG IN'),(5,'127.0.0.1 conectado <br/> Email :dxintro@hotmail.com','2016-12-10 18:54:35','LOG IN'),(6,'User 54 deleted a reservation. Reservation ID: 1','2016-12-10 19:39:45','DELETE RESERVATION'),(7,'User 54 added reservation. Reservation ID: 2','2016-12-10 20:00:52','ADD RESERVATION'),(8,'User 54 added reservation. Reservation ID: 3','2016-12-10 20:32:09','ADD RESERVATION'),(9,'User 54 added reservation. Reservation ID: 4','2016-12-10 20:39:14','ADD RESERVATION'),(10,'User 54 added reservation. Reservation ID: 5','2016-12-10 20:40:37','ADD RESERVATION'),(11,'User 54 added reservation. Reservation ID: 6','2016-12-10 20:41:01','ADD RESERVATION'),(12,'User 54 added reservation. Reservation ID: 7','2016-12-11 00:54:44','ADD RESERVATION'),(13,'User 54 added reservation. Reservation ID: 8','2016-12-11 00:59:31','ADD RESERVATION'),(14,'User 54 added reservation. Reservation ID: 9','2016-12-11 00:59:40','ADD RESERVATION'),(15,'User 54 added reservation. Reservation ID: 10','2016-12-11 01:03:38','ADD RESERVATION'),(16,'User 54 added reservation. Reservation ID: 1','2016-12-11 01:15:36','ADD RESERVATION'),(17,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:19:57','UPDATE RESERVATION'),(18,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:20:06','UPDATE RESERVATION'),(19,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:20:14','UPDATE RESERVATION'),(20,'User 54 added reservation. Reservation ID: 2','2016-12-11 01:20:39','ADD RESERVATION'),(21,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:20:46','UPDATE RESERVATION'),(22,'User 54 added reservation. Reservation ID: 3','2016-12-11 01:21:09','ADD RESERVATION'),(23,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:21:24','UPDATE RESERVATION'),(24,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:22:16','UPDATE RESERVATION'),(25,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:22:29','UPDATE RESERVATION'),(26,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:23:55','UPDATE RESERVATION'),(27,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:24:20','UPDATE RESERVATION'),(28,'User 54 updated a reservation. Reservation ID: 9','2016-12-11 01:24:24','UPDATE RESERVATION'),(29,'User 54 added reservation. Reservation ID: 4','2016-12-11 01:24:45','ADD RESERVATION'),(30,'User 54 added reservation. Reservation ID: 5','2016-12-11 01:24:59','ADD RESERVATION'),(31,'User 54 added reservation. Reservation ID: 6','2016-12-11 01:25:24','ADD RESERVATION'),(32,'User 54 added reservation. Reservation ID: 7','2016-12-11 01:26:59','ADD RESERVATION'),(33,'User 54 added reservation. Reservation ID: 8','2016-12-11 01:28:24','ADD RESERVATION'),(34,'User 54 added reservation. Reservation ID: 9','2016-12-11 01:28:53','ADD RESERVATION'),(35,'User 54 added reservation. Reservation ID: 10','2016-12-11 01:29:14','ADD RESERVATION'),(36,'User 54 added reservation. Reservation ID: 1','2016-12-11 01:32:14','ADD RESERVATION'),(37,'User 54 added reservation. Reservation ID: 2','2016-12-11 01:32:22','ADD RESERVATION'),(38,'User 54 updated a reservation. Reservation ID: 10','2016-12-11 01:32:32','UPDATE RESERVATION'),(39,'User 54 updated a reservation. Reservation ID: 10','2016-12-11 01:32:43','UPDATE RESERVATION'),(40,'127.0.0.1 Desconectado <br/> Email :','2016-12-11 01:33:27','LOG OUT'),(41,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-11 01:33:47','LOG IN'),(42,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-11 13:09:26','LOG IN'),(43,'127.0.0.1 Desconectado <br/> Email :','2016-12-11 13:24:52','LOG OUT'),(44,'127.0.0.1 conectado <br/> Email :dxintro@hotmail.com','2016-12-11 13:25:02','LOG IN'),(45,'127.0.0.1 Desconectado <br/> Email :','2016-12-11 13:28:47','LOG OUT'),(46,'127.0.0.1 conectado <br/> Email :dxintro@hotmail.com','2016-12-11 13:28:55','LOG IN'),(47,'127.0.0.1 Desconectado <br/> Email :','2016-12-11 13:31:01','LOG OUT'),(48,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-11 13:31:05','LOG IN'),(49,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-11 16:44:20','LOG IN'),(50,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-11 20:13:56','LOG IN'),(51,'127.0.0.1 Desconectado <br/> Email :','2016-12-11 20:13:59','LOG OUT'),(52,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-11 20:14:39','LOG IN'),(53,'127.0.0.1 Desconectado <br/> Email :','2016-12-11 20:14:50','LOG OUT'),(54,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-11 20:24:25','LOG IN'),(55,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-12 16:00:35','LOG IN'),(56,'127.0.0.1 Desconectado <br/> Email :','2016-12-12 16:08:18','LOG OUT'),(57,'127.0.0.1 conectado <br/> Email :dxintro@hotmail.com','2016-12-12 16:08:30','LOG IN'),(58,'127.0.0.1 Desconectado <br/> Email :','2016-12-12 16:08:35','LOG OUT'),(59,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-12 16:14:39','LOG IN'),(60,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-13 01:26:36','LOG IN'),(61,'127.0.0.1 conectado <br/> Email :admin@gmail.com','2016-12-13 12:25:49','LOG IN');
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
  `petId` int(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `petWeight` varchar(45) DEFAULT NULL,
  `petTemperature` varchar(45) DEFAULT NULL,
  `petHeartRate` varchar(45) DEFAULT NULL,
  `petMucous` varchar(45) DEFAULT NULL,
  `petBreathingFrecuency` varchar(200) DEFAULT NULL,
  `PetTllc` varchar(100) DEFAULT NULL,
  `petPulse` varchar(100) DEFAULT NULL,
  `thickness` varchar(200) DEFAULT NULL,
  `lstmedicament_textarea` varchar(205) DEFAULT NULL,
  `petAnamnesis` varchar(250) DEFAULT NULL,
  `petPreviousDiseases` varchar(250) DEFAULT NULL,
  `petPosibles_Diagnosticos` varchar(250) DEFAULT NULL,
  `petDiagnostico_Definitivo` varchar(250) DEFAULT NULL,
  `PetObservation` varchar(250) DEFAULT NULL,
  `Responsable_doc` varchar(100) DEFAULT NULL,
  `petCreationAnamnesis` datetime DEFAULT NULL,
  PRIMARY KEY (`objectId`),
  KEY `objectId` (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `constant_physiological`
--

LOCK TABLES `constant_physiological` WRITE;
/*!40000 ALTER TABLE `constant_physiological` DISABLE KEYS */;
INSERT INTO `constant_physiological` VALUES (26,1,54,'1','1','1','Normal','1',' 1 Segundo','1','<1 Segundo','1','1','1','1','1','null','1','2016-12-13 15:40:38');
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
  `petId` int(11) DEFAULT NULL,
  `petCboVaccine` varchar(45) DEFAULT NULL,
  `petCboDeworming` varchar(45) DEFAULT NULL,
  `petCboDiet` varchar(45) DEFAULT NULL,
  `petAppliedProducts` varchar(200) DEFAULT NULL,
  `petDateDeworming` varchar(200) DEFAULT NULL,
  `petCboProvenance` varchar(45) DEFAULT NULL,
  `petCboReproductiveStatus` varchar(200) DEFAULT NULL,
  `petDietApplied` varchar(200) DEFAULT NULL,
  `petObservationHistory` varchar(200) DEFAULT NULL,
  `petPreviousDiagnostic` varchar(200) DEFAULT NULL,
  `petCboResponbibleHistory` varchar(200) DEFAULT NULL,
  `petCboPetOwner` varchar(200) DEFAULT NULL,
  `petHistorialCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`objectId`),
  KEY `objectId` (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (16,1,'Si','Si','Si','sadas','adsasd','Rural','Si','ds','sdasd','asdasd','Si','Si','2016-12-13 20:10:35'),(18,3,'Si','Si','Si','','','Rural','Si','','sdasdas','','Si','Si','2016-12-13 20:14:43'),(19,2,'Si','Si','Si','','','Rural','Si','','sadasdqw','qwdqwdqw','Si','Si','2016-12-13 20:14:50');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pets`
--

LOCK TABLES `pets` WRITE;
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` VALUES (1,'perro','Perro','perro','Macho',12,'negro',' dasfdsfsdfsd','2016-12-09 17:57:53',51,1),(2,'1dxintro','Gato','dxintro','Hembra',32,'dxintro',' dxintro','2016-12-09 17:58:14',54,1),(3,'pet2','Perro','pet2','Hembra',2,'Hembra',' Hembra','2016-12-11 14:18:21',51,1),(4,'Usuario','Perro','Usuario','Macho',24,'Usuario',' Usuario','2016-12-13 02:46:54',59,0),(5,'Usuario','Perro','Usuario','Macho',24,'Usuario',' Usuario','2016-12-13 02:48:06',60,0);
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `pets_v_users`
--

DROP TABLE IF EXISTS `pets_v_users`;
/*!50001 DROP VIEW IF EXISTS `pets_v_users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `pets_v_users` AS SELECT 
 1 AS `user_rut`,
 1 AS `username`,
 1 AS `password`,
 1 AS `first_name`,
 1 AS `last_name`,
 1 AS `email`,
 1 AS `user_level`,
 1 AS `createdAt`,
 1 AS `address`,
 1 AS `city`,
 1 AS `contactNo`,
 1 AS `usersactivo`,
 1 AS `petsobjectId`,
 1 AS `petName`,
 1 AS `petSpecies`,
 1 AS `petRace`,
 1 AS `petGender`,
 1 AS `petAge`,
 1 AS `petColor`,
 1 AS `petHistory`,
 1 AS `petIncome`,
 1 AS `userId`,
 1 AS `petsactivo`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescription` (
  `idprescription` int(11) NOT NULL AUTO_INCREMENT,
  `Formulario` longtext,
  `Fecha_creacion` datetime DEFAULT NULL,
  `idpets` int(11) NOT NULL,
  PRIMARY KEY (`idprescription`,`idpets`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
INSERT INTO `prescription` VALUES (5,'sadasdasd','2016-12-13 20:20:38',2),(6,'juna','2016-12-13 20:21:56',3),(7,'12345678 receta ','2016-12-13 20:22:04',1);
/*!40000 ALTER TABLE `prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `prescription_view`
--

DROP TABLE IF EXISTS `prescription_view`;
/*!50001 DROP VIEW IF EXISTS `prescription_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `prescription_view` AS SELECT 
 1 AS `petsobjectId`,
 1 AS `idprescription`,
 1 AS `Formulario`,
 1 AS `Fecha_creacion_prescription`,
 1 AS `idpets`,
 1 AS `user_rut`,
 1 AS `username`,
 1 AS `first_name`,
 1 AS `last_name`,
 1 AS `address`,
 1 AS `city`,
 1 AS `contactNo`,
 1 AS `petName`,
 1 AS `petSpecies`,
 1 AS `petRace`,
 1 AS `petGender`,
 1 AS `petAge`,
 1 AS `petColor`,
 1 AS `petHistory`,
 1 AS `petIncome`,
 1 AS `userId`,
 1 AS `Formulario_receta`,
 1 AS `contraindicaciones`,
 1 AS `petsactivo`*/;
SET character_set_client = @saved_cs_client;

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
INSERT INTO `products` VALUES (1,'Allopurinol tabletas 300mg, 100/caja.',4949,23,'Vacuna'),(2,'Hidroxido De Al-Magnesium tabletas 200mg/100mg, 100/caja.',2970,10,'Tabletas y Capsulas'),(13,'Herplex-L 30 mL suplemento nutricional',111,122,'Tabletas y Capsulas'),(14,'Suplemento vitamínico Apetipet jarabe 100 mL con carnitina',19,12,'Vitaminas'),(15,'Suplemento vitamínico para gatos Apeticat 100 ml Taurina – Carnitina',0,23,'Vitaminas');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_pets`
--

DROP TABLE IF EXISTS `products_pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_pets` (
  `idproducts_pets` int(11) NOT NULL,
  `idpet` int(11) NOT NULL,
  PRIMARY KEY (`idproducts_pets`,`idpet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_pets`
--

LOCK TABLES `products_pets` WRITE;
/*!40000 ALTER TABLE `products_pets` DISABLE KEYS */;
INSERT INTO `products_pets` VALUES (2,1),(13,1),(14,1);
/*!40000 ALTER TABLE `products_pets` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'LAPAROTOMÍA EXPLORATORIA','CIRUGIA',9004,3),(2,'URESTROSTOMÍA CANINA','CIRUGIA',100000,1),(3,'OVARIOHISTERECTOMÍA FELINA','CIRUGIA',12000,3),(4,'QUISTE DERMOIDE UNILATERAL','CIRUGIA',15000,1),(6,'QUERATECTOMÍA','Cirujia',8000,3),(7,'LAMINECTOMÍA','Cirujia',2000,3),(8,'ECOGRAFÍA','Otro',100,1),(9,'ENDOSCOPIA','BASICO',127,1),(10,'PELUQUERIA','BASICO',211,0),(11,'nuevo','BASICO',21312,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (22,NULL,'test','21232f297a57a5a743894a0e4a801fc3','Juan','admin','test@test.com',1,'2013-12-05 17:11:09',NULL,NULL,NULL,0),(51,'17502169-8','admin','21232f297a57a5a743894a0e4a801fc3','admin','admin','admin@gmail.com',2,'2016-09-12 17:18:33','admin','graneros','21412432',1),(54,'17502169-8','Usuario','21232f297a57a5a743894a0e4a801fc3','dxintro','dxintro','dxintro@hotmail.com',1,'2016-12-09 17:56:32','dxintro','dxintro','312313213',1),(56,'17502169-8','Usuario','e10adc3949ba59abbe56e057f20f883e','Usuario','Usuario','dxintro@hotmail.com',1,'2016-12-10 18:26:57','Usuario','Usuario','2134',0),(57,'17502169-8','Usuario','a5ae0861febff1aeefb6d5b759d904a6','Usuario','Usuario','dxintro@hotmail.com',1,'2016-12-13 02:46:17','Usuario','Usuario','Usuario',1),(58,'17502169-8','Usuario','a5ae0861febff1aeefb6d5b759d904a6','Usuario','Usuario','dxintro@hotmail.com',1,'2016-12-13 02:46:31','Usuario','Usuario','Usuario',1),(59,'17502169-8','Usuario','a5ae0861febff1aeefb6d5b759d904a6','Usuario','Usuario','dxintro@hotmail.com',1,'2016-12-13 02:46:40','Usuario','Usuario','Usuario',1),(60,'17502169-8','Usuario','a5ae0861febff1aeefb6d5b759d904a6','Usuario','Usuario','dxintro@hotmail.com',1,'2016-12-13 02:48:06','Usuario','Usuario','Usuario',1);
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
INSERT INTO `users_order` VALUES (32,1,22,1,10,'2014-12-08 22:55:58',NULL,3,NULL,NULL),(37,2,22,1,10,'2013-12-15 21:29:47',545358,0,NULL,NULL),(38,2,22,2,20,'2013-12-15 21:32:06',480923,0,NULL,NULL),(39,1,22,7,70,'2013-12-15 21:34:21',406463,0,NULL,NULL),(40,2,22,4,40,'2013-12-15 21:35:53',909225,0,NULL,NULL);
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

--
-- Final view structure for view `pets_v_users`
--

/*!50001 DROP VIEW IF EXISTS `pets_v_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pets_v_users` AS select `users`.`user_rut` AS `user_rut`,`users`.`username` AS `username`,`users`.`password` AS `password`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`email` AS `email`,`users`.`user_level` AS `user_level`,`users`.`createdAt` AS `createdAt`,`users`.`address` AS `address`,`users`.`city` AS `city`,`users`.`contactNo` AS `contactNo`,`users`.`activo` AS `usersactivo`,`pets`.`objectId` AS `petsobjectId`,`pets`.`petName` AS `petName`,`pets`.`petSpecies` AS `petSpecies`,`pets`.`petRace` AS `petRace`,`pets`.`petGender` AS `petGender`,`pets`.`petAge` AS `petAge`,`pets`.`petColor` AS `petColor`,`pets`.`petHistory` AS `petHistory`,`pets`.`petIncome` AS `petIncome`,`pets`.`userId` AS `userId`,`pets`.`activo` AS `petsactivo` from (`users` join `pets` on((`users`.`objectId` = `pets`.`userId`))) group by `pets`.`objectId` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `prescription_view`
--

/*!50001 DROP VIEW IF EXISTS `prescription_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `prescription_view` AS select `pets`.`objectId` AS `petsobjectId`,`prescription`.`idprescription` AS `idprescription`,`prescription`.`Formulario` AS `Formulario`,`prescription`.`Fecha_creacion` AS `Fecha_creacion_prescription`,`prescription`.`idpets` AS `idpets`,`users`.`user_rut` AS `user_rut`,`users`.`username` AS `username`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`address` AS `address`,`users`.`city` AS `city`,`users`.`contactNo` AS `contactNo`,`pets`.`petName` AS `petName`,`pets`.`petSpecies` AS `petSpecies`,`pets`.`petRace` AS `petRace`,`pets`.`petGender` AS `petGender`,`pets`.`petAge` AS `petAge`,`pets`.`petColor` AS `petColor`,`pets`.`petHistory` AS `petHistory`,`pets`.`petIncome` AS `petIncome`,`pets`.`userId` AS `userId`,`prescription`.`Formulario` AS `Formulario_receta`,group_concat(left(`products`.`product_name`,25),'' separator ',') AS `contraindicaciones`,`pets`.`activo` AS `petsactivo` from ((((`users` left join `pets` on((`users`.`objectId` = `pets`.`userId`))) left join `prescription` on((`pets`.`objectId` = `prescription`.`idpets`))) left join `products_pets` on((`pets`.`objectId` = `products_pets`.`idpet`))) left join `products` on((`products_pets`.`idproducts_pets` = `products`.`objectId`))) group by `pets`.`objectId` */;
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

-- Dump completed on 2016-12-13 21:55:19
