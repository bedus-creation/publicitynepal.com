<div id="category">
	@if($i==0 || $i>1)
	<div class="row">
		<div class="col-md-8">
			<a href ="{{url('news'.'/'.$category->relations[0]->posts->slug)}}" class="" >
				<div class="card h-100 w-100">	
					<div style="background:url('{{$category->relations[0]->posts->featured_photo}}'" class="post-image">
					</div>
					<div class="card-block">
						<p class="n-title">
							{{$category->relations[0]->posts->title}}
						</p>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-4">
			@foreach($category->relations as $key =>$item)
			<div>
				@if($key>0 && $key<5)
				<div class="row">
					<a href ="{{url('news'.'/'.$item->posts->slug)}}" class="card-header col-md-12">
						<div class="media w-100">
							<div style="background:url('{{$item->posts->featured_photo}}'" class="post-list-image">
							</div>
							<div class="media-body">
								<h5 class="content">
									{{$item->posts->title}}
								</h5>
							</div>
						</div>
					</a>
				</div>
				@endif
			</div>
			@endforeach
		</div>
	</div>
	@elseif($i==1)
	<div class="row card-group">
		@foreach($category->relations->slice(0, 8) as $item)
		<div class="col-md-3 p-0 pt-0 mb-3 sdw">
			<div class="card h-100  border-0">	
				<a href ="{{url('news'.'/'.$item->posts->slug)}}" class="">
					<div style="background:url('{{$item->posts->featured_photo}}')" class="ig4">
					</div>
					<div class="card-block">
						<p class="content pt-4" >
							{{$item->posts->title}}
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
	font-family: 'Khand', sans-serif;
	font-style: bold;
	font-size: 30px;
	line-height: 1.8;
}
.sdw{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	margin: 5px;
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
	padding: 0 10px;
	font-family: 'Khand', sans-serif;
	font-style: bold;
	font-size: 20px;
	line-height: 1.4;
}
@media screen and (max-width: 768px){
	.post-image{
		height: 200px;
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