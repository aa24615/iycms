<template>
	<el-container>
		<div class="container">
			<el-row class="info">
				<el-col :span="6" class="info-content p20  background">
					<div class="title mb20">
						<h1>博主资料</h1>
					</div>
				
					<div class="text item">
						<img width="100px" :src="init.info.head" />
					</div>
					
					<div class="text mt10 item" v-html="init.info.desc">
					</div>
					
					<div class="text mt10 item">
						网名: <span>{{init.info.nick}}</span>
					</div>
					
					<div class="text  item">
						姓名: <span>{{init.info.name}}</span>
					</div>
					
					<div class="text  item">
						性别: <span>{{init.info.sex}}</span>
					</div>
					<div class="text item">
						生日: <span>{{init.info.birthday}} ({{init.info.calendar}})</span>
					</div>
					
					<div class="text item">
						年龄: <span>{{init.info.name}}</span>
					</div>
					<div class="text item">
						故乡: <span>{{init.info.home_province}} - {{init.info.home_city}} - {{init.info.home_area}}</span>
					</div>
					<div class="text item">
						所在地: <span>{{init.info.my_province}} - {{init.info.my_city}} - {{init.info.my_area}}</span>
					</div>
					<div class="text item">
						邮箱: <span>{{init.info.email}}</span>
					</div>
					<div class="text item">
						扣扣: <span>{{init.info.qq}}</span>
					</div>
					<div class="text item">
						微信: <span>{{init.info.wx}}</span>
					</div>
					<div class="text item">
						个人博客: <span>{{init.info.url}}</span>
					</div>
					<div class="text item">
						Github: <span>{{init.info.github}}</span>
					</div>
					<div class="text item">
						Gitocs: <span>{{init.info.gitosc}}</span>
					</div>
				</el-col>
				<el-col :span="18" class="p20  background">
					<div class="title mb20">
						<h1>专业技能</h1>
					</div>
				
					<div class="skills">
						<el-row v-for="vo in init.skills">
							<el-col :span="6">{{vo.name}}</el-col>
							<el-col :span="18" class="">
								<el-progress :percentage="vo.value"></el-progress>
							</el-col>
						</el-row>
					</div>
					
					<div class="title mt20">
						<h1>工作经验</h1>
					</div>
					
					<div class="work">
						<ul>
							<li v-for="vo in init.work">
								<div class="date l">{{vo.date_start}}</div>
								<div class="content l">
									<div>
										<h3 class="l">{{vo.company}}</h3>
										<span class="r">至{{vo.date_end}}</span>
									</div>
									<div>
										<h4 class="l">{{vo.department}}</h4>
										<h4 class="l">{{vo.position}}</h4>
									</div>
									<div class="workbody">
										<h4>工作内容</h4>
										<p v-html="vo.body"></p>
									</div>
									
								</div>
								<p></p>
							</li>
						</ul>
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
			sessionStorage['title'] = document.title = "关于我 - "+(this.init.info.nick || this.init.info.name)+ "的博客"
		},
		methods: {

		}
	}
</script>

<style>
	
	
</style>