<template>
	<el-container >
		<div class="container" v-loading.fullscreen.lock="!show" element-loading-text="拼命加载中" element-loading-background="rgba(255, 255, 255, 0.5)" >
			<el-row :gutter="20">
				<!--文章盒子-->
				<el-col :span="18" class="article-list"  >
					<!--文章列表-->
					<el-row v-for="vo in list" class="li">
						<el-col :span="6">
							<img :src="vo.pic" />
						</el-col>
						<el-col :span="18">
							<router-link :to="'/content/'+vo.id"><h1 v-text="vo.title"></h1></router-link>
							<p v-text="vo.desc"></p>
							<div class="article-info"><router-link :to="'/article/t/'+vo.type" v-text="vo.typename"></router-link> <span v-text="vo.time"></span>

							<span class="r">
								<i class="iconfont" v-html="'&#xe68a;'+vo.a"></i>
								<i class="iconfont" v-html="'&#xe681;'+vo.z"></i>
								<i class="iconfont" v-html="'&#xe604;'+vo.p"></i>
							</span></div>
						</el-col>
					</el-row>

					<div class="page" v-show="list.length>0">
						<el-pagination background :page-size="page.size" 
			@current-change="getPage" layout="prev, pager, next"  :total="page.count"> </el-pagination>
					</div>

					<el-alert v-show="list.length==0" title="没有数据" type="info" description=" " :closable="false" show-icon></el-alert>


				</el-col>
				<el-col :span="6">
					<div class="article-type article-r">
						<ul>
							<li v-for="vo in init.category"><router-link :to="'/article/t/'+vo.id" :class="{active:vo.an}">{{vo.name}}</router-link>
								<ul v-if="vo.list">
									<li v-for="vo2 in vo.list">
										<router-link :to="'/article/t/'+vo2.id" :class="{active:vo2.an}">{{vo2.name}}</router-link>
									</li>
								</ul>
							</li>
						</ul>
					</div>

					<div class="article-key article-r">
						<div class="title"><h1 class="l">热门标签</h1> <router-link class="r" to="/">>更多</router-link></div>
						<div class="content">
							<router-link v-for="vo in init.keys" to="/" ><el-tag v-text="vo.name" :type="vo.color"></el-tag></router-link>
						</div>
					</div>

					<div class="article-hot article-r">
						<div class="title"><h1 class="l">热门文章</h1> <router-link class="r" to="/">>更多</router-link></div>
						<div class="content">
							<ul>
								<li v-for="vo,i in hot"> <router-link :to="'/content/'+vo.id">{{vo.title}}</router-link> <span class="r">{{vo.a}}</span></li>
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
				show:false,
				t:0,
				list:[],
				hot:[],
				page:{
					count:0,
					size:10
				}
			}
		},
		watch:{
			'$route':function(to,from){
				//切换选中状态
				this.t = to.params.t;
				this.getCategory();
			}
		},
		created: function(){
			
			this.t = this.$route.params.t ? this.$route.params.t : 0;
			this.$emit("SetHeader", true);
			this.$emit("SetScrollTop");
			sessionStorage['title'] = document.title = "博文 - "+(this.init.info.nick || this.init.info.name)+ "的博客"
			this.getCategory();	
		},
		methods: {
			getCategory:function(){
				var id = this.t;
				for(var i=0;i< this.init.category.length;i++){
					if(this.init.category[i].id!=id){
						this.init.category[i].an = false;
					}else{
						this.init.category[i].an = true;
					}
					try{
						for(var j=0;j<this.init.category[i].list.length;j++){
							if(this.init.category[i].list[j].id!=id){
								this.init.category[i].list[j].an = false;
							}else{
								this.init.category[i].list[j].an = true;
							}
						}
					}catch(err){

					}
				}
				this.getPage(1);
			},
			getPage(p) { //切换页面
				var self = this;
				self.show = false;
				var name = 'article_'+this.t+'_'+p;
				if (sessionStorage[name]){
					var data  = JSON.parse(sessionStorage[name]);
					self.show = true;
					self.list = data.data;
					self.hot = data.hot;
					self.page.count = data.count;
				}else{
					this.$emit("gets",{url:'/api/article.html?t='+this.t+'&p='+p,success:function(e){
						if(e.status==200){
							self.show = true;
							self.list = e.data.data;
							self.hot = e.data.hot;
							self.page.count = e.data.count;
							sessionStorage[name] = JSON.stringify(e.data);
						}
					},error:function(e){
						self.$message.error('服务器异常');
					}});
				}
			}
		}
	}
</script>
