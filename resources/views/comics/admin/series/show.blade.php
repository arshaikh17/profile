@extends("layouts.comics")

@section("content")
<div class="container">
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
				href="{{ route('comics.admin.series.edit', [$series]) }}"
				class="btn btn-light"
			>
				Edit
			</a>
			<a
				href="{{ route('comics.admin.arcs.create', [$series]) }}"
				class="btn btn-secondary"
			>
				Add Arc
			</a>
			<a
				href="{{ route('comics.admin.issues.createWithSeriesAndArc', [$series]) }}"
				class="btn btn-dark"
			>
				Add Issue
			</a>
		</div>
		<div class="col-12">
			<p class="text-uppercase mt-4" data-toggle="collapse" data-target="#arcsAndIssues">Arcs and Issues</p>
			<div class="row collapse show" id="arcsAndIssues">
				@forelse ($series->arcs as $arc)
					<div class="col-md-4 shadow-sm p-4 mb-4 bg-white">
						<p class="font-weight-bold">
							<a
								href="{{ route('comics.admin.arcs.show', [$arc]) }}"
								class="text-secondary"
							>
								{{ $arc->title }}
							</a>
						</p>
						<ul>
							@forelse ($arc->issues as $issue)
								<li>
									<a
										href="{{ route('comics.admin.issues.show', [$issue]) }}"
										class="text-secondary"
									>
										#{{ $issue->issue }} - {{ $issue->title }}
									</a>
								</li>
							@empty
								<li>No issues in {{ $arc->title }}</li>
							@endforelse
						</ul>
					</div>
					<div class="col-md-4 shadow-sm p-4 mb-4 bg-white">
						<p class="font-weight-bold">
							<a
								href="{{ route('comics.admin.arcs.show', [$arc]) }}"
								class="text-secondary"
							>
								{{ $arc->title }}
							</a>
						</p>
						<ul>
							@forelse ($arc->issues as $issue)
								<li>
									<a
										href="{{ route('comics.admin.issues.show', [$issue]) }}"
										class="text-secondary"
									>
										#{{ $issue->issue }} - {{ $issue->title }}
									</a>
								</li>
							@empty
								<li>No issues in {{ $arc->title }}</li>
							@endforelse
						</ul>
					</div>
					<div class="col-md-4 shadow-sm p-4 mb-4 bg-white">
						<p class="font-weight-bold">
							<a
								href="{{ route('comics.admin.arcs.show', [$arc]) }}"
								class="text-secondary"
							>
								{{ $arc->title }}
							</a>
						</p>
						<ul>
							@forelse ($arc->issues as $issue)
								<li>
									<a
										href="{{ route('comics.admin.issues.show', [$issue]) }}"
										class="text-secondary"
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
			<p class="text-uppercase mt-4" data-toggle="collapse" data-target="#issuesWithoutArcs">Issues without Arcs</p>
			<div class="row">
				<div class="col-12 shadow-sm p-4 mb-4 bg-white collapse show" id="issuesWithoutArcs">
					<ul>
						@forelse ($series->issuesWithoutArcs() as $issue)
							<li>
								<a
									href="{{ route('comics.admin.issues.show', [$issue]) }}"
									class="text-secondary"
								>
									#{{ $issue->issue }} - {{ $issue->title }}
								</a>
							</li>
						@empty
							<li>No issues in {{ $arc->title }}</li>
						@endforelse
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection