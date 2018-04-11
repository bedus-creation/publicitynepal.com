@extends('layout.app-front')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Mukta" rel="stylesheet">
@if($post)
<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "NewsArticle",
		"mainEntityOfPage": {
			"@type": "WebPage",
			"@id": "https://google.com/article"
		},
		"headline": "{{$post->title}}",
		"image": [
		"{{$post->featured_photo}}"
		],
		"datePublished": "{{$post->created_at}}",
		"dateModified": "{{$post->updated_at}}",
		"author": {
			"@type": "Person",
			"name": "Publicity-Nepal"
		},
		"publisher": {
			"@type": "Organization",
			"name": "Publicity-Nepal",
			"logo": {
				"@type": "ImageObject",
				"url": "https://google.com/logo.jpg"
			}
		},
		"description": "{{{$post->content}}}"
	}
</script>
<article class="container" id="details">
	<div class="row">
		<div class="col-md-8">
			<div class="card border-0">
				<div class="card-header">
					{{$post->title}}
				</div>
				<div class="d-flex justify-content-start">
					<div class="p-2">
						<div class="fb-share-button btn p-2" data-href="{{url()->current()}}" 
							data-layout="button_count" data-size="large">
						</div>
					</div>
					<div class="p-2">

						<a class="twitter-share-button" href="https://twitter.com/intent/tweet" data-size="large">
							<div style="background: #55ACEE; width: 100px;" class="btn text-center"><i class="fa fa-twitter"></i></div>
						</a>
					</div>
				</div>
			</div>
			<img class="card-img-top"
			src="{{$post->featured_photo}}" 
			/>
			<div class="card-text">
				<span class="d-c">{!!$post->content!!}</span>
			</div>
		</div>
	</div>
</div>
</article>
@else


@endif
<style type="text/css">
.card-header{
	color: #2964a0;
	font-weight: 600;
	font-size: 40px;
	font-family: 'Mukta', sans-serif;
}
#details .d-c{
	font-family: 'Mukta', sans-serif !important;
	font-size: 20px !important;
	line-height: 30px !important;
}
#details img{
	max-width: 100% !important;
}
@media screen and (max-width: 768px){
	.card-header{
		font-size: 24px;
	}
	#details {
		padding: 10 !important;
	}
}
</style>	
@endsection
@section('script')
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=1622291221319152&autoLogAppEvents=1';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
@endsection