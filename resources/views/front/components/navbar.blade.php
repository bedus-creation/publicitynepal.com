<style type="text/css">
#header span{
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
</style>
<div id="header">
	<div class="text-center">
		<p class="card-header">
			<span style="color:rgb(255,0,0);">Publicity</span>&nbsp;<u style="color:rgb(255,0,0); border-bottom:5px solid;">
				<span style="color:rgb(0,0,255);">Nepal</span></u>
			</br>
			<small class="text-muted">A pure Nepali online News Portal</small>
		</p>
	</div>
</div>
<nav class="navbar navbar-expand-sm  navbar-dark bg-nav sticky-top">
	<div class="container mx-auto d-sm-flex d-block flex-sm-nowrap">
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
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
