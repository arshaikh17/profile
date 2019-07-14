@extends("layouts.comics")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>{{ $character->id ? "Update" : "Create" }} Character</h1>
		</div>
		<div class="col-6 offset-3">
			@if ($character->cover)
				<div class="text-center mb-3">
					<span>
						<img 
							src="{{ asset('uploads/comics/characters/' . $character->cover) }}"
							class="img img-fluid"
						/>
					</span>
				</div>
			@endif
			<form
				action="{{ $character->id ? route('comics.characters.update', $character) : route('comics.characters.store') }}"
				method="POST"
				enctype="multipart/form-data"
			>
				{{csrf_field()}}
				<div class="form-group">
					<label>Name</label>
					<input
						type="text"
						class="form-control"
						value="{{ $character->name }}"
						name="name"
						required
					/>
				</div>
				<div class="form-group">
					<label>Cover</label>
					<input
						type="file"
						class="form-control"
						name="cover"
						{{ $character->id ? "" : "required" }}
					/>
				</div>
				<div class="form-group">
					<input
						type="submit"
						class="btn btn-sm btn-dark w-100"
						value="Save"
					/>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection