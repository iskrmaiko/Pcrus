-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: shopping
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` varchar(45) DEFAULT NULL,
  `review_text` varchar(45) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_reviews`
--

LOCK TABLES `product_reviews` WRITE;
/*!40000 ALTER TABLE `product_reviews` DISABLE KEYS */;
INSERT INTO `product_reviews` VALUES (1,'1','GOOD!',4),(2,'2','GOOD!',5),(3,'3','GOOD!',4),(4,'4','GOOD!',4),(5,'5','GOOD!',5),(6,'6','BAD.',2),(7,'7','BAD.',3),(8,'8','BAD.',2),(9,'9','BAD.',1),(10,'10','BAD.',1),(11,'1','VERY GOOD!',5),(12,'1','BAD.',1);
/*!40000 ALTER TABLE `product_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `ram` varchar(100) DEFAULT NULL,
  `hdd` varchar(100) DEFAULT NULL,
  `processor` varchar(100) DEFAULT NULL,
  `screen_size` varchar(100) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` varchar(100) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Acer','8GB','1TB','core i5','15 inches','DOS','Acer Predator','120000','images/acer-1.jpg'),(2,'Acer','6GB','500GB','core i5','11 inches','Windows 8','Acer Laptop','85000','images/acer-2.jpg'),(3,'Asus','16GB','500GB','core i3','15 inches','DOS','Asus Laptop','90000','images/asus.jpg'),(4,'Dell','6GB','500GB','core i5','11 inches','Windows 8','Dell Inspiron','100000','images/dell-1.jpg'),(5,'Lenovo','8GB','2TB','core i5','11 inches','Windows 11','Lenovo Yoga','70000','images/lenovo.jpg'),(6,'Dell','8GB','1TB','core i3','12 inches','Ubuntu','Dell Laptop','150000','images/dell-2.jpg'),(7,'MSI','16GB','500GB','core i3','15 inches','Windows 11','MSI Laptop','80000','images/msi.jpg'),(8,'Toshiba','4GB','500GB','core i5','12 inches','Ubuntu','Toshiba Laptop','95000','images/toshiba.jpg'),(9,'HP','6GB','2TB','core i3','15 inches','Windows 10','HP Laptop','80000','images/hp.jpg'),(10,'Mac','16GB','1TB','core i3','15 inches','Mac OS','Macbook','150000','images/mac.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-12 18:49:18
