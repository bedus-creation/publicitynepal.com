@extends('layout.app-front')

@section('content')
<style type="text/css">
	.loading  {
	margin-top: 100px;	
}
#content .fa{
	font-size: 30px;
	color: #2964a0;
}
.cat-title{
	font-size:20px;
	font-weight: bold;
	color: #2964a0;
	font-family: 'Khand', sans-serif;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="content" class="container pl-0 pr-0">
				<div class="row">
					<div class="col-md-12 loading text-center d-none">
						<i  class="fa fa-spinner fa-spin"></i>
					</div>
				</div>
				@foreach($categories as $key=> $category)
				<div>
					<div class="row">
						<div class="col-md-12 p-0">
							<div class="card-header cat-title d-flex flex-row justify-content-between">
								<div>
									{{$category->name}}
								</div>
								<div>
									See All
								</div>
							</div>
						</div>
					</div>
					@include('front.category',[
					'category' => $category,
					'i'=>$key ])
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection