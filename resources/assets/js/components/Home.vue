<template>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<Posts></Posts>
			</div>
		</div>
	</div>
</template>

<script>

import Posts from './articles/Posts.vue'

export default {
	components:{
		'Posts':Posts
	}
}
</script>