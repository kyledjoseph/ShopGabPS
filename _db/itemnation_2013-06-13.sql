# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: itemnation
# Generation Time: 2013-06-13 20:05:00 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `url`, `created_at`, `updated_at`)
VALUES
	(1,'Test','test',NULL,NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table feedbacks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `feedbacks`;

CREATE TABLE `feedbacks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(256) DEFAULT NULL,
  `referral_url` varchar(1204) DEFAULT NULL,
  `feedback` varchar(500) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;

INSERT INTO `feedbacks` (`id`, `user_id`, `user_email`, `referral_url`, `feedback`, `created_at`, `updated_at`)
VALUES
	(1,4,NULL,'sample_referral_url','22',1369185635,1369185635),
	(2,4,'tmatthewsdev@gmail.com','http://itemnation.dev/quest/9','Test!',1369186188,1369186188),
	(3,NULL,'tmatthewsdev@gmail.com','http://itemnation.dev/user/login','test!',1369186235,1369186235);

/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table log_bookmark_errors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `log_bookmark_errors`;

CREATE TABLE `log_bookmark_errors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(1024) DEFAULT NULL,
  `error` varchar(1024) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table log_emails
# ------------------------------------------------------------

DROP TABLE IF EXISTS `log_emails`;

CREATE TABLE `log_emails` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(16) DEFAULT NULL,
  `to_name` varchar(128) DEFAULT NULL,
  `to_addr` varchar(128) DEFAULT NULL,
  `from_name` varchar(128) DEFAULT NULL,
  `from_addr` varchar(128) DEFAULT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `body` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `log_emails` WRITE;
/*!40000 ALTER TABLE `log_emails` DISABLE KEYS */;

INSERT INTO `log_emails` (`id`, `type`, `to_name`, `to_addr`, `from_name`, `from_addr`, `subject`, `body`, `created_at`, `updated_at`)
VALUES
	(3,'quest_invite','tmatthewsdev@gmail.com','tmatthewsdev@gmail.com','info@itemnation.com','info@itemnation.com','Help me find Honda CRX Steering Wheel','I\'m excited to be looking for a Honda CRX Steering Wheel on ItemNation and it would be great to have your help in finding the best one! Please follow the link below.',1368986933,1368986933),
	(4,'password_reset','tmatthewsdev@gmail.com','tmatthewsdev@gmail.com','ItemNation','info@itemnation.com','Reset your ItemNation password','<p>Reset your ItemNation password by clicking on the link below.</p>\n\n<a href=\"http://itemnation.com/reset/89b70398bae14b9306b830a1451d1c4d\">http://itemnation.com/reset/89b70398bae14b9306b830a1451d1c4d</a>',1369062879,1369062879),
	(5,'password_reset','tmatthewsdev@gmail.com','tmatthewsdev@gmail.com','ItemNation','info@itemnation.com','Reset your ItemNation password','<p>Reset your ItemNation password by clicking on the link below.</p>\n\n<a href=\"http://itemnation.com/reset/899409bec48f31b4ed2505b659bb950e\">http://itemnation.com/reset/899409bec48f31b4ed2505b659bb950e</a>',1369063159,1369063159),
	(6,'password_reset','tmatthewsdev@gmail.com','tmatthewsdev@gmail.com','ItemNation','info@itemnation.com','Reset your ItemNation password','<p>Reset your ItemNation password by clicking on the link below.</p>\n\n<a href=\"http://itemnation.com/reset/a9ab5cc6525bb8d6fd3fda920ee8b049\">http://itemnation.com/reset/a9ab5cc6525bb8d6fd3fda920ee8b049</a>',1369074489,1369074489),
	(7,'password_reset','tmatthewsdev@gmail.com','tmatthewsdev@gmail.com','ItemNation','info@itemnation.com','Reset your ItemNation password','<p>Reset your ItemNation password by clicking on the link below.</p>\n\n<a href=\"http://itemnation.com/reset/58b2bf016a08bd26dcb699ce436f2872\">http://itemnation.com/reset/58b2bf016a08bd26dcb699ce436f2872</a>',1369074580,1369074580),
	(8,'quest_invite','tmatthewsdev@gmail.com','tmatthewsdev@gmail.com','ItemNation','info@itemnation.com','Help me find a Test','First Last is trying to find a Test through ItemNation and has requested your input! Please click on the link below to see their page and join in the search. Thanks!<br><br><a href=\"http://itemnation.com/quest/z1q1nn\">http://itemnation.com/quest/z1q1nn</a>',1371026642,1371026642);

/*!40000 ALTER TABLE `log_emails` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;

INSERT INTO `migration` (`type`, `name`, `migration`)
VALUES
	('app','default','001_auth_create_siteauth_users');

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_details`;

CREATE TABLE `product_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `value` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table product_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `src_url` varchar(1024) DEFAULT NULL,
  `src` varchar(64) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;

INSERT INTO `product_images` (`id`, `product_id`, `src_url`, `src`, `created_at`, `updated_at`)
VALUES
	(53,7,'http://i.ebayimg.com/t/JDM-OEM-EG6-EG9-Civic-SIR-Genuine-BLACK-Steering-Wheel-EG2-EG8-EG4-SR3-SR4-Honda-/00/s/OTAwWDc2OA==/z/OYoAAOxyPiJRi-WY/$T2eC16VHJIIE9qTYKKd8BRi-WYq!pg~~60_12.JPG','5af51115a70ba78522d6675d4403a27d.jpg',1370819706,1370819706);

/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` text,
  `price` varchar(16) DEFAULT NULL,
  `domain` varchar(256) DEFAULT NULL,
  `url` varchar(2048) DEFAULT NULL,
  `brand` varchar(128) DEFAULT NULL,
  `model` varchar(128) DEFAULT NULL,
  `serial` varchar(128) DEFAULT NULL,
  `warranty` varchar(128) DEFAULT NULL,
  `type` varchar(128) DEFAULT NULL,
  `dimensions` varchar(128) DEFAULT NULL,
  `weight` varchar(128) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `user_id`, `category_id`, `name`, `description`, `price`, `domain`, `url`, `brand`, `model`, `serial`, `warranty`, `type`, `dimensions`, `weight`, `created_at`, `updated_at`)
VALUES
	(7,4,NULL,'JDM EG6 EG9 Civic Sir Genuine Black Steering Wheel','JDM OEM EG6 EG9 Civic SIR Genuine BLACK Steering Wheel EG2 EG8 EG4 SR3 SR4 Honda in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','$89.00','www.ebay.com','http://www.ebay.com/itm/JDM-OEM-EG6-EG9-Civic-SIR-Genuine-BLACK-Steering-Wheel-EG2-EG8-EG4-SR3-SR4-Honda-/230995003625?pt=Motors_Car_Truck_Parts_Accessories&fits=Year%3A1988%7CMake%3AHonda%7CModel%3ACRX&hash=item35c86008e9&vxp=mtr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1370819704,1370819704);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table quest_messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quest_messages`;

CREATE TABLE `quest_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quest_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` varchar(250) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `quest_messages` WRITE;
/*!40000 ALTER TABLE `quest_messages` DISABLE KEYS */;

INSERT INTO `quest_messages` (`id`, `quest_id`, `user_id`, `body`, `created_at`, `updated_at`)
VALUES
	(43,38,4,'Hello!',1370819884,1370819884);

/*!40000 ALTER TABLE `quest_messages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table quest_product_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quest_product_comments`;

CREATE TABLE `quest_product_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quest_product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `quest_product_comments` WRITE;
/*!40000 ALTER TABLE `quest_product_comments` DISABLE KEYS */;

INSERT INTO `quest_product_comments` (`id`, `quest_product_id`, `user_id`, `comment`, `created_at`, `updated_at`)
VALUES
	(24,44,4,'I like it!',1370819880,1370819880);

/*!40000 ALTER TABLE `quest_product_comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table quest_product_votes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quest_product_votes`;

CREATE TABLE `quest_product_votes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quest_product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vote` int(1) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `quest_product_votes` WRITE;
/*!40000 ALTER TABLE `quest_product_votes` DISABLE KEYS */;

INSERT INTO `quest_product_votes` (`id`, `quest_product_id`, `user_id`, `vote`, `created_at`, `updated_at`)
VALUES
	(32,44,4,1,1370819876,1370819876);

/*!40000 ALTER TABLE `quest_product_votes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table quest_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quest_products`;

CREATE TABLE `quest_products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quest_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `quest_products` WRITE;
/*!40000 ALTER TABLE `quest_products` DISABLE KEYS */;

INSERT INTO `quest_products` (`id`, `quest_id`, `product_id`, `description`, `added_by`, `created_at`, `updated_at`)
VALUES
	(44,38,7,NULL,4,1370819706,1370819706);

/*!40000 ALTER TABLE `quest_products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table quests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quests`;

CREATE TABLE `quests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(8) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `purchase_within` int(1) DEFAULT '0',
  `default_image_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `quests` WRITE;
/*!40000 ALTER TABLE `quests` DISABLE KEYS */;

INSERT INTO `quests` (`id`, `url`, `user_id`, `name`, `description`, `purchase_within`, `default_image_id`, `created_at`, `updated_at`)
VALUES
	(38,'q0e4uu',4,'Honda CRX Steering Wheel','Need a new steering wheel for my 1988 Honda CRX. I would prefer a JDM wheel, but open to any suggestion!',2,53,1370819353,1371087671),
	(39,'z1q1nn',8,'Test','',NULL,NULL,1371024854,1371024854);

/*!40000 ALTER TABLE `quests` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table throttle
# ------------------------------------------------------------

DROP TABLE IF EXISTS `throttle`;

CREATE TABLE `throttle` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `attempts` int(11) NOT NULL,
  `suspended` tinyint(4) NOT NULL,
  `banned` tinyint(4) NOT NULL,
  `last_attempt_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `suspended_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user_auths
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_auths`;

CREATE TABLE `user_auths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `provider_uid` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `display_name` varchar(150) DEFAULT '',
  `first_name` varchar(100) DEFAULT '',
  `last_name` varchar(100) DEFAULT '',
  `profile_url` varchar(300) DEFAULT '',
  `website_url` varchar(300) DEFAULT '',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_auths` WRITE;
/*!40000 ALTER TABLE `user_auths` DISABLE KEYS */;

INSERT INTO `user_auths` (`id`, `user_id`, `provider`, `provider_uid`, `email`, `display_name`, `first_name`, `last_name`, `profile_url`, `website_url`, `created_at`, `updated_at`)
VALUES
	(3,4,'facebook','681121001','tmatthewsdev@gmail.com','Tyler Matthews',NULL,NULL,'http://www.facebook.com/tyler.matthews.376','',1366238357,1366238357),
	(4,5,'facebook','1209866301','bukjoseph@gmail.com','Kyle Joseph',NULL,NULL,'http://www.facebook.com/bukjoseph','',1366238442,1366238442);

/*!40000 ALTER TABLE `user_auths` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `group` int(11) DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `display_name` varchar(150) DEFAULT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `last_login` varchar(25) DEFAULT '',
  `login_hash` varchar(255) DEFAULT '',
  `profile_fields` text,
  `reset_code` varchar(32) DEFAULT NULL,
  `reset_created_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `group`, `email`, `display_name`, `first_name`, `last_name`, `last_login`, `login_hash`, `profile_fields`, `reset_code`, `reset_created_at`, `created_at`, `updated_at`)
VALUES
	(2,NULL,'YM4CunAB+CjTZkqnaTYCFYw15oLERz/hFzl3HmPD1a4=',NULL,'me@christianbundy.com','Christian Bundy','Christian','Bundy','1368335473','4a805f8133e70fd841b069635896d2de3db71c59',NULL,NULL,NULL,1365019579,1365019579),
	(3,NULL,'HAy+KYPo2pyBc6akB9ltpTIdr8lCt0dj+4Ducrgbqqc=',NULL,'kyle@itemnation.com','Kyle Joseph','Kyle','Joseph','1365547660','4b3e6e52898fc9e93ff375c18f9f780a11073c6a',NULL,NULL,NULL,1365547660,1365547660),
	(4,NULL,'DuoswgUMsGDp0YGK4Gf0q3oJLaYjVpO6Y3J3DHb9MEE=',NULL,'tmatthewsdev@gmail.com','Tyler Matthews','Tyler','Matthews','1371086360','fd53943679cf1d059d4883809e343622fa408d43',NULL,NULL,NULL,1368432962,1370809300),
	(7,NULL,'DuoswgUMsGDp0YGK4Gf0q3oJLaYjVpO6Y3J3DHb9MEE=',NULL,'dinkoamg@gmail.com','Dinko','Dinko',NULL,'1366689740','aa3dc9acad53849d762a5d01ae027afdd9dea446',NULL,NULL,NULL,1366689740,1366689740),
	(8,NULL,'DuoswgUMsGDp0YGK4Gf0q3oJLaYjVpO6Y3J3DHb9MEE=',NULL,'newuser@email.com','First Last',NULL,NULL,'1371024660','a4b6b4bfed0103853669126b253c3e12044b1fdc',NULL,NULL,NULL,1371024399,1371024399),
	(9,NULL,'Q91lN4D8D2+n/hNsT/ggjbWt4rQ4jCtupj4Bt2Wdfik=',NULL,'testmail@email.com','My Name',NULL,NULL,'1371078784','125fb4e7032749452fb90ae4e7885c3f13d2919c',NULL,NULL,NULL,1371078784,1371078784);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
