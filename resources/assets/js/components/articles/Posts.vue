<template>
	<div class="container">
		<div class="row">		
			<Post v-for="post in products" :key="post.id" :post="post">
			</Post>
		</div>
	</div>
</template>
<script>
import Post from './Post.vue'
export default {
	data(){
		return {
			products:[]
		}
	},

	components:{
		'Post':Post
	},

	created(){
		this.$http.get('/api/products')
		.then(response=>{
			this.products=response.body
			console.log(response.body)
		});
	}

}
</script>