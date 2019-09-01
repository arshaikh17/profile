<div class="modal" id="allowancesModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Allowances to this Month</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div>
					<p class="hover-link" data-toggle="collapse" data-target="#editAllowanceForm">Allowance form.</p>
					<div class="collapse" id="editAllowanceForm">
						<form
							action="{{ route('expenses.goals.allowances.store') }}"
							method="POST"
						>
							{{ csrf_field() }}
							
							@include("expenses.partials.goal-form-fields")
							
							<div class="form-group text-right">
								<input type="submit" class="btn btn-info" value="Save" />
							</div>
						</form>
					</div>
				</div>
				<div>
					<table class="table table-sm table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Description</th>
								<th>Amount</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@forelse ($allowances as $allowance)
								<tr>
									<td
										class="hover-link allowanceRow"
										data-data="{{ $allowance }}"
									>
										{{ $allowance->description }}
									</td>
									<td>£{{ $allowance->amount }}</td>
									<td class="btn-group">
										<form
											method="POST"
											action="{{ $allowance->status ? route('expenses.goals.allowances.mark-inactive', [$allowance]) : route('expenses.goals.allowances.mark-active', [$allowance]) }}"
										>
											{{ csrf_field() }}
											<button
												type="submit"
												class="btn btn-sm btn-info"
												data-toggle="tooltip"
												title="Mark {{ $allowance->status ? "inactive" : "active" }}"
											>
												<i class="fa fa-{{ $allowance->status ? 'times' : 'check' }}"></i>
											</button>
										</form>
										<form method="POST" action="{{ route('expenses.goals.allowances.destroy', [$allowance]) }}">
											{{ csrf_field() }}
											<button
												type="submit"
												class="btn btn-sm btn-danger"
												data-toggle="tooltip"
												title="Delete this allowance"
											>
												<i class="fa fa-times"></i>
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