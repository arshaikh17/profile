@extends("layouts.comics")

@section("content")
<div class="container">
	<div class="row mt-5">
		<div class="col-12 text-center">
			<h1>{{ $author->name }}</h1>
		</div>
		<div class="col-12">
			<h3>Issues</h3>
			<div class="row">
				
				@forelse ($author->issues as $issue)
					<div class="col-6 col-md-3 mb-3">
						<div class="card">
							<div class="card-body">
								<a
									href="{{ route('comics.issues.show', $issue) }}"
								>
									#{{ $issue->issue . " - " . $issue->title }}
								</a>
								<br/>
								<span>
									Series: {{ $issue->series ? $issue->series->title : "" }}
								</span>
								<br/>
								<span>
									Arc: {{ $issue->arc ? $issue->arc->title : "" }}
								</span>
								@if (Auth::user())
									<a href="{{ route('comics.issues.edit', $issue) }}" class="btn btn-sm btn-dark w-100 mt-1">Edit</a>
								@endif
							</div>
						</div>
					</div>
				@empty
					<p>No issues under {{ $author->name }}</p>
				@endforelse
			</div>
		</div>
	</div>
</div>
@endsection