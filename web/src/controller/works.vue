<template>
	<el-container>
		<div class="container">
			<div class="experiment">
				<ul>
					<li v-for="vo in 10" style="" class="l">
						<router-link to="/"><img src="/static/home/img/article-li.jpg" width="100%" />
						<strong>这是标题这是标题这是标题这是标题这是标题</strong></router-link>
						<p>这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述这是描述</p>
						<span>

							<i class="iconfont l">2017-11-15</i>

							<i class="iconfont r">&#xe68a;123</i>
								<i class="iconfont r">&#xe681;233</i>
								<i class="iconfont r">&#xe604;33</i></span>
					</li>
				</ul>
			</div>
		</div>
	</el-container>
</template>
<script>
	export default {
		data() {
			return {
				currentDate: new Date()
			}
		},
		created() {
			this.$emit("SetHeader", true);
			this.$emit("SetScrollTop");
		},
		methods: {
			handleSizeChange(val) {
				console.log(`每页 ${val} 条`);
			},
			handleCurrentChange(val) {
				console.log(`当前页: ${val}`);
			}
		}
	}
</script>

<style>
	.experiment ul li{
		width: 25%; padding: 0 10px;
		margin-bottom: 20px;

		overflow: hidden;
	}
	.experiment ul li *{
		background-color: #FFFFFF;
	}
	.experiment ul li img{
		height: 180px;
	}
	.experiment ul li span,.experiment ul li p{
    	padding:0 10px 10px 10px;
	}

	.experiment ul li strong{
		display: block;

		padding:5px 10px 5px 10px;
		white-space: nowrap;
    	text-overflow: ellipsis;
    	overflow: hidden;
	}
	.experiment ul li span{
		display: block;
		overflow: hidden;
	}
	.experiment ul li p{
		height: 84px;
		font-size: 14px;
		color: #666;
		text-overflow: ellipsis;
    	overflow: hidden;
	    display: -webkit-box;
	    -webkit-line-clamp: 4;
	    -webkit-box-orient: vertical;
	}

	.experiment ul li:nth-child(4n){
		padding: 0px 0px 0px 10px;
	}
	.experiment ul li:nth-child(4n-3){
		padding: 0px 10px 0px 0px;
	}

</style>
