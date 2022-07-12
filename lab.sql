/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.24-MariaDB : Database - lab
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lab` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `lab`;

/*Table structure for table `comercio` */

DROP TABLE IF EXISTS `comercio`;

CREATE TABLE `comercio` (
  `idcomercio` int(11) NOT NULL AUTO_INCREMENT,
  `idsuscripcion` int(11) DEFAULT NULL,
  `fechasuscripcion` date DEFAULT NULL,
  `comercio` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idcomercio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `comercio` */

insert  into `comercio`(`idcomercio`,`idsuscripcion`,`fechasuscripcion`,`comercio`) values 
(1,1,'2022-07-12','Analiza');

/*Table structure for table `suscripcion` */

DROP TABLE IF EXISTS `suscripcion`;

CREATE TABLE `suscripcion` (
  `idsuscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `suscripcion` varchar(150) DEFAULT NULL,
  `costosuscripcion` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idsuscripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `suscripcion` */

insert  into `suscripcion`(`idsuscripcion`,`suscripcion`,`costosuscripcion`) values 
(1,'Bronce',200.00);

/*Table structure for table `tipousuario` */

DROP TABLE IF EXISTS `tipousuario`;

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipousuario` */

insert  into `tipousuario`(`idtipousuario`,`tipousuario`) values 
(1,'Recepción');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL,
  `tipouser` varchar(2) DEFAULT NULL,
  `idcomercio` varchar(1) DEFAULT NULL,
  `idtipousuario` int(11) DEFAULT NULL,
  `nombrecompleto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

insert  into `usuario`(`idusuario`,`nombre`,`pass`,`tipouser`,`idcomercio`,`idtipousuario`,`nombrecompleto`) values 
(1,'kike','12345',NULL,'1',1,'Jose Enrique');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
