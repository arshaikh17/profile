@extends("layouts.wishlists")

@section("content")
<div class="container mt-3 main-container">
	<div class="row shadow-sm">
		<div class="col-12" data-toggle="collapse" data-target="#comics-wishlists">
			<p class="wishlist-block-title">Comics</p>
		</div>
		<div class="col-12 collapse show" id="comics-wishlists">
			@forelse ($comics as $arcOrSeries)
			
				<div class="row wishlist-row">
					<div class="col-12">
						<p class="wishlist-row-title" data-toggle="collapse" data-target="#arcOrSeries_{{ $arcOrSeries['arcOrSeries']['model']->id }}">
							<a>{{ $arcOrSeries["arcOrSeries"]['model']->title }}</a>
						</p>
					</div>
					<div class="col-12 collapse show" id="arcOrSeries_{{ $arcOrSeries['arcOrSeries']['model']->id }}">
						<div class="row">
							@forelse ($arcOrSeries["issues"] as $issue)
								<div class="col-sm-6 col-md-2">
									@include("comics.partials.item-vertical-grid", [
										"image"				 =>	$issue->cover && file_exists('uploads/comics/issues/' . $issue->cover) ? asset('uploads/comics/issues/' . $issue->cover) : asset('defaults/no_image.png'),
										"title"				 =>	"#" . $issue->issue,
										"ownedAction"		 =>	route("wishlists.admin.mark-owned.issue", [$issue])
									])
								</div>
							@empty
								<div class="col-12">No comics in wishlist.</div>
							@endforelse
						</div>
					</div>
				</div>
			@empty
				<div class="row">
					<div class="col-12">
						<p>No comics in wishlist.</p>
					</div>
				</div>
			@endforelse
		</div>
	</div>
</div>
@endsection