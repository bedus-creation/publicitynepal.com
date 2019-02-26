(function( $ ){
	var currentId=0;
	var model ={
		init:function(){
			if(!localStorage.files){
				localStorage.files=JSON.stringify([]);
			}else{
				localStorage.files=JSON.stringify([]);
			}
		},
		add:function(obj){
			var data=JSON.parse(localStorage.files);
			data.push(obj);
			localStorage.files=JSON.stringify(data);
			currentId+=1;
		},
		getAll:function(){
			return JSON.parse(localStorage.files);
		},
		getSelected:function(id){
			var data=model.getAll().filter(function(item){
				return item.id==id;
			});
			return data[0];
		}
	}
	var controller = {	
		init:function(id,env){
			this.getAllFilesFromServer(env.serverAllFileUrl,env);
			model.init(id);
			view.init(env);
		},
		setSelected:function(id,clicked){
			console.log(clicked);
			if(env.inputId==null){
				$('input[name='+clicked.id+']').val(model.getSelected(id).ImgSrc);
			}else{
				$('input[name='+clicked.inputId+']').val(model.getSelected(id).ImgSrc);
			}
			$('#'+clicked.imageId).html('<img src="'+model.getSelected(id).ImgSrc+'" class="img-fluid">');	
			return true;
		},
		addFile:function(data,url,src,env){
			/* Local image **/
			model.add({
				ImgSrc:src,
				id:currentId,
				type:'local'
			});
			view.bufferRender('local');
			this.sendToServer(data,url,env);
		},
		getServerFileFromModel:function(){
			var data=model.getAll().filter(function(item){
				return item.type=='server';
			});
			console.log(data);
			return data;
		},
		addMultipleFiles:function(data,env){
			data.data.forEach(function(item){

				model.add({
					ImgSrc:env.baseUrl+item,
					id:currentId,
					type:'server'
				});
			});
		},
		updateSrc(src,env){
			/* Image src id obtained form server */
			model.add({
				ImgSrc:env.baseUrl+src,
				id:currentId,
				type:'success'
			});
			view.bufferRender("success");
		},
		sendToServer:function(data,url,env){
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: url,
				type: 'POST',
				data: data,
       			processData: false, // Don't process the files
        		contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        		success: function (data, textStatus, jqXHR) {
        			/*Update the src of local */
        			controller.updateSrc(data,env);
        			/*Set opacity to 1 */
        		},
        		error: function (jqXHR, textStatus, errorThrown) {
        			alert(errorThrown + textStatus);
        			if (jqXHR.responseText) {
        				errors = JSON.parse(jqXHR.responseText).errors
        				alert('Error uploading image: ' + errors.join(", ") + '. Make sure the file is an image and has extension jpg/jpeg/png.');
        			}
        		}
        	});
		},
		getAllFilesFromServer(url,env){
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:url,
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					controller.addMultipleFiles(data,env);
				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert(errorThrown + textStatus);
					if (jqXHR.responseText) {
						errors = JSON.parse(jqXHR.responseText).errors
						alert('Error uploading image: ' + errors.join(", ") + '. Make sure the file is an image and has extension jpg/jpeg/png.');
					}
				}
			});
		},
		removeFile:function(){

		},
		getAllFiles:function(type){
			var data=model.getAll().filter(function(item){
				return item.type==type;
			});
			console.log(data);
			return data;
		}
	}
	var view={
		init:function(env){
			var temp=this;
			temp.env=env;
			var $div=$('#'+env.id);
			/*---Add input field to view*/
			if(env.inputId==null){
				var inputAppend="<input name='"+env.id+"' type='hidden'>";
				$div.prepend(inputAppend);	
			} 
			/*--Adding image filed to view */
			/*
			inputAppend="<span id='"+env.imageId+"'></span>";
			$div.after(inputAppend);
			*/
			var $result=$('#'+env.imageId);
			$div.click(function(){
				temp.env.id=$(this).attr('id');
				temp.env.imageId=$(this).attr('id')+'-image';
				var raw='<div class="overlay">'+
				'</div><div class="hero">'+
				'<ul class="nav nav-tabs" id="myTab" role="tablist">'+
				'<li class="nav-item">'+
				'<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Upload From your device</a>'+
				'</li>'+
				'<li class="nav-item">'+
				'<a class="nav-link" id="astd-tab" data-toggle="tab" href="#astd" role="tab" aria-controls="astd" aria-selected="false">Browse among uploaded</a>'+
				'</li>'+
				'<li class="nav-item">'+
				'<a id="close-image-upload" class="nav-link float-right" href="#"><i class="fa fa-times"></i></a>'+
				'</li>'+
				'</ul>'+
				'<div class="tab-content" id="myTabContent">'+
				'<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">'+
				'<div id="bedusUpload" class="btn btn-primary">Upload File</div>'+
				'<div id="buffer">Upload File</div>'+
				'</div>'+
				'<div class="tab-pane fade" id="astd" role="tabpanel" aria-labelledby="astd-tab">...</div>'+
				'</div>'+
				'</div>';
				$result.prepend(raw);
				view.bufferRender('success');
				view.render();
				var newUpload=$('#bedusUpload');
				newUpload.click(function(){
					var input=document.createElement('input');
					input.setAttribute('type', 'file');
					input.setAttribute('accept', 'image/*');
					input.onchange = function () {
						var file = this.files[0];
						let form = new FormData();
						form.append('image', file);
						var url =env.serverUploadUrl ;
						var reader = new FileReader();
						reader.onload = function () {
							controller.addFile(form,url,reader.result,env);
						};
						reader.readAsDataURL(file);
					};
					input.click();
				});
				$('body').on('click', 'div.astd', function() {
					controller.setSelected($(this).attr('id'),temp.env);
				});
				$('body').on('click', '#close-image-upload', function() {
					$('#'+temp.env.imageId).html('');
				});
			});
		},
		bufferRender:function(type){
			var $result=$('#image-upload');
			var container=$('#buffer');
			container.html('');
			var raw='<div class="container"><div class="row">'+
			'<div class="col-md-12"><div class="row">';
			controller.getAllFiles(type).forEach(function(file){
				raw+='<div class="col-md-3 astd" id="'+file.id+'">'+
				'<img id="'+file.id+'" data-src="'+file.ImgSrc+'" class="img-fluid">'+
				'</div>';
			});
			raw+='</div></div></div></div>';
			container.append(raw);
			if(type=='local'){
				$('.astd').css({'opacity':'0.4'});
			}
			view.lazyLoad();
		},
		lazyLoad:function(){
			[].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
				if(view.isInViewport(img)){
					img.setAttribute('src', img.getAttribute('data-src'));
					img.onload = function() {
						img.removeAttribute('data-src');
					};
				}
			});
		},
		isInViewport:function(el){
			var rect = el.getBoundingClientRect();
			return (
				rect.bottom >= 0 && 
				rect.right >= 0 && 
				rect.top <= (window.innerHeight || document.documentElement.clientHeight) && 
				rect.left <= (window.innerWidth || document.documentElement.clientWidth)
				);
		},
		addImageItem:function(hing,src){
			var raw='<img src="'+src+'">';
			hing.append(raw);
		},
		render:function(){
			var container=$('#astd');
			var raw='<div class="container"><div class="row">'+
			'<div class="col-md-12"><div class="row">';
			controller.getServerFileFromModel().forEach(function(file){
				raw+='<div class="col-md-3 astd" id="'+file.id+'">'+
				'<img src="'+file.ImgSrc+'" class="img-fluid">'+
				'</div>';
			});
			raw+='</div></div></div></div>';
			container.append(raw);
		}
	}
	$.fn.aammui=function(options){	
		$this=$(this);	
		return this.each(function(){
			env=$.extend({
				baseUrl:"/",
				id:$this.attr('id'),
				imageId:$this.attr('id')+'-image',	
				serverUploadUrl:'/',
				serverAllFileUrl:''
			},options);
			controller.init($this.attr('id'),env);
		});
	};
}( jQuery ));