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
<div class="col-md-12 mc text-center">
    <a  class="topl d-none d-md-block" href="{{url('news/'.$data->relations[0]->posts->id)}}">
        {{$data->relations[0]->posts->title}}
    </a>
</div>
@foreach($data->relations->slice(0, 4) as $item)
<div class="c-md-3 mb-3 sdw">
	<div class="card border-0">	
		<a href ="{{url('news'.'/'.$item->posts->id)}}" class="la">
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
		</a>
	</div>
</div>
@endforeach