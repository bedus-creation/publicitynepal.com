<template>
	<div class="col-md-3 p-0">
		<div class="card h-100">
			<div :style="postImageStyle" class="post-image">
			</div>
			<div class="card-block">
				<p class="card-text content h-25">{{post.title}}</p>
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
	background-size:contain;
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
			postImageStyle:"background:url('"+this.post.featured_photo+"') no-repeat"
		}
	},
	created: function () {
		this.post.content=this.trunk(this.post.content,100);
	},
	methods:{
		trunk:function(string,value){
			return string.substring(0, value) + '...';	
		}
	},
	props:['post']
}
</script>