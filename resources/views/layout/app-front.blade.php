<!DOCTYPE html>
<html lang="en">
<head>
	<title>PublicityNepal.com | Nepal No. One news Portal Site.</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{url('css/b.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{url('css/app.css')}}">
	<script src="{{url('js/app.js')}}" defer></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
	@include('front.components.navbar')
	@yield('content')
	<style type="text/css">
		body{
			/* background:#efefef; */
		}
		footer #footer-top{
			background: #efefef;
		}
		footer #footer-bottom{
			background: #d2d9e0;
		}

		footer .fa:hover {
			opacity: 0.7;
		}
		footer .fa-facebook {
			background: #3B5998;
			color: white;
		}
		.fa-youtube {
			background: #bb0000;
			color: white;
		}
		.fa-twitter {
			background: #55ACEE;
			color: white;
		}

		.fa-google {
			background: #dd4b39;
			color: white;
		}
		footer .fa{
			padding: 15px;
			font-size: 25px;
			width: 55px;
			text-align: center;
			text-decoration: none;
			border-radius: 50%;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}
		.c_name{
			font-size: 24px;
			color: #2964a0;
		}
	</style>
<footer>
	<div id="footer-top">
		<div class="container">
			<div class="row pt-4">
				<div class="col-md-4 pb-2">
					<p><strong class="c_name pb-0"><span style="color:rgb(255,0,0);">Publicity</span>
					<span style="color:rgb(255,0,0); border-bottom:5px solid;">
						<span style="color:rgb(41,100,160);">Nepal</span>
					</span> &nbsp;Pvt. Ltd.</strong>
					<div>सूचना विभाग दर्ता नंः ३५१/०७३-७४</div>	
					</p>
					<ul class="list-unstyled">
						<li>Putalisadak 32,Newplaza Kathmandu,</li>
						<li>Email: publicitynepal@gmail.com </li>
						<li>Phone: +977-1-4425436 ,+977-9818209080 </li>
						<li>Web: www.publicitynepal.com</li>
					</ul>
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-4">
							<p><strong class="c_name pb-0">महत्वपुर्ण लि'क</strong></p>
							<ul class="list-unstyled">
								<li><a href="#" class="text-muted">Home</a></li>
								<li><a href="#" class="text-muted">साहित्य</a></li>
							</ul>
						</div>
						<div class="col-md-4">
							<p><strong class="c_name pb-0">हाम्रो बारे</strong></p>
							<ul class="list-unstyled">
								<li><a href="#"  class="text-muted">प्रयोगका सर्त</a></li>
							</ul>
						</div>
						<div class="col-md-4">
							<p><strong class="c_name pb-0">विज्ञापनका लागि</strong>
								<div>9818209080, 9841876939,</br>publicitynepal.com@gmail.com</div>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

				<!--Grid column-->
				<div class="col-md-8 col-12 mt-5 text-white">
					<p style="line-height: 1.7rem">.</p>

				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="mb-5">
						<a href="https://www.facebook.com/publicitynepalnews/">
							<i class="fa fa-facebook"> </i>
						</a>
						<a href="https://www.youtube.com/channel/UCDnfENrRal_mVpcpPbEsuFA">
							<i class="fa fa-youtube"> </i>
						</a>
						<a href="https://twitter.com/publicitynepal">
							<i class="fa fa-twitter"> </i>
						</a>
						<a href="#">
							<i class="fa fa-google"> </i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer-bottom" class="footer-copyright py-3 text-center">
		© 2010-2018 Copyright:
		<a href="{{url('/')}}"> PublicityNepal.com </a>
	</div>
</footer>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Khand|Karma" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-106586554-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-106586554-4');
</script>
@yield('script')
</body>
</html>