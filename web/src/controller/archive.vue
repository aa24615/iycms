<template>
	<el-container>
		<div class="container">
			<el-row :gutter="20">
				<!--文章盒子-->
				<el-col :span="18" class="archive-list">
					
					<div class="archive-content">
						<ul>
							<li v-for="vo in [10,12,13,14,15,16,17,19,20,21,22,23]" :class="{y:(vo==10),m:(vo!=10)}">
								<span v-if="vo==10">2018-{{vo}} <b></b></span>
								<span v-if="vo!=10">10-{{vo}} <b></b></span>
								<a v-if="vo==10">5</a>
								<router-link to="/" v-if="vo!=10">Sss这是文章xxxxxwewewe</router-link><em v-if="vo!=10" class="r">18:22:55</em>
							</li>
							
						</ul>
						
						
						<div class="page">
							<el-pagination background :page-size="30"   @size-change="handleSizeChange"
	      @current-change="handleCurrentChange" layout="prev, pager, next"  :total="100"> </el-pagination>
						</div>
					</div>
				</el-col>
				<el-col :span="6">
					
					<div class="article-hot article-r">
						<div class="title"><h1 class="l">热门文章</h1> <router-link class="r" to="/">>更多</router-link></div>
						<div class="content">
							<ul>
								<li v-for="vo,i in 10"> <router-link to="/">我是文单1{{vo}}1111</router-link> <span class="r">{{i}}</span></li>
							</ul>
						</div>
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
		props: ['init'],
		data() {
			return {
				
			}
		},
		created() {
			this.$emit("SetHeader", true);
			this.$emit("SetScrollTop");
			sessionStorage['title'] = document.title = "归档 - "+(this.init.info.nick || this.init.info.name)+ "的博客"
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