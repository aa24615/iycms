
-- -----------------------------
-- 数据库由iycms博客管理系统备份
-- -----------------------------

-- -----------------------------
-- 表结构  `iycms_info`
-- -----------------------------
DROP TABLE IF EXISTS `iycms_info`;
CREATE TABLE `iycms_info` (
  `name` char(50) NOT NULL,
  `value` char(200) DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='个人资料';

-- -----------------------------
-- 表数据  `iycms_info` 共19条
-- -----------------------------
INSERT INTO `iycms_info` VALUES ('name','小曾');
INSERT INTO `iycms_info` VALUES ('nick','あ读鈊茚ケ');
INSERT INTO `iycms_info` VALUES ('head','/uploads/head/5a4b97d1d97bf.png');
INSERT INTO `iycms_info` VALUES ('sex','男');
INSERT INTO `iycms_info` VALUES ('birthday','2017-12-31');
INSERT INTO `iycms_info` VALUES ('calendar','公历');
INSERT INTO `iycms_info` VALUES ('qq','839024615');
INSERT INTO `iycms_info` VALUES ('wx','aa24615');
INSERT INTO `iycms_info` VALUES ('email','xz615@qq.com');
INSERT INTO `iycms_info` VALUES ('url','http://127.0.0.14/');
INSERT INTO `iycms_info` VALUES ('github','http://127.0.0.14/');
INSERT INTO `iycms_info` VALUES ('gitosc','http://127.0.0.14/');
INSERT INTO `iycms_info` VALUES ('desc','探索计算机的奥秘是我们的乐趣,也是我们奋不顾身的理由<br/>
我们是开发者,我们是程序员,一群与众不同的人!');
INSERT INTO `iycms_info` VALUES ('my_city','35');
INSERT INTO `iycms_info` VALUES ('my_area','399');
INSERT INTO `iycms_info` VALUES ('home_city','237');
INSERT INTO `iycms_info` VALUES ('home_area','2352');
INSERT INTO `iycms_info` VALUES ('my_province','3');
INSERT INTO `iycms_info` VALUES ('home_province','20');
