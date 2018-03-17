@extends('layout.app-front')

@section('content')
<article class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<img class="card-img-top"
				src="{{$post->featured_photo}}" 
				/>
				<div class="card-header">
					{{$post->title}}
				</div>
				<div class="card-text">
					<span>{{{$post->content}}}</span>
				</div>
			</div>
		</div>
	</div>
</article>
@endsection