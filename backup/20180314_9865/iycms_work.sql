
-- -----------------------------
-- 数据库由iycms博客管理系统备份
-- -----------------------------

-- -----------------------------
-- 表结构  `iycms_work`
-- -----------------------------
DROP TABLE IF EXISTS `iycms_work`;
CREATE TABLE `iycms_work` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `department` char(100) DEFAULT NULL COMMENT '部门',
  `company` char(200) DEFAULT NULL COMMENT '公司',
  `key` char(200) DEFAULT NULL,
  `date_start` char(20) DEFAULT NULL,
  `date_end` char(20) DEFAULT NULL,
  `position` char(100) DEFAULT NULL COMMENT '职位',
  `body` text,
  `state` int(2) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='工作经历';

-- -----------------------------
-- 表数据  `iycms_work` 共3条
-- -----------------------------
INSERT INTO `iycms_work` VALUES ('36','22222222222','888','','2014-03','2018-12','22222222222222222222','222222222222222222222
12
312
3','1');
INSERT INTO `iycms_work` VALUES ('34','','','','2018-01','2018-01','','','0');
INSERT INTO `iycms_work` VALUES ('35','','','','2018-06','2018-07','','','1');
