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
		axios.get('/api/products')
		.then(response=>{
			this.products=response.data
			console.log(response.data)
		});
	}

}
</script>