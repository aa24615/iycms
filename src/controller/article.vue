<template>
	<el-container>
		<div class="container">
			<el-row :gutter="20">
				<!--文章盒子-->
				<el-col :span="18" class="article-list">
					<!--文章列表-->
					<el-row v-for="i in 5" class="li">
						<el-col :span="6">
							<img src="/static/home/img/article-li.jpg" />
						</el-col>
						<el-col :span="18">
							<router-link to="/"><h1>请问做个网站多少站多少站多少多少钱？</h1></router-link>
							<p>推出模板建站系统，用户可通过网站直接自助下单，实现自助建站，模板建站主要针对网站建设小需求客户，最大的优点就是价格低、速度快，如果选用海外空间，可以立刻上线网站。缺点当然是可能会撞脸。下面方维网络把客户常见的问题以及答案整理如建站系统，用户可通过网站直接自助下单，实现自助建站，模板建站主要针对网站建设小需求客户，最大当然是可能会撞脸。下面方维网络把客户常见的问题以及答案整理如建站系统，用户可通过网站直接自助下单，实现自助建站，模板建站主要针对网站建设小需求客户，最大的优点就是价格低、速度快，如果选用海外空间，可以立刻上线网站。缺点当然是可能会撞脸。下面方维网络把客户常见的问题以及答案整理如下： 1、建站版本基础版、标准...
							</p>
							<div class="article-info"><a href="">某某分类</a> 2018-01-15 15:55:33
							
							<span class="r">
								<i class="iconfont">&#xe68a;123</i>
								<i class="iconfont">&#xe681;233</i>
								<i class="iconfont">&#xe604;33</i>
								
							</span></div>
						</el-col>
					</el-row>
					
					<div class="page">
						<el-pagination background :page-size="30"   @size-change="handleSizeChange"
      @current-change="handleCurrentChange" layout="prev, pager, next"  :total="100"> </el-pagination>
					</div>
					
				</el-col>
				<el-col :span="6">
					<div class="article-type article-r">
						<ul>
							<li v-for="vo in type"><router-link :to="vo.url" :class="{active:vo.an}">{{vo.name}}</router-link>
								<ul v-if="vo.list">
									<li v-for="vo2 in vo.list">
										<router-link :to="vo2.url" :class="{active:vo.an}">{{vo2.name}}</router-link>
									</li>
								</ul>
							</li>
						
						</ul>
					</div>
					
					<div class="article-key article-r">
						<div class="title"><h1 class="l">热门标签</h1> <router-link class="r" to="/">>更多</router-link></div>
						<div class="content">
							<router-link to="/"><el-tag>标签一</el-tag></router-link>
							<router-link to="/"><el-tag type="success">标签</el-tag></router-link>
							<router-link to="/"><el-tag type="info">标签三有</el-tag></router-link>
							<router-link to="/"><el-tag type="warning">四</el-tag></router-link>
							<router-link to="/"><el-tag type="danger">标签五人</el-tag></router-link>
							<router-link to="/"><el-tag>标签一</el-tag></router-link>
							<router-link to="/"><el-tag type="success">标签</el-tag></router-link>
							<router-link to="/"><el-tag type="info">标签三有</el-tag></router-link>
							<router-link to="/"><el-tag type="warning">四</el-tag></router-link>
							<router-link to="/"><el-tag type="danger">标签五人</el-tag></router-link>
							<router-link to="/"><el-tag>标签一</el-tag></router-link>
							<router-link to="/"><el-tag type="success">标签</el-tag></router-link>
							<router-link to="/"><el-tag type="info">标签三有</el-tag></router-link>
							<router-link to="/"><el-tag type="warning">四</el-tag></router-link>
							<router-link to="/"><el-tag type="danger">标签五人</el-tag></router-link>
							
							
						</div>
					</div>
					
					<div class="article-hot article-r">
						<div class="title"><h1 class="l">热门文章</h1> <router-link class="r" to="/">>更多</router-link></div>
						<div class="content">
							<ul>
								<li v-for="vo,i in 10"> <router-link to="/">我是文单1{{vo}}1111</router-link> <span class="r">{{i}}</span></li>
							</ul>
						</div>
						
					</div>
				</el-col>
			</el-row>
		</div>
	</el-container>
</template>

<script>
	export default {
		data() {
			return {
				type:[
					{name:"全部文章",url:"/article",an:true},
					{name:"后端",url:"/article/t/1",an:false,list:[
						{name:"php",url:"/article/t/2",an:false},
						{name:"python",url:"/article/t/3",an:false},
						{name:"mysql",url:"/article/t/4",an:false},
					]},
					{name:"前端",url:"/article/t/5",an:false,list:[
						{name:"vue",url:"/article/t/6",an:false},
						{name:"angular",url:"/article/t/7",an:false},
						{name:"jquery",url:"/article/t/8",an:false},
					]},
					{name:"linux",url:"/article/t/9",an:false},
				]
			}
		},
		created() {
			this.$emit("SetHeader", true);
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