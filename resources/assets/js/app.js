
require('./bootstrap');

import Vue from 'vue'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 import App from './App.vue'
 import Router from './router/routes.js'
 import VueResource from 'vue-resource'

 import Auth from './packages/auth/Auth.js'
 
 Vue.use(VueResource)
 Vue.use(Auth)

 Vue.http.options.root='http://publicitynepal.com'
 Vue.http.headers.common['Authorization']='Bearer '+Vue.auth.getToken()

 Router.beforeEach((to,from,next)=>{
 	if(to.matched.some(record=>record.meta.forVisitors)){
 		if(Vue.auth.isAuthenticated()){
 			next({
 				'path':'/admin'
 			})
 		}else next()
 	}else if(to.matched.some(record=>record.meta.forAdmin)){
 		if(! Vue.auth.isAuthenticated()){
 			next({
 				'path':'/login'
 			})
 		}else next()
 	}else next()
 })

 const app = new Vue({
 	el: '#main',
 	render: h=>h(App),
 	router: Router
 });

