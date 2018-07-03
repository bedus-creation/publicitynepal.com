<style type="text/css">
#header {
	background: rgba(0,0,0,0.03);
}
#header span,a span{
	font-size: 40px;
	font-weight: bold;
	font-family: 'Kaushan Script', cursive;
}
.nav-item{
	border-left: #3174b8 1px solid;
	border-right: #215181 1px solid;
	padding-left: 10px;
	line-height: 30px;
	padding-right: 10px;
}
.fa{
	font-size: 25px;
	color:#fff;
}
.bg-nav{
	padding: 0;
	background: #2964a0;
}
.nav-item a{
	padding-top: 10px;
	font-weight: bolder;
	font-size: 20px;
	font-family: 'Khand', sans-serif;
	color:#fff !important;
}
.nav-link {
	padding: 0.5rem;
}
@media screen and (max-width: 768px){
	a span{
		font-size: 24px;
	}
}
</style>
<div id="header">
	<div class="container">
		<div class="row">
			<div class="col-md-4  pt-4 pb-4 p-0">
				<img class="mb-logo" src="{{url('/images/p5.jpg')}}" width="100%" height="80">
			</div>
			<div class="col-md-8 p-4">
				<img src="{{url('images/nissan.gif')}}" class="w-100">	
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-expand-sm  navbar-dark bg-nav sticky-top">
	<div class="container mx-auto d-sm-flex d-block flex-sm-nowrap">
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		&nbsp;
		<a href="{{url('')}}" class="d-inline d-md-none"><span style="color:rgb(255,0,0);">Publicity</span>&nbsp;
			<span style="color:rgb(255,255,255);">Nepal</span></u>
		</a>
		<div class="collapse navbar-collapse text-center bg-nav" id="navbarCollapse">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link pl-4 pr-4" href="{{url('/')}}">
						<i class="fa cfa fa-home" style="width:20px"></i>
					</a>
				</li>
				@foreach($menus as $item)
				<li class="nav-item">
					<a class="nav-link"
					href="{{url($item->slug)}}">{{$item->name}}</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</nav>
