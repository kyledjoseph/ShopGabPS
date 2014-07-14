/*
SQLyog Community v11.31 (32 bit)
MySQL - 5.5.37-0ubuntu0.14.04.1 : Database - shopgab
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin_permissions` */

CREATE TABLE `admin_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin_permissions` */

/*Table structure for table `admins` */

CREATE TABLE `admins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `admins` */

insert  into `admins`(`id`,`user_id`,`created_at`,`updated_at`) values (2,5,1401032532,1401032532),(4,2,1402076787,1402076787);

/*Table structure for table `auth_permissions_users` */

CREATE TABLE `auth_permissions_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `perms_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_permissions_users` */

/*Table structure for table `auth_roles_users` */

CREATE TABLE `auth_roles_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_roles_users` */

/*Table structure for table `categories` */

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

/*Table structure for table `clients` */

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` smallint(6) NOT NULL DEFAULT '0',
  `neck` varchar(255) DEFAULT NULL,
  `arm` varchar(255) DEFAULT NULL,
  `over_arm` varchar(255) DEFAULT NULL,
  `chest` varchar(255) DEFAULT NULL,
  `waist` varchar(255) DEFAULT NULL,
  `glove` varchar(255) DEFAULT NULL,
  `hat` varchar(255) DEFAULT NULL,
  `shirt_size` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `bust` varchar(255) DEFAULT NULL,
  `hips` varchar(255) DEFAULT NULL,
  `cup_size` varchar(255) DEFAULT NULL,
  `dress_size` varchar(255) DEFAULT NULL,
  `professional_information` text,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

insert  into `clients`(`id`,`gender`,`neck`,`arm`,`over_arm`,`chest`,`waist`,`glove`,`hat`,`shirt_size`,`age`,`height`,`weight`,`bust`,`hips`,`cup_size`,`dress_size`,`professional_information`,`user_id`,`parent_id`) values (4,0,'as123','asd','sad','sad','asd','asd','das','ads','asd','ads','asd','123','123','qw','qw','sadsad',2,5),(5,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,5);

/*Table structure for table `deployment_payload_logs` */

CREATE TABLE `deployment_payload_logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `deployment_payload_id` int(11) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `text` text,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `deployment_payload_logs` */

/*Table structure for table `deployment_payloads` */

CREATE TABLE `deployment_payloads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `data` text,
  `ip` varchar(16) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `deployment_payloads` */

/*Table structure for table `feedbacks` */

CREATE TABLE `feedbacks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(256) DEFAULT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `referral_url` varchar(1204) DEFAULT NULL,
  `feedback` varchar(500) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `feedbacks` */

/*Table structure for table `friends` */

CREATE TABLE `friends` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `friend_name` varchar(128) DEFAULT NULL,
  `friend_email` varchar(128) DEFAULT NULL,
  `friend_registered` tinyint(1) DEFAULT NULL,
  `hidden` int(1) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `friends` */

/*Table structure for table `invite_emails` */

CREATE TABLE `invite_emails` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `quest_id` int(11) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `invite_emails` */

/*Table structure for table `log_bookmark_errors` */

