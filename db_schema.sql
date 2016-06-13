
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `access`;
CREATE TABLE `access` (
  `accessid` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(47) NOT NULL,
  `user_agent` varchar(300) NOT NULL,
  `user` varchar(20) NOT NULL,
  `referer` varchar(800) NOT NULL,
  `script` varchar(150) NOT NULL,
  PRIMARY KEY (`accessid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `api_key`;
CREATE TABLE `api_key` (
  `api_id` int(11) NOT NULL AUTO_INCREMENT,
  `api_key` varchar(85) COLLATE utf8_czech_ci DEFAULT NULL,
  `customerid` int(11) NOT NULL,
  `expired` tinyint(4) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`api_id`),
  KEY `fk_api_key_customer1_idx` (`customerid`),
  CONSTRAINT `fk_api_key_customer1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `paid` enum('true','false') COLLATE utf8_bin NOT NULL DEFAULT 'false',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`),
  KEY `customer_id_2` (`customer_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(85) CHARACTER SET utf8 COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `adress` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone` varchar(50) COLLATE utf8_bin NOT NULL,
  `mail` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `description` varchar(250) COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  `in_stock` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `fk_item_category1_idx` (`category_id`),
  CONSTRAINT `fk_item_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `list`;
CREATE TABLE `list` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `promo_code_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`list_id`),
  KEY `item_id` (`item_id`,`cart_id`),
  KEY `promo_code_id` (`promo_code_id`),
  KEY `cart_id` (`cart_id`),
  CONSTRAINT `list_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  CONSTRAINT `list_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  CONSTRAINT `list_ibfk_3` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_code` (`promo_code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `promo_code`;
CREATE TABLE `promo_code` (
  `promo_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `valid` enum('true','false') NOT NULL DEFAULT 'true',
  `code` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `used_times` int(11) NOT NULL DEFAULT '0',
  `max_use` int(11) NOT NULL DEFAULT '1',
  `discount` int(11) NOT NULL,
  `expiration_date` date NOT NULL,
  PRIMARY KEY (`promo_code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `paid` smallint(6) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `address` varchar(150) COLLATE utf8_bin NOT NULL,
  `postal` varchar(7) COLLATE utf8_bin NOT NULL,
  `shipping` enum('PPL','DHL','Česká Pošta','Vyzvednout') COLLATE utf8_bin NOT NULL,
  `message` varchar(400) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`,`cart_id`),
  KEY `cart_id` (`cart_id`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `cart` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

