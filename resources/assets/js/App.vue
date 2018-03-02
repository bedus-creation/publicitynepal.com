<template>
	<div>
		<heador></heador>
		<navbar></navbar>
		<router-view></router-view>
	</div>
</template>
<style>
</style>
<script>
import Header from './components/Header'
import Navbar from './components/Navbar.vue';

export default{    
	components :{
		'heador':Header,
		'navbar': Navbar
	}
}
</script>