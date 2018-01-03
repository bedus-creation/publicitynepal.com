<template>
	<div id="app">
		<navbar></navbar>
		<router-view></router-view>
	</div>
</template>
<style>
</style>
<script>

import Navbar from './components/Navbar.vue';

export default{    
	components :{
		'navbar': Navbar
	}
}
</script>