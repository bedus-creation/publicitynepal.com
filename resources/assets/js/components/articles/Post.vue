<template>
	<div class="col-md-12">
		<div class="card">
			<img class="card-img-top font-image" :src="post.avatar" alt="Card image cap">
			<div class="card-block">
				<h4 class="card-title">{{ post.name }}</h4>
				<p class="card-text" v-html="post.post_content"></p>
				<router-link :to="{path:'Details/'+ post.name }" class="btn btn-primary float-right" >read more...</router-link>
			</div>
		</div>
	</div>
</div>
</template>
<style>
.font-image{
	height: 230px;
	width: 100%;
}
</style>
<script>
export default {
	created: function () {
		this.post.post_content=this.trunk(this.post.post_content,100)
	},
	methods:{
		trunk:function(string,value){
			return string.substring(0, value) + '...';	
		}
	},
	props:['post']
}
</script>