<template>
	<div class="container-index">
		<!--fixed-->
		<div class="background-fixed">
			<div class="blog-container">
				<h1 class="blog-name">あ读鈊茚ケ</h1>
				<p class="blog-description">探索计算机的奥秘是我们的乐趣,也是我们奋不顾身的理由<br />
我们是开发者,我们是程序员,一群与众不同的人!</p>
				<div class="index-btns">
					<a target="_blank" href="https://github.com/S-mohan" class="index-btns-btn">
						<i class="mo-icon-github"></i> GitHub
					</a>
					<a href="kkk" class="index-btns-btn">进入博客</a>
				</div>
			</div>
		</div>
		
		<!--使用技术-->
		<div class="container-body">
			<h1>ThinkPHP5 && Vue 2</h1>
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
			<div><a>你发阴影</a><a>你发阴影</a><a>你发阴影</a><a>你发阴影</a><a>你发阴影</a> <a>+申请友情</a></div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'index',
		data() {
			return {
			}
		},
		created(){
			this.$emit("SetHeader",false);
		},
	
		
	}
</script>

<style>
	@import "../../static/home/css/index.css";
</style>