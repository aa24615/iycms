<template>
	<el-header :class="{'el-header2':header2}">
		<div class="container">
			<div :class="{logo:true,logo2:header2}">
			</div>
			<ul>
				<li v-for="vo,i in nav" @mouseenter="onAn(i)" @mouseleave="onAn(i)" :class="{ active: active(vo.url) }">
					<router-link :to="vo.url"   >
						{{vo.name}}
						<i v-if="vo.list" class="iconfont">&#xe620;</i>
					</router-link>
					<el-collapse-transition>
						<div v-if="vo.list && vo.an">
							<router-link v-for="vo2 in vo.list" :to="vo2.url">{{vo2.name}}</router-link>
						</div>
					</el-collapse-transition>
				</li>
			</ul>
		</div>
	</el-header>
</template>

<script>
	export default {
		name: 'header',
		props: ['nav','header2'],
		data() {
			return {
				header2:false
			}
		},
		computed: {
			
		},
		mounted: function(){
			window.addEventListener('scroll',this.handleScroll)
		},
		methods: {
			active: function(e) {
				if(this.$route.path == e) {
					return true;
				} else {
					return false;
				}
			},
			onAn: function(i) {		
				this.nav[i].an = !this.nav[i].an;
			},
			handleScroll:function(){
				if(this.$route.path=="/"){
					if(document.body.scrollTop>640){
						this.header2 = true;
					}else{
						this.header2 = false;
					}
				}else{
					this.header2 = true;
				}
			}
		},
	}
</script>

<style>
	/*header*/
	
	.el-header {
		position: fixed;
		width: 100%;
		top: 0;
		z-index: 100;
		background-color: initial;
		color: #333;
		text-align: center;
		line-height: 60px;
		transition:all 1s;
		-moz-transition:all 1s;
		-webkit-transition:all 1s;
		-o-transition:all 1s;
	}
	
	.el-header .logo {
		float: left;
		height: 60px;
		width: 300px;
		text-align: left;
		background-image: url(/static/home/img/logo.png);
		background-repeat: no-repeat;
		transition:all 1s;
		-moz-transition:all 1s;
		-webkit-transition:all 1s;
		-o-transition:all 1s;
	}
	.el-header .logo2 {
		transition:all 1s;
		-moz-transition:all 1s;
		-webkit-transition:all 1s;
		-o-transition:all 1s;
		background-position: 0px -60px;
	}
	.el-header ul {
		float: right;
		width: 800px;
	}
	
	.el-header ul li {
		position: relative;
	}
	
	.el-header ul li.active>a,
	.el-header ul li>a:hover {
		border-bottom: #009688 solid 2px;
	}
	
	.el-header ul li a {
		color: #F0F9F2;
	}
	
	.el-header ul li>a {
		display: block;
		float: right;
		height: 40px;
		margin: 10px 5px;
		padding: 0 20px;
		line-height: 40px;
		font-size: 16px;
	}
	
	.el-header ul li>a i {
		margin-left: 5px;
	}
	
	.el-header ul li div {
		/*display: none;*/
		position: absolute;
		min-width: 100px;
		top: 50px;
		right: 12px;
		
	}
	
	.el-header ul li div a {
		width: 100%;
		height: 30px;
		line-height: 30px;
		display: block;
	}
	
	
	
	.el-header2 {
		transition:all 1s;
		-moz-transition:all 1s;
		-webkit-transition:all 1s;
		-o-transition:all 1s;
		background-color: #FFF;
		box-shadow: 0 0.0625rem 0.3125rem rgba(0,0,0,.09);
	}
	
	.el-header2 ul li a{
		color: #333;
	}
	.el-header2 ul li div{
		background-color: #FFF;
		box-shadow: 0 0.0625rem 0.3125rem rgba(0,0,0,.09);
	}
	.el-header2 ul li div a:hover {
		background-color: rgba(100, 100, 100, 0.2);
	}
	
	
</style>