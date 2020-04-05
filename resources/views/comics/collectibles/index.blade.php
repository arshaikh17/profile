@extends("layouts.comics_simple")

@section("css")
<style>
	.collectible-layouts {
		margin-left: 160px;
	}
	.collectible {
		padding: 20px;
		text-align: center;
		transition: 0.5s;
		cursor: pointer;
	}
	.badge {
		border-radius: 0px;
	}
	@media only screen and (max-width: 700px) {
		.collectible-layout {
			margin-left: 100px;
		}
	}
	@media only screen and (max-width: 510px) {
		.collectible-layout {
			margin-left: 30px;
		}
	}
	@media only screen and (max-width: 360px) {
		.collectible-layout {
			margin-left: 0px;
		}
	}
}
</style>
@endsection

@section("content")

<section class="container-fluid">
	<h1>My Collectibles</h1>
	
	@forelse ($collectibles as $collectibleCollectionKey => $collectibleCollections)
	<div class="mt-2">
		<h3>{{ $collectibleCollectionKey }}</h3>
		<div
			class="collectible-layouts masonry-grid"
			data-masonry-parent=".collectible-layout"
			data-masonry-child=".collectible"
		>
			<div class="collectible-layout" id="collectibleLayout">
				@forelse ($collectibleCollections as $collectible)
					<div
						class="collectible"
					>
						<img class="img-fluid" src="{{ $collectible->image }}" />
					</div>
				@empty
				@endforelse
			</div>
		</div>
	</div>
	@empty
	@endforelse
</section>
@endsection