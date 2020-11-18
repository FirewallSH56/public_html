# Host: 127.0.0.1  (Version 5.5.5-10.4.11-MariaDB)
# Date: 2020-05-23 18:50:26
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "cata_categories"
#

DROP TABLE IF EXISTS `cata_categories`;
CREATE TABLE `cata_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

#
# Data for table "cata_categories"
#

INSERT INTO `cata_categories` VALUES (9,'Mega Rares','Los Rares mas exclusivos'),(10,'LTD','CAC');

#
# Structure for table "cata_rares"
#

DROP TABLE IF EXISTS `cata_rares`;
CREATE TABLE `cata_rares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

#
# Data for table "cata_rares"
#

INSERT INTO `cata_rares` VALUES (10,'CAA','https://i.imgur.com/uZepcsf.gif','141','9'),(11,'1','https://i.imgur.com/aDEfNI0.png','1','10');

#
# Structure for table "cms_comments"
#

DROP TABLE IF EXISTS `cms_comments`;
CREATE TABLE `cms_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(999) DEFAULT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `new_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "cms_comments"
#

INSERT INTO `cms_comments` VALUES (17,'Onekeko','caca',1584505881,11),(19,'Onekeko','ASDASD',1588912006,2),(20,'Onekeko','ASDASDA',1588912008,2),(21,'Onekeko','<b>CACACA</b>',1589328080,10),(22,'Onekeko','<i>Probando bla bla bla bla</i>',1589341706,10);

#
# Structure for table "cms_events"
#

DROP TABLE IF EXISTS `cms_events`;
CREATE TABLE `cms_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `fecha_end` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

#
# Data for table "cms_events"
#

INSERT INTO `cms_events` VALUES (6,'Sillas Lokas','Juega con las sillas y gana','Onekeko','17/03/2020 ',3,'19/03/2020'),(7,'segunda prueba','123','Onekeko','23123',123,'123');

#
# Structure for table "cms_mantenimiento"
#

DROP TABLE IF EXISTS `cms_mantenimiento`;
CREATE TABLE `cms_mantenimiento` (
  `id` int(11) unsigned NOT NULL,
  `mantenimiento` enum('0','1') DEFAULT '0',
  `motivo` longtext NOT NULL,
  `dia` varchar(255) NOT NULL,
  `getuser` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "cms_mantenimiento"
#

/*!40000 ALTER TABLE `cms_mantenimiento` DISABLE KEYS */;
INSERT INTO `cms_mantenimiento` VALUES (1,'1','El Hotel se encuentra en fase beta por lo cual estamos terminando unos detalles para que tu experiencia en el hotel sea la mejor, esto no durara mucho, ten paciencia.\t\t\t\t\t\t\t\t\t\t\t\t','1584749888','Onekeko');
/*!40000 ALTER TABLE `cms_mantenimiento` ENABLE KEYS */;

#
# Structure for table "cms_menu"
#

DROP TABLE IF EXISTS `cms_menu`;
CREATE TABLE `cms_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

#
# Data for table "cms_menu"
#

INSERT INTO `cms_menu` VALUES (1,'HOME','/home'),(2,'COMUNIDAD',NULL),(3,'Fotos','/photos'),(4,'Equipo Staff','/staff'),(5,'Contribuyentes','/contributors'),(6,'Top','/leaderboard'),(7,'TIENDA',NULL),(8,'Membresias VIP','/vip'),(9,'Banco','/banco'),(10,'Mi Historial','/history'),(11,'RARES','/values');

#
# Structure for table "cms_news"
#

DROP TABLE IF EXISTS `cms_news`;
CREATE TABLE `cms_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(999) DEFAULT NULL,
  `textshort` varchar(100) DEFAULT NULL,
  `content` varchar(999) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `image` varchar(999) DEFAULT NULL,
  `hastag` varchar(300) DEFAULT NULL,
  `categoria` enum('Campañas y Actividades','Anuncios') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Data for table "cms_news"
#

INSERT INTO `cms_news` VALUES (2,'¿Como vas?','CACA','caca','Onekeko',1584137896,'http://i.imgur.com/YK8ek.png','voteforzero','Campañas y Actividades'),(10,'Nueva CMS','CACA','caca','Onekeko',1584485568,'https://i.imgur.com/ctVLB.png',NULL,'Anuncios'),(11,'asdasdasd','asdas','<p>asdasd</p>\r\n','Onekeko',1588826175,'asdasd',NULL,'Campañas y Actividades');

#
# Structure for table "forum_categories"
#

DROP TABLE IF EXISTS `forum_categories`;
CREATE TABLE `forum_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

#
# Data for table "forum_categories"
#

INSERT INTO `forum_categories` VALUES (1,'Anuncios Oficiales','9'),(2,'¿Eres Nuevo? Presentate aquí...','1'),(3,'Ayuda y Soporte','1'),(4,'Quejas y Sugerencias','1'),(5,'Muestra tus mejores fotos','1');

#
# Structure for table "forum_post"
#

DROP TABLE IF EXISTS `forum_post`;
CREATE TABLE `forum_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

#
# Data for table "forum_post"
#

INSERT INTO `forum_post` VALUES (5,1,'¡Se aproxima nueva actualización al catalogo!','<h1>&iexcl;Nuevos Furnis se acercan al Hotel!</h1>\r\n\r\n<p>As&iacute; es, se aproxima una nueva actualizacion en la cual encontraras nuevos furnis, nueva ropa, nuevas herramientas en la cms<br />\r\nademas de que se abrira vacantes para formar parte del equipo staff del hotel.</p>\r\n','1589500108','Onekeko');

#
# Structure for table "forum_replies"
#

DROP TABLE IF EXISTS `forum_replies`;
CREATE TABLE `forum_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` int(11) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

#
# Data for table "forum_replies"
#

INSERT INTO `forum_replies` VALUES (2,1,'ADASD','1589418179','Onekeko'),(3,2,'<u>alavaerasdasdasd</u>','1589422570','Onekeko');
