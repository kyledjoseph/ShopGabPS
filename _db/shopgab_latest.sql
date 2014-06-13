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

insert  into `clients`(`id`,`gender`,`neck`,`arm`,`over_arm`,`chest`,`waist`,`glove`,`hat`,`shirt_size`,`age`,`height`,`weight`,`bust`,`hips`,`cup_size`,`dress_size`,`professional_information`,`user_id`,`parent_id`) values (4,0,'as123','asd','sad','sad','asd','asd','das','ads','asd','ads','asd','123','123','qw','qw','sadsad',2,7),(5,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,5);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `log_emails` */

insert  into `log_emails`(`id`,`type`,`to_name`,`to_addr`,`from_name`,`from_addr`,`subject`,`body`,`created_at`,`updated_at`) values (1,'confirmation_cod','goran.blazin@gmail.com','goran.blazin@gmail.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/de22005e4fa1572d4406374c13fff9c9\">http://shopgab.dev/confirm/de22005e4fa1572d4406374c13fff9c9</a>',1401032533,1401032533),(2,'confirmation_cod','kyle@shopgab.com','kyle@shopgab.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/9fede6c5ab51517fcc979f72b95c9f6a\">http://shopgab.dev/confirm/9fede6c5ab51517fcc979f72b95c9f6a</a>',1401032843,1401032843),(3,'confirmation_cod','testclient@test.com','testclient@test.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/4281cb97768f138755900483849250f7\">http://shopgab.dev/confirm/4281cb97768f138755900483849250f7</a>',1401033222,1401033222),(4,'confirmation_cod','testclient@test.com','testclient@test.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\r\n\r\n<a href=\"http://shopgab.dev/confirm/61c91de418d70af12ff526dcd7d79631\">http://shopgab.dev/confirm/61c91de418d70af12ff526dcd7d79631</a>',1401211519,1401211519),(5,'client_notificat','testclient@test.com','testclient@test.com','ShopGab','notification@shopgab.com','ShopGab Notifications','<html>\r\n<img src=\"cid:SHOPGAB_LOGO\" style=\"width: 100px; margin-left: auto; margin-right: auto\" />\r\n<div class=\"content\">\r\n<p>Paypal failed</p></div>\r\n<div class=\"unsubscribe\">\r\n	<p style=\"text-align:center;\">To turn off e-mail notifications, please change the settings in your ShopGab profile.</p>\r\n  <p>If you have any questions please contact ShopGab support.</p>\r\n  <p>Thanks!</p>\r\n  <p>ShopGab Admin</p>\r\n</div>\r\n<div class=\"footer\">\r\n  <div style=\"width: 50%;\">\r\n    1871: Shopgab\r\n    222 Merchandise Mart Plaza Suite #1212\r\n    Chicago, IL  60654\r\n  </div>\r\n</div>\r\n</html>',1401212438,1401212438),(6,'confirmation_cod','goran.blazin@gmail.com','goran.blazin@gmail.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\n\n<a href=\"http://shopgab.dev/confirm/14a296590185e4e4d0fa62ff1453d821\">http://shopgab.dev/confirm/14a296590185e4e4d0fa62ff1453d821</a>',1401693959,1401693959),(7,'confirmation_cod','pintaricn@gmail.com','pintaricn@gmail.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\n\n<a href=\"http://test.shopgab.com/confirm/aa38b1a1aa0ab3edff62f7fdb0853f80\">http://test.shopgab.com/confirm/aa38b1a1aa0ab3edff62f7fdb0853f80</a>',1401982012,1401982012),(8,'confirmation_cod','kyle@chicagofoodseum.com','kyle@chicagofoodseum.com','ShopGab','info@shopgab.com','Confirm your ShopGab email','<p>Confirm your ShopGab email by clicking on the link below.</p>\n\n<a href=\"http://test.shopgab.com/confirm/b83d87b54cbf03b2c8db246e6e473773\">http://test.shopgab.com/confirm/b83d87b54cbf03b2c8db246e6e473773</a>',1402076871,1402076871);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_images` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `products` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `professional_logos` */

insert  into `professional_logos`(`id`,`professional_id`,`name`,`public_uri`,`public_ssl_uri`,`public_streaming_uri`,`width`,`height`,`content_length`,`created_at`,`updated_at`) values (1,4,'bd5351503af0ca3bc873e2570b6f1fb5.png','http://e0910123508b3468b48c-39753bfb29af831ecfecc41a53077e64.r92.cf1.rackcdn.com/bd5351503af0ca3bc873e2570b6f1fb5.png','https://b098de2cbc2a1307d66b-39753bfb29af831ecfecc41a53077e64.ssl.cf1.rackcdn.com/bd5351503af0ca3bc873e2570b6f1fb5.png','http://79a585eeee78152c2c4e-39753bfb29af831ecfecc41a53077e64.r92.stream.cf1.rackcdn.com/bd5351503af0ca3bc873e2570b6f1fb5.png',120,60,3816,1402661967,1402661967);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `professionals` */

insert  into `professionals`(`id`,`user_id`,`pricing_plan_type`,`pricing_plan_started_on`,`automatic_plan_renewal`,`automatic_plan_notification_sent`,`price`) values (4,5,1,1401693958,1,0,NULL),(5,7,1,1402076870,1,0,NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `quest_notifications` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `quest_product_votes` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `quest_products` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `quests` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_notices` */

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`group`,`email`,`confirmation_code`,`status`,`display_name`,`last_login`,`login_hash`,`profile_fields`,`reset_code`,`reset_created_at`,`welcome_message`,`receive_notifications`,`created_at`,`updated_at`) values (2,'kyle','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',1,'kyle@shopgab.com','9fede6c5ab51517fcc979f72b95c9f6a',2,NULL,1402076808,'4bfe86fd9dfc8b4ae845b9b0197697bb9cf25bb9','a:0:{}',NULL,NULL,1,1,1401032842,1401032842),(5,'goran.blazin','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',50,'goran.blazin@gmail.com','14a296590185e4e4d0fa62ff1453d821',2,NULL,1402659918,'57ab919b2cce8f15274ad517d5803360c822fc10','a:0:{}',NULL,NULL,1,1,1401693958,1402077246),(6,'pintaricn','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',1,'pintaricn@gmail.com','aa38b1a1aa0ab3edff62f7fdb0853f80',2,NULL,1401982050,'323186a9f23c95ebb115f1b13b9279fdcd86e0ad','a:0:{}',NULL,NULL,1,1,1401982012,1401982093),(7,'kyle0','uez0w3Y2xl007yaMtdFg45wr2jmXt3Oxd8e6DlOvCKY=',50,'kyle@chicagofoodseum.com','b83d87b54cbf03b2c8db246e6e473773',2,NULL,1402076921,'ad31c4f052092e50d69c54d60ee9aa59b92088d7','a:0:{}',NULL,NULL,1,1,1402076870,1402076957);

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
