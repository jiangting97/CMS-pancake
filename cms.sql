/*
 Navicat MySQL Data Transfer

 Source Server         : LocalDatabase
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : cms

 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 06/11/2016 12:12:02 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cms_menu`
-- ----------------------------
DROP TABLE IF EXISTS `cms_menu`;
CREATE TABLE `cms_menu` (
  `menu_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `parentid` smallint(6) NOT NULL DEFAULT '0',
  `listoreder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`),
  KEY `listoreder` (`listoreder`),
  KEY `parentid` (`parentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cms_news`
-- ----------------------------
DROP TABLE IF EXISTS `cms_news`;
CREATE TABLE `cms_news` (
  `newsid` int(11) NOT NULL AUTO_INCREMENT,
  `newstitle` varchar(200) NOT NULL,
  `newsimg` varchar(100) NOT NULL,
  `newscontent` text NOT NULL,
  `addtime` date NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `listorder` smallint(6) DEFAULT '0',
  PRIMARY KEY (`newsid`),
  KEY `newstitle` (`newstitle`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='news新闻表';

-- ----------------------------
--  Table structure for `cms_news1`
-- ----------------------------
DROP TABLE IF EXISTS `cms_news1`;
CREATE TABLE `cms_news1` (
  `news_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` varchar(80) NOT NULL DEFAULT '',
  `small_title` varchar(30) NOT NULL DEFAULT '',
  `title_font_color` varchar(250) DEFAULT NULL COMMENT '标题颜色',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `keywords` char(40) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL COMMENT '文章描述',
  `listoreder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `copyfrom` varchar(250) DEFAULT NULL COMMENT '来源',
  `username` char(20) NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`news_id`),
  KEY `listoreder` (`listoreder`),
  KEY `cati` (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cms_news_content`
-- ----------------------------
DROP TABLE IF EXISTS `cms_news_content`;
CREATE TABLE `cms_news_content` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` mediumint(8) unsigned NOT NULL,
  `content` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cms_position`
-- ----------------------------
DROP TABLE IF EXISTS `cms_position`;
CREATE TABLE `cms_position` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` char(100) DEFAULT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cms_position_content`
-- ----------------------------
DROP TABLE IF EXISTS `cms_position_content`;
CREATE TABLE `cms_position_content` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(5) unsigned NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) DEFAULT NULL,
  `news_id` mediumint(8) unsigned NOT NULL,
  `listoreder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cms_type`
-- ----------------------------
DROP TABLE IF EXISTS `cms_type`;
CREATE TABLE `cms_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
