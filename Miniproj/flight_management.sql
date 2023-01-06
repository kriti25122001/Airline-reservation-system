-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: flight_management
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `airline_sch`
--

DROP TABLE IF EXISTS `airline_sch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `airline_sch` (
  `flight_id` varchar(10) NOT NULL,
  `orig` varchar(30) DEFAULT NULL,
  `dest` varchar(30) DEFAULT NULL,
  `dept` timestamp NULL DEFAULT NULL,
  `arriv` timestamp NULL DEFAULT NULL,
  `vacant_ec` int DEFAULT NULL,
  `fare_ec` int DEFAULT NULL,
  `vacant_buis` int DEFAULT NULL,
  `fare_buis` double(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airline_sch`
--

LOCK TABLES `airline_sch` WRITE;
/*!40000 ALTER TABLE `airline_sch` DISABLE KEYS */;
INSERT INTO `airline_sch` VALUES ('IA228-34','jaipur','lucknow','2023-01-07 00:55:00','2023-01-07 03:15:00',35,20000,4,50000.00),('IA228-35','lucknow','kolkata','2023-01-07 04:30:00','2023-01-07 07:30:00',61,11250,8,35000.00),('IA237-16','bengaluru','prayagraj','2023-01-10 07:45:00','2023-01-06 13:00:00',34,27000,2,91000.00),('IA237-17','prayagraj','shimla','2023-01-10 14:50:00','2023-01-06 17:15:00',31,13000,8,84000.00),('IA246-65','kochi','delhi','2023-01-10 20:40:00','2023-01-11 02:20:00',38,18000,8,91000.00),('IA246-66','delhi','lucknow','2023-01-11 04:30:00','2023-01-11 07:00:00',64,15000,5,61000.00),('IA264-81','hyderabad','mumbai','2023-01-07 17:45:00','2023-01-07 19:45:00',67,37000,9,76000.00),('IA264-82','mumbai','surat','2023-01-07 21:50:00','2023-01-08 00:25:00',37,25000,6,84000.00),('IA271-53','bengaluru','kolkata','2023-01-08 07:45:00','2023-01-08 11:00:00',16,46000,2,96000.00),('IA271-54','kolkata','jaipur','2023-01-08 13:05:00','2023-01-08 16:50:00',86,21000,8,53000.00),('IA274-64','delhi','surat','2023-01-09 00:30:00','2023-01-09 03:00:00',24,34000,5,56000.00),('IA274-65','surat','mumbai','2023-01-09 06:50:00','2023-01-09 08:30:00',53,35000,18,40000.00);
/*!40000 ALTER TABLE `airline_sch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `login_username` varchar(50) DEFAULT NULL,
  `flight` varchar(50) DEFAULT NULL,
  `class` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES ('biny','IA228-34','Economy');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `Cust_name` varchar(25) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `login_username` varchar(20) NOT NULL,
  PRIMARY KEY (`login_username`),
  UNIQUE KEY `email` (`email`) USING BTREE,
  CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`login_username`) REFERENCES `login` (`Login_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES ('kriti vajpayee','female','kriti43@gmail.com','8795536603','_kriti_'),('neha maurya','female','neha90@gmail.com','8239536603','_neha_m'),('Binyamin','male','binyamin42@gmail.com','8986518806','biny'),('kasak vaish','female','kasak09@gmail.com','835696603','kasak_va'),('Lanika','female','lanik5@gmail.com','9630452713','lan'),('matthew','male','matthewcz@gmail.com','9874632054','matt7'),('mina','female','mina5@gmail.com','9654120358','mina_k_'),('mohd shuaib zahid','male','to.shuaib@gmail.com','8795886603','shuaibz');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `Login_username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Login_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('_kriti_','vajkriti'),('_neha_m','nehamaurya'),('biny','biny080'),('kasak_va','kasakvaish'),('lan','alfian'),('matt7','baltimore'),('mina_k_','kodibinayatar'),('shuaibz','shuaibzahid');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-06 11:55:46
