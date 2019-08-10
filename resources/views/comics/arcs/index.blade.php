@extends("layouts.comics")
@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
			My Comics Arcs
			<a
				href="{{ route('comics.arcs.create') }}"
				class="btn btn-sm btn-dark"
				>
				Create New Arcs
			</a>
			</h1>
		</div>
		<div class="col-12 mt-5">
			<input
			type="text"
			class="form-control ajax-search-table"
			placeholder="Search arcs"
			data-table="seriesTable"
			data-route="{{ route('comics.arcs.search') }}"
			>
		</div>
		<div class="col-12">
			<table
				class="table table-condensed table-hover"
				id="seriesTable"
				>
				<thead>
					<tr>
						<th>Title</th>
						<th>Complete Status</th>
						<th>Series</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@forelse ($arcs as $arc)
						@include("comics.partials.arcs-table-body-row", [
							"arc"		 =>	$arc
						])
					@empty
						<tr>
							<td>No arcs added.</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
		<div class="col-12">
			<div class="float-right">
				{{ $arcs->links() }}
			</div>
		</div>
	</div>
</div>
@endsection