<template>
	<div id="pageDetail">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<img class="card-img-top"
						:src="data.featured_photo" 
						/>
						<div class="card-header">
							{{data.title}}
						</div>
						<div class="card-text">
							<span v-html="data.content"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
export default {
	data(){
		return {
			data:{}
		}
	},
	created(){
		this.$http.get('/api/posts/'+this.slug)
		.then(response=>{
			this.data=response.body
			console.log(response.body)
		});
	},
	props:['slug']
}
</script>