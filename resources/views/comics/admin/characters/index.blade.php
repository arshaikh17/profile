@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Comics Characters
				<a
					href="{{ route('comics.admin.characters.create') }}"
					class="btn btn-sm btn-primary"
				>
					Create New Character
				</a>
			</h1>
			<div class="col-12">
				<div class="row">
					@forelse ($characters as $character)
						<div class="col-12 col-md-4">
							<div class="character">
								<div class="image">
									<img
										src="{{ $character->cover && file_exists('uploads/comics/characters/' . $character->cover) ? asset('uploads/comics/characters/' . $character->cover) : asset('defaults/no_image.png') }}"
										class="img img-fluid"
										title="{{ $character->name }}"
									/>
								</div>
								<div class="details">
									<p class="name">{{ $character->name }}</p>
									<div class="series">
										@forelse ($character->series->take(3) as $series)
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
											href="{{ route('comics.admin.characters.edit', $character) }}"
											title="{{ $character->name }}"
											class="btn btn-sm btn-success"
										>
											Edit
										</a>
									
										<a
											href="{{ route('comics.admin.characters.show', $character) }}"
											title="{{ $character->name }}"
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