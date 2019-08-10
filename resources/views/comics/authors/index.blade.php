@extends("layouts.comics")
@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
			Comics Authors
			<a
				href="{{ route('comics.authors.create') }}"
				class="btn btn-sm btn-dark"
				>
				Create New Author
			</a>
			</h1>
		</div>
		<div class="col-12 mt-3">
			<input
			type="text"
			class="form-control ajax-search-table"
			placeholder="Search authors"
			data-table="seriesTable"
			data-route="{{ route('comics.authors.search') }}"
			>
		</div>
		<div class="col-12 mt-3">
			<table
				class="table table-condensed table-hover"
				id="seriesTable"
				>
				<thead>
					<tr>
						<th>Name</th>
						<th>Issues</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@forelse ($authors as $author)
						@include("comics.partials.authors-table-body-row", [
						"author"		 =>	$author
						])
					@empty
						<tr>
							<td>No authors added.</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
		<div class="col-12">
			<div class="float-right">
				{{ $authors->links() }}
			</div>
		</div>
	</div>
</div>
@endsection