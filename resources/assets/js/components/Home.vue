<template>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group">
					<li class="list-group-item active text-center">
						Category
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Foot ware
						<span class="badge badge-primary badge-pill">14</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Books
						<span class="badge badge-primary badge-pill">2</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Electronics
						<span class="badge badge-primary badge-pill">1</span>
					</li>
				</ul>
			</div>
			<div class="col-md-6">
				<Posts></Posts>
			</div>
			<div class="col-md-3">
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