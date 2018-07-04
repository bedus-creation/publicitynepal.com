<style>
    .mc{
        margin-top:50px;
        margin-bottom: 20px;
        border-left:5px solid red;
    }
    a.topl{
        padding: 10px;
        font-family: 'mukta', serif;
        line-height: 1.1;
        color: #2964a0;
        font-size: 4em;
        font-weight: 900;
    }
    a.topl:hover{
        color: red;
    }
</style>
@if(count($data->posts)>0)
<div class="col-md-12 mc text-center">
    <a  class="topl d-none d-md-block" href="{{url('news/'.$data->posts[0]->id)}}">
        {{$data->posts[0]->title}}
    </a>
</div>
@endif
@foreach($data->posts->slice(0, 4) as $item)
<div class="c-md-3 mb-3 sdw">
	<div class="card border-0">	
		<a href ="{{url('news'.'/'.$item->id)}}" class="la">
			<div style="background:url('{{$item->featured_photo}}')" class="ig4">
			</div>
			<div class="card-block">
				<p class="content pt-4" >
					{{$item->title}}
					<br>
					<small class="text-muted"><i class="fa fa-clock-o text-muted"></i>&nbsp;{{
						$item->created_at->diffForHumans()}}
					</small>
				</p>
			</div>
		</a>
	</div>
</div>
@endforeach