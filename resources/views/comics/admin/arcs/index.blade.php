@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Comics Arcs
				<a
					href="{{ route('comics.admin.arcs.create') }}"
					class="btn btn-sm btn-primary"
				>
					Create New Arc
				</a>
			</h1>
			<div class="col-12">
				<div class="row">
					@forelse ($arcs as $arc)
						<div class="col-12 col-md-4">
							<div class="character">
								<div class="image">
									<img
										src="{{ $arc->series && $arc->series->character && $arc->series->character->cover && file_exists('uploads/comics/characters/' . $arc->series->character->cover) ? asset('uploads/comics/characters/' . $arc->series->character->cover) : asset('defaults/no_image.png') }}"
										class="img img-fluid"
										title="{{ $arc->title }}"
									/>
								</div>
								<div class="details">
									<p class="name">{{ $arc->title }}</p>
									<div class="series">
										@forelse (($arc->series ?? []) as $series)
											<a
												href="{{ route('comics.admin.arcs.edit', $arc) }}"
											>
												<span class="badge badge-primary p-2 mt-1">{{ $arc->title }}</span>
											</a>
										@empty
										@endforelse
									</div>
								</div>
								<div class="action">
									<a
										href="{{ route('comics.admin.arcs.edit', $arc) }}"
										title="{{ $arc->title }}"
										class="btn btn-sm btn-success"
									>
										Edit
									</a>
								
									<a
										href="{{ route('comics.admin.arcs.show', $arc) }}"
										title="{{ $arc->title }}"
										class="btn btn-sm btn-primary"
									>
										Visit
									</a>
								</div>
							</div>
						</div>
					@empty
						<div class="col-12">
							<p>No arcs added in database, yet.</p>
						</div>
					@endforelse
				</div>
			</div>
		</div>
	</div>
</div>
@endsection