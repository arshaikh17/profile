@extends("layouts.comics.public")
@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-md-4">
					<div>
						<img
						src="{{ asset('uploads/comics/characters/' . $character->cover) }}"
						class="img-fluid"
						/>
					</div>
				</div>
				<div class="col-md-8 character-info">
					@if (Auth::user())
					<div class="clearfix mb-2">
						<div class="float-md-right">
							<a href="{{ route('comics.admin.characters.edit', $character) }}" class="btn btn-sm btn-primary">Edit</a>
						</div>
					</div>
					@endif
					<h1 class="bg-dark text-white p-4">{{ $character->name }}</h1>
					<div class="shadow-sm p-4 mb-4 bg-white">
						<div class="row">
							<div class="col-4">
								<p>Issues</p>
								<p>Arcs</p>
								<p>Series</p>
							</div>
							<div class="col-8">
								<p class="font-weight-bold">{{ $character->issues()->count() }}</p>
								<p class="font-weight-bold">{{ $character->arcs()->count() }}</p>
								<p class="font-weight-bold">{{ $character->series()->count() }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 mt-3">
			
			<h1 class="text-center mb-2">Comics</h1>
			
			@php
				$series					 =	$character->series;
			@endphp
			
			<ul class="nav nav-pills p-3">
				@forelse ($series as $seriesKey => $singleSeries)
				<li class="nav-item bg-dark">
					<a class="nav-link text-white @if ($seriesKey == 0) active @endif" data-toggle="pill" href="#series_{{ $singleSeries->id }}">{{ $singleSeries->title }}</a>
				</li>
				@empty
				@endforelse
			</ul>
			<div class="tab-content">
				@forelse ($series as $seriesKey => $singleSeries)
				
				@php
					$singleIssues		 =	$singleSeries->singleIssues;
				@endphp
				
				<div class="tab-pane container @if ($seriesKey == 0) active @else fade @endif" id="series_{{ $singleSeries->id }}">
					
					<h3 class="bg-dark shadow p-3 mt-2 text-white">{{ $singleSeries->title }}</h3>
					
					<div class="row">
						<div class="col-12 col-md-8">
							<h4>Arcs</h4>
							<div class="row arcs-row">
								@forelse ($singleSeries->arcs as $arc)
								<div class="col-12 col-md-6 mb-4 arc">
									<div class="shadow p-4 bg-dark text-white">
										{{ $arc->title }}
										<ul>
											@forelse ($arc->issues as $issue)
											<li>#{{ $issue->issue . ' - ' . $issue->title }}</li>
											@empty
											@endforelse
										</ul>
									</div>
								</div>
								@empty
								<div class="col-12"><p>No arcs under {{ $singleSeries->title }}</p></div>
								@endforelse
							</div>
						</div>
						<div class="col-12 col-md-4">
							<h4>Single Issues</h4>
							@if ($singleIssues->count())
							@forelse ($singleIssues as $singleIssue)
							<div class="border border-secondary shadow p-2">#{{ $singleIssue->issue . " - " . $singleIssue->title }}</div>
							@empty
							@endforelse
						</div>
						@endif
					</div>
				</div>
				@empty
				<p>No comics under {{ $character->name }}</p>
				@endforelse
			</div>
		</div>
		
	</div>
</div>
<script>
	$(".arcs-row").masonry({
		itemSelector					 :	".arc",
	});
</script>
@endsection