
-- -----------------------------
-- 数据库由iycms博客管理系统备份
-- -----------------------------

-- -----------------------------
-- 表结构  `iycms_menu`
-- -----------------------------
DROP TABLE IF EXISTS `iycms_menu`;
CREATE TABLE `iycms_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id号',
  `pid` int(11) DEFAULT '0' COMMENT '所属id',
  `name` char(50) DEFAULT NULL,
  `url` char(200) DEFAULT NULL,
  `isurl` int(2) DEFAULT '1' COMMENT '是否连接',
  `isan` int(2) DEFAULT '2' COMMENT '是否展开',
  `icon` char(50) DEFAULT NULL,
  `state` int(2) DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COMMENT='后台菜单';

-- -----------------------------
-- 表数据  `iycms_menu` 共51条
-- -----------------------------
INSERT INTO `iycms_menu` VALUES ('1','0','关于我','javascript:;','0','1','&#xe612;','1');
INSERT INTO `iycms_menu` VALUES ('2','0','文章','javascript:;','0','1','&#xe609;','1');
INSERT INTO `iycms_menu` VALUES ('3','0','互动','javascript:;','0','1','&#xe63a;','1');
INSERT INTO `iycms_menu` VALUES ('4','0','系统','javascript:;','0','1','&#xe620;','1');
INSERT INTO `iycms_menu` VALUES ('5','0','数据库','javascript:;','0','1','&#xe857;','1');
INSERT INTO `iycms_menu` VALUES ('6','0','退出登陆','/admin/login/out','1','1','&#xe65c;','1');
INSERT INTO `iycms_menu` VALUES ('7','0','开发者官网','http://www.iycms.com/','1','1','&#xe65f;','1');
INSERT INTO `iycms_menu` VALUES ('8','1','个人资料','personal/info','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('9','1','技能管理','personal/skills','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('10','1','工作经验','work/index','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('11','1','添加工作经验','work/add','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('12','1','修改工作经验','work/update','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('13','1','修改工作经验状态','work/state','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('14','2','栏目管理','category/index','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('15','2','添加栏目','category/add','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('16','2','修改栏目','category/update','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('17','1','删除工作经验','work/del','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('18','2','删除栏目','category/del','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('19','2','修改栏目状态','category/state','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('20','2','文章管理','article/index','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('21','2','添加文章','article/add','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('22','2','修改文章','article/update','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('23','2','修改文章状态','article/state','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('24','2','删除文章','article/del','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('25','3','评论管理','comments/index','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('26','3','回复评论','comments/add','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('27','3','删除评论','comments/del','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('28','3','留言管理','leave/index','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('29','3','回复留言','leave/add','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('30','3','删除留言','leave/del','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('31','3','审核留言','leave/state','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('32','3','审核评论','comments/state','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('33','4','导航管理','nav/index','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('34','4','添加导航','nav/add','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('35','4','修改导航','nav/update','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('36','4','删除导航','nav/del','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('37','4','修改导航状态','nav/state','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('38','2','文章置顶','article/top','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('39','4','友情连接','flink/index','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('40','4','添加友情','flink/add','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('41','4','友情状态','flink/state','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('42','4','修改友情','flink/update','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('43','4','删除友情','flink/del','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('44','4','网站配置','config/index','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('45','4','修改密码','config/password','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('46','4','清除缓存','config/cache','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('47','5','备份数据库','mysql/backup','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('48','5','还原数据库','mysql/reduction','1','2','','1');
INSERT INTO `iycms_menu` VALUES ('49','5','下载备份','mysql/download','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('50','5','删除备份','mysql/del','1','2','','0');
INSERT INTO `iycms_menu` VALUES ('51','0','','','1','2','','0');
