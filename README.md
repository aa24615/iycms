# IYCMS 博客管理系统

专为程序员订制的博客系统 一个全站无刷新的博客    

先睹为快->传送门 [blog.php127.com](http://blog.php127.com/)






## 后台说明

- 后台基于 ThinkPHP5.0 + Layui2.x 开发 

### 运行环境

php5.4 以上版本

mysql 5.5 以上版本 且打开 InnoDB 引擎

apache or nginx 

### 配置&安装 

```
/application/database.php 配置数据库
/public 项目入口
/backup/* 数据库文件
```
使用composer安装所有依赖包
```
$ composer install
```
apache 无须配置伪静态   
推荐使用[宝塔](http://www.bt.cn/)主机面板 or [AMH](https://amh.sh/index.htm?amh)主机面板

大部分环境不支持直接绑定到public 目录 须要手工修改指定

nginx 伪静态规则

``` nginx
location / {
    if (!-e $request_filename){
	rewrite  ^(.*)$  /index.php?s=$1  last;   break;
    }
}
```
后台 /admin/login/index.html 用户名 admin 密码 admin

其他事项(暂无) 请参考[ThinkPHP5.0手册](https://www.kancloud.cn/manual/thinkphp5/118003)






## 前台说明

- 前台基于 Vue.js + element-ui 开发 由 vue-cli webpack 编译    

- 前台文件在/web 目录下

### 核心文件 (之外的可选文件)
```
/src
/static
/index.html
```

### 开发前请安装node.js 并运行以下命令安装vue以及依赖

``` bash
$ npm i vue -g
$ npm i vue-cli -g
$ vue init webpack
    输入y 回车
    输入项目名称 如 app 回车
    再次回车
    输入作者 如 iycms 回车
    回车 输入y 回车
    输入n 回车
    输入n 回车
    输入n 回车
    选择第三项 No, I will handle that myself
$ npm i element-ui
# 安装依赖包资源较大,建议使用淘宝NPM国内镜像 详情请进 http://npm.taobao.org/
$ npm i
```
### 如何调试

先配置api根地址   
在 [/src/App.vue](src/App.vue) 文件中 内附注释

``` bash
$ npm run dev
# 浏览器打开 http://127.0.0.1:8080 即可看到实时界面
```
### 如何编译

``` bash
$ npm run build
# 编译后,文件会存放到 /dist/下
```
### 编译注意事项
> 如果重新始初化webpack的话 资源文件打包路径会有错   
> 将可选文件夹 /dist /config /build 复盖您的webpack


## 如何布暑

建议前后端分为两个站点

前台 www.xxx.com

后台 api.xxx.com

前端打包后,将/dist/ 下的 文件 放到www.xxx.com 站点下

后台将文件放到api.xxx.com 下即可 


### 联系我们

- QQ群: [324098841](http://shang.qq.com/wpa/qunwpa?idkey=6f5462146888da75feaaa1fe1ab3addfcea63f6454548238033c6a91fa610e4e)

- 博客: [blog.php127.com](http://blog.php127.com)

- 更多开源项目: [github.com/aa24615](https://github.com/aa24615)

