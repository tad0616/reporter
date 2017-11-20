-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `article` (
  `sn` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `subject_id` smallint(5) unsigned NOT NULL COMMENT '主題編號',
  `title` varchar(255) NOT NULL COMMENT '文章標題',
  `content` text NOT NULL COMMENT '文章內容',
  `create_time` datetime NOT NULL COMMENT '建立時間',
  `update_time` datetime NOT NULL COMMENT '最後更新時間',
  `username` varchar(65) NOT NULL COMMENT '發布者',
  `picked` enum('0','1') NOT NULL COMMENT '編輯精選',
  `kind` varchar(255) NOT NULL DEFAULT 'story' COMMENT '文章種類',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `loginattempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `members` (
  `id` char(23) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `subject` (
  `subject_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主題編號',
  `subject_title` varchar(255) NOT NULL COMMENT '主題名稱',
  `subject_descript` text NOT NULL COMMENT '主題說明',
  `subject_start` datetime NOT NULL COMMENT '上架時間',
  `subject_end` datetime NOT NULL COMMENT '上架時間',
  `subject_enable` enum('1','0') NOT NULL COMMENT '使否啟用',
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2017-11-20 03:05:07
