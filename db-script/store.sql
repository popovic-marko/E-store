/*
SQLyog Community v12.2.1 (64 bit)
MySQL - 10.1.21-MariaDB : Database - store
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`store` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `store`;

/*Table structure for table `narudzbina` */

DROP TABLE IF EXISTS `narudzbina`;

CREATE TABLE `narudzbina` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proizvodjac` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ukupno` int(6) DEFAULT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresa` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `narudzbina` */

insert  into `narudzbina`(`id`,`proizvodjac`,`model`,`ukupno`,`ime`,`prezime`,`email`,`adresa`) values 
(1,'Huawei','P10',675,'Nikola','Jovanovic','sadas@tests.com','sdaskdhakdhaskda'),
(2,'Samsung','S8',600,'Nikola','Petrovic','a@a','Beograd'),
(3,'Huawei','P10 Plus',1350,'Petar','Nikolic','a@a','Beograd'),
(4,'Samsung','S6',400,'Nikola','Milic','a@a','Jove Ilica 55, Beograd');

/*Table structure for table `telefon` */

DROP TABLE IF EXISTS `telefon`;

CREATE TABLE `telefon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proizvodjac` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cena` int(4) DEFAULT NULL,
  `model` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ekran` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kamera` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `procesor` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `memorija` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kolicina` int(4) DEFAULT NULL,
  `dodatniOpis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `telefon` */

insert  into `telefon`(`id`,`proizvodjac`,`cena`,`model`,`ekran`,`kamera`,`procesor`,`os`,`memorija`,`kolicina`,`dodatniOpis`) values 
(2,'Samsung',500,'S7','4.8 inča','10mp','Dual Core','Andorid','32gb',0,'Trenutno ne postoji dodatni opis.'),
(3,'Samsung',600,'S8','5.0 inča','12mp','Quad Core','Android','64gb',5,'Trenutno ne postoji dodatni opis.'),
(5,'Huawei',675,'P10 Plus','5.5 inča','12mp','Octa-core','Android','128gb',10,'Trenutno ne postoji dodatni opis.'),
(6,'Huawei',360,'P9','5.2 inča','12mp','Quad-core','Android','32gb',20,'Trenutno ne postoji dodatni opis.'),
(7,'Huawei',650,'Mate 10','5.9 inča','20mp','Octa-core','Android','64gb',10,'Trenutno ne postoji dodatni opis.'),
(10,'Samsung',400,'S6','5.1 inča','16mp','Quad-core','Android','32gb',5,'Trenutno ne postoji dodatni opis.'),
(11,'iPhone',1270,'X','5.8 inča','Dual 12mp','Hexa-core','iOS 11','64gb',5,'Trenutno ne postoji dodatni opis.'),
(12,'iPhone',585,'7','4.7 inča','12mp','Quad-core','iOS 10','32gb',0,'Trenutno ne postoji dodatni opis.');

/*Table structure for table `vest` */

DROP TABLE IF EXISTS `vest`;

CREATE TABLE `vest` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tekst` text COLLATE utf8_unicode_ci,
  `nazivSlike` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `vest` */

insert  into `vest`(`id`,`naslov`,`tekst`,`nazivSlike`) values 
(7,'Samsung i dalje prodaje najviše telefona','Gartner je prošlog meseca prognozirao da će se globalna isporuka telefona vratiti na stazu rasta tokom naredne godine, a najnovije analize pokazuju da je ovo ostvareno i ranije - već tokom trećeg tromesečja ove godine.<br />\r\n<br />\r\nGlobalna isporuka smartfona krajnjim korisnicima je iznosila 383 miliona primeraka tokom trećeg tromesečja 2017. godine, što predstavlja povećanje od tri procenta u odnosu na isti period 2016. godine, prema navodima Gartnera. Svih pet vodećih proizvođača, izuzev kompanije Apple, je ostvarilo dvocifreni rast.<br />\r\n<br />\r\nGartner ističe da je Samsung ostvario najveći rast zabeležen u poslednje gotovo dve godine. Prodaja telefona južnokorejske kompanije je iznosila 19,3 procenata tokom trećeg tromesečja. Poslednji put kada je Samsung ostvario dvocifreni rast prodaje, bilo je tokom 2015. godine.<br />\r\n<br />\r\nApple je tokom trećeg tromesečja beležio stagnaciju, jer su korisnici iščekivali iPhone X i iPhone 8, čiji će rezultati ući u statistiku za četvrto tromesečje. Tako da je Apple zabeležio rast od \"svega\" 5,7 procenata.<br />\r\n<br />\r\nKada su procenti u pitanju, najveći rast tokom trećeg tromesečja je zabeležio Xiaomi. Kineska kompanija je ostvarila rast od 80 procenata, a kompanijin uspeh je došao više sa internacionalnih tržišta nego sa tržišta Kine.<br />\r\n<br />\r\nHuawei i Vivo su takođe zabeležili primetan internacionalni rast.','SamsungProdaja.jpg'),
(8,'Galaxy X savitljivi telefon stiže naredne godine','Već neko vreme znamo da Samsung želi da pobedi rivale na tržištu tako što će predstaviti savitljivi/sklopivi displej. ZTE već ima jedan ovakav model, tako da Samsung neće moći da se pohvali time da je prvi.<br />\r\n<br />\r\nNovi izveštaj ponavlja ono što smo već ranije čuli, da će Samsung Galaxy X telefon biti predstavljen u nekom trenutku tokom naredne godine, ali tačnog datuma još uvek nema. Izveštaj sugeriše da će Galaxy X najverovatnije imati savitljivi panel sa zakrivljenošću od 1.0R, što znači da se može sviti ka unutra, poput papira.<br />\r\n<br />\r\nNije poznato od čega je displej izrađen, ali dominantno mišljenje je da će se koristiti plastični materijal. <br />\r\n<br />\r\nSamsung je veoma zainteresovan da preduhitri Apple na polju savitljivih telefona, posebno sada kada je Apple najavio da planira razvoj sklopivog iPhone-a sa kompanijom LG Display.','SamsungSavitljivi.jpg'),
(9,'Apple bi mogao poboljšati radni vek iPhone-a, kreiranjem sopstvenih čipova za baterije','Nakon razlaza sa kompanijom Imagination Technologies, Apple nastavlja trend da se sve manje oslanja na druge proizvođače komponenti, te da u svojim uređajima ima sopstvena rešenja i tehnologije. Anonimni izvori tvrde da kompanija planira da i čipove, koji služe za upravljanje baterijama, preuzme u svoje ruke, što znači da se sprema raskid saradnje sa kompanijom Dialog Semiconductor kao dobavljačem.<br />\r\n<br />\r\nNovi Apple čipovi bi mogli stići najranije tokom 2018. godine, ali drugi izvori sugerišu da ovi vremenski okviri nisu najprecizniji i da se novi čipovi za baterije ipak mogu očekivati tek tokom 2019. godine. Ovo bi kompaniji Apple omogućilo da kreira komponente koje pokrivaju segment punjenja, upravljanja životnim vekom baterije i generalnom potrošnjom energije.<br />\r\n<br />\r\nZa nove Apple čipove se tvrdi da su najnapredniji čipovi do sada, a potencijalno bi mogli da reše problem sa baterijama, kako sa njihovim punjenjem tako i sa radnim vekom. Nove čipove bi trebalo da proizvodi Taiwan Semiconductor Manufacturing Co (TSMC), bazirano na Apple dizajnu.    <br />\r\n<br />\r\n<br />\r\n<br />','AppleCipovi.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
