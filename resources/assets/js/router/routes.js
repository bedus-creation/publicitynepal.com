import Vue from 'vue'
import VueRouter from 'vue-router'


import Login from '../components/account/Login.vue';
import Register from '../components/account/Register.vue';
import Dashboard from '../components/admin/Dashboard.vue';
import Home from '../components/Home.vue'

import CategoryPage from '../components/page/CategoryPage.vue';
import ProductDetailPage from '../components/page/ProductDetailPage.vue'

Vue.use(VueRouter)

const router =new VueRouter({
	linkActiveClass: 'is-active',
	routes:[
	{
		path:'/Details/:title',
		component: ProductDetailPage,
		props: true 
	},
	{
		path:'/',
		component:Home
	},
	{
		'path':'/admin',
		'component':Dashboard,
		meta:{
			forAdmin:true
		}
	},
	{
		'path':'/admin/posts/create',
		'component':require('../components/admin/CreatePost.vue'),
		meta:{
			forAdmin:true
		}
	},
	{
		'path':"/login",
		'component':Login,
		meta:{
			forVisitors:true
		}
	},
	{
		'path':"/register",
		'component':Register,
		meta:{
			forVisitors:true
		}
	}
	],
	scrollBehavior (to, from) {
		return { x: 0, y: 0 }
	}
});


export default router