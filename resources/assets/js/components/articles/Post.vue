<template>
	<div class="row">
		<div v-if="i==0" class="col-md-8 p-0">
			<div class="card h-100">	
				<div :style="postImageStyle" class="post-image">
				</div>
				<div class="card-block">
					<p class="card-text content h-25">
						{{posts.title}}
					</p>
					<router-link :to="{path:'news/'+post.slug}" class="btn btn-primary float-right" >read more...</router-link>
				</div>
			</div>
		</div>
		<div v-if="i>0" class="col-md-4 p-0">
			<div class="card h-25">	
				<div :style="postImageStyle" class="post-image">
				</div>
				<div class="card-block">
					<p class="card-text content h-25">
						{{posts.title}}
					</p>
					<router-link :to="{path:'news/'+post.slug}" class="btn btn-primary float-right" >read more...</router-link>
				</div>
			</div>
		</div>
	</div>
</template>
<style>
.post-image{
	height: 200px;
	width: 100%;
	background-size:cover !important;
	background-position: center center !important; 
}
.content{
	font-family: 'Khula', sans-serif;
	font-style: normal;
	font-size: 16px;
}
</style>
<script>
export default {
	data(){
		return {
			posts:{},
			postImageStyle:''
		}
	},
	created: function () {
		this.posts=this.post.posts;
		this.posts.content=this.trunk(this.posts.content,100);
		this.postImageStyle="background:url('"+this.posts.featured_photo+"') no-repeat";
	},
	methods:{
		trunk:function(string,value){
			return string.substring(0, value) + '...';	
		}
	},
	props:['post',"i"]
}
</script>