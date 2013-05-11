# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29-0ubuntu0.12.10.1)
# Database: itemnation
# Generation Time: 2013-05-11 00:04:09 +0000
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


# Dump of table chat_messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat_messages`;

CREATE TABLE `chat_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `chat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` varchar(250) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `chat_messages` WRITE;
/*!40000 ALTER TABLE `chat_messages` DISABLE KEYS */;

INSERT INTO `chat_messages` (`id`, `chat_id`, `user_id`, `body`, `created_at`, `updated_at`)
VALUES
	(23,5,4,'Hey Kyle!',1367462402,1367462402),
	(24,5,4,'New comment',1367535820,1367535820),
	(25,14,5,'Checking updating chat',1367796281,1367796281),
	(26,9,4,'Message',1367806007,1367806007),
	(27,9,7,'hello testing this message.. longer message.. message',1367806554,1367806554),
	(28,8,7,'hello world\r\n',1368230401,1368230401);

/*!40000 ALTER TABLE `chat_messages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table chat_product_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat_product_comments`;

CREATE TABLE `chat_product_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `chat_product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `chat_product_comments` WRITE;
/*!40000 ALTER TABLE `chat_product_comments` DISABLE KEYS */;

INSERT INTO `chat_product_comments` (`id`, `chat_product_id`, `user_id`, `comment`, `created_at`, `updated_at`)
VALUES
	(5,7,4,'This!',1367797021,1367797021),
	(6,8,5,'hello this is a comment',1367797052,1367797052),
	(7,8,5,'this is another comment',1367797072,1367797072),
	(8,8,4,'I like this!',1367797335,1367797335),
	(9,7,7,'hello',1367806072,1367806072),
	(10,24,5,'asd;lfjasd;fjl',1367882606,1367882606),
	(11,24,5,'this is great',1367882611,1367882611),
	(12,5,7,'I think this TV is really awesome! Especially since a new one will be out the following week!',1368070390,1368070390),
	(13,5,7,'Did you check out the other cool TV?  It offers even better resolution - like you can even tell!',1368073702,1368073702);

/*!40000 ALTER TABLE `chat_product_comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table chat_product_votes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat_product_votes`;

CREATE TABLE `chat_product_votes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `chat_product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vote` int(1) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `chat_product_votes` WRITE;
/*!40000 ALTER TABLE `chat_product_votes` DISABLE KEYS */;

INSERT INTO `chat_product_votes` (`id`, `chat_product_id`, `user_id`, `vote`, `created_at`, `updated_at`)
VALUES
	(5,2,4,1,1366797532,1366797532),
	(6,3,4,0,1367266669,1367266669),
	(7,5,4,1,1367267113,1367267113),
	(8,5,7,1,1367293890,1367293890),
	(9,6,4,1,1367298180,1367298180),
	(10,7,4,1,1367311054,1367311054),
	(11,8,5,1,1367341305,1367341305),
	(12,10,5,1,1367354635,1367354635),
	(13,14,5,1,1367429079,1367429079),
	(14,9,4,1,1367462463,1367462463),
	(15,12,4,0,1367465517,1367465517),
	(16,15,5,1,1367507617,1367507617),
	(17,22,4,1,1367796728,1367796728),
	(18,8,4,1,1367806862,1367806862),
	(19,18,4,0,1367820640,1367820640);

/*!40000 ALTER TABLE `chat_product_votes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table chat_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat_products`;

CREATE TABLE `chat_products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `chat_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `purchase_within` int(1) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `chat_products` WRITE;
/*!40000 ALTER TABLE `chat_products` DISABLE KEYS */;

INSERT INTO `chat_products` (`id`, `chat_id`, `product_id`, `description`, `purchase_within`, `created_at`, `updated_at`)
VALUES
	(1,1,3,'description_here',NULL,NULL,NULL),
	(2,2,8,'description',NULL,NULL,NULL),
	(3,2,13,NULL,NULL,1367215425,1367215425),
	(4,2,14,NULL,NULL,1367215603,1367215603),
	(5,8,21,NULL,NULL,1367267100,1367267100),
	(6,2,22,NULL,NULL,1367298148,1367298148),
	(7,9,23,NULL,NULL,1367309757,1367309757),
	(8,5,24,NULL,NULL,1367340722,1367340722),
	(9,5,25,NULL,NULL,1367342346,1367342346),
	(11,10,27,NULL,NULL,1367359747,1367359747),
	(12,5,28,NULL,NULL,1367380017,1367380017),
	(13,5,29,NULL,NULL,1367380187,1367380187),
	(14,11,30,NULL,NULL,1367429051,1367429051),
	(15,11,31,NULL,NULL,1367507589,1367507589),
	(16,11,32,NULL,NULL,1367526094,1367526094),
	(17,5,33,NULL,NULL,1367527738,1367527738),
	(18,9,34,NULL,NULL,1367531621,1367531621),
	(19,9,35,NULL,NULL,1367533368,1367533368),
	(20,9,40,NULL,NULL,1367664425,1367664425),
	(21,9,45,NULL,NULL,1367665262,1367665262),
	(22,9,47,NULL,NULL,1367665975,1367665975),
	(23,12,48,NULL,NULL,1367686319,1367686319),
	(24,14,61,NULL,NULL,1367881763,1367881763),
	(25,9,62,NULL,NULL,1367972895,1367972895),
	(26,14,63,NULL,NULL,1368018992,1368018992),
	(27,14,64,NULL,NULL,1368212961,1368212961),
	(28,14,65,NULL,NULL,1368223228,1368223228);

