<div class="modal" id="allowancesModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Allowances to this Month</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div>
					<div class="row mb-2">
						<div class="col-10">
							<h6
								class="hover-link"
								data-toggle="collapse"
								data-target="#editAllowanceForm"
							>
								Allowance Form
							</h6>
						</div>
						<div class="col-2 text-right">
							<a
								href="#"
								class="btn btn-sm btn-info resetForm"
								data-form="#allowancesForm"
							>
								<i class="fas fa-redo-alt"></i>
							</a>
						</div>
					</div>
					<div class="collapse" id="editAllowanceForm">
						<form
							id="allowancesForm"
							action="{{ route('expenses.allowances.store') }}"
							data-add-url="{{ route('expenses.allowances.store') }}"
							data-edit-url="{{ route('expenses.allowances.update', -1) }}"
							method="POST"
						>
							{{ csrf_field() }}
							
							@include("expenses.partials.goal-form-fields")
							
							<div class="form-group text-right">
								<button type="submit" class="btn btn-sm btn-info">Save</button>
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
								<tr
									class="hover-link"
									data-values="{{ $allowance }}"
								>
									<td>
										{{ $allowance->description }}
									</td>
									<td>£{{ $allowance->amount }}</td>
									<td class="btn-group">
										<form
											method="POST"
											action="{{ $allowance->is_paid ? route('expenses.allowances.mark-inactive', [$allowance]) : route('expenses.allowances.mark-active', [$allowance]) }}"
										>
											{{ csrf_field() }}
											<button
												type="submit"
												class="btn btn-sm btn-info"
												data-toggle="tooltip"
												title="Mark {{ $allowance->is_paid ? "inactive" : "active" }}"
											>
												<i class="fa fa-{{ $allowance->is_paid ? 'times' : 'check' }}"></i>
											</button>
										</form>
										<form method="POST" action="{{ route('expenses.allowances.destroy', [$allowance]) }}" class="ml-1">
											{{ csrf_field() }}
											<button
												type="submit"
												class="btn btn-sm btn-danger"
												data-toggle="tooltip"
												title="Delete this allowance"
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
				<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>