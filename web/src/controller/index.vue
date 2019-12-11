<template>
	<div class="container-index">
		<!--fixed-->
		<div class="background-fixed">
			<div class="blog-container">
				<h1 class="blog-name">{{init.info.nick || init.info.name}}<p style="font-size: 16px; color:#666">WEB全栈开发工程师</p></h1>
				<p class="blog-description" v-html="init.info.desc"> </p>
				<div class="index-btns">
					<a target="_blank" :href="init.info.github" class="index-btns-btn">
						<i class="iconfont">&#xeee2;</i> GitHub
					</a>
					<router-link to="/article" class="index-btns-btn">进入博客</router-link>
				</div>
			</div>
		</div>
		
		<!--使用技术-->
		<div class="container-body">
			<h1>ThinkPHP 5 && Vue 2</h1>
			<p class="description">博客尝试使用以下技术框架构建</p>
			<div class="technology">
				<div class="core">
					<b class="fed">FED</b>
					<b class="api">API</b>
				</div>
				<div class="list">
					<div class="l">
						<em></em>
						<ul>
							<li>Vue 2</li>
							<li>Element 2</li>
							<li>Layui 2</li>
							<li>...</li>
						</ul>
					</div>
					<div class="r">
						<em></em>
						<ul>
							<li>ThinkPHP 5</li>
							<li>Lnmp</li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<!--关于我-->
		<div class="container-about">
			<h1>关于我,关于博客</h1>
			<span>从接触网络,从兴趣爱好,从兼职接单,到职业程序员的我</span>
			
			<p>あ读鈊茚ケ 经常用唯美女孩头像出像在各大社区,其实他叫小曾  2007年接触photoshop</p>
			<p>	2010年学习html/css/js/php...等编程语言 2012年开始计划着自己的小项目,2015年进入东莞某某公司负责项目的核心开发</p>
			<p>	2018年驻入深圳龙华,并开发了本套博客系统 探索计算机的奥秘是我们的乐趣,也是我们奋不顾身的理由</p>
			<p>我们是开发者,我们是程序员,一群与众不同的人!</p>
			
		</div>
		
		<!--关于我-->
		<div class="container-flink">
			<h1>友情链接</h1>
			<div><a v-for="vo in init.flink" :href="vo.url" target="_blank">{{vo.name}}</a></div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['init'],
		data() {
			return {
			}
		},
		created(){
			this.$emit("SetHeader",false);
			this.$emit("SetScrollTop");
			sessionStorage['title'] = document.title = "首页 - "+(this.init.info.nick || this.init.info.name)+ "的博客"

		}
	}
</script>