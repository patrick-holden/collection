# ************************************************************
# Sequel Ace SQL dump
# Version 20031
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.7.3-MariaDB-1:10.7.3+maria~focal)
# Database: vinoverodb
# Generation Time: 2022-04-04 12:51:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table colour
# ------------------------------------------------------------

DROP TABLE IF EXISTS `colour`;

CREATE TABLE `colour` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `colour` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `colour` WRITE;
/*!40000 ALTER TABLE `colour` DISABLE KEYS */;

INSERT INTO `colour` (`id`, `colour`)
VALUES
	(1,'white'),
	(2,'red'),
	(3,'pink'),
	(4,'orange'),
	(5,'still'),
	(6,'spritzy'),
	(7,'cider');
	 (8,'sweet');

/*!40000 ALTER TABLE `colour` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table grape
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grape`;

CREATE TABLE `grape` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `grape` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `grape` WRITE;
/*!40000 ALTER TABLE `grape` DISABLE KEYS */;

INSERT INTO `grape` (`id`, `grape`)
VALUES
	(1,'pinot noir'),
	(2,'orchard-blend'),
	(3,'primitivo'),
	(4,'fiano'),
	(5,'nebbiolo'),
	(6,'xarello'),
	(7,'sauvignon blanc'),
	(8,'chardonnay'),
	(9,'lambrusco'),
	(10,'riesling'),
	(11,'sangiovese'),
	(12,'chenin blanc'),
	(13,'nerello mascalese'),
	(14,'gewurtztraminer'),
	(15,'Aleatico');

/*!40000 ALTER TABLE `grape` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table junc_colour
# ------------------------------------------------------------

DROP TABLE IF EXISTS `junc_colour`;

CREATE TABLE `junc_colour` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wines_id` int(11) DEFAULT NULL,
  `colour_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `junc_colour` WRITE;
/*!40000 ALTER TABLE `junc_colour` DISABLE KEYS */;

INSERT INTO `junc_colour` (`id`, `wines_id`, `colour_id`)
VALUES
	(1,1,1),
	(2,2,4),
	(3,3,1),
	(4,4,2),
	(5,4,6),
	(6,5,1),
	(7,6,2),
	(8,7,3),
	(9,8,2),
	(10,9,2),
	(11,10,2),
	(12,11,7),
	(13,12,5),
	(14,13,2),
	(15,14,4),
	(16,15,3),
	(17,16,3),
	(18,17,5);
	(18,17,5);
    	(19,17,7);
	(20,12,8);
	(22,17,5);

/*!40000 ALTER TABLE `junc_colour` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table junc_grape
# ------------------------------------------------------------

DROP TABLE IF EXISTS `junc_grape`;

CREATE TABLE `junc_grape` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wines_id` int(11) DEFAULT NULL,
  `grape_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `junc_grape` WRITE;
/*!40000 ALTER TABLE `junc_grape` DISABLE KEYS */;

INSERT INTO `junc_grape` (`id`, `wines_id`, `grape_id`)
VALUES
	(1,1,10),
	(2,2,14),
	(3,3,8),
	(4,4,9),
	(5,5,6),
	(6,6,13),
	(7,8,11),
	(8,9,11),
	(9,10,1),
	(10,11,2),
	(11,12,12),
	(12,13,5),
	(13,14,7),
	(14,15,13),
	(15,16,3),
	(16,16,4),
	(17,17,2),
	(18,7,15);

/*!40000 ALTER TABLE `junc_grape` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table junc_region
# ------------------------------------------------------------

DROP TABLE IF EXISTS `junc_region`;

CREATE TABLE `junc_region` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wines_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `junc_region` WRITE;
/*!40000 ALTER TABLE `junc_region` DISABLE KEYS */;

INSERT INTO `junc_region` (`id`, `wines_id`, `region_id`)
VALUES
	(1,1,12),
	(2,2,1),
	(3,3,9),
	(4,4,10),
	(5,5,8),
	(6,6,5),
	(7,7,13),
	(8,8,13),
	(9,9,13),
	(10,10,11),
	(11,11,2),
	(12,12,7),
	(13,13,6),
	(14,14,7),
	(15,15,5),
	(16,16,4),
	(17,17,2);

/*!40000 ALTER TABLE `junc_region` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table region_country
# ------------------------------------------------------------

DROP TABLE IF EXISTS `region_country`;

CREATE TABLE `region_country` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `region` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `region_country` WRITE;
/*!40000 ALTER TABLE `region_country` DISABLE KEYS */;

