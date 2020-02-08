-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Video Games'),(2,'Hardware'),(3,'Development');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `comments_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `post_id` int NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`comments_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (3,4,28,'2020-02-06','Test'),(4,4,27,'2020-02-06','Test'),(5,5,28,'2020-02-06','Excellent !'),(6,5,20,'2020-02-06','salut !');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `image_dir` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (13,'Blog post 2','2020-02-05 10:20:00',5,'5e395fc943204.jpg',1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis est a varius fermentum. Fusce feugiat sollicitudin convallis. Etiam elementum, lectus non euismod venenatis, elit purus egestas lorem, non fermentum enim elit eu diam. Cras ut nulla interdum, porta purus ac, aliquam mi. Nullam vitae mauris iaculis felis aliquet dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum orci lacus, sodales ut nisl id, mollis condimentum leo. Pellentesque eleifend sodales velit eu ornare. Etiam sit amet magna sit amet sapien varius mattis. Vivamus sollicitudin turpis commodo erat condimentum hendrerit. Nullam lacinia viverra neque, eu consequat lacus eleifend quis. Mauris in pulvinar justo, in fermentum neque. Maecenas tellus diam, consectetur eu urna in, dignissim elementum eros. Mauris sit amet velit nec urna suscipit volutpat. Nam interdum, libero a mattis consectetur, odio tortor pulvinar ante, sollicitudin euismod velit leo eget risus. Phasellus quis augue non tellus convallis dictum in id risus. Cras efficitur lorem sit amet luctus ultricies. Mauris vel dignissim lorem, id tincidunt lorem. Duis dictum, nisl et sagittis tincidunt, arcu metus rhoncus risus, suscipit tincidunt orci risus id purus. Etiam sit amet mauris ac tellus gravida dictum. Donec nulla dolor, rhoncus pretium mauris at, semper auctor enim. Aenean venenatis imperdiet blandit. Ut nec quam dolor. Sed dignissim odio a venenatis luctus. Nulla maximus nunc sed orci porttitor convallis. Quisque in massa eu tellus dignissim consectetur. Nam efficitur quam et dui mollis blandit.\r\n\r\n'),(14,'Blog post 1','2020-02-05 10:20:00',4,'img.png',2,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis est a varius fermentum. Fusce feugiat sollicitudin convallis. Etiam elementum, lectus non euismod venenatis, elit purus egestas lorem, non fermentum enim elit eu diam. Cras ut nulla interdum, porta purus ac, aliquam mi. Nullam vitae mauris iaculis felis aliquet dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum orci lacus, sodales ut nisl id, mollis condimentum leo. Pellentesque eleifend sodales velit eu ornare. Etiam sit amet magna sit amet sapien varius mattis. Vivamus sollicitudin turpis commodo erat condimentum hendrerit. Nullam lacinia viverra neque, eu consequat lacus eleifend quis. Mauris in pulvinar justo, in fermentum neque. Maecenas tellus diam, consectetur eu urna in, dignissim elementum eros. Mauris sit amet velit nec urna suscipit volutpat. Nam interdum, libero a mattis consectetur, odio tortor pulvinar ante, sollicitudin euismod velit leo eget risus. Phasellus quis augue non tellus convallis dictum in id risus. Cras efficitur lorem sit amet luctus ultricies. Mauris vel dignissim lorem, id tincidunt lorem. Duis dictum, nisl et sagittis tincidunt, arcu metus rhoncus risus, suscipit tincidunt orci risus id purus. Etiam sit amet mauris ac tellus gravida dictum. Donec nulla dolor, rhoncus pretium mauris at, semper auctor enim. Aenean venenatis imperdiet blandit. Ut nec quam dolor. Sed dignissim odio a venenatis luctus. Nulla maximus nunc sed orci porttitor convallis. Quisque in massa eu tellus dignissim consectetur. Nam efficitur quam et dui mollis blandit.'),(20,'Blog post 3','2020-02-05 10:20:00',4,'img.png',3,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis est a varius fermentum. Fusce feugiat sollicitudin convallis. Etiam elementum, lectus non euismod venenatis, elit purus egestas lorem, non fermentum enim elit eu diam. Cras ut nulla interdum, porta purus ac, aliquam mi. Nullam vitae mauris iaculis felis aliquet dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum orci lacus, sodales ut nisl id, mollis condimentum leo. Pellentesque eleifend sodales velit eu ornare. Etiam sit amet magna sit amet sapien varius mattis. Vivamus sollicitudin turpis commodo erat condimentum hendrerit. Nullam lacinia viverra neque, eu consequat lacus eleifend quis. Mauris in pulvinar justo, in fermentum neque. Maecenas tellus diam, consectetur eu urna in, dignissim elementum eros. Mauris sit amet velit nec urna suscipit volutpat. Nam interdum, libero a mattis consectetur, odio tortor pulvinar ante, sollicitudin euismod velit leo eget risus. Phasellus quis augue non tellus convallis dictum in id risus. Cras efficitur lorem sit amet luctus ultricies. Mauris vel dignissim lorem, id tincidunt lorem. Duis dictum, nisl et sagittis tincidunt, arcu metus rhoncus risus, suscipit tincidunt orci risus id purus. Etiam sit amet mauris ac tellus gravida dictum. Donec nulla dolor, rhoncus pretium mauris at, semper auctor enim. Aenean venenatis imperdiet blandit. Ut nec quam dolor. Sed dignissim odio a venenatis luctus. Nulla maximus nunc sed orci porttitor convallis. Quisque in massa eu tellus dignissim consectetur. Nam efficitur quam et dui mollis blandit.'),(21,'Blog post 4','2020-02-05 10:20:00',4,'5e394d9e90b75.jpg',1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis est a varius fermentum. Fusce feugiat sollicitudin convallis. Etiam elementum, lectus non euismod venenatis, elit purus egestas lorem, non fermentum enim elit eu diam. Cras ut nulla interdum, porta purus ac, aliquam mi. Nullam vitae mauris iaculis felis aliquet dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum orci lacus, sodales ut nisl id, mollis condimentum leo. Pellentesque eleifend sodales velit eu ornare. Etiam sit amet magna sit amet sapien varius mattis. Vivamus sollicitudin turpis commodo erat condimentum hendrerit. Nullam lacinia viverra neque, eu consequat lacus eleifend quis. Mauris in pulvinar justo, in fermentum neque. Maecenas tellus diam, consectetur eu urna in, dignissim elementum eros. Mauris sit amet velit nec urna suscipit volutpat. Nam interdum, libero a mattis consectetur, odio tortor pulvinar ante, sollicitudin euismod velit leo eget risus. Phasellus quis augue non tellus convallis dictum in id risus. Cras efficitur lorem sit amet luctus ultricies. Mauris vel dignissim lorem, id tincidunt lorem. Duis dictum, nisl et sagittis tincidunt, arcu metus rhoncus risus, suscipit tincidunt orci risus id purus. Etiam sit amet mauris ac tellus gravida dictum. Donec nulla dolor, rhoncus pretium mauris at, semper auctor enim. Aenean venenatis imperdiet blandit. Ut nec quam dolor. Sed dignissim odio a venenatis luctus. Nulla maximus nunc sed orci porttitor convallis. Quisque in massa eu tellus dignissim consectetur. Nam efficitur quam et dui mollis blandit.'),(27,'Test','2020-02-05 17:24:11',4,'5e3afa3b47da7.png',2,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis est a varius fermentum. Fusce feugiat sollicitudin convallis. Etiam elementum, lectus non euismod venenatis, elit purus egestas lorem, non fermentum enim elit eu diam. Cras ut nulla interdum, porta purus ac, aliquam mi. Nullam vitae mauris iaculis felis aliquet dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum orci lacus, sodales ut nisl id, mollis condimentum leo. Pellentesque eleifend sodales velit eu ornare. Etiam sit amet magna sit amet sapien varius mattis. Vivamus sollicitudin turpis commodo erat condimentum hendrerit. Nullam lacinia viverra neque, eu consequat lacus eleifend quis. Mauris in pulvinar justo, in fermentum neque. Maecenas tellus diam, consectetur eu urna in, dignissim elementum eros. Mauris sit amet velit nec urna suscipit volutpat. Nam interdum, libero a mattis consectetur, odio tortor pulvinar ante, sollicitudin euismod velit leo eget risus. Phasellus quis augue non tellus convallis dictum in id risus. Cras efficitur lorem sit amet luctus ultricies. Mauris vel dignissim lorem, id tincidunt lorem. Duis dictum, nisl et sagittis tincidunt, arcu metus rhoncus risus, suscipit tincidunt orci risus id purus. Etiam sit amet mauris ac tellus gravida dictum. Donec nulla dolor, rhoncus pretium mauris at, semper auctor enim. Aenean venenatis imperdiet blandit. Ut nec quam dolor. Sed dignissim odio a venenatis luctus. Nulla maximus nunc sed orci porttitor convallis. Quisque in massa eu tellus dignissim consectetur. Nam efficitur quam et dui mollis blandit.'),(28,'Blog Post 5','2020-02-06 12:38:54',4,'5e3c08de859d5.jpg',3,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis est a varius fermentum. Fusce feugiat sollicitudin convallis. Etiam elementum, lectus non euismod venenatis, elit purus egestas lorem, non fermentum enim elit eu diam. Cras ut nulla interdum, porta purus ac, aliquam mi. Nullam vitae mauris iaculis felis aliquet dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum orci lacus, sodales ut nisl id, mollis condimentum leo. Pellentesque eleifend sodales velit eu ornare. Etiam sit amet magna sit amet sapien varius mattis. Vivamus sollicitudin turpis commodo erat condimentum hendrerit. Nullam lacinia viverra neque, eu consequat lacus eleifend quis. Mauris in pulvinar justo, in fermentum neque. Maecenas tellus diam, consectetur eu urna in, dignissim elementum eros. Mauris sit amet velit nec urna suscipit volutpat. Nam interdum, libero a mattis consectetur, odio tortor pulvinar ante, sollicitudin euismod velit leo eget risus. Phasellus quis augue non tellus convallis dictum in id risus. Cras efficitur lorem sit amet luctus ultricies. Mauris vel dignissim lorem, id tincidunt lorem. Duis dictum, nisl et sagittis tincidunt, arcu metus rhoncus risus, suscipit tincidunt orci risus id purus. Etiam sit amet mauris ac tellus gravida dictum. Donec nulla dolor, rhoncus pretium mauris at, semper auctor enim. Aenean venenatis imperdiet blandit. Ut nec quam dolor. Sed dignissim odio a venenatis luctus. Nulla maximus nunc sed orci porttitor convallis. Quisque in massa eu tellus dignissim consectetur. Nam efficitur quam et dui mollis blandit.');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int NOT NULL DEFAULT '0',
  `redactor` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Loick','test@lol.fr','$2y$10$iTVCffdN4Xnr89.t8zkaH..s5ThGyXmaSnmOePFa4C0OXgQTADlly',1,1),(5,'Romane','lol2@test.fr','$2y$10$j3CmlD2DzTi17TsRMpCHputQLV.kjaSJ4jto1f/wf.R1tefToLJ3K',0,1),(6,'Thomas','lol3@test.fr','$2y$10$9l5cGPEuyI4fr2MfnOeYJO7lMRegyBTZDXQOHIbqcJ9/MRyeUKDwK',0,0),(7,'Michel','michel@test.fr','$2y$10$mPYVhUEIZsJlOMiouYl17OWaiC9eib4XZ2UWgH./a1GMAnvGEfZWG',0,0);
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

-- Dump completed on 2020-02-08 11:58:38
