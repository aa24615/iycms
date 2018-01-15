import Vue from 'vue'
import Router from 'vue-router'
import index from './controller/index'
import article from './controller/article'
import archive from './controller/archive'

Vue.use(Router)

export default new Router({
	mode: 'history', //隐藏#号
	routes: [
		{
			path: '/',
			name: '首页',
			component: index
		},
		{
			path: '/article',
			name: '文章',
			component: article
		}, {
			path: '/article/t/:t',
			name: '文章+分类',
			component: article
		}, {
			path: '/article/id/:id',
			name: '文章内容',
			component: article
		}, {
			path: "/archive",
			name: "归档",
			component: archive
		}
	]
})