CREATE TABLE `log_bookmark_errors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(1024) DEFAULT NULL,
  `error` varchar(1024) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `log_bookmark_errors` */

/*Table structure for table `log_emails` */

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `log_emails` */

insert  into `log_emails`(`id`,`type`,`to_name`,`to_addr`,`from_name`,`from_addr`,`subject`,`body`,`created_at`,`updated_at`) values (1,'confirmation_cod','goran.blazin@gmail.com','goran.blazin@gmail.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/de22005e4fa1572d4406374c13fff9c9\">http://shopgab.dev/confirm/de22005e4fa1572d4406374c13fff9c9</a>',1401032533,1401032533),(2,'confirmation_cod','kyle@shopgab.com','kyle@shopgab.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/9fede6c5ab51517fcc979f72b95c9f6a\">http://shopgab.dev/confirm/9fede6c5ab51517fcc979f72b95c9f6a</a>',1401032843,1401032843),(3,'confirmation_cod','testclient@test.com','testclient@test.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/4281cb97768f138755900483849250f7\">http://shopgab.dev/confirm/4281cb97768f138755900483849250f7</a>',1401033222,1401033222),(4,'confirmation_cod','testclient@test.com','testclient@test.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/61c91de418d70af12ff526dcd7d79631\">http://shopgab.dev/confirm/61c91de418d70af12ff526dcd7d79631</a>',1401211519,1401211519),(5,'client_notificat','testclient@test.com','testclient@test.com','ShopGab','notification@shopgab.com','ShopGab Notifications','<html>\r\n<img src=\"cid:SHOPGAB_LOGO\" style=\"width: 100px; margin-left: auto; margin-right: auto\" />\r\n<div class=\"content\">\r\n<p>Paypal failed</p></div>\r\n<div class=\"unsubscribe\">\r\n	<p style=\"text-align:center;\">To turn off e-mail notifications, please change the settings in your ShopGab profile.</p>\r\n  <p>If you have any questions please contact ShopGab support.</p>\r\n  <p>Thanks!</p>\r\n  <p>ShopGab Admin</p>\r\n</div>\r\n<div class=\"footer\">\r\n  <div style=\"width: 50%;\">\r\n    1871: Shopgab\r\n    222 Merchandise Mart Plaza Suite #1212\r\n    Chicago, IL  60654\r\n  </div>\r\n</div>\r\n</html>',1401212438,1401212438),(6,'confirmation_cod','goran.blazin@gmail.com','goran.blazin@gmail.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\n\n<a href=\"http://shopgab.dev/confirm/14a296590185e4e4d0fa62ff1453d821\">http://shopgab.dev/confirm/14a296590185e4e4d0fa62ff1453d821</a>',1401693959,1401693959),(7,'confirmation_cod','pintaricn@gmail.com','pintaricn@gmail.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\n\n<a href=\"http://test.shopgab.com/confirm/aa38b1a1aa0ab3edff62f7fdb0853f80\">http://test.shopgab.com/confirm/aa38b1a1aa0ab3edff62f7fdb0853f80</a>',1401982012,1401982012),(8,'confirmation_cod','kyle@chicagofoodseum.com','kyle@chicagofoodseum.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\n\n<a href=\"http://test.shopgab.com/confirm/b83d87b54cbf03b2c8db246e6e473773\">http://test.shopgab.com/confirm/b83d87b54cbf03b2c8db246e6e473773</a>',1402076871,1402076871),(9,'confirmation_cod','test@test.com','test@test.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\n\n<a href=\"http://shopgab.dev/confirm/f63e60c854f64388445eb1fbd97d836f\">http://shopgab.dev/confirm/f63e60c854f64388445eb1fbd97d836f</a>',1404724903,1404724903);

/*Table structure for table `migration` */

CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migration` */

insert  into `migration`(`type`,`name`,`migration`) values ('app','default','001_auth_create_siteauth_users');

/*Table structure for table `paypals` */

CREATE TABLE `paypals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `company` varchar(250) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state_province` varchar(250) NOT NULL,
  `zip_postal_code` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `telephone` varbinary(250) NOT NULL,
  `card_number` varchar(250) NOT NULL,
  `card_type` varchar(250) NOT NULL,
  `expire_month` int(11) NOT NULL,
  `expire_year` int(11) NOT NULL,
  `cvv2` varchar(4) NOT NULL,
  `payer_id` varchar(250) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `paypals` */

insert  into `paypals`(`id`,`first_name`,`last_name`,`company`,`address`,`email`,`city`,`state_province`,`zip_postal_code`,`country`,`telephone`,`card_number`,`card_type`,`expire_month`,`expire_year`,`cvv2`,`payer_id`,`parent_id`) values (1,'123','123','123','123','g@g.com','123','NULL','123','US','123','123','visa',0,2014,'123',NULL,5);

/*Table structure for table `product_images` */

