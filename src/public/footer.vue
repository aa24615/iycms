<template>
	<el-footer>

		<div class="container">
			<div class="main">
				<el-row :gutter="20">
					<el-col :span="12">
						<h2>あ读鈊茚ケ</h2>
						<p>探索计算机的奥秘是我们的乐趣,也是我们奋不顾身的理由</p>
						<p>我们是开发者,我们是程序员,一群与众不同的人!</p>
					</el-col>
					<el-col :span="8">
						<h2>相关链接</h2>
						<p>
							<a>博文</a>
							<a>归档</a>
							<a>实验室</a>
							<a>关于我</a>
						</p>
					</el-col>
					<el-col :span="4">
						<h2>关于</h2>
						<p>
							<a>博文</a>
							<a>归档</a>
							<a>实验室</a>
							<a>关于我</a>
						</p>
					</el-col>
				</el-row>

			</div>
			<div class="copyright">
				Copyright © 2012-2017 Smohan. All Rights Reserved.盗版必究.V.6.1.0.蜀ICP备16016092号-2.
			</div>
		</div>
	</el-footer>
</template>

<script>
	export default {
		name: 'footer',
		data() {},
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
	
	.el-footer .container .main p {
		font-size: 14px;
	}
	
	.el-footer .container .main a {
		margin-right: 10px;
		color: #CCCCCC;
	}
	
	.el-footer .container .copyright {
		text-align: center;
		margin-top: 20px;
	}
</style>