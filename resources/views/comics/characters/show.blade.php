@extends("layouts.comics")

@section("content")
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
						<a href="{{ route('comics.characters.edit', $character) }}" class="btn btn-sm btn-dark">Edit</a>
					</div>
				</div>
				@endif
				<h1 class="bg-dark text-white p-4">{{ $character->name }}</h1>
				<div class="shadow-sm p-4 mb-4 bg-white">
					<div class="row">
						<div class="col-12">
							<table class="table table-condensed table-hover">
								<tbody>
									<tr>
										<td>Issues</td> 
										<td><p class="font-weight-bold">{{ $character->issues()->count() }}</p></td>
									</tr>
									<tr>
										<td>Arcs</td> 
										<td><p class="font-weight-bold">{{ $character->arcs()->count() }}</p></td>
									</tr>
									<tr>
										<td>Series</td> 
										<td><p class="font-weight-bold">{{ $character->series()->count() }}</p></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 mt-3">
		
		<h1 class="text-center mb-2">Comics</h1>
		
		@php
			$series						 =	$character->issues(true);
		@endphp
		
		<ul class="nav nav-pills p-3">
			<li class="nav-item bg-dark">
				<a
					class="nav-link text-white toggle-dom active hover-link"
					data-toggle-dom-child=".series-container"
				>
					All
				</a>
			</li>
			@forelse ($series as $seriesKey => $singleSeries)
				<li class="nav-item bg-dark">
					<a
						class="nav-link text-white toggle-dom hover-link"
						data-toggle-dom-id="series_container_{{ $singleSeries['series']->id }}"
						data-toggle-dom-child=".series-container"
					>
						{{ $singleSeries['series']->title }}
					</a>
				</li>
			@empty
			@endforelse
		</ul>
		<div class="">
			@forelse ($series as $seriesKey => $singleSeries)
				<div
					class="container series-container masonry-grid"
					data-toggle-dom-value="series_container_{{ $singleSeries['series']->id }}"
					data-masonry-parent=".arcs-row"
					data-masonry-child=".arc"
				>
					<div class="row">
						<div class="col-12">
							<p class="bg-dark shadow p-2 mt-2 text-white text-20">
								<a href="{{ route('comics.series.show', $singleSeries['series']) }}" class="text-white">
									{{ $singleSeries['series']->title }}
								</a>
							</p>
						</div>
						@if (count($singleSeries['arcs']))
							<div class="col-12 col-md-8">
								<h4>Arcs</h4>
								<div
									class="row arcs-row"
								>
									@forelse ($singleSeries['arcs'] as $arcKey => $arc)
									<div class="col-12 col-md-6 mb-4 arc">
										<div class="shadow p-4 bg-dark text-white">
											<a href="{{ route('comics.arcs.show', $arc['arc']) }}" class="text-white">
												{{ $arc["arc"]->title }}
											</a>
											<ul>
												@forelse ($arc["issues"] ?? [] as $issue)
													<li class="@if ($issue->is_wishlist) wishlist-item @endif">
														<a href="{{ route('comics.issues.show', $issue) }}" class="text-white">
															#{{ $issue->issue . ' - ' . $issue->title }}
														</a>
													</li>
												@empty
												@endforelse
											</ul>
										</div>
									</div>
									@empty
									<div class="col-12"><p>No arcs in {{ $singleSeries['series']->title }}</p></div>
									@endforelse
								</div>
							</div>
							<div class="col-12 col-md-4">
								<h4>Single Issues</h4>
								@forelse ($singleSeries["singles"] as $singleIssue)
									<div class="border border-secondary shadow p-2 @if ($issue->is_wishlist) wishlist-item @endif">
										<a href="{{ route('comics.issues.show', $issue) }}" class="text-dark">
											#{{ $singleIssue->issue . " - " . $singleIssue->title }}
										</a>
									</div>
								@empty
									<p>No single issues.</p>
								@endforelse
							</div>
						@else
							@forelse ($singleSeries["singles"] as $singleIssue)
								<div class="col-12 col-md-4 mb-2">
									<div class="bg-dark text-white shadow p-2 @if ($issue->is_wishlist) wishlist-item @endif">
										<a href="{{ route('comics.issues.show', $issue) }}" class="text-white">
											#{{ $singleIssue->issue . " - " . $singleIssue->title }}
										</a>
									</div>
								</div>
							@empty
								<div class="col-12"><p>No arcs and single issues in {{ $singleSeries["series"]->title }}.</p></div>
							@endforelse
						@endif
					</div>
				</div>
			@empty
				<div class="col-12"><p>No comics in {{ $character->name }}</p></div>
			@endforelse
		</div>
	</div>
</div>
@endsection
