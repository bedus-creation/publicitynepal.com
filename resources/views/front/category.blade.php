<link href="https://fonts.googleapis.com/css?family=Eczar|Poppins" rel="stylesheet">
<style type="text/css">
.fa-clock-o{
	font-size: 16px !important;
}
</style>
<div id="category">
	@if($i==0 || $i>1)
	<div class="row">
		<div class="col-md-8">
			<div id="c-c" class="carousel slide w-100" data-ride="carousel">
				<div class="carousel-inner">
					@foreach($category->relations->slice(0,10) as $key =>$item)
					<div class="carousel-item {{$key==0?'active':''}}">
						<a href="{{url('news/'.$item->posts->id)}}">
							<img class="d-block w-100 post-image" src="{{$item->posts->featured_photo}}" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<h3 class="n-title">{{$item->posts->title}}</h3>
								<small class="text-muted"><i class="fa fa-clock-o text-muted"></i>&nbsp;{{
									$item->posts->created_at->diffForHumans()}}
								</small>
							</div>
						</a>
					</div>
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#c-c" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#c-c" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="col-md-4">
			@foreach($category->relations->slice(1,3) as $key =>$item)
			<div>
				<div class="row">
					<a href ="{{url('news'.'/'.$item->posts->id)}}" class="card-header col-md-12">
						<div class="media w-100  text-center">
							<div style="background:url('{{$item->posts->featured_photo}}'" class="post-list-image">
							</div>
							<div class="media-body">
								<h5 class="content">
									{{$item->posts->title}}
									<br>
									<small class="text-muted"><i class="fa fa-clock-o text-muted"></i>&nbsp;{{
										$item->posts->created_at->diffForHumans()}}
									</small>
								</h5>
							</div>
						</div>
					</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@elseif($i==1)
	<div class="row card-group">
		@foreach($category->relations->slice(0, 8) as $item)
		<div class="c-md-3 pt-0 mb-3 sdw">
			<div class="card h-100  border-0">	
				<a href ="{{url('news'.'/'.$item->posts->id)}}" class="">
					<div style="background:url('{{$item->posts->featured_photo}}')" class="ig4">
					</div>
					<div class="card-block">
						<p class="content pt-4" >
							{{$item->posts->title}}
							<br>
							<small class="text-muted"><i class="fa fa-clock-o text-muted"></i>&nbsp;{{
								$item->posts->created_at->diffForHumans()}}
							</small>
						</p>
					</div>
				</router-link>
			</div>
		</div>
		@endforeach
	</div>
	@endif
</div>
<style type="text/css">
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
.sdw{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.post-list-image{
	width: 120px;
	height: 100px;
	background-size: cover !important;
	background-position: center;
}
.ig4{
	height: 150px;
	background-size:cover !important;
	background-position: center center !important; 
}
.post-image{
	height: 350px;
	width: 100%;
	background-size:cover !important;
	background-position: center center !important; 
}
.content{
	text-align: center;
	padding: 0 10px;
	font-family: 'Eczar', serif;
	font-style: bold;
	font-size: 20px;
	line-height: 1.4;
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