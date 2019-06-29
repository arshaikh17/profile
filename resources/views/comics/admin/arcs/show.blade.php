@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				{{ $arc->title }}
				<a
					href="{{ route('comics.admin.arcs.edit', $arc) }}"
					class="btn btn-sm btn-primary"
				>
					Edit
				</a>
			</h1>
			<div class="col-12">
				<div class="row">
					@forelse ($arc->issues as $issue)
						<div class="col-12 col-sm-6 col-md-3">
							@include("comics.partials.issue", ["issue" => $issue])
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							@include("comics.partials.issue", ["issue" => $issue])
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							@include("comics.partials.issue", ["issue" => $issue])
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							@include("comics.partials.issue", ["issue" => $issue])
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							@include("comics.partials.issue", ["issue" => $issue])
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							@include("comics.partials.issue", ["issue" => $issue])
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							@include("comics.partials.issue", ["issue" => $issue])
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							@include("comics.partials.issue", ["issue" => $issue])
						</div>
						<div class="col-12 col-sm-6 col-md-3">
							@include("comics.partials.issue", ["issue" => $issue])
						</div>
					@empty
						<div class="col-12"><p>No issues added.</p></div>
					@endforelse
				</div>
			</div>
		</div>
	</div>
</div>
@endsection