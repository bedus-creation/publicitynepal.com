<template>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<sidenav></sidenav>
			</div>
			<div class="col-lg-9">
				<components></components>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	components:{
		"sidenav":require('./Sidenav.vue')
	}
}
</script>