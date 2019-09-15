<!DOCTYPE html>
<html>
	<head>
		<title>{{ $person->name }}'s History</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@include("partials.modules.jquery3-4-1")
		@include("partials.modules.bootstrap4")
		@include("partials.modules.fontawesome-5-8-1")
		@include("partials.modules.shared")
		@include("partials.libraries.timeline")
	</head>
	<body>
		<div class="container mt-5 mb-5">
			<h4>{{ $person->name }}'s History</h4>
			<h4>Remaining Debt: <span class="text-primary">£{{ number_format($person->debt) }}</span></h4>
			
			<div class="row mt-5 justify-content-center">
				<div class="col-12 col-md-6">
					@forelse ($person->debts as $debtKey => $debt)
				
						@php
							
							$left		 =	$debtKey % 2 == 0;
							$date		 =	\Carbon\Carbon::parse($debt->date)->format("dS M, Y");
							$amount		 =	"<div class=\"col-2 text-center full d-inline-flex justify-content-center align-items-center\">
												<div class=\"circle font-weight-bold\">£{$debt->amount}</div>
											</div>";
							$content	 =	"<div class=\"col-5\">
												<h5>{$date}</h5>
												<p>{$debt->description}</p>
											</div>";
							
						@endphp
						
						@if ($left)
							<div class="row align-items-center d-flex">
								{!! $amount !!}
								{!! $content !!}
							</div>
							<!--path between 1-2-->
							<div class="row timeline">
								<div class="col-2">
									<div class="corner top-right"></div>
								</div>
								<div class="col-8">
									<hr/>
								</div>
								<div class="col-2">
									<div class="corner left-bottom"></div>
								</div>
							</div>
						@else
							<div class="row align-items-center justify-content-end d-flex">
								{!! $content !!}
								{!! $amount !!}
							</div>
							<!--path between 2-3-->
							<div class="row timeline">
								<div class="col-2">
									<div class="corner right-bottom"></div>
								</div>
								<div class="col-8">
									<hr/>
								</div>
								<div class="col-2">
									<div class="corner top-left"></div>
								</div>
							</div>
						@endif
						
					@empty
						<p>We cool, so far.</p>
					@endif
					<div class="row timeline">
						<div class="col-6">
							<h5>Where it all started</h5>
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
	</body>
</html>