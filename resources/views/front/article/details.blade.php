@extends('layout.app-front')

@section('content')
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
			<div class="card">
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
<style type="text/css">
	#details img{
		max-width: 100% !important;
	}
</style>	
@endsection