<!DOCTYPE html>
<html lang="en">
<head>
	<title>PublicityNepal.com | Nepal No. One news Portal Site.</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{url('css/b.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
	@include('front.components.navbar')
	@yield('content')
	<style type="text/css">
	footer #footer-top{
		background: #243a51;
	}
	footer #footer-bottom{
		background: #1c2d3e;
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
</style>
<footer>
	<div id="footer-top">
		<div class="container">
			<div class="row pt-5 mb-3 text-center d-flex justify-content-center">
				<div class="col-md-2 mb-3">
					<h6 class="text-uppercase font-weight-bold">
						<a href="#!">About us</a>
					</h6>
				</div>
				<div class="col-md-2 mb-3">
					<h6 class="text-uppercase font-weight-bold">
						<a href="#!">Products</a>
					</h6>
				</div>
				<div class="col-md-2 mb-3">
					<h6 class="text-uppercase font-weight-bold">
						<a href="#!">Awards</a>
					</h6>
				</div>
				<div class="col-md-2 mb-3">
					<h6 class="text-uppercase font-weight-bold">
						<a href="#!">Help</a>
					</h6>
				</div>
				<!--Grid column-->

				<!--Grid column-->
				<div class="col-md-2 mb-3">
					<h6 class="text-uppercase font-weight-bold">
						<a href="#!">Contact</a>
					</h6>
				</div>
				<!--Grid column-->

			</div>
			<!--Grid row-->

			<hr class="rgba-white-light" style="margin: 0 15%;">

			<!--Grid row-->
			<div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

				<!--Grid column-->
				<div class="col-md-8 col-12 mt-5 text-white">
					<p style="line-height: 1.7rem">.</p>

				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<div class="mb-5">
						<a>
							<i class="fa fa-facebook"> </i>
						</a>
						<a>
							<i class="fa fa-youtube"> </i>
						</a>
						<a>
							<i class="fa fa-twitter"> </i>
						</a>
						<a>
							<i class="fa fa-google"> </i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer-bottom" class="footer-copyright py-3 text-center">
		© 2010-2018 Copyright:
		<a href="https://mdbootstrap.com/material-design-for-bootstrap/"> PublicityNepal.com </a>
	</div>
</footer>
<script
src="https://code.jquery.com/jquery-3.2.1.js"
integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Khand|Karma" rel="stylesheet">
</body>
</html>