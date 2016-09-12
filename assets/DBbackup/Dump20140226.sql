CREATE DATABASE  IF NOT EXISTS `vet_app` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `vet_app`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: vet_app
-- ------------------------------------------------------
-- Server version	5.1.72-community

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
  `address` varchar(100) DEFAULT NULL,
  `contactNo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (22,'test','7c4a8d09ca3762af61e59520943dc26494f8941b','Gian','Robles','test@test.com',1,'2013-12-05 17:11:09',NULL,NULL),(23,'superadmin','7c4a8d09ca3762af61e59520943dc26494f8941b','superadmin','superadmin','superadmin@admin.com',2,'2013-12-05 17:14:09',NULL,NULL),(24,'adminuser','7c4a8d09ca3762af61e59520943dc26494f8941b','adminuser','adminuser','adminuser@admin.com',3,'2013-12-05 17:16:10',NULL,NULL),(25,'adminreserve','7c4a8d09ca3762af61e59520943dc26494f8941b','adminreserve','adminreserve','adminreserve@yahoo.com',4,'2013-12-05 19:17:16',NULL,NULL),(26,'test2','7c4a8d09ca3762af61e59520943dc26494f8941b','test2','test2','test2@test.com',1,'2013-12-06 01:17:29',NULL,NULL),(27,'test123456','7c4a8d09ca3762af61e59520943dc26494f8941b','Virmel','Cruz','test3@test.com',1,'2014-02-25 22:17:28',NULL,NULL),(28,'wews@wew.com','601f1889667efaebb33b8c12572835da3f027f78','virmel','virmel','wews@wew.com',1,'2014-02-26 06:58:38','robles','09067558871'),(29,'wews@wew.com','601f1889667efaebb33b8c12572835da3f027f78','virmel','virmel','wews@wew.com',1,'2014-02-26 06:59:15','robles','09067558871'),(30,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:24','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(31,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:27','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(32,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:29','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(33,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:29','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(34,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:30','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(35,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:30','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(36,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:30','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(37,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:31','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(38,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:31','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(39,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:31','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(40,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:32','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(41,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:32','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(42,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:33','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(43,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:33','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(44,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:33','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(45,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:34','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(46,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:34','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(47,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:35','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(48,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:35','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(49,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:36','Blk. 2 Lot. 27 Paradise Vill.','09081402646'),(50,'gojocruz','7c4a8d09ca3762af61e59520943dc26494f8941b','Gerald','Gojo Cruz','test5@test.com',1,'2014-02-27 09:47:37','Blk. 2 Lot. 27 Paradise Vill.','09081402646');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_reservation`
--

