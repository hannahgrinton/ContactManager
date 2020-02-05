-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: dbContact
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Table structure for table `tblContacts`
--

DROP TABLE IF EXISTS `tblContacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblContacts` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `firstname` char(20) DEFAULT NULL,
  `surname` char(20) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `email` char(40) DEFAULT NULL,
  `address` char(40) DEFAULT NULL,
  `city` char(20) DEFAULT NULL,
  `province` char(3) DEFAULT NULL,
  `postal` char(7) DEFAULT NULL,
  `birthday` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblContacts`
--

LOCK TABLES `tblContacts` WRITE;
/*!40000 ALTER TABLE `tblContacts` DISABLE KEYS */;
INSERT INTO `tblContacts` VALUES (1,'Marcia','Pierce','1-799-342-9361','vel@Inornare.edu','P.O. Box 861 1385 Consequat Rd.','Pottsville','MB','A6U 7T4','1963-11-22'),(2,'Ivy','Kramer','1-437-867-1282','aliquet.libero@pedemalesuadavel.org','346-4462 Suspendisse Ave','Nenana','NL','B1J 8N8','1968-04-12'),(3,'Fitzgerald','Shepard','1-206-777-0595','magnis.dis.parturient@Cras.ca','P.O. Box 380 5309 Amet Avenue','Kennewick','ON','S5H 2I6','1961-03-21'),(4,'Amaya','Jackson','1-762-542-0380','Fusce@utaliquam.ca','P.O. Box 121 3581 Purus Avenue','Richland','MB','R2Q 9T6','1974-09-13'),(5,'Jarrod','Huber','1-469-899-2702','consectetuer.cursus.et@Praesent.edu','P.O. Box 419 4348 Elit. Ave','Falls Church','MB','I5Z 1F4','1983-05-30'),(6,'Kirestin','Mcmahon','1-244-146-8495','lacus@mollis.edu','328-5079 Felis St.','Milford','BC','R5A 9X5','1969-08-05'),(7,'Julian','Ayers','1-191-550-8469','sed.consequat@rutrum.org','7403 Mollis. Av.','Kalispell','YT','Q7J 5O9','1974-04-29'),(8,'Akeem','Mcfadden','1-997-457-2031','Integer.tincidunt@sit.org','271-3230 Porttitor Av.','Kalamazoo','NT','C1P 6X6','1975-10-28'),(9,'Dana','Snow','1-592-165-0075','Fusce@nectempus.com','Ap #790-6746 Tellus Street','Agawam','NT','L3S 4X9','1972-08-09'),(10,'Colleen','Hutchinson','1-945-606-6717','Suspendisse.sagittis.Nullam@Innec.edu','3896 Nunc Ave','Pembroke Pines','NT','V4M 2J4','1974-09-11'),(11,'Hyatt','Sanchez','1-483-989-6613','libero@nislMaecenasmalesuada.edu','P.O. Box 922 7698 Sed St.','Las Cruces','AB','M1N 8M9','1972-01-06'),(12,'Madison','Stevenson','1-898-794-3086','Donec.consectetuer.mauris@morbi.edu','P.O. Box 872 6306 Donec St.','Brigham City','NT','L5K 9L0','1966-06-14'),(13,'Roanna','Downs','1-969-912-9999','ac.sem@duinectempus.edu','7691 Rhoncus Av.','Warwick','NB','S2X 6Q9','1967-10-30'),(14,'Isaiah','Stevens','1-918-821-7207','fringilla.porttitor.vulputate@malesuadaI','6132 Erat Road','Gatlinburg','BC','U5T 4D6','1956-08-25'),(15,'Sonia','Ayers','1-598-429-1498','lectus@acmi.ca','Ap #990-5463 Maecenas St.','Rosemead','NL','W2Z 1U8','1971-10-31'),(16,'Alexis','Gilmore','1-886-188-5867','mauris.sit.amet@penatibuset.org','Ap #412-1054 Nonummy Street','Temecula','PE','W6S 6L7','1977-10-25'),(17,'Zoe','England','1-663-558-3161','auctor.Mauris@nonlobortisquis.edu','279-4028 Erat. Rd.','Beverly','QC','M8P 9P6','1976-12-03'),(18,'Charde','Dunn','1-357-831-9923','urna@sem.edu','304-5920 Tellus Rd.','Chesapeake','NL','F2N 8T7','1976-04-16'),(19,'Avye','Barron','1-388-698-5126','Nullam@ligulaAeneangravida.com','Ap #915-7949 Donec Rd.','West Allis','NT','P9Z 4R0','1974-05-07'),(20,'Hamish','Taylor','1-924-809-0362','auctor.odio.a@duinec.ca','Ap #125-7692 Duis Av.','Caguas','NT','K9B 1Z4','1982-10-05'),(21,'Wesley','Todd','1-647-738-0019','arcu.Vestibulum@nostra.ca','7226 Diam Avenue','Bellflower','NT','V6V 8O2','1980-05-31'),(22,'Samson','Huber','1-922-760-7616','tincidunt@laoreetlectusquis.ca','4685 Vitae Road','Kennesaw','NB','D7B 1F3','1966-12-12'),(23,'Samson','Ochoa','1-309-979-6313','risus.Donec@arcu.ca','3081 Iaculis Road','San Clemente','MB','H1C 3I4','1967-05-28'),(24,'Blair','Yang','1-619-688-2205','Mauris.quis.turpis@metusfacilisis.edu','7557 Eu St.','Thousand Oaks','BC','L3Z 7O4','1982-11-30'),(25,'Roary','Martin','1-194-683-8143','et.ipsum.cursus@Morbiquisurna.org','Ap #261-7127 Lectus Av.','Sioux Falls','NL','P6Z 2A7','1960-07-18'),(26,'Owen','Boyer','1-727-655-7997','lacus.varius@urnasuscipit.com','967-7532 Molestie. Avenue','Somerville','NU','F9Q 3T3','1982-11-08'),(27,'Forrest','Landry','1-601-259-0565','Aliquam.nec@Vestibulumanteipsum.com','529-760 Primis Street','Turlock','NS','M2J 3M6','1966-06-07'),(28,'Palmer','Barrera','1-781-382-8482','Donec.consectetuer@nuncullamcorpereu.com','2655 Augue Street','Cleveland','NL','U9Q 1J3','1970-04-25'),(29,'Piper','Higgins','1-165-448-1964','ut.pellentesque@Nullamenim.org','866-9924 Magna. Av.','Rye','ON','N9P 9G3','1971-06-03'),(30,'Ferris','Ferrell','1-986-568-4320','fringilla.ornare@Phasellusat.com','P.O. Box 453 3973 Nulla Rd.','Racine','ON','P5D 8W4','1957-02-11'),(31,'Bryar','Steele','1-473-168-3889','ut.nulla@mollis.ca','P.O. Box 216 6350 In Avenue','Valparaiso','BC','Q1J 5M5','1972-10-29'),(32,'Haley','Small','1-379-952-7322','semper.et.lacinia@velit.edu','P.O. Box 653 8648 Dolor. Avenue','Fontana','NS','N7L 1H8','1971-10-05'),(33,'Sonia','Marquez','1-574-102-4243','ante.Nunc@pharetra.org','P.O. Box 832 2365 Pede. Avenue','Paducah','MB','Z6F 3K0','1964-07-10'),(34,'Robert','Tyson','1-829-944-2978','auctor.nunc@Sedeu.org','Ap #738-9722 Lobortis Street','Port St. Lucie','SK','L4Y 8L7','1964-11-04'),(35,'Pascale','Flowers','1-172-514-4820','sodales.elit@rhoncus.com','3950 In Av.','Mission Viejo','SK','H9E 2J9','1978-01-06'),(36,'Sophia','Nixon','1-958-472-8658','sed@ametnullaDonec.org','Ap #810-427 Tincidunt Rd.','Jersey City','NL','H5W 6K7','1960-05-11'),(37,'Ferris','Gonzalez','1-317-146-6049','tortor.nibh@posuerevulputate.ca','Ap #124-9508 Posuere Rd.','Alhambra','NL','U5Y 2G2','1983-01-12');
/*!40000 ALTER TABLE `tblContacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblLogin`
--

DROP TABLE IF EXISTS `tblLogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblLogin` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblLogin`
--

LOCK TABLES `tblLogin` WRITE;
/*!40000 ALTER TABLE `tblLogin` DISABLE KEYS */;
INSERT INTO `tblLogin` VALUES (1,'test','$2y$10$3iIbnS884KzxgTfPajB.yOZuyFk6dAQ103J9ENAsL1qrGXFGRQhqy');
/*!40000 ALTER TABLE `tblLogin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-04 22:24:46
