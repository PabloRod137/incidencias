-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: localhost    Database: alpe
-- ------------------------------------------------------
-- Server version	8.0.46

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
-- Current Database: `alpe`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `alpe` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `alpe`;

--
-- Table structure for table `aulas`
--

DROP TABLE IF EXISTS `aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aulas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'Aula 337','Planta 1',NULL,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(2,'Aula 174','Planta 2',NULL,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(3,'Aula 471','Edificio B',NULL,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(4,'Aula 218','Planta 2',NULL,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(5,'Aula 433','Edificio B',NULL,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(6,'Aula 333','Planta 2',NULL,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(7,'Aula 216','Planta 2',NULL,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(8,'Aula 135','Planta 1',NULL,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(9,'Aula 372','Planta 2',NULL,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(10,'Aula 496','Edificio B',NULL,'2026-08-04 07:36:24','2026-08-04 07:36:24');
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel-cache-admin@admin.es|172.19.0.1','i:2;',1785829872),('laravel-cache-admin@admin.es|172.19.0.1:timer','i:1785829872;',1785829872),('laravel-cache-francisca55@example.com|172.19.0.1','i:1;',1785829590),('laravel-cache-francisca55@example.com|172.19.0.1:timer','i:1785829590;',1785829590),('laravel-cache-test@example.es|172.19.0.1','i:1;',1785830125),('laravel-cache-test@example.es|172.19.0.1:timer','i:1785830125;',1785830125);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorias_responsable_id_foreign` (`responsable_id`),
  CONSTRAINT `categorias_responsable_id_foreign` FOREIGN KEY (`responsable_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Seguridad',8,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(2,'Audiovisuales',1,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(3,'Limpieza',8,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(4,'Audiovisuales',8,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(5,'Electricidad',1,'2026-08-04 07:36:24','2026-08-04 07:36:24');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `incidencia_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `mensaje` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comentarios_incidencia_id_foreign` (`incidencia_id`),
  KEY `comentarios_user_id_foreign` (`user_id`),
  CONSTRAINT `comentarios_incidencia_id_foreign` FOREIGN KEY (`incidencia_id`) REFERENCES `incidencias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comentarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,14,3,'Nesciunt blanditiis fuga perferendis reiciendis id quas reprehenderit dolor recusandae provident reprehenderit blanditiis aliquid.','2026-07-08 23:31:54','2026-08-04 07:36:24'),(2,7,2,'Veritatis repellat ab ut quidem culpa et ipsa.','2026-08-01 12:06:11','2026-08-04 07:36:24'),(3,15,4,'In voluptatum inventore explicabo natus atque totam.','2026-07-10 04:02:24','2026-08-04 07:36:24'),(4,5,10,'Temporibus et aut necessitatibus rem veniam amet.','2026-08-03 22:20:27','2026-08-04 07:36:24'),(5,1,9,'Vel blanditiis laboriosam incidunt ut ullam nostrum culpa quis.','2026-07-10 12:02:34','2026-08-04 07:36:24'),(6,8,2,'Quo vitae quia est doloremque tempore nihil.','2026-07-29 15:57:48','2026-08-04 07:36:24'),(7,14,6,'Architecto enim in esse quasi sint nulla corrupti velit praesentium a.','2026-07-18 09:56:59','2026-08-04 07:36:24'),(8,6,8,'Velit eaque sunt nulla qui eos nihil ea molestiae ipsa.','2026-08-03 20:42:17','2026-08-04 07:36:24'),(9,13,10,'Ut quibusdam voluptates harum aspernatur enim vel consequatur accusantium ut.','2026-07-17 04:41:41','2026-08-04 07:36:24'),(10,4,7,'Aliquam a dicta aut modi ut nisi magni.','2026-07-29 20:27:02','2026-08-04 07:36:25'),(11,2,5,'Adipisci modi nisi explicabo quae ducimus nobis qui non exercitationem quis pariatur est nam.','2026-07-28 17:34:35','2026-08-04 07:36:25'),(12,8,1,'Nesciunt esse aut dolores voluptas id animi repellendus natus.','2026-07-11 17:16:30','2026-08-04 07:36:25'),(13,7,10,'Est nostrum magni eligendi omnis et et esse perspiciatis voluptatum nihil.','2026-08-01 10:37:32','2026-08-04 07:36:25'),(14,3,3,'Et architecto ut doloremque blanditiis autem minus ut.','2026-08-03 12:27:34','2026-08-04 07:36:25'),(15,7,1,'Earum commodi dolor odit natus ratione et voluptatem dolores minus magni eius et.','2026-07-13 00:54:33','2026-08-04 07:36:25'),(16,14,11,'Eligendi omnis voluptatibus suscipit rerum quia animi nesciunt quaerat molestiae quasi quia cumque dolorem.','2026-08-02 06:55:18','2026-08-04 07:36:25'),(17,2,2,'Eaque voluptatem voluptates et ab aut nulla soluta culpa voluptate eveniet qui ex.','2026-07-15 00:31:53','2026-08-04 07:36:25'),(18,2,2,'Nihil aut quo delectus suscipit eos mollitia voluptas omnis nobis.','2026-07-06 06:35:03','2026-08-04 07:36:25'),(19,2,5,'Ad est molestiae recusandae architecto aut est maxime totam expedita aut et qui vero.','2026-07-25 14:50:07','2026-08-04 07:36:25'),(20,5,9,'Odit voluptatum sint delectus ipsum aspernatur et exercitationem repudiandae cumque quis molestiae molestias.','2026-08-04 05:37:09','2026-08-04 07:36:25'),(21,1,9,'Et et velit pariatur accusamus reprehenderit mollitia voluptas.','2026-07-31 23:21:45','2026-08-04 07:36:25'),(22,13,3,'Mollitia autem illo eos aut rerum in autem voluptatibus.','2026-07-25 09:04:47','2026-08-04 07:36:25'),(23,1,6,'Sit eligendi eos voluptatum pariatur molestiae distinctio illum enim similique.','2026-07-15 03:40:52','2026-08-04 07:36:25'),(24,2,1,'Excepturi ipsa eos magni sed itaque doloremque aut quia nesciunt nihil omnis impedit.','2026-07-08 08:41:22','2026-08-04 07:36:25'),(25,7,7,'Odio quam labore dolorum reiciendis tempora animi sequi aut excepturi.','2026-07-28 03:35:39','2026-08-04 07:36:25'),(26,3,4,'Maxime sint dolore modi consequatur ex sit ea.','2026-07-18 04:37:57','2026-08-04 07:36:25'),(27,11,7,'Sit velit sed omnis ea quo eos qui et.','2026-07-13 00:00:06','2026-08-04 07:36:25'),(28,10,10,'Ipsam aut cumque quia ut et consequatur et.','2026-08-02 16:02:30','2026-08-04 07:36:25'),(29,12,8,'Distinctio incidunt eos laboriosam dolor atque rerum rem eaque.','2026-07-15 20:06:04','2026-08-04 07:36:25'),(30,11,8,'Numquam est libero sed dicta autem doloremque.','2026-07-16 11:40:33','2026-08-04 07:36:25');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `incidencias`
--

DROP TABLE IF EXISTS `incidencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incidencias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `acciones_a_realizar` text COLLATE utf8mb4_unicode_ci,
  `estado` enum('abierta','en_proceso','resuelta') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'abierta',
  `prioridad` enum('baja','media','alta','critica') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media',
  `user_id` bigint unsigned NOT NULL,
  `aula_id` bigint unsigned NOT NULL,
  `categoria_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `incidencias_user_id_foreign` (`user_id`),
  KEY `incidencias_aula_id_foreign` (`aula_id`),
  KEY `incidencias_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `incidencias_aula_id_foreign` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `incidencias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `incidencias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencias`
--

LOCK TABLES `incidencias` WRITE;
/*!40000 ALTER TABLE `incidencias` DISABLE KEYS */;
INSERT INTO `incidencias` VALUES (1,'Aut ut ea at ullam.','Et id possimus delectus mollitia officia fugit non. Hic voluptatibus soluta perferendis earum facilis non. Mollitia nobis non voluptatem repudiandae.',NULL,'en_proceso','media',10,9,3,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(2,'Cum veritatis magnam repellendus.','Soluta laudantium non in accusantium. Nulla ut et perferendis ipsam tempora. Adipisci rerum fugiat ut et dolore.',NULL,'resuelta','critica',9,7,2,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(3,'Est qui ullam quia minus vero.','Est fuga maiores at reprehenderit laudantium alias ut. Quod nemo enim itaque laboriosam dolore magni distinctio velit. Odit necessitatibus aperiam omnis et aperiam non qui. Quia voluptas consequuntur minus.','Ut exercitationem unde veniam veritatis omnis.','en_proceso','critica',6,5,2,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(4,'Sequi distinctio architecto saepe aut.','Iste iste error maxime corrupti. Et blanditiis esse illum excepturi autem ut cupiditate.',NULL,'en_proceso','critica',6,4,3,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(5,'Enim quia qui laborum.','Ut porro eum illo nihil dicta doloremque quisquam vel. Cupiditate culpa fugiat odio aut. Sed architecto accusantium error et sint.','Eligendi rerum vel qui enim fugiat.','resuelta','media',5,5,1,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(6,'Dolores voluptatibus voluptas veritatis alias.','Fuga ducimus est quis aut sunt asperiores sit. Ipsum inventore pariatur dolorem modi illum. Itaque quisquam maiores vel sed adipisci id quaerat omnis.','Et quasi enim aspernatur optio expedita dignissimos.','abierta','media',8,1,1,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(7,'Suscipit eum alias.','Aut et veniam sunt aut. Molestias debitis assumenda cum est aliquid. Placeat rerum dolorem consequatur voluptatum architecto quas. Nesciunt maxime sit eum voluptas ratione.',NULL,'en_proceso','media',3,5,5,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(8,'Qui qui maiores.','Voluptas nobis nisi iure labore soluta voluptas. Fuga dolor delectus sed similique. Perspiciatis ipsam enim soluta odio rerum. Blanditiis nobis molestias est.',NULL,'abierta','baja',11,4,4,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(9,'Id id beatae cum.','Ut et unde consequatur labore et. Et possimus et voluptatem. Cupiditate aut aliquid eligendi ad recusandae voluptas hic magnam. Fugit consectetur odit dolore ut quo.','Odio deleniti aut repudiandae eius quidem occaecati.','resuelta','baja',8,5,5,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(10,'Dolores fuga veritatis dolorem.','Excepturi aspernatur vel id qui dolor aspernatur. Totam tenetur itaque est molestiae dolorum sint rerum. Itaque vel blanditiis repellendus incidunt quisquam placeat.','Aut placeat ut corrupti ut molestiae quis laboriosam.','en_proceso','alta',8,6,1,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(11,'Qui et soluta quo dolores.','Est deleniti consequatur voluptatibus aut quaerat. Hic recusandae aspernatur explicabo veritatis ab et. Vitae aut qui nemo aspernatur. Fugiat aliquam ut autem aut.','Laudantium aut porro veritatis et quo ea.','en_proceso','critica',11,7,4,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(12,'Neque non autem sapiente voluptatum.','Et eveniet quas enim reiciendis rem ut. Nostrum vel eaque sunt minima. Delectus temporibus sint consequuntur sint ex. Vero dolor repellat ut perferendis eum.','Occaecati in consectetur voluptatem non quia laboriosam.','abierta','media',8,6,3,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(13,'Necessitatibus odit beatae sed eligendi.','Velit saepe alias nobis sit consectetur. Expedita iste perspiciatis molestias vero sunt in aliquid ut. Et aut est odit ipsam officia eius laboriosam. Quia nobis ut et molestiae. Quaerat error aut explicabo.',NULL,'resuelta','alta',8,3,2,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(14,'Occaecati voluptas voluptatem ut beatae.','Voluptatibus repudiandae alias aut est. Eveniet quidem voluptatem dolores fugit velit.','Libero omnis corporis itaque blanditiis esse reiciendis.','resuelta','critica',4,7,5,'2026-08-04 07:36:24','2026-08-04 07:36:24'),(15,'Qui voluptatum est perspiciatis eligendi molestiae.','Ipsum cumque aperiam temporibus unde similique quis. Ad omnis dolor a doloribus. Eos tempora a rerum neque ut quasi.','Placeat aut atque et sit ea est.','en_proceso','media',1,10,4,'2026-08-04 07:36:24','2026-08-04 07:36:24');
/*!40000 ALTER TABLE `incidencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_08_082903_create_aulas_table',1),(5,'2026_05_08_082903_create_categorias_table',1),(6,'2026_05_08_082904_create_incidencias_table',1),(7,'2026_05_08_082905_create_comentarios_table',1),(8,'2026_05_08_103740_add_horario_to_aulas_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('5ZLNleANUj8JhaxkHJcV01zbxvqCDziKZkMzsYuU',NULL,'172.19.0.1','curl/8.19.0','eyJfdG9rZW4iOiIyVGM3ZDJ2Y044cFVmVWJ3ODlhUGpyOFk1Y3dESzF6TTYwZlRIcGh4IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1785829076),('9dvU8xBG556Si9MyIZvR1tfHeTdzrhAxdC6H6AGv',11,'172.19.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Claude/1.24012.9 Chrome/148.0.7778.280 Electron/42.7.0 Safari/537.36 MSIX','eyJfdG9rZW4iOiJJUjh6a1ZQdGdVRUl6RVhGZ2JuZGZ6VGpFd1pobEhYMUx3ell4TVd0IiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAxXC9iYWNrXC9pbmNpZGVuY2lhcyIsInJvdXRlIjoiaW5jaWRlbmNpYXMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MTF9',1785829514),('HwOpJQeDP76sWtK5Dt6Wu3C5ERJNpP7BCUcOiMzg',NULL,'172.19.0.1','curl/8.19.0','eyJfdG9rZW4iOiJteWtnbHRNWTlMTFczQ3ZzejdPdGxkelRqdFdvM1g3VGppOERhZVdLIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAxIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1785829401),('mrrnHh2ELpua2O55XY8qRcYttL1zdciwIXyxATxK',3,'172.19.0.1','curl/8.19.0','eyJfdG9rZW4iOiI4SWpOWUJxb3pHUjFmVHpvUW1TOW5kWHZLbXd1RWFtTVR1MnY3UmtiIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAxXC9iYWNrXC91c3VhcmlvcyIsInJvdXRlIjoidXN1YXJpb3MuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6M30=',1785829601),('OhFyPj7a8WQHQciOVHp0IdwsilmIJgnJ1AEQrUVV',11,'172.19.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJtVEdodWlJYTlnc0NoUlFzb1l3VGtidVBFWjM5Y1F3dEkxbVZocTU0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAxXC9iYWNrXC9pbmNpZGVuY2lhcyIsInJvdXRlIjoiaW5jaWRlbmNpYXMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MTF9',1785830104),('oSjbKlOMUjxUn4eg8u7SR38TSj0lLLW7YvARcCIg',NULL,'172.19.0.1','curl/8.19.0','eyJfdG9rZW4iOiJGdFNIOTJwMHhwUm95RnFXZzN4b1VmYVBaU2JYd2dyWFBGUjdNQng5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAxIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1785829406),('V9oeXgpCyJYSdv1HhmeTzJ2bE4SlRTyM1Mx4nSnU',3,'172.19.0.1','curl/8.19.0','eyJfdG9rZW4iOiJ5OXVEYmxxN2psZGZ4ZWgzUWdPWk5EaGlhaU94QzliVElCRDhiN1dnIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAxXC9iYWNrIiwicm91dGUiOiJiYWNrLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjN9',1785913631),('Vx4qkBcJ9wfUfrD9mnRIIo6z0vJn7b9MDEItf2TI',NULL,'172.19.0.1','curl/8.19.0','eyJfdG9rZW4iOiJ4Z1NocFRJN3F3Q1B4YTN0c3lOcVJNTHBWMXgxUkVET1RMNm43ZHFpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAxXC9iYWNrIiwicm91dGUiOiJiYWNrLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDFcL2JhY2sifX0=',1785829554);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','profesor','mantenimiento') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profesor',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Dña Yaiza Sierra Hijo','rvargas@example.com','2026-08-04 07:36:23','$2y$12$YybvDjx/0nbfodELoCL9VO6RlCV8X0fwHcAVqTecZJyIlNtz9W/aq','admin','0XziMnjUAn','2026-08-04 07:36:23','2026-08-04 07:36:23'),(2,'Raúl Zavala','encarnacion13@example.org','2026-08-04 07:36:23','$2y$12$YybvDjx/0nbfodELoCL9VO6RlCV8X0fwHcAVqTecZJyIlNtz9W/aq','admin','MgdXe6hiER','2026-08-04 07:36:24','2026-08-04 07:36:24'),(3,'Dario Solorio','tarroyo@example.net','2026-08-04 07:36:24','$2y$12$YybvDjx/0nbfodELoCL9VO6RlCV8X0fwHcAVqTecZJyIlNtz9W/aq','profesor','dfuF0i3bhw','2026-08-04 07:36:24','2026-08-04 07:36:24'),(4,'Francisco Javier Ruvalcaba','sexposito@example.org','2026-08-04 07:36:24','$2y$12$YybvDjx/0nbfodELoCL9VO6RlCV8X0fwHcAVqTecZJyIlNtz9W/aq','profesor','LxYnDxGwAk','2026-08-04 07:36:24','2026-08-04 07:36:24'),(5,'Sra. Amparo Carrillo Tercero','angeles22@example.com','2026-08-04 07:36:24','$2y$12$YybvDjx/0nbfodELoCL9VO6RlCV8X0fwHcAVqTecZJyIlNtz9W/aq','profesor','6vGJtdVn0I','2026-08-04 07:36:24','2026-08-04 07:36:24'),(6,'Ing. Sara Zarate','zcontreras@example.com','2026-08-04 07:36:24','$2y$12$YybvDjx/0nbfodELoCL9VO6RlCV8X0fwHcAVqTecZJyIlNtz9W/aq','profesor','fpC0s6XVse','2026-08-04 07:36:24','2026-08-04 07:36:24'),(7,'Lic. Javier Rascón Tercero','marc65@example.com','2026-08-04 07:36:24','$2y$12$YybvDjx/0nbfodELoCL9VO6RlCV8X0fwHcAVqTecZJyIlNtz9W/aq','profesor','Z3iFF58djT','2026-08-04 07:36:24','2026-08-04 07:36:24'),(8,'Ing. Vera Montero Hijo','marrero.natalia@example.net','2026-08-04 07:36:24','$2y$12$YybvDjx/0nbfodELoCL9VO6RlCV8X0fwHcAVqTecZJyIlNtz9W/aq','mantenimiento','uT6xgsLlhi','2026-08-04 07:36:24','2026-08-04 07:36:24'),(9,'Juan José Quintana Hijo','yaiza.banuelos@example.net','2026-08-04 07:36:24','$2y$12$YybvDjx/0nbfodELoCL9VO6RlCV8X0fwHcAVqTecZJyIlNtz9W/aq','mantenimiento','DZcSWRIuaP','2026-08-04 07:36:24','2026-08-04 07:36:24'),(10,'Lara Pichardo','oornelas@example.org','2026-08-04 07:36:24','$2y$12$YybvDjx/0nbfodELoCL9VO6RlCV8X0fwHcAVqTecZJyIlNtz9W/aq','mantenimiento','QjlLVuJkx5','2026-08-04 07:36:24','2026-08-04 07:36:24'),(11,'Test User','test@example.com','2026-08-04 07:36:24','$2y$12$YybvDjx/0nbfodELoCL9VO6RlCV8X0fwHcAVqTecZJyIlNtz9W/aq','admin','5raHMuXoL2','2026-08-04 07:36:24','2026-08-04 07:36:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'alpe'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-05  7:09:57