LOCK TABLES `users_reservation` WRITE;
/*!40000 ALTER TABLE `users_reservation` DISABLE KEYS */;
INSERT INTO `users_reservation` VALUES (5,1,26,'02/26/2014','4:00 PM','2014-02-26 16:00:00',0,2,'2014-02-27 08:30:06'),(6,1,26,'02/27/2014','2:00 PM','2014-02-27 14:00:00',2,2,'2014-02-27 08:30:06'),(7,1,26,'02/28/2014','2:00 PM','2014-02-28 14:00:00',2,2,'2014-02-27 08:30:06'),(51,1,22,'02/26/2014','11:00 AM','2014-02-26 11:00:00',2,2,'2014-02-27 08:30:06'),(52,4,22,'02/26/2014','4:00 PM','2014-02-26 16:00:00',2,2,'2014-02-27 08:30:06'),(90,1,27,'02/28/2014','2:00 PM','2014-02-28 14:00:00',2,1,'2014-02-27 09:43:17'),(91,1,27,'02/28/2014','11:00 AM','2014-02-28 11:00:00',2,1,'2014-02-27 09:44:45'),(92,2,30,'02/28/2014','5:00 PM','2014-02-28 17:00:00',2,2,'2014-02-27 09:56:17'),(93,5,30,'03/31/2014','7:00 PM','2014-03-31 19:00:00',2,1,'2014-02-27 09:57:09');
/*!40000 ALTER TABLE `users_reservation` ENABLE KEYS */;
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
INSERT INTO `users_order` VALUES (32,1,22,1,10,'2014-12-08 22:55:58',105877,0,NULL,NULL),(37,2,22,1,10,'2013-12-15 21:29:47',545358,0,NULL,NULL),(38,2,22,2,20,'2013-12-15 21:32:06',480923,0,NULL,NULL),(39,1,22,7,70,'2013-12-15 21:34:21',406463,0,NULL,NULL),(40,2,22,4,40,'2013-12-15 21:35:53',909225,0,NULL,NULL),(41,2,22,8,80,'2013-12-15 21:38:23',939410,0,NULL,NULL),(42,1,22,11,110,'2013-12-15 21:48:30',781674,0,NULL,NULL),(43,1,22,3,30,'2013-12-15 21:50:56',452853,0,NULL,NULL),(44,2,22,2,20,'2013-12-15 21:51:02',452853,0,NULL,NULL),(45,1,22,5,50,'2013-12-15 21:55:06',458703,0,NULL,NULL),(46,1,22,1,10,'2013-12-15 21:57:10',773599,0,NULL,NULL),(47,2,22,1,10,'2013-12-16 20:23:03',773599,0,NULL,NULL),(48,1,22,2,20,'2013-12-16 21:57:29',985717,0,NULL,NULL),(49,2,22,1,10,'2013-12-17 05:24:26',891070,0,NULL,NULL),(51,1,22,1,10,'2014-01-05 14:39:41',13,0,NULL,NULL),(52,1,22,1,10,'2014-01-05 14:42:02',13,0,NULL,NULL),(53,1,22,4,40,'2014-02-26 04:15:26',14,0,NULL,NULL),(54,1,22,1,10,'2014-02-26 04:18:44',15,0,NULL,NULL),(55,2,22,1,10,'2014-02-26 04:20:53',15,0,NULL,NULL),(56,1,26,1,10,'2014-02-26 05:19:14',1,0,'12321','LBC13sdw'),(57,1,27,1,10,'2014-02-26 06:44:18',1,1,'12321','LBC13sdw'),(63,1,30,1,10,'2014-02-27 18:02:09',1,1,'12321','LBC13sdw'),(64,2,30,1,10,'2014-02-27 18:02:14',1,1,'12321','LBC13sdw'),(66,1,22,1,10,'2014-02-26 10:50:47',16,0,NULL,NULL),(67,1,22,1,10,'2014-02-26 10:56:58',17,0,NULL,NULL),(68,1,22,1,10,'2014-02-26 13:50:15',18,0,NULL,NULL),(69,1,22,1,10,'2014-02-26 17:00:24',19,0,NULL,NULL),(70,1,22,1,10,'2014-02-26 17:03:16',19,0,NULL,NULL),(71,1,22,1,10,'2014-02-26 11:40:56',20,0,NULL,NULL),(72,1,22,1,10,'2014-02-26 11:49:07',21,0,NULL,NULL),(73,1,22,1,10,'2014-02-26 12:21:29',22,0,'T23rsnuq','Western Union'),(74,13,27,1,122,'2014-02-26 14:25:19',1,1,'12321','LBC13sdw'),(75,16,22,1,100,'2014-02-26 14:33:41',23,0,'Rjk23wm23','Land Bank'),(76,14,22,1,12,'2014-02-26 14:33:45',23,0,'Rjk23wm23','Land Bank');
/*!40000 ALTER TABLE `users_order` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=352 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_trail`
--

LOCK TABLES `audit_trail` WRITE;
/*!40000 ALTER TABLE `audit_trail` DISABLE KEYS */;
INSERT INTO `audit_trail` VALUES (21,'127.0.0.1 logged in. <br/> Email :superadmin@admin.com','2014-01-12 05:23:06','LOG IN'),(22,'testing2@test.com logged in. <br/> IP ADDRESS :127.0.0.1','2014-01-12 10:34:58','LOG IN'),(23,'127.0.0.1 logged in. <br/> Email :test@test.com','2014-01-16 22:25:56','LOG IN'),(24,'127.0.0.1 logged in. <br/> Email :superadmin@admin.com','2014-01-16 22:30:38','LOG IN'),(25,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 07:49:51','LOG IN'),(26,'::1 logged in. <br/> Email :test@test.com','2014-02-25 08:16:42','LOG IN'),(27,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 08:17:43','LOG IN'),(28,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 10:08:14','LOG IN'),(29,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 10:14:49','LOG IN'),(30,'::1 logged in. <br/> Email :test@test.com','2014-02-25 10:21:55','LOG IN'),(31,'::1 logged in. <br/> Email :test@test.com','2014-02-25 10:24:28','LOG IN'),(32,'::1 logged in. <br/> Email :test@test.com','2014-02-25 16:26:35','LOG IN'),(33,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 18:11:03','LOG IN'),(34,'::1 logged in. <br/> Email :test@test.com','2014-02-25 18:12:02','LOG IN'),(35,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 19:07:31','LOG IN'),(36,'::1 logged in. <br/> Email :test@test.com','2014-02-25 19:10:40','LOG IN'),(37,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 19:11:18','LOG IN'),(38,'::1 logged in. <br/> Email :test@test.com','2014-02-25 19:16:39','LOG IN'),(39,'User 22 added reservation. Reservation ID: 2','2014-02-25 19:16:56','ADD RESERVATION'),(40,'::1 logged in. <br/> Email :test@test.com','2014-02-28 19:17:33','LOG IN'),(41,'::1 logged in. <br/> Email :test@test.com','2014-02-28 19:22:29','LOG IN'),(42,'User 22 added reservation. Reservation ID: 3','2014-02-28 19:22:50','ADD RESERVATION'),(43,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 19:24:10','LOG IN'),(44,'::1 logged in. <br/> Email :test@test.com','2014-02-25 19:28:25','LOG IN'),(45,'User 22 added reservation. Reservation ID: 4','2014-02-25 19:28:35','ADD RESERVATION'),(46,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 19:29:40','LOG IN'),(47,'::1 logged in. <br/> Email :test@test.com','2014-02-25 19:36:34','LOG IN'),(48,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 19:37:06','LOG IN'),(49,'::1 logged in. <br/> Email :test@test.com','2014-02-25 20:00:53','LOG IN'),(50,'User 22 checkout cart. Cart ID/Receipt #: 13','2014-02-25 20:03:50','CHECKOUT CART'),(51,'::1 logged in. <br/> Email :test@test.com','2014-02-25 20:09:39','LOG IN'),(52,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 20:10:28','LOG IN'),(53,'::1 logged in. <br/> Email :test@test.com','2014-02-25 20:15:14','LOG IN'),(54,'User 22 added a order to cart. Order ID: 53','2014-02-25 20:15:26','ADD ORDER TO CART'),(55,'User 22 updated a order. Order ID: 53','2014-02-25 20:15:53','UPDATED ORDER'),(56,'User 22 checkout cart. Cart ID/Receipt #: 14','2014-02-25 20:16:02','CHECKOUT CART'),(57,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 20:16:48','LOG IN'),(58,'::1 logged in. <br/> Email :test@test.com','2014-02-25 20:18:22','LOG IN'),(59,'User 22 added a order to cart. Order ID: 54','2014-02-25 20:18:44','ADD ORDER TO CART'),(60,'User 22 checkout cart. Cart ID/Receipt #: 15','2014-02-25 20:20:08','CHECKOUT CART'),(61,'User 22 checkout cart. Cart ID/Receipt #: 15','2014-02-25 20:20:20','CHECKOUT CART'),(62,'User 22 checkout cart. Cart ID/Receipt #: 15','2014-02-25 20:20:25','CHECKOUT CART'),(63,'User 22 added a order to cart. Order ID: 55','2014-02-25 20:20:53','ADD ORDER TO CART'),(64,'User 22 checkout cart. Cart ID/Receipt #: 15','2014-02-25 20:20:58','CHECKOUT CART'),(65,'User 22 checkout cart. Cart ID/Receipt #: 15','2014-02-25 20:21:37','CHECKOUT CART'),(66,'User 22 checkout cart. Cart ID/Receipt #: 15','2014-02-25 20:22:49','CHECKOUT CART'),(67,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 20:23:50','LOG IN'),(68,'::1 logged in. <br/> Email :test2@test.com','2014-02-25 20:28:25','LOG IN'),(69,'User 26 added reservation. Reservation ID: 5','2014-02-25 20:28:40','ADD RESERVATION'),(70,'User 26 added reservation. Reservation ID: 6','2014-02-25 20:30:56','ADD RESERVATION'),(71,'User 26 added reservation. Reservation ID: 7','2014-02-25 20:31:57','ADD RESERVATION'),(72,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-25 21:08:56','LOG IN'),(73,'::1 logged in. <br/> Email :test2@test.com','2014-02-25 21:12:40','LOG IN'),(74,'User 26 added a order to cart. Order ID: 56','2014-02-25 21:19:14','ADD ORDER TO CART'),(75,'User 26 checkout cart. Cart ID/Receipt #: 1','2014-02-25 21:19:18','CHECKOUT CART'),(76,'::1 logged in. <br/> Email :test3@test.com','2014-02-25 22:17:46','LOG IN'),(77,'User 27 added reservation. Reservation ID: 8','2014-02-25 22:21:53','ADD RESERVATION'),(78,'User 27 added reservation. Reservation ID: 9','2014-02-25 22:22:06','ADD RESERVATION'),(79,'User 27 added reservation. Reservation ID: 10','2014-02-25 22:22:21','ADD RESERVATION'),(80,'User 27 deleted a reservation. Reservation ID: 8','2014-02-25 22:26:31','DELETE RESERVATION'),(81,'User 27 deleted a reservation. Reservation ID: 10','2014-02-25 22:26:38','DELETE RESERVATION'),(82,'User 27 added reservation. Reservation ID: 11','2014-02-25 22:27:20','ADD RESERVATION'),(83,'User 27 deleted a reservation. Reservation ID: 11','2014-02-25 22:29:53','DELETE RESERVATION'),(84,'User 27 deleted a reservation. Reservation ID: 9','2014-02-25 22:31:25','DELETE RESERVATION'),(85,'User 27 added reservation. Reservation ID: 12','2014-02-25 22:33:06','ADD RESERVATION'),(86,'User 27 added reservation. Reservation ID: 13','2014-02-25 22:33:16','ADD RESERVATION'),(87,'User 27 added reservation. Reservation ID: 14','2014-02-25 22:33:28','ADD RESERVATION'),(88,'User 27 deleted a reservation. Reservation ID: 14','2014-02-25 22:34:47','DELETE RESERVATION'),(89,'User 27 deleted a reservation. Reservation ID: 12','2014-02-25 22:34:51','DELETE RESERVATION'),(90,'User 27 deleted a reservation. Reservation ID: 13','2014-02-25 22:34:54','DELETE RESERVATION'),(91,'User 27 added reservation. Reservation ID: 15','2014-02-25 22:36:30','ADD RESERVATION'),(92,'User 27 added reservation. Reservation ID: 16','2014-02-25 22:36:37','ADD RESERVATION'),(93,'::1 logged in. <br/> Email :test3@test.com','2014-02-25 22:37:02','LOG IN'),(94,'User 27 deleted a reservation. Reservation ID: 15','2014-02-25 22:37:48','DELETE RESERVATION'),(95,'::1 logged in. <br/> Email :test3@test.com','2014-02-25 22:39:18','LOG IN'),(96,'User 27 deleted a reservation. Reservation ID: 16','2014-02-25 22:39:24','DELETE RESERVATION'),(97,'User 27 added reservation. Reservation ID: 17','2014-02-25 22:41:30','ADD RESERVATION'),(98,'User 27 added reservation. Reservation ID: 18','2014-02-25 22:41:40','ADD RESERVATION'),(99,'User 27 added reservation. Reservation ID: 19','2014-02-25 22:41:52','ADD RESERVATION'),(100,'User 27 deleted a reservation. Reservation ID: 17','2014-02-25 22:44:13','DELETE RESERVATION'),(101,'User 27 added a order to cart. Order ID: 57','2014-02-25 22:44:18','ADD ORDER TO CART'),(102,'User 27 checkout cart. Cart ID/Receipt #: 1','2014-02-25 22:44:22','CHECKOUT CART'),(103,'User 27 deleted a reservation. Reservation ID: 18','2014-02-25 22:44:36','DELETE RESERVATION'),(104,'User 27 deleted a reservation. Reservation ID: 19','2014-02-25 22:44:39','DELETE RESERVATION'),(105,'User 27 added reservation. Reservation ID: 20','2014-02-25 22:44:56','ADD RESERVATION'),(106,'User 27 checkout cart. Cart ID/Receipt #: 1','2014-02-25 22:48:54','CHECKOUT CART'),(107,'User 27 deleted a reservation. Reservation ID: 20','2014-02-25 22:49:38','DELETE RESERVATION'),(108,'User 27 added reservation. Reservation ID: 21','2014-02-25 22:57:01','ADD RESERVATION'),(109,'User 27 added reservation. Reservation ID: 22','2014-02-25 22:57:18','ADD RESERVATION'),(110,'User 27 deleted a reservation. Reservation ID: 22','2014-02-25 23:04:28','DELETE RESERVATION'),(111,'User 27 deleted a reservation. Reservation ID: 21','2014-02-25 23:04:40','DELETE RESERVATION'),(112,'User 27 added reservation. Reservation ID: 23','2014-02-25 23:06:06','ADD RESERVATION'),(113,'User 27 added reservation. Reservation ID: 24','2014-02-25 23:06:12','ADD RESERVATION'),(114,'User 27 added reservation. Reservation ID: 25','2014-02-25 23:06:46','ADD RESERVATION'),(115,'User 27 deleted a reservation. Reservation ID: 23','2014-02-25 23:09:39','DELETE RESERVATION'),(116,'User 27 deleted a reservation. Reservation ID: 25','2014-02-25 23:09:55','DELETE RESERVATION'),(117,'User 27 added reservation. Reservation ID: 26','2014-02-25 23:13:37','ADD RESERVATION'),(118,'User 27 deleted a reservation. Reservation ID: 26','2014-02-25 23:14:56','DELETE RESERVATION'),(119,'User 27 added reservation. Reservation ID: 27','2014-02-25 23:15:08','ADD RESERVATION'),(120,'User 27 deleted a reservation. Reservation ID: 27','2014-02-25 23:15:18','DELETE RESERVATION'),(121,'User 27 added reservation. Reservation ID: 28','2014-02-25 23:17:46','ADD RESERVATION'),(122,'User 27 deleted a reservation. Reservation ID: 28','2014-02-25 23:23:22','DELETE RESERVATION'),(123,'User 27 added reservation. Reservation ID: 29','2014-02-25 23:23:34','ADD RESERVATION'),(124,'User 27 deleted a reservation. Reservation ID: 29','2014-02-25 23:24:31','DELETE RESERVATION'),(125,'User 27 added reservation. Reservation ID: 30','2014-02-25 23:24:41','ADD RESERVATION'),(126,'User 27 deleted a reservation. Reservation ID: 30','2014-02-25 23:25:45','DELETE RESERVATION'),(127,'User 27 added reservation. Reservation ID: 31','2014-02-25 23:25:54','ADD RESERVATION'),(128,'User 27 deleted a reservation. Reservation ID: 31','2014-02-25 23:31:20','DELETE RESERVATION'),(129,'User 27 added reservation. Reservation ID: 32','2014-02-25 23:31:28','ADD RESERVATION'),(130,'User 27 deleted a reservation. Reservation ID: 32','2014-02-25 23:31:55','DELETE RESERVATION'),(131,'User 27 added reservation. Reservation ID: 33','2014-02-25 23:32:05','ADD RESERVATION'),(132,'User 27 deleted a reservation. Reservation ID: 33','2014-02-25 23:32:56','DELETE RESERVATION'),(133,'User 27 added reservation. Reservation ID: 34','2014-02-25 23:33:08','ADD RESERVATION'),(134,'User 27 deleted a reservation. Reservation ID: 34','2014-02-25 23:38:12','DELETE RESERVATION'),(135,'User 27 added reservation. Reservation ID: 35','2014-02-25 23:38:59','ADD RESERVATION'),(136,'User 27 deleted a reservation. Reservation ID: 35','2014-02-25 23:51:02','DELETE RESERVATION'),(137,'User 27 added reservation. Reservation ID: 36','2014-02-25 23:55:56','ADD RESERVATION'),(138,'User 27 deleted a reservation. Reservation ID: 24','2014-02-25 23:59:26','DELETE RESERVATION'),(139,'User 27 deleted a reservation. Reservation ID: 36','2014-02-25 23:59:32','DELETE RESERVATION'),(140,'User 27 added reservation. Reservation ID: 37','2014-02-26 00:36:41','ADD RESERVATION'),(141,'User 27 added reservation. Reservation ID: 38','2014-02-26 00:36:54','ADD RESERVATION'),(142,'User 27 deleted a reservation. Reservation ID: 38','2014-02-26 00:40:33','DELETE RESERVATION'),(143,'User 27 deleted a reservation. Reservation ID: 37','2014-02-26 00:40:37','DELETE RESERVATION'),(144,'User 27 added reservation. Reservation ID: 39','2014-02-26 00:40:45','ADD RESERVATION'),(145,'User 27 added reservation. Reservation ID: 40','2014-02-26 00:40:55','ADD RESERVATION'),(146,'User 27 deleted a reservation. Reservation ID: 40','2014-02-26 00:42:34','DELETE RESERVATION'),(147,'User 27 deleted a reservation. Reservation ID: 39','2014-02-26 00:42:37','DELETE RESERVATION'),(148,'User 27 added reservation. Reservation ID: 41','2014-02-26 00:42:45','ADD RESERVATION'),(149,'User 27 added reservation. Reservation ID: 42','2014-02-26 00:42:53','ADD RESERVATION'),(150,'User 27 deleted a reservation. Reservation ID: 42','2014-02-26 00:44:34','DELETE RESERVATION'),(151,'User 27 deleted a reservation. Reservation ID: 41','2014-02-26 00:44:42','DELETE RESERVATION'),(152,'User 27 added reservation. Reservation ID: 43','2014-02-26 00:44:53','ADD RESERVATION'),(153,'User 27 added reservation. Reservation ID: 44','2014-02-26 00:45:04','ADD RESERVATION'),(154,'User 27 deleted a reservation. Reservation ID: 44','2014-02-26 00:51:08','DELETE RESERVATION'),(155,'User 27 deleted a reservation. Reservation ID: 43','2014-02-26 00:51:12','DELETE RESERVATION'),(156,'User 27 added reservation. Reservation ID: 45','2014-02-26 00:54:38','ADD RESERVATION'),(157,'User 27 added reservation. Reservation ID: 46','2014-02-26 00:54:48','ADD RESERVATION'),(158,'::1 logged in. <br/> Email :test3@test.com','2014-02-26 01:50:50','LOG IN'),(159,'User 27 deleted a reservation. Reservation ID: 46','2014-02-26 01:51:18','DELETE RESERVATION'),(160,'User 27 deleted a reservation. Reservation ID: 45','2014-02-26 01:51:21','DELETE RESERVATION'),(161,'User 27 added reservation. Reservation ID: 47','2014-02-26 01:51:37','ADD RESERVATION'),(162,'User 27 added reservation. Reservation ID: 48','2014-02-26 01:51:51','ADD RESERVATION'),(163,'User 27 added reservation. Reservation ID: 49','2014-02-26 01:51:57','ADD RESERVATION'),(164,'User 27 deleted a reservation. Reservation ID: 49','2014-02-26 02:14:37','DELETE RESERVATION'),(165,'User 27 deleted a reservation. Reservation ID: 47','2014-02-26 02:14:39','DELETE RESERVATION'),(166,'User 27 deleted a reservation. Reservation ID: 48','2014-02-26 02:14:42','DELETE RESERVATION'),(167,'User 27 added reservation. Reservation ID: 50','2014-02-26 03:23:59','ADD RESERVATION'),(168,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 03:31:44','LOG IN'),(169,'::1 logged in. <br/> Email :test3@test.com','2014-02-26 03:37:14','LOG IN'),(170,'::1 logged in. <br/> Email :test@test.com','2014-02-26 04:00:38','LOG IN'),(171,'User 22 added a order to cart. Order ID: 58','2014-02-26 04:33:35','ADD ORDER TO CART'),(172,'User 22 checkout cart. Cart ID/Receipt #: 16','2014-02-26 04:33:42','CHECKOUT CART'),(173,'::1 logged in. <br/> Email :test@test.com','2014-02-26 04:45:32','LOG IN'),(174,'User 22 deleted a reservation. Reservation ID: 3','2014-02-26 05:41:24','DELETE RESERVATION'),(175,'User 22 deleted a reservation. Reservation ID: 4','2014-02-26 05:41:27','DELETE RESERVATION'),(176,'User 22 added reservation. Reservation ID: 51','2014-02-26 05:44:35','ADD RESERVATION'),(177,'User 22 added reservation. Reservation ID: 52','2014-02-26 05:44:47','ADD RESERVATION'),(178,'::1 logged in. <br/> Email :test3@test.com','2014-02-26 05:45:50','LOG IN'),(179,'User 27 added reservation. Reservation ID: 53','2014-02-26 05:46:06','ADD RESERVATION'),(180,'User 27 deleted a reservation. Reservation ID: 53','2014-02-26 05:48:07','DELETE RESERVATION'),(181,'User 27 deleted a reservation. Reservation ID: 50','2014-02-26 05:48:10','DELETE RESERVATION'),(182,'User 27 added reservation. Reservation ID: 54','2014-02-26 05:48:23','ADD RESERVATION'),(183,'User 27 added reservation. Reservation ID: 55','2014-02-26 05:48:30','ADD RESERVATION'),(184,'User 27 deleted a reservation. Reservation ID: 54','2014-02-26 05:49:27','DELETE RESERVATION'),(185,'User 27 deleted a reservation. Reservation ID: 55','2014-02-26 05:49:31','DELETE RESERVATION'),(186,'User 27 added reservation. Reservation ID: 56','2014-02-26 05:49:45','ADD RESERVATION'),(187,'User 27 added reservation. Reservation ID: 57','2014-02-26 05:49:57','ADD RESERVATION'),(188,'User 27 deleted a reservation. Reservation ID: 57','2014-02-26 05:51:21','DELETE RESERVATION'),(189,'User 27 deleted a reservation. Reservation ID: 56','2014-02-26 05:51:25','DELETE RESERVATION'),(190,'User 27 added reservation. Reservation ID: 58','2014-02-26 05:52:21','ADD RESERVATION'),(191,'User 27 added reservation. Reservation ID: 59','2014-02-26 05:52:41','ADD RESERVATION'),(192,'User 27 deleted a reservation. Reservation ID: 58','2014-02-26 05:54:32','DELETE RESERVATION'),(193,'User 27 deleted a reservation. Reservation ID: 59','2014-02-26 05:54:36','DELETE RESERVATION'),(194,'User 27 added reservation. Reservation ID: 60','2014-02-26 06:00:01','ADD RESERVATION'),(195,'User 27 added reservation. Reservation ID: 61','2014-02-26 06:00:09','ADD RESERVATION'),(196,'User 27 deleted a reservation. Reservation ID: 60','2014-02-26 06:01:58','DELETE RESERVATION'),(197,'User 27 deleted a reservation. Reservation ID: 61','2014-02-26 06:02:01','DELETE RESERVATION'),(198,'User 27 added reservation. Reservation ID: 62','2014-02-26 06:02:14','ADD RESERVATION'),(199,'User 27 added reservation. Reservation ID: 63','2014-02-26 06:02:22','ADD RESERVATION'),(200,'User 27 deleted a reservation. Reservation ID: 62','2014-02-26 06:05:26','DELETE RESERVATION'),(201,'User 27 deleted a reservation. Reservation ID: 63','2014-02-26 06:05:30','DELETE RESERVATION'),(202,'User 27 added reservation. Reservation ID: 64','2014-02-26 06:05:40','ADD RESERVATION'),(203,'User 27 added reservation. Reservation ID: 65','2014-02-26 06:05:48','ADD RESERVATION'),(204,'User 27 deleted a reservation. Reservation ID: 64','2014-02-26 06:06:20','DELETE RESERVATION'),(205,'User 27 deleted a reservation. Reservation ID: 65','2014-02-26 06:06:24','DELETE RESERVATION'),(206,'User 27 added reservation. Reservation ID: 66','2014-02-26 06:07:41','ADD RESERVATION'),(207,'User 27 added reservation. Reservation ID: 67','2014-02-26 06:07:53','ADD RESERVATION'),(208,'User 27 deleted a reservation. Reservation ID: 67','2014-02-26 06:09:27','DELETE RESERVATION'),(209,'User 27 deleted a reservation. Reservation ID: 66','2014-02-26 06:09:30','DELETE RESERVATION'),(210,'User 27 added reservation. Reservation ID: 68','2014-02-26 06:09:39','ADD RESERVATION'),(211,'User 27 added reservation. Reservation ID: 69','2014-02-26 06:09:45','ADD RESERVATION'),(212,'User 27 deleted a reservation. Reservation ID: 68','2014-02-26 06:14:17','DELETE RESERVATION'),(213,'User 27 deleted a reservation. Reservation ID: 69','2014-02-26 06:14:21','DELETE RESERVATION'),(214,'User 27 added reservation. Reservation ID: 70','2014-02-26 06:14:30','ADD RESERVATION'),(215,'User 27 added reservation. Reservation ID: 71','2014-02-26 06:14:37','ADD RESERVATION'),(216,'User 27 deleted a reservation. Reservation ID: 71','2014-02-26 06:15:22','DELETE RESERVATION'),(217,'User 27 deleted a reservation. Reservation ID: 70','2014-02-26 06:15:26','DELETE RESERVATION'),(218,'User 27 added reservation. Reservation ID: 72','2014-02-26 06:15:56','ADD RESERVATION'),(219,'User 27 added reservation. Reservation ID: 73','2014-02-26 06:16:02','ADD RESERVATION'),(220,'User 27 deleted a reservation. Reservation ID: 73','2014-02-26 06:17:10','DELETE RESERVATION'),(221,'User 27 deleted a reservation. Reservation ID: 72','2014-02-26 06:17:12','DELETE RESERVATION'),(222,'User 27 added reservation. Reservation ID: 74','2014-02-26 06:18:57','ADD RESERVATION'),(223,'User 27 deleted a reservation. Reservation ID: 74','2014-02-26 06:19:29','DELETE RESERVATION'),(224,'User 27 added reservation. Reservation ID: 75','2014-02-26 06:21:03','ADD RESERVATION'),(225,'User 27 added reservation. Reservation ID: 76','2014-02-26 06:21:12','ADD RESERVATION'),(226,'User 27 deleted a reservation. Reservation ID: 76','2014-02-26 06:22:46','DELETE RESERVATION'),(227,'User 27 deleted a reservation. Reservation ID: 75','2014-02-26 06:22:49','DELETE RESERVATION'),(228,'User 27 added reservation. Reservation ID: 77','2014-02-26 06:23:00','ADD RESERVATION'),(229,'::1 logged in. <br/> Email :test@test.com','2014-02-26 07:05:52','LOG IN'),(230,'User 22 deleted a order. Order ID: 58','2014-02-26 07:06:35','DELETED ORDER'),(231,'User 22 added a order to cart. Order ID: 59','2014-02-26 07:07:21','ADD ORDER TO CART'),(232,'User 22 added a order to cart. Order ID: 60','2014-02-26 07:07:32','ADD ORDER TO CART'),(233,'::1 logged in. <br/> Email :test@test.com','2014-03-01 07:08:13','LOG IN'),(234,'User 22 added a order to cart. Order ID: 61','2014-02-26 07:08:57','ADD ORDER TO CART'),(235,'User 22 added a order to cart. Order ID: 62','2014-02-26 07:35:26','ADD ORDER TO CART'),(236,'::1 logged in. <br/> Email :test@test.com','2014-02-26 07:54:41','LOG IN'),(237,'::1 logged in. <br/> Email :test@test.com','2014-02-27 07:55:10','LOG IN'),(238,'::1 logged in. <br/> Email :test3@test.com','2014-02-27 08:04:20','LOG IN'),(239,'User 27 added reservation. Reservation ID: 78','2014-02-27 08:34:15','ADD RESERVATION'),(240,'User 27 deleted a reservation. Reservation ID: 78','2014-02-27 08:37:28','DELETE RESERVATION'),(241,'User 27 added reservation. Reservation ID: 79','2014-02-27 08:39:36','ADD RESERVATION'),(242,'User 27 deleted a reservation. Reservation ID: 79','2014-02-27 08:42:23','DELETE RESERVATION'),(243,'User 27 added reservation. Reservation ID: 80','2014-02-27 08:42:36','ADD RESERVATION'),(244,'User 27 deleted a reservation. Reservation ID: 77','2014-02-27 08:44:18','DELETE RESERVATION'),(245,'User 27 added reservation. Reservation ID: 81','2014-02-27 08:44:29','ADD RESERVATION'),(246,'User 27 deleted a reservation. Reservation ID: 81','2014-02-27 08:45:23','DELETE RESERVATION'),(247,'User 27 added reservation. Reservation ID: 82','2014-02-27 08:45:38','ADD RESERVATION'),(248,'User 27 added reservation. Reservation ID: 83','2014-02-27 08:47:00','ADD RESERVATION'),(249,'User 27 added reservation. Reservation ID: 84','2014-02-27 08:49:08','ADD RESERVATION'),(250,'User 27 deleted a reservation. Reservation ID: 84','2014-02-27 08:50:16','DELETE RESERVATION'),(251,'User 27 added reservation. Reservation ID: 85','2014-02-27 08:54:07','ADD RESERVATION'),(252,'User 27 deleted a reservation. Reservation ID: 85','2014-02-27 08:54:51','DELETE RESERVATION'),(253,'User 27 deleted a reservation. Reservation ID: 83','2014-02-27 08:54:55','DELETE RESERVATION'),(254,'User 27 added reservation. Reservation ID: 86','2014-02-27 08:59:22','ADD RESERVATION'),(255,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-27 09:07:35','LOG IN'),(256,'::1 logged in. <br/> Email :test3@test.com','2014-02-27 09:17:27','LOG IN'),(257,'User 27 added reservation. Reservation ID: 87','2014-02-27 09:27:10','ADD RESERVATION'),(258,'User 27 added reservation. Reservation ID: 88','2014-02-27 09:28:12','ADD RESERVATION'),(259,'User 27 updated a reservation. Reservation ID: 87','2014-02-27 09:36:15','UPDATE RESERVATION'),(260,'User 27 updated a reservation. Reservation ID: 88','2014-02-27 09:38:44','UPDATE RESERVATION'),(261,'User 27 deleted a reservation. Reservation ID: 87','2014-02-27 09:40:14','DELETE RESERVATION'),(262,'User 27 added reservation. Reservation ID: 89','2014-02-27 09:41:04','ADD RESERVATION'),(263,'User 27 deleted a reservation. Reservation ID: 88','2014-02-27 09:42:20','DELETE RESERVATION'),(264,'User 27 deleted a reservation. Reservation ID: 89','2014-02-27 09:42:29','DELETE RESERVATION'),(265,'User 27 added reservation. Reservation ID: 90','2014-02-27 09:43:17','ADD RESERVATION'),(266,'User 27 added reservation. Reservation ID: 91','2014-02-27 09:44:45','ADD RESERVATION'),(267,'::1 logged in. <br/> Email :test5@test.com','2014-02-27 09:47:55','LOG IN'),(268,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-27 09:53:47','LOG IN'),(269,'::1 logged in. <br/> Email :test5@test.com','2014-02-27 09:55:39','LOG IN'),(270,'User 30 added reservation. Reservation ID: 92','2014-02-27 09:56:17','ADD RESERVATION'),(271,'User 30 added reservation. Reservation ID: 93','2014-02-27 09:57:09','ADD RESERVATION'),(272,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-27 09:58:19','LOG IN'),(273,'::1 logged in. <br/> Email :test5@test.com','2014-02-27 10:00:03','LOG IN'),(274,'User 30 added a order to cart. Order ID: 63','2014-02-27 10:02:09','ADD ORDER TO CART'),(275,'User 30 added a order to cart. Order ID: 64','2014-02-27 10:02:14','ADD ORDER TO CART'),(276,'User 30 checkout cart. Cart ID/Receipt #: 1','2014-02-27 10:02:23','CHECKOUT CART'),(277,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-27 10:06:55','LOG IN'),(278,'::1 logged in. <br/> Email :test@test.com','2014-02-26 02:45:11','LOG IN'),(279,'::1 logged in. <br/> Email :test@test.com','2014-02-26 02:45:50','LOG IN'),(280,'User 22 added a order to cart. Order ID: 65','2014-02-26 02:48:46','ADD ORDER TO CART'),(281,'::1 logged in. <br/> Email :test@test.com','2014-02-28 02:50:13','LOG IN'),(282,'User 22 added a order to cart. Order ID: 66','2014-02-26 02:50:47','ADD ORDER TO CART'),(283,'User 22 checkout cart. Cart ID/Receipt #: 16','2014-02-26 02:50:51','CHECKOUT CART'),(284,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 02:51:18','LOG IN'),(285,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 02:53:51','LOG IN'),(286,'::1 logged in. <br/> Email :test@test.com','2014-02-26 02:56:49','LOG IN'),(287,'User 22 added a order to cart. Order ID: 67','2014-02-26 02:56:58','ADD ORDER TO CART'),(288,'User 22 checkout cart. Cart ID/Receipt #: 17','2014-02-26 02:57:01','CHECKOUT CART'),(289,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 03:00:22','LOG IN'),(290,'::1 logged in. <br/> Email :test@test.com','2014-02-26 03:02:37','LOG IN'),(291,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 03:06:26','LOG IN'),(292,'::1 logged in. <br/> Email :test@test.com','2014-02-26 05:50:06','LOG IN'),(293,'User 22 added a order to cart. Order ID: 68','2014-02-26 05:50:15','ADD ORDER TO CART'),(294,'User 22 checkout cart. Cart ID/Receipt #: 18','2014-02-26 05:50:22','CHECKOUT CART'),(295,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 05:52:18','LOG IN'),(296,'::1 logged in. <br/> Email :test@test.com','2014-02-26 05:53:06','LOG IN'),(297,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 05:54:33','LOG IN'),(298,'::1 logged in. <br/> Email :test@test.com','2014-02-26 07:57:06','LOG IN'),(299,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 08:16:05','LOG IN'),(300,'::1 logged in. <br/> Email :test@test.com','2014-02-26 08:55:52','LOG IN'),(301,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 08:56:10','LOG IN'),(302,'::1 logged in. <br/> Email :test@test.com','2014-02-26 08:57:24','LOG IN'),(303,'::1 logged in. <br/> Email :test@test.com','2014-02-26 08:57:51','LOG IN'),(304,'User 22 added a order to cart. Order ID: 69','2014-02-26 09:00:24','ADD ORDER TO CART'),(305,'User 22 added a order to cart. Order ID: 70','2014-02-26 09:03:16','ADD ORDER TO CART'),(306,'User 22 checkout cart. Cart ID/Receipt #: 19','2014-02-26 09:03:27','CHECKOUT CART'),(307,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 09:03:42','LOG IN'),(308,'::1 logged in. <br/> Email :test@test.com','2014-02-26 09:10:35','LOG IN'),(309,'::1 logged in. <br/> Email :test@test.com','2014-02-26 03:24:20','LOG IN'),(310,'User 22 added a order to cart. Order ID: 71','2014-02-26 03:40:57','ADD ORDER TO CART'),(311,'User 22 checkout cart. Cart ID/Receipt #: 20','2014-02-26 03:41:03','CHECKOUT CART'),(312,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 03:41:19','LOG IN'),(313,'::1 logged in. <br/> Email :test@test.com','2014-02-26 03:48:58','LOG IN'),(314,'User 22 added a order to cart. Order ID: 72','2014-02-26 03:49:07','ADD ORDER TO CART'),(315,'User 22 checkout cart. Cart ID/Receipt #: 21','2014-02-26 03:49:12','CHECKOUT CART'),(316,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 03:49:37','LOG IN'),(317,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 04:11:26','LOG IN'),(318,'::1 logged in. <br/> Email :test@test.com','2014-02-26 04:21:12','LOG IN'),(319,'User 22 added a order to cart. Order ID: 73','2014-02-26 04:21:29','ADD ORDER TO CART'),(320,'User 22 checkout cart. Cart ID/Receipt #: 22','2014-02-26 04:21:33','CHECKOUT CART'),(321,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 04:21:49','LOG IN'),(322,'::1 logged in. <br/> Email :test@test.com','2014-02-26 04:40:25','LOG IN'),(323,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 04:46:15','LOG IN'),(324,'::1 logged in. <br/> Email :test@test.com','2014-02-26 04:52:48','LOG IN'),(325,'User 22 checkout cart. Cart ID/Receipt #: 22','2014-02-26 04:53:19','CHECKOUT CART'),(326,'User 22 checkout cart. Cart ID/Receipt #: 22','2014-02-26 04:58:15','CHECKOUT CART'),(327,'::1 logged in. <br/> Email :test@test.com','2014-02-26 05:07:27','LOG IN'),(328,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 05:07:47','LOG IN'),(329,'::1 logged in. <br/> Email :test@test.com','2014-02-26 05:08:38','LOG IN'),(330,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 05:17:03','LOG IN'),(331,'::1 logged in. <br/> Email :test@test.com','2014-02-26 05:21:02','LOG IN'),(332,'User 22 checkout cart. Cart ID/Receipt #: 22','2014-02-26 05:28:29','CHECKOUT CART'),(333,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 06:13:45','LOG IN'),(334,'::1 logged in. <br/> Email :test@test.com','2014-02-26 06:20:03','LOG IN'),(335,'::1 logged in. <br/> Email :test3@test.com','2014-02-26 06:20:47','LOG IN'),(336,'User 27 checkout cart. Cart ID/Receipt #: 1','2014-02-26 06:21:31','CHECKOUT CART'),(337,'::1 logged in. <br/> Email :test3@test.com','2014-02-26 06:22:01','LOG IN'),(338,'User 27 checkout cart. Cart ID/Receipt #: 1','2014-02-26 06:24:41','CHECKOUT CART'),(339,'User 27 checkout cart. Cart ID/Receipt #: 1','2014-02-26 06:24:48','CHECKOUT CART'),(340,'User 27 added a order to cart. Order ID: 74','2014-02-26 06:25:20','ADD ORDER TO CART'),(341,'User 27 checkout cart. Cart ID/Receipt #: 1','2014-02-26 06:25:27','CHECKOUT CART'),(342,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 06:25:58','LOG IN'),(343,'::1 logged in. <br/> Email :test@test.com','2014-02-26 06:28:52','LOG IN'),(344,'::1 logged in. <br/> Email :test3@test.com','2014-02-26 06:29:09','LOG IN'),(345,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 06:31:42','LOG IN'),(346,'::1 logged in. <br/> Email :test@test.com','2014-02-26 06:33:32','LOG IN'),(347,'User 22 added a order to cart. Order ID: 75','2014-02-26 06:33:41','ADD ORDER TO CART'),(348,'User 22 added a order to cart. Order ID: 76','2014-02-26 06:33:45','ADD ORDER TO CART'),(349,'User 22 checkout cart. Cart ID/Receipt #: 23','2014-02-26 06:33:51','CHECKOUT CART'),(350,'::1 logged in. <br/> Email :superadmin@admin.com','2014-02-26 06:34:23','LOG IN'),(351,'::1 logged in. <br/> Email :test@test.com','2014-02-26 06:35:31','LOG IN');
/*!40000 ALTER TABLE `audit_trail` ENABLE KEYS */;
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
INSERT INTO `products` VALUES (1,'ALLOPURINOL tablet 300mg, 100/box. Sold per tab.',4944,10,'Tablets and Capsules'),(2,'ALUMINUM HYDROXIDE MAGNESIUM HYDROXIDE tablet 200mg/100mg, 100/box.Sold per tab.',2970,10,'Tablets and Capsules'),(13,'sample',111,122,'Tablet Capsules'),(14,'Gerald',19,12,'Capsules and Tablets'),(15,'sample',0,23,'Vitamins'),(16,'Virmel',98,100,'Vitamins');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
  `petType` varchar(45) DEFAULT NULL,
  `petGender` varchar(10) DEFAULT NULL,
  `petHistory` varchar(100) DEFAULT NULL,
  `userId` int(10) DEFAULT NULL,
  PRIMARY KEY (`objectId`),
  KEY `userId` (`userId`),
  CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`objectId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pets`
--

LOCK TABLES `pets` WRITE;
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` VALUES (1,'allan','allan','male','history',28),(2,'allan','allan','male','history',28),(3,'Virmel','Doglas','Malefe','sample',30),(4,'Virmel','Doglas','Malefe','sample',30),(5,'Virmel','Doglas','Malefe','sample',30),(6,'Virmel','Doglas','Malefe','sample',30),(7,'Virmel','Doglas','Malefe','sample',30),(8,'Virmel','Doglas','Malefe','sample',30),(9,'Virmel','Doglas','Malefe','sample',30),(10,'Virmel','Doglas','Malefe','sample',30),(11,'Virmel','Doglas','Malefe','sample',30),(12,'Virmel','Doglas','Malefe','sample',30),(13,'Virmel','Doglas','Malefe','sample',30),(14,'Virmel','Doglas','Malefe','sample',30),(15,'Virmel','Doglas','Malefe','sample',30),(16,'Virmel','Doglas','Malefe','sample',30),(17,'Virmel','Doglas','Malefe','sample',30),(18,'Virmel','Doglas','Malefe','sample',30),(19,'Virmel','Doglas','Malefe','sample',30),(20,'Virmel','Doglas','Malefe','sample',30),(21,'Virmel','Doglas','Malefe','sample',30),(22,'Virmel','Doglas','Malefe','sample',30),(23,'Virmel','Doglas','Malefe','sample',30);
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;
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
INSERT INTO `services` VALUES (1,1,'Amputation of leg 1-10k aw brad','Surgery',8000),(2,1,'Amputation of leg 11-20kg','Surgery',10000),(3,1,'Amputation of leg 20-30kg','Surgery',12000),(4,1,'Amputation of leg 35 and up','Surgery',15000),(5,3,'Anal Gland Flushing','Surgery',500),(6,3,'Castration CAT (CARA)','Surgery',800),(7,3,'Pin Removal + Sedation','Surgery',2000),(8,1,'SAMPLE','Other',100),(9,1,'SAMPLE2','Other',100);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-26 14:40:25
