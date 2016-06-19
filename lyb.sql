-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2015 年 12 月 10 日 09:39
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `lyb`
-- 
CREATE DATABASE `lyb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lyb`;

-- --------------------------------------------------------

-- 
-- 表的结构 `ly_dj`
-- 

CREATE TABLE `ly_dj` (
  `dj_id` int(11) NOT NULL auto_increment,
  `dj_name` varchar(20) NOT NULL,
  `dj_level` int(11) NOT NULL,
  PRIMARY KEY  (`dj_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- 
-- 导出表中的数据 `ly_dj`
-- 

INSERT INTO `ly_dj` VALUES (1, '新兵', 0);
INSERT INTO `ly_dj` VALUES (2, '二等兵', 50);
INSERT INTO `ly_dj` VALUES (3, '一等兵', 100);
INSERT INTO `ly_dj` VALUES (4, '下士', 200);
INSERT INTO `ly_dj` VALUES (5, '中士', 350);
INSERT INTO `ly_dj` VALUES (6, '上士', 500);
INSERT INTO `ly_dj` VALUES (7, '少尉', 700);
INSERT INTO `ly_dj` VALUES (8, '中尉', 1000);
INSERT INTO `ly_dj` VALUES (9, '上尉', 1500);
INSERT INTO `ly_dj` VALUES (10, '少校', 2500);
INSERT INTO `ly_dj` VALUES (11, '中校', 5000);
INSERT INTO `ly_dj` VALUES (12, '上校', 10000);
INSERT INTO `ly_dj` VALUES (13, '少将', 20000);
INSERT INTO `ly_dj` VALUES (14, '中将', 50000);
INSERT INTO `ly_dj` VALUES (15, '上将', 100000);
INSERT INTO `ly_dj` VALUES (16, '元帅', 200000);

-- --------------------------------------------------------

-- 
-- 表的结构 `ly_info`
-- 

CREATE TABLE `ly_info` (
  `ly_id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `ly_type` int(11) NOT NULL,
  `ly_user` varchar(20) NOT NULL,
  `ly_time` datetime NOT NULL,
  `content` text NOT NULL,
  `bl` varchar(20) NOT NULL,
  `audit` tinyint(1) NOT NULL,
  PRIMARY KEY  (`ly_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- 导出表中的数据 `ly_info`
-- 

INSERT INTO `ly_info` VALUES (1, '速度', 2, '123', '2015-11-15 00:00:00', '啊实打实的', '', 1);
INSERT INTO `ly_info` VALUES (2, '速度', 2, '123', '2015-11-15 00:00:00', '啊实打实的', '', 0);
INSERT INTO `ly_info` VALUES (3, '45', 2, '123', '2015-11-15 00:00:00', '45646', '', 1);
INSERT INTO `ly_info` VALUES (4, '哇发生的', 2, '123', '2015-11-15 00:00:00', '啥水果撒噶士大夫撒旦', '', 1);
INSERT INTO `ly_info` VALUES (5, '阿斯顿发生法', 3, '123', '2015-11-15 11:43:30', 's''fa''a''ga''s''g''sa''f''h', '', 1);
INSERT INTO `ly_info` VALUES (6, '啊手动阀示范点', 4, '123', '2015-11-15 11:45:00', '和对方观点和', '', 0);
INSERT INTO `ly_info` VALUES (7, '撒地方', 2, '123', '2015-11-15 19:47:00', '电饭锅', '', 0);
INSERT INTO `ly_info` VALUES (8, '222', 2, '123', '2015-11-15 19:50:47', '222', '', 0);
INSERT INTO `ly_info` VALUES (9, 'ghjf', 2, '123', '2015-11-15 20:21:01', '<img alt="偷笑" src="xheditor/xheditor_emot/default/titter.gif" />', '', 0);
INSERT INTO `ly_info` VALUES (10, 'asfd', 1, '123', '2015-11-15 20:24:58', '<img src="http://c.hiphotos.baidu.com/image/w%3D310/sign=594fc27441a98226b8c12d26ba83b97a/f3d3572c11dfa9ec3898161660d0f703918fc179.jpg" alt="" />', '', 0);
INSERT INTO `ly_info` VALUES (11, 'df', 2, '456', '2015-11-16 17:22:44', 'sdfs', '', 0);
INSERT INTO `ly_info` VALUES (12, 'dfg', 2, '456', '2015-11-16 17:22:53', 'dg', '', 0);
INSERT INTO `ly_info` VALUES (13, 'tyh', 2, '456', '2015-11-16 17:23:24', 'dfh', '', 0);
INSERT INTO `ly_info` VALUES (14, 'dsfg', 2, '456', '2015-11-16 17:27:21', 'dsfg', '', 0);
INSERT INTO `ly_info` VALUES (15, 'ul', 4, '456', '2015-11-16 17:27:40', 'hgkj', '', 0);
INSERT INTO `ly_info` VALUES (16, 'sfdaf', 2, '456', '2015-11-16 17:28:11', 'asdf', '', 0);
INSERT INTO `ly_info` VALUES (17, 'asf', 1, '456', '2015-11-30 20:54:00', 'safasfds', '', 0);
INSERT INTO `ly_info` VALUES (18, 'fasdf', 2, '456', '2015-11-30 21:03:52', 'ahasfhs', '', 0);
INSERT INTO `ly_info` VALUES (19, 'agf', 3, '456', '2015-11-30 21:04:09', 'sgdhdgh', '', 0);
INSERT INTO `ly_info` VALUES (20, 'asdf', 2, '456', '2015-11-30 21:08:24', 'fwefads', '', 0);
INSERT INTO `ly_info` VALUES (21, 'sadff', 2, '456', '2015-11-30 21:08:32', 'safdsaf', '', 0);
INSERT INTO `ly_info` VALUES (22, 'zbfd', 2, '456', '2015-11-30 21:10:09', 'asfd', '', 0);
INSERT INTO `ly_info` VALUES (23, 'sadff', 1, '456', '2015-11-30 21:10:15', 'sadf', '', 0);
INSERT INTO `ly_info` VALUES (24, 'sadfsdf', 4, '456', '2015-11-30 21:10:22', 'asdf', '', 0);
INSERT INTO `ly_info` VALUES (25, 'asdfsdf', 1, '456', '2015-11-30 21:10:26', 'safsaf', '', 0);
INSERT INTO `ly_info` VALUES (26, 'zxcz', 2, 'zxc', '2015-11-30 21:11:04', 'xc', '', 0);
INSERT INTO `ly_info` VALUES (27, 'zxcz', 2, 'zxc', '2015-11-30 21:11:12', 'cc', '', 0);
INSERT INTO `ly_info` VALUES (28, 'x', 3, 'zxc', '2015-11-30 21:11:17', 'x', '', 0);
INSERT INTO `ly_info` VALUES (29, 'xx', 2, 'zxc', '2015-11-30 21:11:24', 'x', '', 0);
INSERT INTO `ly_info` VALUES (30, 'zxcxzc', 1, 'zxc', '2015-11-30 21:11:28', 'zxczxc', '', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `reply_info`
-- 

CREATE TABLE `reply_info` (
  `reply_id` int(11) NOT NULL auto_increment,
  `ly_id` int(11) NOT NULL,
  `r_user` varchar(20) NOT NULL,
  `r_time` datetime NOT NULL,
  `r_title` varchar(50) NOT NULL,
  `r_content` text NOT NULL,
  PRIMARY KEY  (`reply_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- 导出表中的数据 `reply_info`
-- 

INSERT INTO `reply_info` VALUES (1, 4, '123', '2015-11-24 11:11:06', 'Re:哇发生的', '');
INSERT INTO `reply_info` VALUES (2, 4, '123', '2015-11-24 11:12:53', 'Re:哇发生的', 'esrgt');
INSERT INTO `reply_info` VALUES (3, 1, '123', '2015-11-26 18:53:12', 'Re:速度', '士大夫');
INSERT INTO `reply_info` VALUES (4, 1, '123', '2015-11-26 19:03:38', 'Re:速度', '士大夫');
INSERT INTO `reply_info` VALUES (5, 1, '123', '2015-11-26 23:36:53', 'Re:速度', '士大夫');
INSERT INTO `reply_info` VALUES (6, 1, '123', '2015-11-27 17:15:28', 'Re:速度', 'sdf&nbsp;');
INSERT INTO `reply_info` VALUES (7, 1, '123', '2015-11-27 17:26:07', 'Re:速度', '123');
INSERT INTO `reply_info` VALUES (8, 1, '123', '2015-11-27 17:27:51', 'Re:速度', 'dfg');
INSERT INTO `reply_info` VALUES (9, 1, '123', '2015-11-29 22:23:22', 'Re:速度', '456464654');

-- --------------------------------------------------------

-- 
-- 表的结构 `user_info`
-- 

CREATE TABLE `user_info` (
  `id` int(10) NOT NULL auto_increment,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `home` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `score` int(11) NOT NULL,
  `level` varchar(20) NOT NULL default '新兵',
  `power` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

-- 
-- 导出表中的数据 `user_info`
-- 

INSERT INTO `user_info` VALUES (48, '789', '68053af2923e00204c3ca7c6a3150cf7', '789', '789', '789', '男', 0, '新兵', 3);
INSERT INTO `user_info` VALUES (45, '456', '250cf8b51c773f3f8dc8b4be867a9a02', '456', '456', '456', '男', 110, '下士', 0);
