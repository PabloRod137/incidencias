-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: alpe
-- ------------------------------------------------------
-- Server version	8.0.30

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'Desarrollo de aplicaciones web','aula 7','mañana','2026-05-08 08:18:53','2026-05-08 08:40:28'),(3,'Aula 490','Planta 2',NULL,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(4,'Aula 144','Planta 2',NULL,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(5,'Aula 128','Edificio B',NULL,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(6,'Aula 332','Planta 2',NULL,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(7,'Aula 373','Planta 1',NULL,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(8,'Aula 266','Planta 2',NULL,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(9,'Aula 260','Planta 1',NULL,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(10,'Aula 271','Planta 1',NULL,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(11,'progrmcion orientada a objetos','aula 7','tarde','2026-05-12 07:43:14','2026-05-12 07:43:32');
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
INSERT INTO `categorias` VALUES (1,'Electricidad',1,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(2,'Mobiliario',1,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(3,'Hardware',2,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(4,'Limpieza',1,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(5,'Electricidad',9,'2026-05-08 08:18:53','2026-05-08 08:18:53');
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
INSERT INTO `comentarios` VALUES (1,7,2,'Id quidem eum fuga et architecto eveniet error voluptates fugiat nobis dolores ab aut.','2026-04-20 03:00:20','2026-05-08 08:18:53'),(2,14,9,'Ducimus ut accusantium officiis accusamus vel facere esse aperiam suscipit magnam vero velit ipsum.','2026-05-02 03:07:06','2026-05-08 08:18:53'),(3,12,5,'Quae non et magni odit aperiam eos itaque delectus magnam consequatur.','2026-04-08 21:25:47','2026-05-08 08:18:53'),(4,6,5,'Et culpa veritatis quia eum iure rerum architecto explicabo ea quam officia.','2026-04-21 10:53:29','2026-05-08 08:18:53'),(5,15,8,'Ipsam praesentium non eius ducimus molestiae itaque fugiat.','2026-04-13 23:53:46','2026-05-08 08:18:53'),(6,10,3,'Sequi nostrum harum ea dolorem minima illum tempore fugiat.','2026-04-09 15:40:11','2026-05-08 08:18:53'),(7,7,6,'Natus eius in eveniet in asperiores veritatis earum totam quos.','2026-04-12 23:07:06','2026-05-08 08:18:53'),(8,5,9,'Itaque omnis exercitationem aperiam fuga soluta molestias sunt veritatis.','2026-05-04 00:17:45','2026-05-08 08:18:53'),(9,14,3,'Ex accusantium dolorum non beatae aut veritatis sunt quis aut molestiae impedit ut.','2026-04-26 15:26:15','2026-05-08 08:18:53'),(10,12,1,'Quam quo nobis ea in nostrum rerum quis.','2026-04-22 00:17:02','2026-05-08 08:18:53'),(11,3,1,'Corporis beatae minima non ab sit quos.','2026-04-19 03:01:08','2026-05-08 08:18:53'),(12,15,1,'Quisquam nihil asperiores quia velit culpa consequatur tempora nihil.','2026-05-01 10:00:50','2026-05-08 08:18:53'),(13,6,7,'Quisquam recusandae voluptatem non sit dignissimos sit.','2026-04-12 02:09:44','2026-05-08 08:18:53'),(14,9,7,'Hic et dolorem officiis laboriosam odio voluptatem.','2026-05-08 06:05:27','2026-05-08 08:18:53'),(15,9,1,'Dignissimos dicta recusandae modi quibusdam praesentium aut dolorem vel.','2026-05-04 13:28:39','2026-05-08 08:18:53'),(16,11,2,'Fuga sint consectetur tempore nobis hic molestiae.','2026-04-13 20:24:52','2026-05-08 08:18:53'),(17,7,10,'Odit praesentium non totam possimus error nihil nihil omnis magni.','2026-05-06 22:13:19','2026-05-08 08:18:53'),(18,8,3,'Expedita repellat at omnis modi incidunt quasi.','2026-04-17 21:23:22','2026-05-08 08:18:53'),(19,7,1,'Qui quia iste quidem placeat et commodi et non qui aut.','2026-04-26 16:55:47','2026-05-08 08:18:53'),(20,7,4,'Accusamus veniam aperiam est consequatur architecto ratione hic eius modi.','2026-04-23 00:11:18','2026-05-08 08:18:53'),(21,8,5,'Nihil quaerat minima minima quidem autem sapiente hic cumque officia et nobis labore esse.','2026-04-20 03:17:27','2026-05-08 08:18:53'),(22,9,5,'Qui corporis tenetur quo alias magni asperiores blanditiis et maiores modi sint omnis.','2026-04-25 22:09:34','2026-05-08 08:18:53'),(23,14,5,'Deleniti est tempore optio recusandae voluptatem quasi voluptates eligendi doloribus.','2026-04-13 13:10:31','2026-05-08 08:18:53'),(24,11,11,'Dolorum inventore qui ut cumque deserunt eos nostrum expedita eum.','2026-04-24 22:20:59','2026-05-08 08:18:53'),(25,3,6,'Quibusdam magnam unde dolores ut nisi ut vitae.','2026-05-04 16:11:40','2026-05-08 08:18:53'),(26,3,5,'Repudiandae et aliquid excepturi qui adipisci pariatur qui molestiae consectetur sint blanditiis sint asperiores.','2026-04-10 17:11:12','2026-05-08 08:18:53'),(27,14,3,'Fugit vitae nesciunt nemo iusto quis asperiores est nesciunt id sequi velit.','2026-05-07 20:14:56','2026-05-08 08:18:53'),(28,1,2,'Ut assumenda officia fugiat distinctio expedita in ea vel quasi.','2026-05-04 22:31:26','2026-05-08 08:18:53'),(29,4,1,'Sunt optio sit maiores fuga et quis.','2026-05-07 04:33:03','2026-05-08 08:18:53'),(30,14,7,'Dicta beatae asperiores aut pariatur neque voluptatem accusantium ipsa voluptatem.','2026-04-18 18:37:52','2026-05-08 08:18:53');
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
INSERT INTO `incidencias` VALUES (1,'Doloremque architecto optio consequuntur voluptatum quam.','Nemo maxime quis qui pariatur ut. Aperiam nostrum et ut est laudantium et. Aliquid non quod porro velit quia omnis. Assumenda quo commodi enim aut aliquid porro error.',NULL,'abierta','alta',3,3,5,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(2,'Dolorem voluptates commodi.','Deserunt quia et sed nihil expedita. Sit eum aliquam est quae aut. Quaerat id magni sed in rerum cumque numquam.','Beatae ut rerum quidem quia.','resuelta','media',2,6,2,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(3,'Libero minima et accusantium molestias nisi.','Reprehenderit omnis nesciunt dolorem corrupti laboriosam. Et animi necessitatibus quas dolorem doloremque. Et sed quo vel debitis tempora consequatur. Qui ipsum autem placeat recusandae.','Omnis aut tempora ex sint mollitia qui.','en_proceso','alta',6,8,3,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(4,'Repudiandae est qui modi maxime.','Laboriosam dolorum quaerat rem autem. Sapiente assumenda doloribus ut modi inventore. Molestiae id esse et.',NULL,'en_proceso','media',5,3,1,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(5,'Et ducimus quidem impedit.','Possimus quidem doloremque saepe sequi. Et voluptas est rerum autem omnis nesciunt numquam hic. Ducimus in animi beatae eum quis. Quos et nihil rem velit numquam consequuntur eaque.',NULL,'resuelta','media',1,1,3,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(6,'Perspiciatis ut voluptas non.','Neque sapiente similique omnis. Iusto commodi voluptas provident ab sunt id sed quod.',NULL,'abierta','critica',9,5,2,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(7,'Quidem est tenetur temporibus omnis nisi.','Officia odit laboriosam voluptas neque et enim. Provident quas numquam quis quidem. Commodi sit est dolorem recusandae eum est veniam. Similique consequatur harum rerum ad.','Qui reprehenderit neque laboriosam.','abierta','baja',6,8,1,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(8,'Voluptas itaque pariatur ut consequatur.','Ipsam vero totam aut voluptas. Maxime deleniti sed quos aut ut. Harum aliquid ut repellendus ut ut. Ad aperiam totam sed.',NULL,'en_proceso','baja',4,8,2,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(9,'A minus totam saepe et.','Architecto iste dolorem laudantium. Non officiis quos numquam et. Hic voluptatem eaque velit vel. Vel soluta nobis aspernatur qui molestias deleniti.','Qui incidunt est perspiciatis est omnis.','en_proceso','critica',4,8,3,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(10,'Repellat sint in qui dolor.','Est dolor rem qui incidunt autem aut. Earum tempora et explicabo nobis porro quae. Expedita est vitae mollitia.',NULL,'abierta','alta',1,4,3,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(11,'Dolor in in velit.','Est eaque quia maiores cupiditate. Eos ipsam facere qui sunt. Iusto eum dignissimos cumque vero nihil sed facere. Eius unde qui enim labore dolores sunt.','Sint et minima ab praesentium temporibus.','resuelta','baja',11,7,3,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(12,'Placeat sint laboriosam ad quas perspiciatis.','Ea officia nam voluptatum enim quae laborum doloribus. Aperiam non rerum aut temporibus. Temporibus eveniet earum ab omnis rem tenetur. Incidunt aspernatur assumenda voluptatem molestias.','Eaque dolorem libero quidem enim omnis porro repudiandae.','en_proceso','alta',2,6,4,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(13,'Aut eligendi nisi.','Deleniti quos sed sunt voluptas nihil a. Ea quibusdam necessitatibus sed eum illum deserunt doloribus. Voluptates est omnis vel sed qui. Et culpa enim similique quos dolores. Velit est aut non aut reiciendis.','Aliquam corporis voluptatum nihil.','resuelta','critica',2,9,3,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(14,'Corporis vel consequuntur voluptatem excepturi et.','Porro qui corrupti quis numquam sint eligendi. Laborum omnis recusandae nisi. Corporis non officiis ducimus debitis voluptate quod quia.','Minima alias cumque facere omnis qui impedit quo.','en_proceso','critica',6,6,1,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(15,'Sit maiores occaecati fuga asperiores.','Porro exercitationem eveniet magni iste beatae quae. Magni voluptates corporis atque ad. Asperiores impedit est alias qui. Libero aut deserunt tenetur et possimus eum repudiandae.','Quas esse qui labore similique aliquam.','resuelta','alta',4,6,3,'2026-05-08 08:18:53','2026-05-08 08:18:53'),(16,'interne','falla wifi en toda la clase, mala conezxion o falta de ella',NULL,'abierta','critica',1,3,3,'2026-05-08 08:48:03','2026-05-08 08:48:03');
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
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_08_082903_create_aulas_table',1),(5,'2026_05_08_082903_create_categorias_table',1),(6,'2026_05_08_082904_create_incidencias_table',1),(7,'2026_05_08_082905_create_comentarios_table',1),(8,'2026_05_08_103740_add_horario_to_aulas_table',2);
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
INSERT INTO `sessions` VALUES ('evAYVajkAsWHhcHuLbVL9JZ2fKcOWdOmIUGe1T4S',12,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJjR25tYUtLa0VCdkUxMDl1UUxGUG1BamFmcjlYVGNGdHFxMGIyTkxTIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvaW5jaWRlbmNpYXNhbHBlLnRlc3RcL2JhY2tcL2NvbWVudGFyaW9zIiwicm91dGUiOiJjb21lbnRhcmlvcy5pbmRleCJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MTJ9',1778586681),('fyeluidOJCwinI8ehZ4STGpZH0XX4xxtGTuDmZfR',12,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJqQ09CcGplVVVQRFJBbm1mTkRSa3p4OWplalpvZExwd0FOZEdCWVJwIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvaW5jaWRlbmNpYXNhbHBlLnRlc3RcL2JhY2siLCJyb3V0ZSI6ImJhY2suaW5kZXgifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEyfQ==',1778239554),('R2eqPAT85xHkhu9tXBkb82G7IzTkr102IiT5HsoE',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJLaVFBdG1TVDY0WUdvN01tVHlBOWVIUzJDZWpQZkRSUDk2M05pMFlmIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvaW5jaWRlbmNpYXNhbHBlLnRlc3QiLCJyb3V0ZSI6ImhvbWUifX0=',1778656309);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Gloria Haro Segundo','zayas.miriam@example.net','2026-05-08 08:18:52','$2y$12$6iRy4MUSC/d3W/MVF7ARN.dCPReBOVVSY5ijJ54Kb70n3F2yi/3u.','admin','rcvhmtXCeA','2026-05-08 08:18:53','2026-05-08 08:18:53'),(2,'Lic. Encarnación Leiva','montemayor.oliver@example.org','2026-05-08 08:18:53','$2y$12$6iRy4MUSC/d3W/MVF7ARN.dCPReBOVVSY5ijJ54Kb70n3F2yi/3u.','admin','Jy9NygEIFv','2026-05-08 08:18:53','2026-05-08 08:18:53'),(3,'Marc Medrano','conde.ainhoa@example.net','2026-05-08 08:18:53','$2y$12$6iRy4MUSC/d3W/MVF7ARN.dCPReBOVVSY5ijJ54Kb70n3F2yi/3u.','profesor','ElSUZkVsvo','2026-05-08 08:18:53','2026-05-08 08:18:53'),(4,'Aleix Granado','yolanda.carmona@example.net','2026-05-08 08:18:53','$2y$12$6iRy4MUSC/d3W/MVF7ARN.dCPReBOVVSY5ijJ54Kb70n3F2yi/3u.','profesor','usDxtM57pM','2026-05-08 08:18:53','2026-05-08 08:18:53'),(5,'Ing. Ignacio Galarza Hijo','villareal.martina@example.com','2026-05-08 08:18:53','$2y$12$6iRy4MUSC/d3W/MVF7ARN.dCPReBOVVSY5ijJ54Kb70n3F2yi/3u.','profesor','k8cbD66v2i','2026-05-08 08:18:53','2026-05-08 08:18:53'),(6,'Cristina Borrego Tercero','aurora.pascual@example.com','2026-05-08 08:18:53','$2y$12$6iRy4MUSC/d3W/MVF7ARN.dCPReBOVVSY5ijJ54Kb70n3F2yi/3u.','profesor','jZqbobzeTU','2026-05-08 08:18:53','2026-05-08 08:18:53'),(7,'Leo Cotto','villagomez.julia@example.com','2026-05-08 08:18:53','$2y$12$6iRy4MUSC/d3W/MVF7ARN.dCPReBOVVSY5ijJ54Kb70n3F2yi/3u.','profesor','P94xm01UUW','2026-05-08 08:18:53','2026-05-08 08:18:53'),(8,'Laura Apodaca','usegovia@example.com','2026-05-08 08:18:53','$2y$12$6iRy4MUSC/d3W/MVF7ARN.dCPReBOVVSY5ijJ54Kb70n3F2yi/3u.','mantenimiento','ydoEzj6k64','2026-05-08 08:18:53','2026-05-08 08:18:53'),(9,'Alma Gómez Segundo','oliver.clemente@example.net','2026-05-08 08:18:53','$2y$12$6iRy4MUSC/d3W/MVF7ARN.dCPReBOVVSY5ijJ54Kb70n3F2yi/3u.','mantenimiento','6uityGgYHe','2026-05-08 08:18:53','2026-05-08 08:18:53'),(10,'Miriam Chávez','sara.leal@example.org','2026-05-08 08:18:53','$2y$12$6iRy4MUSC/d3W/MVF7ARN.dCPReBOVVSY5ijJ54Kb70n3F2yi/3u.','mantenimiento','WRjElVueID','2026-05-08 08:18:53','2026-05-08 08:18:53'),(11,'Test User','test@example.com','2026-05-08 08:18:53','$2y$12$6iRy4MUSC/d3W/MVF7ARN.dCPReBOVVSY5ijJ54Kb70n3F2yi/3u.','admin','1ur4gn5IQX','2026-05-08 08:18:53','2026-05-08 08:18:53'),(12,'Pablo','admin@example.com',NULL,'$2y$12$ehAc2Vc13krfXg0peHEQouZ7cciXJd67CYmnutUpUNATYxAZ9liaq','admin',NULL,'2026-05-08 08:59:00','2026-05-08 09:13:46'),(13,'Pablo','admin@admin.es',NULL,'$2y$12$Q64V.tvRa1QsZHwB9L7ks.SyMxU/cBn8RNqA7s/LdPPeqqJyFB1DC','admin',NULL,'2026-05-08 09:13:02','2026-05-08 09:13:02');
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

-- Dump completed on 2026-05-14 12:04:18
