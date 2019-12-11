import Vue from 'vue'
import Router from 'vue-router'
import index from './controller/index'
import article from './controller/article'
import archive from './controller/archive'
import experiment from './controller/experiment'
import leave from './controller/leave'
import info from './controller/info'
import works from './controller/works'
import content from './controller/content'

Vue.use(Router)

export default new Router({
	mode: 'history', //隐藏#号
	routes: [{
			path: '/',
			name: '首页',
			component: index
		}, {
			path: '/article/t/:t',
			name: '文章+分类',
			component: article
		}, {
			path: '/article',
			name: '文章',
			component: article
		}, {
			path: "/archive",
			name: "归档",
			component: archive
		}, {
			path: "/experiment",
			name: "实验室",
			component: experiment
		}, {
			path: "/leave",
			name: "留言",
			component: leave
		}, {
			path: "/works",
			name: "作品",
			component: works
		}, {
			path: "/info",
			name: "关于我",
			component: info
		},{
			path: "/content/:id",
			name: '文章内容',
			component: content
		}
	]
})