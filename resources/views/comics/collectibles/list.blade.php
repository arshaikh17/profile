@extends("layouts.comics_simple")

@section("content")

<section class="container">
	
	<h1>Collectibles</h1>
	
	<div>
		<table class="table table-condensed table-striped table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Order ID</th>
					<th>Bought From</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@forelse ($collectibles as $collectible)
					<tr>
						<td>{{ $collectible->name }}</td>
						<td>£{{ $collectible->price }}</td>
						<td>{{ $collectible->order_id }}</td>
						<td>{{ $collectible->boughtFrom()["name"] }}</td>
						<td>
							<a href="{{ route("comics.collectibles.edit", $collectible) }}" class="btn btn-sm btn-secondary">Edit</a>
						</td>
					</tr>
				@empty
				@endforelse
			</tbody>
		</table>
	</div>
	
</section>

@endsection