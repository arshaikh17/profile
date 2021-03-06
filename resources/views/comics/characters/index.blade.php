@extends("layouts.comics")

@section("content")
<div class="row">
	<div class="col-12">
		<h1>
			My Comics Characters
			
			@if (Auth::user())
				<a
					href="{{ route('comics.characters.create') }}"
					class="btn btn-sm btn-dark"
				>
					Create New Characters
				</a>
			@endif
		</h1>
	</div>
	<div class="col-12">
		<div class="row">
			@forelse ($characters as $character)
				<div
					class="col-12 col-sm-6 col-md-4"
					title="{{ $character->name }}"
					data-toggle="tooltip"
					data-placement="bottom"
				>
					<div class="character">
						<div class="character-image">
							<a href="{{ route('comics.characters.show', $character) }}">
								<img
									src="{{ asset('uploads/comics/characters/' . $character->cover) }}"
									class="mx-auto d-block"
								/>
							</a>
						</div>
					</div>
				</div>
			@empty
				<div class="col-12">
					<p>No characters in database.</p>
				</div>
			@endforelse
		</div>
	</div>
	<div class="col-12 justify-content-center mt-5">
		{{ $characters->links() }}
	</div>
</div>
@endsection