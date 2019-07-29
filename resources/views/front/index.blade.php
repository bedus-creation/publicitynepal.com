@extends('layout.app-front')

@section('head')
<style type="text/css">
	.loading {
		margin-top: 100px;
	}

	.cat-title {
		font-size: 20px;
		font-weight: bold;
		color: #2964a0;
		font-family: 'Khand', sans-serif;
	}

	#category a {
		text-decoration: none;
	}

	.n-title {
		padding: 5px 10px;
		font-family: 'Poppins', sans-serif;
		font-style: bold;
		font-size: 30px;
		line-height: 1.8;
	}

	.post-list-image {
		width: 8rem;
		height: 6rem;
		background-size: cover !important;
		background-position: center !important;
		margin-right: 10px;
	}

	.post-image {
		height: 24rem;
		width: 100%;
		background-size: cover !important;
		background-position: center center !important;
	}

	.content {
		text-align: center;
		padding: 0 10px;
		font-family: 'Eczar', serif;

	}

	.c_title {
		font-weight: bold;
		font-size: 1.4rem;
		line-height: 1.2;
		color: #2964a0;
	}

	.m_title {
		color: #2964a0;
		font-size: 1.2rem;
		text-align: left;
	}

	.carousel-caption {
		background: rgba(0, 0, 0, 0.8);
	}

	@media screen and (max-width: 768px) {
		.post-image {
			height: 150px;
			width: 100%;
			background-size: cover !important;
			background-position: center center !important;
		}

		.n-title {
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
				@if($categories->has(['0']))
				<div class="row">
					@include('front.category.lo.3rd',["data"=>$categories->first()])
				</div>
				@endif
				@if($categories->has(['1', '2', '3', '4']))
				<div class="row">
					@include('front.category.lo.2nd',["news"=>$categories[1],"tab1"=>$categories[2],"tab2"=>$categories[3],"tab3"=>$categories[4]])
				</div>
				@endif

				@if($advertisement->has('7'))
				<div class="row">
					<img src="{{$advertisement[7]->cover}}" class="w-100" style="height:100px;">
				</div>
				@endif
			</div>
		</div>
		<div class="row my-2">
			@if(isset($categories[5]))
			<div class="col-md-4">
				@include('front.category.lo.4th',['data'=>$categories[5]])
			</div>
			@endif
			@if(isset($categories[6]))
			<div class="col-md-4">
				@include('front.category.lo.4th',['data'=>$categories[6]])
			</div>
			@endif
			@if(isset($categories[7]))
			<div class="col-md-4">
				@include('front.category.lo.4th',['data'=>$categories[7]])
			</div>
			@endif
		</div>
		
		@if($advertisement->has('8'))
		<div class="row">
			<div class="col-md-12">
				<img src="{{$advertisement[8]->cover}}" class="w-100" style="height:100px;">
			</div>
		</div>
		@endif
	</div>
</div>
{{-- @elseif($key!=1 && $key!=4 && $key!=8 && $key!=11 && $key!=0 && $key!=2 && $key!=3 && $key!=10 && $key!=6 &&
$key!=5 && $key!=7)
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
@endforeach --}}
@endsection