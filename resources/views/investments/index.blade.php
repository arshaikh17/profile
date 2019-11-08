@extends("layouts.investments")

@section("content")
<section>
	
	<investments-index
		types-json="{{ json_encode($types) }}"
		asset-link="{{ asset("uploads/investments/organisations") }}"
		currencies-json="{{ json_encode($currencies) }}"
		investment-types-json="{{ json_encode($investmentTypes) }}"
		investment-return-types-json="{{ json_encode($investmentReturnTypes) }}"
		organisation-index-route="{{ route("investments.organisations.index") }}"
		organisation-store-route="{{ route("investments.organisations.store") }}"
		organisation-show-route="{{ route("investments.organisations.show", -1) }}"
		organisation-investments-route="{{ route("investments.organisations.investments", -1) }}"
		organisation-update-route="{{ route("investments.organisations.update", -1) }}"
		organisation-investments-store-route="{{ route("investments.organisations.investments.store", -1) }}"
		organisation-investments-update-route="{{ route("investments.organisations.investments.update", [-1, -2]) }}"
	></investments-index>
	
</section>
@endsection