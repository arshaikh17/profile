@extends("layouts.comics.public")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Comics Characters
				<a
					href="{{ route('comics.characters.create') }}"
					class="btn btn-sm btn-primary"
				>
					Create New Characters
				</a>
			</h1>
			<div class="col-12 mt-5">
				<input
					type="text"
					class="form-control ajax-search-table"
					placeholder="Search characters"
					data-table="seriesTable"
					data-route="{{ route('comics.characters.search') }}"
				>
			</div>
			<div class="col-12">
				<table
					class="table table-condensed table-hover"
					id="seriesTable"
				>
					<thead>
						<tr>
							<th>Name</th>
							<th>Issues</th>
							<th>Arcs</th>
							<th>Series</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@forelse ($characters as $character)
							@include("comics.partials.characters-table-body-row", [
								"character"					 =>	$character
							])
						@empty
							<tr>
								<td>No characters added.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
			<div class="col-12">
				<div class="float-right">
					{{ $characters->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection