@extends('layout.app-front')

@section('title')
{{$post->title}}
@endsection


@section('meta')
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# video: http://ogp.me/ns/video#">
<meta property="og:type"   content="article" /> 
<meta property="fb:app_id" content="869009319945356" /> 
<meta property="og:url"    content="{{url()->current()}}" /> 
<meta property="og:title"  content="{{$post->title}}" /> 
<meta property="og:image"  content="{{$post->featured_photo}}" /> 
<meta property="og:site_name" content="PublicityNepal.com" />
<meta property="og:description" content="{{str_limit(strip_tags($post->content),100)}}"/>

<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:domain" content="{{url('/')}}"/>
<meta name="twitter:title" property="og:title" content="{{$post->title}}" />
<meta name="twitter:image" property="og:image" content="{{$post->featured_photo}}"/>
<meta name="twitter:description" property="og:description" itemprop="description" content="{{str_limit(strip_tags($post->content),100)}}"/>


@endsection

@section('content')
<link href="https://fonts.googleapis.com/css?family=Mukta" rel="stylesheet">
@if($post)
<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "NewsArticle",
		"mainEntityOfPage": {
			"@type": "WebPage",
			"@id": "{{url()->current()}}"
		},
		"headline": "{{str_limit($post->title,100)}}",
		"image": [
		"{{$post->featured_photo}}"
		],
		"datePublished": "{{$post->created_at}}",
		"dateModified": "{{$post->updated_at}}",
		"author": {
			"@type": "Person",
			"name": "PublicityNepal"
		},
		"publisher": {
			"@type": "Organization",
			"name": "PublicityNepal Pvt. Ltd.",
			"logo": {
				"@type": "ImageObject",
				"url": "{{url('/images/p1.jpg')}}"
			}
		},
		"description": "{{str_limit(strip_tags($post->content),100)}}"
	}
</script>
<article class="container" id="details">
	<div class="row">
		<div class="col-md-9">
			<div class="card border-0">
				<div class="card-header">
					{{$post->title}}
				</div>
				<div class="d-flex justify-content-start">
					<div class="p-2">
						<div class="fb_sh_d">
							<div>
								<span id="fb-share-count">0</span>
								<p> Shares </p>
							</div>
						</div>
					</div>
					<div class="fb-share p-2 ">
						<a href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&app_id=1622291221319152&sdk=joey&u={{url()->current()}}&display=popup&ref=plugin&src=share_button" 
						onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')" style="background: #3B5998; width: 100px;" class="btn "><i class="fa fa-facebook"></i></a>
					</div>
					<div class="fb-share p-2 ">
							<a
								href="https://twitter.com/intent/tweet?text={{$post->title.' '.url()->current()}}" style="background: #55ACEE;" class="btn text-center w-100"
								onclick="return !window.open(this.href, 'Twitter', 'width=640,height=580')"
								>
								<i class="fa fa-twitter"></i>
							</a>
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

			<div class="alert alert-light">
				<div id="fb-root"></div>
				<div class="fb-comments" data-href="{{url()->current()}}" data-width="100%"  data-numposts="5"></div>
			</div>
		</div>
		<div class="col-md-3">
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
.fb-share{
	display: flex;
	align-items: center;
	padding: 10px;
	height: 100px;
	width: 100px;
}
#fb-share-count{
	line-height: 1.5;
	font-size: 60px;
	font-weight: 600;
}
.fb_sh_d{
	width: 180px;
	text-align: center;
	display: flex;
	justify-content: center;
	align-items: center;
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


$.ajax({
	url:"//graph.facebook.com/",
	type:"GET",
	data:'id='+'{{url()->current()}}',
	success:function(data){
		$(this).prop('Counter',0).animate({
		Counter: data.share.share_count
		}, {
			duration: 4000,
			easing: 'swing',
			step: function (now) {
				$("#fb-share-count").text(Math.ceil(now));
			}
		});
	}
})

</script>
@endsection