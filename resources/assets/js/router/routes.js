import Vue from 'vue'
import VueRouter from 'vue-router'


import Home from '../components/Home.vue'

import CategoryPage from '../components/page/CategoryPage.vue';
import ProductDetailPage from '../components/page/ProductDetailPage.vue'

Vue.use(VueRouter)

const router =new VueRouter({
	linkActiveClass: 'is-active',
	routes:[
	{
		path:'/news/:slug',
		component: ProductDetailPage,
		props: true 
	},
	{
		path:'/',
		component:Home
	}],
	scrollBehavior (to, from) {
		return { x: 0, y: 0 }
	}
});


export default router