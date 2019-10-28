@extends("layouts.comics")

@section("content")
<div class="row">
	<div class="col-12">
		<h4>{{ $series->title }}</h4>
	</div>
	<div class="col-12">
		<img
			src="{{ asset('uploads/comics/series/' . $series->cover) }}"
			class="img-fluid mx-auto d-block mt-4"
			title="{{ $series->title }}"
			alt="{{ $series->title }}"
		/>
	</div>
	<div class="col-12 text-center mt-2">
		<a
			href="{{ route('comics.series.edit', [$series]) }}"
			class="btn btn-light"
		>
			Edit
		</a>
		<a
			href="{{ route('comics.arcs.create', [$series]) }}"
			class="btn btn-secondary"
		>
			Add Arc
		</a>
		<a
			href="{{ route('comics.issues.createWithSeriesAndArc', [$series]) }}"
			class="btn btn-dark"
		>
			Add Issue
		</a>
	</div>
	<div class="col-12">
		<p class="text-uppercase mt-4 text-20">Arcs and Issues</p>
		<span>*Wishlists included.</span>
		<div class="row collapse show">
			@forelse ($series->arcs as $arc)
				<div class="col-md-4 shadow-sm p-4 mb-4 bg-white">
					<p class="font-weight-bold">
						<a
							href="{{ route('comics.arcs.show', [$arc]) }}"
							class="text-dark"
						>
							{{ $arc->title }}
						</a>
					</p>
					<ul>
						@forelse ($arc->issues as $issue)
							<li>
								<a
									href="{{ route('comics.issues.show', [$issue]) }}"
									class="text-secondary @if ($issue->is_wishlist) wishlist-item @endif"
								>
									#{{ $issue->issue }} - {{ $issue->title }}
								</a>
							</li>
						@empty
							<li>No issues in {{ $arc->title }}</li>
						@endforelse
					</ul>
				</div>
			@empty
				<div class="col-12">No arcs in {{ $series->title }}</div>
			@endforelse
		</div>
	</div>
	<div class="col-12">
		<p class="text-uppercase mt-4">Issues without Arcs</p>
		<div class="row">
			<div class="col-12 shadow-sm p-4 mb-4 bg-white">
				<ul>
					@forelse ($series->singleIssues as $issue)
						<li>
							<a
								href="{{ route('comics.issues.show', [$issue]) }}"
								class="text-secondary @if ($issue->is_wishlist) wishlist-item @endif"
							>
								#{{ $issue->issue }} - {{ $issue->title }}
							</a>
						</li>
					@empty
						<li>No issues in {{ $series->title }}</li>
					@endforelse
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection