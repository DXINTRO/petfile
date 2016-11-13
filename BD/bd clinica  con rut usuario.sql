CREATE DATABASE  IF NOT EXISTS `clinica` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `clinica`;
-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: clinica
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_trail`
--

LOCK TABLES `audit_trail` WRITE;
/*!40000 ALTER TABLE `audit_trail` DISABLE KEYS */;
INSERT INTO `audit_trail` VALUES (21,'127.0.0.1 logged in. <br/> Email :superadmin@admin.com','2016-08-14 05:23:06','LOG IN'),(22,'testing2@test.com logged in. <br/> IP ADDRESS :127.0.0.1','2016-09-12 10:34:58','LOG IN'),(23,'127.0.0.1 logged in. <br/> Email :test@test.com','2016-08-16 22:25:56','LOG IN'),(24,'127.0.0.1 logged in. <br/> Email :superadmin@admin.com','2016-08-16 22:30:38','LOG IN'),(25,'127.0.0.1 logged in. <br/> Email :superadmin@admin.com','2016-08-25 07:49:51','LOG IN');
/*!40000 ALTER TABLE `audit_trail` ENABLE KEYS */;
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
  PRIMARY KEY (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,'Dr. Ricardo Riquelme',NULL),(2,'Dra. Daniela Marcone',NULL);
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pets` (
  `objectId` int(10) NOT NULL AUTO_INCREMENT,
  `petName` varchar(45) DEFAULT NULL,
  `petSpecies` varchar(45) DEFAULT NULL,
  `petRace` varchar(45) DEFAULT NULL,
  `petGender` varchar(10) DEFAULT NULL,
  `petAge` numeric(2) DEFAULT NULL,
  `petColor` varchar(20) DEFAULT NULL,
  `petHistory` varchar(100) DEFAULT NULL,
  `petIncome` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(10) DEFAULT NULL,
  PRIMARY KEY (`objectId`),
  KEY `userId` (`userId`),
  CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pets`
--

LOCK TABLES `pets` WRITE;
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;
UNLOCK TABLES;

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
  `petAppliedProducts` numeric(2) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `constant_physiological` agregar diagnostico y ampliar datos de anamnesis
--

DROP TABLE IF EXISTS `constant_physiological`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `constant_physiological` (
  `objectId` int(100) NOT NULL AUTO_INCREMENT,
  `petWeight` varchar(45) DEFAULT NULL,
  `petTemperature` varchar(45) DEFAULT NULL,
  `petHeartRate` varchar(45) DEFAULT NULL,
  `petMucous` numeric(2) DEFAULT NULL,
  `petBreathingFrecuency` varchar(10) DEFAULT NULL,
  `petSkinTurgor` varchar(20) DEFAULT NULL,
  `petPulse` varchar(100) DEFAULT NULL,
  `PetTllc` varchar(100) DEFAULT NULL,
  `PetObservation` varchar(500) DEFAULT NULL,
  `petAnamnesis` varchar(500) DEFAULT NULL,
  `petPreviousDiseases` varchar(500) DEFAULT NULL,
  `petPosiblesDiagnoses` varchar(500) DEFAULT NULL,
  `petDefinitiveDiagnoses` varchar(500) DEFAULT NULL,
  `petCboResponsibleTab` varchar(100) DEFAULT NULL,
  `petCboResponsiblePet` varchar(100) DEFAULT NULL,
  `petAnamnesisCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `petHistoryId` int(100) DEFAULT NULL,
  PRIMARY KEY (`objectId`),
  KEY `objectId` (`objectId`),
  CONSTRAINT `constant_physiological` FOREIGN KEY (`objectId`) REFERENCES `pets` (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `constant_physiological`
--

LOCK TABLES `constant_physiological` WRITE;
/*!40000 ALTER TABLE `constant_physiological` DISABLE KEYS */;
/*!40000 ALTER TABLE `constant_physiological` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
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
  `active` tinyint(1) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `group` varchar(50) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,3,'LAPAROTOMÍA EXPLORATORIA','CIRUGIA',8000),(2,1,'URESTROSTOMÍA CANINA','CIRUGIA',10000),(3,3,'OVARIOHISTERECTOMÍA FELINA','CIRUGIA',12000),(4,1,'QUISTE DERMOIDE UNILATERAL','CIRUGIA',15000),(6,3,'QUERATECTOMÍA','Cirujia',8000),(7,3,'LAMINECTOMÍA','Cirujia',2000),(8,1,'ECOGRAFÍA','Otro',100),(9,1,'ENDOSCOPIA','Otro',100);
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
  `rut` varchar (13)not null,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `user_level` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `contactNo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (22,'13.720.544-K','test','21232f297a57a5a743894a0e4a801fc3','Juan','admin','test@test.com',1,'2013-12-05 17:11:09',null,NULL,NULL),(51,'13.775.844-K','admin','21232f297a57a5a743894a0e4a801fc3','admin','admin','admin@gmail.com',2,'2016-09-12 17:18:33','admin','graneros','21412432');
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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
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
  CONSTRAINT `users_reservation_ibfk_3` FOREIGN KEY (`doctorsId`) REFERENCES `doctors` (`objectId`),
  CONSTRAINT `users_reservation_ibfk_1` FOREIGN KEY (`serviceId`) REFERENCES `services` (`objectId`),
  CONSTRAINT `users_reservation_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_reservation`
--

LOCK TABLES `users_reservation` WRITE;
/*!40000 ALTER TABLE `users_reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_reservation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-12 16:35:39
