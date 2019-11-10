@extends("layouts.investments")

@section("content")
<section class="container">
	<investments-organisations-show
		asset-link="{{ asset('uploads/investments/organisations/') }}"
		organisation-json="{{ $organisation->toJson() }}"
		organisations-investments-rois-route="{{ route('investments.organisations.investments.rois',  [$organisation, -1]) }}"
	>
	</investments-organisations-show>
</section>
@endsection