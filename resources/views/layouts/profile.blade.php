<!DOCTYPE html>
<html>
<head>
	<title>Ali Rasheed - @yield("title")</title>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Ali Rasheed Portfolio">
	<meta name="author" content="Ali Rasheed">
	<meta name="csrf-token" content="<?= csrf_token(); ?>">
	
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
	
	<script src="{{ asset('js/app.js') }}"></script>
	
	<style>
		body {
			font-family: "Roboto";
		}
		
		.top-layer {
			background-color: #29B6F6;
			height: 150px;
		}
		.inline-list {
			list-style: none;
			display: inline-flex;
		}
		.social-links {
			float: right;
		}
		.social-links a {
			color: white;
		}
		.social-links li {
			border: 2px solid white;
			color: white;
			width: 30px;
			height: 30px;
			border-radius: 50%;
			margin-right: 5px;
			text-align: center;
			transition: 0.3s;
		}
		.social-links > li:hover {
			background-color: white;
		}
		.social-links > li:hover a {
			color: #0D47A1;
		}
		.heading {
			color: white;
		}
		.heading .name {
			font-size: 48px;
			margin-top: 20px;
			margin-bottom: 15px;
		}
		.heading .title {
			font-size: 28px;
			font-weight: 300;
			margin-bottom: 20px;
		}
		.heading .objective {
			margin-top: 40px;
		}
		
		.second-layer {
			background-color: #0288D1;
			height: 350px;
		}
		
		.third-layer {
			min-height: 80px;
			height: auto;
			background-color: #1976D2;
		}
		.contact {
			color: white;
		}
		.contact .item {
			margin-top: 25px;
			margin-bottom: 25px;
		}
		
	</style>
	<style>
		@media screen and (max-width: 768px) {
			#downloadCV, #socialLinkDiv {
				text-align: center !important;
			}
			
			.social-links {
				margin-right: 40px;
				margin-top: 10px;
				float: none;
			}
		}
	</style>
</head>
<body>
	<header>
		<div class="top-layer">
			<div class="container-fluid pt-3">
				<div class="row">
					<div class="col-md-6" id="downloadCV">
						<a href="#" class="btn btn-primary border" id="downloadCVButton"> <i class="fas fa-download"></i> Download CV</a>
					</div>
					<div class="col-md-6" id="socialLinkDiv">
						<ul class="social-links inline-list">
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-stack-overflow"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-github"></i></a></li>
							<li><a href="#"><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="second-layer">
			<div class="container-fluid text-center pt-5">
				<div class="row">
					<div class="col-md-7 offset-md-3">
						<div class="heading">
							<h1 class="name">Ali Rasheed</h1>
							<h3 class="title">Web Developer</h3>
							<p class="objective">
								I proactively seek suitable opportunities where I could contribute to the project success as well as add to my knowledge and skills.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="third-layer">
			<div class="container-fluid text-center">
				<div class="row contact">
					<div class="col-md-4 item">
						<i class="fas fa-envelope"></i> arshaikh_17@hotmail.com
					</div>
					<div class="col-md-4 item">
						<i class="fas fa-phone"></i> +44 (0) 7411 404816
					</div>
					<div class="col-md-4 item">
						<i class="fas fa-home"></i> London, UK
					</div>
				</div>
			</div>
		</div>
	</header>
</body>
</html>