/*
 Navicat MySQL Data Transfer

 Source Server         : LocalDatabase
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : cms

 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 06/11/2016 10:21:30 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cms_type`
-- ----------------------------
DROP TABLE IF EXISTS `cms_type`;
CREATE TABLE `cms_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cms_type`
-- ----------------------------
BEGIN;
INSERT INTO `cms_type` VALUES ('1', 'HTML'), ('2', 'CSS'), ('3', 'JavaScript');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