CREATE TABLE `product_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `src` varchar(64) DEFAULT NULL,
  `src_url` varchar(1024) DEFAULT NULL,
  `public_uri` varchar(256) DEFAULT NULL,
  `public_ssl_uri` varchar(256) DEFAULT NULL,
  `public_streaming_uri` varchar(256) DEFAULT NULL,
  `width` int(4) DEFAULT NULL,
  `height` int(4) DEFAULT NULL,
  `content_length` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`name`,`src`,`src_url`,`public_uri`,`public_ssl_uri`,`public_streaming_uri`,`width`,`height`,`content_length`,`created_at`,`updated_at`) values (1,1,'701a3c67c241b7e5b264123e941164ad.png',NULL,'uploaded','http://b6318e2321bb88354523-47a82e5eb2d7e277bfb68bb434f3d01a.r18.cf1.rackcdn.com/701a3c67c241b7e5b264123e941164ad.png','https://e6e7f839fe4501e64298-47a82e5eb2d7e277bfb68bb434f3d01a.ssl.cf1.rackcdn.com/701a3c67c241b7e5b264123e941164ad.png','http://870935354a6d30caa711-47a82e5eb2d7e277bfb68bb434f3d01a.r18.stream.cf1.rackcdn.com/701a3c67c241b7e5b264123e941164ad.png',250,220,8926,1404132672,1404132672),(2,1,'701a3c67c241b7e5b264123e941164ad.png',NULL,'uploaded','http://af37c728244fcfe23a80-183062b960b96f404ce302a7175f78e4.r44.cf1.rackcdn.com/701a3c67c241b7e5b264123e941164ad.png','https://89715acccb31bde5f707-183062b960b96f404ce302a7175f78e4.ssl.cf1.rackcdn.com/701a3c67c241b7e5b264123e941164ad.png','http://f313ea3107c7ea3487c4-183062b960b96f404ce302a7175f78e4.r44.stream.cf1.rackcdn.com/701a3c67c241b7e5b264123e941164ad.png',50,50,2245,1404132674,1404132674),(3,3,'4e29e88e7cc84d79d89406b746429476.jpg',NULL,'http://www.shoes.com/productimages/shoes_iaec1390324.jpg','http://b6318e2321bb88354523-47a82e5eb2d7e277bfb68bb434f3d01a.r18.cf1.rackcdn.com/4e29e88e7cc84d79d89406b746429476.jpg','https://e6e7f839fe4501e64298-47a82e5eb2d7e277bfb68bb434f3d01a.ssl.cf1.rackcdn.com/4e29e88e7cc84d79d89406b746429476.jpg','http://870935354a6d30caa711-47a82e5eb2d7e277bfb68bb434f3d01a.r18.stream.cf1.rackcdn.com/4e29e88e7cc84d79d89406b746429476.jpg',250,220,25908,1404724200,1404724200),(4,3,'4e29e88e7cc84d79d89406b746429476.jpg',NULL,'http://www.shoes.com/productimages/shoes_iaec1390324.jpg','http://af37c728244fcfe23a80-183062b960b96f404ce302a7175f78e4.r44.cf1.rackcdn.com/4e29e88e7cc84d79d89406b746429476.jpg','https://89715acccb31bde5f707-183062b960b96f404ce302a7175f78e4.ssl.cf1.rackcdn.com/4e29e88e7cc84d79d89406b746429476.jpg','http://f313ea3107c7ea3487c4-183062b960b96f404ce302a7175f78e4.r44.stream.cf1.rackcdn.com/4e29e88e7cc84d79d89406b746429476.jpg',50,50,2232,1404724202,1404724202);

/*Table structure for table `products` */

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`user_id`,`category_id`,`name`,`description`,`price`,`domain`,`url`,`brand`,`model`,`serial`,`warranty`,`type`,`dimensions`,`weight`,`created_at`,`updated_at`) values (1,5,NULL,'test',NULL,'123',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1404132667,1404132667),(2,5,NULL,'Men&#039;s Sperry Top-Sider Striper CVO Chambray Sneake',NULL,'34$','www.shoes.com','http://www.shoes.com/en-US/Product/EC1390324-5220507/Sperry+Top-Sider/Black+Chambray/Mens+Striper+CVO+Chambray+Sneaker.aspx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1404724111,1404724111),(3,5,NULL,'Men&#039;s Sperry Top-Sider Striper CVO Chambray Sneake',NULL,'22$','www.shoes.com','http://www.shoes.com/en-US/Product/EC1390324-5220507/Sperry+Top-Sider/Black+Chambray/Mens+Striper+CVO+Chambray+Sneaker.aspx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1404724195,1404724195);

/*Table structure for table `professional_logos` */

CREATE TABLE `professional_logos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `professional_id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `public_uri` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `public_ssl_uri` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `public_streaming_uri` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `width` int(4) DEFAULT NULL,
  `height` int(4) DEFAULT NULL,
  `content_length` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `professional_unique` (`professional_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `professional_logos` */

