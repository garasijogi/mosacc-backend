/*
SQLyog Community
MySQL - 10.1.37-MariaDB : Database - mosacc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `books` */

CREATE TABLE `books` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `author` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `books` */

insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (1,'Harry Potter And The Order Of The Phoenix',10.99,'J.K. Rowling',9,'Bloomsbury');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (2,'Harry Potter And The Goblet Of Fire',6.99,'J.K Rowling',8,'Bloomsbury');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (3,'Lord Of The Rings: The Fellowship Of The Ring',8.99,'J. R. R. Tolkien',8,'George Allen & Unwin');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (4,'Lord Of The Rings: The Two Towers',4.55,'J. R. R. Tolkien',8,'George Allen & Unwin');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (5,'Lord Of The Rings: The Return Of The King',7.99,'J. R. R. Tolkien',9,'George Allen & Unwin');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (6,'End of Watch: A Novel',5.00,'Stephen King',7,'Scribner');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (7,'Truly Madly Guilty',4.55,'Liane Moriarty',6,'Flatiron Books');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (8,'All There Was',3.99,'John Davidson',3,'Newton');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (9,'Mystery In The Eye',8.44,'E.L. Joseph',8,'Red Books');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (10,'Neo Lights',12.99,'George Nord',8,'Heltower');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (11,'Universe: History',13.99,'Albert Shoon',4,'Easy Books');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (12,'Green Earth',7.99,'Ashleigh Turner',4,'Yellowhouse');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (13,'Music Of The Ages',3.83,'James King',3,'Universe Co');
insert  into `books`(`ID`,`name`,`price`,`author`,`rating`,`publisher`) values (14,'Ancient Tea',3.99,'Jess Red',8,'Yellowhouse');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
