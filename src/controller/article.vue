<template>
	<el-container>
		<div class="container">
			<el-row :gutter="20">
				<!--文章盒子-->
				<el-col :span="18" class="article-list">
					<!--文章列表-->
					<el-row v-for="i in 5" class="li">
						<el-col :span="8">
							<img src="/static/home/img/article-li.jpg" />
						</el-col>
						<el-col :span="16">
							<h1>请问做个网站多少钱？</h1>
							<p>Fwcms.cn推出模板建站系统，用户可通过网站直接自助下单，实现自助建站，模板建站主要针对网站建设小需求客户，最大的优点就是价格低、速度快，如果选用海外空间，可以立刻上线网站。缺点当然是可能会撞脸。下面方维网络把客户常见的问题以及答案整理如下： 1、建站版本基础版、标准...
							</p>
						</el-col>
					</el-row>
					
				</el-col>
				<el-col :span="6">
					<div class="article-type">
						<h1>文章分类</h1>
					</div>
				</el-col>
			</el-row>
		</div>
	</el-container>
</template>

<script>
	export default {
		name: 'index',
		data() {
			return {
				msg: 'Welcome to Your Vue.js App'
			}
		},
		created() {
			this.$emit("SetHeader", true);
		},
		methods: {

		}
	}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
	
	.article-list .li{
		height: 170px;
		margin-bottom: 20px;
		box-shadow: 0px 0px 15px #ccc;
	}
	.article-list .li .el-col-8 {
		height: 100%;
		padding: 5px;
	}
	.article-list .li .el-col-8 img{
		height: 100%;
		width: 100%;
	}
	
	.article-list .li .el-col-16 {
		padding: 20px;
		float: left;
		background-color: #FFFFFF;
		height: 100%;
	}
	.article-list .li .el-col-16 h1{
		color: #333;
	}
	.article-list .li .el-col-16 p{
		color: #666;
	}
	
	
	.article-type{
		padding: 20px;
		background-color: #FFFFFF;
	}
</style>