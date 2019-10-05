@extends("layouts.tracker")

@section("content")
<section>
	<module-index
		index-module-link="{{ route("tracker.modules.index") }}"
		show-module-link="{{ route("tracker.modules.show", -1) }}"
		store-module-link="{{ route("tracker.modules.store") }}"
		update-module-link="{{ route("tracker.modules.update", -1) }}"
		destroy-module-link="{{ route("tracker.modules.destroy", -1) }}"
		index-module-issue-link="{{ route("tracker.modules.issues.index", -1) }}"
		create-module-issue-link="{{ route("tracker.modules.issues.create", -1) }}"
	></module-index>
</section>
@endsection