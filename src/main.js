import Vue from 'vue'
import App from './App'
import router from './router.js'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import '../static/home/css/style.css'
import 'element-ui/lib/index.js'
import header from './public/header'
import footer from './public/footer'
Vue.use(ElementUI)
Vue.config.productionTip = false

Vue.component('Header',header);
Vue.component('Footer',footer);
new Vue({
  el: '#app',
  data:{
  	
  },
  router,
  template: '<App/>',
  components: { App }
})