@extends("layouts.tracker")

@section("content")
<section class="container">
	<issue-form
		module-json="{{ $module->toJson() }}"
		issue-json="{{ $issue->toJson() }}"
		statuses-json="{{ json_encode($statuses) }}"
		index-route="{{ route("tracker.modules.issues.index", [$module]) }}"
		submit-route="{{ $issue->id ? route("tracker.modules.issues.update", [$module, $issue]) : route("tracker.modules.issues.store", [$module]) }}"
	></issue-form>
</section>
@endsection