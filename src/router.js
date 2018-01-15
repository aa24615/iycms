import Vue from 'vue'
import Router from 'vue-router'
import index from './controller/index'
import article from './controller/article'

Vue.use(Router)

export default new Router({
	mode: 'history',//隐藏#号
  routes: [
    {
      path: '/',
      name: 'index',
      component: index
    },
     {
      path: '/article',
      name: 'article',
      component: article
    }
  ]
})
