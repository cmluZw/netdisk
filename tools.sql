# Host: 148.70.34.179  (Version: 5.7.22-log)
# Date: 2021-04-10 18:32:48
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "file"
#

CREATE TABLE `file` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `upload_time` varchar(255) DEFAULT NULL,
  `size` varchar(255) NOT NULL DEFAULT '0',
  `filetype` varchar(255) DEFAULT NULL,
  `download_num` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

#
# Data for table "file"
#


#
# Structure for table "user"
#

CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastest-ip` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'123','fe8b7d6d9d7ea303f0a94db8a9572902',NULL,'123@qq.com');
