@extends("layouts.comics")
@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
			My Comics Series
			<a
				href="{{ route('comics.series.create') }}"
				class="btn btn-sm btn-dark"
			>
				Create New Series
			</a>
			</h1>
		</div>
		<div class="col-12 mt-3">
			<div class="row">
				@forelse ($series as $singleSeries)
					<div class="col-12 col-sm-6 col-md-4 series">
						<div class="h-170 border">
							<a
								href="{{ route('comics.series.show', $singleSeries) }}"
								title="{{ $singleSeries->title }}"
							>
								<img
									src="{{ $singleSeries->cover ? asset('uploads/comics/series/' . $singleSeries->cover) : asset('defaults/no_image.png') }}"
									class="img-fluid mx-auto d-block mt-3"
									width="300"
									title="{{ $singleSeries->title }}"
								/>
							</a>
						</div>
						<div class="border p-3">
							<a
								href="{{ route('comics.series.show', $singleSeries) }}"
								title="{{ $singleSeries->title }}"
								class="text-dark"
							>
								<p class="text-20">{{ $singleSeries->title }}</p>
							</a>
							<p>Total Issues: <span class="text-bold">{{ $singleSeries->issues->count() }}</span></p>
							<span class="badge badge-dark p-2">{{ $singleSeries->character->name }}</span>
						</div>
					</div>
				@empty
					<div class="row">
						<p>At the moment, nothing's in here...</p>
					</div>
				@endforelse
			</div>
		</div>
	</div>
</div>
@endsection