/*Table structure for table `professionals` */

CREATE TABLE `professionals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pricing_plan_type` int(1) NOT NULL DEFAULT '1',
  `pricing_plan_started_on` int(11) NOT NULL,
  `automatic_plan_renewal` tinyint(1) NOT NULL DEFAULT '1',
  `automatic_plan_notification_sent` tinyint(1) NOT NULL DEFAULT '0',
  `price` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `professionals` */

insert  into `professionals`(`id`,`user_id`,`pricing_plan_type`,`pricing_plan_started_on`,`automatic_plan_renewal`,`automatic_plan_notification_sent`,`price`) values (4,5,1,1401693958,1,0,'13.000'),(5,7,1,1402076870,1,0,NULL),(6,8,1,1404724902,1,0,NULL);

/*Table structure for table `quest_messages` */

CREATE TABLE `quest_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quest_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` varchar(250) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `quest_messages` */

insert  into `quest_messages`(`id`,`quest_id`,`user_id`,`body`,`created_at`,`updated_at`) values (1,2,5,'test',1404723412,1404723412);

/*Table structure for table `quest_notifications` */

CREATE TABLE `quest_notifications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `quest_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `event_type` varchar(16) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `seen_at` int(11) DEFAULT NULL,
  `sent_by_email` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `quest_notifications` */

insert  into `quest_notifications`(`id`,`user_id`,`quest_id`,`model_id`,`event_type`,`created_at`,`seen_at`,`sent_by_email`) values (2,5,2,2,'quest_created',1404129997,1404129997,0),(3,5,2,1,'product_created',1404132674,1404132674,0),(4,5,2,1,'quest_message',1404723412,1404723608,0),(5,5,2,1,'product_created',1404724202,1404724209,0),(6,5,3,3,'quest_created',1404724282,1404724282,0),(7,5,2,1,'product_like',1405064071,1405064074,0),(8,5,2,1,'product_dislike',1405064072,1405064074,0),(9,5,2,1,'product_dislike',1405064072,1405064074,0),(10,5,2,1,'product_dislike',1405064077,1405064084,0),(11,5,2,1,'product_dislike',1405064078,1405064084,0),(12,5,4,4,'quest_created',1405351046,1405351046,0),(13,5,5,5,'quest_created',1405351070,1405351071,0),(14,5,6,6,'quest_created',1405351174,1405351174,0),(15,2,7,7,'quest_created',1405351252,1405351252,0);

/*Table structure for table `quest_participants` */

CREATE TABLE `quest_participants` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quest_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `quest_participants` */

/*Table structure for table `quest_product_comments` */

CREATE TABLE `quest_product_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quest_product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `quest_product_comments` */

/*Table structure for table `quest_product_votes` */

CREATE TABLE `quest_product_votes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quest_product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vote` int(1) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `quest_product_votes` */

insert  into `quest_product_votes`(`id`,`quest_product_id`,`user_id`,`vote`,`created_at`,`updated_at`) values (1,1,5,0,1405064071,1405064072);

/*Table structure for table `quest_products` */

CREATE TABLE `quest_products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quest_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `total_likes` int(8) DEFAULT '0',
  `total_dislikes` int(8) DEFAULT '0',
  `vote_score` int(8) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `quest_products` */

