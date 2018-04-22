
-- -----------------------------
-- 数据库由iycms博客管理系统备份
-- -----------------------------

-- -----------------------------
-- 表结构  `iycms_flink`
-- -----------------------------
DROP TABLE IF EXISTS `iycms_flink`;
CREATE TABLE `iycms_flink` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(200) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `qq` varchar(50) DEFAULT NULL,
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  `time` int(10) unsigned NOT NULL,
  `state` int(2) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COMMENT='友情链接';

-- -----------------------------
-- 表数据  `iycms_flink` 共7条
-- -----------------------------
INSERT INTO `iycms_flink` VALUES ('35','a5源码','http://down.admin5.com/','','','','5','1577808000','1');
INSERT INTO `iycms_flink` VALUES ('38','QQ空间技术网','http://www.wasqq.com/','','','','7','1577808000','1');
INSERT INTO `iycms_flink` VALUES ('41','情谊资源社区','http://www.qyqzone.com/','','','','9','1577808000','1');
INSERT INTO `iycms_flink` VALUES ('42','梦雪论坛','http://www.flash127.com/','众人众人众人','212','1213','1','1577808000','1');
INSERT INTO `iycms_flink` VALUES ('43','潮尚资源社区','http://www.ieqq.net','','','','10','1577808000','1');
INSERT INTO `iycms_flink` VALUES ('48','ThinkPHP','http://www.thinkphp.cn/','','','','17','1577808000','1');
INSERT INTO `iycms_flink` VALUES ('84','22','222222222222222222','2222','222222222','222222222222222','18','1515078562','1');
