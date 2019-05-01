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
			background-color: #F5F5F5;
		}
		h1, h2, h3 {
			font-weight: 500;
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
		
		.fourth-layer {
			background-color: #01579B;
			height: 60px;
		}
		.menu-list {
			margin-top: 15px;
		}
		.menu-list li {
			margin-right: 20px;
		}
		.menu-list li a {
			color: #82B1FF;
			text-decoration: none;
			transition: 0.3s;
		}
		.menu-list li a:hover {
			color: white;
		}
		.content-area {
			margin-top: 30px;
			padding: 60px;
			background-color: white;
			box-shadow: 0 1px 4px 0 rgba(0,0,0,0.14);
			-webkit-box-shadow: 0 1px 4px 0 rgba(0,0,0,0.14);
			-moz-box-shadow: 0 1px 4px 0 rgba(0,0,0,0.14);
			-moz-border-radius: 2px;
			-ms-border-radius: 2px;
			-o-border-radius: 2px;
			border-radius: 2px;
			margin-bottom: 10px;
		}
		.content-title {
			margin-bottom: 45px;
			font-size: 24px;
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
		@media screen and (max-width: 448px) {
			.fourth-layer {
				display: none;
			}
		}
		
		.experience-item {
			margin-left: 300px;
		}
		.experience-location {
			left: -250px;
			top: -40px;
			position: relative;
			line-height: 5px;
		}
		.experience-title {
			font-size: 25px;
			font-weight: 300;
		}
		.experience-location > .job {
			font-size: 18px;
			color: #0288D1;
		}
		.experience-location > .location, .experience-location > .dates {
			color: #8A8A8A;
		}
		.experience-description {
			position: relative;
			top: -80px;
		}
		@media screen and (max-width: 997px) {
			.experience-location {
				position: static;
				left: 0px;
				top: 0px;
			}
			.experience-description {
				position: static;
				top: 0px;
			}
			.experience-item {
				margin-left: 0px;
			}
		}
	</style>
</head>
<body data-spy="scroll" data-target=".menu-list" data-offset="50">
	<main>
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
		<div class="fourth-layer sticky-top">
			<div class="container-fluid text-center">
				<ul class="menu-list inline-list">
					<li class="">
						<a class="" href="#experiences">Experiences</a>
					</li>
					<li class="">
						<a class="" href="#education">Education</a>
					</li>
					<li class="">
						<a class="" href="#section3">Skills</a>
					</li>
					<li class="">
						<a class="" href="#section3">Portfolio</a>
					</li>
					<li class="">
						<a class="" href="#section3">Contact</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="fifth-layer">
			<div class="container">
				<div class="content-area border" id="experiences">
					<h2 class="content-title text-center">Work Experience</h2>
					<div class="row">
						<div class="col-md-12">
							<div class="experience-item">
								<div class="experience-title">
									<p>Google</p>
								</div>
								<div class="experience-location">
									<p class="job">Web Developer</p>
									<p class="location"><i class="fas fa-map-marker-alt"></i> London, UK</p>
									<p class="dates">2018 - 2019</p>
								</div>
								<div class="experience-description">
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
										<ul>
											<li>Lorem ipsum dolor sit amet</li>
											<li>Maecenas tempus tellus eget</li>
											<li>Donec pede justo ante</li>
										</ul>
									</p>
								</div>
							</div>
							<div class="experience-item">
								<div class="experience-title">
									<p>Google</p>
								</div>
								<div class="experience-location">
									<p class="job">Web Developer</p>
									<p class="location"><i class="fas fa-map-marker-alt"></i> London, UK</p>
									<p class="dates">2018 - 2019</p>
								</div>
								<div class="experience-description">
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
										<ul>
											<li>Lorem ipsum dolor sit amet</li>
											<li>Maecenas tempus tellus eget</li>
											<li>Donec pede justo ante</li>
										</ul>
									</p>
								</div>
							</div>
							<div class="experience-item">
								<div class="experience-title">
									<p>Google</p>
								</div>
								<div class="experience-location">
									<p class="job">Web Developer</p>
									<p class="location"><i class="fas fa-map-marker-alt"></i> London, UK</p>
									<p class="dates">2018 - 2019</p>
								</div>
								<div class="experience-description">
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
										<ul>
											<li>Lorem ipsum dolor sit amet</li>
											<li>Maecenas tempus tellus eget</li>
											<li>Donec pede justo ante</li>
										</ul>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="content-area border" id="education">
					<h2 class="content-title text-center">Education</h2>
					<div class="row">
						<div class="col-md-6">
							<div class="education-item">
								<div class="education-title">MSc Advance Software Engineering</div>
								<div class="education-location">University of Westminster</div>
								<div class="education-dates">2017 - 2018</div>
								<div class="education-description">
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient 
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="education-item">
								<div class="education-title">BSCS Computer Science</div>
								<div class="education-location">SZABIST</div>
								<div class="education-dates">2013 - 2017</div>
								<div class="education-description">
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient 
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<style>
		.education-title {
			color: #0288D1;
			font-size: 18px;
			font-weight: 500;
		}
		.education-location {
			font-size: 16px;
			font-weight: 300;
		}
		.education-dates {
			color: #8A8A8A;
		}
		.education-description {
			margin-top: 18px;
		}
	</style>
</body>
</html>