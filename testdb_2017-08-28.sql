# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.5.5-10.1.25-MariaDB)
# Схема: testdb
# Время создания: 2017-08-28 19:49:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;

INSERT INTO `brands` (`id`, `name`)
VALUES
	(1,'adidas'),
	(2,'Nike'),
	(3,'Reebok'),
	(4,'DEF');

/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `brand_id`, `type_id`, `name`, `img`)
VALUES
	(1,1,1,'Super Lite','https://cdn.def-shop.com/pic360/dangerous-dngrs-sneakers-black-299798.jpg'),
	(2,2,1,'Zoom Stefan Janoski Canvas','https://cdn.def-shop.com/pic360/nike-sb-sneakers-black-331942.jpg'),
	(3,4,2,'Cropped in black','https://cdn.def-shop.com/pic360/def-dress-black-350090.jpg'),
	(4,3,1,'Princess EB','https://cdn.def-shop.com/pic360/reebok-sneaker-gruen-365191.jpg');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы search
# ------------------------------------------------------------

DROP TABLE IF EXISTS `search`;

CREATE TABLE `search` (
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `sizes_id` varchar(255) NOT NULL DEFAULT '',
  `product_data` varchar(512) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `search` WRITE;
/*!40000 ALTER TABLE `search` DISABLE KEYS */;

INSERT INTO `search` (`product_id`, `brand_id`, `sizes_id`, `product_data`)
VALUES
	(4,3,'39, 38, 37','Reebok shoes Princess EB 39, 38, 37'),
	(3,4,'M, L','DEF dress Cropped in black M L'),
	(2,2,'38','Nike shoes Zoom Stefan Janoski Canvas 38'),
	(1,1,'36','adidas shoes Super Lite 36');

/*!40000 ALTER TABLE `search` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы sizes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sizes`;

CREATE TABLE `sizes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;

INSERT INTO `sizes` (`id`, `name`)
VALUES
	(1,'S'),
	(2,'M'),
	(3,'L'),
	(4,'35'),
	(5,'36'),
	(6,'37'),
	(7,'38'),
	(8,'39');

/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы sizes_to_brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sizes_to_brands`;

CREATE TABLE `sizes_to_brands` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brands_id` int(11) NOT NULL,
  `sizes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sizes_to_brands` WRITE;
/*!40000 ALTER TABLE `sizes_to_brands` DISABLE KEYS */;

INSERT INTO `sizes_to_brands` (`id`, `brands_id`, `sizes_id`)
VALUES
	(3,1,5),
	(6,4,2),
	(7,4,3),
	(8,3,8),
	(9,3,7),
	(10,3,6),
	(11,2,7);

/*!40000 ALTER TABLE `sizes_to_brands` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы sizes_to_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sizes_to_products`;

CREATE TABLE `sizes_to_products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sizes_to_products` WRITE;
/*!40000 ALTER TABLE `sizes_to_products` DISABLE KEYS */;

INSERT INTO `sizes_to_products` (`id`, `product_id`, `size_id`)
VALUES
	(1,1,5),
	(2,2,7),
	(3,3,2),
	(4,3,3),
	(5,4,8),
	(6,4,7),
	(7,4,6);

/*!40000 ALTER TABLE `sizes_to_products` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;

INSERT INTO `types` (`id`, `name`)
VALUES
	(1,'shoes'),
	(2,'dress');

/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
