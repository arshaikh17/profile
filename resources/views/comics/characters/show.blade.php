@extends("layouts.comics")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-md-4">
					<div>
						<img
							src="{{ asset('uploads/comics/characters/' . $character->cover) }}"
							class="img-fluid"
						/>
					</div>
				</div>
				<div class="col-md-8 character-info">
					@if (Auth::user())
					<div class="clearfix mb-2">
						<div class="float-md-right">
							<a href="{{ route('comics.characters.edit', $character) }}" class="btn btn-sm btn-dark">Edit</a>
						</div>
					</div>
					@endif
					<h1 class="bg-dark text-white p-4">{{ $character->name }}</h1>
					<div class="shadow-sm p-4 mb-4 bg-white">
						<div class="row">
							<div class="col-4">
								<p>Issues</p>
								<p>Arcs</p>
								<p>Series</p>
							</div>
							<div class="col-8">
								<p class="font-weight-bold">{{ $character->issues()->count() }}</p>
								<p class="font-weight-bold">{{ $character->arcs()->count() }}</p>
								<p class="font-weight-bold">{{ $character->series()->count() }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 mt-3">
			
			<h1 class="text-center mb-2">Comics</h1>
			
			@php
				$series					 =	$character->series;
			@endphp
			
			<ul class="nav nav-pills p-3">
				<li class="nav-item bg-dark">
					<a
						class="nav-link text-white toggle-dom active"
						data-toggle-dom-child=".series-container"
					>
						All
					</a>
				</li>
				@forelse ($series as $seriesKey => $singleSeries)
					<li class="nav-item bg-dark">
						<a
							class="nav-link text-white toggle-dom"
							data-toggle-dom-id="series_container_{{ $singleSeries->id }}"
							data-toggle-dom-child=".series-container"
						>
							{{ $singleSeries->title }}
						</a>
					</li>
				@empty
				@endforelse
			</ul>
			<div class="">
				@forelse ($series as $seriesKey => $singleSeries)
				
					@php
						$singleIssues	 =	$singleSeries->singleIssues(true);
					@endphp
					
					<div
						class="container series-container masonry-grid"
						data-toggle-dom-value="series_container_{{ $singleSeries->id }}"
						data-masonry-parent=".arcs-row"
						data-masonry-child=".arc"
					>
						
						<h3 class="bg-dark shadow p-3 mt-2 text-white">{{ $singleSeries->title }}</h3>
						
						<div class="row">
							@if ($singleSeries->arcs->count())
								<div class="col-12 col-md-8">
									<h4>Arcs</h4>
									<div
										class="row arcs-row"
									>
										@forelse ($singleSeries->arcs as $arc)
										<div class="col-12 col-md-6 mb-4 arc">
											<div class="shadow p-4 bg-dark text-white">
												{{ $arc->title }}
												<ul>
													@forelse ($arc->issues(true) as $issue)
													<li>#{{ $issue->issue . ' - ' . $issue->title }}</li>
													@empty
													@endforelse
												</ul>
											</div>
										</div>
										@empty
										<div class="col-12"><p>No arcs in {{ $singleSeries->title }}</p></div>
										@endforelse
									</div>
								</div>
								<div class="col-12 col-md-4">
									<h4>Single Issues</h4>
									@forelse ($singleIssues as $singleIssue)
										<div class="border border-secondary shadow p-2">#{{ $singleIssue->issue . " - " . $singleIssue->title }}</div>
									@empty
										<p>No single issues.</p>
									@endforelse
								</div>
							@else
								@forelse ($singleIssues as $singleIssue)
									<div class="col-12 col-md-4 mb-2">
										<div class="bg-dark text-white shadow p-2">#{{ $singleIssue->issue . " - " . $singleIssue->title }}</div>
									</div>
								@empty
									<div class="col-12"><p>No arcs and single issues in {{ $singleSeries->title }}.</p></div>
								@endforelse
							@endif
						</div>
					</div>
				@empty
					<div class="col-12"><p>No comics in {{ $singleSeries->title }}</p></div>
				@endforelse
			</div>
		</div>
	</div>
</div>
@endsection

@section("js")
<script type="text/javascript">
$(".masonry-grid").each(function (index, grid) {
	
	$($(this).data("masonry-parent")).masonry({
		itemSelector					 :	$(this).data("masonry-child"),
	})
	
});

$("body").on("click", ".toggle-dom", function (e) {
	
	e.preventDefault();
	
	var element							 =	$(this);
	$(".toggle-dom").removeClass("active");
	element.addClass("active");
	
	var value							 =	element.data("toggle-dom-id");
	var className						 =	element.data("toggle-dom-child");
	
	if (value === undefined) {
		
		$(className).show();
		return false;
		
	}
	
	$(className).hide();
	$(`${className}[data-toggle-dom-value="${value}"]`).show();
	
})
</script>
@endsection