<form
	method="POST"
	action="{{ $author->id ? route('comics.admin.authors.edit', $author) : route('comics.admin.authors.create') }}"
>
	{{ csrf_field() }}
	<div class="form-group">
		<label>First Name</label>
		<input
			type="text"
			class="form-control"
			name="first_name"
			value="{{ $author->first_name }}"
			required
		/>
	</div>
	<div class="form-group">
		<label>Surname</label>
		<input
			type="text"
			class="form-control"
			name="surname"
			value="{{ $author->surname }}"
			required
		/>
	</div>
	<div class="form-group">
		<input
			type="submit"
			class="btn btn-sm btn-primary w-100"
			value="Save"
		/>
	</div>
</form>