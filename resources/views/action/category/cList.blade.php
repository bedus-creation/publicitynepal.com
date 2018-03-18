@extends("layout.app-backend")
@include('admin.sidebar')
@include('utils.success-error')
@section('content')
<style type="text/css">
	#postList .fa{
		font-size: 20px;
	}
	td{
		margin:10px 0;
	}
	#postList a{
		padding: 10px;
	}
</style>
@yield('success-error')
<div id="postList" class="mt-4">
	@if(count($categories)>0)
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<table id="example" class="display" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Name</th>
				<th>Position</th>
				<th>Office</th>
				<th>Age</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Name</th>
				<th>Position</th>
				<th>Office</th>
				<th>Age</th>
			</tr>
		</tfoot>
		@foreach($categories as $item)
		<tbody>
			<tr>
				<td>{{$item->name}}</td>
				<td>{{$item->slug}}</td>
				<td>{{$item->parent}}</td>
				<td class="text-center">
					<a href="#" class="border border-primary">
						<i class="text-primary fa fa-pencil"></i>
					</a>
					&nbsp;
					<a href="{{url('/admin/category/delete/'.$item->id)}}" class="border border-danger">
						<i class="text-danger fa fa-trash"></i>
					</a>
				</td>
			</tr>
		</tbody>
		@endforeach
	</table>
	@endif
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript">
	$('#example').DataTable({
		"scrollX": true
	});
</script>
@endsection