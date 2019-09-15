@extends("layouts.generals")

@section("content")
<div class="container mt-5">
	<div class="row">
		<div class="col-8">
			<h1>Persons</h1>
		</div>
		<div class="col-4 text-right">
			<a href="#" class="btn btn-sm btn-success">
				<i class="fas fa-plus"></i> Add Person
			</a>
		</div>
		<div class="col-12">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Debt</th>
						<th>Lent</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($persons as $person)
						<tr>
							<td>{{ $person->name }}</td>
							<td>£{{ number_format($person->debt) }}</td>
							<td>{{ $person->lend }}</td>
						</tr>
					@empty
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection