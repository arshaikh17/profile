@extends("layouts.tracker")

@section("content")
<section class="container">
	<issue-index
		statuses-json="{{ json_encode($statuses) }}"
		index-route="{{ route("tracker.issues.index") }}"
		module-show-route="{{ route("tracker.modules.show", [-1]) }}"
		module-issue-show-route="{{ route("tracker.modules.issues.show", [-1, -2]) }}"
		module-issue-edit-route="{{ route("tracker.modules.issues.edit", [-1, -2]) }}"
	></issue-index>
</section>
@endsection