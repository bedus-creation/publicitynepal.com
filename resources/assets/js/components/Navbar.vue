<template>
	<nav class="navbar navbar-expand-sm  navbar-dark bg-nav sticky-top">
		<div class="container mx-auto d-sm-flex d-block flex-sm-nowrap">
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse text-center bg-nav" id="navbarCollapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<router-link class="nav-link pl-4 pr-4" to="/">
							<i class="fa cfa fa-home" style="width:20px"></i>
						</router-link>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-target="#explore-head-section
						" href="#explore-head-section">समाचार</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#create"> राजनीति
						</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="#shae">
							कला / साहित्य
						</a>
					</li><li class="nav-item">
						<a class="nav-link" href="#shae">
							प्रवास
						</a>
					</li><li class="nav-item">
						<a class="nav-link" href="#shae">
							विचार/ब्लग
						</a>
					</li><li class="nav-item">
						<a class="nav-link" href="#shae">
							फिचर
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#shae">
							अर्थ
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#shae">
							स्वास्थ्य
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#shae">
							प्रविधि
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</template>
<style type="text/css">
.nav-item{
	border-left: #3174b8 1px solid;
	border-right: #215181 1px solid;
	padding: 4px 10px;
}
.fa{
	line-height: 50%;
	font-size: 30px;
	color:#fff;
}
.bg-nav{
	padding: 0;
	background: #2964a0;
}
.nav-item a{
	font-size: 15px;
	font-family: 'Khula', sans-serif;
	color:#fff !important;
}
.nav-link {
	padding: 0.5rem;
}
</style>
<script>

</script>