insert  into `quest_products`(`id`,`quest_id`,`product_id`,`description`,`total_likes`,`total_dislikes`,`vote_score`,`added_by`,`created_at`,`updated_at`) values (1,2,3,NULL,0,1,-1,5,1404724202,1405064079);

/*Table structure for table `quests` */

CREATE TABLE `quests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(8) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `purchase_within` int(1) DEFAULT '0',
  `purchase_by` int(11) DEFAULT NULL,
  `default_product_id` int(11) DEFAULT NULL,
  `purchased_product_id` int(11) DEFAULT NULL,
  `is_open` int(1) DEFAULT NULL,
  `is_public` int(1) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `quests` */

insert  into `quests`(`id`,`url`,`user_id`,`name`,`description`,`purchase_within`,`purchase_by`,`default_product_id`,`purchased_product_id`,`is_open`,`is_public`,`created_at`,`updated_at`,`created_by`) values (2,'y6ve3j',5,'test','',0,NULL,1,NULL,NULL,1,1404129997,1404132683,5),(3,'c11btn',5,'test 2','',0,NULL,NULL,NULL,NULL,1,1404724282,1404724282,5),(4,'b5cicz',5,'','',3,1407165446,NULL,NULL,NULL,1,1405351046,1405351046,5),(5,'6gk7gg',5,'kyle quest','',0,NULL,NULL,NULL,NULL,1,1405351070,1405351070,5),(6,'8jl0hr',2,'kyle quest1','',0,NULL,NULL,NULL,NULL,1,1405351174,1405351174,5),(7,'720358',2,'kyle quest','123',3,1407165652,NULL,NULL,NULL,1,1405351252,1405351252,2);

/*Table structure for table `throttle` */

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

/*Data for the table `throttle` */

/*Table structure for table `tries` */

CREATE TABLE `tries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tries` */

/*Table structure for table `user_auths` */

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

/*Data for the table `user_auths` */

/*Table structure for table `user_avatars` */

CREATE TABLE `user_avatars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `public_uri` varchar(256) DEFAULT NULL,
  `public_ssl_uri` varchar(256) DEFAULT NULL,
  `public_streaming_uri` varchar(256) DEFAULT NULL,
  `width` int(6) DEFAULT NULL,
  `height` int(6) DEFAULT NULL,
  `content_length` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user_avatars` */

insert  into `user_avatars`(`id`,`user_id`,`name`,`public_uri`,`public_ssl_uri`,`public_streaming_uri`,`width`,`height`,`content_length`,`created_at`,`updated_at`) values (7,5,'a344769c0904ed840773b50dcce94c65.png','http://10b2369fd88484cb1829-301bfc721f36f2495d8a276d7e2b76e2.r18.cf1.rackcdn.com/a344769c0904ed840773b50dcce94c65.png','https://e78f294bdb0a87abf91c-301bfc721f36f2495d8a276d7e2b76e2.ssl.cf1.rackcdn.com/a344769c0904ed840773b50dcce94c65.png','http://d2725e9e7870c0e896db-301bfc721f36f2495d8a276d7e2b76e2.r18.stream.cf1.rackcdn.com/a344769c0904ed840773b50dcce94c65.png',200,200,36693,1401694691,1401694691),(8,5,'a344769c0904ed840773b50dcce94c65.png','http://7675188bf9e8133792bf-da4dce5cb75456dd15c437d9fff43577.r87.cf1.rackcdn.com/a344769c0904ed840773b50dcce94c65.png','https://90790433881f76b3a12e-da4dce5cb75456dd15c437d9fff43577.ssl.cf1.rackcdn.com/a344769c0904ed840773b50dcce94c65.png','http://591128c6a485981a6645-da4dce5cb75456dd15c437d9fff43577.r87.stream.cf1.rackcdn.com/a344769c0904ed840773b50dcce94c65.png',32,32,2010,1401694694,1401694694);

/*Table structure for table `user_notices` */

CREATE TABLE `user_notices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_notices` */

insert  into `user_notices`(`id`,`user_id`,`type`,`created_at`) values (1,5,'start_quest',1404724282),(2,2,'start_quest',1405351252);

/*Table structure for table `user_notifications` */

CREATE TABLE `user_notifications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL,
  `send` int(1) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_notifications` */

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `group` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `confirmation_code` varchar(32) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `display_name` varchar(150) DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `login_hash` varchar(255) DEFAULT NULL,
  `profile_fields` text,
  `reset_code` varchar(32) DEFAULT NULL,
  `reset_created_at` int(11) DEFAULT NULL,
  `welcome_message` int(1) NOT NULL DEFAULT '1',
  `receive_notifications` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `reset_unique` (`reset_code`),
  UNIQUE KEY `confirm_unique` (`confirmation_code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`group`,`email`,`confirmation_code`,`status`,`display_name`,`last_login`,`login_hash`,`profile_fields`,`reset_code`,`reset_created_at`,`welcome_message`,`receive_notifications`,`created_at`,`updated_at`) values (2,'kyle','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',1,'kyle@shopgab.com','9fede6c5ab51517fcc979f72b95c9f6a',2,NULL,1405351230,'28763f71d5f01798db96e41027c62a235f4e3174','a:0:{}',NULL,NULL,1,1,1401032842,1401032842),(5,'goran.blazin','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',50,'goran.blazin@gmail.com','14a296590185e4e4d0fa62ff1453d821',2,NULL,1405345819,'aa626a07a5f53eb41a64895721087e21f5ab2e69','a:0:{}',NULL,NULL,1,1,1401693958,1402077246),(6,'pintaricn','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',1,'pintaricn@gmail.com','aa38b1a1aa0ab3edff62f7fdb0853f80',2,NULL,1404723185,'ea89525da4c1b04c369a3b6b869fff9e4b9b2980','a:0:{}',NULL,NULL,1,1,1401982012,1401982093),(7,'kyle0','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',50,'kyle@chicagofoodseum.com','b83d87b54cbf03b2c8db246e6e473773',2,NULL,1402076921,'ad31c4f052092e50d69c54d60ee9aa59b92088d7','a:0:{}',NULL,NULL,1,1,1402076870,1402076957),(8,'test','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',50,'test@test.com','f63e60c854f64388445eb1fbd97d836f',1,NULL,1404724903,'17666994d25e0c40620d4238a8f104da94f16ad9','a:0:{}',NULL,NULL,1,1,1404724902,1404724902);

