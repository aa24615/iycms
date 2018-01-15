<template>
	<div id="app" v-loading.fullscreen.lock="!show">
		<Header :nav="nav" :header2="header2" ></Header>
		<router-view @SetHeader="set_header2" ></router-view>
		<Footer></Footer>
		<div :class="{'maskl':true,'maskl2':show}"></div>
		<div :class="{'maskr':true,'maskr2':show}"></div>
		<!--<img v-show="!show" src="../static/home/img/loading.gif" id="loading" />-->
	</div>
</template> 
<script>
	export default {
		data() {
			return {
				show: false,
				header2: false,
				nav: [{name:"关于我",url:"/about",an:false,list:[{name:"个人资料",url:"/article"},{name:"专业技能",url:"/article"},{name:"项目经验",url:"/article"},{name:"工作经历",url:"/article"},]},{name:"留言",url:"/experiment"},{name:"实验室",url:"/experiment"},{name:"归档",url:"/archive"},{name:"博文",url:"/article"},{name:"首页",url:"/",active:true,}],
			};
		},
		
		created: function(){
			
		},
		mounted: function(){
			var self = this;
			setTimeout(function(){
				console.log(self.show)
				self.show = true;
			},3000)
		},
		methods: {
			set_header2:function(e){
				this.header2 = e;
				console.log(this.show)
			}
		},
		
	}
</script>

<style>
	#loading{
		position: fixed;
		width: 814px;
		height: 400px;
		top: 50%;
		left: 50%;
		margin-left: -407px;
		margin-top: -200px;
		z-index: 102;
	}
	.maskl,.maskr{
		position: fixed;
		width: 50%;
		height: 100%;
		background-color: #FFF;
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
	
	
	
	
</style>