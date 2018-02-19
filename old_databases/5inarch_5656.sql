-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: 5inarch
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `absall`
--

DROP TABLE IF EXISTS `absall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `absall` (
  `stid` tinyint(4) NOT NULL,
  `stname` tinyint(4) NOT NULL,
  `stmob` tinyint(4) NOT NULL,
  `sttel` tinyint(4) NOT NULL,
  `stparenttype` tinyint(4) NOT NULL,
  `stparentname` tinyint(4) NOT NULL,
  `stparentmob` tinyint(4) NOT NULL,
  `stemail` tinyint(4) NOT NULL,
  `staddress` tinyint(4) NOT NULL,
  `stnationalid` tinyint(4) NOT NULL,
  `styear` tinyint(4) NOT NULL,
  `stterm` tinyint(4) NOT NULL,
  `stgroup` tinyint(4) NOT NULL,
  `stbalance` tinyint(4) NOT NULL,
  `matid` tinyint(4) NOT NULL,
  `matname` tinyint(4) NOT NULL,
  `matyear` tinyint(4) NOT NULL,
  `matterm` tinyint(4) NOT NULL,
  `absid` tinyint(4) NOT NULL,
  `date` tinyint(4) NOT NULL,
  `students_stid` tinyint(4) NOT NULL,
  `material_matid` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absall`
--

