@extends('layout.app-backend')
@include('admin.sidebar')
@include('utils.success-error')
@section('content')
@yield('success-error')
<div id="postForm" class="mt-4">
	<form method="Post" action="{{url('admin/categories')}}">
		<div class="form-row">
			<div class="col-md-6">
				<div class="form-group">
					{{csrf_field()}}
					<label>Name</label>
					<input type="text" name="name" class=" form-control" placeholder="Enter category name" value="{{old('name')}}">
				</div>
				<div class="form-group">
					{{csrf_field()}}
					<label>Url of Category</label>
					<input type="text" name="slug" class=" form-control" placeholder="Enter Url of category" value="{{old('slug')}}">
				</div>
			</div>
			<div class="col-md-6">
				<label>Select Parent(Optional)</label>
				<select name="parent" class="form-control" live-data-search="true">
					<option value="0">Choose Parent</option>
					@if(count($categories)>0)
					@foreach($categories as $item)
					<option value="{{$item->id}}">{{$item->name}} </option>
					@endforeach
					@endif
				</select>
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<button type="submit" class="btn btn-primary"> Add categories</button>
				</div>
			</div>
		</div>
	</div>
</form>
</div>
@endsection
@section('script')
@endsection