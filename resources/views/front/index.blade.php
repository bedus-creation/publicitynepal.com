@extends('layout.app-front')

@section('head')
<style type="text/css">
	.loading  {
		margin-top: 100px;	
	}
	.cat-title{
		font-size:20px;
		font-weight: bold;
		color: #2964a0;
		font-family: 'Khand', sans-serif;
	}
	#category a{
		text-decoration: none;
	}
	.n-title{
		padding: 5px 10px;
		font-family: 'Poppins', sans-serif;
		font-style: bold;
		font-size: 30px;
		line-height: 1.8;
	}
	.sdw:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	.post-list-image{
		width: 8rem;
		height: 6rem;
		background-size: cover !important;
		background-position: center !important;
		margin-right:10px;
	}
	.ig4{
		height: 150px;
		background-size:cover !important;
		background-position: center center !important; 
	}
	.post-image{
		height: 24rem;
		width: 100%;
		background-size:cover !important;
		background-position: center center !important; 
	}
	.content{
		text-align: center;
		padding: 0 10px;
		font-family: 'Eczar', serif;
		
	}
	.c_title{
		font-weight: bold;
		font-size: 1.4rem;
		line-height: 1.2;
		color: #2964a0;
	}
	.m_title{
		color: #2964a0;
		font-size: 1.2rem;
		text-align: left;
	}
	.carousel-caption{
		background: rgba(0,0,0,0.8);
	}
	@media screen and (max-width: 768px){
		.post-image{
			height: 150px;
			width: 100%;
			background-size:cover !important;
			background-position: center center !important; 
		}
		.n-title{
			font-size: 20px;
			line-height: 1.3;
		}
	
	}
</style>

@endsection

@section('content')
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
					<div class="row">
						<div class="col-md-4">
							@include('front.category.lo.4th',['data'=>$categories[4]])
						</div>
						<div class="col-md-4">
							@include('front.category.lo.4th',['data'=>$categories[8]])
						</div>
						<div class="col-md-4">
							@include('front.category.lo.4th',['data'=>$categories[11]])
						</div>
					</div>
					@elseif($key!=4 && $key!=8 && $key!=11 && $key!=0 && $key!=2 && $key!=3 && $key!=10 && $key!=6 && $key!=5 && $key!=7)
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
							@include('front.category',['category' => $category,'i'=>$key ])
						@endif
					</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection