<form
	method="POST"
	action="{{ $author->id ? route('comics.authors.update', $author) : route('comics.authors.store') }}"
>
	{{ csrf_field() }}
	@include("comics.partials.authors-form-fields")
	<div class="form-group">
		<input
			type="submit"
			class="btn btn-sm btn-dark w-100"
			value="Save"
		/>
	</div>
</form>