@extends("layouts.comics")
@section("content")
<div class="row">
	<div class="col-12">
		<h1>
			{{ $arc->title }}
			<a
				href="{{ route('comics.arcs.edit', $arc) }}"
				class="btn btn-sm btn-dark"
				>
				Edit
			</a>
			<a
				href="{{ route('comics.issues.createWithSeriesAndArc', [$arc->series, $arc]) }}"
				class="btn btn-sm btn-dark"
				>
				Add Issue
			</a>
		</h1>
	</div>
	<div class="col-12 mt-3">
		<div class="row">
			@forelse ($arc->issues as $issue)
				<div class="col-12 col-sm-4 col-md-3">
					@include("comics.partials.item-vertical-grid", [
						"image"								 =>	$issue->cover && file_exists('uploads/comics/issues/' . $issue->cover) ? asset('uploads/comics/issues/' . $issue->cover) : asset('defaults/no_image.png'),
						"title"								 =>	"#" . $issue->issue,
						"link"								 =>	route("comics.issues.show", $issue)
					])
				</div>
			@empty
				<div class="col-12"><p>No issues added.</p></div>
			@endforelse
		</div>
	</div>
</div>
@endsection