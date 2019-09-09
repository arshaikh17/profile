<div class="modal" id="allExpensesModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">All Expenses</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div>
					<table class="table table-sm table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Tag</th>
								<th>Amount</th>
								<th>Spent At</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@forelse ($expenditures as $expenditure)
								<tr
									class="hover-link"
									data-values="{{ $expenditure }}"
								>
									<td>
										{{ $expenditure->tag ? $expenditure->tag->name : "Else" }}
									</td>
									<td>£{{ $expenditure->amount }}</td>
									<td>{{ \Carbon\Carbon::parse($expenditure->date)->format("F dS, Y") }}</td>
									<td class="text-center">
										<form method="POST" action="{{ route('expenses.expenditures.destroy', [$expenditure]) }}">
											{{ csrf_field() }}
											<button
												type="submit"
												class="btn btn-sm btn-danger"
												data-toggle="tooltip"
												title="Delete this expenditure"
											>
												<i class="fas fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>
							@empty
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>