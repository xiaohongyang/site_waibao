-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: xhy_blog
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '管理员名称',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '登录密码',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Prof. Jettie Greenholt','gutmann.alfonzo@example.org','$2y$10$fOsauNuPOxh9Kx0r/I0YuO3sIP3sS7zCWbLxvp6tScH0iVOJ8H7N.','0xqN05EGnHVq99UYHZCg5mvxtsVjIhJLgfUWZwszCpYbtcEdKobHWZ9lWL2v','2017-06-15 22:44:07','2017-06-15 22:44:07'),(2,'Judge Turner','emely.rau@example.net','$2y$10$fOsauNuPOxh9Kx0r/I0YuO3sIP3sS7zCWbLxvp6tScH0iVOJ8H7N.','ViuAIi2tF1','2017-06-15 22:44:07','2017-06-15 22:44:07'),(3,'Ross Cormier','lupe.schulist@example.com','$2y$10$fOsauNuPOxh9Kx0r/I0YuO3sIP3sS7zCWbLxvp6tScH0iVOJ8H7N.','tKE1n1RT49','2017-06-15 22:44:07','2017-06-15 22:44:07');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_detail`
--

DROP TABLE IF EXISTS `article_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_id` int(11) NOT NULL DEFAULT '0' COMMENT 'article table primary key value',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_detail`
--

LOCK TABLES `article_detail` WRITE;
/*!40000 ALTER TABLE `article_detail` DISABLE KEYS */;
INSERT INTO `article_detail` VALUES (1,'<p>321321444w&#39;f&#39;t情况3333</p>',1),(2,'‘’',5),(3,'‘’',6),(4,'‘’',7),(5,'‘’',8),(6,'text content',10),(7,'text content',11),(8,'text content',12),(9,'text content',13),(10,'text content',14),(11,'text content',15),(12,'text content',16),(13,'text content',17),(14,'text content',18),(15,'text content',19),(16,'text content',20),(17,'text content',21),(18,'text content',22),(19,'text content',23),(20,'text content',24),(21,'text content',25),(22,'text content',26),(23,'text content',27),(24,'text content',28),(25,'text content',29),(26,'text content',30),(27,'text content',31),(28,'text content',32),(29,'text content',33),(30,'text content',34),(31,'text content',35),(32,'text content',36),(33,'text content',37),(34,'text content',38),(35,'text content',39),(36,'<p>321</p>',73),(37,'<p>321abc333</p>',74),(38,'<p>321abc333<img src=\"/uploads/ueditor/php/upload/image/20170614/1497448170326386.png\" title=\"1497448170326386.png\" alt=\"z2.png\"/></p>',75);
/*!40000 ALTER TABLE `article_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_tag_relations`
--

DROP TABLE IF EXISTS `article_tag_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_tag_relations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL COMMENT '文章id',
  `tag_id` int(10) unsigned NOT NULL COMMENT 'tag id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_tag_relations`
--

