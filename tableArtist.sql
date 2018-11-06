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
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `favorite` tinyint(1) DEFAULT '0',
  `local` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES (1,'Majnun','http://www.magcentre.fr/wp-content/uploads/2014/06/P1030989-e1404076650105-225x300.jpg',1,1),(2,'Seisme','https://scontent-cdt1-1.xx.fbcdn.net/v/t1.0-9/13502078_610279879134210_8221757383244655732_n.jpg?_nc_cat=108&_nc_ht=scontent-cdt1-1.xx&oh=2c75c7696108906954f20f19fd4e46c4&oe=5C3E48B9',0,0),(3,'Aly Diop','https://makeitmooovecom.files.wordpress.com/2018/06/img_6733_nb.jpg?w=1088',1,1),(4,'Mary L\'asterisk','https://cdn-s-www.leprogres.fr/images/0c785393-d2cd-4b95-9ce3-9b22f693f2bc/BES_06/illustration-mary-l-asterisk_1-1526486031.jpg',1,0),(5,'Jartel','https://image1.larep.fr/photoSRC/VVNUJ1paUTgIBhVOCRAHHQ4zRSkXaldfVR5dW1sXVA49/3346156.jpeg',0,0),(6,'UPSEEN','https://www.labellevilloise.com/wp-content/uploads/2016/03/UPSEEN-762x675.png',1,0),(7,'Frantz Rothe','http://www.dnn.de/var/storage/images/dnn/kultur/kultur-news/franz-rothe-laesst-sich-von-der-welt-inspirieren/532549628-1-ger-DE/Franz-Rothe-laesst-sich-von-der-Welt-inspirieren_big_teaser_article.jpg',1,1),(8,'Remila lee','https://d3v4jsc54141g1.cloudfront.net/uploads/project/avatar/56625/large_kissbaniere-1441369245-1441369266.jpg',1,1),(9,'Sadya','https://scontent-cdt1-1.xx.fbcdn.net/v/t1.0-9/15439806_1233773083348484_6043432947354968506_n.jpg?_nc_cat=100&_nc_ht=scontent-cdt1-1.xx&oh=a2d732ff5fdbf74c8bd2ee18880fc69f&oe=5C4F98B5',0,1),(10,'Sei Sei','http://www.javapop.fr/ressources/img/videos/14608940_1287207221290902_4705905733827265966_o.jpg',1,0),(11,'Remy Alcaraz','http://fracama.org/upload/pole/uwjdrZNM7w.jpg',0,0),(12,'Elio Camalle','https://cdn.radiofrance.fr/s3/cruiser-production/2017/09/35688311-b399-40bb-839c-1dfedc5712fd/870x489_elio-camalle.jpg',0,0),(13,'Lou Di Franco','https://cdn-s-www.bienpublic.com/images/8603AD86-6F22-40A1-9CD0-F2B29290CB3F/LBP_v1_02/lou-di-franco-sort-son-premier-ep-a-la-fin-du-mois-de-janvier-photo-stephane-kerrad-kb-studios-1462194398.jpg',1,0),(14,'C-Hope','http://fracama.org/upload/pole/0GfuNJSabq.jpg\n',0,0),(15,'Orielo','http://www.javapop.fr/ressources/img/photo_007.JPG\n',1,1),(16,'ANGE','http://img.over-blog-kiwi.com/1/02/92/67/20170621/ob_047464_w-p3256025-ange-minkala-samuel-archamb.JPG',0,1);
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-06 15:05:14
