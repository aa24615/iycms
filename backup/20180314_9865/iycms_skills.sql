
-- -----------------------------
-- 数据库由iycms博客管理系统备份
-- -----------------------------

-- -----------------------------
-- 表结构  `iycms_skills`
-- -----------------------------
DROP TABLE IF EXISTS `iycms_skills`;
CREATE TABLE `iycms_skills` (
  `name` char(50) NOT NULL,
  `value` char(100) DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专业技能';

-- -----------------------------
-- 表数据  `iycms_skills` 共30条
-- -----------------------------
INSERT INTO `iycms_skills` VALUES ('PHP','89');
INSERT INTO `iycms_skills` VALUES ('Python','30');
INSERT INTO `iycms_skills` VALUES ('JAVA','0');
INSERT INTO `iycms_skills` VALUES ('C','55');
INSERT INTO `iycms_skills` VALUES ('C++','55');
INSERT INTO `iycms_skills` VALUES ('C_SHARP','12');
INSERT INTO `iycms_skills` VALUES ('_NET','55');
INSERT INTO `iycms_skills` VALUES ('Go','0');
INSERT INTO `iycms_skills` VALUES ('Node_JS','70');
INSERT INTO `iycms_skills` VALUES ('Linux','70');
INSERT INTO `iycms_skills` VALUES ('Shell','60');
INSERT INTO `iycms_skills` VALUES ('Perl','0');
INSERT INTO `iycms_skills` VALUES ('MySQL','75');
INSERT INTO `iycms_skills` VALUES ('SQLite','0');
INSERT INTO `iycms_skills` VALUES ('MongoDB','60');
INSERT INTO `iycms_skills` VALUES ('Redis','70');
INSERT INTO `iycms_skills` VALUES ('Memcached','0');
INSERT INTO `iycms_skills` VALUES ('html_css','100');
INSERT INTO `iycms_skills` VALUES ('JavaScript','80');
INSERT INTO `iycms_skills` VALUES ('JQuery','80');
INSERT INTO `iycms_skills` VALUES ('Vue_js','70');
INSERT INTO `iycms_skills` VALUES ('AngularJS','30');
INSERT INTO `iycms_skills` VALUES ('React','0');
INSERT INTO `iycms_skills` VALUES ('Bootstrap','50');
INSERT INTO `iycms_skills` VALUES ('Photoshop','70');
INSERT INTO `iycms_skills` VALUES ('Illustrator','0');
INSERT INTO `iycms_skills` VALUES ('After_Effects','30');
INSERT INTO `iycms_skills` VALUES ('Premiere_Pro','20');
INSERT INTO `iycms_skills` VALUES ('InDesign','0');
INSERT INTO `iycms_skills` VALUES ('html/css','100');
