<template>
	<div id="app"
		v-loading.fullscreen.lock="!show"
		:element-loading-text="loading"
		element-loading-background="rgba(0, 0, 0, 0.5)"
		@click="floating">

		<!--头部-->
		<IycmsHeader v-if="show" :nav="nav" :ShowHeader="ShowHeader" @SetHeader="set_header"  @scrollTop="set_scrollTop" ></IycmsHeader>
		<!--主体~路由-->
		<transition name="el-fade-in"> <!-- 动画效果 -->
			<router-view v-if="show" :init="init" @SetHeader="set_header"  @SetScrollTop="returnTop" @gets="gets"  @posts="posts" ></router-view>
		</transition>
		<!--尾部-->
		<IycmsFooter v-if="show" :init="init"></IycmsFooter>

		<!--开门效果-->
		<div :class="{'maskl':true,'maskl2':show}"></div>
		<div :class="{'maskr':true,'maskr2':show}"></div>

		<!--点击特效-->
		<div class="floatig">
			<font v-for="vo in keys.list" v-show="vo.show" :style="{top:vo.yy+'px',left:vo.xx+'px',opacity:vo.opacity}">{{vo.name}}</font>
		</div>

		<!--返回顶部-->
		<transition name="el-fade-in-linear">
			<div v-show="top" @click="returnTop" class="top"><i class="iconfont">&#xe610;</i></div>
		</transition>

	</div>
</template>
<script>
	export default {
		data() {
			return {
				host: "http://www.blog.com", //api接口
				show: false, //显示页面
        loading:"数据加载中...",
				ShowHeader: false, //导航切换
				top: false, //返回顶部
				init:{},
				nav: [
					// {name:"更多",url:"/about",an:false,list:[
					// 	{name:"友情链接",url:"/info"},
					// ]},
					{name:"关于我",url:"/info"},
					{name:"留言",url:"/leave"},
					// {name:"作品",url:"/works"},
					{name:"实验室",url:"/experiment"},
					// {name:"归档",url:"/archive"},
					{name:"博文",url:"/article"},
					{name:"首页",url:"/",active:true}
				],
				keys:{
					list:[
						{name:"php",show:false,yy:0,xx:0,opacity:1},
						{name:"css",show:false,yy:0,xx:0,opacity:1},
						{name:"python",show:false,yy:0,xx:0,opacity:1},
						{name:"java",show:false,yy:0,xx:0,opacity:1},
						{name:"mysql",show:false,yy:0,xx:0,opacity:1},
						{name:"php",show:false,yy:0,xx:0,opacity:1},
					],
					i:0
				},
        isMobile:false
			};
		},
		created: function(){

      var ua = navigator.userAgent;

      var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
          isIphone = ipad || ua.match(/(iPhone\sOS)\s([\d_]+)/),
          isAndroid = ua.match(/(Android)\s+([\d.]+)/),
          isMobile = isIphone || isAndroid;
      if(isMobile){
        this.loading = "请使用电脑访问"
        return;
      }


      if (!!window.ActiveXObject || "ActiveXObject" in window) {
        this.loading = "请勿使用IE浏览器,或兼容模式! 推荐使用谷歌,360浏览器"
        return;
      }



			var self = this;

      //api根地址
      if(document.domain=="127.0.0.1" || document.domain=="www.blog.com"){ //webpack环境下
        this.host = "http://www.blog.com";
      }else{
        this.host = "http://blog.php127.com"; //正式上线
      }

			if(sessionStorage.init){
        setTimeout(function () {
          self.show = true; //重新加载,延时一秒
        },1000)
				self.init = JSON.parse(sessionStorage.init);
			}else{
				//加载初始数据
				this.gets({url:'/api/index.html',success:function(e){
					if(e.status==200){
						self.show = true;
						self.init = e.data;
						sessionStorage.init = JSON.stringify(e.data);
					}else{
						self.$message.error('服务器异常');
					}
				},error:function(e){
					self.$message.error('服务器异常');
				}});
			}

			//切换浏览器标签 切换标题
			var hiddenProperty = 'hidden' in document ? 'hidden' :
				'webkitHidden' in document ? 'webkitHidden' :
				'mozHidden' in document ? 'mozHidden' :
				null;
			var visibilityChangeEvent = hiddenProperty.replace(/hidden/i, 'visibilitychange');
			var Tiao;
			var onVisibilityChange = function(){
				if (!document[hiddenProperty]) {
					clearInterval(Tiao);
					document.title = sessionStorage['title']

				}else{
					var a = false;
					Tiao = setInterval(function(){
						document.title = a ? "千万别走,BUG出现!!!" : "➟千万别走,BUG出现!!!";
						a = !a;
					},50);
				}
			}
			document.addEventListener(visibilityChangeEvent, onVisibilityChange);

		},
		methods: {
			//导航状态
			set_header:function(e){
				this.ShowHeader = e;
			},
			//显示返回顶部
			set_scrollTop:function(e){
				if(e>300){
					this.top = true;
				}else{
					this.top = false;
				}
			},
			//点击特效
			floating : function(e){
				//排除某些元素
				if(e.target.nodeName=="A" || e.target.nodeName=="I"){
					return false;
				}
				var self = this;
				var n = self.keys.i;
				self.keys.list[n].yy = e.clientY;
				self.keys.list[n].xx = e.clientX;
				self.keys.list[n].show = true;
				self.keys.list[n].opacity = 1;
				setTimeout(function(){
					self.keys.list[n].opacity = 0.1;
					self.keys.list[n].yy = e.clientY-50;
				},10)

				setTimeout(function(){
					self.keys.list[n].show = false;
				},1000)

				self.keys.i = (self.keys.i==self.keys.list.length-1) ? 0 : ++self.keys.i;
			},
			//返回顶部
			returnTop:function(){
				var top = setInterval(function(){
					if(document.body.scrollTop){
						document.body.scrollTop-=10;
						if(document.body.scrollTop<=0){
							clearInterval(top)
						}
					}else{
						document.documentElement.scrollTop-=10;
						if(document.documentElement.scrollTop<=0){
							clearInterval(top)
						}
					}
				},1)
			},
			//封装ajax get请求
      gets:function({url,success,error}){
        this.$http.get(this.host+url).then(success).catch(error);
      },
      //封装ajax post请求
      posts:function({url,data,success,error}){

        this.$http({
          method: 'post',
          url: this.host+url,
          data: this.$qs.stringify(data)
        }).then(success).catch(error);

        //this.$http.post(this.host+url,data).then(success).catch(error);
      }
		},


	}
