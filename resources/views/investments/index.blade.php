@extends("layouts.investments")

@section("content")
<section>
	
	<investments-index
		types-json="{{ json_encode($types) }}"
		asset-link="{{ asset("uploads/investments/organisations") }}"
		organisation-index-route="{{ route("investments.organisations.index") }}"
		organisation-store-route="{{ route("investments.organisations.store") }}"
	></investments-index>
	
</section>
@endsection