/*Table structure for table `users_clients` */

CREATE TABLE `users_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `client_id` varchar(32) NOT NULL DEFAULT '',
  `client_secret` varchar(32) NOT NULL DEFAULT '',
  `redirect_uri` varchar(255) NOT NULL DEFAULT '',
  `auto_approve` tinyint(1) NOT NULL DEFAULT '0',
  `autonomous` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('development','pending','approved','rejected') NOT NULL DEFAULT 'development',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `notes` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users_clients` */

/*Table structure for table `users_metadata` */

CREATE TABLE `users_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `key` varchar(20) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `users_metadata` */

insert  into `users_metadata`(`id`,`parent_id`,`key`,`value`,`user_id`,`created_at`,`updated_at`) values (1,NULL,'fullname','Goran Blazin',1,1401032669,0),(3,NULL,'fullname','Kyle Joseph',7,1402076957,0),(4,NULL,'fullname','goran.blazin',5,1402077246,0);

/*Table structure for table `users_permissions` */

CREATE TABLE `users_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(25) NOT NULL,
  `permission` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `actions` text,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission` (`area`,`permission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users_permissions` */

/*Table structure for table `users_providers` */

CREATE TABLE `users_providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `provider` varchar(50) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `expires` int(12) DEFAULT '0',
  `refresh_token` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users_providers` */

/*Table structure for table `users_roles` */

CREATE TABLE `users_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `filter` enum('','A','D','R') NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users_roles` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
