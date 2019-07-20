<form
	method="POST"
	action="{{ $author->id ? route('comics.admin.authors.update', $author) : route('comics.admin.authors.store') }}"
>
	{{ csrf_field() }}
	@include("comics.partials.authors-form-fields")
	<div class="form-group">
		<input
			type="submit"
			class="btn btn-sm btn-primary w-100"
			value="Save"
		/>
	</div>
</form>