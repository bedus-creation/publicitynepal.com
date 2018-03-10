<template>
	<div class="container pl-0 pr-0">
		<div v-for="(category,key) in categories">
			<div class="row">
				<div class="col-md-12 p-0">
					<div class="card-header cat-title d-flex flex-row justify-content-between">
						<div>
							{{category.name}}
						</div>
						<div>
							See All
						</div>
					</div>
				</div>
			</div>	
			<category :category="category" :i="key">
			</category>
		</div>
	</div>
</template>
<style type="text/css">
.cat-title{
	font-size:20px;
	font-weight: bold;
	color: #2964a0;
	font-family: 'Khand', sans-serif;
}
</style>
<script>
import Post from './Post.vue'
import category from './category.vue'
export default {
	data(){
		return {
			categories:[]
		}
	},

	components:{
		'Post':Post,
		'Category':category
	},
	created(){
		this.$http.get('api/products')
		.then(response=>{
			this.categories=response.body
			console.log(response.body)
		});
	}

}
</script>