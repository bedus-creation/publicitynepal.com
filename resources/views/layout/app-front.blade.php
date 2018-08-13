<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title','PublicityNepal.com | Nepal No. One news Portal Site.')</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{url('css/b.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{url('css/app.css')}}">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	@yield('meta')
	@yield('head')
</head>
<body>
	@include('front.components.navbar')
	@yield('content')
	<div id="app">
	</div>
	@include('layout.footer')
	@include('layout.scripts')
	@yield('script')
</body>
</html>