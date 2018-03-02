@extends('layout.app-backend')
@include('admin.sidebar')
@include('utils.success-error')
@section('content')
<link rel="stylesheet" href="{{asset('css/file.upload.css')}}">
@yield('success-error')
<div id="form">
	<form action="{{url('admin/post/create')}}" method="post">
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
					<textarea class="form-control" name="content">{{old('content')}}</textarea>
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
				<div class="form-group">
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
<script type="text/javascript" src="{{asset('js/file.upload.js')}}"></script>
<script type="text/javascript">
	$('#cover').aammui({
		baseUrl:'{{url('')}}/',
		inputId:"cover",
		imageId:'cover-image',
		serverUploadUrl:'{{url('')}}/media/upload',
		serverAllFileUrl:'/getfiles'
	});
</script>
@endsection
