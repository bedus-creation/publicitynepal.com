@extends('layout.app-backend')
@include('admin.sidebar')
@include('utils.success-error')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/file.upload.css')}}">
<link href="{{asset('css/tag.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
.note-toolbar{

}
</style>
@yield('success-error')
<div id="form">
	<form action="{{url('admin/post')}}" method="post">
		<div class="form-row">
			<div class="col-md-8">
				<div class="form-group">
					<label>Form Title</label>
					<input type="text" name="title" class="form-control"
					value="{{old('title')}}">
				</div>
				{{csrf_field()}}
				<div class="form-group">
					<label>Text Area</label>
					<textarea id="summernote" name="content">{{old('content')}}</textarea>
				</div>
				<div class="form-group">
					<label>Select Categories</label>
					<input id="categories" class="form-control" type="text" name="categories"  aria-expanded="false"/>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Submit
					</button>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Form Title</label>
				</div>
				<div class="form-group" style="height: 300px;">
					<label>Choose Cover Photo</label>
					<input type="hidden" name="cover"
					value="{{old('cover')}}">
					<div class="btn btn-primary form-control" id="cover">
						set cover
					</div>
					<span id="cover-image"></span>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script type="text/javascript" src="{{asset('js/file.upload.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tags.js')}}"></script>
<link href="https://fonts.googleapis.com/css?family=Mukta" rel="stylesheet">
<script type="text/javascript">
	$('#summernote').summernote({
		toolbar: [
		['style', ['style']],
		['fontsize', ['fontsize']],
		['font', ['bold', 'italic', 'underline', 'clear']],
		['fontname', ['fontname']],
		['color', ['color']],
		['para', ['ul', 'ol', 'paragraph']],
		['height', ['height']],
		['insert', ['picture', 'hr']],
		['table', ['table']],
		['view', ['fullscreen', 'codeview']]
		],
		placeholder: 'Hello stand alone ui',
		tabsize: 2,
		height: 400,
		fontSizes: ['12', '14', '18','20','22','24', '36', '48'],
		fontNames: ["Mukta, sans-serif"]
	});
	$('#cover').aammui({
		baseUrl:'{{url('')}}/',
		inputId:"cover",
		imageId:'cover-image',
		serverUploadUrl:'{{url('')}}/media/upload',
		serverAllFileUrl:'/getfiles'
	});

	var jsonData = [];
	console.log('{!!$categories!!}');
	jsonData=JSON.parse('{!!$categories!!}');
	var ms1 = $('#categories').tagSuggest({
		data: jsonData,
		sortOrder: 'name',
		maxDropHeight: 100,
		name: 'categories'
	});
</script>
@endsection
