CREATE DATABASE  IF NOT EXISTS `vet_app` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `vet_app`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: vet_app
-- ------------------------------------------------------
-- Server version	5.5.22

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_trail`
--

LOCK TABLES `audit_trail` WRITE;
/*!40000 ALTER TABLE `audit_trail` DISABLE KEYS */;
INSERT INTO `audit_trail` VALUES (21,'127.0.0.1 logged in. <br/> Email :superadmin@admin.com','2014-01-12 05:23:06','LOG IN'),(22,'testing2@test.com logged in. <br/> IP ADDRESS :127.0.0.1','2014-01-12 10:34:58','LOG IN'),(23,'127.0.0.1 logged in. <br/> Email :test@test.com','2014-01-16 22:25:56','LOG IN'),(24,'127.0.0.1 logged in. <br/> Email :superadmin@admin.com','2014-01-16 22:30:38','LOG IN');
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
INSERT INTO `doctors` VALUES (1,'Dr. Jose Enriquez',NULL),(2,'Dr. Benjar Manalili',NULL);
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'ALLOPURINOL tablet 300mg, 100/box. Sold per tab.',4965,10,'Tablets and Capsules'),(2,'ALUMINUM HYDROXIDE MAGNESIUM HYDROXIDE tablet 200mg/100mg, 100/box.Sold per tab.',2973,10,'Tablets and Capsules');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,1,'Amputation of leg 1-10kga','Surgery',8000),(2,1,'Amputation of leg 11-20kg','Surgery',10000),(3,1,'Amputation of leg 20-30kg','Surgery',12000),(4,1,'Amputation of leg 35 and up','Surgery',15000),(5,3,'Anal Gland Flushing','Surgery',500),(6,3,'Castration CAT (CARA)','Surgery',800),(7,3,'Pin Removal + Sedation','Surgery',2000);
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
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `user_level` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (22,'test','7c4a8d09ca3762af61e59520943dc26494f8941b','Gian','Robles','test@test.com',1,'2013-12-05 17:11:09'),(23,'superadmin','7c4a8d09ca3762af61e59520943dc26494f8941b','superadmin','superadmin','superadmin@admin.com',2,'2013-12-05 17:14:09'),(24,'adminuser','7c4a8d09ca3762af61e59520943dc26494f8941b','adminuser','adminuser','adminuser@admin.com',3,'2013-12-05 17:16:10'),(25,'adminreserve','7c4a8d09ca3762af61e59520943dc26494f8941b','adminreserve','adminreserve','adminreserve@yahoo.com',4,'2013-12-05 19:17:16'),(26,'test2','7c4a8d09ca3762af61e59520943dc26494f8941b','test2','test2','test2@test.com',1,'2013-12-06 01:17:29');
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
  PRIMARY KEY (`objectId`),
  KEY `productId` (`productId`),
  KEY `usersId` (`usersId`),
  CONSTRAINT `users_order_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`objectId`),
  CONSTRAINT `users_order_ibfk_2` FOREIGN KEY (`usersId`) REFERENCES `users` (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_order`
--

LOCK TABLES `users_order` WRITE;
/*!40000 ALTER TABLE `users_order` DISABLE KEYS */;
INSERT INTO `users_order` VALUES (32,1,22,1,10,'2014-12-08 22:55:58',105877,0),(37,2,22,1,10,'2013-12-15 21:29:47',545358,0),(38,2,22,2,20,'2013-12-15 21:32:06',480923,0),(39,1,22,7,70,'2013-12-15 21:34:21',406463,0),(40,2,22,4,40,'2013-12-15 21:35:53',909225,0),(41,2,22,8,80,'2013-12-15 21:38:23',939410,0),(42,1,22,11,110,'2013-12-15 21:48:30',781674,0),(43,1,22,3,30,'2013-12-15 21:50:56',452853,0),(44,2,22,2,20,'2013-12-15 21:51:02',452853,0),(45,1,22,5,50,'2013-12-15 21:55:06',458703,0),(46,1,22,1,10,'2013-12-15 21:57:10',773599,0),(47,2,22,1,10,'2013-12-16 20:23:03',773599,0),(48,1,22,2,20,'2013-12-16 21:57:29',985717,0),(49,2,22,1,10,'2013-12-17 05:24:26',891070,0),(51,1,22,1,10,'2014-01-05 14:39:41',NULL,1),(52,1,22,1,10,'2014-01-05 14:42:02',NULL,1);
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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`objectId`),
  KEY `serviceId` (`serviceId`),
  KEY `userId` (`userId`),
  CONSTRAINT `users_reservation_ibfk_1` FOREIGN KEY (`serviceId`) REFERENCES `services` (`objectId`),
  CONSTRAINT `users_reservation_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
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

-- Dump completed on 2014-01-17  6:49:54
