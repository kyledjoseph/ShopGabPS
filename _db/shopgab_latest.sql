/*
SQLyog Community v11.5 (64 bit)
MySQL - 5.6.14 : Database - shopgab
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `admins` */

insert  into `admins`(`id`,`user_id`,`created_at`,`updated_at`) values (2,1,1401032532,1401032532);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

insert  into `clients`(`id`,`gender`,`neck`,`arm`,`over_arm`,`chest`,`waist`,`glove`,`hat`,`shirt_size`,`age`,`height`,`weight`,`bust`,`hips`,`cup_size`,`dress_size`,`professional_information`,`user_id`,`parent_id`) values (4,0,'as123','asd','sad','sad','asd','asd','das','ads','asd','ads','asd','123','123','qw','qw','sadsad',2,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `log_emails` */

insert  into `log_emails`(`id`,`type`,`to_name`,`to_addr`,`from_name`,`from_addr`,`subject`,`body`,`created_at`,`updated_at`) values (1,'confirmation_cod','goran.blazin@gmail.com','goran.blazin@gmail.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/de22005e4fa1572d4406374c13fff9c9\">http://shopgab.dev/confirm/de22005e4fa1572d4406374c13fff9c9</a>',1401032533,1401032533),(2,'confirmation_cod','kyle@shopgab.com','kyle@shopgab.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/9fede6c5ab51517fcc979f72b95c9f6a\">http://shopgab.dev/confirm/9fede6c5ab51517fcc979f72b95c9f6a</a>',1401032843,1401032843),(3,'confirmation_cod','testclient@test.com','testclient@test.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/4281cb97768f138755900483849250f7\">http://shopgab.dev/confirm/4281cb97768f138755900483849250f7</a>',1401033222,1401033222),(4,'confirmation_cod','testclient@test.com','testclient@test.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/61c91de418d70af12ff526dcd7d79631\">http://shopgab.dev/confirm/61c91de418d70af12ff526dcd7d79631</a>',1401211519,1401211519),(5,'client_notificat','testclient@test.com','testclient@test.com','ShopGab','notification@shopgab.com','ShopGab Notifications','<html>\r\n<img src=\"cid:SHOPGAB_LOGO\" style=\"width: 100px; margin-left: auto; margin-right: auto\" />\r\n<div class=\"content\">\r\n<p>Paypal failed</p></div>\r\n<div class=\"unsubscribe\">\r\n	<p style=\"text-align:center;\">To turn off e-mail notifications, please change the settings in your ShopGab profile.</p>\r\n  <p>If you have any questions please contact ShopGab support.</p>\r\n  <p>Thanks!</p>\r\n  <p>ShopGab Admin</p>\r\n</div>\r\n<div class=\"footer\">\r\n  <div style=\"width: 50%;\">\r\n    1871: Shopgab\r\n    222 Merchandise Mart Plaza Suite #1212\r\n    Chicago, IL  60654\r\n  </div>\r\n</div>\r\n</html>',1401212438,1401212438);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `paypals` */

insert  into `paypals`(`id`,`first_name`,`last_name`,`company`,`address`,`email`,`city`,`state_province`,`zip_postal_code`,`country`,`telephone`,`card_number`,`card_type`,`expire_month`,`expire_year`,`cvv2`,`payer_id`,`parent_id`) values (5,'Goran','Blazin','none','Test address 12','goran.blazin@gmail.com','Test city','NULL','112334','US','+123123243421','5450960277411202','mastercard',2,2019,'202',NULL,1),(7,'Goran','Blazin','none2','Test address 12','goran.blazin@gmail.com','Test city','NULL','112334','US','+123123243421','1232424234as324','mastercard',4,2017,'1242',NULL,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`name`,`src`,`src_url`,`public_uri`,`public_ssl_uri`,`public_streaming_uri`,`width`,`height`,`content_length`,`created_at`,`updated_at`) values (5,1,'9253ed091e8187623639ab2eb577dbd8.png',NULL,'uploaded','http://b6318e2321bb88354523-47a82e5eb2d7e277bfb68bb434f3d01a.r18.cf1.rackcdn.com/9253ed091e8187623639ab2eb577dbd8.png','https://e6e7f839fe4501e64298-47a82e5eb2d7e277bfb68bb434f3d01a.ssl.cf1.rackcdn.com/9253ed091e8187623639ab2eb577dbd8.png','http://870935354a6d30caa711-47a82e5eb2d7e277bfb68bb434f3d01a.r18.stream.cf1.rackcdn.com/9253ed091e8187623639ab2eb577dbd8.png',250,220,30047,1401034781,1401034781),(6,1,'9253ed091e8187623639ab2eb577dbd8.png',NULL,'uploaded','http://af37c728244fcfe23a80-183062b960b96f404ce302a7175f78e4.r44.cf1.rackcdn.com/9253ed091e8187623639ab2eb577dbd8.png','https://89715acccb31bde5f707-183062b960b96f404ce302a7175f78e4.ssl.cf1.rackcdn.com/9253ed091e8187623639ab2eb577dbd8.png','http://f313ea3107c7ea3487c4-183062b960b96f404ce302a7175f78e4.r44.stream.cf1.rackcdn.com/9253ed091e8187623639ab2eb577dbd8.png',50,50,1731,1401034784,1401034784),(7,2,'882d9e94c7b529a346c42ec43539e1ca.jpg',NULL,'http://o.onionstatic.com/images/19/19048/original/700.hq.jpg?6611','http://b6318e2321bb88354523-47a82e5eb2d7e277bfb68bb434f3d01a.r18.cf1.rackcdn.com/882d9e94c7b529a346c42ec43539e1ca.jpg','https://e6e7f839fe4501e64298-47a82e5eb2d7e277bfb68bb434f3d01a.ssl.cf1.rackcdn.com/882d9e94c7b529a346c42ec43539e1ca.jpg','http://870935354a6d30caa711-47a82e5eb2d7e277bfb68bb434f3d01a.r18.stream.cf1.rackcdn.com/882d9e94c7b529a346c42ec43539e1ca.jpg',250,220,32174,1401210868,1401210868),(8,2,'882d9e94c7b529a346c42ec43539e1ca.jpg',NULL,'http://o.onionstatic.com/images/19/19048/original/700.hq.jpg?6611','http://af37c728244fcfe23a80-183062b960b96f404ce302a7175f78e4.r44.cf1.rackcdn.com/882d9e94c7b529a346c42ec43539e1ca.jpg','https://89715acccb31bde5f707-183062b960b96f404ce302a7175f78e4.ssl.cf1.rackcdn.com/882d9e94c7b529a346c42ec43539e1ca.jpg','http://f313ea3107c7ea3487c4-183062b960b96f404ce302a7175f78e4.r44.stream.cf1.rackcdn.com/882d9e94c7b529a346c42ec43539e1ca.jpg',50,50,3116,1401210871,1401210871);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`user_id`,`category_id`,`name`,`description`,`price`,`domain`,`url`,`brand`,`model`,`serial`,`warranty`,`type`,`dimensions`,`weight`,`created_at`,`updated_at`) values (1,1,NULL,'Facebook',NULL,'1 gazzilion usd',NULL,'http://facebook.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1401034775,1401034775),(2,1,NULL,'New Balance Releases &#039;Laces Only&#039; Minimalist Runni',NULL,'12 $','www.theonion.com','http://www.theonion.com/articles/new-balance-releases-laces-only-minimalist-running,30740/',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1401210861,1401210861);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `professionals` */

insert  into `professionals`(`id`,`user_id`,`pricing_plan_type`,`pricing_plan_started_on`,`automatic_plan_renewal`,`automatic_plan_notification_sent`,`price`) values (1,1,2,1401032783,1,0,'0.000'),(3,4,1,1401211517,1,0,'12.350');

/*Table structure for table `quest_messages` */

CREATE TABLE `quest_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quest_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` varchar(250) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `quest_messages` */

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `quest_notifications` */

insert  into `quest_notifications`(`id`,`user_id`,`quest_id`,`model_id`,`event_type`,`created_at`,`seen_at`,`sent_by_email`) values (1,1,1,1,'quest_created',1401032562,1401032562,0),(2,1,1,1,'product_created',1401034784,1401034784,0),(3,1,1,2,'product_like',1401034818,1401210105,0),(4,1,2,2,'quest_created',1401210812,1401210812,0),(5,1,2,2,'product_created',1401210871,1401210875,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `quest_product_votes` */

insert  into `quest_product_votes`(`id`,`quest_product_id`,`user_id`,`vote`,`created_at`,`updated_at`) values (1,NULL,12,1,1398879272,1398936609),(2,1,1,1,1401034818,1401034818);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `quest_products` */

insert  into `quest_products`(`id`,`quest_id`,`product_id`,`description`,`total_likes`,`total_dislikes`,`vote_score`,`added_by`,`created_at`,`updated_at`) values (1,1,1,NULL,1,0,1,1,1401034784,1401034818),(2,2,2,NULL,NULL,NULL,NULL,1,1401210871,1401210871);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `quests` */

insert  into `quests`(`id`,`url`,`user_id`,`name`,`description`,`purchase_within`,`purchase_by`,`default_product_id`,`purchased_product_id`,`is_open`,`is_public`,`created_at`,`updated_at`,`created_by`) values (1,'l34h8o',1,'Jacket','123',2,1402242162,1,NULL,NULL,1,1401032562,1401210100,1),(2,'5ats7f',2,'Kyle quest for the best shoes','',2,1402420412,NULL,NULL,NULL,1,1401210812,1401210812,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_avatars` */

insert  into `user_avatars`(`id`,`user_id`,`name`,`public_uri`,`public_ssl_uri`,`public_streaming_uri`,`width`,`height`,`content_length`,`created_at`,`updated_at`) values (1,1,'7d83da7bcdfad01564f7855feaf0a936.png','http://10b2369fd88484cb1829-301bfc721f36f2495d8a276d7e2b76e2.r18.cf1.rackcdn.com/7d83da7bcdfad01564f7855feaf0a936.png','https://e78f294bdb0a87abf91c-301bfc721f36f2495d8a276d7e2b76e2.ssl.cf1.rackcdn.com/7d83da7bcdfad01564f7855feaf0a936.png','http://d2725e9e7870c0e896db-301bfc721f36f2495d8a276d7e2b76e2.r18.stream.cf1.rackcdn.com/7d83da7bcdfad01564f7855feaf0a936.png',200,200,34986,1401032657,1401032657),(2,1,'7d83da7bcdfad01564f7855feaf0a936.png','http://7675188bf9e8133792bf-da4dce5cb75456dd15c437d9fff43577.r87.cf1.rackcdn.com/7d83da7bcdfad01564f7855feaf0a936.png','https://90790433881f76b3a12e-da4dce5cb75456dd15c437d9fff43577.ssl.cf1.rackcdn.com/7d83da7bcdfad01564f7855feaf0a936.png','http://591128c6a485981a6645-da4dce5cb75456dd15c437d9fff43577.r87.stream.cf1.rackcdn.com/7d83da7bcdfad01564f7855feaf0a936.png',32,32,1900,1401032660,1401032660);

/*Table structure for table `user_notices` */

CREATE TABLE `user_notices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user_notices` */

insert  into `user_notices`(`id`,`user_id`,`type`,`created_at`) values (1,1,'start_quest',1401032562);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`group`,`email`,`confirmation_code`,`status`,`display_name`,`last_login`,`login_hash`,`profile_fields`,`reset_code`,`reset_created_at`,`welcome_message`,`receive_notifications`,`created_at`,`updated_at`) values (1,'goran.blazin','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',50,'goran.blazin@gmail.com','de22005e4fa1572d4406374c13fff9c9',2,NULL,1401212514,'3cfcffd5fcb4689175e1704256d7e430f240fd4f','a:0:{}',NULL,NULL,1,1,1401032532,1401032669),(2,'kyle','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',1,'kyle@shopgab.com','9fede6c5ab51517fcc979f72b95c9f6a',2,NULL,1401032850,'83a9ec11fbeeead5ee4d8cde1107daf978f063f4','a:0:{}',NULL,NULL,1,1,1401032842,1401032842),(4,'testclient','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',50,'testclient@test.com','61c91de418d70af12ff526dcd7d79631',1,NULL,1401211529,'1f1b279ee726bd5517b9f07c07ebbc339daf6b87','a:0:{}',NULL,NULL,1,1,1401211517,1401211518);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users_metadata` */

insert  into `users_metadata`(`id`,`parent_id`,`key`,`value`,`user_id`,`created_at`,`updated_at`) values (1,NULL,'fullname','Goran Blazin',1,1401032669,0);

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