</script>

<style>

	.floatig font{
		position: fixed;
		left: 0;
		top: 0;
		cursor:default;
		color: var(--color);
		-webkit-touch-callout: none; /* iOS Safari */
		-webkit-user-select: none; /* Chrome/Safari/Opera */
		-khtml-user-select: none; /* Konqueror */
		-moz-user-select: none; /* Firefox */
		-ms-user-select: none; /* Internet Explorer/Edge */
		user-select: none; /* Non-prefixed version, currently
		not supported by any browser */
		transition:all 2s;
		-moz-transition:all 2s;
		-webkit-transition:all 2s;
		-o-transition:all 2s;
	}
	.maskl,.maskr{
		position: fixed;
		width: 50%;
		height: 100%;
		background-color: rgba(0,0,0,0.8);
		top: 0;
		z-index: 101;
		transition:all 2s;
		-moz-transition:all 2s;
		-webkit-transition:all 2s;
		-o-transition:all 2s;
	}
	.maskl{
		left: 0;
	}
	.maskr{
		right: 0;
	}

	.maskl2{
		left: -50%;
	}

	.maskr2{
		right: -50%;
	}

	.top{
		cursor:pointer;
		position: fixed;
		width: 50px;
		height: 50px;
		line-height: 50px;
		text-align: center;
		bottom: 50px;
		left: 50%;
		margin-left: 600px;
		background-color: rgba(255,255,255,0.5);
		transition:all 2s;
		-moz-transition:all 2s;
		-webkit-transition:all 2s;
		-o-transition:all 2s;
	}
	.top i{
		font-size: 24px;
		color: #CCC;
		transition:all 2s;
		-moz-transition:all 2s;
		-webkit-transition:all 2s;
		-o-transition:all 2s;
	}
	.top:hover i{
		color: var(--color);
	}
	.top:hover{
		background-color: rgba(255,255,255,1);
	}

</style>