/*!40000 ALTER TABLE `chat_products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table chats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chats`;

CREATE TABLE `chats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;

INSERT INTO `chats` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,1,'Tablet','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tortor nulla, blandit vel ornare quis, suscipit vel magna.Aenean ultrices, metus eu auctor dapibus, quam libero interdum metus, consectetur fringilla justo augue vel sapien. Nulla facilisi. Aenean ultrices, metus eu auctor dapibus, quam libero interdum metus, consectetur fringilla',NULL,NULL),
	(2,4,'TV','I\'m looking for a new TV, preferably 42\" or larger, 1080p. Not in the market for anything 3D. I would like something that I can connect a surround sound system to.',1366660285,1366660285),
	(3,5,'Stroller',';laksjdf;lasjdf;lajksd\r\n',1366660684,1366660684),
	(4,6,'stroller2','yep..',1366689757,1366689757),
	(5,5,'New TV','32\" HDTV with HDMI inputs',1367231698,1367231698),
	(6,2,'Fridge','I want a fridge that is cold instead of warm.',1367272919,1367272919),
	(7,7,'Stroller','I need this by this and this date.. please help',1367288967,1367288967),
	(8,7,'TV','I\'m looking for a new TV, preferably 42\" or larger, 1080p. Not in the market for anything 3D. I would like something that I can connect a surround sound system to.',NULL,NULL),
	(9,4,'Honda CRX Seats','Looking for two new seats for my 1988 Honda CRX.',1367309741,1367309741),
	(11,5,'new women\'s shoes','new women\'s shoes',1367428862,1367795811),
	(12,5,'Chair','lounging around',1367686213,1367686213),
	(13,5,'sofa set','two seater and a three seater sofa set',1367686544,1367686544),
	(14,5,'Test run #1','testing this feature',1367795849,1367796120);

/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
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
  `thumb` varchar(64) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;

INSERT INTO `product_images` (`id`, `product_id`, `src_url`, `src`, `thumb`, `created_at`, `updated_at`)
VALUES
	(21,45,'http://i.ebayimg.com/t/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/00/s/NzAwWDcwMA==/z/5m0AAMXQMmJRU3Kj/$T2eC16d,!y0E9s2S7)SLBRU3KjjLg!~~60_12.JPG','41a5e54f547d1c546f0bfafa013b9635.jpg','41a5e54f547d1c546f0bfafa013b9635_thumb.jpg',1367665262,1367665262),
	(22,47,'http://i.ebayimg.com/t/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/00/s/NzAwWDcwMA==/z/5m0AAMXQMmJRU3Kj/$T2eC16d,!y0E9s2S7)SLBRU3KjjLg!~~60_12.JPG','b1d4226b02cc4d135a781bab10ee6d9e.jpg','b1d4226b02cc4d135a781bab10ee6d9e_thumb.jpg',1367665975,1367665975),
	(23,48,'http://www.hermanmiller.com/content/dam/hermanmiller/page_assets/products/Eames_Lounge_Chair_and_Ottoman/hero_eames_lounge_2.jpg','121ec10c517692b41fbf8f4281f06a25.jpg','121ec10c517692b41fbf8f4281f06a25_thumb.jpg',1367686319,1367686319),
	(24,61,'http://l3.zassets.com/images/z/2/1/4/9/1/9/2149190-p-MULTIVIEW.jpg','a281308f8dd4d4d9a44ae681dca4ff85.jpg','a281308f8dd4d4d9a44ae681dca4ff85_thumb.jpg',1367881763,1367881763),
	(25,62,'http://i.ebayimg.com/t/PAIR-BLACK-LEATHER-RECLINABLE-TYPE-R-RACING-SEAT-SLIDER-WHITE-4-PT-CAMLOCK-BELT-/00/s/NzAwWDcwMA==/z/WyAAAOxyOM5Rbi0K/$T2eC16Z,!)8E9s4l8!0IBRbi0KQTHw~~60_3.JPG','ea64e92e08d6242b1ad42d6af71f225b.jpg','ea64e92e08d6242b1ad42d6af71f225b_thumb.jpg',1367972895,1367972895),
	(26,63,'http://l3.zassets.com/images/z/1/3/2/6/6/1/1326618-p-MULTIVIEW.jpg','0d12caafc8b2b46fb30b91dd08f02304.jpg','0d12caafc8b2b46fb30b91dd08f02304_thumb.jpg',1368018992,1368018992),
	(27,64,'http://a1.zassets.com/images/z/2/1/8/6/2/8/2186284-p-MULTIVIEW.jpg','79d820725b45a8514ea95a42a501eb67.jpg','79d820725b45a8514ea95a42a501eb67_thumb.jpg',1368212961,1368212961),
	(28,65,'http://www.aldoshoes.com/static/webUpload/731/26_gurcanti_36_7.jpg','a75a80f8bf41cf0b185d9690ce427a02.jpg','a75a80f8bf41cf0b185d9690ce427a02_thumb.jpg',1368223228,1368223228);

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

INSERT INTO `products` (`id`, `user_id`, `category_id`, `name`, `description`, `domain`, `url`, `brand`, `model`, `serial`, `warranty`, `type`, `dimensions`, `weight`, `created_at`, `updated_at`)
VALUES
	(6,4,NULL,'LINSAY 7\" Tablet w/ Google Android Jelly Bean 4.1 ','LINSAY-7\" Tablet w/ Google Android Jelly Bean 4.1-TPCF7HDUS-7\" Capacitive Multi-Touch 800*480Google Android OS 4.1&nbsp;Jelly Bean2.0&nbsp;GHz Cortex A9512MB RAM4 GB Internal MemoryFront Web CameraG-SensorWi-Fi WIRELESS 802.11 B/G/N3.0 USB3.5mm Headphone jackBuilt-in MicrophoneBuilt in Stereo SpeakerMicro SD slot supports up to 128GB','www.sears.com','http://www.sears.com/linsay-7inch-tablet-w-google-android-os-ice/p-00340143000P?prdNo=6&blockNo=6&blockType=G6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1366614544,1366614544),
	(7,4,NULL,'Apple Ipad Mini Wi-Fi - Tablet - Ios 6 - 64 Gb - 7','? Environmental Parameters? Min Operating Temperature 32 degree F? Max Operating Temperature 95 degree F? Humidity Range Operating 5 - 95% (non-con...','www.sears.com','http://www.sears.com/apple-ipad-mini-wi-fi-tablet-ios-6/p-SPM7550510810?prdNo=20&blockNo=20&blockType=G20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1366625624,1366625624),
	(8,4,NULL,'Panasonic 42\" Class Smart Viera® 1080p 120Hz LED H','Panasonic-42\" Class Smart Viera&reg; 1080p 120Hz LED HDTV - TC-L42E60-TC-L42E60-Panasonic TC L42E60 - 42\" VIERA E60 Series LED-backlit LCD TV - Smart TV - 1080p (FullHD)','www.sears.com','http://www.sears.com/panasonic-42inch-class-smart-viera-reg-120hz-led-hdtv/p-05771524000P?prdNo=2&blockNo=2&blockType=G2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1366660644,1366660644),
	(9,4,NULL,'LG 42\" Class 1080p 120Hz LED HDTV - 42LN5400 ENERG','LG-42\" Class 1080p 120Hz LED HDTV - 42LN5400-42LN5400-LG 42LN5400 - 42\" Class ( 41.9\" viewable ) LED-backlit LCD TV - 1080p (FullHD) - direct-lit LED','www.sears.com','http://www.sears.com/lg-42inch-class-1080p-120hz-led-hdtv-42ln5400/p-05771832000P?prdNo=7&blockNo=7&blockType=G7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1366756071,1366756071),
	(10,5,NULL,'Apple® - iPad® 2 with Wi-Fi - 16GB - Black - MC769','APPLE 16GB iPad with Wi-Fi: 9.7 inch widescreen display; 802.11a/b/g/n Wi-Fi; Bluetooth; iBooks support','bestbuy.com','http://www.bestbuy.com/site/Apple%26%23174%3B+-+iPad%AE+2+with+Wi-Fi+-+16GB+-+Black/1945531.p?id=1218303031896&skuId=1945531',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1366814872,1366814872),
	(11,5,NULL,'Barska 4\" x 6\" Steel Photo Frame CB11808 - Best Bu','BARSKA 4\" x 6\" Steel Photo Frame: Steel construction; 10 concealed key hooks; magnetic lock','www.bestbuy.com','http://www.bestbuy.com/site/Barska+-+4%26%2334%3B+x+6%26%2334%3B+Steel+Photo+Frame/6937291.p?id=1218815255740&skuId=6937291',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1366848181,1366848181),
	(12,5,NULL,'Kesey 7-Piece Dining Set: Up Your Patio\'s Elegance','Ty Pennington Style-Kesey 7 Piece Dining Set-AS-K-233ASET- The Kesey 7-Piece Dining Set Adds a Touch of Class to Your Patio  Enjoy dining with friends and family with the Ty Pennington Kesey 7-piece dining set, which centers around a spacious rectangular table with a scratch-resistant ceramic tile tabletop, four stationary chairs and two action chairs. The set\'s modern, dark brown aluminum frame is rust-resistant, and the red polyester chairs are UV-protected to resist fading.   This spacious Kesey 7-piece dining set perfectly accents almost any outdoor living area. The two action chairs let you lounge comfortably, whether you\'re reading a book or enjoying your morning coffee, and the four stationary are just right for gathering around the table for a meal with friends and family. ','www.sears.com','http://www.sears.com/ty-pennington-style-kesey-7-piece-dining-set/p-07125780000P?adCell=B5_ODLimage&adCell=WY',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367014055,1367014055),
	(13,4,NULL,'ASUS Asus Google Nexus 7 Tablet (16 GB) - Quad-cor','ASUS-Asus Google Nexus 7 Tablet (16 GB) - Quad-core Tegra 3 Processor, Android 4.1-NEXUS71B16N-Nexus 7 - The playground is open Simple. Beautiful. Beyond Smart.The Nexus brand represents a premium Android-based device that delivers the best Google experience available on tablet. It\'s the confluence of the latest software and state-of-the-art hardware and represents a literal nexus of digital life. Nexus 7 is Google\'s latest Nexus experience device and the first tablet to feature Android 4.1 Jelly Bean. It combines the best of both Google and ASUS design, with the most advanced software from Google paired with cutting edge ASUS hardware. Stunning 7 displayWith a vibrant 1280 x 800 high-definition display, Nexus 7 brings apps, games, books and movies to life. New ASUS TruVivid technology improves color clarity and brightness, while the IPS panel delivers crisp and detailed visuals with ultra-wide 178 degree viewing angles. Scratch-resistant Corning Fit Glass and a textured chassis design that prevents hand slippage ensure Nexus 7 is incredibly robust and meets the demands of consumers on the go. Designed with gaming in mindNexus 7 was created for mobile gamers. With an NVIDIA Tegra 3 quad-core processor, everything is faster ? pages load quickly, gameplay is smooth and responsive, and running multiple apps is a breeze. A 12-core GeForce GPU delivers advanced graphics while the patented 4-PLUS-1 CPU design gives you maximum performance when you need it and power efficiency when battery conservation is the priority. With heart-pounding quad-core performance, a responsive 10-finger multi-touch screen, plus gyroscope and accelerometer sensing, you can barrel roll, tilt, touch, and tap your way to the top of the leaderboards while exploring over 600,000 apps and games available on Google Play. The world\'s most popular platformNexus 7 is powered by Android 4.1 Jelly Bean, the latest version of the world\'s most popular mobile platform. With smarter notifications that let you respond quickly, beautiful new widgets that put your favorite con...','www.sears.com','http://www.sears.com/shc/s/p_10153_12605_SPM6517788605P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367215425,1367215425),
	(14,4,NULL,'Kaser Net\'sGo2 9\" Android 4.0 Tablet Bundle with 8','Kaser-Net\'sGo2 9\" Android 4.0 Tablet Bundle with 84-key USB Keyboard & Pouch-YF732-8G-Kaser Net\'sGo2 9\" Tablet with 84 key USB keyboard as a pouch protection','www.sears.com','http://www.sears.com/shc/s/p_10153_12605_00340988000P?vName=Computers&cName=Tablets&eReaders&sName=Tabletsmv=rr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367215603,1367215603),
	(15,4,NULL,'Samsung XE700T1A TAB I5/1.4 11.6 4GB 128GB W7P64 -','Samsung-XE700T1A TAB I5/1.4 11.6 4GB 128GB W7P64-XE700T1A-A09US-Samsung Series 7 Slate PC - Tablet - Windows 7 Professional 64-bit - 128 GB - 11.6\" TFT ( 1366 x 768 ) - rear camera + front camera - microSD slot - Wi-Fi, Bluetooth - black','www.sears.com','http://www.sears.com/shc/s/p_10153_12605_00339070000P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367215729,1367215729),
	(16,5,NULL,'BOB Revolution SE Stroller - Navy - BOB Trailers -','Buy BOB Revolution SE Stroller - Navy - With the latest innovative features, the BOB 2011 Revolution SE Stroller in Navy is perfect for any sport experience. From the zoo to the beach, zip through congested areas and around tight corners with the revolutionary swiveling front wheel or lock it in place for increased stability jogging or when the terrain turns tough. Easy-fold, lightweight design means this BOB is ready to stow, go or roll wherever life moves you. The state-of-the-art suspension ensures baby will have a smooth ride on the journey. If your little one is not quite ready for the roomy, comfortable seat, the Accessory Adapter feature quickly secures a BOB Infant Car Seat Adapter or Snack Tray when he\'s older. Also available in a Duallie two-seat model.The BOB 2011 Revolution SE Stroller - Navy features:The BOB 2011 Revolution SE Stroller\'s swiveling front wheel allows for superior maneuverability.  Locks forward for increased stability jogging or when the terrain turns tough.Easy, two-step folding, lightweight frame for convenient transport and storage.State-of-the-art, adjustable suspension system provides an exceptionally smooth ride.Accessory Adapter allows for quick and easy attachment of BOB Infant Car Seat Adapter or Snack Tray.Ultra-padded, adjustable reclining seat for enhanced seating comfort. Five-point padded harness keeps your child comfortably secure.','www.toysrus.com','http://www.toysrus.com/product/index.jsp?productId=10957922',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367233448,1367233448),
	(17,4,NULL,'LG 47\" LED HDTV 47LS4500 ENERGY STAR® - TVs & Elec','LG-47\" LED HDTV 47LS4500-47LS4500-LG 47LS4500 - 47\" Class ( 46.9\" viewable ) LS4500 Series LED-backlit LCD TV - 1080p (FullHD) - edge-lit','www.sears.com','http://www.sears.com/lg-47inch-led-hdtv-47ls4500/p-05771862000P?prdNo=1&blockNo=1&blockType=G1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367266545,1367266545),
	(20,4,NULL,'LG 47\" LED HDTV 47LS4500 ENERGY STAR® - TVs & Elec','LG-47\" LED HDTV 47LS4500-47LS4500-LG 47LS4500 - 47\" Class ( 46.9\" viewable ) LS4500 Series LED-backlit LCD TV - 1080p (FullHD) - edge-lit','www.sears.com','http://www.sears.com/lg-47inch-led-hdtv-47ls4500/p-05771862000P?prdNo=1&blockNo=1&blockType=G1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367267008,1367267008),
	(21,7,NULL,'LG 47\" LED HDTV 47LS4500 ENERGY STAR® - TVs & Elec','LG-47\" LED HDTV 47LS4500-47LS4500-LG 47LS4500 - 47\" Class ( 46.9\" viewable ) LS4500 Series LED-backlit LCD TV - 1080p (FullHD) - edge-lit','www.sears.com','http://www.sears.com/lg-47inch-led-hdtv-47ls4500/p-05771862000P?prdNo=1&blockNo=1&blockType=G1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367267100,1367267100),
	(22,4,NULL,'AOC e2051Sn 20 Class Widescreen LED Backlit Monito','Buy the AOC 20\" Wide 1600x900 LED Monitor, VGA at a super low price.  TigerDirect.com is your one source for the best computer and electronics deals anywhere, anytime.','www.tigerdirect.com','http://www.tigerdirect.com/applications/SearchTools/item-details.asp?EdpNo=1717285&Sku=A204-2003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367298148,1367298148),
	(23,4,NULL,'New 2 Black White Leather Racing Seats Reclinable ','NEW 2 BLACK WHITE LEATHER RACING SEATS RECLINABLE ALL HONDA in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/NEW-2-BLACK-WHITE-LEATHER-RACING-SEATS-RECLINABLE-ALL-HONDA-/261203551919?pt=Motors_Car_Truck_Parts_Accessories&fits=Year%3A1988%7CMake%3AHonda%7CModel%3ACRX&hash=item3cd0f1e6af&vxp=mtr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367309757,1367309757),
	(24,5,NULL,'Jack LaLanne Power Juicer: Get Fit & Great Value w','Jack LaLanne-Power Juicer Pro Electric Juicer-PJP-The Jack LaLanne Power Juicer Promotes Health and VitalityClad in sleek stainless steel, the Jack LaLanne Electric juicer is a striking addition to your countertop, but not just built for looks, it helps you unlock the health benefits of fresh squeezed juice. The perfect investment in vibrant health, this juicer delivers easy use, powerful extraction and a lifetime of solid service. No matter if you&#8217;re a morning, afternoon or evening juice lover, this powerful countertop machine will be ready to help you on the road to whole body well being. A great addition to full households, this juicer features whisper quiet operation that&#8217;s perfect for night owls and early risers alike. A great way to let the whole house rest or keep the conversation going while preparing a nutrient rich drink, the Jack LaLanne Power Juicer fits perfectly into your schedule without all the noise of other machines. Featuring an extra large round chute and smooth running induction motor, juice flows quickly from the Jack LaLanne electric juicer into your cup while the extra large pulp container lets you fit more apple, oranges, pears and veggies into each meal with less mess. Like having your very own juice bar at home, the Jack LaLanne Power Juicer turns raw ingredients into vitamin and mineral rich drinks that increase vitality in young and old alike. The perfect way to keep the whole family healthy, this juicer delivers a lifetime of fresh squeezed flavor and the energy to make the most out of every day. Add its sleek stainless steel body to your countertop today, and get great looks and health that will stick with you for a lifetime. ','www.sears.com','http://www.sears.com/jack-lalanne-power-juicer-pro-electric-juicer/p-00885656000P?prdNo=4&blockNo=4&blockType=G4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367340722,1367340722),
	(25,5,NULL,'Hewlett Packard 300G 6G SAS 10K rpm SFF Gen8 - Com','Hewlett Packard-300G 6G SAS 10K rpm SFF Gen8-65256421-HP 300GB 6G SAS 10K rpm SFF (2.5-inch) SC Enterprise 3yr Warranty Hard Drive (Gen8 ONLY)There are no returns on HP products. Normally a warranty is provided and the customer can call for technical support if needed.','www.sears.com','http://www.sears.com/hewlett-packard-300g-6g-sas-10k-rpm-sff/p-SPM6727263507?prdNo=15&blockNo=15&blockType=G15&PDP_REDIRECT=false&s_tnt=39869:4:0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367342346,1367342346),
	(26,5,NULL,'Samsung 60\" Class 1080p 240Hz Ultra Slim LED HDTV ','Samsung-60\" Class 1080p 240Hz Ultra Slim LED HDTV UN60F8000-UN60F8000BFXZA-Samsung UN60F8000 - 60\" 8 Series 3D LED-backlit LCD TV - Smart TV - 1080p (FullHD) - local dimming','www.sears.com','http://www.sears.com/samsung-60inch-class-1080p-2040hz-ultra-slim-led/p-05771481000P?prdNo=5&blockNo=5&blockType=G5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367354618,1367354618),
	(27,5,NULL,'Women\'s Flat Sandals Embellished: Get a Summer Glo','SM New York-Women\'s Sandal Zirconia - Silver-KLS-1412- Women\'s Flat Sandals Embellished With Silver Zirconia Shine Bright  The best way to get that sought-after luminous glow this season is with a pair of SMNY women\'s sandals, zirconia silver shining in the light. This fashion flat sandal features a manmade outsole with a half-inch, demi-wedge heel with a synthetic silver upper that wraps your ankle in beautiful rhinestone embellishments.  These women\'s flat sandals embellished with silver zirconia are thong-style, with a single strap attached to the top of the shoe. A zipper heel keeps your foot securely in the sandal and adds an attractive detail to these already chic shoes. Style up with a floral sundress for a fun and flirty look that takes you from day to night, or with skinny jeans and a tunic for a nice night in the summer air. Casual sandals have never been so versatile!','www.sears.com','http://www.sears.com/shc/s/p_10153_12605_054VA53936612P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367359747,1367359747),
	(28,5,NULL,'Wall-Mount Outdoor Swivel Lampholder-LHS100Z at Th','The Wall-Mount Outdoor Swivel Lampholder is crafted with commercial-quality die-cast metal construction. It includes 75-watt halogen bulb and offers hassle-free installation. It mounts on a wall to illuminate yards and decks.at The Home Depot','homedepot.com','http://www.homedepot.com/p/Wall-Mount-Outdoor-Swivel-Lampholder-LHS100Z/202266478?N=bvme#.UYCP4CtAThI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367380017,1367380017),
	(29,5,NULL,'Diamond Block Window Panel | west elm','Sheer delight. Hand-blocked with Khadia white paste traditionally used by Indian printing artisans in Jaipurthis white-on-white diamond pattern brings subtle style to classic, semi-sheer cotton curtains.  Hand blocked by Indian ','www.westelm.com','http://www.westelm.com/products/diamond-block-window-panel-t324/?pkey=csheer-curtains&cm_src=sheer-curtains||NoFacet-_-NoFacet-_--_-',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367380187,1367380187),
	(30,5,NULL,'Nina Forever Ivory Satin - Zappos.com Free Shippin','Forever by Nina at Zappos.com - FREE Shipping. Read Nina Forever product reviews, or select the Nina Forever size, width, and color of the Nina Forever of your choice.\n','www.zappos.com','http://www.zappos.com/nina-forever-ivory-satin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367429051,1367429051),
	(31,5,NULL,'Roxy Kids Rio (Toddler/Youth) Hot Pink - Zappos.co','Rio (Toddler/Youth) by Roxy Kids at Zappos.com - FREE Shipping. Read Roxy Kids Rio (Toddler/Youth) product reviews, or select the Roxy Kids Rio (Toddler/Youth) size, width, and color of the Roxy Kids Rio (Toddler/Youth) of your choice.\n','www.zappos.com','http://www.zappos.com/roxy-kids-rio-toddler-youth-hot-pink',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367507589,1367507589),
	(32,5,NULL,'Badgley Mischka Shoes, Abbie Evening Flat Sandals ','Shop for Shop Designer Sandals online at Macys.com. Put some sparkle in your step with Badgley Mischka\'s Abbie evening flat sandals. ','macys.com','http://www1.macys.com/shop/product/badgley-mischka-shoes-abbie-evening-flat-sandals?ID=833387&CategoryID=63216#fn=sp%3D1%26spc%3D256%26ruleId%3D52%26slotId%3D2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367526094,1367526094),
	(33,5,NULL,'Britax Marathon 70-G3 Convertible Car Seat - Onyx','AlbeeBaby - for all your baby needs!  FREE SHIPPING available for Strollers, Car Seats, Highchairs, Baby Carriers, Bouncers, Toys, Activity Gyms, Potty Seats by Best Selling Brands like Britax, Baby Jogger, Baby Bjorn, Graco, Peg Perego, Safety First and more!\n  Britax Marathon 70-G3 Convertible Car Seat - Onyx','www.albeebaby.com','http://www.albeebaby.com/britax-marathon-70-g3-convertible-car-seat-onyx.html?utm_source=googleproducts&utm_medium=cse&utm_campaign=googleproducts&utm_content=E9LJ51A&gclid=CKr2tbml-LYCFc0WMgodS08ASw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367527738,1367527738),
	(34,4,NULL,'1P Universal JDM SP Black PVC Leather Car Racing B','1P UNIVERSAL JDM-SP BLACK PVC LEATHER CAR RACING BUCKET SEAT+SLIDER GMC HONDA in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/1P-UNIVERSAL-JDM-SP-BLACK-PVC-LEATHER-CAR-RACING-BUCKET-SEAT-SLIDER-GMC-HONDA-/121103397031?pt=Motors_Car_Truck_Parts_Accessories&fits=Year%3A1988%7CMake%3AHonda%7CModel%3ACRX&hash=item1c325330a7&vxp=mtr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367531621,1367531621),
	(35,4,NULL,'Universal SP Black PVC Leather Car Racing Bucket S','UNIVERSAL SP BLACK PVC LEATHER CAR RACING BUCKET SEATS W/SLIDER PAIR GMC HONDA in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/UNIVERSAL-SP-BLACK-PVC-LEATHER-CAR-RACING-BUCKET-SEATS-W-SLIDER-PAIR-GMC-HONDA-/130899135933?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7382443816859195549%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D121103397031%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367533368,1367533368),
	(36,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367664175,1367664175),
	(37,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367664285,1367664285),
	(38,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367664318,1367664318),
	(39,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367664385,1367664385),
	(40,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367664424,1367664424),
	(41,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367664741,1367664741),
	(42,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367664759,1367664759),
	(43,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367664838,1367664838),
	(44,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367664887,1367664887),
	(45,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367665262,1367665262),
	(46,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367665920,1367665920),
	(47,4,NULL,'2 x Universal Black Red PVC Leather Racing Seats 4','2 X UNIVERSAL BLACK/RED PVC LEATHER RACING SEATS+4-PT WHITE CAMLOCK HARNESS BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/2-X-UNIVERSAL-BLACK-RED-PVC-LEATHER-RACING-SEATS-4-PT-WHITE-CAMLOCK-HARNESS-BELT-/190817526976?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D163%26meid%3D7418019092614909687%26pid%3D100005%26prg%3D1088%26rk%3D2%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367665974,1367665974),
	(48,5,NULL,'Eames Lounge and Ottoman - Lounge Chair - Herman M','','www.hermanmiller.com','http://www.hermanmiller.com/products/seating/lounge-seating/eames-lounge-chair-and-ottoman.html',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367686318,1367686318),
	(49,5,NULL,'Intex® Ultra Lounge Chair : Cabela\'s','','cabelas.com','http://www.cabelas.com/catalog/product.jsp?productId=1168160&productVariantId=3098572&WT.tsrc=CSE&WT.mc_id=GoogleProductAds&WT.z_mc_id1=03378169&rid=40&channel=GoogleBaseUSA&mr:trackingCode=65C59DC2-55D0-E111-8DC4-001B21631C34&mr:referralID=NA&mr:adType=pla&mr:ad=25988358071&mr:keyword=&mr:match=&mr:filter=52255417391&gclid=CJfNrLb0_LYCFQFp4Aodfl8AQw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367686362,1367686362),
	(50,5,NULL,'Intex® Ultra Lounge Chair : Cabela\'s','','cabelas.com','http://www.cabelas.com/catalog/product.jsp?productId=1168160&productVariantId=3098572&WT.tsrc=CSE&WT.mc_id=GoogleProductAds&WT.z_mc_id1=03378169&rid=40&channel=GoogleBaseUSA&mr:trackingCode=65C59DC2-55D0-E111-8DC4-001B21631C34&mr:referralID=NA&mr:adType=pla&mr:ad=25988358071&mr:keyword=&mr:match=&mr:filter=52255417391&gclid=CJfNrLb0_LYCFQFp4Aodfl8AQw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367686385,1367686385),
	(51,5,NULL,'Furnituremaxx Dual Reclining Chocolate Microfiber ','Dual Reclining Chocolate Microfiber Living Room Reclining Sofa and Loveseat...','www.sears.com','http://www.sears.com/furnituremaxx-dual-reclining-chocolate-microfiber-living-room-reclining/p-SPM6944088607?prdNo=4&blockNo=4&blockType=G4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367686507,1367686507),
	(52,5,NULL,'Furnituremaxx Dual Reclining Chocolate Microfiber ','Dual Reclining Chocolate Microfiber Living Room Reclining Sofa and Loveseat...','www.sears.com','http://www.sears.com/furnituremaxx-dual-reclining-chocolate-microfiber-living-room-reclining/p-SPM6944088607?prdNo=4&blockNo=4&blockType=G4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367686556,1367686556),
	(53,5,NULL,'Furnituremaxx Dual Reclining Chocolate Microfiber ','Dual Reclining Chocolate Microfiber Living Room Reclining Sofa and Loveseat...','www.sears.com','http://www.sears.com/furnituremaxx-dual-reclining-chocolate-microfiber-living-room-reclining/p-SPM6944088607?prdNo=4&blockNo=4&blockType=G4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367686582,1367686582),
	(54,5,NULL,'La-Z-Boy Cantina Reclina-Rocker COCOA - Furniture ','La-Z-Boy-Cantina Reclina-Rocker COCOA-Bonded leather has never looked more inviting! Cantina\'s pillowtop flared arms welcome you into its stylish comfort. Take a rest on Cantina\'s soothing chaise seat and enjoy the comfortable split pillow back. Then, kick up your heels on Cantina\'s split footrest. Fashionable double stitching highlights the fine detailing on this recliner.','www.sears.com','http://www.sears.com/la-z-boy-cantina-reclina-rocker/p-02510004000P?prdNo=1&blockNo=1&blockType=G1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367686813,1367686813),
	(55,5,NULL,'La-Z-Boy Cantina Reclina-Rocker COCOA - Furniture ','La-Z-Boy-Cantina Reclina-Rocker COCOA-Bonded leather has never looked more inviting! Cantina\'s pillowtop flared arms welcome you into its stylish comfort. Take a rest on Cantina\'s soothing chaise seat and enjoy the comfortable split pillow back. Then, kick up your heels on Cantina\'s split footrest. Fashionable double stitching highlights the fine detailing on this recliner.','www.sears.com','http://www.sears.com/la-z-boy-cantina-reclina-rocker/p-02510004000P?prdNo=1&blockNo=1&blockType=G1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367795868,1367795868),
	(56,5,NULL,'La-Z-Boy Cantina Reclina-Rocker COCOA - Furniture ','La-Z-Boy-Cantina Reclina-Rocker COCOA-Bonded leather has never looked more inviting! Cantina\'s pillowtop flared arms welcome you into its stylish comfort. Take a rest on Cantina\'s soothing chaise seat and enjoy the comfortable split pillow back. Then, kick up your heels on Cantina\'s split footrest. Fashionable double stitching highlights the fine detailing on this recliner.','www.sears.com','http://www.sears.com/la-z-boy-cantina-reclina-rocker/p-02510004000P?prdNo=1&blockNo=1&blockType=G1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367795897,1367795897),
	(57,5,NULL,'Nikon Coolpix P520 Black 18-megapixel Digital Came','Nikon-Coolpix P520 Black 18-megapixel Digital Camera-26397-1-Nikon Coolpix P520 Black 42x zoom power, professional&ndash;quality photos and videos, endless capabilities. For those seeking a comprehensive compact camera for zoom, image quality, versatility and technological innovation, look no further than the COOLPIX P520. Create pro&ndash;caliber photos and Full HD 1080p videos from mind&ndash;boggling distances, even in extremely low&ndash;light conditions. Track your travels and explore points of interest with built&ndash;in GPS. Take control of your vision with full P, S, A, M exposure modes. Add the optional WU&ndash;1a Wireless Mobile Adapter and share your shots in an instant, or control the camera with your compatible smartphone or tablet. From its superb 42x zoom NIKKOR glass lens and 18.1&ndash;megapixel low&ndash;light CMOS image sensor to its D&ndash;SLR&ndash;inspired design and 3.2&ndash;inch Vari&ndash;angle LCD, the COOLPIX P520 delivers the pinnacle of performance and zoom. Get close with the 42x optical zoom. Built&ndash;in GPS with Points of Interest. Lens&ndash;shift Vibration Reduction keeps shots steady. Up to 7 continuous shots per second.','www.sears.com','http://www.sears.com/nikon-coolpix-p520-black-18-megapixel-digital-camera/p-SPM7649483102?prdNo=2&blockNo=2&blockType=G2&PDP_REDIRECT=false&s_tnt=39869:4:0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367796012,1367796012),
	(58,5,NULL,'Nikon Coolpix P520 Black 18-megapixel Digital Came','Nikon-Coolpix P520 Black 18-megapixel Digital Camera-26397-1-Nikon Coolpix P520 Black 42x zoom power, professional&ndash;quality photos and videos, endless capabilities. For those seeking a comprehensive compact camera for zoom, image quality, versatility and technological innovation, look no further than the COOLPIX P520. Create pro&ndash;caliber photos and Full HD 1080p videos from mind&ndash;boggling distances, even in extremely low&ndash;light conditions. Track your travels and explore points of interest with built&ndash;in GPS. Take control of your vision with full P, S, A, M exposure modes. Add the optional WU&ndash;1a Wireless Mobile Adapter and share your shots in an instant, or control the camera with your compatible smartphone or tablet. From its superb 42x zoom NIKKOR glass lens and 18.1&ndash;megapixel low&ndash;light CMOS image sensor to its D&ndash;SLR&ndash;inspired design and 3.2&ndash;inch Vari&ndash;angle LCD, the COOLPIX P520 delivers the pinnacle of performance and zoom. Get close with the 42x optical zoom. Built&ndash;in GPS with Points of Interest. Lens&ndash;shift Vibration Reduction keeps shots steady. Up to 7 continuous shots per second.','www.sears.com','http://www.sears.com/nikon-coolpix-p520-black-18-megapixel-digital-camera/p-SPM7649483102?prdNo=2&blockNo=2&blockType=G2&PDP_REDIRECT=false&s_tnt=39869:4:0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367796170,1367796170),
	(59,5,NULL,'Keurig B70 Platinum Coffee Maker - Appliances - Sm','Keurig-B70 Platinum Coffee Maker-112278-Four Brew Size Choices Programmable LCD Message Center Removable 60oz. Water Reservoir Removable Drip Tray Blue Backlit LCD & Water Reservoir Chrome Accents Our Quietest Brewer Ever - Quiet BrewTM Technology Specifications: Dimensions:13\"H 10\"W 13.25\"D Power:1500 watts Voltage:120VAC/60HZ UL and c-UL approved for Household use only ','www.sears.com','http://www.sears.com/keurig-platinum-b70-brewer/p-00808319000P?prdNo=2&blockNo=2&blockType=G2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367873015,1367873015),
	(60,5,NULL,'Keurig B70 Platinum Coffee Maker - Appliances - Sm','Keurig-B70 Platinum Coffee Maker-112278-Four Brew Size Choices Programmable LCD Message Center Removable 60oz. Water Reservoir Removable Drip Tray Blue Backlit LCD & Water Reservoir Chrome Accents Our Quietest Brewer Ever - Quiet BrewTM Technology Specifications: Dimensions:13\"H 10\"W 13.25\"D Power:1500 watts Voltage:120VAC/60HZ UL and c-UL approved for Household use only ','www.sears.com','http://www.sears.com/keurig-platinum-b70-brewer/p-00808319000P?prdNo=2&blockNo=2&blockType=G2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367873037,1367873037),
	(61,5,NULL,'Timberland Earthkeepers® Hookset Handcrafted Slip-','Earthkeepers® Hookset Handcrafted Slip-On by Timberland at Zappos.com - FREE Shipping. Read Timberland Earthkeepers® Hookset Handcrafted Slip-On product reviews, or select the Timberland Earthkeepers® Hookset Handcrafted Slip-On size, width, and color of the Timberland Earthkeepers® Hookset Handcrafted Slip-On of your choice.\n','www.zappos.com','http://www.zappos.com/timberland-earthkeepers-hookset-handcrafted-slip-on-washed-grey-canvas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367881763,1367881763),
	(62,4,NULL,'Pair Black Leather Reclinable Type R Racing Seat S','PAIR BLACK LEATHER RECLINABLE TYPE-R RACING SEAT+SLIDER+WHITE 4-PT CAMLOCK BELT in eBay Motors, Parts & Accessories, Car & Truck Parts | eBay','www.ebay.com','http://www.ebay.com/itm/PAIR-BLACK-LEATHER-RECLINABLE-TYPE-R-RACING-SEAT-SLIDER-WHITE-4-PT-CAMLOCK-BELT-/390579115819?rt=nc&_trksid=p2047675.m1851&_trkparms=aid%3D222002%26algo%3DSIC.FIT%26ao%3D1%26asc%3D261%26meid%3D7500603118247135806%26pid%3D100005%26prg%3D1088%26rk%3D4%26sd%3D261203551919%26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1367972895,1367972895),
	(63,5,NULL,'Blowfish Nice Black Strike PU - Zappos.com Free Sh','Nice by Blowfish at Zappos.com - FREE Shipping. Read Blowfish Nice product reviews, or select the Blowfish Nice size, width, and color of the Blowfish Nice of your choice.\n','www.zappos.com','http://www.zappos.com/blowfish-nice-black-strike-pu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1368018992,1368018992),
	(64,5,NULL,NULL,NULL,'www.zappos.com','http://www.zappos.com/product/7402860/color/2537',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1368212960,1368212960),
	(65,5,NULL,NULL,NULL,'aldoshoes.com','http://www.aldoshoes.com/us/men/mr-bs/shoes/93976044-gurcanti/36',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1368223227,1368223227);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `group`, `email`, `display_name`, `first_name`, `last_name`, `last_login`, `login_hash`, `profile_fields`, `created_at`, `updated_at`)
VALUES
	(2,NULL,'YM4CunAB+CjTZkqnaTYCFYw15oLERz/hFzl3HmPD1a4=',NULL,'me@christianbundy.com','Christian Bundy','Christian','Bundy','1368209980','ff9f6c2a3fcb4a61d69b52f31121229b61947422',NULL,1365019579,1365019579),
	(3,NULL,'HAy+KYPo2pyBc6akB9ltpTIdr8lCt0dj+4Ducrgbqqc=',NULL,'kyle@itemnation.com','Kyle Joseph','Kyle','Joseph','1365547660','4b3e6e52898fc9e93ff375c18f9f780a11073c6a',NULL,1365547660,1365547660),
	(4,NULL,'',NULL,'tmatthewsdev@gmail.com','Tyler Matthews','Tyler','Matthews','1368228004','78ba3bea3da4eed45f48a8b628261c17521a7e4e',NULL,1366238357,1366238357),
	(5,NULL,'',NULL,'bukjoseph@gmail.com','Kyle Joseph','Kyle','Joseph','1368228039','2ad41cd28e2217ef6bda7752c0fd70da3244df82',NULL,1366238442,1366238442),
	(6,NULL,'DuoswgUMsGDp0YGK4Gf0q3oJLaYjVpO6Y3J3DHb9MEE=',NULL,'dinkoamg@gmail.com',NULL,NULL,NULL,'1366689740','aa3dc9acad53849d762a5d01ae027afdd9dea446',NULL,1366689740,1366689740),
	(7,NULL,'DuoswgUMsGDp0YGK4Gf0q3oJLaYjVpO6Y3J3DHb9MEE=',NULL,'dinko3@email.com',NULL,NULL,NULL,'1368225898','d599dd6ea4ba7ca8db93a8a01d0911c99ef5a495',NULL,1367288949,1367288949);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
