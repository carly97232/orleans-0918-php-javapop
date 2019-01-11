-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: bdd_javapop
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `drink`
--

DROP TABLE IF EXISTS `drink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `ingredients` text,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_drink_type1_idx` (`type_id`),
  CONSTRAINT `fk_drink_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drink`
--

LOCK TABLES `drink` WRITE;
/*!40000 ALTER TABLE `drink` DISABLE KEYS */;
INSERT INTO `drink` VALUES (1,'Super Bock',NULL,2),(2,'Leffe',NULL,1),(3,'Corona',NULL,2),(4,'Krick Cerise',NULL,2),(5,'Leffe Royal',NULL,1),(6,'Hoegarden Rosé',NULL,1),(7,'Punch Maison','Rhum, Jus de fruits',3),(8,'Boney M','Bacardi 4cl, Lait de coco, Curacao, Jus d\'ananas',3),(9,'Piña Colada','Bacardi 4cl, Lait Coco, Ananas, Chantilly',3),(10,'Bailey\'s',NULL,4),(11,'KIR','Mûre, Pêche, Framboise, Cassis',4),(12,'Poire d\'Olivet',NULL,4),(13,'Vin du jour','Rouge, Blanc, Rosé',5),(14,'Reuilly','Rouge, Blanc, Rosé',5),(15,'Merlot','Rouge',5),(16,'Leffe',NULL,1),(17,'Mojito Royal','Bacardi 4cl, Citron vert, Sucre, Menthe, Pétillant, Glace',4);
/*!40000 ALTER TABLE `drink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drink_has_volume`
--

DROP TABLE IF EXISTS `drink_has_volume`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drink_has_volume` (
  `drink_id` int(11) NOT NULL,
  `volume_id` int(11) NOT NULL,
  `prix` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`drink_id`,`volume_id`),
  KEY `fk_drink_has_volume_volume1_idx` (`volume_id`),
  KEY `fk_drink_has_volume_drink_idx` (`drink_id`),
  CONSTRAINT `fk_drink_has_volume_drink` FOREIGN KEY (`drink_id`) REFERENCES `drink` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drink_has_volume`
--

LOCK TABLES `drink_has_volume` WRITE;
/*!40000 ALTER TABLE `drink_has_volume` DISABLE KEYS */;
INSERT INTO `drink_has_volume` VALUES (1,1,4),(2,1,4),(3,2,6),(4,1,5),(5,1,4),(6,1,4),(7,4,5),(8,6,9),(9,6,9),(10,6,6),(11,7,4),(12,6,7),(13,4,4),(14,4,5),(15,4,5),(16,3,5),(17,8,10);
/*!40000 ALTER TABLE `drink_has_volume` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `comment` text,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'SLAM','Scène ouverte à tous','2017-11-29'),(2,'HINAME','Hinamé aurait pu être un pirate, celui qui contre vents et marées écrit des histoires et les change en chansons. Un jeune vagabonds aux longs cours qui, par la finesse de ses mots et de sa voix, vous emmène en voyage. Un voyage entre rythmes calmes et orageux, toujours rempli de mélodies fines, aux influences parfois ethniques. ','2017-12-03'),(3,'IRVING RHINGO','A découvrir. Guitariste chanteur du groupe UPSEEN','2017-12-10'),(4,'MARIE L*ASTERISK','Rythme groovy, phrasé soul hip hop, ambinaces trip hop, accents d\'Afrique dans le chant. Mary L*Asterisk est ce mélange délicieusement épicé, à la fois étonnant et étonnant!','2017-12-17'),(5,'BRAHIM','Pionnier de la scène reggae francophone, Brahim a bercé et inspiré toute une génération élevée aux soundsystems. C\'est d\'ailleurs comme ça qu\'il a tracé son chemin: écumant les scènes undergrounds de paris, de province avec la Wadada Sound System dans les années 90. Brahim a pris ses marques et travaillé au succés de son premier album. ','2017-05-19'),(6,'VOLO','Volo est un duo de frères: Frédéric et Olivier VoloVITCH. Avec un nom de famille qui leur vinet d eleur arrière grand père Ukrainien, nés au milieu d\'une fratrie de 4 enfants, ils grandissent dans la campagne tourangelle dans une famille de profs.  ','2017-05-21'),(7,'YAVANA',NULL,'2017-05-17'),(8,'JAVA JAM SESSION',NULL,'2017-05-28'),(9,'SLAM BY ANGE MINKALA','Passionné par les mots depuis toujours, Ange Minkala a découvert le slam grâce à des artistes tels que Grand corps malade, Abd Al Malik et Souleymane Diamonko. Il s\'est alors rendu compte que les mots qu\'il gardait dasn ses cahiers pouvaient être déclamés face à un public. C\'est en 2019 qu\'il se rend à sa première scène ouverte de slam sur Orléans. Après avoir pris son courage à deux mains, il monte pour la première fois sur scene. ','2017-05-31'),(10,'THEO','Théo, chanteur comédien et poète quitte son costume de Chat Fume pour démarrer un nouveau projet solo avec des musiciens rencontrés sur la route. ','2017-04-28'),(11,'MAELIG','Maelig Charlery, l\'étoile montante de la pop-sou. Après avoir remporté haut la main le festival jeune talents de la ville de Meaux en Octobre dernier ou il fait preuve d\'une aisance scénique et d\'un charisme sans précédent, Maelig s\'attaque maintenant à l\'enregistrement de son futur EP. ','2017-04-14'),(12,'Soirée au pif','Soirée hazardeuse','2030-04-14'),(13,'Super soirée','hah','2020-05-15'),(14,'Tous en short','Tout le monde en short','2020-08-08');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'test1'),(2,'test2'),(3,'paul'),(4,'test');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imgName` varchar(145) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
INSERT INTO `picture` VALUES (172,'1.jpg'),(173,'2.jpg'),(174,'3.jpg'),(175,'4.jpg'),(176,'5.jpg'),(177,'6.jpg'),(178,'7.jpg'),(179,'8.jpg'),(181,'10.jpg'),(182,'11.jpg'),(183,'12.jpg'),(184,'13.jpg'),(186,'15.jpg');
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plus`
--

DROP TABLE IF EXISTS `plus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plus`
--

LOCK TABLES `plus` WRITE;
/*!40000 ALTER TABLE `plus` DISABLE KEYS */;
/*!40000 ALTER TABLE `plus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'biere pression'),(2,'biere bouteille'),(3,'cocktail'),(4,'alcool fort'),(5,'vin');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volume`
--

DROP TABLE IF EXISTS `volume`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `volume` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volume`
--

LOCK TABLES `volume` WRITE;
/*!40000 ALTER TABLE `volume` DISABLE KEYS */;
INSERT INTO `volume` VALUES (1,'25 cl'),(2,'33 cl'),(3,'50 cl'),(4,'12 cl'),(5,'75 cl'),(6,'4 cl'),(7,'13 cl'),(8,'un verre'),(9,'la bouteille');
/*!40000 ALTER TABLE `volume` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-06 14:58:11
