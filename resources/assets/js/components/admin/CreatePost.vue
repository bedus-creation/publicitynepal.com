<template>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<sidenav></sidenav>
			</div>
			<div class="col-md-9">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div v-if="message" class="alert alert-success">
								{{ message }}
							</div>
							<form>
								<div class="form-group">
									<input type="text" class="form-control w-100" v-model="title" placeholder="Enter title">
								</div>
								<div class="form-group" id="mce">
									<tinymce id="d1" 
									:other_options="tinyOptions"

									v-model="editorContent"
									></tinymce>
								</div>
								<div class="form-group">
									<button @click="create_post" class="btn btn-primary float-right">Submit</button>
								</div>
							</form>
						</div>
						<div class="col-md-4">
							<div class="card">
								<img class="card-img-top" :src="imageLink" alt="Card image cap"/>
								<div class="card-body">
									<button @click="set_featured_image" class="btn btn-primary">Set featured images</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>
<script>
import tinymce from 'vue-tinymce-editor'

export default {
	data()
	{
		return{
			message:null,
			imageLink:"",
			title:"",
			editorContent: '',
			tinyOptions: {
				'height': 300
			}
		}
	},
	methods:{
		set_featured_image(){
			var self = this;
			var select_image = document.createElement('input');
			select_image.setAttribute('type', 'file');
			select_image.setAttribute('accept', 'image/*');
			select_image.onchange = function() {
				var file = this.files[0];
				let form = new FormData();
				form.append('file', file);
				self.$http.post('api/upload/image',form)
				.then(response => { 
					self.imageLink="/uploads/"+response.data;
					console.log(response.data);
				})
				.catch(error => {
					console.log(error.response)	
				});
			};
			select_image.click();
		},
		create_post(){
			this.$http.post('api/create/post',{
				title:this.title,
				featured_photo:this.imageLink,
				content:this.editorContent
			})
			.then(response=>{
				console.log(response);
				this.message=response.data;
				this.title="";
				this.this.editorContent="";
				this.imageLink="";
			}).catch(error=>{
				console.log(error.response);
			});
		}
	},
	components:{
		'sidenav':require('./layouts/Sidenav.vue'),
		'tinymce':tinymce
	}
}
</script>