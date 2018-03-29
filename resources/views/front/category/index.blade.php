@extends('layout.app-front')
<style type="text/css">
.cat-title{
	font-size:20px;
	font-weight: bold;
	color: #2964a0;
	font-family: 'Khand', sans-serif;
}
</style>
@section('content')
<div class="container">
	@if($category)
	<div class="row">
		<div class="col-md-12">
			<div class="card-header cat-title d-flex flex-row justify-content-between">
				<div>
					{{$category->name}}
				</div>
				<div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="">
		<?php 
		if(count($category->relations)>0){
			switch ($category->slug) {
				case 'news':
				?>
				@include('front.category.lo.st',["category"=>$category])
				<?php	
				break;

				default:
				?>
				@include('front.category.lo.st',["category"=>$category])
				<?php	
				break;
			}

		}
		?>
		@foreach($category->child as $item)

		@endforeach
		@endif
	</div>
</div>
@endsection