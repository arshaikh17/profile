@extends("layouts.comics_simple")

@section("content")
	
<section class="container">
	
	<div>
		<h1>{{ $collectible->id ? "Edit" : "Add" }} Collectible</h1>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			@if ($collectible->image)
				<img src="{{ pathCollectibles($collectible->image) }}" class="img-fluid" />
			@endif
		</div>
		<div class="col-md-8">
			<form
				method="POST"
				action="{{ $collectible->id ? route("comics.collectibles.update", $collectible) : route("comics.collectibles.store") }}"
				enctype="multipart/form-data"
			>
				{{ csrf_field() }}
				
				<small>About The Collectible</small>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{ old("name", $collectible->name) }}" required />
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea name="description" class="form-control">{{ old("description", $collectible->description) }}</textarea>
				</div>
				<div class="form-group row">
					<div class="form-group col-md-6">
						<label>Price</label>
						<input type="text" name="price" class="form-control" value="{{ old("price", $collectible->price) }}" required />
					</div>
					<div class="form-group col-md-6">
						<label>Image</label>
						<input type="file" name="image" class="form-control" @if (!$collectible->id) required @endif />
					</div>
				</div>
				<div class="form-group">
					<label>Link</label>
					<input type="text" name="link" class="form-control" value="{{ old("link", $collectible->link) }}" />
				</div>
				
				<small>Dimensions</small>
				<div class="form-group row">
					<div class="col-md-4">
						<label>Height</label>
						<input type="text" name="height" class="form-control" value="{{ old("height", $collectible->height) }}" required />
					</div>
					<div class="col-md-4">
						<label>Width</label>
						<input type="text" name="width" class="form-control" value="{{ old("width", $collectible->width) }}" required />
					</div>
					<div class="col-md-4">
						<label>Depth</label>
						<input type="text" name="depth" class="form-control" value="{{ old("depth", $collectible->depth) }}" required />
					</div>
				</div>
				
				<small>Scale and Brand</small>
				<div class="form-group row">
					<div class="col-md-4">
						<label>Scale</label>
						<select name="scale_id" class="form-control" required>
							<option disabled selected>Choose from</option>
							@foreach ($scales as $scaleKey => $scale)
								<option value="{{ $scaleKey }}" @if (old("scale_id") && old("scale_id") == $scaleKey || $collectible->scale_id == $scaleKey) selected @endif>{{ $scale }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-4">
						<label>Character</label>
						<select name="character_id" class="form-control" required>
							<option disabled selected>Choose from</option>
							@foreach ($characters as $character)
								<option value="{{ $character->id }}" @if (old("character_id") && old("character_id") == $scaleKey || $collectible->character_id == $character->id) selected @endif>{{ $character->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-4">
						<label>Brand</label>
						<select name="brand_id" class="form-control" required>
							<option disabled selected>Choose from</option>
							@foreach ($brands as $brandKey => $brand)
								<option value="{{ $brandKey }}" @if (old("brand_id") && old("brand_id") == $scaleKey || $collectible->brand_id == $brandKey) selected @endif>{{ $brand }}</option>
							@endforeach
						</select>
					</div>
				</div>
				
				<small>Order Details</small>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Order ID</label>
						<input type="text" name="order_id" class="form-control" value="{{ old("order_id", $collectible->order_id) }}" />
					</div>
					<div class="col-md-6">
						<label>Bought From</label>
						<select name="bought_from_id" class="form-control" required>
							<option disabled selected>Choose from</option>
							@foreach ($vendors as $vendorKey => $vendor)
								<option value="{{ $vendorKey }}" @if (old("bought_from_id") && old("bought_from_id") == $scaleKey || $collectible->bought_from_id == $vendorKey) selected @endif>{{ $vendor["name"] }}</option>
							@endforeach
						</select>
					</div>
				</div>
				
				<small>Manufacturer</small>
				<div class="form-group">
					<label>Manufacturer</label>
					<select name="manufacturer_id" class="form-control" required>
						<option disabled selected>Choose from</option>
						@foreach ($vendors as $vendorKey2 => $vendor2)
							<option value="{{ $vendorKey2 }}" @if (old("manufacturer_id") && old("manufacturer_id") == $scaleKey || $collectible->manufacturer_id == $vendorKey2) selected @endif>{{ $vendor2["name"] }}</option>
						@endforeach
					</select>
				</div>
				
				<div class="form-group">
					<input type="submit" value="Save" class="btn btn-dark float-right" />
				</div>
			</form>
		</div>
	</div>
	
</section>

@endsection