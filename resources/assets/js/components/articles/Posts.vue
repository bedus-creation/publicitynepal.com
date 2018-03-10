<template>
	<div id="content" class="container pl-0 pr-0">
		<div class="row">
			<div v-show="loading" class="col-md-12 loading text-center">
				<i  class="fa fa-spinner fa-spin"></i>
			</div>
		</div>
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
.loading  {
	margin-top: 100px;	
}
#content .fa{
	font-size: 30px;
	color: #2964a0;
}
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
			loading:false,
			categories:[]
		}
	},

	components:{
		'Post':Post,
		'Category':category
	},
	created(){
		this.loading=true; 
		$("#container").button("loading");
		this.$http.get('api/products')
		.then(response=>{
			this.loading=false;
			this.categories=response.body
			console.log(response.body)
		});
	}

}
</script>