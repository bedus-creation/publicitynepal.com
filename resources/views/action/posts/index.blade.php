@extends('layout.app-backend')
@include('admin.sidebar')
@include('utils.success-error')
@section('content')
@yield('success-error')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<section id="list">
	<table id="example" class="table table-striped table-bordered mt-4 text-center" style="width:100%">
		<thead>
			<tr>
				<th>Name</th>
				<th>Last Update</th>
				<th>Count Views</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $item)
			<tr>
				<td width="20%">{{$item->title}}</td>
				<td>{{$item->updated_at}}</td>
				<td width="20px">{{$item->views}}</td>
				<td><a href="{{url('/admin/post/'.$item->id.'/edit')}}" class="btn btn-outline-success "><i class="fa fa-pencil"></i></a>&nbsp;
				
					<a href="#" class="btn btn-outline-danger " onclick="setAction({{$item->id}})" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
			@include('action.posts.modals.delete')
		</tbody>
		<tfoot>
			<tr>
				<th>Name</th>
				<th>Last Update</th>
				<th>Count Views</th>
				<th>Action</th>
			</tr>
		</tfoot>
	</table>
</section>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$('#example').DataTable();
	function setAction(data){
		$('#deleteForm').attr("action","{{url('admin/post/')}}/"+data);
	}
</script>
@endsection