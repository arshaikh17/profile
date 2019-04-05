<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="<?= $data["csrf_token"] ?>">

	<title>Ali Rasheed</title>

	<!-- Scripts -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

	<!-- Styles -->
	<link href="css/app.css" rel="stylesheet">
	<style>
		body {
			height: 100%;
			font-family: "Quicksand";
		}
		h1, h3, h5 {
			color: #607D8B;
		}
		a:hover {
			text-decoration: none;
		}
		#app {
			margin-top: 50px;
		}
		#leftNavigation {
			margin-top: 50%;
			text-align: right;
		}
		#leftNavigation ul {
			list-style: none;
		}
		#leftNavigation ul > li {
			margin-bottom: 5px;
		}
		#leftNavigation ul > li.active {
			text-decoration: underline;
		}
		#leftNavigation ul > li > a {
			color: black;
			margin-bottom: 5px;
		}
		#leftNavigation ul > li > a:hover {
			text-decoration: none;
		}
		.education {
			height: auto;
			min-height: 150px;
			background-color: white;
			margin-bottom: 10px;
			border: 1px solid #607D88;
		}
		.education:hover {
			cursor: default;
		}
		.education-city {
			color: #607D8B;
		}
		.education-content {
			transition: 0.3s;
		}
		.education:hover .education-content {
			background-color: #607D8B;
			color: white;
		}
		.decoration-underline {
			border-bottom: 2px solid #607D8B;
		}
		.education-content-body {
			padding: 15px 15px 15px 15px;
		}
		.content-body {
			margin-top: 10px;
		}
		footer {
			background-color: #607D88;
			color: white;
			bottom: 0;
			position: absolute;
			width: 100%;
		}
		footer a {
			color: white;
		}
		.contact-strip {
			height: 80px;
		}
		.contact-icon {
			background-color: #EFF2F3;
		}
		.contact-icon i {
			margin-top: 22px;
			color: #607D88;
		}
		
		.skill {
			min-height: 65px;
			height: auto;
			width: 100%;
			line-height: 65px;
			border: 2px solid lightgrey;
			margin-top: 10px;
			text-align: center;
			transition: 0.3s;
		}
		.skill > p {
			display: inline-block;
			vertical-align: middle;
			line-height: normal;
		}
		.skill:hover {
			background-color: #607D88;
			color: white;
		}
	</style>
</head>
<body >
	<div
		id="app"
		ng-app="mainApp"
		ng-controller="IndexController"
	>
		
		<div class="row">
			<div class="col-md-3">
				<div class="container">
					<div id="leftNavigation">
						<h1><span class="font-weight-bold">Ali</span> Rasheed</h1>
						<ul>
							<li class="active"><a href="#!">Home</a></li>
							<li><a href="#!about-me">About Me</a></li>
							<li><a href="#!education">Education</a></li>
							<li><a href="#!skills">Skills</a></li>
							<li><a href="#!experience">Experience</a></li>
							<li><a href="#!contact-me">Contact Me</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="col-md-9">
				<div class="container">
					<div ng-view></div>
				</div>
			</div>
		</div>
		
	</div>
</body>
<footer>
	<div class="text-center py-3">© <?= date("Y"); ?> Copyright:
		<a href="https://ialirasheed.com/"> <span class="font-weight-bold">Ali Rasheed</span></a>
	</div>
</footer>

</html>
<script>
	var app								 =	angular.module("mainApp", ["ngRoute"]);
	
	app.config(function ($routeProvider) {
		
		$routeProvider
			.when("/", {
				controller				 :	"IndexController",
				templateUrl				 :	"/angular/templates/index/home.html"
			})
			.when("/about-me", {
				controller				 :	"IndexController",
				templateUrl				 :	"/angular/templates/index/about-me.html"
			})
			.when("/education", {
				controller				 :	"IndexController",
				templateUrl				 :	"/angular/templates/index/education.html"
			})
			.when("/contact-me", {
				controller				 :	"IndexController",
				templateUrl				 :	"/angular/templates/index/contact-me.html"
			})
			.when("/skills", {
				controller				 :	"IndexController",
				templateUrl				 :	"/angular/templates/index/skills.html"
			})
			.when("/experience", {
				controller				 :	"IndexController",
				templateUrl				 :	"/angular/templates/index/experience.html"
			})
			.otherwise({
				redirectTo				 :	"/"
			});
		
	});
	
	app.factory("appData", ["$http", function ($http) {
		
		return $http
				.get("/api/appData")
				.then (function (data) {
					
					return data;
					
				}, function (err) {
					
					return err;
					
				});
		
	}]);
	
	app.controller("IndexController", ["$scope", "appData", function ($scope, appData) {
		
		appData.then (function (data) {
			
			$scope.appData				 =	data.data;
			
		});
		
	}]);
	
	app.directive("education", function () {
		
		return {
			restrict					 :	"E",
			scope						 :	{
				education				 :	"=",
				education_index			 :	"="
			},
			templateUrl					 :	"angular/templates/index/directives/education.html"
		}
		
	});
	
	app.directive("contactStrip", function () {
		
		return {
			restrict					 :	"E",
			scope						 :	{
				content					 :	"=",
				icon					 :	"@icon",
				param2					 :	"="
			},
			templateUrl					 :	"angular/templates/index/directives/contact-strip.html"
		}
		
	});
	
	app.directive("skillStrip", function () {
		
		return {
			restrict					 :	"E",
			scope						 :	{
				content					 :	"="
			},
			templateUrl					 :	"angular/templates/index/directives/skill-strip.html"
		}
		
	})
	
</script>