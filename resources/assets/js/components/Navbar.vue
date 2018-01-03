<template>
	<div class="header clearfix">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
			<div class="container">
				<router-link to="/" class="navbar-brand" >
					Aammui
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
	</div>
</template>