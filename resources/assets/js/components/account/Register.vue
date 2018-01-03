<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<form class="m-2">
					<div class="form-group">
						<div class="form-group">
							<input type="name" class="form-control" v-model="name" name="name" placeholder="Name">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" v-model="email" name="email" placeholder="Email">
						</div>

						<div class="form-group">
							<input type="password" class="form-control" v-model="password" name="password" placeholder="password">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-success float-right" value="Login">
						</div>
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
			name:"",
			email:"",
			password:""
		}
	}
}
</script>