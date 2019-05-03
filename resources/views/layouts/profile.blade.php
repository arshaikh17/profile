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
		a {
			color: #0288D1;
			text-decoration: none !important;
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
			color: white;
			width: 30px;
			height: 30px;
			border-radius: 50%;
			margin-right: 5px;
			text-align: center;
			transition: 0.3s;
		}
		.top-social-links > li {
			border: 2px solid white;
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
						<ul class="social-links inline-list top-social-links">
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
			<div class="container text-center pt-5">
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
			<div class="container text-center">
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
			<div class="container text-center">
				<ul class="menu-list inline-list">
					<li class="">
						<a class="" href="#experiences">Experiences</a>
					</li>
					<li class="">
						<a class="" href="#education">Education</a>
					</li>
					<li class="">
						<a class="" href="#skills">Skills</a>
					</li>
					<li class="">
						<a class="" href="#portfolio">Portfolio</a>
					</li>
					<li class="">
						<a class="" href="#contact">Contact</a>
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
				<div class="content-area border" id="skills">
					<h2 class="content-title text-center">Professional Skills</h2>
					<div class="row text-center skillset-row">
						<div class="col-12 skillset-heading">Major Skills</div>
						<div class="col-md-3 skillset-item">
							<h4 class="skillset-title">PHP</h4>
							<span class="skillset-level">Experienced, 2 years</span>
						</div>
						<div class="col-md-3 skillset-item">
							<h4 class="skillset-title">JavaScript</h4>
							<span class="skillset-level">Experienced, 2 years</span>
						</div>
						<div class="col-md-3 skillset-item">
							<h4 class="skillset-title">MySQL</h4>
							<span class="skillset-level">Experienced, 2 years</span>
						</div>
						<div class="col-md-3 skillset-item">
							<h4 class="skillset-title">Python</h4>
							<span class="skillset-level">Intermediate</span>
						</div>
					</div>
					<div class="row text-center skillset-row">
						<div class="col-12 skillset-heading">Frameworks</div>
						<div class="col-12">
							<span class="skillset-tag">Laravel</span>
							<span class="skillset-tag">Zend Framework</span>
							<span class="skillset-tag">Symfony</span>
						</div>
					</div>
					<div class="row text-center skillset-row">
						<div class="col-12 skillset-heading">Frontend Skills</div>
						<div class="col-12">
							<span class="skillset-tag">HTML5</span>
							<span class="skillset-tag">CSS3</span>
							<span class="skillset-tag">SCSS</span>
							<span class="skillset-tag">Bootstrap 3</span>
							<span class="skillset-tag">Bootstrap 4</span>
							<span class="skillset-tag">VueJS</span>
							<span class="skillset-tag">ReactJS</span>
							<span class="skillset-tag">AngularJS</span>
						</div>
					</div>
					<div class="row text-center skillset-row">
						<div class="col-12 skillset-heading">Source Control Tools</div>
						<div class="col-12">
							<span class="skillset-tag">Git</span>
						</div>
					</div>
					<div class="row text-center skillset-row">
						<div class="col-12 skillset-heading">Professional Tools</div>
						<div class="col-12">
							<span class="skillset-tag">MS Office</span>
							<span class="skillset-tag">Primavera</span>
							<span class="skillset-tag">Trello</span>
						</div>
					</div>
				</div>
				<div class="content-area border" id="portfolio">
					<h2 class="content-title text-center">Portfolio</h2>
					<div class="row">
						<?php for ($i = 0; $i <= 3; $i++) { ?>
						<div class="col-sm-6 col-md-3 portfolio-column">
							<div class="portfolio-item">
								<figure class="text-center">
									<img src="{{ asset('img/index.png') }}" class="img-fluid" />
								</figure>
								
								<div class="portfolio-description">
									<h3 class="portfolio-heading">Project Lorem Ipsum</h3>
									<span class="protfolio-sub-text">PHP, Laravel</span>
									<div class="protfolio-action">
										View on GitHub
									</div>
								</div>
								
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="content-area border" id="contact">
					<h2 class="content-title text-center">Get in Touch</h2>
					<div class="row">
						<div class="col-md-3 text-center">
							<img
								src="https://themes.3rdwavemedia.com/sphere/bs4/4.0/assets/images/profile-image.png"
								class="img-fluid img-circle"
							/>
						</div>
						<div class="col-md-9">
							<div class="contact-description">
								<p class="contact-introduction">
									I'm currently taking on freelance work. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
								</p>
								<p>
									<b>I can help with the following:</b>
								</p>
								<ul class="contact-keys">
									<li>
										<i class="fas fa-check"></i>
										Back-end development with PHP
									</li>
									<li>
										<i class="fas fa-check"></i>
										App development with ReactJS
									</li>
									<li>
										<i class="fas fa-check"></i>
										Front-end development with AngularJS
									</li>
									<li>
										<i class="fas fa-check"></i>
										UI development
									</li>
									<li>
										<i class="fas fa-check"></i>
										UX prototyping
									</li>
								</ul>
								<p>
									Drop me a line at <a href="mailto:arshaikh_17@hotmail.com">arshaikh_17@hotmail.com</a> or call me at <a href="tel:+44 7411 404816">+44 7411 404816</a>
								</p>
								<ul class="inline-list bottom-social-list">
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
			</div>
		</div>
		<footer class="text-center">
			<p>
				Copyright @ <a href="https://ialirasheed.com">Ali Rasheed</a>
			</p>
		</footer>
	</main>
	<style>
		.bottom-social-list {
			padding: 0;
		}
		.bottom-social-list > li {
			margin-right: 15px;
			font-size: 24px;
		}
		footer {
			margin-top: 80px;
		}
		.contact-keys {
			list-style: none;
		}
		.contact-keys > li {
			margin-bottom: 13px;
		}
		.fa-check {
			color: #0288D1;
		}
		.portfolio-column {
			padding: 5px;
		}
		.portfolio-item {
			background-color: #0288D1;
			min-height: 270px;
			height: auto;
			-webkit-box-shadow: 0 1px 4px 0 rgba(0,0,0,0.14);
			-moz-box-shadow: 0 1px 4px 0 rgba(0,0,0,0.14);
			box-shadow: 0 1px 4px 0 rgba(0,0,0,0.14);
			color: white;
		}
		.portfolio-description {
			padding: 10px 20px;
		}
		.portfolio-heading {
			font-size: 16px;
		}
		.portfolio-sub-text, .portfolio-action {
			font-size: 14px;
		}
		.protfolio-action {
			margin-top: 20px;
			padding-bottom: 15px;
		}
		.img-fluid {
			max-width: 100%;
		}
		.skillset-heading {
			font-size: 18px;
			color: #8A8A8A;
			font-weight: 300;
			margin-bottom: 20px;
		}
		.skillset-title {
			font-size: 1.5rem;
			font-weight: 500;
		}
		.skillset-level {
			color: #8A8A8A;
			font-size: 14px;
		}
		.skillset-row {
			margin-bottom: 20px;
		}
		.skillset-item {
			margin-bottom: 15px;
		}
		.skillset-tag {
			-webkit-box-shadow: 0 1px 4px 0 rgba(0,0,0,.3);
			-moz-box-shadow: 0 1px 4px 0 rgba(0,0,0,0.3);
			box-shadow: 0 1px 4px 0 rgba(0,0,0,0.3);
			padding: 6px 30px;
			display: inline-block;
			margin-right: 10px;
			border: 1px solid #F5F5F5;
			font-weight: 500;
			margin-bottom: 15px;
			font-size: 16px;
		}
		
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