LOCK TABLES `absall` WRITE;
/*!40000 ALTER TABLE `absall` DISABLE KEYS */;
/*!40000 ALTER TABLE `absall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `absence`
--

DROP TABLE IF EXISTS `absence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `absence` (
  `absid` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `students_stid` int(5) NOT NULL,
  `material_matid` int(4) NOT NULL,
  PRIMARY KEY (`absid`,`students_stid`,`material_matid`),
  KEY `fk_absence_students1_idx` (`students_stid`),
  KEY `fk_absence_material1_idx` (`material_matid`),
  CONSTRAINT `fk_absence_material1` FOREIGN KEY (`material_matid`) REFERENCES `material` (`matid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_absence_students1` FOREIGN KEY (`students_stid`) REFERENCES `students` (`stid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absence`
--

LOCK TABLES `absence` WRITE;
/*!40000 ALTER TABLE `absence` DISABLE KEYS */;
/*!40000 ALTER TABLE `absence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrators` (
  `adid` int(2) NOT NULL AUTO_INCREMENT,
  `adusername` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `adpassword` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES (1,'1','1');
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_setting`
--

DROP TABLE IF EXISTS `application_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_setting` (
  `id` int(11) NOT NULL,
  `course_price` int(11) DEFAULT NULL,
  `final_revision_price` int(11) DEFAULT NULL,
  `one_material_price` int(11) DEFAULT NULL,
  `revision_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_setting`
--

LOCK TABLES `application_setting` WRITE;
/*!40000 ALTER TABLE `application_setting` DISABLE KEYS */;
INSERT INTO `application_setting` VALUES (1,750,100,175,150);
/*!40000 ALTER TABLE `application_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `black_list_students`
--

DROP TABLE IF EXISTS `black_list_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `black_list_students` (
  `stid` int(5) DEFAULT NULL,
  `stcode` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `stname` varchar(25) CHARACTER SET utf8 DEFAULT '-',
  `stmob` varchar(25) CHARACTER SET utf8 DEFAULT '-',
  `sttel` varchar(11) CHARACTER SET utf8 DEFAULT '-',
  `stparenttype` varchar(15) CHARACTER SET utf8 DEFAULT '-',
  `stparentname` varchar(25) CHARACTER SET utf8 DEFAULT '-',
  `stparentmob` varchar(22) CHARACTER SET utf8 DEFAULT '-',
  `stemail` varchar(25) CHARACTER SET utf8 DEFAULT '-',
  `staddress` varchar(30) CHARACTER SET utf8 DEFAULT '-',
  `stnationalid` varchar(14) CHARACTER SET utf8 DEFAULT '-',
  `sttype` int(2) DEFAULT NULL,
  `sttype2` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `styear` varchar(15) CHARACTER SET utf8 DEFAULT '-',
  `stterm` varchar(15) CHARACTER SET utf8 DEFAULT '-',
  `stgroup` varchar(25) CHARACTER SET utf8 DEFAULT '-',
  `stbalance` varchar(15) CHARACTER SET utf8 DEFAULT '-',
  `archive_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `black_list_students`
--

LOCK TABLES `black_list_students` WRITE;
/*!40000 ALTER TABLE `black_list_students` DISABLE KEYS */;
INSERT INTO `black_list_students` VALUES (96,'','نيفين مجدى شفيق','01202747505','','','','	01210084105','','محرم بك','',1,'B','5','1','B','-550','5inarch_2018_term2'),(97,'','محمد سعيد ابو زيد','01285710461','','','','	01227363740','','عوبة محسن','',1,'B','4','1','B','-112.5','5inarch_2018_term2'),(116,'','نادين محمد اشرف','01280937473','','','','	01227607516','','فيكتوريا','29806018800407',1,'B','5','1','B','-500','5inarch_2018_term2'),(117,'','ندى مصطفى احمد ','01204426698','','','','	01205847658','','الهانوفيل','29808030200142',1,'B','5','1','B','-500','5inarch_2018_term2'),(120,'','خالد خميس محمد','01278503235','','','','	01010138010','','العصافرة','295053200997',2,'B','5','1','A','-300','5inarch_2018_term2'),(124,'','امنية سعيد عبد الباقى','0106316483','','','','	01276101801','','الاسكندرية','29507190201402',1,'B','3','1','B','-212.5','5inarch_2018_term2'),(134,'','الاء كمال علام','01008725196','','','','	01113870636','','','',1,'A','5','1','B','-375','5inarch_2018_term2'),(139,'','احمد سمير حسن','01288769261','','','','	01203649251','','الورديان','2950915200635',2,'B','5','1','B','-575','5inarch_2018_term2'),(148,'','بديع محمد عبد المنعم ','01278366991','','','','	034856249','','الجمرك','',2,'B','3','1','B','-112.5','5inarch_2018_term2'),(149,'','خالد السمان احمد','01201337879','','','','	','','العوايد','',2,'B','5','1','B','-400','5inarch_2018_term2'),(150,'','انجى عادل ابراهيم ','01278788180','','','','	034369651','','العجمى','29810040200363',1,'B','5','1','A','-500','5inarch_2018_term2'),(161,'','محمد كمال عيد ','01202510543','','','','	01210533984','','البيطاش','',1,'B','5','1','B','-600','5inarch_2018_term2'),(168,'','فايف ان ارك','01060555625','','','','	','','الابراهيمية','',1,'B','5','1','A','-750','5inarch_2018_term2'),(175,'','مصعب سعد ياسين','01200334328','','','','	01143224729','','ابو تلات','',2,'B','5','1','B','-212.5','5inarch_2018_term2'),(177,'','محمد شعبان عبد العزيز','01022855825','','','','	','','سيدى يشر','',2,'B','5','1','B','-750','5inarch_2018_term2'),(196,'','مصطفى رمضان','01201781391','','','','	5346815','','محرم بك','',2,'B','5','1','B','-250','5inarch_2018_term2'),(216,'','عمر صلاح رشاد','01281080425','','','','	','','محرم بك','',1,'B','5','1','B','-412.5','5inarch_2018_term2'),(217,'','احمد الشناوى','01114909594','','','','	01064959992','','العوايد','',1,'B','5','1','B','-262.5','5inarch_2018_term2'),(220,'','ايمان احمد السيد','01026443087','','','','	01003340934','','البيطاش','',1,'B','5','1','B','-402.5','5inarch_2018_term2'),(223,'','امنية عبد الرحيم','01155405400','','','','	01000654046','','','',1,'B','5','1','B','-300','5inarch_2018_term2'),(239,'','بيتر مكرم','01221461419','','','','	','','','',1,'A','5','1','B','-162.5','5inarch_2018_term2'),(263,'','حسام عبد الباسط','01278890712','','','','	','','','',2,'A','2','1','B','-150','5inarch_2018_term2'),(265,'','محمود حازم محمد','01207744330','','','','	','','','',2,'B','5','1','B','-275','5inarch_2018_term2'),(266,'','محمد قدرى احمد','0127401457','','','','	','','','',2,'B','5','1','B','-275','5inarch_2018_term2'),(280,'7','test1','897987','90870987','jh','kjh','	897','a@a.com','kj','897',1,'B','2','1','A','-750','5inarch_2018_term2'),(281,'7','test1','897987','90870987','jh','kjh','	897','a@a.com','kj','897',1,'A','2','1','A','-600','5inarch_2018_term2'),(287,'2','KLJ','987','897','kuj','iuiu','	898','a@a.com','kj','897',1,'B','3','2','B','-750','5inarch_2018_term2'),(289,'2','KLJ','987','897','kuj','iuiu','	898','a@a.com','kj','897',1,'C','3','2','B','-900','5inarch_2018_term2'),(290,'32','ttttttttttttttttt','87897','897','j','kj','	0987','9087','897','097',2,'A','2','2','B','-1050','5inarch_2018_term2'),(291,'32','ttttttttttttttttt','87897','897','j','kj','	0987','9087','897','097',2,'C','2','2','B','-6300','5inarch_2018_term2'),(292,'32','ttttttttttttttttt','87897','897','j','kj','	0987','9087','897','097',2,'D','2','2','B','-700','5inarch_2018_term2'),(293,'32','ttttttttttttttttt','87897','897','j','kj','	0987','9087','897','097',2,'D','1','2','B','-750','5inarch_2018_term2'),(1,'45','ttttttttttttttttt','65765','765765','uytut','uyg','	8','a@a.com','yuuy','765765',2,'A','3','2','A','-700','5inarch_5656'),(2,'45','ttttttttttttttttt','65765','765765','uytut','uyg','	8','a@a.com','yuuy','765765',2,'B','3','2','A','-750','5inarch_5656');
/*!40000 ALTER TABLE `black_list_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `exid` int(4) NOT NULL AUTO_INCREMENT,
  `exname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `exdesc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `excode` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`exid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (1,'سلفة','','m1'),(2,'محمول','','m2'),(3,'راتب','','m3'),(4,'تصوير','','m4'),(5,'طباعة','','m5'),(6,'مواصلات','','m6'),(7,'دعاية','','m7'),(8,'مكافأة','','m8'),(9,'أخرى','','m9'),(10,'أدوات مكتبية','','m10'),(12,'name','desc','m12'),(13,'klj','klj','m33');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `matid` int(4) NOT NULL AUTO_INCREMENT,
  `matname` varchar(45) CHARACTER SET utf8 NOT NULL,
  `matyear` varchar(15) CHARACTER SET utf8 NOT NULL,
  `matterm` varchar(15) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`matid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'مدخل إلى علم الأثار','1','first'),(2,'مقدمة في الأدب','1','first'),(3,'حفائر أثرية','1','first'),(4,'تاريخ اليونان ','1','first'),(5,'أثار بحر أيجة وأيطاليا','1','second'),(6,'أساطير ( أدب - فن )','1','second'),(7,'متاحف','1','second'),(8,'تاريخ فرعوني','1','second'),(9,'عمارة أغريقية','2','first'),(10,'نحت أغريقي','2','first'),(11,'فخار أغريقي','2','first'),(12,'تاريخ الرومان','2','first'),(13,'فن هللينستي ( عمارة -نحت )','2','second'),(14,'عملة أغريقية وهللينستية','2','second'),(15,'تاريخ هللينستي','2','second'),(16,'أثار فرعونية','2','second'),(17,'عمارة رومانية','3','first'),(18,'نحت روماني','3','first'),(19,'فخار روماني وقبطي','3','first'),(20,'مساحة مستوية','3','first'),(21,'تاريخ أمبراطورية رومانية مبكرة','3','first'),(22,'رسم وفسيفساء','3','second'),(23,'عملة رومانية وبيزنطية','3','second'),(24,'أثار أسلامية','3','second'),(25,'فن ولايات رومانية','3','second'),(26,'تاريخ مصر تحت حكم الأمبراطورية الرومانية','3','second'),(27,'أثار أسكندرية والدلتا 1','4','first'),(28,'أثار مصر في العصرين اليوناني والروماني','4','first'),(29,'تاريخ أمبراطورية رومانية متأخرة ','4','first'),(30,'حضارة أسكندرية ','4','first'),(31,'أثار بحرية وغارقة','4','first'),(32,'أثار أسكندرية والدلتا 2','4','second'),(33,'ترميم ','4','second'),(34,'أثار بيزنطية وقبطية','4','second'),(35,'أثار الوطن العربي في العصرين','4','second'),(36,'فنون صغرى','4','second');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prmat`
--

DROP TABLE IF EXISTS `prmat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prmat` (
  `prmatid` int(11) NOT NULL AUTO_INCREMENT,
  `professors_prid` int(4) NOT NULL,
  `material_matid` int(4) NOT NULL,
  PRIMARY KEY (`prmatid`,`professors_prid`,`material_matid`),
  KEY `fk_prmat_professors1_idx` (`professors_prid`),
  KEY `fk_prmat_material1_idx` (`material_matid`),
  CONSTRAINT `fk_prmat_material1` FOREIGN KEY (`material_matid`) REFERENCES `material` (`matid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_prmat_professors1` FOREIGN KEY (`professors_prid`) REFERENCES `professors` (`prid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prmat`
--

LOCK TABLES `prmat` WRITE;
/*!40000 ALTER TABLE `prmat` DISABLE KEYS */;
INSERT INTO `prmat` VALUES (93,1,4),(94,1,12),(95,1,14),(96,1,15),(97,1,21),(98,1,26),(65,2,1),(66,2,5),(67,2,9),(68,2,13),(69,2,17),(70,2,22),(71,2,27),(72,2,28),(73,2,32),(74,2,33),(99,3,31),(100,3,35),(101,3,3),(102,3,7),(84,5,2),(85,5,6),(86,5,8),(87,5,16),(88,5,19),(89,5,20),(90,5,25),(91,5,34),(92,5,29);
/*!40000 ALTER TABLE `prmat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prmatall`
--

DROP TABLE IF EXISTS `prmatall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prmatall` (
  `prname` tinyint(4) NOT NULL,
  `prmob` tinyint(4) NOT NULL,
  `prtel` tinyint(4) NOT NULL,
  `prparentname` tinyint(4) NOT NULL,
  `premail` tinyint(4) NOT NULL,
  `prparentmob` tinyint(4) NOT NULL,
  `prbalance` tinyint(4) NOT NULL,
  `matyear` tinyint(4) NOT NULL,
  `matterm` tinyint(4) NOT NULL,
  `prid` tinyint(4) NOT NULL,
  `matid` tinyint(4) NOT NULL,
  `matname` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prmatall`
--

LOCK TABLES `prmatall` WRITE;
/*!40000 ALTER TABLE `prmatall` DISABLE KEYS */;
/*!40000 ALTER TABLE `prmatall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professors`
--

DROP TABLE IF EXISTS `professors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professors` (
  `prid` int(4) NOT NULL AUTO_INCREMENT,
  `prname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prmob` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `prtel` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `prparentname` varchar(25) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `prparentmob` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `premail` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `prbalance` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `professorsappid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `professorsapppw` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `professorsrole` int(11) NOT NULL,
  PRIMARY KEY (`prid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professors`
--

LOCK TABLES `professors` WRITE;
/*!40000 ALTER TABLE `professors` DISABLE KEYS */;
INSERT INTO `professors` VALUES (1,'عاصم محمد علي','01005551545','01280670145','محمد علي','01226114497','assem.mo.ali@gmail.com','2000','assem','Five@2020',3),(2,'حسام الدين مصطفي السيد','01099663014','035367322','والدة حسام','01274499951','hossam.stam08@gmail.com','3000','1','1',1),(3,'محمد عاطف الحويطي','01272036763','','عاطف الحويطي','01222513024','-','2500','mohamed','2020',3),(4,'اسلام منصور عبد الهادي','01274175461','','والدة اسلام','01289356956','-','3000','','',3),(5,'محمود أحمد ','01122018162','','','','','1750','wolf','dite',3),(6,'محمد محمد بدر','01009369402','035176473','والدة محمد','01005307468','-','2500','2','2',2);
/*!40000 ALTER TABLE `professors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professors_payroll`
--

DROP TABLE IF EXISTS `professors_payroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professors_payroll` (
  `id` int(11) NOT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `professors_payrollcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professors_payroll`
--

LOCK TABLES `professors_payroll` WRITE;
/*!40000 ALTER TABLE `professors_payroll` DISABLE KEYS */;
/*!40000 ALTER TABLE `professors_payroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stmat`
--

DROP TABLE IF EXISTS `stmat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stmat` (
  `stmatid` int(10) NOT NULL AUTO_INCREMENT,
  `material_matid` int(4) NOT NULL,
  `students_stid` int(5) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`stmatid`,`material_matid`,`students_stid`),
  KEY `fk_stmat_material1_idx` (`material_matid`),
  KEY `fk_stmat_students1_idx` (`students_stid`),
  CONSTRAINT `fk_stmat_material1` FOREIGN KEY (`material_matid`) REFERENCES `material` (`matid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_stmat_students1` FOREIGN KEY (`students_stid`) REFERENCES `students` (`stid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stmat`
--

LOCK TABLES `stmat` WRITE;
/*!40000 ALTER TABLE `stmat` DISABLE KEYS */;
INSERT INTO `stmat` VALUES (1,1,1,1),(2,2,1,1),(3,3,1,1),(4,4,1,1),(5,1,2,1),(6,2,2,1),(7,3,2,1),(8,4,2,1),(9,1,3,1),(10,2,3,1),(11,3,3,1),(12,4,3,1),(13,1,4,1),(14,2,4,1),(15,3,4,1),(16,4,4,1);
/*!40000 ALTER TABLE `stmat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stmatall`
--

DROP TABLE IF EXISTS `stmatall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stmatall` (
  `stname` tinyint(4) NOT NULL,
  `stmob` tinyint(4) NOT NULL,
  `styear` tinyint(4) NOT NULL,
  `stterm` tinyint(4) NOT NULL,
  `stgroup` tinyint(4) NOT NULL,
  `stbalance` tinyint(4) NOT NULL,
  `matname` tinyint(4) NOT NULL,
  `matid` tinyint(4) NOT NULL,
  `matyear` tinyint(4) NOT NULL,
  `matterm` tinyint(4) NOT NULL,
  `sttel` tinyint(4) NOT NULL,
  `stparenttype` tinyint(4) NOT NULL,
  `stparentname` tinyint(4) NOT NULL,
  `stparentmob` tinyint(4) NOT NULL,
  `stemail` tinyint(4) NOT NULL,
  `staddress` tinyint(4) NOT NULL,
  `stnationalid` tinyint(4) NOT NULL,
  `stid` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stmatall`
--

LOCK TABLES `stmatall` WRITE;
/*!40000 ALTER TABLE `stmatall` DISABLE KEYS */;
/*!40000 ALTER TABLE `stmatall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `stid` int(5) NOT NULL AUTO_INCREMENT,
  `stcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stname` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `stmob` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `sttel` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `stparenttype` varchar(15) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `stparentname` varchar(25) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `stparentmob` varchar(22) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `stemail` varchar(25) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `staddress` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `stnationalid` varchar(14) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `sttype` int(2) NOT NULL,
  `sttype2` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `styear` varchar(15) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `stterm` varchar(15) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `stgroup` varchar(25) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  `stbalance` varchar(15) CHARACTER SET utf8 NOT NULL DEFAULT '-',
  PRIMARY KEY (`stid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'45','ttttttttttttttttt','65765','765765','uytut','uyg','	8','a@a.com','yuuy','765765',2,'A','3','2','A','-700'),(2,'45','ttttttttttttttttt','65765','765765','uytut','uyg','	8','a@a.com','yuuy','765765',2,'B','3','2','A','-750'),(3,'45','ttttttttttttttttt','65765','765765','uytut','uyg','	8','a@a.com','yuuy','765765',2,'C','3','2','A','-400'),(4,'45','ttttttttttttttttt','65765','765765','uytut','uyg','	8','a@a.com','yuuy','765765',2,'D','3','2','A','-600');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `tiid` int(11) NOT NULL AUTO_INCREMENT,
  `tiamount` int(10) NOT NULL,
  `tidonor` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tidonortype` int(4) NOT NULL,
  `tirecipient` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tirecipienttype` int(4) NOT NULL,
  `tirealdate` date NOT NULL,
  `tisysdate` datetime NOT NULL,
  `tireason` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tinumber` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `tidescription` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `titype` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tiid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-13 22:43:42
