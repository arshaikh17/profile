@extends("layouts.investments")

@section("content")
<section>
	
	<investments-index
		types-json="{{ json_encode($types) }}"
		asset-link="{{ asset("uploads/investments/organisations") }}"
		organisation-index-route="{{ route("investments.organisations.index") }}"
		organisation-store-route="{{ route("investments.organisations.store") }}"
		organisation-show-route="{{ route("investments.organisations.show", -1) }}"
		organisation-update-route="{{ route("investments.organisations.update", -1) }}"
	></investments-index>
	
</section>
@endsection