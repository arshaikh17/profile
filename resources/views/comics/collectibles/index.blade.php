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

@section("js")
<script>
$(document).ready(function() {
	
	$("body").on("click", ".filter-by-character", function (e) {
		
		e.preventDefault();
		
		var id							 =	$(this).data("id");
		$(".collectible").hide();
		$(".collectible-character-" + id).show();
		initialiseMasonry();
		
	});
	
	$("body").on("click", "#resetFilters", function (e) {
		
		e.preventDefault();
		
		$(".collectibles").show();
		initialiseMasonry();
		
	});
	
});
</script>
@endsection

@section("content")
<div id="filterCollectibles" class="fixed-bottom">
	<div class="btn-group">
		<button class="btn btn-dark" id="resetFilters">All</button>
		<button class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Characters</button>
		<div class="dropdown-menu">
			@forelse ($characters as $character)
				<a class="dropdown-item filter-by-character" href="#" data-id="{{ $character->id }}">
					@if ($character->symbol)
						<img src="{{ asset("uploads/comics/characters/" . $character->symbol) }}" class="img-fluid" width="150" />
					@else
						{{ $character->name }}
					@endif
				</a>
			@empty
			@endforelse
		</div>
	</div>
</div>
	
<section class="container-fluid">
	
	<div class="clearfix">
		<div class="float-left">
			<h1>My Collectibles</h1>
		</div>
		@if (Auth::check())
			<div class="float-right">
				<a class="btn btn-dark" href="{{ route("comics.collectibles.create") }}"><i class="fas fa-plus"></i> New Collectible</a>
			</div>
		@endif
	</div>
	
	@forelse ($collectibles as $collectibleCollectionKey => $collectibleCollections)
		
		@if (!$collectibleCollections->count()) @continue @endif
		
		<div class="mt-2" id="collectible-layout-{{ str_replace(" ", "-", strtolower($collectibleCollectionKey)) }}">
			<h3>{{ $collectibleCollectionKey }}</h3>
			<div
				class="collectible-layouts masonry-grid"
				data-masonry-parent=".collectible-layout"
				data-masonry-child=".collectible"
			>
				<div class="collectible-layout">
					@forelse ($collectibleCollections as $collectible)
						<div
							class="collectible collectible-character-{{ $collectible->character->id ?? "none" }}"
						>
							<img class="img-fluid" src="{{ pathCollectibles($collectible->image) }}" />
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