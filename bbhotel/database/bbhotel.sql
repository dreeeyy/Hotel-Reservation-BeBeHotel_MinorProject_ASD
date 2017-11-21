-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `user_type` set('Super Admin','Admin','Customer') NOT NULL,
  `action` varchar(30) NOT NULL,
  `changedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (16,'Audrey','Taghoy','Customer','INSERT','2017-11-20 11:33:41'),(14,'Pinky','Corpin','Customer','DELETE','2017-11-20 11:36:04'),(12,'Dannah','Sanda','Customer','UPDATE','2017-11-20 11:44:55'),(17,'Pinky','Corpin','Super Admin','INSERT','2017-11-20 23:07:45'),(1,'Super','Admin','Super Admin','UPDATE','2017-11-20 23:10:23'),(17,'Pinky','Corpin','Super Admin','UPDATE','2017-11-20 23:10:45'),(12,'Dannah Rose','Sanda','Customer','UPDATE','2017-11-21 09:24:29'),(12,'Dannah','Sanda','Customer','UPDATE','2017-11-21 09:24:55'),(18,'Pinky','Corpin','Customer','INSERT','2017-11-21 16:16:02');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promocodes`
--

DROP TABLE IF EXISTS `promocodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promocodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(64) DEFAULT NULL,
  `type` set('Seasonal Promotions','Packages','Events','Loyalty Programs') DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `code` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocodes`
--

LOCK TABLES `promocodes` WRITE;
/*!40000 ALTER TABLE `promocodes` DISABLE KEYS */;
INSERT INTO `promocodes` VALUES (1,'Christmas Discount','Seasonal Promotions',5,'TSIRHC25');
/*!40000 ALTER TABLE `promocodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `promo_code` varchar(8) DEFAULT NULL,
  `payment_method` set('Payment Card','Cash Payment','Personal Check','Direct Billing') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,1,12,'2018-07-25','2019-02-02','SIRHC25','Payment Card'),(2,2,12,'2017-03-25','2018-02-25','SIRHC07','Payment Card'),(3,1,12,'2018-02-25','2019-02-25','','Cash Payment'),(4,1,12,'2019-02-25','2020-03-23','','Cash Payment'),(5,5,12,'2019-02-03','2020-02-09','TSIRHC25','Cash Payment'),(6,2,12,'2017-03-03','2018-03-03','','Cash Payment'),(7,1,12,'2019-05-05','2020-04-04','','Cash Payment'),(8,3,12,'2017-02-24','2018-02-01','','Direct Billing'),(9,1,12,'2019-02-24','2020-02-22','','Cash Payment'),(10,1,12,'2019-02-23','2020-02-23','','Cash Payment'),(11,1,12,'2016-08-21','2016-09-21','','Payment Card'),(12,6,12,'2011-02-02','2013-02-02','','Direct Billing'),(13,1,12,'2017-11-16','2017-11-25','','Direct Billing'),(14,2,12,'2017-11-25','0017-07-20','','Personal Check');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(32) NOT NULL,
  `price` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'Diamond Suite (Premier)',6300,4),(2,'Diamond Suite (Deluxe)',6600,2),(3,'Suite (Premier)',5500,6),(4,'Suite (Deluxe)',5900,4),(5,'Junior Suite (Premier)',4200,6),(6,'Junior Suite (Deluxe)',4400,4),(7,'Room (Premier)',2100,10),(8,'Room (Deluxe)',2500,8);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(10) DEFAULT NULL,
  `pword` varchar(32) DEFAULT NULL,
  `fname` varchar(32) DEFAULT NULL,
  `lname` varchar(32) DEFAULT NULL,
  `mnumber` varchar(11) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `gender` set('Female','Male') DEFAULT NULL,
  `user_type` set('Super Admin','Admin','Customer') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'superadmin','superadmin','Super','Admin','911','Island Garden City of Samal','Male','Super Admin'),(12,'dannah','dannah','Dannah Rose','Sanda','09876543212','Marawi','Female','Customer'),(16,'audrey','audrey','Audrey','Taghoy','09472847','Acacia','Female','Customer'),(17,'super','super','Pinky','Corpin','09234145','Lanao del Sur','Female','Super Admin'),(18,'pinky','corpinh','Pinky','Corpin','09378133821','Mandug, Davao City','Female','Customer');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger after_users_insert
after insert on users
for each row
begin
insert into logs (id, fname, lname, user_type, action, changedon)
values (NEW.id, NEW.fname, NEW.lname, NEW.user_type, 'INSERT', NOW());
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger before_users_update
before update on users
for each row
begin
insert into logs (id, fname, lname, user_type, action, changedon)
values (OLD.id, OLD.fname, OLD.lname, OLD.user_type, 'UPDATE', NOW());
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger before_users_delete
before delete on users
for each row
begin
insert into logs (id, fname, lname, user_type, action, changedon)
values (OLD.id, OLD.fname, OLD.lname, OLD.user_type, 'DELETE', NOW());
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-21 18:52:53
