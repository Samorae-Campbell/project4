-- MySQL dump 10.11
--
-- to install this database, from a terminal, type:
-- mysql -u USERNAME -p -h SERVERNAME cheapo_mail < cheapo_mail.sql
--
-- Host: localhost    Database: cheapo_mail
-- ------------------------------------------------------
-- Server version   5.0.45-log


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(5) NOT NULL auto_increment,
  `fname` char(20) NOT NULL default '',
  `lname` char(20) NOT NULL default '',
  `password` char(35) NOT NULL default '',
  `username` char(35) NOT NULL default '',
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'Samorae','Campbell','sunshine','samorae101'),
(2,'Alexandra','Daley','sparkles','lexwouldyouliketoknow'),
(3,'Sally','Li','123456','sally.li.14'),
(4,'Nicole','Smith','chloe','cust'),
(5,'Kerry','Lewis','kerniclew','Kerrzy'),
(6,'Brittanya','Campbell','godislove','jesusfreak');


UNLOCK TABLES;

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `message_id` int(35) NOT NULL auto_increment,
  `subject` char(35) NOT NULL default '',
  `body` char(80) NOT NULL default '',
  `id` int(5) NOT NULL  default '0',
  `recipient_ids` int(5) NOT NULL default '0',
  PRIMARY KEY  (`message_id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `messages` WRITE;
INSERT INTO `messages` VALUES (1,'Matters','meh',1,1),
(2,'Exs','sigh... all my gfs',2,3),
(3,'God','he is great',4,6),
(4,'You','You were the worst I ever had',1,4),
(5,'Hi','Hey, this is me. please add.',3,1),
(6,'Sam','I knwo youre with him, whatever.',5,2),
(7,'Testimony','You need to go to church because of this.',6,5),
(8,'Random','Ellooo',2,1),
(9,'Why','Why would you do such a thing to Sam?',6,3),
(10,'So?','Yeah Im with him, whats your problem?',2,5),
(11,'Stop','Please dont ever call me again',3,1),
(12,'Meh','Why cant exams be over?',5,6),
(13,'random-Reply','Ello :)',1,2),
(14,'dada','hello',6,4),
(15,'welcome','welcome to sql m8',3,4),
(16,'random-no-Reply','notice',5,1),
(17,'random-no-Reply','notice',5,2),
(18,'random-no-Reply','notice',5,3),
(19,'random-no-Reply','notice',5,4),
(20,'random-no-Reply','notice',5,6);



UNLOCK TABLES;


DROP TABLE IF EXISTS `messages_read`;
CREATE TABLE `messages_read` (
  `id` int(5) NOT NULL auto_increment,
  `message_id` int(11) NOT NULL default '0',
  `reader_id` int(11) NOT NULL default '0',
  `date`char(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `messages_read` WRITE;
INSERT INTO `messages_read` VALUES (1,2,2,'23th,jan'),
(2,3,4,'2nd,Jan');


UNLOCK TABLES;
