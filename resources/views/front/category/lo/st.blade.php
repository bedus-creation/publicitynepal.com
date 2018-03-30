@foreach($category->relations->slice(0, 8) as $item)
<div class="c-md-3 mb-3 sdw p-0">
	<div class="card border-0">	
		<a href ="{{url('news'.'/'.$item->posts->id)}}" class="">
			<div style="background:url('{{$item->posts->featured_photo}}')" class="ig4">
			</div>
			<div class="card-block">
				<p class="content pt-4" >
					{{$item->posts->title}}
				</p>
			</div>
		</a>
	</div>
</div>
@endforeach
<style type="text/css">
#category a{
	text-decoration: none;
}
.sdw{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.ig4{
	height: 150px;
	background-size:cover !important;
	background-position: center center !important; 
}
</style>