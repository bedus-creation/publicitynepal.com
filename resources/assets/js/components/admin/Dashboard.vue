<template>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<sidenav></sidenav>
			</div>
			<div class="col-md-9">
				<div class="container">
					<div class="row">
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>

export default {
	components:{
		'sidenav':require('./layouts/Sidenav.vue')
	}
}
</script>