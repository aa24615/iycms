<template>
	<el-container>
		<div class="content" v-loading.fullscreen.lock="!show" element-loading-text="拼命加载中" element-loading-background="rgba(255, 255, 255, 0.5)" >
			<div class="content-head mb20">
				<h1 v-text="article.title"></h1>
			</div>
			<div class="container background p20">

				  	<div class="body" v-html="article.body"></div>

				  	<div class="info">
						<p>
						所属分类: <a :href="'/article/t/'+article.type">{{article.typename}}</a> 发表时间: <span>{{article.time}}</span>
							最后更新: <span>{{article.update}}</span> </p>
						<p>浏览量: <span>{{a}}</span> TAG:
						<el-tag v-for="vo in article.tag" size="mini">{{vo}}</el-tag>
						</p>
						<p class="warning">
							本文标题: {{article.title}}<Br />
							本文链接: {{article.url}}<br />
							版权声明: 若无特殊注明，本文皆为《 {{init.info.nick || init.info.name}} 》原创，转载请保留文章出处。

						</p>
				  	</div>
					<div class="share">
						<a href="javascript:;" @click="onZan" title="点个赞"><i class="iconfont">&#xe652;</i>{{article.z}}</a>
						<a :href="article.qz_share" target="_blank" title="分享到QQ空间"><i class="iconfont">&#xe6e4;</i></a>
						<a :href="article.qq_share" target="_blank" title="分享给QQ好友"><i class="iconfont">&#xe63c;</i></a>
						<a :href="article.wb_share" target="_blank" title="分享到微博"><i class="iconfont">&#xe6a3;</i></a>
						<a href="#" title="分享到微信朋友圈"><i class="iconfont">&#xe6e2;</i></a>
					</div>

					<!-- <div class="comments">
						<el-input type="textarea" :rows="5" resize="none" placeholder="请输入想您说的话..." v-model="content"></el-input>
						<div class="tools">
							<i @click="setB" class="iconfont">&#xe6fe;</i>
							<i @click="setFACE" class="iconfont">&#xe659;</i>
							<i @click="setREFER" class="iconfont">&#xe65d;</i>
							<i @click="setIMG" class="iconfont">&#xe791;</i>
							<i @click="setCODE" class="iconfont">&#xe6b9;</i>
							<i @click="setURL" class="iconfont">&#xe63e;</i>
							<el-button class="r">提交评论</el-button>
						</div>
					</div> -->


				  	<!-- <div class="toc">
					  	<div class="title"><h1 class="l">目录[TOC]</h1></div>
						<div class="content">
							<ul>
								<li v-for="vo,i in 10"> - <router-link to="/">我是文单1{{vo}}1111</router-link></li>
							</ul>
						</div>
				  	</div> -->

			</div>
		</div>
	</el-container>
</template>
<script>

	export default {
		props: ['init'],
		data() {
			return {
				show:false,
				article:{},
				content:'',
				a:0,
			}
		},
		created() {

			var id = this.$route.params.id;
			this.$emit("SetHeader", true);
			this.$emit("SetScrollTop");

			var self = this;
			var name = 'content_'+id;
			if (sessionStorage[name]){
				var data  = JSON.parse(sessionStorage[name]);
				self.show = true;
				self.article = data;
				self.setTitle();
				setTimeout(function(){
					uParse(".body", {rootPath: '../static/home/ueditor/'})
				},500)
			}else{
				this.$emit("gets",{url:'/api/article/content.html?id='+id,success:function(e){
					if(e.status==200){
						self.show = true;
						self.article = e.data;
						sessionStorage[name] = JSON.stringify(e.data);
						self.setTitle();
						setTimeout(function(){
							uParse(".body", {rootPath: '../static/home/ueditor/'})
						},500)
					}
				},error:function(e){
					self.$message.error('服务器异常');
				}});
			}

			//人气
			this.$emit("gets",{url:'/api/article/a.html?id='+id,success:function(e){self.a = e.data.a;}});

		},
		methods: {
			setTitle :function(){
				sessionStorage['title'] = document.title = this.article.title+" - "+(this.init.info.nick || this.init.info.name)+ "的博客"
			},
			setB: function(){
				this.content += "[b][/b]";
			},
			setURL: function(){
				this.content += "[url][/url]";
			},
			setFACE: function(){
				this.content += "[url][/url]";
			},
			setREFER: function(){
				this.content += "[r][/r]";
			},
			setIMG: function(){
				this.content += "[img][/img]";
			},
			setCODE: function(){
				this.content += "[code][/code]";
			},
			onZan:function(){
				var self = this;
				this.$emit("gets",
				{url:'/api/article/z.html?id='+this.article.id,
				success:function(e){
					if(e.status==200){
						if(e.data.code==1){
							self.article.z +=1;
							self.$message.success('点赞 +1');
						}else{
							self.$message.error('点赞失败');
						}
					}
				},error:function(e){
					self.$message.error('服务器异常');
				}
				});
			}
		}
	}
</script>
<style>
	.content{
		width: 100%;
	}
	.content .container {
		position: relative;
	}

	.content .container .toc{
		width: 200px;
		position: absolute;
		right: 20px;
		top: 20px;
	}
	.content .container .body *{
		max-width: 100%;
	}

	.content .container .info{
		color: #333;
		border-top: dashed 1px #ccc;
		padding: 10px 0;
		margin: 20px 0 10px 0;
	}

	.content .container .info span{
		color: #999;
	}
	.content .container .info p{
		margin: 5px 0;
	}
	.content .container .info .warning{
		border-left: solid 3px var(--color);
		padding: 10px;
		color: #666;
		background-color: rgba(0,0,0,0.05);
	}

	.content .share{
		border-top: dashed 1px #ccc;
		padding: 20px 0;
		text-align: center;
	}
	.content .share a{
		color: #CCC;
		margin: 10px
	}

	.content .share a i{
		font-size: 50px
	}

	.content .container .comments{
		border-top: dashed 1px #ccc;
		padding: 20px 0;
	}


	.content .container .comments .tools {
		margin-top: 5px;
	}

	.content .container .comments .tools i {
		font-size: 30px;
		color: #999999;
	}

	.content .container .comments .tools i:hover {
		color: var(--color);
		cursor: pointer;
	}



	.content-head{
		width: 100%;
		height: 200px;
		line-height: 200px;
		    position: relative;
		    overflow: hidden;
	}
	.content-head h1{
		z-index: 9;
		position: absolute;
		width: 100%;
		text-align: center;
		color: #fff;
		font-size: 40px;
	}
	.content-head:before{
		content: "";
		background: var(--color) url(/static/home/img/article-li.jpg);
		background-repeat: no-repeat;
        background-position: center;
        background-size: cover;

      	-webkit-filter: blur(50px);
        -moz-filter: blur(50px);
        -o-filter: blur(50px);
        -ms-filter: blur(50px);
        filter: blur(50px);
        width: 100%;
		height: 400px;
		position: absolute;
		top: -100px;
		left: 0;
		z-index: 0;
	}
	.content-head:after{
		    content: "";
		    position: absolute;
		    top: 0;
		    left: 0;
		    z-index: 1;
		    width: 100%;
		    height: 100%;
		    background-color: rgba(0, 0, 0, .5);
	}

</style>
