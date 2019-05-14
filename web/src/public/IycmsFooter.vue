<template>
	<el-footer>

		<div class="container">
			<div class="main">
				<el-row :gutter="20">
					<el-col :span="12">
						<h2>{{init.info.nick || init.info.name}}</h2>
						<p v-html="init.info.desc"></p>
					</el-col>
					<el-col :span="8">
						<h2>相关链接</h2>
						<p>
							<router-link to="/article">博文</router-link>
							<!-- <router-link to="/archive">归档</router-link> -->
							<router-link to="/leave">留言</router-link>
							<router-link to="/experiment">实验室</router-link>
						</p>
					</el-col>
					<el-col :span="4">
						<h2>关于</h2>
						<p>
							<router-link to="/info">关于我</router-link>
							<router-link to="/info">专业技能</router-link>
							<router-link to="/info">工作经验</router-link>
						</p>
					</el-col>
				</el-row>

			</div>
			<div class="copyright">
				<div class="l">
					<span v-html="init.web.powerby"></span>
					<a href="http://www.miitbeian.gov.cn/" target="_blank">{{init.web.beian}}</a></div>
				<div class="r">
					<i class="iconfont">&#xe654;</i>
					<a :href="'http://wpa.qq.com/msgrd?v=3&uin='+init.info.qq+'&site=qq&menu=yes'" target="_blank"><i class="iconfont">&#xe63c;</i></a>
					<a :href="init.info.github" target="_blank"><i class="iconfont">&#xeee2;</i></a>
				</div>
			</div>
		</div>
	</el-footer>
</template>

<script>
	export default {
		props: ['init'],
		methods: {

		},
	}
</script>

<style>
	.el-footer {
		padding: 30px 0 50px 0;
		height: auto !important;
		color: #CCC;
		background-color: rgb(84, 92, 100);
	}
	
	.el-footer .container .main {
		padding: 20px 0;
		display: flex;
		border-bottom: solid 1px #7b7b7b;
	}
	
	.el-footer .container .main div {
		flex: 1;
	}
	
	.el-footer .container .main div h2 {
		margin-bottom: 10px;
	}
	.el-footer .container a{
		color: #CCCCCC;
	}
	.el-footer .container a:hover{
		color:var(--color);
	}
	.el-footer .container .main p {
		font-size: 14px;
	}
	
	.el-footer .container .main a {
		margin-right: 10px;
	}
	
	.el-footer .container .copyright {
		text-align: center;
		margin-top: 20px;
	}
	
	.el-footer .container .copyright i{
		font-size: 30px;
		margin: 0 0 0 5px;
	}
</style>