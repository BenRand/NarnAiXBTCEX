CREATE DATABASE  IF NOT EXISTS `nxid1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `nxid1`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: nxid1.cqkst7excckq.us-west-2.rds.amazonaws.com    Database: nxid1
-- ------------------------------------------------------
-- Server version	5.6.13-log

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `user_guid` varchar(45) NOT NULL,
  `user_email_authenticated` varchar(45) DEFAULT NULL,
  `user_email_token` varchar(45) DEFAULT NULL,
  `user_email_token_expires` varchar(45) DEFAULT NULL,
  `user_registration` varchar(45) DEFAULT NULL,
  `user_newpass` varchar(45) DEFAULT NULL,
  `user_editcount` int(11) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `salt` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'prophetnite','prophet','mycoolpass','prophet@prophetnite.com','lakjshdflkjashfjklsh',NULL,NULL,NULL,NULL,NULL,0,'nite','73cf6cd3f1a1a951cdb89384972f8c46a3ce7a70','saltmotherfucker'),(2,'testuser2','bob','YUPHASHED','bob@localhost.com','jkhiuywiruyweriuyweriu',NULL,NULL,NULL,NULL,NULL,1,'walkers','36f1e900c36d725931a91daa020296869b153829','saltmotherfucker'),(3,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'saltmotherfucker');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-08 18:28:56
