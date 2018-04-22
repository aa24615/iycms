
-- -----------------------------
-- 数据库由iycms博客管理系统备份
-- -----------------------------

-- -----------------------------
-- 表结构  `iycms_category`
-- -----------------------------
DROP TABLE IF EXISTS `iycms_category`;
CREATE TABLE `iycms_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` char(100) DEFAULT NULL,
  `file` char(100) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  `state` int(2) DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='文章栏目';

-- -----------------------------
-- 表数据  `iycms_category` 共8条
-- -----------------------------
INSERT INTO `iycms_category` VALUES ('11','9','22222222222222222222','122222222','1','0');
INSERT INTO `iycms_category` VALUES ('9','0','1sss\'sssss\'sss\'ss\'sssss','12','1','1');
INSERT INTO `iycms_category` VALUES ('10','10','sss','12312','1','0');
INSERT INTO `iycms_category` VALUES ('5','3','000000000000000000000','12','1','0');
INSERT INTO `iycms_category` VALUES ('6','3','99999999','123','1','1');
INSERT INTO `iycms_category` VALUES ('12','9','2\'2222','白"白白','22','0');
INSERT INTO `iycms_category` VALUES ('13','0','1111111','1111111111111','1','1');
INSERT INTO `iycms_category` VALUES ('14','13','大厦','在于','1','0');
