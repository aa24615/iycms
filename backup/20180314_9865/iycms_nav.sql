
-- -----------------------------
-- 数据库由iycms博客管理系统备份
-- -----------------------------

-- -----------------------------
-- 表结构  `iycms_nav`
-- -----------------------------
DROP TABLE IF EXISTS `iycms_nav`;
CREATE TABLE `iycms_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` char(100) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  `state` int(2) DEFAULT '1',
  `url` char(255) DEFAULT NULL,
  `url_state` int(2) DEFAULT NULL,
  `target` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='前台导航';

-- -----------------------------
-- 表数据  `iycms_nav` 共5条
-- -----------------------------
INSERT INTO `iycms_nav` VALUES ('11','9','22222','1','1','2222222','0','_blank');
INSERT INTO `iycms_nav` VALUES ('9','0','1sssss','1','1','222222222222222222222','1','_blank');
INSERT INTO `iycms_nav` VALUES ('10','0','sss','1','1','','1','_self');
INSERT INTO `iycms_nav` VALUES ('5','3','000000000000000000000','1','0','77777777777777777','1','_self');
INSERT INTO `iycms_nav` VALUES ('6','3','99999999','1','1','','1','_blank');
