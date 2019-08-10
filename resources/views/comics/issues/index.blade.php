@extends("layouts.comics")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Comics Issues
				<a
					href="{{ route('comics.issues.create') }}"
					class="btn btn-sm btn-dark"
				>
					Create New Issue
				</a>
			</h1>
		</div>
		<div class="col-12 mt-3">
			<div class="row">
				<div class="col-12 col-sm-6 col-md-4">
					<div class="text-dark p-3 shadow border border-secondary">
						<h5>Total</h5>
						<h2>{{ $statistics["total"] }}</h2>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-4">
					<div class="bg-dark text-white p-3 shadow border border-secondary">
						<h5>Owned</h5>
						<h2>{{ $statistics["owned"] }}</h2>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-4">
					<div class="bg-dark text-white p-3 shadow border border-secondary">
						<h5>Wishlists</h5>
						<h2>{{ $statistics["wishlist"] }}</h2>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				@forelse ($characters as $character)
					<div class="col-12 mb-4">
						<h2 data-toggle="collapse" data-target="#characterRow_{{ $character->id }}">{{ $character->name }}</h2>
						<div class="row collapse show" id="characterRow_{{ $character->id }}">
							@forelse ($character->issues(true) as $series)
								<div class="col-12">
									<h5 data-toggle="collapse" data-target=".seriesRow_{{ $series['series']->id }}">{{ $series["series"]->title }}</h5>
								</div>
								<div class="col-12">
									<div class="row collapse show seriesRow_{{ $series['series']->id }}" id="seriesRow_{{ $series['series']->id }}">
										@forelse ($series["arcs"] as $arc)
											<div class="col-12 col-sm-6 col-md-4">
												<p
													data-toggle="collapse"
													data-target="#arcRow_{{ $arc['arc']->id }}"
												>
													{{ $arc["arc"]->title }}
												</p>
												<ul class="collapse show" id="arcRow_{{ $arc['arc']->id }}">
													@forelse ($arc["issues"] as $issue)
														<li>
															<a
																href="{{ route('comics.issues.show', $issue) }}"
																class="{{ $issue->is_wishlist ? 'wishlist-item' : '' }}"
															>
																#{{ $issue->issue }} - {{ $issue->title }}
															</a>
														</li>
													@empty
														<li>No issues, here :O</li>
													@endforelse
												</ul>
											</div>
										@empty
											<div class="col-12"><p>No arcs :(</p></div>
										@endforelse
									</div>
									<div class="row collapse show seriesRow_{{ $series['series']->id }}">
										<div class="col-12"><p data-toggle="collapse" data-target="#singlesOfSeries_{{ $series['series']->id }}">Issues without arc</p></div>
											<div class="col-12 collapse show" id="singlesOfSeries_{{ $series['series']->id }}">
												<div class="row">
													@forelse (array_chunk($series["singles"], 5) as $singles)
															<div class="col-12 col-sm-6 col-md-4">
																<ul>
																	@foreach ($singles as $issue)
																		<li>
																			<a
																				href="{{ route('comics.issues.show', $issue) }}"
																				class="{{ $issue->is_wishlist ? 'wishlist-item' : '' }}"
																			>
																				#{{ $issue->issue }} - {{ $issue->title }}
																			</a>
																		</li>
																	@endforeach
																</ul>
															</div>
													@empty
														<div class="col-12"><p>Nothing to see here.</p></div>
													@endforelse
												</div>
											</div>
									</div>
								</div>
							@empty
								<div class="col-12">
									<p>No series attached with {{ $character->name }}? Are you kidding?</p>
								</div>
							@endforelse
						</div>
					</div>
				@empty
					<div class="col-12">
						<p>Wait wait wait... no characters :(</p>
					</div>
				@endforelse
			</div>
		</div>
	</div>
</div>

@endsection