# IYCMS 博客管理系统 后端源代码 [前端?](https://github.com/aa24615/iycms-fed)
> 专为程序员订制的博客系统 一个全站无刷新的博客   
> 基于 ThinkPHP5.0 + Layui2.x 开发  
> 先睹为快->传送门 [http://blog.php127.com](http://blog.php127.com)



## 运行环境

> php5.4 以上版本  
> mysql 5.5 以上版本 且打开 InnoDB 引擎  
> apache or nginx 

## 配置&安装 

```
/application/database.php 配置数据库
/public 项目入口
/backup/* 数据库文件

```
> apache 无须配置伪静态   
> 推荐使用[宝塔](http://www.bt.cn/)主机面板 or [AMH](https://amh.sh/index.htm?amh)主机面板

大部分环境不支持直接绑定到public 目录 须要手工修改指定

> nginx 伪静态规则

``` nginx
location / {
    if (!-e $request_filename){
	rewrite  ^(.*)$  /index.php?s=$1  last;   break;
    }
}
```
后台 /admin/login/index.html 用户名 admin 密码 admin

> 其他事项(暂无) 请参考[ThinkPHP5.0手册](https://www.kancloud.cn/manual/thinkphp5/118003)


## 联系我们

QQ群: [324098841](http://shang.qq.com/wpa/qunwpa?idkey=6f5462146888da75feaaa1fe1ab3addfcea63f6454548238033c6a91fa610e4e)      
QQ号: [839024615](http://wpa.qq.com/msgrd?v=3&uin=839024615&site=qq&menu=yes) 