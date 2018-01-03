<template>
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-md-6">
				<form class="m-4">
					<div class="form-group">
						<input type="email" class="form-control" v-model="email" name="email" placeholder="Email">
					</div>

					<div class="form-group">
						<input type="password" class="form-control" v-model="password" name="password" placeholder="password">
					</div>
					<div class="form-group">
						<input type="button" @click="login" class="btn btn-success float-right" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>
</template>
<script>
export default{
	data(){
		return {
			email:"",
			password:""
		}
	},
	methods:{
		'login'(){
			var data={
				client_id:2,
				client_secret:"vcVnlltqyEmeNuVeyRGdGkjrVjSuZ4ZNrBcQbXER",
				grant_type:"password",
				username:this.email,
				password:this.password	

			}
			this.$http.post('oauth/token',data)
			.then(function(response){
				this.$auth.setToken(response.body.access_token,response.body.expires_in+Date.now())
				this.$router.push('/admin')
				console.log(response)
			})
		}
	}
}
</script>