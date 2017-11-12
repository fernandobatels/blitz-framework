-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: testes_blitz
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'teste','1231321'),(2,'More test','content'),(3,'Teste','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non mollis neque. Fusce aliquam diam aliquet sem suscipit ullamcorper. Mauris ut tincidunt lacus. Curabitur vitae euismod massa, at faucibus dui. Etiam ut urna neque. Fusce quis purus gravida, tristique nibh ut, condimentum elit. Curabitur condimentum neque turpis, at porttitor elit viverra ut. Pellentesque maximus pharetra sapien, eget auctor justo iaculis in. Nulla massa felis, laoreet et sem ac, faucibus auctor nisi. Nam blandit eget mi id commodo. Ut mollis arcu nec mauris consequat mattis. Mauris suscipit eleifend justo at consectetur. Aenean ultricies eros ut arcu commodo dignissim at et risus. Praesent consectetur aliquam nisl in eleifend. Cras varius, enim in efficitur hendrerit, metus velit rhoncus lorem, at finibus lorem nunc vitae dolor. Pellentesque fringilla commodo tristique.\r\n\r\nNunc semper rutrum elit at dapibus. Donec laoreet felis at dignissim consequat. Ut rhoncus nisi turpis, in aliquam metus maximus vel. Duis ullamcorper iaculis lobortis. Proin neque ex, pellentesque sed suscipit in, commodo ac quam. Nam non gravida magna. Nulla vel fringilla augue. Sed cursus fringilla tellus, vel convallis est ornare sed. Curabitur vitae magna sed odio bibendum convallis vel vitae nisi. Sed convallis id magna rhoncus rhoncus. Nunc eget mi ut massa mollis pretium. Vivamus id sodales tortor. Cras tincidunt augue vel sceleri'),(4,'Lorem','orem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non mollis neque. Fusce aliquam diam aliquet sem suscipit ullamcorper. Mauris ut tincidunt lacus. Curabitur vitae euismod massa, at faucibus dui. Etiam ut urna neque. Fusce quis purus gravida, tristique nibh ut, condimentum elit. Curabitur condimentum neque turpis, at porttitor elit viverra ut. Pellentesque maximus pharetra sapien, eget auctor justo iaculis in. Nulla massa felis, laoreet et sem ac, faucibus auctor nisi. Nam blandit eget mi id commodo. Ut mollis arcu nec mauris consequat mattis. Mauris suscipit eleifend justo at consectetur. Aenean ultricies eros ut arcu commodo dignissim at et risus. Praesent consectetur aliquam nisl in eleifend. Cras varius, enim in efficitur hendrerit, metus velit rhoncus lorem, at finibus lorem nunc vitae dolor. Pellentesque fringilla commodo tristique.\r\n\r\nNunc semper rutrum elit at dapibus. Donec laoreet felis at dignissim consequat. Ut rhoncus nisi turpis, in aliquam metus maximus vel. Duis ullamcorper iaculis lobortis. Proin neque ex, pellentesque sed suscipit in, commodo ac quam. Nam non gravida magna. Nulla vel fringilla augue. Sed cursus fringilla tellus, vel convallis est ornare sed. Curabitur vitae magna sed odio bibendum convallis vel vitae nisi. Sed convallis id magna rhoncus rhoncus. Nunc eget mi ut massa mollis pretium. Vivamus id sodales tortor. Cras tincidunt augue vel sceleri');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-12 20:35:00
