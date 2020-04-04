@extends("layouts.collectibles")

@section("content")
<section>
	
	<collectibles-index
		asset-link="{{ asset("uploads/collectibles/collectibles") }}"
	></collectibles-index>
	
</section>
@endsection