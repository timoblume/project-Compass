# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: lr
# Generation Time: 2014-07-28 15:03:44 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bookmarks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookmarks`;

CREATE TABLE `bookmarks` (
  `bookmark_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `url` varchar(1024) NOT NULL,
  `favicon` varchar(55) NOT NULL,
  `tags` varchar(55) NOT NULL DEFAULT '',
  `category` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`bookmark_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `bookmarks` WRITE;
/*!40000 ALTER TABLE `bookmarks` DISABLE KEYS */;

INSERT INTO `bookmarks` (`bookmark_id`, `title`, `description`, `url`, `favicon`, `tags`, `category`, `user_id`)
VALUES
	(9,'UX Design','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diamLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://google.de','','web design ux',1,20),
	(10,'youtube timo','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','https://www.youtube.com/','','video content',1,20),
	(11,'facebook','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','facebook.com','','social',2,20),
	(13,'stumble upon','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://www.stumbleupon.com/','','webservice cool nice',2,20),
	(14,'Fast Company timo','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://www.fastcompany.com/','',' tech web design ',8,32),
	(17,'Delicious Database Schema','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://tagging.pui.ch/post/37027745720/tags-database-schemas','','delicious database',1,20),
	(19,'dsadsa','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://tagging.pui.ch/post/37027745720/tags-database-schemas','','google jojojo ',0,20),
	(20,'Usability Post','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://usabilitypost.com/','','web design',1,20),
	(21,'Design Inspiration','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://abduzeedo.com/','','design ux',1,20),
	(32,'Dribble','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ','http://dribbble.com/','','design',1,20),
	(33,'Font Awesome','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ','http://fortawesome.github.io/Font-Awesome/icons/','','web design',1,20),
	(34,'Chefkoch.de','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.','http://www.chefkoch.de/','','tech',8,32),
	(43,'Fast Company','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://www.fastcompany.com/','',' tech web design ',2,20),
	(44,'Askari','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolore et dolore magna aliquyam erat, sed diam volupt.','http://www.angelsport.de/','','Angelsport Shop',10,32),
	(45,'Angel DomÃ¤ne','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolore','http://www.angel-domaene.de/','','Angelsport',10,32),
	(46,'Fast Company','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://www.fastcompany.com/','',' tech web design ',1,20),
	(67,'Fast Company','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://www.fastcompany.com/','',' tech web design ',1,20),
	(68,'Chefkoch.de','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.','http://www.chefkoch.de/','','tech',1,20),
	(69,'UX Design','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diamLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://google.de','','web design ux',12,37),
	(70,'Grilled Cheese','Grilled Cheese Cool Concept','http://recode.net/2014/07/28/game-changing-grilled-cheese-tech-2/','','kochen',11,37),
	(71,'UX Design','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diamLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum','http://google.de','','web design ux',11,37),
	(72,'CoreOs','Ein minimales Betriebsystem fÃ¼r Docker','http://www.golem.de/news/coreos-stable-channel-ein-minimales-betriebssystem-fuer-docker-1407-108159.html','','Core OS',11,37);

/*!40000 ALTER TABLE `bookmarks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `gattung` varchar(1024) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number_follower` int(11) NOT NULL,
  `tags` varchar(1024) NOT NULL DEFAULT '',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`category_id`, `title`, `description`, `gattung`, `user_id`, `number_follower`, `tags`)
VALUES
	(1,'Webdesign','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor ','Design',20,0,''),
	(2,'Development','Everything code related','Coding',20,0,''),
	(5,'Grafik Design','Alles was mit Zeichnen, Farbe und KreativitÃ¤t zu tun hat.','',20,0,''),
	(6,'Tutorials','Youtube Videos, Blogpost etc. Alles was nicht dÃ¼mmer macht:)','',20,0,''),
	(7,'Javascript','Alles was mit Javascript zu tun hat. ','',20,0,''),
	(8,'Rezepte','tolle rezept, vegetarisch und nicht vegetarisch','',32,0,''),
	(9,'Vegetarisch','Alles ohne Tier aber super lecker und vor Allem gesund!','',32,0,''),
	(10,'Angelsport','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dol.','',32,0,''),
	(11,'Kochen','Viel Essen!','',37,0,''),
	(12,'Funny Videos','Fails Compilations, Cats and Goats','',37,0,''),
	(13,'Kategorie 1','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.','',38,0,''),
	(14,'Kategorie 2','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.','',38,0,''),
	(15,'Kategorie 3','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod','',38,0,'');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subscriptions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subscriptions`;

CREATE TABLE `subscriptions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subscriber_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;

INSERT INTO `subscriptions` (`id`, `subscriber_id`, `subscription_id`)
VALUES
	(5,37,20),
	(6,20,37),
	(7,20,37),
	(8,38,20);

/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `password_recover` int(11) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '0',
  `allow_email` int(11) NOT NULL DEFAULT '1',
  `profile` varchar(55) NOT NULL,
  `subscription_categories` varchar(55) NOT NULL DEFAULT '',
  `subscription_users` varchar(55) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `email_code`, `active`, `password_recover`, `type`, `allow_email`, `profile`, `subscription_categories`, `subscription_users`)
VALUES
	(20,'timo','0514a51b8f2d7dae4deeafd365f3bc03','timo','','tiblu@web.de','e125ac9e75fb3a785c9f98442a9d9af9',1,0,0,1,'images/profile/174d77ee7f.jpg','','20'),
	(37,'hans','0514a51b8f2d7dae4deeafd365f3bc03','hans','','flatlinersclothing@gmail.com','90b079c92c6b2ddcbc76e7194f2ce339',1,0,0,1,'images/profile/b2ab1d3ee6.jpg','','37'),
	(38,'admin','5f4dcc3b5aa765d61d8327deb882cf99','admin','','admin@compass.com','ad72ce3a354d6b5b0544b39fc63fe0bc',1,0,0,1,'','','');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
