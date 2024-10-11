-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: php_proyectos
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `login_usuarios`
--

DROP TABLE IF EXISTS `login_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_usuarios`
--

LOCK TABLES `login_usuarios` WRITE;
/*!40000 ALTER TABLE `login_usuarios` DISABLE KEYS */;
INSERT INTO `login_usuarios` VALUES (1,'Nicolas','niko.veloso.15@gmail.com','$2y$10$gZZPn/.zZTmfK60yzkN5y.dEy15CO6utUsxp2n3qMHF9Ec7aUIfqm','','2024-10-07 21:37:09','2024-10-11 18:39:00'),(2,'Carlos','carlos@gmail.com','$2y$10$S7j9ISIJqizPrS6fzihaEuYyWNtrADpLF7QmeZXC7SyBZt8hCPloG','','2024-10-07 21:39:00','2024-10-07 21:39:00'),(3,'Fernando','fernando@gmail.com','$2y$10$jdlzQ1/v5BJsKR1Js//LhuXEtMXyE8Ss3xbMtS2mH.xBV1Zlmh08i','','2024-10-07 21:43:18','2024-10-07 21:43:18'),(4,'Javiera','javiera@gmail.com','$2y$10$.V4FGN6oPSwSb2vvRFpA5.Sd4/wusaB5nH1ZwYcI.pxsoO2b1CLvS','','2024-10-07 21:44:20','2024-10-07 21:44:20'),(5,'Loreto','loreto@gmail.com','$2y$10$AFDVlDEVdXQa222mWgNdBuoEctZgNHDsOJ0Ikxiw2IJJEYlCLXg5u','','2024-10-07 22:02:27','2024-10-07 22:02:27'),(6,'Felix','felix@gmail.com','$2y$10$2OqGny0kj8Z.5wY7hLPdh.lTd5Ffr11ojBV0fWQxL.mbGcHWHlVey','','2024-10-07 22:03:34','2024-10-07 22:03:34'),(7,'Luis','luis@gmail.com','$2y$10$ipg1EXFan8B8y/b3x5aWBOf1KsFxJPp2Bwf6m44/im4UQnArQix1K','','2024-10-07 22:13:10','2024-10-07 22:13:10');
/*!40000 ALTER TABLE `login_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-11 18:05:33
