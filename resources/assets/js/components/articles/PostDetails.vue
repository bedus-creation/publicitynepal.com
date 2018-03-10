<template>
	
</template>
<script type="text/javascript">
export default {
	data(){
		return {
			
		}
	}
	created(){
		this.$http.get('api/posts/o-l-li')
		.then(response=>{
			this.products=response.body
			console.log(response.body)
		});
	}
}
</script>