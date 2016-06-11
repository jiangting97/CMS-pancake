/*
 Navicat MySQL Data Transfer

 Source Server         : LocalDatabase
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : cms

 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 06/11/2016 10:21:19 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cms_admin`
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin`;
CREATE TABLE `cms_admin` (
  `admin_id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `lastloginip` varchar(15) DEFAULT '0',
  `lastlogintime` int(10) DEFAULT '0',
  `email` varchar(40) DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cms_admin`
-- ----------------------------
BEGIN;
INSERT INTO `cms_admin` VALUES ('1', 'admin', 'admin', '0', '0', '', '', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
