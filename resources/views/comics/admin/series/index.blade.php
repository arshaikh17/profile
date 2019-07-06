@extends("layouts.comics")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Comics Series
				<a
					href="{{ route('comics.admin.series.create') }}"
					class="btn btn-sm btn-primary"
				>
					Create New Series
				</a>
			</h1>
			<div class="col-12 mt-5">
				<input
					type="text"
					class="form-control ajax-search-table"
					placeholder="Search series"
					data-table="seriesTable"
					data-route="{{ route('comics.admin.series.search') }}"
				>
			</div>
			<div class="col-12">
				<table
					class="table table-condensed table-hover table-striped"
					id="seriesTable"
				>
					<thead>
						<tr>
							<th>Title</th>
							<th>Complete Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@forelse ($series as $singleSeries)
							@include("comics.partials.series-table-body-row", [
								"series" =>	$singleSeries
							])
						@empty
							<tr>
								<td>No series added.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
			<div class="col-12">
				<div class="float-right">
					{{ $series->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection