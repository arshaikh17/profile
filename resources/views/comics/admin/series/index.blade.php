@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Comics Series
				<a
					href="{{ route('comics.admin.series.create') }}"
					class="btn btn-sm btn-primary float-right"
				>
					Create New Series
				</a>
			</h1>
			<div class="row">
				@forelse ($series as $singleSeries)
					<div class="col-12 col-md-6">
						<p>{{ $singleSeries->title }}</p>
					</div>
				@empty
					<div class="col-12">
						<p>No series added in database, yet.</p>
					</div>
				@endforelse
			</div>
		</div>
	</div>
</div>
@endsection