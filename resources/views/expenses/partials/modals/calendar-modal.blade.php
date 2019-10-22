<div class="modal" id="calendarModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">{{ $calendarMonths["year"] }}</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div class="row">
					@forelse ($calendarMonths["months"] as $month)
						<div class="col-md-4 text-center">
							<a href="{{ route("expenses.index", ["date" => $calendarMonths["year"] . "-" . $month["month"]]) }}" class="text-white">
							<div class="p-2 bg-info mb-4">
								<span>{{ $month["month"] }}</span>
								<p class="text-20">{{ $month["name"] }}</p>
							</div>
							</a>
						</div>
					@empty
					@endforelse
				</div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>