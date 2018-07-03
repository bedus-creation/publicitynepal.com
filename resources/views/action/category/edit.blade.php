@extends('layout.app-backend')
@include('admin.sidebar')
@include('utils.success-error')
@section('content')
@yield('success-error')
<div id="postForm" class="mt-4">
    <form method="Post" action="{{url('admin/categories/'.$category->id)}}">
        <input type="hidden" name="_method" value="PUT">
        {{csrf_field()}}
		<div class="form-row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" value="{{$category->name}}" class=" form-control" placeholder="Enter category name">
				</div>
				<div class="form-group">
					{{csrf_field()}}
					<label>Url of Category</label>
					<input type="text" value="{{$category->slug}}" name="slug" class=" form-control" placeholder="Enter Url of category">
                </div>
                <div class="form-group">
					{{csrf_field()}}
					<label>Menu Name( if to include)</label>
					<input type="text" value="{{$category->group}}" name="group" class=" form-control" placeholder="Enter Url of category">
				</div>
			</div>
			<div class="col-md-4">
                <div class="form-group">
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
                <div class="form-group">
                    <div class="form-group">
                        {{csrf_field()}}
                        <label>Url of Category</label>
                        <input type="number" value="{{$category->order}}" name="order" class=" form-control">
                    </div>
                </div>
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