LOCK TABLES `article_tag_relations` WRITE;
/*!40000 ALTER TABLE `article_tag_relations` DISABLE KEYS */;
INSERT INTO `article_tag_relations` VALUES (2,5,2),(3,6,2),(4,7,2),(5,8,2),(6,1,1),(7,10,2),(8,11,2),(9,12,2),(10,13,2),(11,14,2),(12,15,2),(13,16,2),(14,17,2),(15,18,2),(16,19,2),(17,20,2),(18,21,2),(19,22,2),(20,23,2),(21,24,2),(22,25,2),(23,26,2),(24,27,2),(25,28,2),(26,29,2),(27,30,2),(28,31,2),(29,32,2),(30,33,2),(31,34,2),(32,35,2),(33,36,2),(34,37,2),(35,38,2),(36,39,2),(37,73,2),(38,74,2),(39,75,2);
/*!40000 ALTER TABLE `article_tag_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_tags`
--

DROP TABLE IF EXISTS `article_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '标签名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_tags`
--

LOCK TABLES `article_tags` WRITE;
/*!40000 ALTER TABLE `article_tags` DISABLE KEYS */;
INSERT INTO `article_tags` VALUES (1,'321321'),(2,'');
/*!40000 ALTER TABLE `article_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_type`
--

DROP TABLE IF EXISTS `article_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '类别id',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '类别名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_type`
--

LOCK TABLES `article_type` WRITE;
/*!40000 ALTER TABLE `article_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) NOT NULL DEFAULT '' COMMENT '标题',
  `author` char(80) NOT NULL DEFAULT '' COMMENT '作者b',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id  -1为程序蜘蛛id',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `from_host` char(255) NOT NULL DEFAULT '' COMMENT '文章来源',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '类别id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'test001','5','2017-05-28 01:58:48','2017-05-28 01:58:48',NULL,2,'uploads/article_thumb/20170528015826.jpg','',0),(2,'test add article .1496133651','5','2017-05-30 08:40:52','2017-05-30 08:40:52',NULL,2,'test add article thumb','1',1),(3,'test','5','2017-05-30 08:43:34','2017-05-30 08:43:34',NULL,2,'‘’','‘’',1),(4,'test','5','2017-05-30 08:44:28','2017-05-30 08:44:28',NULL,2,'‘’','‘’',1),(5,'test','5','2017-05-30 08:44:33','2017-05-30 08:44:33',NULL,2,'‘’','‘’',1),(6,'test','5','2017-05-30 08:48:14','2017-05-30 08:48:14',NULL,2,'‘’','‘’',1),(7,'test','5','2017-05-30 08:48:19','2017-05-30 08:48:19',NULL,2,'‘’','',1),(8,'test','5','2017-05-30 08:50:53','2017-05-30 08:50:53',NULL,2,'‘’','',1),(9,'test add article .1496135570','5','2017-05-30 09:12:50','2017-05-30 09:12:50',NULL,2,'test add article thumb','3',1),(10,'jack test','5','2017-06-03 08:33:58','2017-06-03 08:33:58',NULL,2,'','',0),(11,'jack test','5','2017-06-03 08:35:32','2017-06-03 08:35:32',NULL,2,'','',0),(12,'jack test','5','2017-06-03 08:36:52','2017-06-03 08:36:52',NULL,2,'','',0),(13,'jack test','5','2017-06-03 08:48:01','2017-06-03 08:48:01',NULL,2,'','',0),(14,'jack test','5','2017-06-03 08:50:06','2017-06-03 08:50:06',NULL,2,'','',0),(15,'jack test','5','2017-06-03 08:52:24','2017-06-03 08:52:24',NULL,2,'','',0),(16,'jack test','5','2017-06-03 08:54:46','2017-06-03 08:54:46',NULL,2,'','',0),(17,'jack test','5','2017-06-03 08:55:15','2017-06-03 08:55:15',NULL,2,'','',0),(18,'jack test','5','2017-06-03 13:25:42','2017-06-03 13:25:42',NULL,2,'','',0),(19,'jack test','5','2017-06-03 13:27:19','2017-06-03 13:27:19',NULL,2,'','',0),(20,'jack test','5','2017-06-03 13:28:02','2017-06-03 13:28:02',NULL,2,'','',0),(21,'jack test','5','2017-06-03 13:35:52','2017-06-03 13:35:52',NULL,2,'','',0),(22,'jack test','5','2017-06-03 13:48:30','2017-06-03 13:48:30',NULL,2,'','',0),(23,'jack test','5','2017-06-03 13:51:44','2017-06-03 13:51:44',NULL,2,'','',0),(24,'jack test','5','2017-06-03 13:53:33','2017-06-03 13:53:33',NULL,2,'','',0),(25,'jack test','5','2017-06-03 13:54:59','2017-06-03 13:54:59',NULL,2,'','',0),(26,'jack test','5','2017-06-03 13:55:59','2017-06-03 13:55:59',NULL,2,'','',0),(27,'jack test','5','2017-06-03 13:57:04','2017-06-03 13:57:04',NULL,2,'','',0),(28,'jack test','5','2017-06-03 13:59:53','2017-06-03 13:59:53',NULL,2,'','',0),(29,'jack test','5','2017-06-03 14:02:28','2017-06-03 14:02:28',NULL,2,'','',0),(30,'jack test','5','2017-06-03 14:56:51','2017-06-03 22:36:40','2017-06-03 22:36:40',2,'','',0),(31,'jack test','5','2017-06-03 14:57:15','2017-06-03 15:11:00','2017-06-03 15:11:00',2,'','',0),(32,'jack test','5','2017-06-03 15:11:45','2017-06-03 15:11:45','2017-06-03 15:11:45',2,'','',0),(33,'jack test','5','2017-06-03 15:12:37','2017-06-03 15:12:37','2017-06-03 15:12:37',2,'','',0),(34,'jack test','5','2017-06-03 15:12:55','2017-06-03 15:12:55',NULL,2,'','',0),(35,'jack test','5','2017-06-03 15:12:56','2017-06-03 15:12:56','2017-06-03 15:12:56',2,'','',0),(36,'jack test','5','2017-06-03 22:02:56','2017-06-03 22:02:57','2017-06-03 22:02:57',2,'','',0),(37,'jack test','5','2017-06-03 22:04:21','2017-06-03 22:04:21',NULL,2,'','',0),(38,'jack test','5','2017-06-03 22:04:50','2017-06-03 22:04:50','2017-06-03 22:04:50',2,'','',0),(39,'jack test','5','2017-06-03 22:32:33','2017-06-03 22:32:34','2017-06-03 22:32:34',2,'','',0),(72,'Test Job','tester','2017-06-04 08:24:26','2017-06-04 08:24:26',NULL,1,'','',0),(73,'test','5','2017-06-14 13:48:02','2017-06-14 13:48:02',NULL,2,'uploads/article_thumb/20170614134750.png','',0),(74,'test','5','2017-06-14 13:48:28','2017-06-14 13:48:28',NULL,2,'uploads/article_thumb/20170614134750.png','',0),(75,'test','5','2017-06-14 13:49:38','2017-06-14 13:49:38',NULL,2,'uploads/article_thumb/20170614134750.png','',0);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_messages`
--

DROP TABLE IF EXISTS `chat_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_messages`
--

LOCK TABLES `chat_messages` WRITE;
/*!40000 ALTER TABLE `chat_messages` DISABLE KEYS */;
INSERT INTO `chat_messages` VALUES (1,'test',1,'2017-05-23 14:54:41','2017-05-23 14:54:41'),(2,'test',1,'2017-05-23 15:39:48','2017-05-23 15:39:48'),(3,'test',1,'2017-05-23 15:40:09','2017-05-23 15:40:09'),(4,'test',1,'2017-05-23 15:40:43','2017-05-23 15:40:43');
/*!40000 ALTER TABLE `chat_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2017_02_13_045545_create_articles_table',1),(9,'2017_02_13_091010_add_article_deleted_at_column',1),(10,'2017_02_22_094317_add_user_id_column_for_table_article',1),(11,'2017_02_23_082914_create_jobs_table',1),(12,'2017_02_24_060929_create_failed_jobs_table',1),(13,'2017_03_01_023124_create_chat_messages_table',1),(14,'2017_03_02_081343_create_cache_table',1),(15,'2017_03_15_004115_create_notifications_table',1),(16,'2017_03_23_094102_create_article_detail_table',2),(17,'2017_03_23_095036_add_thumb_field_to_articles',2),(18,'2017_03_28_091631_add_article_id_to_article_detail',2),(19,'2017_04_05_061912_create_article_tags_table',2),(20,'2017_04_05_063458_article_tag_relations',2),(21,'2017_04_10_065612_add_from__host_column_to_article_table',2),(22,'2017_04_10_070418_alter_table_article_for_column_type',2),(23,'2017_04_10_071221_create_article_type_table',2),(24,'2017_04_10_073900_add_type_id_column_to_article_table',2),(25,'2017_04_20_070406_modify_article_user_id_column',2),(26,'2017_04_28_122909_change_remember_token_column_to_api_token_for_table_user',2),(27,'2017_04_28_125603_add_remember_token_column_for_table_users',2),(28,'2017_06_15_055303_create_admins_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('00c2bdc68d991f466a5e97891e003923648ac1aae7ca713fb569af805a4c70064c0892e525cb8199',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:48:37','2017-05-30 08:48:37','2018-05-30 08:48:37'),('00e684e1dda0ae85ae375670955695074f931dff08b1f6c8f31147e2e7e5c880bcefa29e4cf4797c',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:15:15','2017-05-30 06:15:15','2018-05-30 06:15:15'),('0120cda8450418734642fa5d0d7b11d4147ccde5ba43fec5330c04b8f8e6a792b9ee94bb93ff8aa5',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:59:53','2017-06-03 13:59:53','2018-06-03 13:59:53'),('018ea65ea227c5740b5dc1a8c4415b185b5c9aafc949df3560604d27f283a7b24a4c53b92155d2e0',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:31:31','2017-06-03 08:31:31','2018-06-03 08:31:31'),('01ace470c68be506e0e13d46d7934f0c004b1f0f0d7d55ce66c391585a517f95fe8c0de681f3ddc4',2,7,'http://laravel.54.com','[]',0,'2017-05-29 16:04:42','2017-05-29 16:04:42','2018-05-29 16:04:42'),('0684174955fc799746bc6e7ca6b4aa9639472e709bd897b7d7eeabbe4d49676bd141e3b5917d08de',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:29:54','2017-05-30 08:29:54','2018-05-30 08:29:54'),('073049543e90c2bad4a926d83985db01c97db3f6dd43c60e6907addea28240917e81e668e7794b9e',2,5,NULL,'[]',0,'2017-06-14 13:46:59','2017-06-14 13:46:59','2017-06-20 13:46:57'),('082776db202c22245e1f0c0042ada9fe6ecfa6fd6256cc0a231e7cab731fdc0fc43fdf722ed1fa08',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:09:02','2017-05-30 06:09:02','2018-05-30 06:09:02'),('08bb820232908758201f933e443d3e1f4e93231dbfd2b5e90d91f18d8538d676d86855676a2c63d9',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:10:51','2017-05-30 06:10:51','2018-05-30 06:10:51'),('0b74fa3a0eaefea14939b25d785d7e87956dd9b650626086b41d6759c31f470057195d92f3aec001',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:23:27','2017-05-30 05:23:27','2018-05-30 05:23:27'),('0b89ccb7619833138ab03d23144268e5a8e7554ce950b0309b77f3ed32a3fab9b50d617f0591eaeb',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:24:41','2017-05-30 05:24:41','2018-05-30 05:24:41'),('0bafad238d06d11b8610c18e4baa1e52e702f90700acf879a7e9555b57d11e16005286c29583bd11',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:25:35','2017-05-30 05:25:35','2018-05-30 05:25:35'),('0caa20e4b1c180944c7ce9c05a93e4594b58b5c2e7b97163b951621d5674b84e5e5c9cf1f04157a3',2,5,NULL,'[]',0,'2017-06-14 13:47:38','2017-06-14 13:47:38','2017-06-20 13:47:37'),('0dd8d188abe80f7daa3864acd5529574a8cd654b88b8e2640880241b71396d2fbd43fd05566ae0ab',2,5,NULL,'[]',0,'2017-06-14 16:42:52','2017-06-14 16:42:52','2017-06-20 16:42:52'),('0e3e6322c6ea7fbc5ad88a35f806d71a4f6b22cbaab978eb826ab579bfde8de7880363cccd49f5a7',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:33:58','2017-06-03 08:33:58','2018-06-03 08:33:58'),('0e7435ca726b5ea6cd5f8ed2e9028e7805fa39e2954ebc953ddd1b8119be0c82d56a9632ea12c3f0',2,5,NULL,'[]',0,'2017-06-14 16:23:27','2017-06-14 16:23:27','2017-06-20 16:23:26'),('0f4128b00693bcbe62135b168d30332a609108b6fd9c31870e359f27c4b5e06589fbf072ab9cc73c',2,5,NULL,'[]',0,'2017-06-03 05:02:01','2017-06-03 05:02:01','2017-06-03 05:04:59'),('0ff3443de375932d234cf7efb1067587dc595b97cd1a48246f0a3a2dda396e8b3b6f4400b67ccbfa',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:32:34','2017-05-30 08:32:34','2018-05-30 08:32:34'),('11515a45aa3b929c61d4048f6326ee454e3168479fe7f9bf6af5e5762e36df44aea0bd680e53b034',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:21:02','2017-05-29 23:21:02','2018-05-29 23:21:02'),('117d9adf05617c3b322a602822b233317db01b3763c6fd3c332b249199b248c808486366afc2f59a',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:17:27','2017-05-30 09:17:27','2018-05-30 09:17:27'),('11ec6d0bcc3922e644296c46118b5413020b282ba413b780634603c411594f3729b36e665fbf82b9',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:48:25','2017-05-29 23:48:25','2018-05-29 23:48:25'),('12009560022d4557fb4e47d5e36038b89696aa11e792965109890a56bfdd65082791cfaa361b60bf',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:29:54','2017-05-30 08:29:54','2018-05-30 08:29:54'),('12d727496015e8312913ad95bbf877f6e45c199cc09c04298cbb6c24b44949c9f49c51cc8be159ef',2,5,NULL,'[]',0,'2017-06-14 16:41:45','2017-06-14 16:41:45','2017-06-20 16:41:45'),('15c7ae0d26c838c1b45c7344fc051888662e931a9c95a27b96d6e23675271ff94a09983f16dac21f',2,5,NULL,'[]',0,'2017-06-14 16:11:02','2017-06-14 16:11:02','2017-06-20 16:11:02'),('1896c7e74c34bfb5191d48c65a8dbf66e69d19bf1615151630744e4e8a859a353453943d0d55a409',2,7,'http://laravel.54.com','[]',0,'2017-06-03 15:12:54','2017-06-03 15:12:54','2018-06-03 15:12:54'),('18d43ec2098588dbb8fd5bb7b32e0c5dc3e873d968493252f3ea8e54590f98d879b857d395fa1b48',2,5,NULL,'[]',0,'2017-06-03 05:40:10','2017-06-03 05:40:10','2017-06-03 05:43:09'),('199f9ca8f944e8edddae648b795e23cbe75ecb37d489b0f8a10505c8bd37b755897971d7fcd43a16',2,7,'http://laravel.54.com','[]',0,'2017-05-30 00:34:49','2017-05-30 00:34:49','2018-05-30 00:34:49'),('19c4c115b6c3b981a44082fe431e9404ac6198c0e2895e8fb0d767438ca5e7ba160ec1c8b4f06b9a',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:21:17','2017-05-30 05:21:17','2018-05-30 05:21:17'),('1a23c8e27b4726ea4923f79ecbcfd8f565d333851ee7560b14d17c5a7978174564c5deedd4a2640f',2,5,NULL,'[]',0,'2017-06-14 13:48:16','2017-06-14 13:48:16','2017-06-20 13:48:14'),('1adb9f8463ab6b11dbba9efe6bf745b45a91f9a295aa77c0e7e82b100e97a8b04ff14a587ad4a258',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:50:06','2017-06-03 08:50:06','2018-06-03 08:50:06'),('1b507cc9f63b253e20e8839db618d67dd80595467154ecc88a7adb883ef0aec3e32c499f9bc2f288',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:22:09','2017-05-30 05:22:09','2018-05-30 05:22:09'),('1bd56ffae289e96e88482ccbc9c898624fc3e894753ec1f2b2685c7c43761e099318112b605a9539',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:25:53','2017-05-30 05:25:53','2018-05-30 05:25:53'),('1c07967830816fb3856a846f208c75f0fc5ac1fa7a3dce9f37184f9ebcab1d33e5d7078c2b4daeeb',2,5,NULL,'[]',0,'2017-06-14 13:50:30','2017-06-14 13:50:30','2017-06-20 13:50:28'),('1f5ec463cc0682e16c9a213d2693db7ab1218f9621023c789948a853206ec51c5076adb2169fb093',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:52:23','2017-06-03 08:52:23','2018-06-03 08:52:23'),('1f67461c82d03b375e3d0bcdc6a776bfb0226d02abded7df16f0a168fa577a8498da6ead887f50f3',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:24:16','2017-05-30 09:24:16','2018-05-30 09:24:16'),('1fbaba826fb6cdf414804f7abea219bd1eaba9e390faeb654b79d693de6d71fb57b4438a012ffff9',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:09:46','2017-05-30 09:09:46','2018-05-30 09:09:46'),('1ff58c4448c5a20e28b7bcec67c68355e10bcaa309d7219f79476465cfeb13bcb6fa6734bae1f4b4',2,7,'http://laravel.54.com','[]',0,'2017-06-03 14:57:16','2017-06-03 14:57:16','2018-06-03 14:57:16'),('200cb57139484c2e385fe24736dbcd84f0021cbe366c967ffc3bee607738915210c122c617a3bc17',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:05:13','2017-05-30 09:05:13','2018-05-30 09:05:13'),('203398bcc2c4501f05086f80317bbd30be3dd90d0913908057b1e69cdd0bea5585b69df68de88a5b',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:12:50','2017-05-30 09:12:50','2018-05-30 09:12:50'),('206c7bd3287fdac8d36c5eb0564725c967eec67091acbc5bb8f7d6dddc696a4235d7f86ff2f4f9a1',2,5,NULL,'[]',0,'2017-06-14 16:10:03','2017-06-14 16:10:03','2017-06-20 16:10:02'),('20ba1e68ffb6eb6e1744e5ecd1425be113e0c77fea334080f5a9d2e416119bda726c2ce34d3addb5',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:28:10','2017-06-03 08:28:10','2018-06-03 08:28:10'),('21c2275d2df3ba35b5b24b3653e453813c66294792e7ee963beb4ab357cae5b75a7ada7f0fc4904a',2,5,NULL,'[]',0,'2017-06-14 16:17:33','2017-06-14 16:17:33','2017-06-20 16:17:32'),('23eba85b933b8adc9e7e866e9f80d549d8202a8796ae1a414c43e4b3adbba099c10a505bfb93f35c',2,5,NULL,'[]',0,'2017-06-14 16:05:41','2017-06-14 16:05:41','2017-06-20 16:05:41'),('24ae3616444516c11282de350525e29932dd16302bd8bb57abae23a011a21e3354040ed843394a0d',2,6,'http://laravel.54.com','[]',0,'2017-05-29 15:03:02','2017-05-29 15:03:02','2018-05-29 15:03:02'),('257d8b26d6375ee1cc02674e0628f6b87c2bdbbef2c064454314e2ef6016bfdd15b4e4849b111172',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:12:49','2017-05-30 09:12:49','2018-05-30 09:12:49'),('2633fdd54366b8ca69c575a7b197683e9aa802b1e8225580b18643f9863630fc6ae62bd6d7fd14b5',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:17:03','2017-05-30 06:17:03','2018-05-30 06:17:03'),('26727a7555e0636ed42483fabfafd28fa62d037ef9ed8fd6faeb844c0f072ae94ad205170398c2ae',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:12:15','2017-05-30 09:12:15','2018-05-30 09:12:15'),('2833a423cae0578efb0b2aa6c62ccab3bcc0e77cdc07bc64fc431215705e547a968fc8358ad65451',2,5,NULL,'[]',0,'2017-06-14 16:02:02','2017-06-14 16:02:02','2017-06-20 16:02:01'),('298f93edf0804c8982a3300c2ef9027e2eb38ddb39db7773da97118ea86cbfdd433494707e550aae',2,5,NULL,'[]',0,'2017-06-14 16:22:18','2017-06-14 16:22:18','2017-06-20 16:22:18'),('29f27d8c4c1a4815b0fd106994f263af95ed5984765a84dfd07f6dc23c76c601d026b9fd92450841',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:15:10','2017-05-30 09:15:10','2018-05-30 09:15:10'),('2af3f90dc436f1e36358a422d074e3121c4eb1025113fc7783c0e6e7e28e7130ecff8c316ac1ff37',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:26:41','2017-05-30 09:26:41','2018-05-30 09:26:41'),('2c18ece79ed48897bf65ff019c06afd88cdc0883889dcc261034c2980e1bc76e6115b3004b8745e1',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:27:19','2017-06-03 13:27:19','2018-06-03 13:27:19'),('2ca8e70f33b257a39231fb8c6e3c5c5d7a90b3906d5449c36579d5ac5541f23833b3befee838242f',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:28:20','2017-05-30 09:28:20','2018-05-30 09:28:20'),('2d0417e31a837ec7682ac90f9ab7aafdcc190726a3364da717b57e1faacd2b8da870ff5e827c4c87',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:55:14','2017-06-03 08:55:14','2018-06-03 08:55:14'),('2e33d3eb3dc2f2d59b8a724b88912683a95ec742d16f6ab929bcf86e9a5624b7fe9b0a662b1c2889',2,7,'http://laravel.54.com','[]',0,'2017-05-30 00:20:18','2017-05-30 00:20:18','2018-05-30 00:20:18'),('2f5205c3d9d3fdf846af765ca5f2bbc5349f1821c0a385e72021cf11cb6fc0fb8db3929d1f7daece',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:36:57','2017-05-30 08:36:57','2018-05-30 08:36:57'),('2face9d1e1e45ba51e3ef3da246d975d0419d7cc4d3fbe62c9adabb9dece2b541bcd57e72b4ccdb5',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:20:42','2017-05-30 05:20:42','2018-05-30 05:20:42'),('2fd10cff52501c0da5c538b6f143ae654f643924c88f55509c673290cb83fdb97a969100264daed4',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:09:36','2017-06-03 08:09:36','2018-06-03 08:09:36'),('314757e7d83d0cd68636cb6299b666d9e3ddc2986e204983e8f92a40c87b910189ee98bef65ecbea',2,5,NULL,'[]',0,'2017-06-03 07:30:23','2017-06-03 07:30:23','2017-06-03 07:33:23'),('31c4cb63ccbbb90450bf410748db87ff7a71e4652ea4e2688eb189476a72699a11f7f720e6352d69',2,5,NULL,'[]',0,'2017-06-03 05:30:11','2017-06-03 05:30:11','2017-06-03 05:33:11'),('31ecb83f7629b113bcd087ac9b766b6155c25c9c4049e26a8a0735e820b123958b6162c505c9f7de',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:54:58','2017-06-03 13:54:58','2018-06-03 13:54:58'),('32ddc6ad886631302a3c48537c31fe0b6af4a05132a8424e6a484931de925c95fa40ccdcd8fb8f97',2,5,NULL,'[]',0,'2017-06-14 16:26:41','2017-06-14 16:26:41','2017-06-20 16:26:40'),('3508daddab9bb53a6f39c8cf7a759c6ffe6dfff85dc7c752aeddbbe1b44fa3f2a4c1fad321b45823',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:09:20','2017-05-30 06:09:20','2018-05-30 06:09:20'),('35e95216aea7bd60dc54c5db907392afbad73f2fbc9e92d97fefb1e2632eb925b2c6cf1197f6f6d4',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:36:52','2017-06-03 08:36:52','2018-06-03 08:36:52'),('361e15ad31646fdb61ca120bd69681aa25a63d2fd6c9ad9d85d419d2b9660ad72c9784dcffe590d0',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:28:38','2017-05-30 09:28:38','2018-05-30 09:28:38'),('38336d06d573899d2befac8e9c266e2b85a493fb39674ce699e6d4b96be0365c146f1bcfc1169ed9',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:18:06','2017-05-30 05:18:06','2018-05-30 05:18:06'),('386fe9c3e56f94b1cf26e21baed08f0ab260d50c2387612c9d23ce615972d2abbc11ce64567686bb',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:36:58','2017-05-30 08:36:58','2018-05-30 08:36:58'),('3b3f62930e3a1a8d1a030ad7a1c1d748e74952ee977593553016687025d49a9b005d296f0d174d82',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:38:09','2017-05-29 23:38:09','2018-05-29 23:38:09'),('3b64d411b9dbb401e71f45e201063119e0927f5cbcd9e3fc017ff7686f2d63b0ef28b79dbc6a032f',2,5,NULL,'[]',0,'2017-06-14 15:35:38','2017-06-14 15:35:38','2017-06-20 15:35:37'),('3c0ab7966a0ec5edac34cfe2fbf63c0631688672764afecadc4da744f292f7558ffdee6e9d072cfc',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:16:53','2017-05-30 09:16:53','2018-05-30 09:16:53'),('3c4b2f4ad99a045f0bbb4767e23964746082607a83a0ab20a3b2cb916fcff104fab1938a2d37a032',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:11:15','2017-05-30 09:11:15','2018-05-30 09:11:15'),('3d0fd81646ad5d0aee50d3e4cba167c5370fba83b9c472ca38e7bb1006397f48ca0490030578995c',2,5,NULL,'[]',0,'2017-06-14 16:26:12','2017-06-14 16:26:12','2017-06-20 16:26:11'),('3d130000d32148e63f68d1debc4cbddbce7f2e42bc259aa98e63ab9c0c0d344c61d5cc9a638789df',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:40:51','2017-05-30 08:40:51','2018-05-30 08:40:51'),('3d43d3deb1d943ed7143360379bcf1b5b99ba27f7d0c4c31f924e0a7f5a689c5487114849249d4cd',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:33:36','2017-05-30 08:33:36','2018-05-30 08:33:36'),('3f4e71da444b0b4707001d68e56494761e6f63526db2086a03653cb3d137de324454c3292c58ffff',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:43:29','2017-05-29 23:43:29','2018-05-29 23:43:29'),('3f8a7fc8e12e49398d820435873e61fb5f4e13feeccdf57aa7cb90efd9fdd15a52d73baf0904c95c',2,2,NULL,'[]',0,'2017-05-29 15:32:33','2017-05-29 15:32:33','2017-05-29 15:35:33'),('405775f0a71dd3de97377efaf028bf4896faa789f17b89c9a5df5b6c152eae64c0498e165d8e36e7',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:41:42','2017-05-29 23:41:42','2018-05-29 23:41:42'),('413cd98c19312069393d176cd61eda5e76e78efab89aee3d9a379cabb5a3091b5c1f519965b32e63',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:57:04','2017-06-03 13:57:04','2018-06-03 13:57:04'),('43c1288e0b4217ac3bbe1490f9d49c89920749b6a6b7b1f160fc752229c331ac0d567a1e9395884c',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:15:09','2017-05-30 09:15:09','2018-05-30 09:15:09'),('449651521f1a51f0742fbec0d0b92b003dbe197f2e3a418ae7b07c641a06edadca40eee7fcdfa10c',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:16:52','2017-05-30 09:16:52','2018-05-30 09:16:52'),('44aa53240e81205d85272c1656446fc91640789ef0632de8937da3d66d804ecc2acb6ed71653fee9',2,2,NULL,'[]',0,'2017-05-29 15:58:32','2017-05-29 15:58:32','2017-05-29 16:01:32'),('45c06771f73f0cb7993671d397de12e64fd86747e8d02bedc250a1102e7362258381277fb800bdc1',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:24:51','2017-06-03 08:24:51','2018-06-03 08:24:51'),('4701a3c522206aee688a1085e989456d63c49c3b80fa491afecaf8f3092708fec96959f9a5c667ea',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:26:16','2017-05-30 05:26:16','2018-05-30 05:26:16'),('47a7852b005bccb8f3ef9217d50612560ad7a3b9827571d11d42e1663b981dfb3d76ef2327527533',2,7,'http://laravel.54.com','[]',0,'2017-05-30 00:31:30','2017-05-30 00:31:30','2018-05-30 00:31:30'),('48562f582736357def35e6abee5b68f03b35ac4659f2fa52d6ad5ada51d957b52f370cf93a6787d5',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:28:01','2017-06-03 13:28:01','2018-06-03 13:28:01'),('49270a688ae0b3296604483f9bab0605248f232bd4a108a4947df875645964766881e43d339b90c9',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:48:01','2017-06-03 08:48:01','2018-06-03 08:48:01'),('4a8a789cc463c774778c2486f7452db62b71d3bcf8e3fbfa00cc11092f4052b770c327ad3d67b99e',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:50:41','2017-05-30 08:50:41','2018-05-30 08:50:41'),('4a9687a342a4c948d41d1bedfa1efd289094ac32cdd9ccaa5f8843b172929fcf181569dbaba0ff0e',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:26:16','2017-05-30 09:26:16','2018-05-30 09:26:16'),('4dc30c6e41a1b6c2ab78f76299420c63a3e357f05f866bc5d04f5c919febb30e31d416f6dc014fc4',2,7,'http://laravel.54.com','[]',0,'2017-05-30 00:34:33','2017-05-30 00:34:33','2018-05-30 00:34:33'),('4dd0617230aa597fc425926ad6b3c3c1db5e7f3e77b22039c48c12ed4ddb5cf7328203b909d037f6',2,5,NULL,'[]',0,'2017-06-14 13:47:07','2017-06-14 13:47:07','2017-06-20 13:47:07'),('4f6c6b98ecf33dbc3fef4d1d6798b3f2f9ed578184d5e5a322d68b1adf018a5b196e284413cb5708',2,5,NULL,'[]',0,'2017-05-30 07:28:39','2017-05-30 07:28:39','2017-05-30 07:31:39'),('4fb79975395ae9bc8fd09126e9953ce09a4e5a48c78b9075e095110f51883a9d16dddb0e40036ba3',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:33:59','2017-06-03 08:33:59','2018-06-03 08:33:59'),('4fc45a8792dd1861356eacbe0a12e318b53239fef44ea6f2a30713f6d7957d69be9ac743c7daeaca',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:26:31','2017-05-30 05:26:31','2018-05-30 05:26:31'),('5022b0f98fc23a7499db0a5fc08b723327bf627f44ea4ff6632c9b6abfada60714168ac3dc40fa35',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:36:50','2017-06-03 08:36:50','2018-06-03 08:36:50'),('503bf5d23415ccf2b43f011d409481884e518d483722e872b0aecc048a27d5c0869f9b4c807fdb6a',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:48:55','2017-05-30 08:48:55','2018-05-30 08:48:55'),('52051310ab3e881fe7742a41e7df02299179f0a144bb450abcfdb0520b4d38c59b90dd0b815ac6fe',2,5,NULL,'[]',0,'2017-06-03 07:37:05','2017-06-03 07:37:05','2017-06-03 07:40:05'),('549b7bbed9e25141196353ffa36e092f7f0285fec712fda7c239dd3eb1456116e0dd5c253052d643',2,7,'http://laravel.54.com','[]',0,'2017-05-30 00:28:51','2017-05-30 00:28:51','2018-05-30 00:28:51'),('5637724735b4a46d946c0f7c89386ac7e81e349ca3029481d12fadf9b9ec242d54a735dfb9b2eb86',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:13:29','2017-05-30 06:13:29','2018-05-30 06:13:29'),('5656f2df988398118babdbfe4335bbcd14932bd8bef05989e50e8fa30e8ed7d74de310b399b6cdcb',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:33:56','2017-06-03 08:33:56','2018-06-03 08:33:56'),('56a98d706ffe9893b71d977acb6280789090fa3a7a41714eefb86198b1f1b409eb1642f67189dd36',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:09:46','2017-05-30 09:09:46','2018-05-30 09:09:46'),('570b075f4fa173b14b7e4c786a7f32c94ad5b63d9c7d7f711c271fa6a2108f06941ae6b96a24655c',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:55:59','2017-06-03 13:55:59','2018-06-03 13:55:59'),('573b102859ec0964765db2825aa5e1c91ceda735496ff5df134ca002ee02c73dbd6d46dd891a9505',2,7,'http://laravel.54.com','[]',0,'2017-05-30 00:30:04','2017-05-30 00:30:04','2018-05-30 00:30:04'),('583344537b696dda5da08def586f681b293e416f51355dfe9ee48f19efcecc654a6c9d14794c8f8a',2,5,NULL,'[]',0,'2017-06-14 16:22:40','2017-06-14 16:22:40','2017-06-20 16:22:39'),('592998e3fc1bb03c171cb41d8c294cd8f31942e0dfa3571a751c8bb4ee4d083ba4f463d076a2c0da',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:37:42','2017-05-30 08:37:42','2018-05-30 08:37:42'),('5ba51532e49601686fdd3f419aa858d6593810d0fa6ab06999a2cfac915df9697c13b582106c8842',2,5,NULL,'[]',0,'2017-06-14 16:02:11','2017-06-14 16:02:11','2017-06-20 16:02:11'),('5ba7a03e3d60b96ba2649094d1e0848cc08ce533ec2b7a14ec853f14a64ee8c4abc2417ad873fa90',2,5,NULL,'[]',0,'2017-05-30 00:21:47','2017-05-30 00:21:47','2017-05-30 00:24:46'),('5ddd6024c4514dad9f960e7ea09373bab25ba5b29365723ad910bd422cbe585dc9c375f932a9127d',2,5,NULL,'[]',0,'2017-06-14 16:22:54','2017-06-14 16:22:54','2017-06-20 16:22:53'),('5e0c8328c5829cccacf78e7b6796db6a4fba68ac1f696463c012e7bd57519a42fced1244581aeefc',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:59:52','2017-06-03 13:59:52','2018-06-03 13:59:52'),('5e556dcc0f8189de78ef5db0e1675cb3ce74211dd8e224fbb0f430f5554820607e02c77d31035499',2,5,NULL,'[]',0,'2017-06-14 15:35:50','2017-06-14 15:35:50','2017-06-20 15:35:50'),('613f1c60e576d966c3f250582d7aa2f8ef764833758e78bdf7d1a463b7fba32b3d117b54833ad6f4',2,5,NULL,'[]',0,'2017-06-14 16:24:45','2017-06-14 16:24:45','2017-06-20 16:24:44'),('614815c18bd659286b057955a1ab38944e0b9a368f8cb89325ac0077619ab2ef94b1920af2615c96',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:36:49','2017-05-30 08:36:49','2018-05-30 08:36:49'),('61e9b8e8fc2a645b4d9ca86749352ce15581488597ca9c5d3115b924474a9d4ea1fa12de1ed7327a',2,7,'http://laravel.54.com','[]',0,'2017-06-03 15:12:56','2017-06-03 15:12:56','2018-06-03 15:12:56'),('62ad3a390980a3396d2adcf06504244f5b1ab59cd6cb4dbbb4ca99a5b61546016279bbd7a82c472e',2,7,'http://laravel.54.com','[]',0,'2017-06-03 14:02:29','2017-06-03 14:02:29','2018-06-03 14:02:29'),('632aee39260583d81aefb9791826baa6187574639cdb2e04a9c55bcdab5809686feb4a7555f37ada',2,7,'http://laravel.54.com','[]',0,'2017-06-03 14:56:52','2017-06-03 14:56:52','2018-06-03 14:56:52'),('64194a65f635364dc869771b0da1e9f6f278ebd60d4ec27db2e679b558f0231a001d58d51042d3ce',2,7,'http://laravel.54.com','[]',0,'2017-06-03 15:11:44','2017-06-03 15:11:44','2018-06-03 15:11:44'),('642e0bdb994abbad61cf3cea3fc66ee363530291f63c1614d1e0a50764afb6a452cf84cff5be7b7b',2,7,'http://laravel.54.com','[]',0,'2017-06-03 14:57:15','2017-06-03 14:57:15','2018-06-03 14:57:15'),('64a10c565d3d26399b3b7c862cfb2ba8bd1a1bddabf7c18f1000acfb751d0f5ed3d53e22de4c3519',2,5,NULL,'[]',0,'2017-06-03 05:39:51','2017-06-03 05:39:51','2017-06-03 05:42:50'),('64b3c3899a786ef6d539a012f33903156c5a34c1430a2e0bc9d882a7e4231e1725448880a5f64831',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:25:41','2017-06-03 13:25:41','2018-06-03 13:25:41'),('6520c5f37e5ce75741c072f4c1b31bbf4b5c59a12bf4a95bdc818a7f519fded7f148abf2d2cdec47',2,6,'http://laravel.54.com','[]',0,'2017-05-29 15:02:59','2017-05-29 15:02:59','2018-05-29 15:02:59'),('6535ab5032260b6a57dfd39a1ac791658ad76d8e380b09fba0149a2f45d5f7ff7bf0fcc5b8988fc1',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:20:59','2017-05-30 05:20:59','2018-05-30 05:20:59'),('65df427d4b4e43fd2dc4c7559bf226f92fce814231adce8652f593257a2a6655da302b2026c7e3b7',2,3,'http://laravel.54.com','[]',0,'2017-05-29 14:28:37','2017-05-29 14:28:37','2018-05-29 14:28:37'),('6739fe14e87cf673064aac7a096bc55a79f8130e7470da20b556f59a3271b241b9934ce0a07fbf53',2,5,NULL,'[]',0,'2017-06-15 22:01:41','2017-06-15 22:01:41','2017-06-21 22:01:40'),('677c218757fb0ad0712077539e71f21db3f9054230921cae887bc4070e7399ed720c5a687d83a9ac',2,7,'http://laravel.54.com','[]',0,'2017-06-03 22:04:20','2017-06-03 22:04:20','2018-06-03 22:04:20'),('687b39bf801a6ec46dfedb015d9856f3bfc99580d34da27111f501d22181752c9bdabd380db27ad1',2,5,NULL,'[]',0,'2017-06-03 08:00:04','2017-06-03 08:00:04','2017-06-03 08:03:03'),('69f596e9b6d4d845e8f29e2e426ece83cae07e56500901dcdb553e1a69f017079065258ce152cdb9',2,7,'http://laravel.54.com','[]',0,'2017-05-30 00:34:03','2017-05-30 00:34:03','2018-05-30 00:34:03'),('6be208f74a8dfc364226cb88d3db59888b021ea8d79f9025617638f01a2d615ceb04b03cca00c0bf',2,3,'http://laravel.54.com','[]',0,'2017-05-29 14:29:24','2017-05-29 14:29:24','2018-05-29 14:29:24'),('6dd2c9a7ee5db472dca93459f7a73886518fff548350b1d20705692c0b6287da64cc7efeecbcb010',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:42:14','2017-05-29 23:42:14','2018-05-29 23:42:14'),('6f02fbd991e36f6ebe5f8d8330c21e705930d441741d4d72c5f7e627f8a7db055f8da63207309d1a',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:13:16','2017-05-30 06:13:16','2018-05-30 06:13:16'),('6f57e091ef093b8d5d75cc85b4b878207b6791b3b75ddb0613b68a063b6931e92d0dc94332046536',2,5,NULL,'[]',0,'2017-06-14 16:18:56','2017-06-14 16:18:56','2017-06-20 16:18:55'),('70192b730d902896f51767f294181702b21ef8c01359bd190960f7406bc7afb33c067bc6cfc701a5',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:30:49','2017-06-03 08:30:49','2018-06-03 08:30:49'),('70a26346b73ad3c32771faea5a8e6ba8ae6df380c5b40400e79584deabbee849337aef9445711b3e',2,5,NULL,'[]',0,'2017-05-30 05:15:54','2017-05-30 05:15:54','2017-05-30 05:18:54'),('717e53c58ea6c5f61cae76fdc9cf06d61491ae84e06e6dbd78fe5527e891e8cf0f15b55dea6949de',2,5,NULL,'[]',0,'2017-06-14 16:12:44','2017-06-14 16:12:44','2017-06-20 16:12:43'),('72905e65f8174a8389b58f01981d6b76423514b74d72429bba9e971d01745531af859be9223e0d35',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:20:06','2017-06-03 08:20:06','2018-06-03 08:20:06'),('730ec977b3538182aa62734626b6308ae0a6c2f47de8025b3af0903040255ee94b17ae6d6443094f',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:15:46','2017-05-30 09:15:46','2018-05-30 09:15:46'),('73a612b8c931366b542fc2ca1c28e6dd19bb545f622506102492e3f027bbaea91bfb8c708a6a052e',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:28:41','2017-05-30 08:28:41','2018-05-30 08:28:41'),('7501b370190adbbeab9c5b6565e03964bac3e7628742042eb1542084d40cf3626d7b759ae34245f6',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:24:46','2017-05-30 05:24:46','2018-05-30 05:24:46'),('76aba56a18dbaf0f5fb2072738a67f22877408830cd8ae8ab57b8066ce76a2d429196e8d46974260',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:17:18','2017-05-30 06:17:18','2018-05-30 06:17:18'),('7741bd40e512850fa826904a278e32d1c0ea5ca63dcb4d49b53d3e20595305d1cc3837b459dbecf4',2,5,NULL,'[]',0,'2017-06-14 16:35:59','2017-06-14 16:35:59','2017-06-20 16:35:59'),('7782683d3402b59bbd630f58d44e430befa1150b5ff97f00dc39f061c43c418905a1740801d58db7',2,5,NULL,'[]',0,'2017-06-14 16:39:05','2017-06-14 16:39:05','2017-06-20 16:39:05'),('7851c23a94a081ace8fb8803ce1d7583e890fdbc9ee27104aa98a2a8553bdfc60e5a89f53d3dc0c3',2,5,NULL,'[]',0,'2017-06-14 16:08:18','2017-06-14 16:08:18','2017-06-20 16:08:18'),('7a2f0b6e62ffcd3a57a70c300588f88fe9055f225913aeca19367ded456c86b387b94f1c747e9d54',2,5,NULL,'[]',0,'2017-06-03 05:02:36','2017-06-03 05:02:36','2017-06-03 05:05:36'),('7bc02fd532ec393d876d8f3e8420b91ebe68ae8f0773054cb546d424e561497e37978b4a923ce5f5',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:22:39','2017-05-30 05:22:39','2018-05-30 05:22:39'),('7c2b4985b75bb6f29fe611ba2ec5334ff72fcd36ad8f4133c53b71a5dc16b2b53b9aa401a8c0b6fb',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:17:43','2017-05-30 05:17:43','2018-05-30 05:17:43'),('7cbb98c95ba767ae07faa3bf70aff189ab5926431abfb2220c422b571b2a6e4669a44c18d5b3d14a',2,7,'http://laravel.54.com:5000','[]',0,'2017-06-14 13:45:36','2017-06-14 13:45:36','2018-06-14 13:45:36'),('7de31e5d53849a5c17bed4751dee76d203f150a6b12372dc20b5da96b41f6879fb97a2526ec27a7f',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:40:50','2017-05-30 08:40:50','2018-05-30 08:40:50'),('7e6d3e1a1e726c251660f03ec0f85156361945f41e2846398654fe71eb0b0a8d8500b12e25a7cc00',2,5,NULL,'[]',0,'2017-06-03 05:25:38','2017-06-03 05:25:38','2017-06-03 05:28:38'),('7fc8da508c0e8727c2fd02763c652f6ae854d9f9ff1c8b89f12706b58fd623e60c9e6007f3b07573',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:04:51','2017-06-03 08:04:51','2018-06-03 08:04:51'),('7fd88c7c95d2ce666b7ca67725b91577836e7917d4d532656eb7758e48091ee1fdf96ae56ca5b73e',2,5,NULL,'[]',0,'2017-06-03 07:37:37','2017-06-03 07:37:37','2017-06-03 07:40:37'),('81f31f956f265d6e93f1bbcb38b8317f96fa1360715d5fa1983c3dfdd8568886ba0faf1758f94b83',2,5,NULL,'[]',0,'2017-06-14 16:17:03','2017-06-14 16:17:03','2017-06-20 16:17:03'),('821c30b63e59d997a8f3ca8fb0f5987399d10c8253d16cb319bd0c699f835545febf571fd8948213',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:35:33','2017-06-03 08:35:33','2018-06-03 08:35:33'),('827d3ac827da8338c82b79c0f73992b5f0a7a42ae7c4015e00be05ec56d83ed4238f0024c322830a',2,5,NULL,'[]',0,'2017-05-29 15:06:24','2017-05-29 15:06:24','2017-05-29 15:09:24'),('827ff30508464b4c08816bcf0ee1fabd3d96bbc62fca95f285f9deb6f46a79747947aeef9ba90ef8',2,5,NULL,'[]',0,'2017-06-03 14:57:29','2017-06-03 14:57:29','2017-06-03 15:00:29'),('83750296ed657605dd5c0e5acdbb1ccdc23a33e18033beb860d33d73ab2985f3e625662629c6c9e6',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:24:53','2017-05-30 05:24:53','2018-05-30 05:24:53'),('854271ff90e74f571f778ade89ee426a5e6a417cf435cd27687177d551fbabcbddd27ba41ee30e80',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:43:48','2017-05-29 23:43:48','2018-05-29 23:43:48'),('86c01dd04a667648ddb59d6e0c053e8de1157517097fc83dd0acdbcdd41ffaa956293bbb8ab27540',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:30:45','2017-05-30 08:30:45','2018-05-30 08:30:45'),('870b7ed9ea74a61c488ad0bc4df430c4174af89714be26930741fb2051b37aa4b3aa04b43bb2e383',2,3,'http://laravel.54.com','[]',0,'2017-05-29 14:39:39','2017-05-29 14:39:39','2018-05-29 14:39:39'),('8719b616a26e0b711288fdce8b53f2a8f1350e0a04f4bdbe5fffd08a82c7c5bb5c92c19d5be07c2e',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:54:45','2017-06-03 08:54:45','2018-06-03 08:54:45'),('875e9358ce5dab2a492dc308facbabacc4e1550de3bef413dacfd804fd0661de3a296635724476ac',2,5,NULL,'[]',0,'2017-06-03 07:11:08','2017-06-03 07:11:08','2017-06-03 07:14:08'),('8d62f6477fc06679ad230c4627a96e52df134cef3b10a2a043fff385e1355993d4b5e093e9a99727',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:35:30','2017-06-03 08:35:30','2018-06-03 08:35:30'),('8dbb7aa983f06f7139ec1db0a4d87f5ce645a5a861754015dbfb873b8c2c555b62420791955ec91d',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:37:43','2017-05-30 08:37:43','2018-05-30 08:37:43'),('8edf814c8eddaa8ab692d7141e7022cadf75daa183a37021db110d79c67630934ba0b40f6365e086',2,5,NULL,'[]',0,'2017-05-30 07:25:03','2017-05-30 07:25:03','2017-05-30 07:28:03'),('90fcd07e69c7f7a67fafb8970ed85ea6531d4ef343e4916c1dd60503bce2f3b7ba21b163c0dcd180',2,5,NULL,'[]',0,'2017-06-03 14:54:42','2017-06-03 14:54:42','2017-06-03 14:57:42'),('918b5bdfbd9e2b9dc770339ecce768010261622591d1530af1d1605967a2a2b65f7f044102a7f0da',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:55:58','2017-06-03 13:55:58','2018-06-03 13:55:58'),('92d422a0f19fcbb6fce52a4a14480a37d5a17bf1fa830fe0b33bc700e718d402eb4bfc101d50bff4',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:29:10','2017-05-30 08:29:10','2018-05-30 08:29:10'),('9311896f095b71f1546a5655dc741e5777e4b27e99744693fb26261811be93c7a143ba8281ebebeb',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:10:32','2017-05-30 09:10:32','2018-05-30 09:10:32'),('9321aa4db0b6f24edb10c6d4743c207e2faa97674459fb0bef6604840d873376776bca3e1f044e73',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:16:27','2017-05-30 05:16:27','2018-05-30 05:16:27'),('97759d16b8938e09c24bc0a36d82845857ebfb43ff32b2ee4344955ee5d14c3ebabe75e0f6ab2881',2,5,NULL,'[]',0,'2017-06-03 05:02:41','2017-06-03 05:02:41','2017-06-03 05:05:41'),('97cbcb2c87b779a080821ec46faf0359c6b8e9e2a4439b3d57a86ebab85a976bea9b6e00f6c54676',2,7,'http://laravel.54.com','[]',0,'2017-06-03 22:04:21','2017-06-03 22:04:21','2018-06-03 22:04:21'),('99249f68669a9a184aed07c98c55b63b98b7202a9180050e5aa76a2a5ad27897ef94364e2ae7817e',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:22:18','2017-05-30 05:22:18','2018-05-30 05:22:18'),('9927fc313cd9042c345c365cd6e888e808d90ed9ebb36698aac2d1fcb834d470fa30e25b9a38a5f4',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:20:23','2017-05-30 05:20:23','2018-05-30 05:20:23'),('9b3e3ccf74f85030bc64a3df03a113f9556e54f0653a0ed3fc66323b1069f051f74ad532105b2b82',2,7,'http://laravel.54.com','[]',0,'2017-05-30 00:29:16','2017-05-30 00:29:16','2018-05-30 00:29:16'),('9d046b09f1fb63b9b003cd7bb673c51731ae3bc6d7e7b4e4b09dd4087acd532205a45c771fc8c294',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:20:46','2017-05-30 05:20:46','2018-05-30 05:20:46'),('9d3fad22d7f61bec7cbe08ac918671718596b9ccb28c7899e75b358f104e024eb93ee1ce15d436ac',2,7,'http://laravel.54.com','[]',0,'2017-06-03 15:12:36','2017-06-03 15:12:36','2018-06-03 15:12:36'),('9e6ae4d86cab6ef4fdee0e3a52a17f193bcc3860a43bdca823294ce4d952b8a5e498d84ae0a65824',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:47:59','2017-06-03 08:47:59','2018-06-03 08:47:59'),('9eaa75ecc99f088d5c7fd6c1fbab4afe75dd135b846728202186a90d42273ff78476be6c6679dccd',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:30:57','2017-05-30 08:30:57','2018-05-30 08:30:57'),('9f97f55b82149ee7d9e1ca7075c50ff5e3d0e0ac915935920ba3dee0a803dab704e43eccabe459bd',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:26:22','2017-05-30 05:26:22','2018-05-30 05:26:22'),('a0f6d4e45bee6580f154a10728287b0b76134f5f683eaf87a67e5a329df082e5399451f82b068f00',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:32:36','2017-05-30 08:32:36','2018-05-30 08:32:36'),('a3120dae2b92fd06acde78af4827fa7e678a05939882dea924c85439f493c2521332a8184acfeba6',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:18:30','2017-05-30 09:18:30','2018-05-30 09:18:30'),('a36d7ca21042e32a4f463fe88bde5840b9c9fedc50dce67185fe0e038595720fbd1eac17d2cf65ee',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:19:37','2017-05-30 05:19:37','2018-05-30 05:19:37'),('a3fd5e6d8960b22b925e8497cb7ff0b0f08522fb664f8324f7b58f59a0ef1809897c0cef4cac71af',2,7,'http://laravel.54.com','[]',0,'2017-05-30 00:31:41','2017-05-30 00:31:41','2018-05-30 00:31:41'),('a4f9c5967743ee680d7175d7b274779f45d49d25acdb5807638fb031e37c6836c2b199a68487caf8',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:24:13','2017-05-30 05:24:13','2018-05-30 05:24:13'),('a66e731e17214dc9590a3e2507e55c2a3f31c00e9f0883cb36aadecb8a636d30bb1e22a94aaa7888',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:09:41','2017-05-30 06:09:41','2018-05-30 06:09:41'),('a6f3b2b6add9e4b518467200928186ea966bed85918d42c77d577d4915de74453f5668a2996dfbcc',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:29:11','2017-05-30 08:29:11','2018-05-30 08:29:11'),('a80e86460b72ffb9167d1e551acd2560d1464fd6c614418feaa844201a069ed2c054228c76cdb49e',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:27:35','2017-05-30 09:27:35','2018-05-30 09:27:35'),('a9bb9c2c597a01dfa3905fc10a8fe4866af165c1e339be082a6fc838572475d34566c43a1c476664',2,7,'http://laravel.54.com','[]',0,'2017-06-03 22:32:33','2017-06-03 22:32:33','2018-06-03 22:32:33'),('aa1c816cf46854c6ab483c06a52db92ea4cbbaa9eb182d8a0c6d504edd27bd7d6fef51f723ac9de5',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:03:08','2017-06-03 08:03:08','2018-06-03 08:03:08'),('aee25762724394ca73c744dc9b704536adc1c827cf751fbfa3d643d7f2c7938d1f233e85f3ceb88d',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:52:24','2017-06-03 08:52:24','2018-06-03 08:52:24'),('af594b2f9bd5d4d94242b338a5fed06014815d64ecd4354ba4a89ff1f2eca9c8ad0a31e99bfd0a8b',2,5,NULL,'[]',0,'2017-06-14 16:02:33','2017-06-14 16:02:33','2017-06-20 16:02:33'),('b0274db935502e9f6bca01546fcf7d7d146f1a47f4f3704c1cd7d4b0e08b51f8c185bdd3a20210e2',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:17:10','2017-05-30 09:17:10','2018-05-30 09:17:10'),('b18eef1e7d29d1a6532cc410ecf15d40946d295251e3eefee50a185afdcd906d582e5e79671f3989',2,7,'http://laravel.54.com','[]',0,'2017-06-03 14:56:50','2017-06-03 14:56:50','2018-06-03 14:56:50'),('b2003d856ac1c477d8c7d8dc82f3fa2d6927f1dd15e46eff722a3c9b2290a175cbe0db504c71e788',2,5,NULL,'[]',0,'2017-06-03 07:37:12','2017-06-03 07:37:12','2017-06-03 07:40:12'),('b516ea9d4c6d9956d6eb6dc62c27b3d94f8a594ff8bb70aa914f061ae66ef3872920e07d91ae949a',2,7,'http://laravel.54.com','[]',0,'2017-06-03 15:12:56','2017-06-03 15:12:56','2018-06-03 15:12:56'),('b5f38f7da36053ddd484e611fdbd5e4376f455b05a2b5c5d6fa4204cd6bc05d39e7800639f1c38c6',2,7,'http://laravel.54.com','[]',0,'2017-06-03 22:02:57','2017-06-03 22:02:57','2018-06-03 22:02:57'),('b661ecee7d9b07f55cb2eafafb1650424bf77a1e3f3fbdc9d19e4b4ad066f62a2395d5355047ed6f',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:33:35','2017-05-30 08:33:35','2018-05-30 08:33:35'),('b673286898ea011a5b5ad3e92bccbb281e88037c05800f785ecaeb7790aa094bbceeb03aed01233c',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:28:04','2017-05-30 08:28:04','2018-05-30 08:28:04'),('b70e21db325133328c55db9d2e87b307a9985b35bdecac993e00e063303cad94abe53c43c28c9973',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:26:50','2017-05-30 09:26:50','2018-05-30 09:26:50'),('b70f11599d0f021470585a028f451e5718e513e1eef6426f3f11de493bad31553a00e2f543b0bb8e',2,5,NULL,'[]',0,'2017-06-14 16:03:26','2017-06-14 16:03:26','2017-06-20 16:03:25'),('b7962ed8bd11a0e43258b74d09cc57a6d12d546ee6d11aa459f1eb8ac7d18cc58a22904a989a24f5',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:13:21','2017-06-03 08:13:21','2018-06-03 08:13:21'),('b80343a5e66799bbcfc98835eaf4556b91d06e1851e35fb0bf8045d8bf107c5cc3a35821b4cac0b1',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:31:59','2017-06-03 08:31:59','2018-06-03 08:31:59'),('b8d6fc668d1bf6a349ac915e350f8dfe5ebe419118dd451701e662036576756aa76f56acab02adca',2,7,'http://laravel.54.com','[]',0,'2017-06-03 15:12:37','2017-06-03 15:12:37','2018-06-03 15:12:37'),('ba0aec894ef49c399e9f1a892e32f22d9d8cdf83c3c315b838d293d33e2d49d25e31584d4ba8a2af',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:51:44','2017-06-03 13:51:44','2018-06-03 13:51:44'),('baa6d4e5a62ab37e708d3b1071ea4409a71594e922e4da163d075584a47a7509b063f43e9f8caf30',2,5,NULL,'[]',0,'2017-06-03 14:54:47','2017-06-03 14:54:47','2017-06-03 14:57:46'),('c0f04503f6fe4acd815523e88f14d5daff5d3f7675ab8e2c6fc6217c60b9280df92601300761171a',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:48:02','2017-06-03 08:48:02','2018-06-03 08:48:02'),('c11d50b693e76b620776895e33981da2aab9fdbc1900747d6d7481a41f17140daeb45c7cff85c967',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:48:56','2017-05-30 08:48:56','2018-05-30 08:48:56'),('c1ddd3b1646326a406adc1752f9359a7268274b3025918af6ab48b340601652387c970422ea33c25',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:28:40','2017-05-30 08:28:40','2018-05-30 08:28:40'),('c4ceef17e04ff6211b0a63d20a0398f5fbf4ee23f680ac3ce20b0671b4208f4fb4757c3fc6bb8352',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:53:33','2017-06-03 13:53:33','2018-06-03 13:53:33'),('c518ef728bd6babd5801605d7e4a2101e7ef6f67c562cbd624ae4aa4b395e713e658df89721df3a1',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:18:49','2017-05-30 05:18:49','2018-05-30 05:18:49'),('c5b1960cd59085c9c59f2a77fd319f8457799c7d8b60243939b78c15d8a0affbffbc6b27687bb629',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:21:43','2017-05-30 05:21:43','2018-05-30 05:21:43'),('c6287d607d2f2fc4b32d2f4dcb8e680cf67de2e50a2a43fedcf04e9428c156b4d035b685c8424cab',2,7,'http://laravel.54.com','[]',0,'2017-06-03 14:02:28','2017-06-03 14:02:28','2018-06-03 14:02:28'),('c6c4b4e2b234839cf685de191589b78e1179feaa1ac6086d8457a7a688e6665fbe7c12f3e540c9e5',2,5,NULL,'[]',0,'2017-06-14 16:09:02','2017-06-14 16:09:02','2017-06-20 16:09:02'),('c7061d413a9a82b65e7049e273ea6e1ea395587c16cfa68557f345d4f0444ab08cb987dde85309a4',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:18:01','2017-05-30 05:18:01','2018-05-30 05:18:01'),('c7c95e603d6630faaac6fa346efe4646d1b393f2fe59eaa4b196d70b7fe0d5e807c1cb2b2ca0a287',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:24:37','2017-05-30 09:24:37','2018-05-30 09:24:37'),('c7ebe8bb4fc33f71b9641c3313f614b99b0d400d4ef824e67412f1c2ab5eee57b714d2b674162d1d',2,7,'http://laravel.54.com','[]',0,'2017-06-03 22:32:34','2017-06-03 22:32:34','2018-06-03 22:32:34'),('c8e621bac3d7c944f2110e65a7ec4a4d4a8364c91aa173ce83b7272bb8b8499f420f55731431674a',2,5,NULL,'[]',0,'2017-06-03 05:02:29','2017-06-03 05:02:29','2017-06-03 05:05:29'),('c8fa5dbaab8f2734c8a47ed8e779692a1a3fd337fc031d9db01d9f01760fac21ec55dafdcc649af7',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:50:41','2017-05-30 08:50:41','2018-05-30 08:50:41'),('c94f03682ecb2fce288674d6acc0b16249993b314cdc68437680de5d4366123e5e0c6ec4bc31fde3',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:30:57','2017-05-30 08:30:57','2018-05-30 08:30:57'),('c9919f455bb003ee4a5b4725af1f43503194ca6b8bf7baaee11d1e5067c6f8b6de6aae6cf86ee159',2,3,'http://laravel.54.com','[]',0,'2017-05-29 14:28:03','2017-05-29 14:28:03','2018-05-29 14:28:03'),('cbc94dde4704b6bc2404010f4375099559b455b1539f86a9cad4a8059e1a1eb00ade41754b193c0a',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:48:30','2017-06-03 13:48:30','2018-06-03 13:48:30'),('cd4c508ea2752ea8a2728d915aa64528b547be4bbe7f21f7d0f7d189f4bcd88db6775d8c7840a9af',2,5,NULL,'[]',0,'2017-06-14 16:35:24','2017-06-14 16:35:24','2017-06-20 16:35:24'),('cdee3ee4545bbfe07b405dec4042491c3076f3c5671eea5bc1b760153a413c424c7bc59f4e8a6645',2,7,'http://laravel.54.com','[]',0,'2017-06-03 22:04:50','2017-06-03 22:04:50','2018-06-03 22:04:50'),('ceb8b265aa6b6d1f18e264fe6088c7c737a2454cd377ad3d807b050c8771d5e3ca0e1c2360ebe129',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:11:14','2017-05-30 09:11:14','2018-05-30 09:11:14'),('cf5eaec1c6dd5345e44ee32077b14fb938f375c7bcb24a5127ba5074f073b2baec8ebc8bacaf9e79',2,5,NULL,'[]',0,'2017-06-03 07:39:04','2017-06-03 07:39:04','2017-06-03 07:42:04'),('d13fff6b67b6a5f91d1f0fb276bba4e6444ac493383529f2ea2bcaf925217450b81cdd6f09ee16aa',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:36:50','2017-05-30 08:36:50','2018-05-30 08:36:50'),('d15f3136f448717105aceb66e59715c7ac7a4fe5882b4ce86ac772b26ba32179669ab68a73530146',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:53:32','2017-06-03 13:53:32','2018-06-03 13:53:32'),('d162a596c228310eb24179b13c43723fd4879ceddc1298692d9fac6fd8ffa5e2d80e642f8969551a',2,5,NULL,'[]',0,'2017-05-30 07:29:25','2017-05-30 07:29:25','2017-05-30 07:32:25'),('d18bddc6123a807c6c02b13b2b93171d63cc8c9701b11f919f1fa8e3d952bfcb41a50b61e095a2de',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:27:02','2017-05-30 05:27:02','2018-05-30 05:27:02'),('d198f93e94f9ee8cde4781aa6f13b0266cfe0cb83f04eb692cbf0dedf716f4e9ddaa2566dc86b956',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:30:45','2017-05-30 08:30:45','2018-05-30 08:30:45'),('d1e26e34c8778a197283a527a445b67fab9b6682792b6094542cad45a43ec6708813e63dbd045237',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:36:53','2017-06-03 08:36:53','2018-06-03 08:36:53'),('d2ee3cab4cd5c43c147a0e6f4e14520447d065062d83ea8855e28bd79d6e55401b41254b970b5a1b',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:26:45','2017-05-30 09:26:45','2018-05-30 09:26:45'),('d36ece1a7d61a4925e0b2239a52b6a3bf760721d8c32f6116b942e550f9908689976324dfeec0028',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:43:07','2017-05-29 23:43:07','2018-05-29 23:43:07'),('d42b16b6c960f66ea041c53c2dc0b2cba024a7700f44cc51eaa08a2ff11065f7cc7c59c6d77fccc7',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:52:22','2017-06-03 08:52:22','2018-06-03 08:52:22'),('d478475b558c366f2c6cdeb22c4ea9eb77b1fb34ce0bb38cbbdfd0e12c82518938f7527acc0b012b',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:15:47','2017-05-30 09:15:47','2018-05-30 09:15:47'),('d48fc0c71f8beca8028b8f427bfa2a127459ab00102043785c95ece16dccbbaa44be40c8888d64a4',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:48:36','2017-05-30 08:48:36','2018-05-30 08:48:36'),('d4d0933d04b21cd4fbeb37fb5dc0074bcf31f211b8af83ca0ccc6715700a4c4e045546a0ab591461',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:20:32','2017-05-29 23:20:32','2018-05-29 23:20:32'),('d528063a634e4facf0f0ecad8b6a881f6a42daf1799f1237f62d711c3325c81f484883dbc98f7534',2,5,NULL,'[]',0,'2017-06-14 16:08:09','2017-06-14 16:08:09','2017-06-20 16:08:09'),('d590ee8ebc281339f9936ade7da059875f43bffb56e80f6bfcc39b3fb5ec84954e731e454c8f7472',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:19:27','2017-05-30 05:19:27','2018-05-30 05:19:27'),('d65e1240027614e3a3cd55ad117d24478b3717b7f4ae8b517bdcca4c1b08758ce29c2226f470dad7',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:33:32','2017-06-03 08:33:32','2018-06-03 08:33:32'),('d796bb8b9abadcb83f51add57f0826e95dddff1b7caf2caaec09ee5f599671fc5026aabca02281df',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:38:31','2017-05-29 23:38:31','2018-05-29 23:38:31'),('d81b8aba0beb482bebc245a7ac1efd95a88ed06d9b685444788f3f4045bb14cb04234c4ea8c67f55',2,5,NULL,'[]',0,'2017-06-03 14:54:38','2017-06-03 14:54:38','2017-06-03 14:57:38'),('d9e49f117cf50968f99c216150a150b43620fd03d37a5c377035d0ced542841f8a0cae7eed44e5aa',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:19:45','2017-05-30 05:19:45','2018-05-30 05:19:45'),('db72738c9889b70ce328c4d52ee200ef7f80f7995ca8b0e236dfbc91584b69b9c638c179d3d4b998',2,5,NULL,'[]',0,'2017-06-14 16:43:21','2017-06-14 16:43:21','2017-06-20 16:43:21'),('db747576eb8e77ca905a09d5fe0b2884d97ea2bb2812bd85113aa5981aad269bfd6325d315761d66',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:30:12','2017-05-30 08:30:12','2018-05-30 08:30:12'),('dd0a4d661f39574513a10e9f777a1d0ccdd3b2a59cae80275e482b3fe9317537fbc35c3072edd763',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:50:07','2017-06-03 08:50:07','2018-06-03 08:50:07'),('dd2c7b30064e513fe1f8f5687a1b74bb8a679fe3de9316d968f682d5aa47e6a96fae873ca172a5ea',2,5,NULL,'[]',0,'2017-06-03 15:11:16','2017-06-03 15:11:16','2017-06-09 15:11:16'),('dde22952610585fd457211b6d6130531ca0bbdf112fbac2e12286efb10ef4c089ca6738d3a11c2c5',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:15:36','2017-05-30 06:15:36','2018-05-30 06:15:36'),('de1753580ad7e2e104552f90415f24b6c0888bf89740500af0002119942013aee9375c65762477c1',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:08:46','2017-05-30 06:08:46','2018-05-30 06:08:46'),('de56a785b5268a03871c7a11b66e49fb3472e46ad90eab551009a6e08f252fb78c5ba58a2392bc65',2,2,NULL,'[]',0,'2017-05-29 15:33:02','2017-05-29 15:33:02','2017-05-29 15:36:01'),('dedbda0f880e9c2ee6f54a4a5b062e23e892f0e5e1cb0dced8b9d07a96a607f89cae3ceedb27980c',2,7,'http://laravel.54.com','[]',0,'2017-06-03 15:11:45','2017-06-03 15:11:45','2018-06-03 15:11:45'),('dfce3030474493f0b90a74998a6a149e4be1cb04fdcc5bc93f5a2350e1a0b6e05df78e9c38d24e20',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:12:14','2017-05-30 09:12:14','2018-05-30 09:12:14'),('e30e35e047f0e22f642d9f702300580dbcdb185a8c49c4c177449d2430fbf1c1700b74c33a2d939b',2,5,NULL,'[]',0,'2017-05-29 16:06:35','2017-05-29 16:06:35','2017-05-29 16:09:35'),('e31ef61d1a75da1b67abec94a7c05a544eff5c9096ffeb1dcc3ec5f339347d2da32e9a73ebbfff63',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:44:52','2017-05-29 23:44:52','2018-05-29 23:44:52'),('e53b30e15be8765214821dabb998117286c3c7971619fb298eb77e3f8c6a2236e04e5703484e7992',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:57:03','2017-06-03 13:57:03','2018-06-03 13:57:03'),('e60a008e9dba022b06bf8f8f4b43de988125a74e58530b514adbc94df67f07dff257ccb7aca153e4',2,7,'http://laravel.54.com','[]',0,'2017-06-03 14:54:17','2017-06-03 14:54:17','2018-06-03 14:54:17'),('e64bdf1a959f81db643b109ca17cd61dd39d7985139e83ea4eb37dd023f484d1f109c5f9ae8bfc5f',2,7,'http://laravel.54.com','[]',0,'2017-06-03 22:04:49','2017-06-03 22:04:49','2018-06-03 22:04:49'),('e72398ba91e1a902a1cca9a12e1b8074e62e6766103faefec060b750f33f5a7a7b773a5b5023ed53',2,2,NULL,'[]',0,'2017-05-29 15:33:33','2017-05-29 15:33:33','2017-05-29 15:36:33'),('e7c83d0ae3de4b5f1d6cf6bc7ad49cc70c13e4f16fa66850342aca431e1596697a6cf2b8ddba2cb9',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:25:19','2017-05-30 05:25:19','2018-05-30 05:25:19'),('e7f7905e0047ce1935bdee28178a43416608eb347af2247f7acf08d764a21c03199a33ba4883451c',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:30:12','2017-05-30 08:30:12','2018-05-30 08:30:12'),('e88e0485448be83c23dad86e0086d28da6deff411aa205710f0980c2183cc2773ecccaf023067462',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:31:14','2017-06-03 08:31:14','2018-06-03 08:31:14'),('e8b1e94d4c41e0aeb15b9e9674f10f62ef8c0aebe40f2e6ecea0ae9f4e2ad89d7bf5e280c2d48f4b',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:35:32','2017-06-03 08:35:32','2018-06-03 08:35:32'),('e8bdc8b7281ea13291fbec69c70c41239738f4d5510316ec28f9841d18348d2887b57d7b41d261ad',2,5,NULL,'[]',0,'2017-06-03 08:00:17','2017-06-03 08:00:17','2017-06-03 08:03:16'),('e8d45c1d3afbc8d3475b9aef7918a11d026614390f8b2f02437b78ed5e87ad7115b11797b6996ed5',2,7,'http://laravel.54.com','[]',0,'2017-06-03 15:12:57','2017-06-03 15:12:57','2018-06-03 15:12:57'),('e9b4948b982cf8691c2cf740493cf567641f98452c4f37720c2f86d55db384b2d1c1c202c38e7d0f',2,5,NULL,'[]',0,'2017-06-14 13:46:59','2017-06-14 13:46:59','2017-06-20 13:46:57'),('eadcf298194f3ea79462b41adfc9a5357f470a4b090268b6ad155fed4db52c9c9024c50af9eedbd4',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:38:50','2017-05-29 23:38:50','2018-05-29 23:38:50'),('eb1b5b4236a6818bc752579077f9d2dd3d1ef1cb4e85af27cbf2b3f9e27596a75dd8e889fe951eac',2,5,NULL,'[]',0,'2017-06-03 05:40:10','2017-06-03 05:40:10','2017-06-03 05:43:10'),('ebac07040c66aee4527d09e2f6df1cf0a900d2b28861e2723d5788952ef1c9cd61f7e9f3b001b795',2,5,NULL,'[]',0,'2017-05-29 23:46:40','2017-05-29 23:46:40','2017-05-29 23:49:40'),('ebb0026924982ef29a68384f8f2a15f048aac2f53b4a66776524acc4415c2356b7281a9fc83ee37b',2,5,NULL,'[]',0,'2017-05-30 08:45:25','2017-05-30 08:45:25','2017-05-30 08:48:25'),('ec6159b869c890f2dcac11bfc7ca6688b39bec0b7a715f40a89484cc192466c5a36797abd9559407',2,3,'http://laravel.54.com','[]',0,'2017-05-29 14:27:24','2017-05-29 14:27:24','2018-05-29 14:27:24'),('eca6166a208fa6139e99e80a759bcad00a33e55b5f65a8bcfecaf35a842b6fe15028646602a7885d',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:10:32','2017-05-30 09:10:32','2018-05-30 09:10:32'),('ed3791668ed79f391d58e3d655753f5998197ea56c50642a164e5773c9066c0e1dced57437daa8b4',2,5,NULL,'[]',0,'2017-06-03 15:02:59','2017-06-03 15:02:59','2017-06-09 15:02:59'),('ed88724c4aeb45269a4b9b052d4a15022fbbfabfa58ad948c5c008d42d5a218ac0b3f791fbfe7344',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:23:56','2017-05-30 05:23:56','2018-05-30 05:23:56'),('ed9a3bf547b02273763b6e29b83d9c7b5410e8a2e0d8415249991e0cd69ee6a81215d479293a4937',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:10:06','2017-05-30 06:10:06','2018-05-30 06:10:06'),('edc1a119c9a94ed5cb601f098590270641de0f2a717ac8e2853069a8eaf84ff8e74842ae9ed78266',2,7,'http://laravel.54.com','[]',0,'2017-05-30 08:28:04','2017-05-30 08:28:04','2018-05-30 08:28:04'),('efa66a293f1dd92de676501be1dadc2a8896aeac650ef4b03cc9cd7d11c3a27814a97e550ed61ced',2,7,'http://laravel.54.com','[]',0,'2017-06-03 22:02:55','2017-06-03 22:02:55','2018-06-03 22:02:55'),('f1dfbd01a8b67f0cee762ef14ea52c75eca861d14eadfc471d788bfb1d24cd017863ac0c956e8db2',2,7,'http://laravel.54.com','[]',0,'2017-05-30 07:11:03','2017-05-30 07:11:03','2018-05-30 07:11:03'),('f2bcd4b72cbb8bc9f2d0479380f8139e29fe0101bd3224273102328815a14c0e29e20aff4dfac9cf',2,5,NULL,'[]',0,'2017-06-03 07:37:45','2017-06-03 07:37:45','2017-06-03 07:40:45'),('f347182dd612d1bf2fecc2232a3e60bf2c9c997a5108f1b1ec9450e5d7292e44b6eb48afe6bf8f9d',2,7,'http://laravel.54.com','[]',0,'2017-05-30 06:16:03','2017-05-30 06:16:03','2018-05-30 06:16:03'),('f3b44af2ca5e3760d6096ae7211ac893d8383f07dfbc5f36c1abb53f0ca610f906ca43a4482a5d0d',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:19:06','2017-05-30 09:19:06','2018-05-30 09:19:06'),('f46c8b8fe5d545af1a69a719ba50e17f79613d6c0a9f3daff95bc2a8881e97daa406d13882170897',2,7,'http://laravel.54.com','[]',0,'2017-06-03 15:12:55','2017-06-03 15:12:55','2018-06-03 15:12:55'),('f48f4d8cc6be0a37df84479157caa39187b5054ea339dd9929f9dc84b0b97a18df32fc1575007094',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:24:18','2017-06-03 08:24:18','2018-06-03 08:24:18'),('f589360bc08dc2b89efbcf2632513226c5b114534c2e9683d2fb18ac189a950da551333336dc0d86',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:39:21','2017-05-29 23:39:21','2018-05-29 23:39:21'),('f664e7c60e1e8f4b6349245ef57f126b099e8dc1b7e028d83979bca5cbddc62056404f37c3710626',2,7,'http://laravel.54.com','[]',0,'2017-05-29 23:47:21','2017-05-29 23:47:21','2018-05-29 23:47:21'),('f6ad38ad6b74fd835cb0d1986663fa856119a00dbf3671b8905d47de62df92358b0c5053fad45e6b',2,7,'http://laravel.54.com','[]',0,'2017-06-03 08:50:05','2017-06-03 08:50:05','2018-06-03 08:50:05'),('f6bdf6a9ed9b0c3d9eaa91d50d51cf7050e9e874b54342f86e454a123560e9537260e15d38d77eab',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:17:02','2017-05-30 09:17:02','2018-05-30 09:17:02'),('f80a1bf1b5aa0a671e6f854446c0a33448003cdf67f8111e1d83167298df2f31ee1653dc5216d169',2,7,'http://laravel.54.com','[]',0,'2017-05-30 05:19:12','2017-05-30 05:19:12','2018-05-30 05:19:12'),('fa15e67856fce2b9d6ede042973c99af54260f49c773f1bf44c39914301b5da709bd061d00377012',2,5,NULL,'[]',0,'2017-05-29 16:06:14','2017-05-29 16:06:14','2017-05-29 16:09:14'),('fa25dd0fceee216ef48aa6bc80309a2fc91f56614102c44888b17ad2803c68b8d07a8283cf6c11af',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:05:12','2017-05-30 09:05:12','2018-05-30 09:05:12'),('fc5fd3aed9f103dd3001e404450be95867883694d24cc398fdc0f38ce6296d241257d0c28fa280c1',2,7,'http://laravel.54.com','[]',0,'2017-05-30 09:28:56','2017-05-30 09:28:56','2018-05-30 09:28:56'),('fd40bee40f84b1b540a5594f08fddbc5df51545ef2b01c7d6af98c8563e786515bb10630f6c8a2fc',2,5,NULL,'[]',0,'2017-06-14 16:12:07','2017-06-14 16:12:07','2017-06-20 16:12:06'),('fe108d5923fd237e109fde0c2e28cd353570795be0ee758201690a5182358c5acbb73248cda300c8',2,7,'http://laravel.54.com','[]',0,'2017-06-03 13:35:52','2017-06-03 13:35:52','2018-06-03 13:35:52'),('ffb8d568bb7f053f3829fac1029dce01888190c13e69a6156c77bf7fec43d54807116cf988bea221',2,3,'http://laravel.54.com','[]',0,'2017-05-29 14:39:00','2017-05-29 14:39:00','2018-05-29 14:39:00');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
INSERT INTO `oauth_auth_codes` VALUES ('00cde962aaca9031242eb8c22cae6aee506fbaf53318c893b0d27852657fe885ce49d00471c6f08a',2,1,'[]',0,'2017-05-29 15:31:40'),('0fb0206c7f0e5b2e47dbe93beab4fad0f6de241503623c8664137fdee69739801f2789c6520227c5',2,1,'[]',0,'2017-05-29 16:08:20'),('15e571cca2e27ecfa8c663146d4e6166584eb422a5181a4fca6066e5c26bdda8e2a365f2ba988d0e',2,1,'[]',0,'2017-05-29 15:13:52'),('174af2f649965431db26e1d9d58bef7f4cf42617adb30ed8a288ab094229ddd43b6baef8be3874bd',2,1,'[]',0,'2017-05-29 15:31:08'),('1f82bc52c291d35b2b19612bdb61dd12661e878cf75e7cbe6c19cc80a353ad93b819f3a71364dec5',2,3,'[]',0,'2017-05-29 15:40:25'),('2874becba438178effc041a244db06897691de9ad1a37a50be110c8ed94ff152e7c4aea6a4899e61',2,1,'[]',0,'2017-05-29 15:43:22'),('2942154ee85e39aaaca427d17c2dcb29a3f6826b2e19caaff76d605f9250f478601ca00f152c9a08',2,3,'[]',0,'2017-05-29 15:40:17'),('37cd80c6eee50dfb604c50912d08ee8ef4cd95df4ac279e305e9b944029266e63e175df64da774a4',2,1,'[]',0,'2017-05-29 15:43:44'),('49d39904e9fdeafbb0ea341af70fac77363d5c797c915b9abe6a51e7e8bd9a90e2fa05be18e2952c',2,1,'[]',0,'2017-05-29 16:07:53'),('4ab4e1e54bddadf8e87b24bc6a733f398d321760546c052778064fbc043dab6c470685187fd09eca',2,2,'[]',1,'2017-05-29 15:43:00'),('6ba03281f3533b768d68231fa03a56364bedb4dc24b834d0d6e425309abe52cb15d556fe0e26946b',2,2,'[]',1,'2017-05-29 15:43:32'),('72b4fdca20f711cc431c196acf5d3f502c432c21eb249f38c64626dbcdaa8b6b65e175afa75c3130',2,2,'[]',1,'2017-05-29 16:08:32'),('7b080a59ecb1a396257115edc6df2ff1bfa945fd413a37d4174362157f51c15f47eec748986c3d58',2,3,'[]',0,'2017-05-29 15:40:46'),('8b6a18f02b6d14ce190d800103c03fc356c178f56d73c5dd809631cebea14891b60f83c2b3d643ef',2,1,'[]',0,'2017-05-29 15:43:57'),('9144c9a9146113497b45825e5230311e2631fdcba34c149a515b40d8335c6333e41a612d82070d57',2,3,'[]',0,'2017-05-29 15:40:38'),('bc0cee5a7a5acc425bbd08c8ae52855c18b7394044aa716272086ff68257f908ad5b6a83bfa02b06',2,3,'[]',0,'2017-05-29 15:40:02'),('c5cea4c232b96bf4e5871e271097c283c2529215497eb14be4b736f20d3ee9231be3f586a128931e',2,2,'[]',1,'2017-05-29 15:42:32'),('e3b6ae416354468fc0eaaaed223e35e4bc81e8999d23df8f886ef432d73a56b7582ee78453ade42f',2,1,'[]',0,'2017-05-29 15:37:21');
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,2,'laravel.54.com','KORq4SsYxOFum8KGJvsyVUhKrWrGWF0xVj5SFkpb','http://laravel.54.com/home',0,0,0,'2017-05-28 06:17:53','2017-05-28 06:17:53'),(2,2,'laravel.54.com','tSsBsberWnXfosQGU5az3H3HQXTHJQ7dAE7x4EWT','http://laravel.54.com/callback',0,0,0,'2017-05-28 06:30:54','2017-05-28 06:30:54'),(3,NULL,'Laravel XHY Personal Access Client','40caYkvwgVfowYftEBe8EZ6meTDpTUiN677yXwyE','http://laravel.54.com/callback',1,0,0,'2017-05-28 06:39:30','2017-05-28 06:39:30'),(4,NULL,'Laravel XHY Password Grant Client','i6i31BdeIcPCErfcyCt2HteXZPrtcADlSLhFYDYt','http://laravel.54.com/callback',0,1,0,'2017-05-28 06:39:30','2017-05-28 06:39:30'),(5,NULL,'mobile_password_client','nnAzR3Is4IsQTrSmn6Yk78uKDgiGjWQ0wQ8bGJDG','http://laravel.54.com/callback',0,1,0,'2017-05-29 08:20:32','2017-05-29 08:20:32'),(6,NULL,'personal_client','zsofg4DXx8odn7zC27JiVTzS7T972RUaPDCxrKWG','http://laravel.54.com/home',1,0,0,'2017-05-29 14:58:50','2017-05-29 14:58:50'),(7,NULL,'personal_client','jJ1BnggIOGsqcFmMkUltdVuZ7e10EfzTT47RdxOy','http://localhost',1,0,0,'2017-05-29 16:03:58','2017-05-29 16:03:58');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,3,'2017-05-28 06:39:30','2017-05-28 06:39:30'),(2,6,'2017-05-29 14:58:50','2017-05-29 14:58:50'),(3,7,'2017-05-29 16:03:58','2017-05-29 16:03:58');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
INSERT INTO `oauth_refresh_tokens` VALUES ('00f07d0cbea89a39f825cca2aae0ac8951e85cb95f68c5d4eacb0490ed9a5f83c8e7c8b6d8426a51','5ae7f8d9c2d7746ccecf9b25025255899b072ebe56b2f6d84861b1fd86e154ebfd7d80beb2267aeb',0,'2017-06-27 06:45:15'),('014b9ccfecb4068d64179b4063af0cd57707b55723e7b09a1c17a85e810bd683e44713df1fddeeb9','c8e621bac3d7c944f2110e65a7ec4a4d4a8364c91aa173ce83b7272bb8b8499f420f55731431674a',0,'2017-06-03 05:05:30'),('073bfcb3f34d773e6d89fab679e2a05a81eeadc9beb876d075036a6514433af94e173660e2b580b4','d9977af98d5067322acc0c4c0637dd50318dd3c56fec12fbff28f1ed585ee0c8163243e1e8195131',0,'2017-06-28 08:25:43'),('08272508e952227d7d637ed49157117d1c8c07c23d957ac341d52cd075ee05398425e10941905c73','6739fe14e87cf673064aac7a096bc55a79f8130e7470da20b556f59a3271b241b9934ce0a07fbf53',0,'2017-06-21 22:01:40'),('10177a60572f042a45b80cf19cf58fbcb362817b6f3b754962ad0b1a6af8801e61b6450c019fee5b','b2003d856ac1c477d8c7d8dc82f3fa2d6927f1dd15e46eff722a3c9b2290a175cbe0db504c71e788',0,'2017-06-03 07:40:12'),('1363aeaaaca88412387dc4c30247f24630f590330f9bb72f74deb6d8a240bd13ee31dfeee5b1edcd','613f1c60e576d966c3f250582d7aa2f8ef764833758e78bdf7d1a463b7fba32b3d117b54833ad6f4',0,'2017-06-20 16:24:45'),('15cbad43f509c271c2d7e950a75ee9f5f5e74266a01e1344d51969a88f5ab02e7641676323b301e9','4dd0617230aa597fc425926ad6b3c3c1db5e7f3e77b22039c48c12ed4ddb5cf7328203b909d037f6',0,'2017-06-20 13:47:07'),('1a667991b27cb0fb614ab1b68daaaa6f307c7b08cd967d9158b1ab5f233e21068550b4fcef233dbc','ebac07040c66aee4527d09e2f6df1cf0a900d2b28861e2723d5788952ef1c9cd61f7e9f3b001b795',0,'2017-05-29 23:49:40'),('1b74f0667ab9ff496f06cf4c585df2d7b42a653ed6d6592564a923580c13cef797046631806d8978','ed3791668ed79f391d58e3d655753f5998197ea56c50642a164e5773c9066c0e1dced57437daa8b4',0,'2017-06-09 15:02:59'),('1d39e4c89af2750be890219738971fd789b615a17bd75d1d32aaaa49f554cfca4391e009ba2b67df','314757e7d83d0cd68636cb6299b666d9e3ddc2986e204983e8f92a40c87b910189ee98bef65ecbea',0,'2017-06-03 07:33:23'),('1e8eeadd256b14f46848f4e87299dd89823297c87872a05bc4f5bfe9c54b91e00c2022a7cb4d9bff','81f31f956f265d6e93f1bbcb38b8317f96fa1360715d5fa1983c3dfdd8568886ba0faf1758f94b83',0,'2017-06-20 16:17:03'),('20ebc7af4ad2a4d6ff26709ebd8acfddeefeade8c2ff97a292ebc2e16ee639240f2b1ea7067250cc','8edf814c8eddaa8ab692d7141e7022cadf75daa183a37021db110d79c67630934ba0b40f6365e086',0,'2017-05-30 07:28:03'),('22224c56d31ffd1f424dca7d76e1ae57fb1d6623bde09c308269a271bfba9151f01a982ae6ca4ecb','298f93edf0804c8982a3300c2ef9027e2eb38ddb39db7773da97118ea86cbfdd433494707e550aae',0,'2017-06-20 16:22:18'),('229d7e8098f2772a024f9f365e203468ae4e71fa71afdcec8f09d335f2bb487982be9da05409e156','2833a423cae0578efb0b2aa6c62ccab3bcc0e77cdc07bc64fc431215705e547a968fc8358ad65451',0,'2017-06-20 16:02:01'),('23cc1551014aa29f9eb1b4271a5d7ed58f81e348e410753208f0827c59bcf3a44680f78e16dfde4c','ebb0026924982ef29a68384f8f2a15f048aac2f53b4a66776524acc4415c2356b7281a9fc83ee37b',0,'2017-05-30 08:48:25'),('293ce03cc4719b760edc391326b6fed918bcf574ed426ce89199415726ad416dc3bae59d310a7689','f2bcd4b72cbb8bc9f2d0479380f8139e29fe0101bd3224273102328815a14c0e29e20aff4dfac9cf',0,'2017-06-03 07:40:45'),('34ba71c65a6d950f831c1ba9af786e341b1253af4e5740ff5be1df66d5a35a40c43e6307f467cad9','23eba85b933b8adc9e7e866e9f80d549d8202a8796ae1a414c43e4b3adbba099c10a505bfb93f35c',0,'2017-06-20 16:05:41'),('3a293b7caf59711dee76ddc27f4b83b5063df691e10fac9844dad2e18ab79c3191bada31d1e377bd','717e53c58ea6c5f61cae76fdc9cf06d61491ae84e06e6dbd78fe5527e891e8cf0f15b55dea6949de',0,'2017-06-20 16:12:43'),('3ada9cc4cf5dff7d5d3dbef1436397632b8371a814d94696549a4a794c26e30c70355a6ae5f8aedb','5ba7a03e3d60b96ba2649094d1e0848cc08ce533ec2b7a14ec853f14a64ee8c4abc2417ad873fa90',0,'2017-05-30 00:24:46'),('3ae9e569089f05f72db52686214b21904f659982dc6133caf89f9d10b8474ddaa24ecc167ccd78a5','827ff30508464b4c08816bcf0ee1fabd3d96bbc62fca95f285f9deb6f46a79747947aeef9ba90ef8',0,'2017-06-03 15:00:29'),('3d089e5efda4524b8c524130ef51773602a15d77ce052caabf8ebd32540292543a707aa18024793d','af594b2f9bd5d4d94242b338a5fed06014815d64ecd4354ba4a89ff1f2eca9c8ad0a31e99bfd0a8b',0,'2017-06-20 16:02:33'),('3dc5621f922b9b4294e80f1ffd72254ed2c3ae222b3d50c9c57a9f000906174999a7199f543cfc45','875e9358ce5dab2a492dc308facbabacc4e1550de3bef413dacfd804fd0661de3a296635724476ac',0,'2017-06-03 07:14:08'),('436a3510f411fa86236cb54f73d5c74569b7e4bbddc41c8026833bbf447de360fc5bdf1a8a26f12e','de56a785b5268a03871c7a11b66e49fb3472e46ad90eab551009a6e08f252fb78c5ba58a2392bc65',0,'2017-05-29 15:36:01'),('4ac486b201a8cc99e2062f05aa5b5011d411bab33126d5f867c343c740615a72fa34039e563e395a','b70f11599d0f021470585a028f451e5718e513e1eef6426f3f11de493bad31553a00e2f543b0bb8e',0,'2017-06-20 16:03:25'),('5363860dba0b49d3b82821f3ec3a8498a816aa26d95caa9eb1f0357878cc7650df015f25c89f8e2a','0dd8d188abe80f7daa3864acd5529574a8cd654b88b8e2640880241b71396d2fbd43fd05566ae0ab',0,'2017-06-20 16:42:52'),('5552cae37cd4a74849350eda5649f13e8266ed89f090fdb0e00497abeeddfc4ed22f1e93b15ff879','12d727496015e8312913ad95bbf877f6e45c199cc09c04298cbb6c24b44949c9f49c51cc8be159ef',0,'2017-06-20 16:41:45'),('5aa67e997a74a1c99b25e2d3c32162ba2a53ef5e4a3c9310bad8bc72695b38b6fb5bddd53019cf26','e72398ba91e1a902a1cca9a12e1b8074e62e6766103faefec060b750f33f5a7a7b773a5b5023ed53',0,'2017-05-29 15:36:33'),('5c13114511a780f8b2a51a34efc43a24a8a27560d3a0b4f6df5e96a7b1ff246a523af185d6bed664','7741bd40e512850fa826904a278e32d1c0ea5ca63dcb4d49b53d3e20595305d1cc3837b459dbecf4',0,'2017-06-20 16:35:59'),('5f5790e1667abe9968a190c257f3fe9d7b67863e50d87ce9edc5c30127a22df0a158f958febb3605','e8bdc8b7281ea13291fbec69c70c41239738f4d5510316ec28f9841d18348d2887b57d7b41d261ad',0,'2017-06-03 08:03:17'),('63efa667f5d319c22f6cb0e0cb2b8718e5ca5e90c8ced2642207ccf52458f743808eae37b8364800','78edc447f6f249b141cd93de80fc4e387ca670fb849fb4d8d6be4576b9e8bf83aa3569ad03817100',0,'2017-06-27 06:45:56'),('687f26e88744bc8ead93a94775fede3b3f04b61926cbb6ac7015c4041a347948f22e49ca25a8ea3c','3f8a7fc8e12e49398d820435873e61fb5f4e13feeccdf57aa7cb90efd9fdd15a52d73baf0904c95c',0,'2017-05-29 15:35:33'),('6a9ae4515fb2c60ba24886d65620fb1adde6c43ed2cf804f4f69a662067689994b850367e2c5ca72','52051310ab3e881fe7742a41e7df02299179f0a144bb450abcfdb0520b4d38c59b90dd0b815ac6fe',0,'2017-06-03 07:40:06'),('6f1951461dd85af2c80452f16ae3d76f35aad9f3b5af7d8e0b37b037cb6b7f222bc839226bd83bdf','baa6d4e5a62ab37e708d3b1071ea4409a71594e922e4da163d075584a47a7509b063f43e9f8caf30',0,'2017-06-03 14:57:46'),('6ff5c569bb1df01bd22082fa371ffcec9c101176f089d81792077d6d7ef325661b7dc5057bd24cf6','7fd88c7c95d2ce666b7ca67725b91577836e7917d4d532656eb7758e48091ee1fdf96ae56ca5b73e',0,'2017-06-03 07:40:37'),('702ae019735646dfbed0607fe2601a480f48600a09ba2484b03b0291a911cdf7c66b267b9ad61755','0f4128b00693bcbe62135b168d30332a609108b6fd9c31870e359f27c4b5e06589fbf072ab9cc73c',0,'2017-06-03 05:04:59'),('70e42198ee3e169c934bd3e6bbb6a80c2e40b3a1bd8b4b542bce0a01cc240f41a9154347e9c204e9','dd2c7b30064e513fe1f8f5687a1b74bb8a679fe3de9316d968f682d5aa47e6a96fae873ca172a5ea',0,'2017-06-09 15:11:16'),('7ab986d48cae0d6a450b15d1abfaca5544923d17d9d8c9cbb86a4570998371c408357cd9e87c8470','583344537b696dda5da08def586f681b293e416f51355dfe9ee48f19efcecc654a6c9d14794c8f8a',0,'2017-06-20 16:22:39'),('7abc4ea16fc7fcf283a0accd0f1d3f851dd4443a136c08f7fb2ec9264cad3e8d2b56f6636b3403f0','5ba51532e49601686fdd3f419aa858d6593810d0fa6ab06999a2cfac915df9697c13b582106c8842',0,'2017-06-20 16:02:11'),('7b1db13f8f16da35288eef7b5101ef7c9f3948ad7ad31726267bbda2253d8cf4940b0643d066ba24','d81b8aba0beb482bebc245a7ac1efd95a88ed06d9b685444788f3f4045bb14cb04234c4ea8c67f55',0,'2017-06-03 14:57:38'),('7eaa375b0c1dbd1e376dc33d3784925b4b4f6c4ae0efd7ba1c725a846d8019bd62545372ed8e0798','1c07967830816fb3856a846f208c75f0fc5ac1fa7a3dce9f37184f9ebcab1d33e5d7078c2b4daeeb',0,'2017-06-20 13:50:28'),('7ff77fafbedf8f999b8e5a099b111b2c650955b4d8c761ba611b3853d09459d9d0b86b1b7677a1f1','7851c23a94a081ace8fb8803ce1d7583e890fdbc9ee27104aa98a2a8553bdfc60e5a89f53d3dc0c3',0,'2017-06-20 16:08:18'),('83a4b4f3d7177948e4d665b322c32e014418ef2855c757d14df8e237e74ca8f58d3eaf73e954a252','7a2f0b6e62ffcd3a57a70c300588f88fe9055f225913aeca19367ded456c86b387b94f1c747e9d54',0,'2017-06-03 05:05:37'),('8634c076222cf1c6a53c9ab45d739a94e4c8cc6d0d32ac59c4939790f0279581ce08ceee9bdb9d9f','7e6d3e1a1e726c251660f03ec0f85156361945f41e2846398654fe71eb0b0a8d8500b12e25a7cc00',0,'2017-06-03 05:28:38'),('88574e31a6c8c9d90eaae32111de44e74504a740c3d26e938db9cd14616fa41206132855c8056129','31c4cb63ccbbb90450bf410748db87ff7a71e4652ea4e2688eb189476a72699a11f7f720e6352d69',0,'2017-06-03 05:33:11'),('8a36d67bd156315fa26a66e965e1d08884f2e3b6a647e9d3beca95c0741c30d6b9eedac25c299bd8','7782683d3402b59bbd630f58d44e430befa1150b5ff97f00dc39f061c43c418905a1740801d58db7',0,'2017-06-20 16:39:05'),('8cfc540dae19437b69698df22f7adb905b639052e7d27f8a7c71dbaa1e11c8ec8f1dbbf95526f17f','073049543e90c2bad4a926d83985db01c97db3f6dd43c60e6907addea28240917e81e668e7794b9e',0,'2017-06-20 13:46:57'),('8e6ca361f02f197ce466930176974d4e1ee63747a4a63777a09d1be88e1e20faec006b4eb502527e','fd40bee40f84b1b540a5594f08fddbc5df51545ef2b01c7d6af98c8563e786515bb10630f6c8a2fc',0,'2017-06-20 16:12:06'),('8e9015a2307cc064e16d863e6216cf13ebaa6be8dabb6d4fd29b3791e7005e838bf003bd67dd6519','5e556dcc0f8189de78ef5db0e1675cb3ce74211dd8e224fbb0f430f5554820607e02c77d31035499',0,'2017-06-20 15:35:50'),('8f90fdd52a588127ac45da0ac8b07fb2e0b3ada3e779b599ee132cea08de9ce43ad543845137e936','db33953807a6b0533490c9e6429913edd18d42c8c397eacee88cd3cf0df2de64e349f389eb0cf7d5',0,'2017-06-28 10:12:16'),('90ec03810db5bf43712acf36dfb92eb23da7dd14faf73cad1ac8a3310ef23acf69b0fec522127917','97759d16b8938e09c24bc0a36d82845857ebfb43ff32b2ee4344955ee5d14c3ebabe75e0f6ab2881',0,'2017-06-03 05:05:41'),('923f32b02fd3b6d47ddbd826f203b9188e52d483eb8db7e2cc5823885103fbd6c7fb8b27c9346dd0','3b64d411b9dbb401e71f45e201063119e0927f5cbcd9e3fc017ff7686f2d63b0ef28b79dbc6a032f',0,'2017-06-20 15:35:38'),('97cfcf8a17d5797cca4de395fd83dc86b6cc29f8994f5de6e27d803c82f6e60cd63b1e81b2321d36','fa15e67856fce2b9d6ede042973c99af54260f49c773f1bf44c39914301b5da709bd061d00377012',0,'2017-05-29 16:09:14'),('9b76e0b3693b70fbd3b55c5b5bba347d65923cc8351f9bb7cc1e16e0d7f9206ed0be38fa02fb4118','e30e35e047f0e22f642d9f702300580dbcdb185a8c49c4c177449d2430fbf1c1700b74c33a2d939b',0,'2017-05-29 16:09:35'),('9c5bb5b1b3cce8042b8c3b2a54719d9f30e009708f3d31abda36e8139c820d7ac81ba7950e353102','1a23c8e27b4726ea4923f79ecbcfd8f565d333851ee7560b14d17c5a7978174564c5deedd4a2640f',0,'2017-06-20 13:48:14'),('a05d3fc746882c2c2fde612d2d92924441a9c9bbce5f4b50326e6bd5842037e037daae725c5a4853','cd4c508ea2752ea8a2728d915aa64528b547be4bbe7f21f7d0f7d189f4bcd88db6775d8c7840a9af',0,'2017-06-20 16:35:24'),('a6e8e95987ab4a620930a841a89489fc4893126ef407a4160c5971e76191c83fe78f7fa77268c177','d528063a634e4facf0f0ecad8b6a881f6a42daf1799f1237f62d711c3325c81f484883dbc98f7534',0,'2017-06-20 16:08:09'),('a8bdc39562d6d105a8b2b61735d998c7e750bdfb11d2d51d9c02d0afbb20809cbf03010c2744f89f','0caa20e4b1c180944c7ce9c05a93e4594b58b5c2e7b97163b951621d5674b84e5e5c9cf1f04157a3',0,'2017-06-20 13:47:37'),('b5aef477c70ef6f6f216cd72ffb60e87c12bfaca65419a6e59a157a1c9932f168f1ed3b442c21d68','3d0fd81646ad5d0aee50d3e4cba167c5370fba83b9c472ca38e7bb1006397f48ca0490030578995c',0,'2017-06-20 16:26:11'),('ba75db6cbb826f73e0f36da55af7dcb6585c5154023730798d01fef55416aec541396160f12351c2','827d3ac827da8338c82b79c0f73992b5f0a7a42ae7c4015e00be05ec56d83ed4238f0024c322830a',0,'2017-05-29 15:09:25'),('bf4839c9b8be3e3d69fbd99472735ed0eed49fd44a0faf8d0eee452043375ab7fc45ea569b076269','206c7bd3287fdac8d36c5eb0564725c967eec67091acbc5bb8f7d6dddc696a4235d7f86ff2f4f9a1',0,'2017-06-20 16:10:02'),('c3b33830cd82e81a23d0c29c315d82076b8717f439fad2cba973a1ee24d182dea27b8a25dfce7411','d162a596c228310eb24179b13c43723fd4879ceddc1298692d9fac6fd8ffa5e2d80e642f8969551a',0,'2017-05-30 07:32:25'),('c4039996f18f146cd509c87481f6a617e95079ac372aaf99b5cdbaa9d770955df0f2682469f6771f','90fcd07e69c7f7a67fafb8970ed85ea6531d4ef343e4916c1dd60503bce2f3b7ba21b163c0dcd180',0,'2017-06-03 14:57:42'),('c6b02db49dc4099617f2708bdf9a925936c429d3ef0634d4f5461e5480f395aee0949e079f53e80e','4f6c6b98ecf33dbc3fef4d1d6798b3f2f9ed578184d5e5a322d68b1adf018a5b196e284413cb5708',0,'2017-05-30 07:31:39'),('c9cca784142dd99518a0ac72f1459efce52680aeef53f6ee000b25e94d349fc4d1099eeb333d5138','cf5eaec1c6dd5345e44ee32077b14fb938f375c7bcb24a5127ba5074f073b2baec8ebc8bacaf9e79',0,'2017-06-03 07:42:05'),('ca9ab941d1562d6f3d5e777a4864bb05a1bb02b918dd4a649c29e999e39be4438287faf8b614863b','64a10c565d3d26399b3b7c862cfb2ba8bd1a1bddabf7c18f1000acfb751d0f5ed3d53e22de4c3519',0,'2017-06-03 05:42:50'),('cce9485b2313786d20f607088f4979d599bf8f88c96ddc2e5c752d2b1fe8aaa3c689310a1fbf8507','c6c4b4e2b234839cf685de191589b78e1179feaa1ac6086d8457a7a688e6665fbe7c12f3e540c9e5',0,'2017-06-20 16:09:02'),('cdd715e64cba596d00271326597c9c0d23b39baf904fc4e3b5c902539542fef8293a0346a65d905c','6f57e091ef093b8d5d75cc85b4b878207b6791b3b75ddb0613b68a063b6931e92d0dc94332046536',0,'2017-06-20 16:18:56'),('d1aa3b7d6a94483df3971ef00c848b83343b6a25817abdd6428c99f387b8aa1ef2a568609ccf5867','d342a34bc2c552b7eb5a48673f8ca1bad0ec70b0e2f28f048479b5dbd919ddf0f42303010af5bdf6',0,'2017-06-28 08:20:49'),('d2b6837b36ef91293561b45210955bd7ef04a7f73004bdc1dd0f17fdad2bb00c59eba83cdb2f9855','15c7ae0d26c838c1b45c7344fc051888662e931a9c95a27b96d6e23675271ff94a09983f16dac21f',0,'2017-06-20 16:11:02'),('d3b1d423a57f7197566e271216b49e28b57843069c445f331a7950dcc03e5395b7773a85050c0913','5ddd6024c4514dad9f960e7ea09373bab25ba5b29365723ad910bd422cbe585dc9c375f932a9127d',0,'2017-06-20 16:22:53'),('d3bb0f7a5060e77fe0bce364d033be6705250f3691bee7ccea347e5afd1f5c8fd42358ea1556650c','0e7435ca726b5ea6cd5f8ed2e9028e7805fa39e2954ebc953ddd1b8119be0c82d56a9632ea12c3f0',0,'2017-06-20 16:23:27'),('d9527102d663bd739e42a312942c4217ee3bdb8a1b831327218efafdc87db57880bb69d3a6d43260','eb1b5b4236a6818bc752579077f9d2dd3d1ef1cb4e85af27cbf2b3f9e27596a75dd8e889fe951eac',0,'2017-06-03 05:43:10'),('dfbf9d22c2aa79a82adf02849ff8f68aac0edd8af00e6392f8f1410891f827150c79f6184bb3ddff','687b39bf801a6ec46dfedb015d9856f3bfc99580d34da27111f501d22181752c9bdabd380db27ad1',0,'2017-06-03 08:03:03'),('e0ab0767767b7364ccf116e3749a1c58e7e601b6f0a055522e1fcaeaa01488a6f41c6a3c96b49ec4','e9b4948b982cf8691c2cf740493cf567641f98452c4f37720c2f86d55db384b2d1c1c202c38e7d0f',0,'2017-06-20 13:46:57'),('e1a360d427630a8d507e1dced5611afb98aa88ff21ddc097501212c932d1b92530a053755e31d5a3','44aa53240e81205d85272c1656446fc91640789ef0632de8937da3d66d804ecc2acb6ed71653fee9',0,'2017-05-29 16:01:32'),('e63ab295d454552b4c9a8d987b39e21332000d38683b97e0f7a6028fcf53b4a74bbe571e2699eeef','32ddc6ad886631302a3c48537c31fe0b6af4a05132a8424e6a484931de925c95fa40ccdcd8fb8f97',0,'2017-06-20 16:26:40'),('eddfa9ccf4850329a1dc5f285f2b38f8ef34db24ab2ff97939b84a85fa89ec99009ce54db659260a','db72738c9889b70ce328c4d52ee200ef7f80f7995ca8b0e236dfbc91584b69b9c638c179d3d4b998',0,'2017-06-20 16:43:21'),('ef533418e1885c025f8f713f9eb6a34455da23ff9952750aa3f7844d5d48987d6add01d9292a0bf5','b3e10a516ae2c18b456e6f2fcf4a8e59be41c7d134475eb3489c61199d962d3f630dcc1f9405aea4',0,'2017-06-28 10:13:02'),('f3970c7bba11f96f32e521591caa2642cd095ac7028a22ac66dd9ec393d26f99cfd74c78e11386a1','18d43ec2098588dbb8fd5bb7b32e0c5dc3e873d968493252f3ea8e54590f98d879b857d395fa1b48',0,'2017-06-03 05:43:09'),('faf092a6c721318224188c02eaae11d2ee80b3ce640a275872961d96dd412659a1b9d44819ebe386','21c2275d2df3ba35b5b24b3653e453813c66294792e7ee963beb4ab357cae5b75a7ada7f0fc4904a',0,'2017-06-20 16:17:32'),('fe6e6416d1fd8eb3c793167c38210d9cff0873cf79b5a8e876b1f51698cc036d05e178314499c572','70a26346b73ad3c32771faea5a8e6ba8ae6df380c5b40400e79584deabbee849337aef9445711b3e',0,'2017-05-30 05:18:54');
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jackxiao Xiao','258082291@qq.com','$2y$10$l2djaqt9.R4ASxlS1/mwvOPNPfGgep4kJjq9EtZhAAENByx2/qKru','GKUpdW9LBCBchTC7D7APkOAIABVAGtiuSEXdxlC65JlDUqZip7ML0lRh8qOU','2017-05-23 14:43:31','2017-05-23 14:43:31','SkDiVL60nS1F4ly6KlIqc9C2H0eIjrEARkvIZUGvq197oQOFUVt8J4OfNA0d'),(2,'JackXiao','JackXiao@qq.com','$2y$10$xzbaRL46PpwlB/OgqbjAzuDYGy3Ry3VhKilvO4zX4wW4zYL4D4Haq','o0785TC3ByxmlXRGvgjJ84djpLtw1TSnZkr2XxbOzuhxBn2WuLNAean1xX1a','2017-05-25 14:13:44','2017-05-25 14:13:44','y2GV6kBk0KRiR95ugk3o9yp4I0K2CXkDNy5i4wQj4uPKKEaDvazscQBVuVdA');
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

-- Dump completed on 2017-08-08 19:37:28
