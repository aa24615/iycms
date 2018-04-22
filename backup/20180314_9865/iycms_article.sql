
-- -----------------------------
-- 数据库由iycms博客管理系统备份
-- -----------------------------

-- -----------------------------
-- 表结构  `iycms_article`
-- -----------------------------
DROP TABLE IF EXISTS `iycms_article`;
CREATE TABLE `iycms_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  `title` char(100) DEFAULT NULL,
  `experiment` int(2) DEFAULT '0',
  `works` int(2) DEFAULT '0',
  `top` int(2) DEFAULT '0',
  `file` char(200) DEFAULT NULL,
  `pic` char(200) DEFAULT NULL,
  `body` mediumtext,
  `a` int(11) DEFAULT '0',
  `time` int(2) DEFAULT NULL,
  `state` int(2) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- -----------------------------
-- 表数据  `iycms_article` 共2条
-- -----------------------------
INSERT INTO `iycms_article` VALUES ('14','13','2','你好好好好好好了','0','0','0','','/uploads/thumbnail/201801/5a4cdbdd248aa.jpg','2222222222222222222','0','1514986503','1');
INSERT INTO `iycms_article` VALUES ('18','9','2','222222222222','0','0','0','','/uploads/pic/201801/5a4e3704258f2.jpg','22222222','0','1515075341','1');
