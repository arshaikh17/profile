@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Comics Series
				<a
					href="{{ route('comics.admin.series.create') }}"
					class="btn btn-sm btn-primary"
				>
					Create New Series
				</a>
			</h1>
			<div class="col-12">
				<div class="row">
					@forelse ($series as $singleSeries)
						<div class="col-12 col-md-4">
							<div class="character">
								<div class="image">
									<img
										src="{{ $singleSeries->character && $singleSeries->character->cover && file_exists('uploads/comics/characters/' . $singleSeries->character->cover) ? asset('uploads/comics/characters/' . $singleSeries->character->cover) : asset('defaults/no_image.png') }}"
										class="img img-fluid"
										title="{{ $singleSeries->name }}"
									/>
								</div>
								<div class="details">
									<p class="name">{{ $singleSeries->title }}</p>
									<div class="series">
										@forelse ([] as $series)
											<a
												href="{{ route('comics.admin.series.edit', $series) }}"
											>
												<span class="badge badge-primary p-2 mt-1">{{ $series->title }}</span>
											</a>
										@empty
										@endforelse
									</div>
								</div>
								<div class="action">
									<a
										href="{{ route('comics.admin.series.edit', $singleSeries) }}"
										title="{{ $singleSeries->title }}"
										class="btn btn-sm btn-success"
									>
										Edit
									</a>
								
									<a
										href="{{ route('comics.admin.series.show', $singleSeries) }}"
										title="{{ $singleSeries->title }}"
										class="btn btn-sm btn-primary"
									>
										Visit
									</a>
								</div>
							</div>
						</div>
					@empty
						<div class="col-12">
							<p>No characters added in database, yet.</p>
						</div>
					@endforelse
				</div>
			</div>
		</div>
	</div>
</div>
@endsection