INSERT INTO `region_country` (`id`, `region`, `country`)
VALUES
	(1,'Alsace','France'),
	(2,'New York','USA'),
	(3,'Somerset','UK'),
	(4,'Campania','Italy'),
	(5,'Sicily','Italy'),
	(6,'Barolo','Italy'),
	(7,'Loire','France'),
	(8,'Penedes','Spain'),
	(9,'Jura','France'),
	(10,'Reggio-Emilia','Italy'),
	(11,'Nelson','New Zealand'),
	(12,'Hegymagas','Hungary'),
	(13,'Lazio','Italy');

/*!40000 ALTER TABLE `region_country` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table styles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `styles`;

CREATE TABLE `styles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `flavour_body` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table wines
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wines`;

CREATE TABLE `wines` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `blurb` varchar(255) DEFAULT NULL,
  `producer` varchar(255) DEFAULT NULL,
  `region_country` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `colour` varchar(255) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `wines` WRITE;
/*!40000 ALTER TABLE `wines` DISABLE KEYS */;

INSERT INTO `wines` (`id`, `name`, `blurb`, `producer`, `region_country`, `image`, `colour`, `style`)
VALUES
	(1,'Aries Reisling 2017','Floral, creamy, impressivly taut riesling good enough to age','Bencze Birtok',NULL,'BirtokAries.jpg',NULL,NULL),
	(2,'Tout Terriblement Maceration 2019','Classy gewurtz left on the skins','Domaine Brand',NULL,'BrandTerriblement-3.jpg',NULL,NULL),
	(3,'Chardonnay 2018','Creamy, nutty, lightly oxidative Chardonnay from the Jura, with 6 month sous voile','Chevassu-Fassenet',NULL,'ChevassuFassenetSousVoile2.jpg',NULL,NULL),
	(4,'Cinque Campi Rosso 2019','Spritzy blackcurrant party juice','Cinque Campi',NULL,'CinqueCampo-2.jpg',NULL,NULL),
	(5,'Perill Blanc Àmfora 2018','Zingy white aged for 6 months in clay','Clos Lentiscus',NULL,'ClosLentiscus.jpg',NULL,NULL),
	(6,'Munjebel Rosso 2019','Entry-level glouglou red from the undisputed king of natural wine','Frank Cornellisen',NULL,'MunjebelRosso-2.jpg',NULL,NULL),
	(7,'Rosato 2019','Potentially the world\'s greatest rosato right now','La Coste',NULL,'LeCosteRosato.jpg',NULL,NULL),
	(8,'Rosso R 2015','Serious, complex, racy sangiovese from a pre-eminent natural producer','La Coste',NULL,'LeCosteRossoR-2.jpg',NULL,NULL),
	(9,'Lot 20 2016','Mature sangiovese made from an ancient local strain of sangiovese, Greghetto, on 50 year-old vines','La Coste',NULL,'LeCosteLot20-2.jpg',NULL,NULL),
	(10,'Don Pinot Noir 2018','Rounder, more intense pinot that still retains charateristic lightness of touch','Alex Craighead Wines',NULL,'CraigheadDon-2.jpg',NULL,NULL),
	(11,'Albee Hill 19','Annual orchard blend articulating the year\'s harvest - one of the most complex, refined ciders in the world','Eve\'s Cidery',NULL,'AlbeeHill-2.jpg',NULL,NULL),
	(12,'La Solera NV','Sweet wine made in the traditional local style of continually topping up the barrel','Garovin',NULL,'Solera.jpg',NULL,NULL),
	(13,'Barolo Serralunga D\'Alba 2017','Exciting young producer who secured the appellation whilst experimenting with natural methods','Fernando Principiano',NULL,'PrincipianoBarolo.jpg',NULL,NULL),
	(14,'Sancerre Akmenine 2015','Unique Sancerre from a renegade producer - extended time on the skins for serious complexity','Sebastien Riffault',NULL,'RiffaultSancerre.jpg',NULL,NULL),
	(15,'VigoRosa 2019','Pure volcanic rosato, full of minerality and spine but light and supple','Fattorie Romeo del Castello',NULL,'VigoRosa-2.jpg',NULL,NULL),
	(16,'Lunedi Rosato 2019','An orange rose, red skins removed and white added in - moreish, complex summer boozer','Vigneti Tardis',NULL,'TardisLunedi.jpg',NULL,NULL),
	(17,'Run Deep 2019','Orchard blend, made from apples chosen for their ability to stand up to a 9 month aging process in red wine barrels - tannic and rich','Wilding Cider',NULL,'RunDeep-2.jpg',NULL,NULL);

/*!40000 ALTER TABLE `wines` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
