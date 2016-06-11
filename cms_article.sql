/*
 Navicat MySQL Data Transfer

 Source Server         : LocalDatabase
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : cms

 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 06/11/2016 10:21:24 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cms_article`
-- ----------------------------
DROP TABLE IF EXISTS `cms_article`;
CREATE TABLE `cms_article` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `addtime` date NOT NULL,
  `type` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cms_article`
-- ----------------------------
BEGIN;
INSERT INTO `cms_article` VALUES ('1', 'css 基础', '样式表设置', '2016-06-01', '1'), ('2', 'html基础', '基础样样子啊', '2015-06-03', '1'), ('3', 'CSS1', '11111', '2016-06-09', '2'), ('5', 'css3', '33333', '2016-06-10', '2'), ('7', 'JS2', 'JS2', '2016-06-03', '3'), ('8', 'JS3', 'JS3', '2016-06-01', '3'), ('9', 'gghg', 'ghfhgf', '2016-06-10', '1'), ('11', 'CSS1', '&lt;p&gt;1111133333&lt;/p&gt;', '2016-06-11', '1'), ('12', 'gghg', '&lt;p&gt;ghfhgf姜婷你要加油啊，要减肥啊&lt;/p&gt;&lt;p&gt;现在都成猪了，也是。。。&lt;br/&gt;&lt;/p&gt;', '2016-06-11', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
