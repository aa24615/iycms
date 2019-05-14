<template>
	<el-container>
		<div class="container" v-loading.fullscreen.lock="!show" element-loading-text="拼命加载中" element-loading-background="rgba(255, 255, 255, 0.5)" >
			<div class="experiment">
				<ul>
					<li v-for="vo in list" style="" class="l">
						<router-link :to="'/content/'+vo.id">
							<img :src="vo.pic" width="100%" />
							<strong>{{vo.title}}</strong>
						</router-link>
						<p>{{vo.desc}}</p>
						<span>
							<i class="iconfont l" v-text="vo.date"></i>
							<i class="iconfont r" v-html="'&#xe68a;'+vo.a"></i>
							<i class="iconfont r" v-html="'&#xe681;'+vo.z"></i>
							<i class="iconfont r" v-html="'&#xe604;'+vo.p"></i>
						</span>
					</li>
				</ul>
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
				list:[],
			}
		},
		created() {
			this.$emit("SetHeader", true);
			this.$emit("SetScrollTop");
			sessionStorage['title'] = document.title = "实验室 - "+(this.init.info.nick || this.init.info.name)+ "的博客"
			var self = this;
			var name = 'experiment';
			if (sessionStorage[name]){
				var data  = JSON.parse(sessionStorage[name]);
				self.show = true;
				self.list = data;
			}else{
				this.$emit("gets",{url:'/api/article/experiment.html',success:function(e){
					if(e.status==200){
						self.show = true;
						self.list = e.data;
						sessionStorage[name] = JSON.stringify(e.data);
					}
				},error:function(e){
					self.$message.error('服务器异常');
				}});
			}
		},
		methods: {
			
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
		height: 82px;
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
