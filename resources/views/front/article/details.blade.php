@extends('layout.app-front')

@section('content')
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
				<img class="card-img-top"
				src="{{$post->featured_photo}}" 
				/>
				<div class="card-header">
					{{$post->title}}
				</div>
				<div class="card-text">
					<span>{!!$post->content!!}</span>
				</div>
			</div>
		</div>
	</div>
</article>
@else


@endif
<style type="text/css">
@media screen and (max-width: 768px){
	#details {
		padding: 0 !important;
	}
}
#details img{
	max-width: 100% !important;
}
</style>	
@endsection