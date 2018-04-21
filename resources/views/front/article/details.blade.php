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

var i=0;
while(i<=30){
	setTimeout(function(){
		i++;
		$('#fb-share-count').text(i);//data.share.share_count
	},1000);
}

$.ajax({
	url:"//graph.facebook.com/",
	type:"GET",
	data:'id='+'{{url()->current()}}',
	success:function(data){
		
	}
})

</script>
@endsection