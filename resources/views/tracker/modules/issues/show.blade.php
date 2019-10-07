@extends("layouts.tracker")

@section("content")
<section class="container">
	<issue-show
		issue-json="{{ $issue->toJson() }}"
		module-json="{{ $module->toJson() }}"
		issue-index-route="{{ route("tracker.modules.issues.index", [$module]) }}"
		issue-show-route="{{ route("tracker.modules.issues.show", [-1, -2]) }}"
		issue-edit-route="{{ route("tracker.modules.issues.edit", [$module, $issue]) }}"
		module-show-route="{{ route("tracker.modules.show", [$module]) }}"
	></issue-show>
</section>
@endsection