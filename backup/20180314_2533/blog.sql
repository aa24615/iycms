
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
