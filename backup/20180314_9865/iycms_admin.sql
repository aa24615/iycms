
-- -----------------------------
-- 数据库由iycms博客管理系统备份
-- -----------------------------

-- -----------------------------
-- 表结构  `iycms_admin`
-- -----------------------------
DROP TABLE IF EXISTS `iycms_admin`;
CREATE TABLE `iycms_admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user` char(50) DEFAULT NULL,
  `pwd` char(50) DEFAULT NULL,
  `key` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- -----------------------------
-- 表数据  `iycms_admin` 共1条
-- -----------------------------
INSERT INTO `iycms_admin` VALUES ('1','admin','7a57a5a743894a0e','d97ccfe64a25155f369f9b5ca0db9c49');
