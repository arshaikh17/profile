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

	<!-- Styles -->
	<link href="css/app.css" rel="stylesheet">
	<style>
		body {
			height: 100%;
			
			font-family: "Quicksand";
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
			height: 150px;
			background-color: white;
			margin-bottom: 10px;
			border-bottom: 1px solid grey;
			padding: 10px 10px 10px 10px;
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
							<li>Skills</li>
							<li>Experience</li>
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
				education				 :	"="
			},
			templateUrl					 :	"angular/templates/index/directives/education.html"
		}
		
	})
	
</script>