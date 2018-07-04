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
				<div class="row">
					<div class="col-md-12 mt-2">
						<img src="{{url('images/esewa.gif')}}" class="w-100" height="100">		
					</div>
				</div> 
				<div class="row">
				@include('front.category.lo.3rd',["data"=>$categories[9]])
				</div>
				@foreach($categories as $key=> $category)
				@if($key==1)
				<div class="row">
				@include('front.category.lo.2nd',["news"=>$categories[5],"tab1"=>$categories[2],"tab2"=>$categories[6],"tab3"=>$categories[7]])
				</div>
				@elseif($key!=3 && $key!=10 && $key!=9 && $key!=7)
				<div>
					<div class="row mt-4">
						<div class="col-md-12 p-0">
							<div class="card-header cat-title d-flex flex-row justify-content-between">
								<div>
									{{$category->name}}
								</div>
								<div>
									<a href="{{url($category->slug)}}">See All</a>
								</div>
							</div>
						</div>
					</div>
					@if(count($category->posts)>0)
					@include('front.category',[
					'category' => $category,
					'i'=>$key ])
					@endif
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection