-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: new
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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Популярное','popular',NULL,NULL),(2,'Композиции','compositions',NULL,NULL),(3,'Сухоцветы','dried-flowers',NULL,NULL),(4,'Букеты','bouquets',NULL,NULL),(5,'Букеты роз','rose-bouquets',NULL,NULL),(6,'Комнатные растения','houseplants',NULL,NULL),(7,'Воздушные шары','holiday-balls',NULL,NULL),(8,'Конверты','envelopes',NULL,NULL),(9,'Открытки','postcards',NULL,NULL),(10,'Искусственные цветы','artificial',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for_checkbox` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (1,'Белый','white',NULL,NULL),(2,'Желтый','yellow',NULL,NULL),(3,'Зеленый','green',NULL,NULL),(4,'Красный','red',NULL,NULL),(5,'Оранжевый','orange',NULL,NULL),(6,'Розовый','pink',NULL,NULL),(7,'Синий','blue',NULL,NULL),(8,'Микс','mix',NULL,NULL);
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (1,'10',NULL,NULL),(2,'7',NULL,NULL),(3,'22',NULL,NULL),(4,'5',NULL,NULL),(5,'9',NULL,NULL),(6,'29',NULL,NULL);
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formats`
--

DROP TABLE IF EXISTS `formats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for_checkbox` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formats`
--

LOCK TABLES `formats` WRITE;
/*!40000 ALTER TABLE `formats` DISABLE KEYS */;
INSERT INTO `formats` VALUES (1,'Букет','bouquet',NULL,NULL),(2,'В вазе','in-vase',NULL,NULL),(3,'В конверте','in-envelope',NULL,NULL),(4,'В корзине','in-basket',NULL,NULL),(5,'В коробке','in-box',NULL,NULL),(6,'Клош','klosh',NULL,NULL),(7,'В горшке','in-pot',NULL,NULL);
/*!40000 ALTER TABLE `formats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `old_roles`
--

DROP TABLE IF EXISTS `old_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `old_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `old_roles`
--

LOCK TABLES `old_roles` WRITE;
/*!40000 ALTER TABLE `old_roles` DISABLE KEYS */;
INSERT INTO `old_roles` VALUES (1,'admin','Administrator','2022-05-28 10:17:24','2022-05-28 10:17:24');
/*!40000 ALTER TABLE `old_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_products`
--

LOCK TABLES `order_products` WRITE;
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_bldng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_house` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `is_complite` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `composition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Капучино','kapuchino',12000.00,2,'Роза Капучино, Роза Белая, Эвкалипт, Хлопчатник (хлопок)',1,8,'compositions/kapuchino.png',NULL,NULL),(2,'Лавандовое поле','lavanda-pole',4960.00,2,'Лаванда',5,7,'compositions/lavanda-box.png',NULL,NULL),(3,'Сборный из сухоцветов','sborniiy-iz-suhocvetov',3499.00,3,'Микс из луговых сухоцветов',1,8,'dried-flowers/sborniiy-iz-suhocvetov.png',NULL,NULL),(4,'Розовые орхидеи','pink-orchds',7000.00,4,'Орхидея розовая, декоративная зелень',1,6,'bouquets/pink-orchds.png',NULL,NULL),(5,'Микс Роз','rose-mix',7999.00,5,'Роза кустовая красная, Роза Белая, Роза Кофейная',1,8,'bouquets/roses-mix.png',NULL,NULL),(6,'Синий иней','simiy-iney',9499.00,5,'Роза Синяя',1,7,'bouquets/siniy-iney.png',NULL,NULL),(7,'Дикое поле','dikoe-pole',2400.00,3,'Микс сухоцветов полевых цветов',6,8,'dried-flowers/dikoe-pole.png',NULL,NULL),(8,'Желтое поле','jeltoe-pole',3599.00,3,'Лимониум и микс полевых трав',1,2,'dried-flowers/jeltoe-pole.png',NULL,NULL),(9,'Цветами радуги','cvetami-radugi',15999.00,2,'Амариллис, Гербера, Лилия, Роза, Эвкалипт',2,8,'compositions/cvetami-radugi.png',NULL,NULL),(10,'Алые розы','alie-roses',8000.00,5,'Роза красная',1,4,'bouquets/mono-rose.png',NULL,NULL),(11,'Ультрофиолет','ultrofilet',6599.00,4,'Дендробиум синий',1,7,'bouquets/ultrofilet.png',NULL,NULL),(12,'Азалия Белая','azaliya-belaya',2499.00,6,'Азалия Белая',7,1,'houseplants/azaliya.png',NULL,NULL),(13,'Мини Орхидеи','mini-orchds',3500.00,6,'Мини орхидея желтая, Мини орхидея белая',7,8,'houseplants/mini-orchds.png',NULL,NULL),(14,'Конверт лаванды','konvert-lavanda',999.00,8,'Сухоцвет лаванда',3,7,'envelopes/lavanda-konvert.png',NULL,NULL),(15,'Белые Ночи','white-nights',4999.00,5,'Роза белая, Сирень',1,1,'bouquets/white-nights.png',NULL,NULL),(16,'Охапка гербер','ohapka-gerber',7000.00,4,'Герберы, Зелень дерокативная',1,6,'bouquets/ohapka-gerber.png',NULL,NULL),(17,'Нежность','nejnost',1700.00,10,'Искусственная композиция из экологичных материалов',5,1,'artificial/nejnost.png',NULL,NULL),(18,'Винтаж','vintage',2300.00,10,'Искусственная композиция из экологичных материалов',2,8,'artificial/vintage.png',NULL,NULL),(19,'Лайм','laim',3200.00,2,'Хризантема Желтая',1,2,'compositions/laim.png',NULL,NULL),(20,'Нова белая','new-white',10999.00,2,'Роза Белая, Хризантема Белая, Хлопок',4,1,'compositions/new-white.png',NULL,NULL),(21,'Большая корзина','bolshaya-korzina',7999.00,3,'Микс сухоцветов в корзине',4,6,'dried-flowers/bolshaya-korzina.png',NULL,NULL),(22,'Клош №5','klosh-5',1900.00,3,'Полевые сухоцветы в клоше',6,4,'dried-flowers/klosh-5.png',NULL,NULL),(23,'Луговые','lugovoe',2700.00,3,'Луговые сухоцветы',5,8,'dried-flowers/lugovie.png',NULL,NULL),(24,'Корзина с орхидеями','korzina-s-orhideyami',15599.00,4,'Микс Орхидей, Зелень декоративная',4,8,'bouquets/korzina-s-orhideyami-new.png',NULL,NULL),(25,'Кустовые розы','kustovie-rosy',3200.00,5,'Роза кустовая',1,6,'bouquets/bombastik-roses.png',NULL,NULL),(26,'Розовые сливки','roses-slivki',4500.00,5,'Роза кустовая, зелень декоративная',1,6,'bouquets/roses-pink.png',NULL,NULL),(27,'Осень 22','osen-22',8999.00,2,'Розы, Пионы',1,8,'compositions/osen_22.png',NULL,NULL),(28,'Pink Розы','pink-roses-box',15900.00,5,'Роза кустовая розовая, Декоративная зелень',5,6,'compositions/pink-roses.png',NULL,NULL),(29,'Праздник весны','prazdnik-vesny',12000.00,2,'Микс Тюльпанов',2,8,'compositions/prazdnik-vesny.png',NULL,NULL),(30,'Голубая мечта','blue-dream',2299.00,3,'Полевые сухоцветы',1,7,'dried-flowers/blue-dream.png',NULL,NULL),(31,'Интерьерные сухоцветы','interjer',2730.00,3,'Сухоцветы, хлопок',1,8,'dried-flowers/interjer.png',NULL,NULL),(32,'Деревянный конверт','envelope-wood',800.00,8,'Деревянный конверт ручной работы',NULL,NULL,'envelopes/envelope-wood.png',NULL,NULL),(33,'Конверт \"Компас\"','konvert-compas',500.00,8,'Конверт \"Компас\"',NULL,NULL,'envelopes/konvert-compas.png',NULL,NULL),(34,'Каланхое домашняя','kalanhoe',1400.00,6,'Каланхое домашняя в горшке',7,5,'houseplants/kalanhoe.png',NULL,NULL),(35,'Авторская композиция','author-artificial',3500.00,10,'Авторская композиция из искусственных цветов в вазе',2,8,'artificial/author-artificial.png',NULL,NULL),(36,'Шары черные и белые','black-and-white-balls',500.00,7,'Белые и черные шары',NULL,NULL,'holiday-balls/black-and-white.png',NULL,NULL),(37,'Каскад \"Половинки\"','kaskad-polovinki',800.00,7,'Каскад шаров \"Половинки\"',NULL,NULL,'holiday-balls/kaskad-polovinki.png',NULL,NULL),(38,'Каскад 7','kaskad-seven',800.00,7,'Каскад из 7 воздушных шаров',NULL,NULL,'holiday-balls/kaskad-seven.png',NULL,NULL),(39,'Открытка \"Лама\"','lama-postcard',300.00,9,'Открытка \"Лама\"',NULL,NULL,'postcards/lama.png',NULL,NULL),(40,'Открытка \"Мяу\"','myau-postcard',300.00,9,'Открытка \"Мяу\"',NULL,NULL,'postcards/myau.png',NULL,NULL),(41,'С новым годом','happy-new-year-pc',500.00,9,'Открытка \"С новым годом\"',NULL,NULL,'postcards/new-year.png',NULL,NULL),(42,'Сет открыток \"Сказки\"','set-skazki',900.00,9,'Сет авторских открыток',NULL,NULL,'postcards/set-skazki.png',NULL,NULL),(43,'Морское дно','morskoe-dno',1730.00,6,'Кактус с декоративными элементами',2,3,'houseplants/morskoe-dno.png',NULL,NULL),(44,'Spatifillum','spatifillum',1700.00,6,'Домашний Спатифиллюм',7,3,'houseplants/spatifilum.png',NULL,NULL),(45,'Дикий запад','wild-west',1900.00,6,'Кактус с декоративными элементами',2,8,'houseplants/wild-west.png',NULL,NULL),(46,'Интерьерная композиция','interier-comp',1500.00,10,'Интерьерная композиция из искусственных цветов',1,6,'artificial/interier-comp.png',NULL,NULL),(47,'Композиция \"Мини\"','mini-comp',1200.00,10,'Мини композиция из искусственных цветов в вазе',2,8,'artificial/mini-comp.png',NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `old_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','ourfavoriteflowers@gmail.com','users/default.png',NULL,'$2y$10$MtEtMD9llpOjHUw52NgL/.3.1dBrko9zt415AmC0kVttmfQZDA/fa',NULL,NULL,'2022-05-28 10:17:24','2022-05-28 10:17:24'),(2,1,'main','your@email.com','users/default.png',NULL,'$2y$10$2Hl05EShypbRBWMxRsvd/eaOkrLK00zhdvVewrVKvr7tsA7.8WMhG',NULL,NULL,'2022-05-28 10:58:21','2022-05-28 10:58:21');
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

-- Dump completed on 2022-05-28 20:17:08
