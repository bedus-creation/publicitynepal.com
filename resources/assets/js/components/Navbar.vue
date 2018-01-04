<template>
	<div class="header clearfix">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
			<div class="container">
				<router-link to="/" class="navbar-brand" >
					<img src="/images/logo.png" width="100" height="30"/>
				</router-link>
				<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse bg-dark" id="navbarCollapse">
					<ul class="navbar-nav ml-auto">
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
		<div id="category-menu">
			<div class="container">
				<ul class="nav nav-tabs justify-content-center" role="tablist">
					<li role="presentation" class="active p-2"><a href="#tab1" role="tab" data-toggle="tab">Home</a></li>
					<li role="presentation" class="p-2"><a href="#tab2" role="tab" data-toggle="tab">News</i></a></li>
					<li role="presentation" class="p-2"><a href="#tab3" role="tab" data-toggle="tab">Tab Number 3</a></li>
					<li role="presentation"  class="p-2"><a href="#tab4" role="tab" data-toggle="tab" class="p-2">Tab Number 4</a></li>
					<li role="presentation" class="p-2"><a href="#tab5" role="tab" data-toggle="tab">Tab Number 5</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="tab1">content...</div>
					<div role="tabpanel" class="tab-pane" id="tab2">Tab 2 content...</div>
					<div role="tabpanel" class="tab-pane" id="tab3">Tab 3 content...</div>
					<div role="tabpanel" class="tab-pane" id="tab4">Tab 4 content...</div>
					<div role="tabpanel" class="tab-pane" id="tab5">Tab 5 content...</div>
				</div>
			</div>
		</div>
	</div>
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