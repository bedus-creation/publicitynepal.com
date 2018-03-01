<template>
	<nav class="navbar navbar-expand-sm  navbar-dark bg-danger sticky-top">
		<div class="container mx-auto d-sm-flex d-block flex-sm-nowrap">
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse text-center bg-danger" id="navbarCollapse">
				<ul class="navbar-nav ">
					<li class="nav-item">
						<a class="nav-link" data-target="#ho" href="#home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-target="#explore-head-section
						" href="#explore-head-section">Service</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#create">Create</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#shae">Share</a>
					</li>
					<li class="nav-item"><router-link class="nav-link" to="/login">Login</router-link>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</template>
<style type="text/css">
.fa{
	font-size: 30px;
	color:#fff;
}
.nav-tabs {
	width: 100%;
	text-align: center;
	height: 40px;
	overflow-y: hidden;
	overflow-x: auto;
	display: -webkit-box;
	display: -moz-box;
}
.nav-tabs>li {
	float: none;
}
#category-menu{
	background-color: #c94c4c;
	height: 40px;
	font-size:1.2rem;
}
#category-menu a{
	color: #fff;
	font-weight: bold;

}
.nav-tabs li a{
	text-decoration: none;
}
</style>
<script>

</script>