<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Expenses</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include("partials.modules.jquery3-4-1")
	@include("partials.modules.bootstrap4")
	@include("partials.modules.fontawesome-5-8-1")
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	@include("partials.modules.nprogress")
	@yield("scripts")
	@include("partials.modules.shared")
</head>
<body>
	<main id="app">
		<div class="container">
			<div class="row">
				<div class="col-8">
					<h1>August</h1>
				</div>
				<div class="col-4">
					<a href="#" class="btn btn-sm btn-info float-right">Add Tags</a>
					<a href="#" class="btn btn-sm btn-info float-right mr-2">Add Expense</a>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-6 statistics-card">
					<a href="#">
						<div class="card">
							<div class="card-body bg-info text-white">
								<h4 class="card-title">Budget</h4>
								<h1 class="card-text">£{{ number_format(1500) }}</h1>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 statistics-card">
					<a href="#">
						<div class="card">
							<div class="card-body bg-info text-white">
								<h4 class="card-title">Spent</h4>
								<h1 class="card-text">£{{ number_format(100) }}</h1>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="row">
				<div
					class="col-12 hover-link"
					data-toggle="collapse"
					data-target="#statisticsStrip"
				>
					<h2>Monthly Allocations</h2>
				</div>
				<div class="col-12">
					<div class="row collapse show" id="statisticsStrip">
						<div class="col-md-4">
							<div class="bg-info text-white statistics-strip">
								<p>Savings</p>
								<p class="text-30">£100</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="bg-info text-white statistics-strip">
								<p>Savings</p>
								<p class="text-30">£100</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="bg-info text-white statistics-strip">
								<p>Savings</p>
								<p class="text-30">£100</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>